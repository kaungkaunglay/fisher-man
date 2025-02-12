@component('mail::message')
# Hello **{{ $user->username }}**,

We received a request to reset the password for your account. To proceed with the password reset, please click the button below:


@component('mail::button', ['url' => url('/reset-password/'.$token).'?email='.urlencode($user->email)])
reset password
@endcomponent{{-- use double space for line break --}}

If you did not request a password reset, no further action is required.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
