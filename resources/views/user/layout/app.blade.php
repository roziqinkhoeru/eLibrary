<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <meta name="description"
        content="Jelajahi koleksi buku digital dan sumber daya luas di eLibrary. Tingkatkan pengetahuan Anda dan temukan dunia baru melalui perpustakaan online komprehensif kami.">
    <meta name="keywords" content="eLibrary, buku digital, perpustakaan online, pengetahuan, sumber daya, membaca, ebook">
    <meta name="author" content="eLibrary">
    <meta name="robots" content="index, follow">
    <meta property="og:title" content="eLibrary - Temukan Dunia Pengetahuan">
    <meta property="og:description"
        content="Tingkatkan pengetahuan Anda dan jelajahi koleksi buku digital dan sumber daya luas di eLibrary.">
    <meta property="og:image" content="{{ asset('assets/icon/apple-touch-icon.png') }}">
    <meta property="og:url" content="https://www.elibrary.site">

    {{-- Place favicon.ico in the root directory --}}
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    {{-- apple touch icon --}}
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('assets/icon/apple-touch-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('assets/icon/apple-touch-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/icon/apple-touch-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('assets/icon/apple-touch-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('assets/icon/apple-touch-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('assets/icon/apple-touch-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('assets/icon/apple-touch-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/icon/apple-touch-icon-180x180.png') }}">

    {{-- manifest --}}
    {{-- <link rel="manifest" href="{{ asset('assets/img/brand/manifest.json') }}"> --}}

    {{-- microsoft touch icon --}}
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('assets/icon/apple-touch-icon-144x144.png') }}">
    <meta name="theme-color" content="#ffffff">

    {{-- bootstrap file --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
    {{-- bootstrap icon --}}
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    {{-- styles --}}
    <link rel="stylesheet" href="{{ asset('assets/template/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/template/css/meanmenu.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/template/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/template/css/owl-carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/template/css/swiper-bundle.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/template/css/backtotop.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/template/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/template/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/template/css/font-awesome-pro.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/template/css/spacing.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/template/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsiveness.css') }}">

    {{-- title --}}
    <title>{{ $title }}</title>
</head>

<body>
    {{-- pre loader area start --}}
    <div id="loading">
        <div id="loading-center">
            <div id="loading-center-absolute">
                <svg id="loader">
                    <path id="corners" d="m 0 12.5 l 0 -12.5 l 50 0 l 0 50 l -50 0 l 0 -37.5" />
                </svg>
                <img src="{{ asset('assets/img/brand/eLibrary-loader-logo.png') }}" alt="eLibrary logo loader">
            </div>
        </div>
    </div>
    {{-- pre loader area end --}}

    {{-- back to top start --}}
    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
    {{-- back to top end --}}

    @include('user.components.navbar')
    @if (Auth::check())
        {{-- get first name --}}
        @php
            $countBookOverdue = auth()
                ->user()
                ->student->transactions->where('status', 'pinjam')
                ->where('end_date', '<', now())
                ->count();
        @endphp
        {{-- condition: the user must complete the transaction --}}
        @if ($countBookOverdue > 0)
            <section class="pt-20 pb-20" style="background: #8d51fb">
                <div class="container">
                    <div class="d-flex align-items-xl-center justify-content-between flex-column flex-xl-row">
                        <div class="mb-3 mb-xl-0">
                            <div class="d-flex align-items-sm-center flex-column flex-sm-row">
                                <div class="mr-20 mb-3 mb-sm-0">
                                    <img src="{{ asset('assets/img/decoration/books.png') }}" alt="books"
                                        style="width: 72px">
                                </div>
                                <div class="">
                                    <p class="mb-5 text-white text-xl fw-bold">Hi, Kamu
                                        memliki peminjaman yang melebihi waktu kembali!</p>
                                    <p class="mb-0" style="color: #e9e9e9">Kembalikan buku yang kamu pinjam dan
                                        hubungi
                                        petugas untuk memproses denda.</p>
                                </div>
                            </div>
                        </div>
                        <div class="ml-92-btn">
                            <a href="/profile?content=book" class="tp-btn tp-btn-3 btn-darks rounded-pill">Lihat
                                Buku</a>
                        </div>
                    </div>
                </div>
            </section>
        @endif
    @endif
    @yield('content')
    @include('user.components.footer')


    {{-- Moment JS --}}
    <script src="{{ asset('assets/template/admin/js/plugin/moment/moment.min.js') }}"></script>

    {{-- scripts --}}
    <script src="{{ asset('assets/template/js/vendor/jquery.js') }}"></script>
    <script src="{{ asset('assets/template/js/vendor/waypoints.js') }}"></script>
    <script src="{{ asset('assets/template/js/bootstrap-bundle.js') }}"></script>
    <script src="{{ asset('assets/template/js/meanmenu.js') }}"></script>
    <script src="{{ asset('assets/template/js/swiper-bundle.js') }}"></script>
    <script src="{{ asset('assets/template/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('assets/template/js/magnific-popup.js') }}"></script>
    <script src="{{ asset('assets/template/js/parallax.js') }}"></script>
    <script src="{{ asset('assets/template/js/backtotop.js') }}"></script>
    <script src="{{ asset('assets/template/js/nice-select.js') }}"></script>
    <script src="{{ asset('assets/template/js/counterup.js') }}"></script>
    <script src="{{ asset('assets/template/js/wow.js') }}"></script>
    <script src="{{ asset('assets/template/js/isotope-pkgd.js') }}"></script>
    <script src="{{ asset('assets/template/js/imagesloaded-pkgd.js') }}"></script>
    <script src="{{ asset('assets/template/js/ajax-form.js') }}"></script>
    <script src="{{ asset('assets/template/js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('assets/js/conditionalState.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"
        integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js"
        integrity="sha512-6S5LYNn3ZJCIm0f9L6BCerqFlQ4f5MwNKq+EthDXabtaJvg3TuFLhpno9pcm+5Ynm6jdA9xfpQoMz2fcjVMk9g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- Chart JS --}}
    <script src="{{ asset('assets/template/admin/js/plugin/chart.js/chart.min.js') }}"></script>
    {{-- Chart Circle --}}
    <script src="{{ asset('assets/template/admin/js/plugin/chart-circle/circles.min.js') }}"></script>

    {{-- script custom --}}
    <script src="{{ asset('assets/js/currency.js') }}"></script>

    @yield('script')
    <script></script>
</body>

</html>
