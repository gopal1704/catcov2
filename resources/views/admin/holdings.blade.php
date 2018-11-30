@extends('admin.dashboard')


@section('content')


<div class="col"  style="overflow-y:scroll">
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
                               
             {{$holdings->links()}}
                                  </nav>
                    </div>
                </div>

<div class="row " style="">
    <div class="col">

            <table class="table table-striped catco-pannel">
                    <thead >
                        <tr class="d-flex">
                            <th class="col-2">Date</th>
                            <th class="col-1">Account</th>
                    
                            <th class="col-2">Name</th>
                    
                            <th class="col-2">Catco Wallet</th>
                            <th class="col-2">Maturity date</th>
                            <th class="col-2">Maturity value</th>
                            <th class="col-1">Maturity status</th>
                    
                        </tr>
                    </thead>
                    <tbody>
                    
                    
                    @foreach ($holdings as $holding)
                    
                    <tr class="d-flex holding">
                    
                    <td class="col-2 fromDate" >{{App\operations::displayTime($holding->TIMESTAMP)}}</td>
                    <td class="col-1 ">{{$holding->userId}} </td> 
                    
                    <td class="col-2"> {{ App\operations::getName($holding->userId)}}</td> 
                    
                    <td class="col-2 amount">{{$holding->amount}}</td> 
                    <td class="col-2 date">{{ App\operations::calculateMaturity($holding->TIMESTAMP,$holding->schemes->duration)}}</td>
                    
                    <td class="col-2 maturityAmount _green">{{$holding->amount+$holding->amount*($holding->schemes->maturityRate/100)}}</td>
                    
                    <td class="col-1 rt">
                    
                         @if( App\operations::maturityStatus($holding->TIMESTAMP,$holding->schemes->duration))
                    
                         <div class="d-flex justify-content-around">
                    
                    
                                                              
                                <div class="fa-2x align-self-center" >
                    
                                <i class="fas fa-check _green"></i>
                                </div>
                               
                                </div>
                    
                    
                         @else
                         <div class="d-flex justify-content-around">
                                <div class="fa-2x align-self-center" >
                    
                                <i class="fas fa-sync fa-spin _red"></i>
                                </div>
                                <div class="align-self-center">
                                
                                </div>
                                </div>     
                                
                                @endif
                        
                        
                    
                    
                            </td>
                            <td class="d-none returnRate">{{$holding->schemes->maturityRate}}</td>
                    
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


