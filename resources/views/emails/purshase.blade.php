@component('mail::message')
# Purshase Complete

Your products are successfully purshased.
You can click below for more details.
@component('mail::button', ['url' => ''])
Click Here!
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
