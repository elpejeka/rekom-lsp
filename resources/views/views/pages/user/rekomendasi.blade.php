@extends('layouts.app')
@section('page-header')
<div class="page-header page-header-default">
  <div class="page-header-content">
    <div class="page-title">
      <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span>- Surat Rekomendasi Lisensi</h4>
    </div>
  </div>

  <div class="breadcrumb-line">
    <ul class="breadcrumb">
      <li><a href="{{route('home')}}"><i class="icon-home2 position-left"></i> Home</a></li>
      <li class="active"> Surat Rekomendasi Lisensi</li>
    </ul>
  </div>
</div>
@endsection
@section('content')
<form class="form-horizontal" action="{{route('rekomendasi.store')}}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="panel panel-flat">
    <div class="panel-heading">
      <h5 class="panel-title">Surat Rekomendasi Lisensi</h5>
      <div class="heading-elements">
        <ul class="icons-list">
                  <li><a data-action="collapse"></a></li>
                </ul>
              </div>
    </div>

    <div class="panel-body">
      <div class="row">
        <div class="col-md-12">
          <legend class="text-semibold"><i class="icon-reading position-left"></i>Surat Rekomendasi Lisensi</legend>
        </div>

        <div class="col-md-12">
            <input type="text" name="permohonans_id" value="{{$permohonan->id}}" hidden>
            <input type="text" name="users_id" value="{{$permohonan->users_id}}" hidden>
            <input type="text" name="id_izin" value="{{$permohonan->id_izin}}" hidden/>
          <fieldset>
            
            <div class="form-group">
                <label class="col-lg-2 control-label text-semibold">Surat Rekomendasi Lisensi</label>
                <div class="col-lg-10">
                    <input type="file" class="file-input @error('surat_rekomendasi') is-invalid @enderror" name="surat_rekomendasi" required>
                    <span class="help-block">Accepted formats: pdf, zip, rar, jpeg, jpg, png Max file size 20Mb</span>
                </div>

                @error('surat_rekomendasi')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            
          </fieldset>
        </div>
      </div>

      <div class="text-right">
        <button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
      </div>
    </div>

  </div>
</form>
@endsection