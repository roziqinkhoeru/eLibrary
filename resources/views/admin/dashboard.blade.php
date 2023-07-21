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
                                        <h4 class="card-title">{{ number_format($book, 0, ',', '.') }}</h4>
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
                                        <h4 class="card-title">{{ number_format($ebook, 0, ',', '.') }}</h4>
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
                                        <h4 class="card-title">{{ number_format($borrow, 0, ',', '.') }}</h4>
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
                                        <h4 class="card-title">{{ number_format($student, 0, ',', '.') }}</h4>
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
                            <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                                <div class="px-2 pb-2 pb-md-0 text-center">
                                    <div id="circles-1"></div>
                                    <h6 class="fw-bold mt-3 mb-0">Kelas X</h6>
                                </div>
                                <div class="px-2 pb-2 pb-md-0 text-center">
                                    <div id="circles-2"></div>
                                    <h6 class="fw-bold mt-3 mb-0">Kelas XI</h6>
                                </div>
                                <div class="px-2 pb-2 pb-md-0 text-center">
                                    <div id="circles-3"></div>
                                    <h6 class="fw-bold mt-3 mb-0">Kelas XII</h6>
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
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Top Kelas</div>
                        </div>
                        <div class="card-body pb-0">
                            @foreach ($statisticTopClassBorrow as $data)
                                <div class="d-flex">
                                    <div class="avatar">
                                        <img src="../assets/img/logoproduct.svg" alt="..."
                                            class="avatar-img rounded-circle">
                                    </div>
                                    <div class="flex-1 pt-1 ml-2">
                                        <h6 class="fw-bold mb-1">Kelas {{ $data->name }}</h6>
                                        <small class="text-muted">{{ $data->major }}</small>
                                    </div>
                                    <div class="d-flex ml-auto align-items-center">
                                        <h3 class="text-info fw-bold">{{ $data->total }}</h3>
                                    </div>
                                </div>
                                <div class="separator-dashed"></div>
                            @endforeach
                            <div class="pull-in">
                                <canvas id="topProductsChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- top student --}}
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title fw-mediumbold">Siswa Rajin Membaca</div>
                            <div class="card-list">
                                @foreach ($studentTopBorrow as $data)
                                    <div class="item-list">
                                        <div class="avatar">
                                            <img src="../assets/img/jm_denis.jpg" alt="..."
                                                class="avatar-img rounded-circle">
                                        </div>
                                        <div class="info-user ml-3">
                                            <div class="username">{{ $data->student_name }}</div>
                                            <div class="status">Kelas {{ $data->class_name }}</div>
                                        </div>
                                        <button class="btn btn-icon btn-primary btn-round btn-xs">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                {{-- blom tayu --}}
                <div class="col-md-4">
                    <div class="card card-primary bg-primary-gradient">
                        <div class="card-body">
                            <h4 class="mt-3 b-b1 pb-2 mb-4 fw-bold">Active user right now</h4>
                            <h1 class="mb-4 fw-bold">17</h1>
                            <h4 class="mt-3 b-b1 pb-2 mb-5 fw-bold">Page view per minutes</h4>
                            <div id="activeUsersChart"></div>
                            <h4 class="mt-5 pb-3 mb-0 fw-bold">Top active pages</h4>
                            <ul class="list-unstyled">
                                <li class="d-flex justify-content-between pb-1 pt-1">
                                    <small>/product/readypro/index.html</small> <span>7</span>
                                </li>
                                <li class="d-flex justify-content-between pb-1 pt-1">
                                    <small>/product/atlantis/demo.html</small> <span>10</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        Circles.create({
            id: 'circles-1',
            radius: 45,
            value: {{ $statisticClassBorrow[0]->total }},
            maxValue: {{ $borrow }},
            width: 7,
            text: {{ $statisticClassBorrow[0]->total }},
            colors: ['#f1f1f1', '#FF9E27'],
            duration: 400,
            wrpClass: 'circles-wrp',
            textClass: 'circles-text',
            styleWrapper: true,
            styleText: true
        })

        Circles.create({
            id: 'circles-2',
            radius: 45,
            value: {{ $statisticClassBorrow[1]->total }},
            maxValue: {{ $borrow }},
            width: 7,
            text: {{ $statisticClassBorrow[1]->total }},
            colors: ['#f1f1f1', '#2BB930'],
            duration: 400,
            wrpClass: 'circles-wrp',
            textClass: 'circles-text',
            styleWrapper: true,
            styleText: true
        })

        Circles.create({
            id: 'circles-3',
            radius: 45,
            value: {{ $statisticClassBorrow[2]->total }},
            maxValue: {{ $borrow }},
            width: 7,
            text: {{ $statisticClassBorrow[2]->total }},
            colors: ['#f1f1f1', '#F25961'],
            duration: 400,
            wrpClass: 'circles-wrp',
            textClass: 'circles-text',
            styleWrapper: true,
            styleText: true
        })

        // category chart
        // data
        let categoryName = [];
        let countCourseCategory = [];
        @foreach ($categories as $category)
            categoryName.push('{{ $category->name }}');
            countCourseCategory.push('{{ $category->books_count }}');
        @endforeach
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

        var topProductsChart = document.getElementById('topProductsChart').getContext('2d');

        var myTopProductsChart = new Chart(topProductsChart, {
            type: "line",
            data: {
                labels: ["January",
                    "February",
                    "March",
                    "April",
                    "May",
                    "June",
                    "July",
                    "August",
                    "September",
                    "October",
                    "January",
                    "February",
                    "March",
                    "April",
                    "May",
                    "June",
                    "July",
                    "August",
                    "September",
                    "October",
                    "January",
                    "February",
                    "March",
                    "April",
                    "May",
                    "June",
                    "July",
                    "August",
                    "September",
                    "October",
                    "January",
                    "February",
                    "March",
                    "April"
                ],
                datasets: [{
                    label: "Sales Analytics",
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
                    data: [20, 10, 18, 14, 32, 18, 15, 22, 8, 6, 17, 12, 17, 18, 14, 25, 18, 12, 19, 21, 16,
                        14, 24, 21, 13, 15, 27, 29, 21, 11, 14, 19, 21, 17
                    ]
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

        $("#activeUsersChart").sparkline([112, 109, 120, 107, 110, 85, 87, 90, 102, 109, 120, 99, 110, 85, 87, 94], {
            type: 'bar',
            height: '100',
            barWidth: 9,
            barSpacing: 10,
            barColor: 'rgba(255,255,255,.3)'
        });
    </script>
@endsection
