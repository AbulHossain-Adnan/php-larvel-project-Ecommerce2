<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\Contact;
use Carbon\Carbon;

class ContactController extends Controller
{
    function getcontact(){
      $contacts=Message::all();

      return view('admin/contact/contactmessage',compact('contacts'));
    }
    function contactmessagepost(request $request){

      $request->validate([
        'name'=>'required',
        'email'=>'required',
        'subject'=>'required',
        'message'=>'required',


      ]);
      // $insertdata = $request->all();
      Message::insert([
        'name'=>$request->name,
        'email'=>$request->email,
        'subject'=>$request->subject,
        'message'=>$request->message,
        'created_at'=>Carbon::now(),



      ]);
return back()->with('success_mes','you send message successfully');

    }
    function contactinformation(){
      $infomations=Contact::all();
    return view('admin/contact/contactinformation',compact('infomations'));
    }
    function contactinformationpost(request $request){
      $contacts=$request->all();

      Contact::insert([
        'address'=>$request->address,
        'email'=>$request->email,
        'phone_num'=>$request->phone,
      ]);

  // return back()->with()



    }
  function contact(){
      $informations=Contact::all();
    return view('contact',compact('informations'));
  }
}
