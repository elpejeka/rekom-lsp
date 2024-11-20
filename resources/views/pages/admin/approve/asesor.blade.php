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
                        <th>NIK</th>
                        <th>Nama Asesor</th>
                        <th>Alamat</th>
                        <th>Status Asesor</th>
                        <th>Nomor Registrasi Asesor</th>
                        <th>Provinsi</th>
                        <th>Profil Asesor</th>
                        <th>Cek Asesor SIKI</th>
                        <th class="text-center">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                          <td>{{$loop->iteration}}</td>
                          <td>{{$item->nik}}</td>
                          <td>{{$item->nama_asesor}}</td>
                          <td>{{$item->alamat}}</td>
                          <td><span class="label label-success">{{$item->status_asesor}}</span></td>
                          <td>{{$item->no_registrasi_asesor}}</td>
                          <td>{{$item->propinsi->Nama ?? '-'}}</td>
                          <td>
                            <a href="javascript:void(0)" onclick="detailAsesor({{$item->id}})" class="btn btn-info">Profil Asesor</a>
                            </a>
                          </td>
                          <td>
                              {{-- <a href="{{route('check.asesor', $item->nik)}}" class="btn btn-primary" target="_blank">Check</a> --}}
                              <a href="javascript:void(0)" onclick="sertifikat({{$item->nik}})" class="btn btn-sm btn-secondary mt-2">Detail Sertifikat</a>
                          </td>
                          <td class="text-center">
                            <a data-toggle="modal" id="smallButton" data-target="#smallModal"
                                data-attr="{{ route('sertifikat.show', $item->id) }}" title="show" class="btn btn-sm btn-info">
                              <i class="icofont icofont-eye-alt"></i>
                            </a>
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

<div class="tab-pane fade" id="asesor" role="tabpanel" aria-labelledby="asesor-icon-tab">
    <div class="col-sm-12 mt-5">
      <div class="row">
        <div class="card">
          <div class="card-header">
            <h4>Asesor</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <tbody>
                  <tr>
                    <td>
                      <select class="select-search form-control" name="status_asesor">
                        <option value="1">Ada</option>
                        <option value="0">Tidak ada</option>
                      </select>
                    </td>
                    <td>
                      <div class="input-group">
                        <input class="form-control" type="text" placeholder="comment...." name="keterangan_asesor">
                        <a href="javascript:void(0)" onclick="komenAsesorBtn()" class="btn btn-info">Kirim Perbaikan</a>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table" id="list_asesor">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>NIK</th>
                    <th>Nama Asesor</th>
                    <th>Alamat</th>
                    <th>Status Asesor</th>
                    <th>Nomor Registrasi Asesor</th>
                    <th>Provinsi</th>
                    <th>Profil Asesor</th>
                    <th>Cek Asesor SIKI</th>
                    <th class="text-center">Actions</th>
                    <th>Status</th>
                    <th>Tayang</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($data->asesor as $item)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->nik}}</td>
                    <td>{{$item->nama_asesor}}</td>
                    <td>{{$item->alamat}}</td>
                    <td><span class="label label-success">{{$item->status_asesor}}</span></td>
                    <td>{{$item->no_registrasi_asesor}}</td>
                    <td>{{$item->propinsi->Nama ?? '-'}}</td>
                    <td>
                      <a href="javascript:void(0)" onclick="detailAsesor({{$item->id}})" class="btn btn-info">Profil Asesor</a>
                      </a>
                    </td>
                    <td>
                        {{-- <a href="{{route('check.asesor', $item->nik)}}" class="btn btn-primary" target="_blank">Check</a> --}}
                        <a href="javascript:void(0)" onclick="sertifikat({{$item->nik}})" class="btn btn-sm btn-secondary mt-2">Detail Sertifikat</a>
                    </td>
                    <td class="text-center">
                      <a data-toggle="modal" id="smallButton" data-target="#smallModal"
                          data-attr="{{ route('sertifikat.show', $item->id) }}" title="show" class="btn btn-sm btn-info">
                        <i class="icofont icofont-eye-alt"></i>
                      </a>
                    </td>
                    @if ($item->approve == 1)
                    <td>
                        <span class="badge badge-success">Approved</span>
                        <div class="btn-group mt-2">
                            <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Actions</button>
                            <ul class="dropdown-menu dropdown-block">
                              <li><a class="dropdown-item"  href="{{route('asesor.unapprove', $item->id)}}">Unapproved</a></li>
                              <li><a class="dropdown-item" href="javascript:void(0)" onclick="importAsesor({{$item->id}})">Import Asesor API</a></li>
                              <li><form action="{{route('pencatatan.asesor.delete', $item->id)}}" method="post" class="d-inline mt-2">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-sm"><i class="icon-trash"></i> Unactive Asesor</button>
                            </form></li>
                              {{-- <li><a class="dropdown-item" href="{{route('asesor.done', $item->id)}}">Update Status Tayang</a></li> --}}
                          </ul>
                        </div>
                        {{-- <a data-id={{$item->id}} id="importAsesor" class="btn btn-sm btn-primary mt-5">Import To Master Penugasan</a> --}}
                    </td>
                    @endif
                    @if ($item->approve != 0 || $item->approve == null)
                    <td>
                        <a href="javascript:void(0)" onclick="updateAsesor({{$item->id}})" class="btn btn-info">Approve</a>
                    </td>
                    @endif
                    <span>{{$item->is_active == 1 ? 'Tayang' : "Tidak Tayang"}}</span>
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
  </div>

  <div class="modal" id="smallModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title-asesor"></h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body-asesor" id="smallBody">
                <i class="fa fa-spinner fa-spin"></i>

            </div>
            <div class="modal-footer-asesor">
              <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
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

    function komenAsesorBtn(){
            $('#komenAsesor').modal("toggle");
        }

        $('#AsesorFormPerbaikan').submit(function(e){
            e.preventDefault();
            var userId = $('#userId').val();
            var asesor = $('#nama_asesor').val();
            var komen = $('#komen_asesor').val();
            var _token = $('input[name=_token]').val();

            $.ajax({
                url : "{{route('add.komen')}}",
                type : 'POST',
                data : {
                    users_id : userId,
                    komen : asesor + ' ' + komen,
                    _token : _token
                },
                success:function(response){
                    $("#komenAsesor").modal('toggle');
                    alert('Success');
                }
            })

        })



    $('#asesorForm').submit(function(e){
            e.preventDefault();
             var id = $('#idAsesor').val();
             var nama_asesor = $('#asesor').val();
             var approve = $('#approve_asesor').val();
             var noPencatatan = $('#no_pencatatan_asesor').val();
             var _token = $('input[name=_token]').val();

             $.ajax({
                 url :"{{route('asesor.approve.update')}}",
                 type : 'PUT',
                 data : {
                     id : id,
                     nama_asesor : nama_asesor,
                     approve : approve,
                     no_pencatatan : noPencatatan,
                     _token : _token
                 },
                 success:function(response){
                     // $('#sid'+response.id + 'td.nth-child(1)').text(response.nama_skema);
                     $("#keabsahanAsesor").modal('toggle');
                     $("#asesorForm")[0].reset();
                     alert('Success');
                 }
             })
        })

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
