@component('mail::message')
# Hi, {{ $user->name }}

Your password has been reset by administrator, here is your temporary password 

- Negotiator ID : {{ $user->agent_code }}
- Email : {{ $user->email }}
- Temporary Password : {{ $temp_pass }}

@component('mail::button', ['url' => '#'])
Login Now
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
