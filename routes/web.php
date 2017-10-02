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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->group(function () {
    Route::get('painel', 'AdministratorController@index')->name('admin-panel');
});

Route::prefix('manager')->group(function () {
    Route::get('painel', 'ManagerController@index')->name('admin-panel');
});

Route::prefix('host')->group(function () {
    Route::get('painel', 'HostController@index')->name('admin-panel');
});

Route::prefix('resident')->group(function () {
    Route::get('painel', 'ResidentController@index')->name('admin-panel');
});
