<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Order Confirmation - Cash on Delivery Transfer</title>
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
        <p>Dear {{ $address['username']}},</p>
        <p>Thank you for shopping with us! Your order has been successfully placed and will be delivered to you soon.</p>
    </div>

    <p><strong>Payment Method:</strong> Cash on Delivery (COD)</p>

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
                    <td>{{ $item->quantity }}</td>
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

    <h3>Delivery Information</h3>
    <p><strong>Recipient:</strong> {{ $address['username'] }}</p>
    <p><strong>Shipping Address:</strong> {{ $address['address'] }}</p>
    <p><strong>Contact Number:</strong> {{ $address['phone'] }}</p>

    <h3>Important Information</h3>
    <p>Please ensure you have the total amount ready in cash at the time of delivery.</p>
    <p>If you have any questions or need to make changes to your order, please contact us at {{config('settings.contact_email')}} or call {{config('settings.contact_phone')}}.</p>

    <div class="footer">
        <p>Thank you for choosing us!</p>
        <p>Best regards,</p>
        <p>{{config('settings.contact_address')}}</p>
        <p>{{config('settings.contact_phone')}}</p>
        {{-- <p>Acompany Co., Ltd.</p> --}}
        {{-- <p>〒817-0702</p>
        <p>13-3 Furusato, Kamitsushima-cho, Tsushima City, Nagasaki Prefecture</p>
        <p>Phone: 0920-86-4516</p> --}}
    </div>
</body>
</html>
