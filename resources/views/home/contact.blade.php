@extends('layouts.home')

@section('title', 'Giới thiệu')

@section('content')
    <!-- Header của mục LIÊN HỆ VỚI CHÚNG TÔI -->
    <section class="about-header">
        <div class="container">
            <h2>LIÊN HỆ VỚI CHÚNG TÔI</h2>
        </div>
    </section>

    <!-- PHẦN LIÊN HỆ -->
    <section class="py-4 bg-white">
        <div class="container">
            <!-- TIÊU ĐỀ & THÔNG TIN CÔNG TY -->
            <div class="text-center mb-4">
                <p class="text-muted fs-1"><b>Công ty Cổ phần Vật liệu Công trình Biển Đảo và các ngành Công
                        nghiệp</b></p>
            </div>

            <div class="row mb-5">
                <div class="col-md-6">
                    <h5 class="fw-semibold mb-3">Thông tin liên hệ</h5>
                    <p><strong>Địa chỉ:</strong> Số 30, đường số 1, khu dân cư Cityland Park Hills, P.10, Q. Gò Vấp,
                        TP.HCM</p>
                    <p><strong>Điện thoại:</strong> <a href="tel:0904888868" class="text-decoration-none text-dark">0904
                            888 868</a></p>
                    <p><strong>Email:</strong> <a href="mailto:sales@moci.com.vn"
                            class="text-decoration-none text-dark">sales@moci.com.vn</a></p>
                    <p><strong>Giờ làm việc:</strong> Thứ 2 – Thứ 7: 08h00 – 17h00</p>
                </div>
            </div>

            <div class="row g-4">
                <!-- FORM LIÊN HỆ -->
                <div class="col-md-6">
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
                        <button type="submit" class="btn btn-primary px-4">Gửi liên hệ</button>
                    </form>
                </div>

                <!-- GOOGLE MAP -->
                <div class="col-md-6">
                    <div class="ratio ratio-4x3 rounded-2 shadow-sm">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d898.1379703046097!2d107.08320089410323!3d10.364067185673814!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31756f3bd34babd7%3A0x184e1c9bbb184e5d!2zQ8ahIHPhu58gMiAtIFRyxrDhu51uZyDEkEggQsOgIFLhu4thIFbFqW5nIFTDoHUgKEJWVSk!5e1!3m2!1svi!2s!4v1754360210828!5m2!1svi!2s"
                            width="600" height="450" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade" style="border:0;">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
