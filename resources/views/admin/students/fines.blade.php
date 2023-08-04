@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="page-inner">
            {{-- header --}}
            <div class="page-header">
                <h4 class="page-title">Data Denda Siswa</h4>
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
                            Data Denda Siswa
                        </a>
                    </li>
                </ul>
            </div>

            {{-- main content --}}
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Data Denda Siswa</div>
                            <div class="card-category">
                                Data seluruh siswa Peminjam Buku yang memiliki denda
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive pb-4">
                                <table id="finesTable" class="display table table-striped table-hover">
                                    <thead>
                                        <tr class="space-nowrap">
                                            <th class="text-center">#</th>
                                            <th class="text-center filter-none">Pas Foto</th>
                                            <th>NIS</th>
                                            <th>Nama</th>
                                            <th class="text-center filter-none">Kelas</th>
                                            <th class="text-center">Total Denda</th>
                                        </tr>
                                    </thead>
                                    <tbody id="finesTableBody">
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
            getFines();
        });

        const finesTable = $('#finesTable').DataTable({
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
            $('#finesTableBody').html(tableLoader(6, `{{ asset('assets/img/loader/Ellipsis-2s-48px.svg') }}`));
        }

        function getFines() {
            finesTable.clear().draw();
            showLoadingIndicator();

            $.ajax({
                type: "GET",
                url: "{{ route('admin.student.fines.data') }}",
                success: function(response) {
                    console.log(response);
                    if (response.data.fines.length > 0) {
                        $.each(response.data.fines, function(index, fines) {
                            var rowData = [
                                index + 1,
                                `<img src="{{ asset('storage/${fines.profile_picture}') }}"
                                                    alt="${fines.name} Profile" class="img-fluid rounded-circle" width="50"
                                                    height="50">`,
                                fines.nis,
                                fines.name,
                                fines.class_school.name,
                                fines.transactions_sum_penalty !== 0 ? localCurrencyIDR(fines
                                    .transactions_sum_penalty) : '-',
                            ];

                            var rowNode = finesTable.row.add(rowData)
                                .draw(
                                    false).node();

                            $(rowNode).find('td').eq(0).addClass('text-center');
                            $(rowNode).find('td').eq(1).addClass('text-center');
                            $(rowNode).find('td').eq(4).addClass('space-nowrap text-center');
                            $(rowNode).find('td').eq(5).addClass('text-center');
                        });
                    } else {
                        $('#finesTableBody').html(tableEmpty(6, 'siswa'));
                    }
                },
                error: function(error) {
                    $('#finesTableBody').html(tableError(6, `${response.responseJSON.message}`));
                }
            });
        }
    </script>
@endsection
