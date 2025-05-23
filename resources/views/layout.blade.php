<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $seo['title'] ?? 'Calo shop' }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@glidejs/glide/dist/css/glide.core.min.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

        <style>
            <?=file_get_contents('styles/bootstrap4/bootstrap.min.css')?>
            <?=file_get_contents('plugins/font-awesome-4.7.0/font-awesome.css')?>
            <?=file_get_contents('plugins/OwlCarousel2-2.2.1/owl.carousel.css')?>
            <?=file_get_contents('plugins/OwlCarousel2-2.2.1/owl.theme.default.css')?>
            <?=file_get_contents('plugins/OwlCarousel2-2.2.1/animate.css')?>
            <?=file_get_contents('styles/main_styles.css')?>
            <?=file_get_contents('styles/responsive.css')?>
            <?=file_get_contents('styles/nutaddtocart.css')?>
            <?=file_get_contents('styles/sanpham.css')?>
        </style>

        <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
        <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@glidejs/glide/dist/glide.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/isotope/3.0.6/isotope.pkgd.min.js"></script>
        <script src="js/logout.js"></script>
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="styles/bootstrap4/popper.js"></script>
        <script src="styles/bootstrap4/bootstrap.min.js"></script>
        <script src="plugins/Isotope/isotope.pkgd.min.js"></script>
        <script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
        <script src="plugins/easing/easing.js"></script>
        <script src="js/custom.js"></script>
        <script src="js/slider.js"></script>
        <script src="js/addtocart.js"></script>
        <script src="js/size.v2.js"></script>
    </head>
    <body>
        <div class="super_container">
            @include('header')
            <br><br><br><br><br>
            @yield('content')
            @include('footer')
        </div>
        <div id="logoutMessage" style="
            display: none;
            position: fixed;
            top: 20px;
            right: 20px;
            background: #28a745;
            color: white;
            padding: 12px 20px;
            border-radius: 6px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            z-index: 9999;
        ">
            ✅ Bạn đã đăng xuất thành công!
        </div>
    </body>
</html>
