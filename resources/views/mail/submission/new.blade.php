@component('mail::message')
# Hi Administrator

Your have new case submitted by negotiator 

- Negotiator ID : {{ $negotiator->agent_code }}
- Name : {{ $negotiator->email }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
