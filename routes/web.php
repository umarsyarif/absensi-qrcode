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

Route::get('/data-tu', 'KepsekController@index')->name('tu');
Route::get('/tambah-tu', 'KepsekController@Create')->name('tambah.tu');
Route::post('/tambah-tu', 'KepsekController@store');

