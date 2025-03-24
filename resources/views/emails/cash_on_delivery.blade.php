<!DOCTYPE html>
<html>

<head>
    <title>Order Confirmation - Cash on Delivery</title>
</head>

<body>
    <h1>Order Confirmation</h1>
    <p>Dear {{ $address->username }},</p>

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
    <p><strong>Recipient:</strong> {{ $address->username }}</p>
    <p><strong>Shipping Address:</strong> {{ $address->address }}</p>
    <p><strong>Contact Number:</strong> {{ $address->phone }}</p>

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

</html>
