<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class pageController extends Controller
{   
    public function index(){
        $pages=page::all();
        return view('admin.e-commerce.page.index',compact('pages'));
    }
    public function form(){
        return view('admin.e-commerce.page.form');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'             => 'required|string|max:255',
            'title'             => 'required|string|max:255',
            'body'             => 'required|string',
        ]);
        Page::create([
            'name'=>$request->name,
            'title'=>$request->title,
            'body'=>$request->body,
            'position'=>$request->position,
            'status'=>$request->status,
        ]);
        return view('admin.e-commerce.page.form');
    }
        public function update(Request $request)
    {
        $this->validate($request, [
            'name'             => 'required|string|max:255',
            'title'             => 'required|string|max:255',
            'body'             => 'required|string',
        ]);
        $pag=Page::find($request->id);
        $pag->Update([
            'name'=>$request->name,
            'title'=>$request->title,
            'body'=>$request->body,
            'position'=>$request->position,
            'status'=>$request->status,
        ]);
         notify()->success("Page successfully updated", "Update");
        return back();
    }
    public function edit($id)
    {
        $page=Page::find($id);
        return view('admin.e-commerce.page.form',compact('page'));

    }
     public function delete($id)
    {
        Page::find($id)->delete();
        notify()->success("Page successfully deleted", "Deleted");
        return back();
    }
    public function pageshow($slug){
           $page = Page::where('name', $slug)->where('status', true)->firstOrFail();
        return view('frontend.page', compact('page'));
    }
}
