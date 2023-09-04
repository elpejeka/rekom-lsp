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
                <form class="form-horizontal" action="{{route('tuk_store')}}" method="POST" enctype="multipart/form-data">
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
                            <input name="kode_tuk" type="text" class="form-control @error('kode_tuk') is-invalid @enderror"  value="{{old('kode_tuk')}}" autofocus required>
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
                            <input name="nama_tuk" type="text" class="form-control @error('nama_tuk') is-invalid @enderror"  value="{{old('nama_tuk')}}" autofocus required>
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
                </div>
                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Provinsi</label>
                            <select class="form-control" name="provinsi" id="provinsi">
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
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Alamat</label>
                            <input name="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror"  value="{{old('alamat')}}"  autofocus required>
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
                            data-show-caption="false" data-show-upload="false" data-browse-class="btn btn-primary btn-xs" data-remove-class="btn btn-default btn-xs" required>
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
      <div class="col-sm-12 col-xl-12">  
       <div class="card">
        <div class="card-body">
            <table class="table datatable-show-all" id="list">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Kode TUK</th>
                    <th>Nama TUK</th>
                    <th>Jenis TUK</th>
                    <th>Provinsi</th>
                    <th>Alamat</th>
                    <th>Dokumen</th>
                    <th>Tayang</th>
                    <th class="text-center">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($data as $item)
                      <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->kode_tuk}}</td>
                        <td>{{$item->nama_tuk}}</td>
                        <td>{{$item->jenis_tuk}}</td>
                        <td>{{$item->provinsi == null ? "-" : $item->propinsi->Nama}}</td>
                        <td>{{$item->alamat}}</td>
                        <td>
                          <a href="{{asset('laravel/storage/app/public/'. $item->upload_persyaratan)}}" target="_blank" type="button" name="btn_cek_13" style="float: right" 
                            class="open-delete btn btn-primary btn-labeled btn-rounded">
                            <b><i class="icon-file-check"></i></b> Softcopy</a>
                        </td>
                        <td>
                          <span class="label label-success">
                            @if ($item->is_active == 1)
                            Ya
                            @else    
                            Tidak
                            @endif</span> <br />
                            <span class="label label-primary">{{$item->status == null ? '-' : 'Permohonan Tayang / Tidak Tayang'}}</span>
                        </td>
                        @if ($item->approve == null)
                        <td class="text-center">
                          <a href="{{route('pencatatan.tuk.edit', $item->id)}}" class="btn btn-sm btn-primary"><i class="icon-pencil"></i></a>
                          <form action="{{route('pencatatan.tuk.delete', $item->id)}}" method="post" class="d-inline mt-2">
                            @csrf
                            @method('delete')
                          <button class="btn btn-danger btn-sm"><i class="icon-trash"></i></button>
                          </form>
                          <a href="{{route('tuk.tayang', $item->id)}}" class="btn btn-sm btn-success">Ubah Status Tayang</a>
                        </td>
                        @endif
                        @if ($item->approve != null)
                        <td class="text-center">
                          <span class="badge badge-success">Approved</span>
                          <a href="{{route('pencatatan.tuk.edit', $item->id)}}" class="btn btn-sm btn-primary"><i class="icon-pencil"></i></a>
                          <a href="{{route('unactive.tuk', $item->id)}}" class="btn btn-sm btn-danger"><i class="icon-trash"></i></a>
                          <a href="{{route('tuk.tayang', $item->id)}}" class="btn btn-sm btn-success">Ubah Status Tayang</a>
                        </td>
                        @endif
                      </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
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