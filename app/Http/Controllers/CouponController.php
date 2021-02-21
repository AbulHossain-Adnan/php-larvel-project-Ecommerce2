<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coupon;
use Carbon\Carbon;

class CouponController extends Controller
{
    function coupon(){
      return view('admin/coupon/index',['coupons'=>Coupon::all()]);

        }
    function addcoupon(Request $request){
      $request->validate([
        'Coupon_name'=>'Required|unique:coupons,Coupon_name',
        'discount_amount'=>'Required',
        'validity_till'=>'Required'
      ]);
Coupon::insert([
'coupon_name'=>$request->Coupon_name,
'discount_amount'=>$request->discount_amount,
'validity_till'=>$request->validity_till,
'created_at' =>Carbon::now(),
],['coupon_name.required'=>'tumar copadfjlsd koi']);
return back();
        }



}
