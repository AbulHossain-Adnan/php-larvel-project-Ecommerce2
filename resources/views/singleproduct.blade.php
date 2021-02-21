
@extends('layouts.frontend_master')
@section('frontend_content')

<div class="single-product-area ptb-100">
       <div class="container">
           <div class="row">
               <div class="col-lg-6">
                   <div class="product-single-img">
                       <div class="product-active owl-carousel">
                           <div class="item">
                               <img src="{{asset('uploads/product_photos')}}/{{$product_info->product_thamnel_photo}}" alt="">
                           </div>

                           <?php foreach ($multiple_photos as $multiple_photo): ?>
                             <div class="item">
                                 <img src="{{asset('uploads/product_multiple_photoss')}}/{{$multiple_photo->photo_name}}" alt="">
                             </div>
                           <?php endforeach; ?>
                       </div>
                       <div class="product-thumbnil-active  owl-carousel">



                         <div class="item">
                             <img src="{{asset('uploads/product_photos')}}/{{$product_info->product_thamnel_photo}}" alt="">
                         </div>


                         <?php foreach ($multiple_photos as $multiple_photo): ?>
                           <div class="item">
                               <img src="{{asset('uploads/product_multiple_photoss')}}/{{$multiple_photo->photo_name}}" alt="">
                           </div>
                         <?php endforeach; ?>


                       </div>
                   </div>
               </div>


                   <div class="product-single-content">
                       <h3>{{$product_info->product_name}}</h3>
                       Available quantity:{{$product_info->product_quantity}}
                       <div class="rating-wrap fix">
                           <span class="pull-left">${{$product_info->product_price}}</span>
                           <ul class="rating pull-right">
                               <li><i class="fa fa-star"></i></li>
                               <li><i class="fa fa-star"></i></li>
                               <li><i class="fa fa-star"></i></li>
                               <li><i class="fa fa-star"></i></li>
                               <li><i class="fa fa-star"></i></li>
                               <li>(05 Customar Review)</li>
                           </ul>
                       </div>
                       <p>{{$product_info->product_sort_description}}</p>

                       <ul class="input-style">
                         <form class="" action="{{url('add/cart')}}" method="post">
                           @csrf
                              <input type="hidden" name='product_id' value="{{$product_info->id}}" >
                              @if(session('sorry_msg'))
                              <div class="alert alert-danger">
                                {{(session('sorry_msg'))}}

                              </div>
                              @endif
                           <li class="quantity cart-plus-minus">


                               <input type="text" value=1 name='quantity'>
                           </li>
                           <li><button class="btn btn-danger">Add to Cart</button></li>
                           </form>
                       </ul>
                       <ul class="cetagory">
                           <li>Categories:</li>
                           <li><a href="#">{{$product_info->product_name}}</a></li>
                       </ul>

                       <ul class="socil-icon">
                           <li>Share :</li>
                           <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                           <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                           <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                           <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                           <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                       </ul>
                   </div>
               </div>
           </div>
           <div class="row mt-60">
               <div class="col-12">
                   <div class="single-product-menu">
                       <ul class="nav">
                           <li><a class="active" data-toggle="tab" href="#description">Description</a> </li>
                           <li><a data-toggle="tab" href="#tag">Faq</a></li>
                           <li><a data-toggle="tab" href="#review">Review</a></li>
                       </ul>
                   </div>
               </div>
               <div class="col-12">
                   <div class="tab-content">
                       <div class="tab-pane active" id="description">
                           <div class="description-wrap">

                               <p>{{$product_info->product_logng_description}} </p>
                           </div>
                       </div>

                       <div class="tab-pane" id="tag">
                         <div class="faq-wrap" id="accordion">
                           <?php foreach ($faqs as $faq): ?>
                                                        <div class="card">
                                                            <div class="card-header" id="headingOne">
                                                                <h5><button data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">{{$faq->question}}?</button> </h5>
                                                            </div>
                                                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                                                <div class="card-body">
                                                                  {{$faq->faq_ans}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                            <?php endforeach; ?>
                                                    </div>

                      </div>
                       <div class="tab-pane" id="review">
                           <div class="review-wrap">
                               <ul>
                                  <?php foreach ($reviews as $review): ?>
                                   <li class="review-items">
                                       <div class="review-content">
                                           <h3><a href="#">{{$review->name}}</a></h3>
                                           <span>{{$review->created_at}}</span>
                                           <p>{{$review->review}}</p>
                                           <ul class="rating">


                              {{$review->star}}


                                               <li><i class="fa fa-star"></i></li>


                                           </ul>
                                       </div>
                                   </li>
                                 <?php endforeach; ?>


                               </ul>
                           </div>
                           <form class="" action="{{url('review/post')}}" method="post">
                             @csrf
                           <div class="add-review">
                               <h4>Add A Review</h4>
                               <div class="ratting-wrap">
                                   <table>
                                       <thead>
                                           <tr>
                                               <th>task</th>
                                               <th>1 Star</th>
                                               <th>2 Star</th>
                                               <th>3 Star</th>
                                               <th>4 Star</th>
                                               <th>5 Star</th>
                                           </tr>
                                       </thead>
                                       <tbody>
                                           <tr>
                                               <td>How Many Stars?</td>


                                               <td>
                                                   <input type="radio" name="star" value="1" />
                                               </td>
                                               <td>
                                                   <input type="radio" name="star" value="2" />
                                               </td>
                                               <td>
                                                   <input type="radio" name="star" value="3" />
                                               </td>
                                               <td>
                                                   <input type="radio" name="star" value="4" />
                                               </td>
                                               <td>
                                                   <input type="radio" name="star" value="5" />
                                               </td>
                                           </tr>
                                       </tbody>
                                   </table>
                               </div>
                               <div class="row">
                                   <div class="col-md-6 col-12">
                                       <h4>Name:</h4>
                                       <input type="text" name="name" placeholder="Your name here..." />
                                   </div>
                                   <div class="col-md-6 col-12">
                                       <h4>Email:</h4>
                                       <input type="email" name="email" placeholder="Your Email here..." />
                                   </div>
                                   <div class="col-12">
                                       <h4>Your Review:</h4>
                                       <textarea name="review" id="massage" cols="30" rows="10" placeholder="Your review here..."></textarea>
                                   </div>
                                   <div class="col-12">
                                       <button type="submit" class="btn-style">Submit</button>
                                   </div>

                               </div>
                           </div>
                         </form>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
   <!-- single-product-area end-->
   <!-- featured-product-area start -->
   <div class="featured-product-area">
       <div class="container">
           <div class="row">
               <div class="col-12">
                   <div class="section-title text-left">
                       <h2>Related Product</h2>
                   </div>
               </div>
           </div>
           <div class="row">
               <div class="col-lg-3 col-sm-6 col-12">
                   <div class="featured-product-wrap">
                       <div class="featured-product-img">
                           <img src="assets/images/product/1.jpg" alt="">
                       </div>
                       <div class="featured-product-content">
                           <div class="row">
                               <div class="col-7">
                                   <h3><a href="shop.html">Nature Honey</a></h3>
                                   <p>$219.56</p>
                               </div>
                               <div class="col-5 text-right">
                                   <ul>
                                       <li><a href="cart.html"><i class="fa fa-shopping-cart"></i></a></li>
                                       <li><a href="cart.html"><i class="fa fa-heart"></i></a></li>
                                   </ul>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
               <div class="col-lg-3 col-sm-6 col-12">
                   <div class="featured-product-wrap">
                       <div class="featured-product-img">
                           <img src="assets/images/product/2.jpg" alt="">
                       </div>
                       <div class="featured-product-content">
                           <div class="row">
                               <div class="col-7">
                                   <h3><a href="shop.html">Olive Oil</a></h3>
                                   <p>$354.75</p>
                               </div>
                               <div class="col-5 text-right">
                                   <ul>
                                       <li><a href="cart.html"><i class="fa fa-shopping-cart"></i></a></li>
                                       <li><a href="cart.html"><i class="fa fa-heart"></i></a></li>
                                   </ul>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
               <div class="col-lg-3 col-sm-6 col-12">
                   <div class="featured-product-wrap">
                       <div class="featured-product-img">
                           <img src="assets/images/product/3.jpg" alt="">
                       </div>
                       <div class="featured-product-content">
                           <div class="row">
                               <div class="col-7">
                                   <h3><a href="shop.html">Sunrise Oil</a></h3>
                                   <p>$214.80</p>
                               </div>
                               <div class="col-5 text-right">
                                   <ul>
                                       <li><a href="cart.html"><i class="fa fa-shopping-cart"></i></a></li>
                                       <li><a href="cart.html"><i class="fa fa-heart"></i></a></li>
                                   </ul>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
               <div class="col-lg-3 col-sm-6 col-12">
                   <div class="featured-product-wrap">
                       <div class="featured-product-img">
                           <img src="assets/images/product/4.jpg" alt="">
                       </div>
                       <div class="featured-product-content">
                           <div class="row">
                               <div class="col-7">
                                   <h3><a href="shop.html">Coconut Oil</a></h3>
                                   <p>$241.00</p>
                               </div>
                               <div class="col-5 text-right">
                                   <ul>
                                       <li><a href="cart.html"><i class="fa fa-shopping-cart"></i></a></li>
                                       <li><a href="cart.html"><i class="fa fa-heart"></i></a></li>
                                   </ul>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>

@endsection
