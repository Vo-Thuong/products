<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Danh sách sản phẩm</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <div class="container">
        <h1>Sản phẩm</h1>
        <a href="{{ route('products.create') }}" class="btn">+ Thêm sản phẩm</a>

        <div class="grid">
            @foreach ($products as $product)
            <div class="card">
                @if ($product['image'])
                <img src="{{ asset('storage/' . $product['image']) }}" alt="Ảnh sản phẩm">
                @endif
                <h2>{{ $product['name'] }}</h2>
                <p>{{ $product['description'] }}</p>
                <p class="price">{{ number_format($product['price'], 0, ',', '.') }} VND</p>
                <div class="actions">
                    <a href="{{ route('products.edit', $product['id']) }}" class="btn">Sửa</a>
                    <a href="{{ route('products.destroy', $product['id']) }}" class="btn btn-delete">Xóa</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>

</html>