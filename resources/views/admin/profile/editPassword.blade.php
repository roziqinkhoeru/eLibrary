@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="page-inner">
            <h4 class="page-title">Admin Profile</h4>
            <div class="row">
                <div class="col-md-8">
                    <div class="card card-with-nav">
                        {{-- tab --}}
                        <div class="card-header">
                            <div class="row row-nav-line">
                                <ul class="nav nav-tabs nav-line nav-color-secondary w-100 pl-4" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('admin.profile') }}" role="tab"
                                            aria-selected="false">Profile</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active show" href="{{ route('admin.edit.password') }}"
                                            role="tab" aria-selected="true">Ubah
                                            Password</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        {{-- form profile --}}
                        <div class="card-body">
                            <form method="POST" id="formChangePassword">
                                @csrf
                                @method('PUT')
                                <div class="row mt-3">
                                    {{-- old password --}}
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default">
                                            <label for="old_password">Password Lama</label>
                                            <input type="password" class="form-control" id="old_password"
                                                name="old_password" placeholder="Masukkan Password Lama" required>
                                        </div>
                                    </div>
                                    {{-- new password --}}
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default">
                                            <label for="password">Password Baru</label>
                                            <input type="password" class="form-control" id="password" name="password"
                                                placeholder="Masukkan Password Baru" required>
                                        </div>
                                    </div>
                                    {{-- confirm new password --}}
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default">
                                            <label for="password_confirmation">Konfirmasi Password Baru</label>
                                            <input type="password" class="form-control" id="password_confirmation"
                                                name="password_confirmation" placeholder="Masukkan Password Baru" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-right mt-3 mb-3">
                                    <button class="btn btn-success" type="submit" id="updatePasswordButton">Ubah
                                        Password</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-profile">
                        <div class="card-header"
                            style="background-image: url({{ asset('assets/template/admin/img/blogpost.jpg') }})">
                            <div class="profile-picture">
                                <div class="avatar avatar-xl">
                                    <img src="{{ asset('assets/template/admin/img/profile.jpg') }}" alt="admin-profile"
                                        class="avatar-img rounded-circle">
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="user-profile text-center">
                                <div class="name">{{ $admin->officer->name }}</div>
                                <div class="job">admin</div>
                                <div class="desc">Mengelola Data Perpus Digital</div>
                            </div>
                        </div>
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
        $("#formChangePassword").validate({
            rules: {
                old_password: {
                    required: true,
                    minlength: 8,
                },
                password: {
                    required: true,
                    minlength: 8,
                    pattern: /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/,
                },
                password_confirmation: {
                    required: true,
                    equalTo: "#password",
                },
            },
            messages: {
                old_password: {
                    required: '<i class="fas fa-exclamation-circle mr-6 text-sm icon-error"></i>Password lama tidak boleh kosong',
                    minlength: '<i class="fas fa-exclamation-circle mr-6 text-sm icon-error"></i>Password lama minimal 8 karakter',
                },
                password: {
                    required: '<i class="fas fa-exclamation-circle mr-6 text-sm icon-error"></i>Kata sandi tidak boleh kosong',
                    minlength: '<i class="fas fa-exclamation-circle mr-6 text-sm icon-error"></i>Kata sandi minimal 8 karakter',
                    pattern: '<i class="fas fa-exclamation-circle mr-6 text-sm icon-error"></i>Kata sandi harus mengandung huruf dan angka',
                },
                password_confirmation: {
                    required: '<i class="fas fa-exclamation-circle mr-6 text-sm icon-error"></i>Konfirmasi kata sandi tidak boleh kosong',
                    equalTo: '<i class="fas fa-exclamation-circle mr-6 text-sm icon-error"></i>Konfirmasi kata sandi tidak sama',
                },
            },
            submitHandler: function(form) {
                swal({
                    dangerMode: true,
                    title: 'Apakah anda yakin?',
                    text: "Anda akan mengubah password anda",
                    icon: 'warning',
                    buttons: ["Batal", "Ubah"],
                }).then((result) => {
                    if (result) {
                        $('#updatePasswordButton').html(
                            '<i class="fas fa-circle-notch text-lg spinners-2"></i>');
                        $('#updatePasswordButton').prop('disabled', true);
                        $.ajax({
                            url: "{{ route('admin.change.password') }}",
                            type: "POST",
                            data: {
                                old_password: $('#old_password').val(),
                                password: $('#password').val(),
                                password_confirmation: $('#password_confirmation').val(),
                                _token: "{{ csrf_token() }}",
                                _method: 'PUT'
                            },
                            success: function(response) {
                                $('#updatePasswordButton').html('Update password');
                                $('#updatePasswordButton').prop('disabled', false);
                                $('#old_password').val("");
                                $('#password').val("");
                                $('#password_confirmation').val("");
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
                                            window.location.href = response.data
                                                .redirect;
                                        }
                                    });

                                setTimeout(function() {
                                    window.location.href = response.data.redirect;
                                }, 4000);
                            },
                            error: function(xhr, status, error) {
                                $('#updatePasswordButton').html('Update password');
                                $('#updatePasswordButton').prop('disabled', false);
                                if (xhr.responseJSON) {
                                    swal({
                                        title: "Gagal!",
                                        text: xhr.responseJSON.meta.message +
                                            ", Error : " + xhr
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
                                return false;
                            }
                        });
                    } else {
                        return false;
                    }
                });
            }
        });
    </script>
@endsection
