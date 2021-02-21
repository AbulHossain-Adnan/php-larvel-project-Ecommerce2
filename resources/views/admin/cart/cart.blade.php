@extends('layouts.frontend_master')
@section('frontend_content')
<!-- .breadcumb-area start -->
  <div class="breadcumb-area bg-img-4 ptb-100">
      <div class="container">
          <div class="row">
              <div class="col-12">
                  <div class="breadcumb-wrap text-center">
                      <h2>Shopping Cart</h2>
                      <ul>
                          <li><a href="index.html">Home</a></li>
                          <li><span>Shopping Cart</span></li>
                      </ul>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- .breadcumb-area end -->
  <!-- cart-area start -->
  <div class="cart-area ptb-100">
      <div class="container">
          <div class="row">
              <div class="col-12">
                  <form action="{{url('cart/update')}}" method="post">
                    @csrf
                      <table class="table-responsive cart-wrap">
                          <thead>
                              <tr>
                                  <th class="images">Image</th>
                                  <th class="product">Product</th>
                                  <th class="ptice">Price</th>
                                  <th class="quantity">Quantity</th>
                                  <th class="total">Total</th>
                                  <th class="remove">Remove</th>
                              </tr>
                          </thead>
                          <tbody>
                            @php
                            $subtotal=0;
                            @endphp

                            <?php foreach (App\Carts::where('ip_address',request()->ip())->get() as $cart): ?>

                              <tr>
                                  <td class="images"><img src="{{asset('uploads/product_photos')}}/{{App\Product::find($cart->product_id)->product_thamnel_photo}}" alt=""></td>
                                  <td class="product"><a href="single-product.html">{{App\Product::find($cart->product_id)->product_name}}</a></td>
                                  <td class="ptice">{{App\Product::find($cart->product_id)->product_price}}</td>
                                  <td class="quantity cart-plus-minus">
                                      <input type="text" value="{{$cart->quantity}}" / name="cart_quantity[{{$cart->id}}]">
                                  </td>
                                  <td class="total">{{App\Product::find($cart->product_id)->product_price * $cart->quantity}}</td>
                                  @php
                                  $subtotal=$subtotal+(App\Product::find($cart->product_id)->product_price * $cart->quantity)
                                  @endphp
                                  <td class="remove">
                                    <a href="{{url('cart/delete')}}/{{$cart->id}}"><i class="fa fa-times"></i></a>


                                  </td>
                              </tr>

                        <?php endforeach; ?>
                          </tbody>
                      </table>
                      <div class="row mt-60">
                          <div class="col-xl-4 col-lg-5 col-md-6 ">
                              <div class="cartcupon-wrap">
                                  <ul class="d-flex">
                                      <li>
                                        <button type="submit">Update Cart</button>

                                          <!-- <button>Update Cart</button> -->
                                      </li>
                                    </form>
                                      <li><a href="{{url('shop')}}">Continue Shopping</a></li>
                                  </ul>
                                  <h3>Cupon</h3>
                                  <p>Enter Your Cupon Code if You Have One</p>
                                  <form class="" action="{{url('apply/coupon')}}" method="post">
                                    @csrf
                                    <div class="cupon-wrap">
                                        <input type="text" placeholder="Cupon Code" name="coupon_name">
                                        <button class="submit">Apply Cupon</button>
                                    </div>
                                      </form>
                                </div>

                          </div>
                          <div class="col-xl-3 offset-xl-5 col-lg-4 offset-lg-3 col-md-6">
                              <div class="cart-total text-right">
                                  <h3>Cart Totals</h3>
                                  <ul>
                                      <li><span class="pull-left">Subtotal </span>{{$subtotal}}</li>
                                    @isset($discount_amounts)
                                    <li><span class="pull-left">discount_amount </span> {{$discount_amounts}}%</li>
                                    @endisset
                                        <li><span class="pull-left"> Total </span> $380.00</li>
                                  </ul>
                                  <a href="checkout.html">Proceed to Checkout</a>
                              </div>
                          </div>
                      </div>

              </div>
          </div>
      </div>
  </div>
  <!-- cart-area end -->
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
@endsection()
