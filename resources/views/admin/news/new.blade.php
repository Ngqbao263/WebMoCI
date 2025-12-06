@extends('layouts.admin')

@section('title', 'Thêm bài viết')

@section('page-title', 'Thêm bài viết')

@section('content')
    <div class="container pt-2 pb-2">
        <form action="{{ route('admin.news.storeNews') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label>Tiêu đề</label>
                <input type="text" name="title" class="form-control" value="{{ old('title') }}">
            </div>

            <div class="form-group">
                <label>Ảnh thumbnail</label>
                <input type="file" name="thumbnail" class="form-control-file" value="{{ old('thumbnail') }}">
            </div>

            <div class="form-group">
                <label>Nội dung</label>
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-outline card-info">
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <textarea id="summernote" name="content" class="form-control" rows="5" required>{{ old('content') }}</textarea>
                                </div>
                            </div>
                        </div>
                        <!-- /.col-->
                    </div>
                </section>
            </div>
            <button type="submit" class="btn btn-primary">Lưu bài viết</button>
        </form>
        @if ($errors->any())
            <div class="alert alert-danger">
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
