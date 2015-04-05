@extends('app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">

      <h1 class="primary">Order Your Favorite Books</h1>

      @if (count($errors) > 0)
        <div class="alert alert-danger">
          <strong>Whoops!</strong> There were some problems with your input.<br><br>
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

    <div class="well well-lg">
      <form class="form-horizontal" role="form" method="POST" action="/order">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">

          <div class="form-group">
            <label class="col-md-4 control-label">Your Name</label>
            <div class="col-md-6">
              <input type="text" class="form-control" name="name" value="name">
            </div>
          </div>

          @for ($i=0; $i < 2; $i++)
              <div class="form-group">
                <label class="col-md-4 control-label">Book Title {{ $i }}</label>
                <div class="col-md-6">
                  <input type="text" class="form-control" name="items[{{ $i }}]" value="{{ str_random(11) }}">
                </div>
              </div>
          @endfor

          <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
              <button type="submit" class="btn btn-default btn-xs" style="margin-right: 15px;">
                Add New
              </button>
            </div>
          </div>
          <hr>

          <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
              <button type="submit" class="btn btn-primary" style="margin-right: 15px;">
                Order Now
              </button>
            </div>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>
@endsection
