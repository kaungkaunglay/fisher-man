<!DOCTYPE html>
<html>

<head>
    <title>Order Completed</title>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300;400;700&display=swap" rel="stylesheet">
    <style>
        /* Fallback font stack */
        body {
            font-family: 'Noto Sans JP', sans-serif, "Hiragino Kaku Gothic Pro", Meiryo, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        /* PDF-specific font face declaration */
        @font-face {
            font-family: 'Noto Sans JP';
            font-style: normal;
            font-weight: 400;
            src: url('https://fonts.gstatic.com/ea/notosansjp/v5/NotoSansJP-Regular.woff2') format('woff2'),
                 url('https://fonts.gstatic.com/ea/notosansjp/v5/NotoSansJP-Regular.woff') format('woff');
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        .total-row {
            font-weight: bold;
        }
        h1, h2 {
            color: #2c3e50;
            font-weight: 700;
        }
        strong {
            font-weight: 700;
        }
    </style>
</head>

<body>
    <h1>{{ trans_lang('購入が完了しました') }}</h1>
    <p>{{ $user->username }}様</p>
    <p>いつもお世話になっております。この度は商品のご購入を頂き有難うございます。</p>
    <p>なお、購入内容は以下となります。以下指定口座に振込の程、宜しくお願い致します</p>

    <h2>注文内容</h2>
    <table>
        <thead>
            <tr style="color: #e74c3c;">
                <th>商品名</th>
                <th>価格</th>
                <th>数量</th>
                <th>小計</th>
            </tr>
        </thead>
        <tbody>
            @php
                $total = 0;
            @endphp
            
            @foreach ($carts as $item)
                @php
                    $subtotal = $item->product->getSellPrice() * $item->quantity;
                    $total += $subtotal;
                @endphp
                <tr>
                    <td>{{ $item->product->name }}</td>
                    <td>¥{{ number_format($item->product->getSellPrice(), 0) }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>¥{{ number_format($subtotal, 0) }}</td>
                </tr>
            @endforeach
            
            <tr class="total-row">
                <td colspan="3"><strong>合計金額:</strong></td>
                <td>¥{{ number_format($total, 0) }}</td>
            </tr>
        </tbody>
    </table>
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