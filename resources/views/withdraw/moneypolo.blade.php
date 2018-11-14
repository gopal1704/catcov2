@extends('dashboard')


@section('content')


<div class="col">

<div class="row justify-content-center align-items-center">
<div class="col-4 text-center">

<h4>Withdrawal Request - Moneypolo</h4>


<form method="POST" action="/processwithdraw">
@csrf
  <div class="form-group">
    <label for="formGroupExampleInput">Amount</label>
    <input name="amount" type="number" value="{{$amount}}" class="form-control" id="formGroupExampleInput" placeholder="">
  </div>
 
 


  <div class="form-group">
    <label for="moneypolo">Moneypolo Email or Account Number
    </label>
    <input name="moneypolo" type="text" class="form-control" id="moneypolo" placeholder="">
  </div>

  

  <div class="form-group">
        <button type="submit" class="btn btn-block btn-primary">Submit request</button>

  </div>
</form>
</div>


</div>


</div>


@endsection