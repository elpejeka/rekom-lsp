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
<form class="form-horizontal" action="{{route('sertifikat.update', $item->id)}}" method="POST" enctype="multipart/form-data">
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
          <legend class="text-semibold"><i class="icon-reading position-left"></i> Detail Asesor</legend>
        </div>
        <div class="col-md-6">
          <fieldset>
            <input type="hidden" class="form-control @error('asesor_id') is-invalid @enderror" name="asesor_id" value="{{$item->id}}">
            <div class="form-group">
              {{-- <label class="col-lg-3 control-label">Nama Asesor</label> --}}
              <div class="col-lg-9">
                <input type="hidden" class="form-control @error('asessor_od') is-invalid @enderror" name="asesor_id" value="{{$item->asesor_id}}" readonly hidden>
              </div>
              @error('nama_asesor')
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
              <label class="col-lg-3 control-label">Klasifikasi</label>
              <div class="col-lg-9">
                <select class="select-search" name="klasifikasi">
                    <optgroup label="KLASIFIKASI">
                        <option value="{{$item->klasifikasi}}">-- {{$item->klasifikasi}}</option>
                      @foreach ($data as $klas)
                        <option value="{{$klas->klasifikasi}}">{{$klas->klasifikasi}}</option>
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

            <div class="form-group">
              <label class="col-lg-3 control-label">Subklasifikasi</label>
              <div class="col-lg-9">
                <select class="select-search" name="subklasifikasi">
                    <optgroup label="SUBKLASIFIKASI">
                        <option value="{{$item->subklasifikasi}}">{{$item->subklasifikasi}}</option>
                      @foreach ($data as $klas)
                        <option value="{{$klas->sub_klasifikasi}}">{{$klas->sub_klasifikasi}}</option>
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
              <label class="col-lg-3 control-label">NRKA</label>
              <div class="col-lg-9">
                <input type="text" class="form-control @error('nrka') is-invalid @enderror" name="nrka"  value="{{$item->nrka}}" required>
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
              <label class="col-lg-3 control-label">Kualifikasi</label>
              <div class="col-lg-9">
                <input type="text" class="form-control @error('kualifikasi') is-invalid @enderror" name="kualifikasi" value="{{$item->kualifikasi}}" required>
              </div>
              @error('kualifikasi')
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
                <input type="text" class="form-control @error('no_sertifikat_asesor') is-invalid @enderror" name="no_sertifikat_asesor" value="{{$item->no_sertifikat_asesor}}" required>
              </div>
              @error('no_sertifikat_asesor')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
            </div>

            <div class="form-group">
              <label class="col-lg-3 control-label">Subklasifikasi</label>
              <div class="col-lg-9">
                <input type="text" class="form-control @error('sub_klasifikasi_sertifikat') is-invalid @enderror" name="sub_klasifikasi_sertifikat" value="{{$item->sub_klasifikasi_sertifikat}}" required>
              </div>
              @error('sub_klasifikasi_sertifikat')
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
              <label class="col-lg-3 control-label">Kualifikasi</label>
              <div class="col-lg-9">
                <input type="text" class="form-control @error('kualifikasi_sertifikat') is-invalid @enderror" name="kualifikasi_sertifikat" value="{{$item->kualifikasi_sertifikat}}" required>
              </div>
              @error('kualifikasi_sertifikat')
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