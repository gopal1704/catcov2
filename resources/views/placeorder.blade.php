@extends('dashboard')


@section('content')


<div class="col">

<div class="row justify-content-center align-items-center">
<div class="col-4 text-center">

<h4>Place Buy Order</h4>


@if(Session::has('error'))
<div class="alert alert-danger alert-dismissible">
<button type="button" class="close" data-dismiss="alert">&times;</button>

  <strong>{{ Session::get('error') }}</strong> 
</div>
@endif






<form method="POST" action="/gotopayment">
@csrf
  <div class="form-group">
    <label for="formGroupExampleInput">Amount</label>
    <input name="amount" type="number" class="form-control" id="formGroupExampleInput" placeholder="">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Scheme</label>
    <select  class="form-control" id="formGroupExampleInput2" name="schemeId" placeholder="">
        <option value="1">Gold scheme</option>
</select>
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Payment Method</label>
    <select name="paymentMethod"  class="form-control" id="formGroupExampleInput2" placeholder="">
        <option value="wallet">Wallet</option>
        <option  value="btc">Bitcoin</option>

        <option disabled value="paypal">Paypal</option>
</select>
  </div>
  <div class="form-group">
        <button type="submit" class="btn btn-block btn-primary">Proceed to Payment</button>

  </div>
</form>
</div>


</div>


</div>


@endsection