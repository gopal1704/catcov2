@extends('dashboard')


@section('content')



<div class="col">

<div class="row justify-content-center align-items-center">
<div class="col-4 text-center">

<h4>wallet transfer</h4>


<form action="/wtotp" method="POST">
@csrf
  <div class="form-group">
    <label for="amount">Amount</label>
    <input type="number" class="form-control" id="amount" placeholder="" name="amount">
  </div>
  <div class="form-group">
    <label for="accountNumber">Account Number</label>
    <input type="number" class="form-control" id="accountNumber" placeholder="" name="accountNumber">
  </div>

  <div class="form-group">
        <button type="submit" class="btn btn-block btn-primary">send otp</button>

  </div>
</form>
</div>


</div>


</div>

@endsection