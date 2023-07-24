@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="page-inner">
            {{-- header --}}
            <div class="page-header">
                <h4 class="page-title">Tambah Buku</h4>
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
                                    <div class="col-lg-6 col-md-9 col-sm-8">
                                        <input type="number" class="form-control" id="id" name="id"
                                            placeholder="Masukkan ID Buku" required>
                                    </div>
                                </div>
                                {{-- Title --}}
                                <div class="form-group form-show-validation row">
                                    <label for="title" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-sm-right">Judul
                                        Buku
                                        <span class="required-label">*</span></label>
                                    <div class="col-lg-6 col-md-9 col-sm-8">
                                        <input type="text" class="form-control" id="title" name="title"
                                            placeholder="Masukkan Judul Buku" required>
                                    </div>
                                </div>
                                {{-- ISBN --}}
                                <div class="form-group form-show-validation row">
                                    <label for="isbn" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-sm-right">ISBN
                                        <span class="required-label">*</span></label>
                                    <div class="col-lg-6 col-md-9 col-sm-8">
                                        <input type="text" class="form-control" id="isbn" name="isbn"
                                            placeholder="Masukkan ISBN" required>
                                    </div>
                                </div>
                                {{-- Kategori --}}
                                <div class="form-group form-show-validation row">
                                    <label for="category_id"
                                        class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-sm-right">Kategori
                                        <span class="required-label">*</span></label>
                                    <div class="col-lg-6 col-md-9 col-sm-8">
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
                                    <div class="col-lg-6 col-md-9 col-sm-8">
                                        <input type="text" class="form-control" id="publisher" name="publisher"
                                            placeholder="Masukkan Nama Penerbit" required>
                                    </div>
                                </div>
                                {{-- Pengarang --}}
                                <div class="form-group form-show-validation row">
                                    <label for="author" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-sm-right">Pengarang
                                        <span class="required-label">*</span></label>
                                    <div class="col-lg-6 col-md-9 col-sm-8">
                                        <input type="text" class="form-control" id="author" name="author"
                                            placeholder="Masukkan Nama Pengarang" required>
                                    </div>
                                </div>
                                {{-- Tahun Terbit --}}
                                <div class="form-group form-show-validation row">
                                    <label for="year" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-sm-right">Tahun
                                        Terbit
                                        <span class="required-label">*</span></label>
                                    <div class="col-lg-6 col-md-9 col-sm-8">
                                        <input type="number" class="form-control" id="year" name="year"
                                            placeholder="Masukkan Tahun Terbit" required>
                                    </div>
                                </div>
                                {{-- Jumlah Buku --}}
                                <div class="form-group form-show-validation row">
                                    <label for="stock" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-sm-right">Jumlah
                                        Buku
                                        <span class="required-label">*</span></label>
                                    <div class="col-lg-6 col-md-9 col-sm-8">
                                        <input type="number" class="form-control" id="stock" name="stock"
                                            placeholder="Masukkan Jumlah Buku" required>
                                    </div>
                                </div>
                                {{-- cover --}}
                                <div class="form-group form-show-validation row">
                                    <label for="cover" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-sm-right">Cover
                                        Buku <span class="required-label">*</span></label>
                                    <div class="col-lg-6 col-md-9 col-sm-8">
                                        <div class="input-file input-file-image">
                                            <img class="img-upload-preview" width="240"
                                                src="http://placehold.it/240x240" alt="Book Cover Preview"
                                                id="imagePreview">
                                            <input type="file" class="form-control form-control-file" id="cover"
                                                name="cover" accept="image/*" required>
                                            <label for="cover"
                                                class="label-input-file btn btn-black btn-round mt-2 mr-3 btn-upload-image-sm">
                                                <span class="btn-label">
                                                    <i class="fa fa-file-image"></i>
                                                </span>
                                                Upload Cover
                                            </label>
                                            <button type="button" id="deleteImage"
                                                class="btn btn-danger btn-round btn-upload-image-sm">
                                                <span class="btn-label"><i class="fas fa-trash-alt"></i></span>
                                                Hapus
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                {{-- tipe buku --}}
                                <div class="form-group form-show-validation row">
                                    <label for="type" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-sm-right">Tipe
                                        Buku
                                        <span class="required-label">*</span></label>
                                    <div class="col-lg-6 col-md-9 col-sm-8">
                                        <select class="form-control" id="type" name="type" required>
                                            <option value="">Pilih Tipe Buku</option>
                                            <option value="offline">Buku</option>
                                            <option value="online">E-Book</option>
                                        </select>
                                    </div>
                                </div>
                                {{-- upload ebook --}}
                                <div class="form-group form-show-validation row" id="uploadEbookContainer">
                                    <label for="file" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-sm-right">File
                                        Info<span class="required-label">*</span></label>
                                    <div class="col-lg-6 col-md-9 col-sm-8">
                                        <div class="mb-2">
                                            <div class="d-flex flex-column flex-sm-row">
                                                <div id="filePreview"></div>
                                            </div>
                                        </div>
                                        <div class="input-file input-file-image">
                                            <input type="file" class="form-control form-control-file" id="file"
                                                name="file" accept="application/pdf" required>
                                            <label for="file"
                                                class="label-input-file btn btn-black btn-round mt-2 mr-3 btn-upload-image-sm">
                                                <span class="btn-label">
                                                    <i class="fa fa-file-pdf"></i>
                                                </span>
                                                Unggah File Info
                                            </label>
                                            <button type="button" id="deleteEbook"
                                                class="btn btn-danger btn-round btn-upload-image-sm">
                                                <span class="btn-label"><i class="fas fa-trash-alt"></i></span>
                                                Hapus
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-action">
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <a href="javascript:void(0)" id="backToBook"
                                            class="btn btn-default btn-outline-dark" role="presentation">Batal</a>
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
        $(document).ready(function() {
            // define variable
            const imagePreview = $('#imagePreview');
            const filePreview = $('#filePreview');
            const cover = $('#cover');
            const eBook = $('#file');
            const deleteImageBtn = $('#deleteImage');
            const deleteEbookBtn = $('#deleteEbook');
            const backToBookBtn = $('#backToBook');
            const typeValue = $('#type').val();
            const storedImage = localStorage.getItem('coverPreview');
            const storedEbook = localStorage.getItem('ebookPreview');

            function toggleEbookContainer(e) {
                if (e === "online") {
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

            if (storedImage) {
                imagePreview.attr('src', storedImage);
            }
            if (storedEbook) {
                filePreview.html(`<div class="text-sm-center">
                                    <figure class="file-pdf-info">
                                        <img src="{{ asset('assets/img/decoration/pdf.png') }}" alt="PDF New File">
                                    </figure>
                                    <p class="mb-0 line-clamp-max-w-320">${JSON.parse(storedEbook).name}</p>
                                </div>`);
            }

            cover.on('change', function(event) {
                const file = event.target.files[0];
                const reader = new FileReader();

                reader.onload = function(e) {
                    imagePreview.attr('src', e.target.result);
                    localStorage.setItem('coverPreview', e.target.result);
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
                    localStorage.setItem('ebookPreview', JSON.stringify(fileEbook));
                };

                reader.readAsDataURL(file); // Read the file as a data URL (Base64)
            });

            deleteImageBtn.on('click', function() {
                cover.val(null);
                imagePreview.attr('src',
                    'http://placehold.it/240x240'); // Replace with your default image URL
                localStorage.removeItem('coverPreview');
            });

            deleteEbookBtn.on('click', function() {
                eBook.val(null);
                filePreview.html('');
                localStorage.removeItem('ebookPreview');
            });

            backToBookBtn.on('click', function() {
                localStorage.removeItem('coverPreview');
                localStorage.removeItem('ebookPreview');
                window.location.href = "/admin/book";
            });
        });

        $("#formAddBook").validate({
            rules: {
                id: {
                    required: true,
                    minlength: 3,
                    maxlength: 3,
                    number: true,
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
                    minlength: '<i class="fas fa-exclamation-circle mr-6 text-sm icon-error"></i>ID buku harus 3 karakter',
                    maxlength: '<i class="fas fa-exclamation-circle mr-6 text-sm icon-error"></i>ID buku harus 3 karakter',
                    number: '<i class="fas fa-exclamation-circle mr-6 text-sm icon-error"></i>ID buku harus berupa angka',
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
                    required: ($('#type').val() == "online" ?
                        '<i class="fas fa-exclamation-circle mr-6 text-sm icon-error"></i>E-Book tidak boleh kosong' :
                        ''),
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
                        localStorage.removeItem('ebookPreview');
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
                        $('#formAddBookButton').html('Kirim');
                        $('#formAddBookButton').prop('disabled', false);
                        if (xhr.responseJSON) {
                            new swal({
                                title: "Gagal!",
                                text: xhr.statusText + ", Error : " + xhr
                                    .responseJSON.message,
                                icon: "error",
                            });
                        } else {
                            new swal({
                                title: "Gagal!",
                                text: "Terjadi kegagalan, silahkan coba beberapa saat lagi! Error: " +
                                    xhr.statusText,
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
