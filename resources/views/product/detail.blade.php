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
                <th>gia</th>
                <th>so luong</th>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <td>{{ $products['id'] }}</td>
                    <td>{{ $products['name'] }}</td>
                    <td>{{ $products['price'] }}</td>
                    <td>{{ $products['quantity'] }}</td>
                </tr>
        </tbody>
    </table>
</body>

</html>