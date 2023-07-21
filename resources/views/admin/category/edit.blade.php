@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="page-inner">
            {{-- header --}}
            <div class="page-header">
                <h4 class="page-title">Ubah Kategori</h4>
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
                            Form Ubah Kategori
                        </a>
                    </li>
                </ul>
            </div>

            {{-- main content --}}
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Form Ubah Kategori</div>
                            <div class="card-category">
                                Form ini digunakan untuk mengubah kategori
                            </div>
                        </div>
                        <form id="formAddCategory">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                {{-- Name --}}
                                <div class="form-group form-show-validation row">
                                    <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-sm-right">Nama
                                        Kategori
                                        <span class="required-label">*</span></label>
                                    <div class="col-lg-4 col-md-9 col-sm-8">
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Masukkan Judul Kategori" value="{{ $category->name }}" required>
                                    </div>
                                </div>
                                {{-- Description --}}
                                <div class="form-group form-show-validation row">
                                    <label for="description" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-sm-right">Deskripsi
                                        <span class="required-label">*</span></label>
                                    <div class="col-lg-4 col-md-9 col-sm-8">
                                        <input type="text" class="form-control" id="description" name="description" value="{{ $category->description }}"
                                            placeholder="Masukkan Deskripsi" required>
                                    </div>
                                </div>
                            </div>
                            <div class="card-action">
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <button id="backToCategory" class="btn btn-default btn-outline-dark"
                                            role="presentation">Batal</button>
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
        });

        $("#formAddCategory").validate({
            rules: {
                name: {
                    required: true,
                },
                description: {
                    required: true,
                },
            },
            messages: {
                name: {
                    required: '<i class="fas fa-exclamation-circle mr-6 text-sm icon-error"></i>Nama kategori tidak boleh kosong',
                },
                description: {
                    required: '<i class="fas fa-exclamation-circle mr-6 text-sm icon-error"></i>Deskripsi kategori tidak boleh kosong',
                },
            },
            submitHandler: function(form, event) {
                event.preventDefault();
                var formData = new FormData(form);
                $('#formAddCategoryButton').html('<i class="fas fa-circle-notch text-lg spinners-2"></i>');
                $('#formAddCategoryButton').prop('disabled', true);
                $.ajax({
                    type: "POST",
                    url: `{{ url('/admin/category/'. $category->slug) }}`,
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        $('#formAddCategoryButton').html('Kirim');
                        $('#formAddCategoryButton').prop('disabled', false);
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
                        $('#formAddCategoryButton').html('Kirim');
                        $('#formAddCategoryButton').prop('disabled', false);
                        if (xhr.responseJSON) {
                            swal({
                                title: "GAGAL!",
                                text: xhr.responseJSON.meta.message + " Error : " + xhr
                                    .responseJSON.data.error,
                                icon: "error",
                            });
                        } else {
                            swal({
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
