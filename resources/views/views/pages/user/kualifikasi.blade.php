@extends('layouts.app')
@section('page-header')
<div class="page-header page-header-default">
  <div class="page-header-content">
    <div class="page-title">
      <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Klasifikasi dan Subklasifikasi</h4>
    </div>
  </div>

  <div class="breadcrumb-line">
    <ul class="breadcrumb">
      <li><a href="{{route('home')}}"><i class="icon-home2 position-left"></i> Home</a></li>
      <li class="active">Klasifikasi dan Subklasifikasi</li>
    </ul>
  </div>
</div>
@endsection
@section('content')
<form class="form-horizontal" action="{{route('kualifikasi_store')}}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="panel panel-flat">
    <div class="panel-heading">
      <h5 class="panel-title">Klasifikasi dan Subklasifikasi</h5>
      <div class="heading-elements">
        <ul class="icons-list">
                  <li><a data-action="collapse"></a></li>
                </ul>
              </div>
    </div>

    <div class="panel-body">
      <div class="row">
        <div class="col-md-12">
          <legend class="text-semibold"><i class="icon-reading position-left"></i> Informasi Umum</legend>
        </div>
        <div class="col-md-6">
          <fieldset>

            <div class="form-group">
              <label class="col-lg-3 control-label">Klasifikasi</label>
              <div class="col-lg-9">
                <select class="select-search" name="klasifikasi" id="klasifikasi">
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

            
          </fieldset>
        </div>

        <div class="col-md-6">
          <fieldset>
            
            <div class="form-group">
                <label class="col-lg-3 control-label">Sub Kualifikasi</label>
                <div class="col-lg-9">
                  <select class="select-search" name="sub_klasifikasi" id="subklas">
                    <optgroup label="KLASIFIKASI">
                      <option value="">Pilih Subklasifikasi</option>
                    </optgroup>
                  </select>
                </div>
                @error('nama')
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
    <h5 class="panel-title">Data Kualifikasi</h5>
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
          <th colspan="2">Klasifikasi</th>
          <th colspan="2">Subklasifikasi</th>
          <th class="text-center">Actions</th>
        </tr>
      </thead>
      <tbody>   
        @php
            $no = 1;
        @endphp
          @foreach ($data as $item)
        <tr>
          <td>{{$no++}}</td>
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
@endsection

@push('addon-script')
  <script>
    $('#klasifikasi').change(function(){
      var kode = $(this).val();
      console.log(kode)
      if(kode){
        $.ajax({
          type : "GET",
          url : "/lsp/get-subklas?kode="+kode,
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