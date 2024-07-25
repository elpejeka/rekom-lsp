@extends('layouts.app')
@section('page-header')
<div class="page-header page-header-default">
  <div class="page-header-content">
    <div class="page-title">
      <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Rincian Permohonan</h4>
    </div>
  </div>

  <div class="breadcrumb-line">
    <ul class="breadcrumb">
      <li><a href="{{route('home')}}"><i class="icon-home2 position-left"></i> Home</a></li>
      <li class="active">Rincian Permohonan</li>
    </ul>
  </div>
</div>
@endsection
@section('content')
  <div class="panel panel-flat">
    <div class="panel-heading">
      <h5 class="panel-title">Administrasi</h5>
      <div class="heading-elements">
        <ul class="icons-list">
                  <li><a data-action="collapse"></a></li>
                </ul>
              </div>
    </div>

    <div class="panel-body">
      <div class="row">
            <div class="col-md-12">
                <table class="table table-lg">
                    <thead>
                        <tr>
                            <td>Data</td>
                            <td>Description</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Nama LSP</td>
                            <td>{{$data->nama_lsp}}</td>
                        </tr>
                        <tr>
                            <td>Unsur Pembentuk LSP</td>
                            <td>{{$data->administrasi->unsur_pembentuk}}</td>
                        </tr>
                        <tr>
                            <td>Nama Unsur Pembentuk LSP</td>
                            <td><span class="badge badge-info">{{$data->asosiasi->asosiasi}}</span><span class="badge badge-info">{{$data->asosiasi1->asosiasi}}</span>
                              <span class="badge badge-info">{{ $data->asosiasi2->asosiasi}}</span></td>
                        </tr>
                        <tr>
                        {{-- @foreach ($data->asesors as $item)      
                            <td>Asesor</td>
                            <td>
                            <a href="{{asset('laravel/storage/app/public/'.$item->upload_persyaratan)}}" target="_blank" type="button" name="btn_cek_13" 
                                                    class="open-delete btn btn-primary btn-labeled btn-rounded">
                                                    <b><i class="icon-file-check"></i></b> Softcopy</a>
                            </td>
                        @endforeach --}}
                        </tr>
                    </tbody>
                </table>
            </div>
      </div>
        
    </div>

    <table class="table datatable-show-all">
        <thead>
          <tr>
            <th>Kode Skema</th>
            <th>Nama Skema</th>
            <th>Klasifikasi</th>
            <th>Subklasifikasi</th>
            <th>Kualifikasi</th>
            <th>Acuan Skema</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($data->sertifikat_lsp as $skema)
          <tr>
            <td>{{$skema->kode_skema}}</td>
            <td>{{$skema->nama_skema}}</td>
            <td>{{$skema->klasifikasi}}</td>
            <td>{{$skema->sub_klasifikasi}}</td>
            <td>{{$skema->kualifikasi}}</td>
            <td>{{$skema->acuan_skema}}</td>      
          </tr>
          @endforeach
        </tbody>
      </table>
  </div>
  
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
        <th class="text-center">Action</th>
      </tr>
    </thead>
    <tbody>
    @php
    $no= 1;
    @endphp
      @foreach ($data->asesors as $item)
      @if($item->upload_persyaratan == null && $item->surat_pernyataan == null)
      <tr>
        <td>{{$no++}}</td>
        <td>{{$item->nik}}</td>
        <td>{{$item->nama_asesor}}</td>
        <td>
          <span class="badge badge-primary">{{$item->tercatat == 1 ? "Ya" : 'Tidak'}}</span>
          </td>
        <td>{{$item->alamat}}</td>
        <td>{{$item->status_asesor}}</td>
        <td class="text-center">
          <a href="#mymodal"
          data-remote="{{route('asesor.show', $item->slug)}}" 
          data-toggle="modal"
          data-target="#mymodal"
          data-title="Detail Asesor {{$item->nama_asesor}}"
          class="btn btn-sm btn-info">
            <i class="icon-eye2"></i></a>
        </td>
      </tr> 
        @else
        <tr>
        </tr>
      @endif
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
