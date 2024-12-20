<div class="page-header">
    <div class="header-wrapper row m-0">
      <div class="header-logo-wrapper col-auto p-0">
        <div class="logo-wrapper"><a href="index.html"><img class="img-fluid" src="{{asset('pupr.png')}}" alt="" style="height: 40px;"></a></div>
        <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="align-center"></i></div>
      </div>
      {{-- <div class="left-header col-xxl-5 col-xl-6 col-lg-5 col-md-4 col-sm-3 p-0">
        <div class="notification-slider">
          <div class="d-flex h-100"> <img src="../assets/images/giftools.gif" alt="gif">
            <h6 class="mb-0 f-w-400"><span class="font-primary">Don't Miss Out! </span><span class="f-light">Out new update has been release.</span></h6><i class="icon-arrow-top-right f-light"></i>
          </div>
          <div class="d-flex h-100"><img src="../assets/images/giftools.gif" alt="gif">
            <h6 class="mb-0 f-w-400"><span class="f-light">Something you love is now on sale! </span></h6><a class="ms-1" href="https://1.envato.market/3GVzd" target="_blank">Buy now !</a>
          </div>
        </div>
      </div> --}}
      <div class="nav-right col-xxl-7 col-xl-6 col-md-7 col-8 pull-right right-header p-0 ms-auto">
        <ul class="nav-menus">
          <li class="onhover-dropdown">
            <div class="notification-box">
              <svg>
                <use href="{{asset('new/assets/svg/icon-sprite.svg#notification')}}"></use>
              </svg><span class="badge rounded-pill badge-secondary">{{count(auth()->user()->unreadNotifications)}}</span>
            </div>
            <div class="onhover-show-div notification-dropdown" style="max-height:500px; overflow:scroll;">
              <h6 class="f-18 mb-0 dropdown-title">Rekomendasi</h6>
              @if(Auth::user()->roles == 'admin')
              @foreach (auth()->user()->unreadNotifications as $notification)
              <ul>
                <li class="b-l-primary border-4">
                  <p>{{$notification->data['items']['nama']}}<span class="font-danger">{{$notification->created_at}}</span></p>
                  <p>{{$notification->data['message']}}</p>
                </li>
              </ul>
              @endforeach
              @elseif(Auth::user()->roles == 'user')
              @foreach (auth()->user()->unreadNotifications as $notification)
              <ul>
                <li class="b-l-primary border-4">
                  <p>{{$notification->data['message']}}<span class="font-danger">{{$notification->created_at}}</span></p>
                </li>
              </ul>
              @endforeach
              @endif
            </div>
          </li>
          
          @if(Auth::user()->roles == 'admin')
          <li class="onhover-dropdown">
            <div class="notification-box">
              <svg>
                <use href="{{asset('new/assets/svg/icon-sprite.svg#notification')}}"></use>
              </svg><span class="badge rounded-pill badge-secondary">{{count(App\LogPencatatan::whereNull('deleted_at')->orderBy('id', 'DESC')->get())}}</span>
            </div>
            <div class="onhover-show-div notification-dropdown" style="max-height:500px; overflow:scroll;">
              <h6 class="f-18 mb-0 dropdown-title">Pencatatan</h6>
              @foreach (App\LogPencatatan::whereNull('deleted_at')->orderBy('id', 'DESC')->get() as $item)
              <ul>
                <li class="b-l-primary border-4">
                  <p>{{$item->nama_lsp}}<span class="font-danger">{{$item->created_at}}</span></p>
                  <p>{{$item->keterangan}}</p>
                </li>
              </ul>
              @endforeach
            </div>
          </li>
          @endif
        
          <li class="profile-nav onhover-dropdown pe-0 py-0">
            <div class="media profile-media"><img class="b-r-10" src="{{asset('new/assets/images/dashboard/profile.png')}}" alt="">
              <div class="media-body"><span>{{Auth::user()->nama_lsp}}</span>
                <p class="mb-0">{{Auth::user()->roles}} <i class="middle fa fa-angle-down"></i></p>
              </div>
            </div>
            <ul class="profile-dropdown onhover-show-div">
              <li><a href="{{route('user.profile')}}"><i data-feather="user"></i><span>Account </span></a></li>
              <li>
                <form action="{{url('logout')}}" method="POST">
                  @csrf
                <i class="fas fa-power-off" data-feather="log-in"></i> 
                <button type="submit" class="btn">Logout</button>
                </form>
              </li>
            </ul>
          </li>
        </ul>
      </div>
      <script class="result-template" type="text/x-handlebars-template">
        <div class="ProfileCard u-cf">                        
        <div class="ProfileCard-avatar"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay m-0"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg></div>
        <div class="ProfileCard-details">
        <div class="ProfileCard-realName">name</div>
        </div>
        </div>
      </script>
      <script class="empty-template" type="text/x-handlebars-template"><div class="EmptyMessage">Your search turned up 0 results. This most likely means the backend is down, yikes!</div></script>
    </div>
  </div>