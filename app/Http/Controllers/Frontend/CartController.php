<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Models\Attribute;
use App\Models\CartInfo;
use App\Models\CampaingProduct;
use App\Models\Color;
use App\Models\AttributeValue;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function cart()
    {
        return view('frontend.cart');
    }

    // add to cart
    public function addToCart(Request $request)
    {
        $this->validate($request, [
            'id'    => 'required|integer',
            'qty'   => 'required|integer',
            'color' => 'nullable|string|max:20',
            'size'  => 'nullable|string|max:20'
        ]);
        $attr=[];
        $price=0;
        $product = Product::findOrFail($request->id);
        $attributes = Attribute::all();
        if($product->colors->count()>0 && $request->color=='blank'){
             return response()->json([
                'alert'    => 'Warning',
                'message'  => 'Please Choose a Colour',
                
            ]);
        }
        foreach ($attributes as $attribute){
            $slug=$attribute->slug;
            $s =$request->$slug;
            if($s=='blank'){
                return response()->json([
                'alert'    => 'Warning',
                'message'  => 'Sorry,Please Fill All Attribute',
                
                ]);
            }
        }
        foreach ($attributes as $attribute){
        $attribute_prouct = DB::table('attribute_product')
                              ->select('*')
                              ->join('attribute_values', 'attribute_values.id', '=', 'attribute_product.attribute_value_id')
                              ->addselect('attribute_values.name as vName' )
                              ->addselect('attribute_product.id as vid' )
                              ->join('attributes', 'attributes.id', '=', 'attribute_values.attributes_id')
                              ->where('attribute_product.product_id', $product->id)
                                ->where('attributes.id', $attribute->id)
                              ->get();
        if($attribute_prouct->count() > 0){
            $slug=$attribute->slug;

           $attr[$slug]=($request->$slug);

            $id=$request->$slug;
            if($id>0){
                $attr_pro=DB::table('attribute_product')->where('product_id',$request->id)->where('attribute_value_id',$id)->first();
                $price +=$attr_pro->price;
            }

        }}
        if(!empty($request->color) && $product->color !='blank'){
            $c=Color::where('slug',$request->color)->first();
            if(!empty($c)){
            $color=DB::table('color_product')->where('product_id',$request->id)->where('color_id',$c->id)->first();
            $price+=$color->price;
        }
        }
        if(isset($request->camp)){
           $camp= CampaingProduct::find($request->camp);
           $op=$camp->price;
        }elseif(empty($product->discount_price)){
           $op= $product->regular_price;
        }else{
            $op=$product->discount_price;
        }
        $cart=Cart::add([
            'id'        => $product->id, 
            'name'      => $product->title, 
          
            'qty'       => $request->qty, 
            'price'     => $op+$price,
            'weight'    => $product->user_id,
            'options'   => [
                'slug'     => $product->slug, 
                'image'    => $product->image, 
                'attributes'     => $attr??Null,
                'color'    => $request->color,
                'vendor'      => $product->user_id, 
                'seller'      => $product->user->name, 
            ],
            
        ]);
        if(auth()->id()){
            CartInfo::create([
                'user_id'=>auth()->id(),
                'vendor'      => $product->user_id, 
                'ser'=>$cart->rowId,
                'product_id'=>$product->id,
                'qty'=>$request->qty,
                'price'=>$op+$price,
                'color'=>$request->color,
                'attr'=> json_encode($attr)??Null,
            ]);
        }

        return response()->json([
            'alert'    => 'Congratulations',
            'message'  => 'Product add to cart successfully',
            'subtotal' => Cart::count(),
            'count' => Cart::count(),
        ]);
    }

    // get cart data
    public function getCart() {
        
         $cartCollection= Cart::content();
        $data= $cartCollection->sortBy('weight');
         
        
        return response()->json([
            'count' => Cart::count(),
            'carts' => $data
        ]);
    }

    // update cart quantity
    public function updateCart($rowId, $qty)
    {
        Cart::update($rowId, ['qty' => $qty]);
        return response()->json([
            'alert'   => 'Success',
            'message' => 'Quantity update successfully',
        ]);
    }

    // remove product to cart
    public function destroyCart($rowId)
    {
        Cart::remove($rowId);
        $cart=CartInfo::where('ser',$rowId)->delete();
        return response()->json([
            'alert'   => 'Success',
            'message' => 'Product successfully remove to cart',
        ]);
    }
    
    /**
     * apply coupon
     *
     * @param  mixed $code
     * @return void
     */
    public function applyCoupon($code,$stotal)
    {
        $coupon = Coupon::where('code', $code)->where('status', true)->where('expire_date', '>=', date('Y-m-d'))->first();
        
        if($coupon){
            if ($coupon->available_limit > 0) {
                $coupon_limit = DB::table('coupon_user')->where('user_id', auth()->id())->where('coupon_id', $coupon->id)->get();
                
                if ($coupon_limit->count() < $coupon->limit_per_user) {
                    
                    if(Session::has('coupon')){
                        return response()->json([
                            'message' => 'Already applied this coupon code.',
                            'alert'   => 'error',
                        ]);
                    }

                    $subtotal = $stotal;
                    if ($coupon->discount_type == 'percent') {
                        $discount  = (floatval($coupon->discount) / 100) * $subtotal;
                    } 
                    else {
                        $discount = $coupon->discount;
                    }
                    
                    Session::put('coupon', [
                        'name'     => $coupon->code,
                        'discount' => $discount
                    ]);
                    $coupon->users()->attach(auth()->id());
                    $coupon->update([
                        'available_limit' => $coupon->available_limit - 1
                    ]);
                    return response()->json([
                        'message'  => 'Successfully apply coupon',
                        'alert'    => 'success',
                        'total'    => $subtotal - $discount,
                        'discount' => $discount
                    ]);
                }
                return response()->json([
                    'message' => 'Your coupon use limit not available, already use '.auth()->user()->coupons()->count().' time',
                    'alert'   => 'error',
                ]);
            }
            return response()->json([
                'message' => 'Coupon Limit Not Available',
                'alert'   => 'error',
            ]);
        }
        return response()->json([
            'message' => 'Invalid Coupon Code!!',
            'alert' => 'error',
        ]);
    }
    
    /**
     * apply coupon buy now product
     *
     * @param  mixed $code
     * @return void
     */
    public function applyCouponBuyNow($code, $id, $qty,$dynamic)
    {
        $coupon = Coupon::where('code', $code)->where('status', true)->where('expire_date', '>=', date('Y-m-d'))->first();
        
        if($coupon){
            if ($coupon->available_limit > 0) {
                $coupon_limit = DB::table('coupon_user')->where('user_id', auth()->id())->where('coupon_id', $coupon->id)->get();
                
                if ($coupon_limit->count() < $coupon->limit_per_user) {
                    
                    if(Session::has('coupon')){
                        return response()->json([
                            'message' => 'Already applied this coupon code.',
                            'alert'   => 'error'
                        ]);
                    }
                    $product = Product::find($id);
                    if ($product) {
                        if($qty>=6 && $product->whole_price >0){
                            $subtotal = $product->whole_price * $qty;
                        }else{
                            $subtotal = $dynamic * $qty;
                        }
                        if ($coupon->discount_type == 'percent') {
                            $discount  = (floatval($coupon->discount) / 100) * $subtotal;
                        } 
                        else {
                            $discount = $coupon->discount;
                        }
                        
                        Session::put('coupon', [
                            'name'     => $coupon->code,
                            'discount' => $discount
                        ]);
                        $coupon->users()->attach(auth()->id());
                        $coupon->update([
                            'available_limit' => $coupon->available_limit - 1
                        ]);
                        return response()->json([
                            'message'  => 'Successfully apply coupon',
                            'alert'    => 'success',
                            'total'    => $subtotal - $discount,
                            'discount' => $discount
                        ]);
                    }
                    return response()->json([
                        'message' => 'Sorry something wrong'.$id,
                        'alert'   => 'error'
                    ]);
                }
                return response()->json([
                    'message' => 'Your coupon use limit not available, already use '.auth()->user()->coupons()->count().' time',
                    'alert'   => 'error'
                ]);
            }
            return response()->json([
                'message' => 'Coupon Limit Not Available',
                'alert'   => 'error'
            ]);
        }
        return response()->json([
            'message' => 'Invalid Coupon Code!!',
            'alert' => 'error'
        ]);
    }
}