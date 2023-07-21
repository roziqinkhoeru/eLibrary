@extends('admin.layouts.app')
@section('content')
    <div class="container">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Dashboard</h2>
                        <h5 class="text-white op-7 mb-2">Selamat Datang di Dashboard Admin Perpus Digital SMK Negeri 1 Sungai
                            Menang</h5>
                    </div>
                    <div class="ml-md-auto py-2 py-md-0">
                        <a href="#" class="btn btn-white btn-border btn-round mr-2">Data Buku</a>
                        <a href="#" class="btn btn-secondary btn-round">Lihat Kategori</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-inner mt--5">
            {{-- first row --}}
            <div class="row mt--2">
                {{-- Buku Perpustakaan --}}
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-icon">
                                    <div class="icon-big text-center icon-info bubble-shadow-small">
                                        <i class="flaticon-interface-2"></i>
                                    </div>
                                </div>
                                <div class="col col-stats ml-3 ml-sm-0">
                                    <div class="numbers">
                                        <p class="card-category">Buku Perpustakaan</p>
                                        <h4 class="card-title">{{ number_format(27842, 0, ',', '.') }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- E-Book --}}
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-icon">
                                    <div class="icon-big text-center icon-success bubble-shadow-small">
                                        <i class="flaticon-internet"></i>
                                    </div>
                                </div>
                                <div class="col col-stats ml-3 ml-sm-0">
                                    <div class="numbers">
                                        <p class="card-category">E-Book</p>
                                        <h4 class="card-title">{{ number_format(274834, 0, ',', '.') }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Buku Dipinjam --}}
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-icon">
                                    <div class="icon-big text-center icon-secondary bubble-shadow-small">
                                        <i class="flaticon-archive"></i>
                                    </div>
                                </div>
                                <div class="col col-stats ml-3 ml-sm-0">
                                    <div class="numbers">
                                        <p class="card-category">Buku Dipinjam</p>
                                        <h4 class="card-title">{{ number_format(1562, 0, ',', '.') }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- siswa --}}
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round">
                        <div class="card-body ">
                            <div class="row align-items-center">
                                <div class="col-icon">
                                    <div class="icon-big text-center icon-primary bubble-shadow-small">
                                        <i class="flaticon-users"></i>
                                    </div>
                                </div>
                                <div class="col col-stats ml-3 ml-sm-0">
                                    <div class="numbers">
                                        <p class="card-category">Total Siswa</p>
                                        <h4 class="card-title">{{ number_format(12121, 0, ',', '.') }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- second row --}}
            <div class="row">
                {{-- statistik kelas --}}
                <div class="col-md-6">
                    <div class="card full-height">
                        <div class="card-body">
                            <div class="card-title">Statistik Kelas</div>
                            <div class="card-category">Statistik Peminjaman Buku Tingkat Kelas Tahun 2023</div>
                            <div class="d-flex align-items-center w-100" style="height: calc(100% - 74px)">
                                <div class="d-flex flex-wrap justify-content-around pb-2 pt-4 w-100">
                                    <div class="px-2 pb-2 pb-md-0 text-center">
                                        <div id="classX"></div>
                                        <h6 class="fw-bold mt-3 mb-0">Kelas X</h6>
                                    </div>
                                    <div class="px-2 pb-2 pb-md-0 text-center">
                                        <div id="classXI"></div>
                                        <h6 class="fw-bold mt-3 mb-0">Kelas XI</h6>
                                    </div>
                                    <div class="px-2 pb-2 pb-md-0 text-center">
                                        <div id="classXII"></div>
                                        <h6 class="fw-bold mt-3 mb-0">Kelas XII</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- kategori --}}
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Kategori Buku</div>
                        </div>
                        <div class="card-body">
                            <div class="chart-container">
                                <canvas id="categoryChart" style="width: 50%; height: 50%"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- third row --}}
            <div class="row">
                {{-- top class --}}
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Top Kelas</div>
                        </div>
                        <div class="card-body pb-0">
                            {{-- class x --}}
                            <div class="d-flex">
                                <div class="avatar">
                                    <img src="{{ asset('assets/img/brand/class-smkn-1.png') }}"
                                        alt="logo SMK N 1 Sungai Menang" class="avatar-img rounded-circle">
                                </div>
                                <div class="flex-1 pt-1 ml-2">
                                    <h6 class="fw-bold mb-1">Kelas XXI TKJ 1</h6>
                                    <small class="text-muted">Teknik Komputer dan Jaringan</small>
                                </div>
                                <div class="d-flex ml-auto align-items-center">
                                    <h4 class="fw-bold">326 Buku</h4>
                                </div>
                            </div>
                            <div class="separator-dashed"></div>
                            {{-- class xi --}}
                            <div class="d-flex">
                                <div class="avatar">
                                    <img src="{{ asset('assets/img/brand/class-smkn-1.png') }}"
                                        alt="logo SMK N 1 Sungai Menang" class="avatar-img rounded-circle">
                                </div>
                                <div class="flex-1 pt-1 ml-2">
                                    <h6 class="fw-bold mb-1">Kelas XXI TKR 1</h6>
                                    <small class="text-muted">Teknik Kendaraan Ringan</small>
                                </div>
                                <div class="d-flex ml-auto align-items-center">
                                    <h4 class="fw-bold">201 Buku</h4>
                                </div>
                            </div>
                            <div class="separator-dashed"></div>
                            {{-- class xii --}}
                            <div class="d-flex">
                                <div class="avatar">
                                    <img src="{{ asset('assets/img/brand/class-smkn-1.png') }}"
                                        alt="logo SMK N 1 Sungai Menang" class="avatar-img rounded-circle">
                                </div>
                                <div class="flex-1 pt-1 ml-2">
                                    <h6 class="fw-bold mb-1">Kelas X TSM 1</h6>
                                    <small class="text-muted">Teknik Sepeda Motor</small>
                                </div>
                                <div class="d-flex ml-auto align-items-center">
                                    <h4 class="fw-bold">102 Buku</h4>
                                </div>
                            </div>
                            <div class="separator-dashed"></div>
                            <div class="pull-in">
                                <canvas id="topClass"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- top student --}}
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title fw-mediumbold">Siswa Rajin Membaca</div>
                            <div class="card-list">
                                <div class="item-list">
                                    <div class="avatar">
                                        <img src="{{ asset('assets/img/dummy/profile-placeholder.png') }}"
                                            alt="profile photo namaStudent" class="avatar-img rounded-circle">
                                    </div>
                                    <div class="info-user ml-3">
                                        <div class="username">Jimmy Denis</div>
                                        <div class="status">Kelas XI TKJ 1</div>
                                    </div>
                                    <div class="d-flex ml-auto align-items-center">
                                        <h4 class="fw-bold">181 Buku</h4>
                                    </div>
                                </div>
                                <div class="item-list">
                                    <div class="avatar">
                                        <img src="{{ asset('assets/img/dummy/profile-placeholder.png') }}"
                                            alt="profile photo namaStudent" class="avatar-img rounded-circle">
                                    </div>
                                    <div class="info-user ml-3">
                                        <div class="username">Chad</div>
                                        <div class="status">Kelas XI TKR 1</div>
                                    </div>
                                    <div class="d-flex ml-auto align-items-center">
                                        <h4 class="fw-bold">120 Buku</h4>
                                    </div>
                                </div>
                                <div class="item-list">
                                    <div class="avatar">
                                        <img src="{{ asset('assets/img/dummy/profile-placeholder.png') }}"
                                            alt="profile photo namaStudent" class="avatar-img rounded-circle">
                                    </div>
                                    <div class="info-user ml-3">
                                        <div class="username">Talha</div>
                                        <div class="status">Kelas X TSM 1</div>
                                    </div>
                                    <div class="d-flex ml-auto align-items-center">
                                        <h4 class="fw-bold">56 Buku</h4>
                                    </div>
                                </div>
                                <div class="item-list">
                                    <div class="avatar">
                                        <img src="{{ asset('assets/img/dummy/profile-placeholder.png') }}"
                                            alt="profile photo namaStudent" class="avatar-img rounded-circle">
                                    </div>
                                    <div class="info-user ml-3">
                                        <div class="username">John Doe</div>
                                        <div class="status">Kelas X TGB 1</div>
                                    </div>
                                    <div class="d-flex ml-auto align-items-center">
                                        <h4 class="fw-bold">42 Buku</h4>
                                    </div>
                                </div>
                                <div class="item-list">
                                    <div class="avatar">
                                        <img src="{{ asset('assets/img/dummy/profile-placeholder.png') }}"
                                            alt="profile photo namaStudent" class="avatar-img rounded-circle">
                                    </div>
                                    <div class="info-user ml-3">
                                        <div class="username">Talha</div>
                                        <div class="status">Kelas X TSM 1</div>
                                    </div>
                                    <div class="d-flex ml-auto align-items-center">
                                        <h4 class="fw-bold">12 Buku</h4>
                                    </div>
                                </div>
                                <div class="item-list">
                                    <div class="avatar">
                                        <img src="{{ asset('assets/img/dummy/profile-placeholder.png') }}"
                                            alt="profile photo namaStudent" class="avatar-img rounded-circle">
                                    </div>
                                    <div class="info-user ml-3">
                                        <div class="username">Jimmy Denis</div>
                                        <div class="status">Kelas XI TKJ 1</div>
                                    </div>
                                    <div class="d-flex ml-auto align-items-center">
                                        <h4 class="fw-bold">6 Buku</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        // class x chart
        Circles.create({
            id: 'classX',
            radius: 45,
            value: 60,
            maxValue: 100,
            width: 7,
            text: 5,
            colors: ['#f1f1f1', '#FF9E27'],
            duration: 400,
            wrpClass: 'circles-wrp',
            textClass: 'circles-text',
            styleWrapper: true,
            styleText: true
        })
        // class xi chart
        Circles.create({
            id: 'classXI',
            radius: 45,
            value: 70,
            maxValue: 100,
            width: 7,
            text: 36,
            colors: ['#f1f1f1', '#2BB930'],
            duration: 400,
            wrpClass: 'circles-wrp',
            textClass: 'circles-text',
            styleWrapper: true,
            styleText: true
        })
        // class xii chart
        Circles.create({
            id: 'classXII',
            radius: 45,
            value: 40,
            maxValue: 100,
            width: 7,
            text: 12,
            colors: ['#f1f1f1', '#F25961'],
            duration: 400,
            wrpClass: 'circles-wrp',
            textClass: 'circles-text',
            styleWrapper: true,
            styleText: true
        })

        // category chart
        // data
        let categoryName = ['Umum', 'TKJ', 'TKR', 'TSM', 'TGB'];
        let countCourseCategory = [100, 200, 300, 400, 500, ];
        const categoryData = {
            labels: categoryName,
            datasets: [{
                data: countCourseCategory,
                backgroundColor: [
                    '#FF9F55',
                    '#6DCFF6',
                    '#FFD966',
                    '#66CC99',
                    '#B46CE8',
                ],
            }],
        }
        // config
        const categoryConfig = {
            type: 'doughnut',
            data: categoryData,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    position: 'bottom'
                },
                layout: {
                    padding: {
                        left: 20,
                        right: 20,
                        top: 20,
                        bottom: 20
                    }
                }
            }
        }
        // define
        const categoryChart = document.getElementById('categoryChart').getContext('2d');
        new Chart(categoryChart, categoryConfig);

        // top class chart
        // define
        var topClass = document.getElementById('topClass').getContext('2d');
        // config
        var mytopClass = new Chart(topClass, {
            type: "line",
            data: {
                labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli",
                    "Agustus", "September", "Oktober", "November", "Desember"
                ],
                datasets: [{
                    label: "Buku Terpinjam",
                    fill: !0,
                    backgroundColor: "rgba(53, 205, 58, 0.2)",
                    borderColor: "#35cd3a",
                    borderCapStyle: "butt",
                    borderDash: [],
                    borderDashOffset: 0,
                    pointBorderColor: "#35cd3a",
                    pointBackgroundColor: "#35cd3a",
                    pointBorderWidth: 1,
                    pointHoverRadius: 5,
                    pointHoverBackgroundColor: "#35cd3a",
                    pointHoverBorderColor: "#35cd3a",
                    pointHoverBorderWidth: 1,
                    pointRadius: 1,
                    pointHitRadius: 5,
                    data: [20, 10, 18, 14, 32, 18, 15, 22, 8, 6, 17, 12]
                }]
            },
            options: {
                maintainAspectRatio: !1,
                legend: {
                    display: !1
                },
                animation: {
                    easing: "easeInOutBack"
                },
                scales: {
                    yAxes: [{
                        display: !1,
                        ticks: {
                            fontColor: "rgba(0,0,0,0.5)",
                            fontStyle: "bold",
                            beginAtZero: !0,
                            maxTicksLimit: 10,
                            padding: 0
                        },
                        gridLines: {
                            drawTicks: !1,
                            display: !1
                        }
                    }],
                    xAxes: [{
                        display: !1,
                        gridLines: {
                            zeroLineColor: "transparent"
                        },
                        ticks: {
                            padding: -20,
                            fontColor: "rgba(255,255,255,0.2)",
                            fontStyle: "bold"
                        }
                    }]
                }
            }
        });
    </script>
@endsection
