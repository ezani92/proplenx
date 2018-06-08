@component('mail::message')
# Hi {{ $submission->user->name }}

Your submission has been updated by administrator!

- Form Code : {{ $submission->form_code }}
- Older Status : {{ $old_status }}
- Newest Status : {{ $new_status }}

@component('mail::button', ['url' => url('/')])
Login Now To View The Submission
@endcomponent


Thanks,<br>
{{ config('app.name') }}
@endcomponent
