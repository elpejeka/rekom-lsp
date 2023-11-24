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
                <form class="form-horizontal" action="{{route('sertifikat.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" class="form-control @error('asesor_id') is-invalid @enderror" name="asesor_id" value="{{$asesor->id}}">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Nama Asesor</label>
                            <input type="text" class="form-control @error('nama_asesor') is-invalid @enderror" value={{$asesor->nama_asesor}} readonly>
                        </div>
                        @error('nama_asesor')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>    
                </div>
                <div class="row mt-5">
                    <div class="col-md-12">
                        <legend class="text-semibold text-sm"><i class="icon-reading position-left"></i>Sertifikat Kompetensi Asesor</legend>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Nomor Registrasi Sertifikat</label>
                            <input type="text" class="form-control @error('nrka') is-invalid @enderror" name="nrka" required>
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
                            <input type="date" class="form-control @error('tgl_akhir_sertifikat_kompetensi') is-invalid @enderror" name="tgl_akhir_sertifikat_kompetensi" required>
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
                                <option value="ahli">Ahli</option>
                                <option value="teknisi/analis">Teknisi/Analis</option>
                                <option value="operator">Operator</option>
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
                                    data-show-caption="false" data-show-upload="false" data-browse-class="btn btn-primary btn-xs" data-remove-class="btn btn-default btn-xs" required>
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
                            <input type="text" class="form-control @error('no_sertifikat_asesor') is-invalid @enderror" name="no_sertifikat_asesor" value="MET." required>
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
                            <input type="text" class="form-control @error('sub_klasifikasi_sertifikat') is-invalid @enderror" name="sub_klasifikasi_sertifikat" required>
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
                            <input type="date" class="form-control @error('tgl_akhir_sertifikat_asesor') is-invalid @enderror" name="tgl_akhir_sertifikat_asesor" required>
                        </div>
                        @error('kualifikasi')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Kualifikasi</label>
                            <input type="text" class="form-control @error('kualifikasi_sertifikat') is-invalid @enderror" name="kualifikasi_sertifikat" required>
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
                                data-show-caption="false" data-show-upload="false" data-browse-class="btn btn-primary btn-xs" data-remove-class="btn btn-default btn-xs" required>
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
      <div class="col-sm-12 col-xl-12">
        <div class="card">
            <div class="card-header">
              <h4>List Sertifikat</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="list" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kualifikasi</th>
                                <th>NRKA</th>
                                <th>No Sertifikat</th>
                                <th>Kualifikasi</th>
                                <th>Subklasifikasi</th>
                                <th>SKA</th>
                                <th>Sertifikat Asesor</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sertifikat as $item)
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->kualifikasi}}</td>
                            <td>{{$item->nrka}}</td>
                            <td>{{$item->no_sertifikat_asesor}}</td>
                            <td>{{$item->kualifikasi_sertifikat}}</td>
                            <td>{{$item->sub_klasifikasi_sertifikat}}</td>
                            <td><a href="{{asset('laravel/storage/app/public/'. $item->ska)}}" target="_blank" type="button" name="btn_cek_13" 
                                  class="open-delete btn btn-primary btn-labeled btn-rounded">
                                  <b><i class="icon-file-check"></i></b> Softcopy</a>
                            </td>
                            <td><a href="{{asset('laravel/storage/app/public/'. $item->sertifikat_asesors)}}" target="_blank" type="button" name="btn_cek_13" 
                                  class="open-delete btn btn-primary btn-labeled btn-rounded">
                                  <b><i class="icon-file-check"></i></b> Softcopy</a>
                            </td>
                            <td class="text-center">
                              <a href="{{route('sertifikat.edit', $item->id)}}" class="btn btn-sm btn-primary"><i class="icon-pencil"></i></a>
                               <form action="{{route('sertifikat.delete', $item->id)}}" method="post" class="d-inline">
                                @csrf
                                @method('delete')
                              <button class="btn btn-danger btn-sm"><i class="icon-trash"></i></button>
                              </form>
                            </td>
                            @endforeach
                        </tbody>
                    </table>
                </div>
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