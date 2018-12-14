<?php
Route::get('/', 'Web\Site@blog');
Route::get('/home', 'Web\Site@blog')->name('home');

Route::get('/blog', 'Web\Site@blog')->name('blog');

Route::get('/categoria/{id?}', 'Web\Site@categoria');
Route::get('/artigo/{id?}', 'Web\Site@artigo');
Route::get('/sobre-nos', 'Web\Site@sobreNos');
Route::get('/fale-conosco', 'Web\Site@faleConosco');

Route::resource('/email-assinatura', 'Web\EmailAssinante');
Route::resource('/email-fale-conosco', 'Web\EmailFaleConosco');

