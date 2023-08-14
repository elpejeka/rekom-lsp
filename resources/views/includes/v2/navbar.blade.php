<div id="sidebar-menu">
  <ul class="sidebar-links" id="simple-bar">
    <li class="back-btn"><a href="index.html"><img class="img-fluid" src="new/assets/images/logo/logo-icon.png" alt=""></a>
      <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
    </li>
    <li class="pin-title sidebar-main-title">
      <div> 
        <h6>Pinned</h6>
      </div>
    </li>
    <li class="sidebar-main-title">
      <div>
        <h6 class="lan-1">General</h6>
      </div>
    </li>
    <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="file-manager.html">
      <svg class="stroke-icon">
        <use href="../assets/svg/icon-sprite.svg#stroke-file"></use>
      </svg>
      <svg class="fill-icon">
        <use href="../assets/svg/icon-sprite.svg#fill-file"></use>
      </svg><span>Dashboard</span></a>
    </li>
   @if(Auth::user()->roles == 'admin')
       @include('includes.v2.menu.sekretariat')
    @elseif (Auth::user()->roles == 'user')
    @include('includes.v2.menu.user')
    @else
    @include('includes.v2.menu.pengurus')
   @endif
  </ul>
</div>