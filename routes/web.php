<?php

Route::get('/', function () {
    // return view('welcome');
    return view('home.index');
});

Auth::routes();

Route::get('/painel', 'HomeController@index')->name('home');

Route::group(['prefix' => 'administrador', 'middleware' => ['role:admin']], function() {
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
    Route::prefix('gerenciar-noticias')->group(function () {
        Route::get('', 'NewsController@management')->name('management-news');
        Route::get('criar', 'NewsController@create')->name('create-news');
        Route::post('criar', 'NewsController@save')->name('save-news');
        Route::get('editar/{id}', 'NewsController@edit')->name('edit-news');
        Route::post('editar', 'NewsController@update')->name('update-news');
        Route::post('deletar', 'NewsController@delete')->name('delete-news');
    });
    Route::prefix('gerenciar-locais')->group(function () {
        Route::get('', 'LocalController@management')->name('management-local');
        Route::get('criar', 'LocalController@create')->name('create-local');
        Route::post('criar', 'LocalController@save')->name('save-local');
        Route::get('editar/{id}', 'LocalController@edit')->name('edit-local');
        Route::post('editar', 'LocalController@update')->name('update-local');
        Route::post('deletar', 'LocalController@delete')->name('delete-local');
    });
});

Route::group(['prefix' => 'proprietario', 'middleware' => ['role:holder']], function() {
    Route::prefix('gerenciar-moradores')->group(function () {
        Route::get('listar', 'ResidentController@management')->name('management-resident');
        Route::get('criar', 'ResidentController@create')->name('create-resident');
        Route::post('criar', 'ResidentController@save')->name('save-resident');
        Route::get('editar/{id}', 'ResidentController@edit')->name('edit-resident');
        Route::post('editar', 'ResidentController@update')->name('update-resident');
        Route::post('deletar', 'ResidentController@delete')->name('delete-resident');
    });
});

Route::group(['prefix' => 'morador', 'middleware' => ['role:resident']], function() {

});
