@extends('dashboard')


@section('content')

<div class="col"style="overflow-y:scroll;" >
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
             
                                  </nav>
                    </div>
                </div>

<div class="row " >
    <div class="col">
        <table class="table table-striped catco-pannel">

<thead>
    <tr class="d-flex">
        <th class="col-1">Account</th>
<th class="col-2">Joining Date</th>

<th class="col-4">Name</th>
<th class="col-3">Email</th>
<th class="col-1"> Level</th>
<th  class="col-1">Investment</th>
</tr>
</thead>
<tbody>

        @if($referrals->isEmpty())
        <tr><td colspan="5">No referrals under this account</td></tr>
        @endif

    @foreach ($referrals as $referral)

    @if ($referral->profiles)   
    <tr class="d-flex">
        <td class="col-1">{{ $referral->id}}</td>


      <td class="col-2"> 
      @if ($referral->profiles->joiningDate)   
      {{App\operations::displayTime($referral->profiles->joiningDate)}} 
      @endif
      </td>

      <td class="col-4">      @if ($referral->profiles)   
      {{$referral->profiles->title}}&nbsp{{$referral->profiles->firstName}}&nbsp{{$referral->profiles->lastName}}
      @endif
        </td>
       
        <td class="col-3">    {{ $referral->email}}
        </td>
        <td class="col-1">
            <a href="referralsviewlevel?id={{$referral->id}}" class="btn btn-block btn-primary">view</a>
            
            </td>
            <td class="col-1">
                <a href="referralsviewinv?id={{$referral->id}}" class="btn btn-block btn-primary">view</a>


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