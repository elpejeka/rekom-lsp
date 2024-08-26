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
        <div class="card-body">
            <table class="table datatable-show-all" id="list">
                <thead>
                  <tr>
                    <th>Surat Permohonan</th>
                    <th>SK Lisensi BNSP</th>
                    <th>Sertifikat Lisensi BNSP</th>
                    <th class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($permohonan as $item)
                    <tr>
                      <td>
                          <a href="{{asset('storage/'. $item->upload_persyaratan)}}" target="_blank" type="button" name="btn_cek_13" 
                              class="open-delete btn btn-primary btn-labeled btn-rounded">
                              <b><i class="icon-file-check"></i></b> Softcopy</a>
                      </td>
                      <td>
                        <a href="{{asset('storage/'. $item->sk_lisensi)}}" target="_blank" type="button" name="btn_cek_13" 
                            class="open-delete btn btn-primary btn-labeled btn-rounded">
                            <b><i class="icon-file-check"></i></b> Softcopy</a>
                      </td>
                      <td>
                          <a href="{{asset('storage/'.$item->sertifikat)}}" target="_blank" type="button" name="btn_cek_13" 
                              class="open-delete btn btn-primary btn-labeled btn-rounded">
                              <b><i class="icon-file-check"></i></b> Softcopy</a>
                            </td>
                        <td class="text-center">
                        @if($item->submit_pencatatan == null)
                        <a href="{{route('pencatatan.edit', $item->id)}}" class="btn btn-sm btn-primary"><i class="icon-pencil"></i></a>
                          <a href="{{route('pencatatan.liat', $item->id)}}" class="btn btn-primary btn-sm">Submit Pencatatan</a>
                          @else
                            <span class="badge badge-success">Submitted</span>
                            <a href="{{route('pencatatan.edit', $item->id)}}" class="btn btn-sm btn-primary"><i class="icon-pencil"></i></a>
                            <a href="{{route('list.komen', $item->id  )}}" class="btn btn-sm btn-primary">Cek Perbaikan</a>
                            @if ($item->approve != null)
                            <a href="{{route('surat.pencatatan', $item->id)}}" class="btn btn-sm btn-primary"><i class="icon-pencil"></i></a>
                            @endif
                          @endif
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