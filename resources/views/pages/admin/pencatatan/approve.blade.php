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
            <form action="{{route('komen.pencatatan')}}" method="POST">
                @csrf
            <div class="panel-body">
                <div class="tabbable">
                    <ul class="nav nav-tabs nav-tabs-solid nav-justified">
                        <li class="active"><a href="#administrasi" data-toggle="tab">Administrasi</a></li>
                        <li><a href="#sertifikasi-lsp" data-toggle="tab">Skema LSP</a></li>   
                        <li><a href="#asesor" data-toggle="tab">Asesor</a></li>   
                        <li><a href="#tuk" data-toggle="tab">Tempat Uji Kompetensi</a></li>   
                        <li><a href="#legalitas" data-toggle="tab">SK Lisensi BNSP</a></li>   
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
                                            <input type="hidden" value="{{$data->id}}" name="pencatatan_id"/>
                                            <input type="hidden" value="{{$data->users_id}}" name="user_id"/>
                                            <div class="col-md-2">
                                                <div class="content-group-lg">
                                                    <h6 class="text-semibold">#1</h6>
                                                    <p class="content-group">Surat Permohonan</p>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="content-group-lg">
                                                    <a href="{{asset('laravel/storage/app/public/'. $data->upload_persyaratan)}}" target="_blank" type="button" name="btn_cek_13" 
                                                        class="open-delete btn btn-primary btn-labeled btn-rounded">
                                                        <b><i class="icon-file-check"></i></b> Softcopy</a>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="content-group-lg text-center">
                                                    <select class="select-search form-control">
                                                        <option value="1">Ada</option>
                                                        <option value="0">Tidak ada</option>    
                                                      </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group content-group">
                                                    <div class="has-feedback has-feedback-left">
                                                        <input type="text" class="form-control" placeholder="Comment..." name="check_surat">
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
                                                    <p class="content-group">SK Lisensi</p>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="content-group-lg">
                                                    <a href="{{asset('laravel/storage/app/public/'. $data->sk_lisensi)}}" target="_blank" type="button" name="btn_cek_13" 
                                                        class="open-delete btn btn-primary btn-labeled btn-rounded">
                                                        <b><i class="icon-file-check"></i></b> Softcopy</a>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="content-group-lg text-center">
                                                    <select class="select-search form-control">
                                                        <option value="1">Ada</option>
                                                        <option value="0">Tidak ada</option>    
                                                      </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group content-group">
                                                    <div class="has-feedback has-feedback-left">
                                                        <input type="text" class="form-control" placeholder="Comment..." name="check_sk">
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
                                                    <h6 class="text-semibold">#3</h6>
                                                    <p class="content-group">Sertifikat Lisensi</p>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="content-group-lg">
                                                    <a href="{{asset('laravel/storage/app/public/'. $data->sertifikat)}}" target="_blank" type="button" name="btn_cek_13" 
                                                        class="open-delete btn btn-primary btn-labeled btn-rounded">
                                                        <b><i class="icon-file-check"></i></b> Softcopy</a>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="content-group-lg text-center">
                                                    <select class="select-search form-control">
                                                        <option value="1">Ada</option>
                                                        <option value="0">Tidak ada</option>    
                                                      </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group content-group">
                                                    <div class="has-feedback has-feedback-left">
                                                        <input type="text" class="form-control" placeholder="Comment..." name="check_lisensi">
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
                                                    <h6 class="text-semibold">#4</h6>
                                                    <p class="content-group">Bukti Kepemilikan Kantor</p>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="content-group-lg">
                                                    <a href="{{asset('laravel/storage/app/public/'. $data->administrations->bukti_kepemilikan)}}" target="_blank" type="button" name="btn_cek_13" 
                                                        class="open-delete btn btn-primary btn-labeled btn-rounded">
                                                        <b><i class="icon-file-check"></i></b> Softcopy</a>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="content-group-lg text-center">
                                                    <select class="select-search form-control">
                                                        <option value="1">Ada</option>
                                                        <option value="0">Tidak ada</option>    
                                                      </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group content-group">
                                                    <div class="has-feedback has-feedback-left">
                                                        <input type="text" class="form-control" placeholder="Comment..." name="check_lisensi">
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
                                                    <h6 class="text-semibold">#5</h6>
                                                    <p class="content-group">Logo LSP</p>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="content-group-lg">
                                                    <a href="{{asset('laravel/storage/app/public/'. $data->logo_lsp)}}" target="_blank" type="button" name="btn_cek_13" 
                                                        class="open-delete btn btn-primary btn-labeled btn-rounded">
                                                        <b><i class="icon-file-check"></i></b> Softcopy</a>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="content-group-lg text-center">
                                                    <select class="select-search form-control">
                                                        <option value="1">Ada</option>
                                                        <option value="0">Tidak ada</option>    
                                                      </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group content-group">
                                                    <div class="has-feedback has-feedback-left">
                                                        <input type="text" class="form-control" placeholder="Comment..." name="check_lisensi">
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
                                        @if ($data->administrations->unsur_pembentuk == 'APT')
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="content-group-lg">
                                                    <h6 class="text-semibold">#6</h6>
                                                    <p class="content-group">NIB</p>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="content-group-lg">
                                                    <a href="{{asset('laravel/storage/app/public/'. $data->nib)}}" target="_blank" type="button" name="btn_cek_13" 
                                                        class="open-delete btn btn-primary btn-labeled btn-rounded">
                                                        <b><i class="icon-file-check"></i></b> Softcopy</a>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="content-group-lg text-center">
                                                    <select class="select-search form-control">
                                                        <option value="1">Ada</option>
                                                        <option value="0">Tidak ada</option>    
                                                      </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group content-group">
                                                    <div class="has-feedback has-feedback-left">
                                                        <input type="text" class="form-control" placeholder="Comment..." name="check_lisensi">
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
                                                    <h6 class="text-semibold">#7</h6>
                                                    <p class="content-group">SS Verif</p>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="content-group-lg">
                                                    <a href="{{asset('laravel/storage/app/public/'. $data->ss_verif)}}" target="_blank" type="button" name="btn_cek_13" 
                                                        class="open-delete btn btn-primary btn-labeled btn-rounded">
                                                        <b><i class="icon-file-check"></i></b> Softcopy</a>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="content-group-lg text-center">
                                                    <select class="select-search form-control">
                                                        <option value="1">Ada</option>
                                                        <option value="0">Tidak ada</option>    
                                                      </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group content-group">
                                                    <div class="has-feedback has-feedback-left">
                                                        <input type="text" class="form-control" placeholder="Comment..." name="check_lisensi">
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
                                        @endif
                                        @if ($data->administrations->unsur_pembentuk == 'LPPK')
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="content-group-lg">
                                                    <h6 class="text-semibold">#6</h6>
                                                    <p class="content-group">Akreditasi LPK</p>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="content-group-lg">
                                                    <a href="{{asset('laravel/storage/app/public/'. $data->nib)}}" target="_blank" type="button" name="btn_cek_13" 
                                                        class="open-delete btn btn-primary btn-labeled btn-rounded">
                                                        <b><i class="icon-file-check"></i></b> Softcopy</a>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="content-group-lg text-center">
                                                    <select class="select-search form-control">
                                                        <option value="1">Ada</option>
                                                        <option value="0">Tidak ada</option>    
                                                      </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group content-group">
                                                    <div class="has-feedback has-feedback-left">
                                                        <input type="text" class="form-control" placeholder="Comment..." name="check_lisensi">
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
                                        @endif
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
                                                <td>NO SK</td>
                                                <td>{{$data->no_sk}}</td>
                                            </tr>
                                            <tr>
                                                <td>NO LISENSI</td>
                                                <td>{{$data->no_lisensi}}</td>
                                            </tr>
                                            <tr>
                                                <td>Status SK</td>
                                                <td>{{$data->status_sk}}</td>
                                                <input value="{{$data->no_pencatatan}}" id="pencatatan" hidden/>
                                            </tr>
                                            <tr>
                                                <td>Email</td>
                                                <td>{{$data->administrations->email}}</td>
                                            </tr>
                                            <tr>
                                                <td>Website</td>
                                                <td>{{$data->administrations->website}}</td>
                                            </tr>
                                            <tr>
                                                <td>Alamat</td>
                                                <td>{{$data->administrations->alamat}}</td>
                                            </tr>
                                            <tr>
                                                <td>No Telpon</td>
                                                <td>{{$data->administrations->no_telp}}</td>
                                            </tr>
                                            <tr>
                                                <td>Kategori</td>
                                                <td>{{$data->administrations->kategori_lsp}}</td>
                                            </tr>
                                            {{-- <tr>
                                                <td>Provinsi</td>
                                                <td>{{$administrasi->Nama == null ? 'empty' : $administrasi->Nama}}</td>
                                            </tr> --}}

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
                                            <div class="col-md-2">
                                                <div class="content-group-lg">
                                                    <h6 class="text-semibold">#4 Skema Sertifikasi</h6>
                                                    <p class="content-group">Skema Sertifikasi LSP</p>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="content-group-lg text-center">
                                                    <select class="select-search form-control">
                                                        <option value="1">Ada</option>
                                                        <option value="0">Tidak ada</option>    
                                                      </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group content-group">
                                                    <div class="has-feedback has-feedback-left">
                                                        <input type="hidden" value="{{$data->users_id}}" name="user_id"/>
                                                        <input type="text" class="form-control" placeholder="Comment..." name="komen_skema">
                                                        <div class="form-control-feedback">
                                                            <i class="icon-comments text-muted text-size-base"></i>
                                                        </div>
                                                    </div>

                                                    <div class="input-group-btn">
                                                    {{-- <button type="submit" id="get_16" class="btn btn-primary btn-ladda btn-ladda-spinner"><span class="ladda-label"></span>
                                                    Kirim</button> --}}
                                                    <a href="javascript:void(0)" onclick="komenSkemaBtn()" class="btn btn-info">Kirim Perbaikan</a>
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
                                        <th>Jenjang</th>
                                        <th>Acuan Skema </th>
                                        <th>Acuan Skema Dokumen</th>
                                        <th>Action</th>
                                        <th>Status</th>
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
                                        <td>{{$item->jenjang}}</td>
                                        <td>{{$item->acuan_skema}}</td>
                                        <td>
                                            <a href="{{asset('laravel/storage/app/public/'. $item->upload_persyaratan)}}" target="_blank" type="button" name="btn_cek_13" 
                                                class="open-delete btn btn-primary btn-labeled btn-rounded">
                                            <b><i class="icon-file-check"></i></b> Softcopy</a>
                                        </td>
                                        <td>
                                            <a href="{{route('pencatatan.skema.edit', $item->id)}}" class="btn btn-sm btn-primary"><i class="icon-pencil"></i></a>
                                        </td>
                                        @if ($item->approve == 1)
                                        <td>
                                            <span class="label label-success">Approved</span>
                                            <a href="{{route('skema.unapprove', $item->id)}}" class="btn btn-sm btn-danger" target="_blank">Unapproved</a>
                                        </td>
                                        @endif
                                        @if ($item->approve == 0)
                                        <td>
                                            <a href="javascript:void(0)" onclick="updateKeabsahan({{$item->id}})" class="btn btn-info">Approve</a>
                                        </td>
                                        @endif
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
                                            Daftar Asesor LSP
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
                                                    <h6 class="text-semibold">#5 Daftar Asesor LSP</h6>
                                                    <p class="content-group"></p>
                                                </div>
                                            </div>
                                            {{-- <div class="col-md-2">
                                                <div class="content-group-lg">
                                                    <select class="select-search form-control">
                                                        @foreach ($data->asesor as $item)   
                                                        <option value="{{$item->nama_asesor}}">{{$item->nama_asesor}}</option>
                                                        @endforeach
                                                      </select>
                                                </div>
                                            </div> --}}
                                            <div class="col-md-2">
                                                <div class="content-group-lg text-center">
                                                    <select class="select-search form-control">
                                                        <option value="1">Ada</option>
                                                        <option value="0">Tidak ada</option>    
                                                      </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group content-group">
                                                    <div class="has-feedback has-feedback-left">
                                                    <input type="hidden" value="{{$data->users_id}}" name="user_id"/>
                                                    <input type="text" class="form-control" placeholder="Comment..." name="komen_skema">
                                                        <div class="form-control-feedback">
                                                            <i class="icon-comments text-muted text-size-base"></i>
                                                        </div>
                                                    </div>

                                                    <div class="input-group-btn">
                                                    {{-- <button type="button" id="get_16" class="btn btn-primary btn-ladda btn-ladda-spinner" data-spinner-color="#333" data-style="zoom-in"><span class="ladda-label"></span>
                                                    Kirim</button> --}}
                                                    <a href="javascript:void(0)" onclick="komenAsesorBtn()" class="btn btn-info">Kirim Perbaikan</a>
                                                    </div>
                                                </div>
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
                                    <th>Alamat</th>
                                    <th>Status Asesor</th>
                                    <th>Nomor Registrasi Asesor</th>
                                    <th>Provinsi</th>
                                    <th>Cek Asesor SIKI</th>
                                    <th class="text-center">Actions</th>
                                    <th>Status</th>
                                  </tr>
                                </thead>
                                <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                  @foreach ($data->asesor as $item)
                                  <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$item->nik}}</td>
                                    <td>{{$item->nama_asesor}}</td>
                                    <td>{{$item->alamat}}</td>
                                    <td><span class="label label-success">{{$item->status_asesor}}</span></td>
                                    <td>{{$item->no_registrasi_asesor}}</td>
                                    <td>{{$item->provinsi}}</td>
                                    <td>
                                        <a href="{{route('check.asesor', $item->nik)}}" class="btn btn-primary" target="_blank">Check</a>
                                    </td>
                                    <td class="text-center">
                                      <!-- <a href="#mymodalAsesor"
                                      data-remote="{{route('sertifikat.show', $item->id)}}" 
                                      data-toggle="modal"
                                      data-target="#mymodalAsesor"
                                      data-title="Detail Asesor {{$item->nama_asesor}}"
                                      class="btn btn-sm btn-info">
                                  <i class="icon-eye2"></i></a> -->
                                  <a data-toggle="modal" id="smallButton" data-target="#smallModal"
                            data-attr="{{ route('sertifikat.show', $item->id) }}" title="show" class="btn btn-sm btn-info">
                            <i class="icon-eye2"></i>
                        </a>
                                    </td>
                                  
                                    @if ($item->approve == 1)
                                        <td>
                                            <span class="label label-success">Approved</span>
                                            <a href="{{route('asesor.unapprove', $item->id)}}" class="btn btn-sm btn-danger mt-5" target="_blank">Unapproved</a>
                                            <a href="javascript:void(0)" onclick="importAsesor({{$item->id}})" class="btn btn-sm btn-primary mt-5" >Import To Master Penugasan</a>
                                            <a href="{{route('asesor.done', $item->id)}}" class="btn btn-sm btn-success">Update Status Tayang</a>
                                            {{-- <a data-id={{$item->id}} id="importAsesor" class="btn btn-sm btn-primary mt-5">Import To Master Penugasan</a> --}}
                                        </td>
                                        @endif
                                        @if ($item->approve == 0)
                                        <td>
                                            <a href="javascript:void(0)" onclick="updateAsesor({{$item->id}})" class="btn btn-info">Approve</a>
                                        </td>
                                        @endif
                                    </tr> 
                                  @endforeach
                                </tbody>
                              </table>
                        </div>

                        <div class="tab-pane" id="tuk">
                            <div class="col-md-12">
                                <div class="panel panel-flat panel-collapsed">
                                    <div class="panel-heading">
                                        <h5 class="panel-title">
                                            TUK LSP
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
                                                    <h6 class="text-semibold">#6 Daftar Tempat Uji Kompetensi</h6>
                                                    <p class="content-group"></p>
                                                </div>
                                            </div>
                                            {{-- <div class="col-md-2">
                                                <div class="content-group-lg">
                                                    <select class="select-search form-control">
                                                        @foreach ($data->tuk as $item)   
                                                        <option value="{{$item->nama_tuk}}">{{$item->nama_tuk}}</option>
                                                        @endforeach
                                                      </select>
                                                </div>
                                            </div> --}}
                                            <div class="col-md-2">
                                                <div class="content-group-lg text-center">
                                                    <select class="select-search form-control">
                                                        <option value="1">Ada</option>
                                                        <option value="0">Tidak ada</option>    
                                                      </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group content-group">
                                                    <div class="has-feedback has-feedback-left">
                                                        <input type="text" class="form-control" placeholder="Comment..." name="check_tuk">
                                                        <div class="form-control-feedback">
                                                            <i class="icon-comments text-muted text-size-base"></i>
                                                        </div>
                                                    </div>

                                                    <div class="input-group-btn">
                                                    <!-- <button type="button" id="get_16" class="btn btn-primary btn-ladda btn-ladda-spinner" data-spinner-color="#333" data-style="zoom-in"><span class="ladda-label"></span>
                                                    Kirim</button> -->
                                                    <a href="javascript:void(0)" onclick="komenTukBtn()" class="btn btn-info">Kirim Perbaikan</a>
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
                                        <th>Kode TUK</th>
                                        <th>Nama TUK</th>
                                        <th>Jenis TUK</th>
                                        <th>Provinsi</th>
                                        <th>Alamat</th>
                                        <th>Dokumen</th>
                                        <th>Permohonan Tayang</th>
                                        <th>Status</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                      @foreach ($data->tuk as $item)
                                          <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$item->kode_tuk}}</td>
                                            <td>{{$item->nama_tuk}}</td>
                                            <td>{{$item->jenis_tuk}}</td>
                                            <td>{{$item->provinsi}}</td>
                                            <td>{{$item->alamat}}</td>
                                            <td>
                                              <a href="{{asset('laravel/storage/app/public/'. $item->upload_persyaratan)}}" target="_blank" type="button" name="btn_cek_13" style="float: right" 
                                                class="open-delete btn btn-primary btn-labeled btn-rounded">
                                                <b><i class="icon-file-check"></i></b> Softcopy</a>
                                            </td>
                                            <td>
                                                <span class="badge badge-primary">{{$item->status == 0 ? 'Permohonan Tidak Tayang' : 'Permohonan Tayang'}}</span>
                                            </td>
                                            @if ($item->approve == 1)
                                            <td>
                                                <span class="label label-success">Approved</span>
                                                <a href="{{route('tuk.unapprove', $item->id)}}" class="btn btn-sm btn-danger" target="_blank">Unapproved</a>
                                                <a href="{{route('tuk.done', $item->id)}}" class="btn btn-sm btn-success">Update Status Tayang</a>
                                            </td>
                                            @endif
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

                        <div class="tab-pane" id="legalitas">
                            <div class="col-md-12">
                                <table class="table datatable-show-all">
                                    <thead>
                                      <tr>
                                        <th>No</th>
                                        <th>No SK</th>
                                        <th>No Lisensi</th>
                                        <th>SK Lisensi</th>
                                        <th>Sertifikat Lisensi</th>
                                        <th>Masa Berlaku</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                      @foreach ($data->legalitas as $item)
                                          <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$item->no_sk}}</td>
                                            <td>{{$item->no_lisensi}}</td>
                                            <td>
                                              <a href="{{asset('laravel/storage/app/public/'. $item->sk_lisensi)}}"
                                                 target="_blank" type="button" name="btn_cek_13"
                                                class="open-delete btn btn-primary btn-labeled btn-rounded">
                                                <b><i class="icon-file-check"></i></b> Softcopy</a>
                                            </td>
                                            <td>
                                                <a href="{{asset('laravel/storage/app/public/'. $item->sertifikat_lisensi)}}" target="_blank" type="button" name="btn_cek_13" 
                                                  class="open-delete btn btn-primary btn-labeled btn-rounded">
                                                  <b><i class="icon-file-check"></i></b> Softcopy</a>
                                              </td>
                                              <td>
                                                {{$item->masa_berlaku_sk}}
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
                    @if($item->approve == null)
                        <button type="submit" class="btn btn-sm btn-warning">Komen Perbaikan <i class="icon-arrow-right14 position-right"></i></button>
                        <a href="{{route('pencatatan.submit.approve', $data->id)}}?approve=submit" class="btn btn-sm btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></a>
                    @else
                    @endif
                    </td>
                </div>
            
            </div>
            </form>
            
        </div>

    </div>
</div>
<!-- /detached content -->
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
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
  </div>

@endsection
@push('addon-script')

@include('pages.modals.komen-pencatatan')

<script>
  $(document).on('click', '#smallButton', function(event) {
            event.preventDefault();
            let href = $(this).attr('data-attr');
            $.ajax({
                url: href,
                beforeSend: function() {
                    $('#loader').show();
                },
                // return the result
                success: function(result) {
                    $('#smallModal').modal("show");
                    $('#smallBody').html(result).show();
                },
                complete: function() {
                    $('#loader').hide();
                },
                error: function(jqXHR, testStatus, error) {
                    console.log(error);
                    alert("Page " + href + " cannot open. Error:" + error);
                    $('#loader').hide();
                },
                timeout: 8000
            })
        });
</script>


<div class="modal fade" id="keabsahan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <label for="kesesuaian">Approve Skema</label>
                    <select class="form-control" name="approve" id="approve">
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
                    <input type="text" name="nama_asesor" id="asesor" class="form-control" readonly>
                    <input type="text" name="no_pencatatan_asesor" id="no_pencatatan_asesor" class="form-control" readonly>
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

  <script>
      function updateKeabsahan(id){
          var noPencatatan = $("#pencatatan").val()
            $.get('/pencatatan/skema-approve/'+id, function(skema){
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
             var approve = $('#approve').val();
             var noPencatatan = $('#no_pencatatan').val();
             var _token = $('input[name=_token]').val();

             $.ajax({
                 url :"{{route('skema.approve.update')}}",
                 type : 'PUT',  
                 data : {
                     id : id,
                     nama_skema : nama_skema,
                     approve : "1",
                     no_pencatatan : noPencatatan,
                     _token : _token
                 }, 
                 success:function(response){
                     // $('#sid'+response.id + 'td.nth-child(1)').text(response.nama_skema);
                     $("#keabsahan").modal('toggle');
                     $("#skemaForm")[0].reset();
                 }
             })
        })

        function updateAsesor(id){
          var noPencatatan = $("#pencatatan").val()
            $.get('/pencatatan/asesor-approve/'+id, function(asesor){
                $("#idAsesor").val(asesor.id);
                $("#nama_asesor").val(asesor.nama_asesor);
                $("#approve_asesor").val(asesor.approve);
                $("#no_pencatatan_asesor").val(noPencatatan);
                $("#keabsahanAsesor").modal("toggle");
            })
        }

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
                     approve : "1",
                     no_pencatatan : noPencatatan,
                     _token : _token
                 }, 
                 success:function(response){
                     // $('#sid'+response.id + 'td.nth-child(1)').text(response.nama_skema);
                     $("#keabsahanAsesor").modal('toggle');
                     $("#asesorForm")[0].reset();
                 }
             })
        })

        function updateTuk(id){
          var noPencatatan = $("#pencatatan").val()
            $.get('/pencatatan/tuk-approve/'+id, function(tuk){
                $("#idTuk").val(tuk.id);
                $("#nama_tuk").val(tuk.nama_tuk);
                $("#approve_tuk").val(tuk.approve);
                $("#no_pencatatan_tuk").val(noPencatatan);
                $("#keabsahanTuk").modal("toggle");
            })
        }

        $('#tukForm').submit(function(e){
            e.preventDefault();
             var id = $('#idTuk').val();
             var nama_tuk = $('#nama_tuk').val();
             var approve = $('#approve').val();
             var noPencatatan = $('#no_pencatatan_tuk').val();
             var _token = $('input[name=_token]').val();

             $.ajax({
                 url :"{{route('tuk.approve.update')}}",
                 type : 'PUT',  
                 data : {
                     id : id,
                     nama_tuk : nama_tuk,
                     approve : "1",
                     no_pencatatan : noPencatatan,
                     _token : _token
                 }, 
                 success:function(response){
                     // $('#sid'+response.id + 'td.nth-child(1)').text(response.nama_skema);
                     $("#keabsahanTuk").modal('toggle');
                     $("#tukForm")[0].reset();
                 }
             })
        })

        function komenSkemaBtn(){
            $('#komenSkema').modal("toggle");
        }

        $('#skemaFormPerbaikan').submit(function(e){
            e.preventDefault();
            var userId = $('#userId').val();
            var jabker = $('#nama_jabker').val();
            var komen = $('#komen_skema').val();
            var _token = $('input[name=_token]').val();

            $.ajax({
                url : "{{route('add.komen')}}",
                type : 'POST',
                data : {
                    users_id : userId,
                    komen : jabker + ' ' + komen,
                    _token : _token
                },
                success:function(response){
                    $("#komenSkema").modal('toggle');
                    alert('Success');
                }
            })

        })

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

        function komenTukBtn(){
            $('#komenTuk').modal("toggle");
        }

        $('#TukFormPerbaikan').submit(function(e){
            e.preventDefault();
            var userId = $('#userId').val();
            var tuk = $('#nama_tuk').val();
            var komen = $('#komen_tuk').val();
            var _token = $('input[name=_token]').val();

            $.ajax({
                url : "{{route('add.komen')}}",
                type : 'POST',
                data : {
                    users_id : userId,
                    komen : tuk + ' ' + komen,
                    _token : _token
                },
                success:function(response){
                    $("#komenTuk").modal('toggle');
                    alert('Success');
                }
            })

        })


        $(document).ready(function() {
            $("#nama_jabker").select2({
                dropdownParent: $("#komenSkema")
            });

            $("#nama_asesor").select2({
                dropdownParent: $("#komenAsesor")
            });

            $("#nama_tuk").select2({
                dropdownParent: $("#komenTuk")
            });
        });

        // $(document).ready(function(){
        //     $("#importAsesor").click(function(){
        //         id = $(this).data("id");
        //         $.ajax({
        //             url : "/import-to-siki/".id
        //         })
        //     })
        // })

        function importAsesor(id){
            $.get('/pencatatan/import-to-siki/'+id, function(data){
                alert(data.message);
            });
        }
  </script>
@endpush


