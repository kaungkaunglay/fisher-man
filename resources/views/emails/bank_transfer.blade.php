<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Order Confirmation - Bank Transfer</title>
    <style>
        @font-face {
     font-family: 'Noto Sans JP';
     src: url({{ public_path('assets/fonts/NotoSanJP/NotoSansJP-Regular.ttf') }}) format('truetype');
     }
     body { font-family: 'Noto Sans JP', sans-serif; line-height: 1.6; }
     .header { text-align: center; margin-bottom: 20px; }
     .order-details { width: 100%; border-collapse: collapse; margin: 20px 0; }
     .order-details th, .order-details td { border: 1px solid #ddd; padding: 8px; text-align: left; }
     .order-details th { background-color: #f2f2f2; }
     .total { font-weight: bold; }
     .footer { margin-top: 30px; font-size: 0.9em; }
 </style>
</head>

<body>
    <div class="header">
        <h2>Order Confirmation</h2>
        <p>Dear {{ $address['username'] }},</p>
        <p>Thank you for shopping with us! Your order has been successfully placed. Please complete the payment via bank transfer to proceed with the shipping.</p>
    </div>

    <h3>Order Details</h3>
    <table class="order-details">
        <thead>
            <tr>
                <th>{{ trans_lang('product_name') }}</th>
                <th>{{ trans_lang('price') }}</th>
                <th>{{ trans_lang('quantity') }}</th>
                <th>{{ trans_lang('sub_total') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($carts as $item)
                <tr>
                    <td>{{ $item->product->name }}</td>
                    <td>¥{{ number_format($item->product->getSellPrice(), 0) }}</td>
                    <td>¥{{ $item->quantity }}</td>
                    <td>¥{{ number_format($item->product->getSellPrice() * $item->quantity, 0) }}</td>
                </tr>
            @endforeach

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

    <h3>Bank Transfer Details</h3>
    <p><strong>Bank Name:</strong> ◯◯ Bank</p>
    <p><strong>Branch:</strong> ◯◯ Branch</p>
    <p><strong>Account Type:</strong> Ordinary</p>
    <p><strong>Account Number:</strong> ◯◯◯◯◯◯</p>
    <p><strong>Account Name:</strong> Acompany Co., Ltd.</p>

    <h3>Delivery Information</h3>
    <p><strong>Recipient:</strong> {{ $address['username'] }}</p>
    <p><strong>Shipping Address:</strong> {{ $address['address'] }}</p>
    <p><strong>Contact Number:</strong> {{ $address['phone'] }}</p>

    <h3>Important Information</h3>
    <p>- Please complete the payment within <strong>3 business days</strong>.</p>
    <p>- Use your <strong>order number</strong> as the reference when making the transfer.</p>
    <p>- Once the payment is confirmed, we will proceed with shipping and notify you of the estimated delivery date.</p>
    <p>- If you have any questions, contact us at <strong>support@example.com</strong> or call <strong>+81-123-456-7890</strong>.</p>

    <div class="footer">
        <p>Thank you for choosing us!</p>
        <p>Best regards,</p>
        <p><strong>Acompany Co., Ltd.</strong></p>
        <p>〒817-0702</p>
        <p>13-3 Furusato, Kamitsushima-cho, Tsushima City, Nagasaki Prefecture</p>
        <p>Phone: 0920-86-4516</p>
    </div>
</body>

</html>
