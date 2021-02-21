<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carts;
use Carbon\Carbon;
use App\Coupon;
use App\Product;

class CartController extends Controller
{
    function cart(request $request){
      if ($request->quantity <= Product::find($request->product_id)->product_quantity) {

        if (Carts::where('product_id',$request->product_id)->where('ip_address',$request->ip())->exists()) {
          Carts::where('product_id',$request->product_id)->where('ip_address',$request->ip())->increment('quantity',$request->quantity);
        return back();
        }
        else {
          Carts::insert([
            'product_id'=>$request->product_id,
            'quantity'=>$request->quantity,
            'ip_address'=>$request->ip(),
            'created_at'=>Carbon::now()
          ]);
            return back();
        }
      }
      else {
        return back()->with('sorry_msg','sorry amader stock a ato product nai');
      }

    }

    function addcart(Request $request){
      if ($request->coupon_name) {
        if (Coupon::where('coupon_name',$request->coupon_name)->exists()) {
          return view('cart',['discount_amount'=>Coupon::where('coupon_name',$request->coupon_name)->first()->discount_amount,
          'coupon_name'=>$request->coupon_name
        ]);
          if (Coupon::where('coupon_name',$request->coupon_name)->first()->validity_till >= Carbon::now()->format('Y-m-d')) {
          }
          else {
          return redirect('addcart');
          }
        }
        else {
        return redirect('addcart');
        }
      }
      else {
        return view('cart');
      }
}
    function cartdelete($cart_id){
Carts::find($cart_id)->delete();
return back();
    }
    function cartupdate(request $request){
foreach ($request->cart_quantity as $cart_id => $updated_cartquantity) {

  Carts::find($cart_id)->update([
    'quantity'=>$updated_cartquantity
  ]);
  return back();
}



}

// return back();
    }
