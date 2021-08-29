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

Auth::routes(['reset' => true, 'verify' => true, 'confirm' => false]);

Route::prefix('super-admin')->group(function () {
    Route::resource('users','Core\UserController', ['as' => 'core'])->except(['show']);
    Route::resource('roles','Core\RoleController', ['as' => 'core'])->except(['show']);
    Route::resource('permissions','Core\PermissionController', ['as' => 'core'])->except(['show']);
});

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/', 'HomeController@index')->name('home');

// Admin
Route::resource('gelombang','GelombangController')->except(['index', 'show']);
Route::get('/daftar-siswa','DashboardController@daftar_siswa')->name('daftar.siswa');
Route::put('/daftar-siswa/','DashboardController@berkas_invalid')->name('berkas.invalid');
Route::get('/daftar-siswa/valid/{id}/{type}','DashboardController@berkas_valid')->name('berkas.valid');


// User
Route::get('/dashboard/gelombang/{id}', 'DashboardController@select_gelombang')->name('select.gelombang');
Route::get('/identitas','DashboardController@identitas')->name('identitas');
Route::put('/identitas/','DashboardController@identitas_update')->name('identitas.update');
Route::get('/unggah-berkas/','DashboardController@unggah')->name('unggah');
Route::put('/unggah-berkas/','DashboardController@berkas_update')->name('berkas.update');
Route::get('/unggah-berkas/{type}','DashboardController@berkas_destroy')->name('berkas.destroy');