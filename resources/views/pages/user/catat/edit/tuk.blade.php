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
                <form class="form-horizontal" action="{{route('pencatatan.tuk.update', $data->id)}}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                  @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Jenis Permohonan</label>
                            <select class="form-control" name="pencatatan_id">
                                  @foreach ($permohonan as $item)
                                    @if ($loop->first)
                                      <option value="{{$item->id}}">{{$item->permohonan}}</option>  
                                    @endif
                                  @endforeach
                            </select>
                            @error('pencatatan_id')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                          </div>
                    </div>     
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Kode TUK</label>
                            <input name="kode_tuk" type="text" class="form-control @error('kode_tuk') is-invalid @enderror"  value="{{$data->kode_tuk}}" autofocus required>
                        </div>
                        @error('kode_tuk')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>    
                </div>
                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Nama TUK</label>
                            <input name="nama_tuk" type="text" class="form-control @error('nama_tuk') is-invalid @enderror"  value="{{$data->nama_tuk}}" autofocus required>
                        </div>
                        @error('nama_tuk')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Jenis TUK</label>
                            <select class="form-control" name="jenis_tuk">
                                <option value="Sewaktu" @if ($data->jenis_tuk == 'Sewaktu')
                                    selected
                                @endif>Sewaktu</option>
                                <option value="Mandiri" @if ($data->jenis_tuk == 'Mandiri')
                                    selected
                                @endif>Mandiri</option>
                                <option value="Tempat Kerja" @if ($data->jenis_tuk == 'Tempat Kerja')
                                    selected
                                @endif>Tempat Kerja</option>
                            </select>
                        </div>
                        @error('jenis_tuk')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>    
                </div>
                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Provinsi</label>
                            <select class="form-control" name="provinsi" id="provinsi">
                            @foreach ($propinsi as $prov)
                              <option value="{{$prov->id_propinsi_dagri}}" @if ($data->provinsi == $prov->id_propinsi_dagri)
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
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Alamat</label>
                            <input name="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror"  value="{{$data->alamat}}"  autofocus required>
                        </div>
                        @error('alamat')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>    
                </div>
                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Daftar Sarana dan Prasarana</label>
                            <br/>
                            <input name="upload_persyaratan" type="file" class="file-input @error('upload_persyaratan') is-invalid @enderror"
                            data-show-caption="false" data-show-upload="false" data-browse-class="btn btn-primary btn-xs" data-remove-class="btn btn-default btn-xs">
                            <span class="help-block">
                                Accepted formats: pdf, zip, rar  Max file size 50Mb
                              </span>
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

@push('addon-script')
<script>
    $(document).ready(function () {
        $('#list').DataTable();
    });
</script>
@endpush