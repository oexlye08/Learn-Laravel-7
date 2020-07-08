<?php

use Illuminate\Support\Facades\Route;


// Route::view('/', 'welcome');
// Route::view('series/create', 'series.create');
Route::view('series/premium', 'series.premium.post');
Route::view('/about', 'about');
Route::view('/login', 'login');

Route::get('/',function(){
    $name = request('name');
    return view('welcome', ['name' => $name]);
});

Route::get('contact', 'ContactController');

Route::get('post','GetController@index');


Route::get('post/create','GetController@create');
Route::post('post/store','GetController@store');

Route::get('post/{get:slug}','GetController@show');
// Route::get('post/{slug}','PostController@show');

//model binding 
Route::get('series/{serie:slug}','SeriesController@show');
