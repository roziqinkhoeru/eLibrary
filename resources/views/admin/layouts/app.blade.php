<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <meta name="description"
        content="Jelajahi koleksi buku digital dan sumber daya luas di eLibrary. Tingkatkan pengetahuan Anda dan temukan dunia baru melalui perpustakaan online komprehensif kami.">
    <meta name="keywords"
        content="eLibrary, buku digital, perpustakaan online, pengetahuan, sumber daya, membaca, ebook">
    <meta name="author" content="eLibrary">
    <meta name="robots" content="index, follow">
    <meta property="og:title" content="eLibrary - Temukan Dunia Pengetahuan">
    <meta property="og:description"
        content="Tingkatkan pengetahuan Anda dan jelajahi koleksi buku digital dan sumber daya luas di eLibrary.">
    <meta property="og:image" content="{{ asset('assets/icon/apple-touch-icon.png') }}">
    <meta property="og:url" content="https://www.elibrary.site">

    <title>{{ $title }}</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon" />

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

    {{-- Fonts and icons --}}
    <script src="{{ asset('assets/template/admin/js/plugin/webfont/webfont.min.js') }}"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Lato:300,400,700,900"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands",
                    "simple-line-icons"
                ],
                urls: ['{{ asset('assets/template/admin/css/fonts.min.css') }}']
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    {{-- CSS Files --}}
    <link rel="stylesheet" href="{{ asset('assets/template/admin/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/template/admin/css/atlantis.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/app.css') }}">
</head>

<body>
    <div class="wrapper">
        <div class="main-header">
            {{-- Logo Header --}}
            @include('admin.components.headerLogo')
            {{-- End Logo Header --}}

            {{-- Navbar Header --}}
            <nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">
                @include('admin.components.navbar')
            </nav>
            {{-- End Navbar --}}
        </div>

        {{-- Sidebar --}}
        <div class="sidebar sidebar-style-2" data-color="blue">
            <div class="sidebar-wrapper scrollbar scrollbar-inner">
                @include('admin.components.sidebar')
            </div>
        </div>
        {{-- End Sidebar --}}

        {{-- main content --}}
        <div class="main-panel">
            @yield('content')
            @include('admin.components.footer')
        </div>
        {{-- end main content --}}
    </div>

    {{-- Core JS Files --}}
    <script src="{{ asset('assets/template/admin/js/core/jquery.3.2.1.min.js') }}"></script>
    <script src="{{ asset('assets/template/admin/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/template/admin/js/core/bootstrap.min.js') }}"></script>

    {{-- jQuery UI --}}
    <script src="{{ asset('assets/template/admin/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/template/admin/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') }}">
    </script>

    {{-- jQuery Scrollbar --}}
    <script src="{{ asset('assets/template/admin/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>

    {{-- Moment JS --}}
    <script src="{{ asset('assets/template/admin/js/plugin/moment/moment.min.js') }}"></script>

    {{-- Chart JS --}}
    <script src="{{ asset('assets/template/admin/js/plugin/chart.js/chart.min.js') }}"></script>

    {{-- jQuery Sparkline --}}
    <script src="{{ asset('assets/template/admin/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>

    {{-- Chart Circle --}}
    <script src="{{ asset('assets/template/admin/js/plugin/chart-circle/circles.min.js') }}"></script>

    {{-- Datatables --}}
    <script src="{{ asset('assets/template/admin/js/plugin/datatables/datatables.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables-plugins/1.13.5/sorting/date-eu.min.js"
        integrity="sha512-tSxzl8YqRAh+L1KC5jn1AAdgFgn2+9gnUkUKe8xGVd5tM7cfOizp7wdQJF3ND3FwbHmTPS47S0HCy1jNG6q6wA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- Bootstrap Notify --}}
    <script src="{{ asset('assets/template/admin/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

    {{-- Bootstrap Toggle --}}
    <script src="{{ asset('assets/template/admin/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js') }}"></script>

    {{-- jQuery Vector Maps --}}
    <script src="{{ asset('assets/template/admin/js/plugin/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('assets/template/admin/js/plugin/jqvmap/maps/jquery.vmap.world.js') }}"></script>

    {{-- Google Maps Plugin --}}
    <script src="{{ asset('assets/template/admin/js/plugin/gmaps/gmaps.js') }}"></script>

    {{-- Dropzone --}}
    <script src="{{ asset('assets/template/admin/js/plugin/dropzone/dropzone.min.js') }}"></script>

    {{-- Fullcalendar --}}
    <script src="{{ asset('assets/template/admin/js/plugin/fullcalendar/fullcalendar.min.js') }}"></script>

    {{-- DateTimePicker --}}
    <script src="{{ asset('assets/template/admin/js/plugin/datepicker/bootstrap-datetimepicker.min.js') }}"></script>

    {{-- Bootstrap Tagsinput --}}
    <script src="{{ asset('assets/template/admin/js/plugin/bootstrap-tagsinput/bootstrap-tagsinput.min.js') }}"></script>

    {{-- Bootstrap Wizard --}}
    <script src="{{ asset('assets/template/admin/js/plugin/bootstrap-wizard/bootstrapwizard.js') }}"></script>

    {{-- jQuery Validation --}}
    <script src="{{ asset('assets/template/admin/js/plugin/jquery.validate/jquery.validate.min.js') }}"></script>

    {{-- Summernote --}}
    <script src="{{ asset('assets/template/admin/js/plugin/summernote/summernote-bs4.min.js') }}"></script>

    {{-- Select2 --}}
    <script src="{{ asset('assets/template/admin/js/plugin/select2/select2.full.min.js') }}"></script>

    {{-- Sweet Alert --}}
    <script src="{{ asset('assets/template/admin/js/plugin/sweetalert/sweetalert.min.js') }}"></script>

    {{-- Owl Carousel --}}
    <script src="{{ asset('assets/template/admin/js/plugin/owl-carousel/owl.carousel.min.js') }}"></script>

    {{-- Magnific Popup --}}
    <script src="{{ asset('assets/template/admin/js/plugin/jquery.magnific-popup/jquery.magnific-popup.min.js') }}">
    </script>

    {{-- Atlantis JS --}}
    <script src="{{ asset('assets/template/admin/js/atlantis.min.js') }}"></script>
    {{-- Sweet Alert --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}

    <!-- Include CKEditor scripts and styles -->
    <script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/classic/ckeditor.js"></script>

    <script src="{{ asset('assets/js/empty.js') }}"></script>
    <script src="{{ asset('assets/js/loader.js') }}"></script>
    <script src="{{ asset('assets/js/currency.js') }}"></script>
    <script src="{{ asset('assets/js/error.js') }}"></script>

    @yield('script')
</body>

</html>
