<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Daftar Lembaga Sertifikasi Profesi</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="{{secure_url('/public/aset/css/icons/icomoon/styles.css')}}" rel="stylesheet" type="text/css">
	<link href="{{secure_url('/public/aset/css/bootstrap.css')}}" rel="stylesheet" type="text/css">
	<link href="{{secure_url('/public/aset/css/core.css')}}" rel="stylesheet" type="text/css">
	<link href="{{secure_url('/public/aset/css/components.css')}}" rel="stylesheet" type="text/css">
	<link href="{{secure_url('/public/aset/css/colors.css')}}" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="{{secure_url('/public/aset/js/plugins/loaders/pace.min.js')}}"></script>
	<script type="text/javascript" src="{{secure_url('/public/aset/js/core/libraries/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{secure_url('/public/aset/js/core/libraries/bootstrap.min.js')}}"></script>
	<script type="text/javascript" src="{{secure_url('/public/aset/js/plugins/loaders/blockui.min.js')}}"></script>
	<script type="text/javascript" src="{{secure_url('/public/aset/js/plugins/ui/nicescroll.min.js')}}"></script>
	<script type="text/javascript" src="{{secure_url('/public/aset/js/plugins/ui/drilldown.js')}}"></script>
	<script type="text/javascript" src="{{secure_url('/public/aset/js/plugins/ui/fab.min.js')}}"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="{{secure_url('/public/aset/js/plugins/tables/datatables/datatables.min.js')}}"></script>
	<script type="text/javascript" src="{{secure_url('/public/aset/js/plugins/forms/selects/select2.min.js')}}"></script>

	<script type="text/javascript" src="{{secure_url('/public/aset/js/core/app.js')}}"></script>
	<script type="text/javascript" src="{{secure_url('/public/aset/js/pages/datatables_basic.js')}}"></script>
	<!-- /theme JS files -->

</head>

<body class="navbar-bottom">

	<!-- Page header -->
	<div class="page-header page-header-inverse">

		<!-- Main navbar -->
		<div class="navbar navbar-inverse navbar-transparent">
			<div class="navbar-header">
				<a class="navbar-brand" href="{{route('list.lsp')}}"><img src="{{secure_url('/public/aset/images/logo.png')}}" alt=""></a>

				<ul class="nav navbar-nav pull-right visible-xs-block">
					<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-grid3"></i></a></li>
				</ul>
			</div>

			<div class="navbar-collapse collapse" id="navbar-mobile">
				<p class="navbar-text"><span class="label bg-success-400"></span></p>

			</div>
		</div>
		<!-- /main navbar -->

			<!-- Page header content -->
				<div class="breadcrumb-line">
				  <ul class="breadcrumb">
					<li><a href="{{route('list.lsp')}}"><i class="icon-home2 position-left"></i> Home</a></li>
					<li class="active">Daftar LSP</li>
				  </ul>
				</div>
			<!-- /page header content -->
		<!-- Second navbar -->
		<!-- /second navbar -->

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
						<h5 class="panel-title">Daftar LSP</h5>
						<div class="heading-elements">
							<ul class="icons-list">
		                		<li><a data-action="collapse"></a></li>
		                		<li><a data-action="reload"></a></li>
		                	</ul>
	                	</div>
					</div>

					<div class="panel-body">
					    Daftar Semua LSP yang tercatat di sistem LPJK. </strong>
					</div>

					<table class="table datatable-basic">
						<thead>
							<tr>
                                <th>No</th>
								<th>Nama LSP</th>
								<th>Jumlah Skema</th>
								<th>Jumlah Asesor</th>
								<th>Jumlah TUK</th>
                                <th>Jenis LSP</th>
                                <th>No SK</th>
								<th class="text-nowrap">No Lisensi</th>
								<th>No Pencatatan</th>
								<th class="text-center">Actions</th>
							</tr>
						</thead>
						<tbody>
                            @php
                            $no = 1;
                        @endphp
                      @foreach ($permohonan as $item)

						<tr>
							<td>{{$no++}}</td>
							<td>{{$item->administrations->nama}}
							<td>{{$item->jumlah_skema}}</td>
							<td>{{count($item->asesor)}}</td>
							<td>{{count($item->tuk)}}</td>
							<td>{{$item->administrations->jenis_lsp}}</td>
							<td>{{$item->no_sk}}</td>
							<td class="text-nowrap">{{$item->no_lisensi}}</td>
							<td>{{$item->no_pencatatan}}</td>
							<td>  
								<a href="{{route('lsp', $item->slug)}}" class="btn btn-primary btn-sm">Detail</a>
							</td>
						  </tr> 
                      @endforeach
						</tbody>
					</table>
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

</body>
</html>
