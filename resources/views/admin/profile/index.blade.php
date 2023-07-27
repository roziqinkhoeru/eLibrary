@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="page-inner">
            <h4 class="page-title">Profil Admin</h4>
            <div class="row">
                <div class="col-md-8">
                    <div class="card card-with-nav">
                        {{-- tab --}}
                        <div class="card-header">
                            <div class="row row-nav-line">
                                <ul class="nav nav-tabs nav-line nav-color-secondary w-100 pl-4" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active show" href="{{ route('admin.profile') }}" role="tab"
                                            aria-selected="true">Profil</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('admin.edit.password') }}" role="tab"
                                            aria-selected="false">Ubah
                                            Password</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        {{-- form profile --}}
                        <div class="card-body">
                            <form action="#" id="profileAdminForm">
                                <div class="row mt-3">
                                    {{-- name --}}
                                    <div class="col-md-4">
                                        <div class="form-group form-group-default">
                                            <label for="name">Nama</label>
                                            <div class="form-control">{{ $admin->officer->name }}</div>
                                        </div>
                                    </div>
                                    {{-- username --}}
                                    <div class="col-md-4">
                                        <div class="form-group form-group-default">
                                            <label for="username">username</label>
                                            <div class="form-control">{{ $admin->username }}</div>
                                        </div>
                                    </div>
                                    {{-- email --}}
                                    <div class="col-md-4">
                                        <div class="form-group form-group-default">
                                            <label for="email">Email</label>
                                            <div class="form-control">{{ $admin->email }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    {{-- birth date --}}
                                    <div class="col-md-4">
                                        <div class="form-group form-group-default">
                                            <label for="dob">Tanggal Lahir</label>
                                            <div class="form-control">{{ $admin->officer->date_of_birth }}</div>
                                        </div>
                                    </div>
                                    {{-- gender --}}
                                    <div class="col-md-4">
                                        <div class="form-group form-group-default">
                                            <label for="gender">Jenis Kelamin</label>
                                            <div class="form-control">
                                                {{ $admin->officer->gender == 'L' ? 'laki-laki' : 'Perempuan' }}</div>
                                        </div>
                                    </div>
                                    {{-- phone --}}
                                    <div class="col-md-4">
                                        <div class="form-group form-group-default">
                                            <label for="phone">No Telepon</label>
                                            <div class="form-control">{{ $admin->officer->phone_number }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    {{-- address --}}
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default">
                                            <label for="address">Alamat</label>
                                            <div class="form-control">{{ $admin->officer->address }}</div>
                                        </div>
                                    </div>
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
    <script>
        $(document).ready(function() {
            $('#dob').datetimepicker({
                format: 'DD/MM/YYYY',
            }).on('changeDate', function(e) {
                // Mengganti value input dob dengan tanggal yang dipilih
                $('#dob').val(e.format('dd/mm/yyyy'));
            });
        });
    </script>
@endsection
