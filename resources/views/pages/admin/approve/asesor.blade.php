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
                                        <th>NIK</th>
                                        <th>Nama Asesor</th>
                                        <th>Alamat</th>
                                        <th>Status Asesor</th>
                                        <th>Nomor Registrasi Asesor</th>
                                        <th>Provinsi</th>
                                        <th>Keterangan</th>
                                        <th>Profil Asesor</th>
                                        <th>Cek Asesor SIKI</th>
                                        <th>Tgl Permohonan</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->user->nama_lsp ?? '-' }}</td>
                                            <td>{{ $item->nik }}</td>
                                            <td>{{ $item->nama_asesor }}</td>
                                            <td>{{ $item->alamat }}</td>
                                            <td><span class="label label-success">{{ $item->status_asesor }}</span></td>
                                            <td>{{ $item->no_registrasi_asesor }}</td>
                                            <td>{{ $item->propinsi->Nama ?? '-' }}</td>
                                            <td>{{ $item->is_new == 1 ? 'Baru' : ($item->_is_updated == 1 ? 'Update' : '-')}}</td>
                                            <td>
                                                <a href="javascript:void(0)" onclick="detailAsesor({{ $item->id }})"
                                                    class="btn btn-info">Profil Asesor</a>
                                                </a>
                                            </td>
                                            <td>
                                                {{-- <a href="{{route('check.asesor', $item->nik)}}" class="btn btn-primary" target="_blank">Check</a> --}}
                                                <a href="javascript:void(0)" onclick="sertifikat({{ $item->nik }})"
                                                    class="btn btn-sm btn-secondary mt-2">Detail Sertifikat</a>
                                            </td>
                                            <td>{{$item->updated_at }}</td>
                                            <td class="text-center">
                                                <a href="javascript:void(0)" onclick="updateAsesor({{$item->id}})" class="btn btn-info">Approve</a>
                                                <a data-toggle="modal" id="smallButton" data-target="#smallModal"
                                                    data-attr="{{ route('sertifikat.show', $item->id) }}" title="show"
                                                    class="btn btn-sm btn-info">
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

        <div class="modal fade" id="keabsahanAsesor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Update Keabsahan Asesor LSP</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <form id="asesorForm">
                        @csrf
                        <input type="text" name="idAsesor" id="idAsesor" hidden/>
                        <div class="form-group">
                            <label for="namaSkema">Nama Asesor</label>
                            <input type="text" name="nama_asesor" id="nama_asesor" class="form-control" readonly>
                            <input type="text" name="no_pencatatan_asesor" id="no_pencatatan_asesor" class="form-control" hidden>
                        </div>
                        <div class="form-group">
                            <label for="description">Keterangan</label>
                            <textarea class="form-control" name="description" id="description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="kesesuaian">Approve Asesor</label>
                            <select class="form-control" name="approve_asesor" id="approve_asesor">
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

            function komenAsesorBtn() {
                $('#komenAsesor').modal("toggle");
            }

            $('#asesorForm').submit(function(e) {
                e.preventDefault();
                var id = $('#idAsesor').val();
                var nama_asesor = $('#asesor').val();
                var approve = $('#approve_asesor').val();
                var noPencatatan = $('#no_pencatatan_asesor').val();
                var description = $('#description').val();
                var _token = $('input[name=_token]').val();

                $.ajax({
                    url: "{{ route('asesor.approve.update') }}",
                    type: 'PUT',
                    data: {
                        id: id,
                        nama_asesor: nama_asesor,
                        approve: approve,
                        no_pencatatan: noPencatatan,
                        description : description,
                        _token: _token
                    },
                    success: function(response) {
                        // $('#sid'+response.id + 'td.nth-child(1)').text(response.nama_skema);
                        $("#keabsahanAsesor").modal('toggle');
                        $("#asesorForm")[0].reset();
                        alert('Success');
                    }
                })
            })

            function updateAsesor(id) {
                var noPencatatan = $("#pencatatan").val()
                $.get('/rekomendasi-lsp/pencatatan/asesor-approve/' + id, function(asesor) {
                    $("#idAsesor").val(asesor.id);
                    $("#nama_asesor").val(asesor.nama_asesor);
                    $("#approve_asesor").val(asesor.approve);
                    $("#no_pencatatan_asesor").val(noPencatatan);
                    $("#keabsahanAsesor").modal("toggle");
                })
            }

            function sertifikat(nik) {
                $.get('/rekomendasi-lsp/reference/get-sertifikat/' + nik, function(res) {
                    const dateNow = new Date();
                    var sertifikat = res.data;
                    var table = '<table class="table table-bordered">' +
                        '<thead>' +
                        '<tr>' +
                        '<th>Nama</th>' +
                        '<th>ID Sub Bidang</th>' +
                        '<th>Jabatan Kerja</th>' +
                        '<th>Kualifikasi</th>' +
                        '<th>Asosiasi</th>' +
                        '<th>Tanggal Cetak</th' +
                        '</tr>' +
                        '</thead>' +
                        '<tbody>';


                    sertifikat.forEach(function(item) {
                        const serDate = new Date(item.tanggal_cetak);
                        var style = (serDate > dateNow) ? 'background-color:#ff0000;' :
                            'background-color:#fff;';
                        table += '<tr style="' + style + '">' +
                            '<td>' + item.nama + '</td>' +
                            '<td>' + item.id_sub_bidang + '</td>' +
                            '<td>' + item.des_sub_klas + '</td>' +
                            '<td>' + item.kualifikasi + '</td>' +
                            '<td>' + item.asosiasi + '</td>' +
                            '<td>' + item.tanggal_cetak + '</td>' +
                            '</tr>';
                    });

                    table += '</tbody></table>';

                    $('#modal-body').html(table);
                    $('#detail').modal("toggle")
                });
            }

            function detailAsesor(id) {
                $.get('/rekomendasi-lsp/pencatatan/asesor-approve/' + id, function(data) {
                    let tmpatLahir = data.tempat_lahir == null ? '-' : data.tmpt_lhir.Nama
                    let prov = data.provinsi == null ? '-' : data.propinsi.Nama
                    let kab = data.kab_kota == null ? '-' : data.kabkota.nama_kabupaten_dagri

                    $("#namaAsesor").val(data.nama_asesor);
                    $("#nikAsesor").val(data.nik);
                    $("#emailAsesor").val(data.email);
                    $("#tglLahir").val(data.tgl_lahir);
                    $("#address").val(data.alamat);
                    $("#education").val(data.pendidikan);
                    $("#tempatLahir").val(tmpatLahir);
                    $("#prov").val(prov);
                    $("#kab").val(kab);
                    $('#tlpAsesor').val(data.no_telpon);
                    $("#detailAsesor").modal("toggle");
                })
            }
        </script>
    @endpush
