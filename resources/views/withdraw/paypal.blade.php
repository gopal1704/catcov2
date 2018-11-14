@extends('dashboard')


@section('content')


<div class="col">

<div class="row justify-content-center align-items-center">
<div class="col-4 text-center">

<h4> Withdrawal Paypal</h4>


<form method="POST" action="/processwithdraw">
@csrf
  <div class="form-group">
    <label for="formGroupExampleInput">Amount</label>
    <input disabled name="amount" value="{{$amount}}" type="number" class="form-control" id="formGroupExampleInput" placeholder="">
  </div>
 
 
  <div class="form-group">
    <label for="paypalemail">Paypal Email</label>
    <input name="paypalemail" type="text" class="form-control" id="paypalemail" placeholder="">
  </div>
  <div class="form-group">
        <button type="submit" class="btn btn-block btn-primary">Submit request</button>

  </div>
</form>
</div>


</div>


</div>


@endsection