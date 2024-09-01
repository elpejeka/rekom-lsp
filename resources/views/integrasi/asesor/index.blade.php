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
      <div class="col-sm-4 col-xl-4">
        <div class="card">
          <div class="card-header">
              <h4>{{$title}}</h4>
          </div>
          <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label">No Registrasi Asesor BNSP</label>
                        <input type="text" class="form-control" name="noreg" id="noreg" required>
                      </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label">Pilih LSP</label>
                        <select id="id_lsp" class="form-control" required>
                            <option value="">Pilih LSP</option>
                            @foreach ($lsp as $item)
                                <option value="{{$item->id}}">{{$item->nama}} - ({{$item->id}})</option>
                            @endforeach
                        </select>
                      </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label">Status Asesor</label>
                        <select id="status" class="form-control" required>
                            <option value="">Pilih Status</option>
                            <option value="1">Internal</option>
                            <option value="2">Eksternal</option>
                        </select>
                      </div>
                </div>
            </div>
            <div class="row mt-3">
                <a href="#" id="addAsesor" onclick="addAsesor()" class="btn btn-block btn-primary">Tambah</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-8 col-xl-8">
        <div class="card">
            <div class="card-header">
                <h4> List Data Sync</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="asesor" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <td>NoReg Asesor BNSP</td>
                                <td>ID LSP</td>
                                <td>Status</td>
                                <td>#</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr id="nofound">
                                <td colspan="4">
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
</div>
@endsection


@push('addon-script')
<script>
    function addAsesor(){
        let noReg = $('#noreg').val();
        let idLsp = $('#id_lsp').val();
        let status = $('#status').val();

        if (noReg == null || noReg == '') {
            $('#customer_id').focus();
            Swal.fire({
                position: "top-end",
                icon: "error",
                title: "No Reg Asesor BNSP Kosong",
                showConfirmButton: false,
                timer: 1500
              });
            return false;
        }

        if (idLsp == null || idLsp == '') {
            $('#customer_id').focus();
            Swal.fire({
                title: 'Error!',
                text: 'LSP Masih Kosong',
                icon: 'error',
                confirmButtonText: false
                })
            return false;
        }

        if (status == null || status == '') {
            $('#customer_id').focus();
            Swal.fire({
                title: 'Error!',
                text: 'Status Asesor Kosong',
                icon: 'error',
                confirmButtonText: false
                })
            return false;
        }

        $.ajax({
            url : "{{route('integrasi.asesor.cek')}}",
            type: "get",
            data : {
                "_token" : "{{csrf_token()}}",
                'id_lsp' : idLsp,
                'no_reg' : noReg
            },
            success: function(res){
                Swal.fire({
                    title: 'Loading!',
                    text: res,
                    icon: 'info',
                    showConfirmButton: false
                })
                if(res === 'success'){
                    $('#asesor > tbody #nofound').remove();
                    txt = '<tr style="background-color:#fef08a">'
                    txt += '<td class="noreg"><input type="text" id="no_reg" name="no_reg[]" value="'+noReg+'"/>' + noReg + '</td>'
                    txt += '<td class="idlsp"><input type="text" id="id_lsp" name="id_lsp[]" value="'+idLsp+'"/>' + idLsp + '</td>'
                    txt += '<td class="status"><input type="text" id="status" name="status[]" value="'+status +'"/>' + status + '</td>'
                    txt +=  '<td><a href="#" class="deleteBtn btn btn-sm btn-danger">Hapus</a></td>'
                    txt += '</tr>'
                    $('#asesor > tbody').append(txt)
                    $('#noreg').val("")
                    $('#id_lsp').val("")
                    $('#status').val("")
                }else{
                    Swal.fire({
                    title: 'Error!',
                    text: res,
                    icon: 'error',
                    showConfirmButton: false
                    })
                }
            }
        })
    }

    $('#asesor').on('click', '.deleteBtn', function(){
        $(this).closest("tr").remove();
    })
</script>
@endpush
