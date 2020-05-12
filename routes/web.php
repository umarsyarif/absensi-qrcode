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
})->name('home');

Route::get('/dashboard', 'HomeController@index')->name('dashboard');

Auth::routes(['register' => false]);

// ADMIN ROUTES
Route::prefix('data-guru')->name('data-guru.')->group(function () {
    Route::post('/', 'AdminController@storeGuru')->name('store');
    Route::get('/', 'AdminController@showGuru')->name('show');
});

Route::prefix('data-siswa')->name('data-siswa.')->group(function () {
    Route::post('/', 'AdminController@storeSiswa')->name('store');
    Route::get('/', 'AdminController@showSiswa')->name('show');
});

// GURU ROUTES
Route::prefix('absensi-siswa')->name('absensi-siswa.')->group(function () {
    Route::post('/', 'AdminController@storeJadwal')->name('store');
    Route::get('/', 'AdminController@showAbsensi')->name('show');
});

// Route::get('/data-tu', 'KepsekController@ShowTu')->name('kepsek.tu');
// Route::get('/data-tu/create-data-tu', 'KepsekController@CreateTu')->name('kepsek.tu.create');
// Route::post('/data-tu/create-data-tu', 'KepsekController@storeTu');

// Route::get('/data-kurikulum', 'KepsekController@ShowKurikulum')->name('kepsek.kurikulum');
// Route::get('/data-kurikulum/create-data-kurikulum', 'KepsekController@CreateKurikulum')->name('kepsek.kurikulum.create');
// Route::post('/data-kurikulum/create-data-kurikulum', 'KepsekController@StoreKurikulum');
