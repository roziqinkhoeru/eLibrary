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
                        <form id="formAddBook" action="" method="POST">
                            <div class="card-body">
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
                                    <label for="category" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-sm-right">Kategori
                                        <span class="required-label">*</span></label>
                                    <div class="col-lg-4 col-md-9 col-sm-8">
                                        <select class="form-control" id="category" name="category" required>
                                            <option value="">Pilih Kategori</option>
                                            <option value="1">Kategori 1</option>
                                            <option value="2">Kategori 2</option>
                                            <option value="3">Kategori 3</option>
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
                                    <label for="qty" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-sm-right">Jumlah
                                        Buku
                                        <span class="required-label">*</span></label>
                                    <div class="col-lg-4 col-md-9 col-sm-8">
                                        <input type="number" class="form-control" id="qty" name="qty" required>
                                    </div>
                                </div>
                                {{-- cover --}}
                                <div class="form-group form-show-validation row">
                                    <label for="cover" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-sm-right">Cover
                                        Buku
                                        <span class="required-label">*</span></label>
                                    <div class="col-lg-4 col-md-9 col-sm-8">
                                        <input type="file" class="form-control" id="cover" name="cover" required>
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
                                            <option value="1">Buku</option>
                                            <option value="2">E-Book</option>
                                        </select>
                                    </div>
                                </div>
                                {{-- upload ebook --}}
                                <div class="form-group form-show-validation row">
                                    <label for="ebook" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-sm-right">Upload
                                        E-Book
                                        <span class="required-label">*</span></label>
                                    <div class="col-lg-4 col-md-9 col-sm-8">
                                        <input type="file" class="form-control" id="ebook" name="ebook"
                                            required>
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
    <script>
        $("#formAddBook").validate({
            rules: {
                title: {
                    required: true,
                },
                category: {
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
                qty: {
                    required: true,
                },
                cover: {
                    required: true,
                },
                type: {
                    required: true,
                },
                ebook: {
                    required: true,
                },
            },
            messages: {
                title: {
                    required: '<i class="fas fa-exclamation-circle mr-6 text-sm icon-error"></i>Judul buku tidak boleh kosong',
                },
                category: {
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
                qty: {
                    required: '<i class="fas fa-exclamation-circle mr-6 text-sm icon-error"></i>Jumlah buku tidak boleh kosong',
                },
                cover: {
                    required: '<i class="fas fa-exclamation-circle mr-6 text-sm icon-error"></i>Cover buku tidak boleh kosong',
                },
                type: {
                    required: '<i class="fas fa-exclamation-circle mr-6 text-sm icon-error"></i>Tipe buku tidak boleh kosong',
                },
                ebook: {
                    required: '<i class="fas fa-exclamation-circle mr-6 text-sm icon-error"></i>E-Book tidak boleh kosong',
                },
            },
            submitHandler: function(form, event) {
                event.preventDefault();
                $('#formAddBookButton').html('<i class="fas fa-circle-notch text-lg spinners-2"></i>');
                $('#formAddBookButton').prop('disabled', true);
                $.ajax({
                    type: "PUT",
                    url: `#`,
                    data: {
                        _token: "{{ csrf_token() }}",
                    },
                    success: function(response) {
                        $('#formAddBookButton').html('Terima');
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
                        $('#formAddBookButton').html('Terima');
                        $('#formAddBookButton').prop('disabled', false);
                        if (xhr.responseJSON)
                            Swal.fire({
                                icon: 'error',
                                title: 'TAMBAH KELAS GAGAL!',
                                text: xhr.responseJSON.meta.message + " Error: " + xhr
                                    .responseJSON.data.error,
                            })
                        else
                            Swal.fire({
                                icon: 'error',
                                title: 'TAMBAH KELAS GAGAL!',
                                text: "Terjadi kegagalan, silahkan coba beberapa saat lagi! Error: " +
                                    error,
                            })
                        return false;
                    },
                });
            }
        });
    </script>
@endsection
