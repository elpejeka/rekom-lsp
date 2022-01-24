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
                                <td>{{$item->user->nama_lsp}} </td>
                                <td>{{date('d-m-Y', strtotime($item->status_submit)) }}</td>
                                <td>
                                @if ($item->status_verifikasi == null)
                                    <span class="badge badge-info">Not Submit</span> 
                                @else
                                    <span class="badge badge-success">{{$item->status_verifikasi}}</span>
                                @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{route('validasi', $item->id)}}?verifikasi-validasi" class="btn btn-success">Cek Dokumen</a>
                                </td>
                                @if($item->status_verifikasi == null)
                                <td class="text-center">
                                    <a href="{{route('submit.validasi', $item->id)}}?status_verifikasi=submit" class="btn btn-primary">Submit<i class="icon-arrow-right14 position-right"></i></a>
                                    <a href="javascript:void(0)" onclick="updateKeabsahan({{$item->id}})" class="btn btn-info">Tolak</a>
                                    {{-- <a href="{{route('submit.tolak', $item->id)}}?status_tolak=submit" class="btn btn-danger">Tolak</a> --}}
                                    {{-- <a href="{{route('submit.tolak', $item->id)}}?status_tolak=submit" class="btn btn-danger">Tolak<i class="icon-arrow-down14 position-right"></i></a> --}}
                                </td>
                                @else
                                <td class="text-center">
                                    <ul class="icons-list">
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>

                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li><a href="{{route('pdf.vv_berita', $item->id)}}" target="_blank" type="button" name="submit"><i class=" icon-printer"></i></b> Print VV Berita Acara</a></li>
                                                <li><a href="{{route('rekomendasi',  $item->id)}}"><i class="icon-file-excel"></i> Upload Surat Rekomendasi</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                    
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
          <h5 class="modal-title" id="exampleModalLabel">Update Keabsahan Skema Sertifikasi</h5>
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
          <button type="submit" class="btn btn-success mt-5">Save changes</button>
        </div>
    
      </div>
    </div>
  </div>

    <script>

    function updateKeabsahan(id){
            $.get('/penolakan/'+id, function(data){
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
                //   $("#penolakan").modal('toggle');
                  $("#studentForm")[0].reset();
              }
          })
      })
    </script>
@endpush