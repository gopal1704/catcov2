@extends('dashboard')


@section('content')

<div class="col" >
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

<div class="row " style="overflow-y:scroll;">
    <div class="col">
        <table class="table table-striped catco-pannel">

<thead>
    <tr class="d-flex">
        <th class="col-2">Account</th>
<th class="col-2">Joining Date</th>

<th class="col-4">Name</th>
<th class="col-4">Email</th>
</tr>
</thead>
<tbody>
    @foreach ($referrals as $referral)

    @if ($referral->profiles)   
    <tr class="d-flex">
        <td class="col-2">{{ $referral->id}}</td>


      <td class="col-2"> 
      @if ($referral->profiles->joiningDate)   
      {{App\operations::displayTime($referral->profiles->joiningDate)}} 
      @endif
      </td>

      <td class="col-4">    {{ $referral->name}}
        </td>
       
        <td class="col-4">    {{ $referral->email}}
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