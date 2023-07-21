<div class="sidebar-content">
    {{-- user --}}
    <div class="user">
        <div class="avatar-sm float-left mr-2">
            <img src="{{ asset('assets/template/admin/img/profile.jpg') }}" alt="profile photo admin"
                class="avatar-img rounded-circle">
        </div>
        <div class="info">
            <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                <span>
                    {{-- {{ auth()->user()->username }} --}}

                    <span class="user-level">Administrator</span>
                    <span class="caret"></span>
                </span>
            </a>
            <div class="clearfix"></div>

            <div class="collapse in" id="collapseExample">
                <ul class="nav">
                    <li>
                        <a href="/admin/profile">
                            <span class="link-collapse">Profil Saya</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    {{-- sidebar --}}
    <ul class="nav nav-primary">
        {{-- dashboard --}}
        <li class="nav-item @if ($currentNav == 'dashboard') active @endif">
            <a href="/admin/dashboard">
                <i class="fas fa-home"></i>
                <p>Dashboard</p>
            </a>
        </li>
        {{-- book --}}
        <li class="nav-item @if ($currentNav == 'book') active @endif">
            <a data-toggle="collapse" href="#bookMenu">
                <i class="fas fa-book"></i>
                <p>Buku</p>
                <span class="caret"></span>
            </a>
            <div class="collapse" id="bookMenu">
                <ul class="nav nav-collapse">
                    <li class="@if ($currentNavChild == 'library') active @endif">
                        <a href="/admin/book">
                            <span class="sub-item">Perpustakaan</span>
                        </a>
                    </li>
                    <li class="@if ($currentNavChild == 'ebook') active @endif">
                        <a href="/admin/ebook">
                            <span class="sub-item">E-Book</span>
                        </a>
                    </li>
                    <li class="@if ($currentNavChild == 'addBook') active @endif">
                        <a href="/admin/book/create">
                            <span class="sub-item">Tambah Buku</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        {{-- classes --}}
        {{-- <li class="nav-item @if ($currentNav == 'course') active @endif">
            <a href="/admin/classes">
                <i class="fas fa-book"></i>
                <p>Kelas</p>
            </a>
        </li> --}}
        {{-- <li class="nav-section">
            <span class="sidebar-mini-icon">
                <i class="fa fa-ellipsis-h"></i>
            </span>
            <h4 class="text-section">Learning</h4>
        </li> --}}
        {{-- student --}}
        <li class="nav-item @if ($currentNav == 'student') active @endif">
            <a href="/admin/student">
                <i class="fas fa-user-graduate"></i>
                <p>Siswa</p>
            </a>
        </li>
        {{-- category --}}
        <li class="nav-item @if ($currentNav == 'category') active @endif">
            <a href="{{ route('admin.category') }}">
                <i class="fas fa-layer-group"></i>
                <p>Kategori</p>
            </a>
        </li>
        {{-- logout --}}
        <li class="nav-item">
            <a href="/logout" onclick="logout()" class="hover-logout">
                <i class="fas fa-sign-out-alt"></i>
                <p>Logout</p>
            </a>
        </li>
    </ul>
</div>
