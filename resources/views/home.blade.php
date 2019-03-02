@extends('dashboard')


@section('content')
<div class="col flex-grow-1" style="overflow-y:scroll;" >

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
@isset($countryIndia)

@if($countryIndia==true)  

<div class="alert alert-success alert-dismissible">
<button type="button" class="close" data-dismiss="alert">&times;</button>

  <strong>Dear customers, 
  Please buy Catco wallet for the  minimum amount of USD50 through GlobePay  , this is required for fulfilling statutory compliance requested by GlobePay Authorities. Please do the same to receive further payouts through GlobePay. 
Thanking you for your continues support.

Catco Support Team
</strong> 
</div>
@endif
@endisset


                                <div class="row   justify-content-between  "  >


                                    <div class="col-2 p-0 catco-pannel d-flex flex-row justify-content-between ">

                   <div class="d-flex bg-success w-25 justify-content-center">                    
<div class="align-self-center bg-success">
<p  class="m-0 dollar" style="font-size:45px;">$</p>
</div>
</div> 

<div class="d-flex  w-75 justify-content-center">                    
        <div class="align-self-center text-right">
<p class="m-0">
    {{$balance['mainWallet']}} <br/>
    Wallet Balance
</p>
        </div>
        </div> 
                                    </div>

                                    <div class="col-2 p-0 catco-pannel d-flex flex-row justify-content-between ">

                                            <div class="d-flex bg-success w-25 justify-content-center">                    
                         <div class="align-self-center bg-success">
                         <p class="m-0 dollar" style="font-size:45px">$</p>
                         </div>
                         </div> 
                         
                         <div class="d-flex  w-75 justify-content-center">                    
                                 <div class="align-self-center text-right">
                         <p  class="m-0">
                         {{$balance['pendingWallet']}} <br/>
                             Pending Wallet 

                         </p>
                                 </div>
                                 </div> 
                                                             </div>

                                                             <div class="col-2 p-0 catco-pannel d-flex flex-row justify-content-between ">

                                                                    <div class="d-flex bg-success w-25 justify-content-center">                    
                                                 <div class="align-self-center bg-success">
                                                 <p class="m-0 dollar" style="font-size:45px">$</p>
                                                 </div>
                                                 </div> 
                                                 
                                                 <div class="d-flex  w-75 justify-content-center">                    
                                                         <div class="align-self-center text-right">
                                                 <p class="m-0">
                                                 {{$balance['SpotCommission']}} <br/>
                                                     Referral comission
                                                    </p>
                                                         </div>
                                                         </div> 
                                                                                     </div>
                                                                                     
                                                                                     
                                                                                     <div class="col-2 p-0 catco-pannel d-flex flex-row justify-content-between ">

                                                                                            <div class="d-flex bg-success w-25 justify-content-center">                    
                                                                         <div class="align-self-center bg-success">
                                                                         <p class="m-0 dollar" style="font-size:45px">$</p>
                                                                         </div>
                                                                         </div> 
                                                                         
                                                                         <div class="d-flex  w-75 justify-content-center">                    
                                                                                 <div class="align-self-center text-right">
                                                                         <p class="m-0">
                                                                         {{$balance['ReferralReturns']}} <br/>
                                                                             Monthly Ref. 
                                                                         </p>
                                                                                 </div>
                                                                                 </div> 
                                                                                                             </div>
                                                                                                             <div class="col-2 p-0 catco-pannel d-flex flex-row justify-content-between ">

                                                                                                                    <div class="d-flex bg-success w-25 justify-content-center">                    
                                                                                                 <div class="align-self-center bg-success">
                                                                                                 <p class="m-0 dollar" style="font-size:45px">$</p>
                                                                                                 </div>
                                                                                                 </div> 
                                                                                                 
                                                                                                 <div class="d-flex  w-75 justify-content-center">                    
                                                                                                         <div class="align-self-center text-right">
                                                                                                 <p class="m-0">
                                                                                                 {{$balance['Investment']}} <br/>
                                                                                                      Total Holdings

                                                                                                 </p>
                                                                                                         </div>
                                                                                                         </div> 
                                                                                                                                     </div>                                                 


                                 
                        

                                </div>

                                
                                <div class="row  justify-content-between" style="margin-top:25px;" >

                                    <div class="col-6  p-0">


                                    <table class="table table-striped catco-pannel">
<thead>
    <tr class="d-flex">
        <th class="col-3">Date</th>

        <th class="col-3">Catco Wallet</th>
        <th class="col-6">Maturity </th>

    </tr>
</thead>
<tbody>
@foreach ($holdings as $holding)

<tr class="d-flex holding">

<td class="col-3 fromDate" >{{App\operations::displayTime($holding->TIMESTAMP)}}</td>
<td class="col-2 d-none">{{$holding->schemes->schemeName}}</td> 

<td class="col-3 amount">{{$holding->amount}}</td> 
<td class="col-2 date d-none">{{ App\operations::calculateMaturity($holding->TIMESTAMP,$holding->schemes->duration)}}</td>

<td class="col-2 maturityAmount d-none">{{$holding->amount+$holding->amount*($holding->schemes->maturityRate/100)}}</td>

<td class="col-6 rt">

<!-- <span class="maturityAmount"></td>
</span> -->
     @if( App\operations::maturityStatus($holding->TIMESTAMP,$holding->schemes->duration))

     <div class="d-flex justify-content-around ma">

<p class="maturityAmount _green">{{$holding->amount+$holding->amount*($holding->schemes->maturityRate/100)}}</p>
                                          
            <div class="fa-2x align-self-center" >

            <i class="fas fa-check _green"></i>
            </div>
            <div class="align-self-center">
            <p class="m-0">  Matured
                </p>
            </div>
            </div>


     @else
     <div class="d-flex justify-content-around ma">
     <p class="maturityAmount _green">{{$holding->amount+$holding->amount*($holding->schemes->maturityRate/100)}}</p>

            <div class="fa-2x align-self-center" >

            <i class="fas fa-sync fa-spin _red"></i>
            </div>
            <div class="align-self-center">
            <p class="m-0 rtt" id="rt">
                </p>
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
                                    <div class="col-5  p-0">


                                        <table class="table table-striped catco-pannel text-nowrap" >
                                     
  <thead>  <tr>
<th colspan="2">Account Summary</th>
      

    </tr>
</thead>
    
                                         

                                            <tbody>

<tr>

     <th>Name</th>   
     <td>{{$profile->title}}&nbsp{{$profile->firstName}}&nbsp{{$profile->lastName}}</td>


</tr>

<tr>

        <th>Account Id	</th>   
        <td>{{$profile->userId}}</td>
   
   
   </tr>
   
<tr>

<th>Wallet Id	</th>   
<td>{{$profile->walletId}}</td>


</tr>
<tr>

        <th>Referral link</th>   
        <td>    <a style="font-size:13px;" href="https://catcotrade.info/register?referralid={{$profile->userId}}"> https://catcotrade.info/register?referralid={{$profile->userId}}</a>
            </td>
   
   
   </tr>
   
<tr>

        <th>Approval</th>   
        <td>@if($profile->approvalStatus)
        <span class="badge badge-success">Approved</span>

            @else
<span class="badge badge-danger">Pending</span>
            @endif
        
        </td>
       
   
   </tr>
   
<tr>

        <th>Joining Date</th>   
        <td>{{$profile->joiningDate}}</td>
   
   
   </tr>
   <tr>
        <th>Ip Address</th>   
        <td>{{$ip}}</td>
   </tr>
   <tr>
        <th>Ip Location</th>   
        <td>{{$location}}</td>
   </tr>

                                            </tbody>
                                        </table>
                                    </div>



                                </div>

                            </div>
                            <script>

function remainingTime(date,fromdate,element,amt,rtRate){

      // Set the date we're counting down to
      
      var countDownDate = Date.parse(date);
      var amount =parseFloat(amt);
      var returnRate = parseFloat(rtRate);
      var fromdate = Date.parse(fromdate);

    // Update the count down every 1 second
    var x = setInterval(function() {
      // Get todays date and time
      var now = new Date().getTime();
      // Find the distance between now and the count down date
      var distance = countDownDate - now;
      var amountDistance= now - fromdate;
  //    console.log('s',distance,amountDistance);
      // Time calculations for days, hours, minutes and seconds
      var days = Math.floor(distance / (1000 * 60 * 60 * 24));
      var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    

    if(distance/1000>0){
    //calculate 1second value
    var maturityAmount =  parseFloat(amount*(returnRate/100).toFixed(2));
//console.log('Maturity amount',maturityAmount);

var     maturityPeriodSeconds = (countDownDate - fromdate)/1000;

//console.log('Maturity seconds',  maturityPeriodSeconds);
var     incrementPerSecond = (maturityAmount/maturityPeriodSeconds).toFixed(7);
//console.log('increment per second', incrementPerSecond);
   // console.log('incsec',incrementPerSecond);
    ////calculate maturity amount .
//console.log('maturity',maturityAmount);
var s = Math.floor(amountDistance/1000);
var m= Math.floor(maturityAmount/s);
//console.log(s,m);
var fv= parseFloat(amount) + parseFloat((s*incrementPerSecond).toFixed(5)) ;
fv = fv.toFixed(5);
//element.find('.ma .maturityAmount').html(fv);

if(amount>=500){
    element.find('.ma .maturityAmount').html(fv);

}
else
{
    var maturityAmount=amount+ amount*(returnRate/100);
    element.find('.ma .maturityAmount').html(maturityAmount);
  
}





    }
    /////



      // Display the result in the element with id="demo"
      element.find('.rt .rtt').html( days + "d " + hours + "h "
      + minutes + "m " + seconds + "s ");
      // If the count down is finished, write some text 
      if (distance < 0) {
        clearInterval(x);
        element.find('.rt .rtt').html("MATURED");
      }
    }, 1000);

}
  
    $("tr.holding").each(function() {
       var  $this= $(this);
       var dt = $(this).find("td.date").html();
       var amount =$(this).find("td.amount").html();
       var returnRate = $(this).find("td.returnRate").html();
       var fromDate = $(this).find("td.fromDate").html();
       console.log(amount,returnRate);
       remainingTime(dt,fromDate,$(this),amount,returnRate);
        });


    </script>

                            @endsection