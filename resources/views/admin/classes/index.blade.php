@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="page-inner">
            {{-- header --}}
            <div class="page-header">
                <h4 class="page-title">Kelas</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="/admin">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">
                            Data Seluruh Kelas
                        </a>
                    </li>
                </ul>
            </div>

            {{-- main content --}}
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-head-row">
                                <div class="card-title">Data Seluruh Kelas</div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive pb-4">
                                <table id="studentTable" class="display table table-striped table-hover">
                                    <thead>
                                        <tr class="space-nowrap">
                                            <th class="text-center">#</th>
                                            <th class="text-center filter-none">Kelas</th>
                                            <th class="filter-none">Penjurusan</th>
                                            <th class="text-center filter-none">Wali Kelas</th>
                                            <th class="text-center filter-none">Jumlah Siswa</th>
                                            <th class="text-center filter-none">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center">1</td>
                                            <td class="text-center">XII</td>
                                            <td class="space-nowrap">Teknik Komputer dan Jaringan 1 (TKJ I)</td>
                                            <td class="text-center">Bapak TKJ 1</td>
                                            <td class="text-center">30</td>
                                            <td class="space-nowrap text-center">
                                                <a href="#" class="btn btn-primary btn-sm">Detail</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">2</td>
                                            <td class="text-center">XII</td>
                                            <td class="space-nowrap">Rekayasa Perangkat Lunak 1 (RPL I)</td>
                                            <td class="text-center">Bapak RPL 1</td>
                                            <td class="text-center">30</td>
                                            <td class="space-nowrap text-center">
                                                <a href="#" class="btn btn-primary btn-sm">Detail</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">3</td>
                                            <td class="text-center">XII</td>
                                            <td class="space-nowrap">Multimedia 1 (MM I)</td>
                                            <td class="text-center">Bapak MM 1</td>
                                            <td class="text-center">30</td>
                                            <td class="space-nowrap text-center">
                                                <a href="#" class="btn btn-primary btn-sm">Detail</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
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
        $(document).ready(function() {
            $('#studentTable').DataTable({
                columnDefs: [{
                    targets: 'filter-none',
                    orderable: false,
                }, ],
                language: {
                    "sEmptyTable": "Tidak ada data yang tersedia di tabel",
                    "sInfo": "Menampilkan _START_ hingga _END_ dari _TOTAL_ entri",
                    "sInfoEmpty": "Menampilkan 0 hingga 0 dari 0 entri",
                    "sInfoFiltered": "(disaring dari total _MAX_ entri)",
                    "sInfoPostFix": "",
                    "sInfoThousands": ",",
                    "sLengthMenu": "Tampilkan _MENU_ entri",
                    "sLoadingRecords": "Memuat...",
                    "sProcessing": "Memproses...",
                    "sSearch": "Cari:",
                    "sZeroRecords": "Tidak ditemukan data yang cocok",
                    "oPaginate": {
                        "sFirst": "Pertama",
                        "sLast": "Terakhir",
                        "sNext": "Berikutnya",
                        "sPrevious": "Sebelumnya"
                    },
                    "oAria": {
                        "sSortAscending": ": aktifkan untuk mengurutkan kolom secara naik",
                        "sSortDescending": ": aktifkan untuk mengurutkan kolom secara menurun"
                    },
                    "select": {
                        "rows": {
                            "_": "Terpilih %d baris",
                            "0": "Klik sebuah baris untuk memilih",
                            "1": "Terpilih 1 baris"
                        }
                    },
                    "buttons": {
                        "print": "Cetak",
                        "copy": "Salin",
                        "copyTitle": "Salin ke papan klip",
                        "copySuccess": {
                            "_": "%d baris disalin",
                            "1": "1 baris disalin"
                        }
                    },
                },
                lengthMenu: [5, 10, 25, 50, 100],
                pageLength: 10, // default page length
            });
        });
    </script>
@endsection
