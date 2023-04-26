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
            <h5 id=judul>Berita Acara Hasil Verifikasi dan Validasi</h5>
            <h5 id=judul>Pemberian Rekomendasi Lisensi LSP</h5>
        <br/>
        </br>
            <table style="margin-left: 30px; margin-right: 30px;">
                <tr>
                    <td >Nama LSP</td>
                    <td>:</td>
                    <td>{{$data->nama_lsp}}</td>
                </tr>
                <tr>
                    <td >Nomor Surat Permohonan Rekomendasi </td>
                    <td>:</td>
                    <td >um.01.02-LK/Rekomendasi-Lsp/{{$data->id}}</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td>{{$data->administrasi->alamat}}</td>
                </tr>
            </table>
            <br/>
    
            <p>Berdasarkan pemeriksaan terhadap data dokumen permohonan dari Pemohon Rekomendasi 
                Lisensi Baru/Perpanjangan/Penambahan Ruang
                Lingkup*) LSP yang dilaksanakan di Jakarta pada tanggal
                {{date('d', strtotime($data->updated_at)) }} bulan {{date('F', strtotime($data->updated_at)) }} tahun {{date('Y', strtotime($data->updated_at)) }} diusulkan untuk:</p>

            <p style="text-align:center; font-weight:bold" >
                diberikan / <strike>ditolak</strike> *)
            </p>

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
    
            <div style="width: 50%; text-align: center; float: right;">Jakarta, {{$tgl}}<br>
                Ketua Sekretariat
                Tim Pemberian<br/>
                Rekomendasi LSP dan<br/>
                Pencatatan LSP Terlisensi</div><br><br><br><br><br></div><br></div>
            <div style="width: 60%; text-align: center; float: right;">(..........................)</div>
    
        </div>
    </div> 

</body>
</html>