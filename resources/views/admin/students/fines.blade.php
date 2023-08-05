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
                            <div class="card-head-row">
                                <div>
                                    <div class="card-title">Data Denda Siswa</div>
                                    <div class="card-category">
                                        Keterangan: Data Denda Siswa Pada Bulan <span id="monthReport">...</span> <span
                                            id="yearReport"></span>
                                    </div>
                                </div>
                                <div class="card-tools">
                                    <button onclick="printContent2()" class="btn btn-info btn-border btn-round btn-sm mr-2">
                                        <span class="btn-label">
                                            <i class="fa fa-pencil"></i>
                                        </span>
                                        Export
                                    </button>
                                    <button onclick="printContent2()" class="btn btn-secondary btn-border btn-round btn-sm">
                                        <span class="btn-label">
                                            <i class="fa fa-print"></i>
                                        </span>
                                        Print
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body" id="card-print">
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
            $('#finesTable').DataTable({
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
                    "sLengthMenu": "_MENU_",
                    "sLoadingRecords": "Memuat...",
                    "sProcessing": "Memproses...",
                    "sSearch": "",
                    "searchPlaceholder": "Search...",
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
                dom: "<'row pb-2'<'col-6 col-md-9 col-xl-4 mb-2 mb-md-3 mb-xl-0 px-12'f><'col-6 col-md-3 col-xl-2 mb-2 mb-md-3 mb-xl-0 px-12'l>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row pt-2'<'col-sm-12 col-md-5 info-table mb-3 mb-md-0'i><'col-sm-12 col-md-7'p>>",
            });

            var today = new Date();
            // add button create report
            $('#finesTable_wrapper .row:first-child').append(
                `<div class="col-6 col-xl-3 px-12">
                    <div class="d-flex">
                        <div class="input-group">
                            <select name="finesTable_month" id="finesTable_month" class="form-control form-filter-datatable" aria-controls="finesTable">
                                <option value="1" ${today.getMonth() + 1 === 1 ? 'selected' : ''}>Januari</option>
                                <option value="2" ${today.getMonth() + 1 === 2 ? 'selected' : ''}>Februari</option>
                                <option value="3" ${today.getMonth() + 1 === 3 ? 'selected' : ''}>Maret</option>
                                <option value="4" ${today.getMonth() + 1 === 4 ? 'selected' : ''}>April</option>
                                <option value="5" ${today.getMonth() + 1 === 5 ? 'selected' : ''}>Mei</option>
                                <option value="6" ${today.getMonth() + 1 === 6 ? 'selected' : ''}>Juni</option>
                                <option value="7" ${today.getMonth() + 1 === 7 ? 'selected' : ''}>Juli</option>
                                <option value="8" ${today.getMonth() + 1 === 8 ? 'selected' : ''}>Agustus</option>
                                <option value="9" ${today.getMonth() + 1 === 9 ? 'selected' : ''}>September</option>
                                <option value="10" ${today.getMonth() + 1 === 10 ? 'selected' : ''}>Oktober</option>
                                <option value="11" ${today.getMonth() + 1 === 11 ? 'selected' : ''}>November</option>
                                <option value="12" ${today.getMonth() + 1 === 12 ? 'selected' : ''}>Desember</option>
                            </select>

                            <label class="input-group-append" for="finesTable_month">
                                <span class="input-group-text">
                                    <i class="far fa-calendar-alt"></i>
                                </span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-xl-3 px-12">
                    <div class="d-flex">
                        <div class="input-group">
                            <input type="text" class="form-control form-filter-datatable" id="finesTable_year" name="finesTable_year" aria-controls="finesTable">
                            <label class="input-group-append" for="finesTable_year">
                                <span class="input-group-text">
                                    <i class="fa fa-calendar-check"></i>
                                </span>
                            </label>
                        </div>
                    </div>
                </div>`
            );

            // change class of datatable adminTable
            $('#finesTable_wrapper').addClass('pt-3 pb-2');
            $('#finesTable_filter label').addClass(
                'input-group'
            );
            $('#finesTable_filter label input').addClass(
                'ml-0'
            );
            $('#finesTable_filter label').append(
                `<div class="input-group-append">
                    <span class="input-group-text" id="basic-addon2">
                        <i class="fas fa-search"></i>
                    </span>
                </div>`
            );
            $('#finesTable_filter .form-control').addClass(
                'form-filter-datatable'
            );
            $('#finesTable_length label').addClass(
                'input-group'
            );
            $('#finesTable_length label').append(
                `<div class="input-group-append">
                    <span class="input-group-text" id="basic-addon2">
                        <i class="fas fa-layer-group"></i>
                    </span>
                </div>`
            );
            $('#finesTable_length .form-control').addClass(
                'form-filter-datatable'
            );
            $('#finesTable_info').addClass(
                'd-flex align-items-center pl-2 pt-0'
            );
            $('#finesTable_wrapper .row .info-table').prepend(
                '<i class="fas fa-table pl-2 text-lg"></i>'
            );

            // tahun filter datepicker
            $('#finesTable_year').datetimepicker({
                format: 'YYYY',
                viewMode: 'years',
                defaultDate: today,
            });

            getFines();
        });

        const showLoadingIndicator = () => {
            $('#finesTableBody').html(tableLoader(6, `{{ asset('assets/img/loader/Ellipsis-2s-48px.svg') }}`));
        }

        const intToMonth = (month) => {
            const months = [
                'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
            ];

            return months[(month - 1) % 12];
        };

        function getFines() {
            $('#finesTable').DataTable().clear().draw();
            showLoadingIndicator();

            $.ajax({
                type: "GET",
                url: "{{ route('admin.student.fines.data') }}",
                data: {
                    finesMonth: $('#finesTable_month').val(),
                    finesYear: $('#finesTable_year').val(),
                },
                dataType: "json",
                success: function(response) {
                    $('#monthReport').text(intToMonth($('#finesTable_month').val()));
                    $('#yearReport').text($('#finesTable_year').val());
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

                            var rowNode = $('#finesTable').DataTable().row.add(rowData)
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

        // perubahan tanggal
        $(document).on('change', '#finesTable_month, #finesTable_year', function() {
            $('#finesTable').DataTable().clear().draw();
            showLoadingIndicator();
            getFines();
        });

        $(function() {
            $('#finesTable_year').on('dp.change', function() {
                $('#finesTable').DataTable().clear().draw();
                showLoadingIndicator();
                getFines();
            });
        });

        function printContent2() {
            const finesYear = $('#finesTable_year').val();
            const finesMonth = $('#finesTable_month').val();

            if (finesYear && finesMonth) {
                window.open(`/admin/student/fines/print?year=${finesYear}&month=${finesMonth}`, "_blank");
            } else {
                swal({
                    title: 'Tahun dan Bulan Kosong',
                    text: 'Silahkan pilih tahun dan bulan terlebih dahulu',
                    icon: "error",
                    dangerMode: true,
                });
            }
        }
    </script>
@endsection
