<?php

namespace App\Http\Controllers\Admin\Ecommerce;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use App\Models\Category;
use App\Models\Product;
use App\Models\miniCategory;
use App\Models\ExtraMiniCategory As  extracategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sub_categories = SubCategory::latest()->get();
        return view('admin.e-commerce.sub-category.index', compact('sub_categories'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function minicategoryList()
    {
        $mini_categories = miniCategory::latest()->get();
        return view('admin.e-commerce.mini-category.index', compact('mini_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = DB::table('categories')->get(['id', 'name']);
        return view('admin.e-commerce.sub-category.form', compact('categories'));
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
            'category'    => 'required|integer',
            'name'        => 'required|string|max:255|unique:categories,name',
            'cover_photo' => 'nullable|image|max:1024|mimes:jpg,jpeg,png,bmp'
        ]);

        $cover_photo = $request->file('cover_photo');
        if ($cover_photo) {
            $currentDate = Carbon::now()->toDateString();
            $imageName   = $currentDate.'-'.uniqid().'.'.$cover_photo->getClientOriginalExtension();
            

            if (!file_exists('uploads/sub category')) {
                mkdir('uploads/sub category', 0777, true);
            }
            $cover_photo->move(public_path('uploads/sub category'), $imageName);
        }

        SubCategory::create([
            'category_id' => $request->category,
            'name'        => $request->name,
            'slug'        => Str::slug($request->name),
            'cover_photo' => $imageName ?? 'default.png',
            'status'      => $request->filled('status'),
            'is_feature'      => $request->filled('is_feature')
        ]);

        notify()->success("Sub Category successfully added", "Added");
        return redirect()->to(routeHelper('sub-category'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $subCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCategory $subCategory)
    {
        $categories = DB::table('categories')->get(['id', 'name']);
        return view('admin.e-commerce.sub-category.form', compact('subCategory', 'categories'));
    }
     public function minicategoryEdit($id)
    {  
       $sub_categories= subCategory::all();
        $mini = miniCategory::find($id);
        return view('admin.e-commerce.mini-category.form', compact('sub_categories', 'mini'));
    }
    public function extracategoryEdit($id)
    {   $categories = Category::latest()->get();
        $sub_categories= subCategory::all();
        $mini = miniCategory::all();

        $extra = extracategory::find($id);
        $hsaMini=miniCategory::find($extra->mini_category_id);
        $hsasub=SubCategory::find($hsaMini->category_id);
        $hascategories=Category::find($hsasub->category_id);
        return view('admin.e-commerce.extra-category.update', compact(
            'categories','sub_categories', 'mini',
            'extra','hsaMini', 'hsasub','hascategories'
        ));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubCategory $subCategory)
    {
        $this->validate($request, [
            'category'    => 'required|integer',
            'name'        => 'required|string|max:255|unique:categories,name,'.$subCategory->id,
            'cover_photo' => 'nullable|image|max:1024|mimes:jpg,jpeg,png,bmp'
        ]);

        $cover_photo = $request->file('cover_photo');
        if ($cover_photo) {
            $currentDate = Carbon::now()->toDateString();
            $imageName   = $currentDate.'-'.uniqid().'.'.$cover_photo->getClientOriginalExtension();
            

            if (file_exists('uploads/sub category/'.$subCategory->cover_photo)) {
                unlink('uploads/sub category/'.$subCategory->cover_photo);
            }

            if (!file_exists('uploads/sub category')) {
                mkdir('uploads/sub category', 0777, true);
            }
            $cover_photo->move(public_path('uploads/sub category'), $imageName);
        }
        else {
            $imageName = $subCategory->cover_photo;
        }

        $subCategory->update([
            'category_id' => $request->category,
            'name'        => $request->name,
            'slug'        => Str::slug($request->name),
            'cover_photo' => $imageName,
            'status'      => $request->filled('status'),
            'is_feature'      => $request->filled('is_feature')
        ]);
         miniCategory::where('category_id',$request->category_id)->update(['status'=>$request->filled('status')]);
        $cat=Category::find($request->category);
        if($cat->status==1){
            if($request->filled('status')==1){
                $s=0;
                $u=1;
            }else{
                $s=1;
                $u=0;
            }
           
             $products=Product::join('product_sub_category', 'products.id', '=', 'product_sub_category.product_id')
            ->where('product_sub_category.sub_category_id',$subCategory->id)
            ->where('products.status',$s)
            ->update(['products.status' => $u]);
        }

        notify()->success("Sub Category successfully updated", "Update");
        return redirect()->to(routeHelper('sub-category'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $subCategory)
    {
        if (file_exists('uploads/sub category/'.$subCategory->cover_photo)) {
            unlink('uploads/sub category/'.$subCategory->cover_photo);
        }
        $subCategory->delete();
        notify()->success("Sub Category successfully deleted", "Delete");
                return redirect()->to(routeHelper('sub-category'));
    }
    public function minicategoryDelete($id){
        $mini=miniCategory::find($id);
        if (file_exists('uploads/mini-category/'.$mini->cover_photo)) {
            unlink('uploads/mini-category/'.$mini->cover_photo);
        }
        $mini->delete();
        return redirect('admin/mini-categories/list')->with('massage2','Mini Category successfully deleted');
    }
     public function extracategoryDelete($id){
        $mini=extracategory::find($id);
        if (file_exists('uploads/extra-category/'.$mini->cover_photo)) {
            unlink('uploads/extra-category/'.$mini->cover_photo);
        }
        $mini->delete();
        return redirect('admin/extra-categories/list')->with('massage2','Extra Category successfully deleted');
    }
    public function minicategory(){
        $sub_categories = SubCategory::latest()->get();
        return view('admin.e-commerce.mini-category.form',compact('sub_categories'));
    }
    public function minicategoryStore(Request $request)
    {
        $this->validate($request, [
            'category'    => 'required|integer',
            'name'        => 'required|string|max:255|unique:categories,name',
            'cover_photo' => 'nullable|image|max:1024|mimes:jpg,jpeg,png,bmp'
        ]);

        $cover_photo = $request->file('cover_photo');
        if ($cover_photo) {
            $currentDate = Carbon::now()->toDateString();
            $imageName   = $currentDate.'-'.uniqid().'.'.$cover_photo->getClientOriginalExtension();
            

            if (!file_exists('uploads/mini-category')) {
                mkdir('uploads/mini-category', 0777, true);
            }
            $cover_photo->move(public_path('uploads/mini-category'), $imageName);
        }
       

        miniCategory::create([
            'category_id' => $request->category,
            'name'        => $request->name,
            'slug'        => Str::slug($request->name),
            'cover_photo' => $imageName ?? 'default.png',
            'status'      => $request->filled('status'),
           'is_feature'      => $request->filled('is_feature')
        ]);

        return redirect('admin/mini-categories')->with('massage2','Successfully Created');
    }
     public function nsCat(Request $request){
        $exit=SubCategory::where('slug',Str::slug($request->ncateg))->first();
        if($exit){
        return response()->json([
            'massage'   => 'Already Exit',
        ]);
       }else{
            $newCategory=SubCategory::create([
                'category_id' => $request->main,
                'name'        => $request->ncateg,
                'slug'        => Str::slug($request->ncateg),
                'cover_photo' => 'default.png',
                'status'      => true
            ]);


            $data= '<option value="'.$newCategory->id.'">'.$newCategory->name.'</option>';
            return response()->json([
                'data'   => $data,
                'massage'   => 'Category successfully added',
            ]);
        }

    }
    public function nmcat(Request $request)
    {
        
    
       
        $exit=miniCategory::where('slug',Str::slug($request->miniCat))->first();
       if($exit){
        return response()->json([
            'massage'   => 'Already Exit',
        ]);
       }else{
            $newCategory=miniCategory::create([
                'category_id' => $request->nsubc,
                'name'        => $request->miniCat,
                'slug'        => Str::slug($request->miniCat),
                'cover_photo' => 'default.png',
                'status'      => true,
                'is_feature'  => false
            ]);
            $data= '<option value="'.$newCategory->id.'">'.$newCategory->name.'</option>';
            return response()->json([
                'data'   => $data,
                'massage'   => 'Category successfully added',
            ]);
        }
      
    }
    public function minicategoryUpdate(Request $request)
    {
        $this->validate($request, [
            'category'    => 'required|integer',
            'name'        => 'required|string|max:255|unique:categories,name',
            'cover_photo' => 'nullable|image|max:1024|mimes:jpg,jpeg,png,bmp'
        ]);
        $miniCategory=miniCategory::find($request->ddddd);

        $cover_photo = $request->file('cover_photo');
        if ($cover_photo) {
            $currentDate = Carbon::now()->toDateString();
            $imageName   = $currentDate.'-'.uniqid().'.'.$cover_photo->getClientOriginalExtension();

            if (file_exists('uploads/mini-category/'.$miniCategory->cover_photo)) {
                unlink('uploads/mini-category/'.$miniCategory->cover_photo);
            }

            if (!file_exists('uploads/mini-category')) {
                mkdir('uploads/mini-category', 0777, true);
            }
            $cover_photo->move(public_path('uploads/mini-category'), $imageName);
        }else {
            $imageName = $miniCategory->cover_photo;
        }
        

        $miniCategory->update([
            'category_id' => $request->category,
            'name'        => $request->name,
            'slug'        => Str::slug($request->name),
            'cover_photo' => $imageName ?? 'default.png',
            'status'      => $request->filled('status'),
           'is_feature'      => $request->filled('is_feature')
        ]);


        $cat=subCategory::find($request->category);
        if($cat->status==1){
             if($request->filled('status')==1){
                $s=0;
                $u=1;
            }else{
                $s=1;
                $u=0;
            }
            
             $products=Product::join('mini_category_product', 'products.id', '=', 'mini_category_product.product_id')
            ->where('mini_category_product.mini_category_id',$miniCategory->id)
            ->where('products.status',$s)
            ->update(['products.status' => $u]);
        }
        return redirect()->back()->with('massage2','Successfully updated');
    }

    public function extracategory(){
        $categories = Category::latest()->get();
        return view('admin.e-commerce.extra-category.form',compact('categories'));
    }
       public function extracategoryStore(Request $request)
    {
        $this->validate($request, [
            'mini'    => 'required|integer',
            'name'        => 'required|string|max:255|unique:categories,name',
            'cover_photo' => 'nullable|image|max:1024|mimes:jpg,jpeg,png,bmp'
        ]);

        $cover_photo = $request->file('cover_photo');
        if ($cover_photo) {
            $currentDate = Carbon::now()->toDateString();
            $imageName   = $currentDate.'-'.uniqid().'.'.$cover_photo->getClientOriginalExtension();
            

            if (!file_exists('uploads/extra-category')) {
                mkdir('uploads/extra-category', 0777, true);
            }
            $cover_photo->move(public_path('uploads/extra-category'), $imageName);
        }
       

        extracategory::create([
            'mini_category_id' => $request->mini,
            'name'        => $request->name,
            'slug'        => Str::slug($request->name),
            'cover_photo' => $imageName ?? 'default.png',
            'status'      => $request->filled('status'),
           'is_feature'      => $request->filled('is_feature')
        ]);

        return redirect('admin/extra-categories')->with('massage2','Successfully Created');
    }

    public function extracategoryUpdate(Request $request)
    {
        $this->validate($request, [
            'mini'    => 'required|integer',
            'name'        => 'required|string|max:255|unique:categories,name',
            'cover_photo' => 'nullable|image|max:1024|mimes:jpg,jpeg,png,bmp'
        ]);
        $miniCategory=extracategory::find($request->ddddd);

        $cover_photo = $request->file('cover_photo');
        if ($cover_photo) {
            $currentDate = Carbon::now()->toDateString();
            $imageName   = $currentDate.'-'.uniqid().'.'.$cover_photo->getClientOriginalExtension();

            if (file_exists('uploads/extra-category/'.$miniCategory->cover_photo)) {
                unlink('uploads/extra-category/'.$miniCategory->cover_photo);
            }

            if (!file_exists('uploads/extra-category')) {
                mkdir('uploads/extra-category', 0777, true);
            }
            $cover_photo->move(public_path('uploads/extra-category'), $imageName);
        }else {
            $imageName = $miniCategory->cover_photo;
        }
        

        $miniCategory->update([
            'mini_category_id' => $request->mini,
            'name'        => $request->name,
            'slug'        => Str::slug($request->name),
            'cover_photo' => $imageName ?? 'default.png',
            'status'      => $request->filled('status'),
           'is_feature'      => $request->filled('is_feature')
        ]);


        $cat=miniCategory::find($request->mini);
        if($cat->status==1){
             if($request->filled('status')==1){
                $s=0;
                $u=1;
            }else{
                $s=1;
                $u=0;
            }
            
             $products=Product::join('mini_category_product', 'products.id', '=', 'mini_category_product.product_id')
            ->where('mini_category_product.mini_category_id',$miniCategory->id)
            ->where('products.status',$s)
            ->update(['products.status' => $u]);
        }
        return redirect()->back()->with('massage2','Successfully updated');
    }

    public function extracategoryList()
    {
        $mini_categories = extracategory::latest()->get();
        return view('admin.e-commerce.extra-category.index', compact('mini_categories'));
    }
}
