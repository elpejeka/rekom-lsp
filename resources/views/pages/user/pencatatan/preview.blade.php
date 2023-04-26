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
        <th>Surat Permohonan</th>
        <th>SK Lisensi BNSP</th>
        <th>Sertifikat Lisensi BNSP</th>
        <th class="text-center">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($permohonan as $item)
      <tr>
        <td>
            <a href="{{asset('laravel/storage/app/public/'. $item->upload_persyaratan)}}" target="_blank" type="button" name="btn_cek_13" 
                class="open-delete btn btn-primary btn-labeled btn-rounded">
                <b><i class="icon-file-check"></i></b> Softcopy</a>
        </td>
        <td>
          <a href="{{asset('laravel/storage/app/public/'. $item->sk_lisensi)}}" target="_blank" type="button" name="btn_cek_13" 
              class="open-delete btn btn-primary btn-labeled btn-rounded">
              <b><i class="icon-file-check"></i></b> Softcopy</a>
        </td>
        <td>
            <a href="{{asset('laravel/storage/app/public/'.$item->sertifikat)}}" target="_blank" type="button" name="btn_cek_13" 
                class="open-delete btn btn-primary btn-labeled btn-rounded">
                <b><i class="icon-file-check"></i></b> Softcopy</a>
              </td>
          <td class="text-center">
          @if($item->submit_pencatatan == null)
          <a href="{{route('pencatatan.edit', $item->id)}}" class="btn btn-sm btn-primary"><i class="icon-pencil"></i></a>
            <a href="{{route('pencatatan.liat', $item->id)}}" class="btn btn-primary btn-sm">Submit Pencatatan</a>
            @else
              <span class="badge badge-success">Submitted</span>
              <a href="{{route('pencatatan.edit', $item->id)}}" class="btn btn-sm btn-primary"><i class="icon-pencil"></i></a>
              <a href="{{route('list.komen', $item->id  )}}" class="btn btn-sm btn-primary">Cek Perbaikan</a>
            @endif
        </td>
        
      </tr> 
      @endforeach
    </tbody>
  </table>
</div>
@endsection
