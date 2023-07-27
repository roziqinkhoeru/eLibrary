@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="page-inner">
            {{-- header --}}
            <div class="page-header">
                <h4 class="page-title">Peminjaman</h4>
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
                            Data Peminjaman Buku
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
                                <div class="card-title">Data Peminjaman Buku</div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive pb-4">
                                <table id="transactionTable" class="display table table-striped table-hover">
                                    <thead>
                                        <tr class="space-nowrap">
                                            <th class="text-center">#</th>
                                            <th>NIS</th>
                                            <th>Nama Siswa</th>
                                            <th>ISBN</th>
                                            <th>Nama Buku</th>
                                            <th>Tanggal Pinjam</th>
                                            <th>Tanggal Batas Pinjam</th>
                                            <th>Petugas</th>
                                            <th>Denda</th>
                                            <th class="text-center filter-none">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="transactionTableBody">
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

        const transactionTable = $('#transactionTable').DataTable({
            columnDefs: [{
                    type: 'date-eu',
                    targets: 5
                },
                {
                    type: 'date-eu',
                    targets: 6
                }, {
                    targets: 'filter-none',
                    orderable: false,
                },
            ],
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
            $('#transactionTableBody').html(tableLoader(10, `{{ asset('assets/img/loader/Ellipsis-2s-48px.svg') }}`));
        }

        function getStudents() {
            showLoadingIndicator();

            $.ajax({
                type: "GET",
                url: "{{ route('admin.list.transaction.data') }}",
                success: function(response) {
                    if (response.data.transactions.length > 0) {
                        $.each(response.data.transactions, function(index, transaction) {
                            var rowData = [
                                index + 1,
                                transaction.student.nis,
                                transaction.student.name,
                                transaction.book.isbn,
                                transaction.book.title,
                                moment(transaction.start_date, 'YYYY/MM/DD').format('DD/MM/YYYY'),
                                moment(transaction.end_date, 'YYYY/MM/DD').format('DD/MM/YYYY'),
                                transaction.officer.name,
                                transaction.penalty < 0 ? '-' : localCurrencyIDR(transaction
                                    .penalty),
                                `<a href="{{ url('/admin/transaction/${transaction.id}/return') }}" class="btn btn-warning btn-sm">Pengembalian</a>`
                            ];

                            var rowNode = transactionTable.row.add(rowData)
                                .draw(
                                    false).node();

                            $(rowNode).find('td').eq(3).addClass('text-nowrap');
                        });
                    } else {
                        $('#transactionTableBody').html(tableEmpty(10, 'buku perpustakaan'));
                    }
                },
                error: function(response) {
                    $('#transactionTableBody').html(tableError(10, `${response.responseJSON.message}`));
                }
            });
        }
    </script>
@endsection
