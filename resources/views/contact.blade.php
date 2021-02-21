@extends('layouts.frontend_master')
@section('frontend_content')
  <!-- .breadcumb-area start -->
  <div class="breadcumb-area bg-img-4 ptb-100">
      <div class="container">
          <div class="row">
              <div class="col-12">
                  <div class="breadcumb-wrap text-center">
                      <h2>Contact Us</h2>
                      <ul>
                          <li><a href="index.html">Home</a></li>
                          <li><span>Contact</span></li>
                      </ul>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- .breadcumb-area end -->
  <!-- contact-area start -->
  <div class="google-map">
      <div class="contact-map">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d193595.9147703055!2d-74.11976314309273!3d40.69740344223377!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sbd!4v1547528325671" allowfullscreen></iframe>
      </div>
  </div>
  <div class="contact-area ptb-100">
   <div class="container">
       <div class="row">

           <div class="col-lg-8 col-12">
               <div class="contact-form form-style">
                   <div class="cf-msg"></div>
                   @if (session('success_mes'))
                   <div class="alert alert-success">
                       {{ session('success_mes') }}
                   </div>

                   @endif
                   <form action="{{ url('contactmessagepost') }}" method="post">
                       @csrf
                       <div class="row">

                           <div class="col-12 col-sm-6">
                               @error ('name')
                               <span class="text-danger">
                                   {{ $message }}
                               </span>
                               @enderror
                               <input type="text" placeholder="Name" id="fname" name="name">
                           </div>
                           <div class="col-12  col-sm-6">
                               @error ('email')
                               <span class="text-danger">
                                   {{ $message }}
                               </span>
                               @enderror
                               <input type="text" placeholder="Email" id="email" name="email">
                           </div>
                           <div class="col-12">
                               @error ('subject')
                               <span class="text-danger">
                                   {{ $message }}
                               </span>
                               @enderror
                               <input type="text" placeholder="Subject" id="subject" name="subject">
                           </div>
                           <div class="col-12">
                               @error ('message')
                               <span class="text-danger">
                                   {{ $message }}
                               </span>
                               @enderror
                               <textarea class="contact-textarea" placeholder="Message" id="msg" name="message"></textarea>
                           </div>
                           <div class="col-12">
                               <button id="submit" name="submit">SEND MESSAGE</button>
                           </div>
                       </div>
                   </form>
               </div>
           </div>
           <div class="col-lg-4 col-12">
               <div class="contact-wrap">
@if(isset($informations))
@foreach ($informations as $information)
@endforeach

                 <ul>
                       <li>
                           <i class="fa fa-home"></i> Address:
                           <p>{{ $information->address }}</p>
                       </li>
                       <li>
                           <i class="fa fa-phone"></i> Email address:
                           <p>
                               <span>
                                   {{ $information->email }} </span>
                               <span>
                                   {{ $information->email }}</span>
                           </p>
                       </li>
                       <li>
                           <i class="fa fa-envelope"></i> phone number:
                           <p>
                               <span>{{ $information->phone_num }}</span>
                               <span>{{ $information->email}}</span>
                           </p>
                       </li>
                   </ul>
@endif
               </div>
           </div>
       </div>
   </div>
</div>
@endsection
