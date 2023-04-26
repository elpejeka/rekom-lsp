@extends('layouts.app')
@section('page-header')
<div class="page-header page-header-default">
  <div class="page-header-content">
    <div class="page-title">
      <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span>- Asesor Perikatan</h4>
    </div>
  </div>

  <div class="breadcrumb-line">
    <ul class="breadcrumb">
      <li><a href="{{route('home')}}"><i class="icon-home2 position-left"></i> Home</a></li>
      <li class="active">Dokumen Asesor Perikatan</li>
    </ul>
  </div>
</div>
@endsection

@section('content')
<form class="form-horizontal" action="{{route('ext.update', $item->id)}}" method="POST" enctype="multipart/form-data">
    @method('PUT')
  @csrf
  <div class="panel panel-flat">
    <div class="panel-heading">
      <h5 class="panel-title">Asesor</h5>
      <div class="heading-elements">
        <ul class="icons-list">
                  <li><a data-action="collapse"></a></li>
                </ul>
              </div>
    </div>

    <div class="panel-body">
      <div class="row">
        <div class="col-md-12">
          <legend class="text-semibold"><i class="icon-reading position-left"></i>Form Input</legend>
        </div>

        <div class="col-md-6">
          <fieldset>

            <div class="form-group">
              <label class="col-lg-3 control-label">LSP Asal</label>
              <div class="col-lg-9">
                <input type="text" class="form-control @error('lsp_asal') is-invalid @enderror" name="lsp_asal" value="{{$item->lsp_asal}}" required>
              </div>
              @error('lsp_asal')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
            </div>

            <div class="form-group">
                <label class="col-lg-3 control-label">Dokumen Perjanjian Peminjaman / Perikatan</label>
                  <div class="col-lg-9">
                      <input name="upload_persyaratan" type="file" class="file-input @error('upload_persyaratan') is-invalid @enderror"
                        data-show-caption="false" data-show-upload="false" data-browse-class="btn btn-primary btn-xs" data-remove-class="btn btn-default btn-xs">
                      <span class="help-block">
                        Accepted formats: pdf, zip, rar, jpeg, jpg, png Max file size 20Mb
                      </span>
                      <div class="progress" style="display:none;">
                        <div id="progress-bar-1" class="progress-bar progress-bar-success progress-bar-striped active " role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
                          20%
                        </div>
                      </div>
                  </div>


          </fieldset>
        </div>
        <div class="col-md-6">
          <fieldset>
            <div class="form-group">
              <label class="col-lg-3 control-label">Tanggal Awal Peminjaman</label>
              <div class="col-lg-9">
                <input type="date" class="form-control @error('tgl_mulai') is-invalid @enderror" name="tgl_mulai" value="{{$item->tgl_mulai}}" required>
              </div>
              @error('tgl_mulai')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
            </div>

            <div class="form-group">
                <label class="col-lg-3 control-label">Tanggal Akhir Peminjaman</label>
                <div class="col-lg-9">
                  <input type="date" class="form-control @error('tgl_akhir') is-invalid @enderror" name="tgl_akhir" value="{{$item->tgl_akhir}}" required>
                </div>
                @error('tgl_akhir')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
              </div>


          </fieldset>
        </div>
      </div>

      <div class="text-right">
        <button type="submit" class="btn btn-primary">Submit<i class="icon-arrow-right14 position-right"></i></button>
      </div>
    </div>

  </div>
</form>
@endsection
