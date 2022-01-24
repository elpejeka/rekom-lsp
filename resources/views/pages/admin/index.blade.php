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

        <!-- Grid -->
        {{-- {{ Auth::user()->username}} --}}
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
                            <th>Nama Lembaga Sertifikasi Profesi</th>
                            <th>Tanggal Permohonan</th>
                            <th>Status</th>
                            <th class="text-center">Kelengkapan Dokumen</th>
                            <th class="text-center">Submit</th>
                          </tr>
                        </thead>
                        <tbody>
                           @foreach ($data as $item)
                               <tr>
                                {{-- <td>{{$item->administrations}}</td> --}}
                                <td>{{$item->user->nama_lsp}} </td>
                                <td>{{date('d-m-Y', strtotime($item->status_submit)) }}</td>
                                <td>
                                @if ($item->status_kelengkapan == null)
                                    <span class="badge badge-info">Not Submit</span> 
                                @else
                                    <span class="badge badge-success">{{$item->status_kelengkapan}}</span>
                                @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{route('verifikasi', $item->id)}}?cek-kelengkapan" class="btn btn-success">Cek Kelengkapan</a>
                                </td>
                                @if($item->status_kelengkapan == null)
                                <td class="text-center">
                                    <a href="{{route('submit.kelengkapan', $item->id)}}?status_kelengkapan=submit" class="btn btn-primary">Submit<i class="icon-arrow-right14 position-right"></i></a>
                                </td>
                                @else
                                <td class="text-center">
                                    <span class="badge badge-success">Submitted</span>
                                </td>
                                @endif

                                    
                               </tr>
                           @endforeach
                        </tbody>
                      </table>  
                </div>
                <!-- /horizotal form -->

            </div>
        </div>
        <!-- /grid -->

    </div>
</div>
<!-- /detached content -->
@endsection
