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
    
    Route::resource('adm/painel/artigo-categoria', 'Adm\PainelArtigoCategoria');
    Route::get('adm/painel/artigo-categoria/destroy/{id}', 'Adm\PainelArtigoCategoria@destroy'); 
    
    Route::resource('adm/painel/artigo', 'Adm\PainelArtigo');
    Route::get('adm/painel/artigo/destroy/{id}', 'Adm\PainelArtigo@destroy'); 
    
    Route::get('adm/painel/artigo-componente/{foreign?}', 'Adm\PainelArtigoComponente@index'); 
    Route::get('adm/painel/artigo-componente/create/{foreign?}', 'Adm\PainelArtigoComponente@create'); 
    Route::get('adm/painel/artigo-componente/{id}/edit/{foreign?}', 'Adm\PainelArtigoComponente@edit'); 
    Route::get('adm/painel/artigo-componente/destroy/{id}/{foreign?}', 'Adm\PainelArtigoComponente@destroy'); 
    Route::resource('adm/painel/artigo-componente', 'Adm\PainelArtigoComponente');
    
    Route::resource('adm/painel/artigo-conclusao', 'Adm\PainelArtigoConclusao');
    Route::get('adm/painel/artigo-conclusao/destroy/{id}', 'Adm\PainelArtigoConclusao@destroy'); 
    
    Route::resource('adm/painel/empresa', 'Adm\PainelEmpresa');
    Route::get('adm/painel/empresa/destroy/{id}', 'Adm\PainelEmpresa@destroy'); 
    
    Route::resource('adm/painel/endereco', 'Adm\PainelEndereco');
    Route::get('adm/painel/endereco/destroy/{id}', 'Adm\PainelEndereco@destroy'); 
    
    Route::resource('adm/painel/rede-social', 'Adm\PainelRedeSocial');
    Route::get('adm/painel/rede-social/destroy/{id}', 'Adm\PainelRedeSocial@destroy'); 
    
    Route::resource('adm/painel/telefone', 'Adm\PainelTelefone');
    Route::get('adm/painel/telefone/destroy/{id}', 'Adm\PainelTelefone@destroy'); 
    
    Route::resource('adm/painel/email', 'Adm\PainelEmail');
    Route::get('adm/painel/email/destroy/{id}', 'Adm\PainelEmail@destroy'); 
    
    Route::resource('adm/painel/sobre-nos', 'Adm\PainelSobreNos');
    Route::get('adm/painel/sobre-nos/destroy/{id}', 'Adm\PainelSobreNos@destroy'); 
    
    Route::resource('adm/painel/assinante', 'Adm\PainelAssinante');
    Route::get('adm/painel/assinante/destroy/{id}', 'Adm\PainelAssinante@destroy'); 
    
    Route::resource('adm/painel/fale-conosco', 'Adm\PainelFaleConosco');
    Route::get('adm/painel/fale-conosco/destroy/{id}', 'Adm\PainelFaleConosco@destroy'); 
    
    Route::resource('adm/painel/slide', 'Adm\PainelSlide');
    Route::get('adm/painel/slide/destroy/{id}', 'Adm\PainelSlide@destroy'); 
    
    Route::resource('adm/painel/chamada-principal', 'Adm\PainelChamadaPrincipal');
    Route::get('adm/painel/chamada-principal/destroy/{id}', 'Adm\PainelChamadaPrincipal@destroy'); 
    
    Route::resource('adm/painel/recurso-item', 'Adm\PainelRecurso');
    Route::get('adm/painel/recurso-item/destroy/{id}', 'Adm\PainelRecurso@destroy'); 
    
    Route::resource('adm/painel/recurso-chamada', 'Adm\PainelRecursoChamada');
    Route::get('adm/painel/recurso-chamada/destroy/{id}', 'Adm\PainelRecursoChamada@destroy'); 
    
    Route::resource('adm/painel/case-item', 'Adm\PainelCaseItem');
    Route::get('adm/painel/case-item/destroy/{id}', 'Adm\PainelCaseItem@destroy'); 
    
    Route::resource('adm/painel/case-chamada', 'Adm\PainelCaseChamada');
    Route::get('adm/painel/case-chamada/destroy/{id}', 'Adm\PainelCaseChamada@destroy');
    
    Route::resource('adm/painel/faq-item', 'Adm\PainelFaqItem');
    Route::get('adm/painel/faq-item/destroy/{id}', 'Adm\PainelFaqItem@destroy');
    
    Route::resource('adm/painel/faq-chamada', 'Adm\PainelFaqChamada');
    Route::get('adm/painel/faq-chamada/destroy/{id}', 'Adm\PainelFaqChamada@destroy');
    
    Route::resource('adm/painel/cliente-chamada', 'Adm\PainelClienteChamada');
    Route::get('adm/painel/cliente-chamada/destroy/{id}', 'Adm\PainelClienteChamada@destroy');
    
    Route::resource('adm/painel/cliente-exibivel', 'Adm\PainelClienteExibivel');
    Route::get('adm/painel/cliente-exibivel/destroy/{id}', 'Adm\PainelClienteExibivel@destroy');
    
    Route::resource('adm/painel/seo', 'Adm\PainelSeo');
});



