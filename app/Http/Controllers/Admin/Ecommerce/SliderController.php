<?php

namespace App\Http\Controllers\Admin\Ecommerce;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = DB::table('sliders')->latest('id')->get();
        return view('admin.e-commerce.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.e-commerce.slider.form');
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
            'image' => 'required',
            'url'   => 'nullable|url|string|max:255'
        ]);
        
        $image = $request->file('image');
        if ($image) {
            $currentDate = Carbon::now()->toDateString();
            $imageName = $currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            
            // if (file_exists('uploads/admin/'.$data->avatar)) {
            //     unlink('uploads/admin/'.$data->avatar);
            // }

            if (!file_exists('uploads/slider')) {
                mkdir('uploads/slider', 0777, true);
            }
            $image->move(public_path('uploads/slider'), $imageName);

        }

        Slider::create([
            'image'   => $imageName,
            'url'     => $request->url,
            'status'  => $request->filled('status'),
             'is_feature'      => $request->filled('is_feature'),
             'is_pop'      => $request->filled('is_pop'),
              'is_sub'      => $request->filled('is_sub'),
        ]);

        notify()->success("Slider successfully added", "Added");
        return redirect()->to(routeHelper('slider'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        if ($slider->status) {
            $slider->status = false;
        } 
        else {
            $slider->status = true;
        }
        $slider->update();
        notify()->success("Slider status updated", "Update");
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        return view('admin.e-commerce.slider.form', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        $this->validate($request, [
            'image' => 'nullable|image|max:1024|mimes:jpg,jpeg,png,bmp,webp',
            'url'   => 'nullable|url|string|max:255'
        ]);
        
        $image = $request->file('image');
        if ($image) {
            $currentDate = Carbon::now()->toDateString();
            $imageName = $currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            
            if (file_exists('uploads/slider/'.$slider->image)) {
                unlink('uploads/slider/'.$slider->image);
            }

            if (!file_exists('uploads/slider')) {
                mkdir('uploads/slider', 0777, true);
            }
            $image->move(public_path('uploads/slider'), $imageName);

        } else {
            $imageName = $slider->image;
        }

        $slider->update([
            'image'   => $imageName,
            'url'     => $request->url,
              'is_sub'      => $request->filled('is_sub'),
            'status'  => $request->filled('status'),
             'is_feature'      => $request->filled('is_feature'),
              'is_pop'      => $request->filled('is_pop'),
        ]);

        notify()->success("Slider successfully updated", "Update");
        return redirect()->to(routeHelper('slider'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        if (file_exists('uploads/slider/'.$slider->image)) {
            unlink('uploads/slider/'.$slider->image);
        }
        $slider->delete();
        notify()->success("Slider successfully deleted", "Delete");
        return back();
    }
}
