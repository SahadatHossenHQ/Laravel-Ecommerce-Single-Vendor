<?php

namespace App\Http\Controllers\Admin\Ecommerce;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use ourcodeworld\NameThatColor\ColorInterpreter;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colors = DB::table('colors')->latest('id')->get();
        return view('admin.e-commerce.color.index', compact('colors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.e-commerce.color.form');
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
            'color'       => 'required|regex:/#[a-zA-Z0-9]{6}/|unique:colors,code',
            'description' => 'nullable|string'
        ]);
        $instance = new ColorInterpreter();

        // Get color name
        $colour = $instance->name($request->color);
        
        Color::create([
            'name'        => $request->name,
            'slug'        => Str::slug($request->name),
            'code'        => $request->color,
            'status'      => $request->filled('status'),
            'description' => $request->description
        ]);

        notify()->success("Color successfully added", "Added");
        return redirect()->to(routeHelper('color'));
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function show(Color $color)
    {
        return view('admin.e-commerce.color.show', compact('color'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function edit(Color $color)
    {
        return view('admin.e-commerce.color.form', compact('color'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Color $color)
    {
        $this->validate($request, [
            'color'       => 'required|regex:/#[a-zA-Z0-9]{6}/|unique:colors,code,'.$color->id,
            'description' => 'nullable|string'
        ]);
        $instance = new ColorInterpreter();

        // Get color name
        $colour = $instance->name($request->color);
        
        $color->update([
             'name'        => $request->name,
            'slug'        => Str::slug($request->name),
            'code'        => $request->color,
            'status'      => $request->filled('status'),
            'description' => $request->description
        ]);

        notify()->success("Color successfully updated", "Update");
        return redirect()->to(routeHelper('color'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function destroy(Color $color)
    {
        $color->delete();
        notify()->success("Color successfully deleted", "Delete");
        return back();
    }
    public function ncolor(Request $request)
    {
       
        $instance = new ColorInterpreter();

        // Get color name
        $colour = $instance->name($request->ncolor);
        $exit=Color::where('slug',Str::slug($colour['name']))->first();
       if($exit){
        return response()->json([
            'massage'   => 'Already Exit',
        ]);
       }else{
            $newClor=Color::create([
                'name'        => $colour['name'],
                'slug'        => Str::slug($colour['name']),
                'code'        => $request->ncolor,
                'status'      => true,
                'description' => 'null'
            ]);

            $data= '<option value="'.$newClor->id.'">'.$newClor->name.'</option>';
            return response()->json([
                'data'   => $data,
                'massage'   => 'Color successfully added',
            ]);
        }
    }
}
