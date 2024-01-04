<?php

namespace App\Http\Controllers\Admin\Ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Unproduct;
use BD;
use Carbon\Carbon;
use Image;
class ClassicController extends Controller
{
   public function index(){
     $products = Unproduct::latest('id')->get();
        return view('admin.e-commerce.classic.index', compact('products'));

   }
    public function status($id)
    {
        $product = Unproduct::findOrFail($id);
        if($product->status==0){
            $product->update([
                'status' => true,
            ]);
        }
        else {
            $product->update([
                'status' => '0'
            ]);
        }
        notify()->success("Product status successfully updated", "Update");
        return back();
    }
    public function delete($id){
         Unproduct::findOrFail($id)->delete();
        notify()->success("successfully deleted", "Delete");
        return back();
    }
    public function form(){
          return view('admin.e-commerce.classic.form');
    }
     public function storeC(Request $request)
    {
        $this->validate($request, [
            'title'             => 'required|string|max:255',
            'location'             => 'required|string',
            'contact'             => 'required|string',
            'price'             => 'required',
            'description'  => 'required|string',
            'image'             => 'required',
            'images'            => 'nullable|array',
            'images.*'          => 'image',
        ]);

        $image = $request->file('image');
        if ($image) {
            $currentDate = Carbon::now()->toDateString();
            $imageName   = $currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            

            if (!file_exists('uploads/product')) {
                mkdir('uploads/product', 0777, true);
            }
            $filepath = $image->move(public_path('uploads/product'), $imageName);
            $imagesize   = getimagesize($filepath);
            $width  = $imagesize[0] - (70/100 * $imagesize[0]);
            $height = $imagesize[1] - (70/100 * $imagesize[1]);
            $image  = Image::make($filepath)->resize((int)$width, (int)$height);
            $image->save($filepath, 70);
        }

        $product = Unproduct::create([
            'user_id'           => auth()->id(),
            'title'             => $request->title,
            'slug'              => rand(pow(10, 5-1), pow(10, 15)-1),
            'price'  => $request->price,
            'contact'  => $request->contact,
            'location'  => $request->location,
            'description'  => $request->description,
            'thumbnail'             => $imageName,
            'status'            => '1',
        ]);
       
        notify()->success("Successfully added", "Added");
        return redirect()->back();
    }
    public function editC($id){
        $product=  Unproduct::findOrFail($id);
       return view('admin.e-commerce.classic.form',compact('product'));
    }
     public function update(Request $request){
           $product=Unproduct::find($request->power);
        $this->validate($request, [
            'title'             => 'required|string|max:255',
            'location'             => 'required|string',
            'contact'             => 'required|string',
            'price'             => 'required',
            'description'  => 'required|string',
            'images'            => 'nullable|array',
            'images.*'          => 'image',
        ]);
          $image = $request->file('image');
        if ($image) {
            $currentDate = Carbon::now()->toDateString();
            $imageName   = $currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            
            if (file_exists('uploads/product/'.$product->thumbnail)) {
                unlink('uploads/product/'.$product->thumbnail);
            }
            if (!file_exists('uploads/product')) {
                mkdir('uploads/product', 0777, true);
            }
             $filepath = $image->move(public_path('uploads/product'), $imageName);
            $imagesize   = getimagesize($filepath);
            $width  = $imagesize[0] - (70/100 * $imagesize[0]);
            $height = $imagesize[1] - (70/100 * $imagesize[1]);
            $image  = Image::make($filepath)->resize((int)$width, (int)$height);
            $image->save($filepath, 70);
        }
        else {
            $imageName = $product->thumbnail;
        }
        $product->update([
            'user_id'           => auth()->id(),
            'title'             => $request->title,
            'slug'              => rand(pow(10, 5-1), pow(10, 15)-1),
            'price'  => $request->price,
            'contact'  => $request->contact,
            'location'  => $request->location,
            'description'  => $request->description,
            'thumbnail'             => $imageName,
            'status'            => '1',
        ]);
        notify()->success("Successfully Updated", "Added");
        return redirect()->back();
    }
}
