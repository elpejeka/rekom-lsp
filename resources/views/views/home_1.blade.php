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
                            <th class="text-center">Tanggal</th>
                            <th class="text-center">Status</th>
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
                           <td>
                               {{ucfirst($item->jenis_permohonan)}}
                           </td>
                           @if($item->status_submit == null)
                           <td class="text-center">
                               <a href="{{route('apply', $item->id)}}" class="btn btn-sm btn-primary">Submit</a>
                           </td>
                           @else
                           <td class="text-center">
                                <a href="{{route('cek.status', $item->id)}}?cek-status" class="btn btn-sm btn-primary">Cek Status Perbaikan</a>
                           </td>
                           @endif
                            <td class="text-center">
                                @if ($item->status_tolak == null)
                                    <a href="javascript:void(0)" onclick="updateKeabsahan({{$item->id}})" class="btn btn-info">Cek Keterangan</a>
                                @endif
                                @if ($item->status_tolak != null)
                                    <span class="badge badge-danger">Permohonan Tolak : {{$item->status_tolak}}</span>
                                @endif
                           </td>
                        </tr>
                           @endforeach
                        </tbody>
                      </table>
                </div>
                <!-- /horizotal form -->

            </div>
        </div>
        @endif
        @if (Auth::user()->roles == 'admin')
        <!-- /grid -->
        <div class="row">
            <a href="{{route('portal.index')}}">
                <div class="col-lg-3">
                    <div class="panel bg-teal-400">
                        <div class="panel-body">
                            <div class="heading-elements">
                                {{-- <span class="heading-text badge bg-teal-800"></span> --}}
                            </div>

                            <h3 class="no-margin"></h3>
                            Permohonan Masuk Portal
                            <div class="text-muted h4">{{$portal->count()}}</div>
                        </div>

                        <div class="container-fluid">
                            <div id="members-online"></div>
                        </div>
                    </div>
                </div>
            </a>
            <div class="col-lg-3">

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

            <div class="col-lg-3">

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

            <div class="col-lg-3">

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
        <div class="row mt-5">
            <div class="text-center">
                <div class="col-lg-10">
                    <div class="card">
                        <div class="card-body">
                            <canvas id="chartPermohonan"></canvas>
                        </div>
                    </div>
                </div>
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

  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js" integrity="sha512-TW5s0IT/IppJtu76UbysrBH9Hy/5X41OTAbQuffZFU6lQ1rdcLHzpU5BzVvr/YFykoiMYZVWlr/PX1mDcfM9Qg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>

    function updateKeabsahan(id){
            $.get('/lsp/keterangan-penolakan-permohonan/'+id, function(data){
                $("#comment").val(data.comment);
                $("#penolakan").modal("toggle");
            })
        }

                            const chartPermohonan = document.getElementById('chartPermohonan').getContext('2d');
                                const permohonanChart = new Chart(chartPermohonan, {
                                type: 'bar',
                                data: {
                                    labels: [
                                        "Masuk",
                                        "Proses",
                                        "Selesai",
                                    ],
                                    datasets: [{
                                        label : "JUMLAH PERMOHONAN REKOMENDASI LSP",
                                        data: [
                                            "{{$jumlah_masuk->count()}}",
                                            "{{$jumlah_proses->count()}}",
                                            "{{$jumlah_selesai->count()}}",
                                        ],
                                        backgroundColor: [
                                            'rgba(54, 162, 45, 0.5)',
                                            'rgba(27, 40, 255, 0.2)',
                                            'rgba(54, 162, 2, 0.2)',
                                            
                                        ],
                                        borderColor: [
                                            'rgba(54, 162, 45, 1)',
                                            'rgba(27, 40, 255, 1)',
                                            'rgba(54, 162, 2, 1)',
                                        ],
                                        borderWidth: 1
                                    }]
                                },
                            });
    </script>

    
@endpush

