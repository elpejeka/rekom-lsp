<table class="table table-bordered">
    <tr>
        <th>Nama Asesor</th>
        <td>{{$item->nama_asesor}}</td>
    </tr>
    {{-- <tr>
        <th>NIK</th>
        <td>{{$item->nik}}</td>
    </tr> --}}
    <tr>
        <th>No Registrasi Asesor Di LPJK</th>
        <td>{{$item->no_registrasi_asesor}}</td>
    </tr>
    {{-- <tr>
        <th>Alamat</th>
        <td>{{$item->alamat}}</td>
    </tr> --}}
    <tr>
        <th>Status Asesor</th>
        <td>{{$item->status_asesor}}</td>
    </tr>
</table>

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Klasifikasi</th>
        <th>Subklasifikasi</th>
        <th>No Sertifikat SKK/SKA/SKT</th>
        <th>Masa Berlaku SKK/SKA/SKT</th>
        <th>No Sertifikat Asesor</th>
        <th>No Registrasi Asesor</th>
        <th>Masa Berlaku SErtifikasi Asesor
        {{-- <th>SKA</th>
        <th>Sertifikat Asesor</th> --}}
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
            <td>
                {{$detail->masa_berlaku}} - 
                @if ($detail->masa_berlaku < \Carbon\Carbon::now())
                    <span class="badge badge-danger">Sudah Habis Masa Berlaku</span>
                @endif
            </td>
            <td>{{$detail->no_sertifikat_asesor}}</td>
            <td>{{$detail->no_reg_asesor}}</td>
            <td>{{$detail->masa_berlaku_sertifikat}} - 
                @if ($detail->masa_berlaku_sertifikat <  \Carbon\Carbon::now())
                    <span class="badge badge-danger">Sudah Habis Masa Berlaku</span>
                @endif
            </td>
            <!-- @if(Auth::user()->roles !== null) -->
                  
            <!-- @endif -->
        </tr>
    @endforeach
    <table class="table table-bordered w-100">
    @foreach ($item->sertifikat as $detail)
        <tr>
        <td>
                <a href="{{asset('storage/'.$detail->ska)}}" target="_blank" type="button" name="btn_cek_13" style="float: right" 
                        class="open-delete btn btn-primary btn-labeled btn-rounded">
                <b><i class="icon-file-check"></i></b> Softcopy</a>
                {{-- <iframe id="iframepdf" src="{{asset('storage/'. $detail->ska)}}" width="250" height="100"></iframe> --}}
            </td>
            <td>
                <a href="{{asset('storage/'.$detail->sertifikat_asesors)}}" target="_blank" type="button" name="btn_cek_13" style="float: right" 
                        class="open-delete btn btn-primary btn-labeled btn-rounded">
                <b><i class="icon-file-check"></i></b> Softcopy</a>
                {{-- <iframe id="iframepdf" src="{{asset('storage/'. $detail->sertifikat_asesors)}}" width="250" height="100"></iframe> --}}
            </td>       
        </tr>
    @endforeach
    </table>
    <table class="table table-bordered w-100">
        <tr>
            <td>Dokumen Perikatan</td>
            <td>Tanggal Mulai</td>
            <td>Tanggal Selesai</td>
        </tr>
        @foreach ($item->perjanjian as $doc)
            <tr>
                <td>
                    <a href="{{asset('storage/'.$doc->upload_persyaratan)}}" target="_blank" type="button" name="btn_cek_13" style="float: right" 
                        class="open-delete btn btn-primary btn-labeled btn-rounded">
                <b><i class="icon-file-check"></i></b> Softcopy</a>
                </td>
                <td>{{$doc->tanggal_mulai}}</td>
                <td>{{$doc->tanggal_akhir}}</td>
            </tr>
        @endforeach
    </table>
</table>