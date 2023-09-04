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
                <form class="form-horizontal" action="{{route('sk.lisensi.save')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Jenis Permohonan</label>
                            <select class="form-control" name="pencatatan_id">
                                  @foreach ($permohonan as $item)
                                    @if ($loop->first)
                                      <option value="{{$item->id}}">{{$item->permohonan}}</option>  
                                    @endif
                                  @endforeach
                            </select>
                            @error('pencatatan_id')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                          </div>
                    </div>     
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Nomor SK</label>
                            <input name="no_sk" type="text" class="form-control @error('no_sk') is-invalid @enderror"  value="{{old('no_sk')}}" autofocus required>
                        </div>
                        @error('no_sk')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>    
                </div>
                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Nomor Lisensi</label>
                            <input name="no_lisensi" type="text" class="form-control @error('no_lisensi') is-invalid @enderror"  value="{{old('no_lisensi')}}" autofocus required>
                        </div>
                        @error('no_lisensi')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="control-label">Masa Berlaku</label>
                            <input type="date" class="form-control @error('status_sk') is-invalid @enderror" name="masa_berlaku_sk" required>
                        </div>
                    </div>    
                </div>
                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Surat Keputusan Lisensi</label>
                            <br/>
                            <input name="sk_lisensi" type="file" class="file-input @error('sk_lisensi') is-invalid @enderror"
                            data-show-caption="false" data-show-upload="false" data-browse-class="btn btn-primary btn-xs" data-remove-class="btn btn-default btn-xs" required>
                            <span class="help-block">
                                Accepted formats: pdf, zip, rar  Max file size 50Mb
                              </span>
                        </div>    
                    </div>    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Sertifikat Lisensi</label>
                            <br/>
                            <input name="sertifikat_lisensi" type="file" class="file-input @error('sertifikat_lisensi') is-invalid @enderror"
                            data-show-caption="false" data-show-upload="false" data-browse-class="btn btn-primary btn-xs" data-remove-class="btn btn-default btn-xs" required>
                            <span class="help-block">
                                Accepted formats: pdf, zip, rar  Max file size 50Mb
                              </span>
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
      <div class="col-sm-12 col-xl-12">  
       <div class="card">
        <div class="card-body">
            <table class="table datatable-show-all" id="list">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>No SK</th>
                    <th>NO Lisensi</th>
                    <th>Masa Berlaku SK</th>
                    <th>SK Lisensi</th>
                    <th>Sertifikat Lisensi</th>
                    <th class="text-center">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($data as $item)
                      <tr>
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
                            <form action="{{route('sk.lisensi.delete', $item->id)}}" method="post" class="d-inline">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger btn-sm"><i class="icon-trash"></i></button>
                            </form>
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
@endsection

@push('addon-script')
<script>
    $(document).ready(function () {
        $('#list').DataTable();
    });
</script>
@endpush