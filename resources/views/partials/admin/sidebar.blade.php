<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="/adminlte/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <i class="fas fa-user text-white fa-2x"></i>
            </div>
            <div class="info">
                <span class="text-white d-block">
                    {{ auth()->check() ? auth()->user()->name : '' }}
                </span>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" role="menu">

                <!-- Nhóm: Bài viết -->
                <li class="nav-header">Bài viết</li>

                <li class="nav-item">
                    <a href="{{ route('admin.news.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-newspaper"></i>
                        <p>Tất cả bài viết</p>
                    </a>
                </li>

                {{-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user-edit"></i>
                        <p>Bài viết của tôi</p>
                    </a>
                </li> --}}

                <!-- Nhóm: Sản phẩm -->
                <li class="nav-header">Sản phẩm</li>

                <li class="nav-item">
                    <a href="{{ route('admin.products.category', 'Thiết bị Enerpac') }}" class="nav-link">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>Thiết bị Enerpac</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.products.category', 'Thiết bị Busch') }}" class="nav-link">
                        <i class="nav-icon fas fa-vial"></i>
                        <p>Thiết bị Busch</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.products.category', 'Đầu phát Leroy-Somer') }}" class="nav-link">
                        <i class="nav-icon fas fa-boxes"></i>
                        <p>Đầu phát Leroy-Somer</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.products.category', 'Đầu phát KATO') }}" class="nav-link">
                        <i class="nav-icon fas fa-boxes"></i>
                        <p>Đầu phát KATO</p>
                    </a>
                </li>

                <!-- Nhóm: Khác -->
                <li class="nav-header">Khác</li>

                <li class="nav-item">
                    <a href="{{ route('admin.page.pending') }}" class="nav-link">
                        <i class="nav-icon fas fa-solid fa-spinner"></i>
                        <p>Chờ duyệt</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.user.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-solid fa-users"></i>
                        <p>Quản lí tài khoản</p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
