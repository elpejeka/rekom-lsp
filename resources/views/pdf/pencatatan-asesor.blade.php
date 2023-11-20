<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Surat Tanda Registrasi</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet">
	{{-- <link rel="stylesheet" href="{{url('assets/css/bootstrap.css')}}" rel="stylesheet')}}" > --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body background="white">
    <br/>
    <br/>
    <br/>
    <p class="h6 text-center">SURAT TANDA PENCATATAN <br/>
        ASESOR KOMPETENSI JASA KONSTRUKSI</p>

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
            <td width="220px" height="40px">Nama LSP</td>
            <td width="20px" class="text-center">:</td>
            <td width="400px">{{$data->nama_lsp}}</td>
        </tr>
    </table>

    <p align="left"  style="margin-left:25px; margin-bottom:20px; font-family:arial; font-size:18px; ">Sertifikat Kompetensi Kerja yang dimiliki</p>
    <table border="1" align="center">
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
            <td width="220px" height="40px">Kualifikasi</td>
            <td width="20px" class="text-center">:</td>
            <td width="400px"></td>
        </tr>
        <tr>
            <td width="220px" height="40px">Jenjang</td>
            <td width="20px" class="text-center">:</td>
            <td width="400px"></td>
        </tr>
    </table>
    <div class="row mt-5">
        <div class="col-md-10" style="margin-left: 25px">
            <p style="margin-right: 25px;" align="left">
                Jakarta , {{date("Y-m-d", strtotime($data->created_at))}} <br/>
                Lembaga Pengembangan Jasa Konstruksi
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10" style="margin-left: 25px;">
            <img src="data:image/png;base64, {!! base64_encode(QrCode::size(200)->format('svg')
                                            ->color(3, 4, 94)
                                            ->style('round', 0.9)
                                            ->eyeColor(0, 235, 155, 0, 0, 0, 0)->errorCorrection('H')
                                            ->generate("https://lisensijakon.pu.go.id/lsp/detail-pencatatan-asesor/". $data->asesor_id)) !!}">
        </div>
    </div>

</body>
</html>
