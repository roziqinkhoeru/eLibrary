@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="page-inner">
            {{-- header --}}
            <div class="page-header">
                <h4 class="page-title">Edit Buku</h4>
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
                        <form id="formEditBook" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                {{-- Title --}}
                                <div class="form-group form-show-validation row">
                                    <label for="title" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-sm-right">Judul
                                        Buku
                                        <span class="required-label">*</span></label>
                                    <div class="col-lg-4 col-md-9 col-sm-8">
                                        <input type="text" class="form-control" id="title" name="title"
                                            placeholder="Masukkan Judul Buku" value="{{ $book->title }}" required>
                                    </div>
                                </div>
                                {{-- ISBN --}}
                                <div class="form-group form-show-validation row">
                                    <label for="isbn" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-sm-right">ISBN
                                        <span class="required-label">*</span></label>
                                    <div class="col-lg-4 col-md-9 col-sm-8">
                                        <input type="text" class="form-control" id="isbn" name="isbn"
                                            placeholder="Masukkan ISBN" value="{{ $book->isbn }}" required>
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
                                                <option value="{{ $category->id }}"
                                                    {{ $book->category_id == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                {{-- Penerbit --}}
                                <div class="form-group form-show-validation row">
                                    <label for="publisher" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-sm-right">Penerbit
                                        <span class="required-label">*</span></label>
                                    <div class="col-lg-4 col-md-9 col-sm-8">
                                        <input type="text" class="form-control" id="publisher" name="publisher"
                                            placeholder="Masukkan Nama Penerbit" value="{{ $book->publisher }}" required>
                                    </div>
                                </div>
                                {{-- Pengarang --}}
                                <div class="form-group form-show-validation row">
                                    <label for="author" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-sm-right">Pengarang
                                        <span class="required-label">*</span></label>
                                    <div class="col-lg-4 col-md-9 col-sm-8">
                                        <input type="text" class="form-control" id="author" name="author"
                                            placeholder="Masukkan Nama Pengarang" value="{{ $book->author }}" required>
                                    </div>
                                </div>
                                {{-- Tahun Terbit --}}
                                <div class="form-group form-show-validation row">
                                    <label for="year" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-sm-right">Tahun
                                        Terbit
                                        <span class="required-label">*</span></label>
                                    <div class="col-lg-4 col-md-9 col-sm-8">
                                        <input type="number" class="form-control" id="year" name="year"
                                            max="{{ date('Y') }}" placeholder="Masukkan Tahun Terbit"
                                            value="{{ $book->year }}" required>
                                    </div>
                                </div>
                                {{-- Jumlah Buku --}}
                                <div class="form-group form-show-validation row">
                                    <label for="stock" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-sm-right">Jumlah
                                        Buku
                                        <span class="required-label">*</span></label>
                                    <div class="col-lg-4 col-md-9 col-sm-8">
                                        <input type="number" class="form-control" id="stock" name="stock"
                                            placeholder="Masukkan Jumlah Buku" value="{{ $book->stock }}" required>
                                    </div>
                                </div>
                                {{-- cover --}}
                                <div class="form-group form-show-validation row">
                                    <label for="cover" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-sm-right">Cover
                                        Buku <span class="required-label">*</span></label>
                                    <div class="col-lg-4 col-md-9 col-sm-8">
                                        <div class="input-file input-file-image">
                                            <img class="img-upload-preview" width="240"
                                                src="{{ asset('storage/' . $book->cover) }}" alt="Book Cover Preview"
                                                id="imagePreview">
                                            <input type="file" class="form-control form-control-file" id="cover"
                                                name="cover" accept="image/*" value="">
                                            <label for="cover"
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
                                            <option value="offline" {{ $book->type == 'offline' ? 'selected' : '' }}>Buku
                                            </option>
                                            <option value="online" {{ $book->type == 'online' ? 'selected' : '' }}>E-Book
                                            </option>
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
                                                <div id="filePreview">
                                                    @if ($book->file)
                                                        <div class="text-sm-center">
                                                            <figure class="file-pdf-info">
                                                                <img src="{{ asset('assets/img/decoration/pdf.png') }}"
                                                                    alt="PDF New File">
                                                            </figure>
                                                            <p class="mb-0 line-clamp-max-w-320">{{ $book->title }}</p>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="input-file input-file-image">
                                            <input type="file" class="form-control form-control-file" id="file"
                                                name="file" accept="application/pdf"
                                                value="{{ asset('storage/' . $book->file) }}">
                                            <label for="file"
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
                                        <a href="javascript:void(0)" id="backToBook"
                                            class="btn btn-default btn-outline-dark" role="presentation">Batal</a>
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
            const cover = $('#cover');
            const eBook = $('#file');
            const backToBookBtn = $('#backToBook');
            const typeValue = $('#type').val();

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

            cover.on('change', function(event) {
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
                type: {
                    required: true,
                },
            },
            messages: {
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
                type: {
                    required: '<i class="fas fa-exclamation-circle mr-6 text-sm icon-error"></i>Tipe buku tidak boleh kosong',
                },
            },
            submitHandler: function(form, event) {
                event.preventDefault();
                var formData = new FormData(form);
                $('#formEditBookButton').html('<i class="fas fa-circle-notch text-lg spinners-2"></i>');
                $('#formEditBookButton').prop('disabled', true);
                $.ajax({
                    type: "POST",
                    url: `{{ url('admin/book/' . $book->id) }}`,
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        $('#formEditBookButton').html('Kirim');
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
                        $('#formEditBookButton').html('Kirim');
                        $('#formEditBookButton').prop('disabled', false);
                        if (xhr.responseJSON)
                            swal({
                                icon: 'error',
                                title: 'Gagal!',
                                text: xhr.statusText + ", Error : " + xhr
                                    .responseJSON.message,
                            })
                        else
                            swal({
                                icon: 'error',
                                title: 'Gagal!',
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
