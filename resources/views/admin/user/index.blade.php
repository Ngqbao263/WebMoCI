@extends('layouts.admin')

@section('title', 'ListUser')

@section('page-title', 'Danh sách tài khoản')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <h1 class="m-0">Tài khoản</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('admin.user.new') }}">
                                    <button type="button" class="btn btn-success"><i class="fa-solid fas fa-plus"></i> Thêm
                                        tài khoản</button>
                                </a>
                            </div>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <form id="roleForm" method="POST" action="">
                @csrf
                @method('PUT')
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 5%;">#</th>
                                <th scope="col" style="width: 30%;">Tên người dùng</th>
                                <th scope="col" style="width: 30%;">Email</th>
                                <th scope="col" style="width: 20%;">Quyền</th>
                                <th scope="col" style="width: 15%;">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $use)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td style="word-wrap: break-word; word-break: break-all;">{{ $use->name }}</td>
                                    <td style="word-wrap: break-word; word-break: break-all;">{{ $use->email }}</td>
                                    <td style="word-wrap: break-word; word-break: break-all;">{{ $use->role }}</td>
                                    <td>
                                        <div class="d-flex align-items-center gap-1">
                                            <a href="{{ route('admin.user.edit', $use->id) }}">
                                                <button type="button" class="btn btn-warning btn-sm mr-2">Sửa</button>
                                            </a>
                                            <form action="{{ route('admin.user.deleteUser', $use->id) }}" method="POST"
                                                onsubmit="return confirm('Bạn có chắc muốn xóa sản phẩm này?');"
                                                class="d-inline">
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
                </div>
            </form>
        </div>
    </div>

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.role-select').on('change', function() {
                var userId = $(this).data('user-id');
                var role = $(this).val();
                var token = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    url: '/admin/update-role/' + userId,
                    type: 'POST',
                    data: {
                        role: role,
                        _token: token
                    },
                    success: function(response) {
                        alert('Phân quyền đã được cập nhật!');
                    },
                    error: function(xhr, status, error) {
                        alert('Có lỗi xảy ra khi cập nhật phân quyền.');
                    }
                });
            });
        });
    </script>
@endsection
@endsection
