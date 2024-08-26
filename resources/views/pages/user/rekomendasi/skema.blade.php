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
                <form class="form-horizontal" action="{{route('sertifikasi_lsp_store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Permohonan</label>
                            <select class="form-control" name="permohonans_id" required>
                              <optgroup label="PERMOHONAN">
                                @foreach ($permohonan as $pmhn)
                                  @if (!$pmhn->status_submit)
                                  <option value="{{$pmhn->id}}">{{$pmhn->jenis_permohonan}} ({{ date('d-m-Y', strtotime($pmhn->created_at)) }})</option>
                                  @endif
                                @endforeach
                              </optgroup>
                            </select>
                            <span class="invalid-feedback" role="alert">
                              *) Pastikan untuk memilih jenis permohonan pada menu permohonan terlebih dahulu.
                            </span>
                        </div>
                        @error('permohonans_id')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Kode Skema</label>
                            <input type="text" class="form-control @error('kode_skema') is-invalid @enderror" name="kode_skema" required>
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
                          <label class="control-label">Permohonan</label>
                          <select class="form-control" name="nama_skema">
                            <optgroup label="RUANG LINGKUP">
                                <option value="">Pilih Skema Sertifikasi</option>   
                              @foreach ($items as $jabker)
                                <option value="{{$jabker->jabatan_kerja}}">{{$jabker->jabatan_kerja}}</option>
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
                          <select class="form-control" name="jabker">
                            <optgroup label="RUANG LINGKUP">
                                <option value="">Pilih Skema Sertifikasi</option>   
                              @foreach ($items as $jabker)
                                <option value="{{$jabker->jabatan_kerja}}">{{$jabker->jabatan_kerja}}</option>
                              @endforeach
                            </optgroup>
                        </select>
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
                          <select class="form-control" name="klasifikasi">
                            <optgroup label="RUANG LINGKUP">
                              @foreach ($data as $item)
                              <option value="{{$item->klas->nama}}">{{$item->klas->nama}}</option>
                              @endforeach
                            </optgroup>
                        </select>
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
                          <select class="form-control" name="sub_klasifikasi">
                            <optgroup label="SUBKLASIFIKASI">
                              @foreach ($data as $item)
                                <option value="{{$item->subklas->nama}}">{{$item->subklas->nama}}</option>
                              @endforeach
                            </optgroup>
                        </select>
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
                          <label class="control-label">Kualifikasi</label>
                          <select class="form-control" name="kualifikasi">
                              <optgroup label="KUALIFIKASI">
                                <option value="">Pilih Kualifikasi</option>
                                <option value="Ahli">Ahli</option>
                                <option value="Teknisi">Teknisi/Analis</option>
                                <option value="Operator">Operator</option>
                              </optgroup>
                        </select>
                      </div>
                      @error('kualifikasi')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>    
                  <div class="col-md-6">
                      <div class="form-group">
                          <label class="control-label">Jumlah Unit Kompetensi</label>
                          <input type="number" class="form-control @error('jumlah_unit') is-invalid @enderror" name="jumlah_unit" min="0" required>
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
                          <label class="control-label">Acuan Skema</label>
                          <select class="form-control" name="acuan_skema">
                            <optgroup label="Acuan Skema">
                              <option value="SKKNI">SKKNI</option>
                              <option value="SKK Khusus">SKK Khusus</option>
                              <option value="Standar Internasional">Standar Internasional</option>
                          </optgroup>
                        </select>
                      </div>
                      @error('acuan_skema')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>    
                  <div class="col-md-6">
                      <div class="form-group">
                          <label class="control-label">Jenjang</label>
                          <input type="number" class="form-control @error('jenjang') is-invalid @enderror" name="jenjang" min="0" required>
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
                          <div class="row">
                              <div class="col-md-6">
                                  <label class="control-label">
                                    Dokumen standar kompetensi
                                    kerja yang diacu (SKKNI/ SKK
                                    Khusus/ Standar
                                    Internasional)
                                  </label>
                              </div>
                              <div class="col-md-6">
                                  <input name="upload_persyaratan" type="file" class="form-control @error('upload_persyaratan') is-invalid @enderror"
                                  data-show-caption="false" data-show-upload="false" data-browse-class="btn btn-primary btn-xs" data-remove-class="btn btn-default btn-xs" required>
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
                  <div class="col-md-6">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label class="control-label">Dokumen Skema Sertifikasi</label>
                            </div>
                            <div class="col-md-6">
                                <input name="standar_kompetensi" type="file" class="form-control @error('standar_kompetensi') is-invalid @enderror"
                                data-show-caption="false" data-show-upload="false" data-browse-class="btn btn-primary btn-xs" data-remove-class="btn btn-default btn-xs" required>
                                <span class="help-block">
                                  Accepted formats: pdf, zip, rar, jpeg, jpg, png Max file size 20Mb
                                </span>
                                <div class="progress" style="display:none;">
                                  <div id="progress-bar-1" class="progress-bar progress-bar-success progress-bar-striped active " role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
                                    20%
                                  </div>
                                </div>
                                @error('standar_kompetensi')
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
      <div class="col-sm-12 col-xl-12">
        <div class="card">
          <div class="card-header">
            <h4>List Skema</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="list" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                        <th>No</th>
                        <th>Kode Skema</th>
                        <th>Nama Skema</th>
                        <th>Jabatan Kerja</th>
                        <th>Klasifikasi</th>
                        <th>Subklasifikasi</th>
                        <th>Kualifikasi</th>
                        <th>Jenjang</th>
                        <th>Jumlah Unit</th>
                        <th>Acuan Skema</th>
                        <th>Dokumen</th>
                        <th>Dokumen</th>
                        <th class="text-center">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($skema as $skema)
                      <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$skema->kode_skema}}</td>
                        <td>{{$skema->nama_skema}}</td>
                        <td>{{$skema->jabker}}</td>
                        <td>{{$skema->klasifikasi}}</td>
                        <td>{{$skema->sub_klasifikasi}}</td>
                        <td>{{$skema->kualifikasi}}</td>
                        <td>{{$skema->jenjang}}</td>
                        <td>{{$skema->jumlah_unit}}</td>
                        <td>{{$skema->acuan_skema}}</td>
                        <td>
                          <a href="{{asset('storage/'. $skema->upload_persyaratan)}}" target="_blank" type="button" name="btn_cek_13" 
                           class="open-delete btn btn-primary btn-labeled btn-rounded">
                           <b><i class="icon-file-check"></i></b> Softcopy</a>
                        </td>
                        <td>
                          <a href="{{asset('storage/'. $skema->standar_kompetensi)}}" target="_blank" type="button" name="btn_cek_13" 
                           class="open-delete btn btn-primary btn-labeled btn-rounded">
                           <b><i class="icon-file-check"></i></b> Softcopy</a>
                        </td>
                        @if ($skema->status_submit == null)
                        <td class="text-center">
                          <a href="{{route('edit.skema', $skema->id)}}" class="btn btn-primary" style="margin-bottom: 2px;">Edit</a>
                          <form action="{{route('delete.sertifikasi', $skema->id)}}" method="post" class="d-inline">
                            @csrf
                            @method('delete')
                          <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button>
                          </form>
                        </td>
                        @else
                            <td class="text-center">
                              Permohonan Skema Sudah Di Submit
                            </td>
                        @endif
                      @endforeach
                    </tbody>
              </table>
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
    });

    $('#klasifikasi').change(function(){
      var kode = $(this).val();
      if(kode){
        $.ajax({
          type : "GET",
          url : "/rekomendasi-lsp/get-subklas?kode="+kode,
          dataType : 'JSON',
          success:function(res){
            console.log(res)
            if(res){
              $('#subklas').empty();
              $("#subklas").append('<option>---Pilih Subklas---</option>');
              $.each(res,function(nama,kode_sub){
                    $("#subklas").append('<option value="'+kode_sub+'">'+nama+'</option>');
              });
            }else{
              $('#subklas').empty();
            }
          }
        })
      }else{
        $('#subklas').empty();
      }
    })
  </script>
@endpush