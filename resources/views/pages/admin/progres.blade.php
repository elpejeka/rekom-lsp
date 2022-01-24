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
                            <th>Tanggal Cek Kelengkapan</th>
                            <th>Tanggal Verifikasi Validasi</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                           @foreach ($data as $item)
                               <tr>
                                <td>{{$item->administrations->nama}}</td>
                                <td><span class="badge badge-success">{{$item->status_submit}}</span></td>
                                <td><span class="badge badge-success">{{$item->status_kelengkapan}}</span></td>
                                <td><span class="badge badge-success">{{$item->status_verifikasi}}</span></td>
                                <td><a href="{{route('detail', $item->id)}}" class="btn btn-info"><i class="icon-eye" style="color: #fff;"></i> Detail</a>
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
