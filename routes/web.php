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

Route::get('search','SearchController@get')->name('search.post');

Route::get('post','GetController@index')->name('posts.index');

Route::prefix('post')->middleware('auth')->group(function(){
    
    Route::get('create','GetController@create')->name('posts.create');
    Route::post('store','GetController@store');

    
    // Route::get('post/{slug}','PostController@show')->withoutMiddleware('auth');

    Route::get('{get:slug}/edit','GetController@edit');
    Route::patch('{get:slug}/edit','GetController@update');
    //put : untuk seluruh field di db 
    //patch : untuk sebagian filed

    Route::delete('{get:slug}/delete', 'GetController@destroyed');
});
Route::get('post/{get:slug}','GetController@show')->name('posts.show');

Route::get('contact', 'ContactController');

Route::get('categories/{category:slug}','CategoryController@show')->name('categories.show');
Route::get('tags/{tag:slug}','TagController@show')->name('tags.show');

//model binding 
Route::get('series/{serie:slug}','SeriesController@show');

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
