<?php
Route::get('/', 'Web\Site@home');
Route::get('/home', 'Web\Site@home')->name('home');

Route::get('/blog', 'Web\Site@blog')->name('blog');



Route::get('/sobre-nos', 'Web\Site@sobreNos');
Route::get('/fale-conosco', 'Web\Site@faleConosco');

Route::get('/recursos', 'Web\Site@recursos');
Route::get('/faqs', 'Web\Site@faqs');
Route::get('/faqs/{url}', 'Web\Site@faqItem');

Route::resource('/email-assinatura', 'Web\EmailAssinante');
Route::resource('/email-fale-conosco', 'Web\EmailFaleConosco');

Route::get('/categoria/{url}', 'Web\Site@categoria');
Route::get('/error404','Web\Error@error404')->name('404');
Route::get('/error405','Web\Error@error405')->name('405');
Route::get('/{url}', 'Web\Site@artigo');



Route::fallback('Web\Error@error404');