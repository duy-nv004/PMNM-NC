@extends('layout.admin')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow-sm">
                    <div class="card-header bg-white py-3">
                        <h5 class="mb-0 text-primary"><i class="fas fa-edit me-2"></i>Sửa Sản Phẩm: {{ $product->name }}</h5>
                    </div>
                    <div class="card-body p-4">

                        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT') {{-- Bắt buộc phải có để Laravel hiểu là gửi yêu cầu cập nhật --}}

                            <div class="row">
                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Tên sản phẩm <span class="text-danger">*</span></label>
                                        <input type="text" name="name" class="form-control" 
                                            value="{{ old('name', $product->name) }}" {{-- Lấy dữ liệu cũ hoặc dữ liệu trong DB --}}
                                            placeholder="Nhập tên sản phẩm..." required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Mô tả sản phẩm</label>
                                        <textarea name="description" class="form-control" rows="6"
                                            placeholder="Viết nội dung mô tả sản phẩm tại đây...">{{ old('description', $product->description) }}</textarea>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Danh mục</label>
                                        <select name="category_id" class="form-select">
                                            <option value="">-- Chọn danh mục --</option>
                                            @foreach($categories as $cate)
                                                <option value="{{ $cate->id }}" 
                                                    {{ old('category_id', $product->category_id) == $cate->id ? 'selected' : '' }}>
                                                    {{ $cate->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Giá bán (VNĐ)<span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <input type="number" name="price" class="form-control"
                                                value="{{ old('price', $product->price) }}" step="0.01" required>
                                            <span class="input-group-text">₫</span>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Giá khuyến mãi</label>
                                        <div class="input-group">
                                            <input type="number" name="sale_price" class="form-control"
                                                value="{{ old('sale_price', $product->sale_price) }}" step="0.01">
                                            <span class="input-group-text">₫</span>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Số lượng trong kho<span class="text-danger">*</span></label>
                                        <input type="number" name="stock" class="form-control" 
                                            value="{{ old('stock', $product->stock) }}" min="0" required>
                                    </div>
                                </div>
                            </div>

                            <hr class="my-4">

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Hình ảnh đại diện</label>
                                    <input type="file" name="image" class="form-control mb-2" accept="image/*">
                                    
                                    {{-- Hiển thị ảnh hiện tại nếu có --}}
                                    @if($product->image)
                                        <div class="mt-2">
                                            <img src="{{ asset('storage/' . $product->image) }}" alt="Current Image" 
                                                class="img-thumbnail" style="height: 100px;">
                                            <p class="small text-muted">Ảnh hiện tại</p>
                                        </div>
                                    @endif
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Trạng thái hiển thị</label>
                                    <select name="is_active" class="form-select">
                                        <option value="1" {{ old('is_active', $product->is_active) == '1' ? 'selected' : '' }}>Kích hoạt</option>
                                        <option value="0" {{ old('is_active', $product->is_active) == '0' ? 'selected' : '' }}>Tạm ngưng</option>
                                    </select>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end gap-2 mt-3">
                                <a href="{{ url('/products') }}" class="btn btn-light border px-4">Hủy bỏ</a>
                                <button type="submit" class="btn btn-primary px-4">
                                    <i class="fas fa-save me-1"></i> Cập nhật sản phẩm
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection