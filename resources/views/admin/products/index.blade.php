@extends('layouts.admin')

@section('title', 'Danh sách sản phẩm')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0">
                        @isset($category)
                            Danh sách sản phẩm - {{ $category }}
                        @else
                            Tất cả sản phẩm
                        @endisset
                    </h1>
                </div>
                <div class="col-sm-6">
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('admin.products.new') }}">
                            <button type="button" class="btn btn-success">
                                <i class="fa-solid fas fa-plus"></i> Thêm sản phẩm
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th style="width: 10%;">Ảnh</th>
                <th style="width: 45%;">Tên sản phẩm</th>
                <th style="width: 25%;">Người đăng</th>
                <th style="width: 20%;">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
                <tr>
                    <td>
                        @if ($product->thumbnail)
                            <img src="{{ asset('storage/products/' . $product->thumbnail) }}" alt="{{ $product->name }}"
                                style="width: 100px; height: 70px; object-fit: cover;">
                        @else
                            <img src="https://via.placeholder.com/100x70?text=No+Image" alt="No image">
                        @endif
                    </td>
                    <td>{{ $product->name }}</td>
                    <td>{{ auth()->check() ? auth()->user()->name : '' }}</td>
                    <td>
                        <div class="d-flex flex-wrap gap-2">
                            <a href="{{ route('admin.products.show', $product->id) }}"
                                class="btn btn-primary btn-sm mr-2">Xem</a>
                            <a href="{{ route('admin.products.edit', $product->id) }}"
                                class="btn btn-warning btn-sm mr-2">Sửa</a>
                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST"
                                onsubmit="return confirm('Bạn có chắc muốn xóa sản phẩm này?');" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Chưa có sản phẩm nào</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-3">
        {{ $products->links() }}
    </div>
@endsection
