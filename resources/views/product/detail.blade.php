<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <h1>detail</h1>
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
                    <td><img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="img-fluid"
                            style="max-height: 100px;"></td>
                    <td>{{ $product['price'] }}</td>
                    <td>{{ $product['description'] }}</td>
                    <td><button>edit</button></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>