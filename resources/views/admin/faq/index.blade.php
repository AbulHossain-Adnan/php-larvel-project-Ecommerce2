

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
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center bg-info">
                        list category(active)
                    </div>
                    <div class="card-body ">
                        <table class="table table-bordered">
                            <thead>



                                <tr>
                                    <th>faq question</th>
                                    <th>faq answew</th>
                                </tr>

                            </thead>
                            <tbody>

                              <?php foreach ($faqs as $faq): ?>
<tr>
                                <td>{{$faq->question}}</td>
                                <td>{{$faq->faq_ans}}</td>
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
                  <form action="{{ url('faq/post') }}" method="post" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                          <label for="exampleInputEmail1"> faq question</label>
                          <input type="text" name="question" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="add faq question">
                      </div>

                      <div class="form-group">
                          <label for="exampleInputEmail1">faQ answer</label>
                          <textarea name="faq_ans" ></textarea>

                      </div>


                      <button type="submit" class="btn btn-success">Add Faq</button>
                  </form>
          </div>
      </div>
  </div>
</div>
            </div>
            </div>
            </div>
            @endsection
