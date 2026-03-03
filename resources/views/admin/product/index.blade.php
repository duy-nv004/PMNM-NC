@extends('layout.admin')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-4">Danh sách sản phẩm</h2>

        <a href="{{ route('products.create') }}" class="btn btn-success mb-3">Thêm sản phẩm</a>

        <table class="table table-bordered table-striped">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Tồn kho</th>
                    <th>Trạng thái</th>
                    <th>Trạng thái xóa</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" width="50">
                            @else
                                No image
                            @endif
                        </td>
                        <td>{{ $product->name }}</td>
                        <!-- <td>
                                    {{ number_format($product->price) }}đ
                                    @if($product->sale_price)
                                        <br><small class="text-danger">(-{{ number_format($product->sale_price) }}đ)</small>
                                    @endif
                                </td> -->
                        <td>
                            @if($product->sale_price && $product->sale_price < $product->price)
                                <div class="text-muted small">
                                    Giá gốc: <del>{{ number_format($product->price) }}đ</del>
                                </div>
                                <div class="text-danger fw-bold">
                                    Giá giảm: {{ number_format($product->sale_price) }}đ
                                </div>
                            @else
                                <div class="fw-bold">
                                    Giá bán: {{ number_format($product->price) }}đ
                                </div>
                            @endif
                        </td>
                        <td>{{ $product->stock }}</td>
                        <td>
                            {{ $product->is_active ? 'Kích hoạt' : 'Tạm ngưng' }}
                        </td>
                        <td>
                            {{ $product->is_deleted ? 'Đã xóa' : 'Chưa xóa' }}
                        </td>
                        <td>
                            <div class="d-flex gap-1">
                                <!-- <a href="{{ route('products.show', $product->id) }}" class="btn btn-sm btn-primary">Chi tiết</a> -->
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-info">Sửa</a>

                                <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                    onsubmit="return confirm('Xóa?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Xóa</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div>
            {{ $products->links() }}
        </div>
    </div>
@endsection