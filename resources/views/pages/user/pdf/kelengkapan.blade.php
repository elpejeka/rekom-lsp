<!DOCTYPE html>
<html>
<head>
	<title>DAFTAR KELENGKAPAN DOKUMEN PERSYARATAN</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

	<div class="container">
		<center>
			<h4>DAFTAR KELENGKAPAN DOKUMEN PERSYARATAN</h4>
		</center>
		<br/>
		<table class='table table-bordered'>
			<thead align="center">
				<tr>
					<th rowspan="2" style="text-align">No</th>
					<th rowspan="2">Dokumen</th>
					<th colspan="2">Kelengkapan</th>
                </tr>
                <tr>
                    <th>Ada</th>
                    <th>Tidak Ada</th>
                </tr>
			</thead>
			<tbody>
                <tr>
                    <td align="center">1</td>
                    <td>Surat Permohonan</td>
                    @if($data->status_surat == 1)
                    <td align="center">V</td>
                    <td></td>
                    @else
                    <td></td>
                    <td align="center">V</td>
                    @endif
                    
                </tr>
                <tr>
                    <td align="center">2</td>
                    <td>Informasi Umum LSP</td>
                    <td align="center">V</td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">3</td>
                    <td>Struktur Organisasi LSP</td>
                    @if($data->status_organisasi == 1)
                    <td align="center">V</td>
                    <td></td>
                    @else
                    <td></td>
                    <td align="center">V</td>
                    @endif
                </tr>
                <tr>
                    <td align="center">4</td>
                    <td>Daftar Skema Sertifikasi</td>
                    @if($data->status_skema == 1)
                    <td align="center">V</td>
                    <td></td>
                    @else
                    <td></td>
                    <td align="center">V</td>
                    @endif
                </tr>
                <tr>
                    <td align="center">5</td>
                    <td>Dokumen Skema Sertifikasi</td>
                    @if($data->status_skema == 1)
                    <td align="center">V</td>
                    <td></td>
                    @else
                    <td></td>
                    <td align="center">V</td>
                    @endif
                </tr>
                <tr>
                    <td align="center">6</td>
                    <td>Daftar Asesor</td>
                    @if($data->status_asesor == 1)
                    <td align="center">V</td>
                    <td></td>
                    @else
                    <td></td>
                    <td align="center">V</td>
                    @endif
                </tr>
                <tr>
                    <td align="center">7</td>
                    <td>SKA Asesor</td>
                    @if($data->status_asesor == 1)
                    <td align="center">V</td>
                    <td></td>
                    @else
                    <td></td>
                    <td align="center">V</td>
                    @endif
                </tr>
                <tr>
                    <td align="center">8</td>
                    <td>Daftar Tempat Uji Kompetensi (TUK)</td>
                    @if($data->status_tuk == 1)
                    <td align="center">V</td>
                    <td></td>
                    @else
                    <td></td>
                    <td align="center">V</td>
                    @endif
                </tr>
                <tr>
                    <td align="center">9</td>
                   <td>SK Lisensi dan Sertifikat Lisensi LSP *)</td>
                   <td></td>
                   <td></td>
                </tr>
                <tr>
                    <td align="center">10</td>
                    <td>Laporan tindak lanjut hasil pemantauan
                        dan evaluasi kinerja <br/>LSP dengan kondisi
                        atau perbaikan yang dilakukan LSP *)</td>
                        <td></td>
                        <td></td>
                </tr>
                <tr>
                    <td align="center">11</td>
                    <td>Rekapitulasi laporan penyelenggaraan
                        <br/>
                        Sertifikasi Kompetensi Kerja Konstruksi
                        selama 3 (tiga) tahun terakhir *)</td>
                        <td></td>
                        <td></td>
                </tr>
			</tbody>
        </table>
        <p>*) Syarat dokumen tambahan khusus untuk rekomendasi lisensi perpanjangan.

	</div>

</body>
</html>