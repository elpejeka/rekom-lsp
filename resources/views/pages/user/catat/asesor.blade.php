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
                <form class="form-horizontal"  action="{{route('pencatatan.asesor.store')}}" method="POST" enctype="multipart/form-data">
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
                            <label class="control-label">Nama Asesor</label>
                            <input type="text" class="form-control @error('nama_asesor') is-invalid @enderror" name="nama_asesor" required>
                            @error('nama_asesor')
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
                            <label class="control-label">NIK</label>
                            <input type="number" class="form-control @error('nik') is-invalid @enderror" name="nik" required>
                        </div>
                        @error('nik')
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
            <h4>List Asesor</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="list" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                        <th>No</th>
                        <th>NIK</th>
                        <th>Nama Asesor</th>
                        <th>Propinsi</th>
                        <th>Alamat</th>
                        <th>Email</th>
                        <th>Tanggal Lahir</th>
                        <th>Pendidikan</th>
                        <th>Status Asesor</th>
                        <th>Nomor Registrasi Asesor LPJK</th>
                        <th>Status</th>
                        <th>Tayang</th>
                        <th class="text-center">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($asesor as $item)
                      <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->nik}}</td>
                        <td>{{$item->nama_asesor}}</td>
                        <td>{{$item->propinsi->Nama ?? '-'}}</td>
                        <td>{{$item->alamat}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{date_format(date_create($item->tgl_lahir), 'Y-m-d')}}</td>
                        <td>{{$item->pendidikan}}</td>
                        <td><span class="label label-success">{{$item->status_asesor}}</span></td>
                        <td>{{$item->no_registrasi_asesor}}</td>
                        <td>
                          @if($item->approve == null)
                          <span class="label label-primary">Not Approve</span>
                          @endif
                          @if($item->approve != null)
                          <span class="label label-success">Approved</span>
                          @endif
                        </td>
                        <td>
                          <span class="label label-success">{{$item->is_active == 1 ? 'YA' : 'Tidak'}}</span>
                        </td>
                        @if ($item->approve == null)
                        <td class="text-center">
                            <div class="btn-group">
                                <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Actions</button>
                                <ul class="dropdown-menu dropdown-block">
                                    <li><a class="dropdown-item" href="{{route('pencatatan.asesor.edit', $item->id)}}">Edit</a></li>
                                    <li><a class="dropdown-item" href="{{route('pencatatan.sertifikat.asesor', $item->id)}}">Tambah Sertifikat</a></li>
                                    <li><a data-toggle="modal" id="smallButton" data-target="#smallModal"
                                        data-attr="{{ route('sertifikat.show', $item->id) }}" title="show"  class="dropdown-item"> 
                                        <i class="icon-eye2"></i> Detail Asesor</a>
                                    </li>
                                    <li><form action="{{route('pencatatan.asesor.delete', $item->id)}}" method="post" class="d-inline mt-2">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm"><i class="icon-trash"></i> Hapus</button>
                                    </form></li>
                                    <li><a class="dropdown-item" href="{{route('ext.index', $item->id)}}">Dokumen Perjanjian</a></li>
                                    <li><a class="dropdown-item" href="{{route('asesor.tayang', $item->id)}}">Ubah Status Tayang</a></li>
                              </ul>
                            </div>        
                        </td>
                        @endif
                        @if ($item->approve != null)
                        <td class="text-center">
                            <div class="btn-group">
                                <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Actions</button>
                                <ul class="dropdown-menu dropdown-block">
                                    <li><a class="dropdown-item" href="{{route('pencatatan.asesor.edit', $item->id)}}">Edit</a></li>
                                    <li><a class="dropdown-item" href="{{route('pencatatan.sertifikat.asesor', $item->id)}}">Tambah Sertifikat</a></li>
                                    <li><a data-toggle="modal" id="smallButton" data-target="#smallModal"
                                        data-attr="{{ route('sertifikat.show', $item->id) }}" title="show"  class="dropdown-item"> 
                                        <i class="icon-eye2"></i> Detail Asesor</a>
                                    </li>
                                    <li><a class="dropdown-item" href="{{route('asesor.unactive', $item->id)}}">Status Unactive</a></li>
                                    <li><a class="dropdown-item" href="{{route('qr.surat', $item->id)}}">Surat Pencatatan Asesor</a></li>
                                    <li><a class="dropdown-item" href="{{route('ext.index', $item->id)}}">Dokumen Perjanjian</a></li>
                                    <li><a class="dropdown-item" href="{{route('asesor.tayang', $item->id)}}">Ubah Status Tayang</a></li>
                                    <li><a class="dropdown-item" href="javascript:void(0)" onclick="importAsesor({{$item->id}})">Import To Master Penugasan</a></li>
                              </ul>
                            </div>        
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
          url : "/rekomendasi-lsp/kab_kota?id_propinsi_dagri="+kode,
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

    function importAsesor(id){
            $.get('/rekomendasi-lsp/pencatatan/import-to-siki/'+id, function(data){
                alert(data.message);
            });
        }
  </script>
@endpush