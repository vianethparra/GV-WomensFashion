<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'controller@principal');
Route::get('/catalogo', 'controller@catalogo');
Route::get('/carrito', 'controller@carrito');
Route::get('/contacto', 'controller@contacto');
Route::get('/cuenta', 'controller@cuenta');
Route::get('/log', 'controller@log');
Route::get('/FAQ', 'controller@faq');
Route::get('/QuienesSomos', 'controller@somos');