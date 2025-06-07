<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Commission;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\VendorAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class CustomOrderController extends Controller
{
    /**
     * order product
     *
     * @param  mixed $id
     * @return void
     */
    public function orderProduct($id)
    {
        $product = Product::findOrFail($id);
        if ($product->quantity > 0) {
            return view('admin.e-commerce.order.create', compact('product'));
        }
        notify()->warning("This product stock not available", "Stock Out");
        return back();
    }
    public function pay($id){
        $order=Order::find($id);
        if($order->pay_staus==1){
            $st=null;
            $date=null;
        }else{
            $st=1;
            $date=date('d-m-y');
        }
        $order->pay_staus=$st;
        $order->pay_date=$date;
        $order->update();
        notify()->success("Payment Status Updated", "Updated");
        return back();

    }
    /**
     * apply coupon
     *
     * @param  mixed $code
     * @return void
     */
    public function applyCoupon($code, $id)
    {
        $coupon = Coupon::where('code', $code)->where('status', true)->where('expire_date', '>=', date('Y-m-d'))->first();
        
        if($coupon){
            if ($coupon->available_limit > 0) {
                
                if(Session::has('coupon')) {
                    return response()->json([
                        'message' => 'Already applied this coupon code.',
                        'alert'   => 'Error'
                    ]);
                }

                $product = Product::find($id);
                if ($product) {
                    if ($coupon->discount_type == 'percent') {
                        $discount  = (floatval($coupon->discount) / 100) * $product->discount_price;
                    } 
                    else {
                        $discount = $coupon->discount;
                    }
                    
                    Session::put('coupon', [
                        'name'     => $coupon->code,
                        'discount' => $discount
                    ]);
                    
                    $coupon->update([
                        'available_limit' => $coupon->available_limit - 1
                    ]);
                    return response()->json([
                        'message'  => 'Successfully apply coupon',
                        'alert'    => 'Success',
                        'discount' => $discount
                    ]);
                }
                return response()->json([
                    'message' => 'Sorry something wrong',
                    'alert'   => 'Error'
                ]);
            }
            return response()->json([
                'message' => 'Coupon Limit Not Available',
                'alert'   => 'Error'
            ]);
        }
        return response()->json([
            'message' => 'Invalid Coupon Code!!',
            'alert' => 'Error'
        ]);
    }

    /**
     * store customer buy now order order
     *
     * @param  mixed $request
     * @return void
     */
    public function orderProductStore(Request $request)
    {
        $this->validate($request, [
            'first_name'      => 'required|string|max:255',
            'last_name'       => 'required|string|max:255',
            'company'         => 'nullable|string|max:255',
            'country'         => 'required|string|max:255',
            'address'         => 'required|string|max:255',
            'city'            => 'required|string|max:255',
            'district'        => 'required|string|max:255',
            'postcode'        => 'required|string|max:255',
            'phone'           => 'required|string|max:255',
            'email'           => 'required|email|string|max:255',
            'shipping_method' => 'required|string|max:255',
            'payment_method'  => 'required|string|max:255',
            'mobile_number'   => 'nullable|string|max:255',
            'transaction_id'  => 'nullable|string|max:255',
            'bank_name'       => 'nullable|string|max:255',
            'account_number'  => 'nullable|string|max:255',
            'holder_name'     => 'nullable|string|max:255',
            'branch'          => 'nullable|string|max:255',
            'routing'         => 'nullable|string|max:255',
        ]);
        
        if ($request->shipping_method == 'Free') {
            $shipping_charge = 0;
        }
        else {
            $shipping_charge = setting('shipping_charge');
        }
        $product  = Product::find($request->id);
        $subtotal = $product->discount_price * $request->qty;
        if (Session::has('coupon')) {
            $coupon_code = Session::get('coupon')['name'];
            $discount    = Session::get('coupon')['discount'];
            $total       = ($subtotal + $shipping_charge) - $discount;
        }
        
        $order = Order::create([
            'first_name'      => $request->first_name,
            'last_name'       => $request->last_name,
            'company_name'    => $request->company,
            'country'         => $request->country,
            'address'         => $request->address,
            'town'            => $request->city,
            'district'        => $request->district,
            'post_code'       => $request->postcode,
            'phone'           => $request->phone,
            'email'           => $request->email,
            'shipping_method' => $request->shipping_method,
            'shipping_charge' => $shipping_charge,
            'payment_method'  => $request->payment_method,
            'mobile_number'   => $request->mobile_number,
            'transaction_id'  => $request->transaction_id,
            'bank_name'       => $request->bank_name,
            'account_number'  => $request->account_number,
            'holder_name'     => $request->holder_name,
            'branch_name'     => $request->branch,
            'routing_number'  => $request->routing,
            'coupon_code'     => $coupon_code ?? '',
            'subtotal'        => $subtotal,
            'discount'        => $discount ?? 0,
            'total'           => $total ?? $subtotal
        ]);
        
        $chars    = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $order_id = substr(str_shuffle($chars), 0, 10);
        
        $order->update([
            'order_id' => $order_id,
            'invoice'  => '#'.str_pad($order->id, 5, 0, STR_PAD_LEFT),
        ]);
        
        $order->orderDetails()->create([
            'product_id'  => $product->id,
            'title'       => $product->title,
            'color'       => $request->color,
            'size'        => $request->size,
            'qty'         => $request->qty,
            'price'       => $product->discount_price,
            'total_price' => $product->discount_price * $request->qty
        ]);
        
        if ($product) {
            $vendor = User::find($product->user_id);
            if ($vendor->role_id == 1) {
                $account = VendorAccount::where('vendor_id', 1)->first();
                $account->amount += $total ?? $subtotal;
                $account->save();
                
            }
            else {
                $grand_total = $total ?? $subtotal;
                if ($vendor->shop_info->commission == NULL) {
                    $commission    = (setting('shop_commission') / 100) * $grand_total;
                    $vendor_amount = $grand_total - $commission;
                }
                else {
                    $commission    = ($vendor->shop_info->commission / 100) * $grand_total;
                    $vendor_amount = $grand_total - $commission;
                }
                $adminAccount = VendorAccount::where('vendor_id', 1)->first();
                $adminAccount->update([
                    'amount' => $adminAccount->amount + $commission
                ]);

                $vendor->vendorAccount()->update([
                    'amount' => $vendor->vendorAccount->amount + $vendor_amount
                ]);
                
                Commission::create([
                    'user_id'  => auth()->id(),
                    'order_id' => $order->id,
                    'amount'   => $commission
                ]);
            }
            $product->quantity = $product->quantity - $request->qty;
            $product->save();
        }

        Session::forget('coupon');

        $data = [
            'order_id'        => $order->order_id,
            'invoice'         => $order->invoice,
            'name'            => $request->first_name,
            'email'           => $request->email,
            'address'         => $request->address,
            'coupon_code'     => $order->coupon_code,
            'subtotal'        => $order->subtotal,
            'shipping_charge' => $order->shipping_charge,
            'discount'        => $order->discount,
            'total'           => $order->total,
            'date'            => $order->created_at,
            'orderDetails'    => $order->orderDetails
        ];
        
        Mail::send('frontend.invoice-mail', $data, function($mail) use ($data)
        {
            $mail->from(config('mail.from.address'), config('app.name'))
                ->to($data['email'], $data['name'])
                ->subject('Order Invoice');
        });
        
        notify()->success('Your order successfully done', "Congratulations");
        return redirect()->route('admin.order.index');
    }
}