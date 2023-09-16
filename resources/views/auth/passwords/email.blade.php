@extends('layouts.auth')

@section('content')
<div class="col-12 p-0">    
    <div class="login-card login-dark">
      <div>
        {{-- <div><a class="logo" href="index.html"><img class="img-fluid for-light" src="../assets/images/logo/logo.png" alt="looginpage"><img class="img-fluid for-dark" src="../assets/images/logo/logo_dark.png" alt="looginpage"></a></div> --}}
        <div class="login-main"> 
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
          <form class="theme-form" action="{{ route('password.email') }}" method="POST">
            @csrf
            <h4>Form Reset Password </h4>
            <div class="form-group">
              <label class="col-form-label">E-Mail Address</label>
              <input class="form-control" type="text"  name="email" id="email" value="{{ old('email') }}" required>
              @error('email')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror
            </div>
            <div class="form-group mb-0">
              <div class="text-end mt-3">
                <button class="btn btn-primary btn-block w-100" type="submit">    
                    {{ __('Send Password Reset Link') }}
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>
@endsection
