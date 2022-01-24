<?php

use Illuminate\Support\Facades\Route;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which    
| contains the "web" middleware group. Now create something great!
|Route::get('/daftar-lisensi', 'LspController@listLsp')->name('list.lsp');
Route::get('/{slug}', 'LspController@detailLsp')->name('lsp');
Route::get('/detail/{slug}', 'LspController@showDetail')->name('show.detail');
*/

Route::get('/daftar-lsp-lisensi', 'LspController@listLsp')->name('list.lsp');
Route::get('/detail-lsp/lihat/{slug}', 'LspController@detailLsp')->name('lsp');
Route::get('/detail/asesor/sertifikat/{slug}', 'LspController@show')->name('show.detail');

Route::get('/', 'HomeController@index')->name('home');
Route::get('/{id}/submit', 'HomeController@show')->name('show_status');

Route::get('/informasi-umum', 'InformationController@index')->name('informasi');
Route::get('/informasi-umum/preview', 'InformationController@table')->name('table.informasi-umum');
Route::post('/informasi-umum/submit', 'InformationController@store')->name('information_store');
Route::get('/informasi-umum/{id}', 'InformationController@edit')->name('information.edit');
Route::get('/upload-sk/{id}', 'InformationController@revisi')->name('sk.edit');
Route::put('/informasi-umum/{id}', 'InformationController@update')->name('information.update');

Route::get('/kualifikasi', 'KualifikasiController@index')->name('kualifikasi');
Route::get('/kualifikasi/preview', 'KualifikasiController@table')->name('table.kualifikasi');
Route::delete('/klasifikasi/{id}/hapus', 'KualifikasiController@destroy')->name('delete.klasifikasi');
Route::post('/kualifikasi', 'KualifikasiController@store')->name('kualifikasi_store');


Route::get('/struktur-organisasi', 'StrukturOrganisasiController@index')->name('struktur_organisasi');
Route::get('/struktur-organisasi/preview', 'StrukturOrganisasiController@table')->name('table.organisasi');
Route::post('/struktur-organisasi', 'StrukturOrganisasiController@store')->name('struktur_organisasi_store');
Route::get('/struktur-organisasi/{id}', 'StrukturOrganisasiController@edit')->name('pengurus.edit');
Route::get('/organisasi-upload/{id}', 'StrukturOrganisasiController@revisi')->name('pengurus.upload');
Route::put('/struktur-organisasi/{id}', 'StrukturOrganisasiController@update')->name('pengurus.update');

Route::get('/sertifikasi-lsp', 'SertifikasiLspController@index')->name('sertifikasi-lsp');
Route::get('/skema-sertifikasi/preview', 'SertifikasiLspController@table')->name('table.sertifikasi');
Route::delete('/skema-sertifikasi/{id}/hapus', 'SertifikasiLspController@destroy')->name('delete.sertifikasi');
Route::get('/skema-sertifikasi/{id}/edit', 'SertifikasiLspController@edit')->name('edit.skema');
Route::put('/skema-sertifikasi/{id}', 'SertifikasiLspController@update')->name('update.skema');
Route::post('/sertifikasi-lsp', 'SertifikasiLspController@store')->name('sertifikasi_lsp_store');

Route::get('/asesor', 'AsesorController@index')->name('asesor');
Route::get('/asesor/preview', 'AsesorController@table')->name('table.asesor');
Route::get('/asesor/{id}', 'AsesorController@edit')->name('edit.asesor');
Route::put('/asesor/update/{id}', 'AsesorController@update')->name('update.asesor');
Route::delete('/asesor/{id}/hapus', 'AsesorController@destroy')->name('delete.asesor');
Route::post('/asesor', 'AsesorController@store')->name('asesor_store');
Route::get('/asesor-detail/{slug}', 'AsesorController@show')->name('asesor.show');

Route::get('/sertifikat-asesor/{slug}', 'DetailAsesorController@index')->name('sertifikat.asesor');
Route::post('sertifikat-asesor', 'DetailAsesorController@store')->name('sertifikat.store');
Route::get('/sertifikat-asesor/edit/{id}', 'DetailAsesorController@edit')->name('sertifikat.edit');
Route::put('/sertifikat-asesor/update/{id}', 'DetailAsesorController@update')->name('sertifikat.update');
Route::delete('/sertifikat-asesor/delete/{id}', 'DetailAsesorController@destroy')->name('sertifikat.delete');

Route::get('/tempat-uji-kompetensi', 'TukController@index')->name('tuk');
Route::get('/tempat-uji-kompetensi/preview', 'TukController@table')->name('table.tuk');
Route::delete('/tempat-uji-kompetensi/{id}/hapus', 'TukController@destroy')->name('delete.tuk');
Route::post('/tempat-uji-kompetensi', 'TukController@store')->name('tuk_store');

Route::get('/permohonan', 'PermohonanController@index')->name('permohonan');
Route::post('/permohonan', 'PermohonanController@store')->name('permohonan_store');
Route::put('/permohonan-update/{id}', 'PermohonanController@update')->name('permohonan.update');

Route::get('/dokumen-tambahan-perpanjangan', 'PerpanjanganController@index')->name('perpanjangan');
Route::post('/dokumen-tambahan-perpanjangan/submit', 'PerpanjanganController@store')->name('perpanjangan_store');

Route::get('/penambahan-ruang-lingkup', 'PenambahanController@index')->name('penambahan');
Route::post('/penambahan-ruang-lingkup', 'PenambahanController@store')->name('penambahan.store');
Route::get('/penambahan-ruang-lingkup/{id}', 'PenambahanController@edit')->name('penambahan.edit');
Route::put('/penambahan-ruang-lingkup/{id}', 'PenambahanController@update')->name('penambahan.update');

Route::get('/verifikasi/{id}', 'VerificationController@index')->name('verifikasi');
Route::get('/verifikasi', 'VerificationController@list')->name('list.verifikasi');
Route::post('/cek-kelengkapan', 'CheckController@store')->name('cek.kelengkapan');
Route::get('/print-cek-kelengkapan/{id}', 'CheckController@print_pdf')->name('pdf.kelengkapan');

Route::get('/validasi', 'ValidationController@index')->name('list.validasi');
Route::get('/validasi/{id}', 'ValidationController@validation')->name('validasi');
Route::post('/validasi-verifikasi', 'ValidationController@penilaian')->name('validasi.verifikasi');
Route::get('/verifikasi-validasi/{id}', 'ValidationController@print_pdf')->name('pdf.validasi');
Route::get('/vv-berita-acara/{id}', 'ValidationController@beritaAcara')->name('pdf.vv_berita');
Route::get('/keabsahan/{id}', 'ValidationController@showSkema')->name('keabsahan.skema'); 
Route::put('/keabsahan', 'ValidationController@keabsahan')->name('keabsahan.update');
Route::get('/progres-permohonan', 'SubmitController@progres')->name('progres');
Route::get('/detail/{id}', 'SubmitController@detail')->name('detail');

Route::get('/penolakan/{id}', 'PenolakanController@show')->name('penolakan');
Route::post('/penolakan', 'PenolakanController@store')->name('penolakan.save');
Route::get('/keterangan-penolakan/{id}', 'PenolakanController@keterangan')->name('penolakan.keterangan');

Route::get('/{id}/set-status-kelengkapan/submitted', 'SubmitController@setStatusKelengkapan')->name('submit.kelengkapan');
Route::get('/{id}/verifikasi-validasi', 'SubmitController@setStatusVerifikasi')->name('submit.validasi');
Route::get('/{id}/tolak-permohonan', 'SubmitController@setStatusTolak')->name('submit.tolak');
Route::get('/{id}/permohonan-selesai', 'SubmitController@setStatusPermohonan')->name('submit.selesai');
Route::get('/surat-persetujuan/{id}', 'PermohonanController@surat_permohonan')->name('surat.setuju');

Route::get('/status/{id}', 'StatusController@index')->name('cek.status');
Route::get('/permohonan-upload/{id}', 'PermohonanController@edit')->name('edit.permohonan');

Route::get('/surat-rekomendasi/{id}', 'LetterController@index')->name('rekomendasi');
Route::post('/surat-rekomendasi', 'LetterController@store')->name('rekomendasi.store');



Route::get('/submit/{slug}', 'SubmitController@index')->name('preview');
Route::get('/{id}/set-status/submitted', 'SubmitController@setStatusSubmit')->name('submit.status');
Route::get('/submitted/{id}', 'SubmitController@submitted')->name('submitted');

Route::get('/pendaftaran', 'PendaftaranController@RegistrationForm')->name('pendaftaran');

Route::prefix('pencatatan')
            ->namespace('Pencatatan')
            ->middleware(['auth'])
            ->group(function() {
                Route::get('/permohonan', 'PencatatanController@index')->name('permohonan.pencatatan');
                Route::post('/permohonan', 'PencatatanController@store')->name('pencatatan.store');
                Route::get('/permohonan/edit/{id}', 'PencatatanController@edit')->name('pencatatan.edit');
                Route::put('/permohonan/update/{id}', 'PencatatanController@update')->name('pencatatan.update');
	    
	            Route::get('/sekretariat/list', 'IndexController@listApprove')->name('pencatatan.approve.list');
                Route::get('/sekretariat/cek/{slug}', 'IndexController@approve')->name('pencatatan.approve');
                Route::get('/cek-kesesuaian/{id}/approve', 'IndexController@setApprove')->name('pencatatan.submit.approve');
	
                Route::get('/permohonan/list', 'IndexController@index')->name('pencatatan.preview');
                Route::get('/submit/preview/{slug}', 'IndexController@submit')->name('pencatatan.liat');
                Route::get('/{id}/set-status', 'IndexController@setStatusSubmit')->name('submit.status');
                Route::get('/surat-pencatatan/{slug}', 'PencatatanController@surat')->name('surat.pencatatan');

                Route::get('/skema', 'SkemaController@index')->name('pencatatan.skema');
                Route::post('/skema', 'SkemaController@store')->name('pencatatan.skema.store');
                Route::get('/skema/edit/{id}', 'SkemaController@edit')->name('pencatatan.skema.edit');
                Route::put('/skema/update/{id}', 'SkemaController@update')->name('pencatatan.skema.update');
                Route::delete('/skema/delete/{id}', 'SkemaController@destroy')->name('pencatatan.skema.delete');

                Route::get('/asesor', 'AsesorController@index')->name('pencatatan.asesor');
                Route::post('/asesor', 'AsesorController@store')->name('pencatatan.asesor.store');
                Route::get('/asesor/edit/{slug}', 'AsesorController@edit')->name('pencatatan.asesor.edit');
                Route::put('/asesor/update/{id}', 'AsesorController@update')->name('pencatatan.asesor.update');
                Route::delete('/asesor/delete/{id}', 'AsesorController@destroy')->name('pencatatan.asesor.delete');

                Route::get('/detail-asesor/{slug}', 'AsesorController@show')->name('sertifikat.show');
                
                Route::get('/sertifikat-asesor/{slug}', 'SertifikatController@index')->name('pencatatan.sertifikat.asesor');
                Route::post('/sertifikat-asesor', 'SertifikatController@store')->name('pencatatan.sertifikat.store');
                Route::get('/sertifikat-asesor/edit/{id}', 'SertifikatController@edit')->name('pencatatan.sertifikat.edit');
                Route::put('/sertifikat-asesor/update/{id}', 'SertifikatController@update')->name('pencatatan.sertifikat.update');
                Route::delete('/sertifikat-asesor/delete/{id}', 'SertifikatController@destroy')->name('pencatatan.sertifikat.delete');

                Route::get('/tempat-uji-kompetensi', 'TukController@index')->name('pencatatan.tuk');
                Route::post('/tempat-uji-kompetensi', 'TukController@store')->name('pencatatan.tuk.store');
                Route::get('/tempat-uji-kompetensi/edit/{id}', 'TukController@edit')->name('pencatatan.tuk.edit');
                Route::put('/tempat-uji-kompetensi/update/{id}', 'TukController@update')->name('pencatatan.tuk.update');
                Route::delete('/tempat-uji-kompetensi/delete/{id}', 'TukController@destroy')->name('pencatatan.tuk.delete');
            });

// Route::get('/testmail', function (){
//     $data = ['message' => 'This is a test!'];

//     Mail::to('aliefbagas3@gmail.com')->send(new TestEmail($data));
    
//     return back();
// });

// Route::prefix('/login')
//     ->namespace('Auth')
//     ->group(function() {
//         Route::get('/pendaftaran', 'showRegistrationForm@RegisterController')->name('pendaftaran');
//     });

// Route::prefix('admin')
//     ->namespace('Admin')
//     ->middleware(['auth', 'admin'])
//     ->group(function() {
//         Route::get('/', 'DashboardController@index')->name('dashboard');
//     });

Auth::routes(['verify' => true]);

// Auth::routes(['register' => false]);


