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
                                            <div class="col-md-2">
                                                <div class="content-group-lg">
                                                <a href="{{Storage::url($permohonan->surat_permohonan)}}" target="_blank" type="button" name="btn_cek_13" style="float: right" 
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
                                                    <h6 class="text-semibold">#1</h6>
                                                    <p class="content-group">Surat Permohonan</p>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="content-group-lg">
                                                <a href="{{Storage::url($data->administrasi->upload_persyaratan)}}" target="_blank" type="button" name="btn_cek_13" style="float: right" 
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
                                                    <h6 class="text-semibold">#1</h6>
                                                    <p class="content-group">Akta Pendirian LSP</p>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="content-group-lg">
                                                <a href="{{Storage::url($data->administrasi->akta_pendirian)}}" target="_blank" type="button" name="btn_cek_13" style="float: right" 
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
                                                <td>Nama LSP</td>
                                                <td>{{$data->nama_lsp}}</td>
                                            </tr>
                                            <tr>
                                                <td>Email</td>
                                                <td>{{$data->email}}</td>
                                            </tr>
                                            <tr>
                                                <td>Jenis LSP</td>
                                                <td>{{$data->administrasi->jenis_lsp}}</td>
                                            </tr>
                                            <tr>
                                                <td>Alamat</td>
                                                <td>{{$data->alamat}}</td>
                                            </tr>
                                            <tr>
                                                <td>Status Kepemilikan</td>
                                                <td>{{$data->administrasi->status_kepemilikan}}</td>
                                            </tr>
                                            <tr>
                                                <td>No Telpon</td>
                                                <td>{{$data->administrasi->no_telp}}</td>
                                            </tr>
                                            <tr>
                                                <td>Website</td>
                                                <td>{{$data->administrasi->website}}</td>
                                            </tr>   
                                            <tr>
                                                <td>Jumlah Skema Sertifikasi</td>
                                                <td>{{$data->administrasi->jumlah_skema}}</td>
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
                                            <div class="col-md-2">
                                                <a href="{{Storage::url($data->organization->upload_persyaratan)}}" target="_blank" type="button" name="btn_cek_13" style="float: right" 
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
                                                <td>Data</td>
                                                <td>Description</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Nama Pengarah</td>
                                                <td>{{$data->organization->pengarah}}</td>
                                            </tr>
                                            <tr>
                                                <td>Ketua Pelaksana</td>
                                                <td>{{$data->organization->ketua}}</td>
                                            </tr>
                                            <tr>
                                                <td>Penanggungjawab Bagian Umum</td>
                                                <td>{{$data->organization->umum}}</td>
                                            </tr>
                                            <tr>
                                                <td>Penanggungjawab Bagian Sertifikasi</td>
                                                <td>{{$data->organization->sertifikasi}}</td>
                                            </tr>
                                            <tr>
                                                <td>Penanggungjawab Bagian Manajemen Mutu</td>
                                                <td>{{$data->organization->manajemen_mutu}}</td>
                                            </tr>
                                            <tr>
                                                <td>Jumlah Karyawan</td>
                                                <td>{{$data->organization->jumlah_karyawan}}</td>
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
                                        <th>#</th> 
                                        <th>Klasifikasi</th>
                                        <th>Subklasifikasi</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data->klasifikasi as $item)
                                          <tr>
                                            <td>#</td>
                                            <td>{{$item->klasifikasi}}</td>
                                            <td>{{$item->sub_klasifikasi}}</td>
                                          </tr>
                                          @endforeach
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>

                        <div class="tab-pane" id="sertifikasi-lsp">
                            @foreach ($data->sertifikat_lsp as $item)   
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
                                            <div class="col-md-2">
                                                <div class="content-group-lg">
                                                    <h6 class="text-semibold">#</h6>
                                                    <p class="content-group">Skema Sertifikasi LSP</p>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <a href="{{Storage::url($item->upload_persyaratan)}}" target="_blank" type="button" name="btn_cek_13" style="float: right" 
                                                    class="open-delete btn btn-primary btn-labeled btn-rounded">
                                                    <b><i class="icon-file-check"></i></b> Softcopy</a>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="content-group-lg text-center">
                                                    <select class="select-search form-control" name="status_skema">
                                                        <option value="1">Ada</option>
                                                        <option value="0">Tidak ada</option>    
                                                      </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
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
                            @endforeach
                            @foreach ($data->sertifikat_lsp as $item)   
                            <div class="col-md-12">
                                <table class="table datatable-show-all">
                                    <thead>
                                      <tr>
                                        <th>No</th>
                                        <th>Kode Skema</th>
                                        <th>Nama Skema</th>
                                        <th>Klasifikasi</th>
                                        <th>Subklasifikasi</th>
                                        <th>Kualifikasi</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td>#</td>
                                        <td>{{$item->kode_skema}}</td>
                                        <td>{{$item->nama_skema}}</td>
                                        <td>{{$item->klasifikasi}}</td>
                                        <td>{{$item->sub_klasifikasi}}</td>
                                        <td>{{$item->kualifikasi}}</td>
                                      </tr>
                                    </tbody>
                                  </table>
                            </div>
                            @endforeach
                        </div>

                        <div class="tab-pane" id="asesor">
                            @foreach ($data->asesors as $item)      
                            <div class="col-md-12">
                                <div class="panel panel-flat panel-collapsed">
                                    <div class="panel-heading">
                                        <h5 class="panel-title">
                                            Asesor
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
                                                    <h6 class="text-semibold">#</h6>
                                                    <p class="content-group">Asesor</p>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <a href="{{Storage::url($item->upload_persyaratan)}}" target="_blank" type="button" name="btn_cek_13" style="float: right" 
                                                    class="open-delete btn btn-primary btn-labeled btn-rounded">
                                                    <b><i class="icon-file-check"></i></b> Softcopy</a>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="content-group-lg text-center">
                                                    <select class="select-search form-control" name="status_asesor">
                                                        <option value="1">Ada</option>
                                                        <option value="0">Tidak ada</option>    
                                                      </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
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
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="content-group-lg">
                                                    <h6 class="text-semibold">#</h6>
                                                    <p class="content-group">Surat Pernyataan Komitmen</p>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <a href="{{Storage::url($item->surat_pernyataan)}}" target="_blank" type="button" name="btn_cek_13" style="float: right" 
                                                    class="open-delete btn btn-primary btn-labeled btn-rounded">
                                                    <b><i class="icon-file-check"></i></b> Softcopy</a>
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
                            @endforeach
                        </div>

                        <div class="tab-pane" id="tuk">
                            @foreach ($data->locations as $item)
                            <div class="col-md-12">
                                <div class="panel panel-flat panel-collapsed">
                                    <div class="panel-heading">
                                        <h5 class="panel-title">
                                            Tempat Uji Kompetensi
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
                                                    <h6 class="text-semibold">#</h6>
                                                    <p class="content-group">Sarana dan Prasarana</p>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <a href="{{Storage::url($item->cakupan)}}" target="_blank" type="button" name="btn_cek_13" style="float: right" 
                                                    class="open-delete btn btn-primary btn-labeled btn-rounded">
                                                    <b><i class="icon-file-check"></i></b> Softcopy</a>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="content-group-lg text-center">
                                                    <select class="select-search form-control" name="status_tuk">
                                                        <option value="1">Ada</option>
                                                        <option value="0">Tidak ada</option>    
                                                      </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
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
                            @endforeach
                            @foreach ($data->locations as $item)
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
                                          <tr>
                                            <td>#</td>
                                            <td>{{$item->nama_tuk}}</td>
                                            <td>{{$item->alamat}}</td>
                                          </tr>
                                    </tbody>
                                </table>
                            </div>
                            @endforeach
                        </div>


                        </div>
                </div>

                <div class="text-right">
                    <button type="submit" class="btn btn-primary">Submit<i class="icon-arrow-right14 position-right"></i></button>
                </div>
            
            </div>
        </form>

            
        </div>

    </div>
</div>
<!-- /detached content -->
@endsection

@push('addon-script')

@endpush


