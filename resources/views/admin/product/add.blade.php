@extends('layout.admin')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow border-0">
                    <div class="card-header">
                        <h4 class="mb-0">Thêm sản phẩm mới</h4>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('products.store') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label fw-bold">Tên sản phẩm</label>
                                <input type="text" name="name" class="form-control" placeholder="Ví dụ: iPhone 15 Pro">
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Giá sản phẩm (VNĐ)</label>
                                <input type="number" name="price" class="form-control" placeholder="30000000">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Số lượng</label>
                                <input type="number" name="quantity" class="form-control" placeholder="10">
                            </div>

                            <div class="d-grid gap-2 mt-4">
                                <button type="submit" class="btn btn-success">Lưu sản phẩm</button>
                                <a href="{{ url('/products') }}" class="btn btn-outline-secondary">Quay lại</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection