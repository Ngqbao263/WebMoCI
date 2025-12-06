@extends('layouts.home')

@section('title', 'Giới thiệu')

@section('content')
    <!-- Header của mục VỀ CHÚNG TÔI -->
    <section class="about-header">
        <div class="container">
            <h2>VỀ CHÚNG TÔI</h2>
        </div>
    </section>

    <!-- Nội dung chính -->
    <section class="about-us py-4">
        <div class="container">
            <p><strong>CÔNG TY CỔ PHẦN VẬT LIỆU CÔNG TRÌNH BIỂN ĐẢO VÀ CÁC NGÀNH CÔNG NGHIỆP</strong> được thành lập từ
                năm 2015 chuyên
                về lĩnh vực cung cấp vật tư, máy móc, thiết bị, phụ tùng, hóa chất và các dịch vụ kỹ thuật liên quan đến
                các ngành công nghiệp dầu khí Việt Nam.

                Với sự lãnh đạo của Ban Giám đốc đầy tâm huyết cùng với đội ngũ nhân viên nhiều kinh nghiệm trong lĩnh
                vực kỹ thuật cũng như thương mại. Chúng tôi đã từng bước phát triển vững mạnh và được nhiều khách hàng
                trong ngành dầu khí biết đến về năng lực, uy tín trong lĩnh vực cung cấp thiết bị và dịch vụ liên quan.
            </p>
        </div>
    </section>

    <!-- Section Đối tác & Nhà cung cấp -->
    <section class="">
        <div class="container">
            <h3 class="text-center mb-4"><strong>Đối tác & Nhà cung cấp</strong></h3>
            <p>Trên phương diện hợp tác uy tín, hiện <strong>CÔNG TY CỔ PHẦN VẬT LIỆU CÔNG TRÌNH BIỂN ĐẢO VÀ CÁC NGÀNH
                    CÔNG
                    NGHIỆP</strong> đã trở thành đối tác của một số nhà sản xuất lớn để phân phối tại thị trường Việt
                Nam.</p>
            <div id="customerCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <!-- Slide 1 -->
                    <div class="carousel-item active">
                        <div class="row text-center">
                            <div class="col-6 col-md-3">
                                <img src="home/img/enerpac.jpg" class="img-fluid" alt="KH 1">
                            </div>
                            <div class="col-6 col-md-3">
                                <img src="home/img/kato.png" class="img-fluid" alt="KH 2">
                            </div>
                            <!-- Ẩn trên màn hình nhỏ, hiển thị trên màn hình trung bình trở lên -->
                            <div class="col-md-3 d-none d-md-block">
                                <img src="home/img/enerpac.jpg" class="img-fluid" alt="KH 3">
                            </div>
                            <div class="col-md-3 d-none d-md-block">
                                <img src="home/img/kato.png" class="img-fluid" alt="KH 4">
                            </div>
                        </div>
                    </div>
                    <!-- Slide 2 -->
                    <div class="carousel-item">
                        <div class="row text-center">
                            <div class="col-6 col-md-3">
                                <img src="home/img/enerpac.jpg" class="img-fluid" alt="KH 3">
                            </div>
                            <div class="col-6 col-md-3">
                                <img src="home/img/kato.png" class="img-fluid" alt="KH 4">
                            </div>
                            <!-- Ẩn trên màn hình nhỏ, hiển thị trên màn hình trung bình trở lên -->
                            <div class="col-md-3 d-none d-md-block">
                                <img src="home/img/enerpac.jpg" class="img-fluid" alt="KH 3">
                            </div>
                            <div class="col-md-3 d-none d-md-block">
                                <img src="home/img/kato.png" class="img-fluid" alt="KH 4">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
