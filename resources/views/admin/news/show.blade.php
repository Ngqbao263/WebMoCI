@extends('layouts.admin')

@section('title', 'Chi tiết bài viết')

@section('page-title', 'Chi tiết bài viết')

@section('content')
    <!-- SHOWNEWS -->
    <div class="container">
        <h1 class="mb-3">{{ $news->title }}</h1>

        <p class="text-muted mb-4">Đăng bởi <strong>{{ auth()->check() ? auth()->user()->name : '' }}</strong> vào ngày
            01/08/2025</p>

        <div class="content">
            {!! $news->content !!}
        </div>
    </div>
@endsection
