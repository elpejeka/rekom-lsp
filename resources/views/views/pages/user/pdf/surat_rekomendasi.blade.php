<!DOCTYPE html>
<html>
<head>
	<title>Berita Acara Hasil Verifikasi dan Validasi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        #judul{
            text-align:center;
        }

        #halaman{
            width: auto; 
            height: auto; 
        }

    </style>
</head>
<body>
    <div class="container">
        <div id=halaman style="margin-top:80px;">
        <br/>
        </br>
            <div class="row">
                <div class="col-md-6">
                <table>
                    <tr>
                        <td>Nomor</td>
                        <td>:</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Sifat</td>
                        <td>:</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Lampiran</td>
                        <td>:</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Hal</td>
                        <td>:</td>
                        <td><b> Rekomendasi Lisensi LSP bidang Jasa Konstruksi</b></td>
                    </tr>
                </table>
                </div>
                <div class="col-md-6">
                    <div style="width: 50%; text-align: center; float: right;">Jakarta, {{$tgl}}</div>
                </div>
            </div>
            <br/>
            <p>Menindaklanjuti Surat Permohonan Rekomendasi Lisensi LSP nomor
                __________ pada tanggal ___________ yang disampaikan oleh LSP ___________,
                bersama ini kami sampaikan bahwa berdasarkan hasil pemeriksaan serta
                verifikasi dan validasi yang telah dilakukan oleh LPJK, maka diberikan
                rekomendasi lisensi LSP di bidang Jasa Konstruksi dengan
                mempertimbangkan klasifikasi dan subklasifikasi Tenaga Kerja Konstruksi,
                organisasi atau lembaga pembentuknya, serta kualifikasi Tenaga Kerja
                Konstruksi dengan rincian sebagai berikut:</p>
                <br/>
                <table style="margin-left: 30px; margin-right: 30px;">
                    <tr>
                        <td >Nama LSP</td>
                        <td>:</td>
                        <td>{{$data->nama_lsp}}</td>
                    </tr>
                    <tr>
                        <td >Unsur Pembentuk LSP </td>
                        <td>:</td>
                        <td >{{$data->administrasi->unsur_pembentuk}}</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td>{{$data->administrasi->alamat}}</td>
                    </tr>
                </table>    

            <p>
                Rekomendasi Lisensi LSP sesuai dengan ruang lingkup lisensi sebagai
                berikut:
            </p>

            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Skema Sertifikasi</th>
                    <th scope="col">Klasifikasi</th>
                    <th scope="col">Subklasifikasi</th>
                    <th scope="col">Kualifikasi</th>
                  </tr>
                </thead>
                <tbody>
                    <?php $no=0 ?>
                    @foreach ($data->sertifikat_lsp as $item)   
                    <?php $no++ ?>
                     <tr>
                         <td>{{$no}}</td>
                         <td>{{$item->nama_skema}}</td>
                         <td>{{$item->klasifikasi}}</td>
                         <td>{{$item->sub_klasifikasi}}</td>
                         <td>{{$item->kualifikasi}}</td>
                     </tr>
                 @endforeach
                </tbody>
              </table>

            <br/>
            <p>Demikian surat ini kami sampaikan, atas perhatiannya diucapkan
                terima kasih.</p>

                <br/>
    
            <div style="width: 50%; text-align: center; float: right;">Jakarta, {{$tgl}}<br>
                Ketua LPJK<br/><br/><br/><br/>
            <u>Ir. Taufik Widjoyono M.Sc</u></div>
    
        </div>
    </div> 

</body>
</html>