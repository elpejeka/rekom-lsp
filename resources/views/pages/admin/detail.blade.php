@extends('layouts.app')
@section('page-header')
<div class="page-header page-header-default">
  <div class="page-header-content">
    <div class="page-title">
      <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Rincian Permohonan</h4>
    </div>
  </div>

  <div class="breadcrumb-line">
    {{-- <ul class="breadcrumb"> --}}
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
@endsection