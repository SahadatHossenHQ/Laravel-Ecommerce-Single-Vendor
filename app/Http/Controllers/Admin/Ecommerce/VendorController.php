<?php

namespace App\Http\Controllers\Admin\Ecommerce;

use App\Http\Controllers\Controller;
use App\Models\CustomerInfo;
use App\Models\Product;
use App\Models\ShopInfo;
use App\Models\User;
use App\Models\VendorAccount;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $vendors = User::where('role_id', 2)->latest('id')->get();
        $vendors = User::where('role_id', 2)->latest('id')->paginate(10);
        // $products=Product::where('user_id',$id)->with('brand')->latest('id')->paginate(10);

        
        return view('admin.e-commerce.vendor.index', compact('vendors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.e-commerce.vendor.form');
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
            'name'         => 'required|string|max:50',
            'username'     => 'required|string|max:25|unique:users,username',
            'email'        => 'required|string|max:255',
            'phone'        => 'required|string|max:30',
            'shop_name'    => 'required|string|max:255',
            'url'          => 'required|string|max:255',
            'bank_account' => 'nullable|string|max:255',
            'bank_name'    => 'nullable|string|max:255',
            'holder_name'  => 'nullable|string|max:255',
            'branch_name'  => 'nullable|string|max:255',
            'routing'      => 'nullable|string|max:255',
            'address'      => 'required|string|max:255',
            'description'  => 'required|string',
            'commission'   => 'nullable|numeric',
            'password'     => 'required|string|min:8|confirmed',
            'profile'      => 'required|image|max:1024|mimes:jpg,jpeg,bmp,png',
            'cover_photo'  => 'required|image|max:1024|mimes:jpg,jpeg,bmp,png',
            'trade'  => 'required|image|max:1024|mimes:jpg,jpeg,bmp,png',
            'nid'  => 'required|image|max:1024|mimes:jpg,jpeg,bmp,png'
        ]);

        $profile = $request->file('profile');
        $cover   = $request->file('cover_photo');
        $trade   = $request->file('trade');
        $nid   = $request->file('nid');
        if ($profile) {
            $currentDate = Carbon::now()->toDateString();
            $profileName = $currentDate.'-'.uniqid().'.'.$profile->getClientOriginalExtension();
            
            if (!file_exists('uploads/shop/profile')) {
                mkdir('uploads/shop/profile', 0777, true);
            }
            $profile->move(public_path('uploads/shop/profile'), $profileName);
        }
        if ($cover) {
            $currentDate = Carbon::now()->toDateString();
            $coverName   = $currentDate.'-'.uniqid().'.'.$cover->getClientOriginalExtension();
            
            if (!file_exists('uploads/shop/cover')) {
                mkdir('uploads/shop/cover', 0777, true);
            }
            $cover->move(public_path('uploads/shop/cover'), $coverName);
        }
        if ($trade) {
            $currentDate = Carbon::now()->toDateString();
            $tradeName   = $currentDate.'-'.uniqid().'.'.$trade->getClientOriginalExtension();
            
            if (!file_exists('uploads/shop/trade')) {
                mkdir('uploads/shop/trade', 0777, true);
            }
            $trade->move(public_path('uploads/shop/trade'), $tradeName);
        }
        if ($nid) {
            $currentDate = Carbon::now()->toDateString();
            $nidName   = $currentDate.'-'.uniqid().'.'.$nid->getClientOriginalExtension();
            
            if (!file_exists('uploads/shop/nid')) {
                mkdir('uploads/shop/nid', 0777, true);
            }
            $nid->move(public_path('uploads/shop/nid'), $nidName);
        }

        $vendor = User::create([
            'role_id'       => 2,
            'name'          => $request->name,
            'username'      => $request->username,
            'email'         => $request->email,
            'phone'         => $request->phone,
            'password'      => Hash::make($request->password),
            'is_approved'   => true,
            'joining_date'  => date('Y-m-d'),
            'joining_month' => date('F'),
            'joining_year'  => date('Y')
        ]);
        
        CustomerInfo::create([
            'user_id' => $vendor->id
        ]);

        VendorAccount::create([
            'vendor_id' => $vendor->id
        ]);

        $vendor->shop_info()->create([
            'name'         => $request->shop_name,
            'slug'         => rand(pow(10, 5-1), pow(10, 15)-1),
            'address'      => $request->address,
            'url'          => $request->url,
            'bank_account' => $request->bank_account ?? null,
            'bank_name'    => $request->bank_name ?? null,
            'holder_name'  => $request->holder_name ?? null,
            'branch_name'  => $request->branch_name ?? null,
            'routing'      => $request->routing ?? null,
            'description'  => $request->description,
            'commission'   => $request->commission,
            'gmail'=>$request->email,
            'profile'      => $profileName,
            'cover_photo'  => $coverName,
            'trade'  => $tradeName,
            'nid'  => $nidName
        ]);
        
        notify()->success("Vendor successfully added", "Added");
        return redirect()->to(routeHelper('vendor'));
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vendor = User::where('id', $id)->where('role_id', 2)->firstOrFail();
        return view('admin.e-commerce.vendor.show', compact('vendor'));
    }


    public function change_passIndex($id){
        $vendor = User::where('id', $id)->where('role_id', 2)->firstOrFail();
        return view('admin.e-commerce.vendor.change_passIndex', compact('vendor'));
    }
    public function change_pass(Request $request, $id)
    {
        $vendor = User::where('id', $id)->where('role_id', 2)->firstOrFail();
        $this->validate($request, [
            'password'     => 'required|string|min:8|confirmed',
        ]);

        

        $vendor->update([
            'password'      => Hash::make($request->password)
        ]);


        notify()->success("Password successfully updated", "Update");
        return redirect()->to(routeHelper('vendor'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vendor = User::where('id', $id)->where('role_id', 2)->firstOrFail();
        return view('admin.e-commerce.vendor.form', compact('vendor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $vendor = User::where('id', $id)->where('role_id', 2)->firstOrFail();
        $this->validate($request, [
            'name'         => 'required|string|max:50',
            'username'     => 'required|string|max:25|unique:users,username,'.$vendor->id,
            'email'        => 'required|string|max:255',
            'phone'        => 'required|string|max:30',
            'shop_name'    => 'required|string|max:255',
            'url'          => 'required|string|max:255',
            'bank_account' => 'required|string|max:255',
            'bank_name'    => 'required|string|max:255',
            'holder_name'  => 'required|string|max:255',
            'branch_name'  => 'required|string|max:255',
            'routing'      => 'required|string|max:255',
            'address'      => 'required|string|max:255',
            'description'  => 'required|string',
            'commission'   => 'nullable|numeric',
            'profile'      => 'nullable|image|max:1024|mimes:jpg,jpeg,bmp,png',
            'cover_photo'  => 'nullable|image|max:1024|mimes:jpg,jpeg,bmp,png',
            'trade'  => 'required|image|max:1024|mimes:jpg,jpeg,bmp,png',
            'nid'  => 'required|image|max:1024|mimes:jpg,jpeg,bmp,png'
        ]);

        $profile = $request->file('profile');
        $cover   = $request->file('cover_photo');
        $trade   = $request->file('trade');
        $nid   = $request->file('nid');
        if ($profile) {
            $currentDate = Carbon::now()->toDateString();
            $profileName = $currentDate.'-'.uniqid().'.'.$profile->getClientOriginalExtension();
            
            if (file_exists('uploads/shop/profile/'.$vendor->shop_info->profile)) {
                unlink('uploads/shop/profile/'.$vendor->shop_info->profile);
            }

            if (!file_exists('uploads/shop/profile')) {
                mkdir('uploads/shop/profile', 0777, true);
            }
            $profile->move(public_path('uploads/shop/profile'), $profileName);
        } 
        else {
            $profileName = $vendor->shop_info->profile;
        }
        if ($cover) {
            $currentDate = Carbon::now()->toDateString();
            $coverName   = $currentDate.'-'.uniqid().'.'.$cover->getClientOriginalExtension();
            
            if (file_exists('uploads/shop/cover/'.$vendor->shop_info->cover_photo)) {
                unlink('uploads/shop/cover/'.$vendor->shop_info->cover_photo);
            }

            if (!file_exists('uploads/shop/cover')) {
                mkdir('uploads/shop/cover', 0777, true);
            }
            $cover->move(public_path('uploads/shop/cover'), $coverName);
        }
        else {
            $coverName = $vendor->shop_info->cover_photo;
        }

        if ($trade) {
            $currentDate = Carbon::now()->toDateString();
            $tradeName   = $currentDate.'-'.uniqid().'.'.$trade->getClientOriginalExtension();
            
            if (file_exists('uploads/shop/trade/'.$vendor->shop_info->trade)) {
                unlink('uploads/shop/trade/'.$vendor->shop_info->trade);
            }

            if (!file_exists('uploads/shop/trade')) {
                mkdir('uploads/shop/trade', 0777, true);
            }
            $trade->move(public_path('uploads/shop/trade'), $tradeName);
        }
        else {
            $tradeName = $vendor->shop_info->trade;
        }
         if ($nid) {
            $currentDate = Carbon::now()->toDateString();
            $nidName   = $currentDate.'-'.uniqid().'.'.$nid->getClientOriginalExtension();
            
            if (file_exists('uploads/shop/nid/'.$vendor->shop_info->nid)) {
                unlink('uploads/shop/nid/'.$vendor->shop_info->nid);
            }

            if (!file_exists('uploads/shop/nid')) {
                mkdir('uploads/shop/nid', 0777, true);
            }
            $nid->move(public_path('uploads/shop/nid'), $nidName);
        }
        else {
            $nidName = $vendor->shop_info->nid;
        }

        $vendor->update([
            'name'     => $request->name,
            'username' => $request->username,
            'email'    => $request->email,
            'phone'    => $request->phone
        ]);

        $vendor->shop_info()->update([
            'name'         => $request->shop_name,
            'address'      => $request->address,
            'url'          => $request->url,
            'bank_account' => $request->bank_account,
            'bank_name'    => $request->bank_name,
            'holder_name'  => $request->holder_name,
            'branch_name'  => $request->branch_name,
            'routing'      => $request->routing,
            'description'  => $request->description,
            'commission'   => $request->commission,
            'profile'      => $profileName,
            'cover_photo'  => $coverName,
            'nid'  => $nidName,
            'trade'  => $tradeName
        ]);
        
        notify()->success("Vendor successfully updated", "Update");
        return redirect()->to(routeHelper('vendor'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vendor = User::where('id', $id)->where('role_id', 2)->firstOrFail();
        
        if (file_exists('uploads/shop/profile/'.$vendor->shop_info->profile)) {
            unlink('uploads/shop/profile/'.$vendor->shop_info->profile);
        }
        if (file_exists('uploads/shop/cover/'.$vendor->shop_info->cover_photo)) {
            unlink('uploads/shop/cover/'.$vendor->shop_info->cover_photo);
        }
        
        VendorAccount::where('vendor_id',$id)->delete();
        CustomerInfo::where('user_id',$id)->delete();
        
        $vendor->shop_info()->delete();
        $vendor->delete();
        notify()->success("Vendor successfully deleted", "Delete");
        return back();
    }
    public function Vproduct($id){
        $products=Product::where('user_id',$id)->with('brand')->latest('id')->paginate(10);
        return view('admin.e-commerce.product.index', compact('products'));
    }
}