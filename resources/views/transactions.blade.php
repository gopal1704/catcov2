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
        <th>Id</th>
<th>Date</th>

<th>Narration</th>
<th>Credit</th>
<th>Debit</th>
<th>From</th>
</tr>
</thead>
<tbody>
    @foreach ($transactions as $transaction)
    <tr>
        <td>{{ $transaction->id}}</td>
      <td>    {{ Carbon\Carbon::parse($transaction->timestamp)->format('d-m-Y')}}
      </td>
      <td>    {{ $transaction->narration}}
        </td>
        <td> 
        @if ($transaction->TYPE == 'Cr.')
          {{ $transaction->amount}}
          @endif
          </td>
          <td> 
              @if ($transaction->TYPE == 'Dr.')
                {{ $transaction->amount}}
                @endif
                </td>

                <td>{{ $transaction->from}}</td>

    </tr>

@endforeach

  
</tbody>


        </table>
    </div>
    </div>

    <div class="row">
        <div class="col">
                <nav aria-label="Page navigation example">
                    {{ $transactions->links() }}
 
                      </nav>
        </div>
    </div>

    </div>

</div>
</div>
@endsection