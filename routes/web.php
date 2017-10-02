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

Route::group(['prefix' => 'admin', 'middleware' => ['role:admin']], function() {
    Route::get('painel', 'AdministratorController@index')->name('admin-panel');
    Route::prefix('criar')->group(function () {
        Route::get('manager', 'ManagerController@create')->name('create-manager');
        Route::get('host', 'HostController@create')->name('create-host');
        Route::get('resident', 'ResidentController@create')->name('create-resident');

        Route::post('manager', 'ManagerController@save')->name('save-manager');
        Route::post('host', 'HostController@save')->name('save-host');
        Route::post('resident', 'ResidentController@save')->name('save-resident');
    });
});

Route::group(['prefix' => 'sindico', 'middleware' => ['role:manager']], function() {
    Route::get('painel', 'ManagerController@index')->name('manager-panel');
});

Route::group(['prefix' => 'proprietario', 'middleware' => ['role:host']], function() {
    Route::get('painel', 'HostController@index')->name('host-panel');
});

Route::group(['prefix' => 'proprietario', 'middleware' => ['role:resident']], function() {
    Route::get('painel', 'ResidentController@index')->name('resident-panel');
});
