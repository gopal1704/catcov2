@extends('dashboard')


@section('content')


<div class="col">

<div class="row justify-content-center align-items-center">
<div class="col-6 text-center">


                                    
<div class="col p-0">


<table class="table table-striped catco-pannel text-nowrap" >

<thead>  <tr>
<th colspan="2">Profile


</th>
<th><button type="button" class="btn btn-primary text-right">Upload Proof</button>
</th>
<th><button type="button" class="btn btn-primary text-right">Edit Profile</button>
</th>

</tr>
</thead>

 

    <tbody>

<tr>

<th>Name</th>   
<td colspan="3">{{$profile->firstName}}</td>


</tr>

<tr>

<th>Account Id	</th>   
<td colspan="3">{{$profile->userId}}</td>


</tr>

<tr>

<th>Wallet Id	</th>   
<td colspan="3">{{$profile->walletId}}</td>


</tr>
<tr>

<th>Referral link</th>   
<td colspan="3"> https://catcotrade.info/register?referralid={{$profile->userId}}
</td>


</tr>

<tr>

<th>Approval</th>   
<td colspan="3">@if($profile->approvalStatus)
<span class="badge badge-success">Approved</span>

@else
<span class="badge badge-danger">Pending</span>
@endif

</td>


</tr>

<tr>

<th>Joining Date</th>   
<td colspan="3">{{$profile->joiningDate}}</td>


</tr>


    </tbody>
</table>
</div>



</div>


</div>


</div>


@endsection