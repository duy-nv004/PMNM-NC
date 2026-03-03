@extends('layout.admin')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow-sm">
                    <div class="card-header bg-white py-3">
                        <h5 class="mb-0 text-primary"><i class="fas fa-plus-circle me-2"></i>Thêm Sản Phẩm Mới</h5>
                    </div>
                    <div class="card-body p-4">

                        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Tên sản phẩm <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                                            placeholder="Nhập tên sản phẩm..." required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Mô tả sản phẩm</label>
                                        <textarea name="description" class="form-control" rows="6"
                                            placeholder="Viết nội dung mô tả sản phẩm tại đây...">{{ old('description') }}</textarea>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Danh mục</label>
                                        <select name="category_id" class="form-select">
                                            <option value="">-- Chọn danh mục --</option>
                                            @foreach($categories as $cate)
                                                <option value="{{ $cate->id }}" {{ old('category_id') == $cate->id ? 'selected' : '' }}>
                                                    {{ $cate->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Giá bán (VNĐ)<span
                                                class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <input type="number" name="price" class="form-control"
                                                value="{{ old('price') }}" step="0.01" required>
                                            <span class="input-group-text">₫</span>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Giá khuyến mãi</label>
                                        <div class="input-group">
                                            <input type="number" name="sale_price" class="form-control"
                                                value="{{ old('sale_price') }}" step="0.01">
                                            <span class="input-group-text">₫</span>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Số lượng trong kho<span
                                                class="text-danger">*</span></label>
                                        <input type="number" name="stock" class="form-control" value="{{ old('stock', 0) }}"
                                            min="0" required>
                                    </div>
                                </div>
                            </div>

                            <hr class="my-4">

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Hình ảnh đại diện</label>
                                    <input type="file" name="image" class="form-control" accept="image/*">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Trạng thái hiển thị</label>
                                    <select name="is_active" class="form-select">
                                        <option value="1" {{ old('is_active') == '1' ? 'selected' : '' }}>Kích hoạt</option>
                                        <option value="0" {{ old('is_active') == '0' ? 'selected' : '' }}>Tạm ngưng</option>
                                    </select>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end gap-2 mt-3">
                                <a href="{{ url('/products') }}" class="btn btn-light border px-4">Hủy bỏ</a>
                                <button type="submit" class="btn btn-primary px-4">
                                    <i class="fas fa-save me-1"></i> Lưu sản phẩm
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection