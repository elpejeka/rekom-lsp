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
                <form class="form-horizontal" action="{{route('tuk_store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Nama TUK</label>
                            <input name="nama_tuk" type="text" class="form-control @error('nama_tuk') is-invalid @enderror"  value="{{old('nama_tuk')}}" autofocus required>
                        </div>
                        @error('nama_tuk')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Alamat</label>
                            <input name="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror"  value="{{old('alamat')}}"  autofocus required>
                        </div>
                        @error('alamat')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>    
                </div>
                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Daftar Sarana dan Prasarana</label>
                            <br/>
                            <input name="cakupan" type="file" class="file-input @error('cakupan') is-invalid @enderror"
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
                    <th>Nama TUK</th>
                    <th>Alamat</th>
                    <th>Upload Persyaratan</th>
                    <th class="text-center">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($data as $item)
                      <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->nama_tuk}}</td>
                        <td>{{$item->alamat}}</td>
                        <td>
                          <a href="{{asset('laravel/storage/app/public/'. $item->cakupan)}}" target="_blank" type="button" name="btn_cek_13" 
                            class="open-delete btn btn-primary btn-labeled btn-rounded">
                            <b><i class="icon-file-check"></i></b> Softcopy</a>
                        </td>
                        <td class="text-center">
                          <a href="{{route('rekom.tuk.edit', $item->id)}}" class="btn btn-sm btn-info">Edit</a>
                          <form action="{{route('delete.tuk', $item->id)}}" method="post" class="d-inline">
                            @csrf
                            @method('delete')
                          <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button>
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