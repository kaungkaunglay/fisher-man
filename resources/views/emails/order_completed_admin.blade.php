<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>以下ユーザーから購入連絡がありました。</title>
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

        @font-face {
            font-family: 'Noto Sans JP';
            font-style: normal;
            font-weight: 700;
            src: url('https://fonts.gstatic.com/ea/notosansjp/v5/NotoSansJP-Bold.woff2') format('woff2'),
                 url('https://fonts.gstatic.com/ea/notosansjp/v5/NotoSansJP-Bold.woff') format('woff');
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
    <h1>{{ trans_lang('以下ユーザーから購入連絡がありました。') }}</h1>

    <p><strong>名前 :</strong> {{ $address['username'] }}</p>
    <p><strong>メールアドレス :</strong> {{ $user->email }}</p>
    <p><strong>郵便番号 :</strong> {{ session('address') ? session('address')['postal'] :''}}</p>
    <p><strong>住所 :</strong> {{ $user->address }}</p>
    <p><strong>電話番号 :</strong> {{session('address') ? session('address')['phone'] :''}}</p>

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

    <p>購入方法：{{ $payment_type }}</p>
    <p>ユーザーとのやり取りをお願いします。</p>
</body>
</html>
