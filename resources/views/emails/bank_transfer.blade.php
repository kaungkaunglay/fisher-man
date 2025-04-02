<!DOCTYPE html>
<html>

<head>
    <title>注文確認 - 銀行振込</title>
</head>

<body>
    <h1>注文確認</h1>
    <p>{{ $address['username'] }}様</p>

    <p>ご注文いただき誠にありがとうございます。注文が確定しました。商品の発送には銀行振込によるお支払いの完了が必要です。</p>
    
    <h2>注文内容</h2>
    <p style="color: red;"><strong>商品名</strong>&nbsp;&nbsp;&nbsp;&nbsp;<strong>価格</strong>&nbsp;&nbsp;&nbsp;&nbsp;<strong>小計</strong></p>

            @php
                $total = $carts->sum(function ($cart) {
                    return $cart->product->getSellPrice() * $cart->quantity;
                }) ?? 0;
            @endphp
            <tr class="total">
                <td colspan="3">{{ trans_lang('total_amount') }}:</td>
                <td>¥{{ number_format($total, 0) }}</td>
            </tr>
        </tbody>
    </table>

    @php
        $total = $carts->sum(function ($cart) {
            return $cart->product->getSellPrice() * $cart->quantity;
        }) ?? 0;
    @endphp

    <p><strong>合計金額:</strong> ¥{{ number_format($total, 0) }}</p>

    <h2>振込先情報</h2>
    <p><strong>銀行名:</strong> ◯◯銀行</p>
    <p><strong>支店名:</strong> ◯◯支店</p>
    <p><strong>口座種別:</strong> 普通</p>
    <p><strong>口座番号:</strong> ◯◯◯◯◯◯</p>
    <p><strong>口座名義:</strong> 株式会社Acompany</p>

    <h2>重要なお知らせ</h2>
    <p>- お支払いは<strong>3営業日以内</strong>にお願いいたします。</p>
    <p>- 振込時の通信欄には<strong>注文番号</strong>をご記入ください。</p>
    <p>- 入金確認後、商品を発送し、お届け予定日をご連絡いたします。</p>
    <p>- ご質問がございましたら、<strong>support@example.com</strong> までメール、または <strong>+81-123-456-7890</strong> までお電話ください。</p>

    <p>ご利用誠にありがとうございます。</p>
    <p>敬具</p>
    <p><strong>株式会社Acompany</strong></p>
    <p>〒817-0702</p>
    <p>長崎県対馬市上対馬町ふるさと13-3</p>
    <p>電話: 0920-86-4516</p>
</body>

</html>