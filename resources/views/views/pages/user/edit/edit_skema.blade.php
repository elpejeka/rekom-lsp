@extends('layouts.app')
@section('page-header')
<div class="page-header page-header-default">
  <div class="page-header-content">
    <div class="page-title">
      <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Ruang Lingkup LSP</h4>
    </div>
  </div>

  <div class="breadcrumb-line">
    <ul class="breadcrumb">
      <li><a href="{{route('home')}}"><i class="icon-home2 position-left"></i> Home</a></li>
      <li class="active">Ruang Lingkup LSP</li>
    </ul>
  </div>
</div>
@endsection
@section('content')
<form class="form-horizontal" action="{{route('update.skema', $data->id)}}" method="POST" enctype="multipart/form-data">
    @method('PUT')
  @csrf
  <div class="panel panel-flat">
    <div class="panel-heading">
      <h5 class="panel-title">Ruang Lingkup LSP</h5>
      <div class="heading-elements">
        <ul class="icons-list">
                  <li><a data-action="collapse"></a></li>
                </ul>
              </div>
    </div>

    <div class="panel-body">
      <div class="row">
        <div class="col-md-12">
          <legend class="text-semibold"><i class="icon-reading position-left"></i> Ruang Lingkup LSP</legend>
        </div>
        <div class="col-md-6">
          <fieldset>

            <div class="form-group">
              <label class="col-lg-3 control-label">Jenis Permohonan</label>
              <div class="col-lg-9">
                <select class="select-search" name="permohonans_id">
                    <optgroup label="KLASIFIKASI">
                      <option value="{{$data->permohonans_id}}">-</option>
                      @foreach ($permohonan as $pmhn)
                        <option value="{{$pmhn->id}}">{{$pmhn->jenis_permohonan}}</option>
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
              <label class="col-lg-3 control-label">Kode Skema</label>
              <div class="col-lg-9">
                <input type="text" class="form-control @error('kode_skema') is-invalid @enderror" name="kode_skema" 
                value="{{$data->kode_skema}}" required>
              </div>
              @error('kode_skema')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
            </div>

            <div class="form-group">
              <label class="col-lg-3 control-label">Nama Skema</label>
              <div class="col-lg-9">
                <select class="select-search" name="nama_skema">
                    <optgroup label="RUANG LINGKUP">
                        <option value="{{$data->nama_skema}}">{{$data->nama_skema}}</option>   
                      @foreach ($items as $jabker)
                        <option value="{{$jabker->jabatan_kerja}}">{{$jabker->jabatan_kerja}}</option>
                      @endforeach
                    </optgroup>
                </select>
              </div>
              @error('nama_skema')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
            </div>

            <div class="form-group">
              <label class="col-lg-3 control-label">Jabatan Kerja</label>
              <div class="col-lg-9">
                <select class="select-search" name="jabker">
                    <optgroup label="RUANG LINGKUP">
                        <option value="">Pilih Jabatan Kerja</option>   
                      @foreach ($items as $jabker)
                        <option value="{{$jabker->jabatan_kerja}}">{{$jabker->jabatan_kerja}}</option>
                      @endforeach
                    </optgroup>
                </select>
              </div>
              @error('nama_skema')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
            </div>

            <div class="form-group">
              <label class="col-lg-3 control-label">Klasifikasi</label>
              <div class="col-lg-9">
                <select class="select-search" name="klasifikasi">
                    <optgroup label="KLASIFIKASI">
                        <option value="{{$data->klasifikasi}}">-- {{$data->klasifikasi}}</option>
                      @foreach ($subklas as $item)
                        <option value="{{$item->klas->nama}}">{{$item->klas->nama}}</option>
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
              <label class="col-lg-3 control-label">Dokumen Skema Sertifikasi</label>
                <div class="col-lg-9">
                    <input name="standar_kompetensi" type="file" class="file-input @error('standar_kompetensi') is-invalid @enderror"
                    data-show-caption="false" data-show-upload="false" data-browse-class="btn btn-primary btn-xs" data-remove-class="btn btn-default btn-xs">
                    <span class="help-block">
                      Accepted formats: pdf, zip, rar Max file size 50Mb
                    </span>
                    <div class="progress" style="display:none;">
                      <div id="progress-bar-1" class="progress-bar progress-bar-success progress-bar-striped active " role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
                        20%
                      </div>
                    </div>
                </div>

                @error('upload_permohonan')
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
                <select class="select-search" name="sub_klasifikasi">
                    <optgroup label="SUBKLASIFIKASI">
                        <option value="{{$data->sub_klasifikasi}}">-- {{$data->sub_klasifikasi}}</option>
                      @foreach ($subklas as $item)
                        <option value="{{$item->subklas->nama}}">{{$item->subklas->nama}}</option>
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

            <div class="form-group">
              <label class="col-lg-3 control-label">Kualifikasi</label>
              <div class="col-lg-9">
                <select class="select-search" name="kualifikasi">
                    <optgroup label="KUALIFIKASI">
                        <option value="{{$data->kualifikasi}}">-- {{$data->kualifikasi}}</option>
                        <option value="Ahli">Ahli</option>
                        <option value="Teknisi">Teknisi/Analis</option>
                        <option value="Operator">Operator</option>
                    </optgroup>
                </select>
              </div>
              @error('kualifikasi')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
            </div>

          <div class="form-group">
              <label class="col-lg-3 control-label">Jumlah Unit Kompetensi</label>
                  <div class="col-lg-9">
                      <input type="number" class="form-control @error('jumlah_unit') is-invalid @enderror" name="jumlah_unit" min="0" 
                      value="{{$data->jumlah_unit}}" required>
                  </div>
                  @error('jumlah_unit')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
          </div>

          <div class="form-group">
            <label class="col-lg-3 control-label">Acuan Skema</label>
              <div class="col-lg-9">
                  <input class="form-control @error('acuan_skema') is-invalid @enderror"  name="acuan_skema" type="text" 
                    placeholder="SKKNI/SKK Khusus/Standar Internasional" value="{{$data->acuan_skema}}" required>
              </div>
              @error('acuan_skema')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
            </div>

            <div class="form-group">
              <label class="col-lg-3">Dokumen standar kompetensi
                kerja yang diacu (SKKNI/ SKK
                Khusus/ Standar
                Internasional)</label>
                <div class="col-lg-9">
                    <input name="upload_persyaratan" type="file" class="file-input @error('upload_persyaratan') is-invalid @enderror"
                    data-show-caption="false" data-show-upload="false" data-browse-class="btn btn-primary btn-xs" data-remove-class="btn btn-default btn-xs">
                    <span class="help-block">
                      Accepted formats: pdf, zip, rar Max file size 50Mb
                    </span>
                    <div class="progress" style="display:none;">
                      <div id="progress-bar-1" class="progress-bar progress-bar-success progress-bar-striped active " role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
                        20%
                      </div>
                    </div>
                </div>
                
  
                @error('upload_permohonan')
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
