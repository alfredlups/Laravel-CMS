@extends('layouts.customer.app')
@section('content')
<div id="main" class="main">
  <div class="container">
    <div class="breadcrumbs">
      <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">About</a></li>
      </ul>
    </div>

    <div class="content">
      @yield('page_content')
    </div>
    <hr>
    <form method="post" action="http://localhost/lee-transport/form/bZ4w8PkL" enctype="multipart/form-data">
      <input type="hidden" name="_token" value="HwQC39zX4WGNBsbzXcmIH8KAZG3mGuteSKPjsOKj">
      <div class="col-12">
        <label for="first_name" class="control-label mb-1"> <span>First Name</span> </label>
        <input type="text" name="first_name" class="form-control" required="">
      </div>
      <div class="col-12">
        <label for="last_name" class="control-label mb-1"> <span>Last Name</span> </label>
        <input type="text" name="last_name" class="form-control" required="">
      </div>
      <div class="col-12">
        <label for="email" class="control-label mb-1"> <span>Email</span> </label>
        <input type="email" name="email" class="form-control" required="">
      </div>
      <div class="col-12">
        <label for="address" class="control-label mb-1"> <span>Address</span> </label>
        <input type="text" name="address" class="form-control">
      </div>
      <br>
      <div class="col-xs-3">
        <button id="form-fields-save" type="submit" class="btn btn-lg btn-info">
          <span id="payment-button-amount">Submit</span>
        </button>
      </div><br>
    </form>
  </div>
</div><!--end main-->            
@endsection