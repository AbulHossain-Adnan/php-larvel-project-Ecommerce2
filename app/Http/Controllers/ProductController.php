<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use Carbon\carbon;
use App\Product_multiple_photos;
use Image;
use App\Faq;
use App\Review;
class ProductController extends Controller
{
  function product(){
    return view('admin/product/product',
  ['categoris'=>Category::all(),'products'=>Product::all()]);
  }
function productpost(request $request){
  $product_id=Product::insertGetId([
    'product_name'=>$request->product_name,
    'category_id'=>$request->category_id,
    'product_price'=>$request->product_price,
    'product_quantity'=>$request->product_quantity,
    'product_thamnel_photo'=>'product_thamnel_photo',
    'product_sort_description'=>$request->product_sort_description,
    'product_logng_description'=>$request->product_long_description,
    'created_at'=>Carbon::now()
  ]);
  // photo upload start
  $uploded_photo=$request->file('product_thamnel_photo');
$new_name=$product_id.".".$uploded_photo->getClientOriginalExtension();
$image_new_location=base_path('public/uploads/product_photos/'.$new_name);
Image::make($uploded_photo)->resize(600,620)->save($image_new_location,100);
Product::find($product_id)->update([
  'product_thamnel_photo'=>$new_name
]);
$sum=1;
    foreach ($request->file('product_multiple_photos') as $product_multiple_photo) {
  $uploded_photo=$product_multiple_photo;
$new_namee=$product_id."-".$sum.".".$uploded_photo->getClientOriginalExtension();
$image_new_location=base_path('public/uploads/product_multiple_photoss/'.$new_namee);
Image::make($uploded_photo)->resize(600,620)->save($image_new_location,100);

$sum++;
product_multiple_photos::insert([
  'product_id'=>$product_id,
  'photo_name'=>$new_namee,
  'created_at'=>Carbon::now()
]);
    }
return back();
}
function productdetail($product_id){

  return view('singleproduct',[
    'product_info'=>Product::find($product_id),
    'multiple_photos'=>Product_multiple_photos::where('product_id',$product_id)->get(),
    'faqs'=>Faq::all(),
    'reviews'=>Review::all(),
  

  ]);
}
function reviewpost(request $request){
  print_r($request->star);

}

}
