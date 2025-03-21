<!DOCTYPE html>
<html>
<head>
    <title>Order Completed</title>
</head>
<body>
    <h1>{{ trans_lang('order_completed') }}</h1>
    <p>{{ trans_lang('hello') }}, {{ $user->username }}!</p>
    <p>{{ trans_lang('your_order_has_been_successfully_completed') }}.</p>

    <h2>Buyer Information</h2>
    <p><strong>Name:</strong> {{ $user->name }}</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>

    <h2>Order Details</h2>
    <table border="1" width="100%" style="border-collapse: collapse; text-align: left;">
        <thead>
            <tr>
                <th scope="col">{{ trans_lang('product_name') }}</th>
                <th scope="col">{{ trans_lang('price') }}</th>
                <th scope="col">{{ trans_lang('小計') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($carts as $item)
            <tr>
                <td>{{ $item->product->name }}</td>
                <td>¥{{ number_format($item->product->getSellPrice(), 0) }}</td>
                <td>¥{{ number_format(($item->product->getSellPrice() * $item->quantity), 0) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <p>{{ trans_lang('thank_you_for_shopping_with_us') }}!</p>
</body>
</html>
