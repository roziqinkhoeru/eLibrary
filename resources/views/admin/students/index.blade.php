@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="page-inner">
            {{-- header --}}
            <div class="page-header">
                <h4 class="page-title">Siswa</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="/admin/dashboard">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">
                            Data Seluruh Siswa
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
                                <div class="card-title">Data Seluruh Siswa</div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive pb-4">
                                <table id="studentTable" class="display table table-striped table-hover">
                                    <thead>
                                        <tr class="space-nowrap">
                                            <th class="text-center">#</th>
                                            <th class="text-center filter-none">Pas Foto</th>
                                            <th>NIS</th>
                                            <th>Nama</th>
                                            <th class="text-center">Kelas</th>
                                            <th class="filter-none">Email</th>
                                            <th class="filter-none">No Telepon</th>
                                            <th>TTL</th>
                                            <th>Jenis Kelamin</th>
                                            <th class="filter-none">Alamat</th>
                                            <th class="text-center filter-none">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
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
            getStudents();
        });

        const studentTable = $('#studentTable').DataTable({
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

        function getStudents() {
            $.ajax({
                type: "GET",
                url: "{{ route('admin.student.data') }}",
                success: function(response) {
                    if (response.data.students.length > 0) {
                        $.each(response.data.students, function(index, student) {
                            var rowData = [
                                index + 1,
                                `<img src="{{ asset('assets/${student.profile_picture}') }}"
                                                    alt="profile photo studentName" class="img-fluid rounded-circle" width="50"
                                                    height="50">`,
                                student.nis,
                                student.name,
                                student.class_school.name,
                                student.user.email,
                                student.phone_number,
                                student.date_of_birth,
                                student.gender,
                                student.address,
                                `<a href="#" class="btn btn-primary btn-sm">Detail</a>`
                            ];

                            var rowNode = studentTable.row.add(rowData)
                                .draw(
                                    false).node();

                            $(rowNode).find('td').eq(4).addClass('space-nowrap text-center');
                            $(rowNode).find('td').eq(10).addClass('space-nowrap text-center');
                        });
                    }
                }
            });
        }
    </script>
@endsection
