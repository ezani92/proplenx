@component('mail::message')
# {{ $input['title'] }}

@component('mail::panel')
<p>{{ $input['body'] }}</p>
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
