@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="page-inner">
            {{-- header --}}
            <div class="page-header">
                <h4 class="page-title">Peminjaman Buku</h4>
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
                            Daftar Peminjaman Buku
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">
                            Form Pinjam Buku
                        </a>
                    </li>
                </ul>
            </div>

            {{-- main content --}}
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Form Peminjaman Buku</div>
                            <div class="card-category">
                                Form ini digunakan untuk meminjam buku pada perpustakaan SMK Negeri 1 Sungai Menang
                            </div>
                        </div>
                        <form id="formAddCategory" method="POST">
                            @csrf
                            <div class="card-body">
                                {{-- student id --}}
                                <div class="form-group form-show-validation row select2-form-input">
                                    <label for="student_id" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-sm-right">Nama
                                        Siswa
                                        <span class="required-label">*</span></label>
                                    <div class="col-lg-6 col-md-9 col-sm-8">
                                        <div class="select2-input">
                                            <select class="form-control" id="student_id" name="student_id" required>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                {{-- book id --}}
                                <div class="form-group form-show-validation row select2-form-input">
                                    <label for="book_id" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-sm-right">Buku
                                        <span class="required-label">*</span></label>
                                    <div class="col-lg-6 col-md-9 col-sm-8">
                                        <div class="select2-input">
                                            <select class="form-control" id="book_id" name="book_id" required>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                {{-- start_date --}}
                                <div class="form-group form-show-validation row">
                                    <label for="start_date" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-sm-right">Tanggal
                                        Mulai Pinjam
                                        <span class="required-label">*</span></label>
                                    <div class="col-lg-6 col-md-9 col-sm-8">
                                        <input type="text" class="form-control" id="start_date" name="start_date"
                                            placeholder="Masukkan Tanggal Mulai Pinjam" required>
                                    </div>
                                </div>
                                {{-- end_date --}}
                                <div class="form-group form-show-validation row">
                                    <label for="end_date" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-sm-right">Tanggal
                                        Batas Pinjam
                                        <span class="required-label">*</span></label>
                                    <div class="col-lg-6 col-md-9 col-sm-8">
                                        <input type="text" class="form-control" id="end_date" name="end_date"
                                            placeholder="Masukkan Tanggal Batas Pinjam" required>
                                    </div>
                                </div>
                            </div>
                            <div class="card-action">
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <a href="{{ route('admin.list.transaction') }}"
                                            class="btn btn-default btn-outline-dark" role="presentation">Batal</a>
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
            getBookData();
            getStudentData();
            $('#book_id').select2({
                theme: "bootstrap",
            });
            $('#student_id').select2({
                theme: "bootstrap"
            });
            var today = moment().format('YYYY/MM/DD');;
            $('#start_date').datetimepicker({
                format: 'DD/MM/YYYY',
                defaultDate: today
            });
            $('#end_date').datetimepicker({
                format: 'DD/MM/YYYY',
            });
        });

        function getBookData() {
            var htmlstring = '<option value="">Pilih Buku</option>';
            $.ajax({
                type: "GET",
                url: `{{ route('admin.transaction.create.book.data') }}`,
                dataType: "json",
                success: function(response) {
                    $.each(response.data.books, function(index, item) {
                        htmlstring += `<option value="${item.id}">${item.title}</option>`;
                    });
                    $('#book_id').html(htmlstring);
                },
                error: function(xhr, status, error) {
                    swal({
                        title: "Gagal!",
                        text: "Terjadi kegagalan, silahkan coba beberapa saat lagi! Error: " + error,
                        icon: "error",
                    });
                    return false;
                },
            });
        }

        function getStudentData() {
            var htmlstring = '<option value="">Pilih Siswa</option>';
            $.ajax({
                type: "GET",
                url: `{{ route('admin.transaction.create.student.data') }}`,
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    $.each(response.data.students, function(index, item) {
                        htmlstring += `<option value="${item.nis}">${item.name}</option>`;
                    });
                    $('#student_id').html(htmlstring);
                },
                error: function(xhr, status, error) {
                    swal({
                        title: "Gagal!",
                        text: "Terjadi kegagalan, silahkan coba beberapa saat lagi! Error: " + error,
                        icon: "error",
                    });
                    return false;
                },
            });
        }

        $("#formAddCategory").validate({
            rules: {
                student_id: {
                    required: true,
                },
                book_id: {
                    required: true,
                },
                start_date: {
                    required: true,
                },
                end_date: {
                    required: true,
                },
            },
            messages: {
                student_id: {
                    required: '<i class="fas fa-exclamation-circle mr-6 text-sm icon-error"></i>NIS Siswa tidak boleh kosong',
                },
                book_id: {
                    required: '<i class="fas fa-exclamation-circle mr-6 text-sm icon-error"></i>ID Buku tidak boleh kosong',
                },
                start_date: {
                    required: '<i class="fas fa-exclamation-circle mr-6 text-sm icon-error"></i>Tanggal Mulai Pinjam tidak boleh kosong',
                },
                end_date: {
                    required: '<i class="fas fa-exclamation-circle mr-6 text-sm icon-error"></i>Tanggal Batas Pinjam tidak boleh kosong',
                },
            },
            highlight: function(element) {
                $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
            },
            submitHandler: function(form, event) {
                event.preventDefault();
                $('#formAddCategoryButton').html('<i class="fas fa-circle-notch text-lg spinners-2"></i>');
                $('#formAddCategoryButton').prop('disabled', true);
                $.ajax({
                    type: "POST",
                    url: `{{ route('admin.transaction.store') }}`,
                    data: {
                        _token: '{{ csrf_token() }}',
                        student_id: $('#student_id').val(),
                        book_id: $('#book_id').val(),
                        start_date: moment($('#start_date').val(), 'DD/MM/YYYY').format('YYYY/MM/DD'),
                        end_date: moment($('#end_date').val(), 'DD/MM/YYYY').format('YYYY/MM/DD'),
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
    </script>
@endsection
