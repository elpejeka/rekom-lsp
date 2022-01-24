<table class="table table-bordered">
    <tr>
        <th>Nama Asesor</th>
        <td>{{$item->nama_asesor}}</td>
    </tr>
    <tr>
        <th>NIK</th>
        <td>{{$item->nik}}</td>
    </tr>
    <tr>
        <th>No Registrasi Asesor Di LPJK</th>
        <td>{{$item->no_registrasi_asesor}}</td>
    </tr>
    <tr>
        <th>Alamat</th>
        <td>{{$item->alamat}}</td>
    </tr>
    <tr>
        <th>Status Asesor</th>
        <td>{{$item->status_asesor}}</td>
    </tr>
</table>

<table class="table table-bordered w-100">
    <tr>
        <th>No</th>
        <th>Klasifikasi</th>
        <th>Subklasifikasi</th>
        <th>No Sertifikat SKA/SKT</th>
        <th>NRKA</th>
        <th>No Sertifikat Asesor</th>
    </tr>
    @php
        $no = 1;
    @endphp
    @foreach ($item->sertifikat as $detail)
        <tr>
            <td>{{$no++}}</td>
            <td>{{$detail->klasifikasi}}</td>
            <td>{{$detail->subklasifikasi}}</td>
            <td>{{$detail->no_sertifikat}}</td>
            <td>{{$detail->nrka}}</td>
            <td>{{$detail->no_sertifikat_asesor}}</td>
        </tr>
    @endforeach
</table>