@extends('layouts.v2.app')

@section('breadcumb')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h4>{{ $title }}</h4>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">
                                <svg class="stroke-icon">
                                    <use href="../assets/svg/icon-sprite.svg#stroke-home"></use>
                                </svg></a></li>
                        <li class="breadcrumb-item active">{{ $title }}</li>
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
                                        <th>Kode Skema</th>
                                        <th>Nama Skema</th>
                                        <th>Jabatan Kerja</th>
                                        <th>Klasifikasi</th>
                                        <th>Subklasifikasi</th>
                                        <th>Kualifikasi</th>
                                        <th>Jenjang</th>
                                        <th>Jumlah Unit</th>
                                        <th>Acuan Skema</th>
                                        <th>Skema Sertifikasi</th>
                                        <th>Keterangan</th>
                                        <th>Tanggal Permohonan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{$item->user->nama_lsp ?? '-'}}</td>
                                            <td>{{ $item->kode_skema }}</td>
                                            <td>{{ $item->nama_skema }}</td>
                                            <td>{{ $item->jabker }}</td>
                                            <td>{{ $item->klasifikasi }}</td>
                                            <td>{{ $item->sub_klasifikasi }}</td>
                                            <td>{{ $item->kualifikasi }}</td>
                                            <td>{{ $item->jenjang }}</td>
                                            <td>{{ $item->jumlah_unit }}</td>
                                            <td>{{ $item->acuan_skema }}</td>
                                            <td> <a href="{{ asset('storage/' . $item->upload_persyaratan) }}"
                                                    target="_blank" type="button" name="btn_cek_13" style="float: right"
                                                    class="open-delete btn btn-sm btn-primary btn-labeled btn-rounded">
                                                    <b><i class="icofont icofont-file-document"></i></b> Softcopy</a>
                                                <a href="{{ asset('storage/' . $item->standar_kompetensi) }}" target="_blank"
                                                    type="button" name="btn_cek_13" style="float: right"
                                                    class="open-delete btn btn-sm btn-primary btn-labeled btn-rounded">
                                                    <b><i class="icofont icofont-file-document"></i></b> Softcopy</a>
                                            </td>
                                            <td>{{ $item->is_new == 1 ? 'Baru' : ($item->_is_updated == 1 ? 'Update' : '-')}}</td>
                                            <td>{{$item->updated_at }}</td>
                                            @if ($item->approve == 1)
                                                <td>
                                                    <span class="label label-success">Approved</span>
                                                    <a href="{{ route('skema.unapprove', $item->id) }}"
                                                        class="btn btn-sm btn-danger" target="_blank">Unapproved</a>
                                                </td>
                                            @endif
                                            @if ($item->approve == 0)
                                                <td>
                                                    <a href="javascript:void(0)"
                                                        onclick="updateKeabsahan({{ $item->id }})"
                                                        class="btn btn-info">Approve</a>
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

        <div class="modal fade" id="keabsahan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Keabsahan Skema Sertifikasi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="skemaForm">
                            @csrf
                            <input type="hidden" name="id" id="id" />
                            <div class="form-group">
                                <label for="namaSkema">Nama Skema</label>
                                <input type="text" name="nama_skema" id="nama_skema" class="form-control" readonly>
                                <input type="hidden" name="no_pencatatan" id="no_pencatatan" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="description">Keterangan</label>
                                <textarea class="form-control" name="description" id="description"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="kesesuaian">Approve Skema</label>
                                <select class="form-control" name="approve" id="approve_skema">
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
            $(document).ready(function() {
                $('#list').DataTable();
            });

            function updateKeabsahan(id) {
                var noPencatatan = $("#pencatatan").val()
                $.get('/rekomendasi-lsp/pencatatan/skema-approve/' + id, function(skema) {
                    $("#id").val(skema.id);
                    $("#nama_skema").val(skema.nama_skema);
                    $("#approve").val(skema.approve);
                    $("#no_pencatatan").val(noPencatatan);
                    $("#keabsahan").modal("toggle");
                })
            }

            $('#skemaForm').submit(function(e){
            e.preventDefault();
             var id = $('#id').val();
             var nama_skema = $('#nama_skema').val();
             var approve = $('#approve_skema').val();
             var noPencatatan = $('#no_pencatatan').val();
             var _token = $('input[name=_token]').val();
             var description = $('#description').val();

             $.ajax({
                 url :"{{route('skema.approve.update')}}",
                 type : 'PUT',
                 data : {
                     id : id,
                     nama_skema : nama_skema,
                     approve : approve,
                     no_pencatatan : noPencatatan,
                     description : description,
                     _token : _token
                 },
                 success:function(response){
                     // $('#sid'+response.id + 'td.nth-child(1)').text(response.nama_skema);
                     $("#keabsahan").modal('toggle');
                     $("#skemaForm")[0].reset();
                     alert('Success');
                     window.location.reload()
                 },
                 error: function(xhr, status, error) {
                    var err = eval("(" + xhr.responseText + ")");
                    alert(err.Message);
                }
             })
        })

        </script>
    @endpush
