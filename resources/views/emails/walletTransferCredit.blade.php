@component('mail::message')
# Wallet Transfer Credit

Dear Customer your wallet  has been credited by USD {{$transaction['amount']}} from {{$transaction['fromName']}}
Wallet Id : {{$transaction['fromId']}} / Admin.


Thanks,<br>
{{ config('app.name') }}
@endcomponent
