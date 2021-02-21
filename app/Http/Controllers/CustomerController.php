<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;
use Hash;

class CustomerController extends Controller
{
  function Customer_register(){
    return view('admin/Customer_register/index');
  }
  function Customer_register_post(Request $request){
    User::insert([
      'name'=>$request->full_name,
      'email'=>$request->email,
      'password'=>Hash::make($request->password),
      'roll'=>2,
      'created_at'=>Carbon::now()
    ]);
    return redirect('login');
  }
}
