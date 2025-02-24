<!DOCTYPE html>
<html>
<head>
<title>Verify Email</title>
</head>
<body>
<div class="header" style="text-align: center; padding: 0px 0px 30px 0px; border-bottom: 1px solid #edf2f7;">
<img src="{{ config('app.url') . '/assets/logos/' . config('settings.logo') }}" alt="Company Logo" class="logo" style="width: 150px; height: 100px;">
</div>

<h1 style="font-size: 24px; color: #333; text-align: center; margin-top: 20px;">Hello <strong>{{ $user->username }}</strong>,</h1>

<p style="font-size: 16px; color: #555; text-align: center; margin: 20px 0;">
We received a request to verify for your email. To proceed with the verify email, please click the button below:
</p>

<div style="text-align: center; margin: 30px 0;">
<a href="/verify-email/{{ $token }}" style="background-color:#005B96;color:white;padding:5px 20px;text-decoration:none;">Verify Email</a>
</div>

<footer style="font-size: 10px; color: #555; margin: 20px 0;">
<strong>Address: {{config('settings.contact_address')}}</strong><br>
<strong>Email: {{ config('settings.contact_email')}}</strong><br>
<strong>Phone Number: {{config(key: 'settings.contact_phone')}}</strong>
</footer>
</body>
</html>
