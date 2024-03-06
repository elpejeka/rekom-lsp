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
  <div class="row">
      <div class="col-sm-12 col-xl-12">
        <div class="card">
          <div class="card-header">
              <h4>{{$title}}</h4>
          </div>
          <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    @if($data->tgl_permohonan == null)
                    <a href="{{route('integrasi.edit')}}" class="btn btn-secondary">Edit</a>
                    <a href="{{route('integrasi.submit.final')}}" class="btn btn-success">Submit Permohonan</a>
                    @endif
                    <span class="badge badge-warning">Pengajuan Permohonan : {{$data->tgl_permohonan}}</span>
                </div>
            </div>
            <div class="row mt-3">
              <div class="col-md-6">
                  <div class="form-group">
                      <label class="control-label">Username SISFO BNSP</label>
                      <input type="text" class="form-control @error('username_bnsp') is-invalid @enderror" name="username_bnsp" value="{{$data->username_bnsp}}">
                      @error('username_bnsp')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label">Password SISFO BNSP</label>
                    <input type="text" class="form-control @error('password_bnsp') is-invalid @enderror" name="password_bnsp" value="{{$data->password_bnsp}}">
                    @error('password_bnsp')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">Nama Lengkap Ketua LSP</label>
                    <input type="text" class="form-control @error('nama_ketua') is-invalid @enderror" name="nama_ketua" value="{{$data->nama_ketua}}">
                    @error('nama_ketua')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">NIK Lengkap Ketua LSP</label>
                    <input type="text" class="form-control @error('nik_ketua') is-invalid @enderror" name="nik_ketua" value="{{$data->nik_ketua}}">
                    @error('nik_ketua')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">Email Lengkap Ketua LSP</label>
                    <input type="email" class="form-control @error('email_ketua') is-invalid @enderror" name="email_ketua" value="{{$data->email_ketua}}">
                    @error('email_ketua')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
              </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-12">
                    <a href="{{asset('laravel/storage/app/public/'. $data->surat_permohonan)}}" target="_blank" type="button" name="btn_cek_13" 
                        class="open-delete btn btn-primary btn-labeled btn-rounded">
                    <b><i class="icon-file-check"></i></b> Surat Permohonan</a>
                    <a href="{{asset('laravel/storage/app/public/'. $data->surat_permohonan)}}" target="_blank" type="button" name="btn_cek_13" 
                        class="open-delete btn btn-primary btn-labeled btn-rounded">
                    <b><i class="icon-file-check"></i></b> List Komite dan Admin LSP</a>
                    <a href="{{asset('laravel/storage/app/public/'. $data->surat_permohonan)}}" target="_blank" type="button" name="btn_cek_13" 
                        class="open-delete btn btn-primary btn-labeled btn-rounded">
                    <b><i class="icon-file-check"></i></b> Unit Kompetensi, Elemen Kompetensi, Kriteria Unjuk Kerja</a>
                </div>
            </div>
          </div>
      </div>
  </div>
</div>
@endsection
