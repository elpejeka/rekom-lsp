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
<form class="form-horizontal" action="{{route('pencatatan.skema.store')}}" method="POST" enctype="multipart/form-data">
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
              <label class="col-lg-3 control-label">Kode Skema</label>
              <div class="col-lg-9">
                <input type="text" class="form-control @error('kode_skema') is-invalid @enderror" name="kode_skema" required>
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
                        <option value="">Pilih Skema Sertifikasi</option>   
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
                <input type="text" name="jabker" id="jabker" class="form-control" readonly/>
                <input type="hidden" name="nama_skema" id="skema" class="form-control"/>
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
                <input type="text" name="klasifikasi" id="klasifikasi" class="form-control" readonly />
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
                <input type="text" name="sub_klasifikasi" id="subklasifikasi" class="form-control" readonly />
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
                <input type="text" name="kualifikasi" id="kualifikasi" class="form-control" readonly />
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
                    <input type="text" name="jenjang" id="jenjang" class="form-control" readonly />
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
                      <input type="number" class="form-control @error('jumlah_unit') is-invalid @enderror" name="jumlah_unit" min="0" required>
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
                    placeholder="SKKNI/SKK Khusus/Standar Internasional" id="acuan" readonly>
              </div>
              @error('acuan_skema')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
            </div>

            <div class="form-group">
              <label class="col-lg-3 control-label">Upload Skema Sertifikasi</label>
                <div class="col-lg-9">
                    <input name="upload_persyaratan" type="file" class="file-input @error('upload_persyaratan') is-invalid @enderror"
                    data-show-caption="false" data-show-upload="false" data-browse-class="btn btn-primary btn-xs" data-remove-class="btn btn-default btn-xs" required>
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

<div class="panel panel-flat">
  <div class="panel-heading">
    <h5 class="panel-title">Data Skema Sertifikasi LSP</h5>
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
        <th>Kode Skema</th>
        <th>Nama Skema</th>
        <th>Jabatan Kerja</th>
        <th>Klasifikasi</th>
        <th>Subklasifikasi</th>
        <th>Kualifikasi</th>
        <th>Jenjang</th>
        <th>Jumlah Unit</th>
        <th>Acuan Skema</th>
        <th>Dokumen</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($skema as $skema)
      <tr>
        <td>#</td>
        <td>{{$skema->kode_skema}}</td>
        <td>{{$skema->nama_skema}}</td>
        <td>{{$skema->jabker}}</td>
        <td>{{$skema->klasifikasi}}</td>
        <td>{{$skema->sub_klasifikasi}}</td>
        <td>{{$skema->kualifikasi}}</td>
        <td>{{$skema->jenjang}}</td>
        <td>{{$skema->jumlah_unit}}</td>
        <td>{{$skema->acuan_skema}}</td>
        <td>
          <a href="{{asset('laravel/storage/app/public/'. $skema->upload_persyaratan)}}" target="_blank" type="button" name="btn_cek_13" 
              class="open-delete btn btn-primary btn-labeled btn-rounded">
              <b><i class="icon-file-check"></i></b> Softcopy</a>
            </td>
        <td class="text-center">
          <a href="{{route('pencatatan.skema.edit', $skema->id)}}" class="btn btn-sm btn-primary"><i class="icon-pencil"></i></a>
          <form action="{{route('pencatatan.skema.delete', $skema->id)}}" method="post" class="d-inline mt-2">
            @csrf
            @method('delete')
          <button class="btn btn-danger btn-sm mt-5"><i class="icon-trash"></i></button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection

@push('addon-script')
    <script>
      $('#nama_skema').on('change', function(){
          var id = $(this).find('option').filter(':selected').val();
          
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