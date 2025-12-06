<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <!-- -----BOOSTRAP----- -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('home/css/style.css') }}">
    <!-- -----ICON----- -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- -----FONT-FAMILY----- -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <!-- -----BOOSTRAP----- -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    {{-- Header --}}
    @include('partials.home.header')

    {{-- Nội dung --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('partials.home.footer')
</body>

</html>
