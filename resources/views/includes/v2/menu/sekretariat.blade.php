<li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title" href="#">
        <svg class="stroke-icon">
            <use href="../assets/svg/icon-sprite.svg#stroke-widget"></use>
        </svg>
        <svg class="fill-icon">
            <use href="../assets/svg/icon-sprite.svg#fill-widget"></use>
        </svg><span>Rekomendasi Lisensi LSP</span></a>
    <ul class="sidebar-submenu">
        <li><a href="{{ route('list.verifikasi') }}">Kelengkapan Dokumen</a></li>
        <li><a href="{{ route('list.validasi') }}">Verifikasi dan Validasi</a></li>
        <li><a href="{{ route('permohonan.selesai') }}">Selesai</a></li>
        <li><a href="{{ route('permohonan.tolak') }}">Tolak</a></li>
    </ul>
</li>
<li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title" href="#">
        <svg class="stroke-icon">
            <use href="../assets/svg/icon-sprite.svg#stroke-layout"></use>
        </svg>
        <svg class="fill-icon">
            <use href="../assets/svg/icon-sprite.svg#fill-layout"></use>
        </svg><span>Pencatatan Lembaga Sertifikasi Profesi</span></a>
    <ul class="sidebar-submenu">
        <li><a href="{{ route('pencatatan.approve.list') }}">Permohonan</a></li>
        <li><a href="{{ route('pencatatan.list.selesai') }}">Selesai</a></li>
    </ul>
</li>
<li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title" href="#">
        <svg class="stroke-icon">
            <use href="../assets/svg/icon-sprite.svg#stroke-layout"></use>
        </svg>
        <svg class="fill-icon">
            <use href="../assets/svg/icon-sprite.svg#fill-layout"></use>
        </svg><span>Permohonan Aplikasi LPJK</span></a>
    <ul class="sidebar-submenu">
        <li><a href="{{ route('integrasi.list') }}">List Permohonan</a></li>
    </ul>
</li>
<li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title" href="#">
    <svg class="stroke-icon">
        <use href="../assets/svg/icon-sprite.svg#stroke-layout"></use>
    </svg>
    <svg class="fill-icon">
    </svg><span>Permohonan Pencatatan</span></a>
<ul class="sidebar-submenu">
    <li><a href="{{ route('record.tuk') }}">Tempat Uji Kompetensi</a></li>
    <li><a href="{{ route('record.skema') }}">Skema</a></li>
    <li><a href="{{ route('record.asesor') }}">Asesor</a></li>
</ul>
</li>
<li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title" href="#">
        <svg class="stroke-icon">
            <use href="../assets/svg/icon-sprite.svg#stroke-layout"></use>
        </svg>
        <svg class="fill-icon">
            <use href="../assets/svg/icon-sprite.svg#fill-layout"></use>
        </svg><span>Searching</span></a>
    <ul class="sidebar-submenu">
        <li><a href="{{ route('asesor.search') }}">Asesor</a></li>
    </ul>
</li>
