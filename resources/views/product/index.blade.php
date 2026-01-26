<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Một chút CSS tùy chỉnh để giống thiết kế cũ */
        .product-card {
            transition: transform 0.2s, box-shadow 0.2s;
            border-radius: 15px;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1) !important;
        }

        .product-img {
            height: 200px;
            object-fit: cover;
            border-radius: 12px;
        }

        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
</head>

<body class="bg-light p-md-5 p-3">
    <div class="container">
        <h1 class="text-center fw-bold text-dark mb-5">Danh sách sản phẩm</h1>
        <button class="btn btn-success mb-3"><a href="{{ route('add') }}" class="text-white text-decoration-none">Add
                Product</a></button>
        <div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>ten sp</th>
                        <th>anh</th>
                        <th>gia</th>
                        <th>mo ta</th>
                        <th>hanh dong</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $product['id'] }}</td>
                            <td>{{ $product['name'] }}</td>
                            <td><img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="img-fluid" style="max-height: 100px;"></td>
                            <td>{{ $product['price'] }}</td>
                            <td>{{ $product['description'] }}</td>
                            <td><button><a href="{{ route('detail', ['id' => $product['id']]) }}" class="text-decoration-none">detail</a></button></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>