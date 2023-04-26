@extends('layouts.app')

@section('content')
<div class="container text-center">
    <div class="row justify-content-center">
        <img src={{url('/public/assets/images/email.png')}} alt="logo_pupr" style="width:540px"/>

        <div class="col-md-12">
            <div class="card">
                <br/>
                <div class="card-header">{{ __('Harap menunggu untuk verifikasi akun') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{-- {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }}, --}}
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('klik untuk meminta email akun verifikasi') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
