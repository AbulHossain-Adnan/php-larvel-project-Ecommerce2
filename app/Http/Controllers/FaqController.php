<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Faq;
use App\Review;
use Carbon\Carbon;

class FaqController extends Controller
{
  function faq(){
    return view('admin/faq/index',[
      'faqs'=>Faq::all()
    ]);
  }
  function faqpost(Request $request){

    $request->validate([
      'question'=>'required',
      'faq_ans'=>'required',
    ]);

    Faq::insert([
      'question'=>$request->question,
      'faq_ans'=>$request->faq_ans,
      'created_at'=>Carbon::now(),
    ]);
return back();
  }
  function reviewpost(Request $request){
  
    $request->validate([
      'star'=>'required',
      'name'=>'required',
      'email'=>'required',
      'review'=>'required',
    ]);
    Review::insert([
      'star'=>$request->star,
      'name'=>$request->name,
      'email'=>$request->email,
      'review'=>$request->review,
      'created_at'=>Carbon::now(),
    ]);
return back();
  }
}
