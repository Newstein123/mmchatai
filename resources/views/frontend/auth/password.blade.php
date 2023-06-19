{{-- mail UI form --}}
@component('mail::message')
    # Create new Password

    Hello {{ $customer->name }}

    Click the following link to reset your password:
    {{ route('resetpasswordForm', $token) }}
    If you did not request a password reset,
    no further action is required.

    Thanks,
    {{ config('app.name') }}
@endcomponent
