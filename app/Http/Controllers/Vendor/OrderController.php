<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Product;
use App\Models\User;
use App\Models\VendorAccount;
use Illuminate\Http\Request;
use DB;
class OrderController extends Controller
{    
    /**
     * show customer order list
     *
     * @return void
     */
    public function index()
    {
        $product_ids = Product::where('user_id', auth()->id())->pluck('id');
        $order_ids   = OrderDetails::whereIn('product_id', $product_ids)->pluck('order_id');
        $orders      = Order::whereIn('id', $order_ids)->latest('id')->get();
        return view('vendor.order.index', compact('orders'));
    }
    
    /**
     * show customer pending order list
     *
     * @return void
     */
    public function pending()
    {
        $product_ids = Product::where('user_id', auth()->id())->pluck('id');
        $order_ids   = OrderDetails::whereIn('product_id', $product_ids)->pluck('order_id');
        $orders      = Order::whereIn('id', $order_ids)->where('status', 0)->latest('id')->get();
        return view('vendor.order.pending', compact('orders'));
    }
    
    /**
     * show customer processing order list
     *
     * @return void
     */
    public function processing()
    {
        $product_ids = Product::where('user_id', auth()->id())->pluck('id');
        $order_ids   = OrderDetails::whereIn('product_id', $product_ids)->pluck('order_id');
        $orders      = Order::whereIn('id', $order_ids)->where('status', 1)->latest('id')->get();
        return view('vendor.order.processing', compact('orders'));
    }
    
    /**
     * show customer cancel order list
     *
     * @return void
     */
    public function cancel()
    {
        $product_ids = Product::where('user_id', auth()->id())->pluck('id');
        $order_ids   = OrderDetails::whereIn('product_id', $product_ids)->pluck('order_id');
        $orders      = Order::whereIn('id', $order_ids)->where('status', 2)->latest('id')->get();
        return view('vendor.order.cancel', compact('orders'));
    }
    
    /**
     * show customer delivered order list
     *
     * @return void
     */
    public function delivered()
    {
        $product_ids = Product::where('user_id', auth()->id())->pluck('id');
        $order_ids   = OrderDetails::whereIn('product_id', $product_ids)->pluck('order_id');
        $orders      = Order::whereIn('id', $order_ids)->where('status', 3)->latest('id')->get();
        return view('vendor.order.delivered', compact('orders'));
    }
    
    /**
     * show order product
     *
     * @param  mixed $id
     * @return void
     */
    public function show($id)
    {
        
        $order = Order::findOrFail($id);
        return view('vendor.order.show', compact('order'));
    }
    
    /**
     * order print
     *
     * @param  mixed $id
     * @return void
     */
    public function print($id)
    {
        $order = Order::findOrFail($id);
        return view('vendor.order.invoice', compact('order'));
    }
    
    /**
     * change order status pending to processing
     *
     * @param  mixed $id
     * @return void
     */
    public function statusProcessing($id)
    {
          $order=DB::table('multi_order')->where('order_id',$id)->where('vendor_id',auth()->id())->first();
        
            DB::table('multi_order')->where('order_id',$id)->where('vendor_id',auth()->id())->update(['status'=>1]);
           
            notify()->success("Order status processing successfully", "Congratulations");
            return back();
        
    }
    
     public function statusShipping($id)
    {
         $order=DB::table('multi_order')->where('order_id',$id)->where('vendor_id',auth()->id())->first();
       
            DB::table('multi_order')->where('order_id',$id)->where('vendor_id',auth()->id())->update(['status'=>4]);
           
            notify()->success("Order status shipping successfully", "Congratulations");
            return back();
      
    }
    /**
     * change order status pending/processing to cancel
     *
     * @param  mixed $id
     * @return void
     */
    public function statusCancel($id)
    {
        $order = Order::findOrFail($id);
        
        if ($order->status == 0 || $order->status == 1) {
            foreach ($order->orderDetails as $item) {
                $product = Product::find($item->product_id);
                if ($product) {
                    $vendor = User::find($product->user_id);
                    if ($vendor->role_id == 1) {
                        $amount = $vendor->vendorAccount->amount;
                        $vendor->vendorAccount()->update([
                            'amount' => $amount - $order->total
                        ]);
                    }
                    else {
                        $grand_total = $order->total;
                        if ($vendor->shop_info->commission == NULL) {
                            $admin_amount  = (setting('shop_commission') / 100) * $grand_total;
                            $vendor_amount = $grand_total - $admin_amount;
                        }
                        else {
                            $admin_amount  = ($vendor->shop_info->commission / 100) * $grand_total;
                            $vendor_amount = $grand_total - $admin_amount;
                        }
                        $adminAccount = VendorAccount::where('vendor_id', 1)->first();
                        $amount = $adminAccount->amount;
                        $adminAccount->update([
                            'amount' => $amount - $admin_amount
                        ]);

                        $vendor->vendorAccount()->update([
                            'amount' => $vendor->vendorAccount->amount - $vendor_amount
                        ]);
                    }
                    
                    $product->quantity = $product->quantity + $item->qty;
                    $product->save();
                }
            }
            $order->commission->update([
                'status'  => false,
            ]);
            $order->status = 2;
            $order->save();
            notify()->success("Order cancel successfully", "Congratulations");
            return back();
        }
        notify()->warning("This order status not pending/processing", "Something Wrong");
        return back();
        
    }

    /**
     * change order status pending/processing to delivered
     *
     * @param  mixed $id
     * @return void
     */
    public function statusDelivered($id)
    {
        $order = Order::findOrFail($id);
        if ($order->status == 0 || $order->status == 1) {
            
            $order->status = 3;
            $order->save();
            notify()->success("Order delivered successfully", "Congratulations");
            return back();
        }
        notify()->warning("This order status not pending/processing", "Something Wrong");
        return back();
    }

    /**
     * order invoice print
     *
     * @param  mixed $id
     * @return void
     */
    public function invoice($id)
    {
        $order = Order::findOrFail($id);
        return view('vendor.order.invoice', compact('order'));
    }

}
