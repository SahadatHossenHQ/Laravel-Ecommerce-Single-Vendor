<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $product_ids = Product::where('user_id', auth()->id())->pluck('id');
        $order_ids   = OrderDetails::whereIn('product_id', $product_ids)->pluck('order_id');
        $orders                 = Order::whereIn('id', $order_ids)->latest('id')->count();
        $pending_orders         = Order::whereIn('id', $order_ids)->latest('id')->where('status', 0)->count();
        $processing_orders      = Order::whereIn('id', $order_ids)->latest('id')->where('status', 1)->count();
        $cancel_orders          = Order::whereIn('id', $order_ids)->latest('id')->where('status', 2)->count();
        $delivered_orders       = Order::whereIn('id', $order_ids)->latest('id')->where('status', 3)->count();
         $sihpping_order       = Order::whereIn('id', $order_ids)->latest('id')->where('status', 4)->count();
          $refund_orders       = Order::whereIn('id', $order_ids)->latest('id')->where('status', 5)->count();
        
        
        //amount, vendor, customer
        $products          = DB::table('products')->where('user_id', auth()->id())->count();
        $quantity          = DB::table('products')->where('user_id', auth()->id())->sum('quantity');
        
        $amount            = DB::table('vendor_accounts')->where('vendor_id', auth()->id())->sum('amount');
        $pending_amount            = DB::table('vendor_accounts')->where('vendor_id', auth()->id())->sum('pending_amount');
       
        return view('vendor.dashboard', compact(
            'products',
             'sihpping_order',
              'refund_orders',
            'pending_amount',
            'quantity',
            'orders',
            'pending_orders',
            'processing_orders',
            'cancel_orders',
            'delivered_orders',
            'amount'
        ));
    }
}