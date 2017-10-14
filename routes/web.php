<?php

Route::get('/', function () {
    // return view('welcome');
    return view('home.index');
});

Auth::routes();

Route::get('/painel', 'HomeController@index')->name('home');

Route::group(['prefix' => 'administrador', 'middleware' => ['role:admin']], function() {
    Route::get('painel', 'AdministratorController@index')->name('admin-panel');

    Route::prefix('gerenciar-sindicos')->group(function () {
        Route::get('listar', 'ManagerController@create')->name('list-manager');
        Route::get('criar', 'ManagerController@create')->name('create-manager');
        Route::post('criar', 'ManagerController@save')->name('save-manager');
        // Route::post('editar', 'ManagerController@edit')->name('save-manager');
        // Route::post('deletar', 'ManagerController@delete')->name('save-manager');
    });
    Route::prefix('gerenciar-condominios')->group(function () {
        Route::get('listar', 'CondominiumController@management')->name('management-condominium');
        Route::get('criar', 'CondominiumController@create')->name('create-condominium');
        Route::post('criar', 'CondominiumController@save')->name('save-condominium');
    });
});

Route::group(['prefix' => 'sindico', 'middleware' => ['role:manager']], function() {
    Route::prefix('gerenciar-proprietarios')->group(function () {
        Route::get('listar', 'HostController@create')->name('list-host');
        Route::get('criar', 'HostController@create')->name('create-host');
        Route::post('criar', 'HostController@save')->name('save-host');
    });
});

Route::group(['prefix' => 'proprietario', 'middleware' => ['role:host']], function() {
    Route::get('painel', 'HostController@index')->name('host-panel');
    Route::prefix('criar')->group(function () {
        Route::get('resident', 'ResidentController@create')->name('create-resident');
        Route::post('resident', 'ResidentController@save')->name('save-resident');
    });
});

Route::group(['prefix' => 'proprietario', 'middleware' => ['role:resident']], function() {
    Route::get('painel', 'ResidentController@index')->name('resident-panel');
});
