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
<form class="form-horizontal" action="{{route('pencatatan.skema.store')}}" method="POST" enctype="multipart/form-data">
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
                <select class="select-search" name="pencatatan_id">
                    @foreach ($permohonan as $item)
                        <option value="{{$item->id}}">{{$item->permohonan}}</option>
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
              <label class="col-lg-3 control-label">Kode Skema</label>
              <div class="col-lg-9">
                <input type="text" class="form-control @error('kode_skema') is-invalid @enderror" name="kode_skema" required>
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
                        <option value="">Pilih Skema Sertifikasi</option>   
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
                    <optgroup label="JABATAN KERJA">
                        <option value="">Pilih Skema Sertifikasi</option>   
                      @foreach ($items as $jabker)
                        <option value="{{$jabker->jabatan_kerja}}">{{$jabker->jabatan_kerja}}</option>
                      @endforeach
                    </optgroup>
                </select>
              </div>
              @error('jabker')
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
                        <option value="Arsitektur">Arsitektur</option>
                        <option value="Sipil">Sipil</option>
                        <option value="Mekanikal">Mekanikal</option>
                        <option value="Tata Lingkungan">Tata Lingkungan</option>
                        <option value="Manajemen Pelaksanaan">Manajemen Pelaksanaan</option>
                        <option value="Arsitektur Lanskap, Iluminasi dan Desain Interior">Arsitektur Lanskap, Iluminasi dan Desain Interior</option>
                        <option value="Perencanaan Wilayah dan Kota">Perencanaan Wilayah dan Kota</option>
                        <option value="Sains dan Rekayasa Teknik">Sains dan Rekayasa Teknik</option>
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
              <label class="col-lg-3 control-label">Sub Kualifikasi</label>
              <div class="col-lg-9">
                <select class="select-search" name="sub_klasifikasi">
                    <optgroup label="ARSITEKTUR">
                        <option value="Arsitektural">Arsitektural</option>
                    </optgroup>
                    <optgroup label="SIPIL">
                        <option value="Gedung">Gedung</option>
                        <option value="Material">Material</option>
                        <option value="Jalan">Jalan</option>
                        <option value="Jembatan">Jembatan</option>
                        <option value="Landasan Udara">Landasan Udara</option>
                        <option value="Terowongan">Terowongan</option>
                        <option value="Bendung dan Bendungan">Bendung dan Bendungan</option>
                        <option value="Irigasi dan Rawa">Irigasi dan Rawa</option>
                        <option value="Sungai dan Pantai">Sungai dan Pantai</option>
                        <option value="Air Tanah dan Air Baku">Air Tanah dan Air Baku</option>
                        <option value="Bangunan Air  Minum">Bangunan Air  Minum</option>
                        <option value="Bangunan Air Limbah">Bangunan Air Limbah</option>
                        <option value="Bangunan Persampahan">Bangunan Persampahan</option>
                        <option value="Drainase Perkotaan">Drainase Perkotaan</option>
                        <option value="Geoteknik dan Pondasi">Geoteknik dan Pondasi</option>
                        <option value="Geodesi">Geodesi</option>
                        <option value="Jalan Rel">Jalan Rel</option>
                        <option value="Bangunan Menara">Bangunan Menara</option>
                        <option value="Bangunan Pelabuhan">Bangunan Pelabuhan</option>
                        <option value="Testing Analisis Teknik">Testing Analisis Teknik</option>
                        <option value="Bangunan Lepas Pantai">Bangunan Lepas Pantai</option>
                        <option value="Pembongkaran Bangunan">Pembongkaran Bangunan</option>
                        <option value="Grouting">Grouting</option>
                    </optgroup>
                    <optgroup label="MEKANIKAL">
                        <option value="Teknik Tata Udara dan Refrigasi">Teknik Tata Udara dan Refrigasi</option>
                        <option value="Plambing dan Pompa Mekanik">Plambing dan Pompa Mekanik</option>
                        <option value="Proteksi Kebakaran">Proteksi Kebakaran</option>
                        <option value="Transportasi Dalam Gedung">Transportasi Dalam Gedung</option>
                        <option value="Teknik Mekanikal">Teknik Mekanikal</option>
                        <option value="Alat Berat">Alat Berat</option>
                        <option value="Teknik Lifting">Teknik Lifting</option>
                    </optgroup>
                    <optgroup label="TATA LINGKUNGAN">
                      <option value="Teknik Air Minum">Teknik Air Minum</option>
                      <option value="Teknik Lingkungan">Teknik Lingkungan</option>
                      <option value="Teknik Air Limbah">Teknik Air Limbah</option>
                      <option value="Teknik Perpipaan">Teknik Perpipaan</option>
                      <option value="Teknik Persampahan">Teknik Persampahan</option>
                  </optgroup>
                  <optgroup label="MANAJEMEN PELAKSANAAN">
                      <option value="Keselamatan Konstruksi">Keselamatan Konstruksi</option>
                      <option value="Manajemen Konstruksi / Manajemen Proyek">Manajemen Konstruksi / Manajemen Proyek</option>
                      <option value="Hukum Kontrak Konstruksi">Hukum Kontrak Konstruksi</option>
                      <option value="Pengendalian Mutu Pekerjaan Konstruksi">Pengendalian Mutu Pekerjaan Konstruksi</option>
                      <option value="Estimasi Biaya Konstruksi">Estimasi Biaya Konstruksi</option>
                      <option value="Manajemen Aset Hasil Pekerjaan Konstruksi">Manajemen Aset Hasil Pekerjaan Konstruksi</option>
                  </optgroup>
                  <optgroup label="ARSITEKTUR LANSKAP, ILUMINASI DAN DESAIN INTERIOR">
                      <option value="Arsitektur Lanskap">Arsitektur Lanskap</option>
                      <option value="Teknik Iluminasi">Teknik Iluminasi</option>
                      <option value="Desain Interior">Desain Interior</option>
                  </optgroup>
                  <optgroup label="PERENCANAAN  WILAYAH DAN KOTA">
                      <option value="Perencanaan Wilayah">Perencanaan Wilayah</option>
                      <option value="Perencanaan Kota (Urban Planning)">Perencanaan Kota (Urban Planning)</option>
                      <option value="Perancangan Kota (Urban Design)">Perancangan Kota (Urban Design)</option>
                  </optgroup>
                  <optgroup label="SAINS DAN REKAYASA TEKNIK">
                      <option value="Investasi Infrastruktur">Investasi Infrastruktur</option>
                      <option value="Komputasi Konstruksi">Komputasi Konstruksi</option>
                      <option value="Peledakan">Peledakan</option>
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
                        <option value="Ahli">Ahli</option>
                        <option value="Teknisi/Analis">Teknisi/Analis</option>
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
                      <input type="number" class="form-control @error('jumlah_unit') is-invalid @enderror" name="jumlah_unit" min="0" required>
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
                    placeholder="SKKNI/SKK Khusus/Standar Internasional" required>
              </div>
              @error('acuan_skema')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
            </div>

            <div class="form-group">
              <label class="col-lg-3 control-label">Upload Acuan Skema</label>
                <div class="col-lg-9">
                    <input name="upload_persyaratan" type="file" class="file-input @error('upload_persyaratan') is-invalid @enderror"
                    data-show-caption="false" data-show-upload="false" data-browse-class="btn btn-primary btn-xs" data-remove-class="btn btn-default btn-xs" required>
                    <span class="help-block">
                      Accepted formats: pdf, zip, rar Max file size 50Mb
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
        <button type="submit" class="btn btn-primary">Submit<i class="icon-arrow-right14 position-right"></i></button>
      </div>
    
    </div>

  </div>
</form>

<div class="panel panel-flat">
  <div class="panel-heading">
    <h5 class="panel-title">Data Skema Sertifikasi LSP</h5>
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
        <th>Kode Skema</th>
        <th>Nama Skema</th>
        <th>Jabatan Kerja</th>
        <th>Klasifikasi</th>
        <th>Subklasifikasi</th>
        <th>Kualifikasi</th>
        <th>Jumlah Unit</th>
        <th>Acuan Skema</th>
        <th>Dokumen</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($skema as $skema)
      <tr>
        <td>#</td>
        <td>{{$skema->kode_skema}}</td>
        <td>{{$skema->nama_skema}}</td>
        <td>{{$skema->jabker}}</td>
        <td>{{$skema->klasifikasi}}</td>
        <td>{{$skema->sub_klasifikasi}}</td>
        <td>{{$skema->kualifikasi}}</td>
        <td>{{$skema->jumlah_unit}}</td>
        <td>{{$skema->acuan_skema}}</td>
        <td>
          <a href="{{asset('laravel/storage/app/public/'. $skema->upload_persyaratan)}}" target="_blank" type="button" name="btn_cek_13" 
              class="open-delete btn btn-primary btn-labeled btn-rounded">
              <b><i class="icon-file-check"></i></b> Softcopy</a>
            </td>
        <td class="text-center">
          <a href="{{route('pencatatan.skema.edit', $skema->id)}}" class="btn btn-sm btn-primary"><i class="icon-pencil"></i></a>
          <form action="{{route('pencatatan.skema.delete', $skema->id)}}" method="post" class="d-inline mt-2">
            @csrf
            @method('delete')
          <button class="btn btn-danger btn-sm mt-5"><i class="icon-trash"></i></button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection
