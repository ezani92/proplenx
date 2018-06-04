@component('mail::message')
# Hi {{ $submission->user->name }}

Your submission [{{ $submission->form_code }}] has been update by administrator

@component('mail::button', ['url' => url('/')])
Login Now To Check Status
@endcomponent


Thanks,<br>
{{ config('app.name') }}
@endcomponent
