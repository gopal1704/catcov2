@extends('dashboard')


@section('content')



<div class="col">

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
<div class="row justify-content-center align-items-center">
<div class="col-4 text-center">

<h4>Confirm Payment  </h4>


<table class="table table-striped catco-pannel">

    <thead>
        <tr>
            <th>Payment Id</th>
    
    <th>Amount</th>
   
    </tr>
    </thead>
    <tbody>
<tr>

    <td>{{$gp}}</td>
    <td>{{$amount}}</td>
</tr>
        </tbody>

        </table>

<form name="pay_with_globepay" id="pay_with_globepay" action="https://www.globepayinc.com/make_payment.php" target="_blank" method="post">
<input type="hidden" name="cancel_url" id="cancel_url" value="https://catcotrade.info/gperror" />
<input type="hidden" name="success_url" id="success_url" value="https://catcotrade.info/gpsuccess">
<input type="hidden" name="custom" id="custom" value="{{$gp}}"  />
<input type="hidden" name="button_type" id="button_type" value="buy_now" />
<input type="hidden" name="item_name" id="item_name" value="test"  />
<input type="hidden" name="item_id" id="item_id" value="456"  />
<input type="hidden" name="price" id="price" value="{{$amount}}"  />
<input type="hidden" name="quantity" id="quantity" value="1"  />
<input type="hidden" name="postage" id="postage" value=""  />
<input type="hidden" name="tax_rate" id="tax_rate" value=""  />
<input type="hidden" name="currency" id="currency" value="USD"  />
<input type="hidden" name="callback_url" id="callback_url" value="https://us-central1-investment-3327a.cloudfunctions.net/function-1"  />
<input type="hidden" name="email_address" id="email_address" value="catcotradeinfo@gmail.com"  />



<button onClick="javascript:document.getElementById('pay_with_globepay').submit();"  > Proceed to pay </button>
</form>

</div>


</div>


</div>

@endsection