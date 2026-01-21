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
            box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
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
        <button class="btn btn-success mb-3"><a href="{{ route('add') }}" class="text-white text-decoration-none">Add Product</a></button>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 g-4">
            @foreach($products as $product)
                <div class="col">
                    <div class="card h-100 border-0 shadow-sm p-3 product-card">
                        <small class="text-muted font-monospace mb-2">#{{ $product['id'] }}</small>
                        
                        <img src="{{ asset(str_replace('public/', '', $product['image'])) }}" 
                             class="card-img-top product-img" 
                             alt="{{ $product['name'] }}">
                        
                        <div class="card-body px-0 pb-0">
                            <h5 class="card-title fw-bold text-dark text-truncate">{{ $product['name'] }}</h5>
                            <p class="card-text text-secondary small line-clamp-2">
                                {{ $product['description'] }}
                            </p>
                        </div>

                        <div class="mt-auto pt-3 d-flex justify-content-between align-items-center">
                            <span class="text-danger fw-bold fs-5">
                                {{ number_format($product['price'], 0, ',', '.') }}đ
                            </span>
                            <button class="btn btn-primary btn-sm px-3">
                                Mua ngay
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>