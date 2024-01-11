<?php

namespace App\Http\Controllers\Admin\Ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ticket;
use App\Models\Contact;


class ticketController extends Controller
{
    public function index(){
        $tickets=ticket::all();
        return view('admin.e-commerce.ticket.index', compact('tickets'));

    }
    public function delete($ticklet){
        ticket::find($ticklet)->delete();
        return redirect('/admin/ticket')->with('massage2','Successfully delete An user ticket');
    }
    public function show($id){
        $tickets=ticket::find($id);
        return view('admin.e-commerce.ticket.show', compact('tickets'));

    }
    public function mailShow($id){
        $mail=Contact::find($id);
          return view('admin.e-commerce.connection.show', compact('mail'));
    }
    public function update(Request $request){
      $ticket=ticket::find($request->gurdmen);
      $ticket->status='1';
      $ticket->reply =$request->replay;
      $ticket->update();
      return redirect('/admin/ticket')->with('massage2','Successfully update An user ticket');
    }
    public function mail(){
            $mails=Contact::all();
             return view('admin.e-commerce.connection.mail', compact('mails'));

    }
    public function maildelete($ticklet){
        Contact::find($ticklet)->delete();
        notify()->success(" successfully Delete", "Deleted");
        return redirect()->back();
    }
}
