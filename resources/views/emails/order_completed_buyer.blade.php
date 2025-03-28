<!DOCTYPE html>
<html>

<head>
    <title>Order Completed</title>
</head>

<body>
    <h1>{{ trans_lang('購入が完了しました') }}</h1>
    <p>{{ $user->username }}様</p>
    <p>いつもお世話になっております。この度は商品のご購入を頂き有難うございます。</p>
    <p>なお、購入内容は以下となります。以下指定口座に振込の程、宜しくお願い致します</p>

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

    <p>銀行口座</p>
    <p>◯◯銀行　普通　口座番号　◯◯◯◯◯◯</p>
    <p>振込確認次第、発送日等のご連絡をさせて頂きます。
    引き続き宜しくお願い致します。</p>
    <p>＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝</p>
    <p>株式会社Acompany</p>
    <p>〒817-0702</p>
    <p>長崎県対馬市上対馬町古里13-3</p>
    <p>電話番号 : 0920-86-4516</p>
</body>

</html>