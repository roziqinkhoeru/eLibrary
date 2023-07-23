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
                                            {{-- <input disabled type="text" class="form-control" name="name" id="name"
                                                placeholder="Nama" value="{{ $admin->officer->name }}"> --}}
                                                <div class="form-control">{{ $admin->officer->name }}</div>
                                        </div>
                                    </div>
                                    {{-- username --}}
                                    <div class="col-md-4">
                                        <div class="form-group form-group-default">
                                            <label for="username">username</label>
                                            {{-- <input disabled type="username" class="form-control" name="username" id="username"
                                                placeholder="username" value="{{ $admin->username }}" disabled> --}}
                                                <div class="form-control">{{ $admin->username }}</div>
                                        </div>
                                    </div>
                                    {{-- email --}}
                                    <div class="col-md-4">
                                        <div class="form-group form-group-default">
                                            <label for="email">Email</label>
                                            {{-- <input disabled type="email" class="form-control" name="email" id="email"
                                                placeholder="email" value="{{ $admin->email }}" disabled> --}}
                                                <div class="form-control">{{ $admin->email }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    {{-- birth date --}}
                                    <div class="col-md-4">
                                        <div class="form-group form-group-default">
                                            <label for="dob">Tanggal Lahir</label>
                                            {{-- <input disabled type="text" class="form-control" id="dob" name="dob"
                                                value="{{ date('d/m/Y', strtotime($admin->officer->dob)) }}"
                                                placeholder="Birth Date"> --}}
                                                <div class="form-control">{{ $admin->officer->date_of_birth }}</div>
                                        </div>
                                    </div>
                                    {{-- gender --}}
                                    <div class="col-md-4">
                                        <div class="form-group form-group-default">
                                            <label for="gender">Jenis Kelamin</label>
                                            {{-- <select disabled class="form-control" id="gender" name="gender">
                                                <option value="Laki-laki"
                                                    {{ $admin->officer->gender == 'laki-laki' ? 'selected' : '' }}>
                                                    Laki-laki</option>
                                                <option value="perempuan"
                                                    {{ $admin->officer->gender == 'perempuan' ? 'selected' : '' }}>
                                                    perempuan</option>
                                            </select> --}}
                                            <div class="form-control">{{ $admin->officer->gender == 'L' ? 'laki-laki' : 'Perempuan' }}</div>
                                        </div>
                                    </div>
                                    {{-- phone --}}
                                    <div class="col-md-4">
                                        <div class="form-group form-group-default">
                                            <label for="phone">No Telepon</label>
                                            {{-- <input disabled type="text" class="form-control" id="phone"
                                                value="{{ $admin->officer->phone }}" name="phone" placeholder="Phone"> --}}
                                                <div class="form-control">{{ $admin->officer->phone_number }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    {{-- address --}}
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default">
                                            <label for="address">Alamat</label>
                                            {{-- <input disabled type="text" class="form-control"
                                                value="{{ $admin->officer->address }}" id="address" name="address"
                                                placeholder="Address"> --}}
                                                <div class="form-control">{{ $admin->officer->address }}</div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="text-right mt-3 mb-3">
                                    <button class="btn btn-success" type="submit" id="updateButton">Perbarui
                                        Profil</button>
                                </div> --}}
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
