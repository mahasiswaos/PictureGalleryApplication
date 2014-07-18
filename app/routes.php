<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the Closure to execute when that URI is requested.
  |
 */

$base = 'App\\Controllers\\';
//Route::get('/','App\\Controllers\\BootstrapController@index');
Route::get('/', $base.'BerandaController@index');
Route::get('/view', $base.'BerandaController@viewGalleryAsGuest');
Route::post('/view/search', $base.'BerandaController@searchGambarAsGuest');

//route login
Route::get('/login', $base.'LoginController@index');
Route::post('/login/proses', $base.'LoginController@proseslogin');
Route::get('/login/logout', $base.'LoginController@doLogout');


//route halaman user
Route::get('/users', $base.'UserController@index');
Route::get('/users/add', $base.'UserController@userAdd');
Route::post('/users/addproses', $base.'UserController@prosesAdd');
Route::get('/users/delete/{id}', $base.'UserController@userDelete');
Route::get('/users/update/{id}', $base.'UserController@userUpdate');
Route::post('/users/pupdate/{id}', $base.'UserController@userPupdate');


//route halaman gambar
Route::get('/gambar', $base.'GambarController@view');
Route::get('/gambar/view', $base.'GambarController@viewAll');
Route::get('/gambar/add', $base.'GambarController@add');
Route::post('/gambar/proses_add', $base.'GambarController@addProses');
Route::get('/gambar/edit/{id}', $base.'GambarController@edit');
Route::post('/gambar/update/{id}', $base.'GambarController@editProses');
Route::get('/gambar/delete/{id}', $base.'GambarController@delete');
Route::post('/gambar/search', $base.'GambarController@searchGambar');

//route halaman lokasi
Route::get('/lokasi', $base.'LokasiController@view');
Route::get('/lokasi/add', $base.'LokasiController@add');
Route::post('/lokasi/add/proses', $base.'LokasiController@addProses');
Route::get('/lokasi/edit/{id}', $base.'LokasiController@edit');
Route::post('/lokasi/edit/proses', $base.'LokasiController@editProses');
Route::get('/lokasi/delete/{id}', $base.'LokasiController@delete');
Route::post('/lokasi/cari', $base.'LokasiController@cari');
