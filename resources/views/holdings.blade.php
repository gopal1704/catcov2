@extends('dashboard')


@section('content')

<div class="col">
    <div class="row">
        <div class="col">

<div class="row justify-content-between">
    <div class="col-10">
         
            <form>
                    <div class="form-row">
                      <div class="col">
                        <input type="date" class="form-control" placeholder="from">
                      </div>
                      <div class="col">
                        <input type="date" class="form-control" placeholder="to">
                      </div>
                      <div class="col">
                            <button class="btn" type="submit" class="form-control">
                              Search  </button>
                          </div>
                    </div>
                  </form>


    </div>
    <div class="col-2">
        <div class="btn-group">
            <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Export
            </button>
            <div class="dropdown-menu dropdown-menu-right">
              <button class="dropdown-item" type="button">PDF</button>
              <button class="dropdown-item" type="button">EXCEL</button>
            </div>
          </div>
          
    </div>
            

                </div>

<div class="row">
    <div class="col">
    <table class="table">
<thead >
    <tr class="d-flex">
        <th class="col-2">Date</th>
        <th class="col-2">Scheme</th>

        <th class="col-2">Gold Wallet</th>
        <th class="col-2">Maturity date</th>
        <th class="col-2">Maturity value</th>
        <th class="col-2">Maturity status</th>

    </tr>
</thead>
<tbody>


@foreach ($holdings as $holding)

<tr class="d-flex holding">

<td class="col-2 fromDate" >{{App\operations::displayTime($holding->TIMESTAMP)}}</td>
<td class="col-2">{{$holding->schemes->schemeName}}</td> 

<td class="col-2 amount">{{$holding->amount}}</td> 
<td class="col-2 date">{{ App\operations::calculateMaturity($holding->TIMESTAMP,$holding->schemes->duration)}}</td>

<td class="col-2 maturityAmount _green">{{$holding->amount+$holding->amount*($holding->schemes->maturityRate/100)}}</td>

<td class="col-2 rt">

     @if( App\operations::maturityStatus($holding->TIMESTAMP,$holding->schemes->duration))

     <div class="d-flex justify-content-around">


                                          
            <div class="fa-2x align-self-center" >

            <i class="fas fa-check _green"></i>
            </div>
            <div class="align-self-center">
            <p class="m-0">  Matured
                </p>
            </div>
            </div>


     @else
     <div class="d-flex justify-content-around">
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
    </div>

    <div class="row">
        <div class="col">
                <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-end">
                          <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1">Previous</a>
                          </li>
                          <li class="page-item"><a class="page-link" href="#">1</a></li>
                          <li class="page-item"><a class="page-link" href="#">2</a></li>
                          <li class="page-item"><a class="page-link" href="#">3</a></li>
                          <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                          </li>
                        </ul>
                      </nav>
        </div>
    </div>

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
        
          // Time calculations for days, hours, minutes and seconds
          var days = Math.floor(distance / (1000 * 60 * 60 * 24));
          var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
          var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
          var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        

        if(distance/1000>0){
        //calculate 1second value
        var maturityAmount =  parseFloat(amount*(returnRate/100).toFixed(2));

    var     maturityPeriodSeconds = (countDownDate - fromdate)/1000;
    var     incrementPerSecond = (maturityAmount/maturityPeriodSeconds).toFixed(5);

        console.log('incsec',incrementPerSecond);
        ////calculate maturity amount .
//console.log('maturity',maturityAmount);
var s = Math.floor(amountDistance/1000);
var m= Math.floor(maturityAmount/s);
console.log(s,m);
var fv= parseFloat(amount) + parseFloat((s*incrementPerSecond).toFixed(5)) ;
fv = fv.toFixed(5);
element.find('td.maturityAmount').html(fv);
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