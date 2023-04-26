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
                            <th>No</th>
                            <th>Jenis Permohonan</th>
                            <th>Nama Lembaga Sertifikasi Profesi</th>
                            <th>Tanggal Permohonan</th>
                            <th>Status</th>
                            <th class="text-center">Kelengkapan Dokumen</th>
                            <th class="text-center">Submit</th>
                          </tr>
                        </thead>
                        <tbody>
                        @php $no = 1; @endphp
                           @foreach ($data as $item)
                               <tr>
                                <td>{{$no++}}</td>
                                <td>{{ucfirst($item->jenis_permohonan)}}</td>
                                <td>{{$item->user->nama_lsp}} </td>
                                <td>{{date('d-m-Y', strtotime($item->status_submit)) }}</td>
                                <td>
                                @if ($item->status_verifikasi == null && $item->status_tolak == null)
                                    <span class="badge badge-info">Not Submit</span> 
                                @elseif($item->status_tolak == null)
                                    <span class="badge badge-success">{{$item->status_verifikasi}}</span>
                                @else
                                    <span class="badge badge-danger">Tolak Permohonan</span>
                                @endif
                                </td>
                                @if ($item->id_izin == null)
                                    <td class="text-center">
                                        <a href="{{route('validasi', $item->id)}}?verifikasi-validasi" class="btn btn-success">Cek Dokumen</a>
                                    </td>
                                @endif
                                @if ($item->id_izin != null)
                                    <td class="text-center">
                                        <a href="{{route('validasi.portal', $item->id_izin)}}" class="btn btn-success">Cek Dokumen</a>
                                    </td>    
                                @endif
                                @if($item->status_verifikasi == null && $item->status_tolak == null)
                                <td class="text-center">
                                    <a href="{{route('submit.validasi', $item->id)}}?status_verifikasi=submit" class="btn btn-primary">Submit<i class="icon-arrow-right14 position-right"></i></a>
                                    <a href="javascript:void(0)" onclick="updateKeabsahan({{$item->id}})" class="btn btn-info"><i class="icon-pencil2"></i></a>
                                    <a href="{{route('submit.tolak', $item->id)}}?status_tolak=submit" class="btn btn-danger">Submit Tolak</a>
                                </td>
                                @elseif($item->status_permohonan == null)
                                <td class="text-center">
                                    <ul class="icons-list"> 
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>

                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li><a href="{{route('pdf.vv_berita', $item->id)}}" target="_blank" type="button" name="submit"><i class=" icon-printer"></i></b> Print VV Berita Acara</a></li>
                                                <li><a href="{{route('rekomendasi',  $item->id)}}"><i class="icon-file-excel"></i> Upload Surat Rekomendasi</a></li>
                                                @if ($item->id_izin == null)
                                                    <li><a href="{{route('submit.selesai',  $item->id)}}?status_permohonan=submit"><i class="icon-checklist2"></i> Selesai</a></li>
                                                @endif
                                                @if ($item->id_izin != null)
                                                    <li><a href="{{route('final.portal',  $item->id_izin)}}"><i class="icon-checklist2"></i> Selesai</a></li>
                                                @endif
                                            </ul>
                                        </li>
                                    </ul>
                                    
                                </td>
                                @else
                                <td class="text-center">
                                    <div class="badge badge-primary">Permohonan Selesai</div>
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

@push('addon-script')
<div class="modal fade" id="penolakan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Komen Penolakan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="commentForm">
                @csrf
                <input type="hidden" name="permohonan_id" id="permohonan_id">
                <div class="form-group">
                    <label class="control-label col-lg-2">Comment Penolakan</label>
                    <div class="col-lg-10">
                        <div class="input-group">
                            <input type="text" class="form-control" name="comment" id="comment" placeholder="Komen Penolakan">
                            <span class="input-group-btn">
                                <button class="btn btn-danger" type="submit">Tolak</button>
                            </span>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <a href="{{route('submit.tolak', $item->id)}}?status_tolak=submit" class="btn btn-danger">Submit Tolak</a>
        </div>
    
      </div>
    </div>
  </div>

    <script>

    function updateKeabsahan(id){
            $.get('/lsp/penolakan/'+id, function(data){
                $("#permohonan_id").val(data.id);
                $("#penolakan").modal("toggle");
            })
        }

      $("#commentForm").submit(function(e){
          e.preventDefault();     
          let permohonanId = $("#permohonan_id").val();
          let comment = $('#comment').val();
          let _token = $("input[name=_token]").val();

          $.ajax({
              url : "{{route('penolakan.save')}}",
              type : "POST",
              data : {
                  permohonan_id : permohonanId,
                  comment : comment,
                  "_token": "{{ csrf_token() }}",
              },
              success:function(response){
                  $("#penolakan").modal('toggle');
                  $("#studentForm")[0].reset();
              }
          })
      })
    </script>
@endpush
