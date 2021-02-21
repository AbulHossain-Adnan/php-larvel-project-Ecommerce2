

@extends('layouts.dashboard_master')
@section('content')
@section('category')
active
@endsection

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <span class="breadcrumb-item active">add category</span>
        <a class="breadcrumb-item" href="{{url('home')}}"> Home</a>
    </nav>
    <div class="sl-pagebody">
        <div class="row row-sm">
            @if (session('harddelete_category'))
            <div class="col-md-8">
                <div class="alert alert-danger">
                    {{ session('harddelete_category') }}
                </div>
            </div>
            @endif
            @if (session('restore_category'))
            <div class="col-md-8 text-center">
                <div class="alert alert-success">
                    {{ session('restore_category') }}
                </div>
            </div>
            @endif
            @if (session('category_update'))
            <div class="col-md-5 text-center">
                <div class="alert alert-success">
                    {{session('category_update')}}
                </div>
            </div>
            @endif
            @if (session('category_delete'))
            <div class="col-md-8 text-center">
                <div class="alert alert-success">
                    {{session('category_delete')}}
                </div>
            </div>
            @endif
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center bg-info">
                        list category(active)
                    </div>
                    <div class="card-body ">
                        <table class="table table-bordered">
                            <thead>
                                <tr>

                                    <th>product name</th>
                                    <th>category name</th>
                                    <th>product price</th>
                                    <th>product quantity</th>
                                    <th>photo</th>
                                    <th>sort descript</th>
                                    <th>long descript</th>



                                </tr>
                            </thead>
                            <tbody>
                              <?php foreach ($products as $product): ?>
                              <tr>
                                <td>{{$product->product_name}}</td>
                                <td>{{App\category::find($product->category_id)->category_name}}</td>



                                <td>{{$product->product_price}}</td>
                                <td>{{$product->product_quantity}}</td>
                                <td>
                                <img src="{{asset('uploads/product_photos/')}}/{{$product->product_thamnel_photo}}" alt="" width='100'>
                                </td>
                                <td>{{$product->product_sort_description}}</td>
                                <td>{{$product->product_logng_description}}</td>

            </tr>
            <?php endforeach; ?>


            </tbody>
            </table>
            </div>
            </div>

            </div>

  <div class="col-md-4">
      <div class="card">
          <div class="card-header">
              add category
              <div class="card-body">
                  @if (session('success_message'))
                  <div class="alert alert-success">
                      {{ session('success_message') }}
                  </div>
                  @endif
                  <form action="{{ url('/productpost') }}" method="post" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                          <label for="exampleInputEmail1">product name</label>
                          <input type="text" name="product_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="add product name">
                      </div>
                      <div class="form-group">
                          <label>category name</label>
                          <select class="form-control" name="category_id">
                            <option value="">select one</option>
                            <?php foreach ($categoris as $categori): ?>


                            <option value="{{$categori->id}}">{{$categori->category_name}}</option>
                          <?php endforeach; ?>
                          </select>


                      </div>
                      <div class="form-group">
                          <label for="exampleInputEmail1">product price</label>
                          <input type="text" name="product_price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="add product price">

                      </div>

                      <div class="form-group">
                          <label for="exampleInputEmail1">product quantity</label>
                          <input type="text" name="product_quantity" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="add product quantity">

                      </div>
                      <div class="form-group">
                          <label for="exampleInputEmail1">product thamnel photo</label>
                          <input type="file" name="product_thamnel_photo" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="add category">

                      </div>
                      <div class="form-group">
                          <label for="exampleInputEmail1">product multiple photo</label>
                          <input type="file" name="product_multiple_photos[]" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="add category" multiple>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputEmail1">product sort description</label>
                          <textarea name="product_sort_description" ></textarea>

                      </div>
                      <div class="form-group">
                          <label for="exampleInputEmail1">product long description</label>
                          <textarea name="product_long_description" ></textarea>

                      </div>
                      <button href="" type="submit" class="btn btn-success">Add Product</button>
                  </form>

          </div>
      </div>
  </div>
</div>
            </div>
            </div>
            </div>
            @endsection
