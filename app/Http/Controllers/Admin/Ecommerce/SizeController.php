<?php

namespace App\Http\Controllers\Admin\Ecommerce;

use App\Http\Controllers\Controller;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sizes = DB::table('sizes')->latest('id')->get();
        return view('admin.e-commerce.size.index', compact('sizes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.e-commerce.size.form');
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
            'name'        => 'required|max:255|unique:sizes,name',
            'description' => 'nullable'
        ]);

        Size::create([
            'name'        => $request->name,
            'slug'        => Str::slug($request->name),
            'description' => $request->description,
            'status'      => $request->filled('status')
        ]);

        notify()->success("Size successfully added", "Added");
        return redirect()->to(routeHelper('size'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function show(Size $size)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function edit(Size $size)
    {
        return view('admin.e-commerce.size.form', compact('size'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Size $size)
    {
        $this->validate($request, [
            'name'        => 'required|max:255|unique:sizes,name,'.$size->id,
            'description' => 'nullable'
        ]);

        $size->update([
            'name'        => $request->name,
            'slug'        => Str::slug($request->name),
            'description' => $request->description,
            'status'      => $request->filled('status')
        ]);

        notify()->success("Size successfully updated", "Update");
        return redirect()->to(routeHelper('size'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function destroy(Size $size)
    {
        $size->delete();
        notify()->success("Size successfully deleted", "Delete");
        return back();
    }
    public function nsize(Request $request)
    {
       
       $exit=Size::where('slug',Str::slug($request->nsize))->first();
       if($exit){
        return response()->json([
            'massage'   => 'Already Exit',
        ]);
       }else{
            $nsize=Size::create([
                'name'        => $request->nsize,
                'slug'        => Str::slug($request->nsize),
                'description' => 'nullable',
                'status'      => true
            ]);

           
            $data= '<option value="'.$nsize->id.'">'.$nsize->name.'</option>';
            return response()->json([
                'data'   => $data,
                'massage'   => 'Size successfully added',
            ]);
        }
    }
}
