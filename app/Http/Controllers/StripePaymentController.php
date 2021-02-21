<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Session;
use Stripe;
use App\Order;
use Carbon\Carbon;
use App\Order_list;
use Auth;
use App\Carts;
use App\Product;
class StripePaymentController extends Controller
{

public function stripe()
{
    return view('stripe');
}
public function stripePost(Request $request)
{

    Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

    Stripe\Charge::create ([

            "amount" => $request->total * 100,

            "currency" => "bdt",

            "source" => $request->stripeToken,

            "description" => "Test payment from itsolutionstuff.com."
    ]);
    Session::flash('success', 'Payment successful!');


     $order_id=Order::insert([
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


}

}
