 @extends('layouts.dashboard_master')
@section('content')
@section('slider')
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
                        <form action="{{ url('slider/post') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">slider title</label>
                                <input type="text" name="slider_title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="type your slider title">
                                @error ('category_photo')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">slider description</label>
                                <textarea name="slider_description"></textarea>

                                @error ('category_photo')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </span>
                            </div>
                            <div class="form-group">
                              <label for="exampleInputEmail1">slider_photo</label>
                              <input type="file" name="slider_photo" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="select your slider photo">
                              @error ('category_name')
                                <span class="text-danger">{{ $message }}</span>
                              @enderror
                            </span>
                          </div>
                            <button href="{{ url('slider/post') }}" type="submit" class="btn btn-success">Add category</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
