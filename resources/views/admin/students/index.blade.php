@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="page-inner">
            {{-- header --}}
            <div class="page-header">
                <h4 class="page-title">Data Siswa Peminjam</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">
                            Data Siswa Peminjam Buku
                        </a>
                    </li>
                </ul>
            </div>

            {{-- main content --}}
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Data Siswa Peminjam Buku</div>
                            <div class="card-category">
                                Data Seluruh Siswa Peminjam Buku Perpustakaan SMK Negeri 1 Sungai Menang
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
                                            <th class="text-center filter-none">Kelas</th>
                                            <th class="text-center">Jumlah Peminjaman</th>
                                            <th class="text-center filter-none">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="studentTableBody">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="detailModal"></div>
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
                "sSearchPlaceholder": "Masukkan Keyword...",
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

        const showLoadingIndicator = () => {
            $('#studentTableBody').html(tableLoader(7, `{{ asset('assets/img/loader/Ellipsis-2s-48px.svg') }}`));
        }

        function getStudents() {
            studentTable.clear().draw();
            showLoadingIndicator();
            let modalHtml = '';

            $.ajax({
                type: "GET",
                url: "{{ route('admin.student.data') }}",
                success: function(response) {
                    if (response.data.students.length > 0) {
                        $.each(response.data.students, function(index, student) {
                            var rowData = [
                                index + 1,
                                `<img src="{{ asset('storage/${student.profile_picture}') }}"
                                                    alt="${student.name} Profile" class="img-fluid rounded-circle" width="50"
                                                    height="50">`,
                                student.nis,
                                student.name,
                                student.class_school.name,
                                student.transactions_count,
                                `<td>
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#${student.nis}Modal">Detail</button>
                                </td>`
                            ];

                            var rowNode = studentTable.row.add(rowData)
                                .draw(
                                    false).node();

                            $(rowNode).find('td').eq(0).addClass('text-center');
                            $(rowNode).find('td').eq(1).addClass('text-center');
                            $(rowNode).find('td').eq(4).addClass('space-nowrap text-center');
                            $(rowNode).find('td').eq(5).addClass('text-center');
                            $(rowNode).find('td').eq(6).addClass('space-nowrap text-center');
                            modalHtml += `
                            <div class="modal fade" id="${student.nis}Modal" data-backdrop="static" data-keyboard="false" tabindex="-1"
                aria-labelledby="${student.nis}Label" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="${student.nis}Label">Detail Siswa</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="px-3 py-2">
                                                <div class="mb-4">
                                                    <div class="w-100">
                                                        <button class="btn btn-collapse" type="button" data-toggle="collapse"
                                                            data-target="#${student.nis}collapseBook" aria-expanded="false" aria-controls="${student.nis}collapseBook">
                                                            <span class="mr-2">1.</span>Riwayat Peminjaman Buku
                                                        </button>
                                                    </div>
                                                    <div class="collapse show" id="${student.nis}collapseBook">
                                                        <div class="" style="padding-left: 22px">
                                                            <table class="table table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col" class="text-center"
                                                                            style="width: 64px !important; max-width: 64px !important;">No
                                                                        </th>
                                                                        <th scope="col">Nama Buku</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    ${student.transactions.map((transaction, index) => {
                                                                        return `
                                                                            <tr class="">
                                                                                <td scope="row" class="text-center">${index + 1}</td>
                                                                                <td>${transaction.book.title}</td>
                                                                            </tr>
                                                                            `;
                                                                    }).join('') }
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="">
                                                    <div>
                                                        <button class="btn btn-collapse" type="button" data-toggle="collapse"
                                                            data-target="#${student.nis}collapseProfile" aria-expanded="false"
                                                            aria-controls="${student.nis}collapseProfile">
                                                            <span class="mr-2">2.</span>Data Diri
                                                        </button>
                                                    </div>
                                                    <div class="collapse" id="${student.nis}collapseProfile">
                                                        <div class="" style="padding-left: 22px">
                                                            <table class="table table-bordered">
                                                                <tbody>
                                                                    <tr class="">
                                                                        <td class="fw-bold">Nama</td>
                                                                        <td>${student.name}</td>
                                                                    </tr>
                                                                    <tr class="">
                                                                        <td class="fw-bold">NIS</td>
                                                                        <td>${student.nis}</td>
                                                                    </tr>
                                                                    <tr class="">
                                                                        <td class="fw-bold">Kelas</td>
                                                                        <td>${student.class_school.name}</td>
                                                                    </tr>
                                                                    <tr class="">
                                                                        <td class="fw-bold">Email</td>
                                                                        <td>${student.user.email}</td>
                                                                    </tr>
                                                                    <tr class="">
                                                                        <td class="fw-bold">No Telepon</td>
                                                                        <td>${student.phone_number}</td>
                                                                    </tr>
                                                                    <tr class="">
                                                                        <td class="fw-bold">TTL</td>
                                                                        <td>${student.date_of_birth}</td>
                                                                    </tr>
                                                                    <tr class="">
                                                                        <td class="fw-bold">Jenis Kelamin</td>
                                                                        <td>${student.gender}</td>
                                                                    </tr>
                                                                    <tr class="">
                                                                        <td class="fw-bold">Alamat</td>
                                                                        <td>${student.address}</td>
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
                            </div>`;

                        });
                        $("#detailModal").html(modalHtml);
                    } else {
                        $('#studentTableBody').html(tableEmpty(7, 'siswa'));
                    }
                },
                error: function(error) {
                    $('#studentTableBody').html(tableError(7, `${response.responseJSON.message}`));
                }
            });
        }
    </script>
@endsection
