@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="page-inner">
            {{-- header --}}
            <div class="page-header">
                <h4 class="page-title">Kategori Perpustakaan</h4>
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
                            Data Kategori Perpustakaan
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
                                <div class="card-title">Data Kategori Perpustakaan</div>
                                <div class="card-tools">
                                    <a href="{{ route('admin.category.create') }}"
                                        class="btn btn-info btn-border btn-round btn-sm mr-2">
                                        <span class="btn-label">
                                        </span>
                                        Tambah Kategori
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive pb-4">
                                <table id="categoryTable" class="display table table-striped table-hover">
                                    <thead>
                                        <tr class="space-nowrap">
                                            <th class="text-center">#</th>
                                            <th class="filter-none">Name</th>
                                            <th class="filter-none">Deskripsi</th>
                                            <th class="text-center filter-none text-nowrap">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="categoryTableBody">
                                        @foreach ($categories as $category)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td>{{ $category->name }}</td>
                                                <td>{{ $category->description }}</td>
                                                <td class="text-center text-nowrap">
                                                    <a href="{{ url('/admin/category/' . $category->slug . '/edit') }}"
                                                        class="btn btn-primary btn-sm mr-2">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <button onclick="deleteCategory('{{ $category->slug }}')"
                                                        class="btn btn-danger btn-sm">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
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
        const categoryTable = $('#categoryTable').DataTable({
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

        function deleteCategory(category) {
            swal({
                dangerMode: true,
                title: "Apakah anda yakin?",
                text: "Data buku akan dihapus!",
                icon: "warning",
                buttons: ["Batal", "Hapus"],
            }).then((result) => {
                if (result) {
                    $.ajax({
                        type: "DELETE",
                        url: `{{ url('/admin/category/${category}') }}`,
                        data: {
                            _token: "{{ csrf_token() }}",
                        },
                        success: function(response) {
                            swal({
                                    title: "Berhasil!",
                                    text: response.meta.message,
                                    icon: "success",
                                    buttons: {
                                        ok: "OK",
                                    },
                                })
                                .then((value) => {
                                    if (value === "ok") {
                                        location.reload();
                                    }
                                });

                            setTimeout(function() {
                                location.reload();
                            }, 4000);
                        },
                        error: function(xhr, status, error) {
                            if (xhr.responseJSON) {
                                swal({
                                    title: "Gagal!",
                                    text: xhr.responseJSON.meta.message + ", Error : " + xhr
                                        .responseJSON.data.error,
                                    icon: "error",
                                });
                            } else {
                                swal({
                                    title: "Gagal!",
                                    text: "Terjadi kegagalan, silahkan coba beberapa saat lagi! Error: " +
                                        error,
                                    icon: "error",
                                });
                            }
                        }
                    });
                }
            });
        }
    </script>
@endsection
