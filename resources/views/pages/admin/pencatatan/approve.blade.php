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
            <form action="{{route('cek.kelengkapan')}}" method="POST" class="form-horizontal">
                @csrf
            <div class="panel-body">
                <div class="tabbable">
                    <ul class="nav nav-tabs nav-tabs-solid nav-justified">
                        <li class="active"><a href="#administrasi" data-toggle="tab">Administrasi</a></li>
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
                                            <div class="col-md-2">
                                                <div class="content-group-lg">
                                                    <a href="{{Storage::url($data->upload_persyaratan)}}" target="_blank" type="button" name="btn_cek_13" 
                                                        class="open-delete btn btn-primary btn-labeled btn-rounded">
                                                        <b><i class="icon-file-check"></i></b> Softcopy</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="content-group-lg">
                                                    <h6 class="text-semibold">#1</h6>
                                                    <p class="content-group">SK Lisensi</p>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="content-group-lg">
                                                    <a href="{{Storage::url($data->sk_lisensi)}}" target="_blank" type="button" name="btn_cek_13" 
                                                        class="open-delete btn btn-primary btn-labeled btn-rounded">
                                                        <b><i class="icon-file-check"></i></b> Softcopy</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="content-group-lg">
                                                    <h6 class="text-semibold">#1</h6>
                                                    <p class="content-group">Sertifikat Lisensi</p>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="content-group-lg">
                                                    <a href="{{Storage::url($data->sertifikat)}}" target="_blank" type="button" name="btn_cek_13" 
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
                                                <td>Nama LSP</td>
                                                <td>{{$data->administrations->nama}}</td>
                                            </tr>
                                            <tr>
                                                <td>Asosiasi Pembentuk</td>
                                                <td>
                                                <span class="badge badge-info">{{$item->administrasi->unsur->asosiasi}}</span>
                                                <span class="badge badge-info">{{$item->administrasi->unsur1->asosiasi}}</span>
                                                <span class="badge badge-info">{{$item->administrasi->unsur2->asosiasi}}</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Email</td>
                                                <td>{{$data->administrations->email}}</td>
                                            </tr>
                                            <tr>
                                                <td>Alamat</td>
                                                <td>{{$data->administrations->alamat}}</td>
                                            </tr>
                                            <tr>
                                                <td>Kategori</td>
                                                <td>{{$data->administrations->kategori_lsp}}</td>
                                            </tr>
                                            <tr>
                                                <td>Alamat</td>
                                                <td>{{$data->administrations->alamat}}</td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>  
                            </div>
                        </div>

                        <div class="tab-pane" id="sertifikasi-lsp">
                            @foreach ($data->skema as $item)   
                            <div class="col-md-12">
                                <div class="panel panel-flat panel-collapsed">
                                    <div class="panel-heading">
                                        <h5 class="panel-title">
                                            Skema Sertifikasi LSP
                                        </h5>
                                        <div class="heading-elements">
                                            <ul class="icons-list">
                                                <li><a data-action="collapse"></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="content-group-lg">
                                                    <h6 class="text-semibold">#</h6>
                                                    <p class="content-group">Skema Sertifikasi LSP</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <a href="{{Storage::url($item->upload_persyaratan)}}" target="_blank" type="button" name="btn_cek_13" style="float: right" 
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
                                        <th>Kode Skema</th>
                                        <th>Nama Skema</th>
                                        <th>Jabatan Kerja</th>
                                        <th>Klasifikasi</th>
                                        <th>Subklasifikasi</th>
                                        <th>Kualifikasi</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $no = 1;
                                    @endphp
                                        @foreach ($data->skema as $item)   
                                      <tr>
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
                            <table class="table datatable-show-all">
                                <thead>
                                  <tr>
                                    <th>No</th>
                                    <th>Nama Asesor</th>
                                    <th>Alamat</th>
                                    <th>Status Asesor</th>
                                    <th>Nomor Registrasi Asesor</th>
                                    <th class="text-center">Actions</th>
                                  </tr>
                                </thead>
                                <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                  @foreach ($data->asesor as $item)
                                  <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$item->nama_asesor}}</td>
                                    <td>{{$item->alamat}}</td>
                                    <td><span class="label label-success">{{$item->status_asesor}}</span></td>
                                    <td>{{$item->no_registrasi_asesor}}</td>
                                    <td class="text-center">
                                      <a href="#mymodal"
                                      data-remote="{{route('sertifikat.show', $item->slug)}}" 
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
                            <div class="col-md-12">
                                <table class="table datatable-show-all">
                                    <thead>
                                      <tr>
                                        <th>No</th>
                                        <th>Kode TUK</th>
                                        <th>Nama TUK</th>
                                        <th>Jenis TUK</th>
                                        <th>Alamat</th>
                                        <th>Dokumen</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      @foreach ($data->tuk as $item)
                                          <tr>
                                            <td>1</td>
                                            <td>{{$item->kode_tuk}}</td>
                                            <td>{{$item->nama_tuk}}</td>
                                            <td>{{$item->jenis_tuk}}</td>
                                            <td>{{$item->alamat}}</td>
                                            <td>
                                              <a href="{{Storage::url($item->upload_persyaratan)}}" target="_blank" type="button" name="btn_cek_13" style="float: right" 
                                                class="open-delete btn btn-primary btn-labeled btn-rounded">
                                                <b><i class="icon-file-check"></i></b> Softcopy</a>
                                            </td>
                                          </tr>
                                      @endforeach
                                    </tbody>
                                  </table>
                            </div>
                          
                        </div>


                        </div>
                </div>

                <div class="text-right">
                    <td class="text-center">
                        <a href="{{route('pencatatan.submit.status', $data->id)}}?submit_pencatatan=submit" class="btn btn-sm btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></a>
                    </td>
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


