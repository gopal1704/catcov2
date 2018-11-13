@extends('dashboard')





@section('content')



<div class="col">

<div class="row justify-content-center align-items-center">
<div class="col-4 text-center">

    <h5>Confirm Wallet payment</h5>


<hr>


    <table class="table table-bordered text-nowrap" >

                                         

            <tbody>



<tr> <th>Scheme</th>
    <td>default</td></tr>
   
   
    <tr> <th>Amount</th>
    <td>{{$amount}}</td></tr>
   

</tr>





            </tbody>
        </table>

        <form  method="POST" action="/createinvestment/wallet" >
            @csrf
            <input type="hidden" name="amount" value={{$amount}}>
            <input type="hidden" name="schemeId" value="{{$schemeId}}">
            <input type="submit" name="submit">

        </form>
    
</div>
</div>
</div>

@endsection