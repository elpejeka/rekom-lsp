@extends('layouts.app')
@section('page-header')
<div class="page-header page-header-default">
  <div class="page-header-content">
    <div class="page-title">
      <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Administrasi</h4>
    </div>
  </div>

  <div class="breadcrumb-line">
    <ul class="breadcrumb">
      <li><a href="{{route('home')}}"><i class="icon-home2 position-left"></i> Home</a></li>
      <li class="active">Administrasi</li>
    </ul>
  </div>
</div>
@endsection

@section('content')

<div class="panel panel-flat">
  <div class="panel-heading">
    <h5 class="panel-title">Data Administrasi</h5>
    <div class="heading-elements">
      <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
              </ul>
            </div>
  </div>

  <div class="panel-body">
    
  </div>

  <table class="table table-lg">
    <thead>
        <tr>
            <td>Data</td>
            <td>Description</td>
        </tr>
    </thead>
    @foreach ($data as $data)
    <tbody>
      <tr>
        <td>SK Menteri</td>
        <td>
          <a href="{{Storage::url($data->upload_persyaratan)}}" target="_blank" type="button" name="btn_cek_13" 
              class="open-delete btn btn-primary btn-labeled btn-rounded">
              <b><i class="icon-file-check"></i></b> Softcopy</a></td>
      </tr>
        <tr>
            <td>Nama LSP</td>
            <td>{{$data->nama}}</td>
        </tr>
        <tr>
            <td>Unsur Pembentuk LSP</td>
            <td>{{$data->unsur_pembentuk}}</td>
        </tr>
        <tr>
            <td>Nama Unsur Pembentuk LSP</td>
            <td>{{$data->nama_unsur}}</td>
        </tr>
        <tr>
            <td>Kategori Asosiasi Profesi</td>
            <td>{{$data->kategori_lsp}}</td>
        </tr>
        <tr>
            <td>Ketersediaan Sistem Informasi</td>
            <td>{{$data->ketersediaan_sistem}}</td>
        </tr>
        <tr>
            <td>No Telepon</td>
            <td>{{$data->no_telp}}</td>
        </tr>
        <tr>
            <td>Jenis LSP</td>
            <td>{{$data->jenis_lsp}}</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>{{$data->alamat}}</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>{{$data->email}}</td>
        </tr>   
        <tr>
            <td>Status Kepemilikan Kantor</td>
            <td>{{$data->status_kepemilikan}}</td>
        </tr>
        <tr>
            <td>Website</td>
            <td>{{$data->website}}</td>
        </tr>
        <tr>
            <td>Jumlah Skema Sertifikasi</td>
            <td>{{$data->jumlah_skema}}</td>
        </tr>
        <tr>
          <td>Action</td>
          {{-- @if($item->status_submit ==null) --}}
          <td><a href="{{route('information.edit', $data->id)}}" class="btn btn-primary">Edit</td>
          {{-- @else --}}
          
          {{-- @endif --}}
        </tr>
    </tbody>
    @endforeach
</table>
</div>
@endsection
