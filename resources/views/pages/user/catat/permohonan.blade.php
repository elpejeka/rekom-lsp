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
            <form class="form-horizontal" action="{{route('pencatatan.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Nama LSP</label>
                            <select class="form-control" name="administrations_id">
                                @foreach ($data as $item)
                                    <option value="{{$item->id}}" 
                                    @if (isset($item))
                                        @if ($item->administrations_id == $item->id)
                                            selected
                                        @endif
                                    @endif>{{$item->nama}}</option>
                                @endforeach
                            </select>
                            @error('administrations_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Nomor SK</label>
                            <input type="text" class="form-control @error('no_sk') is-invalid @enderror" name="no_sk" value="{{$pencatatan->no_sk ?? ''}}">
                            @error('no_sk')
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
                            <label class="control-label">Nomor Lisensi</label>
                            <input type="text" class="form-control @error('no_lisensi') is-invalid @enderror" name="no_lisensi" value="{{$pencatatan->no_lisensi ?? ''}}">
                            @error('no_lisensi')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                          </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Masa Berlaku</label>
                              <input type="date" class="form-control @error('status_sk') is-invalid @enderror" name="status_sk"
                              value="{{$pencatatan->status_sk ?? ''}}" required>
                            @error('status_sk')
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
                            <label class="control-label">Jumlah Skema</label>
                              <input type="text" class="form-control @error('jumlah_skema') is-invalid @enderror" name="jumlah_skema"
                              value="{{$pencatatan->jumlah_skema ?? ''}}"
                               required>
                            @error('jumlah_skema')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                          </div>
                    </div>
                </div>
                <div class="row mt-4">
                    @if (isset($pencatatan))
                    <div class="col-lg-6">
                        <label>Logo LSP</label><br/>
                        <a href="{{asset('laravel/storage/app/public/'. $pencatatan->logo_lsp)}}" target="_blank" type="button" name="btn_cek_13" 
                          class="open-delete btn btn-success btn-labeled btn-rounded">
                          <b><i class="icon-file-check"></i></b> Softcopy</a>
                    </div>
                    <div class="col-lg-6">
                        <label>Foto LSP</label><br/>
                        <a href="{{asset('laravel/storage/app/public/'. $pencatatan->foto_lsp)}}" target="_blank" type="button" name="btn_cek_13" 
                          class="open-delete btn btn-success btn-labeled btn-rounded">
                          <b><i class="icon-file-check"></i></b> Softcopy</a>
                    </div>
                    @else
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="control-label">
                                        Logo LSP
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <input name="logo_lsp" type="file" class="form-control @error('logo_lsp') is-invalid @enderror"
                                    data-show-caption="false" data-show-upload="false" data-browse-class="btn btn-success btn-xs" data-remove-class="btn btn-default btn-xs" required>
                                    <span class="help-block">
                                      Accepted formats: pdf, zip, rar, jpeg, jpg, png Max file size 20Mb
                                    </span>
                                    <div class="progress" style="display:none;">
                                      <div id="progress-bar-1" class="progress-bar progress-bar-success progress-bar-striped active " role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
                                        20%
                                      </div>
                                    </div>
                                    @error('logo_lsp')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>   
                    <div class="col-md-6" id="sk">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="control-label">
                                        Foto Kantor LSP Tampak Depan
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <input name="foto_lsp" type="file" class="form-control @error('foto_lsp') is-invalid @enderror"
                                    data-show-caption="false" data-show-upload="false" data-browse-class="btn btn-success btn-xs" data-remove-class="btn btn-default btn-xs" 
                                    id="foto_lsp">
                                    <span class="help-block">
                                      Accepted formats: pdf, zip, rar, jpeg, jpg, png Max file size 20Mb
                                    </span>
                                    <div class="progress" style="display:none;">
                                      <div id="progress-bar-1" class="progress-bar progress-bar-success progress-bar-striped active " role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
                                        20%
                                      </div>
                                    </div>
                                    @error('foto_lsp')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>   
                    @endif
                </div>
                <div class="row mt-4">
                    @if (isset($pencatatan))
                    <div class="col-lg-6">
                        <label>Surat Keputusan Lisensi</label><br/>
                        <a href="{{asset('laravel/storage/app/public/'. $pencatatan->sk_lisensi)}}" target="_blank" type="button" name="btn_cek_13" 
                          class="open-delete btn btn-success btn-labeled btn-rounded">
                          <b><i class="icon-file-check"></i></b> Softcopy</a>
                    </div>
                    <div class="col-lg-6">
                        <label>Sertifikat Lisensi</label><br/>
                        <a href="{{asset('laravel/storage/app/public/'. $pencatatan->sertifikat)}}" target="_blank" type="button" name="btn_cek_13" 
                          class="open-delete btn btn-success btn-labeled btn-rounded">
                          <b><i class="icon-file-check"></i></b> Softcopy</a>
                    </div>
                    @else
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="control-label">
                                        Surat Keputusan Lisensi
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <input name="sk_lisensi" type="file" class="form-control @error('sk_lisensi') is-invalid @enderror"
                                    data-show-caption="false" data-show-upload="false" data-browse-class="btn btn-success btn-xs" data-remove-class="btn btn-default btn-xs" required>
                                    <span class="help-block">
                                      Accepted formats: pdf, zip, rar, jpeg, jpg, png Max file size 20Mb
                                    </span>
                                    <div class="progress" style="display:none;">
                                      <div id="progress-bar-1" class="progress-bar progress-bar-success progress-bar-striped active " role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
                                        20%
                                      </div>
                                    </div>
                                    @error('sk_lisensi')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>   
                    <div class="col-md-6" id="sk">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="control-label">
                                        Sertifikat Lisensi
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <input name="sertifikat" type="file" class="form-control @error('sertifikat') is-invalid @enderror"
                                    data-show-caption="false" data-show-upload="false" data-browse-class="btn btn-success btn-xs" data-remove-class="btn btn-default btn-xs" 
                                    id="sertifikat">
                                    <span class="help-block">
                                      Accepted formats: pdf, zip, rar, jpeg, jpg, png Max file size 20Mb
                                    </span>
                                    <div class="progress" style="display:none;">
                                      <div id="progress-bar-1" class="progress-bar progress-bar-success progress-bar-striped active " role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
                                        20%
                                      </div>
                                    </div>
                                    @error('sertifikat')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>   
                    @endif
                </div>
                <div class="row mt-4">
                    @if (isset($pencatatan))
                    <div class="col-lg-6">
                        <label>Surat Keputusan Lisensi</label><br/>
                        <a href="{{asset('laravel/storage/app/public/'. $pencatatan->sk_lisensi)}}" target="_blank" type="button" name="btn_cek_13" 
                          class="open-delete btn btn-success btn-labeled btn-rounded">
                          <b><i class="icon-file-check"></i></b> Softcopy</a>
                    </div>
                    <div class="col-lg-6">
                        <label>Sertifikat Lisensi</label><br/>
                        <a href="{{asset('laravel/storage/app/public/'. $pencatatan->sertifikat)}}" target="_blank" type="button" name="btn_cek_13" 
                          class="open-delete btn btn-success btn-labeled btn-rounded">
                          <b><i class="icon-file-check"></i></b> Softcopy</a>
                    </div>
                    @else
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="control-label">
                                        Surat Keputusan Lisensi
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <input name="sk_lisensi" type="file" class="form-control @error('sk_lisensi') is-invalid @enderror"
                                    data-show-caption="false" data-show-upload="false" data-browse-class="btn btn-success btn-xs" data-remove-class="btn btn-default btn-xs" required>
                                    <span class="help-block">
                                      Accepted formats: pdf, zip, rar, jpeg, jpg, png Max file size 20Mb
                                    </span>
                                    <div class="progress" style="display:none;">
                                      <div id="progress-bar-1" class="progress-bar progress-bar-success progress-bar-striped active " role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
                                        20%
                                      </div>
                                    </div>
                                    @error('sk_lisensi')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>   
                    <div class="col-md-6" id="sk">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="control-label">
                                        Sertifikat Lisensi
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <input name="sertifikat" type="file" class="form-control @error('sertifikat') is-invalid @enderror"
                                    data-show-caption="false" data-show-upload="false" data-browse-class="btn btn-success btn-xs" data-remove-class="btn btn-default btn-xs" 
                                    id="sertifikat">
                                    <span class="help-block">
                                      Accepted formats: pdf, zip, rar, jpeg, jpg, png Max file size 20Mb
                                    </span>
                                    <div class="progress" style="display:none;">
                                      <div id="progress-bar-1" class="progress-bar progress-bar-success progress-bar-striped active " role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
                                        20%
                                      </div>
                                    </div>
                                    @error('sertifikat')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>   
                    @endif
                </div>
                <div class="row mt-4">
                    @if (isset($pencatatan))
                    <div class="col-lg-6">
                        <label>Surat Permohonan Pencatatan</label><br/>
                        <a href="{{asset('laravel/storage/app/public/'. $pencatatan->upload_persyaratan)}}" target="_blank" type="button" name="btn_cek_13" 
                          class="open-delete btn btn-success btn-labeled btn-rounded">
                          <b><i class="icon-file-check"></i></b> Softcopy</a>
                    </div>
                    @else
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="control-label">
                                        Surat Permohonan Pencatatan
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <input name="upload_persyaratan" type="file" class="form-control @error('upload_persyaratan') is-invalid @enderror"
                                    data-show-caption="false" data-show-upload="false" data-browse-class="btn btn-success btn-xs" data-remove-class="btn btn-default btn-xs" required>
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
                    @endif
                </div>
                @if ($data[0]->unsur_pembentuk == 'APT')
                <div class="row mt-4">
                    @if (isset($pencatatan))
                    <div class="col-lg-6">
                        <label>SS Verifikasi</label><br/>
                        <a href="{{asset('laravel/storage/app/public/'. $pencatatan->ss_verif)}}" target="_blank" type="button" name="btn_cek_13" 
                          class="open-delete btn btn-success btn-labeled btn-rounded">
                          <b><i class="icon-file-check"></i></b> Softcopy</a>
                    </div>
                    <div class="col-lg-6">
                        <label>NIB</label><br/>
                        <a href="{{asset('laravel/storage/app/public/'. $pencatatan->nib)}}" target="_blank" type="button" name="btn_cek_13" 
                          class="open-delete btn btn-success btn-labeled btn-rounded">
                          <b><i class="icon-file-check"></i></b> Softcopy</a>
                    </div>
                    @else
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="control-label">
                                        SS Verifikasi
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <input name="ss_verif" type="file" class="form-control @error('ss_verif') is-invalid @enderror"
                                    data-show-caption="false" data-show-upload="false" data-browse-class="btn btn-success btn-xs" data-remove-class="btn btn-default btn-xs" required>
                                    <span class="help-block">
                                      Accepted formats: pdf, zip, rar, jpeg, jpg, png Max file size 20Mb
                                    </span>
                                    <div class="progress" style="display:none;">
                                      <div id="progress-bar-1" class="progress-bar progress-bar-success progress-bar-striped active " role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
                                        20%
                                      </div>
                                    </div>
                                    @error('ss_verif')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>   
                    <div class="col-md-6" id="sk">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="control-label">
                                        NIB
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <input name="nib" type="file" class="form-control @error('nib') is-invalid @enderror"
                                    data-show-caption="false" data-show-upload="false" data-browse-class="btn btn-primary btn-xs" data-remove-class="btn btn-default btn-xs" 
                                    id="nib">
                                    <span class="help-block">
                                      Accepted formats: pdf, zip, rar, jpeg, jpg, png Max file size 20Mb
                                    </span>
                                    <div class="progress" style="display:none;">
                                      <div id="progress-bar-1" class="progress-bar progress-bar-success progress-bar-striped active " role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
                                        20%
                                      </div>
                                    </div>
                                    @error('nib')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>   
                    @endif
                </div>
                @else
                <div class="row mt-4">
                    @if (isset($pencatatan))
                    <div class="col-lg-6">
                        <label>Akreditasi LPK</label><br/>
                        <a href="{{asset('laravel/storage/app/public/'. $pencatatan->nib)}}" target="_blank" type="button" name="btn_cek_13" 
                          class="open-delete btn btn-success btn-labeled btn-rounded">
                          <b><i class="icon-file-check"></i></b> Softcopy</a>
                    </div>
                    @else
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="control-label">
                                        Akreditasi LPK
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <input name="nib" type="file" class="form-control @error('nib') is-invalid @enderror"
                                    data-show-caption="false" data-show-upload="false" data-browse-class="btn btn-primary btn-xs" data-remove-class="btn btn-default btn-xs" required>
                                    <span class="help-block">
                                      Accepted formats: pdf, zip, rar, jpeg, jpg, png Max file size 20Mb
                                    </span>
                                    <div class="progress" style="display:none;">
                                      <div id="progress-bar-1" class="progress-bar progress-bar-success progress-bar-striped active " role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
                                        20%
                                      </div>
                                    </div>
                                    @error('nib')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>   
                    @endif
                </div>
                @endif
                <div class="row mt-5">
                    @if (isset($pencatatan))
                    <div class="text-right">
                        <a href="{{route('pencatatan.edit', $pencatatan->id)}}" class="btn btn-primary"><i class="icon-pencil"></i> Edit Data Pencatatan</a>
                    </div>
                    @else
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
                    </div>
                    @endif
                </div>       
            </form>    
          </div>
      </div>
  </div>
</div>
@endsection
