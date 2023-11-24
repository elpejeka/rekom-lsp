<?php

use Illuminate\Support\Facades\Route;


Route::middleware(['auth'])->group(function(){
    Route::get('search-asesor', 'SearchingController@searchAsesor')->name('asesor.search');
    Route::post('get-asesor', 'SearchingController@getAsesor')->name('get.asesor');
});