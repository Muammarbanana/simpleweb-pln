<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/proyek/hapus/{nomor_surat}', 'ProyekController@hapus');
Route::post('/proyek/update', 'ProyekController@update');
Route::post('/proyek/tambah', 'ProyekController@tambah');
Route::get('/', 'ProyekController@index');
Auth::routes();
