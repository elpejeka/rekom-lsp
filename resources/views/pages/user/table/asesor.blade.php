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
    <h5 class="panel-title">Data Kualifikasi</h5>
    <div class="heading-elements">
      <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
              </ul>
            </div>
  </div>

  <div class="panel-body">
    
  </div>
@if($item->status_submit == null)
  <table class="table datatable-show-all">
    <thead>
      <tr>
        <th>No</th>
        <th class="text-center">Dokumen Upload Asesor</th>
        <th class="text-center">Surat Pernyataan Komitmen</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($asesor as $item)
      <tr>
        <td>#</td>
        <td class="text-center">
          <a href="{{Storage::url($item->upload_persyaratan)}}" target="_blank" type="button" name="btn_cek_13" 
            class="open-delete btn btn-primary btn-labeled btn-rounded">
              <b><i class="icon-file-check"></i></b> Softcopy</a>
        </td>
        <td class="text-center">
          <a href="{{Storage::url($item->surat_pernyataan)}}" target="_blank" type="button" name="btn_cek_13" 
            class="open-delete btn btn-primary btn-labeled btn-rounded">
              <b><i class="icon-file-check"></i></b> Softcopy</a>
        </td>
        <td class="text-center">
          <form action="{{route('delete.asesor', $item->id)}}" method="post" class="d-inline">
            @csrf
            @method('delete')
          <button class="btn btn-danger btn-sm"><i class="icon-trash"></i></button>
          </form>
        </td>
      </tr> 
      @endforeach
    </tbody>
  </table>
@else
<table class="table datatable-show-all">
  <thead>
    <tr>
      <th>No</th>
      <th class="text-center">Dokumen Upload Asesor</th>
      <th class="text-center">Surat Pernyataan Komitmen</th>
      <th class="text-center">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($asesor as $item)
    <tr>
      <td>#</td>
      <td class="text-center">
        <a href="{{Storage::url($item->upload_persyaratan)}}" target="_blank" type="button" name="btn_cek_13" 
          class="open-delete btn btn-primary btn-labeled btn-rounded">
            <b><i class="icon-file-check"></i></b> Softcopy</a>
      </td>
      <td class="text-center">
        <a href="{{Storage::url($item->surat_pernyataan)}}" target="_blank" type="button" name="btn_cek_13" 
          class="open-delete btn btn-primary btn-labeled btn-rounded">
            <b><i class="icon-file-check"></i></b> Softcopy</a>
      </td>
      <td class="text-center">
        <div class="btn btn-sm btn-success">Submitted</div>
      </td>
    </tr> 
    @endforeach
  </tbody>
</table>
@endif
</div>
@endsection
