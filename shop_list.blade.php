<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Cửa hàng</title>
</head>
<body>
    <div class="container mt-3">
        <h1>Cửa hàng</h1>
        <h2>Xin chào <span>{{ session('username') }}</span> <a href='login'>Thoát</a></h2>
        <h2 align="right">
            @if (session()->has('cart.totalQuantity'))
                <a href="{{ route('cart') }}">Bạn có {{ session('cart.totalQuantity') }} sản phẩm trong giỏ hàng</a>
            @else
                Giỏ hàng rỗng
            @endif
        </h2>
    </div>

    <div class="container">
        <?php $count = 0; ?>
        @foreach($items as $item)
            @if($count % 3 == 0)
                <div class='row' align='center'>
            @endif
            <div class='col-sm-4'>
                <img src='{{ $item->Product_img }}' width='90%' height='150'><br>
                <strong>{{ $item->Product_name }}</strong><br>
                <strong>{{ number_format($item->Product_price, 0) }} VND</strong><br>
                <form action="{{ route('add_to_cart', ['id' => $item->Product_id]) }}" method='POST'>
                    @csrf
                    <button type='submit' class='btn btn-primary'>Mua</button>
                </form>
            </div>
            @if($count % 3 == 2)
                </div>
            @endif
            <?php $count++; ?>
        @endforeach
    </div>
</body>
</html>
