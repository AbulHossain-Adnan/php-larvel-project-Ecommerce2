@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center mt-10">
  <div class="col-md-12">
      <div class="card bg-success">
        <div class="card-header bg-primary"><h1>dashboard</h1></div>
        <div class="card-body">
          <h1>welcome,{{ auth::user()->name }}</h1>
          <h2>Email:{{ auth::user()->email }}</h2>
          <h1>{{ auth::user()->created_at->format("d/m/Y") }}</h1>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="row mt-3">
    <div class="col-md-12 ">
      <div class="card">
        <div class="card-header bg-warning">
          <h2>user list</h2>
          <h1>Total-user:{{ $total_user }}</h1>
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
</div>
</div>
@endsection
