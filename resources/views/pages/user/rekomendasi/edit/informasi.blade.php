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
            <form class="form-horizontal" action="{{route('information.update', $item->id)}}" method="POST" enctype="multipart/form-data">
                @method('PUT')
            @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Nomor Registrasi LPPK *) Khusus LPPK</label>
                            <input name="no_registrasi" type="text" class="form-control @error('no_registrasi') is-invalid @enderror" value="{{$item->no_registrasi}}" autofocus>
                            {{-- <span class="text-sm">khusus LSP yang dibentuk oleh LPPK</span> --}}
                            @error('no_registrasi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Nama LSP</label>
                            <div class="col-lg-9">
                            <input name="nama" type="text" class="form-control @error('nama') is-invalid @enderror"  value="{{$item->nama}}" autofocus required>
                            </div>
                            @error('nama')
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
                        <label class="control-label">Pembentuk LSP</label>
                        <select class="form-control" name="unsur_pembentuk">
                            <option value="APT" @if ($item->unsur_pembentuk == 'APT')
                                selected
                            @endif>Asosiasi Profesi Terakreditasi (APT)</option>
                            <option value="LPPK" @if ($item->unsur_pembentuk == 'LPPK')
                                selected
                            @endif>LPPK Teregistrasi</option>    
                        </select>
                            @error('unsur_pembentuk')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Nama Unsur Pembentuk</label>
                            <select class="form-control" name="nama_unsur">
                                <option value="{{$item->unsur->id}}">-- {{$item->unsur->asosiasi}}</option>
                                @foreach ($asosiasi as $items)
                                <option value="{{$items->id}}">{{$items->asosiasi}}</option>    
                                @endforeach
                            </select>
                            @error('nama')
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
                        <label class="control-label">Kategori LSP</label>
                        <select class="form-control" name="kategori_lsp">
                            <option value="{{$item->kategori_lsp}}">{{$item->kategori_lsp}}</option>
                            <option value="APT Umum">Asosiasi Profesi Umum (APT)</option>
                            <option value="APT Khusus">Asosiasi Profesi Khusus (APT)</option>
                            <option value="SMK">SMK </option>  
                            <option value="Politeknik">Politeknik</option>  
                            <option value="Perguruan Tinggi">Perguruan Tinggi</option>    
                            <option value="LPK Pemerintah">LPK Pemerintah</option>    
                            <option value="LPK Swasta">LPK Swasta</option>    
                            <option value="LPK Perusahaan">LPK Perusahaan</option>    
                          </select>
                            @error('kategori_lsp')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Nama Unsur Pembentuk</label>
                            <select class="form-control" name="nama_unsur_1">
                                <option value="{{$item->unsur1->id}}">-- {{$item->unsur1->asosiasi}}</option>
                                @foreach ($asosiasi as $items)
                                <option value="{{$items->id}}">{{$items->asosiasi}}</option>    
                                @endforeach
                            </select>
                            @error('nama')
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
                        <label class="control-label">Nama Unsur Pembentuk</label>
                        <select class="form-control" name="nama_unsur_2">
                            <option value="{{$item->unsur2->id}}">-- {{$item->unsur2->asosiasi}}</option>
                            @foreach ($asosiasi as $items)
                            <option value="{{$items->id}}">{{$items->asosiasi}}</option>    
                            @endforeach
                        </select>
                            @error('nama_unsur_2')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Jenis LSP</label>
                            <select class="form-control" name="jenis_lsp">
                                <option value="{{$item->jenis_lsp}}">{{$item->jenis_lsp}}</option>
                                <option value="pihak pertama">Pihak Pertama</option>
                                <option value="pihak kedua">Pihak Kedua</option>    
                                <option value="pihak ketiga">Pihak Ketiga</option>    
                              </select>
                            @error('nama')
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
                            <label class="control-label">Nomor Akta Pendirian</label>
                            <input name="no_akta" type="text" class="form-control @error('no_akta') is-invalid @enderror" value="{{$item->no_akta}}" autofocus required>
                            @error('no_akta')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Email</label>
                            <input name="email" type="email" class="form-control  @error('email') is-invalid @enderror" value="{{$item->email}}" autofocus required>
                            @error('email')
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
                            <label class="control-label">Nomor Telepon</label>
                            <input name="no_telp" type="text" class="form-control @error('no_telp') is-invalid @enderror" value="{{$item->no_telp}}" autofocus required>
                            @error('no_telp')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Sistem Informasi </label>
                            <select class="form-control" name="ketersediaan_sistem">
                                <option value="Tidak ada" @if ($item->ketersediaan_sistem == 'Tidak Ada')
                                    selected
                                @endif>Tidak Ada</option>
                                <option value="Ada" @if ($item->ketersediaan_sistem == 'Ada')
                                    selected
                                @endif>Ada</option>
                              </select>
                            @error('nama')
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
                            <label class="control-label">Status Kepemilikan Kantor</label>
                            <select class="form-control" name="status_kepemilikan">
                                <option value="Hak Milik" @if ($item->status_kepemilikan == 'Hak Milik')
                                    selected
                                @endif>Hak Milik</option>
                                <option value="Sewa" @if ($item->status_kepemilikan == 'Sewa')
                                    selected
                                @endif>Sewa</option>
                              </select>
                            @error('status_kepemilikan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Website LSP </label>
                            <input name="website" type="text" class="form-control @error('website') is-invalid @enderror" value="{{$item->website}}" autofocus required>
                            @error('website')
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
                            <label class="control-label">Propinsi</label>
                            <select class="form-control" name="provinsi" id="provinsi">
                                @foreach ($propinsi as $prov)
                                <option value="{{$prov->id_propinsi_dagri}}" @if ($item->provinsi == $prov->id_propinsi_dagri)
                                    selected
                                @endif>{{$prov->Nama}}</option>
                                @endforeach
                            </select>
                            @error('provinsi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Alamat</label>
                            <input name="alamat" type="text" class="form-control  @error('alamat') is-invalid @enderror" value="{{$item->alamat}}" autofocus required>
                            @error('alamat')
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
                            <label class="control-label">Jumlah Skema Sertifikasi</label>
                            <input name="jumlah_skema" type="text" class="form-control @error('jumlah_skema') is-invalid @enderror" value="{{$item->jumlah_skema}}"
                                placeholder="yang akan diajukan lisensi" autofocus required>
                            @error('jumlah_skema')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Kode Pos</label>
                            <input name="kode_pos" type="text" class="form-control @error('kode_pos') is-invalid @enderror" value="{{$item->kode_pos}}" autofocus required>
                            @error('kode_pos')
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
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="control-label">
                                        1. surat Keputusan penetapan akreditasi asosiasi profesi bagi LSP yang dibentuk oleh
                                        Asosiasi Profesi Terakreditasi. 
                                        <br/>
                                        2. atau Surat Tanda Registrasi Lembaga Pendidikan dan 
                                        Pelatihan  Kerja bagi LSP yang dibentuk oleh LPPK.
                                
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <input name="upload_persyaratan" type="file" class="form-control @error('upload_persyaratan') is-invalid @enderror"
                                    data-show-caption="false" data-show-upload="false" data-browse-class="btn btn-primary btn-xs" data-remove-class="btn btn-default btn-xs">
                                    <span class="help-block">
                                      Accepted formats: pdf, zip, rar, jpeg, jpg, png Max file size 20Mb
                                    </span>
                                    <div class="progress" style="display:none;">
                                      <div id="progress-bar-1" class="progress-bar progress-bar-success progress-bar-striped active " role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
                                        20%
                                      </div>
                                    </div>
                                    @error('upload_persyaratan')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>    
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="control-label">
                                        Akta Pendirian LSP <br/>
                                        1) akte pendirian LSP dan surat keputusan pengesahan sebagai badan hukum dari Kementerian Hukum dan HAM bagi LSP yang dibentuk oleh Asosiasi Prefise Terakreditasi
                                        <br/>
                                        2) surat Keputusan pembentukan LSP oleh pimpinan tertinggi LPPK bagi LSP yang dibentuk oleh Lembaga Pendidikan dan Pelatihan Kerja (LPPK)
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <input name="akta_pendirian" type="file" class="form-control @error('akta_pendirian') is-invalid @enderror"
                                    data-show-caption="false" data-show-upload="false" data-browse-class="btn btn-primary btn-xs" data-remove-class="btn btn-default btn-xs">
                                    <span class="help-block">
                                      Accepted formats: pdf, zip, rar, jpeg, jpg, png Max file size 20Mb
                                    </span>
                                    <div class="progress" style="display:none;">
                                      <div id="progress-bar-1" class="progress-bar progress-bar-success progress-bar-striped active " role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
                                        20%
                                      </div>
                                    </div>
                                    
                                    @error('akta_pendirian')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="control-label">
                                        Bukti Status Kepemilikan dari Sewa Kantor
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <input name="bukti_kepemilikan" type="file" class="form-control @error('bukti_kepemilikan') is-invalid @enderror"
                                    data-show-caption="false" data-show-upload="false" data-browse-class="btn btn-primary btn-xs" data-remove-class="btn btn-default btn-xs">
                                    <span class="help-block">
                                      Accepted formats: pdf, zip, rar, jpeg, jpg, png Max file size 20Mb
                                    </span>
                                    <div class="progress" style="display:none;">
                                      <div id="progress-bar-1" class="progress-bar progress-bar-success progress-bar-striped active " role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
                                        20%
                                      </div>
                                    </div>
                                    @error('bukti_kepemilikan')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>    
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="control-label">
                                        Surat Pernyataan Komitmen Asesor
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <input name="komitmen_asesor" type="file" class="form-control @error('komitmen_asesor') is-invalid @enderror"
                                    data-show-caption="false" data-show-upload="false" data-browse-class="btn btn-primary btn-xs" data-remove-class="btn btn-default btn-xs">
                                    <span class="help-block">
                                      Accepted formats: pdf, zip, rar, jpeg, jpg, png Max file size 20Mb
                                    </span>
                                    <div class="progress" style="display:none;">
                                      <div id="progress-bar-1" class="progress-bar progress-bar-success progress-bar-striped active " role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
                                        20%
                                      </div>
                                    </div>
                                    
                                    @error('komitmen_asesor')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="control-label">
                                        Sertifikat Akreditasi LPK atau Surat Pernyataan Komitmen Jika Belum Terakreditasi 
                                        <br/>
                                        <sub>*) Khusus LPPK</sub>
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <input name="surat_akreditasi" type="file" class="form-control @error('surat_akreditasi') is-invalid @enderror"
                                    data-show-caption="false" data-show-upload="false" data-browse-class="btn btn-primary btn-xs" data-remove-class="btn btn-default btn-xs">
                                    <span class="help-block">
                                      Accepted formats: pdf, zip, rar, jpeg, jpg, png Max file size 20Mb
                                    </span>
                                    <div class="progress" style="display:none;">
                                      <div id="progress-bar-1" class="progress-bar progress-bar-success progress-bar-striped active " role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
                                        20%
                                      </div>
                                    </div>
                                    @error('surat_akreditasi')
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

@push('addon-script')
<script>
    $(document).ready(function () {
        $('#list').DataTable();
    });
</script>
@endpush