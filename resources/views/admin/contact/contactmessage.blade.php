@extends('layouts.dashboard_master ')
@section('content')
  @section('guestmsg')
    active
  @endsection


<div class="sl-mainpanel">
<nav class="breadcrumb sl-breadcrumb">
    <span class="breadcrumb-item active">add category</span>
    <a class="breadcrumb-item" href="{{url('home')}}"> Home</a>
</nav>
<div class="sl-pagebody">
    <div class="row row-sm">
      <div class=" m-auto text-white">
        <div class="card">
          <div class="card-header">
            <div class="card mt-5 text-center">
                <div class="card-header bg-danger">
                    Category deleted list
                </div>
                <div class="card-body ">
                    <table class="table table-bordered">
                        <thead>
                            <tr>

                                <th>serial_num</th>
                                <th>name</th>
                                <th>email</th>
                                <th>subject</th>
                                <th>message</th>
                                <th>created_at</th>


                            </tr>
                        </thead>
                        <tbody>
                          @php
                            $serial_number=1;
                          @endphp
                          @foreach ($contacts as $contact)
                          <tr>
                            <td>{{ $serial_number++ }}</td>
                            <td>{{ $contact->name }}</td>
                            <td>{{$contact->email }}</td>
                            <td>{{$contact->subject}}</td>
                            <td>{{$contact->message}}</td>
                            <td>{{$contact->created_at}}</td>
                          </tr>
                            @endforeach
                        </tbody>
                    </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
