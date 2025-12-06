@extends('layouts.admin')

@section('title', 'Chỉnh sửa sản phẩm')

@section('page-title', 'Chỉnh sửa sản phẩm')

@section('content')
    <div class="container pt-2 pb-2">
        <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Tên sản phẩm</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}" required>
            </div>

            <div class="form-group">
                <label>Danh mục</label>
                <select name="category" class="form-control" required>
                    <option value="">-- Chọn danh mục --</option>
                    <option value="Thiết bị Enerpac"
                        {{ old('category', $product->category) == 'Thiết bị Enerpac' ? 'selected' : '' }}>Thiết bị Enerpac
                    </option>
                    <option value="Thiết bị Busch"
                        {{ old('category', $product->category) == 'Thiết bị Busch' ? 'selected' : '' }}>Thiết bị Busch
                    </option>
                    <option value="Đầu phát Leroy-Somer"
                        {{ old('category', $product->category) == 'Đầu phát Leroy-Somer' ? 'selected' : '' }}>Đầu phát
                        Leroy-Somer</option>
                    <option value="Đầu phát KATO"
                        {{ old('category', $product->category) == 'Đầu phát KATO' ? 'selected' : '' }}>Đầu phát KATO
                    </option>
                </select>
            </div>

            <div class="form-group">
                <label>Mô tả ngắn</label>
                <textarea name="short_description" class="form-control">{{ old('short_description', $product->short_description) }}</textarea>
            </div>

            <div class="form-group">
                <label>Mô tả dài</label>
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-outline card-info">
                                <div class="card-body">
                                    <textarea id="summernote" name="long_description" class="form-control" rows="5">{{ old('long_description', $product->long_description) }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <div class="form-group">
                <label>Ảnh đại diện</label>
                <input type="file" name="thumbnail" class="form-control-file">
                @if ($product->thumbnail)
                    <p class="mt-2">Ảnh hiện tại:</p>
                    <img src="{{ asset('storage/products/' . $product->thumbnail) }}" alt="{{ $product->name }}"
                        style="max-height: 100px; object-fit: cover;">
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Cập nhật sản phẩm</button>
            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Hủy</a>
        </form>

        @if ($errors->any())
            <div class="alert alert-danger mt-3">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
@endsection

@section('scripts')
    <script>
        $(function() {
            $('#summernote').summernote({
                height: 300
            });
        });
    </script>
@endsection
