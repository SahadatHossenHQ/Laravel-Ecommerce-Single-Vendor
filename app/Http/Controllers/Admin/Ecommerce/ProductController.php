<?php

namespace App\Http\Controllers\Admin\Ecommerce;

use App\Http\Controllers\Controller;
use App\Models\DownloadProduct;
use App\Models\Product;
use App\Models\Comment;
use App\Models\Review;
use App\Models\Unproduct;
use App\Models\ProductImage;
use App\Models\SubCategory;
use App\Models\Category;
use App\Models\ExtraMiniCategory As  extracategory;
use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\miniCategory;
use App\Models\Campaign;
use App\Exports\ProductsExport;
use App\Imports\ProductsImport;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use Illuminate\Http\Request;
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
        $products = Product::with('brand')->latest('id')->get();
        return view('admin.e-commerce.product.index', compact('products'));
    }
    public function lowProduct(){
        $products=\App\Models\Product::where('quantity','<','6')->where('user_id',auth()->id())->get();
        return view('admin.e-commerce.product.index', compact('products'));
    }
    public function commetn_delte($id){
        $comment=Comment::find($id);
        if($comment->replies){
            foreach($comment->replies as $cc){
                $cc->delete();
            }
        }
        $comment->delete();
        notify()->success("Comment deleted", "Delete");
        return back();
    }
    public function rating_delte($id){
        $comment=Review::find($id);
        $comment->delete();
         notify()->success("Rating deleted", "Delete");
        return back();
    }
    public function rating_edit($id){
        $rating=Review::find($id);
        return view('admin.e-commerce.product.rating', compact('rating'));
    }
    public function rating_update(Request $request){
        $check = Review::find($request->id);
        $book = $request->file('report');
        if ($book) {
            $bookName=$this->upload($book);
        }else{
            $bookName=$check->file;
        }
        $book2 = $request->file('report2');
        if ($book2) {
            $bookName2=$this->upload($book2);
        }else{
            $bookName2=$check->file2;
        }
        $book3 = $request->file('report3');
        if ($book3) {
            $bookName3=$this->upload($book3);
        }else{
            $bookName3=$check->file3;
        }
        $book4 = $request->file('report4');
        if ($book4) {
            $bookName4=$this->upload($book4);
        }else{
            $bookName4=$check->file4;
        }
        $book5 = $request->file('report5');
        if ($book5) {
            $bookName5=$this->upload($book5);
        }else{
            $bookName5=$check->file5;
        }


        $check->update([  
            'rating'     => $request->rating,
            'file'      => $bookName??'',
            'file2'      => $bookName2??'',
            'file3'      => $bookName3??'',
            'file4'      => $bookName4??'',
            'file5'      => $bookName5??'',
            'body'       => $request->review
        ]);

        notify()->success("For your awesome review, enjoy and shopping now", "Thanks!!");
        return back();
    }
public function upload($book){
            $currentDate = Carbon::now()->toDateString();
            $bookName = $currentDate.'-'.uniqid().'.'.$book->getClientOriginalExtension();
            if (!file_exists('uploads/review')) {
                mkdir('uploads/review', 0777, true);
            }
            $book->move(public_path('uploads/review'), $bookName);
            return $bookName;
    }
    public function megCatProduct($id){
        $category = Category::with(['products' => function($query){
            return $query->latest('id')->get();
        }])
        ->where('id', $id)
        ->firstOrFail();
        $products=$category->products;
          return view('admin.e-commerce.product.index', compact('products'));
    }
    public function subCatProduct($id){
        $subCategory = SubCategory::with(['products' => function($query)  {
            return $query->latest('id')->get();
        }])
        ->where('id', $id)
        ->firstOrFail();
        $products=$subCategory->products;
          return view('admin.e-commerce.product.index', compact('products'));
    }
     public function minCatProduct($id){
        $subCategory = miniCategory::with(['products' => function($query)  {
            return $query->latest('id')->get();
        }])
        ->where('id', $id)
        ->firstOrFail();
        $products=$subCategory->products;
          return view('admin.e-commerce.product.index', compact('products'));
    }
     public function exCatProduct($id){
        $subCategory = ExtraMiniCategory::with(['products' => function($query)  {
            return $query->latest('id')->get();
        }])
        ->where('id', $id)
        ->firstOrFail();
        $products=$subCategory->products;
          return view('admin.e-commerce.product.index', compact('products'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function inhouseProduct()
    {
        $products = Product::where('type','1')->with('brand')->latest('id')->get();
        return view('admin.e-commerce.product.index', compact('products'));
    }
     public function type()
    {
        return view('admin.e-commerce.product.type');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type='normal';
        $categories = DB::table('categories')->latest('id')->get(['id', 'name']);
        $colors     = DB::table('colors')->latest('id')->get(['id', 'name','slug','code']);
    
          $campaigns = Campaign::where('status',1)->get();
        $sizes      = DB::table('sizes')->latest('id')->get(['id', 'name']);
        $tags       = DB::table('tags')->latest('id')->get(['id', 'name']);
        $brands     = DB::table('brands')->latest('id')->get(['id', 'name']);
        return view('admin.e-commerce.product.form', compact('campaigns','categories', 'colors', 'sizes', 'tags', 'brands','type'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function inhouseCreate()
    {       
        $type='inhouse';
        $categories = DB::table('categories')->latest('id')->get(['id', 'name']);
        $colors     = DB::table('colors')->latest('id')->get(['id', 'name','slug','code']);
        $attributes = Attribute::all();
        $campaigns  = Campaign::where('status',1)->get();
        $sizes      = DB::table('sizes')->latest('id')->get(['id', 'name']);
        $tags       = DB::table('tags')->latest('id')->get(['id', 'name']);
        $brands     = DB::table('brands')->latest('id')->get(['id', 'name']);
        return view('admin.e-commerce.product.form', compact('campaigns','categories', 'colors', 'sizes', 'tags', 'brands','type','attributes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->ptypen=='inhouse'){
            $typen=1;
        }else{
            $typen=0;
        }
        $this->validate($request, [
            'title'             => 'required|string|max:255',
            'sku'               => 'nullable|string|max:255',
            'short_description' => 'nullable|string',
            'full_description'  => 'required|string',
            'buying_price'      => 'nullable|numeric',
            'regular_price'     => 'required|numeric',
            'whole_price'       => 'nullable|numeric',
            'dis_type'          => 'nullable',
            'discount_price'    => 'nullable|numeric',
            'quantity'          => 'required|integer',
            'categories'        => 'required|array',
            'categories.*'      => 'integer',
            'sub_categories.'   => 'integer',
            'extra_categories.' => 'integer',
            'mini_categories.'  => 'integer',
            'brand'             => 'required|integer',
            'sizes'             => 'array',
            'sizes.*'           => 'integer',
            'tags'              => 'array',
            'tags.*'            => 'integer',
            'colors'            => 'array',
            'image'             => 'required|image',
            'shipping_charge'   => 'required|boolean',
            'images'            => 'nullable|array',
            'images.*'          => 'image',
            'file_name'         => 'nullable',
            'file_name.*'       => 'nullable|string|max:255',
            'file_url'          => 'nullable',
            'file_url.*'        => 'nullable',
            'download_limit'    => 'nullable|integer',
            'download_expire'   => 'nullable|date',
            'prdct_extra_msg'   => 'nullable|string',

        ]);
        $book = $request->file('pdf');
        if ($book) {
            $currentDate = Carbon::now()->toDateString();
            $bookName = $currentDate.'-'.uniqid().'.'.$book->getClientOriginalExtension();
            if (!file_exists('uploads/admin/book')) {
                mkdir('uploads/admin/book', 0777, true);
            }
            $book->move(public_path('uploads/admin/book'), $bookName);
        }
         $video = $request->file('video');
        if ($video) {
            $currentDate = Carbon::now()->toDateString();
            $videoName = $currentDate.'-'.uniqid().'.'.$video->getClientOriginalExtension();
            if (!file_exists('uploads/product/video')) {
                mkdir('uploads/product/video', 0777, true);
            }
            $video->move(public_path('uploads/product/video'), $videoName);
        }
         $video_thumb = $request->file('video_thumb');
        if ($video_thumb) {
            $currentDate = Carbon::now()->toDateString();
            $videoTName = $currentDate.'-'.uniqid().'.'.$video_thumb->getClientOriginalExtension();
            if (!file_exists('uploads/product/video')) {
                mkdir('uploads/product/video', 0777, true);
            }
            $video_thumb->move(public_path('uploads/product/video'), $videoTName);
        }

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
            $download_limit = $request->download_limit;
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
        $linky='';
        if($request->yvideo){
            $url=$request->yvideo;
            $provider=parse_url($request->yvideo);
        $domian=$provider['host'];
        $www=ltrim($domian,'www.');
        $base=trim($www,'.com');
       if($base=='youtu.be'|| $base=='youtube'){
            $shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_-]+)\??/i';
            $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))([a-zA-Z0-9_-]+)/i';
            if (preg_match($longUrlRegex, $url, $matches)) {
                $youtube_id = $matches[count($matches) - 1];
            }
        
            if (preg_match($shortUrlRegex, $url, $matches)) {
                $youtube_id = $matches[count($matches) - 1];
            }
            $linky= 'https://www.youtube.com/embed/' . $youtube_id.'?rel=0&enablejsapi=1' ;
       }
        }
        $product = Product::create([
            'user_id'           => $request->vendor ?? 1,
            'brand_id'          => $request->brand,
            'slug'              => rand(pow(10, 5-1), pow(10, 15)-1),
            'title'             => $request->title,
            'sku'               => $request->sku,
            'author_id'             => $request->author_id,
            'book_file'             => $bookName ?? NULL,
            'short_description' => $request->short_description,
            'isbn' => $request->isbn,
            'edition' => $request->edition,
            'pages' => $request->pages,
            'video' => $videoName?? Null,
            'videoTName' => $videoTName?? Null,
            'yvideo' => $linky,
            'country' => $request->country,
            'language' => $request->language,
            'full_description'  => $request->full_description,
            'buying_price'      => $request->buying_price,
            'regular_price'     => $request->regular_price,
            'whole_price'       => $request->whole_price,
            'discount_price'    => $discount_price,
            'dis_type'          => $request->dis_type,
            'point'             => $request->point ?? $point,
            'quantity'          => $request->quantity,
            'image'             => $imageName,
            'status'            => $request->filled('status'),
            'is_aproved'            => $request->filled('status'),
            'type'              => $typen,
            'shipping_charge'   => $request->shipping_charge,
            'download_able'     => $request->filled('download_able'),
            'download_limit'    => $download_limit ?? NULL,
            'download_expire'   => $download_expire ?? NULL,
            'sheba'             => $request->filled('sheba'),
            'book'             => $request->filled('book'),
            'prdct_extra_msg'   => $request->prdct_extra_msg,
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
             if(!empty( $request->get('campaigns'))){
            $product->campaigns()->sync($request->campaigns, []);
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
         foreach ($images as $key=>$gallery) {
            $currentDate      = Carbon::now()->toDateString();
            $galleryImageName = $currentDate.'-'.uniqid().'.'.$gallery->getClientOriginalExtension();
            
            if (!file_exists('uploads/product')) {
                mkdir('uploads/product', 0777, true);
            }
            $gallery->move(public_path('uploads/product'), $galleryImageName);

            // save product database
            $product->images()->create([
                'name' => $galleryImageName,
                'color_attri' => $request->imagesc[$key],
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
            if($request->file_url){
                foreach ($request->file_url as $index => $file_url) {
                
                if ($file_url != '') {
                    $product->downloads()->create([
                        'name' => $request->file_name[$index],
                        'url'  => $file_url
                    ]);
                }
            }
            }
        }

        notify()->success("Product successfully added", "Added");
        return redirect()->to(routeHelper('product'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $colors_product = DB::table('color_product')
                    ->select('*')
                    ->join('colors', 'colors.id', '=', 'color_product.color_id')
                    ->where('color_product.product_id', $product->id)
                    ->get();
        $attributes = Attribute::all();
        return view('admin.e-commerce.product.show', compact('product','colors_product','attributes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = DB::table('categories')->latest('id')->get(['id', 'name']);
        $colors     = DB::table('colors')->latest('id')->get();
        $sizes      = DB::table('sizes')->latest('id')->get(['id', 'name']);
        $tags       = DB::table('tags')->latest('id')->get(['id', 'name']);
        $campaigns = Campaign::where('status',1)->get();

        $attributes = Attribute::all();
        $colors_product = DB::table('color_product')
                    ->select('*')
                    ->join('colors', 'colors.id', '=', 'color_product.color_id')
                    ->where('color_product.product_id', $product->id)
                    ->get();
        

        $brands     = DB::table('brands')->latest('id')->get(['id', 'name']);
        return view('admin.e-commerce.product.form', compact(
            'colors_product',
            'categories',
            'attributes',
            'colors',
            'sizes',
            'tags',
            'brands',
            'brands',
            'product',
            'campaigns'
        ));

        $categories = DB::table('categories')->latest('id')->get(['id', 'name']);
        $colors     = DB::table('colors')->latest('id')->get(['id', 'name','slug']);
        $attributes = Attribute::all();
        $sizes      = DB::table('sizes')->latest('id')->get(['id', 'name']);
        $tags       = DB::table('tags')->latest('id')->get(['id', 'name']);
        $brands     = DB::table('brands')->latest('id')->get(['id', 'name']);
        return view('admin.e-commerce.product.form', compact('categories', 'colors', 'sizes', 'tags', 'brands','type','attributes'));
    }
    public function nColorDelete($cc,$pp){
        DB::table('color_product')->where('color_id',$cc)->where('product_id',$pp)->delete();
        notify()->success("successfully deleted", "Delete");
        return back();
    }
    public function nattrDelete($cc){
        DB::table('attribute_product')->where('id',$cc)->delete();
        notify()->success("successfully deleted", "Delete");
        return back();
    }
    public function idelte($id){
        $image = ProductImage::find($id);
            if (file_exists('uploads/product/'.$image->name)) {
                unlink('uploads/product/'.$image->name);
            }
            $image->delete();
            notify()->success("successfully deleted", "Delete");
        return back();
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {

        // dd($request);

        $this->validate($request, [
            'title'             => 'required|string|max:255',
            'short_description' => 'nullable|string',
            'full_description'  => 'required|string',
            'regular_price'     => 'required|numeric',
            'discount_price'    => 'nullable|numeric',
            'whole_price'       => 'nullable|numeric',
            'point'             => 'required',
            'quantity'          => 'required|integer',
            'categories'        => 'required|array',
            'categories.*'      => 'required|integer',
            'extra_categories.' => 'integer',
            'brand'             => 'integer',
            'sizes'             => 'array',
            'sizes.*'           => 'integer',
            'tags'              => 'array',
            'tags.*'            => 'integer',
            'colors'            => 'array',
            'colors.*'          => 'integer',
            'image'             => 'nullable|image',
            'shipping_charge'   => 'required|boolean',
            'file_name'         => 'nullable',
            'file_name.*'       => 'nullable|string|max:255',
            'file_url'          => 'nullable',
            'file_url.*'        => 'nullable',
            'download_limit'    => 'nullable|integer',
            'download_expire'   => 'nullable|date',
            'prdct_extra_msg'   => 'nullable|string',
        ]);
        $book = $request->file('pdf');
        if ($book) {
            $currentDate = Carbon::now()->toDateString();
            $bookName = $currentDate.'-'.uniqid().'.'.$book->getClientOriginalExtension();
            if (!file_exists('uploads/admin/book')) {
                mkdir('uploads/admin/book', 0777, true);
            }
            $book->move(public_path('uploads/admin/book'), $bookName);
        }else {
            $bookName = $product->book_file;
        }

        $video = $request->file('video');
        if ($video) {
            $currentDate = Carbon::now()->toDateString();
            $videoName = $currentDate.'-'.uniqid().'.'.$video->getClientOriginalExtension();
            if (!file_exists('uploads/product/video')) {
                mkdir('uploads/product/video', 0777, true);
            }
            $video->move(public_path('uploads/product/video'), $videoName);
        }else{
            $videoName=$product->video;
        }
        $video_thumb = $request->file('video_thumb');
        if ($video_thumb) {
            $currentDate = Carbon::now()->toDateString();
            $videoTName = $currentDate.'-'.uniqid().'.'.$video_thumb->getClientOriginalExtension();
            if (!file_exists('uploads/product/video')) {
                mkdir('uploads/product/video', 0777, true);
            }
            $video_thumb->move(public_path('uploads/product/video'), $videoTName);
        }else{
            $videoTName=$product->video_thumb;
        }

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
            $width  = $imagesize[0] - (1/100 * $imagesize[0]);
            $height = $imagesize[1] - (1/100 * $imagesize[1]);
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
        if($request->discount_price>0){
            $point=setting('Default_Point')*$discount_price;
        }else{
            $point=setting('Default_Point')*$request->regular_price;
        }
        if($discount_price<0){
            $discount_price='Null';
        }
        if($request->yvideo){
            $url=$request->yvideo;
            $provider=parse_url($request->yvideo);
            $domian=$provider['host'];
            $www=ltrim($domian,'www.');
            $base=trim($www,'.com');
            if($base=='youtu.be'|| $base=='youtube'){
                $shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_-]+)\??/i';
                $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))([a-zA-Z0-9_-]+)/i';
                if (preg_match($longUrlRegex, $url, $matches)) {
                    $youtube_id = $matches[count($matches) - 1];
                }
            
                if (preg_match($shortUrlRegex, $url, $matches)) {
                    $youtube_id = $matches[count($matches) - 1];
                }
                $linky= 'https://www.youtube.com/embed/' . $youtube_id.'?rel=0&enablejsapi=1' ;
            }
        }
        $product->update([
            'user_id'           => $request->vendor ?? 1,
            'brand_id'          => $request->brand,
            'title'             => $request->title,
            'sku'               => $request->sku,
            'short_description' => $request->short_description,
            'author_id'             => $request->author_id,
            'book_file'             => $bookName ?? Null,
            'isbn' => $request->isbn,
            'edition' => $request->edition,
            'pages' => $request->pages,
            'country' => $request->country,
            'video'=>$videoName?? Null,
            'video_thumb'=>$videoTName?? Null,
            'language' => $request->language,
            'yvideo' => $linky??$request->yvideo,
            'full_description'  => $request->full_description,
            'buying_price'     => $request->buying_price,
            'regular_price'     => $request->regular_price,
            'whole_price'     => $request->whole_price,
            'discount_price'    => $discount_price,
            'dis_type'    => $request->dis_type,
            'quantity'          => $request->quantity,
            'point'    => $request->point ?? $point,
            'image'             => $imageName,
            'status'            => $request->filled('status'),
            'is_aproved'            => $request->filled('status'),
            'shipping_charge'   => $request->shipping_charge,
            'download_able'     => $request->filled('download_able'),
            'download_limit'    => $download_limit ?? NULL,
            'download_expire'   => $download_expire ?? NULL,
            'sheba'             => $request->filled('sheba'),
            'book'             => $request->filled('book'),
            'prdct_extra_msg'   => $request->prdct_extra_msg,
        ]);


        $images = $request->file('images');
        if($images){
        foreach ($images as $key=>$gallery) {
            $currentDate      = Carbon::now()->toDateString();
            $galleryImageName = $currentDate.'-'.uniqid().'.'.$gallery->getClientOriginalExtension();
            
            if (!file_exists('uploads/product')) {
                mkdir('uploads/product', 0777, true);
            }
            $gallery->move(public_path('uploads/product'), $galleryImageName);

            // save product database
            $product->images()->create([
                'name' => $galleryImageName,
                'color_attri' => $request->imagesc[$key],
            ]);
        }}
        
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
                'qnty'=>$request->attributes_quantits[$a],
                'price'=>$request->attribute_prices[$a],
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
        }
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
                        'url'  => NULL,
                        'file' => $fileName
                    ]);
                }
            }

            if(isset($request->file_url)) {
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

        notify()->success("Product successfully update", "Update");
        return redirect()->to(routeHelper('product'));
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
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
        
        $images = ProductImage::where('product_id', $request->id)->get();

        foreach ($images as $image) 
        {
            if (file_exists('uploads/product/'.$image->name)) {
                unlink('uploads/product/'.$image->name);
            }
            $image->delete();
        }

        $images = $request->file('images');
         foreach ($images as $key=>$gallery) {
            $currentDate      = Carbon::now()->toDateString();
            $galleryImageName = $currentDate.'-'.uniqid().'.'.$gallery->getClientOriginalExtension();
            
            if (!file_exists('uploads/product')) {
                mkdir('uploads/product', 0777, true);
            }
            $gallery->move(public_path('uploads/product'), $galleryImageName);

            // save product database
            $product->images()->create([
                'name' => $galleryImageName,
                'color_attri' => $request->imagesc[$key],
            ]);
        }
        notify()->success("Product image successfully updated", "Updated");
        return back();
    }

    // update product status
    public function status($id)
    {
        $product = Product::findOrFail($id);
        if($product->is_aproved==0){
            $product->update([
                'status' => true,
                'is_aproved' => true,
            ]);
        }else if ($product->status==1) {
            $product->update([
                'status' => false,
                'is_aproved' => false,
            ]);
        } 
        else {
            $product->update([
                'status' => true,
                 'is_aproved' => true,
            ]);
        }
        notify()->success("Product status successfully updated", "Update");
        return back();
    }

    // get active product
    public function activeProduct()
    {
        $products = Product::with('brand')->where('status', true)->latest('id')->get();
        return view('admin.e-commerce.product.active', compact('products'));
    }
    // get active product
    public function reachedProduct()
    {
        $products = Product::with('brand')->where('status', true)->where('reach','>','0')->orderBy('reach', 'DESC')->take('25')->get();
        return view('admin.e-commerce.product.active', compact('products'));
    }
    
    // get disable product
    public function unaprovedProduct()
    {
        $products = Product::with('brand')->where('is_aproved', false)->latest('id')->get();
        return view('admin.e-commerce.product.unapprove', compact('products'));
    }
      // get disable product
    public function disableProduct()
    {
        $products = Product::with('brand')->where('status', false)->latest('id')->get();
        return view('admin.e-commerce.product.disable', compact('products'));
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

        $product = Product::find($request->product_id);
        
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
    public function imex(){
    return view('admin.e-commerce.product.bluk');
    }
    public function export(){
        return Excel::download(new ProductsExport,'product.xlsx');
    }
    public function import(Request $request)
    {
        $import= Excel::import(new ProductsImport, $request->file('product'));
        if($import){
            notify()->success("Product Import", "Update");
            return back();
        }

    }
    public function gallery(){
    $images=ProductImage::all()   ;
        return view('admin.e-commerce.product.gallery',compact('images'));
    }
}