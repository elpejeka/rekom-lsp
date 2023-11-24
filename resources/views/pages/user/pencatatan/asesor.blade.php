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
      <li class="active">Asesor</li>
    </ul>
  </div>
</div>
@endsection

@section('content')
<form class="form-horizontal" action="{{route('pencatatan.asesor.store')}}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="panel panel-flat">
    <div class="panel-heading">
      <h5 class="panel-title">Asesor</h5>
      <div class="heading-elements">
        <ul class="icons-list">
                  <li><a data-action="collapse"></a></li>
                </ul>
              </div>
    </div>

    <div class="panel-body">
      <div class="row">
        <div class="col-md-12">
          <legend class="text-semibold"><i class="icon-reading position-left"></i> Asesor</legend>
        </div>
        <div class="col-md-6">
          <fieldset>

            <div class="form-group">
              <label class="col-lg-3 control-label">Jenis Permohonan</label>
              <div class="col-lg-9">
                <select class="select-search" name="pencatatan_id">
                    @foreach ($permohonan as $item)
                      @if ($loop->first)
                        <option value="{{$item->id}}">{{$item->permohonan}} </option>
                      @endif
                    @endforeach
                </select>
              </div>
              @error('pencatatan_id')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="form-group">
              <label class="col-lg-3 control-label">Nama Asesor</label>
              <div class="col-lg-9">
                <input type="text" class="form-control @error('nama_asesor') is-invalid @enderror" name="nama_asesor" required>
              </div>
              @error('nama_asesor')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
            </div>

            <div class="form-group">
              <label class="col-lg-3 control-label">NIK</label>
                  <div class="col-lg-9">
                    <input type="number" class="form-control @error('nik') is-invalid @enderror" name="nik" required>
                  </div>
                  @error('nik')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>

            <div class="form-group">
              <label class="col-lg-3 control-label">NPWP</label>
                  <div class="col-lg-9">
                    <input type="text" class="form-control @error('npwp') is-invalid @enderror" name="npwp" required>
                  </div>
                  @error('npwp')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>

            <div class="form-group">
              <label class="col-lg-3 control-label">Email</label>
                  <div class="col-lg-9">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" required>
                  </div>
                  @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>

            <div class="form-group">
              <label class="col-lg-3 control-label">No Handphone</label>
                  <div class="col-lg-9">
                    <input type="number" class="form-control @error('no_telpon') is-invalid @enderror" name="no_telpon" required>
                  </div>
                  @error('no_telpon')
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
              <label class="col-lg-3 control-label">Provinsi</label>
              <div class="col-lg-9">
                <select class="select-search" name="provinsi" id="provinsi">
                    <option value="">Pilih Provinsi</option>
                @foreach ($propinsi as $prov)
                  <option value="{{$prov->id_propinsi_dagri}}">{{$prov->Nama}}</option>
                @endforeach
                </select>
              </div>
              @error('provinsi')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="form-group">
              <label class="col-lg-3 control-label">Kabupaten / Kota</label>
              <div class="col-lg-9">
                <select class="select-search" name="kab_kota" id="kab_kota">
                  <option value="">Pilih Kabupaten / Kota</option>
                </select>
              </div>
              @error('kab_kota')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            
            <div class="form-group">
              <label class="col-lg-3 control-label">Alamat</label>
                  <div class="col-lg-9">
                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" required>
                    <input type="hidden" class="form-control" name="nama_lsp" value="{{$lsp->nama}}">
                  </div>
                  @error('alamat')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>

            <div class="form-group">
              <label class="col-lg-3 control-label">Status Asesor</label>
              <div class="col-lg-9">
                <select class="select-search" name="status_asesor">
                        <option value="Internal">Internal</option>
                        <option value="External">External</option>
                </select>
              </div>
              @error('status_asesor')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="form-group">
              <label class="col-lg-3 control-label">Tempat Lahir</label>
              <div class="col-lg-9">
                <select class="select-search" name="tempat_lahir">
                    <option value="">Pilih Provinsi</option>
                @foreach ($propinsi as $prov)
                  <option value="{{$prov->id_propinsi_dagri}}">{{$prov->Nama}}</option>
                @endforeach
                </select>
              </div>
              @error('provinsi')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            
            <div class="form-group">
              <label class="col-lg-3 control-label">Tanggal Lahir</label>
                  <div class="col-lg-9">
                    <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror" name="tgl_lahir" required>
                  </div>
                  @error('tgl_lahir')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>

             
            <div class="form-group">
              <label class="col-lg-3 control-label">Pendidikan</label>
                  <div class="col-lg-9">
                    <input type="text" class="form-control @error('pendidikan') is-invalid @enderror" name="pendidikan" required>
                  </div>
                  @error('pendidikan')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>
        
            
          </fieldset>
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
        <th>Nama Asesor</th>
        <th>Propinsi</th>
        <th>Alamat</th>
        <th>Email</th>
        <th>Tanggal Lahir</th>
        <th>Pendidikan</th>
        <th>Status Asesor</th>
        <th>Nomor Registrasi Asesor LPJK</th>
        <th>Status</th>
        <th>Tayang</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
      @foreach ($asesor as $item)
      <tr>
        <td>{{$no++}}</td>
        <td>{{$item->nama_asesor}}</td>
        <td>{{$item->provinsi == null ? "-" : $item->propinsi->Nama}}</td>
        <td>{{$item->alamat}}</td>
        <td>{{$item->email}}</td>
        <td>{{date_format(date_create($item->tgl_lahir), 'Y-m-d')}}</td>
        <td>{{$item->pendidikan}}</td>
        <td><span class="label label-success">{{$item->status_asesor}}</span></td>
        <td>{{$item->no_registrasi_asesor}}</td>
        <td>
          @if($item->approve == null)
          <span class="label label-primary">Not Approve</span>
          @endif
          @if($item->approve == 1)
          <span class="label label-success">Approved</span>
          @endif
        </td>
        <td>
          <span class="label label-success">{{$item->is_active == 1 ? 'YA' : 'Tidak'}}</span>
        </td>
        @if ($item->approve_at == null)
        <td class="text-center">
          <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Actions
            <span class="caret"></span></button>
            <ul class="dropdown-menu">
              <li><a href="{{route('pencatatan.asesor.edit', $item->id)}}"><i class="icon-pencil"></i> Edit</a></li>
              <li><a href="{{route('pencatatan.sertifikat.asesor', $item->id)}}"><i class="icon-plus2" aria-hidden="true"></i> Tambah Sertifikat</a></li>
              <li><a data-toggle="modal" id="smallButton" data-target="#smallModal"
                data-attr="{{ route('sertifikat.show', $item->id) }}" title="show" >
                <i class="icon-eye2"></i> Detail Asesor</a></li>
              <li><form action="{{route('pencatatan.asesor.delete', $item->id)}}" method="post" class="d-inline mt-2">
                @csrf
                @method('delete')
              <button><i class="icon-trash"></i> Hapus</button>
              </form>
              </li>
              <li>
                <a href="{{route('ext.index', $item->id)}}">Dokumen Perjanjian</a>
              </li>
              <li>
                <a href="{{route('asesor.tayang', $item->id)}}">Ubah Status Tayang</a>
              </li>
            </ul>
          </div>        
        </td>
        @endif
        @if ($item->approve_at != null)
        <td class="text-center">
          <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Actions
            <span class="caret"></span></button>
            <ul class="dropdown-menu">
              <li><a href="{{route('pencatatan.asesor.edit', $item->id)}}"><i class="icon-pencil"></i> Edit</a></li>
              <li><a href="{{route('pencatatan.sertifikat.asesor', $item->id)}}"><i class="icon-plus2" aria-hidden="true"></i> Tambah Sertifikat</a></li>
              <li><a data-toggle="modal" id="smallButton" data-target="#smallModal"
                data-attr="{{ route('sertifikat.show', $item->id) }}" title="show" >
                <i class="icon-eye2"></i> Detail Asesor</a></li>
              <li><a href="{{route('asesor.unactive', $item->id)}}" ><i class="icon-trash"></i> Hapus</a></li>
              <li><a href="{{route('qr.surat', $item->id)}}" >Surat Pencatatan Asesor</a></li>
              <li><a href="{{route('ext.index', $item->id)}}">Dokumen Perjanjian</a></li>
              <li><a href="{{route('asesor.tayang', $item->id)}}">Ubah Status Tayang</a></li>
            </ul>
          </div>
        </td>
        @endif
      </tr> 
      @endforeach
    </tbody>
  </table>
</div>
@endsection

@push('addon-script')

<div class="modal" id="smallModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title-asesor"></h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body-asesor" id="smallBody">
                <i class="fa fa-spinner fa-spin"></i>

            </div>
            <div class="modal-footer-asesor">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="mymodal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title"></h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              <i class="fa fa-spinner fa-spin"></i>
          </div>
      </div>
  </div>
</div>

<div class="modal fade" id="keabsahanAsesor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Keabsahan Asesor LSP</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form id="asesorForm" enctype="multipart/form-data">
            @csrf
              <input type="text" name="idAsesor" id="idAsesor" hidden/>
              <div class="form-group">
                  <label for="namaSkema">Nama Asesor</label>
                  <input type="text" name="nama_asesor" id="asesor" class="form-control" readonly>
              </div>
              <div class="form-group">
                  <label for="kesesuaian">Surat Keterangan Penghapusan</label>
                  <input type="file" name="surat_penghapusan" id="surat_penghapusan" class="form-control" />
              </div>   
      </div>
          <div class="modal-footer">
          <button type="submit" class="btn btn-success">Save changes</button>
          </div>
      </form>
    </div>
  </div>
</div>

<script>
  $(document).on('click', '#smallButton', function(event) {
            event.preventDefault();
            let href = $(this).attr('data-attr');
            $.ajax({
                url: href,
                beforeSend: function() {
                    $('#loader').show();
                },
                // return the result
                success: function(result) {
                    $('#smallModal').modal("show");
                    $('#smallBody').html(result).show();
                },
                complete: function() {
                    $('#loader').hide();
                },
                error: function(jqXHR, testStatus, error) {
                    console.log(error);
                    alert("Page " + href + " cannot open. Error:" + error);
                    $('#loader').hide();
                },
                timeout: 8000
            })
        });
</script>


<script>
  $('#provinsi').change(function(){
    var kode = $(this).val();
    console.log(kode)
    if(kode){
      $.ajax({
        type : "GET",
        url : "/kab_kota?id_propinsi_dagri="+kode,
        dataType : 'JSON',
        success:function(res){
          console.log(res)
          if(res){
            $('#kab_kota').empty();
            $("#kab_kota").append('<option>---Pilih Kabupaten / Kota---</option>');
            $.each(res,function(nama_kabupaten_dagri,id_kabupaten_dagri){
                  $("#kab_kota").append('<option value="'+id_kabupaten_dagri+'">'+nama_kabupaten_dagri+'</option>');
            });
          }else{
            $('#kab_kota').empty();
          }
        }
      })
    }else{
      $('#kab_kota').empty();
    }
  })

  function updateAsesor(id){
          var noPencatatan = $("#pencatatan").val()
            $.get('/pencatatan/asesor-approve/'+id, function(asesor){
                $("#idAsesor").val(asesor.id);
                $("#asesor").val(asesor.nama_asesor);
                $("#keabsahanAsesor").modal("toggle");
      })
  }

  $('#asesorForm').submit(function(e){
    e.preventDefault();
    var id = $('#idAsesor').val();
    var nama_asesor = $('#asesor').val();
    var surat_penghapusan = $('#surat_penghapusan')[0].files[0]; // get the selected file
    var _token = $('input[name=_token]').val();

    console.log("token csrf : " + _token)

    var formData = new FormData();
    formData.append('id', id);
    formData.append('nama_asesor', nama_asesor);
    formData.append('surat_penghapusan', surat_penghapusan);
    formData.append('_token', "{{ csrf_token() }}" );

    $.ajax({
        url: "{{ route('asesor.penghapusan') }}",
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        type: 'PUT',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response){
            $("#keabsahanAsesor").modal('toggle');
            $("#asesorForm")[0].reset();
        },
        error: function(xhr, status, error){
            console.log(xhr.responseText);
        }
    });
  });

  function importAsesor(id){
            $.get('/lsp/pencatatan/import-to-siki/'+id, function(data){
                alert(data.message);
            });
        }
</script>





@endpush