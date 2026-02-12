@extends('layout.admin')
@section('content')

    <body class="bg-light">

        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card shadow border-0">
                        <div class="card-header">
                            <h4 class="mb-0">sửa sản phẩm</h4>
                        </div>
                        <div class="card-body p-4">
                            <form action="{{ route('categories.store') }}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Tên danh mục</label>
                                    <input type="text" name="name" class="form-control" placeholder="Ví dụ: iPhone 15 Pro">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-bold">Mô tả</label>
                                    <input type="text" name="description" class="form-control" placeholder="Mô tả danh mục">
                                </div>
                                <div>
                                    <label class="form-label fw-bold">Ảnh danh mục</label>
                                    <input type="file" name="image" class="form-control">
                                </div>
                                <div>
                                    <label class="form-label fw-bold">Parent ID</label>
                                    <input type="text" name="parent_id" class="form-control" placeholder="Parent ID">
                                </div>
                                <div class="mt-4 ">
                                    <button type="submit" class="btn btn-success">Lưu danh mục</button>
                                    <a href="{{ route('categories.index') }}" class="btn btn-outline-secondary">Quay lại</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>
@endsection