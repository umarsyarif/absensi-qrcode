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
Route::get('/data-tu', 'KepsekController@DataTu')->name('kepsek.tu');

// route tu
Route::get('/dashboard', 'TuController@index')->name('tu.dashboard');

// route kurikulum
Route::get('/dashboard', 'kurikulumController@index')->name('kurikulum.dashboard');

// route guru
Route::get('/dashboard', 'GuruController@index')->name('guru.dashboard');

// route siswa
Route::get('/dashboard', 'SiswaController@index')->name('siswa.dashboard');