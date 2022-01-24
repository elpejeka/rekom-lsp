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
<body class="login-container">

    @yield('content')

    
@include('includes.scripts')
@include('sweetalert::alert')
</body>
</html>
