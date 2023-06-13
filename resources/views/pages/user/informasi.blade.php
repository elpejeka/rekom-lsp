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
@if($informasi > 0)
<div class="panel panel-flat">
  <div class="panel-heading">
    <h5 class="panel-title">Data Administrasi</h5>
    <div class="heading-elements">
      <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
              </ul>
            </div>
  </div>

  <div class="panel-body">
    
  </div>

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
          <a href="{{asset('laravel/storage/app/public/'. $item[0]->upload_persyaratan)}}" target="_blank" type="button" name="btn_cek_13" 
              class="open-delete btn btn-primary btn-labeled btn-rounded">
              <b><i class="icon-file-check"></i></b> Softcopy</a>
              </td>
          </tr>
          <tr>
            <td>Akte Pendirian</td>
            <td><a href="{{asset('laravel/storage/app/public/'. $item[0]->akta_pendirian)}}" target="_blank" type="button" name="btn_cek_13" 
              class="open-delete btn btn-primary btn-labeled btn-rounded">
              <b><i class="icon-file-check"></i></b> Softcopy</a>
            </td>
          </tr>
          <tr>
            <td>Bukti Kepemilikan Kantor</td>
            <td>
            <a href="{{asset('laravel/storage/app/public/'. $item[0]->bukti_kepemilikan)}}" target="_blank" type="button" name="btn_cek_13" 
              class="open-delete btn btn-primary btn-labeled btn-rounded">
              <b><i class="icon-file-check"></i></b> Softcopy</a>
            </td>
          </tr>
          <tr>
            <td>Sertifikat Akreditasi / Surat Pernyataan Akreditasi LPK</td>
            <td>
            <a href="{{asset('laravel/storage/app/public/'. $item[0]->surat_akreditasi)}}" target="_blank" type="button" name="btn_cek_13" 
                class="open-delete btn btn-primary btn-labeled btn-rounded">
                <b><i class="icon-file-check"></i></b> Softcopy</a>
            </td>
          </tr>
          <tr>
            <td>Surat Pernyataan Asesor</td>
            <td>
            <a href="{{asset('laravel/storage/app/public/'. $item[0]->komitmen_asesor)}}" target="_blank" type="button" name="btn_cek_13" 
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
</div>
@else
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
              <label class="col-lg-3 control-label">
                Kategori Pembentuk
              </label>
              <div class="col-lg-9">
                <select class="select-search" name="kategori_lsp">
                  <option value="APT Umum">Asosiasi Profesi Umum (APT)</option>
                  <option value="APT Khusus">Asosiasi Profesi Khusus (APT)</option>
                  <option value="SMK">SMK </option>  
                  <option value="Politeknik">Politeknik</option>  
                  <option value="Perguruan Tinggi">Perguruan Tinggi</option>    
                  <option value="LPK Pemerintah">LPK Pemerintah</option>    
                  <option value="LPK Swasta">LPK Swasta</option>    
                  <option value="LPK Perusahaan">LPK Perusahaan</option>    
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
                    <!-- <input name="status_kepemilikan" type="text" class="form-control @error('status_kepemilikan') is-invalid @enderror" value="{{old('status_kepemilikan')}}" autofocus required> -->
                    <select class="select-search" name="status_kepemilikan">
                      <option value="Hak Milik">Hak Milik</option>
                      <option value="Sewa">Sewa</option>
                    </select>
                </div>
                @error('status_kepemilikan')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>

          <div class="form-group">
            <label class="col-lg-3 control-label">Website LSP</label>
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
              <label class="col-lg-3 control-label">
                
              1. surat Keputusan penetapan akreditasi asosiasi profesi bagi LSP yang dibentuk oleh
Asosiasi Profesi Terakreditasi, atau Surat Tanda Registrasi Lembaga Pendidikan dan 
Pelatihan  Kerja bagi LSP yang dibentuk oleh LPPK.
  <br/>
2. khusus untuk LSP yang dibentuk oleh LPK teregistrasi melampirkan Sertifikasi 
Akreditasi LPK.
<br/>
3. Khusus untuk LSP yang dibentuk LPK Teregistrasi yang belum terakreditasi oleh Lembaga
Akreditasi Lembaga Pelatihan Kerja (LA-LPK) Kementerian Ketenegakerjaan melampirkan surat
pernyataan komitmen Akreditasi Lembaga Pelatihan Kerja.
              </label>
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
              <label class="col-lg-3 control-label">
              1) akte pendirian LSP dan surat keputusan pengesahan sebagai badan hukum dari Kementerian
              Hukum dan HAM bagi LSP yang dibentuk oleh Asosiasi Prefise Terakreditasi
              <br/> 
              2) surat Keputusan pembentukan LSP oleh pimpinan tertinggi LPPK bagi LSP yang dibentuk
              oleh Lembaga Pendidikan dan Pelatihan Kerja (LPPK)
              </label>
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
              <label class="col-lg-3 control-label">Bukti Status Kepemilikan dari Sewa Kantor</label>
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
@endif
@endsection
