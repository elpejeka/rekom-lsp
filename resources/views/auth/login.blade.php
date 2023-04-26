@extends('layouts.authentikasi')

@section('content')
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Content area -->
            <div class="content">

                <!-- Registration form -->
                <form action="{{route('login')}}" method="POST">
                    @csrf
                    <div class="panel panel-body login-form">
                        <div class="text-center">
                            <img src={{url('/public/assets/images/pupr.jpg')}} alt="logo_pupr" style="width: 120px"/>
                            <h5 class="content-group-lg">SISTEM INFORMASI REKOMENDASI LINSENSI LSP</h5>
                        </div>

                        <div class="form-group has-feedback has-feedback-left">
                            <input name="username" type="text" class="form-control @error('username') is-invalid @enderror" placeholder="Username" autofocus required>
                            <div class="form-control-feedback">
                                <i class="icon-user text-muted"></i>
                            </div>
                            @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group has-feedback has-feedback-left">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required>
                            <div class="form-control-feedback">
                                <i class="icon-lock2 text-muted"></i>
                            </div>
                            @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                                {!! NoCaptcha::display() !!}
                                {!! NoCaptcha::renderJs() !!}
                                @error('g-recaptcha-response')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn bg-blue btn-block">Login <i class="icon-circle-right2 position-right"></i></button>
                        </div>

                        <div class="content-divider text-muted form-group"><span>Tidak mempunyai akun silakan mendaftar</span></i></div>
							<a href="{{route('pendaftaran')}}" class="btn btn-default btn-block content-group">Daftar</a>
                            <a href="{{route('password.request')}}" class="mx-auto"> Lupa Password ? </a>
							<span class="help-block text-center no-margin">By continuing, you're confirming that you've read our <a href="#">Terms &amp; Conditions</a> and <a href="#">Cookie Policy</a></span>

                    </div>
                </form>
                <!-- /registration form -->
            


                <!-- Footer -->
                <div class="footer text-muted text-center">
                    &copy; 2021. <a href="#">Lembaga Pengembangan Jasa Konstruksi</a>
                </div>
                
                <!-- /footer -->

            </div>
            <!-- /content area -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</div>
@endsection
