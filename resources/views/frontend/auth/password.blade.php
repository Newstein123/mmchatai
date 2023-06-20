{{-- mail UI form --}}
{{-- @component('mail::message')
    # Create new Password

    Hello {{ $customer->name }}
    Click the following link to reset your password:
    @component('mail::button', ['url' => route('resetpasswordForm', $token) ])
    Reset Your Password
    @endcomponent
    If you did not request a password reset,
    no further action is required.
    Thanks,
    {{ config('app.name') }}
@endcomponent --}}

{{--  --}}

@component('mail::message')
# Change your Password


Hi {{ $customer->name }},


Please click the button below to change your password:

@component('mail::button', ['url' => route('resetpasswordForm', $token)])
Reset Your Password
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

