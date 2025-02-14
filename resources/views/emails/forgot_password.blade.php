@component('mail::message')
<div class="header" style="text-align: center;padding: 0px 0px 30px 0px;border-bottom: 1px solid #edf2f7;">
<img src="https://r-mekiki.com/assets/images/logo.png" alt="Company Logo" class="logo" style="width: 200px;height: auto;">
</div>

# Hello **{{ $user->username }}**,

We received a request to reset the password for your account. To proceed with the password reset, please click the button below:


@component('mail::button', ['url' => url('/reset-password/'.$token).'?email='.urlencode($user->email)])
reset password
@endcomponent{{-- use double space for line break --}}

If you did not request a password reset, no further action is required.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
