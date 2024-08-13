<?php

namespace App\Http\Controllers\Pencatatan;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Http\Requests\Pencatatan\PencatatanAsesorRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\PencatatanAsesor;
use App\Pencatatan;
use App\Administration;
use App\LogPencatatan;
use App\PencatatanSkema;
use Auth;
use Carbon\Carbon;
use QrCode;
use PDF;

use App\Services\Reference\SertifikatService;

class AsesorController extends Controller
{

    private $sertifikatService;

    public function __construct(SertifikatService $sertifikatService)
    {
        $this->sertifikatService = $sertifikatService;
    }

    public function index(){
        $data = PencatatanAsesor::with(['propinsi'])->where('users_id', Auth::user()->id)->whereNull('deleted_at')->get();

        $permohonan = Pencatatan::where('users_id', Auth::user()->id)->get();
        $propinsi = DB::table('propinsi_dagri')->get();
        $informasi = Administration::where('users_id', Auth::user()->id)->first();

        return view('pages.user.catat.asesor', [
            'asesor' => $data,
            'permohonan' => $permohonan,
            'propinsi' => $propinsi,
            'lsp' => $informasi,
            'title' => 'Asesor LSP'
        ]);
    }

    public function store(PencatatanAsesorRequest $request){
        $item = Pencatatan::where('users_id', Auth::user()->id)->first();
        $administrasi = Administration::where('users_id', Auth::user()->id)->first();
        $nik = $request->nik;

        $cekAsesor = $this->sertifikatService->getSertifikat($nik);

        if(empty($cekAsesor)){
            return redirect()->route('pencatatan.asesor')->with('success', 'Asesor Tidak Dapat di Catatkan karena tidak mempunyai SKK/SKA');
        }

        $asesor = PencatatanAsesor::where('nik', $nik)
                                ->whereNull('deleted_at')
                                ->where('status_asesor', '=', 'Internal')
                                ->first();

        if(empty($asesor)){
                $data = $request->all();
                $data['slug'] = Str::slug($request->nama_asesor);
                $data['users_id'] = Auth::user()->id;
                $data['no_registrasi_asesor'] = rand(1, 999999). "/LPJK-LSP/". $request->nama_lsp;
                $data['is_active'] = 1;
                PencatatanAsesor::create($data);

                if($item->approve != null){
                    $notif = new LogPencatatan;
                    $notif->nama_lsp = $administrasi->nama;
                    $notif->keterangan = 'Permohonan Pencatatan Asesor';
                    $notif->created_at = Carbon::now();
                    $notif->save();
                }

            return redirect()->route('pencatatan.asesor')->with('success', 'Data Asesor Berhasil di Simpan');
        }

        if(($asesor->status_asesor == 'Internal') == ($request->status_asesor == 'Internal') && $asesor->users_id != Auth::user()->id){
            return redirect()->route('pencatatan.asesor')->with('success', 'Asesor Sudah Terdaftar Pada LSP Lain Sebagai Internal Asesor Gunakan Asesor Lain');
        }else{
            $data = $request->all();
            $data['slug'] = Str::slug($request->nama_asesor);
            $data['users_id'] = Auth::user()->id;
            $data['no_registrasi_asesor'] = rand(1, 999999). "/LPJK-LSP/". $request->nama_lsp;
            PencatatanAsesor::create($data);

                if($item->approve != null){
                    $notif = new LogPencatatan;
                    $notif->nama_lsp = $administrasi->nama;
                    $notif->keterangan = 'Permohonan Pencatatan Asesor';
                    $notif->created_at = Carbon::now();
                    $notif->save();
            }

        return redirect()->route('pencatatan.asesor')->with('success', 'Data Asesor Berhasil di Simpan');
        }
    }

    public function edit($id){
        $data = PencatatanAsesor::with(['kabkota', 'propinsi'])->find($id);
        $permohonan = Pencatatan::where('users_id', Auth::user()->id)->get();
        $propinsi = DB::table('propinsi_dagri')->get();

        return view('pages.user.catat.edit.asesor', [
            'data' => $data,
            'permohonan' => $permohonan,
            'propinsi' => $propinsi,
            'title' => 'Edit Asesor'
        ]);
    }

    public function update(PencatatanAsesorRequest $request, $id){
        $data = $request->all();
        $data['slug'] = Str::slug($request->nama_asesor);
        $data['users_id'] = Auth::user()->id;

        $item = PencatatanAsesor::findOrFail($id);
        $data['no_registrasi_asesor'] = $item->no_registrasi_asesor;

        $item->update($data);

        return redirect()->route('pencatatan.asesor')->with('success', 'Data Asesor Berhasil di Update');
    }

    public function destroy($id){
        $data = PencatatanAsesor::findOrFail($id);
        $data->delete();

        return redirect()->route('pencatatan.asesor')->with('success', 'Data Asesor Berhasil di Hapus');
    }

    public function show($id){
        $item = PencatatanAsesor::with(['sertifikat', 'perjanjian'])->find($id);

        return view('pages.user.show.sertifikat_asesor', [
            'item' => $item
        ]);
    }

    public function unapprove($id){
        $data = PencatatanAsesor::findOrFail($id);
        $data->approve = null;;
        $data->no_pencatatan = null;
        $data->save();

        return redirect()->route('pencatatan.approve.list')->with('success', 'Data Asesor Berhasil di Approve');
    }

    public function generateSuratAsesor($id){
        $data = DB::table('pencatatan_asesor')
                    ->where('pencatatan_asesor.id', $id)
                    ->whereNull('pencatatan_asesor.deleted_at')
                    ->leftJoin('sertifikat_asesor', function($join){
                        $join->on('pencatatan_asesor.id', '=', 'sertifikat_asesor.asesor_id')
                            ->whereNull('sertifikat_asesor.deleted_at');
                        })
                    ->leftJoin('klasifikasi', function($klas){
                        $klas->on('sertifikat_asesor.klasifikasi', '=', 'klasifikasi.kode');
                    })
                    ->leftJoin('subklasifikasi', function($sub){
                        $sub->on('sertifikat_asesor.subklasifikasi', '=', 'subklasifikasi.kode_sub');
                    })
                    ->leftJoin('users' , function($join){
                        $join->on('pencatatan_asesor.users_id', '=', 'users.id');
                    })
                    ->select('pencatatan_asesor.*', 'sertifikat_asesor.*', 'klasifikasi.nama as klasifikasi', 'subklasifikasi.nama as subklasifikasi', 'users.nama_lsp')
                    ->first();

        if(!$data){
            dd($data);
        }


        $pdf = PDF::loadView('pdf.pencatatan-asesor', [
            'data'=> $data,
            // 'tgl' => $approveDate,
        ]);

        return $pdf->stream('surat-pencatatan-asesor.pdf');
    }

    public function showAsesor($id){
        $asesor = PencatatanAsesor::with(['propinsi', 'kabkota', 'tmptLhir'])->find($id);

        return response()->json($asesor);
    }

    public function approveAsesor(Request $request){
        $id = $request->id;
        $asesor = PencatatanAsesor::with('sertifikat')->find($id);
        $asesor->approve = $request->approve;
        $asesor->no_pencatatan = $request->approve == 1 ? $request->no_pencatatan : null;
        $asesor->is_active = $request->approve == 1 ? 1 : 0;

        $asesor->save();
        return response()->json($asesor);
    }

    public function unactive($id){
        return view('pages.user.pencatatan.unactive.asesor', [
            'asesor' => PencatatanAsesor::find($id)
        ]);
    }

    public function prosesUnactive(Request $request, $id){
        $item = PencatatanAsesor::find($id);
        $administrasi = Administration::where('users_id', Auth::user()->id)->first();
        $data = $request->all();
        $data['surat_penghapusan'] = $request->file('surat_penghapusan')->store('file/pencatatan/asesor/penghapusan', 'public');
        $data['approve'] = null;
        $data['acc_deleted'] = Carbon::now();
        $data['approved_at'] = null;
        $data['is_deleted'] = true;

        $item->update($data);

        $notif = new LogPencatatan;
        $notif->nama_lsp = $administrasi->nama;
        $notif->keterangan = 'Permohonan Pengahapusan Asesor '. $item->nama_asesor;
        $notif->created_at = Carbon::now();
        $notif->save();

        return redirect()->route('pencatatan.asesor')->with('success', 'Data Asesor Berhasil di hapus');
    }

    public function penghapusan(Request $request){
        $id = $request->id;
        $asesor = PencatatanAsesor::with('sertifikat')->find($id);
        $asesor->surat_penghapusan = $request->file('surat_penghapusan')->store('file/pencatatan/asesor/penghapusan', 'public');
        $asesor->approve = null;
        $asesor->deleted_at = Carbon::now();
        $asesor->save();

        return response()->json($asesor);
    }

    public function importToSiki($id){
        $asesor = PencatatanAsesor::with('sertifikat')->find($id);

        foreach($asesor->sertifikat as $sertifikat){
            // $asesor = Http::withToken('eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6IjQiLCJlbWFpbCI6ImFsaWVmYmFnYXMwNEBnbWFpbC5jb20ifQ.aFZdGhtikkat8UWvB5EEqC3melJR50XN9XJSDOymvDk')
            // ->get('https://siki.pu.go.id/API-Server-LPJK/public/api/get_detail_asesor_bnsp', [
            //     'no_reg_asesor_bnsp' => $sertifikat->no_reg_asesor
            // ]);

            $response = Http::withHeaders([
                'token' => '20|YLLqRFQ8YI8j4oUiaCTjyAEEevdEIREyoEFzRLtf',
                'Content-Type' => 'application/json',
            ])->withBody(json_encode([
                'no_reg_asesor_bnsp' => $sertifikat->no_reg_asesor,
            ]), 'application/json')
            ->post('https://siki.pu.go.id/api-bank-data/api/get_detail_asesor_bnsp');

            if($response->status() != '200'){
               return response()->json([
                'status' => 'failed',
                'message' => 'Sesuaikan no registrasi asesor sesuai yang tercatat pada BNSP'
               ]);
            }
       }

       return response()->json([
                'status' => 'success',
                'message' => 'data berhasil di import'
        ], 200);

    }


    public function tayang($id){
        $data = PencatatanAsesor::find($id);
        $administrasi = Administration::where('users_id', Auth::user()->id)->first();
        if($data->is_active == 1){
            $data->update([
                'status' => 1
            ]);
            $notif = new LogPencatatan;
            $notif->nama_lsp = $administrasi->nama;
            $notif->keterangan = 'Permohonan Tayang Asesor ' . $data->nama_asesor  ;
            $notif->created_at = Carbon::now();
            $notif->save();
            return redirect()->route('pencatatan.asesor')->with('success', 'Data Asesor Berhasil di ubah');
        }else{
            $data->update([
                'status' => 1
            ]);
            $notif = new LogPencatatan;
            $notif->nama_lsp = $administrasi->nama;
            $notif->keterangan = 'Permohonan Tayang TUK ' . $data->nama_tuk  ;
            $notif->created_at = Carbon::now();
            $notif->save();
            return redirect()->route('pencatatan.asesor')->with('success', 'Data Asesor Berhasil di ubah');
        }
    }

    public function done ($id){
        $data = PencatatanAsesor::find($id);

        if($data->is_active == 1){
            $data->update([
                'is_active' => 0,
                'status' => null
            ]);
        }else{
            $data->update([
                'is_active' => 1,
                'status' => null
            ]);
        }

        return redirect(route('pencatatan.approve.list'))->with('success', 'Data Asesor Berhasil di ubah');
    }



}
