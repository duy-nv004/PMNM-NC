@extends('layout.admin')
@section('content')
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
                        <th>name</th>
                        <th>price</th>
                        <th>quantity</th>
                        <th>action</th>
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

@endsection