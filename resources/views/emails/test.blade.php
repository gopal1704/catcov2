@component('mail::message')
# This is a test mail from catcotrade.info



@component('mail::button', ['url' => ''])
Catcotrade
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
