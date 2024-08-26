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
             @if ($informasi > 0 )
             <table class="table table-lg">
                <thead>
                    <tr>
                        <td>Data</td>
                        <td>Description</td>
                    </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>SK Menteri</td>
                    <td>
                      <a href="{{asset('storage/'. $item[0]->upload_persyaratan)}}" target="_blank" type="button" name="btn_cek_13" 
                          class="open-delete btn btn-primary btn-labeled btn-rounded">
                          <b><i class="icon-file-check"></i></b> Softcopy</a>
                          </td>
                      </tr>
                      <tr>
                        <td>Akte Pendirian</td>
                        <td><a href="{{asset('storage/'. $item[0]->akta_pendirian)}}" target="_blank" type="button" name="btn_cek_13" 
                          class="open-delete btn btn-primary btn-labeled btn-rounded">
                          <b><i class="icon-file-check"></i></b> Softcopy</a>
                        </td>
                      </tr>
                      <tr>
                        <td>Bukti Kepemilikan Kantor</td>
                        <td>
                        <a href="{{asset('storage/'. $item[0]->bukti_kepemilikan)}}" target="_blank" type="button" name="btn_cek_13" 
                          class="open-delete btn btn-primary btn-labeled btn-rounded">
                          <b><i class="icon-file-check"></i></b> Softcopy</a>
                        </td>
                      </tr>
                      <tr>
                        <td>Sertifikat Akreditasi / Surat Pernyataan Akreditasi LPK</td>
                        <td>
                        <a href="{{asset('storage/'. $item[0]->surat_akreditasi)}}" target="_blank" type="button" name="btn_cek_13" 
                            class="open-delete btn btn-primary btn-labeled btn-rounded">
                            <b><i class="icon-file-check"></i></b> Softcopy</a>
                        </td>
                      </tr>
                      <tr>
                        <td>Surat Pernyataan Asesor</td>
                        <td>
                        <a href="{{asset('storage/'. $item[0]->komitmen_asesor)}}" target="_blank" type="button" name="btn_cek_13" 
                          class="open-delete btn btn-primary btn-labeled btn-rounded">
                          <b><i class="icon-file-check"></i></b> Softcopy</a>
                        </td>
                      </tr>
                    <tr>
                        <td>Nama LSP</td>
                        <td>{{$item[0]->nama}}</td>
                    </tr>
                    <tr>
                        <td>Unsur Pembentuk LSP</td>
                        <td>{{$item[0]->unsur_pembentuk}}</td>
                    </tr>
                    <tr>
                        <td>Nama Unsur Pembentuk LSP</td>
                        <td>{{$item[0]->nama_unsur == null ? "-" : $item[0]->unsur1->asosiasi}}</td>
                    </tr>
                    <tr>
                        <td>Kategori Asosiasi Profesi</td>
                        <td>{{$item[0]->kategori_lsp}}</td>
                    </tr>
                    <tr>
                        <td>Ketersediaan Sistem Informasi</td>
                        <td>{{$item[0]->ketersediaan_sistem}}</td>
                    </tr>
                    <tr>
                        <td>No Telepon</td>
                        <td>{{$item[0]->no_telp}}</td>
                    </tr>
                    <tr>
                        <td>Jenis LSP</td>
                        <td>{{$item[0]->jenis_lsp}}</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>{{$item[0]->alamat}}</td>
                    </tr>
                    <tr>
                      <td>Propinsi</td>
                      <td>{{$item[0]->provinsi == null ? "-" : $item[0]->propinsi->Nama}}</td>
                  </tr>
                    <tr>
                        <td>Email</td>
                        <td>{{$item[0]->email}}</td>
                    </tr>   
                    <tr>
                        <td>Status Kepemilikan Kantor</td>
                        <td>{{$item[0]->status_kepemilikan}}</td>
                    </tr>
                    <tr>
                        <td>Website</td>
                        <td>{{$item[0]->website}}</td>
                    </tr>
                    <tr>
                        <td>Jumlah Skema Sertifikasi</td>
                        <td>{{$item[0]->jumlah_skema}}</td>
                    </tr>
                    <tr>
                      <td>Action</td>
                      {{-- @if($item[0]->status_submit ==null) --}}
                      <td><a href="{{route('information.edit', $item[0]->id)}}" class="btn btn-primary">Edit</td>
                      {{-- @else
                      
                      @endif --}}
                    </tr>
                </tbody>
            </table>
            @else
            <form class="form-horizontal" action="{{route('information_store')}}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Nomor Registrasi LPPK *) Khusus LPPK</label>
                            <input name="no_registrasi" type="text" class="form-control @error('no_registrasi') is-invalid @enderror" autofocus>
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
                            <label class="col-lg-3 control-label">Nama LSP</label>
                            <div class="col-lg-9">
                            <input name="nama" type="text" class="form-control @error('nama') is-invalid @enderror"  value="{{Auth::user()->nama_lsp}}" autofocus required>
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
                            <option value="APT">Asosiasi Profesi Terakreditasi (APT)</option>
                            <option value="LPPK">LPPK Teregistrasi</option>    
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
                                <option value="{{$data->asosiasi->id}}">{{$data->asosiasi->asosiasi}}</option>
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
                                <option value="{{$data->asosiasi1->id}}">{{$data->asosiasi1->asosiasi}}</option>
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
                            <option value="{{$data->asosiasi2->id}}">{{$data->asosiasi2->asosiasi}}</option>
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
                            <input name="no_akta" type="text" class="form-control @error('no_akta') is-invalid @enderror" value="{{old('no_akta')}}" autofocus required>
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
                            <input name="email" type="email" class="form-control  @error('email') is-invalid @enderror" value="{{old('email')}}" autofocus required>
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
                            <input name="no_telp" type="text" class="form-control @error('no_telp') is-invalid @enderror" value="{{old('no_telp')}}" autofocus required>
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
                                <option value="Tidak ada">Tidak Ada</option>
                                <option value="Ada">Ada</option>
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
                                <option value="Hak Milik">Hak Milik</option>
                                <option value="Sewa">Sewa</option>
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
                            <input name="website" type="text" class="form-control @error('website') is-invalid @enderror" value="{{old('website')}}" autofocus required>
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
                                <option value="">Pilih Provinsi</option>
                                @foreach ($propinsi as $prov)
                                <option value="{{$prov->id_propinsi_dagri}}">{{$prov->Nama}}</option>
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
                            <input name="alamat" type="text" class="form-control  @error('alamat') is-invalid @enderror" value="{{Auth::user()->alamat}}" autofocus required>
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
                            <input name="jumlah_skema" type="text" class="form-control @error('jumlah_skema') is-invalid @enderror" value="{{old('jumlah_skema')}}"
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
                            <input name="kode_pos" type="text" class="form-control  @error('kode_pos') is-invalid @enderror" autofocus required>
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
                                        1). surat Keputusan penetapan akreditasi asosiasi profesi bagi LSP yang dibentuk oleh
                                        Asosiasi Profesi Terakreditasi. 
                                        <br/>
                                        2). atau Surat Tanda Registrasi Lembaga Pendidikan dan 
                                        Pelatihan  Kerja bagi LSP yang dibentuk oleh LPPK.
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <input name="upload_persyaratan" type="file" class="form-control @error('upload_persyaratan') is-invalid @enderror"
                                    data-show-caption="false" data-show-upload="false" data-browse-class="btn btn-primary btn-xs" data-remove-class="btn btn-default btn-xs" required>
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
                                    data-show-caption="false" data-show-upload="false" data-browse-class="btn btn-primary btn-xs" data-remove-class="btn btn-default btn-xs" required>
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
                                    data-show-caption="false" data-show-upload="false" data-browse-class="btn btn-primary btn-xs" data-remove-class="btn btn-default btn-xs" required>
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
                                    data-show-caption="false" data-show-upload="false" data-browse-class="btn btn-primary btn-xs" data-remove-class="btn btn-default btn-xs" required>
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
                                        Dokumen standar kompetensi kerja yang diacu (SKKNI/ SKK Khusus/ Standar Internasional)
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <input name="standar_kompetensi" type="file" class="form-control @error('standar_kompetensi') is-invalid @enderror"
                                    data-show-caption="false" data-show-upload="false" data-browse-class="btn btn-primary btn-xs" data-remove-class="btn btn-default btn-xs" required>
                                    <span class="help-block">
                                      Accepted formats: pdf, zip, rar, jpeg, jpg, png Max file size 20Mb
                                    </span>
                                    <div class="progress" style="display:none;">
                                      <div id="progress-bar-1" class="progress-bar progress-bar-success progress-bar-striped active " role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
                                        20%
                                      </div>
                                    </div>
                                    @error('standar_kompetensi')
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

@push('addon-script')
<script>
    $(document).ready(function () {
        $('#list').DataTable();
    });
</script>
@endpush