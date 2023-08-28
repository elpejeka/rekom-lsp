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
                <form class="form-horizontal"  action="{{route('asesor_store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Nama Asesor</label>
                            <input type="text" class="form-control @error('nama_asesor') is-invalid @enderror" name="nama_asesor" required>
                        </div>
                        @error('nama_asesor')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">NIK</label>
                            <input type="text" class="form-control @error('nik') is-invalid @enderror" name="nik" required>
                            @error('nik')
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
                            <label class="control-label">Tercatat LPJK</label>
                            <select class="form-control" name="tercatat">
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
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">NPWP</label>
                            <input type="text" class="form-control @error('npwp') is-invalid @enderror" name="npwp" required>
                            @error('npwp')
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
                            <label class="control-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" required>
                        </div>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">No Handphone</label>
                            <input type="number" class="form-control @error('no_telpon') is-invalid @enderror" name="no_telpon" required>
                            @error('no_telpon')
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
                            <label class="control-label">Alamat</label>
                            <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" required>
                        </div>
                        @error('alamat')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Provinsi</label>
                            <select class="form-control" name="provinsi" id="provinsi">
                                <option value="">Pilih Provinsi</option>
                                @foreach ($propinsi as $prov)
                                <option value="{{$prov->id_propinsi_dagri}}">{{$prov->Nama}}</option>
                                @endforeach
                            </select>
                            @error('provinsi')
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
                            <label class="control-label">Kabupaten / Kota</label>
                            <select class="form-control" name="kab_kota" id="kab_kota">
                                <option value="">Pilih Kabupaten / Kota</option>
                            </select>
                        </div>
                        @error('kab_kota')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Status Asesor</label>
                            <select class="form-control" name="status_asesor">
                                <option value="Internal">Internal</option>
                                <option value="External">External</option>
                            </select>
                            @error('status_asesor')
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
                            <label class="control-label">Tempat Lahir</label>
                            <select class="form-control" name="tempat_lahir">
                                <option value="">Pilih Provinsi</option>
                                @foreach ($propinsi as $prov)
                                  <option value="{{$prov->id_propinsi_dagri}}">{{$prov->Nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('tempat_lahir')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Tanggal Lahir</label>
                            <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror" name="tgl_lahir" required>
                            @error('tgl_lahir')
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
                            <label class="control-label">Pendidikan</label>
                            <input type="text" class="form-control @error('pendidikan') is-invalid @enderror" name="pendidikan" required>
                        </div>
                        @error('pendidikan')
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
                        <th>NIK</th>
                        <th>Nama Asesor</th>
                        <th>Tercatat</th>
                        <th>Alamat</th>
                        <th>Status Asesor</th>
                        <th>Skema dan Sertifikat</th>
                        <th class="text-center">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($asesor as $item)
                      <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->nik}}</td>
                        <td>{{$item->nama_asesor}}</td>
                        <td>
                        <span class="badge badge-primary">{{$item->tercatat == 1 ? "Ya" : 'Tidak'}}</span>
                        </td>
                        <td>{{$item->alamat}}</td>
                        <td>{{$item->status_asesor}}</td>
                        <td>
                        <a href="{{route('skema.asesor', $item->slug)}}" class="btn btn-sm btn-primary">
                            <i class="icon-plus2" aria-hidden="true"></i> Skema Serifikasi
                        </a>
                        <a href="{{route('sertifikat.asesor', $item->slug)}}" class="btn btn-sm btn-primary"><i class="icon-plus2" aria-hidden="true"></i> Sertifikat Asesor</a>
                        </td>
                        <td class="text-center">
                        <a href="{{route('edit.asesor', $item->id)}}" class="btn btn-sm btn-primary"><i class="icon-pencil"></i></a>
                        
                        <a data-toggle="modal" id="smallButton" data-target="#smallModal"
                                      data-attr="{{ route('asesor.show', $item->slug) }}" title="show" class="btn btn-sm btn-info">
                                    <i class="icofont icofont-eye-alt"></i> Detail
                        </a>
                        <form action="{{route('delete.asesor', $item->id)}}" method="post">
                            @csrf
                            @method('delete')
                        <button class="btn btn-danger btn-sm mt-3"><i class="icon-trash"></i></button>
                        </form>
                        </td>
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
<div class="modal" id="smallModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title-asesor"></h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body-asesor" id="smallBody">
                <i class="fa fa-spinner fa-spin"></i>
  
            </div>
            <div class="modal-footer-asesor">
              <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
            </div>
        </div>
    </div>
  </div>

<script>
    $(document).ready(function () {
        $('#list').DataTable();
    });

    $(document).on('click', '#smallButton', function(event) {
            event.preventDefault();
            let href = $(this).attr('data-attr');
            $.ajax({
                url: href,
                beforeSend: function() {
                    $('#loader').show();
                },
                // return the result
                success: function(result) {
                    $('#smallModal').modal("show");
                    $('#smallBody').html(result).show();
                },
                complete: function() {
                    $('#loader').hide();
                },
                error: function(jqXHR, testStatus, error) {
                    console.log(error);
                    alert("Page " + href + " cannot open. Error:" + error);
                    $('#loader').hide();
                },
                timeout: 8000
            })
        });

    $('#provinsi').change(function(){
      var kode = $(this).val();
      console.log(kode)
      if(kode){
        $.ajax({
          type : "GET",
          url : "/lsp/kab_kota?id_propinsi_dagri="+kode,
          dataType : 'JSON',
          success:function(res){
            console.log(res)
            if(res){
              $('#kab_kota').empty();
              $("#kab_kota").append('<option>---Pilih Kabupaten / Kota---</option>');
              $.each(res,function(nama_kabupaten_dagri,id_kabupaten_dagri){
                    $("#kab_kota").append('<option value="'+id_kabupaten_dagri+'">'+nama_kabupaten_dagri+'</option>');
              });
            }else{
              $('#kab_kota').empty();
            }
          }
        })
      }else{
        $('#kab_kota').empty();
      }
    })
  </script>
@endpush