@extends('layouts.app')
@section('page-header')
<div class="page-header page-header-default">
  <div class="page-header-content">
    <div class="page-title">
      <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Struktur Organisasi LSP</h4>
    </div>
  </div>

  <div class="breadcrumb-line">
    <ul class="breadcrumb">
      <li><a href="{{route('home')}}"><i class="icon-home2 position-left"></i> Home</a></li>
      <li class="active">Struktur Organisasi LSP</li>
    </ul>
  </div>
</div>
@endsection
@section('content')
<form method="POST" class="form-horizontal" action="{{route('pengurus.update', $items->id)}}" enctype="multipart/form-data">
    @method('PUT')
  @csrf
  <div class="panel panel-flat">
    <div class="panel-heading">
      <h5 class="panel-title">Struktur Organisasi</h5>
      <div class="heading-elements">
        <ul class="icons-list">
        <li><a data-action="collapse"></a></li>
        </ul>
      </div>
    </div>

    <div class="panel-body">
      <div class="row">
        <div class="col-md-12">
          <legend class="text-semibold"><i class="icon-reading position-left"></i> Struktur Organisasi</legend>
        </div>

          <div class="col-md-6">
            <fieldset>
              <div class="col-md-12">
                <div class="form-group">
                  <label class="col-lg-3 control-label">Struktur Organisasi</label>
                    <div class="col-lg-9">
                        <input name="upload_persyaratan" type="file" class="file-input @error('upload_persyaratan') is-invalid @enderror"
                        data-show-caption="false" data-show-upload="false" data-browse-class="btn btn-primary btn-xs" data-remove-class="btn btn-default btn-xs" required>
                        <span class="help-block">
                          Accepted formats: pdf, zip, rar,  Max file size 50Mb
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
              </div>
            </fieldset>
          </div>

      </div>



      <div class="text-right">
        <button type="submit" class="btn btn-primary">Submit<i class="icon-arrow-right14 position-right"></i></button>
      </div>
    </div>

  </div>
</form>
@endsection