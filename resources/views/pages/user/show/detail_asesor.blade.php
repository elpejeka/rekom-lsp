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
        <th>Tercatat LPJK</th>
        <td>{{$item->tercatat == 1 ? 'Ya' : 'Tidak'}}</td>
    </tr>
    <tr>
        <th>Alamat</th>
        <td>{{$item->alamat}}</td>
    </tr>
    <tr>
        <th>Status Asesor</th>
        <td>{{$item->status_asesor}}</td>
    </tr>
    {{-- <tr>
        <th>Sertifikat Asesor</th>
        <td>
            
        </td>
    </tr> --}}
</table>

<table class="table table-bordered w-100">
    <tr>
        <th>No</th>
        <th>Klasifikasi</th>
        <th>Subklasifikasi</th>
        <th>Kualifikasi</th>
        <th>NRKA</th>
        <th>No Sertifikat</th>
        <th>Kualifikasi</th>
        <th>Subklasifikasi</th>
    </tr>
    @foreach ($item->sertifikat as $detail)
        <tr>
            <td>1</td>
            <td>{{$detail->klasifikasi}}</td>
            <td>{{$detail->subklasifikasi}}</td>
            <td>{{$detail->kualifikasi}}</td>
            <td>{{$detail->nrka}}</td>
            <td>{{$detail->no_sertifikat_asesor}}</td>
            <td>{{$detail->kualifikasi_sertifikat}}</td>
            <td>{{$detail->sub_klasifikasi_sertifikat}}</td>
        </tr>
    @endforeach
</table>