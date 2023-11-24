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
    <div class="col-sm-12 col-xl-12">
        <div class="card b-r-0">
          <div class="card-header">
          </div>
          <div class="card-body">
            <table class="table" id="project-status">
                <thead> 
                  <tr> 
                    <th> <span class="f-light f-w-600">Nama LSP</span></th>
                    <th> <span class="f-light f-w-600">Tanggal</span></th>
                    <th class="text-center"> <span class="f-light f-w-600">Status</span></th>
                    <th> <span class="f-light f-w-600">Jenis Permohonan</span></th>
                    <th class="text-center"> <span class="f-light f-w-600">Action</span></th>
                    <th class="text-center"> <span class="f-light f-w-600">Keterangan</span></th>
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
        </div>
      </div>
</div>
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
    function updateKeabsahan(id){
            $.get('/lsp/keterangan-penolakan-permohonan/'+id, function(data){
                $("#comment").val(data.comment);
                $("#penolakan").modal("toggle");
            })
        }
  </script>
@endpush