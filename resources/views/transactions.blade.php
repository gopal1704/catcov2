@extends('dashboard')


@section('content')

<div class="col">
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
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" href="#">PDF</a>
                      <a class="dropdown-item" href="#">MS EXCEL</a>
                      <a class="dropdown-item" href="#"></a>
                    </div>
                  </div>
    </div>
            

                </div>

<div class="row">
    <div class="col">
        <table class="table">

<thead>
    <tr>
<th>Date</th>
<th>Id</th>
<th>Narration</th>
<th>Amount</th>
<th>From</th>
</tr>
</thead>
<tbody>
<tr>

    <td>20/12/2019</td>
    <td>2000</td>
    <td>Credit wallet transfer</td>
    <td>100</td>
    <td>ggg</td>
</tr>
<tr>

        <td>20/12/2019</td>
        <td>2000</td>
        <td>Credit wallet transfer</td>
        <td>100</td>
        <td>ggg</td>
    </tr>
</tbody>
<tr>

</tr>

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