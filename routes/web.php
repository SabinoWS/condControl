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
        Route::get('editar/{id}', 'CondominiumController@edit')->name('edit-condominium');
        Route::post('editar', 'CondominiumController@update')->name('update-condominium');
        Route::post('deletar', 'CondominiumController@delete')->name('delete-condominium');
    });
});

Route::group(['prefix' => 'sindico', 'middleware' => ['role:manager']], function() {
    Route::prefix('gerenciar-proprietarios')->group(function () {
        Route::get('listar', 'HolderController@management')->name('management-holder');
        Route::get('criar', 'HolderController@create')->name('create-holder');
        Route::post('criar', 'HolderController@save')->name('save-holder');
        Route::get('editar/{id}', 'HolderController@edit')->name('edit-holder');
        Route::post('editar', 'HolderController@update')->name('update-holder');
        Route::post('deletar', 'HolderController@delete')->name('delete-holder');
    });
});

Route::group(['prefix' => 'proprietario', 'middleware' => ['role:host']], function() {
    Route::get('painel', 'HostController@index')->name('host-panel');
    Route::prefix('criar')->group(function () {
        Route::get('resident', 'ResidentController@create')->name('create-resident');
        Route::post('resident', 'ResidentController@save')->name('save-resident');
    });
});

Route::group(['prefix' => 'morador', 'middleware' => ['role:resident']], function() {
    Route::get('painel', 'ResidentController@index')->name('resident-panel');
});
