@component('mail::message')
# Hi, {{ $user->name }}

Your Account Was Created by Proplenx Administrator, Below is your login access, 

- Negotiator ID : {{ $user->agent_code }}
- Email : {{ $user->email }}
- Temporary Password : {{ $temp_pass }}

@component('mail::button', ['url' => '#'])
Login Now
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
