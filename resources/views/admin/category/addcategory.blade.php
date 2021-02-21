@extends('layouts.dashboard_master')
@section('content')
@section('addcategory')
active
@endsection
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <span class="breadcrumb-item active">Home</span>

    </nav>

    <div class="sl-pagebody">

        <div class="row row-sm">
            <div class="col-md-8 m-auto">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('category') }}">Category list</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Library</li>
                    </ol>
                </nav>
                <div class="card">
                    <div class="card-header text-center bg-info">
                        Add Category
                    </div>
                    <div class="card-body">
                        @if (session('success_message'))
                        <div class="alert alert-success">
                            {{ session('success_message') }}
                        </div>
                        @endif
                        <form action="{{ url('add/category/post') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Category name</label>
                                <input type="text" name="category_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="add category">
                                @error ('category_name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">add category Photo</label>
                                <input type="file" name="category_photo" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="add category photo">
                                @error ('category_photo')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </span>
                            </div>
                            <button href="{{ ('category') }}" type="submit" class="btn btn-success">Add category</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
