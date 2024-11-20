<?php

use Illuminate\Support\Facades\Route;


Route::middleware(['auth'])->namespace('Pencatatan')->group(function(){
    Route::group(['prefix' => 'approve', 'as' => 'record.'], function () {
        Route::get('/tuk', 'PencatatanBaruController@tuk')->name('tuk');
        Route::get('/asesor', 'PencatatanBaruController@asesor')->name('asesor');
        Route::get('/skema', 'PencatatanBaruController@skema')->name('skema');
    });
});
