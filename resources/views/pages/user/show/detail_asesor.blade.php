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
        <th>No Registrasi SKK/SKA/SKT</th>
        <th>No Sertifikat</th>
        <th>Kualifikasi</th>
        <th>Subklasifikasi</th>
    </tr>
    @php
    $no = 1;
    @endphp
    @foreach ($item->sertifikat as $detail)
        <tr>
            <td>{{$no++}}</td>
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

<table class="table table-bordered w-100">
    <tr>
        <th>SKA</th>
        <th>Sertifikat Asesor</th>
    </tr>
    @php
    $no = 1;
    @endphp
    @foreach ($item->sertifikat as $detail)
        <tr>
            <td>
            <a href="{{asset('laravel/storage/app/public/'. $detail->ska)}}" target="_blank" type="button" name="btn_cek_13"
                                                    class="open-delete btn btn-primary btn-labeled btn-rounded">
                                                    <b><i class="icon-file-check"></i></b> Softcopy</a> 
            
                                                    {{-- <iframe id="iframepdf" src="{{asset('laravel/storage/app/public/'. $detail->ska)}}" width="250" height="100"></iframe> --}}
            
        
            
            </td>
            <td>
            <a href="{{asset('laravel/storage/app/public/'. $detail->sertifikat_asesors)}}" target="_blank" type="button" name="btn_cek_13"
                                                    class="open-delete btn btn-primary btn-labeled btn-rounded">
                                                    <b><i class="icon-file-check"></i></b> Softcopy</a>

                                                    {{-- <iframe id="iframepdf" src="{{asset('laravel/storage/app/public/'. $detail->sertifikat_asesors)}}" width="250" height="100"></iframe> --}}
            </td>
        </tr>
    @endforeach
</table>

<div class="modal-footer">
    <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
  </div>