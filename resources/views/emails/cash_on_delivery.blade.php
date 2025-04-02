<!DOCTYPE html>
<html>
<head>

    <title>注文確認 - 代金引換</title>
    <style>
        body {
            font-family: 'Noto Sans JP', sans-serif;
        }
    </style>
</head>
<body>
    <h1>注文確認</h1>
    <p>{{ $address['username']}}様</p>

    <p>ご注文いただきありがとうございます。注文が確定しましたので、近日中にお届けいたします。</p>
    <p><strong>お支払い方法:</strong> 代金引換（COD）</p>

    <h2>注文内容</h2>
    <p style="color: red;"><strong>商品名</strong>&nbsp;&nbsp;&nbsp;&nbsp;<strong>価格</strong>&nbsp;&nbsp;&nbsp;&nbsp;<strong>小計</strong></p>

            @php
        $total = $carts->sum(function ($cart) {
            return $cart->product->getSellPrice() * $cart->quantity;
        }) ?? 0;
    @endphp>
    <p>{{trans_lang(('total_amount'))}} : ¥{{ number_format($total, 0) }}</p>

    <p><strong>合計金額:</strong> ¥{{ number_format($total, 0) }}</p>

    <h2>配送情報</h2>
    <p><strong>お名前:</strong> {{ $address['username'] }}</p>
    <p><strong>配送先住所:</strong> {{ $address['address'] }}</p>
    <p><strong>電話番号:</strong> {{ $address['phone'] }}</p>

    <h2>重要なお知らせ</h2>
    <p>商品到着時には合計金額分の現金をご用意ください。</p>
    <p>ご質問や注文内容の変更がございましたら、<strong>support@example.com</strong> までメール、または <strong>+81-123-456-7890</strong> までお電話ください。</p>

    <p>ご利用誠にありがとうございます。</p>
    <p>敬具</p>
    <p><strong>株式会社Acompany</strong></p>
    <p>〒817-0702</p>
    <p>長崎県対馬市上対馬町ふるさと13-3</p>
    <p>電話: 0920-86-4516</p>
</body>

</html>
