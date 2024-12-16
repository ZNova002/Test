<!DOCTYPE html>
<html>
<head>
    <title>Cửa hàng</title>
</head>
<body>
    <h1>Cửa hàng</h1>
    <ul>
        @foreach($items as $item)
            <li>
                <strong>{{ $item['item'] }}</strong><br>
                <img src="{{ $item['image'] }}" alt="{{ $item['item'] }}" style="width:100px;height:auto;"><br>
                <strong>Price:</strong> {{ $item['price'] }}<br>
                <form action="{{ route('add_to_cart', ['id' => $item['id']]) }}" method="POST">
                    @csrf
                    <button type="submit">Mua</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>
