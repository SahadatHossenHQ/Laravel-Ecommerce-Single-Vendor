<?php

namespace App\Http\Controllers\Admin\Ecommerce;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = DB::table('tags')->latest()->get();
        return view('admin.e-commerce.tag.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.e-commerce.tag.form');
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
            'name'        => 'required|string|max:255|unique:tags,name',
            'description' => 'required|string'
        ]);

        Tag::create([
            'name'        => $request->name,
            'slug'        => Str::slug($request->name),
            'status'      => $request->filled('status'),
            'description' => $request->description
        ]);

        notify()->success("Tag successfully added", "Added");
        return redirect()->to(routeHelper('tag'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('admin.e-commerce.tag.form', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        $this->validate($request, [
            'name'        => 'required|string|max:255|unique:tags,name,'.$tag->id,
            'description' => 'required|string'
        ]);

        $tag->update([
            'name'        => $request->name,
            'slug'        => Str::slug($request->name),
            'status'      => $request->filled('status'),
            'description' => $request->description
        ]);

        notify()->success("Tag successfully updated", "Update");
        return redirect()->to(routeHelper('tag'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        notify()->success("Tag successfully deleted", "Delete");
        return back();
    }
     public function ntag(Request $request)
    {
        $exit=Tag::where('slug',Str::slug($request->ntag))->first();
       if($exit){
        return response()->json([
            'massage'   => 'Already Exit',
        ]);
       }else{

            $ntag=Tag::create([
                'name'        => $request->ntag,
                'slug'        => Str::slug($request->ntag),
                'status'      => true,
                'description' => 'null'
            ]);

            $data= '<option value="'.$ntag->id.'">'.$ntag->name.'</option>';
            return response()->json([
                'data'   => $data,
                'massage'   => 'Tag successfully added',
            ]);
        }
    }
}
