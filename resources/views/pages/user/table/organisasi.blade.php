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
    <h5 class="panel-title">Struktur Organisasi</h5>
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
    @foreach ($items as $data)
    <tbody>
        <tr>
            <td>Pengarah</td>
            <td>{{$data->pengarah}}</td>
        </tr>
        <tr>
            <td>Pengarah</td>
            <td>{{$data->pengarah_1}}</td>
        </tr>
        <tr>
            <td>Pengarah</td>
            <td>{{$data->pengarah_2}}</td>
        </tr>
        <tr>
            <td>Pengarah</td>
            <td>{{$data->pengarah_3}}</td>
        </tr>
        <tr>
            <td>Pengarah</td>
            <td>{{$data->pengarah_4}}</td>
        </tr>
        <tr>
            <td>Ketua Pelaksana</td>
            <td>{{$data->ketua}}</td>
        </tr>
        <tr>
            <td>Penanggungjawab Bagian Umum </td>
            <td>{{$data->umum}}</td>
        </tr>
        <tr>
            <td>Penanggungjawab Bagian Sertifikasi </td>
            <td>{{$data->sertifikasi}}</td>
        </tr>
        <tr>
            <td>Penanggungjawab Bagian Manajemen Mutu</td>
            <td>{{$data->manajemen_mutu}}</td>
        </tr>
        <tr>
            <td>Jumlah Karyawan LSP</td>
            <td>{{$data->jumlah_karyawan}}</td>
        </tr>
        <tr>
          <td>Action</td>
          <td>
            @if($item->status_submit == null)
            <a href="{{route('pengurus.edit', $data->id)}}" class="btn btn-primary">Edit</  
            @else
            @endif  
          </td>
      </tr>
    </tbody>
    @endforeach
</table>
</div>
@endsection
