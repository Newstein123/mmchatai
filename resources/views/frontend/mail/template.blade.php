@component('mail::message')
# Verify your email address


Hi {{ $user->name }},


Please click the button below to verify your email address:


@component('mail::button', ['url' => $verificationUrl])
Verify Email
@endcomponent


Thanks,<br>
{{ config('app.name') }}
@endcomponent
