<!DOCTYPE html>
<html>
<head>
    <title>以下ユーザーから購入連絡がありました。</title>
</head>
<body>
    <h1>{{ trans_lang('以下ユーザーから購入連絡がありました。') }}</h1>

    <p><strong>名前 :</strong> {{ $address['username'] }}</p>
    <p><strong>メールアドレス :</strong> {{ $user->email }}</p>
    <p><strong>郵便番号 :</strong> {{ session('address') ? session('address')['postal'] :''}}</p>
    <p><strong>住所 :</strong> {{ $user->address }}</p>
    <p><strong>電話番号 :</strong> {{session('address') ? session('address')['phone'] :''}}</p>

    <h2>購入詳細</h2>
    <p style="color: red;">{{ trans_lang('product_name') }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ trans_lang('price') }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ trans_lang('小計') }}</p>
    @foreach ($carts as $item)

    <p>{{ $item->product->name }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;¥{{ number_format($item->product->getSellPrice(), 0) }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;¥{{ number_format(($item->product->getSellPrice() * $item->quantity), 0) }}</p>

    @endforeach
    @php
        $total = $carts->sum(function ($cart) {
            return $cart->product->getSellPrice() * $cart->quantity;
        }) ?? 0;
    @endphp
    <p>{{ trans_lang('total') }} : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;¥{{ number_format($total, 0) }}</p>


    <p>購入方法：銀行振込</p>
    <p>ユーザーとのやり取りをお願いします。</p>
</body>
</html>
