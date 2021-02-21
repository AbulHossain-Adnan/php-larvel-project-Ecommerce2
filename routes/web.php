<?php
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/','FrontendCrontroller@index');
Route::get('about','FrontendCrontroller@about');
Route::get('about','FrontendCrontroller@about');
Route::get('shop','FrontendCrontroller@shop');
Route::get('shopp','FrontendCrontroller@shopp');
// Route::get('/product/details/{product_id}','FrontendCrontroller@productdetails');

// Route::get('/', function () {
//     return view('welcome');
// });
Auth::routes();
// (['verify' => true])
Route::get('/home', 'HomeController@index')->name('home');

// ->middleware('verified');
Route::get('/category', 'CategoryController@addcategory');
Route::get('/contact', 'ContactController@contact');
Route::POST('/add/category/post', 'CategoryController@addcategorypost');
Route::get('/addcategory', 'CategoryController@addedcategory');
Route::get('/update/category/{categori_id}','CategoryController@updatecategory');
Route::POST('/update/category/post', 'CategoryController@updatecategorypost');
Route::get('/delete/category/{categori_id}', 'CategoryController@deletecategory');
Route::get('/restore/category/{categori_id}', 'CategoryController@restorecategory');
Route::get('/harddelete/category/{categori_id}', 'CategoryController@harddeletecategory');
Route::get('/profile', 'ProfileController@index');
Route::POST('/profile/post', 'ProfileController@profilepost');
Route::POST('/password/post', 'ProfileController@password');
Route::POST('contactmessagepost', 'ContactController@contactmessagepost');
Route::get('contactmessage', 'ContactController@getcontact');
Route::get('contactinformationpost', 'ContactController@contactinformation');
Route::POST('add/contactinformation/post', 'ContactController@contactinformationpost');
Route::get('/slider', 'SliderController@slider');
Route::POST('slider/post', 'SliderController@sliderpost');
// start product controller
Route::get('/product', 'ProductController@product');
Route::POST('/productpost', 'ProductController@productpost');
Route::get('/product/details/{product_id}','ProductController@productdetail');
// end product controller
// start cart controller
Route::get('addcart','CartController@addcart');
Route::Post('add/cart','CartController@cart');
Route::get('cart/delete/{cart_id}','CartController@cartdelete');
Route::POST('cart/update','CartController@cartupdate');
Route::POST('cart','CartController@addcart');
// end cart controller
// coupon controller started
Route::get('coupon','CouponController@coupon');
Route::POST('add/coupon','CouponController@addcoupon');
// coupon controller end
// checkout controller started
Route::POST('checkout','CheckoutController@checkout');
Route::get('checkout','CheckoutController@checkout');

Route::POST('checkout/post','CheckoutController@checkoutpost');
// checkout controller end
// custmer register started
Route::get('Customer_register','CustomerController@Customer_register');
Route::POST('Customer_register_post','CustomerController@Customer_register_post');
// customer register end
// started order controller
// Route::POST('order','OrderController@order');
// end order orderController
// faq controller started
Route::get('add/faq','FaqController@faq');
Route::POST('faq/post','FaqController@faqpost');
Route::POST('review/post','FaqController@reviewpost');
// faq controller end
// start stripe controller
Route::get('stripe', 'StripePaymentController@stripe');
Route::post('stripe', 'StripePaymentController@stripePost')->name('stripe.post');
