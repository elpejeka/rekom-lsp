<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Detail LSP {{$data->slug}}</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="{{url('/aset/css/icons/icomoon/styles.css')}}" rel="stylesheet" type="text/css">
	<link href="{{url('/aset/css/bootstrap.css')}}" rel="stylesheet" type="text/css">
	<link href="{{url('/aset/css/core.css')}}" rel="stylesheet" type="text/css">
	<link href="{{url('/aset/css/components.css')}}" rel="stylesheet" type="text/css">
	<link href="{{url('/aset/css/colors.css')}}" rel="stylesheet" type="text/css">
    <link href="{{url('aset/css/extras/animate.min.css')}}" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="{{url('/aset/js/plugins/loaders/pace.min.js')}}"></script>
	<script type="text/javascript" src="{{url('/aset/js/core/libraries/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{url('/aset/js/core/libraries/bootstrap.min.js')}}"></script>
	<script type="text/javascript" src="{{url('/aset/js/plugins/loaders/blockui.min.js')}}"></script>
	<script type="text/javascript" src="{{url('/aset/js/plugins/ui/nicescroll.min.js')}}"></script>
	<script type="text/javascript" src="{{url('/aset/js/plugins/ui/drilldown.js')}}"></script>
	<script type="text/javascript" src="{{url('/aset/js/plugins/ui/fab.min.js')}}"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="{{('/aset/js/plugins/tables/datatables/datatables.min.js')}}"></script>
	<script type="text/javascript" src="{{('/aset/js/plugins/forms/selects/select2.min.js')}}"></script>

	<script type="text/javascript" src="{{('/aset/js/core/app.js')}}"></script>
	<script type="text/javascript" src="{{('/aset/js/pages/datatables_basic.js')}}"></script>
	<!-- /theme JS files -->

</head>

<body class="navbar-bottom">

	<!-- Page header -->
	<div class="page-header page-header-inverse">

		<!-- Main navbar -->
		<div class="navbar navbar-inverse navbar-transparent">
			<div class="navbar-header">
				<a class="navbar-brand" href="index.html"><img src="{{url('aset/images/logo.png')}}" alt=""></a>

				<ul class="nav navbar-nav pull-right visible-xs-block">
					<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-grid3"></i></a></li>
				</ul>
			</div>

			<div class="navbar-collapse collapse" id="navbar-mobile">
				<p class="navbar-text"><span class="label bg-success-400"></span></p>
			</div>
		</div>
		<!-- /main navbar -->

        <div class="breadcrumb-line">
            <ul class="breadcrumb">
              <li><a href="{{route('list.lsp')}}"><i class="icon-home2 position-left"></i> Home</a></li>
              <li class="active">Detail {{$data->slug}}</li>
            </ul>
          </div>
        
	</div>
	<!-- /page header -->


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Basic datatable -->
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h6 class="panel-title">Detail LSP</h6>
                        <div class="heading-elements">
                            <ul class="icons-list">
                                <li><a data-action="collapse"></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="panel-body">
                        <div class="table-responsive mb-5">
                            <table class="table table-lg">
                                <thead>
                                    <tr>
                                        <td>Data</td>
                                        <td>Description</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Nama LSP</td>
                                        <td>{{$data->administrations->nama}}</td>
                                    </tr>
                                    <tr>

                                        <div class="breadcrumb-line">
                                        <td>Asosiasi Pembentuk</td>
                                        <td>
                                        <span class="badge badge-info">{{$item->administrasi->unsur->asosiasi}}</span>
                                        <span class="badge badge-info">{{$item->administrasi->unsur1->asosiasi}}</span>
                                        <span class="badge badge-info">{{$item->administrasi->unsur2->asosiasi}}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>{{$data->administrations->email}}</td>
                                    </tr>
                                    <tr>
                                        <td>Website</td>
                                        <td>{{$data->administrations->website}}</td>
                                    </tr>
                                    <tr>
                                        <td>No Telepon</td>
                                        <td>{{$data->administrations->no_telp}}</td>
                                    </tr>
                                    <tr>
                                        <td>Kategori</td>
                                        <td>{{$data->administrations->kategori_lsp}}</td>
                                    </tr>
                                    <tr>
                                        <td>Jenis LSP</td>
                                        <td>{{ucfirst($data->administrations->jenis_lsp)}}</td>
                                    </tr>
                                    <tr>
                                        <td>Kategori</td>
                                        <td>{{$data->administrations->kategori_lsp}}</td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td>{{$data->administrations->alamat}}</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>  
                        <div class="tabbable">
                            <ul class="nav nav-tabs nav-tabs-solid nav-justified">
                                {{-- <li class="active"><a href="#administrasi" data-toggle="tab">Administrasi</a></li> --}}
                                <li><a href="#sertifikasi-lsp" data-toggle="tab" data-toggle="tab">Skema LSP</a></li>   
                                <li><a href="#asesor" data-toggle="tab">Asesor</a></li>   
                                <li><a href="#tuk" data-toggle="tab">Tempat Uji Kompetensi</a></li>   
                            </ul>
        
                            <div class="tab-content">
                                {{-- <div class="tab-pane active" id="administrasi">
                                    <div class="col-md-12">
                                        <div class="panel panel-flat panel-collapsed">
                                            <div class="panel-heading">
                                                <h5 class="panel-title">
                                                    Administrasi
                                                </h5>
                                                <div class="heading-elements">
                                                    <ul class="icons-list">
                                                        <li><a data-action="collapse"></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <div class="content-group-lg">
                                                            <h6 class="text-semibold">#1</h6>
                                                            <p class="content-group">Surat Permohonan</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="content-group-lg">
                                                            <a href="{{Storage::url($data->upload_persyaratan)}}" target="_blank" type="button" name="btn_cek_13" 
                                                                class="open-delete btn btn-primary btn-labeled btn-rounded">
                                                                <b><i class="icon-file-check"></i></b> Softcopy</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        
                                    </div>
                                </div> --}}
        
                                <div class="tab-pane active" id="sertifikasi-lsp">
                                    <div class="col-md-12">
                                        <table class="table datatable-basic">
                                            <thead>
                                              <tr>
                                                <th>No</th>
                                                <th>Kode Skema</th>
                                                <th>Nama Skema</th>
                                                <th>Jabatan Kerja</th>
                                                <th>Klasifikasi</th>
                                                <th>Subklasifikasi</th>
                                                <th>Kualifikasi</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                $no = 1;
                                            @endphp
                                                @foreach ($data->skema as $item)   
                                              <tr>
                                                <td>{{$no++}}</td>
                                                <td>{{$item->kode_skema}}</td>
                                                <td>{{$item->nama_skema}}</td>
                                                <td>{{$item->jabker}}</td>
                                                <td>{{$item->klasifikasi}}</td>
                                                <td>{{$item->sub_klasifikasi}}</td>
                                                <td>{{$item->kualifikasi}}</td>
                                              </tr>
                                              @endforeach
                                            </tbody>
                                          </table>
                                    </div>
                     
                                </div>
        
                                <div class="tab-pane" id="asesor">
                                    <table class="table datatable-basic">
                                        <thead>
                                          <tr>
                                            <th>No</th>
                                            <th>Nama Asesor</th>
                                            <th>Alamat</th>
                                            <th>Status Asesor</th>
                                            <th>Nomor Registrasi Asesor</th>
                                            <th class="text-center">Actions</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                          @foreach ($data->asesor as $item)
                                          <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$item->nama_asesor}}</td>
                                            <td>{{$item->alamat}}</td>
                                            <td><span class="label label-success">{{$item->status_asesor}}</span></td>
                                            <td>{{$item->no_registrasi_asesor}}</td>
                                            <td class="text-center">
                                              <a href="#mymodal"
                                              data-remote="{{route('show.detail', $item->slug)}}" 
                                              data-toggle="modal"
                                              data-target="#mymodal"
                                              data-title="Detail Asesor {{$item->nama_asesor}}"
                                              class="btn btn-sm btn-info">
                                          <i class="icon-eye2"></i></a>
                                            </td>
                                          </tr> 
                                          @endforeach
                                        </tbody>
                                      </table>
                                </div>
        
                                <div class="tab-pane" id="tuk">
                                    <div class="col-md-12">
                                        <table class="table datatable-basic">
                                            <thead>
                                              <tr>
                                                <th>No</th>
                                                <th>Kode TUK</th>
                                                <th>Nama TUK</th>
                                                <th>Jenis TUK</th>
                                                <th>Alamat</th>
                                                <th>Dokumen</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              @foreach ($data->tuk as $item)
                                                  <tr>
                                                    <td>1</td>
                                                    <td>{{$item->kode_tuk}}</td>
                                                    <td>{{$item->nama_tuk}}</td>
                                                    <td>{{$item->jenis_tuk}}</td>
                                                    <td>{{$item->alamat}}</td>
                                                    <td>
                                                      <a href="{{Storage::url($item->upload_persyaratan)}}" target="_blank" type="button" name="btn_cek_13" style="float: right" 
                                                        class="open-delete btn btn-primary btn-labeled btn-rounded">
                                                        <b><i class="icon-file-check"></i></b> Softcopy</a>
                                                    </td>
                                                  </tr>
                                              @endforeach
                                            </tbody>
                                          </table>
                                    </div>
                                  
                                </div>
        
        
                                </div>
                        </div>
                    
                    </div>
              
        
                    
                </div>
				<!-- /basic datatable -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->


	<!-- Footer -->
	<div class="navbar navbar-default navbar-fixed-bottom footer">
		<ul class="nav navbar-nav visible-xs-block">
			<li><a class="text-center collapsed" data-toggle="collapse" data-target="#footer"><i class="icon-circle-up2"></i></a></li>
		</ul>

		<div class="navbar-collapse collapse" id="footer">
			<div class="navbar-text">
                &copy; 2021. <a href="#" class="navbar-link">Lembaga Pengembangan Jasa Konstruksi</a>
			</div>

		</div>
	</div>
	<!-- /footer -->

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

    <script>
        jQuery(document).ready(function($){
            $('#mymodal').on('show.bs.modal', function(e){
                var button = $(e.relatedTarget);
                var modal = $(this);
                modal.find('.modal-body').load(button.data("remote"));
                modal.find('.modal-title').html(button.data("title"));
            });
        });
      </script>
      
</body>
</html>
