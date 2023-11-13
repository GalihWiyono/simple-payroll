<nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
    <div class="container-fluid">
        <a href="#" class="navbar-brand d-flex align-items-center">
            <i class="fa-solid fa-building"></i>
            <strong class="ps-3">Payroll</strong>
        </a>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('pegawai') ? 'active' : '' }}" aria-current="page" href="/pegawai">Pegawai</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('gaji') ? 'active' : '' }}" aria-current="page" href="/gaji">Gaji</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('absensi') ? 'active' : '' }}" aria-current="page" href="/absensi">Absensi</a>
            </li>
        </ul>
    </div>
</nav>