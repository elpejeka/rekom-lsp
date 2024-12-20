@extends('layouts.app')
@section('page-header')
<div class="page-header page-header-default">
  <div class="page-header-content">
    <div class="page-title">
      <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Permohonan Pencatatan</h4>
    </div>
  </div>

  <div class="breadcrumb-line">
    <ul class="breadcrumb">
      <li><a href="{{route('home')}}"><i class="icon-home2 position-left"></i> Home</a></li>
      <li class="active">Pencatatan</li>
    </ul>
  </div>
</div>
@endsection

@section('content')
<div class="panel panel-flat">
  <div class="panel-heading">
    <h5 class="panel-title">Data Pencatatan</h5>
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
        <th>ID Izin</th>
        <th>Nama LSP</th>
        <th>Jenis Permohonan</th>
        <th>Tanggal Permohonan</th>
        <th class="text-center">Action</th>
      </tr>
    </thead>
    <tbody>
        @php
            $no = 1;
        @endphp
      @foreach ($data as $item)
      <tr>
        <td>{{$no++}}</td>
        <td>{{$item->id_izin}}</td>
        <td>{{$item->nama_lsp}}</td>
        <td>{{$item->jenis_permohonan}}</td>
        <td>{{$item->updated_at}}</td>
        <td>
          @if ($item->tgl_perbaikan == null)
            <a href="{{route('baru.permohonan', $item->id_izin)}}" class="btn btn-primary">
              Terima Permohonan
            <i class="icon-arrow-right14 position-right"></i></a>  
          @endif

          @if ($item->tgl_perbaikan != null)
            <a href="{{route('update.portal', $item->id_izin)}}" class="btn btn-primary">
              Update Permohonan
            <i class="icon-arrow-right14 position-right"></i></a>  
          @endif
        </td>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
