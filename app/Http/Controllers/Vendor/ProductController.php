<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\DownloadProduct;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\SubCategory;
use App\Models\ExtraMiniCategory As  extracategory;
use App\Models\Attribute;
use App\Models\AttributeValue;
use Carbon\Carbon;
use App\Models\miniCategory;
use Illuminate\Http\Request;
use App\Models\DeviceId;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Image;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('brand')->where('user_id', auth()->id())->latest('id')->get();
        return view('vendor.product.index', compact('products'));
    }
    public function lowProduct(){
         $products=\App\Models\Product::where('quantity','<','6')->where('user_id',auth()->id())->get();
          return view('vendor.product.index', compact('products'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type='normal';
        $categories = DB::table('categories')->latest('id')->where('status',1)->get(['id', 'name']);
        $colors     = DB::table('colors')->latest('id')->where('status',1)->get(['id', 'name','slug','code']);
        $attributes = Attribute::all();
        $sizes      = DB::table('sizes')->latest('id')->where('status',1)->get(['id', 'name']);
        $tags       = DB::table('tags')->latest('id')->where('status',1)->get(['id', 'name']);
        $brands     = DB::table('brands')->latest('id')->where('status',1)->get(['id', 'name']);
        return view('vendor.product.form',  compact('categories', 'colors', 'sizes', 'tags', 'brands','type','attributes'));;
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
            'title'             => 'required|string|max:255',
            'short_description' => 'required|string',
            'full_description'  => 'required|string',
            'buying_price'     => 'required|numeric',
            'regular_price'     => 'required|numeric',
            'whole_price'     => 'nullable|numeric',
            'discount_price'    => 'nullable|numeric',
            'dis_type'    => 'required',
            'point'    => 'nullable',
            'quantity'          => 'required|integer',
            'categories'        => 'required|array',
            'categories.*'      => 'integer',
            'sub_categories.'  => 'integer',
            'extra_categories.'  => 'integer',
            'mini_categories.'  => 'integer',
            'brand'             => 'required|integer',
            'sizes'             => 'array',
            'sizes.*'           => 'integer',
            'tags'              => 'array',
            'tags.*'            => 'integer',
            'colors'            => 'array',
            'image'             => 'required|image|mimes:jpg,jpeg,png,bmp,jfif',
            'shipping_charge'   => 'required|boolean',
            'images'            => 'nullable|array',
            'images.*'          => 'image|mimes:jpg,jpeg,png,bmp,jfif',
            'file_name'         => 'nullable',
            'file_name.*'       => 'nullable|string|max:255',
            'file_url'          => 'nullable',
            'file_url.*'        => 'nullable',
            'download_limit'    => 'nullable|integer',
            'download_expire'   => 'nullable|date'
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
            $width  = $imagesize[0] - (5/100 * $imagesize[0]);
            $height = $imagesize[1] - (5/100 * $imagesize[1]);
            $image  = Image::make($filepath);
            $image->save($filepath);
        }

        if ($request->filled('download_able')) {
            $download_limit  = $request->download_limit;
            $download_expire = $request->download_expire;
        }
         if($request->dis_type==2){
            $discount=($request->regular_price/100)*$request->discount_price;
            $discount_price=$request->regular_price-$discount;
        }elseif($request->discount_price>0){
            $discount_price=$request->regular_price-$request->discount_price;
        }else{
            $discount_price=$request->discount_price;
        }
    if($request->discount_price>0){
            $point=setting('Default_Point')*$discount_price;
        }else{
             $point=setting('Default_Point')*$request->regular_price;
        }
         if($discount_price<0){
            $discount_price='Null';
        }
        $product = Product::create([
            'user_id'           => auth()->id(),
            'brand_id'          => $request->brand,
            'slug'              => rand(pow(10, 5-1), pow(10, 15)-1),
            'title'             => $request->title,
            'short_description' => $request->short_description,
            'full_description'  => $request->full_description,
            'buying_price'     => $request->buying_price,
            'regular_price'     => $request->regular_price,
            'discount_price'    => $discount_price,
            'whole_price'     => $request->whole_price,
            'dis_type'    => $request->dis_type,
            'point'    => $point,
            'quantity'          => $request->quantity,
            'image'             => $imageName,
            'status'            => $request->filled('status'),
            'type'            => 0,
            'shipping_charge'   => $request->shipping_charge,
            'download_able'     => $request->filled('download_able'),
            'download_limit'    => $download_limit ?? NULL,
            'download_expire'   => $download_expire ?? NULL,
            'status'=>'0',
            'is_aproved'=>'0',
        ]);

       $product->categories()->sync($request->categories, []);
               if(!empty( $request->get('sub_categories'))){
            foreach($request->sub_categories as $catid){
                if($catid!=null){
                DB::table('product_sub_category')->insert(
                    array(
                            'sub_category_id'     =>   $catid, 
                             'product_id'     =>   $product->id, 
                    )
                );}
            }
        }
        if(!empty( $request->get('mini_categories'))){
            foreach($request->mini_categories as $catid){
                 if($catid!=null){
                DB::table('mini_category_product')->insert(
                    array(
                            'mini_category_id'     =>   $catid, 
                             'product_id'     =>   $product->id, 
                    )
                );}
            }
        }
        
        if(!empty( $request->get('extra_categories'))){
           foreach($request->extra_categories as $catid){
                if($catid!=null){
                DB::table('extra_mini_category_product')->insert(
                    array(
                            'extra_mini_category_id'     =>   $catid, 
                             'product_id'     =>   $product->id, 
                    )
                );}
            }
        }
        $product->tags()->sync($request->tags, []);
        $product->sizes()->sync($request->sizes, []);
        $i=0;
          if(!empty( $request->get('colors'))){
        foreach($request->colors as $colors){
            DB::table('color_product')->insert([
                'color_id'=>$colors,
                'product_id'=>$product->id,
                'qnty'=>$request->color_quantits[$i],
                'price'=>$request->color_prices[$i],
            ]);
            $i++;
        }}
         $a=0;
          if(!empty( $request->get('attributes'))){
        foreach($request->get('attributes') as $attribute){
            echo $attribute;
            DB::table('attribute_product')->insert([
                'attribute_value_id'=>$attribute,
                'product_id'=>$product->id,
                'qnty'=>$request->attributes_quantits[$a],
                'price'=>$request->attribute_prices[$a],
            ]);
            $a++;
        }}
        
        // store product image in storage and database
        $images = $request->file('images');
        foreach ($images as $gallery) {
            $currentDate      = Carbon::now()->toDateString();
            $galleryImageName = $currentDate.'-'.uniqid().'.'.$gallery->getClientOriginalExtension();
            
            if (!file_exists('uploads/product')) {
                mkdir('uploads/product', 0777, true);
            }
          
            $filepath = $gallery->move(public_path('uploads/product'), $galleryImageName);
            $imagesize   = getimagesize($filepath);
            $width  = $imagesize[0] - (5/100 * $imagesize[0]);
            $height = $imagesize[1] - (5/100 * $imagesize[1]);
            $image  = Image::make($filepath)->resize((int)$width, (int)$height);
            $image->save($filepath, 99);

            // save product database
            $product->images()->create([
                'name' => $galleryImageName
            ]);
        }

        if ($request->filled('download_able')) {
            // store product image in storage and database
            $files = $request->file('files');
            
            if (isset($files)) {

                foreach ($files as $key => $file) {

                    $currentDate = Carbon::now()->toDateString();
                    $fileName    = $currentDate.'-'.uniqid().'.'.$file->getClientOriginalExtension();
                    
                    if (!file_exists('uploads/product/download')) {
                        mkdir('uploads/product/download', 0777, true);
                    }
                    $file->move(public_path('uploads/product/download'), $fileName);
                    
                    $product->downloads()->create([
                        'name' => $request->file_name[$key],
                        'file' => $fileName
                    ]);
                }
            } 
            foreach ($request->file_url as $index => $file_url) {
                
                if ($file_url != '') {
                    $product->downloads()->create([
                        'name' => $request->file_name[$index],
                        'url'  => $file_url
                    ]);
                }
            }
        }
        $this->sendNotification('Upload');
        notify()->success("Product successfully added", "Added");
        return redirect()->to(routeHelper('product'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        $colors_product = DB::table('color_product')
                    ->select('*')
                    ->join('colors', 'colors.id', '=', 'color_product.color_id')
                    ->where('color_product.product_id', $product->id)
                    ->get();
           $attributes = Attribute::all();
        return view('vendor.product.show', compact('product','colors_product','attributes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          $product = Product::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
       $categories = DB::table('categories')->latest('id')->where('status',1)->get(['id', 'name']);
        $colors     = DB::table('colors')->latest('id')->where('status',1)->get();
        $sizes      = DB::table('sizes')->latest('id')->where('status',1)->get(['id', 'name']);
        $tags       = DB::table('tags')->latest('id')->where('status',1)->get(['id', 'name']);
        $attributes = Attribute::all();
        $colors_product = DB::table('color_product')
                    ->select('*')
                    ->join('colors', 'colors.id', '=', 'color_product.color_id')
                    ->where('color_product.product_id', $product->id)
                    ->get();
        

        $brands     = DB::table('brands')->latest('id')->get(['id', 'name']);
        return view('vendor.product.form', compact(
             'colors_product',
            'categories',
            'attributes',
            'colors',
            'sizes',
            'tags',
            'brands',
            'brands',
            'product'
        ));
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
        $product = Product::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
       $this->validate($request, [
            'sku'               => $request->sku,
            'title'             => 'required|string|max:255',
            'short_description' => 'required|string',
            'full_description'  => 'required|string',
            'regular_price'     => 'required|numeric',
               'whole_price'     => 'nullable|numeric',
            'discount_price'    => 'nullable|numeric',
            'point'    => 'nullable',
            'quantity'          => 'required|integer',
            'categories'        => 'required|array',
            'categories.*'      => 'required|integer',
              'extra_categories.'  => 'integer',
            'brand'             => 'integer',
            'sizes'             => 'array',
            'sizes.*'           => 'integer',
            'tags'              => 'array',
            'tags.*'            => 'integer',
            'colors'            => 'array',
            'colors.*'          => 'integer',
            'image'             => 'nullable|image|mimes:jpg,jpeg,png,bmp,jfif',
            'shipping_charge'   => 'required|boolean',
            'file_name'         => 'nullable',
            'file_name.*'       => 'nullable|string|max:255',
            'file_url'          => 'nullable',
            'file_url.*'        => 'nullable',
            'download_limit'    => 'nullable|integer',
            'download_expire'   => 'nullable|date'
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
            $width  = $imagesize[0] - (5/100 * $imagesize[0]);
            $height = $imagesize[1] - (5/100 * $imagesize[1]);
            $image  = Image::make($filepath);
            $image->save($filepath);
        }
        else {
            $imageName = $product->image;
        }

        if ($request->filled('download_able')) {
            $download_limit  = $request->download_limit;
            $download_expire = $request->download_expire;
        }
        if($request->dis_type==2){
            $discount=($request->regular_price/100)*$request->discount_price;
            $discount_price=$request->regular_price-$discount;
        }elseif($request->discount_price>0){
            $discount_price=$request->regular_price-$request->discount_price;
        }else{
            $discount_price=$request->discount_price;
        }
         if($discount_price<0){
            $discount_price='Null';
        }
        $product->update([
            'brand_id'          => $request->brand,
            'title'             => $request->title,
            'short_description' => $request->short_description,
            'full_description'  => $request->full_description,
            'buying_price'     => $request->buying_price,
            'regular_price'     => $request->regular_price,
            'discount_price'    => $discount_price,
            'whole_price'     => $request->whole_price,
            'dis_type'    => $request->dis_type,
            'quantity'          => $request->quantity,
            'image'             => $imageName,
            'status'            => $request->filled('status'),
            'shipping_charge'   => $request->shipping_charge,
            'download_able'     => $request->filled('download_able'),
            'download_limit'    => $download_limit ?? NULL,
            'download_expire'   => $download_expire ?? NULL,
            'status'=>'0',
            'is_aproved'=>'0',
        ]);

      $product->categories()->sync($request->categories);
                if(!empty( $request->get('sub_categories'))){
            $product->sub_categories()->sync($request->sub_categories);
        }
      if(!empty( $request->get('mini_categories'))){
            $product->mini_categories()->sync($request->mini_categories);
        }
      if(!empty( $request->get('extra_categories'))){
            $product->extra_categories()->sync($request->extra_categories);
        }
        $product->tags()->sync($request->tags);
        $product->sizes()->sync($request->sizes);
       $i=0;
        if(!empty( $request->get('colors'))){
        foreach($request->colors as $colors){
            $hasc=DB::table('color_product')->where('color_id',$colors)->where('product_id',$product->id)->first();
              if($hasc){
                    DB::table('color_product')
                    ->where('id',$hasc->id)
                    ->Update([
                       'color_id'=>$colors,
                       'product_id'=>$product->id,
                       'qnty'=>$request->color_quantits[$i],
                       'price'=>$request->color_prices[$i],
                    ]);
              }else{
                    DB::table('color_product')->Insert([
                        'color_id'=>$colors,
                        'product_id'=>$product->id,
                        'qnty'=>$request->color_quantits[$i],
                        'price'=>$request->color_prices[$i],
                    ]);
              }
        
            $i++;
        }}
         $a=0;
          if(!empty( $request->get('attributes'))){
        foreach($request->get('attributes') as $attribute){
            $has=DB::table('attribute_product')->where('attribute_value_id',$attribute)->where('product_id',$product->id)->first();
            if($has){
                DB::table('attribute_product')
                ->where('id',$has->id)
                ->update([
                'attribute_value_id'=>$attribute,
                'product_id'=>$product->id,
                'qnty'=>$request->attribute_prices[$a],
                'price'=>$request->attributes_quantits[$a],
                ]);
            }else{
                DB::table('attribute_product')->Insert([
                    'attribute_value_id'=>$attribute,
                    'product_id'=>$product->id,
                    'qnty'=>$request->attribute_prices[$a],
                    'price'=>$request->attributes_quantits[$a],
                ]);
            }
            $a++;
        }}
        
        
        if ($request->filled('download_able')) {
            // store product image in storage and database
            $files = $request->file('files');
            
            if (isset($files)) {

                foreach ($files as $key => $file) {

                    $currentDate = Carbon::now()->toDateString();
                    $fileName    = $currentDate.'-'.uniqid().'.'.$file->getClientOriginalExtension();
                    
                    if (!file_exists('uploads/product/download')) {
                        mkdir('uploads/product/download', 0777, true);
                    }
                    $file->move(public_path('uploads/product/download'), $fileName);
                    
                    $product->downloads()->create([
                        'name' => $request->file_name[$key],
                        'url'  => NULL,
                        'file' => $fileName
                    ]);
                }
            }
            if (isset($request->file_url)) {
                foreach ($request->file_url as $index => $file_url) {
                
                    if ($file_url != '') {
                        $product->downloads()->create([
                            'name' => $request->file_name[$index],
                            'url'  => $file_url,
                            'file' => NULL
                        ]);
                    }
                }
            } 
            
        }
        else {
            if ($product->downloads) {
                foreach ($product->downloads as $download) {
                    if ($download->file != NULL) {
                        if (file_exists('uploads/product/download/'.$download->file)) {
                            unlink('uploads/product/download/'.$download->file);
                        }
                    }
                    $download->delete();
                }
            }
        }
        $this->sendNotification('Update');
        notify()->success("Product successfully update", "Update");
        return redirect()->to(routeHelper('product'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        if (file_exists('uploads/product/'.$product->image)) {
            unlink('uploads/product/'.$product->image);
        }
        foreach ($product->images as $image) 
        {
            if (file_exists('uploads/product/'.$image->name)) {
                unlink('uploads/product/'.$image->name);
            }
            $image->delete();
        }
        foreach ($product->downloads as $download) 
        {
            if ($download->file != NULL) {
                if (file_exists('uploads/product/download/'.$download->file)) {
                    unlink('uploads/product/download/'.$download->file);
                }
            }
            $download->delete();
        }

        $product->delete();
        notify()->success("Product successfully deleted", "Delete");
        return back();
    }

    
    // get product images
    public function getProductImage($id)
    {
        $product = ProductImage::where('product_id', $id)->get();
        return response()->json($product);
    }

    // update product image
    public function updateImage(Request $request)
    {
        $this->validate($request, [
            'photos'   => 'nullable|array',
            'photos.*' => 'image|mimes:jpg,jpeg,png,bmp,jfif|max:1024'
        ]);
        $ids = [];
        foreach($request->old as $old)
        {
            $ids[] = $old;
            if ($old == 0) {
               break;
            }
        }
        $images = ProductImage::whereNotIn('id', $ids)->where('product_id', $request->id)->get();

        foreach ($images as $image) 
        {
            if (file_exists('uploads/product/'.$image->name)) {
                unlink('uploads/product/'.$image->name);
            }
            $image->delete();
        }

        $photos = $request->file('photos');
        if (isset($photos)) {
            foreach ($photos as $gallery) {
                $currentDate      = Carbon::now()->toDateString();
                $galleryImageName = $currentDate.'-'.uniqid().'.'.$gallery->getClientOriginalExtension();
                
                if (!file_exists('uploads/product')) {
                    mkdir('uploads/product', 0777, true);
                }
              $filepath = $gallery->move(public_path('uploads/product'), $galleryImageName);
            $imagesize   = getimagesize($filepath);
            $width  = $imagesize[0] - (5/100 * $imagesize[0]);
            $height = $imagesize[1] - (5/100 * $imagesize[1]);
            $image  = Image::make($filepath)->resize((int)$width, (int)$height);
            $image->save($filepath, 99);
    
                // save product database
                ProductImage::create([
                    'product_id' => $request->id,
                    'name'       => $galleryImageName
                ]);
            }
        }
        notify()->success("Product image successfully updated", "Updated");
        return back();
    }

    // update product status
    public function status($id)
    {
        $product = Product::where('id', $id)->where('user_id', auth()->id())->firstOrFail();

        if ($product->status) {
            $product->update([
                'status' => false
            ]);
        } 
        else {
            $product->update([
                'status' => true
            ]);
        }
        notify()->success("Product status successfully updated", "Update");
        return back();
    }

    // get active product
    public function activeProduct()
    {
        $products = Product::with('brand')->where('user_id', auth()->id())->where('status', true)->latest('id')->get();
        return view('vendor.product.active', compact('products'));
    }

    // get disable product
    public function disableProduct()
    {
        $products = Product::with('brand')->where('user_id', auth()->id())->where('status', false)->latest('id')->get();
        return view('vendor.product.disable', compact('products'));
    }

    // get sub category by category
    public function subCategory(Request $request)
    {
        $data = SubCategory::whereIn('category_id', $request->ids)->get(['id', 'name']);
        return response()->json($data);
    }
 // get sub category by category
    public function extraCategory(Request $request)
    {
        $data = extraCategory::whereIn('mini_category_id', $request->ids)->get(['id', 'name']);
        return response()->json($data);
    }
     // get sub category by category
    public function miniCategory(Request $request)
    {
        $data = miniCategory::whereIn('category_id', $request->ids)->get(['id', 'name']);
        return response()->json($data);
    }
    // delete download product file
    public function deleteDownloadFile($id)
    {
        $download = DownloadProduct::findOrFail($id);
        
        if ($download->file != NULL) {
            if (file_exists('uploads/product/download/'.$download->file)) {
                unlink('uploads/product/download/'.$download->file);
            }
        }
        
        $download->delete();
        return response()->json(['Success', 'Delete Successful']);
    }

    // update product downloadable file
    public function updateDownloadFile(Request $request) 
    {
        $this->validate($request, [
            'product_id'      => 'required|integer',
            'file_name'       => 'required|array',
            'file_name.*'     => 'string|max:255',
            'file_url'        => 'nullable|array',
            'files'           => 'nullable|array',
            'files.*'         => 'file',
            'ids'             => 'required|array',
            'ids.*'           => 'integer',
            'download_limit'  => 'required|integer',
            'download_expire' => 'required|date'
        ]);

        $product = Product::where('id', $request->product_id)->where('user_id', auth()->id())->first();
        
        $product->update([
            'download_able'   => true,
            'download_limit'  => $request->download_limit,
            'download_expire' => $request->download_expire,
        ]);
        
        $files = $request->file('files');
        if (isset($files)) {

            foreach ($files as $key => $file) {
                
                $currentDate = Carbon::now()->toDateString();
                $fileName    = $currentDate.'-'.uniqid().'.'.$file->getClientOriginalExtension();
                
                $download = DownloadProduct::find($request->ids[$key]);
                if ($download) {
                    
                    if($download->file != NULL) {
                        if (file_exists('uploads/product/download/'.$download->file)) {
                            unlink('uploads/product/download/'.$download->file);
                        }
                    }
                    
                    if (!file_exists('uploads/product/download')) {
                        mkdir('uploads/product/download', 0777, true);
                    }
                    $file->move(public_path('uploads/product/download'), $fileName);
                    
                    $download->update([
                        'name' => $request->file_name[$key],
                        'url'  => NULL,
                        'file' => $fileName
                    ]);
                }
                else {
                    if (!file_exists('uploads/product/download')) {
                        mkdir('uploads/product/download', 0777, true);
                    }
                    $file->move(public_path('uploads/product/download'), $fileName);
                    
                    DownloadProduct::create([
                        'product_id' => $request->product_id,
                        'name'       => $request->file_name[$key],
                        'url'        => NULL,
                        'file'       => $fileName
                    ]);
                }
            }
        } 
        foreach ($request->ids as $index => $id) {
            
            $download = DownloadProduct::find($id);
            if ($download) {
                if ($request->file_url[$index] != '') {
                    $download->update([
                        'name' => $request->file_name[$index],
                        'url'  => $request->file_url[$index],
                        'file' => NULL,
                    ]);
                }
            } 
            else {
                if ($request->file_url[$index] != '') {
                    DownloadProduct::create([
                        'product_id' => $request->product_id,
                        'name'       => $request->file_name[$index],
                        'url'        => $request->file_url[$index],
                        'file'       => NULL,
                    ]);
                }
            }
        }

        notify()->success("Product downloadable file successfully updated", "Update");
        return back();
    }
     public function sendNotification($status)
    {
        $firebaseToken = DeviceId::where('user_id','1')->pluck('device_id')->all();
        
        $SERVER_API_KEY = 'AAAA9Ek9F7U:APA91bEtCumEi8v_NmoBW6rQbm48iVNB4ctTguXS5G33Mj1FEmX48zlNYEHLWO3d6WfLkPD3ByKZQPrlJVl0swAd1ZxFWPMHWOdPWXD30sGCOvu_xIV7nTW9PC6cGiL6n3FOBHl1bavE';
        $data = [
            "registration_ids" => $firebaseToken,
            "notification" => [
                "title" => 'New Product Demo.com.bd',
                "body" => 'Vendor'.$status.'an product',
                "content_available" => true,
                "priority" => "high",
            ]
        ];
        $dataString = json_encode($data);

        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

        $response = curl_exec($ch);

        curl_close ($ch);
    }
}