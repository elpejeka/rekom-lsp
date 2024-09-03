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
            @if ($item !== null)
            <table class="table table-lg">
                <thead>
                    <tr>
                        <td>Data</td>
                        <td>Description</td>
                        <td>No HP</td>
                    </tr>
                </thead>
                <tbody>
                  <tr>
                  <td>
                    Struktur Organisasi
                  </td>
                    <td colspan="2">

                      <a href="{{asset('storage/'. $item->upload_persyaratan)}}" target="_blank" type="button" name="btn_cek_13"
                        class="open-delete btn btn-primary btn-labeled btn-rounded">
                        <b><i class="icon-file-check"></i></b> Softcopy</a>
                    </td>
                  <tr>
                    <tr>
                        <td>Pengarah</td>
                        <td>{{$item->pengarah}}</td>
                        <td>{{$item->no_telp_pengarah}}</td>
                    </tr>
                    <tr>
                        <td>Pengarah</td>
                        <td>{{$item->pengarah_1}}</td>
                        <td>{{$item->no_telp_pengarah_1}}</td>
                    </tr>
                    <tr>
                        <td>Pengarah</td>
                        <td>{{$item->pengarah_2}}</td>
                        <td>{{$item->no_telp_pengarah_2}}</td>
                    </tr>
                    <tr>
                        <td>Pengarah</td>
                        <td>{{$item->pengarah_3}}</td>
                        <td>{{$item->no_telp_pengarah_3}}</td>
                    </tr>
                    <tr>
                        <td>Pengarah</td>
                        <td>{{$item->pengarah_4}}</td>
                        <td>{{$item->no_telp_pengarah_4}}</td>
                    </tr>
                    <tr>
                        <td>Ketua Pelaksana</td>
                        <td>{{$item->ketua}}</td>
                        <td>{{$item->no_ketua}}</td>
                    </tr>
                    <tr>
                        <td>Penanggungjawab Bagian Umum </td>
                        <td>{{$item->umum}}</td>
                        <td>{{$item->no_umum}}</td>
                    </tr>
                    <tr>
                        <td>Penanggungjawab Bagian Sertifikasi </td>
                        <td>{{$item->sertifikasi}}</td>
                        <td>{{$item->no_sertifikasi}}</td>
                    </tr>
                    <tr>
                        <td>Penanggungjawab Bagian Manajemen Mutu</td>
                        <td>{{$item->manajemen_mutu}}</td>
                        <td>{{$item->no_manajemen}}</td>
                    </tr>
                    <tr>
                        <td>Jumlah Karyawan LSP</td>
                        <td colspan="2">{{$item->jumlah_karyawan}}</td>
                    </tr>
                    <tr>
                      <td>Action</td>
                      <td colspan="2">
                        {{-- @if($item->status_submit == null) --}}
                        <a href="{{route('pengurus.edit', $item->id)}}" class="btn btn-primary">Edit</
                        {{-- @else
                        @endif   --}}
                      </td>
                  </tr>
                </tbody>
            </table>
            @else
            <form class="form-horizontal" action="{{route('struktur_organisasi_store')}}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Nama Pengarah</label>
                                    <input name="pengarah" type="text" class="form-control @error('pengarah') is-invalid @enderror" placeholder="" required>
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
                                    <input name="no_telp_pengarah" type="text" class="form-control @error('no_telp_pengarah') is-invalid @enderror" placeholder="" required>
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
                                    <input name="pengarah_1" type="text" class="form-control @error('pengarah_1') is-invalid @enderror" placeholder="" required>
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
                                    <input name="no_telp_pengarah_1" type="text" class="form-control @error('no_telp_pengarah_1') is-invalid @enderror" placeholder="" required>
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
                                    <input name="pengarah_2" type="text" class="form-control @error('pengarah_2') is-invalid @enderror" placeholder="" required>
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
                                    <input name="no_telp_pengarah_2" type="text" class="form-control @error('no_telp_pengarah_2') is-invalid @enderror" placeholder="" required>
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
                                    <input name="pengarah_3" type="text" class="form-control @error('pengarah_3') is-invalid @enderror" placeholder="" required>
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
                                    <input name="no_telp_pengarah_3" type="text" class="form-control @error('no_telp_pengarah_3') is-invalid @enderror" placeholder="" required>
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
                                    <input name="pengarah_4" type="text" class="form-control @error('pengarah_4') is-invalid @enderror" placeholder="" required>
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
                                    <input name="no_telp_pengarah_4" type="text" class="form-control @error('no_telp_pengarah_4') is-invalid @enderror" placeholder="" required>
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
                                    <input name="ketua" type="text" class="form-control @error('ketua') is-invalid @enderror" placeholder="" required>
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
                                    <input name="no_ketua" type="text" class="form-control @error('no_ketua') is-invalid @enderror" placeholder="" required>
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
                                    <input name="umum" type="text" class="form-control @error('umum') is-invalid @enderror" placeholder="" required>
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
                                    <input name="no_umum" type="text" class="form-control @error('no_umum') is-invalid @enderror" placeholder="" required>
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
                                    <input name="sertifikasi" type="text" class="form-control @error('sertifikasi') is-invalid @enderror" placeholder="" required>
                                    @error('sertifikasi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Nomor Handphone</label>
                                    <input name="no_sertifikasi" type="text" class="form-control @error('no_sertifikasi') is-invalid @enderror" placeholder="" required>
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
                                    <input name="manajemen_mutu" type="text" class="form-control @error('manajemen_mutu') is-invalid @enderror" placeholder="" required>
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
                                    <input name="no_manajemen" type="text" class="form-control @error('no_manajemen') is-invalid @enderror" placeholder="" required>
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
                                    <input name="jumlah_karyawan" type="text" class="form-control @error('jumlah_karyawan') is-invalid @enderror" placeholder="" required>
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
                                    <input name="upload_persyaratan" type="file" class="form-control @error('upload_persyaratan') is-invalid @enderror" placeholder="" required>
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
            @endif
          </div>
      </div>
  </div>
</div>
@endsection
