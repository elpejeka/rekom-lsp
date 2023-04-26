@extends('layouts.app')
@section('page-header')
<div class="page-header page-header-default">
  <div class="page-header-content">
    <div class="page-title">
      <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> Permohonan Pencatatan LSP</h4>
    </div>
  </div>

  <div class="breadcrumb-line">
    <ul class="breadcrumb">
      <li><a href="{{route('home')}}"><i class="icon-home2 position-left"></i> Home</a></li>
      <li class="active"> Pencatatan LSP</li>
    </ul>
  </div>
</div>
@endsection
@section('content')
<form class="form-horizontal" action="{{route('sk.lisensi.save')}}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="panel panel-flat">
    <div class="panel-heading">
      <h5 class="panel-title">Permohonan</h5>
      <div class="heading-elements">
        <ul class="icons-list">
                  <li><a data-action="collapse"></a></li>
                </ul>
              </div>
    </div>

    <div class="panel-body">
      <div class="row">
        <div class="col-md-12">
          <legend class="text-semibold"><i class="icon-reading position-left"></i> Permohonan</legend>
        </div>
        <div class="col-md-6">
          <fieldset>

            <div class="form-group">
              <label class="col-lg-3 control-label">Permohonan</label>
              <div class="col-lg-9">
                <select class="select-search" name="pencatatan_id">
                    @foreach ($permohonan as $item)
                        <option value="{{$item->id}}">{{$item->permohonan}}</option>
                    @endforeach
                </select>
              </div>
              @error('administrations_id')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>


            <div class="form-group">
              <label class="col-lg-3 control-label">Nomor SK</label>
              <div class="col-lg-9">
                <input type="text" class="form-control @error('no_sk') is-invalid @enderror" name="no_sk" required>
              </div>
              @error('administrations_id')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="form-group">
              <label class="col-lg-3 control-label">Nomor Lisensi</label>
              <div class="col-lg-9">
                <input type="text" class="form-control @error('no_lisensi') is-invalid @enderror" name="no_lisensi" required>
              </div>
              @error('administrations_id')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="form-group">
              <label class="col-lg-3 control-label">Masa Berlaku SK</label>
              <div class="col-lg-9">
                <input type="date" class="form-control @error('status_sk') is-invalid @enderror" name="masa_berlaku_sk" required>
              </div>
              @error('status_sk')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

          </fieldset>
        </div>

        <div class="col-md-6">
          <fieldset>

          <div class="form-group">
              <label class="col-lg-3 control-label">Surat Keputusan Lisensi</label>
                <div class="col-lg-9">
                    <input name="sk_lisensi" type="file" class="file-input @error('sk_lisensi') is-invalid @enderror"
                    data-show-caption="false" data-show-upload="false" data-browse-class="btn btn-primary btn-xs" data-remove-class="btn btn-default btn-xs" required>
                    <span class="help-block">
                      Accepted formats: pdf, zip, rar, jpeg, jpg, png Max file size 20Mb
                    </span>
                    <div class="progress" style="display:none;">
                      <div id="progress-bar-1" class="progress-bar progress-bar-success progress-bar-striped active " role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
                        20%
                      </div>
                    </div>
                </div>


                @error('sk_lisensi')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
              </div>

            <div class="form-group">
              <label class="col-lg-3">Sertifikat Lisensi</label>
                <div class="col-lg-9">
                    <input name="sertifikat_lisensi" type="file" class="file-input @error('sertifikat_lisensi') is-invalid @enderror"
                    data-show-caption="false" data-show-upload="false" data-browse-class="btn btn-primary btn-xs" data-remove-class="btn btn-default btn-xs" required>
                    <span class="help-block">
                      Accepted formats: pdf, zip, rar, jpeg, jpg, png Max file size 20Mb
                    </span>
                    <div class="progress" style="display:none;">
                      <div id="progress-bar-1" class="progress-bar progress-bar-success progress-bar-striped active " role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
                        20%
                      </div>
                    </div>
                </div>


                @error('sertifikat')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

          </fieldset>
        </div>
      </div>

      <div class="text-right">
        <button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
      </div>
    </div>

  </div>
</form>

<div class="panel panel-flat">
  <div class="panel-heading">
    <h5 class="panel-title">Data Asesor</h5>
    <div class="heading-elements">
      <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
              </ul>
            </div>
  </div>

  <div class="panel-body">
    
  </div>

  <table class="table datatable-show-all">
    <thead>
      <tr>
        <th>No</th>
        <th>No SK</th>
        <th>NO Lisensi</th>
        <th>Masa Berlaku SK</th>
        <th>SK Lisensi</th>
        <th>Sertifikat Lisensi</th>
        <th class="text-center">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($data as $item)
          <td>{{$loop->iteration}}</td>
          <td>{{$item->no_sk}}</td>
          <td>{{$item->no_lisensi}}</td>
          <td>{{$item->masa_berlaku_sk}}</td>
          <td>
            <a href="{{asset('laravel/storage/app/public/'. $item->sk_lisensi)}}" target="_blank" type="button" name="btn_cek_13" 
              class="open-delete btn btn-primary btn-labeled btn-rounded">
              <b><i class="icon-file-check"></i></b> Softcopy</a>
          </td>
          <td>
            <a href="{{asset('laravel/storage/app/public/'. $item->sertifikat_lisensi)}}" target="_blank" type="button" name="btn_cek_13" 
              class="open-delete btn btn-primary btn-labeled btn-rounded">
            <b><i class="icon-file-check"></i></b> Softcopy</a>
          </td>
          <td>
            <a href="{{route('sk.lisensi.edit', $item->id)}}" class="btn btn-sm btn-primary"><i class="icon-pencil"></i></a>
            <form action="{{route('sk.lisensi.delete', $item->id)}}" method="post" class="d-inline mt-2">
              @csrf
              @method('delete')
            <button class="btn btn-danger btn-sm mt-5"><i class="icon-trash"></i></button>
            </form>
          </td>
      @endforeach
    </tbody>
  </table>
</div>



@endsection
