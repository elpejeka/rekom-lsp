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
                <form class="form-horizontal" action="{{route('perpanjangan_store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Jenis Permohonan</label>
                            <select class="form-control" name="permohonan_id">
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
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Rekapitulasi Laporan</label>
                            <br/>
                            <input name="rekapitulasi_laporan" type="file" class="file-input @error('rekapitulasi_Laporan') is-invalid @enderror"
                            data-show-caption="false" data-show-upload="false" data-browse-class="btn btn-primary btn-xs" data-remove-class="btn btn-default btn-xs" required>
                            <span class="help-block">
                                Accepted formats: pdf, zip, rar  Max file size 50Mb
                            </span>
                        </div>
                        @error('rekapitulasi_laporan')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">SK Lisensi LSP</label>
                            <br/>
                            <input name="sk_lisensi" type="file" class="file-input @error('sk_lisensi') is-invalid @enderror"
                            data-show-caption="false" data-show-upload="false" data-browse-class="btn btn-primary btn-xs" data-remove-class="btn btn-default btn-xs" required>
                            <span class="help-block">
                                Accepted formats: pdf, zip, rar  Max file size 50Mb
                            </span>
                        </div>
                        @error('sk_lisensi')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Laporan tindak lanjut hasil pemantauan
                                dan evaluasi kinerja LSP dengan kondisi
                                atau perbaikan yang dilakukan LSP</label>
                            <br/>
                            <input name="laporan_tindak_lanjut" type="file" class="file-input @error('laporan_tindak_lanjut') is-invalid @enderror"
                            data-show-caption="false" data-show-upload="false" data-browse-class="btn btn-primary btn-xs" data-remove-class="btn btn-default btn-xs" required>
                            <span class="help-block">
                                Accepted formats: pdf, zip, rar  Max file size 50Mb
                            </span>
                        </div>
                        @error('laporan_tindak_lanjut')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
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
