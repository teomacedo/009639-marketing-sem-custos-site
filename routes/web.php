<?php

Route::get('/', 'Web\ControllerSite@home');

Route::get('/link/{link}', 'Web\ControllerSite@link');
