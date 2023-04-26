@extends('layouts.app')
@section('page-header')
<div class="page-header page-header-default">
  <div class="page-header-content">
    <div class="page-title">
      <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Struktur Organisasi LSP</h4>
    </div>
  </div>

  <div class="breadcrumb-line">
    <ul class="breadcrumb">
      <li><a href="{{route('home')}}"><i class="icon-home2 position-left"></i> Home</a></li>
      <li class="active">Struktur Organisasi LSP</li>
    </ul>
  </div>
</div>
@endsection
@section('content')
@if ($pengurus > 0)
<div class="panel panel-flat">
  <div class="panel-heading">
    <h5 class="panel-title">Struktur Organisasi</h5>
    <div class="heading-elements">
      <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
              </ul>
            </div>
  </div>

  <div class="panel-body">
    
  </div>

  <table class="table table-lg">
    <thead>
        <tr>
            <td>Data</td>
            <td>Description</td>
            <td>No HP</td>
        </tr>
    </thead>
    <tbody>
      <tr>
      <td>
        Struktur Organisasi
      </td>
        <td colspan="2">
        
          <a href="{{asset('laravel/storage/app/public/'. $item[0]->upload_persyaratan)}}" target="_blank" type="button" name="btn_cek_13" 
            class="open-delete btn btn-primary btn-labeled btn-rounded">
            <b><i class="icon-file-check"></i></b> Softcopy</a>
        </td>
      <tr>
        <tr>
            <td>Pengarah</td>
            <td>{{$item[0]->pengarah}}</td>
            <td>{{$item[0]->no_telp_pengarah}}</td>
        </tr>
        <tr>
            <td>Pengarah</td>
            <td>{{$item[0]->pengarah_1}}</td>
            <td>{{$item[0]->no_telp_pengarah_1}}</td>
        </tr>
        <tr>
            <td>Pengarah</td>
            <td>{{$item[0]->pengarah_2}}</td>
            <td>{{$item[0]->no_telp_pengarah_2}}</td>
        </tr>
        <tr>
            <td>Pengarah</td>
            <td>{{$item[0]->pengarah_3}}</td>
            <td>{{$item[0]->no_telp_pengarah_3}}</td>
        </tr>
        <tr>
            <td>Pengarah</td>
            <td>{{$item[0]->pengarah_4}}</td>
            <td>{{$item[0]->no_telp_pengarah_4}}</td>
        </tr>
        <tr>
            <td>Ketua Pelaksana</td>
            <td>{{$item[0]->ketua}}</td>
            <td>{{$item[0]->no_ketua}}</td>
        </tr>
        <tr>
            <td>Penanggungjawab Bagian Umum </td>
            <td>{{$item[0]->umum}}</td>
            <td>{{$item[0]->no_umum}}</td>
        </tr>
        <tr>
            <td>Penanggungjawab Bagian Sertifikasi </td>
            <td>{{$item[0]->sertifikasi}}</td>
            <td>{{$item[0]->no_sertifikasi}}</td>
        </tr>
        <tr>
            <td>Penanggungjawab Bagian Manajemen Mutu</td>
            <td>{{$item[0]->manajemen_mutu}}</td>
            <td>{{$item[0]->no_manajemen}}</td>
        </tr>
        <tr>
            <td>Jumlah Karyawan LSP</td>
            <td colspan="2">{{$item[0]->jumlah_karyawan}}</td>
        </tr>
        <tr>
          <td>Action</td>
          <td colspan="2">
            {{-- @if($item[0]->status_submit == null) --}}
            <a href="{{route('pengurus.edit', $item[0]->id)}}" class="btn btn-primary">Edit</  
            {{-- @else
            @endif   --}}
          </td>
      </tr>
    </tbody>
</table>
</div>
@else
<form method="POST" class="form-horizontal" action="{{route('struktur_organisasi_store')}}" enctype="multipart/form-data">
  @csrf
  <div class="panel panel-flat">
    <div class="panel-heading">
      <h5 class="panel-title">Struktur Organisasi</h5>
      <div class="heading-elements">
        <ul class="icons-list">
        <li><a data-action="collapse"></a></li>
        </ul>
      </div>
    </div>

    <div class="panel-body">
      <div class="row">
        <div class="col-md-12">
          <legend class="text-semibold"><i class="icon-reading position-left"></i> Struktur Organisasi</legend>
        </div>
        <div class="col-md-6">
          <div class="col-md-8">
          <fieldset>

            <div class="form-group">
              <label class="col-lg-3 control-label">Nama Pengarah</label>
              <div class="col-lg-9">
                <input name="pengarah" type="text" class="form-control @error('pengarah') is-invalid @enderror" placeholder="" required>
              </div>
              @error('pengarah')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="form-group">
              <label class="col-lg-3 control-label">Nama Pengarah</label>
              <div class="col-lg-9">
                <input name="pengarah_1" type="text" class="form-control @error('pengarah_1') is-invalid @enderror" placeholder="">
              </div>
              @error('pengarah_1')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="form-group">
              <label class="col-lg-3 control-label">Nama Pengarah</label>
              <div class="col-lg-9">
                <input name="pengarah_2" type="text" class="form-control @error('pengarah_2') is-invalid @enderror" placeholder="">
              </div>
              @error('pengarah_2')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="form-group">
              <label class="col-lg-3 control-label">Nama Pengarah</label>
              <div class="col-lg-9">
                <input name="pengarah_3" type="text" class="form-control @error('pengarah_3') is-invalid @enderror" placeholder="">
              </div>
              @error('pengarah_3')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="form-group">
              <label class="col-lg-3 control-label">Nama Pengarah</label>
              <div class="col-lg-9">
                <input name="pengarah_4" type="text" class="form-control @error('pengarah_4') is-invalid @enderror" placeholder="">
              </div>
              @error('pengarah_4')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            </fieldset>
          </div>
          <div class="col-md-4">
          <fieldset>
            <div class="form-group">
              <div class="col-lg-12">
                <input name="no_telp_pengarah" type="number" class="form-control @error('no_telp_pengarah') is-invalid @enderror" placeholder="Nomor Handphone" required>
              </div>
              @error('no_telp_pengarah')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

             <div class="form-group">
              <div class="col-lg-12">
                <input name="no_telp_pengarah_1" type="number" class="form-control @error('no_telp_pengarah_1') is-invalid @enderror" placeholder="Nomor Handphone">
              </div>
              @error('no_telp_pengarah_1')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="form-group">
              <div class="col-lg-12">
                <input name="no_telp_pengarah_2" type="number" class="form-control @error('no_telp_pengarah_2') is-invalid @enderror" placeholder="Nomor Handphone">
              </div>
              @error('no_telp_pengarah_2')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="form-group">
              <div class="col-lg-12">
                <input name="no_telp_pengarah_3" type="number" class="form-control @error('no_telp_pengarah_3') is-invalid @enderror" placeholder="Nomor Handphone">
              </div>
              @error('no_telp_pengarah_3')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="form-group">
              <div class="col-lg-12">
                <input name="no_telp_pengarah_4" type="number" class="form-control @error('no_telp_pengarah_4') is-invalid @enderror" placeholder="Nomor Handphone">
              </div>
              @error('no_telp_pengarah_4')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

          
            
          </fieldset>
          </div>
        </div>

        <div class="col-md-6">
          <div class="col-md-8">
          <fieldset>

            <div class="form-group">
              <label class="col-lg-3 control-label">Ketua Pelaksana</label>
              <div class="col-lg-9">
                <input name="ketua" type="text" class="form-control @error('ketua') is-invalid @enderror" placeholder="" required>
              </div>
              @error('ketua')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            

            
            <div class="form-group">
                <label class="col-lg-3 control-label">Bagian Umum </label>
                <div class="col-lg-9">
                  <input name="umum" type="text" class="form-control @error('umum') is-invalid @enderror" placeholder="" required>
                </div>
                @error('umum')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              

          <div class="form-group">
              <label class="col-lg-3 control-label">Bagian Sertifikasi </label>
                  <div class="col-lg-9">
                      <input name="sertifikasi" type="text" class="form-control @error('sertifikasi') is-invalid @enderror" placeholder="" required>
                  </div>
                  @error('sertifikasi')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
          </div>

          <div class="form-group">
            <label class="col-lg-3 control-label">Bagian Manajemen Mutu </label>
                <div class="col-lg-9">
                    <input name="manajemen_mutu" type="text" class="form-control @error('manajemen_mutu') is-invalid @enderror" placeholder="" required>
                </div>
                @error('manajemen_mutu')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
        </div>

        <div class="form-group">
          <label class="col-lg-3 control-label">Jumlah Karyawan</label>
              <div class="col-lg-9">
                  <input name="jumlah_karyawan" type="text" class="form-control @error('jumlah_karyawan') is-invalid @enderror" placeholder="" required>
              </div>
              @error('jumlah_karyawan')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
      </div>
        
      </fieldset>
      </div> 
      <div class="col-md-4">
        
        <div class="form-group">
          <div class="col-lg-12">
            <input name="no_ketua" type="number" class="form-control @error('no_ketua') is-invalid @enderror" placeholder="Nomor Handphone" required>
          </div>
          @error('no_ketua')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>

        <div class="form-group">
          <div class="col-lg-12">
            <input name="no_umum" type="number" class="form-control @error('no_umum') is-invalid @enderror" placeholder="Nomor Handphone" required>
          </div>
          @error('no_umum')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>

        <div class="form-group">
          <div class="col-lg-12">
            <input name="no_sertifikasi" type="number" class="form-control @error('no_sertifikasi') is-invalid @enderror" placeholder="Nomor Handphone" required>
          </div>
          @error('no_sertifikasi')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>

        <div class="form-group">
          <div class="col-lg-12">
            <input name="no_manajemen" type="number" class="form-control @error('no_manajemen') is-invalid @enderror" placeholder="Nomor Handphone" required>
          </div>
          @error('no_manajemen')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>

        

          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <fieldset>
              <div class="col-md-12">
                <div class="form-group">
                  <label class="col-lg-3 control-label">SK Struktur Organisasi</label>
                    <div class="col-lg-9">
                        <input name="upload_persyaratan" type="file" class="file-input @error('upload_persyaratan') is-invalid @enderror"
                        data-show-caption="false" data-show-upload="false" data-browse-class="btn btn-primary btn-xs" data-remove-class="btn btn-default btn-xs" required>
                        <span class="help-block">
                          Accepted formats: pdf, zip, rar,  Max file size 50Mb
                        </span>
                        <div class="progress" style="display:none;">
                          <div id="progress-bar-1" class="progress-bar progress-bar-success progress-bar-striped active " role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
                            20%
                          </div>
                        </div>
                    </div>
                    
      
                    @error('upload_persyaratan')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
              </div>
            </fieldset>
          </div>
        </div>
      </div>


      <div class="text-right">
        <button type="submit" class="btn btn-primary">Submit<i class="icon-arrow-right14 position-right"></i></button>
      </div>
    
    </div>

  </div>
</form>
@endif
@endsection
