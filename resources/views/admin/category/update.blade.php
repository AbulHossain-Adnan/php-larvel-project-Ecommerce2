@extends('layouts.dashboard_master')
@section('content')
  <div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <span class="breadcrumb-item active">Home</span>
    </nav>
    <div class="sl-pagebody">
      <div class="row row-sm">
        <div class="col-md-6 m-auto">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('category') }}">Add Category</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{$category_name}}</li>
            </ol>
          </nav>
          <div class="card  bg-light mb-3" >
            <div class="card-header">Header</div>
            <div class="card-body">
              <h5 class="card-title">Primary card title</h5>

              <form action="{{ url('update/category/post') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label>Update category</label>
                  <input type="hidden" name="category_id" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $category_id }}">
                  <input type="text" name="category_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $category_name }}">
                </div>

                <div class="form-group">
                  <label >current category photo</label>

                  <img src="{{ asset('uploads/categorys_photos') }}/{{ $category_photo}}"width="200" alt="">
                </div>
                <div class="form-group">
                  <label >new category photo</label>

                  <input type="file" name="new_category_photo" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $category_name }}">

                </div>
                <button href="#" type="submit" class="btn btn-warning">Update category</button>
              </form>

            </div>
          </div>








@endsection
