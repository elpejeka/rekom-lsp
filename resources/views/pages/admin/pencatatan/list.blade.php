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
        <th>Nama LSP</th>
        <th>Jenis Permohonan</th>
        <th>Tanggal Submit</th>
        <th>Tanggal Pencatatan</th>
        <th>Status</th>
        <th class="text-center">Action</th>
      </tr>
    </thead>
    <tbody>
        @php
            $no = 1;
        @endphp
      @foreach ($permohonan as $item)
      <tr>
        <td>{{$no++}}</td>
        <td>{{$item->administrations->nama}}
        <td>{{$item->permohonan}}</td>
        <td>{{$item->submit_pencatatan}}</td>
        <td>{{$item->approve}}</td>
        @if($item->approve == null)
        <td class="text-center"><span class="badge badge-warning">---</span></td>
        <td class="text-center">
          <a href="{{route('pencatatan.approve', $item->slug)}}" class="btn btn-primary btn-sm">Cek Kesesuaian</a>
          <a href="{{route('pencatatan.edit', $item->id)}}" class="btn btn-warning btn-sm">Edit</a>
        </td>
        @else
        <td class="text-center>
        <span class="badge badge-success">Selesai</span></td>
        <td class="text-center">   
          <a href="{{route('kirim.email', $item->users_id)}}" class="btn btn-sm btn-primary">Kirim Dokumentasi</a>
          <a href="{{route('pencatatan.approve', $item->slug)}}" class="btn btn-primary btn-sm">Detail</a>
          <a href="{{route('sekretariat.edit', $item->id)}}" class="btn btn-warning btn-sm">Edit</a>
        </td>
        
        </td>
        @endif
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
