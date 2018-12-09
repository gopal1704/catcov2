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

<h4>Approve withdrawal</h4>


<table class="table table-striped catco-pannel">
<tbody>

<tr>
<td>Request Date </td> <td>{{App\operations::displayTime($wd->timestamp)}}</td>

</tr>
<tr>
<td>Account</td> <td>{{$wd->userId}}</td>
</tr>

<tr>
<td>Name</td> <td> {{ App\operations::getName($wd->userId)}}</td>

</tr>
<tr>
<td>Amount</td> <td>{{$wd->amount}}</td>

</tr>

<tr>
<td>Account Details</td> <td>{{$wd->accountDetails}}</td>

</tr>

</tbody>
</table>

<form action="confirmwdapproval" method="POST">
@csrf
<input  type="hidden" class="form-control" id="id"  placeholder="" name="id" value="{{$wd->id}}">

  <div class="form-group">
    <label for="walletId">Approval details</label>
    <input type="text" class="form-control" id="walletId" placeholder="" name="approvalDetails">
  </div>

  <div class="form-group">
        <button type="submit" class="btn btn-block btn-primary">Confirm Approval</button>

  </div>
</form>
</div>


</div>


</div>

@endsection