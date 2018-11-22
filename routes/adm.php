<?php

Route::get('/adm/login', 'Adm\Login@index')->name('login'); //login
Route::post('/adm/login/logar', 'Adm\Login@logar')->name('logar'); //logar
Route::get('/adm/login/sair', 'Adm\Login@sair')->name('sair'); //sair



Route::group(["middleware" => "auth:adm"], function() {
    
    //File Upload
    Route::get('/laravel-filemanage', '\UniSharp\LaravelFilemanager\Controllers\LfmController@show');
    Route::post('/laravel-filemanage/upload', '\UniSharp\LaravelFilemanager\Controllers\UploadController@upload');
    
    
    Route::get('/adm/painel', 'Adm\Painel@index')->name('painel');

    Route::resource('adm/painel/usuario', 'Adm\PainelUsuario');
    Route::get('adm/painel/usuario/destroy/{id}', 'Adm\PainelUsuario@destroy');
});


