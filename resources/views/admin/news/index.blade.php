@extends('layouts.admin')

@section('title', 'Trang chủ')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0">Bài viết</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('admin.news.new') }}">
                            <button type="button" class="btn btn-success"><i class="fa-solid fas fa-plus"></i> Thêm bài
                                viết</button>
                        </a>
                    </div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th style="width: 10%;">Ảnh</th>
                <th style="width: 45%;">Tiêu đề</th>
                <th style="width: 25%;">Người đăng</th>
                <th style="width: 20%;">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($news as $new)
                <tr>
                    <td>
                        <img src="{{ asset('storage/news/' . $new->thumbnail) }}" alt="{{ $new->title }}"
                            style="width: 100px; height: 70px; object-fit: cover;">
                    </td>
                    <td>{{ $new->title }}</td>
                    <td>{{ auth()->check() ? auth()->user()->name : '' }}</td>
                    <td>
                        <div class="d-flex flex-wrap gap-2">
                            <a href="{{ route('admin.news.show', $new->id) }}" class="btn btn-primary btn-sm mr-2">Xem</a>
                            <a href="{{ route('admin.news.edit', $new->id) }}" class="btn btn-warning btn-sm mr-2">Sửa</a>
                            <form action="{{ route('admin.news.destroy', $new->id) }}" method="POST"
                                onsubmit="return confirm('Bạn có chắc muốn xóa sản phẩm này?');" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <!-- /.content -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        <div class="p-3">
            <h5>Title</h5>
            <p>Sidebar content</p>
        </div>
    </aside>
    <!-- /.control-sidebar -->
@endsection
