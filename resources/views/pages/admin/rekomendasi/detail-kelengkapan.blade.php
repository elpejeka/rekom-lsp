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
        <form action="{{ route('cek.kelengkapan') }}" method="POST" class="form-horizontal">
            @csrf
            <input type="text" value="{{ $permohonan->id }}" name="permohonans_id" hidden />
            <div class="row">
                <div class="col-sm-12 col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>{{ $data->nama_lsp }}</h4>
                            <div class="card-header-right">
                                @if ($cek->count() <= 3)
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-success">Submit<i
                                                class="icon-arrow-right14 position-right"></i></button>
                                    </div>
                                @endif
                                @if ($permohonan->status_kelengkapan != null)
                                    <div class="text-right mt-5">
                                        <a href="{{ route('pdf.kelengkapan', $permohonan->id) }}" target="_blank"
                                            type="button" name="submit"
                                            class="open-delete btn btn-info btn-labeled btn-rounded"><b><i
                                                    class=" icon-printer"></i></b> Print Kelengkapan</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-tabs" id="icon-tab" role="tablist">
                                <li class="nav-item"><a class="nav-link active txt-secondary" id="icon-home-tab"
                                        data-bs-toggle="tab" href="#administration" role="tab" aria-controls="icon-home"
                                        aria-selected="true"><i class="icofont icofont-ui-home"></i>Administrasi</a></li>
                                <li class="nav-item"><a class="nav-link txt-secondary" id="profile-icon-tabs"
                                        data-bs-toggle="tab" href="#organisasi" role="tab" aria-controls="profile-icon"
                                        aria-selected="false"><i class="icofont icofont-man-in-glasses"></i>Organisasi</a>
                                </li>
                                <li class="nav-item"><a class="nav-link txt-secondary" id="klas-icon-tab"
                                        data-bs-toggle="tab" href="#klas" role="tab" aria-controls="contact-icon"
                                        aria-selected="false"><i class="icofont icofont-contacts"></i>Klasifikasi dan
                                        Subklasifikasi</a></li>
                                <li class="nav-item"><a class="nav-link txt-secondary" id="skema-icon-tab"
                                        data-bs-toggle="tab" href="#skema" role="tab" aria-controls="contact-icon"
                                        aria-selected="false"><i class="icofont icofont-contacts"></i>Skema LSP</a></li>
                                <li class="nav-item"><a class="nav-link txt-secondary" id="asesor-icon-ta"
                                        data-bs-toggle="tab" href="#asesor" role="tab" aria-controls="contact-icon"
                                        aria-selected="false"><i class="icofont icofont-man-in-glasses"></i>Asesor</a></li>
                                <li class="nav-item"><a class="nav-link txt-secondary" id="tuk-icon-tab"
                                        data-bs-toggle="tab" href="#tuk" role="tab" aria-controls="contact-icon"
                                        aria-selected="false"><i class="icofont icofont-building"></i>Tempat Uji
                                        Kompetensi</a></li>
                                @if ($permohonan->jenis_permohonan == 'perpanjangan')
                                    <li class="nav-item"><a class="nav-link txt-secondary" id="perpanjangan-icon-tab"
                                            data-bs-toggle="tab" href="#perpanjangan" role="tab"
                                            aria-controls="contact-icon" aria-selected="false"><i
                                                class="icofont icofont-building"></i>Persyaratan Perpanjangan</a></li>
                                @endif
                            </ul>
                            <div class="tab-content" id="icon-tabContent">
                                <div class="tab-pane fade show active" id="administration" role="tabpanel"
                                    aria-labelledby="icon-home-tab">
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
                                                                            <a href="{{ asset('storage/' . $permohonan->surat_permohonan) }}"
                                                                                target="_blank" type="button"
                                                                                name="btn_cek_13" style="float: right"
                                                                                class="open-delete btn btn-primary btn-labeled btn-rounded">
                                                                                <b><i
                                                                                        class="icofont icofont-file-document"></i></b>
                                                                                Softcopy</a>
                                                                        </td>
                                                                        <td>
                                                                            <select class="select-search form-control"
                                                                                name="status_surat">
                                                                                <option value="1">Ada</option>
                                                                                <option value="0">Tidak ada</option>
                                                                            </select>
                                                                        </td>
                                                                        <td>
                                                                            <div class="input-group">
                                                                                <input class="form-control" type="text"
                                                                                    placeholder="comment...."
                                                                                    name="keterangan_surat">
                                                                                <button class="btn btn-secondary"
                                                                                    type="button"> <span></span></button>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>SK Asosiasi Terakreditasi / Surat Tanda
                                                                            Teregistrasi LPPK</td>
                                                                        <td>
                                                                            <a href="{{ asset('storage/' . $data->administrasi->upload_persyaratan) }}"
                                                                                target="_blank" type="button"
                                                                                name="btn_cek_13" style="float: right"
                                                                                class="open-delete btn btn-primary btn-labeled btn-rounded">
                                                                                <b><i
                                                                                        class="icofont icofont-file-document"></i></b>
                                                                                Softcopy</a>
                                                                        </td>
                                                                        <td>
                                                                            <select class="select-search form-control"
                                                                                name="status_asosiasi">
                                                                                <option value="1">Ada</option>
                                                                                <option value="0">Tidak ada</option>
                                                                            </select>
                                                                        </td>
                                                                        <td>
                                                                            <div class="input-group">
                                                                                <input class="form-control" type="text"
                                                                                    placeholder="comment...."
                                                                                    name="keterangan_asosiasi">
                                                                                <button class="btn btn-secondary"
                                                                                    type="button"> <span></span></button>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Akta Pendirian LSP</td>
                                                                        <td>
                                                                            <a href="{{ asset('storage/' . $data->administrasi->akta_pendirian) }}"
                                                                                target="_blank" type="button"
                                                                                name="btn_cek_13" style="float: right"
                                                                                class="open-delete btn btn-primary btn-labeled btn-rounded">
                                                                                <b><i
                                                                                        class="icofont icofont-file-document"></i></b>
                                                                                Softcopy</a>
                                                                        </td>
                                                                        <td>
                                                                            <select class="select-search form-control"
                                                                                name="status_akta">
                                                                                <option value="1">Ada</option>
                                                                                <option value="0">Tidak ada</option>
                                                                            </select>
                                                                        </td>
                                                                        <td>
                                                                            <div class="input-group">
                                                                                <input class="form-control" type="text"
                                                                                    placeholder="comment...."
                                                                                    name="keterangan_akta">
                                                                                <button class="btn btn-secondary"
                                                                                    type="button"> <span></span></button>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Surat Pernyataan Komitmen Asesor</td>
                                                                        <td>
                                                                            <a href="{{ asset('storage/' . $data->administrasi->komitmen_asesor) }}"
                                                                                target="_blank" type="button"
                                                                                name="btn_cek_13" style="float: right"
                                                                                class="open-delete btn btn-primary btn-labeled btn-rounded">
                                                                                <b><i
                                                                                        class="icofont icofont-file-document"></i></b>
                                                                                Softcopy</a>
                                                                        </td>
                                                                        <td>
                                                                            <select class="select-search form-control"
                                                                                name="status_komitmen">
                                                                                <option value="1">Ada</option>
                                                                                <option value="0">Tidak ada</option>
                                                                            </select>
                                                                        </td>
                                                                        <td>
                                                                            <div class="input-group">
                                                                                <input class="form-control" type="text"
                                                                                    placeholder="comment...."
                                                                                    name="keterangan_komitmen">
                                                                                <button class="btn btn-secondary"
                                                                                    type="button"> <span></span></button>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Sertifikat Akreditasi LPK atau Surat Pernyataan
                                                                            Komitmen Jika Belum Terakreditasi</td>
                                                                        <td>
                                                                            <a href="{{ asset('storage/' . $data->administrasi->surat_akreditasi) }}"
                                                                                target="_blank" type="button"
                                                                                name="btn_cek_13" style="float: right"
                                                                                class="open-delete btn btn-primary btn-labeled btn-rounded">
                                                                                <b><i
                                                                                        class="icofont icofont-file-document"></i></b>
                                                                                Softcopy</a>
                                                                        </td>
                                                                        <td>
                                                                            <select class="select-search form-control"
                                                                                name="status_akreditasi">
                                                                                <option value="1">Ada</option>
                                                                                <option value="0">Tidak ada</option>
                                                                            </select>
                                                                        </td>
                                                                        <td>
                                                                            <div class="input-group">
                                                                                <input class="form-control" type="text"
                                                                                    placeholder="comment...."
                                                                                    name="keterangan_akreditasi">
                                                                                <button class="btn btn-secondary"
                                                                                    type="button"> <span></span></button>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
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
                                                                <td>Jenis Permohonan</td>
                                                                <td>{{ ucfirst($permohonan->jenis_permohonan) }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Nama LSP</td>
                                                                <td>{{ $data->nama_lsp }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Asosiasi Pembentuk</td>
                                                                <td>
                                                                    <span
                                                                        class="badge badge-info">{{ $data->administrasi->unsur->asosiasi }}</span>
                                                                    <span
                                                                        class="badge badge-info">{{ $data->administrasi->unsur1->asosiasi }}</span>
                                                                    <span
                                                                        class="badge badge-info">{{ $data->administrasi->unsur2->asosiasi }}</span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Kategori Asosiasi</td>
                                                                <td>{{ $data->administrasi->kategori_lsp }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Email</td>
                                                                <td>{{ $data->email }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Jenis LSP</td>
                                                                <td>{{ $data->administrasi->jenis_lsp }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Alamat</td>
                                                                <td>{{ $data->alamat }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Status Kepemilikan</td>
                                                                <td>{{ $data->administrasi->status_kepemilikan }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>No Telpon</td>
                                                                <td>{{ $data->administrasi->no_telp }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Website</td>
                                                                <td>{{ $data->administrasi->website }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Jumlah Skema Sertifikasi</td>
                                                                <td>{{ $data->administrasi->jumlah_skema }}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="organisasi" role="tabpanel"
                                    aria-labelledby="profile-icon-tabs">
                                    <div class="col-sm-12 mt-5">
                                        <div class="row">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4>Organisasi</h4>
                                                </div>
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <tbody>
                                                                <tr>
                                                                    <td>Stuktur Organisasi</td>
                                                                    <td>
                                                                        <a href="{{ asset('storage/' . $data->organization->upload_persyaratan) }}"
                                                                            target="_blank" type="button"
                                                                            name="btn_cek_13" style="float: right"
                                                                            class="open-delete btn btn-primary btn-labeled btn-rounded">
                                                                            <b><i
                                                                                    class="icofont icofont-file-document"></i></b>
                                                                            Softcopy</a>
                                                                    </td>
                                                                    <td>
                                                                        <select class="select-search form-control"
                                                                            name="status_organisasi">
                                                                            <option value="1">Ada</option>
                                                                            <option value="0">Tidak ada</option>
                                                                        </select>
                                                                    </td>
                                                                    <td>
                                                                        <div class="input-group">
                                                                            <input class="form-control" type="text"
                                                                                placeholder="comment...."
                                                                                name="keterangan_organisasi">
                                                                            <button class="btn btn-secondary"
                                                                                type="button"> <span></span></button>
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
                                                        <table class="table">
                                                            <tbody>
                                                                <tr>
                                                                    <td>Data</td>
                                                                    <td>Description</td>
                                                                    <td>No Telpon</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Nama Pengarah</td>
                                                                    <td>{{ $data->organization->pengarah }}</td>
                                                                    <td>{{ $data->organization->no_telp_pengarah }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Nama Pengarah</td>
                                                                    <td>{{ $data->organization->pengarah_1 }}</td>
                                                                    <td>{{ $data->organization->no_telp_pengarah_1 }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Nama Pengarah</td>
                                                                    <td>{{ $data->organization->pengarah_2 }}</td>
                                                                    <td>{{ $data->organization->no_telp_pengarah_2 }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Nama Pengarah</td>
                                                                    <td>{{ $data->organization->pengarah_3 }}</td>
                                                                    <td>{{ $data->organization->no_telp_pengarah_3 }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Nama Pengarah</td>
                                                                    <td>{{ $data->organization->pengarah_4 }}</td>
                                                                    <td>{{ $data->organization->no_telp_pengarah_4 }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Ketua Pelaksana</td>
                                                                    <td>{{ $data->organization->ketua }}</td>
                                                                    <td>{{ $data->organization->no_ketua }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Penanggungjawab Bagian Umum</td>
                                                                    <td>{{ $data->organization->umum }}</td>
                                                                    <td>{{ $data->organization->no_umum }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Penanggungjawab Bagian Sertifikasi</td>
                                                                    <td>{{ $data->organization->sertifikasi }}</td>
                                                                    <td>{{ $data->organization->no_sertifikasi }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Penanggungjawab Bagian Manajemen Mutu</td>
                                                                    <td>{{ $data->organization->manajemen_mutu }}</td>
                                                                    <td>{{ $data->organization->no_manajemen }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Jumlah Karyawan</td>
                                                                    <td colspan="2">
                                                                        {{ $data->administrasi->jenis_lsp }}</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="klas" role="tabpanel"
                                    aria-labelledby="klas-icon-tab">
                                    <div class="col-sm-12 mt-5">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4>Klasifikasi dan Subklasifikasi</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <select class="select-search form-control"
                                                                        name="status_klasifikasi">
                                                                        <option value="1">Ada</option>
                                                                        <option value="0">Tidak ada</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <div class="input-group">
                                                                        <input class="form-control" type="text"
                                                                            placeholder="comment...."
                                                                            name="keterangan_klasifikasi">
                                                                        <button class="btn btn-secondary" type="button">
                                                                            <span></span></button>
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
                                                    <table class="table" id="subklas">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Klasifikasi</th>
                                                                <th>Subklasifikasi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($data->klasifikasi as $item)
                                                                <tr>
                                                                    <td>{{ $loop->iteration }}</td>
                                                                    <td>{{ $item->klas->nama }}</td>
                                                                    <td>{{ $item->subklas->nama }}</td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="skema" role="tabpanel"
                                    aria-labelledby="skema-icon-tab">
                                    <div class="col-sm-12 mt-5">
                                        <div class="row">
                                            {{-- <div class="card">
                      <div class="card-header">
                        <h4>Skema Sertifikasi</h4>
                      </div>
                      <div class="card-body">
                        <div class="table-responsive">
                          <table class="table">
                            <tbody>
                              @foreach ($permohonan->skema as $item)
                              <input type="hidden" name="nama_skema"  value="{{$item->nama_skema}}"/>
                              <tr>
                                <td colspan="4">
                                <h4  class="text-center font-weight">#{{$loop->iteration}} - {{$item->nama_skema}}</h4>
                                </td>
                              </tr>
                              <tr>
                                <td>Skema Sertifikasi LSP</td>
                                <td>
                                  <a href="{{asset('storage/'.$item->standar_kompetensi)}}" target="_blank" type="button" name="btn_cek_13" style="float: right"
                                    class="open-delete btn btn-primary btn-labeled btn-rounded">
                                    <b><i class="icofont icofont-file-document"></i></b> Softcopy</a>
                                </td>
                                <td>
                                  <select class="select-search form-control" name="status_skema">
                                    <option value="1">Ada</option>
                                    <option value="0">Tidak ada</option>
                                  </select>
                                </td>
                                <td>
                                  <div class="input-group">
                                    <input class="form-control" type="text" placeholder="comment...." name="keterangan_skema">
                                    <button class="btn btn-secondary" type="button"> <span></span></button>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>Acuan Skema</td>
                                <td>
                                  <a href="{{asset('storage/'.$item->upload_persyaratan)}}" target="_blank" type="button" name="btn_cek_13" style="float: right"
                                    class="open-delete btn btn-primary btn-labeled btn-rounded">
                                    <b><i class="icofont icofont-file-document"></i></b> Softcopy</a>
                                </td>
                                <td>
                                  <select class="select-search form-control" name="status_acuan">
                                    <option value="1">Ada</option>
                                    <option value="0">Tidak ada</option>
                                  </select>
                                </td>
                                <td>
                                  <div class="input-group">
                                    <input class="form-control" type="text" placeholder="comment...." name="keterangan_acuan">
                                    <button class="btn btn-secondary" type="button"> <span></span></button>
                                  </div>
                                </td>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div> --}}
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
                                                                    <th>Option</th>
                                                                    <th>Comment</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($permohonan->skema as $item)
                                                                    <tr>
                                                                        <td>{{ $loop->iteration }}</td>
                                                                        <td>{{ $item->kode_skema }}</td>
                                                                        <td>{{ $item->nama_skema }}</td>
                                                                        <td>{{ $item->jabker }}</td>
                                                                        <td>{{ $item->klasifikasi }}</td>
                                                                        <td>{{ $item->sub_klasifikasi }}</td>
                                                                        <td>{{ $item->kualifikasi }}</td>
                                                                        <td>{{ $item->jenjang }}</td>
                                                                        <td>{{ $item->jumlah_unit }}</td>
                                                                        <td>{{ $item->acuan_skema }}</td>
                                                                        <td> <a href="{{ asset('storage/' . $item->standar_kompetensi) }}"
                                                                                target="_blank" type="button"
                                                                                name="btn_cek_13" style="float: right"
                                                                                class="open-delete btn btn-sm btn-primary btn-labeled btn-rounded">
                                                                                <b><i
                                                                                        class="icofont icofont-file-document"></i></b>
                                                                                Softcopy</a></td>
                                                                        <td> <a href="{{ asset('storage/' . $item->upload_persyaratan) }}"
                                                                                target="_blank" type="button"
                                                                                name="btn_cek_13" style="float: right"
                                                                                class="open-delete btn btn-sm btn-primary btn-labeled btn-rounded">
                                                                                <b><i
                                                                                        class="icofont icofont-file-document"></i></b>
                                                                                Softcopy</a></td>
                                                                        <td>
                                                                            <select class="select-search"
                                                                                name="status_acuan">
                                                                                <option value="1">Ada</option>
                                                                                <option value="0">Tidak ada</option>
                                                                            </select>
                                                                        </td>
                                                                        <td>
                                                                            <input type="text"
                                                                                placeholder="comment skema "
                                                                                name="keterangan_skema">
                                                                            <br>
                                                                            <br>
                                                                            <input type="text"
                                                                                placeholder="comment acuan skema"
                                                                                name="keterangan_acuan">
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
                                <div class="tab-pane fade" id="asesor" role="tabpanel"
                                    aria-labelledby="asesor-icon-tab">
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
                                                                        <select class="select-search form-control"
                                                                            name="status_asesor">
                                                                            <option value="1">Ada</option>
                                                                            <option value="0">Tidak ada</option>
                                                                        </select>
                                                                    </td>
                                                                    <td>
                                                                        <div class="input-group">
                                                                            <input class="form-control" type="text"
                                                                                placeholder="comment...."
                                                                                name="keterangan_asesor">
                                                                            <button class="btn btn-secondary"
                                                                                type="button"> <span></span></button>
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
                                                                    <th>NIK</th>
                                                                    <th>Nama Asesor</th>
                                                                    <th>Tercatat</th>
                                                                    <th>Alamat</th>
                                                                    <th>Status Asesor</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($data->asesors as $item)
                                                                    <tr>
                                                                        <td>{{ $loop->iteration }}</td>
                                                                        <td>{{ $item->nik }}</td>
                                                                        <td>{{ $item->nama_asesor }}</td>
                                                                        <td>
                                                                            <span
                                                                                class="badge badge-primary">{{ $item->tercatat == 1 ? 'Ya' : 'Tidak' }}</span>
                                                                        </td>
                                                                        <td>{{ $item->alamat }}</td>
                                                                        <td>{{ $item->status_asesor }}</td>
                                                                        <td class="text-center">
                                                                            <a data-toggle="modal" id="smallButton"
                                                                                data-target="#smallModal"
                                                                                data-attr="{{ route('asesor.show', $item->slug) }}"
                                                                                title="show"
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
                                </div>
                                <div class="tab-pane fade" id="tuk" role="tabpanel"
                                    aria-labelledby="tuk-icon-tab">
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
                                                                        <select class="select-search form-control"
                                                                            name="status_tuk">
                                                                            <option value="1">Ada</option>
                                                                            <option value="0">Tidak ada</option>
                                                                        </select>
                                                                    </td>
                                                                    <td>
                                                                        <div class="input-group">
                                                                            <input class="form-control" type="text"
                                                                                placeholder="comment...."
                                                                                name="keterangan_tuk">
                                                                            <button class="btn btn-secondary"
                                                                                type="button"> <span></span></button>
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
                                                                    <th>Nama</th>
                                                                    <th>Alamat</th>
                                                                    <th>File Upload</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($data->locations as $item)
                                                                    <tr>
                                                                        <td>{{ $loop->iteration }}</td>
                                                                        <td>{{ $item->nama_tuk }}</td>
                                                                        <td>{{ $item->alamat }}</td>
                                                                        <td class="text-center">
                                                                            <a href="{{ asset('storage/' . $item->cakupan) }}"
                                                                                target="_blank" type="button"
                                                                                name="btn_cek_13" style="float: right"
                                                                                class="open-delete btn btn-primary btn-labeled btn-rounded">
                                                                                <b><i class="icon-file-check"></i></b>
                                                                                Softcopy</a>
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
                                <div class="tab-pane fade" id="perpanjangan" role="tabpanel"
                                    aria-labelledby="tuk-icon-tab">
                                    <div class="col-sm-12 mt-5">
                                        <div class="row">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table class="table" id="list_skema">
                                                            <thead>
                                                                <tr>
                                                                    <th>No</th>
                                                                    <th>SK Lisensi LSP</th>
                                                                    <th>Rekapitulasi Laporan</th>
                                                                    <th>Laporan tindak lanjut hasil pemantauan dan evaluasi
                                                                        kinerja LSP dengan kondisi atau perbaikan yang
                                                                        dilakukan LSP</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>#</td>
                                                                    <td>
                                                                        <a href="{{ asset('storage/' . $permohonan->perpanjangan->sk_lisensi) }}"
                                                                            target="_blank" type="button"
                                                                            name="btn_cek_13"
                                                                            class="open-delete btn btn-primary btn-labeled btn-rounded">
                                                                            <b><i class="icon-file-check"></i></b>
                                                                            Softcopy</a>
                                                                    </td>
                                                                    <td>
                                                                        <a href="{{ asset('storage/' . $permohonan->perpanjangan->rekapitulasi_laporan) }}"
                                                                            target="_blank" type="button"
                                                                            name="btn_cek_13"
                                                                            class="open-delete btn btn-primary btn-labeled btn-rounded">
                                                                            <b><i class="icon-file-check"></i></b>
                                                                            Softcopy</a>
                                                                    </td>
                                                                    <td>
                                                                        <a href="{{ asset('storage/' . $permohonan->perpanjangan->laporan_tindak_lanjut) }}"
                                                                            target="_blank" type="button"
                                                                            name="btn_cek_13"
                                                                            class="open-delete btn btn-primary btn-labeled btn-rounded">
                                                                            <b><i class="icon-file-check"></i></b>
                                                                            Softcopy</a>
                                                                    </td>
                                                                </tr>
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

    <script>
        $(document).ready(function() {
            $('#subklas').DataTable();
            $('#list_skema').DataTable();
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
    </script>
@endpush
