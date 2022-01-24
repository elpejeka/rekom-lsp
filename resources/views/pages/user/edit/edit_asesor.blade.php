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
      <li class="active">Asesor</li>
    </ul>
  </div>
</div>
@endsection

@section('content')
<form class="form-horizontal" action="{{route('update.asesor', $item->id)}}" method="POST" enctype="multipart/form-data">
  @method('PUT')
  @csrf
  <div class="panel panel-flat">
    <div class="panel-heading">
      <h5 class="panel-title">Asesor</h5>
      <div class="heading-elements">
            <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
            </ul>
        </div>
    </div>

    <div class="panel-body">


      <div class="row">
        <div class="col-md-12">
          <legend class="text-semibold"><i class="icon-reading position-left"></i>Daftar Asesor</legend>
        </div>

        <div class="col-md-6">
          <fieldset>

            <div class="form-group">
              <label class="col-lg-3 control-label">Nama Asesor</label>
              <div class="col-lg-9">
                <input type="text" class="form-control @error('nama_asesor') is-invalid @enderror" name="nama_asesor"  value="{{$item->nama_asesor}}"" required>
              </div>
              @error('nama_asesor')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
            </div>

            <div class="form-group">
              <label class="col-lg-3 control-label">NIK</label>
                  <div class="col-lg-9">
                    <input type="text" class="form-control @error('nik') is-invalid @enderror" value="{{$item->nik}}" name="nik" required>
                  </div>
                  @error('nik')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>    
            
            <div class="form-group">
              <label class="col-lg-3 control-label">Tercatat LPJK</label>
              <div class="col-lg-9">
                <select class="select-search" name="tercatat">
                  <option value={{$item->tercatat}}>-- {{$item->tercatat == 1 ? "Ya" : "Tidak" }}</option>
                  <option value="1">Ya</option>
                  <option value="0">Tidak</option>    
                </select>
              </div>
              @error('tercatat')
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
              <label class="col-lg-3 control-label">Alamat</label>
                  <div class="col-lg-9">
                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{$item->alamat}}" required>
                  </div>
                  @error('alamat')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>

            <div class="form-group">
              <label class="col-lg-3 control-label">Status Asesor</label>
              <div class="col-lg-9">
                <select class="select-search" name="status_asesor">
                        <option value="{{$item->status_asesor}}">{{$item->status_asesor}}</option>
                        <option value="Tetap">Tetap</option>
                        <option value="Tidak Tetap">Tidak Tetap</option>
                </select>
              </div>
              @error('status_asesor')
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