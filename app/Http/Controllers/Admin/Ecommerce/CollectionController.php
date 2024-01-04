<?php

namespace App\Http\Controllers\Admin\Ecommerce;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Collection;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collections = Collection::latest('id')->get();
        return view('admin.e-commerce.collection.index', compact('collections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::latest('id')->get();
        return view('admin.e-commerce.collection.form', compact('categories'));
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
            'name'        => 'required|string|max:255|unique:collections,name',
            'categories'   => 'required|array',
            'categories.*' => 'integer',
            'cover_photo'  => 'required|image|max:1024|mimes:jpg,jpeg,png,bmp,webp'
        ]);
        
        $cover_photo = $request->file('cover_photo');
        if ($cover_photo) {
            $currentDate = Carbon::now()->toDateString();
            $imageName   = $currentDate.'-'.uniqid().'.'.$cover_photo->getClientOriginalExtension();
            

            if (!file_exists('uploads/collection')) {
                mkdir('uploads/collection', 0777, true);
            }
            $cover_photo->move(public_path('uploads/collection'), $imageName);
        }

        Collection::create([
            'name'        => $request->name,
            'slug'        => Str::slug($request->name),
            'status'      => $request->filled('status'),
            'cover_photo' => $imageName,
        ])
        ->categories()->sync($request->categories, []);
        
        notify()->success("Collection successfully added", "Congratulations");
        return redirect()->to(routeHelper('collection'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function show(Collection $collection)
    {
        if ($collection->status) {
            $collection->status = false;
        } else {
            $collection->status = true;
        }
        $collection->save();
        notify()->success("Collection status successfully updated", "Congratulations");
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function edit(Collection $collection)
    {
        $categories = Category::latest('id')->get();
        return view('admin.e-commerce.collection.form', compact('categories', 'collection'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Collection $collection)
    {
        $this->validate($request, [
            'name'         => 'required|string|max:255|unique:collections,name,'.$collection->id,
            'categories'   => 'required|array',
            'categories.*' => 'integer',
            'cover_photo'  => 'nullable|image|max:1024|mimes:jpg,jpeg,png,bmp,webp'
        ]);
        
        $cover_photo = $request->file('cover_photo');
        if ($cover_photo) {
            $currentDate = Carbon::now()->toDateString();
            $imageName   = $currentDate.'-'.uniqid().'.'.$cover_photo->getClientOriginalExtension();
            

            if (file_exists('uploads/collection/'.$collection->cover_photo)) {
                unlink('uploads/collection/'.$collection->cover_photo);
            }

            if (!file_exists('uploads/collection')) {
                mkdir('uploads/collection', 0777, true);
            }
            $cover_photo->move(public_path('uploads/collection'), $imageName);
        }

        $collection->update([
            'name'        => $request->name,
            'slug'        => Str::slug($request->name),
            'status'      => $request->filled('status'),
            'cover_photo' => $imageName ?? $collection->cover_photo,
        ]);
        $collection->categories()->sync($request->categories);
        
        notify()->success("Collection successfully updated", "Congratulations");
        return redirect()->to(routeHelper('collection'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function destroy(Collection $collection)
    {
        if (file_exists('uploads/collection/'.$collection->cover_photo)) {
            unlink('uploads/collection/'.$collection->cover_photo);
        }
        $collection->delete();
        notify()->success("Collection successfully deleted", "Congratulations");
        return back();
    }
}
