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
Route::get('/checkout', 'controller@checkout');
Route::get('/contacto', 'controller@contacto');
Route::get('/cuenta', 'controller@cuenta');
Route::get('/log', 'controller@log');
Route::get('/FAQ', 'controller@faq');
Route::get('/quienesSomos', 'controller@somos');

Route::get('/articulo', 'controller@articulo');

//------------------------------------------------------------------

Route::get('/admin', 'adminController@log');
Route::post('/adminLog', 'adminController@adminlog');
Route::get('/inicio', 'adminController@inicio');

Route::get('/generarArticulo', 'adminController@generarArticulo');
Route::post('/guardarArticulo', 'adminController@guardarArticulo');
Route::get('/consultarArticulos', 'adminController@consultarArticulos');
Route::get('/editar/{id}', 'adminController@editar');
Route::post('/editarArticulo/{id}', 'adminController@editarArticulo');
Route::get('/eliminarArticulo/{id}', 'adminController@eliminarArticulo');

Route::get('/comentarios/{id}', 'adminController@comentarios');
Route::get('/eliminarComentario/{id}/{art}', 'adminController@eliminarComentario');

Route::get('/consultarCategorias', 'adminController@categorias');
Route::get('/consultarPedidos', 'adminController@pedidos');