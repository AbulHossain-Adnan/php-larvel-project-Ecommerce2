<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use auth;
use Hash;

class ProfileController extends Controller

{
  public function __construct()
  {
      $this->middleware('auth');
  }
    function index(){
      return view('admin/profile/profile');
    }
    function profilepost(Request $request){
    $request->validate([
      'name'=>'required'
    ]);
    User::find(auth::id())->update([
      'name' =>$request->name
    ]);
    return back()->with('update_message','your profile name update successfully');
    }
    // password validation
function password(Request $request){
  $request->validate([

    'old_password'=>'required',
    'password'=>'required|confirmed',
    'password_confirmation'=>'required'

  ]);
  if($request->old_password == $request->password){
     return back()->with('change_message','your old password and new cannot be same');

  }
  $old_password_from_user = $request->old_password;
  $old_password_from_db = auth::user()->password;

if(Hash::check($old_password_from_user,$old_password_from_db)){
  User::find(auth::id())->update([
    'password'=>Hash::make($request->password)
  ]);
}
else{
  return back()->with('password_err','Your old password and db password not same');
}
return back()->with('password_success','your password update successfully');
}
}
