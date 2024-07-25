<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Lembaga Sertifikasi Profesi</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  @include('includes.styles')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
@include('includes.admin.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
 @include('includes.admin.sidebar')

  <!-- Content Wrapper. Contains page content -->
 @yield('contents')
  <!-- /.content-wrapper -->
  @include('includes.admin.footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
@include('includes.scripts')
@include('sweetalert::alert')
</body>
</html>
