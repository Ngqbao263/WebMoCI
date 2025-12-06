@extends('layouts.admin')

@section('title', 'Chờ duyệt')
@section('page-title', 'Danh sách chờ duyệt')

@section('content')
    @php
        $activeTab = request('tab', 'news');
    @endphp

    <div class="pt-2 pb-2">
        <!-- Tabs -->
        <ul class="nav nav-tabs" id="pendingTabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link {{ $activeTab == 'news' ? 'active' : '' }}" id="news-tab" data-toggle="tab" href="#news"
                    role="tab">Bài viết</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $activeTab == 'products' ? 'active' : '' }}" id="products-tab" data-toggle="tab"
                    href="#products" role="tab">Sản phẩm</a>
            </li>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content mt-3" id="pendingTabsContent">

            {{-- Bảng bài viết --}}
            <div class="tab-pane fade {{ $activeTab == 'news' ? 'show active' : '' }}" id="news" role="tabpanel">
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
                        @forelse($pendingNews as $new)
                            <tr>
                                <td>
                                    @if ($new->thumbnail)
                                        <img src="{{ asset('storage/news/' . $new->thumbnail) }}" alt="{{ $new->title }}"
                                            style="width: 100px; height: 70px; object-fit: cover;">
                                    @else
                                        <img src="https://via.placeholder.com/100x70?text=No+Image" alt="No image">
                                    @endif
                                </td>
                                <td>{{ $new->title }}</td>
                                <td>{{ auth()->check() ? auth()->user()->name : '' }}</td>
                                <td>
                                    <div class="d-flex flex-wrap gap-2">
                                        <a href="{{ route('admin.news.show', $new->id) }}"
                                            class="btn btn-primary btn-sm mr-2">Xem</a>
                                        <form action="{{ route('admin.news.approve', $new->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="tab" value="news">
                                            <button type="submit" class="btn btn-success btn-sm mr-2">Duyệt</button>
                                        </form>
                                        <form action="{{ route('admin.news.reject', $new->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="tab" value="news">
                                            <button type="submit" class="btn btn-danger btn-sm">Từ chối</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Không có bài viết chờ duyệt</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Bảng sản phẩm --}}
            <div class="tab-pane fade {{ $activeTab == 'products' ? 'show active' : '' }}" id="products" role="tabpanel">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th style="width: 10%;">Ảnh</th>
                            <th style="width: 45%;">Tên sản phẩm</th>
                            <th style="width: 25%;">Danh mục</th>
                            <th style="width: 20%;">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pendingProducts as $product)
                            <tr>
                                <td>
                                    @if ($product->thumbnail)
                                        <img src="{{ asset('storage/products/' . $product->thumbnail) }}"
                                            alt="{{ $product->name }}"
                                            style="width: 100px; height: 70px; object-fit: cover;">
                                    @else
                                        <img src="https://via.placeholder.com/100x70?text=No+Image" alt="No image">
                                    @endif
                                </td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->category }}</td>
                                <td>
                                    <div class="d-flex flex-wrap gap-2">
                                        <a href="{{ route('admin.products.show', $product->id) }}"
                                            class="btn btn-primary btn-sm mr-2">Xem</a>
                                        <form action="{{ route('admin.products.approve', $product->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="tab" value="products">
                                            <button type="submit" class="btn btn-success btn-sm mr-2">Duyệt</button>
                                        </form>
                                        <form action="{{ route('admin.products.reject', $product->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="tab" value="products">
                                            <button type="submit" class="btn btn-danger btn-sm">Từ chối</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Không có sản phẩm chờ duyệt</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
