<!--HEADER -->
<header>
    <div class="bg-header text-white py-2 d-none d-lg-block">
        <div class="container">
            <small>
                CÔNG TY CỔ PHẦN VẬT LIỆU CÔNG TRÌNH BIỂN ĐẢO VÀ CÁC NGÀNH CÔNG NGHIỆP
            </small><br>
            <small>
                <i class="bi bi-envelope-fill"></i> sales@moci.com.vn | <i class="bi bi-clock"></i> 8:00 - 17:00 | <i
                    class="bi bi-telephone-fill"></i>
                0904 888 868
            </small>
        </div>
    </div>
</header>

<!-- NAVBAR (MOBILE FIRST) -->
<nav class="navbar navbar-expand-lg bg-light">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand" href="/">
            <img src="/home/img/logo.png" alt="Logo" width="50">
        </a>

        <!-- Nút bấm hiện menu khi mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu ẩn hiện -->
        <div class="collapse navbar-collapse" id="mainNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="/">Trang chủ</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('home.introduce') }}">Giới thiệu</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('home.product') }}">Sản phẩm</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Dịch vụ</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Ứng dụng</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('home.news') }}">Tin tức</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('home.contact') }}">Liên hệ</a></li>
            </ul>
        </div>
    </div>
</nav>
