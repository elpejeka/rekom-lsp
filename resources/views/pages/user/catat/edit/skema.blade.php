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
                <form class="form-horizontal" action="{{route('pencatatan.skema.update', $data->id)}}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                  @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Jenis Permohonan</label>
                            <select class="form-control" name="pencatatan_id" required>
                              <optgroup label="PERMOHONAN">
                                @foreach ($permohonan as $item)
                                    @if ($loop->first)
                                    <option value="{{$item->id}}">{{$item->permohonan}}</option>
                                    @endif
                              @endforeach
                              </optgroup>
                            </select>
                            <span class="invalid-feedback" role="alert">
                              *) Pastikan untuk memilih jenis permohonan pada menu permohonan terlebih dahulu.
                            </span>
                        </div>
                        @error('pencatatan_id')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Kode Skema</label>
                            <input type="text" class="form-control @error('kode_skema') is-invalid @enderror" name="kode_skema" value="{{$data->kode_skema}}" required>
                            @error('kode_skema')
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
                          <label class="control-label">Nama Skema</label>
                          <select class="form-control" id="nama_skema">
                            <optgroup label="RUANG LINGKUP">
                                <option value="{{$data->nama_skema}}">-- {{$data->nama_skema}}</option>   
                                @foreach ($items as $jabker)
                                <option value="{{$jabker->id}}">{{$jabker->jabatan_kerja}}</option>
                                @endforeach
                            </optgroup>
                        </select>
                      </div>
                      @error('nama_skema')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>    
                  <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Jabatan Kerja</label>
                        <input type="text" name="jabker" id="jabker" class="form-control" value="{{$data->jabker}}" readonly/>
                        <input type="hidden" name="nama_skema" id="skema" value="{{$data->nama_skema}}" class="form-control"/>
                        @error('jabker')    
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
                        <label class="control-label">Klasifikasi</label>
                        <input type="text" name="klasifikasi" id="klasifikasi" class="form-control" value="{{$data->klasifikasi}}" readonly />
                        @error('klasifikasi')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                      </div>
                      @error('klasifikasi')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>    
                  <div class="col-md-6">
                      <div class="form-group">
                          <label class="control-label">Subklasifikasi</label>
                          <input type="text" name="sub_klasifikasi" id="subklasifikasi" class="form-control" value="{{$data->sub_klasifikasi}}" readonly />
                          @error('sub_klasifikasi')
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
                          <label class="control-label">Kualifikasi</label>
                          <input type="text" name="kualifikasi" id="kualifikasi" class="form-control" value="{{$data->kualifikasi}}" readonly />
                      </div>
                      @error('kualifikasi')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>    
                  <div class="col-md-6">
                      <div class="form-group">
                          <label class="control-label">Jenjang</label>
                          <input type="text" name="jenjang" id="jenjang" class="form-control" value="{{$data->jenjang}}" readonly />
                          @error('jenjang')
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
                          <label class="control-label">Acuan Skema</label>
                          <input class="form-control @error('acuan_skema') is-invalid @enderror" name="acuan_skema" value="{{$data->acuan_skema}}" type="text" id="acuan" readonly>
                      </div>
                      @error('acuan_skema')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>    
                  <div class="col-md-6">
                      <div class="form-group">
                          <label class="control-label">Jumlah Unit Kompetensi</label>
                          <input type="number" class="form-control @error('jumlah_unit') is-invalid @enderror" name="jumlah_unit" value="{{$data->jumlah_unit}}" required>
                          @error('jumlah_unit')
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
                                <label class="control-label">Dokumen Skema Sertifikasi</label>
                            </div>
                            <div class="col-md-6">
                                <input name="upload_persyaratan" type="file" class="form-control @error('upload_persyaratan') is-invalid @enderror"
                                data-show-caption="false" data-show-upload="false" data-browse-class="btn btn-primary btn-xs" data-remove-class="btn btn-default btn-xs">
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

@push('addon-script')
<script>
    $(document).ready(function () {
        $('#list').DataTable();
    });

    $('#nama_skema').on('change', function(){
          var id = $(this).find('option').filter(':selected').val();
          
          $.ajax({
            url : '/reference/jabker/'+id,
            type : 'GET',
            success:function(res){
              var data = res.data

              $('#klasifikasi').val(data.klasifikasi)
              $('#subklasifikasi').val(data.subklasifikasi)
              $('#kualifikasi').val(data.kualifikasi)
              $('#jabker').val(data.jabatan_kerja)
              $('#skema').val(data.jabatan_kerja)
              $('#jenjang').val(data.jenjang)
              $('#acuan').val(data.acuan)
            }
          })
      })
  </script>
@endpush