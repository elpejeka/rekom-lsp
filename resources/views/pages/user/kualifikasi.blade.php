@extends('layouts.app')
@section('page-header')
<div class="page-header page-header-default">
  <div class="page-header-content">
    <div class="page-title">
      <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Klasifikasi dan Subklasifikasi</h4>
    </div>
  </div>

  <div class="breadcrumb-line">
    <ul class="breadcrumb">
      <li><a href="{{route('home')}}"><i class="icon-home2 position-left"></i> Home</a></li>
      <li class="active">Klasifikasi dan Subklasifikasi</li>
    </ul>
  </div>
</div>
@endsection
@section('content')
<form class="form-horizontal" action="{{route('kualifikasi_store')}}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="panel panel-flat">
    <div class="panel-heading">
      <h5 class="panel-title">Klasifikasi dan Subklasifikasi</h5>
      <div class="heading-elements">
        <ul class="icons-list">
                  <li><a data-action="collapse"></a></li>
                </ul>
              </div>
    </div>

    <div class="panel-body">
      <div class="row">
        <div class="col-md-12">
          <legend class="text-semibold"><i class="icon-reading position-left"></i> Informasi Umum</legend>
        </div>
        <div class="col-md-6">
          <fieldset>

            <div class="form-group">
              <label class="col-lg-3 control-label">Klasifikasi</label>
              <div class="col-lg-9">
                <select class="select-search" name="klasifikasi">
                    <optgroup label="KLASIFIKASI">
                        <option value="Arsitektur">Arsitektur</option>
                        <option value="Sipil">Sipil</option>
                        <option value="Mekanikal">Mekanikal</option>
                        <option value="Tata Lingkungan">Tata Lingkungan</option>
                        <option value="Manajemen Pelaksana">Manajemen Pelaksana</option>
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
                    <optgroup label="MANAJEMEN PELAKSANA">
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
                @error('nama')
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

<div class="panel panel-flat">
  <div class="panel-heading">
    <h5 class="panel-title">Data Kualifikasi</h5>
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
          <th colspan="2">Kualifikasi</th>
          <th colspan="2">Sub Kualifikasi</th>
          <th class="text-center">Actions</th>
        </tr>
      </thead>
      <tbody>   
          @foreach ($data as $item)
        <tr>
          <td>#</td>
          <td colspan="">{{$item->klasifikasi}}</td>
          <td></td>
          <td>{{$item->sub_klasifikasi}}</td>
          <td></td>
          <td class="text-center">
            <form action="{{route('delete.klasifikasi', $item->id)}}" method="post" class="d-inline">
              @csrf
              @method('delete')
            <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button>
            </form>
        </td>
        
        </tr>
        @endforeach
      </tbody>
  </table>
</div>
@endsection