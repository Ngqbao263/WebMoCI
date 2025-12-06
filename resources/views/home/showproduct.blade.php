@extends('layouts.home')

@section('title', 'Chi tiết sản phẩm')

@section('content')
    <div class="container product-section">
        <div class="row">
            <!-- Ảnh sản phẩm -->
            <div class="col-md-6">
                <img src="{{ asset('storage/products/' . $product->thumbnail) }}" alt="{{ $product->name }}"
                    class="product-image">
            </div>

            <!-- Thông tin sản phẩm -->
            <div class="col-md-6">
                <h1>{{ $product->name }}</h1>
                <p>{{ $product->short_description }}</p>

                <a href="#" class="btn btn-primary mt-3" target="_blank">
                    <i class="fas fa-download"></i> Tải Brochure
                </a>
            </div>
        </div>

        <!-- Thông số kỹ thuật -->
        <div class="row mt-5">
            <div class="col-12">
                <h3>Thông số kỹ thuật</h3>
                <div class="specs-box">
                    {!! $product->long_description !!}
                </div>
            </div>
        </div>

        <!-- Sản phẩm liên quan -->
        <div class="row mt-5">
            <div class="col-12">
                <h3 class="mb-4">Sản phẩm liên quan</h3>
            </div>

            @foreach ($relatedProducts as $item)
                <div class="col-md-3 col-sm-6 mb-4">
                    <div class="card h-100 showproduct-card">
                        <a href="{{ route('product.show', $item->slug) }}">
                            <img class="card-img-top" src="{{ asset('storage/products/' . $item->thumbnail) }}"
                                alt="{{ $item->name }}">
                        </a>
                        <div class="card-body">
                            <a href="{{ route('product.show', $item->slug) }}">
                                <h5 class="card-title">{{ $item->name }}</h5>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
