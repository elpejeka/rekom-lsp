@extends('layouts.app')

@section('page-header')

<div class="page-header page-header-default">
    <div class="page-header-content">
        <div class="page-title">
            <h4><i class="icon-home2 position-left"></i> 
            <span class="text-semibold">Dashboard</span></h4>
        </div>
    </div>

    {{-- <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li><a href="index.html"> Home</a></li>
            <li><a href="detached_right.html">Starters</a></li>
            <li class="active">Right detached</li>
        </ul>
    </div> --}}
</div>
@endsection

@section('content')
<div class="container-detached">
    <div class="content-detached">

        <div class="row">
            <div class="col-md-12">

                <!-- Horizontal form -->
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h5 class="panel-title"></h5>
                        <div class="heading-elements">
                        </button>
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
                            <th>#</th>
                            <th>Perbaikan</th>
                            <th class="text-center">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          @forelse ($data as $data)
                        <tr>              
                            @if($data->keterangan_surat == null)
                          @else
                          <td>#</td>
                            <td>{{$data->keterangan_surat}}</td>
                            @foreach ($user->permohonan as $item)
                            <td><a href="{{route('edit.permohonan', $item->id)}}" class="btn btn-sm btn-primary">Upload</td>
                              @endforeach
                          @endif
                        </tr>
                        <tr>
                          @if($data->keterangan_sk == null)
                          @else
                          <td>#</td>
                          <td>{{$data->keterangan_surat}}</td>
                          <td><a href="{{route('sk.edit', $user->administrasi->id)}}" class="btn btn-sm btn-primary">Upload</td>
                          @endif
                        </tr>
                        <tr>
                          @if($data->keterangan_organisasi == null)
                          @else
                          <td>#</td>
                          <td>{{$data->keterangan_organisasi}}</td>
                          <td><a href="{{route('pengurus.upload', $user->organization->id)}}" class="btn btn-sm btn-primary">Upload</td>
                          @endif
                        </tr>
                        <tr>
                          @if($data->keterangan_kualifikasi == null)
                          @else
                          <td>#</td>
                          <td>{{$data->keterangan_kualifikasi}}</td>
                          <td><a href="{{route('kualifikasi')}}" class="btn btn-sm btn-primary">Upload</td>
                          @endif
                        </tr>
                        <tr>
                          @if($data->keterangan_skema == null)
                          @else<td>#</td>
                          <td>{{$data->keterangan_skema}}</td>
                          <td><a href="{{route('sertifikasi-lsp')}}" class="btn btn-sm btn-primary">Upload</td>
                          @endif
                        </tr>
                        <tr>
                          @if($data->keterangan_asesor == null)
                          @else<td>#</td>
                          <td>{{$data->keterangan_asesor}}</td>
                          <td><a href="{{route('asesor')}}" class="btn btn-sm btn-primary">Upload</td>
                          @endif
                        </tr> 
                        <tr>
                          @if($data->keterangan_komitmen == null)
                          @else
                          <td>#</td>
                          <td>{{$data->keterangan_komitmen}}</td>
                          <td><a href="{{route('asesor')}}" class="btn btn-sm btn-primary">Upload</td>
                          @endif
                        </tr>
                        <tr>
                          @if($data->keterangan_tuk == null)
                          @else
                          <td>#</td>
                          <td>{{$data->keterangan_tuk}}</td>
                          <td><a href="{{route('tuk')}}" class="btn btn-sm btn-primary">Upload</td>
                          @endif
                        </tr>
                        @empty
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      @endforelse
                        </tbody>
                      </table>  
                </div>
                <!-- /horizotal form -->

            </div>
        </div>

    </div>
</div>
<!-- /detached content -->
@endsection
    
