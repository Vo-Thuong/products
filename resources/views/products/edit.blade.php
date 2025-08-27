<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Sửa sản phẩm</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <div class="container">
        <h1>Sửa sản phẩm</h1>
        <form action="{{ route('products.update', $product['id']) }}" method="POST" enctype="multipart/form-data"
            class="form-box">
            @csrf
            <label>Tên sản phẩm</label>
            <input type="text" name="name" value="{{ $product['name'] }}" required>

            <label>Mô tả sản phẩm</label>
            <textarea name="description" required>{{ $product['description'] }}</textarea>

            <label>Giá sản phẩm</label>
            <input type="number" name="price" value="{{ $product['price'] }}" required>

            <label>Hình ảnh (nếu muốn đổi)</label>
            <input type="file" name="image">

            <button type="submit" class="btn">Cập nhật</button>
        </form>
    </div>
</body>

</html>