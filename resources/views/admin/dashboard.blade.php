@extends('admin.layouts.app')
@section('content')
    <div class="container">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-xl-center flex-column flex-xl-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Dashboard</h2>
                        <h5 class="text-white op-7 mb-2">Selamat Datang di Dashboard Admin Perpus Digital SMK Negeri 1 Sungai
                            Menang</h5>
                    </div>
                    <div class="ml-xl-auto py-2 py-xl-0">
                        <a href="{{ route('admin.book') }}" class="btn btn-white btn-border btn-round mr-2">Data Buku</a>
                        <a href="{{ route('admin.category') }}" class="btn btn-secondary btn-round">Lihat Kategori</a>
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
                            @foreach ($statisticTopClassBorrow as $data)
                                <div class="d-flex">
                                    <div class="avatar">
                                        <img src="{{ asset('assets/img/brand/class-smkn-1.png') }}"
                                            alt="SMKN 1 Sungai Menang Logo" class="avatar-img rounded-circle">
                                    </div>
                                    <div class="flex-1 pt-1 ml-2">
                                        <h6 class="fw-bold mb-1">Kelas {{ $data->name }}</h6>
                                        <small class="text-muted">{{ $data->major }}</small>
                                    </div>
                                    <div class="d-flex ml-auto align-items-center">
                                        <h3 class="text-info fw-bold text-lg">{{ $data->total }} Buku</h3>
                                    </div>
                                </div>
                                <div class="separator-dashed"></div>
                            @endforeach
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
                                @foreach ($studentTopBorrow as $data)
                                    <div class="item-list">
                                        <div class="avatar">
                                            <img src="{{ asset('storage/' . $data->profile_picture) }}"
                                                alt="{{ $data->student_name }} Profile"
                                                class="avatar-img rounded-circle">
                                        </div>
                                        <div class="info-user ml-3">
                                            <div class="username">{{ $data->student_name }}</div>
                                            <div class="status">Kelas {{ $data->class_name }}</div>
                                        </div>
                                        <div class="d-flex ml-auto align-items-center">
                                            <h3 class="text-info fw-bold text-lg">{{ $data->total }} Buku</h3>
                                        </div>
                                    </div>
                                @endforeach
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
            value: {{ $statisticClassBorrow[0]->total }},
            maxValue: {{ array_sum($statisticClassBorrow->pluck('total')->toArray()) }},
            width: 7,
            text: '{{ $statisticClassBorrow[0]->total }}',
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
            value: {{ $statisticClassBorrow[1]->total }},
            maxValue: {{ array_sum($statisticClassBorrow->pluck('total')->toArray()) }},
            width: 7,
            text: '{{ $statisticClassBorrow[1]->total }}',
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
            value: {{ $statisticClassBorrow[2]->total }},
            maxValue: {{ array_sum($statisticClassBorrow->pluck('total')->toArray()) }},
            width: 7,
            text: '{{ $statisticClassBorrow[2]->total }}',
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
                    '#FF6666',
                    '#FFCC66',
                    '#99CCFF',
                    '#FF99CC',
                    '#FFCC99',
                    '#FFCCFF',
                    '#CCFF99',
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
                    position: 'bottom',
                },
                layout: {
                    padding: {
                        left: 20,
                        right: 20,
                        top: 20,
                        bottom: 20
                    },
                }
            }
        }
        // define
        const categoryChart = document.getElementById('categoryChart').getContext('2d');
        new Chart(categoryChart, categoryConfig);

        // top class chart
        // define
        let revenueMonths = [];
        @foreach ($revenueMonth as $revenue)
            revenueMonths.push('{{ $revenue }}');
        @endforeach
        const topClass = document.getElementById('topClass').getContext('2d');
        // config
        const mytopClass = new Chart(topClass, {
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
                    data: revenueMonths
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
