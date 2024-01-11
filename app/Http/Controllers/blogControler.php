<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use App\Models\BlogComment;
use App\Models\Category;
use Illuminate\Http\Request;

class blogControler extends Controller
{   public function index()
    {
        $is=0;
    	$blogs=Blog::where('is_admin',1)->get();
    	return view('admin.e-commerce.blog.index',['blogs'=>$blogs,'is'=>$is]);
    }
    public function index2()
    {
        $is=1;
    	$blogs=Blog::where('is_admin',0)->get();
    	return view('admin.e-commerce.blog.index',['blogs'=>$blogs,'is'=>$is]);
    }
    public function index3()
    {
        $categories=Category::all();
    	$blogs=Blog::where('user_id',auth()->id())->get();
    	return view('frontend.blog.index',['blogs'=>$blogs,'categories'=>$categories]);
    }
    public function new_blog_form()
    {
    	$categories=Category::all();
    	return view('admin.e-commerce.blog.form',['categories'=>$categories]);
    }
    public function store(Request $request)
    {
    	
        
    	$thumbnail = $request->file('thumbnail');
    	$rand=rand('999','1000');
        $thumbnailName   = $rand.$thumbnail->getClientOriginalName();
        $today=date('d-m-y');
        $directory='uploads/blogs/'.$today.'/';
        if (!file_exists($directory)) {
            mkdir($directory, 0777, true);
        }
        $thumbnail->move($directory, $thumbnailName);

        if(empty($thumbnailName)){
        	$thumbnailName='null';
        }
    	Blog::create([
    		'title' 		=> $request->title,
	    	'user_id'	=> auth()->id(),
	    	'category_id'	=> $request->category,
	    	'description'	=> $request->descripiton,
	    	'thumbnail'		=> $today.'/'.$thumbnailName,
	    	'is_admin' 	=> true,
	    
    	]);
        notify()->success("Blog successfully created", "Congratulations");
        return back();
    }
    public function status($id){
        $blog=Blog::find($id);
        if ($blog->status) {
            $blog->status = false;
        } else {
            $blog->status = true;
        }
        $blog->save();
        notify()->success("Blog status successfully updated", "Congratulations");
        return back();
    }

    public function destory($id)
    {
      $blog=Blog::find($id);
      if (file_exists('uploads/blogs'.$blog->thumbnail)) {
        unlink('uploads/blogs'.$blog->thumbnail);
        }
        $blog->delete();

      notify()->success("Blog successfully Deeted", "Congratulations");
        return back(); 
    }
    public function blog_edit_form($id)
    {
        $blog=Blog::find($id);
        $categories=Category::all();
        return view('admin.e-commerce.blog.form',[
                'blog'=>$blog,
                'categories'=>$categories,
        ]);
    }
    public function update_exit_blog(Request $request)
    {
        $blog=Blog::find($request->power);

        $thumbnail = $request->file('thumbnail');
        if ($thumbnail) {
            $rand=rand('999','1000');
            $thumbnailName   = $rand.$thumbnail->getClientOriginalName();
            
            $today=date('d-m-y');
            $directory='uploads/blogs'.$today.'/';

            if (file_exists($directory.'/'.$blog->thumbnail)) {
                unlink($directory.'/'.$blog->thumbnail);
            }
           
            if (!file_exists($directory)) {
                mkdir($directory, 0777, true);
            }
            $thumbnail->move($directory, $thumbnailName);

        } else {
            $thumbnailName = $blog->thumbnail;
        }
      

        $blog->title = $request->title;
        $blog->category_id = $request->category;
        $blog->description=$request->descripiton;
        $blog->status=$request->status ? '1':'0';
        $blog->thumbnail =$thumbnailName;
        $blog->save();
       
        notify()->success("Blog successfully Updated", "Congratulations");
        return back(); 
    }
    // user part
    public function store2(Request $request)
    {
    	
        
    	$thumbnail = $request->file('thumbnail');
    	$rand=rand('999','1000');
        $thumbnailName   = $rand.$thumbnail->getClientOriginalName();
        $today=date('d-m-y');
        $directory='uploads/blogs/'.$today.'/';
        if (!file_exists($directory)) {
            mkdir($directory, 0777, true);
        }
        $thumbnail->move($directory, $thumbnailName);

        if(empty($thumbnailName)){
        	$thumbnailName='null';
        }
    	Blog::create([
    		'title' 		=> $request->title,
	    	'user_id'	=> auth()->id(),
	    	'category_id'	=> $request->category,
	    	'description'	=> $request->descripiton,
	    	'thumbnail'		=> $today.'/'.$thumbnailName,
	    	'is_admin' 	=> false,
	    		'status'=>false,
    	]);
        notify()->success("Blog successfully created", "Congratulations");
        return back();
    }
    public function blog_edit_form2($id)
    {
    	$blogs=Blog::where('user_id',auth()->id())->get();
        $eblog=Blog::find($id);
        $categories=Category::all();
        return view('frontend.blog.index',[
                'eblog'=>$eblog,
                'blogs'=>$blogs,
                'categories'=>$categories,
        ]);
    }
    public function getAllBlogs(){
       $blogs= Blog::where('is_admin',false)->where('status',true)->get();
        return view('frontend.blog.all',compact('blogs'));
    }
    public function getAllCeoBlogs(){
       $blogs= Blog::where('is_admin','1')->where('status',true)->get();
        return view('frontend.blog.all',compact('blogs'));
    }
    public function getBlogByID($id){
        $blog= Blog::find($id);
        return view('frontend.blog.show',compact('blog'));
    }
    public function comment(Request $request, $slug)
    {
        $this->validate($request, [
            'comment' => 'required|string'
        ]);

        $blog = Blog::where('id', $slug)->first();
        
        BlogComment::create([
            'user_id'    => auth()->id(),
            'blog_id' => $blog->id,
            'body'       => $request->comment
        ]);

        notify()->success("Your comment successful", "Success");
        return back();
    }
      /**
     * product comment reply
     *
     * @param  mixed $request
     * @param  mixed $slug
     * @param  mixed $id
     * @return void
     */
    public function reply(Request $request, $slug, $id)
    {
        $this->validate($request, [
            'reply' => 'required|string'
        ]);

         $blog = Blog::where('id', $slug)->first();
        
        BlogComment::create([
            'user_id'    => auth()->id(),
            'blog_id' => $blog->id,
            'parent_id'  => $id,
            'body'       => $request->reply
        ]);

        notify()->success("Your reply successful", "Success");
        return back();
    }
    
}
