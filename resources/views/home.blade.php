@extends('dashboard')


@section('content')
<div class="col ">
@if(isset($message))
<div class="alert alert-success alert-dismissible">
<button type="button" class="close" data-dismiss="alert">&times;</button>

  <strong>Success!</strong> {{$message}}
</div>
@endif

                                <div class="row   justify-content-between  ">


                                    <div class="col-2 p-0 catco-pannel d-flex flex-row justify-content-between ">

                   <div class="d-flex bg-success w-25 justify-content-center">                    
<div class="align-self-center bg-success">
<h1>$</h1>
</div>
</div> 

<div class="d-flex  w-75 justify-content-center">                    
        <div class="align-self-center text-right">
<p class="m-0">
    10000 <br/>
    Wallet Balance
</p>
        </div>
        </div> 
                                    </div>

                                    <div class="col-2 p-0 catco-pannel d-flex flex-row justify-content-between ">

                                            <div class="d-flex bg-success w-25 justify-content-center">                    
                         <div class="align-self-center bg-success">
                         <p class="m-0" style="font-size:45px">$</p>
                         </div>
                         </div> 
                         
                         <div class="d-flex  w-75 justify-content-center">                    
                                 <div class="align-self-center text-right">
                         <p  class="m-0">
                             10000 <br/>
                             Pending Wallet 

                         </p>
                                 </div>
                                 </div> 
                                                             </div>

                                                             <div class="col-2 p-0 catco-pannel d-flex flex-row justify-content-between ">

                                                                    <div class="d-flex bg-success w-25 justify-content-center">                    
                                                 <div class="align-self-center bg-success">
                                                 <p class="m-0" style="font-size:45px">$</p>
                                                 </div>
                                                 </div> 
                                                 
                                                 <div class="d-flex  w-75 justify-content-center">                    
                                                         <div class="align-self-center text-right">
                                                 <p class="m-0">
                                                     10000 <br/>
                                                     Referral comission
                                                    </p>
                                                         </div>
                                                         </div> 
                                                                                     </div>
                                                                                     
                                                                                     
                                                                                     <div class="col-2 p-0 catco-pannel d-flex flex-row justify-content-between ">

                                                                                            <div class="d-flex bg-success w-25 justify-content-center">                    
                                                                         <div class="align-self-center bg-success">
                                                                         <p class="m-0" style="font-size:45px">$</p>
                                                                         </div>
                                                                         </div> 
                                                                         
                                                                         <div class="d-flex  w-75 justify-content-center">                    
                                                                                 <div class="align-self-center text-right">
                                                                         <p class="m-0">
                                                                             10000 <br/>
                                                                             Monthly Ref. 
                                                                         </p>
                                                                                 </div>
                                                                                 </div> 
                                                                                                             </div>
                                                                                                             <div class="col-2 p-0 catco-pannel d-flex flex-row justify-content-between ">

                                                                                                                    <div class="d-flex bg-success w-25 justify-content-center">                    
                                                                                                 <div class="align-self-center bg-success">
                                                                                                 <p class="m-0" style="font-size:45px">$</p>
                                                                                                 </div>
                                                                                                 </div> 
                                                                                                 
                                                                                                 <div class="d-flex  w-75 justify-content-center">                    
                                                                                                         <div class="align-self-center text-right">
                                                                                                 <p class="m-0">
                                                                                                     10000 <br/>
                                                                                                      Active Holdings

                                                                                                 </p>
                                                                                                         </div>
                                                                                                         </div> 
                                                                                                                                     </div>                                                 


                                 
                        

                                </div>

                                <br/>
                                <br/>
                                <br/>
                                <div class="row justify-content-between">

                                    <div class="col-6 catco-pannel p-0">
<table class="table">
<thead >
    <tr>
        <th>Date</th>
        <th>Gold Wallet</th>
        <th>Maturity</th>
    </tr>
</thead>
<tbody>

    <tr>
        <td>9/12/2018</td>
        <td>$1000</td>
        <td >

            <div class="d-flex justify-content-between">
                <div class="fa-2x align-self-center" >

                <i class="fas fa-sync fa-spin _red"></i>
                </div>
                <div class="align-self-center">
                    <p class="m-0">$1240</p>
                <p class="m-0">                90 d 0 h 0s remaining
                    </p>
                </div>
                </div>
        </td>
    </tr>

    <tr>
            <td>9/12/2018</td>
            <td>$1000</td>
            <td >
    
                <div class="d-flex justify-content-between">
                    <div class="fa-2x align-self-center" >
    
                    <i class="fas fa-sync fa-spin _red"></i>
                    </div>
                    <div class="align-self-center">
                        <p class="m-0">$1240</p>
                    <p class="m-0">                90 d 0 h 0s remaining
                        </p>
                    </div>
                    </div>
            </td>
        </tr>

        <tr>
                <td>9/12/2018</td>
                <td>$1000</td>
                <td >
        
                    <div class="d-flex justify-content-between">
                        <div class="fa-2x align-self-center" >
        
                        <i class="fas fa-sync fa-spin _red"></i>
                        </div>
                        <div class="align-self-center">
                            <p class="m-0">$1240</p>
                        <p class="m-0">                90 d 0 h 0s remaining
                            </p>
                        </div>
                        </div>
                </td>
            </tr>
            <tr>
                    <td>9/12/2018</td>
                    <td>$1000</td>
                    <td >
            
                        <div class="d-flex justify-content-between">
                            <div class="fa-2x align-self-center" >
            
                            <i class="fas fa-sync fa-spin _red"></i>
                            </div>
                            <div class="align-self-center">
                                <p class="m-0">$1240</p>
                            <p class="m-0">                90 d 0 h 0s remaining
                                </p>
                            </div>
                            </div>
                    </td>
                </tr>


                <tr>
                        <td>6/12/2018</td>
                        <td>$1000</td>
                        <td >
                
                            <div class="d-flex justify-content-between">
                                <div class="fa-2x align-self-center" >
                
                                <i class="fas fa-check _green"></i>
                                </div>
                                <div class="align-self-start">
                                    <p class="m-0">$1240</p>
                                <p class="m-0">    9/12/2018   Matured
                                    </p>
                                </div>
                                </div>
                        </td>
                    </tr>




</tbody>


</table>

                                    </div>
                                    <div class="col-5 catco-pannel p-0">


                                        <table class="table text-nowrap" >

                                         

                                            <tbody>

<tr>

     <th>Name</th>   
     <td>{{$profile->firstName}}</td>


</tr>

<tr>

        <th>Account Id	</th>   
        <td>{{$profile->userId}}</td>
   
   
   </tr>
   
<tr>

        <th>Referral link</th>   
        <td> http://dashboard.catcotrade.info
            </td>
   
   
   </tr>
   
<tr>

        <th>Approval</th>   
        <td>{{$profile->approvalStatus}}</td>
       
   
   </tr>
   
<tr>

        <th>Joining Date</th>   
        <td>{{$profile->joiningDate}}</td>
   
   
   </tr>
   <tr>
        <th>Ip</th>   
        <td>10.10.10.10</td>
   </tr>

                                            </tbody>
                                        </table>
                                    </div>



                                </div>

                            </div>

                            @endsection