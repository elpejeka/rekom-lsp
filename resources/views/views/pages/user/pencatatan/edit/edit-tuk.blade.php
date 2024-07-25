@extends('layouts.app')
@section('page-header')
<div class="page-header page-header-default">
  <div class="page-header-content">
    <div class="page-title">
      <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Tempat Uji Kompetensi</h4>
    </div>
  </div>

  <div class="breadcrumb-line">
    <ul class="breadcrumb">
      <li><a href="{{route('home')}}"><i class="icon-home2 position-left"></i> Home</a></li>
      <li class="active"> Tempat Uji Kompetensi</li>
    </ul>
  </div>
</div>
@endsection
@section('content')
<form class="form-horizontal" action="{{route('pencatatan.tuk.update', $data->id)}}" method="POST" enctype="multipart/form-data">
    @method('PUT')
  @csrf
  <div class="panel panel-flat">
    <div class="panel-heading">
      <h5 class="panel-title">Tempat Uji Kompetensi</h5>
      <div class="heading-elements">
        <ul class="icons-list">
                  <li><a data-action="collapse"></a></li>
                </ul>
              </div>
    </div>

    <div class="panel-body">
      <div class="row">
        <div class="col-md-12">
          <legend class="text-semibold"><i class="icon-reading position-left"></i> TUK</legend>
        </div>
        <div class="col-md-6">
          <fieldset>

            <div class="form-group">
              <label class="col-lg-3 control-label">Jenis Permohonan</label>
              <div class="col-lg-9">
                <select class="select-search" name="pencatatan_id">
                    @foreach ($permohonan as $item)
                      @if ($loop->first)
                        <option value="{{$item->id}}">{{$item->permohonan}}</option>
                      @endif
                    @endforeach
                </select>
              </div>
              @error('pencatatan_id')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="form-group">
                <label class="col-lg-3 control-label">Kode TUK</label>
                <div class="col-lg-9">
                  <input name="kode_tuk" type="text" class="form-control @error('kode_tuk') is-invalid @enderror"  value="{{$data->kode_tuk}}" autofocus required>
                </div>
                @error('kode_tuk')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

            <div class="form-group">
              <label class="col-lg-3 control-label">Nama TUK</label>
              <div class="col-lg-9">
                <input name="nama_tuk" type="text" class="form-control @error('nama_tuk') is-invalid @enderror"  value="{{$data->nama_tuk}}" autofocus required>
              </div>
              @error('nama_tuk')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

          </fieldset>
        </div>

        <div class="col-md-6">
          <fieldset>

            <div class="form-group">
                <label class="col-lg-3 control-label">Jenis TUK</label>
                <div class="col-lg-9">
                  <select class="select-search" name="jenis_tuk">
                    <option value="{{$data->jenis_tuk}}">{{$data->jenis_tuk}}</option>
                    <option value="Sewaktu">Sewaktu</option>
                    <option value="Mandiri">Mandiri</option>
                    <option value="Tempat Kerja">Tempat Kerja</option>
                  </select>
                </div>
                @error('jenis_tuk')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

            <div class="form-group">
              <label class="col-lg-3 control-label">
                Alamat
              </label>
              <div class="col-lg-9">
                <input name="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror"  value="{{$data->alamat}}"  autofocus required>
              </div>
              @error('alamat')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="form-group">
              <label class="col-lg-3 control-label">Provinsi</label>
              <div class="col-lg-9">
                <select class="select-search" name="provinsi" id="provinsi">
                @foreach ($propinsi as $prov)
                <option value="{{$prov->id_propinsi_dagri}}" @if ($prov->id_propinsi_dagri == $data->provinsi)
                  selected
              @endif>{{$prov->Nama}}</option>
                @endforeach
                </select>
              </div>
              @error('provinsi')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="form-group">
              <label class="col-lg-3 control-label">Daftar Sarana dan Prasarana</label>
                <div class="col-lg-9">
                    <input name="upload_persyaratan" type="file" class="file-input @error('upload_persyaratan') is-invalid @enderror"
                    data-show-caption="false" data-show-upload="false" data-browse-class="btn btn-primary btn-xs" data-remove-class="btn btn-default btn-xs">
                    <span class="help-block">
                      Accepted formats: pdf, zip, rar  Max file size 50Mb
                    </span>
                    <div class="progress" style="display:none;">
                      <div id="progress-bar-1" class="progress-bar progress-bar-success progress-bar-striped active " role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
                        20%
                      </div>
                    </div>
                </div>
                
      
                @error('upload_persyaratan')
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