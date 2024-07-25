@extends('layouts.app')
@section('page-header')
<div class="page-header page-header-default">
  <div class="page-header-content">
    <div class="page-title">
      <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Asesor</h4>
    </div>
  </div>

  <div class="breadcrumb-line">
    <ul class="breadcrumb">
      <li><a href="{{route('home')}}"><i class="icon-home2 position-left"></i> Home</a></li>
      <li class="active">Detail Asesor</li>
    </ul>
  </div>
</div>
@endsection

@section('content')
<form class="form-horizontal" action="{{route('skema.store')}}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="panel panel-flat">
    <div class="panel-heading">
      <h5 class="panel-title">Skema Sertifikasi Asesor</h5>
      <div class="heading-elements">
        <ul class="icons-list">
                  <li><a data-action="collapse"></a></li>
                </ul>
              </div>
    </div>

    <div class="panel-body">
      <div class="row formku" id="formRw">
        <div class="col-md-12">
          <legend class="text-semibold"><i class="icon-reading position-left"></i> Skema Sertifikasi Asesor</legend>
        </div>
        <div class="col-md-6">
          <fieldset>
            <input type="hidden" class="form-control @error('asesor_id') is-invalid @enderror" name="asesor_id" value="{{$asesor->id}}">
            <div class="form-group">
              <label class="col-lg-3 control-label">Nama Asesor</label>
              <div class="col-lg-9">
                <input type="text" class="form-control @error('nama_asesor') is-invalid @enderror" name="" value={{$asesor->nama_asesor}} readonly>
              </div>
              @error('nama_asesor')
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
                <label class="col-lg-3 control-label">Skema Sertifikasi</label>
                <div class="col-lg-9">
                    <select class="select-search form-control" name="skema_sertifikasi">
                        <optgroup label="SKEMA">
                            @foreach ($skema as $item)
                                <option value="{{$item->jabatan_kerja}}">{{$item->jabatan_kerja}}</option>
                            @endforeach
                        </optgroup>
                    </select>
                </div>
                @error('nama_asesor')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
              </div>
  
            </fieldset>
          </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <legend class="text-semibold"><i class="icon-reading position-left"></i> Kualifikasi dan Subklasifikasi</legend>
        </div>

        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>Kualifikasi</th>
                        <th>Subklasifikasi</th>
                        <th>
                            <a class="btn btn-info addRow remove" href="javascript:void(0);" id="add_button" title="Add field">
                                <i class="icon-plus2" aria-hidden="true"></i>
                            </a>
                        </th>
                    </tr>
                </thead>
                <tbody id="body-table">
                    <tr>
                        <td>
                            <select class="select-search form-control" name="kualifikasi[]">
                                <optgroup label="SUBKLASIFIKASI">
                                  <option value="ahli">Ahli</option>
                                  <option value="teknisi/analis">Teknik / Analis </option>
                                  <option value="operator">Operator</option>
                                </optgroup>
                            </select>
                        </td>
                        <td>
                            <select class="select-search form-control" name="subklasifikasi[]">
                                <optgroup label="SUBKLASIFIKASI">
                                    @foreach ($subklas as $item)
                                    <option value="{{$item->nama}}">{{$item->nama}}</option>
                                    @endforeach
                                </optgroup>
                            </select>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

      </div>
      
      <div class="text-right">
        <button type="submit" class="btn btn-primary">Submit<i class="icon-arrow-right14 position-right"></i></button>
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
        <th>Skema Sertifikasi</th>
        <th>Subklasifikasi</th>
        <th>Kualifikasi</th>
        <th class="text-center">Action</th>
      </tr>
    </thead>
    @php
        $no= 1;
    @endphp
      @foreach ($sertifikat as $item)
      <tr>
        <td>{{$no++}}</td>
        <td>{{$item->skema_sertifikasi}}</td>
        <td>{{$item->subklasifikasi}}</td>
        <td>{{$item->kualifikasi}}</td>
        <td class="text-center">
          <a href="{{route('skema.edit', $item->id)}}" class="btn btn-sm btn-primary"><i class="icon-pencil"></i></a>
           <form action="{{route('skema.delete', $item->id)}}" method="post" class="d-inline">
            @csrf
            @method('delete')
          <button class="btn btn-danger btn-sm"><i class="icon-trash"></i></button>
          </form>
        </td>
      </tr> 
      @endforeach
  </table>
</div>
@endsection

@push('addon-script')
<script>
    $('.addRow').on('click', function(){
        addRow();
    })

    function addRow(){
         var rw =   '<tr>'+
                        '<td>'+
                            '<select class="select-search form-control" name="kualifikasi[]">'+
                                '<optgroup label="SUBKLASIFIKASI">'+
                                  '<option value="ahli">Ahli</option>'+
                                  '<option value="teknisi/analis">Teknik / Analis </option>'+
                                  '<option value="operator">Operator</option>'+
                                '</optgroup>'+
                            '</select>'+
                        '</td>'+
                        '<td>'+
                            '<select class="select-search form-control" name="subklasifikasi[]">'+
                                '<optgroup label="SUBKLASIFIKASI">'+
                                    '@foreach ($subklas as $item)'+
                                    '<option value="{{$item->nama}}">{{$item->nama}}</option>'+
                                   '@endforeach'+
                                '</optgroup>'+
                            '</select>'+
                        '</td>'+
                        '<td>'+
                            '<a class="btn btn-danger remove" href="javascript:void(0);" id="add_button" title="Add field">'+
                                'Hapus'+
                            '</a>'+
                        '<td>'+
                    '</tr>';
            $('#body-table').append(rw);
    };

        $('#body-table').on('click', '.remove', function(){
            $(this).parent().parent().remove();
        })
</script>
@endpush