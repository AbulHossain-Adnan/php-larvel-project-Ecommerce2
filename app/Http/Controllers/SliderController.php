<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use\Image;
use carbon\carbon;


class SliderController extends Controller
{
  function slider(){
    return view('admin/sliderr/slider');
  }
  function sliderpost(request $request){

$slider_id=Slider::insertGetId([
  'slider_title'=>$request->slider_title,
  'slider_description'=>$request->slider_description,
  'slider_photo'=>$request->slider_photo,
  'created_at'=>carbon::now(),
]);

 $uploaded_photo= $request->file('slider_photo');
 $new_photo_name=$slider_id.'.'.$uploaded_photo->getClientOriginalExtension();
$new_photo_location=base_path('public/uploads/slider_photos/'.$new_photo_name);
Image::make($uploaded_photo)->save($new_photo_location,100);

 Slider::find($slider_id)->update([
   'slider_photo'=>$new_photo_name
 ]);
 return back();






  }
}
