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
                <form class="form-horizontal" action="{{route('skema.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" class="form-control @error('asesor_id') is-invalid @enderror" name="asesor_id" value="{{$asesor->id}}">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Nama Asesor</label>
                            <input type="text" class="form-control @error('nama_asesor') is-invalid @enderror" name="" value={{$asesor->nama_asesor}} readonly>
                        </div>
                        @error('nama_asesor')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Skema Sertifikasi</label>
                            <select class="form-control" name="skema_sertifikasi">
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
                </div>
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Kualifikasi</th>
                                <th>Subklasifikasi</th>
                                <th>
                                    <a class="btn btn-sm btn-info addRow remove" href="javascript:void(0);" id="add_button" title="Add field">
                                        <i class="icon-plus2" aria-hidden="true">Add</i>
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
                    <th>Skema Sertifikasi</th>
                    <th>Subklasifikasi</th>
                    <th>Kualifikasi</th>
                    <th class="text-center">Action</th>
                </tr>
                </thead>
                @foreach ($sertifikat as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->skema_sertifikasi}}</td>
                    <td>{{$item->subklasifikasi}}</td>
                    <td>{{$item->kualifikasi}}</td>
                    <td class="text-center">
                    {{-- <a href="{{route('skema.edit', $item->id)}}" class="btn btn-sm btn-primary"><i class="icon-pencil"></i></a> --}}
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