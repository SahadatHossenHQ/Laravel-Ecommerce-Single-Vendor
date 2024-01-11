<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Withdraw;
use App\Models\ShopInfo;
use Carbon\Carbon;
use App\Models\VendorAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class WithdrawController extends Controller
{
   public function withdraw(){
    return view('vendor.withdraw');
   }
   public function create(Request $request){

                                
        $vendor=VendorAccount::where('vendor_id',auth()->id())->first();
        $shopinfo=ShopInfo::where('user_id',auth()->id())->first();
        if($request->method==1){
                $method=$shopinfo->bkash;
        }elseif($request->method==2){
               $method=$shopinfo->nogod;
        }elseif($request->method==3){
                $method=$shopinfo->rocket;
        }else{
           $method=$shopinfo->bank_account;
        }
        if($vendor->amount< $request->amount){
            notify()->error("You haven't Enough Blance", "Wrong");
            return back();
        }elseif($method==''){
            notify()->error("Please First Setup Your Payment Details", "Wrong");
            return back();
        }else{
            $vendor->amount -=$request->amount;
            $vendor->update();
            Withdraw::create([
                'user_id'=>auth()->id(),
                'amount'=>$request->amount,
                'payment_method'=>$request->method,
            ]);
        }
          notify()->success("Withdraw Success Please Wait For Admin Review", "Success");
     return back();
   
   }
   public function userWithList(){


        $withdraws=Withdraw::where('user_id',auth()->id())->get();
        return view('vendor.withdraw-list',compact('withdraws'));
   }
   public function allwithlist(){
        $withdraws=Withdraw::get();
        return view('admin.e-commerce.vendor.withdraw',compact('withdraws'));
   }
    public function aprove($id){
        $withdraws=Withdraw::find($id);
        $withdraws->status='1';
        $withdraws->update();
       notify()->success("Withdraw Success", "Success");
     return back();
   
   }
    public function cancel($id){
        $withdraws=Withdraw::find($id);
        $withdraws->status='2';
        $withdraws->update();
        if($withdraws->number){
            $user=User::find($withdraws->user_id);
            $user->wallate +=$withdraws->amount;
            $user->save();
        }
       notify()->success("Withdraw Cencel", "Success");
     return back();
   
   }
   public function delete($id){
        $withdraws=Withdraw::find($id)->delete();
       notify()->error("Withdraw Deleted", "Warning");
     return back();
   
   }
}
