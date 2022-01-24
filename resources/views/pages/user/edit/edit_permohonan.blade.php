@extends('layouts.app')
@section('page-header')
<div class="page-header page-header-default">
  <div class="page-header-content">
    <div class="page-title">
      <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span>- Jenis Permohonan Rekomendasi Lisensi</h4>
    </div>
  </div>

  <div class="breadcrumb-line">
    <ul class="breadcrumb">
      <li><a href="{{route('home')}}"><i class="icon-home2 position-left"></i> Home</a></li>
      <li class="active"> Jenis Permohonan Rekomendasi Lisensi</li>
    </ul>
  </div>
</div>
@endsection
@section('content')
<form class="form-horizontal" action="{{route('penambahan.update', $item->id)}}" method="POST" enctype="multipart/form-data">
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
            {{-- {{$item}} --}}
            {{-- <div class="form-group">
              <label class="col-lg-3 control-label">
                Jenis Permohonan
              </label>
              <div class="col-lg-9">
                <select class="select-search" name="jenis_permohonan">
                        <option value="baru">Baru</option>
                        <option value="perpanjangan">Perpanjangan</option>
                        <option value="penambahan">Penambahan Ruang Lingkup</option>
                </select>
              </div>
              @error('jenis_permohonan')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div> --}}


            <div class="form-group">
              <label class="col-lg-3 control-label">Surat Permohonan Rekomendasi Lisensi</label>
                <div class="col-lg-9">
                    <input name="surat_permohonan" type="file" class="file-input @error('surat_permohonan') is-invalid @enderror"
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
                
  
                @error('surat_permohonan')
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
      </div>
    </div>

  </div>
</form>

            
@endsection