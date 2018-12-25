@extends('dashboard')


@section('content')



<div class="col">

@if(Session::has('error'))
<div class="alert alert-danger alert-dismissible">
<button type="button" class="close" data-dismiss="alert">&times;</button>

  <strong>{{ Session::get('error') }}</strong> 
</div>
@endif
@if(Session::has('message'))
<div class="alert alert-success alert-dismissible">
<button type="button" class="close" data-dismiss="alert">&times;</button>

  <strong>{{ Session::get('message') }}</strong> 
</div>
@endif
<div class="row justify-content-center align-items-center">
<div class="col-4 text-center">

<h4>Add E-Wallet </h4>


<form action="/ewalletprocess" method="POST">
@csrf
  <div class="form-group">
    <label for="amount">Amount - Min (1:USD)</label>
    <input type="number" class="form-control" id="amount" placeholder="" name="amount">
  </div>
 

  <div class="form-group">
        <button type="submit" class="btn btn-block btn-primary">Pay now</button>

  </div>
</form>
</div>


</div>


</div>

@endsection