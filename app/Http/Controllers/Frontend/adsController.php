<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Unproduct;
use Carbon\Carbon;
use Image;
use View;
class adsController extends Controller
{
    public function index(){
        return view('frontend.ads.index');
    }
     public function list(){
        $products=Unproduct::where('user_id',auth()->id())->get();
        return view('frontend.ads.list',compact('products'));
    }
    public function delete($id){
        Unproduct::find($id)->delete();
         notify()->success("Successfully Deleted", "Added");
        return redirect()->back();
    }
    public function edit($id){
        $product=Unproduct::find($id);
        return view('frontend.ads.index',compact('product'));
    }
 public function store(Request $request)
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
            'status'            => '0',
        ]);
       
        notify()->success("Successfully added", "Added");
        return redirect()->back();
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
            
            if (file_exists('uploads/product/'.$product->image)) {
                unlink('uploads/product/'.$product->image);
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
            'status'            => '0',
        ]);
        notify()->success("Successfully Updated", "Added");
        return redirect()->back();
    }
    public function all(Request $request){
        $i=1;
        if ($request->ajax()) {
            $skip=$request->skip;
        }else{
            $skip=0;
        }
        $products =  Unproduct::where('status','12')
        ->skip($skip)->orderBy('id', 'desc')
        ->take(1)->get();


        
        $data = '';
        $data2 = '';
        if ($request->ajax()) {
            if($products->count() > 0){
            foreach ($products as $product) {
                $data .= View::make("components.unproduct-grid-view")
                ->with("product", $product)
                ->render();
              
            }}
            return json_encode(array($data));;
        }
        return view('frontend.unproduct', compact('products')); 
    }
    public function show($slug){
        $product=Unproduct::where('slug',$slug)->first();
        return view('frontend.single-unproduct', compact('product')); 

    }
}
