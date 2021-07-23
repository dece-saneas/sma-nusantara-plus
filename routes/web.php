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
Route::get('/dashboard/gelombang/{id}', 'DashboardController@select_gelombang')->name('select.gelombang');


Route::get('/', 'HomeController@index')->name('home');

Route::resource('gelombang','GelombangController')->except(['index', 'show']);
Route::resource('identitas','IdentitasController');