<?php

namespace App\Http\Controllers\Admin\Ecommerce;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = DB::table('brands')->latest('id')->get();
        return view('admin.e-commerce.brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.e-commerce.brand.form');
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
            'cover_photo' => 'nullable|image|max:1024|mimes:jpg,jpeg,png,bmp'
        ]);

        $cover_photo = $request->file('cover_photo');
        if ($cover_photo) {
            $currentDate = Carbon::now()->toDateString();
            $imageName   = $currentDate.'-'.uniqid().'.'.$cover_photo->getClientOriginalExtension();
            

            if (!file_exists('uploads/brand')) {
                mkdir('uploads/brand', 0777, true);
            }
            $cover_photo->move(public_path('uploads/brand'), $imageName);
        }

        Brand::create([
            'name'        => $request->name,
            'slug'        => Str::slug($request->name),
            'description' => $request->description,
            'cover_photo' => $imageName ?? 'default.png',
            'status'      => $request->filled('status')
        ]);

        notify()->success("Brand successfully added", "Added");
        return redirect()->to(routeHelper('brand'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        return view('admin.e-commerce.brand.show', compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('admin.e-commerce.brand.form', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $this->validate($request, [
            'name'        => 'required|string|max:255|unique:brands,name,'.$brand->id,
            'description' => 'nullable|string',
            'cover_photo' => 'nullable|image|max:1024|mimes:jpg,jpeg,png,bmp'
        ]);

        $cover_photo = $request->file('cover_photo');
        if ($cover_photo) {
            $currentDate = Carbon::now()->toDateString();
            $imageName   = $currentDate.'-'.uniqid().'.'.$cover_photo->getClientOriginalExtension();
            
            if (file_exists('uploads/brand/'.$brand->cover_photo)) {
                unlink('uploads/brand/'.$brand->cover_photo);
            }

            if (!file_exists('uploads/brand')) {
                mkdir('uploads/brand', 0777, true);
            }
            $cover_photo->move(public_path('uploads/brand'), $imageName);
        } else {
            $imageName = $brand->cover_photo;
        }

        $brand->update([
            'name'        => $request->name,
            'slug'        => Str::slug($request->name),
            'description' => $request->description,
            'cover_photo' => $imageName,
            'status'      => $request->filled('status')
        ]);

        notify()->success("Brand successfully updated", "Updated");
        return redirect()->to(routeHelper('brand'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        if (file_exists('uploads/brand/'.$brand->cover_photo)) {
            unlink('uploads/brand/'.$brand->cover_photo);
        }
        $brand->delete();
        notify()->success("Brand successfully deleted", "Deleted");
        return back();
    }
}
