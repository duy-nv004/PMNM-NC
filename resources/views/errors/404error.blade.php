<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Không tìm thấy trang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .error-container {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }
        .error-code {
            font-size: 120px;
            font-weight: 900;
            color: #dee2e6;
            line-height: 1;
        }
        .error-message {
            margin-top: -50px;
        }
        .illustration {
            max-width: 400px;
            width: 100%;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="container error-container">
    <div class="row">
        <div class="col-12">
            <div class="error-code">404</div>
            
            <div class="error-message">
                <h1 class="display-4 fw-bold text-dark">Trang không tồn tại</h1>
                <p class="lead text-muted mb-5">
                    Có vẻ như đường dẫn này đã bị hỏng hoặc trang web đã được di chuyển đi nơi khác.
                </p>
                
                <div class="d-flex justify-content-center gap-3">
                    <a href="{{ url('/') }}" class="btn btn-primary btn-lg px-4 rounded-pill shadow-sm">
                        Quay lại trang chủ
                    </a>
                    <button onclick="history.back()" class="btn btn-outline-secondary btn-lg px-4 rounded-pill">
                        Quay lại trang trước
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>