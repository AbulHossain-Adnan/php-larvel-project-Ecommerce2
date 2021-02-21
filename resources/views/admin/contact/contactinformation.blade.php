@extends('layouts.dashboard_master')
@section('content')
  @section('contact')
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
                        <form action="{{ url('add/contactinformation/post') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">adress</label>
                                <input type="text" name="address" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="enter your address information">
                                {{-- <span class="text-danger">{{ $message }}</span> --}}
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="type your email adress">

                                </span>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Phone_num</label>
                                <input type="text" name="phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="type your phone number">

                            </div>
                            <button href="{{ ('category') }}" type="submit" class="btn btn-success">Submit</button>
                        </form>
                    </div>

                </div>


            </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-md-8 m-auto">
              <div class="card mt-5 text-center">
                  <div class="card-header bg-danger">
                      Category deleted list
                  </div>
                  <div class="card-body ">
                      <table class="table table-bordered">
                          <thead>
                              <tr>
                                  <th>Serial_num</th>

                                  <th>Address</th>
                                  <th>Email</th>
                                  <th>Phone_num</th>
                                  <th>action</th>
                              </tr>
                          </thead>
                          <tbody>
                            @php
                              $serial_num=1;
                            @endphp
                            @foreach ($infomations as $information)


                            <tr>
                              <td>{{ $serial_num++ }}</td>
                            <td>{{$information->address}}</td>
                            <td>{{$information->email}}</td>
                            <td>{{ $information->phone_num }}</td>

                                  <td>

                                      <div class="btn-group" role="group" aria-label="Basic example">
                                          <a href="#" type="button" class="btn btn-info btn-sm text-white">Edit</a>
                                          <a href="#" type="button" class="btn btn-danger btn-sm "><i class="fa fa-trash" aria-hidden="true"></i>Delete</a>
                                      </div>
                                  </td>
                              </tr>
                              @endforeach
                          </tbody>
                      </table>
                      <div class="card-body">
                      </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>

@endsection
