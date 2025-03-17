<!DOCTYPE html>
<html>
<head>
<title>メール認証</title>
</head>
<body>
<div class="header" style="text-align: center; padding: 0px 0px 30px 0px; border-bottom: 1px solid #edf2f7;">
<img src="https://s6.imgcdn.dev/YhKH6e.png" alt="会社のロゴ" class="logo" style="width: 100px; height: auto;">
</div>

<h1 style="font-size: 24px; color: #333; text-align: center; margin-top: 20px;">こんにちは <strong>{{ $user->username }}</strong> 様,</h1>

<p style="font-size: 16px; color: #555; text-align: center; margin: 20px 0;">
メールの認証リクエストを受け取りました。認証を進めるには、以下のボタンをクリックしてください：
</p>

<div style="text-align: center; margin: 30px 0;">
<a href="{{ $url }}" style="background-color:#005B96;color:white;padding:5px 20px;text-decoration:none;border-radius: 10px;">メールを認証する</a>
</div>

<footer style="font-size: 10px; color: #555; margin: 20px 0;">
<strong>住所: {{config('settings.contact_address')}}</strong><br>
<strong>メール: {{ config('settings.contact_email')}}</strong><br>
<strong>電話番号: {{config('settings.contact_phone')}}</strong>
</footer>
</body>
</html>


{{-- <a href="https://imgcdn.dev/i/YhKH6e"><img src="https://s6.imgcdn.dev/YhKH6e.png" alt="YhKH6e.png" border="0"></a> --}}
{{-- <img src="https://s6.imgcdn.dev/YhKH6e.png" alt="YhKH6e.png" border="0"> --}}
