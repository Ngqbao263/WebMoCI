@extends('layouts.home')

@section('title', 'Tin Tức')

@section('content')
    <!-- Section Tin tức -->
    <section class="news-section py-5">
        <div class="container">
            <h2 class="text-center"><strong>TIN TỨC</strong></h2>
            <div class="breadcrumb-wrapper text-center mb-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="index.html" class="text-decoration-none text-reset">Trang
                                chủ</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><b>Tin tức</b></li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                @foreach ($news as $item)
                    <div class="col-md-4 mb-4">
                        <div class="card news-card">
                            <a href="{{ route('news.show', $item->slug) }}">
                                <img src="{{ asset('storage/news/' . $item->thumbnail) }}" class="card-img-top"
                                    alt="{{ $item->title }}">
                            </a>
                            <div class="card-body">
                                <a href="{{ route('news.show', $item->slug) }}">
                                    <h5 class="card-title"><b>{{ $item->title }}</b></h5>
                                </a>
                                <p class="card-text">{{ Str::limit(strip_tags($item->content), 100, '...') }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- Bài viết 1 -->
                {{-- <div class="col-md-4 mb-4">
                    <div class="card news-card">
                        <a href="#">
                            <img src="home/img/tintuc1.webp" class="card-img-top" alt="Tin tức 1">
                        </a>
                        <div class="card-body">
                            <a href="#">
                                <h5 class="card-title"><strong>Tiêu đề bài viết 1</strong></h5>
                            </a>
                            <p class="card-text">Mô tả ngắn của bài viết... nội dung giới thiệu vắn tắt.</p>
                        </div>
                    </div>
                </div> --}}

                <!-- Bài viết 2 -->
                {{-- <div class="col-md-4 mb-4">
                    <div class="card news-card">
                        <a href="#">
                            <img src="home/img/tintuc1.webp" class="card-img-top" alt="Tin tức 1">
                        </a>
                        <div class="card-body">
                            <a href="#">
                                <h5 class="card-title"><strong>Tiêu đề bài viết 1</strong></h5>
                            </a>
                            <p class="card-text">Mô tả ngắn của bài viết... nội dung giới thiệu vắn tắt.</p>
                        </div>
                    </div>
                </div> --}}

                <!-- Bài viết 3 -->
                {{-- <div class="col-md-4 mb-4">
                    <div class="card news-card">
                        <a href="#">
                            <img src="home/img/tintuc1.webp" class="card-img-top" alt="Tin tức 1">
                        </a>
                        <div class="card-body">
                            <a href="#" class="title-news">
                                <h5 class="card-title"><strong>Tiêu đề bài viết 1</strong></h5>
                            </a>
                            <p class="card-text">Mô tả ngắn của bài viết... nội dung giới thiệu vắn tắt.</p>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>
@endsection
