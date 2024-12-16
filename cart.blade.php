<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ Hàng</title>
</head>
<body>
    <h1>Giỏ Hàng</h1>
    <ul>
        @if(isset($products) && count($products) > 0)
            @foreach($products as $product)
                <li>
                    <strong>ID:</strong> {{ $product['id'] }}<br>
                    <strong>Tên sản phẩm:</strong> {{ $product['name'] }}<br>
                    <strong>Giá:</strong> {{ number_format($product['price'], 0) }} VND<br>
                    <strong>Số lượng:</strong> {{ $product['quantity'] }}<br>
                    <img src="{{ $product['image'] }}" alt="Hình ảnh sản phẩm" style="width:100px;height:auto;"><br>
                    <form action="{{ route('remove_cart', ['id' => $product['id']]) }}" method='POST' style="display: inline;">
                   @csrf
                     <button type='submit' class='btn btn-danger'>Xóa</button>
                        </form>

                </li>
            @endforeach
            <form action="{{ route('checkout') }}" method='POST' style="margin-top: 20px;">
                @csrf
                <button type='submit' class='btn btn-checkout'>Thanh toán</button>
            </form>
        @else
            <li>Giỏ hàng của bạn đang trống.</li>
        @endif
    </ul>
</body>
</html>
