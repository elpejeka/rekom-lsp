@extends('layouts.app')
@section('page-header')
<div class="page-header page-header-default">
  <div class="page-header-content">
    <div class="page-title">
      <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> Permohonan Pencatatan LSP</h4>
    </div>
  </div>

  <div class="breadcrumb-line">
    <ul class="breadcrumb">
      <li><a href="{{route('home')}}"><i class="icon-home2 position-left"></i> Home</a></li>
      <li class="active"> Pencatatan LSP</li>
    </ul>
  </div>
</div>
@endsection
@section('content')
<form class="form-horizontal" action="{{route('pencatatan.update', $data->id)}}" method="POST" enctype="multipart/form-data">
  @method('PUT')
  @csrf
  <div class="panel panel-flat">
    <div class="panel-heading">
      <h5 class="panel-title">Permohonan</h5>
      <div class="heading-elements">
        <ul class="icons-list">
                  <li><a data-action="collapse"></a></li>
                </ul>
              </div>
    </div>

    <div class="panel-body">
      <div class="row">
        <div class="col-md-12">
          <legend class="text-semibold"><i class="icon-reading position-left"></i> Permohonan</legend>
        </div>
        <div class="col-md-6">
          <fieldset>

            
            <div class="form-group">
              <label class="col-lg-3 control-label">Nomor SK</label>
              <div class="col-lg-9">
                <input type="text" class="form-control @error('no_sk') is-invalid @enderror" name="no_sk" value="{{$data->no_sk}}">
              </div>
              @error('no_sk')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="form-group">
              <label class="col-lg-3 control-label">Nomor Lisensi</label>
              <div class="col-lg-9">
                <input type="text" class="form-control @error('no_sk') is-invalid @enderror" name="no_lisensi" value="{{$data->no_lisensi}}">
              </div>
              @error('administrations_id')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="form-group">
              <label class="col-lg-3 control-label">Masa Berlaku SK</label>
              <div class="col-lg-9">
                <input type="date" class="form-control @error('status_sk') is-invalid @enderror" name="status_sk" value="{{$data->status_sk}}">
              </div>
              @error('status_sk')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            

              <div class="form-group">
              <label class="col-lg-3 control-label">Logo LSP</label>
                <div class="col-lg-9">
                    <input name="logo_lsp" type="file" class="file-input @error('logo_lsp') is-invalid @enderror"
                    data-show-caption="false" data-show-upload="false" data-browse-class="btn btn-primary btn-xs" data-remove-class="btn btn-default btn-xs">
                    <span class="help-block">
                      Accepted formats: jpeg, jpg, png Max file size 20Mb
                    </span>
                    <div class="progress" style="display:none;">
                      <div id="progress-bar-1" class="progress-bar progress-bar-success progress-bar-striped active " role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
                        20%
                      </div>
                    </div>
                </div>
                
  
                @error('logo_lsp')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
              </div>

              <div class="form-group">
              <label class="col-lg-3">Foto Kantor LSP Tampak Depan</label>
                <div class="col-lg-9">
                    <input name="foto_lsp" type="file" class="file-input @error('foto_lsp') is-invalid @enderror"
                    data-show-caption="false" data-show-upload="false" data-browse-class="btn btn-primary btn-xs" data-remove-class="btn btn-default btn-xs" >
                    <span class="help-block">
                      Accepted formats: jpeg, jpg, png Max file size 20Mb
                    </span>
                    <div class="progress" style="display:none;">
                      <div id="progress-bar-1" class="progress-bar progress-bar-success progress-bar-striped active " role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
                        20%
                      </div>
                    </div>
                </div>
                
  
                @error('foto_lsp')
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
              <label class="col-lg-3 control-label">Jumlah Skema</label>
              <div class="col-lg-9">  
                <input type="number" class="form-control @error('jumlah_skema') is-invalid @enderror" name="jumlah_skema" value="{{$data->jumlah_skema}}">
              </div>
              @error('jumlah_skema')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="form-group">
              <label class="col-lg-3 control-label">Surat Keputusan Lisensi</label>
                <div class="col-lg-9">
                    <input name="sk_lisensi" type="file" class="file-input @error('sk_lisensi') is-invalid @enderror"
                    data-show-caption="false" data-show-upload="false" data-browse-class="btn btn-primary btn-xs" data-remove-class="btn btn-default btn-xs">
                    <span class="help-block">
                      Accepted formats: pdf, zip, rar, jpeg, jpg, png Max file size 20Mb
                    </span>
                    <div class="progress" style="display:none;">
                      <div id="progress-bar-1" class="progress-bar progress-bar-success progress-bar-striped active " role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
                        20%
                      </div>
                    </div>
                </div>
                
  
                @error('sk_lisensi')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
              </div>

            <div class="form-group">
              <label class="col-lg-3">Sertifikat Lisensi</label>
                <div class="col-lg-9">
                    <input name="sertifikat" type="file" class="file-input @error('sertifikat') is-invalid @enderror"
                    data-show-caption="false" data-show-upload="false" data-browse-class="btn btn-primary btn-xs" data-remove-class="btn btn-default btn-xs">
                    <span class="help-block">
                      Accepted formats: pdf, zip, rar, jpeg, jpg, png Max file size 20Mb
                    </span>
                    <div class="progress" style="display:none;">
                      <div id="progress-bar-1" class="progress-bar progress-bar-success progress-bar-striped active " role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
                        20%
                      </div>
                    </div>
                </div>
                
  
                @error('sertifikat')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>


            <div class="form-group">
              <label class="col-lg-3 ">Surat Permohonan Pencatatan Lisensi</label>
                <div class="col-lg-9">
                    <input name="upload_persyaratan" type="file" class="file-input @error('upload_persyaratan') is-invalid @enderror"
                    data-show-caption="false" data-show-upload="false" data-browse-class="btn btn-primary btn-xs" data-remove-class="btn btn-default btn-xs">
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

              @if ($data->unsur_pembentuk == 'APT')
                  
              <div class="form-group">
                <label class="col-lg-3 ">SS Verifikasi</label>
                  <div class="col-lg-9">
                      <input name="ss_verif" type="file" class="file-input @error('ss_verif') is-invalid @enderror"
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
                  
    
                  @error('ss_verif')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
                </div>

                       
              <div class="form-group">
                <label class="col-lg-3 ">NIB</label>
                  <div class="col-lg-9">
                      <input name="nib" type="file" class="file-input @error('nib') is-invalid @enderror"
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
                  
    
                  @error('nib')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
                </div>

              @endif
            
          </fieldset>
        </div>
      </div>

      <div class="text-right">
        <button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
      </div>

      {{-- <p class="text-bold">*) Dokumen untuk Penambahan Ruang Lingkup Rekomendasi LSP</p> --}}
    </div>
    
  </div>
</form>



            
@endsection