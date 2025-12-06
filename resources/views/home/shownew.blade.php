@extends('layouts.home')

@section('title', 'Chi tiết bài viết')

@section('content')
    <!-- SHOWNEWS -->
    <div class="container py-5">
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-reset">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-reset">Tin tức</a></li>
                <li class="breadcrumb-item active" aria-current="page">Chi tiết bài viết</li>
            </ol>
        </nav>

        <h1 class="mb-3">{{ $news->title }}</h1>

        <p class="text-muted mb-4"> Đăng bởi <strong>{{ $news->author ?? 'Admin' }}</strong>
            vào ngày {{ $news->created_at->format('d/m/Y') }}</p>

        <div class="content">
            {!! $news->content !!}
        </div>

        <div class="related-posts mt-5">
            <h4>Bài viết liên quan</h4>
            <div class="row">
                @foreach ($relatedNews as $item)
                    <div class="col-md-4 mb-3">
                        <div class="card h-100 shownew-card">
                            <a href="{{ route('news.show', $item->slug) }}">
                                <img src="{{ asset('storage/news/' . $item->thumbnail) }}" class="card-img-top"
                                    alt="{{ $item->title }}">
                            </a>
                            <div class="card-body">
                                <a href="{{ route('news.show', $item->slug) }}">
                                    <h5 class="card-title">{{ $item->title }}</h5>
                                </a>
                                <p class="card-text">{{ Str::limit(strip_tags($item->content), 100, '...') }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
