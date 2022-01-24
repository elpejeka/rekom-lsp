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
        @if(Auth::user()->roles == 'user')
        <div class="row">
            <div class="col-md-9">

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
                            <th class="text-center">Status</th>
                            <th class="text-center">Actions</th>
                            <th class="text-center">Keterangan</th>
                          </tr>
                        </thead>
                        <tbody>
                           @foreach ($permohonan as $item)
                        <tr>
                           <td>{{$item->user->nama_lsp}}</td>
                           {{-- <td>{{date('d-m-Y', strtotime($item->created_at)) }}</td> --}}
                           <td class="text-center">                                
                            @if ($item->status_submit == null)
                                <span class="badge badge-info">belum submit</span> 
                            @else
                                <span class="badge badge-success">{{$item->status_submit}}</span>
                            @endif
                           </td>
                           @if($item->status_submit == null)
                           <td class="text-center">
                               <a href="{{route('submit.status', $item->id)}}?status_submit=submit" class="btn btn-sm btn-primary">Submit</a>
                           </td>
                           @else
                           <td class="text-center">
                                <a href="{{route('cek.status', $item->id)}}?cek-status" class="btn btn-sm btn-primary">Cek Status Perbaikan</a>
                           </td>
                           @endif
                           <td class="text-center">
                                <a href="javascript:void(0)" onclick="updateKeabsahan({{$item->id}})" class="btn btn-info">Cek Keterangan</a>
                           </td>
                        </tr>
                           @endforeach
                        </tbody>
                      </table>  
                </div>
                <!-- /horizotal form -->

            </div>
            <div class="col-md-3">
                <!-- Vertical form -->
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h5 class="panel-title">Status Dokumen</h5>
                        <div class="heading-elements">
                            <ul class="icons-list">
                                <li><a data-action="collapse"></a></li>
                            </ul>
                        </div>
                    </div>

                 
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>

                                <tr>
                                    <td>Administrasi</td>
                                    <td>
                                        @if($data->count() == 0 )
                                        <span class="badge badge-warning">Belum</span>
                                        @else
                                        <span class="badge badge-success">Sudah</span>
                                        <span class="badge badge-primary">
                                            <a href="{{route('table.informasi-umum')}}" target="_blank"><i class="icon-eye" style="color: #fff"></i></a>
                                        </span>
                                        @endif  
                                    </td>
                                 </tr>

                            <tr>
                                <td>Klasifikasi dan Subklasifikasi</td>
                                <td>
                                    @if($kualifikasi->count() == 0 )
                                    <span class="badge badge-warning">Belum</span>
                                    @else
                                    <span class="badge badge-success">Sudah</span>
                                    <span class="badge badge-primary">
                                        <a href="{{route('table.kualifikasi')}}" target="_blank"><i class="icon-eye" style="color: #fff"></i></a>
                                    </span>
                                    @endif  
                                </td>
                             </tr>

                             <tr>
                                <td>Data Pengurus</td>
                                <td>
                                    @if($organisasi->count() == 0 )
                                    <span class="badge badge-warning">Belum</span>
                                    @else
                                    <span class="badge badge-success">Sudah</span>
                                    <span class="badge badge-primary">
                                        <a href="{{route('table.organisasi')}}" target="_blank"><i class="icon-eye" style="color: #fff"></i></a>
                                    </span>
                                    @endif  
                                </td>
                             </tr>
                             
                                 <tr>
                                    <td>Sertifikasi LSP</td>
                                    <td>
                                        @if($lsp->count() == 0 )
                                        <span class="badge badge-warning">Belum</span>
                                        @else
                                        <span class="badge badge-success">Sudah</span>
                                        <span class="badge badge-primary">
                                            <a href="{{route('table.sertifikasi')}}" target="_blank"><i class="icon-eye" style="color: #fff"></i></a>
                                        </span>
                                        @endif  
                                    </td>
                                 </tr>
                                 <tr>
                                    <td>Asesor</td>
                                    <td>
                                        @if($asesor->count() == 0 )
                                        <span class="badge badge-warning">Belum</span>
                                        @else
                                        <span class="badge badge-success">Sudah</span>
                                        <span class="badge badge-primary">
                                            <a href="{{route('table.asesor')}}" target="_blank"><i class="icon-eye" style="color: #fff"></i></a>
                                        </span>
                                        @endif  
                                    </td>
                                 </tr>
                                 <tr>
                                    <td>Tempat Uji</td>
                                    <td>
                                        @if($tuk->count() == 0 )
                                        <span class="badge badge-warning">Belum</span>
                                        @else
                                        <span class="badge badge-success">Sudah</span>
                                        <span class="badge badge-primary">
                                            <a href="{{route('table.tuk')}}" target="_blank"><i class="icon-eye" style="color: #fff"></i></a>
                                        </span>
                                        @endif  
                                    </td>
                                 </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /vertical form -->
            </div>
        </div>
        @else(Auth::user()->roles == 'admin')
        <!-- /grid -->
        <div class="row">
            <div class="col-lg-3">

                <!-- Members online -->
                <div class="panel bg-teal-400">
                    <div class="panel-body">
                        <div class="heading-elements">
                            {{-- <span class="heading-text badge bg-teal-800"></span> --}}
                        </div>

                        <h3 class="no-margin">3,450</h3>
                        Permohonan Masuk
                        <div class="text-muted text-size-small"></div>
                    </div>

                    <div class="container-fluid">
                        <div id="members-online"></div>
                    </div>
                </div>
                <!-- /members online -->

            </div>

            <div class="col-lg-3">

                <!-- Members online -->
                <div class="panel bg-teal-400">
                    <div class="panel-body">
                        <div class="heading-elements">
                            {{-- <span class="heading-text badge bg-teal-800"></span> --}}
                        </div>

                        <h3 class="no-margin">3,450</h3>
                        Permohonan 
                        <div class="text-muted text-size-small"></div>
                    </div>

                    <div class="container-fluid">
                        <div id="members-online"></div>
                    </div>
                </div>
                <!-- /members online -->

            </div>

            <div class="col-lg-3">

                <!-- Members online -->
                <div class="panel bg-teal-400">
                    <div class="panel-body">
                        <div class="heading-elements">
                            {{-- <span class="heading-text badge bg-teal-800"></span> --}}
                        </div>

                        <h3 class="no-margin">3,450</h3>
                        Permohonan Selesai
                        <div class="text-muted text-size-small"></div>
                    </div>

                    <div class="container-fluid">
                        <div id="members-online"></div>
                    </div>
                </div>
                <!-- /members online -->

            </div>

        </div>
        {{-- @else
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
                            <th>Status Submit</th>
                            <th>Status Cek Kelangkapan</th>
                            <th>Status Verifikasi dan Validasi</th>
                          </tr>
                        </thead>
                        <tbody>
                           @foreach ($pengurus as $item)
                        <tr>
                           <td>{{$item->user->nama_lsp}}</td>
                           {{-- <td>{{date('d-m-Y', strtotime($item->created_at)) }}</td> --}}
                           {{-- <td>{{$item->status_submit}}</td>
                           <td>{{$item->status_kelengkapan}}</td>
                           <td>{{$item->status_verifikasi}}</td>
                        </tr>
                           @endforeach
                        </tbody>
                      </table>  
                </div> --}}
                <!-- /horizotal form -->

            {{-- </div> --}}
           
        {{-- </div> --}} 
        @endif

    </div>
</div>
<!-- /detached content -->
@endsection

@push('addon-script')
<div class="modal fade" id="penolakan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Keterangan Penolakan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="commentForm">
                @csrf
                <div class="form-group">
                    <label class="control-label col-lg-2">Comment Penolakan</label>
                    <div class="col-lg-10">
                        <div class="input-group">
                            <input type="text" class="form-control" name="comment" id="comment" readonly>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
        </div>
    
      </div>
    </div>
  </div>

    <script>

    function updateKeabsahan(id){
            $.get('/keterangan-penolakan/'+id, function(data){
                $("#comment").val(data.comment);
                $("#penolakan").modal("toggle");
            })
        }
        
    </script>
@endpushw
