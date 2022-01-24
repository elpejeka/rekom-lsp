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
                                <td>{{$item->administrations->nama_lsp}}</td>
                                <td>{{date('d-m-Y', strtotime($item->created_at)) }}</td>
                                <td>
                                @if ($item->status_verifikasi == null)
                                    <span class="badge badge-info">Not Submit</span> 
                                @elseif($item->status_verifikasi == "submit")
                                    <span class="badge badge-success">Submited</span>
                                @endif
                                </td>
                                @if($cek->count() == 0)
                                <td class="text-center">
                                    <a href="{{route('validasi', $item->id)}}?verifikasi-validasi" class="btn btn-success">Cek Dokumen</a>
                                </td>
                                @else
                                <td class="text-center">
                                    <a href="{{route('pdf.validasi', $item->id)}}" target="_blank" type="button" name="submit" class="open-delete btn btn-info btn-labeled btn-rounded"><b><i class=" icon-printer"></i></b> Print Hasil Verifikasi</a>
                                </td>
                                @endif
                                @if($item->status_verifikasi == null)
                                <td class="text-center">
                                    <a href="{{route('submit.validasi', $item->id)}}?status_verifikasi=submit" class="btn btn-primary">Submit<i class="icon-arrow-right14 position-right"></i></a>
                                </td>
                                @else
                                <td class="text-center">
                                    <a href="{{route('pdf.vv_berita', $item->id)}}" target="_blank" type="button" name="submit" class="open-delete btn btn-info btn-labeled btn-rounded"><b><i class=" icon-printer"></i></b> Print VV Berita Acara</a>
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
