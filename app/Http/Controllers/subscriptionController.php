<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\subscription;

class subscriptionController extends Controller
{
    public function store(Request $request)
    {
    	 $this->validate($request, [
            'subscription'    => 'required|string|email|max:255',
        ]);
        subscription::create([
            'email' => $request->subscription
        ]);
       return response()->json([
            'alert'    => 'Congratulations',
            'message'  => 'Subscription success',
        ]);

    }
    public function show(){
    	$subscribes=subscription::all();
    	 return view('admin..e-commerce.customer.subscribe',['subscribes'=>$subscribes]);
    }
}
