<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lembaga Sertifikasi Profesi</title>

    <!-- Global stylesheets -->
    @stack('prepend-style')
    @include('includes.styles')
    @stack('addon-style')
	<!-- /global stylesheets -->
    
</head>

<body class="sidebar-main-hidden">

	<!-- Main navbar -->
	@include('includes.user.navbar');
	<!-- /main navbar -->

	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Page header -->
			@yield('page-header')
				<!-- /page header -->

				<!-- Content area -->
				<div class="content">

					@yield('content')
					<!-- Footer -->
					@include('includes.user.footer')
					<!-- /footer -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->
	@stack('prepend-script')
    @include('includes.scripts')
	@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
	@stack('addon-script')
</body>
</html>
