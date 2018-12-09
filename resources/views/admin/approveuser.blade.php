@extends('admin.dashboard')


@section('content')



<div class="col">

@if(Session::has('error'))
<div class="alert alert-danger alert-dismissible">
<button type="button" class="close" data-dismiss="alert">&times;</button>

  <strong>{{ Session::get('error') }}</strong> 
</div>
@endif
@if(Session::has('message'))
<div class="alert alert-success alert-dismissible">
<button type="button" class="close" data-dismiss="alert">&times;</button>

  <strong>{{ Session::get('message') }}</strong> 
</div>
@endif
<div class="row justify-content-center align-items-center">
<div class="col-4 text-center">

<h4>Approve User</h4>


<table class="table table-striped catco-pannel">
<tbody>
<tr> <td>{{$user->userId}}</td> <td>{{$user->title}} {{$user->firstName}} {{$user->lastName}}</td></tr>
</tbody>
</table>

<form action="approveuserconfirm" method="POST">
@csrf
<input  type="hidden" class="form-control" id="userId"  placeholder="" name="userId" value="{{$user->userId}}">

 

  <div class="form-group">
        <button type="submit" class="btn btn-block btn-primary">Confirm Approval</button>

  </div>
</form>
</div>


</div>


</div>

@endsection