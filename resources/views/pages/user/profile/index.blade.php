@extends('layouts.v2.app')

@section('breadcumb')
<div class="container-fluid">        
    <div class="page-title">
      <div class="row">
        <div class="col-6">
          <h4>{{$title}}</h4>
        </div>
        <div class="col-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">                                       
                <svg class="stroke-icon">
                  <use href="../assets/svg/icon-sprite.svg#stroke-home"></use>
                </svg></a></li>
            <li class="breadcrumb-item active">{{$title}}</li>
            <li class="breadcrumb-item"></li>
          </ol>
        </div>
      </div>
    </div>
</div>
@endsection

@section('content')
<div class="container-fluid">
    <div class="user-profile">
        <div class="row">
        <!-- user profile first-style start-->
            <div class="col-sm-12">
            <div class="card hovercard text-center">
                <div class="cardheader">
                    <img src="{{asset('new/assets/images/other-images/profile-style-img3.png')}}" alt="" width="1920" height="470">
                </div>
                <div class="user-image">
                <div class="avatar"><img alt="" src="{{asset('new/assets/images/other-images/profile-style-img3.png')}}"></div>
                <div class="icon-wrapper"><i class="icofont icofont-pencil-alt-5"></i></div>
                </div>
                <div class="info">
                <div class="row">
                    <div class="col-sm-6 col-lg-4 order-sm-1 order-xl-0">
                        <div class="row">
                            <div class="col-md-6">
                            <div class="ttl-info text-start">
                                <h6><i class="fa fa-envelope"></i>   Email</h6><span>{{Auth::user()->email}}</span>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="ttl-info text-start">
                                <h6><i class="fa fa-calendar"></i>Registered Since</h6><span>{{Auth::user()->created_at}}</span>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4 order-sm-2 order-xl-2">
                        <div class="row">
                            <div class="col-md-6">
                            <div class="ttl-info text-start">
                                <h6><i class="fa fa-phone"></i>LSP</h6><span>{{Auth::user()->nama_lsp}}</span>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="ttl-info text-start">
                                <h6><i class="fa fa-location-arrow"></i>Username</h6><span>{{Auth::user()->username}}</span>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4 order-sm-2 order-xl-2">
                        <div class="row">
                            <div class="col-md-6">
                            <div class="ttl-info text-start">
                                <h6><i class="fa fa-phone"></i>   Contact</h6><span>{{Auth::user()->no_kontak}}</span>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="ttl-info text-start">
                                <h6><i class="fa fa-location-arrow"></i>Alamat</h6><span>{{Auth::user()->alamat}}</span>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="social-media">
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a href="{{route('user.edit')}}" class="btn btn-sm btn-primary text-white">
                                Update Profile
                            </a>
                        </li>
                    </ul>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection