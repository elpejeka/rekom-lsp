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
      <li class="active">Detail Asesor</li>
    </ul>
  </div>
</div>
@endsection

@section('content')
<form class="form-horizontal" action="{{route('skema.update', $item->id)}}" method="POST" enctype="multipart/form-data">
    @method('PUT')
  @csrf
  <div class="panel panel-flat">
    <div class="panel-heading">
      <h5 class="panel-title">Skema Sertifikasi Asesor</h5>
      <div class="heading-elements">
        <ul class="icons-list">
                  <li><a data-action="collapse"></a></li>
                </ul>
              </div>
    </div>

    <div class="panel-body">
      <div class="row formku" id="formRw">
        <div class="col-md-12">
          <legend class="text-semibold"><i class="icon-reading position-left"></i> Skema Sertifikasi Asesor</legend>
        </div>
        <div class="col-md-6">
          <fieldset>
            <input type="hidden" class="form-control @error('asesor_id') is-invalid @enderror" name="asesor_id" value="{{$item->asesor_id }}">
            <div class="form-group">
              <label class="col-lg-3 control-label">Nama Asesor</label>
              <div class="col-lg-9">
                <input type="text" class="form-control @error('nama_asesor') is-invalid @enderror" name="" value={{$item->asesor->nama_asesor}} readonly>
              </div>
              @error('nama_asesor')
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
                <label class="col-lg-3 control-label">Skema Sertifikasi</label>
                <div class="col-lg-9">
                    <select class="select-search" name="skema_sertifikasi">
                        <optgroup label="SKEMA">
                            <option value="{{$item->skema_sertifikasi}}">{{$item->skema_sertifikasi}}</option>
                            @foreach ($skema as $item)
                                <option value="{{$item->jabatan_kerja}}">{{$item->jabatan_kerja}}</option>
                            @endforeach
                        </optgroup>
                    </select>
                </div>
                @error('nama_asesor')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
              </div>
  
            </fieldset>
          </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <legend class="text-semibold"><i class="icon-reading position-left"></i> Kualifikasi dan Subklasifikasi</legend>
        </div>

        <div class="col-md-6">
            <fieldset>
                <div class="form-group">
                  <label class="col-lg-3 control-label">Kualifikasi</label>
                  <div class="col-lg-9">
                      <select class="select-search" name="kualifikasi">
                          <optgroup label="SKEMA">
                                <option value="{{$item->kualifikasi}}">{{$item->kualifikasi}}</option>
                                <option value="ahli">Ahli</option>
                                <option value="teknisi/analis">Teknik / Analis </option>
                                <option value="operator">Operator</option>
                          </optgroup>
                      </select>
                  </div>
                  @error('nama_asesor')
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
                    <label class="col-lg-3 control-label">Subklasifikasi</label>
                    <div class="col-lg-9">
                        <select class="select-search" name="subklasifikasi">
                            <optgroup label="SKEMA">
                                  @foreach ($subklas as $data)
                                    <option value="{{$data->nama}}">{{$data->nama}}</option>
                                @endforeach
                            </optgroup>
                        </select>
                    </div>
                    @error('nama_asesor')
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
