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
<th>
</th>
<th><a type="button" href="/editprofile" class="btn btn-primary text-right">Edit Profile</a>
</th>

</tr>
</thead>

 

    <tbody>

<tr>

<th>Name</th>   
<td colspan="3">{{$profile->title}}&nbsp{{$profile->firstName}}&nbsp{{$profile->latName}}</td>


</tr>

<tr>

<th>Account Id	</th>   
<td colspan="3">{{$profile->userId}}</td>


</tr>

<tr>

<th>Joining Date	</th>   
<td colspan="3">{{$profile->joiningDate}}</td>


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

        <th>Gender	</th>   
        <td colspan="3">{{$profile->gender}}</td>
        
        
        </tr>
    
        <tr>

                <th>Address	</th>   
                <td colspan="3">{{$profile->address}}</td>
                
                
                </tr>

                <tr>

                        <th>City	</th>   
                        <td colspan="3">{{$profile->city}}</td>
                        
                        
                        </tr>

                        <tr>

                                <th>State	</th>   
                                <td colspan="3">{{$profile->state}}</td>
                                
                                
                                </tr>

                                <tr>

                                        <th>Pincode	</th>   
                                        <td colspan="3">{{$profile->pincode}}</td>
                                        
                                        
                                        </tr>
        
        
                                <tr>

                                        <th>Country	</th>   
                                        <td colspan="3">{{$profile->country}}</td>
                                        
                                        
  
                                    </tr>                      
  
                                    <tr>

                                            <th>Mobile	</th>   
                                            <td colspan="3">{{$profile->isdcode}}{{$profile->mobile}}</td>
                                            
                                            
                                            </tr>
  
                                </tbody>
</table>
</div>



</div>
<div class="col-6">
                <table class="table table-striped catco-pannel text-nowrap" >
                        <thead>
<th colspan="4">Proof upload</th>
                        </thead>
                        <tbody>
                                <tr>
                                        <td>Id Proof</td>
                                        <td>
                                        <form method="post" enctype="multipart/form-data" action="/uploadidproof">
                                        @csrf

                                        <input type="file" name="idproof">
                                        <input type="submit" value="Upload">
                                        </form>
                                        </td>

                                        <td><a href="">view</a></td>
                                </tr>
                                <tr colspan="4">
                               
                                </tr>
                                <tr>

                                                <td>Address Proof</td>
                                             <td>  <form enctype="multipart/form-data" method="post" action="/uploadadproof">
                                             @csrf

                                        <input type="file" name="idproof">
                                        <input type="submit" value="Upload">
                                        </form>
                                        </td> 
                                                <td><a href="">view</a></td>

                                        </tr>
                                        <tr colspan="4">
                                     
                                </tr>

                        </tbody>
                </table>
                <h4>Id proof Documents accepted</h4>
                <ul>
                                <li>Any National id proof</li>

                                <li>Drivers Licence</li>
                                <li>Passport</li>
                                </ul>

                                <hr/>
                                <h4>Address proof Documents accepted</h4>

                                   <ul>

<li>Bank Statement</li>
<li>Eb Bill</li>
</ul>

</div>

</div>


</div>


@endsection