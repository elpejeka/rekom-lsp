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
<form class="form-horizontal" action="{{route('pencatatan.asesor.update', $data->id)}}" method="POST" enctype="multipart/form-data">
    @method('PUT')
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
                        <option value="{{$item->id}}">{{$item->permohonan}}</option>
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
                <input type="text" class="form-control @error('nama_asesor') is-invalid @enderror" name="nama_asesor" value="{{$data->nama_asesor}}" required>
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
                    <input type="text" class="form-control @error('nik') is-invalid @enderror" name="nik" value="{{$data->nik}}" required>
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
                    <input type="text" class="form-control @error('npwp') is-invalid @enderror" name="npwp" value="{{$data->npwp}}" required>
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
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$data->email}}" required>
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
                    <input type="number" class="form-control @error('no_telpon') is-invalid @enderror" name="no_telpon" value="{{$data->no_telpon}}" required>
                    <input type="hidden" class="form-control @error('no_registrasi_asesor') is-invalid @enderror" name="no_registrasi_asesor" value="{{$data->no_registrasi_asesor}}">
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
                @foreach ($propinsi as $prov)
                  <option value="{{$prov->id_propinsi_dagri}}" @if ($prov->id_propinsi_dagri == $data->provinsi)
                      selected
                  @endif>{{$prov->Nama}}</option>
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
                  <option value="{{$data->kab_kota}}">{{$data->kabkota == null ? $data->kabkota->nama_kabupaten_dagri : 'pilih kabupaten/kota'}}</option>
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
                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{$data->alamat}}" required>
                  </div>
                  @error('alamat')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>

            
            <div class="form-group">
              <label class="col-lg-3 control-label">Tanggal Lahir</label>
                  <div class="col-lg-9">
                    <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror" name="tgl_lahir" value="{{$data->tgl_lahir}}" required>
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
                    <input type="text" class="form-control @error('pendidikan') is-invalid @enderror" name="pendidikan" value="{{$data->pendidikan}}" required>
                  </div>
                  @error('pendidikan')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>

            <div class="form-group">
              <label class="col-lg-3 control-label">Status Asesor</label>
              <div class="col-lg-9">
                <select class="select-search" name="status_asesor">
                        <option value="{{$data->status_asesor}}">-- {{$data->status_asesor}}</td> 
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
        
            
          </fieldset>
        </div>
      </div>


      <div class="text-right">
        <button type="submit" class="btn btn-primary">Submit<i class="icon-arrow-right14 position-right"></i></button>
      </div>
    </div>

  </div>
</form>
@endsection

@push('addon-script')
<script>
  $('#provinsi').change(function(){
    var kode = $(this).val();
    console.log(kode)
    if(kode){
      $.ajax({
        type : "GET",
        url : "/lsp/kab_kota?id_propinsi_dagri="+kode,
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
</script>

@endpush