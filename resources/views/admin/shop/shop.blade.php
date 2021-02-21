
@extends('layouts.frontend_master')
@section('frontend_content')
<div class="product-area pt-100">
      <div class="container">
          <div class="row">
              <div class="col-sm-12 col-lg-12">
                  <div class="product-menu">
                      <ul class="nav justify-content-center">
                          <li>
                              <a class="active" data-toggle="tab" href="#all">All product</a>
                          </li>
                          <li>
                            <?php foreach ($categories as $categori): ?>
                              <a data-toggle="tab" href="#category_{{$categori->id}}">{{$categori->category_name}}</a>
                            <?php endforeach; ?>

                          </li>

                      </ul>
                  </div>
              </div>
          </div>
          <div class="tab-content">
            <?php foreach ($products as $product): ?>
              <div class="tab-pane active" id="all">
                  <ul class="row">
                      <li class="col-xl-3 col-lg-4 col-sm-6 col-12">
                          <div class="product-wrap">
                              <div class="product-img">
                                  <span>Sale</span>
                                  <img src="{{asset('uploads/product_photos')}}/{{$product->product_thamnel_photo}}" alt="">
                                  <div class="product-icon flex-style">
                                      <ul>
                                          <li><a data-toggle="modal" data-target="#exampleModalCenter" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                          <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                                          <li><a href="cart.html"><i class="fa fa-shopping-bag"></i></a></li>
                                      </ul>
                                  </div>
                              </div>
                              <div class="product-content">
                                  <h3><a href="{{asset('product/details')}}/{{$product->id}}">{{$product->product_name}}</a></h3>
                                  <p class="pull-left">${{$product->product_price}}

                                  </p>
                                  <ul class="pull-right d-flex">
                                      <li><i class="fa fa-star"></i></li>
                                      <li><i class="fa fa-star"></i></li>
                                      <li><i class="fa fa-star"></i></li>
                                      <li><i class="fa fa-star"></i></li>
                                      <li><i class="fa fa-star-half-o"></i></li>
                                  </ul>
                              </div>
                          </div>
                      </li>
                    <?php endforeach; ?>
                  </ul>
              </div>
              <?php foreach ($categories as $categori): ?>
                <div class="tab-pane" id="category_{{$categori->id}}">
                    <ul class="row">
<?php foreach (App\product::where('category_id',$categori->id)->get() as $categori): ?>
  <li class="col-xl-3 col-lg-4 col-sm-6 col-12">
      <div class="product-wrap">
          <div class="product-img">
              <span>Sale</span>
              <img src="{{asset('uploads/product_photos')}}/{{$categori->product_thamnel_photo}}" alt="">
              <div class="product-icon flex-style">
                  <ul>
                      <li><a data-toggle="modal" data-target="#exampleModalCenter" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                      <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                      <li><a href="cart.html"><i class="fa fa-shopping-bag"></i></a></li>
                  </ul>
              </div>
          </div>
          <div class="product-content">
              <h3><a href="single-product.html">{{$categori->product_name}}</a></h3>
              <p class="pull-left">${{$categori->product_price}}
              </p>
              <ul class="pull-right d-flex">
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star-half-o"></i></li>
              </ul>
          </div>
      </div>
  </li>
<?php endforeach; ?>
                    </ul>
                </div>
              <?php endforeach; ?>


          </div>
      </div>
  </div>
  <!-- product-area end -->
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
@endsection
