@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="page-inner">
            {{-- header --}}
            <div class="page-header">
                <h4 class="page-title">Edit Buku</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="/admin/dashboard">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">
                            Form Edit Buku
                        </a>
                    </li>
                </ul>
            </div>

            {{-- main content --}}
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Form Edit Buku</div>
                            <div class="card-category">
                                Form ini digunakan untuk mengubah data buku maupun e-book
                            </div>
                        </div>
                        <form id="formEditBook" action="" method="POST">
                            <div class="card-body">
                                {{-- Title --}}
                                <div class="form-group form-show-validation row">
                                    <label for="title" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-sm-right">Judul
                                        Buku
                                        <span class="required-label">*</span></label>
                                    <div class="col-lg-4 col-md-9 col-sm-8">
                                        <input type="text" class="form-control" id="title" name="title"
                                            placeholder="Masukkan Judul Buku" value="" required>
                                    </div>
                                </div>
                                {{-- ISBN --}}
                                <div class="form-group form-show-validation row">
                                    <label for="isbn" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-sm-right">ISBN
                                        <span class="required-label">*</span></label>
                                    <div class="col-lg-4 col-md-9 col-sm-8">
                                        <input type="text" class="form-control" id="isbn" name="isbn"
                                            placeholder="Masukkan ISBN" value="" required>
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
                                        <input type="text" class="form-control" id="publisher" name="publisher"
                                            placeholder="Masukkan Nama Penerbit" value="" required>
                                    </div>
                                </div>
                                {{-- Pengarang --}}
                                <div class="form-group form-show-validation row">
                                    <label for="author" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-sm-right">Pengarang
                                        <span class="required-label">*</span></label>
                                    <div class="col-lg-4 col-md-9 col-sm-8">
                                        <input type="text" class="form-control" id="author" name="author"
                                            placeholder="Masukkan Nama Pengarang" value="" required>
                                    </div>
                                </div>
                                {{-- Tahun Terbit --}}
                                <div class="form-group form-show-validation row">
                                    <label for="year" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-sm-right">Tahun
                                        Terbit
                                        <span class="required-label">*</span></label>
                                    <div class="col-lg-4 col-md-9 col-sm-8">
                                        <input type="number" class="form-control" id="year" name="year"
                                            placeholder="Masukkan Tahun Terbit" value="" required>
                                    </div>
                                </div>
                                {{-- Jumlah Buku --}}
                                <div class="form-group form-show-validation row">
                                    <label for="qty" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-sm-right">Jumlah
                                        Buku
                                        <span class="required-label">*</span></label>
                                    <div class="col-lg-4 col-md-9 col-sm-8">
                                        <input type="number" class="form-control" id="qty" name="qty"
                                            placeholder="Masukkan Jumlah Buku" value="" required>
                                    </div>
                                </div>
                                {{-- cover --}}
                                <div class="form-group form-show-validation row">
                                    <label for="bookCover" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-sm-right">Cover
                                        Buku <span class="required-label">*</span></label>
                                    <div class="col-lg-4 col-md-9 col-sm-8">
                                        <div class="input-file input-file-image">
                                            <img class="img-upload-preview" width="240"
                                                src="http://placehold.it/240x240" alt="Book Cover Preview"
                                                id="imagePreview">
                                            <input type="file" class="form-control form-control-file" id="bookCover"
                                                name="bookCover" accept="image/*" value="" required>
                                            <label for="bookCover"
                                                class="label-input-file btn btn-black btn-round mt-2 mr-3 btn-upload-image-sm">
                                                <span class="btn-label">
                                                    <i class="fa fa-file-image"></i>
                                                </span>
                                                Upload Cover
                                            </label>
                                        </div>
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
                                            <option value="2" selected>E-Book</option>
                                        </select>
                                    </div>
                                </div>
                                {{-- upload ebook --}}
                                <div class="form-group form-show-validation row" id="uploadEbookContainer">
                                    <label for="ebook" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-sm-right">File
                                        Info<span class="required-label">*</span></label>
                                    <div class="col-lg-6 col-md-9 col-sm-8">
                                        <div class="mb-2">
                                            <div class="d-flex flex-column flex-sm-row">
                                                <div id="filePreview"></div>
                                            </div>
                                        </div>
                                        <div class="input-file input-file-image">
                                            <input type="file" class="form-control form-control-file" id="ebook"
                                                name="ebook" accept="application/pdf" value="" required>
                                            <label for="ebook"
                                                class="label-input-file btn btn-black btn-round mt-2 mr-3 btn-upload-image-sm">
                                                <span class="btn-label">
                                                    <i class="fa fa-file-pdf"></i>
                                                </span>
                                                Unggah File Info
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-action">
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <button id="backToBook" class="btn btn-default btn-outline-dark"
                                            role="presentation">Batal</button>
                                        <button class="btn btn-primary ml-3" id="formEditBookButton"
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
        $(document).ready(function() {
            // define variable
            const imagePreview = $('#imagePreview');
            const filePreview = $('#filePreview');
            const bookCover = $('#bookCover');
            const eBook = $('#ebook');
            const backToBookBtn = $('#backToBook');
            const typeValue = $('#type').val();

            function toggleEbookContainer(e) {
                if (e === "2") {
                    $("#uploadEbookContainer").show();
                } else {
                    $("#uploadEbookContainer").hide();
                }
            }
            toggleEbookContainer(typeValue);

            $("#type").change(function() {
                var selectedValue = $(this).val();
                toggleEbookContainer(selectedValue);
            });

            bookCover.on('change', function(event) {
                const file = event.target.files[0];
                const reader = new FileReader();

                reader.onload = function(e) {
                    imagePreview.attr('src', e.target.result);
                };

                reader.readAsDataURL(file);
            });
            eBook.on('change', function(event) {
                const file = event.target.files[0];
                const reader = new FileReader();

                reader.onload = function(event) {
                    const base64String = event.target.result;
                    const fileEbook = {
                        name: file.name,
                        data: base64String
                    };
                    filePreview.html(`<div class="text-sm-center">
                                    <figure class="file-pdf-info">
                                    <img src="{{ asset('assets/img/decoration/pdf.png') }}" alt="PDF New File">
                                    </figure>
                                    <p class="mb-0 line-clamp-max-w-320">${fileEbook.name}</p>
                                </div>`);
                };

                reader.readAsDataURL(file); // Read the file as a data URL (Base64)
            });

            backToBookBtn.on('click', function() {
                window.location.href = "/admin/book";
            });
        });

        $("#formEditBook").validate({
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
                bookCover: {
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
                bookCover: {
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
                $('#formEditBookButton').html('<i class="fas fa-circle-notch text-lg spinners-2"></i>');
                $('#formEditBookButton').prop('disabled', true);
                $.ajax({
                    type: "PUT",
                    url: `#`,
                    data: {
                        _token: "{{ csrf_token() }}",
                    },
                    success: function(response) {
                        $('#formEditBookButton').html('Terima');
                        $('#formEditBookButton').prop('disabled', false);
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
                        $('#formEditBookButton').html('Terima');
                        $('#formEditBookButton').prop('disabled', false);
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
