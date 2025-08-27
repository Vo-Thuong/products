<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Danh sách sản phẩm</title>
    <!-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"> -->
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>

<body>
    <div class="container">
        <h1>Book đi nào. Mãi bên nhau bạn nhé!</h1>
        <p class="subtitle">Top nơi ở sang chảnh đón hè đã sẵn sàng trên Travelcon. Book đi ngay nè.</p>

        <a href="{{ route('products.create') }}" class="btn add-btn">+ Thêm sản phẩm</a>

        <div class="grid">
            @foreach ($products as $product)
            <div class="card">
                @if ($product['image'])
                <img src="{{ asset('storage/' . $product['image']) }}" alt="Ảnh sản phẩm">
                @endif

                <div class="info">
                    <div class="rating">★★★★★ <span>{{ $product['reviews'] ?? 0 }} Review</span></div>
                    <h2>{{ $product['name'] }}</h2>
                    <p>{{ $product['description'] }}</p>
                    <p class="price">Giá tiền <span>{{ number_format($product['price'], 0, ',', '.') }} đ</span></p>

                    <div class="status">
                        <span>Còn {{ $product['rooms_left'] ?? 0 }} phòng</span>
                        <span>{{ $product['booked'] ?? 0 }} đã đặt</span>
                    </div>

                    <div class="actions">
                        <a href="{{ route('products.edit', $product['id']) }}" class="btn">Sửa</a>
                        <a href="{{ route('products.destroy', $product['id']) }}" class="btn btn-delete">Xóa</a>
                        <a href="#" class="btn btn-order">Đặt Ngay ⚡</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>

</html>