<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\ticket;
use App\Models\Contact;
use App\Models\wishlist;
use Carbon\Carbon;
class ContactController extends Controller
{
    public function index()
    {
        $service=0;
        return view('frontend.contact',compact('service'));
    }
    public function ticket(){
        $tickets=ticket::where('user_id',auth()->id())->latest('id')->get();
        return view('frontend.ticket',compact('tickets'));

    }
    public function service(){
        $service=1;
          return view('frontend.contact',compact('service'));
    }
    public function ticketCreate(Request $request){
        $this->validate($request, [
            'subject' => 'required|string',
            'message' => 'required|string'
        ]);

        ticket::create([
            'user_id' => auth()->id(),
            'sub'=>$request->subject,
            'body'=>$request->message,
        ]);
         notify()->success("Receive your ticket information successfully", "Success");
        return back();
       
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'    => 'required|string|max:20',
            'email'   => 'required|email|string|max:50',
            'phone' => 'required|max:11|min:11',
            'subject' => 'nullable|string',
            'message' => 'required|string'
        ]);
        $cover_photo = $request->file('cover_photo');
        if ($cover_photo) {
            $currentDate = Carbon::now()->toDateString();
            $imageName   = $currentDate.'-'.uniqid().'.'.$cover_photo->getClientOriginalExtension();
            

            if (!file_exists('uploads/contact')) {
                mkdir('uploads/contact', 0777, true);
            }
            $cover_photo->move(public_path('uploads/contact'), $imageName);
        }
        if(!empty($request->meet)){
            Contact::create([
                'name'     => $request->name,
                'email'    => $request->input('email'),
                'phone'    => $request->input('phone'),
                'title'  => $request->input('subject'),
                'body'     => $request->input('message'),
                'documents'     => $imageName ?? 'default.png',
                'meet'     => $request->meet,

            ]);
        }else{
             Contact::create([
                'name'     => $request->name,
                'email'    => $request->input('email'),
                'phone'    => $request->input('phone'),
                'title'  => $request->input('subject'),
                'body'     => $request->input('message'),
                'documents'     => $imageName ?? 'default.png',
            ]);
        }



        // $data = [
        //     'name'     => $request->name,
        //     'email'    => $request->input('email'),
        //     'phone'    => $request->input('phone'),
        //     'subject'  => $request->input('subject'),
        //     'body'     => $request->input('message')
        // ];
      
      
         notify()->success("Receive your contact information successfully", "Success");
        return back();
    }
}
