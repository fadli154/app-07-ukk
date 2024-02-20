<div id="sidebar">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header position-relative pb-0">
            <div class="d-flex justify-content-between align-items-center">
                <div class="logo-diglib">
                    <a href="/"><img src="{{ asset('assets-UKK/img/logo-diglib-bulat-huruf-dark.png') }}"
                            alt="Logo-DigLib" class="logo-sidebar"></a>
                </div>
                <div class="sidebar-toggler  x">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title fw-bold">Dashbord</li>
                <li class="sidebar-item">
                    <a href="/" class='sidebar-link'>
                        <i class="bi bi-house-door-fill"></i>
                        <span>Kembali ke Beranda</span>
                    </a>
                </li>
                <li class="sidebar-item {{ $active == 'dashboard' ? 'active' : '' }}">
                    <a href="/dashboard-{{ auth()->user()->roles }}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-title fw-bold">Menu</li>
                <li class="sidebar-item {{ $active == 'users' ? 'active' : '' }}">
                    <a href="/users" class='sidebar-link'>
                        <i class="bi bi-person-fill"></i>
                        <span>Users</span>
                    </a>
                </li>

                <li class="sidebar-item {{ $active == 'kategori' ? 'active' : '' }}">
                    <a href="/kategori" class='sidebar-link'>
                        <i class="bi bi-tags-fill"></i>
                        <span>Kategori</span>
                    </a>
                </li>

                <li class="sidebar-item {{ $active == 'buku' ? 'active' : '' }}">
                    <a href="/buku" class='sidebar-link'>
                        <i class="bi bi-book-half"></i>
                        <span>Buku</span>
                    </a>
                </li>

                <li class="sidebar-item {{ $active == 'peminjaman' ? 'active' : '' }}">
                    <a href="/peminjaman" class='sidebar-link'>
                        <i class="bi bi-basket-fill"></i>
                        <span>Peminjaman</span>
                    </a>
                </li>

                @can('admin-petugas')
                    <li class="sidebar-item {{ $active == 'laporan' ? 'active' : '' }}">
                        <a href="/laporan" class='sidebar-link'>
                            <i class="bi bi-filetype-xlsx"></i>
                            <span>Laporan</span>
                        </a>
                    </li>
                @endcan

                <li class="sidebar-item {{ $active == 'koleksi' ? 'active' : '' }}">
                    <a href="/koleksi" class='sidebar-link'>
                        <i class="bi bi-bookmark-heart-fill"></i>
                        <span>Koleksi</span>
                    </a>
                </li>

                <li class="sidebar-title fw-bold">Pengaturan</li>
                <li class="sidebar-item {{ $active == 'profile' ? 'active' : '' }}">
                    <a href="/profile" class='sidebar-link'>
                        <i class="bi bi-person-fill-gear"></i>
                        <span>Profile</span>
                    </a>
                </li>
                <li class="sidebar-item {{ $active == 'change-password' ? 'active' : '' }}">
                    <a href="/change-password" class='sidebar-link'>
                        <i class="bi bi-key-fill"></i>
                        <span>Change Password</span>
                    </a>
                </li>
                <li class="sidebar-item cursor-pointer">
                    <form action="/logout" method="post" class="form-logout">
                        @csrf
                        <a href="#" class="sidebar-link text-danger btn-logout">
                            <i class="bi bi-door-open-fill text-danger btn-logout"></i>
                            <span class="btn-logout">Logout</span>
                        </a>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>
