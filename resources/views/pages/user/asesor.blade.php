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
<form class="form-horizontal" action="{{route('asesor_store')}}" method="POST" enctype="multipart/form-data">
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
                <input type="text" class="form-control @error('nama_asesor') is-invalid @enderror" name="nama_asesor" required>
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
                    <input type="number" class="form-control @error('nik') is-invalid @enderror" name="nik" required>
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

            
            <div class="form-group">
              <label class="col-lg-3 control-label">NPWP</label>
                  <div class="col-lg-9">
                    <input type="text" class="form-control @error('npwp') is-invalid @enderror" name="npwp" required>
                  </div>
                  @error('npwp')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>

            <div class="form-group">
              <label class="col-lg-3 control-label">Email</label>
                  <div class="col-lg-9">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" required>
                  </div>
                  @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>

            <div class="form-group">
              <label class="col-lg-3 control-label">No Handphone</label>
                  <div class="col-lg-9">
                    <input type="number" class="form-control @error('no_telpon') is-invalid @enderror" name="no_telpon" required>
                  </div>
                  @error('no_telpon')
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
                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" required>
                  </div>
                  @error('alamat')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>

            <div class="form-group">
              <label class="col-lg-3 control-label">Provinsi</label>
              <div class="col-lg-9">
                <select class="select-search" name="provinsi" id="provinsi">
                    <option value="">Pilih Provinsi</option>
                @foreach ($propinsi as $prov)
                  <option value="{{$prov->id_propinsi_dagri}}">{{$prov->Nama}}</option>
                @endforeach
                </select>
              </div>
              @error('provinsi')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="form-group">
              <label class="col-lg-3 control-label">Kabupaten / Kota</label>
              <div class="col-lg-9">
                <select class="select-search" name="kab_kota" id="kab_kota">
                  <option value="">Pilih Kabupaten / Kota</option>
                </select>
              </div>
              @error('kab_kota')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="form-group">
              <label class="col-lg-3 control-label">Status Asesor</label>
              <div class="col-lg-9">
                <select class="select-search" name="status_asesor">
                        <option value="Internal">Internal</option>
                        <option value="External">External</option>
                </select>
              </div>
              @error('status_asesor')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
        
            
            <div class="form-group">
              <label class="col-lg-3 control-label">Tempat Lahir</label>
                  <div class="col-lg-9">
                    <select class="select-search" name="tempat_lahir">
                      <option value="">Pilih Provinsi</option>
                      @foreach ($propinsi as $prov)
                        <option value="{{$prov->id_propinsi_dagri}}">{{$prov->Nama}}</option>
                      @endforeach
                  </select>
                  </div>
                  @error('tgl_lahir')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>

            <div class="form-group">
              <label class="col-lg-3 control-label">Tanggal Lahir</label>
                  <div class="col-lg-9">
                    <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror" name="tgl_lahir" required>
                  </div>
                  @error('tgl_lahir')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>

             
            <div class="form-group">
              <label class="col-lg-3 control-label">Pendidikan</label>
                  <div class="col-lg-9">
                    <input type="text" class="form-control @error('pendidikan') is-invalid @enderror" name="pendidikan" required>
                  </div>
                  @error('pendidikan')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>
            
          </fieldset>
        </div>

        {{-- <div class="col-md-6">
          <fieldset>

            <div class="form-group">
              <label class="col-lg-3 control-label">Daftar Asesor</label>
                <div class="col-lg-9">
                    <input name="upload_persyaratan" type="file" class="file-input @error('upload_persyaratan') is-invalid @enderror"
                    data-show-caption="false" data-show-upload="false" data-browse-class="btn btn-primary btn-xs" data-remove-class="btn btn-default btn-xs" required>
                    <span class="help-block">
                      Accepted formats: pdf, zip, rar  Max file size 50Mb
                    </span>
                    <div class="progress" style="display:none;">
                      <div id="progress-bar-1" class="progress-bar progress-bar-success progress-bar-striped active " role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
                        20%
                      </div>
                    </div>
                </div>
            </div>

          </fieldset>
        </div>

        <div class="col-md-6">
          <fieldset>

            <div class="form-group">
              <label class="col-lg-3 control-label">Surat Pernyatan Komitmen</label>
                <div class="col-lg-9">
                    <input name="surat_pernyataan" type="file" class="file-input @error('surat_pernyataan') is-invalid @enderror"
                    data-show-caption="false" data-show-upload="false" data-browse-class="btn btn-primary btn-xs" data-remove-class="btn btn-default btn-xs" required>
                    <span class="help-block">
                      Accepted formats: pdf, zip, rar  Max file size 50Mb
                    </span>
                    <div class="progress" style="display:none;">
                      <div id="progress-bar-1" class="progress-bar progress-bar-success progress-bar-striped active " role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
                        20%
                      </div>
                    </div>
                </div>
            </div>

          </fieldset>
        </div> --}}
      </div>
      
      <div class="text-right">
        <button type="submit" class="btn btn-primary">Submit<i class="icon-arrow-right14 position-right"></i></button>
      </div>
  
    </div>

  </div>
</form>

<div class="panel panel-flat">
  <div class="panel-heading">
    <h5 class="panel-title">Data Asesor</h5>
    <div class="heading-elements">
      <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
              </ul>
            </div>
  </div>

  <div class="panel-body">
    
  </div>

  <table class="table datatable-show-all">
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
    @php
    $no = 1;
    @endphp
      @foreach ($asesor as $item)
      <tr>
        <td>{{$no++}}</td>
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
          <a href="#mymodal"
          data-remote="{{route('asesor.show', $item->slug)}}" 
          data-toggle="modal"
          data-target="#mymodal"
          data-title="Detail Asesor {{$item->nama_asesor}}"
          class="btn btn-sm btn-info">
        <i class="icon-eye2"></i> Cek Sertifikat</a>
          <form action="{{route('delete.asesor', $item->id)}}" method="post">
            @csrf
            @method('delete')
          <button class="btn btn-danger btn-sm mt-5"><i class="icon-trash"></i></button>
          </form>
        </td>
      </tr> 
      @endforeach
    </tbody>
  </table>
</div>
@endsection
@push('addon-script')
<script>
  jQuery(document).ready(function($){
      $('#mymodal').on('show.bs.modal', function(e){
          var button = $(e.relatedTarget);
          var modal = $(this);
          modal.find('.modal-body').load(button.data("remote"));
          modal.find('.modal-title').html(button.data("title"));
      });
      
      $(".modal").on("hidden.bs.modal", function(){
        $(".modal-body").html("");
      });
  });
</script>

<script>
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


<div class="modal" id="mymodal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title"></h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              <i class="fa fa-spinner fa-spin"></i>
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
            
      </div>
  </div>
</div>
@endpush
