@extends('layouts.app')
@section('page-header')
<div class="page-header page-header-default">
  <div class="page-header-content">
    <div class="page-title">
      <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Tabel Kualifikasi</h4>
    </div>
  </div>

  <div class="breadcrumb-line">
    <ul class="breadcrumb">
      <li><a href="{{route('home')}}"><i class="icon-home2 position-left"></i> Home</a></li>
      <li class="active">Tabel Kualifikasi</li>
    </ul>
  </div>
</div>
@endsection

@section('content')

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
      @foreach ($asesor as $item)
      <tr>
        <td>#</td>
        <td>{{$item->nik}}</td>
        <td>{{$item->nama_asesor}}</td>
        <td>
          <span class="badge badge-primary">{{$item->tercatat == 1 ? "Ya" : 'Tidak'}}</span>
          </td>
        <td>{{$item->alamat}}</td>
        <td>{{$item->status_asesor}}</td>
        <td class="text-center">
          <a href="{{route('edit.asesor', $item->id)}}" class="btn btn-sm btn-primary"><i class="icon-pencil"></i></a>
          <a href="{{route('sertifikat.asesor', $item->slug)}}" class="btn btn-sm btn-primary"><i class="icon-plus2" aria-hidden="true"></i></a>
          <a href="#mymodal"
          data-remote="{{route('asesor.show', $item->slug)}}" 
          data-toggle="modal"
          data-target="#mymodal"
          data-title="Detail Asesor {{$item->nama_asesor}}"
          class="btn btn-sm btn-info">
      <i class="icon-eye2"></i></a>
          {{-- <form action="" method="post" class="d-inline">
            @csrf
            @method('delete')
          <button class="btn btn-danger btn-sm"><i class="icon-trash"></i></button>
          </form> --}}
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
