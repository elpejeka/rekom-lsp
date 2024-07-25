<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Pencatatan Asesor</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet">
	{{-- <link rel="stylesheet" href="{{url('assets/css/bootstrap.css')}}" rel="stylesheet')}}" > --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body background="white">
    <br/>
    <br/>
    <br/>
    <p class="h6 text-center">DETAIL PENCATATAN ASESOR</p>

    <table border="1" align="center">
        <tr>
            <td width="220px" height="40px">Nama</td>
            <td width="20px" class="text-center">:</td>
            <td width="400px">{{$data->nama_asesor}}</td>
        </tr>
        <tr>
            <td width="220px" height="40px">Alamat</td>
            <td width="20px" class="text-center">:</td>
            <td width="400px">{{$data->alamat}}</td>
        </tr>
        <tr>
            <td width="220px" height="40px">No Sertifikat Asesor</td>
            <td width="20px" class="text-center">:</td>
            <td width="400px">{{$data->no_sertifikat}}</td>
        </tr>
        <tr>
            <td width="220px" height="40px">No Registrasi LPJK</td>
            <td width="20px" class="text-center">:</td>
            <td width="400px">{{$data->no_sertifikat_asesor}}</td>
        </tr>
        <tr>
            <td width="220px" height="40px">Klasifikasi</td>
            <td width="20px" class="text-center">:</td>
            <td width="400px">{{$data->klasifikasi}}</td>
        </tr>
        <tr>
            <td width="220px" height="40px">Subklasifikasi</td>
            <td width="20px" class="text-center">:</td>
            <td width="400px">{{$data->subklasifikasi}}</td>
        </tr>
        <tr>
            <td width="220px" height="40px">Tanggal Pencatatan</td>
            <td width="20px" class="text-center">:</td>
            <td width="400px">{{date("Y-m-d", strtotime($data->approve_at))}}</td>
        </tr>
    </table>
</body>
</html>
