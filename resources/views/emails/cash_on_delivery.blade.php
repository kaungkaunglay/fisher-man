{{-- <!DOCTYPE html>
<html>

<head>
    <title>Order Confirmation - Cash on Delivery</title>
</head>

<body>
    <h1>Order Confirmation</h1>
    <p>Dear {{ $address['username']}},</p>

    <p>Thank you for shopping with us! Your order has been successfully placed and will be delivered to you soon.</p>
    <p><strong>Payment Method:</strong> Cash on Delivery (COD)</p>

    <h2>Order Details</h2>
    <p style="color: red;"><strong>Product Name</strong>&nbsp;&nbsp;&nbsp;&nbsp;<strong>Price</strong>&nbsp;&nbsp;&nbsp;&nbsp;<strong>Subtotal</strong></p>

    @foreach ($carts as $item)
    <p>{{ $item->product->name }}&nbsp;&nbsp;&nbsp;&nbsp;¥{{ number_format($item->product->getSellPrice(), 0) }}&nbsp;&nbsp;&nbsp;&nbsp;¥{{ number_format($item->product->getSellPrice() * $item->quantity, 0) }}</p>
    @endforeach

    @php
        $total = $carts->sum(function ($cart) {
            return $cart->product->getSellPrice() * $cart->quantity;
        }) ?? 0;
    @endphp

    <p><strong>Total Amount:</strong> ¥{{ number_format($total, 0) }}</p>

    <h2>Delivery Information</h2>
    <p><strong>Recipient:</strong> {{ $address['username'] }}</p>
    <p><strong>Shipping Address:</strong> {{ $address['address'] }}</p>
    <p><strong>Contact Number:</strong> {{ $address['phone'] }}</p>

    <h2>Important Information</h2>
    <p>Please ensure you have the total amount ready in cash at the time of delivery.</p>
    <p>If you have any questions or need to make changes to your order, please contact us at <strong>support@example.com</strong> or call <strong>+81-123-456-7890</strong>.</p>

    <p>Thank you for choosing us!</p>
    <p>Best regards,</p>
    <p><strong>Acompany Co., Ltd.</strong></p>
    <p>〒817-0702</p>
    <p>13-3 Furusato, Kamitsushima-cho, Tsushima City, Nagasaki Prefecture</p>
    <p>Phone: 0920-86-4516</p>
</body>

</html> --}}

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Order Confirmation</title>
    <style>
        body { font-family: 'Helvetica', 'Arial', sans-serif; line-height: 1.6; }
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

    <p><strong>Payment Method:</strong> </p>

    <h3>Order Details</h3>
    <table class="order-details">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Price</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($carts as $item)
                <tr>
                    <td>{{ $item->product->name }}</td>
                    <td>¥{{ number_format($item->product->getSellPrice(), 0) }}</td>
                    <td>¥{{ number_format($item->product->getSellPrice() * $item->quantity, 0) }}</td>
                </tr>
            @endforeach

            @php
        $total = $carts->sum(function ($cart) {
            return $cart->product->getSellPrice() * $cart->quantity;
        }) ?? 0;
    @endphp
            <tr class="total">
                <td colspan="2">Total Amount:</td>
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
    <p>If you have any questions or need to make changes to your order, please contact us at support@example.com or call +81-123-456-7890.</p>

    <div class="footer">
        <p>Thank you for choosing us!</p>
        <p>Best regards,</p>
        <p>Acompany Co., Ltd.</p>
        <p>〒817-0702</p>
        <p>13-3 Furusato, Kamitsushima-cho, Tsushima City, Nagasaki Prefecture</p>
        <p>Phone: 0920-86-4516</p>
    </div>
</body>
</html>
