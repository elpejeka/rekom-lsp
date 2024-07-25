@extends('layouts.app')
@section('page-header')
<div class="page-header page-header-default">
  <div class="page-header-content">
    <div class="page-title">
      <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Ruang Lingkup LSP</h4>
    </div>
  </div>

  <div class="breadcrumb-line">
    <ul class="breadcrumb">
      <li><a href="{{route('home')}}"><i class="icon-home2 position-left"></i> Home</a></li>
      <li class="active">Ruang Lingkup LSP</li>
    </ul>
  </div>
</div>
@endsection
@section('content')
<form class="form-horizontal" action="{{route('pencatatan.skema.update', $data->id)}}" method="POST" enctype="multipart/form-data">
    @method('PUT')
  @csrf
  <div class="panel panel-flat">
    <div class="panel-heading">
      <h5 class="panel-title">Ruang Lingkup LSP</h5>
      <div class="heading-elements">
        <ul class="icons-list">
                  <li><a data-action="collapse"></a></li>
                </ul>
              </div>
    </div>

    <div class="panel-body">
      <div class="row">
        <div class="col-md-12">
          <legend class="text-semibold"><i class="icon-reading position-left"></i> Ruang Lingkup LSP</legend>
        </div>
        <div class="col-md-6">
          <fieldset>
            
            <div class="form-group">
              <label class="col-lg-3 control-label">Kode Skema</label>
              <div class="col-lg-9">
                <input type="hidden" class="form-control @error('pencatatan_id') is-invalid @enderror" name="pencatatan_id" value={{$data->pencatatan_id}}>
                <input type="text" class="form-control @error('kode_skema') is-invalid @enderror" name="kode_skema" value={{$data->kode_skema}} required>
              </div>
              @error('kode_skema')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
            </div>

            <div class="form-group">
              <label class="col-lg-3 control-label">Nama Skema</label>
              <div class="col-lg-9">
                <select class="select-search" id="nama_skema">
                    <optgroup label="RUANG LINGKUP">
                        <option value="{{$data->nama_skema}}">-- {{$data->nama_skema}}</option>   
                      @foreach ($items as $jabker)
                        <option value="{{$jabker->id}}">{{$jabker->jabatan_kerja}}</option>
                      @endforeach
                    </optgroup>
                </select>
              </div>
              @error('nama_skema')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
            </div>

            <div class="form-group">
              <label class="col-lg-3 control-label">Jabatan Kerja</label>
              <div class="col-lg-9">
                  <input type="text" name="jabker" id="jabker" class="form-control" value="{{$data->jabker}}" readonly/>
                  <input type="hidden" name="nama_skema" id="skema" class="form-control" value="{{$data->nama_skema}}" />
              </div>
              @error('jabker')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
            </div>

            <div class="form-group">
              <label class="col-lg-3 control-label">Klasifikasi</label>
              <div class="col-lg-9">
                <input type="text" name="klasifikasi" id="klasifikasi" class="form-control" value="{{$data->klasifikasi}}" readonly />
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
                <input type="text" name="sub_klasifikasi" id="subklasifikasi" class="form-control" value="{{$data->sub_klasifikasi}}" readonly />
              </div>
              @error('sub_klasifikasi')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="form-group">
              <label class="col-lg-3 control-label">Kualifikasi</label>
              <div class="col-lg-9">
                <input type="text" name="kualifikasi" id="kualifikasi" class="form-control" value="{{$data->kualifikasi}}" readonly />
              </div>
              @error('kualifikasi')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
            </div>

            <div class="form-group">
              <label class="col-lg-3 control-label">Jenjang</label>
                  <div class="col-lg-9">
                    <input type="text" name="jenjang" id="jenjang" class="form-control" value="{{$data->jenjang}}" readonly />
                  </div>
                  @error('jumlah_unit')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
          </div>

          <div class="form-group">
              <label class="col-lg-3 control-label">Jumlah Unit Kompetensi</label>
                  <div class="col-lg-9">
                      <input type="number" class="form-control @error('jumlah_unit') is-invalid @enderror" name="jumlah_unit" min="0" value="{{$data->jumlah_unit}}" required>
                  </div>
                  @error('jumlah_unit')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
          </div>

          <div class="form-group">
            <label class="col-lg-3 control-label">Acuan Skema</label>
              <div class="col-lg-9">
                <input class="form-control @error('acuan_skema') is-invalid @enderror"  name="acuan_skema" type="text" 
                placeholder="SKKNI/SKK Khusus/Standar Internasional" id="acuan" value="{{$data->acuan_skema}}" readonly>
              </div>
              @error('acuan_skema')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
            </div>

            <div class="form-group">
              <label class="col-lg-3 control-label">Upload Acuan Skema</label>
                <div class="col-lg-9">
                    <input name="upload_persyaratan" type="file" class="file-input @error('upload_persyaratan') is-invalid @enderror"
                    data-show-caption="false" data-show-upload="false" data-browse-class="btn btn-primary btn-xs" data-remove-class="btn btn-default btn-xs">
                    <span class="help-block">
                      Accepted formats: pdf, zip, rar Max file size 50Mb
                    </span>
                    <div class="progress" style="display:none;">
                      <div id="progress-bar-1" class="progress-bar progress-bar-success progress-bar-striped active " role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
                        20%
                      </div>
                    </div>
                </div>
                
  
                @error('upload_persyaratan')
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
      $('#nama_skema').on('change', function(){
          var id = $(this).find('option').filter(':selected').val();
          
          console.log(id)

          $.ajax({
            url : '/reference/jabker/'+id,
            type : 'GET',
            success:function(res){
              var data = res.data

              $('#klasifikasi').val(data.klasifikasi)
              $('#subklasifikasi').val(data.subklasifikasi)
              $('#kualifikasi').val(data.kualifikasi)
              $('#jabker').val(data.jabatan_kerja)
              $('#skema').val(data.jabatan_kerja)
              $('#jenjang').val(data.jenjang)
              $('#acuan').val(data.acuan)
            }
          })
      })
    </script>
@endpush