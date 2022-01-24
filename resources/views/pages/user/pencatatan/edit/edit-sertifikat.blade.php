@extends('layouts.app')
@section('page-header')
<div class="page-header page-header-default">
  <div class="page-header-content">
    <div class="page-title">
      <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Asesor</h4>
    </div>
  </div>

  <div class="breadcrumb-line">
    <ul class="breadcrumb">
      <li><a href="{{route('home')}}"><i class="icon-home2 position-left"></i> Home</a></li>
      <li class="active">Detail Asesor</li>
    </ul>
  </div>
</div>
@endsection

@section('content')
<form class="form-horizontal" action="{{route('pencatatan.sertifikat.store')}}" method="POST" enctype="multipart/form-data">
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

            <div class="form-group">
                <label class="col-lg-3 control-label">Klasifikasi</label>
                <div class="col-lg-9">
                  <select class="select-search" name="klasifikasi">
                      <option value="{{$data->klasifikasi}}">-- {{$data->klasifikasi}}</option>
                      <optgroup label="KLASIFIKASI">
                        @foreach ($klasifikasi as $item)
                          <option value="{{$item->klasifikasi}}">{{$item->klasifikasi}}</option>
                        @endforeach
                      </optgroup>
                  </select>
                </div>
                @error('klasifikasi')
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
              <label class="col-lg-3 control-label">Subklasifikasi</label>
              <div class="col-lg-9">
                <select class="select-search" name="subklasifikasi">
                    <option value="{{$data->subklasifikasi}}">-- {{$data->subklasifikasi}}</option>
                    <optgroup label="SUBKLASIFIKASI">
                      @foreach ($klasifikasi as $item)
                        <option value="{{$item->sub_klasifikasi}}">{{$item->sub_klasifikasi}}</option>
                      @endforeach
                    </optgroup>
                </select>
              </div>
              @error('sub_klasifikasi')
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
          <legend class="text-semibold"><i class="icon-reading position-left"></i> SKA Asesor</legend>
        </div>

        <div class="col-md-6">
          <fieldset>

            <div class="form-group">
              <label class="col-lg-3 control-label">No Sertifikat</label>
              <div class="col-lg-9">
                <input type="text" class="form-control @error('no_sertifikat') is-invalid @enderror" name="no_sertifikat" value="{{$data->no_sertifikat}}" required>
              </div>
              @error('no_sertifikat')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
            </div>

            <div class="form-group">
              <label class="col-lg-3 control-label">NRKA</label>
              <div class="col-lg-9">
                <input type="text" class="form-control @error('nrka') is-invalid @enderror" name="nrka" value="{{$data->nrka}}" required>
              </div>
        
              @error('nrka')
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
              <label class="col-lg-3 control-label">Masa Berlaku</label>
              <div class="col-lg-9">
                <input type="date" class="form-control @error('masa_berlaku') is-invalid @enderror" name="masa_berlaku" value="{{$data->masa_berlaku}}" required>
              </div>
              @error('masa_berlaku')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
            </div>

            <div class="form-group">
              <label class="col-lg-3 control-label">Dokumen Persyaratan SKA</label>
                <div class="col-lg-9">
                    <input name="ska" type="file" class="file-input @error('ska') is-invalid @enderror"
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
      </div>

      <div class="row">
        <div class="col-md-12">
          <legend class="text-semibold"><i class="icon-reading position-left"></i> SERTIFIKAT ASESOR DARI
            LEMBAGA INDEPENDEN
            YANG MEMPUNYAI TUGAS
            MELAKUKAN SERTIFIKASI
            KOMPETENSI KERJA</legend>
        </div>

        <div class="col-md-6">
          <fieldset>

            <div class="form-group">
              <label class="col-lg-3 control-label">No Sertifikat</label>
              <div class="col-lg-9">
                <input type="text" class="form-control @error('no_sertifikat_asesor') is-invalid @enderror" name="no_sertifikat_asesor" value="{{$data->no_sertifikat_asesor}}" required>
              </div>
              @error('no_sertifikat_asesor')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
            </div>

            <div class="form-group">
              <label class="col-lg-3 control-label">No Blanko</label>
              <div class="col-lg-9">
                <input type="text" class="form-control @error('no_blanko') is-invalid @enderror" name="no_blanko" value="{{$data->no_blanko}}" required>
              </div>
              @error('no_blanko')
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
              <label class="col-lg-3 control-label">Masa Berlaku</label>
              <div class="col-lg-9">
                <input type="date" class="form-control @error('masa_berlaku_sertifikat') is-invalid @enderror" name="masa_berlaku_sertifikat" value="{{$data->masa_berlaku_sertifikat}}" required>
              </div>
              @error('masa_berlaku_sertifikat')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
            </div>

            <div class="form-group">
              <label class="col-lg-3 control-label">Dokumen Persyaratan Sertifikasi</label>
                <div class="col-lg-9">
                    <input name="sertifikat_asesors" type="file" class="file-input @error('sertifikat_asesors') is-invalid @enderror"
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
      </div>

      <div class="text-right">
        <button type="submit" class="btn btn-primary">Submit<i class="icon-arrow-right14 position-right"></i></button>
      </div>
    </div>

  </div>
</form>
@endsection