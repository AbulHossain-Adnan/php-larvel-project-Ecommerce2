@extends('layouts.dashboard_master')
@section('content')
@section('home')
  active
@endsection
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <span class="breadcrumb-item active">Home</span>

      </nav>

      <div class="sl-pagebody">

        <div class="row row-sm">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header"><h1>dashboard</h1></div>
              <div class="card-body">
                <!-- <h1>welcome,{{ auth::user()->name }}</h1>
                <h2>Email:{{ auth::user()->email }}</h2>
                <h1>{{ auth::user()->created_at->format("d/m/Y") }}</h1> -->
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row ">
          <div class="col-md-12 ">
            <div class="card">
              <div class="card-header">
                <h1>user list</h1>
                <h2>Total-user{{ $total_user }}</h2>
              </div>
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr class="table-info">
                      <th>serial_num</th>
                      <th>Uninq_id</th>
                      <th>name</th>
                      <th>email</th>
                      <th>created_at</th>
                    </tr>
                  </thead>
                  <tbody
                @foreach ($users as $single)
                  <tr>
                    <td class="text-center">{{ $users->firstItem() + $loop->index }}</td>
                    <td>{{ $single->id }}</td>
                    <td>{{$single->name }}</td>
                    <td>{{$single->email}}</td>
                    <td>{{$single->created_at->format('d/m/Y h:i:s A')}}
                    <br>
                    {{$single->created_at->diffForHumans()}}</td>
                  </tr>
                @endforeach
              </tbody>

            </table>
              {{$users->links()}}
          </div>

        </div>
      </div>

        </div><!-- row -->



      </div><!-- sl-pagebody -->
@endsection
