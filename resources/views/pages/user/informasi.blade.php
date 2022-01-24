@extends('layouts.app')
@section('page-header')
<div class="page-header page-header-default">
  <div class="page-header-content">
    <div class="page-title">
      <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Administrasi</h4>
    </div>
  </div>

  <div class="breadcrumb-line">
    <ul class="breadcrumb">
      <li><a href="{{route('home')}}"><i class="icon-home2 position-left"></i> Home</a></li>
      <li class="active">Administrasi</li>
    </ul>
  </div>
</div>
@endsection
@section('content')
<form class="form-horizontal" action="{{route('information_store')}}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="panel panel-flat">
    <div class="panel-heading">
      <h5 class="panel-title">Administrasi</h5>
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
              <label class="col-lg-3 control-label">Nomor Registrasi LPPK</label>
              <div class="col-lg-9">
                <input name="no_registrasi" type="text" class="form-control @error('no_registrasi') is-invalid @enderror" autofocus>
                <span class="help-block">khusus LSP yang dibentuk
                  oleh LPPK</span>
              </div>
              @error('no_registrasi')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>


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

            <div class="form-group">
              <label class="col-lg-3 control-label">Pembentuk LSP</label>
              <div class="col-lg-9">
                <select class="select-search" name="unsur_pembentuk">
                  <option value="APT">Asosiasi Profesi Terakreditasi (APT)</option>
                  <option value="LPPK">LPPK Teregistrasi</option>    
                </select>
              </div>
              @error('unsur_pembentuk')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="form-group">
              <label class="col-lg-3 control-label">Nama Unsur Pembentuk</label>
              <div class="col-lg-9">
                {{-- <input name="nama_unsur" type="text" class="form-control @error('nama_unsur') is-invalid @enderror"  value="{{Auth::user()->asosiasi_pendiri}}" placeholder="" autofocus required readonly> --}}
                <select class="select-search" name="nama_unsur">
                    <option value="{{$data->asosiasi->id}}">{{$data->asosiasi->asosiasi}}</option>
                    
                </select>
              </div>
              @error('nama_unsur')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="form-group">
              <label class="col-lg-3 control-label">Nama Unsur Pembentuk</label>
              <div class="col-lg-9">
                {{--<input name="nama_unsur_1" type="text" class="form-control @error('nama_unsur_1') is-invalid @enderror"  value="{{Auth::user()->asosiasi_pendiri_1}}" placeholder="" autofocus required readonly> --}}
                <select class="select-search" name="nama_unsur_1">
                    <option value="{{$data->asosiasi1->id}}">{{$data->asosiasi1->asosiasi}}</option>
                </select>
              </div>
              @error('nama_unsur_1')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            
            <div class="form-group">
              <label class="col-lg-3 control-label">Nama Unsur Pembentuk</label>
              <div class="col-lg-9">
                {{-- <input name="nama_unsur_2" type="text" class="form-control @error('unsur_pembentuk_2') is-invalid @enderror"  value="{{Auth::user()->asosiasi_pendiri_2}}" placeholder="" autofocus required readonly> --}}
                <select class="select-search" name="nama_unsur_2">
                    <option value="{{$data->asosiasi2->id}}">{{$data->asosiasi2->asosiasi}}</option>
                </select>
              </div>
              @error('nama_unsur_2')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="form-group">
              <label class="col-lg-3 control-label">No Telepon</label>
              <div class="col-lg-9">
                <input name="no_telp" type="text" class="form-control @error('no_telp') is-invalid @enderror" value="{{old('no_kontak')}}" autofocus required>
              </div>
              @error('no_telp')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="form-group">
              <label class="col-lg-3 control-label">Jenis LSP</label>
              <div class="col-lg-9">
                  <select class="select-search" name="jenis_lsp">
                    <option value="pihak pertama">Pihak Pertama</option>
                    <option value="pihak kedua">Pihak Kedua</option>    
                    <option value="pihak ketiga">Pihak Ketiga</option>    
                  </select>
              </div>
              @error('jenis_lsp')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
            </div>

            <div class="form-group">
              <label class="col-lg-3 control-label">
                Kategori Pembentuk
              </label>
              <div class="col-lg-9">
                <select class="select-search" name="kategori_lsp">
                  <option value="APT Umum">Asosiasi Profesi Umum (APT)</option>
                  <option value="APT Khusus">Asosiasi Profesi Khusus (APT)</option>
                  <option value="Pendidikan">SMK/Politeknik/Perguruan Tinggi</option>    
                  <option value="LPK">LPK Pemerintah/Swasta/Perusahaan</option>    
                </select>
                {{-- <input name="kategori_lsp" type="text" class="form-control @error('kategori_lsp') is-invalid @enderror"  value="{{old('nama_unsur')}}" 
                            placeholder="Asosiasi Profesi Umum/Khusus (bagi APT) SMK/Politeknik/Perguruan Tinggi (bagi Lembaga Pendidikan) LPK Pemerintah/Swasta/Perusahaan (bagi LPK)" 
                            autofocus required> --}}
              </div>
              @error('kategori_lsp')
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
              <label class="col-lg-3 control-label">Nomor Akta Pendirian</label>
                  <div class="col-lg-9">
                      <input name="no_akta" type="text" class="form-control @error('no_akta') is-invalid @enderror" value="{{old('no_akta')}}" autofocus required>
                  </div>
                  @error('no_akta')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>

            <div class="form-group">
              <label class="col-lg-3 control-label">Email</label>
              <div class="col-lg-9">
                <input name="email" type="email" class="form-control  @error('email') is-invalid @enderror" value="{{old('email')}}" autofocus required>
              </div>
              @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
            </div>


            <div class="form-group">
              <label class="col-lg-3 control-label">
                Sistem Informasi 
              </label>
              <div class="col-lg-9">
                <select class="select-search" name="ketersediaan_sistem">
                  <option value="Tidak ada">Tidak Ada</option>
                  <option value="Ada">Ada</option>
                </select>
              </div>
              @error('ketersediaan_sistem')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

          <div class="form-group">
            <label class="col-lg-3 control-label">Status Kepemilikan Kantor</label>
                <div class="col-lg-9">
                    <input name="status_kepemilikan" type="text" class="form-control @error('status_kepemilikan') is-invalid @enderror" value="{{old('status_kepemilikan')}}" autofocus required>
                </div>
                @error('status_kepemilikan')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>

          <div class="form-group">
            <label class="col-lg-3 control-label">Website</label>
                <div class="col-lg-9">
                    <input name="website" type="text" class="form-control @error('website') is-invalid @enderror" value="{{old('website')}}" autofocus required>
                </div>
                @error('website')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
        </div>

        <div class="form-group">
          <label class="col-lg-3 control-label">Jumlah Skema Sertifikasi</label>
              <div class="col-lg-9">
                  <input name="jumlah_skema" type="text" class="form-control @error('jumlah_skema') is-invalid @enderror" value="{{old('jumlah_skema')}}"
                  placeholder="yang akan diajukan lisensi" autofocus required>
              </div>
              @error('jumlah_skema')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
      </div>  
      
          <div class="form-group">
              <label class="col-lg-3 control-label">Alamat</label>
              <div class="col-lg-9">
                <input name="alamat" type="text" class="form-control  @error('alamat') is-invalid @enderror" value="{{Auth::user()->alamat}}" autofocus required>
              </div>
              @error('alamat')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
            </div>

            <div class="form-group">
              <label class="col-lg-3 control-label">Kode Pos</label>
              <div class="col-lg-9">
                <input name="kode_pos" type="text" class="form-control  @error('kode_pos') is-invalid @enderror" autofocus required>
              </div>
              @error('kode_pos')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
            </div>
            
          </fieldset>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <fieldset>
            <div class="form-group">
              <label class="col-lg-3 control-label">Kesesuaian dan keabsahan SK Menteri Pekerjaan Umum dan Perumahan Rakyat 
                tentang penetapan akreditasi asosiasi profesi yang masih berlaku</label>
                <div class="col-lg-9">
                    <input name="upload_persyaratan" type="file" class="file-input @error('upload_persyaratan') is-invalid @enderror"
                    data-show-caption="false" data-show-upload="false" data-browse-class="btn btn-primary btn-xs" data-remove-class="btn btn-default btn-xs" required>
                    <span class="help-block">
                      Accepted formats: pdf, zip, rar, jpeg, jpg, png Max file size 20Mb
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
        <div class="col-md-6">
          <fieldset>
            <div class="form-group">
              <label class="col-lg-3 control-label">Akta Pendirian LSP</label>
                <div class="col-lg-9">
                    <input name="akta_pendirian" type="file" class="file-input @error('akta_pendirian') is-invalid @enderror"
                    data-show-caption="false" data-show-upload="false" data-browse-class="btn btn-primary btn-xs" data-remove-class="btn btn-default btn-xs" required>
                    <span class="help-block">
                      Accepted formats: pdf, zip, rar, jpeg, jpg, png Max file size 20Mb
                    </span>
                    <div class="progress" style="display:none;">
                      <div id="progress-bar-1" class="progress-bar progress-bar-success progress-bar-striped active " role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
                        20%
                      </div>
                    </div>
                </div>
                
  
                @error('akta_pendirian')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
              </div>

          </fieldset>
        </div>
     
      </div>
      <div class="row">
      <div class="col-md-6">
          <fieldset>
            <div class="form-group">
              <label class="col-lg-3 control-label">Bukti Status Kepemilikan Kantor</label>
                <div class="col-lg-9">
                    <input name="bukti_kepemilikan" type="file" class="file-input @error('bukti_kepemilikan') is-invalid @enderror"
                    data-show-caption="false" data-show-upload="false" data-browse-class="btn btn-primary btn-xs" data-remove-class="btn btn-default btn-xs" required>
                    <span class="help-block">
                      Accepted formats: pdf, zip, rar, jpeg, jpg, png Max file size 20Mb
                    </span>
                    <div class="progress" style="display:none;">
                      <div id="progress-bar-1" class="progress-bar progress-bar-success progress-bar-striped active " role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
                        20%
                      </div>
                    </div>
                </div>


                @error('bukti_kepemilikan')
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
              <label class="col-lg-3 control-label">Surat Pernyataan Komitmen Asesor</label>
                <div class="col-lg-9">
                    <input name="komitmen_asesor" type="file" class="file-input @error('komitmen_asesor') is-invalid @enderror"
                    data-show-caption="false" data-show-upload="false" data-browse-class="btn btn-primary btn-xs" data-remove-class="btn btn-default btn-xs" required>
                    <span class="help-block">
                      Accepted formats: pdf, zip, rar Max file size 20Mb
                    </span>
                    <div class="progress" style="display:none;">
                      <div id="progress-bar-1" class="progress-bar progress-bar-success progress-bar-striped active " role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
                        20%
                      </div>
                    </div>
                </div>


                @error('komitmen_asesor')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
              </div>
          </fieldset>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
            <fieldset>
              <div class="form-group">
                <label class="col-lg-3 control-label">
                  Sertifikat Akreditasi LPK atau Surat Pernyataan Komitmen Jika Belum Terakreditasi 
                  <br/>
                  <sub>*) Khusus LLPK</sub>
                </label>
                  <div class="col-lg-9">
                      <input name="surat_akreditasi" type="file" class="file-input @error('surat_akreditasi') is-invalid @enderror"
                      data-show-caption="false" data-show-upload="false" data-browse-class="btn btn-primary btn-xs" data-remove-class="btn btn-default btn-xs">
                      <span class="help-block">
                        Accepted formats: pdf Max file size 20Mb
                      </span>
                      <div class="progress" style="display:none;">
                        <div id="progress-bar-1" class="progress-bar progress-bar-success progress-bar-striped active " role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
                          20%
                        </div>
                      </div>
                  </div>
  
  
                  @error('surat_akreditasi')
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
      </div
    </div>

  </div>
</form>
@endsection
