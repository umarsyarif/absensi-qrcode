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

Route::get('/', 'Auth\LoginController@showLoginForm')->name('home');

Route::get('/profil', 'HomeController@index')->name('dashboard');

Auth::routes(['register' => false]);

// =======================================================================================
// ADMIN ROUTES

    // Route::get('/', 'HomeController@index')->name('home');
Route::patch('/update-profile/{user}', 'AdminController@updateProfil')->name('update-profil.admin');
    
Route::prefix('data-guru')->name('data-guru.')->group(function () {
    Route::post('/', 'AdminController@storeGuru')->name('store');
    Route::get('/', 'AdminController@showGuru')->name('show');
    Route::get('/update-guru', 'AdminController@updateGuru')->name('update');
    Route::get('/{guru}/hapus-guru', 'AdminController@destroyGuru')->name('destroy');
});

Route::prefix('data-siswa')->name('data-siswa.')->group(function () {
    Route::get('/create-siswa', 'AdminController@createSiswa')->name('create');
    Route::post('/', 'AdminController@storeSiswa')->name('store');
    Route::get('/', 'AdminController@showSiswa')->name('show');
    Route::get('/{siswa}/hapus-siswa', 'AdminController@destroySiswa')->name('destroy');
});

Route::prefix('data-mapel')->name('data-mapel.')->group(function () {
    Route::post('/', 'AdminController@storemapel')->name('store');
    Route::get('/', 'AdminController@showMapel')->name('show');
    Route::get('/{mapel}/hapus-mapel', 'AdminController@destroyMapel')->name('destroy');
});

Route::prefix('absensi')->name('absensi.')->group(function () {
    Route::get('/', 'AdminController@showAbsensi')->name('show');
    Route::get('/{mapel}/hapus-mapel', 'AdminController@destroyMapel')->name('destroy');
});
// =======================================================================================

// GURU ROUTES

Route::patch('/update-profile-guru/{user}', 'GuruController@updateProfil')->name('update-profil.guru');


Route::prefix('absensi-siswa')->name('absensi-siswa.')->group(function () {
    Route::post('/', 'GuruController@storeJadwal')->name('store');
    Route::get('/', 'GuruController@showAbsensi')->name('show');
    Route::get('/scan-qrcode/{jadwal}', 'GuruController@editAbsensi')->name('edit');
    Route::post('/{jadwal}', 'GuruController@updateAbsensi')->name('update');
    Route::get('/{jadwal}/hapus-jadwal', 'GuruController@destroyJadwal')->name('destroy');
});

Route::prefix('rekap-absensi')->name('rekap-absensi.')->group(function () {
    Route::post('/', 'GuruController@searchRekap')->name('store');
    Route::get('/', 'GuruController@showRekap')->name('show');
    Route::get('/pdf', 'GuruController@showLaporan')->name('pdf');
    // Route::post('/{jadwal}', 'GuruController@updateAbsensi')->name('update');
});
// =======================================================================================

// Route Siswa

Route::patch('/update-profile-siswa/{user}', 'SiswaController@updateProfil')->name('update-profil.siswa');

Route::prefix('absen')->name('absen.')->group(function () {
    Route::get('/', 'SiswaController@showAbsensi')->name('show');
    // Route::get('/{mapel}/hapus-mapel', 'AdminController@destroyMapel')->name('destroy');
});

Route::prefix('id-card')->name('id-card.')->group(function () {
    Route::get('/', 'SiswaController@idcard')->name('show');
    // Route::get('/{mapel}/hapus-mapel', 'AdminController@destroyMapel')->name('destroy');
});