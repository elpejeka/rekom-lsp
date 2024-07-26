<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->prefix('v1')->group(function(){
    Route::get('/list-permohonan', 'API\indexController@index');
    Route::get('/komen', 'API\PerbaikanController@index');

    Route::get('/surat-rekomendasi/{id}', 'API\SuratController@terima');
    Route::get('/surat-penolakan/{id}', 'API\SuratController@tolak');

    Route::get('/asosiasi', 'API\AsosiasiController@index');
    Route::get('/skema', 'API\JabkerController@index');
}); 


Route::get('/list-permohonan', 'API\indexController@index');
Route::get('/detail/{id}', 'API\indexController@detail');
Route::get('/komen', 'API\PerbaikanController@index');