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
              <h4>{{$title}}</h4>
          </div>
          <div class="card-body">
              <div class="table-responsive">
                  <table class="table table-bordered" id="listPencatatan" width="100%" cellspacing="0">
                      <thead>
                          <tr>
                            <th>No</th>
                            <th>Nama LSP</th>
                            <th>Jenis Permohonan</th>
                            <th>Tanggal Submit</th>
                            <th class="text-center">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($permohonan as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->administrations->nama}}
                            <td>{{$item->permohonan}}</td>
                            <td>{{$item->submit_pencatatan}}</td>
                            <td>
                              <a href="{{route('pencatatan.approve', $item->slug)}}" class="btn btn-primary btn-sm">Cek Kesesuaian</a>
                              <a href="{{route('pencatatan.edit', $item->id)}}" class="btn btn-warning btn-sm">Edit</a>
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
        $('#listPencatatan').DataTable();
    });
</script>
@endpush