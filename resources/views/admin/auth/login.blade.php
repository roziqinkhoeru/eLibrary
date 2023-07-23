@extends('admin.auth.layout')

@section('authContent')
    <div class="container container-login container-transparent animated fadeIn">
        <h3 class="text-center">Masuk sebagai Petugas</h3>
        <form class="login-form" id="loginAdminForm">
            {{-- email --}}
            <div class="form-group">
                <label for="email" class="placeholder"><b>Email</b></label>
                <input id="email" name="email" type="email" class="form-control" id="email" required>
            </div>
            {{-- password --}}
            <div class="form-group">
                <label for="password" class="placeholder"><b>Password</b></label>
                <a href="{{ route('admin.forgot.password.create') }}" class="link float-right">Forget Password ?</a>
                <div class="position-relative">
                    <input id="password" name="password" id="password" type="password" class="form-control" required>
                    <div class="show-password">
                        <i class="icon-eye"></i>
                    </div>
                </div>
            </div>
            <div class="form-group form-action-d-flex mb-3">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="rememberme" name="rememberme">
                    <label class="custom-control-label m-0" for="rememberme">Remember Me</label>
                </div>
                <button type="submit" id="loginButton"
                    class="btn btn-secondary col-md-5 float-right mt-3 mt-sm-0 fw-bold">Masuk</button>
            </div>
        </form>
    </div>
@endsection

@section('authScript')
    <script>
        $('#loginAdminForm').validate({
            rules: {
                email: {
                    required: true,
                    email: true,
                },
                password: {
                    required: true,
                }
            },
            messages: {
                email: {
                    required: '<i class="fas fa-exclamation-circle mr-1 text-sm icon-error"></i>Email tidak boleh kosong',
                    email: '<i class="fas fa-exclamation-circle mr-1 text-sm icon-error"></i>Email tidak valid',
                },
                password: {
                    required: '<i class="fas fa-exclamation-circle mr-1 text-sm icon-error"></i>Kata sandi tidak boleh kosong',
                },
            },
            submitHandler: function(form) {
                $('#loginButton').html('<i class="fas fa-circle-notch text-lg spinners-2"></i>');
                $('#loginButton').prop('disabled', true);
                $.ajax({
                    url: "{{ route('admin.login.authenticate') }}",
                    type: "POST",
                    data: {
                        email: $('#email').val(),
                        password: $('#password').val(),
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        $('#loginButton').html('Masuk');
                        $('#loginButton').prop('disabled', false);
                        window.location.href = response.data.redirect
                    },
                    error: function(xhr, status, error) {
                        $('#loginButton').html('Masuk');
                        $('#loginButton').prop('disabled', false);
                        if (xhr.responseJSON)
                            Swal.fire({
                                icon: 'error',
                                title: 'Login Gagal!',
                                text: xhr.responseJSON.meta.message,
                            })
                        else
                            Swal.fire({
                                icon: 'error',
                                title: 'Login Gagal!',
                                text: "Terjadi kegagalan, silahkan coba beberapa saat lagi! Error: " +
                                    error,
                            })
                        return false;
                    }
                });
            }
        });
    </script>
@endsection
