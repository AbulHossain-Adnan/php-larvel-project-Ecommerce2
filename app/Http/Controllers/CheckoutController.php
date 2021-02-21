<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\carts;
use App\Order_list;
use App\Product;
use App\Order;
use Carbon\Carbon;



class CheckoutController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
    function checkout(Request $request){

      if (Auth::user()->roll == 1) {
        echo "you are an admin so you can not bye";
      }
      else {
        return view('checkout',[
          'carts'=>Carts::where('ip_address',request()->ip())->get(),
          'discount_amount'=>$request->discount_amount
        ]);
      }
    }
    function checkoutpost(Request $request){
      $request->validate([
        'name'=>'required',
        'email'=>'required',
        'phone_number'=>'required',
        'country'=>'required',
        'address'=>'required',
        'postcode'=>'required',
        'massage'=>'required',
        'payment_option'=>'required',
        'subtotal'=>'required',
      ]);

      $order_id= Order::insertGetId([
        'name'=>$request->name,
        'email'=>$request->email,
        'phone_number'=>$request->phone_number,
        'country'=>$request->country,
        'address'=>$request->address,
        'postcode'=>$request->postcode,
        'massage'=>$request->massage,
        'payment_option'=>$request->payment_option,
        'subtotal'=>$request->subtotal,
        'total'=>$request->total,
        'created_at'=>Carbon::now(),
      ]);
      foreach (Carts::where('ip_address',request()->ip())->get() as $cart) {
        if ($request->payment_option == 2) {
          Order_list::insert([
            'order_id'=>$order_id,
            'user_id'=>Auth::user()->id,
            'product_id'=>$cart->product_id,
            'quantity'=>$cart->quantity,
            'created_at'=>Carbon::now(),
          ]);
          Product::find($cart->product_id)->decrement('product_quantity',$cart->quantity);
          Carts::find($cart->id)->delete();
          return redirect('/');
        }
        else {
          return view('stripe',
        [
          'totals'=>$request->all()
        ]);

        }

    }
    }
}
