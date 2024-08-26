@extends('layouts.app')

@section('page-header')

<div class="page-header page-header-default">
    <div class="page-header-content">
        <div class="page-title">
            <h4><i class="icon-home2 position-left"></i> 
            <span class="text-semibold">Dashboard</span></h4>
        </div>
    </div>
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
                            <th class="text-center">Tanggal</th>
                            <th class="text-center">Status Submit</th>
                            <th class="text-center">Status Permohonan</th>
                            <th class="text-center">Jenis Permohonan</th>
                            <th class="text-center">Actions</th>
                            <th class="text-center">keterangan</th>
                          </tr>
                        </thead>
                        <tbody>
                           @foreach ($permohonan as $item)
                        <tr>
                           <td>{{$item->user->nama_lsp}}</td>
                           <td>{{ date('d-m-Y', strtotime($item->created_at)) }}</td>
                           <td class="text-center">                                
                            @if ($item->status_submit == null)
                                <span class="badge badge-info">belum submit</span> 
                            @else
                                <span class="badge badge-success">{{$item->status_submit}}</span>
                            @endif
                           </td>
                           <td class="text-center">
                            @if($item->status_tolak == null)
                             <span class="badge badge-info">Proses Verifikasi</span>
                             @else
                             <span class="badge badge-danger">Tolak {{$item->status_tolak}}</span>
                            </td>
                            @endif
                           <td>
                               {{ucfirst($item->jenis_permohonan)}}
                           </td>
                           @if($item->status_submit == null)
                           <td class="text-center">
                               <a href="{{route('submitted', $item->id)}}?status_submit=submit" class="btn btn-sm btn-primary">Submit</a>
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
                        <h5 class="panel-title">Skema Sertifikasi</h5>
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
                                            <a href="{{route('table.informasi-umum')}}" target="_blank" style="color: #fff"z><i class="icon-eye" style="color: #fff"></i> Preview</a>
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
                                        <a href="{{route('table.kualifikasi')}}" target="_blank" style="color: #fff"z><i class="icon-eye" style="color: #fff"></i> Preview</a>
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
                                        <a href="{{route('table.organisasi')}}" target="_blank" style="color: #fff"z><i class="icon-eye" style="color: #fff"></i> Preview</a>
                                    </span>
                                    @endif  
                                </td>
                             </tr>
                             
                                 <tr>
                                    <td>Skema Sertifikasi LSP</td>
                                    <td>
                                        @if($lsp->count() == 0 )
                                        <span class="badge badge-warning">Belum</span>
                                        @else
                                        <span class="badge badge-success">Sudah</span>
                                        <span class="badge badge-primary">
                                            <a href="{{route('table.sertifikasi')}}" target="_blank" style="color: #fff"z><i class="icon-eye" style="color: #fff"></i> Preview</a>
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
                                            <a href="{{route('table.asesor')}}" target="_blank" style="color: #fff"z><i class="icon-eye" style="color: #fff"></i> Preview</a>
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
                                            <a href="{{route('table.tuk')}}" target="_blank" style="color: #fff"z><i class="icon-eye" style="color: #fff"></i> Preview</a>
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
        <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Welcome Back!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Harap Melakukan Edit/Update Pada Pencatatan untuk melengkapi Dokumen Pendukung yang hilang pasca PDNs!! Terima Kasih......
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        @else
        <!-- /grid -->
        <div class="row">
            <div class="col-lg-4">

                <!-- Members online -->
                <div class="panel bg-teal-400">
                    <div class="panel-body">
                        <div class="heading-elements">
                            {{-- <span class="heading-text badge bg-teal-800"></span> --}}
                        </div>

                        <h3 class="no-margin"></h3>
                        Permohonan Masuk
                        <div class="text-muted h4">{{$jumlah_masuk->count()}}</div>
                    </div>

                    <div class="container-fluid">
                        <div id="members-online"></div>
                    </div>
                </div>
                <!-- /members online -->

            </div>

            <div class="col-lg-4">

                <!-- Members online -->
                <div class="panel bg-primary-400">
                    <div class="panel-body">
                        <div class="heading-elements">
                            {{-- <span class="heading-text badge bg-teal-800"></span> --}}
                        </div>

                        <h3 class="no-margin"></h3>
                        Permohonan Proses
                        <div class="text-muted h4">{{$jumlah_proses->count()}}</div>
                    </div>

                    <div class="container-fluid">
                        <div id="members-online"></div>
                    </div>
                </div>
                <!-- /members online -->

            </div>

            <div class="col-lg-4">

                <!-- Members online -->
                <div class="panel bg-success-400">
                    <div class="panel-body">
                        <div class="heading-elements">
                            {{-- <span class="heading-text badge bg-teal-800"></span> --}}
                        </div>

                        <h3 class="no-margin"></h3>
                        Permohonan Selesai
                        <div class="text-muted h4">{{$jumlah_selesai->count()}}</div>
                    </div>

                    <div class="container-fluid">
                        <div id="members-online"></div>
                    </div>
                </div>
                <!-- /members online -->

            </div>

        </div>
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
                    <label class="control-label col-lg-2">Comment Penolakan</label>
                    <div class="col-lg-10">
                        <div class="input-group">
                            <input type="text" class="form-control" name="comment" id="comment" readonly>
                        </div>
                    </div>
        </div>
        <div class="modal-footer">
        </div>
    
      </div>
    </div>
  </div>

    <script>

        $(document).ready(function () {
            $("#loginModal").modal('show');
        });

    function updateKeabsahan(id){
            $.get('/rekomendasi-lsp/keterangan-penolakan/'+id, function(data){
                $("#comment").val(data.comment);
                $("#penolakan").modal("toggle");
            })
        }
        
    </script>
@endpush

