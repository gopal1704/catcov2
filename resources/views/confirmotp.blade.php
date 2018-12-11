@extends('dashboard')


@section('content')



<div class="col">

<div class="row justify-content-center align-items-center">
<div class="col-4 text-center">

<h4>wallet transfer to - account: {{$account->userId}} &nbsp {{$account->title}}&nbsp{{$account->firstName}}&nbsp{{$account->lastName}} </h4>


<form action="/wtprocess" method="POST">
@csrf
  <div class="form-group">
    <label for="amount">Enter Otp</label>
    <input type="number" class="form-control" id="amount" placeholder="" name="otp">
  </div>
 
  <div class="form-group">
        <button type="submit" class="btn btn-block btn-primary">Confirm transfer</button>

  </div>
</form>
</div>


</div>


</div>

@endsection