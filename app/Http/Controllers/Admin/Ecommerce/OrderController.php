<?php

namespace App\Http\Controllers\Admin\Ecommerce;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\DeviceId;
use App\Models\User;
use App\Models\VendorAccount;
use App\Models\PartialPayment;
use App\Models\OrderDetails;
use App\Models\Commission;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Mail;
class OrderController extends Controller
{    
    
    /**
     * show customer order list
     *
     * @return void
     */
    public function index()
    {
        $orders = Order::latest('id')->get();
        return view('admin.e-commerce.order.index', compact('orders'));
    }
     public function comission()
    {
        $comissions = Commission::latest('id')->where('status','1')->get();
        return view('admin.e-commerce.order.comission', compact('comissions'));
    }
    
    /**
     * show customer pending order list
     *
     * @return void
     */
    public function pending()
    {
        $orders = Order::where('status', 0)->where('is_pre','0')->latest('id')->get();
        return view('admin.e-commerce.order.pending', compact('orders'));
    }
    public function pre()
    {
        $orders = Order::where('status', 0)->where('is_pre','1')->latest('id')->get();
        return view('admin.e-commerce.order.pending', compact('orders'));
    }
    
    /**
     * show customer processing order list
     *
     * @return void
     */
    public function processing()
    {
        $orders = Order::where('status', 1)->latest('id')->get();
        return view('admin.e-commerce.order.processing', compact('orders'));
    }
    
    /**
     * show customer cancel order list
     *
     * @return void
     */
    public function cancel()
    {
        $orders = Order::where('status', 2)->latest('id')->get();
        return view('admin.e-commerce.order.cancel', compact('orders'));
    }
    
    /**
     * show customer delivered order list
     *
     * @return void
     */
    public function delivered()
    {
        $orders = Order::where('status', 3)->latest('id')->get();
        return view('admin.e-commerce.order.delivered', compact('orders'));
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
        return view('admin.e-commerce.order.show', compact('order'));
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
        return view('admin.e-commerce.order.invoice', compact('order'));
    }
    
    /**
     * change order status pending to processing
     *
     * @param  mixed $id
     * @return void
     */
    public function statusProcessing($id)
    {
        $order = Order::findOrFail($id);
        if($order->status==3){
            $this->return_helper($order);
            foreach ($order->orderDetails as $item) {
                $product = Product::find($item->product_id);
                if ($product) {
                    $vendor = User::find($product->user_id);
                    if ($vendor->role_id == 1) {
                        $amount = $vendor->vendorAccount->amount;
                        $vendor->vendorAccount()->update([
                            'amount' => $amount - $item->g_total
                        ]);
                    }
                    else {
                        $grand_total = $item->g_total;
                        $admin_amount=Commission::where('order_id',$order->id)->first();
                        $admin_amount->status=0;
                        $admin_amount->update();
                        $adminAccount = VendorAccount::where('vendor_id', 1)->first();
                        $vendor_amount = $grand_total;
                        $amount = $adminAccount->amount;


                        $vendor->vendorAccount()->update([
                            'amount' => $vendor->vendorAccount->amount - $vendor_amount
                        ]);
                    }
                    
                    $product->quantity = $product->quantity - $item->qty;
                    $product->save();
                }
            }
             if ($vendor->role_id != 1) {
                                    $adminAccount->update([
                            'amount' => $amount - $admin_amount->amount
                        ]);}
            $order->status = 1;
           DB::table('multi_order')->where('order_id',$id)->update(['status'=>1]);
            $order->save();
            $user=User::find($order->user_id);
            $user->point -=$order->point;
            $user->update();
            notify()->success("Order status processing successfully", "Congratulations");
            return back();
        }elseif ($order->status != 2) {
            $order->status = 1;
            DB::table('multi_order')->where('order_id',$id)->update(['status'=>1]);
            $order->save();
           $this->  sendNotification('pross',$order->invoice,$order->user_id);
            notify()->success("Order status processing successfully", "Congratulations");
            return back();
        }elseif ($order->status == 2) {
             $this->return_helper($order);
            $this->sendNotification('cancel',$order->invoice,$order->user_id);
            notify()->success("Order status processing successfully", "Congratulations");
            return back();
        }
        notify()->warning("This order status not pending", "Something Wrong");
        return back();
    }
    public function return_helper($order){
         foreach ($order->orderDetails as $item) {
                $product = Product::find($item->product_id);
                if ($product) {
                    $vendor = User::find($product->user_id);
                    if ($vendor->role_id == 1) {
                        $amount = $vendor->vendorAccount->pending_amount;
                        $vendor->vendorAccount()->update([
                            'pending_amount' => $amount +$item->g_total
                        ]);
                    }
                    else {
                        $grand_total = $item->g_total;
                        $admin_amount=Commission::where('order_id',$order->id)->first();
                        $adminAccount = VendorAccount::where('vendor_id', 1)->first();
                        $vendor_amount = $grand_total;
                        $amount = $adminAccount->pending_amount;
                       

                        $vendor->vendorAccount()->update([
                            'pending_amount' => $vendor->vendorAccount->pending_amount + $vendor_amount
                        ]);
                    }
                    
                    $product->quantity = $product->quantity - $item->qty;
                    $product->save();
                }
            }
             if ($vendor->role_id != 1) {
             $adminAccount->update([
                            'pending_amount' => $amount + $admin_amount->amount
                        ]);}
            $order->status = 1;
            DB::table('multi_order')->where('order_id',$order->id)->update(['status'=>1]);
            $order->save();
            $user=User::find($order->user_id);
            $user->pen_point +=$order->point;
            if($order->payment_method=='wallate'){
            $user->wallate =$user->wallate -$order->total;
            }
            $user->update();
    }
     public function refund_helper($order){
         foreach ($order->orderDetails as $item) {
                $product = Product::find($item->product_id);
                if ($product) {
                    $vendor = User::find($product->user_id);
                    if ($vendor->role_id == 1) {
                        $amount = $vendor->vendorAccount->pending_amount;
                        $vendor->vendorAccount()->update([
                            'pending_amount' => $amount + 0
                        ]);
                    }
                    else {
                        $admin_amount=Commission::where('order_id',$order->id)->first();
                        $adminAccount = VendorAccount::where('vendor_id', 1)->first();
                        
                        $amount = $adminAccount->pending_amount;
                       

                        $vendor->vendorAccount()->update([
                            'pending_amount' => $vendor->vendorAccount->pending_amount + 0
                        ]);
                    }
                    
                    $product->quantity = $product->quantity + $item->qty;
                    $product->save();
                }
            }
             if ($vendor->role_id != 1) {
             $adminAccount->update([
                            'pending_amount' => $amount + 0
                        ]);}
            $order->status = 1;
            DB::table('multi_order')->where('order_id',$order->id)->update(['status'=>1]);
            $order->save();
           
    }
      /**
     * change order status pending to processing
     *
     * @param  mixed $id
     * @return void
     */
    public function statusShipping($id)
    {
        $order = Order::findOrFail($id);
        
            $order->status = 4;
            DB::table('multi_order')->where('order_id',$id)->update(['status'=>4]);
            $order->save();

          DB::table('multi_order')->where('order_id',$id)->where('vendor_id',auth()->id())->update(['status'=>4]);
        $this-> sendNotification('shipping',$order->invoice,$order->user_id);
        notify()->success("Order status Shipping successfully", "Congratulations");
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
           $this->cancel_helper($order);
            $this->sendNotification('cancel',$order->invoice,$order->user_id);
            notify()->success("Order cancel successfully", "Congratulations");
            return back();
          }
        notify()->warning("This order status not pending/processing", "Something Wrong");
        return back();
      
        
    }
    public function cancel_helper($order){
         foreach ($order->orderDetails as $item) {
                $product = Product::find($item->product_id);
                if ($product) {
                    $vendor = User::find($product->user_id);
                    if ($vendor->role_id == 1) {
                        $amount = $vendor->vendorAccount->pending_amount;
                        $vendor->vendorAccount()->update([
                            'pending_amount' => $amount - $item->g_total
                        ]);
                    }
                    else {
                        $grand_total = $item->g_total;
                        $admin_amount=Commission::where('order_id',$order->id)->first();
                        $adminAccount = VendorAccount::where('vendor_id', 1)->first();
                        $vendor_amount = $grand_total;
                        $amount = $adminAccount->pending_amount;
                       

                        $vendor->vendorAccount()->update([
                            'pending_amount' => $vendor->vendorAccount->pending_amount - $vendor_amount
                        ]);
                    }
                    
                    $product->quantity = $product->quantity + $item->qty;
                    $product->save();
                }
            }
            if ($vendor->role_id != 1) {
             $adminAccount->update([
                            'pending_amount' => $amount - $admin_amount->amount
                        ]);
            }
            $order->status = 2;
              DB::table('multi_order')->where('order_id',$order->id)->update(['status'=>2]);
            $order->save();
            $user=User::find($order->user_id);
            $user->pen_point -=$order->point;
            if($order->payment_method=='wallate'){
            $user->wallate =$user->wallate+$order->total;
            }
            $user->update();
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
        if ($order->status == 0 || $order->status == 1 || $order->status == 4) {
            
           
            $this->cancel_helper($order);
            foreach ($order->orderDetails as $item) {
                $product = Product::find($item->product_id);
                if ($product) {
                    $vendor = User::find($product->user_id);
                    if ($vendor->role_id == 1) {
                        $amount = $vendor->vendorAccount->amount;
                        $vendor->vendorAccount()->update([
                            'amount' => $amount + $item->g_total
                        ]);
                    }
                    else {
                        $grand_total = $item->g_total;
                        $admin_amount=Commission::where('order_id',$order->id)->first();
                        $admin_amount->status=1;
                        $admin_amount->update();
                        $adminAccount = VendorAccount::where('vendor_id', 1)->first();
                        $vendor_amount = $grand_total;
                        $amount = $adminAccount->amount;
                       

                        $vendor->vendorAccount()->update([
                            'amount' => $vendor->vendorAccount->amount + $vendor_amount
                        ]);
                    }
                    
                    $product->quantity = $product->quantity - $item->qty;
                    $product->save();
                }
            }
            if ($vendor->role_id != 1) {
             $adminAccount->update([
                            'amount' => $amount + $admin_amount->amount
                        ]);}
            $order->status = 3;
            DB::table('multi_order')->where('order_id',$id)->update(['status'=>3]);
            $order->save();
            $user=User::find($order->user_id);
            $user->point +=$order->point;
            if($order->payment_method=='wallate'){
                $user->wallate =$user->wallate -$order->total;
            }
             $user->save();
             
             // affaliate bonuse
            
              // if($order->refer_id != 2){
              //     if($order->refer_bonus){
              //          $ref=User::find($order->refer_id);
              //          if($ref){
              //               $ref->wallate+=$order->refer_bonus;
              //       $ref->save();
              //          }
                   
              //     }
                  
              // }
          
            if(env('mail_config')==1){
                $data = [
                    'order_id'        => $order->order_id,
                    'invoice'         => $order->invoice,
                    'name'            => $order->first_name,
                    'email'           => $order->email,
                    'address'         => $order->address,
                    'coupon_code'     => $order->coupon_code,
                    'subtotal'        => $order->subtotal,
                    'shipping_charge' => $order->shipping_charge,
                    'discount'        => $order->discount,
                    'total'           => $order->total,
                    'date'            => $order->created_at,
                    'payment_method'            => $order->payment_method,
                    'pay_status'            => $order->pay_staus,
                    'pay_date'            => $order->pay_date,
                    'orderDetails'    => $order->orderDetails,
                    'phone'           => $order->phone,
                ];
                Mail::send('frontend.invoice-mail', $data, function($mail) use ($data)
                {
                    $mail->from(config('mail.from.address'),  config('app.name'))
                        ->to($data['email'], $data['name'])
                        ->subject('Order Invoice');
                });
            }
            notify()->success("Order delivered successfully", "Congratulations");
            return back();
            $this-> sendNotification('delevery',$order->invoice,$order->user_id);
        }
        notify()->warning("This order status not pending/processing", "Something Wrong");
        return back();
    }
   
        // Return Accept by Admin
        public function returnAccept($id)
        {
            $order = Order::findOrFail($id);
            if ($order->status == 6) {
                $order->status = 7; // return accept status
                DB::table('multi_order')->where('order_id', $id)->update(['status' => 7]);
                $order->save();
            
                notify()->success("Order return accepted successfully", "Congratulations");
                return back();
                $this->sendNotification('delevery', $order->invoice, $order->user_id);
            }
            notify()->warning("This order status not return accepted", "Something Wrong");
            return back();
        }
        
        // Complete return by admin as got the product from customer
        public function returnComplete($id)
        {
            $order = Order::findOrFail($id);
            if ($order->status == 7) {
    
                $order->status = 8; // return completed status
                DB::table('multi_order')->where('order_id', $id)->update(['status' => 8]);
                $order->save();
                
                notify()->success("Order Returned back successfully", "Congratulations");
                return back();
                $this->sendNotification('delevery', $order->invoice, $order->user_id);
            }
            notify()->warning("This order retrun system not completed yet", "Something Wrong");
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
        return view('admin.e-commerce.order.invoice', compact('order'));
    }
    public function partials(){
        $partials=PartialPayment::orderBy('id','desc')->get();
        return view('admin.e-commerce.order.partials',compact('partials'));
    }
    public function partialStatus($id,$st){
        $partials=PartialPayment::find($id);
        $order = Order::findOrFail($partials->order_id);
        $partials->update(['status'=>$st]);
                
            if($st==1){
                $parts=DB::table('multi_order')->where('order_id',$partials->order_id)->get();
                $amount=$partials->amount;
                foreach($parts as $part){
                    if($amount>0){
                        if($part->partial_pay!=$part->total){
                            $total_requested=$part->partial_pay+$amount;
                              
                            if($total_requested > $part->total){
                                $new_balance=$total_requested-$part->total;
                                $slice=$amount-$new_balance;
                                $amount-=$slice;
                            }else{
                                $slice=$amount;
                                $amount-=$slice;
                            }
                            
                            DB::table('multi_order')->where('id',$part->id)->update(['partial_pay'=>$part->partial_pay+$slice]);
                            
                        }
                    }
                }   
            }
        
        
        $this-> sendNotification('pertials',$order->invoice,$order->user_id);
        notify()->success("Successfully", "Congratulations");
        return back();
    }
    public function delete($id){
          $order = Order::findOrFail($id);
          DB::table('order_details')->where('order_id',$id)->delete();
          PartialPayment::where('order_id',$id)->delete();
           OrderDetails::where('order_id',$id)->delete();
          $order->delete();
           notify()->success("Order Delete successfully", "Congratulations");
             return redirect()->route('admin.order.index');
          
    }
     public function sendNotification($status,$invoice, $id)
    {
        $firebaseToken = DeviceId::where('user_id',$id)->pluck('device_id')->all();
        if($status=='cancel'){
            $body='Your Order is Cancel By Admin';
        }elseif($status=='pross'){
            $body='Your order is in processing';
        }elseif($status=='delevery'){
            $body='Order Arrived and Picked Up! Thank you for your Purchase';
        }elseif($status=='shipping'){
            $body='Your order has been delivered by courier';
        }elseif($status=='pertials'){
             $body='Your partials payment success';
        }
        $SERVER_API_KEY = 'AAAA9Ek9F7U:APA91bEtCumEi8v_NmoBW6rQbm48iVNB4ctTguXS5G33Mj1FEmX48zlNYEHLWO3d6WfLkPD3ByKZQPrlJVl0swAd1ZxFWPMHWOdPWXD30sGCOvu_xIV7nTW9PC6cGiL6n3FOBHl1bavE';
        $data = [
            "registration_ids" => $firebaseToken,
            "notification" => [
                "title" => 'Invoice Is '.$invoice.' From '.'shopasiabd.com',
                "body" => $body,
                "content_available" => true,
                "priority" => "high",
            ]
        ];
        $dataString = json_encode($data);

        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

        $response = curl_exec($ch);

       curl_close ($ch);
    }
   
    
    public function refund(Request $request){
        $order=Order::find($request->order);
        if($order->refund_method==null){
        $this->refund_helper($order);
            foreach ($order->orderDetails as $item) {
                $product = Product::find($item->product_id);
                if ($product) {
                    $vendor = User::find($product->user_id);
                    if ($vendor->role_id == 1) {
                        $amount = $vendor->vendorAccount->amount;
                        $vendor->vendorAccount()->update([
                            'amount' => $amount - $item->g_total
                        ]);
                    }
                    else {
                        $grand_total = $item->g_total;
                        $admin_amount=Commission::where('order_id',$order->id)->first();
                        $admin_amount->status=0;
                        $admin_amount->update();
                        $adminAccount = VendorAccount::where('vendor_id', 1)->first();
                        $vendor_amount = $grand_total ;
                        $amount = $adminAccount->amount;
                       

                        $vendor->vendorAccount()->update([
                            'amount' => $vendor->vendorAccount->amount - $vendor_amount
                        ]);
                    }
                    
                    $product->quantity = $product->quantity - $item->qty;
                    $product->save();
                }
            }
             if ($vendor->role_id != 1) {
             $adminAccount->update([
                            'amount' => $amount - $admin_amount->amount
                        ]);}
            $order->status = 5;
            DB::table('multi_order')->where('order_id',$order->id)->update(['status'=>5]);
            $order->refund_amount=$request->amount;
            $order->refund_method=$request->method;
            $order->save();
            $user=User::find($order->user_id);
            if($order->refund_method=='wallate'){
            $user->wallate =$request->amount+$user->wallate;
            }
            $user->point -=$order->point;
            $user->update();
        }else{
             $order->status = 5;
             DB::table('multi_order')->where('order_id',$id)->update(['status'=>5]);
             $order->refund_amount=$request->amount;
            $order->refund_method=$request->method;
            $order->save();
            $user=User::find($order->user_id);
            if($order->refund_method=='wallate'){
            $user->wallate =$user->wallate+$request->amount;
             $user->update();
            }
        }
           notify()->success("Order Refund successfully", "Congratulations");
            return back();

    }
    public function refund_two(Request $request){
        $order=Order::find($request->order);
        $order->status = 5;
        DB::table('multi_order')->where('order_id',$order->id)->update(['status'=>5]);
        $order->refund_amount=$request->amount;
        $order->refund_method=$request->method;
        $order->save();
        $user=User::find($order->user_id);
         if($order->refund_method=='wallate'){
            $user->wallate =$user->wallate+$request->amount;
            $user->update();
        }
        
        notify()->success("Order Refund successfully", "Congratulations");
        return back();

    }
    
    
    // sub_order
    
    public function sub_status($id,$status,$vendor)
    {
            DB::table('multi_order')->where('order_id',$id)->where('vendor_id',$vendor)->update(['status'=>$status]);
           
            notify()->success("Order status  successfully changed", "Congratulations");
            return back();
       
    }
    
    
}
