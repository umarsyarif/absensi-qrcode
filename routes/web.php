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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

// route kepsek
Route::get('/dashboard', 'KepsekController@index')->name('kepsek.dashboard');

Route::get('/data-tu', 'KepsekController@ShowTu')->name('kepsek.tu');
Route::get('/data-tu/create-data-tu', 'KepsekController@CreateTu')->name('kepsek.tu.create');
Route::post('/data-tu/create-data-tu', 'KepsekController@storeTu');

Route::get('/data-kurikulum', 'KepsekController@ShowKurikulum')->name('kepsek.kurikulum');
Route::get('/data-kurikulum/create-data-kurikulum', 'KepsekController@CreateKurikulum')->name('kepsek.kurikulum.create');
Route::post('/data-kurikulum/create-data-kurikulum', 'KepsekController@StoreKurikulum');

// route tu
Route::get('/dashboard', 'TuController@index')->name('tu.dashboard');

// route kurikulum
Route::get('/dashboard', 'kurikulumController@index')->name('kurikulum.dashboard');

// route guru
Route::get('/dashboard', 'GuruController@index')->name('guru.dashboard');

// route siswa
Route::get('/dashboard', 'SiswaController@index')->name('siswa.dashboard');