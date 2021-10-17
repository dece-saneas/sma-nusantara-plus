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
Route::get('/gelombang/create','SettingController@gelombang_create')->name('gelombang.create');
Route::post('/gelombang/create','SettingController@gelombang_store')->name('gelombang.store');
Route::get('/gelombang/{id}/edit','SettingController@gelombang_edit')->name('gelombang.edit');
Route::put('/gelombang/{id}','SettingController@gelombang_update')->name('gelombang.update');
Route::delete('/gelombang/{id}','SettingController@gelombang_destroy')->name('gelombang.destroy');






Route::get('/daftar-siswa','DashboardController@daftar_siswa')->name('daftar.siswa');
Route::put('/daftar-siswa','DashboardController@berkas_invalid')->name('berkas.invalid');
Route::get('/daftar-siswa/valid/{id}/{type}','DashboardController@berkas_valid')->name('berkas.valid');


// User
Route::get('/gelombang/{id}/select', 'DashboardController@gelombang_select')->name('gelombang.select');
Route::get('/data-identitas','DashboardController@identitas')->name('identitas');
Route::put('/data-identitas','DashboardController@identitas_update')->name('identitas.update');
Route::get('/unggah-berkas','DashboardController@berkas')->name('berkas');
Route::put('/unggah-berkas','DashboardController@berkas_update')->name('berkas.update');
Route::get('/unggah-berkas/{type}','DashboardController@berkas_destroy')->name('berkas.destroy');
Route::get('/tes-akademik','DashboardController@ujian')->name('ujian');
Route::get('/tes-akademik/soal','DashboardController@ujian_soal')->name('ujian.soal');
Route::put('/tes-akademik/submit','DashboardController@ujian_submit')->name('ujian.submit');

Route::get('dashboard/download/kartu-wawancara','DashboardController@download_wawancara')->name('download.wawancara');
Route::get('dashboard/download/data-siswa/{id}','DashboardController@download_datasiswa')->name('download.datasiswa');

Route::post('reset-password','DashboardController@resetPassword')->name('custom.resetpassword');

Route::get('soal', 'DashboardController@soal')->name('soal.index');
Route::get('dashboard/download/excel', 'DashboardController@download_excel')->name('download.excel');
Route::post('dashboard/upload/excel', 'DashboardController@upload_excel')->name('upload.excel');

Route::post('dashboard/soal', 'DashboardController@soal_store')->name('soal.store');

Route::delete('/soal/{id}','DashboardController@soal_destroy')->name('soal.destroy');
Route::put('/soal/{id}','DashboardController@soal_update')->name('soal.update');