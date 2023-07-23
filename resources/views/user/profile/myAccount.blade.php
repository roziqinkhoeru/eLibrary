@extends('user.layout.app')

@section('content')
    <main>
        {{-- header --}}
        @include('user.profile.components.header')

        {{-- profile menu area start --}}
        <section class="profile__menu pb-70 grey-bg-2">
            <div class="container">
                <div class="row">
                    {{-- sidebar --}}
                    @include('user.profile.components.sidebar')

                    {{-- main content --}}
                    <div class="col-xxl-8 col-md-8">
                        <div class="profile__menu-right">
                            <div class="tab-content" id="nav-tabContent"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- profile menu area end --}}

        {{-- Modal --}}
        <div class="profile__edit-modal" id="profileEditModal"></div>
    </main>
@endsection

@section('script')
    @if (session('error'))
        <script>
            $(document).ready(function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: '{{ session('error') }}',
                    showConfirmButton: false,
                    timer: 1500
                })
            });
        </script>
    @elseif (session('success'))
        <script>
            $(document).ready(function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: '{{ session('success') }}',
                    showConfirmButton: false,
                    timer: 1500
                })
            });
        </script>
    @endif
    <script>
        $(document).ready(function() {
            // Mendapatkan parameter dari URL
            var urlParams = new URLSearchParams(window.location.search);
            // Mengambil nilai parameter dengan nama tertentu
            var contentBeforeURL = urlParams.get('content');
            if (contentBeforeURL) {
                getContent(contentBeforeURL)
            } else {
                getContent('dashboard')
            }
        });

        // Fungsi untuk mengubah nilai aria-selected
        function setAriaSelected(element, value) {
            // element.setAttribute('aria-selected', value);
            if (value) {
                element.classList.add("active");
            } else {
                element.classList.remove("active");
            }
        }

        // Fungsi untuk mengubah nilai aria-selected saat tombol diklik
        function toggleAriaSelected(idSelected, isActive) {
            var button = document.getElementById(idSelected); // Ganti dengan ID tombol yang sesuai
            setAriaSelected(button, isActive);
        }

        function getContent(content) {
            // Mendapatkan parameter dari URL
            var urlParams = new URLSearchParams(window.location.search);
            // Mengambil nilai parameter dengan nama tertentu
            var contentBeforeURL = urlParams.get('content');
            // Membuat permintaan AJAX dan mengubah URL
            var request = `content=${content}`; // Request yang ingin ditambahkan
            var url = "{{ url('/profile') }}"; // Mendapatkan URL saat ini
            var newUrl = url + (url.indexOf('?') === -1 ? '?' : '&') + request; // Menambahkan request ke URL

            // Mengubah URL tanpa melakukan reload halaman
            history.pushState(null, null, newUrl);
            if (contentBeforeURL) {
                toggleAriaSelected(contentBeforeURL, false);
            }
            toggleAriaSelected(content, true);

            switch (content) {
                case 'profile':
                    getProfile()
                    break;
                case 'book':
                    getBook()
                    break;
                case 'history':
                    getTransactionHistory()
                    break;
                case 'change-password':
                    formChangePassword()
                    break;
                default:
                    break;
            }
        }

        let htmlString = ""

        // menu profile
        function getProfile() {
            // Display loading state
            $("#nav-tabContent").html(`<div class="tab-pane fade show active" role="tabpanel">
                                        <div class="order__info">
                                            <div class="profile__info-top d-flex justify-content-between align-items-center px-9">
                                                <h3 class="profile__info-title">Informasi Akun</h3>
                                            </div>
                                            <div class="order__list white-bg px-9">
                                                <div class="d-flex align-items-center justify-content-center pt-35 pb-60">
                                                    <i class="fas fa-circle-notch spinners-2" style="font-size: 54px"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    `);

            $.ajax({
                url: "{{ route('get.profile') }}",
                type: "GET",
                dataType: "JSON",
                success: function(response) {
                    htmlString = `<div class="tab-pane fade show active" role="tabpanel">
                            <div class="profile__info" id="profileInfo">
                                <div class="profile__info-top d-flex justify-content-between align-items-center px-9">
                                    <h3 class="profile__info-title">Informasi Akun</h3>
                                </div>
                                <div class="profile__info-wrapper white-bg px-9">
                                    <div class="profile__info-item">
                                        <p>NIS</p>
                                        <h4>${response.data.student.nis}</h4>
                                    </div>
                                    <div class="profile__info-item">
                                        <p>Nama</p>
                                        <h4>${response.data.student.name}</h4>
                                    </div>
                                    <div class="profile__info-item">
                                        <p>Email</p>
                                        <h4>${response.data.email}</h4>
                                    </div>
                                    <div class="profile__info-item">
                                        <p>Jenis Kelamin</p>
                                        <h4 class="text-capitalize">${response.data.student.gender == 'L' ? 'Laki-laki':'Perempuan'}</h4>
                                    </div>
                                    <div class="profile__info-item">
                                        <p>No Telepon</p>
                                        <h4>${response.data.student.phone_number}</h4>
                                    </div>
                                    <div class="profile__info-item">
                                        <p>Alamat</p>
                                        <h4>${response.data.student.address}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>`
                    $("#nav-tabContent").html(htmlString);
                },
                error: function(xhr, status, error) {
                    $("#nav-tabContent").html(errorState());
                }
            });
        }

        // menu my book
        function getBook() {
            // Display loading state
            $("#nav-tabContent").html(`<div class="tab-pane fade show active" role="tabpanel">
                                        <div class="order__info">
                                            <div class="order__info-top d-flex justify-content-between align-items-center px-9">
                                                <h3 class="order__info-title">Buku Pinjam</h3>
                                            </div>
                                            <div class="order__list white-bg px-9">
                                                <div class="d-flex align-items-center justify-content-center pt-35 pb-60">
                                                    <i class="fas fa-circle-notch spinners-2" style="font-size: 54px"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    `);
            $.ajax({
                type: "GET",
                url: "{{ route('get.profile.book') }}",
                dataType: "json",
                success: function(response) {
                    htmlString = `<div class="tab-pane fade show active" role="tabpanel">
                                    <div class="order__info">
                                        <div class="order__info-top d-flex justify-content-between align-items-center px-9">
                                            <h3 class="order__info-title">Buku Pinjam</h3>
                                        </div>
                                        <div class="order__list white-bg px-9 pb-9">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Buku</th>
                                                        <th scope="col">Tanggal</th>
                                                        <th scope="col">Denda</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    ${getMyBook(response.data.transactions)}
                                                    </tbody>
                                                </table>
                                        </div>
                                    </div>
                                </div>`
                    $("#nav-tabContent").html(htmlString);
                },
                error: function(xhr, status, error) {
                    $("#nav-tabContent").html(errorState());
                }
            })
        }
        // get my book data
        function getMyBook(data) {
            let myBook = '';
            if (data.length === 0) {
                myBook = `<div class="col-span-full pt-50 pb-45">
                                <div class="text-center">
                                    <h3 class="text-2xl">Buku Kosong</h3>
                                    <p class="text-base">Kamu tidak meminjam buku apapun</p>
                                    <a href="/book" class="tp-btn tp-btn-4 rounded-2">Cari Buku</a>
                                </div>
                            </div>`
            } else {
                $.map(data, function(transaction, index) {
                    switch (transaction.status) {
                        case 'pinjam':
                            badgeStatus = 'text-bg-primary';
                            break;
                        default:
                            break;
                    }
                    myBook += `<tr>
                                            <th scope="row">${index+1}</th>
                                            <td>
                                                <div>Judul : ${transaction.book.title}</div>
                                                <div>Penulis : ${transaction.book.author}</div>
                                                <div>Penerbit : ${transaction.book.publisher}</div>
                                            </td>
                                            <td>
                                                <div>Tanggal Pinjam : ${moment(transaction.start_date, 'YYYY/MM/DD').format('DD/MM/YYYY')}</div>
                                                <div>Tanggal Batas : ${moment(transaction.end_date, 'YYYY/MM/DD H:i:s').format('DD/MM/YYYY')}</div>
                                            </td>
                                            <td>${ parseInt(transaction.penalty) < 0 ? '-' : localCurrencyIDR(transaction.penalty)}</td>
                                            </tr>
                            `;
                })
            }
            return myBook;
        }


        // menu transaction
        function getTransactionHistory() {
            // Display loading state
            $("#nav-tabContent").html(`<div class="tab-pane fade show active" role="tabpanel">
                                        <div class="order__info">
                                            <div
                                                class="order__info-top d-flex justify-content-between align-items-center px-9"
                                            >
                                                <h3 class="order__info-title">Riwayat Pinjam</h3>
                                            </div>
                                            <div class="order__list white-bg">
                                                <div class="d-flex align-items-center justify-content-center pt-35 pb-60 px-9">
                                                    <i class="fas fa-circle-notch spinners-2" style="font-size: 54px"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    `);

            $.ajax({
                type: "GET",
                url: "{{ route('get.profile.transaction.history') }}",
                dataType: "JSON",
                success: function(response) {
                    htmlString = `<div class="tab-pane fade show active" role="tabpanel">
                            <div class="order__info">
                                <div
                                    class="order__info-top d-flex justify-content-between align-items-center px-9"
                                >
                                    <h3 class="order__info-title">Riwayat Pinjam</h3>
                                </div>
                                <div class="order__list white-bg px-9">
                                    <div>
                                        <table class="table">
                                        <thead>
                                            <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Buku</th>
                                            <th scope="col">Tanggal</th>
                                            <th scope="col">Denda</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        ${getMyTransaction(response.data.transactions)}
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                            </div>
                        </div>`
                    $("#nav-tabContent").html(htmlString);
                },
                error: function(xhr, status, error) {
                    $("#nav-tabContent").html(errorState());
                }
            });
        }
        // get my transaction
        function getMyTransaction(data) {
            let myTransaction = '';
            if (data === 0) {
                myTransaction = `<div class="col-span-full pt-50 pb-75">
                                    <div class="text-center">
                                        <h3 class="text-2xl">Transaksi Kosong</h3>
                                        <p class="text-base">Kamu belum melakukan transaksi  apapun</p>
                                        <a href="/course" class="tp-btn tp-btn-4 rounded-2">Beli Kelas</a>
                                    </div>
                                </div>`;
            } else {
                $.map(data, function(transaction, index) {
                    let badgeStatus = '';
                    let badgeText = '';
                    switch (transaction.status) {
                        case 'kembali':
                            badgeStatus = 'text-bg-success';
                            badgeText = 'kembali';
                            break;
                        default:
                            break;
                    }
                    myTransaction += `
                                            <tr>
                                            <th scope="row">${index+1}</th>
                                            <td>
                                                <div>Judul : ${transaction.book.title}</div>
                                                <div>Penulis : ${transaction.book.author}</div>
                                                <div>Penerbit : ${transaction.book.publisher}</div>
                                            </td>
                                            <td>
                                                <div>Tanggal Pinjam : ${moment(transaction.start_date, 'YYYY/MM/DD').format('DD/MM/YY')}</div>
                                                <div>Tanggal Kembali : ${moment(transaction.return_date, 'YYYY/MM/DD').format('DD/MM/YY')}</div>
                                            </td>
                                            <td>${transaction.penalty}</td>
                                            </tr>
                `;
                })
            }
            return myTransaction;
        }

        // menu change password
        function formChangePassword() {
            htmlString = `<div class="tab-pane fade show active" role="tabpanel">
                        <div class="password__change">
                            <div class="password__change-top px-9">
                                <h3 class="password__change-title">Ubah Kata Sandi</h3>
                            </div>
                            <div class="password__form white-bg px-9">
                                <form action="{{ route('profile.change.password') }}" method="POST" id="formChangePassword">
                                    @csrf @method('PUT')
                                    <div class="password__input">
                                        <p style="margin-bottom: 10px !important">Password Lama</p>
                                        <input type="password" id="old_password" name="old_password" placeholder="Masukkan Password Lama">
                                    </div>
                                    <div class="password__input">
                                        <p style="margin-bottom: 10px !important">Password Baru</p>
                                        <input type="password" id="password" name="password" placeholder="Masukkan Password Baru">
                                    </div>
                                    <div class="password__input" style="margin-bottom:36px !important">
                                        <p style="margin-bottom: 10px !important">Konfirmasi Password</p>
                                        <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" >
                                    </div>
                                    <div class="password__input mb-5 text-right">
                                        <button type="submit "id="updatePasswordButton" class="tp-btn">Update password</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>`
            $("#nav-tabContent").html(htmlString);
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
                    $('#updatePasswordButton').html(
                        '<i class="fas fa-circle-notch text-lg spinners-2"></i>');
                    $('#updatePasswordButton').prop('disabled', true);
                    $.ajax({
                        url: "{{ route('profile.change.password') }}",
                        type: "PUT",
                        data: {
                            old_password: $('#old_password').val(),
                            password: $('#password').val(),
                            password_confirmation: $('#password_confirmation').val(),
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            $('#updatePasswordButton').html('Update password');
                            $('#updatePasswordButton').prop('disabled', false);
                            $('#old_password').val("");
                            $('#password').val("");
                            $('#password_confirmation').val("");
                            Swal.fire({
                                icon: 'success',
                                title: 'UBAH PASSWORD BERHASIL!',
                                text: response.meta.message,
                            })
                        },
                        error: function(xhr, status, error) {
                            $('#updatePasswordButton').html('Update password');
                            $('#updatePasswordButton').prop('disabled', false);
                            if (xhr.responseJSON) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'UBAH PASSWORD GAGAL!',
                                    text: xhr.responseJSON.meta.message +
                                        " Error: " + xhr
                                        .responseJSON.data.error,
                                })
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'UBAH PASSWORD GAGAL!',
                                    text: "Terjadi kegagalan, silahkan coba beberapa saat lagi! Error: " +
                                        error,
                                })
                            }
                            return false;
                        }
                    });
                }
            });
        }


        // Menambahkan aturan validasi kustom untuk ukuran maksimum file
        $.validator.addMethod('maxfilesize', function(value, element, param) {
            var maxSize = param;

            if (element.files.length > 0) {
                var fileSize = element.files[0].size; // Ukuran file dalam byte
                return fileSize <= maxSize;
            }

            return true;
        }, '');

        // change profile picture
        $("#formUpdateProfileImage").validate({
            rules: {
                profileImage: {
                    required: true,
                    extension: "jpg|jpeg|png",
                    maxfilesize: 3 * 1024 * 1024, // 3MB (dalam byte),
                },
            },
            messages: {
                profileImage: {
                    required: '<i class="fas fa-exclamation-circle mr-6 text-sm icon-error"></i>File tidak boleh kosong',
                    extension: '<i class="fas fa-exclamation-circle mr-6 text-sm icon-error"></i>File harus berupa gambar (jpg, jpeg, png)',
                    maxfilesize: '<i class="fas fa-exclamation-circle mr-6 text-sm icon-error"></i>Ukuran file maksimal 3MB',
                },
            },
            submitHandler: function(form) {
                $('#updateProfileImageButton').html(
                    '<i class="fas fa-circle-notch text-lg spinners-2"></i>'
                );
                $('#updateProfileImageButton').prop('disabled', true);
                var formData = new FormData(form);
                $.ajax({
                    url: "{{ route('update.photo.profile') }}",
                    type: "POST",
                    processData: false,
                    contentType: false,
                    data: formData,
                    success: function(response) {
                        $('#updateProfileImageButton').html(
                            'Ubah');
                        $('#updateProfileImageButton').prop('disabled',
                            false);
                        $('#image_profile_edit_modal').modal('hide');
                        Swal.fire({
                            icon: 'success',
                            title: 'UBAH FOTO PROFIL BERHASIL!',
                            text: response.meta.message,
                        })
                        $("#photoProfile").attr('src',
                            `{{ asset('storage/${response.data.profile_picture}') }}`);
                        $("#imagePreview").attr('src',
                            `{{ asset('storage/${response.data.profile_picture}') }}`);
                        getContent('profile');
                    },
                    error: function(xhr, status, error) {
                        $('#updateProfileImageButton').html(
                            'Ubah');
                        $('#updateProfileImageButton').prop('disabled',
                            false);
                        if (xhr.responseJSON) {
                            Swal.fire({
                                icon: 'error',
                                title: 'UBAH FOTO PROFIL GAGAL!',
                                text: xhr.responseJSON.meta
                                    .message + ", Error: " +
                                    xhr
                                    .responseJSON.data
                                    .error,
                            })
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'UBAH FOTO PROFIL GAGAL!',
                                text: "Terjadi kegagalan, silahkan coba beberapa saat lagi! Error: " +
                                    error,
                            })
                        }
                        return false;
                    }
                });
            }
        });
    </script>
@endsection
