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
                                    <th>Seri num</th>
                                    <th>Cate name</th>
                                    <th>Add by</th>
                                    <th>Creat at</th>
                                    <th>updat at</th>
                                    <th>cate pho</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @php
                                $serial_num=1;
                                @endphp
                                @forelse ($categorys as $category )

                                <tr>
                                    <td>{{ $serial_num++ }}</td>
                                    <td>{{$category->category_name}}</td>
                                    <td>{{App\User::find($category->user_id)->name}}</td>
                                    <td>
                                        @if ($category->created_at)
                                        {{ $category->created_at->diffForHumans()}}
                                        @else
                                        No time to show
                                        @endif
                                    </td>
                                    <td>
                                        @if ($category->updated_at)
                                        {{ $category->updated_at->diffForHumans()}}
                                        @else
                                        ----
                                        @endif
                                    </td>
                                    <td>
                                        <img src="{{ asset('uploads/categorys_photos') }}/{{ $category->category_photo }} " width=50 alt="">
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{url('update/category') }}/{{ $category->id }}" type="button" class="btn btn-info btn-sm text-white">Update</a>
                                            <a href="{{url('delete/category') }}/{{ $category->id }}" type="button" class="btn btn-warning btn-sm "><i class="fa fa-trash" aria-hidden="true"></i>Trash</a>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="50" class="text-center text-danger">No data to show</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card mt-5 text-center">
                    <div class="card-header bg-danger">
                        Category deleted list
                    </div>
                    <div class="card-body ">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Serial_num</th>
                                    <th>Cate_name</th>
                                    <th>Added_by</th>
                                    <th>Create_at</th>
                                    <th>updated_at</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $serial_num=1;
                                @endphp
                                @forelse ($deleted_category as $category )
                                <tr>
                                    <td>{{ $serial_num++ }}</td>
                                    <td>{{$category->category_name}}</td>
                                    <td>{{App\User::find($category->user_id)->name}}</td>
                                    <td>
                                        @if ($category->created_at)
                                        {{ $category->created_at->diffForHumans()}}
                                        @else
                                        No time to show
                                        @endif
                                    </td>
                                    <td>
                                        @if ($category->updated_at)
                                        {{ $category->updated_at->diffForHumans()}}
                                        @else
                                        ----
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{url('restore/category') }}/{{ $category->id }}" type="button" class="btn btn-info btn-sm text-white">Restore</a>
                                            <a href="{{url('harddelete/category') }}/{{ $category->id }}" type="button" class="btn btn-danger btn-sm "><i class="fa fa-trash" aria-hidden="true"></i>Delete</a>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="50" class="text-center text-danger">No data to show</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="card-body">
                        </div>
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
                            <form action="{{ url('add/category/post') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">add category</label>
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
                                <button href="" type="submit" class="btn btn-success">Add category</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>








    @endsection
