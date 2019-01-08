@extends('dashboard')


@section('content')


<div class="col">

<div class="row justify-content-center align-items-center">
<div class="col-4 text-center">

<h4>Withdrawal Request</h4>
<div class="alert alert-danger alert-dismissible">
<button type="button" class="close" data-dismiss="alert">&times;</button>

  <strong>All  withdrawal request will be processed only after 25th January 2019 </strong> 
</div>

<form method="POST" action="/withdrawsubmit">
@csrf
  <div class="form-group">
    <label for="formGroupExampleInput">Amount</label>
    <input required name="amount" type="number" class="form-control" id="formGroupExampleInput" placeholder="">
  </div>
 
  <div class="form-group">
    <label for="formGroupExampleInput2">Select withdrawal method.</label>
    <select name="wmethod"  class="form-control" id="formGroupExampleInput2" placeholder="">
    @if($countryIndia==true)  
    <option value="globepay">Globepay</option>

    @endif
    @if($countryIndia==false)  

    <option value="paypal">Paypal</option>

        <option value="moneypolo">Moneypolo</option>
        <option value="bitcoin">Bitcoin</option>
        @endif
</select>
  </div>
  <div class="form-group">
        <button type="submit" class="btn btn-block btn-primary">Submit request</button>

  </div>
</form>
</div>


</div>


</div>


@endsection