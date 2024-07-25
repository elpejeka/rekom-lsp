<!DOCTYPE html>
<html>
<head>
	<title>VERIFIKASI VALIDASI DOKUMEN PERSYARATAN</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

	<div class="container" style="margin-top:80px">
		<center>
			<h5>DAFTAR PERIKSA VERIFIKASI DAN VALIDASI<br/>
                PERMOHONAN REKOMENDASI LISENSI LSP</h5>
        </center>
        <br/>
        
		<br/>
		<table class='table table-bordered' style="font-size: 12px">
			<thead align="center">
				<tr>
					<th rowspan="2" style="text-align">No</th>
					<th rowspan="2">Poin Verifikasi dan Validasi</th>
                    <th colspan="2">Verifikasi</th>
                    <th colspan="2">Validasi</th>
                </tr>
                <tr>
                    <th>Ada</th>
                    <th>Tidak Ada</th>
                    <th>Sesuai</th>
                    <th>Tidak Sesuai</th>
                </tr>
			</thead>
			<tbody>
                <tr>
                    <td align="center">1</td>
                    <td>Kesesuaian dan keabsahan surat
                        keputusan Menteri Pekerjaan Umum
                        dan Perumahan Rakyat tentang
                        penetapan akreditasi asosiasi profesi
                        yang masih berlaku</td>
                        @if($data->verifikasi_asosiasi == 1)
                        <td align="center">V</td>
                        <td></td>
                        @else
                        <td></td>
                        <td align="center">V</td>
                        @endif
                        @if($data->validasi_asosiasi == 1)
                        <td align="center">V</td>
                        <td></td>
                        @else
                        <td></td>
                        <td align="center">V</td>
                        @endif
                </tr>
                <tr>
                    <td align="center"  >2</td>
                    <td>a) Pemeriksaan atas kesesuaian
                        klasifikasi, subklasifikasi, dan
                        kualifikasi skema sertifikasi dengan
                        kategori asosiasi atau asosiasi asosiasi pembentuknya, apabila
                        asosiasi profesi terakreditasi
                        dibentuk sebelum berlakunya
                        Peraturan Pemerintah Nomor 14
                        Tahun 2021 tentang Perubahan
                        Atas Peraturan Pemerintah Nomor
                        22 Tahun 2020 Tentang Peraturan
                        Pelaksanaan Undang-Undang
                        Nomor 2 Tahun 2017 Tentang Jasa
                        Konstruksi; atau <br/>
                        <br/>
                        b) Pemeriksaan atas kesesuaian
                        klasifikasi, subklasifikasi, dan
                        kualifikasi skema sertifikasi dengan
                        klasifikasi asosiasi atau asosia siasosiasi pembentuknya, apabila
asosiasi profesi terakreditasi
dibentuk setelah berlakunya
Peraturan Pemerintah Nomor 14
Tahun 2021 tentang Perubahan
Atas Peraturan Pemerintah Nomor
22 Tahun 2020 Tentang Peraturan
Pelaksanaan Undang-Undang
Nomor 2 Tahun 2017 Tentang Jasa
Konstruksi
                    </td>
                    @if($data->verifikasi_asosiasi == 1)
                    <td align="center">V
                        <br/>
                        <br/>
                        <br/>
                        <br/>
                        <br/>
                        V
                    </td>
                    <td></td>
                    @else
                    <td></td>
                    <td align="center">V <br/>
                        <br/>
                        <br/>
                        <br/>
                        <br/>V</td>
                    @endif
                    @if($data->validasi_asosiasi == 1)
                    <td align="center">V <br/>
                        <br/>
                        <br/>
                        <br/>
                        <br/>V</td>
                    <td></td>
                    @else
                    <td></td>
                    <td align="center">V <br/>
                        <br/>
                        <br/>
                        <br/>
                        <br/>V</td>
                    @endif
                </tr>
                <tr>
                    <td align="center">3</td>
                    <td>Pemeriksaan ketersediaan daftar
                        asesor sesuai subklasifikasi layanan
                        lisensi</td>
                        @if($data->verifikasi_asesor == 1)
                        <td align="center">V</td>
                        <td></td>
                        @else
                        <td></td>
                        <td align="center">V</td>
                        @endif
                        @if($data->validasi_asesor == 1)
                        <td align="center">V</td>
                        <td></td>
                        @else
                        <td></td>
                        <td align="center">V</td>
                        @endif
                </tr>
                <tr>
                    <td align="center">4</td>
                    <td>Pemeriksaan ketersediaan daftar sarana
                        dan prasarana serta kesesuaian
                        tempat uji kompetensi dengan skema
                        sertifikasi yang diajukan, dan bilamana
                        perlu dapat dilakukan pemeriksaan
                        lapangan</td>
                        @if($data->verifikasi_tuk == 1)
                        <td align="center">V</td>
                        <td></td>
                        @else
                        <td></td>
                        <td align="center">V</td>
                        @endif
                        @if($data->validasi_tuk == 1)
                        <td align="center">V</td>
                        <td></td>
                        @else
                        <td></td>
                        <td align="center">V</td>
                        @endif
                </tr>
                <tr>
                    <td align="center">5</td>
                    <td>Ruang lingkup Lisensi yang diajukan,
                        dilakukan pengecekan terhadap daftar
                        skema sertifikasi</td>
                        @if($data->verifikasi_skema == 1)
                        <td align="center">V</td>
                        <td></td>
                        @else
                        <td></td>
                        <td align="center">V</td>
                        @endif
                        @if($data->validasi_skema == 1)
                        <td align="center">V</td>
                        <td></td>
                        @else
                        <td></td>
                        <td align="center">V</td>
                        @endif
                </tr>
                <tr>
                    <td align="center">6</td>
                    <td>Pengecekan kesesuaian laporan tindak
                        lanjut hasil pemantauan dan evaluasi
                        kinerja LSP dengan kondisi atau
                        perbaikan yang dilakukan LSP</td>
                        @if($data->verifikasi_laporan == 1)
                        <td align="center">V</td>
                        <td></td>
                        @else
                        <td></td>
                        <td align="center">V</td>
                        @endif
                        @if($data->validasi_laporan == 1)
                        <td align="center">V</td>
                        <td></td>
                        @else
                        <td></td>
                        <td align="center">V</td>
                        @endif
                </tr>
                <tr>
                    <td align="center">7</td>
                    <td>Pengecekan kesesuaian rekapitulasi
                        laporan penyelenggaraan Sertifikasi
                        Kompetensi Kerja Kons</td>
                        @if($data->verifikasi_rekapitulasi == 1)
                        <td align="center">V</td>
                        <td></td>
                        @else
                        <td></td>
                        <td align="center">V</td>
                        @endif
                        @if($data->validasi_rekapitulasi == 1)
                        <td align="center">V</td>
                        <td></td>
                        @else
                        <td></td>
                        <td align="center">V</td>
                        @endif
                </tr>
                <tr>
                    <td align="center">8</td>
                    <td>Pemeriksaan Surat Keputusan Lisensi
                        dan Sertifikat Lisensi yang akan habis
                        masa berlakunya paling lambat 90
                        (sembilan puluh) hari kalender
                        sebelum masa berlaku lisensi berakhir</td>
                        @if($data->verifikasi_sk == 1)
                        <td align="center">V</td>
                        <td></td>
                        @else
                        <td></td>
                        <td align="center">V</td>
                        @endif
                        @if($data->validasi_sk == 1)
                        <td align="center">V</td>
                        <td></td>
                        @else
                        <td></td>
                        <td align="center">V</td>
                        @endif
                </tr>
                <tr>
                    <td align="center">9</td>
                   <td>Pemeriksaan LSP terlisensi telah
                    tercatat melalui laman aplikasi
                    http://lisensijakon.pu.go.id.</td>
                   <td></td>
                   <td></td>
                   <td></td>
                   <td></td>
                </tr>
			</tbody>
        </table>
        
        <br/>
        <div style="width: 50%; text-align: center; float: right;">Jakarta, ........<br>
            Ketua Sekretariat
            Tim Pemberian<br/>
            Rekomendasi LSP dan<br/>
            Pencatatan LSP Terlisensi</div><br><br><br><br><br></div><br></div>
        <div style="width: 60%; text-align: center; float: right;">(..........................)</div>
            
        <br/>
        <br/>

        <p style="font-size: 12px">Poin verifikasi dan validasi untuk setiap jenis permohonan rekomendasi:<br/>
        1. Baru : Nomor 1, 2, 3, 4, 5 <br/>
        2. Perpanjangan: Nomor 1, 6, 7, 8, 9. <br/>
        3. Penambahan Ruang Lingkup: Nomor 1, 2, 3, 5, 8, 9
        </p>
	</div>

</body>
</html>