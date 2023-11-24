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
  <div class="row">
      <div class="col-sm-12 col-xl-12">
        <div class="card">
          <div class="card-header">
              <h4>{{$title}}</h4>
          </div>
          <div class="card-body">
            <form class="form-horizontal" action="{{route('permohonan.update', $item->id)}}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Nama LSP</label>
                            <select class="form-control" name="administrations_id">
                                @foreach ($data as $item)
                                    <option value="{{$item->id}}">{{$item->nama}}</option>
                                @endforeach
                            </select>
                            @error('no_registrasi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Jenis Permohonan</label>
                            <select class="form-control" name="jenis_permohonan" id="jenis">
                                <option value="baru" @if ($item->jenis_permohonan == 'baru')
                                    selected
                                @endif>Baru</option>
                                <option value="perpanjangan" @if ($item->jenis_permohonan == 'perpanjangan')
                                    selected
                                @endif>Perpanjangan</option>
                                <option value="penambahan" @if ($item->jenis_permohonan == 'penambahan')
                                    selected
                                @endif>Penambahan Ruang Lingkup</option>
                            </select>
                            @error('nama')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="control-label">
                                        Surat Permohonan Rekomendasi
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <input name="surat_permohonan" type="file" class="form-control @error('surat_permohonan') is-invalid @enderror"
                                    data-show-caption="false" data-show-upload="false" data-browse-class="btn btn-primary btn-xs" data-remove-class="btn btn-default btn-xs" required>
                                    <span class="help-block">
                                      Accepted formats: pdf, zip, rar, jpeg, jpg, png Max file size 20Mb
                                    </span>
                                    <div class="progress" style="display:none;">
                                      <div id="progress-bar-1" class="progress-bar progress-bar-success progress-bar-striped active " role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
                                        20%
                                      </div>
                                    </div>
                                    @error('surat_permohonan')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>   
                    <div class="col-md-6" id="sk">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="control-label">
                                        SK Lisensi dan Sertifikat Lisensi *
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <input name="sk_lisensi" type="file" class="form-control @error('sk_lisensi') is-invalid @enderror"
                                    data-show-caption="false" data-show-upload="false" data-browse-class="btn btn-primary btn-xs" data-remove-class="btn btn-default btn-xs" 
                                    id="sk_lisensi">
                                    <span class="help-block">
                                      Accepted formats: pdf, zip, rar, jpeg, jpg, png Max file size 20Mb
                                    </span>
                                    <div class="progress" style="display:none;">
                                      <div id="progress-bar-1" class="progress-bar progress-bar-success progress-bar-striped active " role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
                                        20%
                                      </div>
                                    </div>
                                    @error('sk_lisensi')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>   
                </div>
                <div class="row mt-5">
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
                    </div>
                </div>
            </form>    
          </div>
      </div>
  </div>
</div>
@endsection

@push('addon-script')
<script>
    $(document).ready(function () {
        $('#list').DataTable();
        $("#sk").hide();

        $("#jenis").on('change', function(){
            let jenis = $('#jenis').val();
            if(jenis == 'penambahan' || jenis == 'perpanjangan'){
                $('#sk').show();
                $('#sk input').prop('required', true)
            }

            if(jenis == 'baru'){
                $("#sk").hide();
                $('#sk input').prop('required', false)
            }
        })

    });
</script>
@endpush