@component('mail::message')
<div class="header" style="text-align: center; padding: 0px 0px 30px 0px; border-bottom: 1px solid #edf2f7;">
    <img src="https://r-mekiki.com/assets/images/logo.png" alt="Company Logo" class="logo" style="width: 150px; height: 100px;">
</div>

<h1 style="font-size: 24px; color: #333; text-align: center; margin-top: 20px;">こんにちは <strong>{{ $user->username }}</strong>,</h1>

<p style="font-size: 16px; color: #555; text-align: center; margin: 20px 0;">
お客様のアカウントのパスワードリセットのリクエストを受け取りました。パスワードをリセットするには、以下のボタンをクリックしてください。
</p>

<div style="text-align: center; margin: 30px 0;">
    @component('mail::button', ['url' => url('/reset-password/'.$token).'?email='.urlencode($user->email)])
    Reset Password
    @endcomponent
</div>

<p style="font-size: 16px; color: #555; text-align: center; margin: 20px 0;">
パスワードリセットをリクエストしていない場合は、特に対応は不要です。
</p>
<footer style="font-size: 10px; color: #555; margin: 20px 0;">
    <strong>住所: {{config('settings.contact_address')}}</strong><br>
    <strong>メール: {{ config('settings.contact_email')}}</strong><br>
    <strong>電話番号: {{config(key: 'settings.contact_phone')}}</strong>
</footer>
@endcomponent
