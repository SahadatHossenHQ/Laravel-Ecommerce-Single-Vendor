<?php

namespace App\Http\Controllers\Admin\Ecommerce;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\miniCategory;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = DB::table('categories')->latest('id')->get();
        return view('admin.e-commerce.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.e-commerce.category.form');
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
            'name'        => 'required|string|max:255|unique:categories,name',
            'description' => 'nullable|string',
            'cover_photo' => 'nullable|image|max:1024|mimes:jpg,jpeg,png,bmp',
            'pos'   =>'nullable|string|max:255|unique:categories,pos'
        ]);

        $cover_photo = $request->file('cover_photo');
        if ($cover_photo) {
            $currentDate = Carbon::now()->toDateString();
            $imageName   = $currentDate.'-'.uniqid().'.'.$cover_photo->getClientOriginalExtension();
            

            if (!file_exists('uploads/category')) {
                mkdir('uploads/category', 0777, true);
            }
            $cover_photo->move(public_path('uploads/category'), $imageName);
        }

        Category::create([
            'name'        => $request->name,
            'slug'        => Str::slug($request->name),
            'description' => $request->description,
            'cover_photo' => $imageName ?? 'default.png',
            'status'      => $request->filled('status'),
            'pos'      => $request->pos,
            'is_feature'      => $request->filled('is_feature')
        ]);

        notify()->success("Category successfully added", "Added");
        return redirect()->to(routeHelper('category'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('admin.e-commerce.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.e-commerce.category.form', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $this->validate($request, [
            'name'        => 'required|string|max:255|unique:categories,name,'.$category->id,
            'description' => 'nullable|string',
            'cover_photo' => 'nullable|image|max:1024|mimes:jpg,jpeg,png,bmp',
        ]);

       $ccs = DB::table('categories')->where('pos',$request->pos)->where('id','!=',$category->id)->latest('id')->first();
       if($ccs){
            notify()->warning("Positon already fillable", "Warning");
        return redirect()->to(routeHelper('category'));
       }
       
        $cover_photo = $request->file('cover_photo');
        if ($cover_photo) {
            $currentDate = Carbon::now()->toDateString();
            $imageName   = $currentDate.'-'.uniqid().'.'.$cover_photo->getClientOriginalExtension();
            
            if (file_exists('uploads/category/'.$category->cover_photo)) {
                unlink('uploads/category/'.$category->cover_photo);
            }

            if (!file_exists('uploads/category')) {
                mkdir('uploads/category', 0777, true);
            }
            $cover_photo->move(public_path('uploads/category'), $imageName);
        } else {
            $imageName = $category->cover_photo;
        }

        $category->update([
            'name'        => $request->name,
            'slug'        => Str::slug($request->name),
            'description' => $request->description,
            'cover_photo' => $imageName,
            'status'      => $request->filled('status'),
             'is_feature'      => $request->filled('is_feature'),
              'pos'      => $request->pos,
        ]);

        if($request->filled('status')==1){
            $s=0;
            $u=1;
           
        }else{
            $s=1;
            $u=0;
        }
          SubCategory::where('category_id',$category->id)->update(['status'=> $request->filled('status')]);
               miniCategory::
                          join('sub_categories',  'sub_categories.id', '=','mini_categories.category_id' )
                          ->where('sub_categories.category_id',$category->id)
                          ->update(['mini_categories.status'=> $request->filled('status')]);
        $products=Product::join('category_product', 'products.id', '=', 'category_product.product_id')
        ->where('category_product.category_id',$category->id)
        ->where('products.status',$s)
        ->update(['products.status' => $u]);
        notify()->success("Category successfully updated", "Updated");
        return redirect()->to(routeHelper('category'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if (file_exists('uploads/category/'.$category->cover_photo)) {
            unlink('uploads/category/'.$category->cover_photo);
        }
        $category->delete();
        notify()->success("Category successfully deleted", "Deleted");
        return back();
    }

    public function nCat(Request $request){
        $exit=Category::where('slug',Str::slug($request->ncateg))->first();
       if($exit){
        return response()->json([
            'massage'   => 'Already Exit',
        ]);
       }else{
            $newCategory=Category::create([
                'name'        => $request->ncateg,
                'slug'        => Str::slug($request->ncateg),
                'description' => 'null',
                'cover_photo' => 'default.png',
                'status'      => '1',
                'is_feature'      => false,
            ]);

            $data= '<option value="'.$newCategory->id.'">'.$newCategory->name.'</option>';
            return response()->json([
                'data'   => $data,
                'massage'   => 'Category successfully added',
            ]);
        }

    }
    
}
