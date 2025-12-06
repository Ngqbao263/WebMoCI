@extends('layouts.admin')

@section('title', 'Chỉnh sửa bài viết')

@section('page-title', 'Chỉnh sửa bài viết')

@section('content')
    <div class="container pt-2 pb-2">
        <form action="{{ route('admin.news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Tiêu đề</label>
                <input type="text" name="title" class="form-control" value="{{ old('title', $news->title) }}">
            </div>

            <div class="form-group">
                <label>Ảnh thumbnail</label>
                <input type="file" name="thumbnail" class="form-control-file">
                @if ($news->thumbnail)
                    <p class="mt-2">Ảnh hiện tại:</p>
                    <img src="{{ asset('storage/news/' . $news->thumbnail) }}" alt="{{ $news->title }}"
                        style="max-height: 100px; object-fit: cover;">
                @endif
            </div>

            <div class="form-group">
                <label>Nội dung</label>
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-outline card-info">
                                <div class="card-body">
                                    <textarea id="summernote" name="content" class="form-control" rows="5" required>{{ old('content', $news->content) }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <button type="submit" class="btn btn-primary">Cập nhật bài viết</button>
            <a href="{{ route('admin.news.index') }}" class="btn btn-secondary">Hủy</a>
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
                callbacks: {
                    onImageUpload: function(files) {
                        for (let i = 0; i < files.length; i++) {
                            sendFile(files[i]);
                        }
                    }
                }
            });
        });

        function sendFile(file) {
            var data = new FormData();
            data.append("file", file);
            data.append("_token", '{{ csrf_token() }}');

            $.ajax({
                url: '{{ route('admin.uploadImage') }}',
                method: 'POST',
                data: data,
                contentType: false,
                processData: false,
                success: function(url) {
                    $('#summernote').summernote('insertImage', url);
                },
                error: function() {
                    alert('Lỗi upload ảnh!');
                }
            });
        }
    </script>
@endsection
