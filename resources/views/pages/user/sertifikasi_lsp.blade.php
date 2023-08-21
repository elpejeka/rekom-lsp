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
      <li class="active">Skema Sertifikasi</li>
    </ul>
  </div>
</div>
@endsection
@section('content')
<form class="form-horizontal" action="{{route('sertifikasi_lsp_store')}}" method="POST" enctype="multipart/form-data">
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
                <select class="select-search" name="permohonans_id" required>
                    <optgroup label="PERMOHONAN">
                      @foreach ($permohonan as $pmhn)
                        @if (!$pmhn->status_submit)
                        <option value="{{$pmhn->id}}">{{$pmhn->jenis_permohonan}} ({{ date('d-m-Y', strtotime($pmhn->created_at)) }})</option>
                        @endif
                      @endforeach
                    </optgroup>
                </select>
                <span class="invalid-feedback text-sm" role="alert">
                  *) Pastikan untuk memilih jenis permohonan pada menu permohonan terlebih dahulu.
                </span>
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
              <label class="col-lg-3 control-label">Klasifikasi</label>
              <div class="col-lg-9">
                <select class="select-search" name="klasifikasi">
                    <optgroup label="KLASIFIKASI">
                      @foreach ($data as $item)
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
                      @foreach ($data as $item)
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
                  {{-- <input class="form-control @error('acuan_skema') is-invalid @enderror"  name="acuan_skema" type="text" 
                    placeholder="SKKNI/SKK Khusus/Standar Internasional" required> --}}
                    <select class="select-search" name="acuan_skema">
                      <optgroup label="Acuan Skema">
                          <option value="SKKNI">SKKNI</option>
                          <option value="SKK Khusus">SKK Khusus</option>
                          <option value="Standar Internasional">Standar Internasional</option>
                      </optgroup>
                  </select>
              </div>
              @error('acuan_skema')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
            </div>

            <div class="form-group">
              <label class="col-lg-3 control-label">Jenjang</label>
                  <div class="col-lg-9">
                      <input type="number" class="form-control @error('jenjang') is-invalid @enderror" name="jenjang" required>
                  </div>
                  @error('jenjang')
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
        <th>Dokumen</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      @php
          $no = 1;
      @endphp
      @foreach ($skema as $skema)
      <tr>
        <td>{{$no++}}</td>
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
        
            <td>
             <a href="{{asset('laravel/storage/app/public/'. $skema->standar_kompetensi)}}" target="_blank" type="button" name="btn_cek_13" 
              class="open-delete btn btn-primary btn-labeled btn-rounded">
              <b><i class="icon-file-check"></i></b> Softcopy</a>
        </td>

        @if ($skema->status_tolak == null)
        <td class="text-center">
          <a href="{{route('edit.skema', $skema->id)}}" class="btn btn-primary" style="margin-bottom: 2px;">Edit</a>
          <form action="{{route('delete.sertifikasi', $skema->id)}}" method="post" class="d-inline">
            @csrf
            @method('delete')
          <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button>
          </form>
        </td>
        @endif

        @if ($skema->status_tolak != null)
            <td class="text-center">
              Permohonan Terproses
            </td>
        @endif
      @endforeach 
    </tbody>
  </table>
@endsection
