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
                <form class="form-horizontal" action="{{route('sertifikat.update', $item->id)}}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                <div class="row mt-5">
                    <div class="col-md-12">
                        <legend class="text-semibold text-sm"><i class="icon-reading position-left"></i>Sertifikat Kompetensi Asesor</legend>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Nomor Registrasi Sertifikat</label>
                            <input type="text" class="form-control @error('nrka') is-invalid @enderror" name="nrka" value="{{$item->nrka}}" required>
                        </div>
                        @error('nrka')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Tanggal Berakhir Sertifikat</label>
                            <input type="date" class="form-control @error('tgl_akhir_sertifikat_kompetensi') is-invalid @enderror" name="tgl_akhir_sertifikat_kompetensi"
                            value="{{$item->tgl_akhir_sertifikat_kompetensi}}" required>
                            @error('tgl_akhir_sertifikat_kompetensi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Kualifikasi</label>
                            <select class="form-control" name="kualifikasi">
                                <option value="ahli" @if($item->kualifikasi == 'ahli') selected @endif>Ahli</option>
                                <option value="teknisi/analis" @if($item->kualifikasi == 'teknisi/analis') selected @endif>Teknisi/Analis</option>
                                <option value="operator" @if($item->kualifikasi == 'operator') selected @endif>Operator</option>
                            </select>
                               @error('kualifikasi')
                               <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                               </span>
                             @enderror
                        </div>      
                    </div>    
                    <div class="col-md-6 mt-4">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="control-label">
                                        Sertifikat Kompetensi Konstruksi
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <input name="ska" type="file" class="form-control @error('ska') is-invalid @enderror"
                                    data-show-caption="false" data-show-upload="false" data-browse-class="btn btn-primary btn-xs" data-remove-class="btn btn-default btn-xs">
                                    <span class="help-block">
                                      Accepted formats: pdf, zip, rar, jpeg, jpg, png Max file size 20Mb
                                    </span>
                                    <div class="progress" style="display:none;">
                                      <div id="progress-bar-1" class="progress-bar progress-bar-success progress-bar-striped active " role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
                                        20%
                                      </div>
                                    </div>
                                    @error('ska')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>    
                </div>
                <div class="row mt-5">
                    <div class="col-md-12">
                        <h5>SERTIFIKAT ASESOR BNSP</h5>
                    </div>
                    <div class="col-md-6 mt-2">
                        <div class="form-group">
                            <label class="control-label">Nomor Registrasi Sertifikat</label>
                            <input type="text" class="form-control @error('no_sertifikat_asesor') is-invalid @enderror" name="no_sertifikat_asesor" value="{{$item->no_sertifikat_asesor}}" required>
                        </div>
                        @error('no_sertifikat_asesor')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>    
                    <div class="col-md-6">
                        <div class="form-group mt-2">
                            <label class="control-label">Subklasifikasi</label>
                            <input type="text" class="form-control @error('sub_klasifikasi_sertifikat') is-invalid @enderror" name="sub_klasifikasi_sertifikat" value="{{$item->sub_klasifikasi_sertifikat}}" required>
                            @error('sub_klasifikasi_sertifikat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Tanggal Berakhir Sertifikat</label>
                            <input type="date" class="form-control @error('tgl_akhir_sertifikat_asesor') is-invalid @enderror" name="tgl_akhir_sertifikat_asesor" 
                            value="{{$item->tgl_akhir_sertifikat_asesor}}" required>
                        </div>
                        @error('tgl_akhir_sertifikat_asesor')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Kualifikasi</label>
                            <input type="text" class="form-control @error('kualifikasi_sertifikat') is-invalid @enderror" name="kualifikasi_sertifikat"
                            value="{{$item->kualifikasi_sertifikat}}" required>
                        </div>
                        @error('kualifikasi_sertifikat')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>    
                </div>
                <div class="row mt-4">
                    <div class="form-group">
                            <div class="col-md-12">
                                <label class="control-label">
                                    Sertifikasi Asesor
                                </label>
                                <input name="sertifikat_asesors" type="file" class="form-control @error('sertifikat_asesors') is-invalid @enderror"
                                data-show-caption="false" data-show-upload="false" data-browse-class="btn btn-primary btn-xs" data-remove-class="btn btn-default btn-xs">
                                <span class="help-block">
                                  Accepted formats: pdf, zip, rar, jpeg, jpg, png Max file size 20Mb
                                </span>
                                <div class="progress" style="display:none;">
                                  <div id="progress-bar-1" class="progress-bar progress-bar-success progress-bar-striped active " role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
                                    20%
                                  </div>
                                </div>
                                @error('sertifikat_asesors')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
                    </div>
                </div>
                </form>    
            </div>
      </div>
  </div>
</div>
@endsection