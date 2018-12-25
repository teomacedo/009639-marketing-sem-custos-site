<?php
Route::get('/', 'Web\Site@home');
Route::get('/home', 'Web\Site@home')->name('home');

Route::get('/blog', 'Web\Site@blog')->name('blog');



Route::get('/sobre-nos', 'Web\Site@sobreNos');
Route::get('/fale-conosco', 'Web\Site@faleConosco');

Route::resource('/email-assinatura', 'Web\EmailAssinante');
Route::resource('/email-fale-conosco', 'Web\EmailFaleConosco');

Route::get('/categoria/{url}', 'Web\Site@categoria');
Route::get('/{url}', 'Web\Site@artigo');

