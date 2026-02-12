@extends('layout.admin')
@section('content')
<body>
    <h1>detail</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>price</th>
                <th>quantity</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <td>{{ $products['id'] }}</td>
                    <td>{{ $products['name'] }}</td>
                    <td>{{ $products['price'] }}</td>
                    <td>{{ $products['quantity'] }}</td>
                    <td>
                        <button class="btn btn-info">
                            <a href="{{ route('products.edit', $products->id) }}"
                                class="text-decoration-none text-dark">edit</a>
                        </button>
                        <button class="btn btn-danger">
                            <a href="{{ route('products.destroy', $products->id) }}"
                                class="text-decoration-none text-dark">delete</a>
                        </button>
                </tr>
        </tbody>
    </table>
</body>
@endsection