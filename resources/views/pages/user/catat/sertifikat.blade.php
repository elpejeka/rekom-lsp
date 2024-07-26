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
                <form class="form-horizontal" action="{{route('pencatatan.sertifikat.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                <input type="hidden" class="form-control @error('asesor_id') is-invalid @enderror" name="asesor_id" value="{{$asesor->id}}">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">Nama Asesor</label>
                            <input type="text" class="form-control @error('nama_asesor') is-invalid @enderror" value={{$asesor->nama_asesor}} readonly>
                            <input value="{{$asesor->nik}}" id="nik" hidden/>
                        </div>
                        @error('nama_asesor')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Klasifikasi</label>
                            <input type="text" class="form-control @error('klasifikasi') is-invalid @enderror" id="klasifikasi" name="klasifikasi" readonly>
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
                            <input type="text" class="form-control @error('subklasifikasi') is-invalid @enderror" id="subklasifikasi" name="subklasifikasi" readonly>
                        </div>
                        @error('subklasifikasi')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>    
                </div>
                <div class="row mt-5">
                    <div class="col-md-12">
                        <legend class="text-semibold text-sm"><i class="icon-reading position-left"></i>Sertifikat Kompetensi Asesor</legend>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Nomor Registrasi Sertifikat</label>
                            <select class="form-control @error('no_sertifikat') is-invalid @enderror" name="no_sertifikat" id="noreg">
                            </select>
                        </div>
                        @error('no_sertifikat')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Masa Berlaku</label>
                            <input type="date" class="form-control @error('masa_berlaku') is-invalid @enderror" name="masa_berlaku" required>
                            @error('masa_berlaku')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-md-12">
                        <h5>SERTIFIKAT ASESOR BNSP</h5>
                    </div>
                    <div class="col-md-6 mt-2">
                        <div class="form-group">
                            <label class="control-label">Nomor Registrasi Sertifikat</label>
                            <input type="text" class="form-control @error('no_reg_asesor') is-invalid @enderror" name="no_reg_asesor" value="MET." required>
                        </div>
                        @error('no_reg_asesor')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>    
                    <div class="col-md-6">
                        <div class="form-group mt-2">
                            <label class="control-label">No Sertifikat Asesor</label>
                            <input type="text" class="form-control @error('no_sertifikat_asesor') is-invalid @enderror" name="no_sertifikat_asesor" required>
                            @error('no_sertifikat_asesor')
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
                            <label class="control-label">No Blanko</label>
                            <input type="text" class="form-control @error('no_blanko') is-invalid @enderror" name="no_blanko" required>
                        </div>
                        @error('no_blanko')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Kualifikasi</label>
                            <input type="text" class="form-control @error('kualifikasi_sertifikat') is-invalid @enderror" name="kualifikasi_sertifikat" required>
                        </div>
                        @error('kualifikasi_sertifikat')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>    
                </div>
                <div class="row mt-4">
                <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Masa Berlaku Sertifikat Asesor</label>
                            <input type="date" class="form-control @error('masa_berlaku_sertifikat') is-invalid @enderror" name="masa_berlaku_sertifikat" required>
                            @error('masa_berlaku_sertifikat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                            <div class="col-md-6">
                                <label class="control-label">
                                    Sertifikasi Asesor
                                </label>
                                <input name="sertifikat_asesors" type="file" class="form-control @error('sertifikat_asesors') is-invalid @enderror"
                                data-show-caption="false" data-show-upload="false" data-browse-class="btn btn-primary btn-xs" data-remove-class="btn btn-default btn-xs" required>
                                <span class="help-block">
                                  Accepted formats: pdf, zip, rar, jpeg, jpg, png Max file size 20Mb
                                </span>
                                <div class="progress" style="display:none;">
                                  <div id="progress-bar-1" class="progress-bar progress-bar-success progress-bar-striped active " role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
                                    20%
                                  </div>
                                </div>
                                @error('sertifikat_asesors')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
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
      <div class="col-sm-12 col-xl-12">
        <div class="card">
            <div class="card-header">
              <h4>List Sertifikat</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="list" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No Registrasi Asesor</th>
                                <th>No SKK / SKA</th>
                                <th>Dokumen</th>
                                <th>No Sertifikat</th>
                                <th>No Blanko</th>
                                <th>Dokumen</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sertifikat as $item)
                            <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->no_reg_asesor}}</td>
                            <td>{{$item->no_sertifikat}}</td>
                            <td>
                                <a href="{{asset('laravel/storage/app/public/'. $item->ska)}}" target="_blank" type="button" name="btn_cek_13" 
                                    class="open-delete btn btn-primary btn-labeled btn-rounded">
                                    <b><i class="icon-file-check"></i></b> Softcopy</a>
                                  </td>
                              <td>{{$item->no_sertifikat_asesor}}</td>
                              <td>{{$item->no_blanko}}</td>
                              <td>
                                <a href="{{asset('laravel/storage/app/public/'. $item->sertifikat_asesors)}}" target="_blank" type="button" name="btn_cek_13" 
                                    class="open-delete btn btn-primary btn-labeled btn-rounded">
                                    <b><i class="icon-file-check"></i></b> Softcopy</a>
                                  </td>
                              <td class="text-center">
                                <a href="{{route('pencatatan.sertifikat.edit', $item->id)}}" class="btn btn-sm btn-primary"><i class="icon-pencil"></i></a>
                                <form action="{{route('pencatatan.sertifikat.delete', $item->id)}}" method="post" class="d-inline">
                                  @csrf
                                  @method('delete')
                                <button class="btn btn-danger btn-sm    "><i class="icon-trash"></i></button>
                                </form>
                              </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
      </div>
  </div>
</div>
@endsection

@push('addon-script')
<script>
    $(document).ready(function () {
        $('#list').DataTable();

        var nik = $('#nik').val()
        $.ajax({
          url : "/rekomendasi-lsp/get-sertifikat/"+nik,
          type : 'GET',
          success:function(res){
            $('#noreg').empty();
            $('#noreg').append('<option>Pilih Sertifikat</option>');
            for (var i = 0; i <= res.data.length; i++){
              $('#noreg').append('<option value="'+res.data[i].nomor_registrasi+'">'+res.data[i].nomor_registrasi +"-" +res.data[i].subklasifikasi+'</option>');
            }
          }
        })
    });

    $('#noreg').on('change', function(){
      var noreg = $(this).find('option').filter(':selected').val()
      $.ajax({
        url : '/rekomendasi-lsp/detail-sertifikat/'+noreg,
        type : 'GET',
        success:function(res){
          var klas = res.data[0].klasifikasi;
          var sub = res.data[0].subklasifikasi;
          var berlaku = res.data[0].tanggal_masa_berlaku;

          $('#klasifikasi').val(klas)
          $('#subklasifikasi').val(sub)
          $('#masa_berlaku').val(berlaku)
        }
      })
    })
</script>
@endpush