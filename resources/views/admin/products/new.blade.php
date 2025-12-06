@extends('layouts.admin')

@section('title', 'Thêm sản phẩm')
@section('page-title', 'Thêm sản phẩm')

@section('content')
    <div class="container pt-2 pb-2">
        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label>Tên sản phẩm</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
            </div>

            <div class="form-group">
                <label>Danh mục</label>
                <select name="category" class="form-control" required>
                    <option value="">-- Chọn danh mục --</option>
                    <option value="Thiết bị Enerpac" {{ old('category') == 'Thiết bị Enerpac' ? 'selected' : '' }}>Thiết bị
                        Enerpac</option>
                    <option value="Thiết bị Busch" {{ old('category') == 'Thiết bị Busch' ? 'selected' : '' }}>Thiết bị
                        Busch</option>
                    <option value="Đầu phát Leroy-Somer" {{ old('category') == 'Đầu phát Leroy-Somer' ? 'selected' : '' }}>
                        Đầu phát Leroy-Somer</option>
                    <option value="Đầu phát KATO" {{ old('category') == 'Đầu phát KATO' ? 'selected' : '' }}>Đầu phát KATO
                    </option>
                </select>
            </div>

            <div class="form-group">
                <label>Mô tả ngắn</label>
                <textarea name="short_description" class="form-control">{{ old('short_description') }}</textarea>
            </div>

            <div class="form-group">
                <label>Mô tả dài</label>
                <textarea name="long_description" id="summernote" class="form-control" rows="5">{{ old('long_description') }}</textarea>
            </div>

            <div class="form-group">
                <label>Ảnh đại diện</label>
                <input type="file" name="thumbnail" class="form-control-file">
            </div>

            <button type="submit" class="btn btn-primary">Lưu sản phẩm</button>
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
                height: 300,
            });
        });
    </script>
@endsection
