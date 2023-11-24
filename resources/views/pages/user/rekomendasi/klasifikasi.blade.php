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
                <form class="form-horizontal" action="{{route('kualifikasi_store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Klasifikasi</label>
                            <select class="form-control" name="klasifikasi" id="klasifikasi">
                                <optgroup label="KLASIFIKASI">
                                  <option value="">Pilih Klasifikasi</option>
                                  @foreach ($klas as $klasifikasi)
                                  <option value="{{$klasifikasi->kode}}">{{$klasifikasi->nama}}</option>
                                  @endforeach
                                </optgroup>
                            </select>
                        </div>
                        @error('klasifikasi')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Subklasifikasi</label>
                            <select class="form-control" name="sub_klasifikasi" id="subklas">
                                <optgroup label="SUBKLASIFIKASI">
                                  <option value="">Pilih Subklasifikasi</option>
                                </optgroup>
                            </select>
                            @error('nama')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
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
      <div class="card">
        <div class="card-header">
          <h4>{{$title}}</h4>
        </div>
        <div class="card-body">
            <table class="table datatable-show-all">
                <thead>
                    <tr>
                      <th>No</th>
                      <th colspan="2">Klasifikasi</th>
                      <th colspan="2">Subklasifikasi</th>
                      <th class="text-center">Actions</th>
                    </tr>
                  </thead>
                  <tbody>   
                      @foreach ($data as $item)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td colspan="">{{$item->klas->nama}}</td>
                      <td></td>
                      <td>{{$item->subklas->nama}}</td>
                      <td></td>
                      <td class="text-center">
                        
                        <form action="{{route('delete.klasifikasi', $item->id)}}" method="post" class="d-inline">
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
@endsection

@push('addon-script')
<script>
    $('#klasifikasi').change(function(){
      var kode = $(this).val();
      if(kode){
        $.ajax({
          type : "GET",
          url : "/get-subklas?kode="+kode,
          dataType : 'JSON',
          success:function(res){
            console.log(res)
            if(res){
              $('#subklas').empty();
              $("#subklas").append('<option>---Pilih Subklas---</option>');
              $.each(res,function(nama,kode_sub){
                    $("#subklas").append('<option value="'+kode_sub+'">'+nama+'</option>');
              });
            }else{
              $('#subklas').empty();
            }
          }
        })
      }else{
        $('#subklas').empty();
      }
    })
  </script>
@endpush