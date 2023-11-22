<aside class="aside is-placed-left is-expanded">
    <div class="aside-tools">
        <div>
            Sistem Arsip
        </div>
    </div>
    <div class="menu is-menu-main">
        <p class="menu-label">General</p>
        <ul class="menu-list">
            <li class="{{ (request()->is('dashboard')) ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}">
                    <span class="icon"><i class="mdi mdi-desktop-mac"></i></span>
                    <span class="menu-item-label">Dashboard</span>
                </a>
            </li>
        </ul>
        <p class="menu-label">Menu</p>
        <ul class="menu-list">
            @if (Auth::user()->level === 'admin' || Auth::user()->level === 'kepala sekolah')
            <li class="{{ (request()->is('pegawai*')) ? 'active' : '' }}">
                <a href="{{ route('pegawai.index') }}">
                    <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
                    <span class="menu-item-label">Pegawai</span>
                </a>
            </li>
            <li class="{{ (request()->is('guru*')) ? 'active' : '' }}">
                <a href="{{ route('guru.index') }}">
                    <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
                    <span class="menu-item-label">Guru</span>
                </a>
            </li>
            <li class="{{ (request()->is('tatausaha*')) ? 'active' : '' }}">
                <a href="{{ route('tatausaha.index') }}">
                    <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
                    <span class="menu-item-label">Tata Usaha</span>
                </a>
            </li>
            <li class="{{ (request()->is('kepalasekolah*')) ? 'active' : '' }}">
                <a href="{{ route('kepalasekolah.index') }}">
                    <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
                    <span class="menu-item-label">Kepala Sekolah</span>
                </a>
            </li>
            @endif

            @if(Auth::user()->level === 'guru' || Auth::user()->level === 'siswa' || Auth::user()->level === 'kepala sekolah')
            <li class="{{ (request()->is('siswa*')) ? 'active' : '' }}">
                <a href="{{ route('siswa.index') }}">
                    <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
                    <span class="menu-item-label">Siswa</span>
                </a>
            </li>
            @endif

            @if(Auth::user()->level === 'guru' || Auth::user()->level === 'admin' || Auth::user()->level === 'kepala sekolah')
            <li class="{{ (request()->is('kategori*')) ? 'active' : '' }}">
                <a href="{{ route('kategori.index') }}">
                    <span class="icon"><i class="mdi mdi-apps"></i></span>
                    <span class="menu-item-label">Kategori</span>
                </a>
            </li>
            @endif

            @if (Auth::user()->level === 'kepala sekolah' || Auth::user()->level === 'siswa' || Auth::user()->level === 'guru' || Auth::user()->level === 'pegawai' || Auth::user()->level === 'tata usaha' || Auth::user()->level === 'admin')
            <li class="{{ (request()->is('dokumen*')) ? 'active' : '' }}">
                <a href="{{ route('dokumen.index') }}">
                    <span class="icon"><i class="mdi mdi-file-document"></i></span>
                    <span class="menu-item-label">Dokumen</span>
                </a>
            </li>
            @endif
        </ul>
    </div>
</aside>