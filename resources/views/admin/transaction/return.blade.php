@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="page-inner">
            {{-- header --}}
            <div class="page-header">
                <h4 class="page-title">Pengembalian Buku</h4>
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
                        <a href="{{ route('admin.list.transaction') }}">
                            Data Peminjaman Buku
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">
                            Form Pengembalian Buku
                        </a>
                    </li>
                </ul>
            </div>

            {{-- main content --}}
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Form Pengembalian Buku</div>
                            <div class="card-category">
                                Form ini digunakan untuk mengembalikan buku yang dipinjam oleh siswa
                            </div>
                        </div>
                        <form id="formAddCategory" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                {{-- nis --}}
                                <div class="form-group form-show-validation row">
                                    <label for="nis" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-sm-right">NIS Siswa
                                    </label>
                                    <div class="col-lg-6 col-md-9 col-sm-8">
                                        <input type="text" disabled class="form-control" id="nis" name="nis"
                                            value="{{ $transaction->student->nis }}" placeholder="Masukkan NIS Siswa">
                                    </div>
                                </div>
                                {{-- name_student --}}
                                <div class="form-group form-show-validation row">
                                    <label for="name_student" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-sm-right">Nama
                                        Siswa
                                    </label>
                                    <div class="col-lg-6 col-md-9 col-sm-8">
                                        <input type="text" disabled class="form-control" id="name_student"
                                            name="name_student" value="{{ $transaction->student->name }}"
                                            placeholder="Masukkan NIS Siswa">
                                    </div>
                                </div>
                                {{-- book id --}}
                                <div class="form-group form-show-validation row">
                                    <label for="book_id" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-sm-right">ID
                                        Buku
                                    </label>
                                    <div class="col-lg-6 col-md-9 col-sm-8">
                                        <input type="text" disabled class="form-control" id="book_id" name="book_id"
                                            value="{{ $transaction->book->id }}" placeholder="Masukkan ID Buku">
                                    </div>
                                </div>
                                {{-- isbn --}}
                                <div class="form-group form-show-validation row">
                                    <label for="isbn" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-sm-right">ISBN
                                    </label>
                                    <div class="col-lg-6 col-md-9 col-sm-8">
                                        <input type="text" disabled class="form-control" id="isbn" name="isbn"
                                            value="{{ $transaction->book->isbn }}" placeholder="Masukkan ID Buku">
                                    </div>
                                </div>
                                {{-- title --}}
                                <div class="form-group form-show-validation row">
                                    <label for="title" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-sm-right">Judul
                                        Buku
                                    </label>
                                    <div class="col-lg-6 col-md-9 col-sm-8">
                                        <input type="text" disabled class="form-control" id="title" name="title"
                                            value="{{ $transaction->book->title }}" placeholder="Masukkan ID Buku">
                                    </div>
                                </div>
                                {{-- start_date --}}
                                <div class="form-group form-show-validation row">
                                    <label for="start_date" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-sm-right">Tanggal
                                        Mulai
                                        Pengembalian
                                    </label>
                                    <div class="col-lg-6 col-md-9 col-sm-8">
                                        <input type="text" disabled class="form-control" id="start_date"
                                            name="start_date"
                                            value="{{ date('d/m/Y', strtotime($transaction->start_date)) }}"
                                            placeholder="Masukkan Tanggal Mulai Pengembalian">
                                    </div>
                                </div>
                                {{-- end_date --}}
                                <div class="form-group form-show-validation row">
                                    <label for="end_date" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-sm-right">Tanggal
                                        Batas Pinjam
                                    </label>
                                    <div class="col-lg-6 col-md-9 col-sm-8">
                                        <input type="text" disabled class="form-control" id="end_date" name="end_date"
                                            value="{{ date('d/m/Y', strtotime($transaction->end_date)) }}"
                                            placeholder="Masukkan Tanggal Batas Pinjam">
                                    </div>
                                </div>
                                {{-- return_date --}}
                                <div class="form-group form-show-validation row">
                                    <label for="return_date"
                                        class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-sm-right">Tanggal Pengembalian
                                        <span class="required-label">*</span></label>
                                    <div class="col-lg-6 col-md-9 col-sm-8">
                                        <input type="text" class="form-control" id="return_date" name="return_date"
                                            value="{{ old('return_date') }}" placeholder="Masukkan Tanggal Pengembalian"
                                            required>
                                    </div>
                                </div>
                                {{-- penalty --}}
                                <div class="form-group form-show-validation row">
                                    <label for="penalty" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-sm-right">Denda
                                        <span class="required-label">*</span></label>
                                    <div class="col-lg-6 col-md-9 col-sm-8">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp</span>
                                            </div>
                                            <input type="text" class="form-control" id="penalty" name="penalty"
                                                value="{{ $penalty }}" placeholder="Masukkan Denda" required
                                                readonly>
                                        </div>
                                        <small id="penaltyHelp" class="form-text text-muted">Ket. : <span
                                                id="penaltyDay">{{ $penaltyDiffDay > 0 ? 'Pengembalian telah lewat ' . $penaltyDiffDay . ' hari' : 'Pengembalian tidak melebihi batas waktu' }}</span></small>
                                    </div>
                                </div>
                                {{-- edit penalty --}}
                                <div class="form-group form-show-validation row">
                                    <label for="editPenalty"
                                        class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-sm-right"></label>
                                    <div class="col-lg-6 col-md-9 col-sm-8">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="editPenalty"
                                                name="editPenalty">
                                            <label class="custom-control-label" for="editPenalty">Ubah Denda</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-action">
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <a href="{{ route('admin.category') }}" class="btn btn-default btn-outline-dark"
                                            role="presentation">Batal</a>
                                        <button class="btn btn-primary ml-3" id="formAddCategoryButton"
                                            type="submit">Kirim</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"
        integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js"
        integrity="sha512-6S5LYNn3ZJCIm0f9L6BCerqFlQ4f5MwNKq+EthDXabtaJvg3TuFLhpno9pcm+5Ynm6jdA9xfpQoMz2fcjVMk9g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            var today = moment().format('YYYY/MM/DD');;
            $('#return_date').datetimepicker({
                format: 'DD/MM/YYYY',
                defaultDate: today
            });

            $('#penalty').val(formatCurrency('{{ $penalty }}'));
            formatCurrencyInput('penalty');
        });

        $("#formAddCategory").validate({
            rules: {
                return_date: {
                    required: true,
                },
                penalty: {
                    required: true,
                    number: true
                },
            },
            messages: {
                return_date: {
                    required: '<i class="fas fa-exclamation-circle mr-6 text-sm icon-error"></i>Tanggal Pengembalian tidak boleh kosong',
                },
                penalty: {
                    required: '<i class="fas fa-exclamation-circle mr-6 text-sm icon-error"></i>Denda tidak boleh kosong',
                    number: '<i class="fas fa-exclamation-circle mr-6 text-sm icon-error"></i>Denda harus berupa angka'
                },
            },
            submitHandler: function(form, event) {
                event.preventDefault();
                $('#formAddCategoryButton').html('<i class="fas fa-circle-notch text-lg spinners-2"></i>');
                $('#formAddCategoryButton').prop('disabled', true);
                $.ajax({
                    type: "POST",
                    url: `{{ url("/admin/transaction/$transaction->id/return") }}`,
                    data: {
                        _token: '{{ csrf_token() }}',
                        _method: 'PUT',
                        return_date: moment($('#return_date').val(), 'DD/MM/YYYY').format('YYYY/MM/DD'),
                        penalty: convertCurrencyToNumber($('#penalty').val()),
                    },
                    success: function(response) {
                        $('#formAddCategoryButton').html('Kirim');
                        $('#formAddCategoryButton').prop('disabled', false);
                        swal({
                                title: "Berhasil!",
                                text: response.meta.message,
                                icon: "success",
                                buttons: {
                                    confirm: {
                                        text: "Okay",
                                        value: "confirm",
                                        visible: true,
                                        className: "btn btn-success",
                                        closeModal: true,
                                    }
                                }
                            })
                            .then((value) => {
                                if (value === "confirm") {
                                    window.location.href = response.data.redirect
                                }
                            });

                        setTimeout(function() {
                            window.location.href = response.data.redirect
                        }, 4000);
                    },
                    error: function(xhr, status, error) {
                        $('#formAddCategoryButton').html('Kirim');
                        $('#formAddCategoryButton').prop('disabled', false);
                        if (xhr.responseJSON) {
                            swal({
                                title: "Gagal!",
                                text: xhr.responseJSON.meta.message + " Error : " + xhr
                                    .responseJSON.data.error,
                                icon: "error",
                            });
                        } else {
                            swal({
                                title: "Gagal!",
                                text: "Terjadi kegagalan, silahkan coba beberapa saat lagi! Error: ",
                                error,
                                icon: "error",
                            });
                        }
                        return false;
                    },
                });
            }
        });

        const formatCurrencyInput = (inputId) => {
            var inputElement = document.getElementById(inputId);

            inputElement.addEventListener('input', function() {
                // Remove non-numeric characters
                var value = this.value.replace(/[^0-9]/g, '');

                if (value === '') {
                    this.value = '0';
                } else {
                    var formattedValue = parseFloat(value).toLocaleString('en-US');
                    this.value = formattedValue;
                }
            });
        }

        const formatCurrency = (currency) => {
            if (currency === '') {
                return '0';
            } else {
                var formattedValue = parseFloat(currency).toLocaleString('en-US');
                return formattedValue;
            }
        }

        const convertCurrencyToNumber = (currencyString) => {
            var cleanedValue = currencyString.replace(/[^\d.-]/g, '');
            var numericValue = parseFloat(cleanedValue);
            return numericValue;
        }

        $(function() {
            $('#return_date').on('dp.change', function() {
                var returnDate = moment($(this).val(), 'DD/MM/YYYY');
                var endDate = moment('{{ $transaction->end_date }}', 'YYYY/MM/DD');
                var diff = returnDate.diff(endDate, 'days');
                var newPenalty = 0;

                if (diff > 0) {
                    newPenalty = diff * 2000;
                    $('#penaltyDay').text(`Pengembalian telah lewat ${diff} hari`);
                } else {
                    $('#penaltyDay').text('Pengembalian tidak melebihi batas waktu');
                }

                $('#penalty').val(formatCurrency(newPenalty));
            });
        });

        $('#editPenalty').change(function() {
            if ($(this).is(':checked')) {
                $('#penalty').prop('readonly', false);
            } else {
                $('#penalty').prop('readonly', true);
            }
        });
    </script>
@endsection
