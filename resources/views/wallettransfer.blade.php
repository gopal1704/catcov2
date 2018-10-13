@extends('dashboard')


@section('content')



<div class="col">

<div class="row justify-content-center align-items-center">
<div class="col-4 text-center">

<h4>wallet transfer</h4>


<form>
  <div class="form-group">
    <label for="formGroupExampleInput">Account Number</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Name</label>
    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="">
  </div>

  <div class="form-group">
        <button type="submit" class="btn btn-block btn-primary">send otp</button>

  </div>
</form>
</div>


</div>


</div>

@endsection