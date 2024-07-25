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
                <form class="form-horizontal" action="{{route('ext.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                <input type="hidden" class="form-control @error('asesor_id') is-invalid @enderror" name="asesor_id" value="{{$asesor->id}}">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">Nama Asesor</label>
                            <input type="text" class="form-control @error('nama_asesor') is-invalid @enderror" name="" value={{$asesor->nama_asesor}} readonly>
                        </div>
                        @error('nama_asesor')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">LSP Asal</label>
                            <input class="form-control @error('lsp_asal') is-invalid @enderror" name="lsp_asal" id="lsp_asal" />
                        </div>
                        @error('lsp_asal')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Dokumen Perjanjian / Perikatan</label>
                            <input name="upload_persyaratan" type="file" class="file-input @error('upload_persyaratan') is-invalid @enderror"
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
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-md-6 mt-2">
                        <div class="form-group">
                            <label class="control-label">Tanggal Awal Perserikatan</label>
                            <input type="date" class="form-control @error('tgl_mulai') is-invalid @enderror" name="tgl_mulai" required>
                        </div>
                        @error('tgl_mulai')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>    
                    <div class="col-md-6">
                        <div class="form-group mt-2">
                            <label class="control-label">Tanggal Akhir Perserikatan</label>
                            <input type="date" class="form-control @error('tgl_akhir') is-invalid @enderror" name="tgl_akhir" required>
                            @error('tgl_akhir')
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
                                <th>LSP Asal</th>
                                <th>Tanggal Awal Peminjaman</th>
                                <th>Tanggal Akhir Peminjaman</th>
                                <th>Dokumen</th>
                                <th class="text-center text-nowrap">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                            <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->lsp_asal}}</td>
                            <td>{{$item->tgl_mulai}}</td>
                            <td>{{$item->tgl_akhir}}</td>
                            <td>
                                <a href="{{asset('laravel/storage/app/public/'. $item->upload_persyaratan)}}" target="_blank" type="button" name="btn_cek_13"
                                    class="open-delete btn btn-primary btn-labeled btn-rounded">
                                    <b><i class="icon-file-check"></i></b> Softcopy</a>
                              </td>
                              <td class="text-center">
                                <a href="{{route('ext.edit', $item->id)}}" class="btn btn-sm btn-primary"><i class="icon-pencil"></i></a>
                                <form action="{{route('ext.delete', $item->id)}}" method="post" class="d-inline">
                                  @csrf
                                  @method('delete')
                                <button class="btn btn-danger btn-sm"><i class="icon-trash"></i></button>
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
          url : "/get-sertifikat/"+nik,
          type : 'GET',
          success:function(res){
            console.log(res.data)
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
        url : '/detail-sertifikat/'+noreg,
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