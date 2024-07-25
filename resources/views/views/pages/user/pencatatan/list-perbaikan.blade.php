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
                            <th>No</th>
                            <th>Perbaikan</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @forelse ($item as $data)
                        <tr>              
                            @if($data->check_surat == null)
                            <td>
                            </td>
                            @else
                            <td>#</td>
                            <td>{{$data->check_surat}}</td>
                            <td><a href="{{route('pencatatan.edit', $item[0]->pencatatan_id)}}" class="btn btn-sm btn-primary">Edit</td>
                          @endif
                          <tr>              
                            @if($data->check_sk == null)
                            <td>
                            </td>
                            @else
                            <td>#</td>
                            <td>{{$data->check_sk}}</td>
                            <td><a href="{{route('pencatatan.edit', $item[0]->pencatatan_id)}}" class="btn btn-sm btn-primary">Edit</td>
                          @endif
                          <tr>              
                            @if($data->check_lisensi == null)
                            <td>
                            </td>
                            @else
                            <td>#</td>
                            <td>{{$data->check_lisensi}}</td>
                            <td><a href="{{route('pencatatan.edit', $item[0]->pencatatan_id)}}" class="btn btn-sm btn-primary">Edit</td>
                          @endif
                        </tr>
                        <tr>              
                            @if($data->check_skema == null)
                            <td>
                            </td>
                            @else
                            <td>#</td>
                            <td>{{$data->check_skema}}</td>
                            <td><a href="{{route('pencatatan.skema')}}" class="btn btn-sm btn-primary">Edit</td>
                          @endif
                        </tr>
                        <tr>              
                            @if($data->check_asesor == null)
                            <td>
                            </td>
                            @else
                            <td>#</td>
                            <td>{{$data->check_asesor}}</td>
                            <td><a href="{{route('pencatatan.asesor')}}" class="btn btn-sm btn-primary">Edit</td>
                          @endif
                        </tr>
                        <tr>              
                            @if($data->check_tuk == null)
                            <td>
                            </td>
                            @else
                            <td>#</td>
                            <td>{{$data->check_tuk}}</td>
                            <td><a href="{{route('pencatatan.tuk')}}" class="btn btn-sm btn-primary">Edit</td>
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
    
