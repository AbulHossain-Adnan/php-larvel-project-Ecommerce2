<?php

  namespace App\Http\Controllers;

  use Illuminate\Http\Request;
  use App\Category;
  use App\Product;
  use Auth;
  use Carbon\Carbon;
  use\Image;

  class CategoryController extends Controller
{
  // public function __construct()
  // {
  //     $this->middleware('auth');
  // }


    function addcategory(){
      $categorys = Category::all();

      $deleted_category= Category::onlyTrashed()->get();
      return view('admin/category/index',compact('categorys','deleted_category'));
      }

      function addcategorypost(request $request)
      {
        $request->validate([
          'category_name'=> 'required|unique:categories,category_name',
          'category_photo'=>'required|image'
        ],[
             'category_name.required' =>'tumar category koi',
          'category_name.unique'=>'this category is already taken hahaha'
        ]);
          $category_id = Category::insertGetId([
          'category_name' => $request->category_name,
          'category_photo' => $request->category_name,
          'user_id' =>Auth::user()->id,
          'created_at' => Carbon::now()
        ]);
        $upload_photo = $request->file('category_photo');
        $new_photo_name=$category_id.'.'.$upload_photo->getClientOriginalExtension();
        $new_photo_location= base_path('public/uploads/categorys_photos/'.$new_photo_name);

        Image::make($upload_photo)->resize(600,470)->save($new_photo_location ,100);
        Category::find($category_id)->update([
          'category_photo'=>$new_photo_name
        ]);


        return back()->with('success_message','new category insert successfully');
      }

      function updatecategory($category_id){

      $category_name = Category::find($category_id)->category_name;
     $category_photo = Category::find($category_id)->category_photo;
      return view('admin\category\update',compact('category_name','category_id' ,'category_photo'));
  }
  function updatecategorypost(Request $request){
    if($request->hasfile('new_category_photo')){


             $old_photo_delet= base_path('public/uploads/categorys_photos/'.Category::find($request->category_id)->category_photo);
            unlink($old_photo_delet);

            $upload_photo = $request->file('new_category_photo');
            $new_photo_name=$request->category_id.'.'.$upload_photo->getClientOriginalExtension();
            $new_photo_location= base_path('public/uploads/categorys_photos/'.$new_photo_name);

            Image::make($upload_photo)->resize(600,470)->save($new_photo_location ,100);
            Category::find($request->category_id)->update([
              'category_photo'=>$new_photo_name
            ]);

    }



    //
    Category::find($request->category_id)->update([
      'category_name'=>$request->category_name
    ]);
    return redirect('category')->with('category_update','Category name update successfully');
  }

  function deletecategory($category_id){
    Category::find($category_id)->delete();
    return redirect('category')->with('category_delete','Category moved in trash successfully');
  }
  function restorecategory($category_id){

    Category::withTrashed()->find($category_id)->restore();
    return redirect('category')->with('restore_category','Category restore successfully');
  }
  function harddeletecategory($category_id){

      $new_photo_delet= base_path('public/uploads/categorys_photos/'.Category::onlyTrashed()->find($category_id)->category_photo);
    //
    Category::onlyTrashed()->find($category_id)->forceDelete();
    unlink($new_photo_delet);
    return redirect('category')->with('harddelete_category','Category forced deleted successfully');
  }
  function addedcategory(){
  return  view('admin/category/addcategory');

  }
  // function getcontact(){
  //   return view('contact');
  // }

  }
