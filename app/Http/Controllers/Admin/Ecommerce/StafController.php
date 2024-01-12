<?php

namespace App\Http\Controllers\Admin\Ecommerce;


use App\Http\Controllers\Controller;
use App\Models\CustomerInfo;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class StafController extends Controller
{
      public function stafflist()
    {
        $customers = User::where('role_id', 1)->latest('id')->get();
        return view('admin.e-commerce.staff.index', compact('customers'));
    }
    public function create(){
        return view('admin.e-commerce.staff.form');
    }
      public function staffEdit($id){
        $customer=User::find($id);
        return view('admin.e-commerce.staff.edit',compact('customer'));
    }
    public function store(Request $request){
        $this->validate($request, [
            'name'      => 'required|string|max:50',
            'username'  => 'required|string|max:25|unique:users,username',
            'email'     => 'required|string|max:255',
            'password'  => 'required|string|min:8|confirmed',
        ]);
         $avatar = $request->file('profile');
        if ($avatar) {
            $currentDate = Carbon::now()->toDateString();
            $imageName = $currentDate.'-'.uniqid().'.'.$avatar->getClientOriginalExtension();
            if (!file_exists('uploads/admin')) {
                mkdir('uploads/admin', 0777, true);
            }
            $avatar->move(public_path('uploads/admin'), $imageName);
        } 
        $customer = User::create([
            'role_id'       => 1,
            'name'          => $request->name,
            'username'      => $request->username,
            'email'         => $request->email,
            'phone'         => $request->phone,
            'password'      => Hash::make($request->password),
            'is_approved'   => true,
            'avatar'   => $imageName,
            'desig'   => $request->position,
            'joining_date'  => date('Y-m-d'),
            'joining_month' => date('F'),
            'joining_year'  => date('Y')
        ]);
        CustomerInfo::create([
                'user_id' => $customer->id
            ]);
         notify()->success("Account Create Success", "Success");
            return back();
    }
}
