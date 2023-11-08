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
    <form action="{{route('komen.pencatatan')}}" method="POST">
        @csrf
    <div class="row">
      <div class="col-sm-12 col-xl-12">
        <div class="card">
          <div class="card-header">
            <h4>{{$data->administrations->nama}}</h4>
            <div class="card-header-right">
                @if($item->approve == null)
                <button type="submit" class="btn btn-sm btn-warning">Komen Perbaikan <i class="icon-arrow-right14 position-right"></i></button>
                <a href="{{route('pencatatan.submit.approve', $data->id)}}?approve=submit" class="btn btn-sm btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></a>
            @else
            @endif
            </div>
          </div>
          <div class="card-body">
            <ul class="nav nav-tabs" id="icon-tab" role="tablist">
              <li class="nav-item"><a class="nav-link active txt-secondary" id="icon-home-tab" data-bs-toggle="tab" href="#administration" role="tab" aria-controls="icon-home" aria-selected="true"><i class="icofont icofont-ui-home"></i>Administrasi</a></li>
              <li class="nav-item"><a class="nav-link txt-secondary" id="skema-icon-tab" data-bs-toggle="tab" href="#skema" role="tab" aria-controls="contact-icon" aria-selected="false"><i class="icofont icofont-contacts"></i>Skema LSP</a></li>
              <li class="nav-item"><a class="nav-link txt-secondary" id="asesor-icon-ta" data-bs-toggle="tab" href="#asesor" role="tab" aria-controls="contact-icon" aria-selected="false"><i class="icofont icofont-man-in-glasses"></i>Asesor</a></li>
              <li class="nav-item"><a class="nav-link txt-secondary" id="tuk-icon-tab" data-bs-toggle="tab" href="#tuk" role="tab" aria-controls="contact-icon" aria-selected="false"><i class="icofont icofont-building"></i>Tempat Uji Kompetensi</a></li>
              <li class="nav-item"><a class="nav-link txt-secondary" id="sk-icon-tab" data-bs-toggle="tab" href="#sk" role="tab" aria-controls="contact-icon" aria-selected="false"><i class="icofont icofont-building"></i>SK Lisensi BNSP</a></li>
            </ul>
            <div class="tab-content" id="icon-tabContent">
              <div class="tab-pane fade show active" id="administration" role="tabpanel" aria-labelledby="icon-home-tab">
                <div class="col-sm-12 mt-5">
                  <div class="card">
                    <div class="card-header">
                      <h4>Administrasi</h4>
                    </div>
                    <div>
                      <div class="card-block row">
                        <div class="col-sm-12 col-lg-12 col-xl-12">
                          <div class="table-responsive">
                            <table class="table">
                              <tbody>
                                <tr>
                                  <td>Surat Permohonan</td>
                                  <td>
                                    <a href="{{asset('laravel/storage/app/public/'. $data->surat_permohonan)}}" target="_blank" type="button" name="btn_cek_13" style="float: right" 
                                      class="open-delete btn btn-primary btn-labeled btn-rounded">
                                      <b><i class="icofont icofont-file-document"></i></b> Softcopy</a>
                                  </td>
                                  <td>
                                    <select class="select-search form-control">
                                      <option value="1">Ada</option>
                                      <option value="0">Tidak ada</option>    
                                    </select>
                                  </td>
                                  <td>
                                    <div class="input-group">
                                      <input class="form-control" type="text" placeholder="comment...." name="check_surat">
                                      <button class="btn btn-secondary" type="button"> <span></span></button>
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td>SK Lisensi</td>
                                  <td>
                                    <a href="{{asset('laravel/storage/app/public/'. $data->sk_lisensi)}}" target="_blank" type="button" name="btn_cek_13" style="float: right" 
                                      class="open-delete btn btn-primary btn-labeled btn-rounded">
                                      <b><i class="icofont icofont-file-document"></i></b> Softcopy</a>
                                  </td>
                                  <td>
                                    <select class="select-search form-control" name="check_sk">
                                      <option value="1">Ada</option>
                                      <option value="0">Tidak ada</option>    
                                    </select>
                                  </td>
                                  <td>
                                    <div class="input-group">
                                      <input class="form-control" type="text" placeholder="comment...." name="check_sk">
                                      <button class="btn btn-secondary" type="button"> <span></span></button>
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td>Sertifikat Lisensi</td>
                                  <td>
                                    <a href="{{asset('laravel/storage/app/public/'. $data->sertifikat)}}" target="_blank" type="button" name="btn_cek_13" style="float: right" 
                                      class="open-delete btn btn-primary btn-labeled btn-rounded">
                                      <b><i class="icofont icofont-file-document"></i></b> Softcopy</a>
                                  </td>
                                  <td>
                                    <select class="select-search form-control" name="status_akreditasi">
                                      <option value="1">Ada</option>
                                      <option value="0">Tidak ada</option>    
                                    </select>
                                  </td>
                                  <td>
                                    <div class="input-group">
                                      <input class="form-control" type="text" placeholder="comment...." name="check_lisensi">
                                      <button class="btn btn-secondary" type="button"> <span></span></button>
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                    <td>Bukti Kepemilikan Kantor</td>
                                    <td>
                                      <a href="{{asset('laravel/storage/app/public/'. $data->administrations->bukti_kepemilikan)}}" target="_blank" type="button" name="btn_cek_13" style="float: right" 
                                        class="open-delete btn btn-primary btn-labeled btn-rounded">
                                        <b><i class="icofont icofont-file-document"></i></b> Softcopy</a>
                                    </td>
                                    <td>
                                      <select class="select-search form-control" name="status_akreditasi">
                                        <option value="1">Ada</option>
                                        <option value="0">Tidak ada</option>    
                                      </select>
                                    </td>
                                    <td>
                                      <div class="input-group">
                                        <input class="form-control" type="text" placeholder="comment...." name="check_lisensi">
                                        <button class="btn btn-secondary" type="button"> <span></span></button>
                                      </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Logo LSP</td>
                                    <td>
                                      <a href="{{asset('laravel/storage/app/public/'. $data->logo_lsp)}}" target="_blank" type="button" name="btn_cek_13" style="float: right" 
                                        class="open-delete btn btn-primary btn-labeled btn-rounded">
                                        <b><i class="icofont icofont-file-document"></i></b> Softcopy</a>
                                    </td>
                                    <td>
                                      <select class="select-search form-control" name="status_akreditasi">
                                        <option value="1">Ada</option>
                                        <option value="0">Tidak ada</option>    
                                      </select>
                                    </td>
                                    <td>
                                      <div class="input-group">
                                        <input class="form-control" type="text" placeholder="comment...." name="check_lisensi">
                                        <button class="btn btn-secondary" type="button"> <span></span></button>
                                      </div>
                                    </td>
                                </tr>
                                @if ($data->administrations->unsur_pembentuk == 'APT')
                                <tr>
                                    <td>NIB</td>
                                    <td>
                                      <a href="{{asset('laravel/storage/app/public/'. $data->nib)}}" target="_blank" type="button" name="btn_cek_13" style="float: right" 
                                        class="open-delete btn btn-primary btn-labeled btn-rounded">
                                        <b><i class="icofont icofont-file-document"></i></b> Softcopy</a>
                                    </td>
                                    <td>
                                      <select class="select-search form-control" name="status_akreditasi">
                                        <option value="1">Ada</option>
                                        <option value="0">Tidak ada</option>    
                                      </select>
                                    </td>
                                    <td>
                                      <div class="input-group">
                                        <input class="form-control" type="text" placeholder="comment...." name="check_lisensi">
                                        <button class="btn btn-secondary" type="button"> <span></span></button>
                                      </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>SS Verif</td>
                                    <td>
                                      <a href="{{asset('laravel/storage/app/public/'. $data->ss_verif)}}" target="_blank" type="button" name="btn_cek_13" style="float: right" 
                                        class="open-delete btn btn-primary btn-labeled btn-rounded">
                                        <b><i class="icofont icofont-file-document"></i></b> Softcopy</a>
                                    </td>
                                    <td>
                                      <select class="select-search form-control" name="status_akreditasi">
                                        <option value="1">Ada</option>
                                        <option value="0">Tidak ada</option>    
                                      </select>
                                    </td>
                                    <td>
                                      <div class="input-group">
                                        <input class="form-control" type="text" placeholder="comment...." name="check_lisensi">
                                        <button class="btn btn-secondary" type="button"> <span></span></button>
                                      </div>
                                    </td>
                                </tr>
                                @endif
                                @if ($data->administrations->unsur_pembentuk == 'LPPK')
                                <tr>
                                    <td>Akreditasi LPK</td>
                                    <td>
                                      <a href="{{asset('laravel/storage/app/public/'. $data->nib)}}" target="_blank" type="button" name="btn_cek_13" style="float: right" 
                                        class="open-delete btn btn-primary btn-labeled btn-rounded">
                                        <b><i class="icofont icofont-file-document"></i></b> Softcopy</a>
                                    </td>
                                    <td>
                                      <select class="select-search form-control" name="status_akreditasi">
                                        <option value="1">Ada</option>
                                        <option value="0">Tidak ada</option>    
                                      </select>
                                    </td>
                                    <td>
                                      <div class="input-group">
                                        <input class="form-control" type="text" placeholder="comment...." name="check_lisensi">
                                        <button class="btn btn-secondary" type="button"> <span></span></button>
                                      </div>
                                    </td>
                                </tr>
                                @endif
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table">
                          <tbody>
                            <tr>
                              <td>Data</td>
                              <td>Description</td>
                            </tr>
                            <tr>
                              <td>Nama LSP</td>
                              <td>{{$item->administrations->nama ?? "-"}}</td>
                            </tr>
                            <tr>
                              <td>Jumlah Skema</td>
                              <td>{{count($data->skema)}}</td>
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
                                <td>Jenis LSP</td>
                                <td>{{$data->administrations->jenis_lsp}}</td>
                            </tr>
                            <tr>
                                <td>Kategori</td>
                                <td>{{$data->administrations->kategori_lsp}}</td>
                            </tr>
                            <tr>
                              <td>Unsur Pembentuk</td>
                              <td>{{$data->administrations->unsur_pembentuk}}</td>
                            </tr>
                            <tr>
                              <td>Unsur Pembentuk</td>
                              <td>{{$data->administrations->unsur_pembentuk}}</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="skema" role="tabpanel" aria-labelledby="skema-icon-tab">
                <div class="col-sm-12 mt-5">
                  <div class="row">
                    <div class="card">
                        <div class="card-header">
                          <h4>Skema LSP</h4>
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
                                        <input type="hidden" value="{{$data->users_id}}" name="user_id"/>
                                      <input class="form-control" type="text" placeholder="comment...." name="komen_skema">
                                      <a href="javascript:void(0)" onclick="komenSkemaBtn()" class="btn btn-info">Kirim Perbaikan</a>
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
                          <table class="table" id="list_skema">
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
                                <th>Jumlah Unit</th>
                                <th>Acuan Skema</th>
                                <th>Skema Sertifikasi</th>
                                <th>Acuan Skema</th>
                                <th>Action</th>
                                <th>Status</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($data->skema as $item)
                              <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->kode_skema}}</td>
                                <td>{{$item->nama_skema}}</td>
                                <td>{{$item->jabker}}</td>
                                <td>{{$item->klasifikasi}}</td>
                                <td>{{$item->sub_klasifikasi}}</td>
                                <td>{{$item->kualifikasi}}</td>
                                <td>{{$item->jenjang}}</td>
                                <td>{{$item->jumlah_unit}}</td>
                                <td>{{$item->acuan_skema}}</td>
                                <td> <a href="{{asset('laravel/storage/app/public/'.$item->standar_kompetensi)}}" target="_blank" type="button" name="btn_cek_13" style="float: right" 
                                  class="open-delete btn btn-sm btn-primary btn-labeled btn-rounded">
                                  <b><i class="icofont icofont-file-document"></i></b> Softcopy</a></td>
                                <td> <a href="{{asset('laravel/storage/app/public/'.$item->upload_persyaratan)}}" target="_blank" type="button" name="btn_cek_13" style="float: right" 
                                  class="open-delete btn btn-sm btn-primary btn-labeled btn-rounded">
                                  <b><i class="icofont icofont-file-document"></i></b> Softcopy</a></td>
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
                                          {{-- <li><a class="dropdown-item" href="{{route('asesor.done', $item->id)}}">Update Status Tayang</a></li> --}}
                                      </ul>
                                    </div>
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
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="tuk" role="tabpanel" aria-labelledby="tuk-icon-tab">
                <div class="col-sm-12 mt-5">
                  <div class="row">
                    <div class="card">
                      <div class="card-header">
                        <h4>TUK</h4>
                      </div>
                      <div class="card-body">
                        <div class="table-responsive">
                          <table class="table">
                            <tbody>
                              <tr>
                                <td>
                                  <select class="select-search form-control" name="status_tuk">
                                    <option value="1">Ada</option>
                                    <option value="0">Tidak ada</option>    
                                  </select>
                                </td>
                                <td>
                                  <div class="input-group">
                                    <input class="form-control" type="text" placeholder="comment...." name="keterangan_tuk">
                                    <a href="javascript:void(0)" onclick="komenTukBtn()" class="btn btn-info">Kirim Perbaikan</a>
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
                          <table class="table" id="list_tuk">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>Kode TUK</th>
                                <th>Nama TUK</th>
                                <th>Jenis TUK</th>
                                <th>Provinsi</th>
                                <th>Alamat</th>
                                <th>Dokumen</th>
                                <th>Status</th>
                              </tr>
                            </thead>
                            <tbody>
                               @foreach ($data->tuk as $item)
                              <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->kode_tuk}}</td>
                                <td>{{$item->nama_tuk}}</td>
                                <td>{{$item->jenis_tuk}}</td>
                                <td>{{$item->propinsi->Nama ?? '-'}}</td>
                                <td>{{$item->alamat}}</td>
                                <td>
                                    <a href="{{asset('laravel/storage/app/public/'. $item->upload_persyaratan)}}" target="_blank" type="button" name="btn_cek_13" style="float: right" 
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
              </div>
              <div class="tab-pane fade" id="sk" role="tabpanel" aria-labelledby="sk-icon-tab">
                <div class="col-sm-12 mt-5">
                  <div class="row">
                    <div class="card">
                      <div class="card-body">
                        <div class="table-responsive">
                          <table class="table" id="list_sk">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>No SK</th>
                                <th>No Lisensi</th>
                                <th>SK Lisensi</th>
                                <th>Sertifikat Lisensi</th>
                                <th>Masa Berlaku</th>
                                <th>SK AJJ</th>
                                @if ($data->administrations->unsur_pembentuk == 'APT')
                                <th>Akreditasi KAN</th>
                                <th>Masa Berlaku KAN</th>
                                @endif
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($data->legalitas as $item)
                              <tr>
                                <td>{{$loop->iteration}}</td>
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
                                <td>
                                  <a href="{{asset('laravel/storage/app/public/'. $item->sk_ajj)}}" target="_blank" type="button" name="btn_cek_13" 
                                    class="open-delete btn btn-primary btn-labeled btn-rounded">
                                    <b><i class="icon-file-check"></i></b> Softcopy</a>
                                </td>
                                @if ($data->administrations->unsur_pembentuk == 'APT')
                                <td>
                                  <a href="{{asset('laravel/storage/app/public/'. $item->akreditasi_kan)}}" target="_blank" type="button" name="btn_cek_13" 
                                    class="open-delete btn btn-primary btn-labeled btn-rounded">
                                    <b><i class="icon-file-check"></i></b> Softcopy</a>
                                </td>
                                <td>
                                  {{$item->masa_berlaku_kan}}
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
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
@endsection

@push('addon-script')
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

@include('pages.modals.komen-pencatatan')

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

<div class="modal fade" id="detailAsesor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
          <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Profil Asesor</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
          </div>
          <div class="modal-body">
              <div class="col-md-12">
                  <div class="form-group">
                      <label>Nama Asesor</label>
                      <input type="text" class="form-control" id="namaAsesor" readonly/>
                  </div>
              </div>
              <div class="col-md-12">
                  <div class="form-group">
                      <label>NIK Asesor</label>
                      <input type="text" class="form-control" id="nikAsesor" readonly/>
                  </div>
              </div>
              <div class="col-md-12">
                  <div class="form-group">
                      <label>Email</label>
                      <input type="text" class="form-control" id="emailAsesor" readonly/>
                  </div>
              </div>
              <div class="col-md-12">
                  <div class="form-group">
                      <label>No Telepon</label>
                      <input type="text" class="form-control" id="tlpAsesor" readonly/>
                  </div>
              </div>
              <div class="col-md-12">
                  <div class="form-group">
                      <label>Tempat Lahir</label>
                      <input type="text" class="form-control" id="tempatLahir" readonly/>
                  </div>
              </div>
              <div class="col-md-12">
                  <div class="form-group">
                      <label>Tanggal Lahir</label>
                      <input type="text" class="form-control" id="tglLahir" readonly/>
                  </div>
              </div>
              <div class="col-md-12">
                  <div class="form-group">
                      <label>Alamat</label>
                      <input type="text" class="form-control" id="address" readonly/>
                  </div>
              </div>
              <div class="col-md-12">
                  <div class="form-group">
                      <label>Pendidikan</label>
                      <input type="text" class="form-control" id="education" readonly/>
                  </div>
              </div>
              <div class="col-md-12">
                  <div class="form-group">
                      <label>Provinsi</label>
                      <input type="text" class="form-control" id="prov" readonly/>
                  </div>
              </div>
              <div class="col-md-12">
                  <div class="form-group">
                      <label>Kabupaten/Kota</label>
                      <input type="text" class="form-control" id="kab" readonly/>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>

<div class="modal fade bd-example-modal-lg" id="detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
          <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Detail Sertifikat</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
          </div>
          <div class="modal-body" id="modal-body">
              
          </div>
          <div class="modal-footer">
              <button type="submit" class="btn btn-success">Save changes</button>
          </div>
      </div>
  </div>
</div>

<script>
    $(document).ready(function () {
        $('#subklas').DataTable();
        $('#list_skema').DataTable();
        $('#list_asesor').DataTable();
        $('#list_tuk').DataTable();
        $('#list_sk').DataTable();
    });
</script>

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

    function detailAsesor(id){
            $.get('/pencatatan/asesor-approve/'+id, function(data){
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

        function sertifikat(nik){
          $.get('/reference/get-sertifikat/'+nik, function(res){
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
                  const serDate= new Date(item.tanggal_cetak);
                  var style = (serDate > dateNow) ? 'background-color:#ff0000;' : 'background-color:#fff;';
                    table += '<tr style="'+ style +'">' +
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

        function importAsesor(id){
            $.get('/pencatatan/import-to-siki/'+id, function(data){
                alert(data.message);
            });
        }
</script>
@endpush