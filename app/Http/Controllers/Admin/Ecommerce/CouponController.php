<?php

namespace App\Http\Controllers\Admin\Ecommerce;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons = DB::table('coupons')->latest('id')->get();
        return view('admin.e-commerce.coupon.index', compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.e-commerce.coupon.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'code'            => 'required|string|max:255|unique:coupons,code',
            'discount_type'   => 'required|string|max:255',
            'discount'        => 'required|numeric',
            'limit_per_user'  => 'required|integer',
            'total_use_limit' => 'required|integer',
            'expire_date'     => 'required|date',
            'description'     => 'required|string'
        ]);
        
        Coupon::create([
            'code'            => $request->code,
            'discount_type'   => $request->discount_type,
            'discount'        => $request->discount,
            'limit_per_user'  => $request->limit_per_user,
            'total_use_limit' => $request->total_use_limit,
            'available_limit' => $request->total_use_limit,
            'expire_date'     => $request->expire_date,
            'description'     => $request->description,
            'status'          => $request->filled('status')
        ]);

        notify()->success("Coupon successfully added", "Added");
        return redirect()->to(routeHelper('coupon'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function show(Coupon $coupon)
    {
        return view('admin.e-commerce.coupon.show', compact('coupon'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function edit(Coupon $coupon)
    {
        return view('admin.e-commerce.coupon.form', compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coupon $coupon)
    {
        $this->validate($request, [
            'code'            => 'required|string|max:255|unique:coupons,code,'.$coupon->id,
            'discount_type'   => 'required|string|max:255',
            'discount'        => 'required|numeric',
            'limit_per_user'  => 'required|integer',
            'total_use_limit' => 'required|integer',
            'expire_date'     => 'required|date',
            'description'     => 'required|string'
        ]);
        
        $coupon->update([
            'code'            => $request->code,
            'discount_type'   => $request->discount_type,
            'discount'        => $request->discount,
            'limit_per_user'  => $request->limit_per_user,
            'total_use_limit' => $request->total_use_limit,
            'available_limit' => $request->total_use_limit,
            'expire_date'     => $request->expire_date,
            'description'     => $request->description,
            'status'          => $request->filled('status')
        ]);

        notify()->success("Coupon successfully updated", "Added");
        return redirect()->to(routeHelper('coupon'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coupon $coupon)
    {
        $coupon->delete();
        notify()->success("Coupon successfully deleted", "Delete");
        return back();
    }
}
