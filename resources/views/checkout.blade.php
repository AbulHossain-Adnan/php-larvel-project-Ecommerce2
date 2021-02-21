@extends('layouts.frontend_master')
@section('frontend_content')
<div class="breadcumb-area bg-img-4 ptb-100">
       <div class="container">
           <div class="row">
               <div class="col-12">
                   <div class="breadcumb-wrap text-center">
                       <h2>Checkout</h2>
                       <ul>
                           <li><a href="index.html">Home</a></li>
                           <li><span>Checkout</span></li>
                       </ul>
                   </div>
               </div>
           </div>
       </div>
   </div>
   <!-- .breadcumb-area end -->
   <!-- checkout-area start -->
   <div class="checkout-area ptb-100">
       <div class="container">
           <div class="row">
               <div class="col-lg-8">
                   <div class="checkout-form form-style">
                       <h3>Billing Details</h3>
                       <form action="{{url('checkout/post')}}" method="post">

                           <div class="row">

                               @csrf
                               <div class="col-sm-6 col-12">
                                 @error ('name')
                                 <span class="text-danger">
                                     {{ $message }}
                                 </span>
                                 @enderror
                                   <p>full Name *</p>
                                   <input type="text" name="name" value="{{Auth::user()->name}}">
                               </div>

                               <div class="col-sm-6 col-12">
                                 @error ('email')
                                 <span class="text-danger">
                                     {{ $message }}
                                 </span>
                                 @enderror
                                   <p>Email Address *</p>
                                   <input type="email" name="email" value="{{Auth::user()->email}}">
                               </div>
                               <div class="col-sm-6 col-12">
                                 @error ('phone_number')
                                 <span class="text-danger">
                                     {{ $message }}
                                 </span>
                                 @enderror
                                   <p>Phone No. *</p>
                                   <input type="text" name="phone_number">
                               </div>
                               <div class="col-12">
                                 @error ('country')
                                 <span class="text-danger">
                                     {{ $message }}
                                 </span>
                                 @enderror
                                   <p>Country *</p>
                                   <input type="text" name="country">
                               </div>
                               <div class="col-12">
                                 @error('address')
                                 <span class="text-danger">
                                   {{$message}}
                                 </span>
                                 @enderror
                                   <p>Your Address *</p>
                                   <input type="text" name="address">
                               </div>
                               <div class="col-sm-6 col-12">
                                 @error ('postcode')
                                 <span class="text-danger">
                                     {{ $message }}
                                 </span>
                                 @enderror
                                   <p>Postcode/ZIP</p>
                                   <input type="text" name="postcode">
                               </div>

                               <div class="col-12">
                                 @error ('massage')
                                 <span class="text-danger">
                                     {{ $message }}
                                 </span>
                                 @enderror
                                   <p>Order Notes </p>
                                   <textarea name="massage" placeholder="Notes about Your Order, e.g.Special Note for Delivery"></textarea>
                               </div>

                           </div>

                   </div>
               </div>
               <div class="col-lg-4">
                   <div class="order-area">
                       <h3>Your Order</h3>
                       <ul class="total-cost">
                         @php
                         $subtotal=0;
                         @endphp
                         <?php foreach ($carts as $cart): ?>
                           <li>{{App\Product::find($cart->product_id)->product_name}} x {{$cart->quantity}} <span class="pull-right">{{App\Product::find($cart->product_id)->product_price}} x {{$cart->quantity}}</span></li>
                           @php
                           $subtotal=$subtotal+(App\Product::find($cart->product_id)->product_price * $cart->quantity)
                           @endphp
                            <?php endforeach; ?>
                           <li>Subtotal <span class="pull-right"><strong>{{$subtotal}}</strong></span></li>
                           <input type="hidden" name="subtotal" value="{{$subtotal}}">
                           <li>Shipping <span class="pull-right">Free</span></li>
                           <li>discount_amount<span class="pull-right">{{$discount_amount ?? ''}}%</span></li>
                           <li>Total<span class="pull-right">{{$total=$subtotal-($subtotal * ($discount_amount/100))}}</span></li>
                           <input type="hidden" name="total" value="{{$total}}">
                       </ul>
                       @error ('payment_option')
                       <span class="text-danger">
                           {{ $message }}
                       </span>
                       @enderror
                       <ul class="payment-method">

                           <li>
                               <input id="card" type="radio" name="payment_option"value="1">
                               <label for="card">Credit Card</label>
                           </li>
                           <li>
                               <input id="delivery" type="radio" name="payment_option" value="2">
                               <label for="delivery">Cash on Delivery</label>
                           </li>
                       </ul>
                       <button type="submit" class="btn btn-danger">Place Order</button>
                     </form>
                   </div>
               </div>
           </div>
       </div>
   </div>
   <!-- checkout-area end -->
   <!-- start social-newsletter-section -->
   <section class="social-newsletter-section">
       <div class="container">
           <div class="row">
               <div class="col-lg-12">
                   <div class="newsletter text-center">
                       <h3>Subscribe  Newsletter</h3>
                       <div class="newsletter-form">
                           <form>
                               <input type="text" class="form-control" placeholder="Enter Your Email Address...">
                               <button type="submit"><i class="fa fa-send"></i></button>
                           </form>
                       </div>
                   </div>
               </div>
           </div>
       </div>
       <!-- end container -->
   </section>
   <!-- end social-newsletter-section -->
   <!-- .footer-area start -->
   <div class="footer-area">
       <div class="footer-top">
           <div class="container">
               <div class="footer-top-item">
                   <div class="row">
                       <div class="col-lg-12 col-12">
                           <div class="footer-top-text text-center">
                               <ul>
                                   <li><a href="home.html">home</a></li>
                                   <li><a href="#">our story</a></li>
                                   <li><a href="#">feed shop</a></li>
                                   <li><a href="blog.html">how to eat blog</a></li>
                                   <li><a href="contact.html">contact</a></li>
                               </ul>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
       <div class="footer-bottom">
           <div class="container">
               <div class="row">
                   <div class="col-lg-2 col-md-3 col-sm-12">
                       <div class="footer-icon">
                           <ul class="d-flex">
                               <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                               <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                               <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                               <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                           </ul>
                       </div>
                   </div>
                   <div class="col-lg-4 col-md-8 col-sm-12">
                       <div class="footer-content">
                           <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure righteous indignation and dislike</p>
                       </div>
                   </div>
                   <div class="col-lg-3 col-md-8 col-sm-12">
                       <div class="footer-adress">
                           <ul>
                               <li><a href="#"><span>Email:</span> domain@gmail.com</a></li>
                               <li><a href="#"><span>Tel:</span> 0131234567</a></li>
                               <li><a href="#"><span>Adress:</span> 52 Web Bangale , Adress line2 , ip:3105</a></li>
                           </ul>
                       </div>
                   </div>
                   <div class="col-lg-3 col-md-4 col-sm-12">
                       <div class="footer-reserved">
                           <ul>
                               <li>Copyright © 2019 Tohoney All rights reserved.</li>
                           </ul>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
@endsection
