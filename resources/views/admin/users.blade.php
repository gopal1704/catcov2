@extends('admin.dashboard')


@section('content')


<div class="col" style="overflow-y:scroll;">
    <div class="row">
        <div class="col">

<div class="row">
    <div class="col-10">
         
            <form>
                    <div class="form-row">
                      <div class="col-3">
                        <input type="date" class="form-control" placeholder="from">
                      </div>
                      <div class="col-3">
                        <input type="date" class="form-control" placeholder="to">
                      </div>
                      <div class="col-3">
                            <button class="btn" type="submit" class="form-control">
                              Search  </button>
                          </div>
                    </div>
                  </form>


    </div>
    <div class="col-2">
            <div class="dropdown ">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
Export
                    </button>
                    <div class="dropdown-menu dropdown-menu-right text-right" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" href="#">PDF</a>
                      <a class="dropdown-item" href="#">MS EXCEL</a>
                      <a class="dropdown-item" href="#"></a>
                    </div>
                  </div>
    </div>
            

                </div>
                <div class="row">
                    <div class="col">
                            <nav aria-label="Page navigation example">
                               
             {{$users->links()}}
                                  </nav>
                    </div>
                </div>

<div class="row " >
    <div class="col">
        <table class="table table-striped catco-pannel">

<thead>
    <tr>
        <th>Account</th>
<th>Email</th>
<th>Name</th>

<th>Joining Date</th>
<th>Approval </th>

<th>Id Proof</th>
<th>Add. Proof</th>
<th>Approve</th>
<th>Edit</th>
</tr>
</thead>
<tbody>
    @foreach ($users as $user)
    <tr>
    @if ($user->profiles)   

        <td>{{ $user->id}}
        <br>
        {{$user->profiles->walletId}}
        </td>

        <td>{{$user->email}}</td>
       
        <td>
            {{$user->profiles->title}} {{$user->profiles->firstName}} {{$user->profiles->lastName}}
        </td>
        <td>      {{$user->profiles->joiningDate}}         </td>


        <td>@if($user->profiles->approvalStatus)
            <span class="badge badge-success">Approved</span>
    
                @else
    <span class="badge badge-danger">Pending</span>
                @endif
            
            </td>
           

<td>
@if($user->profiles->idProof)
<a target="_blank" href=" /storage/{{$user->profiles->idProof}}">view</a>
    
                @else
    <span class="badge badge-danger">No proof</span>
                @endif



</td>
<td>
@if($user->profiles->proofUrl)
<a target="_blank" href=" /storage/{{$user->profiles->proofUrl}}">view</a>
    
                @else
    <span class="badge badge-danger">No proof</span>
                @endif


</td>
<td>
<a href="approveuser?userId={{$user->profiles->userId}}"  class="btn btn-success">Approve Now</a>
</td>

<td>
<a href="editprofile?userId={{$user->profiles->userId}}"  class="btn btn-success">edit</a>

</td>
@endif
    </tr>


@endforeach

  
</tbody>


        </table>
    </div>
    </div>

   

    </div>

</div>
</div>





                            @endsection