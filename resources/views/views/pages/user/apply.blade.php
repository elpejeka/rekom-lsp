@extends('layouts.app')

@section('page-header')
<div class="page-header page-header-default">
  <div class="page-header-content">
    <div class="page-title">
      <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Verifikasi</h4>
    </div>
  </div>

  <div class="breadcrumb-line">
    <ul class="breadcrumb">
      <li><a href="{{route('home')}}"><i class="icon-home2 position-left"></i> Home</a></li>
      <li class="active">Cek Kelengkapan Dokumen</li>
    </ul>
  </div>
</div>
@endsection

@section('content')
<div class="container-detached">
    <div class="content-detached">

        <div class="panel panel-flat">
            <div class="panel-heading">
                <h6 class="panel-title">Asosiasi Profesi</h6>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                    </ul>
                </div>
            </div>
            <form action="{{route('validasi.verifikasi')}}" method="POST" class="form-horizontal">
                @csrf
            <div class="panel-body">
                <input type="text" value="{{$permohonan->id}}" name="permohonans_id" hidden/>
                <div class="tabbable">
                    <ul class="nav nav-tabs nav-tabs-solid nav-justified">
                        <li class="active"><a href="#administrasi" data-toggle="tab">Administrasi</a></li>
                        <li><a href="#organisasi" data-toggle="tab">Organisasi</a></li>
                        <li><a href="#klasifikasi" data-toggle="tab">Klasifikasi dan SubKlasifikasi</a></li>
                        <li><a href="#sertifikasi-lsp" data-toggle="tab">Skema LSP</a></li>
                        <li><a href="#asesor" data-toggle="tab">Asesor</a></li>
                        <li><a href="#tuk" data-toggle="tab">Tempat Uji Kompetensi</a></li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane active" id="administrasi">
                            <div class="col-md-12">
                                <div class="panel panel-flat panel-collapsed">
                                    <div class="panel-heading">
                                        <h5 class="panel-title">
                                            Administrasi
                                        </h5>
                                        <div class="heading-elements">
                                            <ul class="icons-list">
                                                <li><a data-action="collapse"></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="content-group-lg">
                                                    <h6 class="text-semibold">#1</h6>
                                                    <p class="content-group">Surat Permohonan</p>
                                                </div>
                                            </div>
                                            <div class="col-md-4" style="margin-top: 20px;">
                                                <div class="content-group-lg">
                                                <a href="{{asset('laravel/storage/app/public/'. $data->surat_permohonan)}}" target="_blank" type="button" name="btn_cek_13" style="float: right"
                                                    class="open-delete btn btn-primary btn-labeled btn-rounded">
                                                    <b><i class="icon-file-check"></i></b> Softcopy</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="content-group-lg">
                                                    <h6 class="text-semibold">#2</h6>
                                                    <p class="content-group">SK Menteri Tentang Asoasi Terakreditasi</p>
                                                </div>
                                            </div>
                                            <div class="col-md-4" style="margin-top: 20px;">
                                                <div class="content-group-lg">
                                                <a href="{{asset('laravel/storage/app/public/'. $permohonan->administrasi->upload_persyaratan)}}" target="_blank" type="button" name="btn_cek_13" style="float: right"
                                                    class="open-delete btn btn-primary btn-labeled btn-rounded">
                                                    <b><i class="icon-file-check"></i></b> Softcopy</a>
                                                </div>
                                            </div>

                                        </div>

                                          <div class="row">
                                            <div class="col-md-2">
                                                <div class="content-group-lg">
                                                    <h6 class="text-semibold">#3</h6>
                                                    <p class="content-group">Akta Pendirian LSP</p>
                                                </div>
                                            </div>
                                            <div class="col-md-4" style="margin-top: 20px;">
                                                <div class="content-group-lg">
                                                <a href="{{asset('laravel/storage/app/public/'. $permohonan->administrasi->akta_pendirian)}}" target="_blank" type="button" name="btn_cek_13" style="float: right"
                                                    class="open-delete btn btn-primary btn-labeled btn-rounded">
                                                    <b><i class="icon-file-check"></i></b> Softcopy</a>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="content-group-lg">
                                                    <h6 class="text-semibold">#4</h6>
                                                    <p class="content-group">Pernyataan Komitmen Asesor</p>
                                                </div>
                                            </div>
                                            <div class="col-md-4" style="margin-top: 20px;">
                                                <div class="content-group-lg">
                                                <a href="{{asset('laravel/storage/app/public/'. $permohonan->administrasi->komitmen_asesor)}}" target="_blank" type="button" name="btn_cek_13" style="float: right"
                                                    class="open-delete btn btn-primary btn-labeled btn-rounded">
                                                    <b><i class="icon-file-check"></i></b> Softcopy</a>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-lg">
                                        <thead>
                                            <tr>
                                                <td>Data</td>
                                                <td>Description</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Jenis Permohonan</td>
                                                <td>{{ucfirst($permohonan->jenis_permohonan)}}</td>
                                            </tr>
                                            <tr>
                                                <td>Nama LSP</td>
                                                <td>{{$permohonan->nama_lsp}}</td>
                                            </tr>
                                            <tr>
                                                <td>Asosiasi Pembentuk</td>
                                                <td>
                                                <span class="badge badge-info">{{$permohonan->administrasi->unsur->asosiasi}}</span>
                                                <span class="badge badge-info">{{$permohonan->administrasi->unsur1->asosiasi}}</span>
                                                <span class="badge badge-info">{{$permohonan->administrasi->unsur2->asosiasi}}</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Email</td>
                                                <td>{{$permohonan->email}}</td>
                                            </tr>
                                            <tr>
                                                <td>Kategori Asosiasi</td>
                                                <td>{{$permohonan->administrasi->kategori_lsp}}</td>
                                            </tr>
                                            <tr>
                                                <td>Jenis LSP</td>
                                                <td>{{$permohonan->administrasi->jenis_lsp}}</td>
                                            </tr>
                                            <tr>
                                                <td>Alamat</td>
                                                <td>{{$permohonan->alamat}}</td>
                                            </tr>
                                            <tr>
                                                <td>Status Kepemilikan</td>
                                                <td>{{$permohonan->administrasi->status_kepemilikan}}</td>
                                            </tr>
                                            <tr>
                                                <td>No Telpon</td>
                                                <td>{{$permohonan->administrasi->no_telp}}</td>
                                            </tr>
                                            <tr>
                                                <td>Website</td>
                                                <td>{{$permohonan->administrasi->website}}</td>
                                            </tr>
                                            <tr>
                                                <td>Jumlah Skema Sertifikasi</td>
                                                <td>{{$permohonan->administrasi->jumlah_skema}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="organisasi">
                            <div class="col-md-12">
                                <div class="panel panel-flat panel-collapsed">
                                    <div class="panel-heading">
                                        <h5 class="panel-title">
                                            Organisasi
                                        </h5>
                                        <div class="heading-elements">
                                            <ul class="icons-list">
                                                <li><a data-action="collapse"></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="content-group-lg">
                                                    <h6 class="text-semibold">#1</h6>
                                                    <p class="content-group">Surat Permohonan Pengajuan</p>
                                                </div>
                                            </div>
                                            <div class="col-md-4" style="margin-top: 20px;">
                                                <a href="{{asset('laravel/storage/app/public/'.$permohonan->organization->upload_persyaratan)}}" target="_blank" type="button" name="btn_cek_13" style="float: right"
                                                    class="open-delete btn btn-primary btn-labeled btn-rounded">
                                                    <b><i class="icon-file-check"></i></b> Softcopy</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-lg">
                                        <thead>
                                            <tr>
                                                <td>Data</td>
                                                <td>Description</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                             <tr>
                                                <td>Nama Pengarah</td>
                                                <td>{{$permohonan->organization->pengarah}}</td>
                                                <td>{{$permohonan->organization->no_telp_pengarah}}</td>
                                            </tr>
                                            <tr>
                                                <td>Nama Pengarah</td>
                                                <td>{{$permohonan->organization->pengarah_1}}</td>
                                                <td>{{$permohonan->organization->no_telp_pengarah_1}}</td>
                                            </tr>
                                            <tr>
                                                <td>Nama Pengarah</td>
                                                <td>{{$permohonan->organization->pengarah_2}}</td>
                                                <td>{{$permohonan->organization->no_telp_pengarah_2}}</td>
                                            </tr>
                                            <tr>
                                                <td>Nama Pengarah</td>
                                                <td>{{$permohonan->organization->pengarah_3}}</td>
                                                <td>{{$permohonan->organization->no_telp_pengarah_3}}</td>
                                            </tr>
                                            <tr>
                                                <td>Nama Pengarah</td>
                                                <td>{{$permohonan->organization->pengarah_4}}</td>
                                                <td>{{$permohonan->organization->no_telp_pengarah_4}}</td>
                                            </tr>
                                            <tr>
                                                <td>Ketua Pelaksana</td>
                                                <td>{{$permohonan->organization->ketua}}</td>
                                                <td>{{$permohonan->organization->no_ketua}}</td>
                                            </tr>
                                            <tr>
                                                <td>Penanggungjawab Bagian Umum</td>
                                                <td>{{$permohonan->organization->umum}}</td>
                                                <td>{{$permohonan->organization->no_umum}}</td>
                                            </tr>
                                            <tr>
                                                <td>Penanggungjawab Bagian Sertifikasi</td>
                                                <td>{{$permohonan->organization->sertifikasi}}</td>
                                                <td>{{$permohonan->organization->no_sertifikasi}}</td>
                                            </tr>
                                            <tr>
                                                <td>Penanggungjawab Bagian Manajemen Mutu</td>
                                                <td>{{$permohonan->organization->manajemen_mutu}}</td>
                                                <td>{{$permohonan->organization->no_manajemen}}</td>
                                            </tr>
                                            <tr>
                                                <td>Jumlah Karyawan</td>
                                                <td colspan="2">{{$permohonan->organization->jumlah_karyawan}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="klasifikasi">

                            <div class="col-md-12">
                                <div class="panel panel-flat panel-collapsed">
                                    <div class="panel-heading">
                                        <h5 class="panel-title">
                                           Klasifikasi dan Subklasifikasi
                                        </h5>
                                        <div class="heading-elements">
                                            <ul class="icons-list">
                                                <li><a data-action="collapse"></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">

                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <table class="table datatable-show-all">
                                    <thead>
                                      <tr>
                                        <th>No</th>
                                        <th>Klasifikasi</th>
                                        <th>Subklasifikasi</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                    @php $no = 1; @endphp
                                        @foreach ($klasifikasi as $item)
                                          <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$item->nama}}</td>
                                            <td>{{$item->subklas}}</td>
                                          </tr>
                                          @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>

                        <div class="tab-pane" id="sertifikasi-lsp">


                            <div class="col-md-12">
                                <table class="table datatable-show-all">
                                    <thead>
                                      <tr>
                                        <th>No</th>
                                        <th>Kode Skema</th>
                                        <th>Nama Skema</th>
                                        <th>Jabatan Kerja</th>
                                        <th>Klasifikasi</th>
                                        <th>Subklasifikasi</th>
                                        <th>Kualifikasi</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                    @php $no = 1; @endphp
                                    @foreach ($data->skema as $item)
                                      <tr id="sid{{$item->id}}">
                                        <td>{{$no++}}</td>
                                        <td>{{$item->kode_skema}}</td>
                                        <td>{{$item->nama_skema}}</td>
                                        <td>{{$item->jabker}}</td>
                                        <td>{{$item->klasifikasi}}</td>
                                        <td>{{$item->sub_klasifikasi}}</td>
                                        <td>{{$item->kualifikasi}}</td>
                                      </tr>
                                     @endforeach
                                    </tbody>
                                  </table>
                            </div>

                        </div>

                        <div class="tab-pane" id="asesor">
                        <div class="col-md-12">
                                <div class="panel panel-flat panel-collapsed">
                                    <div class="panel-heading">
                                        <h5 class="panel-title">
                                          Surat Pernyataan Komitmen Asesor
                                        </h5>
                                        <div class="heading-elements">
                                            <ul class="icons-list">
                                                <li><a data-action="collapse"></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="content-group-lg">
                                                    <h6 class="text-semibold"># 1</h6>
                                                    <p class="content-group">Surat Pernyataan Komitmen Asesor</p>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <a href="{{asset('laravel/storage/app/public/'.$permohonan->administrasi->komitmen_asesor)}}" target="_blank" type="button" name="btn_cek_13" style="float: right"
                                                    class="open-delete btn btn-primary btn-labeled btn-rounded">
                                                    <b><i class="icon-file-check"></i></b> Softcopy</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                       <table class="table datatable-show-all">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>NIK</th>
                                <th>Nama Asesor</th>
                                <th>Tercatat</th>
                                <th>Alamat</th>
                                <th>Status Asesor</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                            $no= 1;
                            @endphp
                            @foreach ($permohonan->asesors as $item)

                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$item->nik}}</td>
                                <td>{{$item->nama_asesor}}</td>
                                <td>
                                <span class="badge badge-primary">{{$item->tercatat == 1 ? "Ya" : 'Tidak'}}</span>
                                </td>
                                <td>{{$item->alamat}}</td>
                                <td>{{$item->status_asesor}}</td>
                                <td class="text-center">
                                <a href="#mymodal"
                                data-remote="{{route('asesor.show', $item->slug)}}"
                                data-toggle="modal"
                                data-target="#mymodal"
                                data-title="Detail Asesor {{$item->nama_asesor}}"
                                class="btn btn-sm btn-info">
                                    <i class="icon-eye2"></i></a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        </div>

                        <div class="tab-pane" id="tuk">
                            @foreach ($permohonan->locations as $item)
                            <div class="col-md-12">
                                <div class="panel panel-flat panel-collapsed">
                                    <div class="panel-heading">
                                        <h5 class="panel-title">
                                            Tempat Uji Kompetensi - {{$item->nama_tuk}}
                                        </h5>
                                        <div class="heading-elements">
                                            <ul class="icons-list">
                                                <li><a data-action="collapse"></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="content-group-lg">
                                                    <h6 class="text-semibold"></h6>
                                                    <p class="content-group">Sarana dan Prasarana</p>
                                                </div>
                                            </div>
                                            <div class="col-md-4" style="margin-top: 20px;">
                                                <a href="{{asset('laravel/storage/app/public/'.$item->cakupan)}}" target="_blank" type="button" name="btn_cek_13" style="float: right"
                                                    class="open-delete btn btn-primary btn-labeled btn-rounded">
                                                    <b><i class="icon-file-check"></i></b> Softcopy</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                            <div class="col-md-12">
                                <table class="table datatable-show-all">
                                    <thead>
                                      <tr>
                                        <th>No</th>
                                        <th>Nama TUK</th>
                                        <th>Alamat</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                    @php $no = 1; @endphp
                                    @foreach ($permohonan->locations as $item)
                                          <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$item->nama_tuk}}</td>
                                            <td>{{$item->alamat}}</td>
                                          </tr>
                                          @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>


                        </div>
                </div>
                <div class="text-right">
                    <a href="{{route('submitted', $data->id)}}?status_submit=submit" class="btn btn-sm btn-primary">Submit</a>
                </div>
            </div>
        </form>


        </div>

    </div>
</div>
<!-- /detached content -->
@endsection

@push('addon-script')
<script>
  jQuery(document).ready(function($){
      $('#mymodal').on('show.bs.modal', function(e){
          var button = $(e.relatedTarget);
          var modal = $(this);
          modal.find('.modal-body').load(button.data("remote"));
          modal.find('.modal-title').html(button.data("title"));
      });
  });
</script>


<div class="modal" id="mymodal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title"></h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              <i class="fa fa-spinner fa-spin"></i>
          </div>
      </div>
  </div>
</div>
@endpush
