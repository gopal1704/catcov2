@component('mail::message')
# Wallet Transfer Debit

Dear Customer your wallet  has been debited by USD {{$transaction['amount']}} to {{$transaction['toName']}} Wallet Id :
{{$transaction['toId']}} / Admin.


Thanks,<br>
{{ config('app.name') }}
@endcomponent
