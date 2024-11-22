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
            <h4>List Permohonan Aplikasi</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="list">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama LSP</th>
                        <th>Kode TUK</th>
                        <th>Nama TUK</th>
                        <th>Jenis TUK</th>
                        <th>Provinsi</th>
                        <th>Alamat</th>
                        <th>Dokumen</th>
                        <th>Keterangan</th>
                        <th>Tanggal Permohonan</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                       @foreach ($data as $item)
                      <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->user->nama_lsp ?? '-'}}</td>
                        <td>{{$item->kode_tuk}}</td>
                        <td>{{$item->nama_tuk}}</td>
                        <td>{{$item->jenis_tuk}}</td>
                        <td>{{$item->propinsi->Nama ?? '-'}}</td>
                        <td>{{$item->alamat}}</td>
                        <td>
                            <a href="{{asset('storage/'. $item->upload_persyaratan)}}" target="_blank" type="button" name="btn_cek_13" style="float: right"
                              class="open-delete btn btn-primary btn-labeled btn-rounded">
                              <b><i class="icon-file-check"></i></b> Softcopy</a>
                        </td>
                        @if ($item->approve == 1)
                        <td>
                            <span class="badge badge-success">Approved</span>
                            <div class="btn-group">
                                <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Actions</button>
                                <ul class="dropdown-menu dropdown-block">
                                  <li><a class="dropdown-item" href="{{route('tuk.unapprove', $item->id)}}">Unapproved</a></li>
                                  <li><a class="dropdown-item" href="{{route('tuk.done', $item->id)}}"">Update Status Tayang</a></li>
                              </ul>
                            </div>
                        </td>
                        @endif
                        <td>{{ $item->is_new == 1 ? 'Baru' : ($item->_is_updated == 1 ? 'Update' : '-')}}</td>
                        <td>{{$item->updated_at }}</td>
                        @if ($item->approve == 0)
                        <td>
                            <a href="javascript:void(0)" onclick="updateTuk({{$item->id}})" class="btn btn-info">Approve</a>
                        </td>
                        @endif
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
          </div>
          </div>
      </div>
  </div>
</div>

<div class="modal fade" id="keabsahanTuk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update TUK LSP</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="tukForm">
                @csrf
                <input type="text" name="idTuk" id="idTuk" />
                <div class="form-group">
                    <label for="namaSkema">Nama TUK</label>
                    <input type="text" name="nama_tuk" id="nama_tuk" class="form-control" readonly>
                    <input type="text" name="no_pencatatan_tuk" id="no_pencatatan_tuk" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="kesesuaian">Approve TUK</label>
                    <select class="form-control" name="approve_tuk" id="approve_tuk">
                        <option value="1" selected>Sesuai</option>
                        <option value="0">Tidak Sesuai</option>
                    </select>
                </div>
        </div>
            <div class="modal-footer">
            <button type="submit" class="btn btn-success">Save changes</button>
            </div>
        </form>
      </div>
    </div>
</div>
@endsection

@push('addon-script')
<script>
    $(document).ready(function () {
        $('#list').DataTable();
    });

    function updateTuk(id){
          var noPencatatan = $("#pencatatan").val()
            $.get('/rekomendasi-lsp/pencatatan/tuk-approve/'+id, function(tuk){
                $("#idTuk").val(tuk.id);
                $("#nama_tuk").val(tuk.nama_tuk);
                $("#approve_tuk").val(tuk.approve);
                $("#no_pencatatan_tuk").val(noPencatatan);
                $("#keabsahanTuk").modal("toggle");
            })
        }
</script>
@endpush
