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
    return view('auth.loginv1');
})->name('home');

Route::get('/dashboard', 'HomeController@index')->name('dashboard');

Auth::routes(['register' => false]);

// ADMIN ROUTES
Route::prefix('data-guru')->name('data-guru.')->group(function () {
    Route::post('/', 'AdminController@storeGuru')->name('store');
    Route::get('/', 'AdminController@showGuru')->name('show');
    Route::get('/{guru}/hapus-guru', 'AdminController@destroyGuru')->name('destroy');
});

Route::prefix('data-siswa')->name('data-siswa.')->group(function () {
    Route::get('/create-siswa', 'AdminController@createSiswa')->name('create');
    Route::post('/', 'AdminController@storeSiswa')->name('store');
    Route::get('/', 'AdminController@showSiswa')->name('show');
    
});

// GURU ROUTES
Route::prefix('absensi-siswa')->name('absensi-siswa.')->group(function () {
    Route::post('/', 'GuruController@storeJadwal')->name('store');
    Route::get('/', 'GuruController@showAbsensi')->name('show');
    Route::get('/scan-qrcode/{jadwal}', 'GuruController@showScanabsen')->name('show-scan');
});