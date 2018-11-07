@extends('dashboard')


@section('content')


<div class="col">

<div class="row justify-content-center align-items-center">
<div class="col-4 text-center">

<h4>Withdrawal Request</h4>


<form method="POST" action="/withdrawsubmit">
@csrf
  <div class="form-group">
    <label for="formGroupExampleInput">Amount</label>
    <input name="amount" type="number" class="form-control" id="formGroupExampleInput" placeholder="">
  </div>
 
 
  <div class="form-group">
    <label for="bankname">Bank Name</label>
    <input name="bankname" type="text" class="form-control" id="bankname" placeholder="">
  </div>

  <div class="form-group">
    <label for="accountnumber">Account Number</label>
    <input name="accountnumber" type="text" class="form-control" id="accountnumber" placeholder="">
  </div>

  <div class="form-group">
    <label for="ifsc">IFSC Code</label>
    <input name="ifsc" type="text" class="form-control" id="ifsc" placeholder="">
  </div>

  <div class="form-group">
        <button type="submit" class="btn btn-block btn-primary">Submit request</button>

  </div>
</form>
</div>


</div>


</div>


@endsection