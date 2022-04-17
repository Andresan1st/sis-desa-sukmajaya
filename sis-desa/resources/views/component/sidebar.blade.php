<ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
    @if(auth()->user()->role=='admin' || auth()->user()->role=='kepala desa'|| auth()->user()->role=='wakil ketua')
        <li class=" nav-item"><a class="d-flex align-items-center" href="index.html"><i data-feather="home"></i><span class="menu-title text-truncate" data-i18n="Dashboards">Dashboards</span><span class="badge badge-light-warning badge-pill ml-auto mr-1">2</span></a>
            <ul class="menu-content">
                <li><a class="d-flex align-items-center" href="dashboard-analytics.html"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Analytics">Surat Masuk</span></a>
                </li>
                <li><a class="d-flex align-items-center" href="dashboard-ecommerce.html"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="eCommerce">Surat Keluar</span></a>
                </li>
            </ul>
        </li>         
        <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="copy"></i><span class="menu-title text-truncate" data-i18n="Form Elements">Modul Master</span></a>
            <ul class="menu-content">
                <li><a class="d-flex align-items-center" href="/mas_data_jabatan"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Input Groups">Data Jabatan</span></a>
                </li>
                <li><a class="d-flex align-items-center" href="/mas_data_organisasi"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Input Groups">Struktur Organisasi</span></a>
                </li>
                <li><a class="d-flex align-items-center" href="/mas_data_userrole"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Input Groups">User Role</span></a>
                </li>
                <li><a class="d-flex align-items-center" href="/mas_data_pegawai"><i data-feather="users"></i><span class="menu-item text-truncate" data-i18n="Input">Data Pegawai</span></a>
                </li>
                <li><a class="d-flex align-items-center" href="/mas_data_masyarakat"><i data-feather="user"></i><span class="menu-item text-truncate" data-i18n="Input Groups">Data Masyarakat</span></a>
                </li>
            
            </ul>
        </li>
        <li class="nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="copy"></i><span class="menu-title text-truncate" data-i18n="Form Elements">Modul Surat</span></a>
            <ul class="menu-content">
                <li class="{{ (request()->is('surat_masuk')) ? 'active' : '' }}" ><a class="d-flex align-items-center" href="{{route('page.surat_masuk')}}"><i data-feather="mail"></i><span class="menu-item text-truncate" data-i18n="Input">Surat Masuk</span></a>
                </li>
                <li><a class="d-flex align-items-center" href="#"><i data-feather="mail"></i><span class="menu-item text-truncate" data-i18n="Input Groups">Surat Keluar</span></a>
                </li>
            </ul>
        </li>
    @endif
    @if(auth()->user()->role=='sekertaris') 
        <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="copy"></i><span class="menu-title text-truncate" data-i18n="Form Elements">Modul Master</span></a>
            <ul class="menu-content">
                <li><a class="d-flex align-items-center" href="/mas_data_jabatan"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Input Groups">Data Jabatan</span></a>
                </li>
                <li><a class="d-flex align-items-center" href="/mas_data_pegawai"><i data-feather="users"></i><span class="menu-item text-truncate" data-i18n="Input">Data Pegawai</span></a>
                </li>
                <li><a class="d-flex align-items-center" href="/mas_data_masyarakat"><i data-feather="user"></i><span class="menu-item text-truncate" data-i18n="Input Groups">Data Masyarakat</span></a>
                </li>
            
            </ul>
        </li>
        <li class="nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="copy"></i><span class="menu-title text-truncate" data-i18n="Form Elements">Modul Surat</span></a>
            <ul class="menu-content">
                <li class="{{ (request()->is('surat_masuk')) ? 'active' : '' }}" ><a class="d-flex align-items-center" href="{{route('page.surat_masuk')}}"><i data-feather="mail"></i><span class="menu-item text-truncate" data-i18n="Input">Surat Masuk</span></a>
                </li>
                <li><a class="d-flex align-items-center" href="#"><i data-feather="mail"></i><span class="menu-item text-truncate" data-i18n="Input Groups">Surat Keluar</span></a>
                </li>
            </ul>
        </li>
    @endif
    @if(auth()->user()->role=='staff') 
    <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="copy"></i><span class="menu-title text-truncate" data-i18n="Form Elements">Modul Master</span></a>
        <ul class="menu-content">
            <li><a class="d-flex align-items-center" href="/mas_data_masyarakat"><i data-feather="user"></i><span class="menu-item text-truncate" data-i18n="Input Groups">Data Masyarakat</span></a>
            </li>
        
        </ul>
    </li>
    <li class="nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="copy"></i><span class="menu-title text-truncate" data-i18n="Form Elements">Modul Surat</span></a>
        <ul class="menu-content">
            <li class="{{ (request()->is('surat_masuk')) ? 'active' : '' }}" ><a class="d-flex align-items-center" href="{{route('page.surat_masuk')}}"><i data-feather="mail"></i><span class="menu-item text-truncate" data-i18n="Input">Surat Masuk</span></a>
            </li>
            <li><a class="d-flex align-items-center" href="#"><i data-feather="mail"></i><span class="menu-item text-truncate" data-i18n="Input Groups">Surat Keluar</span></a>
            </li>
        </ul>
    </li>
    @endif
</ul>