@extends('dashboard')


@section('content')

<div class="col" >
    <div class="row">
        <div class="col">

<div class="row">
    <div class="col-10">
         
            <form method="GET" action="transactionsq">
            @csrf
                    <div class="form-row">
                      <div class="col-3">
                        <input type="date" name="from" class="form-control" placeholder="from" 
                      
                        >
                      </div>
                      <div class="col-3">
                        <input type="date" name="to" class="form-control" placeholder="to">
                      </div>
                      <div class="col-1">
                            <button class="btn" type="submit" class="form-control">
                              Search  </button>
                          </div>
                          <div class="col-3">
                          <a href="transactions" class="btn btn-secondary" > clear</a>
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
                                {{ $transactions->links() }}
             
                                  </nav>
                    </div>
                </div>

<div class="row " style="overflow-y:scroll;">
    <div class="col">
        <table class="table table-striped catco-pannel">

<thead>
    <tr>
        <th>Id</th>
<th>Date</th>

<th>Narration</th>
<th>Credit</th>
<th>Debit</th>

</tr>
</thead>
<tbody>
    @foreach ($transactions as $transaction)
    <tr>
        <td>{{ $transaction->id}}</td>
      <td>  {{App\operations::displayTime($transaction->TIMESTAMP)}} 
      </td>
      <td>    {{ $transaction->narration}}
        </td>
        <td class="_green"> 
        @if ($transaction->TYPE == 'Cr.')
          {{ $transaction->amount}}
          @endif
          </td>
          <td class="_redtxt"> 
              @if ($transaction->TYPE == 'Dr.')
                {{ $transaction->amount}}
                @endif
                </td>

                

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