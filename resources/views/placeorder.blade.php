@extends('dashboard')


@section('content')


<div class="col">

<div class="row justify-content-center align-items-center">
<div class="col-4 text-center">

<h4>Place Buy Order</h4>


<form>
  <div class="form-group">
    <label for="formGroupExampleInput">Amount</label>
    <input type="number" class="form-control" id="formGroupExampleInput" placeholder="">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Scheme</label>
    <select  class="form-control" id="formGroupExampleInput2" placeholder="">
        <option value="n">nn</option>
</select>
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Scheme</label>
    <select  class="form-control" id="formGroupExampleInput2" placeholder="">
        <option value="n">nn</option>
</select>
  </div>
  <div class="form-group">
        <button type="submit" class="btn btn-block btn-primary">send otp</button>

  </div>
</form>
</div>


</div>


</div>


@endsection