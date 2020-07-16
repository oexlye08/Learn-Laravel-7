<?php

use Illuminate\Support\Facades\Route;


// Route::view('/', 'welcome');
// Route::view('series/create', 'series.create');
Route::view('series/premium', 'series.premium.post');
Route::view('/about', 'about');
Route::view('/login', 'login');

// Route::get('/',function(){
//     $name = request('name');
//     return view('welcome', ['name' => $name]);
// });


Route::get('post','GetController@index')->name('posts.index');

Route::middleware('auth')->group(function(){
    
    Route::get('post/create','GetController@create')->name('posts.create');
    Route::post('post/store','GetController@store');

    Route::get('post/{get:slug}','GetController@show')->withoutMiddleware('auth');
    // Route::get('post/{slug}','PostController@show');

    Route::get('post/{get:slug}/edit','GetController@edit');
    Route::patch('post/{get:slug}/edit','GetController@update');
    //put : untuk seluruh field di db
    //patch : untuk sebagian filed

    Route::delete('post/{get:slug}/delete', 'GetController@destroyed');
});
Route::get('contact', 'ContactController');

Route::get('categories/{category:slug}','CategoryController@show');
Route::get('tags/{tag:slug}','TagController@show');

//model binding 
Route::get('series/{serie:slug}','SeriesController@show');

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
