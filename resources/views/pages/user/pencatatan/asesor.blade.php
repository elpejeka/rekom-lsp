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
<form class="form-horizontal" action="{{route('pencatatan.asesor.store')}}" method="POST" enctype="multipart/form-data">
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
          <legend class="text-semibold"><i class="icon-reading position-left"></i> Asesor</legend>
        </div>
        <div class="col-md-6">
          <fieldset>

            <div class="form-group">
              <label class="col-lg-3 control-label">Jenis Permohonan</label>
              <div class="col-lg-9">
                <select class="select-search" name="pencatatan_id">
                    @foreach ($permohonan as $item)
                        <option value="{{$item->id}}">{{$item->permohonan}}</option>
                    @endforeach
                </select>
              </div>
              @error('pencatatan_id')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

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



            

          </fieldset>
        </div>

        <div class="col-md-6">
          <fieldset>
            
            <div class="form-group">
              <label class="col-lg-3">Nomor Registrasi Asesor Di LPJK</label>
                  <div class="col-lg-9">
                    <input type="text" class="form-control @error('no_registrasi_asesor') is-invalid @enderror" name="no_registrasi_asesor" required>
                  </div>
                  @error('no_registrasi_asesor')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>

            
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
              <label class="col-lg-3 control-label">Status Asesor</label>
              <div class="col-lg-9">
                <select class="select-search" name="status_asesor">
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
        <th>Nama Asesor</th>
        <th>Alamat</th>
        <th>Status Asesor</th>
        <th>Nomor Registrasi Asesor</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
      @foreach ($asesor as $item)
      <tr>
        <td>{{$no++}}</td>
        <td>{{$item->nama_asesor}}</td>
        <td>{{$item->alamat}}</td>
        <td><span class="label label-success">{{$item->status_asesor}}</span></td>
        <td>{{$item->no_registrasi_asesor}}</td>
        <td class="text-center">
          <a href="{{route('pencatatan.asesor.edit', $item->slug)}}" class="btn btn-sm btn-primary"><i class="icon-pencil"></i></a>
          <a href="{{route('pencatatan.sertifikat.asesor', $item->slug)}}" class="btn btn-sm btn-primary"><i class="icon-plus2" aria-hidden="true"></i></a>
          <a href="#mymodal"
          data-remote="{{route('sertifikat.show', $item->slug)}}" 
          data-toggle="modal"
          data-target="#mymodal"
          data-title="Detail Asesor {{$item->nama_asesor}}"
          class="btn btn-sm btn-info">
      <i class="icon-eye2"></i></a>
          <form action="{{route('pencatatan.asesor.delete', $item->id)}}" method="post" class="d-inline mt-2">
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
  });
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
          </div>
      </div>
  </div>
</div>
@endpush