<?php

namespace App\Http\Controllers\Admin\Ecommerce;

use App\Http\Controllers\Controller;
use App\Models\CustomerInfo;
use App\Models\User;
use App\Models\ticket;
use App\Models\Order;
use App\Models\PartialPayment;
use App\Models\Contact;
use App\Models\Review;
use App\Models\CartInfo;
use App\Models\Comment;
use App\Models\CampaingComment;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = User::where('role_id', 3)->latest('id')->get();
        return view('admin.e-commerce.customer.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.e-commerce.customer.form');
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
            'name'      => 'required|string|max:50',
            'username'  => 'required|string|max:25|unique:users,username',
            'email'     => 'required|string|max:255',
            'phone'     => 'required|string|max:30',
            'country'   => 'required|string|max:255',
            'city'      => 'required|string|max:255',
            'street'    => 'required|string|max:255',
            'post_code' => 'required|string|max:255',
            'password'  => 'required|string|min:8|confirmed',
        ]);

        $customer = User::create([
            'role_id'       => 3,
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

        $customer->customer_info()->updateOrCreate([
            'country'   => $request->country,
            'city'      => $request->city,
            'street'    => $request->street,
            'post_code' => $request->post_code
        ]);
        notify()->success("Customer successfully added", "Added");
        return redirect()->to(routeHelper('customer'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = User::findOrFail($id);
        return view('admin.e-commerce.customer.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = User::findOrFail($id);
        return view('admin.e-commerce.customer.form', compact('customer'));
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
        $customer = User::findOrFail($id);

        $this->validate($request, [
            'name'      => 'required|string|max:50',
            'username'  => 'required|string|max:25|unique:users,username,'.$customer->id,
            'email'     => 'required|string|max:255',
            'phone'     => 'required|string|max:30',
          
        ]);

        $customer->update([
            'name'          => $request->name,
            'username'      => $request->username,
            'email'         => $request->email,
            'phone'         => $request->phone
        ]);

        $customer->customer_info()->update([
            'country'   => $request->country,
            'city'      => $request->city,
            'street'    => $request->street,
            'post_code' => $request->post_code
        ]);

        notify()->success("Customer successfully updated", "Update");
        return redirect()->to(routeHelper('customer'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = User::findOrFail($id);
        if (file_exists('uploads/admin/'.$customer->avatar)) {
            unlink('uploads/admin/'.$customer->avatar);
        }
       
        $order=Order::where('user_id',$id)->get();
        if(!empty($order)){
            foreach($order as $or){
                PartialPayment::where('order_id',$or->id)->delete();
                 Order::where('id',$or->id)->delete();
            }
         
        }
        Review::where('user_id',$id)->delete();
        CartInfo::where('user_id',$id)->delete();
        Comment::where('user_id',$id)->delete();
        Blog::where('user_id',$id)->delete();
        CampaingComment::where('user_id',$id)->delete();
        ticket::where('user_id',$id)->delete();

        $customer->delete();
        notify()->success("Customer successfully deleted", "Delete");
        return back();
    }
      // update product status
    public function status($id)
    {
        $product = User::findOrFail($id);
        if($product->is_approved==0){
            $product->update([
               
                'is_approved' => '1',
            ]);
        }
        else {
             $product->update([
               
                'is_approved' => '0',
            ]);
        }
       notify()->success("User status successfully updated", "Update");
        return back();
    }
}