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
        <th class="col-2">Gold Wallet</th>
        <th class="col-2">Maturity date</th>
        <th class="col-4">Maturity status</th>
        <th class="col-2">Maturity value</th>

    </tr>
</thead>
<tbody>

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
@endsection