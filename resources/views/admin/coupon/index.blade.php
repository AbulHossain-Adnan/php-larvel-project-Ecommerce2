

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
                                  <th>Serial No</th>
                                    <th>Coupon name</th>
                                    <th>discount amount (%)</th>
                                    <th>validity till</th>
                                    <th>coupon status</th>
                                    <th>created at</th>
                                </tr>
                            </thead>
                            <tbody>
                              @php
                              $index=1;
                              @endphp
                              <?php foreach ($coupons as $coupon): ?>

                              <tr>
                                <td>
                                  {{$index++}}
                                </td>
                                <td>
                                  {{$coupon->coupon_name}}
                                </td>
                                <td>
                                  {{$coupon->discount_amount}}%


                                <td>
                                  {{$coupon->validity_till}}
                                </td>
                                <td>
                                  @if($coupon->validity_till >= \Carbon\Carbon::now()->format('Y-m-d'))
                                    Valid
                                  @else
                                  invalid
                                  @endif
                                </td>
                                <td>
                                  {{$coupon->created_at}}
                                </td>
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
                  <form action="{{ url('add/coupon') }}" method="post" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                          <label for="exampleInputEmail1">Coupon name</label>
                          <input type="text" name="Coupon_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="add coupon name">
                      </div>

                      <div class="form-group">
                          <label for="exampleInputEmail1">discount_amount(%)</label>
                          <input type="text" name="discount_amount" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="add discount_amount">
                      </div>
                      <div class="form-group">
                          <label for="exampleInputEmail1">validity_till</label>
                          <input type="date" name="validity_till" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="add product quantity" min="{{\Carbon\Carbon::now()->format('Y-m-d')}}">

                      </div>

                      <button href="" type="submit" class="btn btn-success">Add Coupon</button>
                  </form>
          </div>
      </div>
  </div>
</div>
            </div>
            </div>
            </div>
            @endsection
