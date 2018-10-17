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
        <th class="col-2">Maturity status</th>
        <th class="col-2">Maturity value</th>

    </tr>
</thead>
<tbody>


@foreach ($holdings as $holding)

<tr class="d-flex holding">

<td class="col-2 date" >{{ Carbon\Carbon::parse($holding->timestamp)->format('d/m/Y')}}</td>
<td class="col-2">{{$holding->schemes->schemeName}}</td> 

<td class="col-2">{{$holding->amount}}</td> 
<td class="col-2">{{ App\operations::calculateMaturity($holding->timestamp,$holding->schemes->duration)}}</td>



<td class="col-2">

            <div class="d-flex justify-content-around">
                <div class="fa-2x align-self-center" >

                <i class="fas fa-sync fa-spin _red"></i>
                </div>
                <div class="align-self-center">
                <p class="m-0 remainingTime">                90 d 0 h 0s remaining
                    </p>
                </div>
                </div>
        </td>
</tr>


@endforeach



    <tr class="d-flex">
        <td class="col-2">9/12/2018</td>
        <td class="col-2">$1000</td>
        <td class="col-2">9/12/2018</td>
        <td class="col-4">

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
        <td class="col-2">1240</td>
    </tr>
    <tr class="d-flex">
        <td class="col-2">9/12/2018</td>
        <td class="col-2">$1000</td>
        <td class="col-2">9/12/2018</td>
        <td class="col-4">

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
        <td class="col-2">1240</td>
    </tr>

    
   

     
           


                <tr class="d-flex">
                        <td class="col-2">6/12/2018</td>
                        <td class="col-2">$1000</td>
                        <td class="col-2">9/12/2018</td>
                        <td class="col-4">
                
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
                        <td class="col-2">1240</td>
                    </tr>




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

    function remainingTime(date,element){

console.log(element);
          // Set the date we're counting down to
          var countDownDate = new moment('25/10/2018','DD/MM/YYYY').valueOf();
        console.log(countDownDate);
        // Update the count down every 1 second
        var x = setInterval(function() {
        
          // Get todays date and time
          var now = new Date().getTime();
        
          // Find the distance between now and the count down date
          var distance = countDownDate - now;
        
          // Time calculations for days, hours, minutes and seconds
          var days = Math.floor(distance / (1000 * 60 * 60 * 24));
          var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
          var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
          var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        
          // Display the result in the element with id="demo"
          element.innerHTML = days + "d " + hours + "h "
          + minutes + "m " + seconds + "s ";
        
          // If the count down is finished, write some text 
          if (distance < 0) {
            clearInterval(x);
            element.innerHTML = "EXPIRED";
          }
        }, 1000);

    }
      
        $("tr.holding").each(function() {
          var  $this= $(this);
           var dt = $(this).find("td.date").html();
           console.log(dt);
           remainingTime(dt,$(this).find("td.date"))
            });


        </script>
@endsection