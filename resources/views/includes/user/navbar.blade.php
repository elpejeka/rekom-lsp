<div class="navbar navbar-inverse" id="navbar-main">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{route('home')}}">LPJK</a>

        <ul class="nav navbar-nav pull-right visible-xs-block">
            <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
            <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
        </ul>
    </div>

    <div class="navbar-collapse collapse" id="navbar-mobile">

        <p class="navbar-text">
            <span class="label bg-success">Online</span>
        </p>

        <div class="navbar-right">
            <ul class="nav navbar-nav">
                @if(Auth::user()->roles == 'admin')
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="icon-bubbles4"></i>
                        <span class="visible-xs-inline-block position-right">Messages</span>
                        <span class="badge bg-warning-400">{{count(auth()->user()->unreadNotifications)}}</span>
                    </a>
                    
                    <div class="dropdown-menu dropdown-content width-350">
                        <div class="dropdown-content-heading">
                            Messages
                            <ul class="icons-list">
                                <li><a href="#"><i class="icon-compose"></i></a></li>
                            </ul>
                        </div>

                        <ul class="media-list dropdown-content-body">
                            @foreach (auth()->user()->unreadNotifications as $notification)

                            <li class="media">
                                <div class="media-left">
                                    <img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt="">
                                    <span class="badge bg-danger-400 media-badge">5</span>
                                </div>

                                <div class="media-body">
                                    <a href="#" class="media-heading">
                                        <span class="text-semibold">{{$notification->data['items']['nama']}}</span>
                                        <span class="media-annotation pull-right">{{$notification->data['items']['updated_at']}}</span>
                                    </a>

                                    <span class="text-muted">{{$notification->data['message']}}</span>
                                </div>
                            </li>    
                            @endforeach
                            

                         
                        </ul>

                        <div class="dropdown-content-footer">
                            <a href="#" data-popup="tooltip" title="All messages"><i class="icon-menu display-block"></i></a>
                        </div>
                    </div>
                </li>
                @elseif(Auth::user()->roles == 'user')
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="icon-bubbles4"></i>
                        <span class="visible-xs-inline-block position-right">Messages</span>
                        <span class="badge bg-warning-400">{{count(auth()->user()->unreadNotifications)}}</span>
                    </a>
                    
                    <div class="dropdown-menu dropdown-content width-350">
                        <div class="dropdown-content-heading">
                            Messages
                            <ul class="icons-list">
                                <li><a href="#"><i class="icon-compose"></i></a></li>
                            </ul>
                        </div>

                        <ul class="media-list dropdown-content-body">
                            @foreach (auth()->user()->unreadNotifications as $notification)

                            <li class="media">
                                <div class="media-left">
                                    <img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt="">
                                    <span class="badge bg-danger-400 media-badge">5</span>
                                </div>

                                <div class="media-body">
                                    <a href="#" class="media-heading">
                                        <span class="text-semibold"></span>
                                        <span class="media-annotation pull-right">{{$notification->created_at}}</span>
                                    </a>

                                    <span class="text-muted">{{$notification->data['message']}}</span>
                                </div>
                            </li>    
                            @endforeach
                            

                         
                        </ul>

                        <div class="dropdown-content-footer">
                            <a href="#" data-popup="tooltip" title="All messages"><i class="icon-menu display-block"></i></a>
                        </div>
                    </div>
                </li>
                @else
                @endif

                <li class="dropdown dropdown-user">
                    <a class="dropdown-toggle" data-toggle="dropdown">
                        <span>
                            {{ Auth::user()->username}}
                        </span>
                        <i class="caret"></i>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-right">
                        {{-- <li><a href="#"><i class="icon-user-plus"></i> My profile</a></li>
                        <li><a href="#"><i class="icon-cog5"></i> Account settings</a></li> --}}
                        <li>
                        <form class="form-inline text-center" action="{{  url('logout') }}" method="POST">
                            @csrf
                            <button class="icon-switch2 btn btn-block" type="submit">
                                Logout
                            </button>
                        </form>
                    </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>

<!-- Second navbar -->
<div class="navbar navbar-default navbar-xs" id="navbar-second">
    <ul class="nav navbar-nav no-border visible-xs-block">
        <li><a class="text-center collapsed" data-toggle="collapse" data-target="#navbar-second-toggle"><i class="icon-circle-down2"></i></a></li>
    </ul>

    <div class="navbar-collapse collapse" id="navbar-second-toggle">
        <ul class="nav navbar-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-office position-left"></i>
                    <span class="position-left">Rekomendasi Lisensi LSP</span>
                    <span class="caret"></span>
                </a>
                
                <ul class="dropdown-menu dropdown-menu-right">
                    @if(Auth::user()->roles == 'user')
                    <li><a href="{{route('informasi')}}"><i class="icon-pen-plus position-left"></i> Administrasi</a></li>
                    <li><a href="{{route('struktur_organisasi')}}"><i class="icon-users"></i> Data Pengurus</a></li>
                    <li><a href="{{route('kualifikasi')}}"><i class="icon-bookmarks"></i> Klasifikasi dan Subklasifikasi</a></li>
                    <li><a href="{{route('sertifikasi-lsp')}}"><i class="icon-bookmarks"></i> Skema Sertifikasi LSP</a></li>
                    <li><a href="{{route('asesor')}}"><i class="icon-user"></i> Asesor</a></li>
                    <li><a href="{{route('tuk')}}"><i class="icon-map5"></i> Tempat Uji Kompetensi</a></li>
                    <li><a href="{{route('permohonan')}}"><i class="icon-file-pdf"></i> Permohonan</a></li>
                    <li><a href="{{route('perpanjangan')}}"><i class="icon-file-pdf"></i> Dokumen Tambahan Perpanjangan</a></li>
                    <li><a href="{{route('penambahan')}}"><i class="icon-file-pdf"></i> Dokumen Penambahan Ruang Lingkup</a></li>
                    @elseif(Auth::user()->roles == 'admin')
                    <li><a href="{{route('list.verifikasi')}}"><i class="icon-pen-plus position-left"></i> Kelengkapan Dokumen</a></li>
                    <li><a href="{{route('list.validasi')}}"><i class="icon-pen-plus position-left"></i> Verifikasi dan Validasi</a></li>
                    {{-- <li><a href="{{route('struktur_organisasi')}}"><i class="icon-users"></i> Data Pengurus</a></li> --}}
                    @else
                    <li><a href="{{route('progres')}}"><i class="icon-pen-plus position-left"></i>Progres Permohonan</a></li>
                    @endif
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-office position-left"></i>
                    <span class="position-left">Pencatatan Lembaga Sertifikasi Profesi</span>
                    <span class="caret"></span>
                </a>
                
                <ul class="dropdown-menu dropdown-menu-right">
                    @if(Auth::user()->roles == 'user')
                    <li><a href="{{route('permohonan.pencatatan')}}"><i class="icon-pen-plus position-left"></i> Permohonan Pencatatan</a></li>
                    <li><a href="{{route('pencatatan.skema')}}"><i class="icon-users"></i> Skema Sertifikasi LSP</a></li>
                    <li><a href="{{route('pencatatan.asesor')}}"><i class="icon-bookmarks"></i> Asesor</a></li>
                    <li><a href="{{route('pencatatan.tuk')}}"><i class="icon-bookmarks"></i> Tempat Uji Kompetensi</a></li>
                    <li><a href="{{route('pencatatan.preview')}}"><i class="icon-bookmarks"></i> Submit Pencatatan</a></li>
                    @elseif(Auth::user()->roles == 'admin')
                    <li><a href="{{route('list.validasi')}}"><i class="icon-pen-plus position-left"></i> Pencatatan</a></li>
                    @else
                    <li><a href="{{route('progres')}}"><i class="icon-pen-plus position-left"></i>Progres Permohonan</a></li>
                    @endif
                </ul>
            </li>
        </ul>
    </div>
</div>



<!-- /second navbar -->