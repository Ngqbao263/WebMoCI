@extends('layouts.admin')

@section('title', 'Sửa tài khoản')

@section('page-title', 'Sửa tài khoản')

@section('content')

    <div class="row table-admin">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('admin.user.updateUser', $user->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Tên người dùng</label>
                            <input type="text" name="name" id="name" class="form-control"
                                value="{{ old('name', $user->name) }}" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control"
                                value="{{ old('email', $user->email) }}" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Mật khẩu (để trống nếu không đổi)</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="role">Quyền</label>
                            <select name="role" id="role" class="form-control" required>
                                <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin
                                </option>
                                <option value="user" {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>User
                                </option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Cập nhật tài khoản</button>
                        <a href="{{ route('admin.user.index') }}" class="btn btn-secondary">Quay lại</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
