@extends('layouts.app')
@section('page-header')
<div class="page-header page-header-default">
  <div class="page-header-content">
    <div class="page-title">
      <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Check Asesor </h4>
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
    <h5 class="panel-title">Check Asesor</h5>
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
        <th>Nama Aseor</th>
        <th>Klasifikasi</th>
        <th>Sub Bidang</th>
        <th>Tanggal Sertifikat</th>
        <th>NRKA</th>
        <th>Masa Berlaku</th>
      </tr>
    </thead>
    <tbody>
        @php
            $no = 1;
        @endphp
      @foreach ($asesor->data as $item)
      <tr>
          <td>{{$no++}}</td>
          <td>{{$item->nama}}</td>
          <td>{{$item->klasifikasi}}</td>
          <td>{{$item->id_sub_bidang}}</td>
          <td>{{$item->tgl_cetak_pertama}}</td>
          <td>{{$item->nrta}}</td>
          <td>{{$item->tahun_habis}}</td>
          {{-- <td>{{date('Y-m-d', strtotime('+3 year', strtotime($item->tgl_cetak_pertama)))}} --}}
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
