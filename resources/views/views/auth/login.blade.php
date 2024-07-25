@extends('layouts.auth')

@section('content')
<div class="col-12 p-0">    
    <div class="login-card login-dark">
      <div>
        {{-- <div><a class="logo" href="index.html"><img class="img-fluid for-light" src="../assets/images/logo/logo.png" alt="looginpage"><img class="img-fluid for-dark" src="../assets/images/logo/logo_dark.png" alt="looginpage"></a></div> --}}
        <div class="login-main"> 
          <form class="theme-form" action="{{route('login')}}" method="POST">
            @csrf
            <h4>Sign in to account</h4>
            <p>Enter your username & password to login</p>
            <div class="form-group">
              <label class="col-form-label">Username</label>
              <input class="form-control" type="text"  name="username" placeholder="" required>
            </div>
            <div class="form-group">
              <label class="col-form-label">Password</label>
              <div class="form-input position-relative">
                <input class="form-control" type="password" name="password" placeholder="" required>
                <div class="show-hide"><span class="show">                         </span></div>
              </div>
            </div>
            <div class="form-group mb-0">
              {!! NoCaptcha::display() !!}
              {!! NoCaptcha::renderJs() !!}
              @error('g-recaptcha-response')
              <span class="text-danger" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
              @enderror
          </div>
            <div class="form-group mb-0">
              <div class="checkbox p-0">
                <input id="checkbox1" type="checkbox">
                <label class="text-muted" for="checkbox1">Remember password</label>
              </div><a class="link" href="{{route('password.request')}}">Lupa password?</a>
              <div class="text-end mt-3">
                <button class="btn btn-primary btn-block w-100" type="submit">Sign in</button>
              </div>
            </div>
           
            <h6 class="text-muted mt-4 or">Or</h6>
            <p class="mt-4 mb-0 text-center">Tidak Punya Akun?<a class="ms-2" href="{{route('pendaftaran')}}">Buat Akun</a></p>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
