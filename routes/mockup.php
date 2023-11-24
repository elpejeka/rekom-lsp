<?php

use Illuminate\Support\Facades\Route;

Route::get('/mockup', function(){
    return view('pages.admin.rekomendasi.list-kelengkapan', [
        'title' => 'Dashboard'
    ]);
});