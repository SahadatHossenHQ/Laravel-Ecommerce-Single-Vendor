<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\wishlist;
use App\Models\Product;

class wishlistController extends Controller
{
    public function index(){
        $wishlist = wishlist::where('user_id', auth()->id())->latest('id')->get();

        return view('frontend.wishlist', compact('wishlist'));
    }
    public function store(Request $request){
        $p=Product::where('slug',$request->product_id)->first();
        $already=wishlist::where('user_id',auth()->id())->where('product_id',$p->id)->count();
        if($already==0){
            wishlist::create([
                'user_id' => auth()->id(),
                'product_id'=>$p->id,
            ]);
               notify()->success("Wishlist Added", "Success");
        return back(); 
            
        }else{
            return response()->json([
                'alert'   => 'Success',
                'message' => 'Already Added',
            ]);
        }
    }
    public function delete($id){
        $wish=wishlist::find($id)->delete();
          notify()->success("Successfully Remove An Wishlist Product", "Success");
        return back(); 

    }
}
