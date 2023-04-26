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
<form class="form-horizontal" action="{{route('pencatatan.tuk.store')}}" method="POST" enctype="multipart/form-data">
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
                  <input name="kode_tuk" type="text" class="form-control @error('kode_tuk') is-invalid @enderror"  value="{{old('kode_tuk')}}" autofocus required>
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
                <input name="nama_tuk" type="text" class="form-control @error('nama_tuk') is-invalid @enderror"  value="{{old('nama_tuk')}}" autofocus required>
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
                  {{-- <input name="jenis_tuk" type="text" class="form-control @error('jenis_tuk') is-invalid @enderror"  value="{{old('jenis_tuk  ')}}" autofocus required> --}}
                  <select class="select-search" name="jenis_tuk">
                    <option value="">Pilih Jenis TUK</option>
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
                <input name="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror"  value="{{old('alamat')}}"  autofocus required>
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
                    <option value="">Pilih Provinsi</option>
                @foreach ($propinsi as $prov)
                  <option value="{{$prov->id_propinsi_dagri}}">{{$prov->Nama}}</option>
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
                    data-show-caption="false" data-show-upload="false" data-browse-class="btn btn-primary btn-xs" data-remove-class="btn btn-default btn-xs" required>
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

<div class="panel panel-flat">
  <div class="panel-heading">
    <h5 class="panel-title">Daftar Tempat Uji Kompetensi</h5>
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
        <th>Kode TUK</th>
        <th>Nama TUK</th>
        <th>Jenis TUK</th>
        <th>Alamat</th>
        <th>Dokumen</th>s
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($data as $item)
          <tr>
            <td>1</td>
            <td>{{$item->kode_tuk}}</td>
            <td>{{$item->nama_tuk}}</td>
            <td>{{$item->jenis_tuk}}</td>
            <td>{{$item->alamat}}</td>
            <td>
              <a href="{{asset('laravel/storage/app/public/'. $item->upload_persyaratan)}}" target="_blank" type="button" name="btn_cek_13" style="float: right" 
                class="open-delete btn btn-primary btn-labeled btn-rounded">
                <b><i class="icon-file-check"></i></b> Softcopy</a>
            </td>
            @if ($item->approve == null)
            <td class="text-center">
              <a href="{{route('pencatatan.tuk.edit', $item->id)}}" class="btn btn-sm btn-primary"><i class="icon-pencil"></i></a>
              <form action="{{route('pencatatan.tuk.delete', $item->id)}}" method="post" class="d-inline mt-2">
                @csrf
                @method('delete')
              <button class="btn btn-danger btn-sm mt-5"><i class="icon-trash"></i></button>
              </form>
            </td>
            @endif
            @if ($item->approve != null)
            <td class="text-center">
              <a href="{{route('pencatatan.tuk.edit', $item->id)}}" class="btn btn-sm btn-primary"><i class="icon-pencil"></i></a>
                <span class="badge badge-success">Approved</span>
            </td>
            @endif
          </tr>
      @endforeach
    </tbody>
  </table>
@endsection
