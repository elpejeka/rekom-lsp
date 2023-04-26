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
<form class="form-horizontal" action="{{route('ext.store')}}" method="POST" enctype="multipart/form-data">
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
          <legend class="text-semibold"><i class="icon-reading position-left"></i> Detail Asesor</legend>
        </div>
        <div class="col-md-6">
          <fieldset>
            <input type="hidden" class="form-control @error('asesor_id') is-invalid @enderror" name="asesor_id" value="{{$asesor->id}}">
            <div class="form-group">
              <label class="col-lg-3 control-label">Nama Asesor</label>
              <div class="col-lg-9">
                <input type="text" class="form-control @error('nama_asesor') is-invalid @enderror" name="" value={{$asesor->nama_asesor}} readonly>
              </div>
              @error('nama_asesor')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
            </div>

          </fieldset>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <legend class="text-semibold"><i class="icon-reading position-left"></i>Form Input</legend>
        </div>

        <div class="col-md-6">
          <fieldset>

            <div class="form-group">
              <label class="col-lg-3 control-label">LSP Asal</label>
              <div class="col-lg-9">
                <input type="text" class="form-control @error('lsp_asal') is-invalid @enderror" name="lsp_asal" required>
              </div>
              @error('lsp_asal')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
            </div>

            <div class="form-group">
                <label class="col-lg-3 control-label">Dokumen Perjanjian / Perikatan</label>
                  <div class="col-lg-9">
                      <input name="upload_persyaratan" type="file" class="file-input @error('upload_persyaratan') is-invalid @enderror"
                      data-show-caption="false" data-show-upload="false" data-browse-class="btn btn-primary btn-xs" data-remove-class="btn btn-default btn-xs" required>
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
              <label class="col-lg-3 control-label">Tanggal Awal Perserikatan</label>
              <div class="col-lg-9">
                <input type="date" class="form-control @error('tgl_mulai') is-invalid @enderror" name="tgl_mulai" required>
              </div>
              @error('tgl_mulai')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
            </div>

            <div class="form-group">
                <label class="col-lg-3 control-label">Tanggal Akhir Perserikatan</label>
                <div class="col-lg-9">
                  <input type="date" class="form-control @error('tgl_akhir') is-invalid @enderror" name="tgl_akhir" required>
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

<div class="panel panel-flat">
  <div class="panel-heading">
    <h5 class="panel-title">Data Asesor</h5>
    <div class="heading-elements">
      <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
              </ul>
            </div>
  </div>

  <div class="panel-body">

  </div>

  <table class="table datatable-show-all">
    <thead>
      <tr>
        <th>No</th>
        <th>LSP Asal</th>
        <th>Tanggal Awal Peminjaman</th>
        <th>Tanggal Akhir Peminjaman</th>
        <th>Dokumen</th>
        <th class="text-center text-nowrap">Actions</th>
      </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
      @foreach ($data as $item)
      <tr>
        <td>{{$no++}}</td>
    
        <td>{{$item->lsp_asal}}</td>
        <td>{{$item->tgl_mulai}}</td>
        <td>{{$item->tgl_akhir}}</td>
        <td>
          <a href="{{asset('laravel/storage/app/public/'. $item->upload_persyaratan)}}" target="_blank" type="button" name="btn_cek_13"
              class="open-delete btn btn-primary btn-labeled btn-rounded">
              <b><i class="icon-file-check"></i></b> Softcopy</a>
        </td>
        <td class="text-center">
          <a href="{{route('ext.edit', $item->id)}}" class="btn btn-sm btn-primary"><i class="icon-pencil"></i></a>
          <form action="{{route('ext.delete', $item->id)}}" method="post" class="d-inline">
            @csrf
            @method('delete')
          <button class="btn btn-danger btn-sm mt-5"><i class="icon-trash"></i></button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
