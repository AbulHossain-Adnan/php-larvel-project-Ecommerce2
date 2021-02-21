@extends('layouts.dashboard_master')
@section('content')
  <div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <span class="breadcrumb-item active">Home</span>

    </nav>

    <div class="sl-pagebody">

      <div class="row row-sm">
        <div class="col-md-6 m-auto">
          <div class="card">
            <div class="card-header">
              Add Name
            <div class="card-body">

              @if (session('update_message'))
                <div class="alert alert-success">
                    {{ session('update_message') }}
                </div>
              @endif
              <form action="{{ url('profile/post') }}" method="post">
                @csrf
                <div class="form-group">
                  <label for="exampleInputEmail1">name</label>
                  <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ auth::user()->name }}">
                  @error ('name')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </span>
              </div>
              <button href="" type="submit" class="btn btn-success">change name</button>
            </form>
            </div>
            </div>
          </div>
          </div>
          </div>
          <div class="row">

          <div class="col-md-6 m-auto">
          <div class="card mt-5 ">
            <div class="card-header">
              Add password
            <div class="card-body">

              @if (session('change_message'))
                <span class="text-danger">
                    {{ session('change_message') }}
              </span>
              @endif
              @if (session('password_success'))
                <span class="text-success">
                    {{ session('password_success') }}
              </span>
              @endif
              @if (session('password_err'))
                <span class="text-danger">
                    {{ session('password_err') }}
              </span>
              @endif
              {{-- @if ($errors->all())
                <div class="alert alert-danger">
                  @foreach ($errors as $error)
                    <li>{{$error}}</li>
                  @endforeach
                </div>

              @endif --}}
              <form action="{{ url('password/post') }}" method="post">
                @csrf
                <div class="form-group">
                  <label for="exampleInputEmail1">Old password</label>
                  <input type="text" name="old_password" placeholder="Type your  password" class="form-control" id="exampleInputEmail1"  aria-describedby="emailHelp"  value="{{ old('old_password') }}">
                  @error ('old_password')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </span>
              </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">New password</label>
                  <input type="text" name="password" placeholder="Type your new password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ old('password') }}">
                  @error ('password')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </span>
              </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Confirm password</label>
                  <input type="text" name="password_confirmation" placeholder="Type your confirm password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  @error ('password_confirmation')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </span>
              </div>
              <button href="" type="submit" class="btn btn-success">change password</button>
            </form>
            </div>
            </div>
          </div>
          </div>

      </div>
    </div>
  </div>
@endsection
