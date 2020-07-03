<?php

use Illuminate\Support\Facades\Route;


Route::view('/', 'welcome');
Route::view('series/create', 'series.create');
Route::view('series/premium', 'series.premium.post');
Route::view('/about', 'about');
Route::view('/login', 'login');

Route::get('contact',function(){
    $nama = "Oki Sulton <br>";
    $umur = "22 <br>";
    $pekerjaan = "Programmer <br>";
    $desk = "Saya adalah seorang programmer mobile adroid developer,
    saat ini saya sedang belajar menggunakan laravel untuk membuat API.";

    return view('contact', [ 'nama' => $nama,
                              'umur' => $umur,
                              'pekerjaan' => $pekerjaan,
                              'body' => $desk]);
});
