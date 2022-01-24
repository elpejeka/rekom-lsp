@extends('layouts.app')

@section('page-header')
<div class="page-header page-header-default">
  <div class="page-header-content">
    <div class="page-title">
      <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Submit</h4>
    </div>
  </div>

  <div class="breadcrumb-line">
    <ul class="breadcrumb">
      <li><a href="{{route('home')}}"><i class="icon-home2 position-left"></i> Home</a></li>
      <li class="active">Preview Submit</li>
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

            <div class="panel-body">
                <div class="tabbable">
                    <ul class="nav nav-tabs nav-tabs-solid nav-justified">
                        <li class="active"><a href="#administrasi" data-toggle="tab">Administrasi</a></li>
                        <li><a href="#organisasi" data-toggle="tab">Organisasi</a></li>
                        <li><a href="#klasifikasi" data-toggle="tab">Klasifikasi dan Subklasifikasi</a></li>
                        <li><a href="#sertifikasi-lsp" data-toggle="tab">Skema LSP</a></li>   
                        <li><a href="#asesor" data-toggle="tab">Asesor</a></li>   
                        <li><a href="#tuk" data-toggle="tab">Tempat Uji</a></li>   
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
                                            <div class="col-md-4">
                                                <div class="content-group-lg">
                                                    <h6 class="text-semibold">#1</h6>
                                                    <p class="content-group">Surat Permohonan Pengajuan</p>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <a href="{{Storage::url($data->surat_permohonan)}}" target="_blank" type="button" name="btn_cek_13" style="float: right" 
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
                                                <td>Nama LSP</td>
                                                <td>{{$data->nama}}</td>
                                            </tr>
                                            <tr>
                                                <td>Email</td>
                                                <td>{{$data->email}}</td>
                                            </tr>
                                            <tr>
                                                <td>Jenis LSP</td>
                                                <td>{{$data->jenis_lsp}}</td>
                                            </tr>
                                            <tr>
                                                <td>Alamat</td>
                                                <td>{{$data->alamat}}</td>
                                            </tr>
                                            <tr>
                                                <td>Status Kepemilikan</td>
                                                <td>{{$data->status_kepemilikan}}</td>
                                            </tr>
                                            <tr>
                                                <td>No Telpon</td>
                                                <td>{{$data->no_telp}}</td>
                                            </tr>
                                            <tr>
                                                <td>Website</td>
                                                <td>{{$data->website}}</td>
                                            </tr>   
                                            <tr>
                                                <td>Layanan LSP</td>
                                                <td>{{$data->layanan_lsp}}</td>
                                            </tr>
                                            <tr>
                                                <td>Jumlah Skema Sertifikasi</td>
                                                <td>{{$data->jumlah_skema}}</td>
                                            </tr>
                                            <tr>
                                                <td>Action</td>
                                                <td><a href="{{route('information.edit', $data->id)}}" class="btn btn-md bg-teal">Edit</a>
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
                                            <div class="col-md-4">
                                                <div class="content-group-lg">
                                                    <h6 class="text-semibold">#1</h6>
                                                    <p class="content-group">Surat Permohonan Pengajuan</p>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <a href="" target="_blank" type="button" name="btn_cek_13" style="float: right" 
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
                                                <td>Pengarah</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Ketua Pelaksana</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Penanggungjawab Bagian Umum</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Penanggungjawab Bagian Sertifikasi</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Penanggungjawab Bagian Manajemen Mutu</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Jumlah Karyawan</td>
                                                <td></td>
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
                                            <div class="col-md-4">
                                                <div class="content-group-lg">
                                                    <h6 class="text-semibold">#1</h6>
                                                    <p class="content-group">Surat Permohonan Pengajuan</p>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <a href="" target="_blank" type="button" name="btn_cek_13" style="float: right" 
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
                                                <td>Pengarah</td>
                                                <td>{{$data->organization->pengarah}}</td>
                                            </tr>
                                            <tr>
                                                <td>Ketua Pelaksana</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Penanggungjawab Bagian Umum</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Penanggungjawab Bagian Sertifikasi</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Penanggungjawab Bagian Manajemen Mutu</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Jumlah Karyawan</td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>  
                            </div>
                        </div>

                        <div class="tab-pane" id="sertifikasi-lsp">
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
                                            <div class="col-md-4">
                                                <div class="content-group-lg">
                                                    <h6 class="text-semibold">#</h6>
                                                    <p class="content-group">Skema Sertifikasi LSP</p>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <a href="" target="_blank" type="button" name="btn_cek_13" style="float: right" 
                                                    class="open-delete btn btn-primary btn-labeled btn-rounded">
                                                    <b><i class="icon-file-check"></i></b> Softcopy</a>
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
                                        <th>Subsektor dan Bidang</th>
                                        <th>Jumlah Unit</th>
                                        <th>Acuan Skema</th>
                                        <th>Biaya Sertifikasi</th>
                                        <th class="text-center">Actions</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td>Marth</td>
                                        <td><a href="#">Enright</a></td>
                                        <td>Traffic Court Referee</td>
                                        <td>22 Jun 1972</td>
                                        <td>Lorem Ipsum</td>
                                        <td>Lorem Ipsum</td>
                                        <td><span class="label label-success">Active</span></td>
                                        <td class="text-center">
                                          <ul class="icons-list">
                                            <li class="dropdown">
                                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                              </a>
                                
                                              <ul class="dropdown-menu dropdown-menu-right">
                                                <li><a href="#"><i class="icon-file-pdf"></i> Export to .pdf</a></li>
                                                <li><a href="#"><i class="icon-file-excel"></i> Export to .csv</a></li>
                                                <li><a href="#"><i class="icon-file-word"></i> Export to .doc</a></li>
                                              </ul>
                                            </li>
                                          </ul>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td>Marth</td>
                                        <td><a href="#">Enright</a></td>
                                        <td>Traffic Court Referee</td>
                                        <td>22 Jun 1972</td>
                                        <td>Lorem Ipsum</td>
                                        <td>Lorem Ipsum</td>
                                        <td><span class="label label-success">Active</span></td>
                                        <td class="text-center">
                                          <ul class="icons-list">
                                            <li class="dropdown">
                                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                              </a>
                                
                                              <ul class="dropdown-menu dropdown-menu-right">
                                                <li><a href="#"><i class="icon-file-pdf"></i> Export to .pdf</a></li>
                                                <li><a href="#"><i class="icon-file-excel"></i> Export to .csv</a></li>
                                                <li><a href="#"><i class="icon-file-word"></i> Export to .doc</a></li>
                                              </ul>
                                            </li>
                                          </ul>
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
                            </div>
                        </div>

                        <div class="tab-pane" id="asesor">
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
                                            <div class="col-md-4">
                                                <div class="content-group-lg">
                                                    <h6 class="text-semibold">#</h6>
                                                    <p class="content-group">Asesor</p>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <a href="" target="_blank" type="button" name="btn_cek_13" style="float: right" 
                                                    class="open-delete btn btn-primary btn-labeled btn-rounded">
                                                    <b><i class="icon-file-check"></i></b> Softcopy</a>
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
                                        <th>Nama Asesor</th>
                                        <th>Klasifikasi</th>
                                        <th>Sub Klasifikasi</th>
                                        <th>No Registrasi</th>
                                        <th>No Blanko</th>
                                        <th>Tanggal Expire Sertifikat</th>
                                        <th>Alamat</th>
                                        <th>Status Asesor</th>
                                        <th class="text-center">Actions</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td>Marth</td>
                                        <td><a href="#">Enright</a></td>
                                        <td>Traffic Court Referee</td>
                                        <td>22 Jun 1972</td>
                                        <td>Lorem Ipsum</td>
                                        <td>Lorem Ipsum</td>
                                        <td>Lorem Ipsum</td>
                                        <td>Lorem Ipsum</td>
                                        <td><span class="label label-success">Active</span></td>
                                        <td class="text-center">
                                          <ul class="icons-list">
                                            <li class="dropdown">
                                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                              </a>
                                
                                              <ul class="dropdown-menu dropdown-menu-right">
                                                <li><a href="#"><i class="icon-file-pdf"></i> Export to .pdf</a></li>
                                                <li><a href="#"><i class="icon-file-excel"></i> Export to .csv</a></li>
                                                <li><a href="#"><i class="icon-file-word"></i> Export to .doc</a></li>
                                              </ul>
                                            </li>
                                          </ul>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td>Marth</td>
                                        <td><a href="#">Enright</a></td>
                                        <td>Traffic Court Referee</td>
                                        <td>22 Jun 1972</td>
                                        <td>Lorem Ipsum</td>
                                        <td>Lorem Ipsum</td>
                                        <td>Lorem Ipsum</td>
                                        <td>Lorem Ipsum</td>
                                        <td><span class="label label-success">Active</span></td>
                                        <td class="text-center">
                                          <ul class="icons-list">
                                            <li class="dropdown">
                                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                              </a>
                                
                                              <ul class="dropdown-menu dropdown-menu-right">
                                                <li><a href="#"><i class="icon-file-pdf"></i> Export to .pdf</a></li>
                                                <li><a href="#"><i class="icon-file-excel"></i> Export to .csv</a></li>
                                                <li><a href="#"><i class="icon-file-word"></i> Export to .doc</a></li>
                                              </ul>
                                            </li>
                                          </ul>
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
                            </div>
                        </div>

                        <div class="tab-pane" id="tuk">
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
                                            <div class="col-md-4">
                                                <div class="content-group-lg">
                                                    <h6 class="text-semibold">#</h6>
                                                    <p class="content-group">Asesor</p>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <a href="" target="_blank" type="button" name="btn_cek_13" style="float: right" 
                                                    class="open-delete btn btn-primary btn-labeled btn-rounded">
                                                    <b><i class="icon-file-check"></i></b> Softcopy</a>
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
                                        <th>Kode TUK</th>
                                        <th>Jenis TUK</th>
                                        <th>Nama TUK</th>
                                        <th>Alamat</th>
                                        <th>Cakupan Wilayah TUK</th>
                                        <th class="text-center">Actions</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                          <tr>
                                            <td>1</td>
                                            <td>2</td>
                                            <td>2</td>
                                            <td>3</td>
                                            <td>44</td>
                                            <td>5</td>
                                            <td></td>
                                          </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>


                        </div>
                </div>

                <div class="text-right">
                    <a href="{{route('submit.status', $data->id)}}?status=submit" class="btn btn-primary">Submit<i class="icon-arrow-right14 position-right"></i></a>
                </div>
                
            </div>

            
        </div>

    </div>
</div>
<!-- /detached content -->
@endsection


