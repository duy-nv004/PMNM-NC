<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container row justify-content-center">
    <h1 class="d-flex justify-content-center">register</h1>

    <form class="col-5" action="{{ route('register.post') }}" method="post">
        @csrf
        <div class="mb-3">
            <label class="form-label fw-bold">user name</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label fw-bold">pass</label>
            <input type="password" name="pass" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label fw-bold">confirm pass</label>
            <input type="password" name="confirm-pass" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label fw-bold">mssv</label>
            <input type="text" name="mssv" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label fw-bold">gioi tinh</label>
            <select name="gender" class="form-select">
                <option value="nam">nam</option>
                <option value="nu">nu</option>
            </select>
        </div>
        <div>
            <button type="submit" class="btn btn-primary">dang ki</button>
            <a href="{{ route('login') }}">đã có tài khoản?</a>
        </div>
    </form>
</body>

</html>