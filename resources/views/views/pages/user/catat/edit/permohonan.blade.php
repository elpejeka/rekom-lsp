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
            <form class="form-horizontal" action="{{route('pencatatan.update', $pencatatan->id)}}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Nama LSP</label>
                            <select class="form-control" name="administrations_id">
                                @foreach ($data as $item)
                                    <option value="{{$item->id}}">{{$item->nama}}</option>
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
                              value="{{$pencatatan->status_sk ?? ''}}">
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
                            >
                            @error('jumlah_skema')
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
                                        Logo LSP
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <input name="logo_lsp" type="file" class="form-control @error('logo_lsp') is-invalid @enderror"
                                    data-show-caption="false" data-show-upload="false" data-browse-class="btn btn-success btn-xs" data-remove-class="btn btn-default btn-xs">
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
                </div>
                <!-- <div class="row mt-4">
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
                                    data-show-caption="false" data-show-upload="false" data-browse-class="btn btn-success btn-xs" data-remove-class="btn btn-default btn-xs">
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
                </div>
                <div class="row mt-4">
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
                                    data-show-caption="false" data-show-upload="false" data-browse-class="btn btn-success btn-xs" data-remove-class="btn btn-default btn-xs">
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
                </div> -->
                <div class="row mt-4">
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
                                    data-show-caption="false" data-show-upload="false" data-browse-class="btn btn-success btn-xs" data-remove-class="btn btn-default btn-xs">
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
                </div>
                @if ($data[0]->unsur_pembentuk == 'APT')
                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="control-label">
                                        SS Verifikasi
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <input name="sk_lisensi" type="file" class="form-control @error('sk_lisensi') is-invalid @enderror"
                                    data-show-caption="false" data-show-upload="false" data-browse-class="btn btn-success btn-xs" data-remove-class="btn btn-default btn-xs">
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
                </div>
                @else
                <div class="row mt-4">
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
                                    data-show-caption="false" data-show-upload="false" data-browse-class="btn btn-primary btn-xs" data-remove-class="btn btn-default btn-xs">
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
                </div>
                @endif
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
