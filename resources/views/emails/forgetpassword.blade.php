@component('mail::message')
# Hello!

You are receiving this email because we received a password reset request for your account.
@component('mail::button', ['url' => $frontResetPasswordUrl])
    Reset
@endcomponent

Thanks,<br>
{{ config('app.name') }}

@component('mail::subcopy')
    If you’re having trouble clicking the Reset button, copy and paste the URL below
    into your web browser: [{{ $frontResetPasswordUrl }}]({{ $frontResetPasswordUrl }})
@endcomponent

@endcomponent