@extends('dashboard')


@section('content')


<div class="col">

<div class="row justify-content-center align-items-center">
<div class="col-4 text-center">

<h4>Withdrawal Request - Bitcoin</h4>


<form method="POST" action="/processwithdraw">
@csrf
  <div class="form-group">
    <label for="formGroupExampleInput">Amount</label>
    <input disabled name="amount" type="number" value="{{$amount}}" class="form-control" id="formGroupExampleInput" required>
  </div>
 
 


  <div class="form-group">
    <label for="moneypolo">Bitcoin Address
    </label>
    <input name="moneypolo" type="text" class="form-control" id="moneypolo" required>
  </div>

  

  <div class="form-group">
        <button type="submit" class="btn btn-block btn-primary">Submit request</button>

  </div>
</form>
</div>


</div>


</div>


@endsection