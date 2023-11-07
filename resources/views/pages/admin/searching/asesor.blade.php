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
<div class="container-fluid search-page">
  <div class="row">
      <div class="col-sm-12 col-xl-12">
        <div class="card">
            <div class="card-header">
                <form class="theme-form">
                    <div class="input-group m-0 flex-nowrap">
                      <input class="form-control-plaintext" type="search" placeholder="NIK Asesor" id="nik">
                      <input type="hidden" name="csrf_token" value="{{ csrf_token() }}" id="token">
                      <button type="button" class="btn btn-primary input-group-text" id="searchAsesor">Search</button>
                    </div>
                </form>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="list" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                              <th>No</th>
                              <th>Nama Asesor</th>
                              <th>Alamat</th>
                              <th>Tanggal Lahir</th>
                              <th>Status Asesor</th>
                              <th>LSP</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr class="nofound">
                                <td colspan="6">
                                    <p class="text-center">Data no found !</p>
                                </td>
                            </tr>
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
     $("#searchAsesor").on("click", function() {
        let nik = $("#nik").val();
        let token = $('#token').val();

        if(nik == null || nik == ''){
            alert('Masukan nik terlebih dahulu')
        }

        $.ajax({
            url : "{{route('get.asesor')}}",
            type : "POST",
            data : {
                "_token" : token,
                "nik" : nik
            },
            success:function(res){
                if(res !== 'NODATA'){
                    rowIndex = 0;
                    for(let i = 0; i < res.length; i++){
                        $('#list > tbody .nofound').remove();
                        rowIndex++;
                        const lsp = res[i].user == null ? '-' : res[i].user.nama_lsp;
                        
                        txt = '<tr id="row_" +>' + rowIndex + '</td>'
                        txt += '<td>#</td>'
                        txt += '<td>' + res[i].nama_asesor + '</td>'
                        txt += '<td>' + res[i].alamat + '</td>'
                        txt += '<td>' + res[i].tgl_lahir + '</td>'
                        txt += '<td>' + res[i].status_asesor + '</td>'
                        txt += '<td>' + lsp + '</td>'
                        txt += '</tr>';
                        
                        $('#list > tbody').append(txt)
                    }
                }else{
                    alert('Data tidak ditemukan')
                }
            },
            error: function(xhr, status, error){}
        })
     })
</script>
@endpush