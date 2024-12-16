<!DOCTYPE html>
<html>
<head>
    <title>Thanh toán</title>
</head>
<body>
    <h1>Thanh toán</h1>
    @if(count($cart) > 0)
        <ul>
            @foreach($cart as $item)
                <li>Sản phẩm ID: {{ $item['id'] }} - Số lượng: {{ $item['item'] }}</li>
            @endforeach
        </ul>
        <form method="POST" action="{{ route('process-checkout') }}">
            @csrf
            <button type="submit">Xác nhận thanh toán</button>
        </form>
    @else
        <p>Giỏ hàng của bạn trống.</p>
    @endif
</body>
</html>
