<!DOCTYPE html>
<html>

<head>
    <title>Order Confirmation - Bank Transfer</title>
</head>

<body>
    <h1>Order Confirmation</h1>
    <p>Dear {{ $address->username }},</p>

    <p>Thank you for your purchase! Your order has been successfully placed. Please complete the payment via bank transfer to proceed with the shipping.</p>
    
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

    <h2>Bank Transfer Details</h2>
    <p><strong>Bank Name:</strong> ◯◯ Bank</p>
    <p><strong>Branch:</strong> ◯◯ Branch</p>
    <p><strong>Account Type:</strong> Ordinary</p>
    <p><strong>Account Number:</strong> ◯◯◯◯◯◯</p>
    <p><strong>Account Name:</strong> Acompany Co., Ltd.</p>

    <h2>Important Information</h2>
    <p>- Please complete the payment within <strong>3 business days</strong>.</p>
    <p>- Use your <strong>order number</strong> as the reference when making the transfer.</p>
    <p>- Once the payment is confirmed, we will proceed with shipping and notify you of the estimated delivery date.</p>
    <p>- If you have any questions, contact us at <strong>support@example.com</strong> or call <strong>+81-123-456-7890</strong>.</p>

    <p>Thank you for choosing us!</p>
    <p>Best regards,</p>
    <p><strong>Acompany Co., Ltd.</strong></p>
    <p>〒817-0702</p>
    <p>13-3 Furusato, Kamitsushima-cho, Tsushima City, Nagasaki Prefecture</p>
    <p>Phone: 0920-86-4516</p>
</body>

</html>
