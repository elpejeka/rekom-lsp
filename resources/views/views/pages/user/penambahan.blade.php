@extends('layouts.app')
@section('page-header')
<div class="page-header page-header-default">
  <div class="page-header-content">
    <div class="page-title">
      <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Asesor</h4>
    </div>
  </div>

  <div class="breadcrumb-line">
    <ul class="breadcrumb">
      <li><a href="{{route('home')}}"><i class="icon-home2 position-left"></i> Home</a></li>
      <li class="active">Dokumen Tambahan Perpanjangan</li>
    </ul>
  </div>
</div>
@endsection

@section('content')
<form class="form-horizontal" action="{{route('penambahan.store')}}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="panel panel-flat">
    <div class="panel-heading">
      <h5 class="panel-title">Dokumen Perpanjangan</h5>
      <div class="heading-elements">
        <ul class="icons-list">
                  <li><a data-action="collapse"></a></li>
                </ul>
              </div>
    </div>

    <div class="panel-body">


      <div class="row">
        <div class="col-md-12">
          <legend class="text-semibold"><i class="icon-reading position-left"></i> Upload Dokumen Penambahan Ruang Lingkup</legend>
        </div>

        <div class="col-md-6">
          <fieldset>

            <div class="form-group">
              <label class="col-lg-3 control-label">Jenis Permohonan</label>
              <div class="col-lg-9">
                <select class="select-search" name="permohonans_id">
                    <optgroup label="JENIS PERMOHONAN">
                      @foreach ($permohonan as $pmhn)
                        <option value="{{$pmhn->id}}">{{$pmhn->jenis_permohonan}}</option>
                      @endforeach
                    </optgroup>
                </select>
              </div>
              @error('permohonans_id')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
            </div>

            <div class="form-group">
                <label class="col-lg-3 control-label">Nomor SK</label>
                  <div class="col-lg-9">
                    <input name="no_sk" type="text" class="form-control @error('no_sk') is-invalid @enderror" required>
                  </div>
                  @error('no_sk')
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
                <label class="col-lg-3 control-label">No Lisensi</label>
                  <div class="col-lg-9">
                    <input name="no_lisensi" type="text" class="form-control @error('no_lisensi') is-invalid @enderror" required>
                  </div>
                  @error('no_lisensi')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>

            <div class="form-group">
              <label class="col-lg-3 control-label">Masa Berlaku</label>
                <div class="col-lg-9">
                  <input name="masa_berlaku" type="date" class="form-control @error('masa_berlaku') is-invalid @enderror" required>
                  </div>
                  @error('masa_berlaku')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
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