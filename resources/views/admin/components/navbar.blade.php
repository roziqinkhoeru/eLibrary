<div class="container-fluid">
    <div class="collapse" id="search-nav">
        <form id="navbarSearchForm" class="navbar-left navbar-form nav-search mr-md-3" onsubmit="searchNavbarForm(event)">
            <div class="input-group">
                <div class="input-group-prepend">
                    <button type="submit" class="btn btn-search pr-1">
                        <i class="fa fa-search search-icon"></i>
                    </button>
                </div>
                <input type="text" placeholder="Search ..." class="form-control" id="searchNavbar"
                    name="searchNavbar">
            </div>
        </form>
    </div>
    <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
        {{-- toggle nav search --}}
        <li class="nav-item toggle-nav-search hidden-caret">
            <a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false"
                aria-controls="search-nav">
                <i class="fa fa-search"></i>
            </a>
        </li>
        {{-- quick link --}}
        <li class="nav-item dropdown hidden-caret">
            <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                <i class="fas fa-layer-group"></i>
            </a>
            <div class="dropdown-menu quick-actions quick-actions-info animated fadeIn">
                <div class="quick-actions-header">
                    <span class="title mb-1">Quick Actions</span>
                    <span class="subtitle op-8">Shortcuts</span>
                </div>
                <div class="quick-actions-scroll scrollbar-outer">
                    <div class="quick-actions-items">
                        <div class="row m-0">
                            {{-- dashboard --}}
                            <a class="col-6 col-md-4 p-0" href="{{ route('admin.dashboard') }}">
                                <div class="quick-actions-item">
                                    <div class="avatar-item rounded-circle" style="background: #6861ce">
                                        <i class="fas fa-home"></i>
                                    </div>
                                    <span class="text">Dashboard</span>
                                </div>
                            </a>
                            {{-- book --}}
                            <a class="col-6 col-md-4 p-0" href="{{ route('admin.book') }}">
                                <div class="quick-actions-item">
                                    <div class="avatar-item bg-info rounded-circle">
                                        <i class="fas fa-book"></i>
                                    </div>
                                    <span class="text">Buku</span>
                                </div>
                            </a>
                            {{-- ebook --}}
                            <a class="col-6 col-md-4 p-0" href="{{ route('admin.ebook') }}">
                                <div class="quick-actions-item">
                                    <div class="avatar-item bg-warning rounded-circle">
                                        <i class="fas fa-book"></i>
                                    </div>
                                    <span class="text">E-Book</span>
                                </div>
                            </a>
                            {{-- transaction --}}
                            <a class="col-6 col-md-4 p-0" href="{{ route('admin.list.transaction') }}">
                                <div class="quick-actions-item">
                                    <div class="avatar-item bg-dark rounded-circle">
                                        <i class="fas fa-box"></i>
                                    </div>
                                    <span class="text">Peminjaman</span>
                                </div>
                            </a>
                            {{-- student --}}
                            <a class="col-6 col-md-4 p-0" href="{{ route('admin.student') }}">
                                <div class="quick-actions-item">
                                    <div class="avatar-item bg-danger rounded-circle">
                                        <i class="fas fa-user-graduate"></i>
                                    </div>
                                    <span class="text">Siswa</span>
                                </div>
                            </a>
                            {{-- category --}}
                            <a class="col-6 col-md-4 p-0" href="{{ route('admin.category') }}">
                                <div class="quick-actions-item">
                                    <div class="avatar-item bg-success rounded-circle">
                                        <i class="fas fa-layer-group"></i>
                                    </div>
                                    <span class="text">Kategori</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </li>
        {{-- profile --}}
        <li class="nav-item dropdown hidden-caret">
            <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                <div class="avatar-sm">
                    <img src="{{ asset('storage/' . auth()->user()->officer->profile_picture) }}"
                        alt="profile photo admin" class="avatar-img rounded-circle">
                </div>
            </a>
            <ul class="dropdown-menu dropdown-user animated fadeIn">
                <div class="dropdown-user-scroll scrollbar-outer">
                    <li>
                        <div class="user-box">
                            <div class="avatar-lg">
                                <img src="{{ asset('storage/' . auth()->user()->officer->profile_picture) }}"
                                    alt="profile photo admin" class="avatar-img rounded">
                            </div>
                            <div class="u-text">
                                <h4>{{ Auth::user()->officer->name }}</h4>
                                <p class="text-muted">{{ Auth::user()->email }}</p>
                                <a href="{{ route('admin.profile') }}" class="btn btn-xs btn-secondary btn-sm">View Profile</a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('admin.dashboard') }}">Home</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item hover-logout" href="{{ url('logout') }}"
                            onclick="logout()">Logout</a>
                    </li>
                </div>
            </ul>
        </li>
    </ul>
</div>

<script>
    function logout() {
        event.preventDefault();
        swal({
            dangerMode: true,
            title: 'Apakah anda yakin?',
            text: "Anda akan keluar dari akun ini!",
            icon: 'warning',
            buttons: ["Batal", "Ya, Keluar!"],
        }).then((result) => {
            if (result) {
                swal(
                    'Berhasil!',
                    'Anda telah keluar dari akun ini.',
                    'success'
                )
                window.location.href = "/logout";
            }
        })
    }
    // on submit form search
    const searchNavbarForm = (e) => {
        e.preventDefault();
        const search = document.getElementById('searchNavbar').value;
        if (search == '') {
            swal({
                icon: 'error',
                title: 'Oops...',
                text: 'Kata kunci tidak boleh kosong!',
            })
        } else {
            window.location.href = `/admin/search/${search}`;
        }
    }
</script>
