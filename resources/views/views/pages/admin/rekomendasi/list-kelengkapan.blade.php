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
@endsection

@push('addon-script')
<script>
    $(document).ready(function () {
        $('#list').DataTable();
    });
</script>
@endpush