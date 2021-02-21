<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Category;
use App\Slider;
use App\Product;
class FrontendCrontroller extends Controller
{
    function about(){
      return view('about');
    }
    function index(){
      $categories=Category::all();
      $sliders=Slider::all();
      $products=Product::all();


return view('index', compact('categories','sliders','products'));
    }
    function shop(){
      $categories=Category::all();
      $products=Product::all();
      return view('shopp',compact('categories','products'));
    }
}
