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
            <form class="form-horizontal" action="{{route('pengurus.update', $items->id)}}" method="POST" enctype="multipart/form-data">
                @method('PUT')
            @csrf  
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Nama Pengarah</label>
                                    <input name="pengarah" type="text" class="form-control @error('pengarah') is-invalid @enderror" value="{{$items->pengarah}}" required>
                                    @error('pengarah')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>    
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Nomor Handphone</label>
                                    <input name="no_telp_pengarah" type="text" class="form-control @error('no_telp_pengarah') is-invalid @enderror" value="{{$items->no_telp_pengarah}}" required>
                                    @error('no_telp_pengarah')
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
                                    <label class="control-label">Nama Pengarah</label>
                                    <input name="pengarah_1" type="text" class="form-control @error('pengarah_1') is-invalid @enderror" value="{{$items->pengarah_1}}" required>
                                    @error('pengarah_1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>    
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Nomor Handphone</label>
                                    <input name="no_telp_pengarah_1" type="text" class="form-control @error('no_telp_pengarah_1') is-invalid @enderror" value="{{$items->no_telp_pengarah_1}}" required>
                                    @error('no_telp_pengarah_1')
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
                                    <label class="control-label">Nama Pengarah</label>
                                    <input name="pengarah_2" type="text" class="form-control @error('pengarah_2') is-invalid @enderror" value="{{$items->pengarah_2}}" required>
                                    @error('pengarah_2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>    
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Nomor Handphone</label>
                                    <input name="no_telp_pengarah_2" type="text" class="form-control @error('no_telp_pengarah_2') is-invalid @enderror" value="{{$items->no_telp_pengarah_2}}" required>
                                    @error('no_telp_pengarah_2')
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
                                    <label class="control-label">Nama Pengarah</label>
                                    <input name="pengarah_3" type="text" class="form-control @error('pengarah_3') is-invalid @enderror" value="{{$items->pengarah_3}}" required>
                                    @error('pengarah_3')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>    
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Nomor Handphone</label>
                                    <input name="no_telp_pengarah_3" type="text" class="form-control @error('no_telp_pengarah_3') is-invalid @enderror" value="{{$items->no_telp_pengarah_3}}" required>
                                    @error('no_telp_pengarah_3')
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
                                    <label class="control-label">Nama Pengarah</label>
                                    <input name="pengarah_4" type="text" class="form-control @error('pengarah_4') is-invalid @enderror" value="{{$items->pengarah_4}}" required>
                                    @error('pengarah_4')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>    
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Nomor Handphone</label>
                                    <input name="no_telp_pengarah_4" type="text" class="form-control @error('no_telp_pengarah_4') is-invalid @enderror" value="{{$items->no_telp_pengarah_4}}" required>
                                    @error('no_telp_pengarah_4')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Ketua Pelaksana</label>
                                    <input name="ketua" type="text" class="form-control @error('ketua') is-invalid @enderror" value="{{$items->ketua}}" required>
                                    @error('ketua')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>    
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Nomor Handphone</label>
                                    <input name="no_ketua" type="text" class="form-control @error('no_ketua') is-invalid @enderror" value="{{$items->no_ketua}}" required>
                                    @error('no_ketua')
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
                                    <label class="control-label">Bagian Umum</label>
                                    <input name="umum" type="text" class="form-control @error('umum') is-invalid @enderror" value="{{$items->umum}}" required>
                                    @error('umum')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>    
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Nomor Handphone</label>
                                    <input name="no_umum" type="text" class="form-control @error('no_umum') is-invalid @enderror" value="{{$items->no_umum}}" required>
                                    @error('no_umum')
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
                                    <label class="control-label">Bagian Sertifikasi</label>
                                    <input name="sertifikasi" type="text" class="form-control @error('umum') is-invalid @enderror" value="{{$items->sertifikasi}}" required>
                                    @error('umum')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>    
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Nomor Handphone</label>
                                    <input name="no_sertifikasi" type="text" class="form-control @error('no_sertifikasi') is-invalid @enderror" value="{{$items->no_sertifikasi}}" required>
                                    @error('no_sertifikasi')
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
                                    <label class="control-label">Bagian Manajemen Mutu</label>
                                    <input name="manajemen_mutu" type="text" class="form-control @error('manajemen_mutu') is-invalid @enderror" value="{{$items->manajemen_mutu}}" required>
                                    @error('manajemen_mutu')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>    
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Nomor Handphone</label>
                                    <input name="no_manajemen" type="text" class="form-control @error('no_manajemen') is-invalid @enderror" value="{{$items->no_manajemen}}" required>
                                    @error('no_manajemen')
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
                                    <label class="control-label">Jumlah Karyawan</label>
                                    <input name="jumlah_karyawan" type="text" class="form-control @error('jumlah_karyawan') is-invalid @enderror" value="{{$items->jumlah_karyawan}}" required>
                                    @error('jumlah_karyawan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>    
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Struktur Organisasi</label>
                                    <input name="upload_persyaratan" type="file" class="form-control @error('upload_persyaratan') is-invalid @enderror">
                                    @error('upload_persyaratan')
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