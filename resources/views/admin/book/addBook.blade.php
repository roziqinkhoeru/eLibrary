@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="page-inner">
            {{-- header --}}
            <div class="page-header">
                <h4 class="page-title">Tambah Buku</h4>
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
                            Form Tambah Buku
                        </a>
                    </li>
                </ul>
            </div>

            {{-- main content --}}
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Form Tambah Buku</div>
                            <div class="card-category">
                                Form ini digunakan untuk menambah buku maupun e-book
                            </div>
                        </div>
                        <form id="formAddBook" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                {{-- ID --}}
                                <div class="form-group form-show-validation row">
                                    <label for="id" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-sm-right">ID
                                        <span class="required-label">*</span></label>
                                    <div class="col-lg-4 col-md-9 col-sm-8">
                                        <input type="number" class="form-control" id="id" name="id" required>
                                    </div>
                                </div>
                                {{-- Title --}}
                                <div class="form-group form-show-validation row">
                                    <label for="title" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-sm-right">Judul
                                        Buku
                                        <span class="required-label">*</span></label>
                                    <div class="col-lg-4 col-md-9 col-sm-8">
                                        <input type="text" class="form-control" id="title" name="title" required>
                                    </div>
                                </div>
                                {{-- ISBN --}}
                                <div class="form-group form-show-validation row">
                                    <label for="isbn" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-sm-right">ISBN
                                        <span class="required-label">*</span></label>
                                    <div class="col-lg-4 col-md-9 col-sm-8">
                                        <input type="text" class="form-control" id="isbn" name="isbn" required>
                                    </div>
                                </div>
                                {{-- Kategori --}}
                                <div class="form-group form-show-validation row">
                                    <label for="category_id"
                                        class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-sm-right">Kategori
                                        <span class="required-label">*</span></label>
                                    <div class="col-lg-4 col-md-9 col-sm-8">
                                        <select class="form-control" id="category_id" name="category_id" required>
                                            <option value="">Pilih Kategori</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                {{-- Penerbit --}}
                                <div class="form-group form-show-validation row">
                                    <label for="publisher" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-sm-right">Penerbit
                                        <span class="required-label">*</span></label>
                                    <div class="col-lg-4 col-md-9 col-sm-8">
                                        <input type="text" class="form-control" id="publisher" name="publisher" required>
                                    </div>
                                </div>
                                {{-- Pengarang --}}
                                <div class="form-group form-show-validation row">
                                    <label for="author" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-sm-right">Pengarang
                                        <span class="required-label">*</span></label>
                                    <div class="col-lg-4 col-md-9 col-sm-8">
                                        <input type="text" class="form-control" id="author" name="author" required>
                                    </div>
                                </div>
                                {{-- Tahun Terbit --}}
                                <div class="form-group form-show-validation row">
                                    <label for="year" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-sm-right">Tahun
                                        Terbit
                                        <span class="required-label">*</span></label>
                                    <div class="col-lg-4 col-md-9 col-sm-8">
                                        <input type="number" class="form-control" id="year" name="year" required>
                                    </div>
                                </div>
                                {{-- Jumlah Buku --}}
                                <div class="form-group form-show-validation row">
                                    <label for="stock" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-sm-right">Jumlah
                                        Buku
                                        <span class="required-label">*</span></label>
                                    <div class="col-lg-4 col-md-9 col-sm-8">
                                        <input type="number" class="form-control" id="stock" name="stock" required>
                                    </div>
                                </div>
                                {{-- cover --}}
                                <div class="form-group form-show-validation row">
                                    <label for="cover" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-sm-right">Cover
                                        Buku
                                        <span class="required-label">*</span></label>
                                    <div class="col-lg-4 col-md-9 col-sm-8">
                                        <input type="file" class="form-control" id="cover" name="cover"
                                            accept="image/*" required>
                                    </div>
                                </div>
                                {{-- tipe buku --}}
                                <div class="form-group form-show-validation row">
                                    <label for="type" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-sm-right">Tipe
                                        Buku
                                        <span class="required-label">*</span></label>
                                    <div class="col-lg-4 col-md-9 col-sm-8">
                                        <select class="form-control" id="type" name="type" required>
                                            <option value="">Pilih Tipe Buku</option>
                                            <option value="offline">Buku</option>
                                            <option value="online">E-Book</option>
                                        </select>
                                    </div>
                                </div>
                                {{-- upload file --}}
                                <div class="form-group form-show-validation row">
                                    <label for="file" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-sm-right">Upload
                                        E-Book
                                        <span class="required-label">*</span></label>
                                    <div class="col-lg-4 col-md-9 col-sm-8">
                                        <input type="file" class="form-control" id="file" name="file"
                                            accept="application/pdf" required>
                                    </div>
                                </div>
                            </div>
                            <div class="card-action">
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <a href="/admin/book" class="btn btn-default btn-outline-dark">Batal</a>
                                        <button class="btn btn-primary ml-3" id="formAddBookButton"
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
        // Menambahkan aturan validasi kustom untuk ukuran maksimum file
        $.validator.addMethod('maxfilesize', function(value, element, param) {
            var maxSize = param;

            if (element.files.length > 0) {
                var fileSize = element.files[0].size; // Ukuran file dalam byte
                return fileSize <= maxSize;
            }

            return true;
        }, '');

        $("#formAddBook").validate({
            rules: {
                id: {
                    required: true,
                },
                title: {
                    required: true,
                },
                category_id: {
                    required: true,
                },
                publisher: {
                    required: true,
                },
                author: {
                    required: true,
                },
                year: {
                    required: true,
                },
                stock: {
                    required: true,
                },
                cover: {
                    required: true,
                    maxfilesize: 2 * 1024 * 1024, // 2MB (dalam byte)
                    extension: 'jpg|jpeg|png',
                },
                type: {
                    required: true,
                },
                file: {
                    maxfilesize: 10 * 1024 * 1024, // 2MB (dalam byte)
                    extension: 'pdf',
                    required: ($('#type').val() == "online" ? true : false),
                },
            },
            messages: {
                id: {
                    required: '<i class="fas fa-exclamation-circle mr-6 text-sm icon-error"></i>ID buku tidak boleh kosong',
                },
                title: {
                    required: '<i class="fas fa-exclamation-circle mr-6 text-sm icon-error"></i>Judul buku tidak boleh kosong',
                },
                category_id: {
                    required: '<i class="fas fa-exclamation-circle mr-6 text-sm icon-error"></i>Kategori buku tidak boleh kosong',
                },
                publisher: {
                    required: '<i class="fas fa-exclamation-circle mr-6 text-sm icon-error"></i>Penerbit buku tidak boleh kosong',
                },
                author: {
                    required: '<i class="fas fa-exclamation-circle mr-6 text-sm icon-error"></i>Pengarang buku tidak boleh kosong',
                },
                year: {
                    required: '<i class="fas fa-exclamation-circle mr-6 text-sm icon-error"></i>Tahun terbit buku tidak boleh kosong',
                },
                stock: {
                    required: '<i class="fas fa-exclamation-circle mr-6 text-sm icon-error"></i>Jumlah buku tidak boleh kosong',
                },
                cover: {
                    required: '<i class="fas fa-exclamation-circle mr-6 text-sm icon-error"></i>Cover buku tidak boleh kosong',
                    maxfilesize: '<i class="fas fa-exclamation-circle mr-6 text-sm icon-error"></i>Ukuran file maksimal 2MB',
                    extension: '<i class="fas fa-exclamation-circle mr-6 text-sm icon-error"></i>Format file yang diperbolehkan hanya jpg, jpeg, dan png',
                },
                type: {
                    required: '<i class="fas fa-exclamation-circle mr-6 text-sm icon-error"></i>Tipe buku tidak boleh kosong',
                },
                file: {
                    required: '<i class="fas fa-exclamation-circle mr-6 text-sm icon-error"></i>E-Book tidak boleh kosong',
                    maxfilesize: '<i class="fas fa-exclamation-circle mr-6 text-sm icon-error"></i>Ukuran file maksimal 10MB',
                    extension: '<i class="fas fa-exclamation-circle mr-6 text-sm icon-error"></i>Format file yang diperbolehkan hanya pdf',
                },
            },
            submitHandler: function(form, event) {
                event.preventDefault();
                var formData = new FormData(form);
                $('#formAddBookButton').html('<i class="fas fa-circle-notch text-lg spinners-2"></i>');
                $('#formAddBookButton').prop('disabled', true);
                $.ajax({
                    type: "POST",
                    url: `{{ route('admin.book.store') }}`,
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        $('#formAddBookButton').html('Kirim');
                        $('#formAddBookButton').prop('disabled', false);
                        $.notify({
                            icon: 'flaticon-alarm-1',
                            title: 'Perpus Digital Admin',
                            message: response.meta.message,
                        }, {
                            type: 'secondary',
                            placement: {
                                from: "bottom",
                                align: "right"
                            },
                            time: 2000,
                        });
                        window.location.href = response.data.redirect
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr);
                        $('#formAddBookButton').html('Kirim');
                        $('#formAddBookButton').prop('disabled', false);
                        if (xhr.responseJSON) {
                            new swal({
                                title: "GAGAL!",
                                text: xhr.responseJSON.meta.message + " Error : " + xhr
                                    .responseJSON.data.error,
                                icon: "error",
                            });
                        } else {
                            new swal({
                                title: "GAGAL!",
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
