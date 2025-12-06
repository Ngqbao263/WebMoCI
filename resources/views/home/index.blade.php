@extends('layouts.home')

@section('title', 'Trang chủ')

@section('content')
    <!-- Banner / Slider -->
    <div id="mainCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <!-- Slide 1 -->
            <div class="carousel-item active">
                <img src="home/img/banner.png" class="d-block w-100" alt="Slide 1">
            </div>

            <!-- Slide 2 -->
            <div class="carousel-item">
                <img src="home/img/banner2.png" class="d-block w-100" alt="Slide 2">
            </div>

            <!-- Slide 3 -->
            <div class="carousel-item">
                <img src="home/img/banner3.png" class="d-block w-100" alt="Slide 2">
            </div>
        </div>

        <!-- Nút chuyển trái/phải -->
        <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </button>
    </div>

    <!-- PHẦN GIỚI THIỆU -->
    <section class="py-4 bg-light">
        <div class="container">
            <p class="text-primary">VỀ CHÚNG TÔI</p>
            <h2 class="mb-3">Công ty Cổ phần Vật liệu Công trình Biển Đảo và các ngành Công Nghiệp – MOCi</h2>

            <!--Nội dung -->
            <div class="row flex-column">

                <!-- Nội dung -->
                <div class="col">
                    <p>
                        CÔNG TY CỔ PHẦN VẬT LIỆU CÔNG TRÌNH BIỂN ĐẢO VÀ CÁC NGÀNH CÔNG NGHIỆP được thành lập từ năm 2015
                        chuyên về lĩnh vực cung cấp vật tư, máy móc, thiết bị, phụ tùng, hóa chất và các dịch vụ kỹ
                        thuật liên quan đến các ngành công nghiệp dầu khí Việt Nam.
                    </p>
                    <a href="{{ route('home.introduce') }}" class="btn btn-primary">Tìm hiểu thêm</a>
                </div>
            </div>
        </div>
    </section>

    <!-- PHẦN TIN TỨC -->
    <section class="py-4">
        <div class="container">
            <h2 class="mb-4">TIN TỨC & SỰ KIỆN</h2>

            <div class="row">
                @foreach ($news as $item)
                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                        <div class="card h-100 news-card-index">
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
            <a href="{{ route('home.news') }}"><button type="button" class="btn btn-primary">Xem thêm</button></a>
        </div>
    </section>

    <!-- PHẦN SẢN PHẨM -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-4">SẢN PHẨM</h2>

            <div class="row">
                @foreach ($products as $item)
                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                        <div class="card h-100 shadow-sm product-card-index">
                            <a href="{{ route('product.show', $item->slug) }}">
                                <img src="{{ asset('storage/products/' . $item->thumbnail) }}" class="card-img-top"
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
            <a href="{{ route('home.product') }}"><button type="button" class="btn btn-primary">Xem thêm</button></a>
        </div>
    </section>

    <!-- PHẦN KHÁCH HÀNG THÂN THIẾT -->
    <section class="py-5 client">
        <div class="overlay"></div>
        <div class="container">
            <h2 class="text-center mb-4">Khách hàng thân thiết</h2>
            <div id="customerCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <!-- Slide 1 -->
                    <div class="carousel-item active">
                        <div class="row text-center">
                            <div class="col-6 col-md-3">
                                <img src="home/img/logo7.jpg" class="img-fluid" alt="KH 1">
                            </div>
                            <div class="col-6 col-md-3">
                                <img src="home/img/logo1.jpg" class="img-fluid" alt="KH 2">
                            </div>
                            <!-- Ẩn trên màn hình nhỏ, hiển thị trên màn hình trung bình trở lên -->
                            <div class="col-md-3 d-none d-md-block">
                                <img src="home/img/logo2.png" class="img-fluid" alt="KH 3">
                            </div>
                            <div class="col-md-3 d-none d-md-block">
                                <img src="home/img/logo3.png" class="img-fluid" alt="KH 4">
                            </div>
                        </div>
                    </div>
                    <!-- Slide 2 -->
                    <div class="carousel-item">
                        <div class="row text-center">
                            <div class="col-6 col-md-3">
                                <img src="home/img/logo4.jpg" class="img-fluid" alt="KH 3">
                            </div>
                            <div class="col-6 col-md-3">
                                <img src="home/img/logo5.jpg" class="img-fluid" alt="KH 4">
                            </div>
                            <!-- Ẩn trên màn hình nhỏ, hiển thị trên màn hình trung bình trở lên -->
                            <div class="col-md-3 d-none d-md-block">
                                <img src="home/img/logo6.png" class="img-fluid" alt="KH 3">
                            </div>
                            <div class="col-md-3 d-none d-md-block">
                                <img src="home/img/logo8.jpg" class="img-fluid" alt="KH 4">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- PHẦN LIÊN HỆ -->
    <section class="py-5 bg-white">
        <div class="container">
            <h2 class="text-center mb-4">LIÊN HỆ VỚI CHÚNG TÔI</h2>

            <div class="row flex-column flex-md-row">
                <!-- THÔNG TIN LIÊN HỆ -->
                <div class="col mb-4 mb-md-0">
                    <form>
                        <div class="mb-3">
                            <label for="name" class="form-label">Họ và tên</label>
                            <input type="text" class="form-control" id="name">
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email">
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Số điện thoại</label>
                            <input type="tel" class="form-control" id="phone">
                        </div>

                        <div class="mb-3">
                            <label for="message" class="form-label">Nội dung</label>
                            <textarea class="form-control" id="message" rows="4"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Gửi liên hệ</button>
                    </form>
                </div>

                <!-- BẢN ĐỒ GOOGLE -->
                <div class="col">
                    <div class="ratio ratio-4x3">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d898.1379703046097!2d107.08320089410323!3d10.364067185673814!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31756f3bd34babd7%3A0x184e1c9bbb184e5d!2zQ8ahIHPhu58gMiAtIFRyxrDhu51uZyDEkEggQsOgIFLhu4thIFbFqW5nIFTDoHUgKEJWVSk!5e1!3m2!1svi!2s!4v1754360210828!5m2!1svi!2s"
                            width="600" height="450" class="rounded-2" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
