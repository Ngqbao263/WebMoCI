@extends('layouts.admin')

@section('title', 'Chi tiết sản phẩm')

@section('page-title', 'Chi tiết sản phẩm')

@section('content')
    <div class="container product-section">
        <div class="row">
            <!-- Ảnh sản phẩm -->
            <div class="col-md-5">
                <img src="{{ asset('storage/products/' . $products->thumbnail) }}" alt="{{ $products->name }}"
                    style="margin-top: 10px; object-fit: cover; height: 400px">
            </div>

            <!-- Thông tin sản phẩm -->
            <div class="col-md-7">
                <h1>{{ $products->name }}</h1>
                <p>{{ $products->short_description }}</p>

                <a href="#" class="btn btn-primary mt-3" target="_blank">
                    <i class="fas fa-download"></i> Tải Brochure
                </a>
            </div>
        </div>

        <!-- Thông số kỹ thuật -->
        <div class="row mt-5">
            <div class="col-12">
                <p>{!! $products->long_description !!}</p>
            </div>
        </div>
    </div>
@endsection
