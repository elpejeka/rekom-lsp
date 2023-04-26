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
    <p class="h6 text-center">SURAT TANDA REGISTRASI <br/>
        LEMBAGA PENDIDIKAN DAN PELATIHAN KERJA</p>  
    <p align="left"  style="margin-left:25px; font-family:arial; font-size:18px">Yang bertandatangan di bawah ini, Ketua Lembaga Pengembangan Jasa 
        Konstruksi, <br/> menerangkan bahwa:</p>
    <table border="1" align="center">
        <tr>
            <td width="220px" height="40px">Nama LPPK</td>
            <td width="20px" class="text-center">:</td>
            <td width="400px">{{ucfirst(Auth::user()->name)}}</td>
        </tr>
        <tr>
            <td width="220px" height="40px">Jenis LPPK</td>
            <td width="20px" class="text-center">:</td>
            <td width="400px">{{ucfirst(Auth::user()->jenis)}}</td>
        </tr>
        <tr>
            <td width="220px" height="40px">Tahun Berdiri</td>
            <td width="20px" class="text-center">:</td>
            <td width="400px">{{$informasi->tahun_berdiri}}</td>
        </tr>
        <tr>
            <td width="220px" height="40px">Alamat</td>
            <td width="20px" class="text-center">:</td>
            <td width="400px">{{ucfirst($informasi->alamat)}}</td>
        </tr>
        <tr>
            <td width="220px" height="40px">Kode Pos</td>
            <td width="20px" class="text-center">:</td>
            <td width="400px">{{$informasi->kode_pos}}</td>
        </tr>
        <tr>
            <td width="220px" height="40px">Nomor Telepon</td>
            <td width="20px" class="text-center">:</td>
            <td width="400px">{{$informasi->telp}}</td>
        </tr>
        <tr>
            <td width="220px" height="40px">Alamat Email</td>
            <td width="20px" class="text-center">:</td>
            <td width="400px">{{$informasi->email}}</td>
        </tr>
        <tr>
            <td width="220px" height="40px">Status</td>
            <td width="20px" class="text-center">:</td>
            <td width="400px" style="font-weight: bold;">Teregistrasi</td>
        </tr>
        <tr>
            <td width="220px" height="40px">Nomor Registrasi</td>
            <td width="20px" class="text-center">:</td>
            <td width="400px">{{ucfirst(Auth::user()->nomor_registrasi)}}</td>
        </tr>
    </table>
    <p align="left" style="margin-left:25px; font-family: Arial; font-size:18px">Surat Tanda Registrasi ini dibuat untuk digunakan sebagaimana mestinya.
        Apabila di <br/> kemudian hari terjadi sesuatu hal yang tidak benar, maka
        sepenuhnya menjadi tanggung jawab pemohon. </p>
    <div class="row" style="margin-top:25px">
        <div class="col-md-10" style="margin-left: 25px; margin-top:30px">
            <img src="data:image/png;base64, {!! base64_encode(QrCode::size(200)->format('svg')
                                            ->color(3, 4, 94)
                                            ->style('round', 0.9)
                                            ->eyeColor(0, 235, 155, 0, 0, 0, 0)->errorCorrection('H')
                                            ->generate(Request::url())) !!}">
        </div>
        <div class="col-md-2" style="margin-left: 350px">
            <p style="margin-right: 25px;" align="left">
                Ditetapkan di Jakarta<br/>
                Pada Tanggal, {{$tgl}} <br/>
                Mengetahui, <br/><br/><br/><br/>
                Ketua LPJK
            </p>
        </div>
    </div>
</body>
</html>