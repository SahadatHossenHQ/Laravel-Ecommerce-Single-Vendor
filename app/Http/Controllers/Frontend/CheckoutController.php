<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{    
    /**
     * go to checkout page
     *
     * @return void
     */
    public function checkout()
    {
        if (Auth::check()) {
            
            if (Auth::user()->role_id == 2 || Auth::user()->role_id == 3) {
                
                if (Cart::count() > 0) {
                    return view('frontend.checkout');
                }
                notify()->warning("You cart is empty.", "Empty");
                return back();
            } 
            else {
                
                notify()->warning("Your are not authorized this action.", "Wrong");
                return back();
            }

        }
        elseif(setting('GUEST_CHECKOUT') == 1 || setting('GUEST_CHECKOUT') == ""){
            
            if (Cart::count() > 0) {

                return view('frontend.checkout_guest');
            } else{

                notify()->warning("You cart is empty.", "Empty");
                return back();
            }
            
        }
        elseif(setting('GUEST_CHECKOUT') == 0){
            
            return redirect()->route('login');
        }
    }
}
