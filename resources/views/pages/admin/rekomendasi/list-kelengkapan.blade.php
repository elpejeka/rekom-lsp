@extends('layouts.v2.app')

@section('breadcumb')
<div class="container-fluid">        
    <div class="page-title">
      <div class="row">
        <div class="col-6">
          <h4>{{$title}}</h4>
        </div>
        <div class="col-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">                                       
                <svg class="stroke-icon">
                  <use href="../assets/svg/icon-sprite.svg#stroke-home"></use>
                </svg></a></li>
            <li class="breadcrumb-item active">{{$title}}</li>
            <li class="breadcrumb-item"></li>
          </ol>
        </div>
      </div>
    </div>
</div>
@endsection

@section('content')
<div class="container-fluid">
  <div class="row">
      <div class="col-sm-12 col-xl-12">
        <div class="card">
          <div class="card-header">
              <h4>List Kelengkapan Dokumen</h4>
          </div>
          <div class="card-body">
              <div class="table-responsive">
                  <table class="table table-bordered" id="list" width="100%" cellspacing="0">
                      <thead>
                          <tr>
                            <th>No</th>
                            <th>Jenis Permohonan</th>
                            <th>Nama Lembaga Sertifikasi Profesi</th>
                            <th>Tanggal Permohonan</th>
                            <th>Kelengkapan Dokumen</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $item)
                        <tr>
                          <td>{{$loop->iteration}}</td>
                          <td>{{ucfirst($item->jenis_permohonan)}}</td>
                          <td>{{$item->user->nama_lsp}}</td>
                          <td>{{date('d-m-Y', strtotime($item->status_submit)) }}</td>
                          <td>
                            <a href="{{route('verifikasi', $item->id)}}?cek-kelengkapan" class="btn btn-success">Cek Kelengkapan</a>
                          </td>
                          <td>
                            <a href="{{route('submit.kelengkapan', $item->id)}}?status_kelengkapan=submit" class="btn btn-primary">Submit<i class="icon-arrow-right14 position-right"></i></a>  
                            <a href="javascript:void(0)" onclick="updateKeabsahan({{$item->id}})" class="btn btn-info"><i class="icon-pencil"></i></a>
                            <a href="{{route('submit.tolak', $item->id)}}?status_tolak=submit" class="btn btn-danger">Submit Tolak</a>
                          </td>
                        </tr>
                        @endforeach
                        </tbody>
                  </table>
              </div>
          </div>
      </div>
  </div>
</div>
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
          {{-- <a href="{{route('submit.tolak', $item->id)}}?status_tolak=submit" class="btn btn-danger">Submit Tolak</a> --}}
      </div>
  
    </div>
  </div>
</div>
@endsection

@push('addon-script')
<script>
    $(document).ready(function () {
        $('#list').DataTable();
    });

    function updateKeabsahan(id){
            $.get('/rekomendasi-lsp/penolakan/'+id, function(data){
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