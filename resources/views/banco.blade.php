<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Bàn cờ {{ $n }}x{{ $n }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .chess-container {
            display: inline-block;
            border: 5px solid black;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }

        .row-chess {
            display: flex;
        }

        .cell {
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 10px;
            color: rgba(0, 0, 0, 0.1);
        }

        /* Màu ô cờ */
        .bg-white-cell {
            background-color: white;
        }

        .bg-black-cell {
            background-color: black;
        }

        @media (max-width: 600px) {
            .cell {
                width: 40px;
                height: 40px;
            }
        }
    </style>
</head>

<body class="bg-light py-5">

    <div class="container text-center">
        <h2 class="mb-4 fw-bold text-uppercase">Bàn cờ Vua {{ $n }}x{{ $n }}</h2>

        <div class="chess-container">
            @for ($i = 0; $i < $n; $i++)
                <div class="row-chess">
                    @for ($j = 0; $j < $n; $j++)
                        @php
                            // Kiểm tra tổng chỉ số hàng và cột
                            $isWhite = ($i + $j) % 2 == 0;
                        @endphp

                        <div class="cell {{ $isWhite ? 'bg-white-cell' : 'bg-black-cell' }}">
                            <!-- {{ $i }},{{ $j }} -->
                        </div>
                    @endfor
                </div>
            @endfor
        </div>

        <div class="mt-4">
            <a href="{{ url('/') }}" class="btn btn-outline-primary rounded-pill">Quay lại trang home</a>
        </div>
    </div>

</body>

</html>