@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="page-inner">
            {{-- header --}}
            <div class="page-header">
                <h4 class="page-title">Buku Perpustakaan</h4>
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
                            Data Buku Perpustakaan
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
                                <div class="card-title">Data Buku Perpustakaan</div>
                                <div class="card-tools">
                                    <a href="/admin/book/create" class="btn btn-info btn-border btn-round btn-sm mr-2">
                                        <span class="btn-label">
                                        </span>
                                        Tambah Buku
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive pb-4">
                                <table id="bookTable" class="display table table-striped table-hover">
                                    <thead>
                                        <tr class="space-nowrap">
                                            <th class="text-center">#</th>
                                            <th class="filter-none text-center">Cover</th>
                                            <th class="filter-none">ISBN</th>
                                            <th class="filter-none">Kategori</th>
                                            <th class="">Judul</th>
                                            <th class="filter-none">Penerbit</th>
                                            <th class="filter-none">Pengarang</th>
                                            <th class="filter-none">Tahun Terbit</th>
                                            <th class="filter-none">Jumlah Buku</th>
                                            <th class="text-center filter-none text-nowrap">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="bookTableBody">
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
        const bookTable = $('#bookTable').DataTable({
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
            dom: "<'row pb-0 py-2'<'col-sm-12 col-xl-4'l><'col-sm-12 col-xl-8 bookTable_category_wrapper'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row pt-2'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
        });

        $(document).ready(function() {

            // add button create report
            $('.bookTable_category_wrapper').prepend(
                `<div id="bookTable_category" class="text-right mr-5">
                    <label class="text-nowrap" for="bookTable_category">Kategori:
                        <select name="bookTable_category" id="bookTable_category_select" class="form-control form-filter-datatable d-inline-block ml-1" aria-controls="bookTable" onchange="getBooks()">
                            <option value="all" selected>Semua Kategori</option>
                        </select></label>
                </div>`
            );

            getCategories();
            getBooks();
        });

        const showLoadingIndicator = () => {
            $('#bookTableBody').html(tableLoader(10, `{{ asset('assets/img/loader/Ellipsis-2s-48px.svg') }}`));
        }

        function getCategories() {
            $.ajax({
                type: "GET",
                url: "{{ route('admin.book.category.data') }}",
                dataType: "json",
                success: function(response) {
                    if (response.data.categories.length > 0) {
                        $.each(response.data.categories, function(index, category) {
                            $('#bookTable_category_select').append(
                                `<option value="${category.id}">${category.name}</option>`
                            );
                        });
                    }
                },
                error: function(response) {
                    console.log(response);
                }
            });
        }

        function getBooks() {
            bookTable.clear().draw();
            showLoadingIndicator();

            $.ajax({
                type: "GET",
                url: "{{ route('admin.book.data') }}",
                data: {
                    category: $('#bookTable_category_select').val(),
                },
                dataType: "json",
                success: function(response) {
                    if (response.data.books.length > 0) {
                        $.each(response.data.books, function(index, book) {
                            var rowData = [
                                index + 1,
                                `<div class="cover-book-image">
                                    <a href="{{ asset('assets/img/dummy/Brown modern history book cover.png') }}"
                                        class="">
                                        <img src="{{ asset('assets/img/dummy/Brown modern history book cover.png') }}"
                                            class="img-fluid">
                                    </a>
                                </div>`,
                                book.isbn,
                                book.category.name,
                                book.title,
                                book.publisher,
                                book.author,
                                book.year,
                                book.stock,
                                `<a href="#" class="btn btn-primary btn-sm mr-2">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="#" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i>
                                </a>`,
                            ];
                            var rowNode = bookTable.row.add(rowData).draw(
                                    false)
                                .node();

                            $(rowNode).find('td').eq(0).addClass('text-center');
                            $(rowNode).find('td').eq(1).addClass('text-center');
                            $(rowNode).find('td').eq(9).addClass('text-center text-nowrap');
                        });

                        $('.cover-book-image').magnificPopup({
                            delegate: 'a',
                            type: 'image',
                            removalDelay: 300,
                            gallery: {
                                enabled: false,
                            },
                            mainClass: 'mfp-with-zoom',
                            zoom: {
                                enabled: true,
                                duration: 300,
                                easing: 'ease-in-out',
                                opener: function(openerElement) {
                                    return openerElement.is('img') ? openerElement : openerElement
                                        .find('img');
                                }
                            }
                        });
                    } else {
                        $('#bookTableBody').html(tableEmpty(10, 'buku perpustakaan'));
                    }
                },
                error: function(response) {
                    console.log(response);
                }
            });
        }

        $("#bookTable_category_select").on('change', function() {
            getBooks();
        });
    </script>
@endsection
