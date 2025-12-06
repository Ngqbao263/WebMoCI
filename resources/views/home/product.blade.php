@extends('layouts.home')

@section('title', 'Sản Phẩm')

@section('content')
    <!-- Section Sản phẩm -->
    <section class="product-section py-5">
        <div class="container">
            <h2 class="text-center"><strong>SẢN PHẨM</strong></h2>
            <div class="breadcrumb-wrapper text-center mb-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="/" class="text-decoration-none text-reset">Trang
                                chủ</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><b>Sản phẩm</b></li>
                    </ol>
                </nav>
            </div>

            <!-- Danh mục -->
            <div class="mb-4">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="categoryDropdown"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Danh mục
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="categoryDropdown">
                        <li><a class="dropdown-item" href="{{ route('home.product') }}">Tất cả</a></li>
                        @foreach ($categories as $cat)
                            <li><a class="dropdown-item {{ request('category') == $cat ? 'active' : '' }}"
                                    href="{{ route('home.product', ['category' => $cat]) }}">{{ $cat }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- Danh sách sản phẩm -->
            <div class="row">
                @forelse($products as $product)
                    <div class="col-md-4 mb-3">
                        <div class="card product-card">
                            @if ($product->thumbnail)
                                <a href="{{ route('product.show', $product->slug) }}">
                                    <img src="{{ asset('storage/products/' . $product->thumbnail) }}"
                                        class="card-img-top img-fluid" alt="{{ $product->name }}">
                                </a>
                            @endif
                            <div class="card-body">
                                <a href="{{ route('product.show', $product->slug) }}">
                                    <h5 class="card-title"><b>{{ $product->name }}</b></h5>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <p>Không có sản phẩm nào</p>
                @endforelse
            </div>
        </div>
    </section>

    <script>
        const categoryFilter = document.getElementById('categoryFilter');
        const products = document.querySelectorAll('.product-item');

        categoryFilter.addEventListener('change', () => {
            const category = categoryFilter.value;

            products.forEach(product => {
                if (category === 'all' || product.getAttribute('data-category') === category) {
                    product.style.display = 'block';
                } else {
                    product.style.display = 'none';
                }
            });
        });
    </script>
@endsection
