<?php

namespace App\Http\Controllers\Admin\Ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Author;
use Carbon\Carbon;

class AuthController extends Controller
{   
    public function index(){
        $author=Author::get();
         return view('admin.e-commerce.author.index',compact('author'));
    }
    public function create(){
       return view('admin.e-commerce.author.create');
    }
    public function store(Request $request){
        $avatar = $request->file('profile');
        if ($avatar) {
            $currentDate = Carbon::now()->toDateString();
            $imageName = $currentDate.'-'.uniqid().'.'.$avatar->getClientOriginalExtension();
            if (!file_exists('uploads/admin')) {
                mkdir('uploads/admin', 0777, true);
            }
            $avatar->move(public_path('uploads/admin'), $imageName);
        } 
        Author::create([
            'name'  => $request->name,
            'img'   => $imageName,
            'bio'   => $request->bio,
        ]);
           notify()->success("Author successfully added", "Added");
         $author=Author::get();
         return view('admin.e-commerce.author.index',compact('author'));
        
    }
    public function update(Request $request,$id){
         $author=Author::find($id);
        $avatar = $request->file('profile');
        if ($avatar) {
            $currentDate = Carbon::now()->toDateString();
            $imageName = $currentDate.'-'.uniqid().'.'.$avatar->getClientOriginalExtension();
            if (!file_exists('uploads/admin')) {
                mkdir('uploads/admin', 0777, true);
            }
            $avatar->move(public_path('uploads/admin'), $imageName);
        } else{
            $imageName=$author->img;
        }
        $author->update([
            'name'  => $request->name,
            'img'   => $imageName,
            'bio'   => $request->bio,
        ]);
         notify()->success("Author successfully added", "Added");
          $author=Author::get();
         return view('admin.e-commerce.author.index',compact('author'));
    }
    public function destroy($id){
        $a=Author::find($id);
        $a->delete();
           notify()->success("Delete successfully added", "Deleted");
          $author=Author::get();
         return view('admin.e-commerce.author.index',compact('author'));
    }
    public function show($id){
         $author=Author::find($id);
          return view('admin.e-commerce.author.update',compact('author'));
    }
}