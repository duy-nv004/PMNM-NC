<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container row justify-content-center">
    <h1 class="d-flex justify-content-center">nhap tuoi</h1>

    <form class="col-5" action="{{ route('checkAge.post') }}" method="post">
        @csrf
        <div class="mb-3">
            <label class="form-label fw-bold">tuoi</label>
            <input type="text" name="age" class="form-control">
        </div>
        <div>
            <button type="submit" class="btn btn-primary">xac nhan</button>
        </div>
    </form>
</body>

</html>