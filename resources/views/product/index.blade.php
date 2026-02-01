<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1 class="text-center fw-bold text-dark mb-5">Danh sách sản phẩm</h1>
        <button class="btn btn-success mb-3"><a href="{{ route('products.create') }}"
                class="text-white text-decoration-none">Add
                Product</a></button>
        <div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>ten sp</th>
                        <th>gia</th>
                        <th>so luong</th>
                        <th>hanh dong</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $product['id'] }}</td>
                            <td>{{ $product['name'] }}</td>
                            <td>{{ $product['price'] }}</td>
                            <td>{{ $product['quantity'] }}</td>
                            <td>
                                <button class="btn btn-primary">
                                    <a href="{{ route('products.show', ['product' => $product['id']]) }}"
                                        class="text-decoration-none text-white">detail</a>
                                </button>
                                <button class="btn btn-info">
                                    <a href="{{ route('products.edit', $product->id) }}"
                                    class="text-decoration-none text-dark">edit</a>
                                </button>
                                <button class="btn btn-danger">
                                    <a href="{{ route('products.destroy', $product->id) }}"
                                    class="text-decoration-none text-dark">delete</a>
                                </button>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div>
            {{ $products->links() }}
        </div>
    </div>

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script> -->
</body>

</html>