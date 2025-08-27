<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Tạo sản phẩm mới</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <div class="container">
        <h1>Thêm sản phẩm mới</h1>
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="form-box">
            @csrf
            <label>Tên sản phẩm</label>
            <input type="text" name="name" required>

            <label>Mô tả sản phẩm</label>
            <textarea name="description" required></textarea>

            <label>Giá sản phẩm</label>
            <input type="number" name="price" required>

            <label>Hình ảnh</label>
            <input type="file" name="image" required>

            <button type="submit" class="btn">Tạo sản phẩm</button>
        </form>
    </div>
</body>

</html>