<?php

namespace App\Http\Controllers\Admin\Ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
        //amount, vendor, customer
        $products          = DB::table('products')->count();
        $quantity          = DB::table('products')->sum('quantity');
        $orders            = DB::table('orders')->count();
        $pending_orders    = DB::table('orders')->where('status', 0)->count();
        $processing_orders = DB::table('orders')->where('status', 1)->count();
        $cancel_orders     = DB::table('orders')->where('status', 2)->count();
        $delivered_orders  = DB::table('orders')->where('status', 3)->count();
        $vendor_amount     = DB::table('vendor_accounts')->where('vendor_id', '!=', 1)->sum('amount');
        $admin_amount      = DB::table('vendor_accounts')->where('vendor_id', 1)->sum('amount');
        $pending_amount      = DB::table('vendor_accounts')->where('vendor_id', 1)->sum('pending_amount');
        $vendor_pamount=DB::table('vendor_accounts')->where('vendor_id', '!=', 1)->sum('pending_amount');
        $vendors           = DB::table('users')->where('role_id', 2)->count();
        $customers         = DB::table('users')->where('role_id', 3)->count();
        $commission        = DB::table('commissions')->where('status', true)->sum('amount');
        return view('admin.e-commerce.dashboard', compact(
            'products',
            'pending_amount',
            'vendor_pamount',
            'quantity',
            'orders',
            'pending_orders',
            'processing_orders',
            'cancel_orders',
            'delivered_orders',
            'vendor_amount',
            'admin_amount',
            'vendors',
            'customers',
            'commission'
        ));
    }
}
