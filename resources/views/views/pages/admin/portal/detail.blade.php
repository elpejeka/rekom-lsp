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
            <form action="{{route('verifikasi.portal')}}" method="POST" class="form-horizontal">
                @csrf
                <div class="panel-body">
                    {{-- <input type="text" value="{{$permohonan->id}}" name="permohonans_id" hidden/> --}}
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
                                                <div class="col-md-2">
                                                    <div class="content-group-lg">
                                                    <a href="{{$detail->surat_permohonan}}" target="_blank" type="button" name="btn_cek_13" style="float: right" 
                                                        class="open-delete btn btn-primary btn-labeled btn-rounded">
                                                        <b><i class="icon-file-check"></i></b> Softcopy</a>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="content-group-lg text-center">
                                                        <select class="select-search form-control" name="status_surat">
                                                            <option value="1">Ada</option>
                                                            <option value="0">Tidak ada</option>    
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="input-group content-group">
                                                        <div class="has-feedback has-feedback-left">
                                                            <input type="text" name="keterangan_surat" class="form-control" placeholder="Comment..." name="keterangan_surat">
                                                            <input type="hidden" value="{{$detail->id_izin}}" name="id_izin"/>
                                                            <input type="hidden" value="{{$id_permohonan}}" name="permohonans_id"/>
                                                            <div class="form-control-feedback">
                                                                <i class="icon-comments text-muted text-size-base"></i>
                                                            </div>
                                                        </div>

                                                        <div class="input-group-btn">
                                                        <button type="button" id="get_16" class="btn btn-primary btn-ladda btn-ladda-spinner" data-spinner-color="#333" data-style="zoom-in"><span class="ladda-label"></span></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <div class="content-group-lg">
                                                        <h6 class="text-semibold">#2</h6>
                                                        <p class="content-group">SK Asosiasi Terakreditasi / Surat Tanda Teregistrasi LPPK</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="content-group-lg">
                                                    
                                                    <a href="{{$detail->upload_persyaratan}}" target="_blank" type="button" name="btn_cek_13" style="float: right" 
                                                        class="open-delete btn btn-primary btn-labeled btn-rounded">
                                                        <b><i class="icon-file-check"></i></b> Softcopy</a>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="content-group-lg text-center">
                                                        <select class="select-search form-control" name="status_asosiasi">
                                                            <option value="1">Ada</option>
                                                            <option value="0">Tidak ada</option>    
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="input-group content-group">
                                                        <div class="has-feedback has-feedback-left">
                                                            <input type="text" name="keterangan_asosiasi" class="form-control" placeholder="Comment...">
                                                            <div class="form-control-feedback">
                                                                <i class="  icon-comments text-muted text-size-base"></i>
                                                            </div>
                                                        </div>

                                                        <div class="input-group-btn">
                                                        <button type="button" id="get_16" class="btn btn-primary btn-ladda btn-ladda-spinner" data-spinner-color="#333" data-style="zoom-in"><span class="ladda-label"></span></button>
                                                        </div>
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
                                                <div class="col-md-2">
                                                    <div class="content-group-lg">
                                                    
                                                    <a href="{{$detail->akta_pendirian}}" target="_blank" type="button" name="btn_cek_13" style="float: right" 
                                                        class="open-delete btn btn-primary btn-labeled btn-rounded">
                                                        <b><i class="icon-file-check"></i></b> Softcopy</a>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="content-group-lg text-center">
                                                        <select class="select-search form-control" name="status_akta">
                                                            <option value="1">Ada</option>
                                                            <option value="0">Tidak ada</option>    
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="input-group content-group">
                                                        <div class="has-feedback has-feedback-left">
                                                            <input type="text" name="keterangan_akta" class="form-control" placeholder="Comment...">
                                                            <div class="form-control-feedback">
                                                                <i class="  icon-comments text-muted text-size-base"></i>
                                                            </div>
                                                        </div>

                                                        <div class="input-group-btn">
                                                        <button type="button" id="get_16" class="btn btn-primary btn-ladda btn-ladda-spinner" data-spinner-color="#333" data-style="zoom-in"><span class="ladda-label"></span></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <div class="content-group-lg">
                                                        <h6 class="text-semibold">#4</h6>
                                                        <p class="content-group">Surat Pernyataan Komitmen Asesor</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="content-group-lg">
                                                    
                                                    <a href="{{$detail->komitmen_asesor}}" target="_blank" type="button" name="btn_cek_13" style="float: right" 
                                                        class="open-delete btn btn-primary btn-labeled btn-rounded">
                                                        <b><i class="icon-file-check"></i></b> Softcopy</a>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="content-group-lg text-center">
                                                        <select class="select-search form-control" name="status_komitmen">
                                                            <option value="1">Ada</option>
                                                            <option value="0">Tidak ada</option>    
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="input-group content-group">
                                                        <div class="has-feedback has-feedback-left">
                                                            <input type="text" name="keterangan_komitmen" class="form-control" placeholder="Comment...">
                                                            <div class="form-control-feedback">
                                                                <i class="  icon-comments text-muted text-size-base"></i>
                                                            </div>
                                                        </div>

                                                        <div class="input-group-btn">
                                                        <button type="button" id="get_16" class="btn btn-primary btn-ladda btn-ladda-spinner" data-spinner-color="#333" data-style="zoom-in"><span class="ladda-label"></span></button>
                                                        </div>
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
                                                    <td>Baru</td>
                                                </tr>
                                                <tr>
                                                    <td>Nama LSP</td>
                                                    <td>Nama</td>
                                                </tr>
                                                <tr>
                                                    <td>Asosiasi Pembentuk</td>
                                                    <td>
                                                    <span class="badge badge-info">{{$detail->nama_0}}</span>
                                                    <span class="badge badge-info">{{$detail->nama_1}}</span>
                                                    <span class="badge badge-info">{{$detail->nama_2}}</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Kategori Asosiasi</td>
                                                    <td>{{$detail->kategori_lsp}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Email</td>
                                                    <td>{{$detail->email}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Jenis LSP</td>
                                                    <td>{{$detail->jenis_lsp}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Provinsi</td>
                                                    <td>{{$detail->provinsi}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Alamat</td>
                                                    <td>{{$detail->alamat}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Status Kepemilikan</td>
                                                    <td>{{$detail->status_kepemilikan}}</td>
                                                </tr>
                                                <tr>
                                                    <td>No Telpon</td>
                                                    <td>{{$detail->no_telp}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Website</td>
                                                    <td>{{$detail->website}}</td>
                                                </tr>   
                                                <tr>
                                                    <td>Jumlah Skema Sertifikasi</td>
                                                    <td>{{$detail->jumlah_skema}}</td>
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
                                                        <h6 class="text-semibold">#3</h6>
                                                        <p class="content-group">Struktur Organisasi</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <a href="{{$detail->upload_persyaratan}}" target="_blank" type="button" name="btn_cek_13" style="float: right" 
                                                        class="open-delete btn btn-primary btn-labeled btn-rounded">
                                                        <b><i class="icon-file-check"></i></b> Softcopy</a>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="content-group-lg text-center">
                                                        <select class="select-search form-control" name="status_organisasi">
                                                            <option value="1">Ada</option>
                                                            <option value="0">Tidak ada</option>    
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="input-group content-group">
                                                        <div class="has-feedback has-feedback-left">
                                                            <input type="text" name="keterangan_organisasi" class="form-control" placeholder="Comment...">
                                                            <div class="form-control-feedback">
                                                                <i class="  icon-comments text-muted text-size-base"></i>
                                                            </div>
                                                        </div>

                                                        <div class="input-group-btn">
                                                        <button type="button" id="get_16" class="btn btn-primary btn-ladda btn-ladda-spinner" data-spinner-color="#333" data-style="zoom-in"><span class="ladda-label"></span></button>
                                                        </div>
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
                                                    <th>Data</th>
                                                    <th>Nama</th>
                                                    <th>No Telpon</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Pengarah</td>
                                                    <td>{{$detail->pengarah}}</td>
                                                    <td>{{$detail->no_telp_pengarah}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Pengarah</td>
                                                    <td>{{$detail->pengarah_1}}</td>
                                                    <td>{{$detail->no_telp_pengarah_1}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Pengarah</td>
                                                    <td>{{$detail->pengarah_2}}</td>
                                                    <td>{{$detail->no_telp_pengarah_2}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Pengarah</td>
                                                    <td>{{$detail->pengarah_3}}</td>
                                                    <td>{{$detail->no_telp_pengarah_3}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Pengarah</td>
                                                    <td>{{$detail->pengarah_4}}</td>
                                                    <td>{{$detail->no_telp_pengarah_4}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Pengarah</td>
                                                    <td>{{$detail->pengarah_5}}</td>
                                                    <td>{{$detail->no_telp_pengarah_5}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Ketua Pelaksana</td>
                                                    <td>{{$detail->ketua}}</td>
                                                    <td>{{$detail->no_ketua}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Penanggungjawab Bagian Umum</td>
                                                    <td>{{$detail->umum}}</td>
                                                    <td>{{$detail->no_umum}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Penanggungjawab Bagian Sertifikasi</td>
                                                    <td>{{$detail->sertifikasi}}</td>
                                                    <td>{{$detail->no_sertifikasi}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Penanggungjawab Bagian Manajemen Mutu</td>
                                                    <td>{{$detail->manajemen_mutu}}</td>
                                                    <td>{{$detail->no_manajemen}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Jumlah Karyawan</td>
                                                    <td colspan="2">{{$detail->jumlah_karyawan}}</td>
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
                                                <div class="col-md-4">
                                                    <div class="content-group-lg text-center">
                                                        <select class="select-search form-control" name="status_klasifikasi">
                                                            <option value="1">Ada</option>
                                                            <option value="0">Tidak ada</option>    
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="input-group content-group">
                                                        <div class="has-feedback has-feedback-left">
                                                            <input type="text" name="keterangan_klasifikasi" class="form-control" placeholder="Comment...">
                                                            <div class="form-control-feedback">
                                                                <i class="  icon-comments text-muted text-size-base"></i>
                                                            </div>
                                                        </div>

                                                        <div class="input-group-btn">
                                                        <button type="button" id="get_16" class="btn btn-primary btn-ladda btn-ladda-spinner" data-spinner-color="#333" data-style="zoom-in"><span class="ladda-label"></span></button>
                                                        </div>
                                                    </div>
                                                </div>
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
                                            @foreach ($lingkup as $item)
                                            <tr>
                                                <td>{{$no++}}</td>
                                                <td>{{$item->klasifikasi}}</td>
                                                <td>{{$item->sub_klasifikasi}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                
                            </div>

                            <div class="tab-pane" id="sertifikasi-lsp">
                                <div class="col-md-12">
                                    <div class="panel panel-flat panel-collapsed">
                                        <div class="panel-heading">
                                            <h5 class="panel-title">
                                            Skema Sertifikasi
                                            </h5>
                                            <div class="heading-elements">
                                                <ul class="icons-list">
                                                    <li><a data-action="collapse"></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="content-group-lg text-center">
                                                        <select class="select-search form-control" name="status_skema">
                                                            <option value="1">Ada</option>
                                                            <option value="0">Tidak ada</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="input-group content-group">
                                                        <div class="has-feedback has-feedback-left">
                                                            <input type="text" name="keterangan_skema" class="form-control" placeholder="Comment...">
                                                            <div class="form-control-feedback">
                                                                <i class="  icon-comments text-muted text-size-base"></i>
                                                            </div>
                                                        </div>

                                                        <div class="input-group-btn">
                                                        <button type="button" id="get_16" class="btn btn-primary btn-ladda btn-ladda-spinner" data-spinner-color="#333" data-style="zoom-in"><span class="ladda-label"></span></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

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
                                                <th>Jumlah Unit</th>
                                                <th>Acuan Skema</th>
                                                <th>Dokumen Skema</th>
                                                <th>Standar Kompetensi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @php $no = 1; @endphp
                                            @foreach ($skema as $item)
                                            <tr>
                                                <td>{{$no++}}</td>
                                                <td>{{$item->kode_skema}}</td>
                                                <td>{{$item->nama_skema}}</td>
                                                <td>{{$item->jabker}}</td>
                                                <td>{{$item->klasifikasi}}</td>
                                                <td>{{$item->sub_klasifikasi}}</td>
                                                <td>{{$item->kualifikasi}}</td>
                                                <td>{{$item->jumlah_unit}}</td>
                                                <td>{{$item->acuan_skema}}</td>
                                                <td>
                                                    <a href="{{$item->upload_persyaratan}}" target="_blank" type="button" name="btn_cek_13" style="float: right" 
                                                        class="open-delete btn btn-primary btn-labeled btn-rounded">
                                                        <b><i class="icon-file-check"></i></b> Softcopy</a>    
                                                </td>
                                                <td>
                                                    <a href="{{$item->standar_kompetensi}}" target="_blank" type="button" name="btn_cek_13" style="float: right" 
                                                        class="open-delete btn btn-primary btn-labeled btn-rounded">
                                                        <b><i class="icon-file-check"></i></b> Softcopy</a>
                                                </td>
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
                                            Asesor LSP
                                            </h5>
                                            <div class="heading-elements">
                                                <ul class="icons-list">
                                                    <li><a data-action="collapse"></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="content-group-lg text-center">
                                                        <select class="select-search form-control" name="status_asesor">
                                                            <option value="1">Ada</option>
                                                            <option value="0">Tidak ada</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="input-group content-group">
                                                        <div class="has-feedback has-feedback-left">
                                                            <input type="text" name="keterangan_asesor" class="form-control" placeholder="Comment...">
                                                            <div class="form-control-feedback">
                                                                <i class="  icon-comments text-muted text-size-base"></i>
                                                            </div>
                                                        </div>

                                                        <div class="input-group-btn">
                                                        <button type="button" id="get_16" class="btn btn-primary btn-ladda btn-ladda-spinner" data-spinner-color="#333" data-style="zoom-in"><span class="ladda-label"></span></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <table class="table datatable-show-all">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>NIK</th>
                                                <th>Nama Asesor</th>
                                                <th>Alamat</th>
                                                <th>Status Asesor</th>
                                                <th>Tercatat</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @php $no = 1; @endphp
                                            @foreach ($asesor as $item)
                                            <tr>
                                                <td>{{$no++}}</td>
                                                <td>{{$item->nik}}</td>
                                                <td>{{$item->nama_asesor}}</td>
                                                <td>{{$item->alamat}}</td>
                                                <td>{{$item->status_asesor}}</td>
                                                <td>{{$item->tercatat}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                            <div class="tab-pane" id="tuk">
                                <div class="col-md-12">
                                    <div class="panel panel-flat panel-collapsed">
                                        <div class="panel-heading">
                                            <h5 class="panel-title">
                                            Tempat Uji Kompetensi LSP
                                            </h5>
                                            <div class="heading-elements">
                                                <ul class="icons-list">
                                                    <li><a data-action="collapse"></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="content-group-lg text-center">
                                                        <select class="select-search form-control" name="status_tuk">
                                                            <option value="1">Ada</option>
                                                            <option value="0">Tidak ada</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="input-group content-group">
                                                        <div class="has-feedback has-feedback-left">
                                                            <input type="text" name="keterangan_tuk" class="form-control" placeholder="Comment...">
                                                            <div class="form-control-feedback">
                                                                <i class="  icon-comments text-muted text-size-base"></i>
                                                            </div>
                                                        </div>

                                                        <div class="input-group-btn">
                                                        <button type="button" id="get_16" class="btn btn-primary btn-ladda btn-ladda-spinner" data-spinner-color="#333" data-style="zoom-in"><span class="ladda-label"></span></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <table class="table datatable-show-all">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama TUK</th>
                                                <th>Alamat</th>
                                                <th>Dokumen</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @php $no = 1; @endphp
                                            @foreach ($tuk as $item)
                                            <tr>
                                                <td>{{$no++}}</td>
                                                <td>{{$item->nama_tuk}}</td>
                                                <td>{{$item->alamat}}</td>
                                                <td>
                                                    <a href="{{$item->upload_persyaratan}}" target="_blank" type="button" name="btn_cek_13" style="float: right" 
                                                        class="open-delete btn btn-primary btn-labeled btn-rounded">
                                                        <b><i class="icon-file-check"></i></b> Softcopy</a>    
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Dokumen Tidak Lengkap<i class="icon-arrow-right14 position-right"></i></button>
                            </div>

                            <div class="text-right mt-5">
                                <a href="{{route('lengkap.portal', $detail->id_izin)}}" class="btn btn-success">Dokumen Lengkap<i class="icon-arrow-right14 position-right"></i></a>
                            </div>

                            
                        </div>
                    </div>
                </div>
                
            </form>

            
        </div>

    </div>
</div>
<!-- /detached content -->
@endsection
