<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>注文確認 - 代金引換</title>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300;400;700&display=swap" rel="stylesheet">
    <style type="text/css">
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
    <h1>注文確認</h1>
    <p>{{ $address['username'] }}様</p>

    <p>ご注文いただきありがとうございます。注文が確定しましたので、近日中にお届けいたします。</p>
    <p><strong>お支払い方法:</strong> 代金引換（COD）</p>

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

    <!-- Rest of your content remains the same -->
    <h2>配送情報</h2>
    <table>
        <tr>
            <td><strong>お名前:</strong></td>
            <td>{{ $address['username'] }}</td>
        </tr>
        <tr>
            <td><strong>配送先住所:</strong></td>
            <td>{{ $address['address'] }}</td>
        </tr>
        <tr>
            <td><strong>電話番号:</strong></td>
            <td>{{ $address['phone'] }}</td>
        </tr>
    </table>

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