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
Route::get('/contacto', 'controller@contacto');

Route::get('/registroUsuario', 'controller@registroUsuario');
Route::get('/log', 'controller@log');

Route::get('/FAQ', 'controller@faq');
Route::get('/quienesSomos', 'controller@somos');
Route::get('/error404', 'articuloController@error404');
//-----------------------------------------------------------------
Route::get('/mostrarCatalogo', 'articuloController@mostrarCatalogo');
Route::get('/por_Categoria/{id}', 'articuloController@por_Categoria');
Route::get('/articulo/{id}', 'articuloController@articulo');
Route::post('/por_Articulo', 'articuloController@por_Articulo');
Route::post('/escribirComentario /{id}', 'articuloController@escribirComentario ');
//------------------------------------------------------------------
Route::get('/pedido', 'pedidoController@pedido');
Route::post('/anadirAlCarrito/{id}', 'pedidoController@anadirAlCarrito');
Route::post('/cancelarProducto/{id}', 'pedidoController@cancelarProducto');
Route::post('/confirmarPedido/{id}', 'pedidoController@confirmarPedido');
Route::get('/consultarPedido/{id}', 'pedidoController@consultarPedido');
//------------------------------------------------------------------
Route::get('/admin', 'adminController@log');
Route::post('/adminLog', 'adminController@adminlog');
Route::get('/inicio', 'adminController@inicio');

Route::get('/generarArticulo', 'adminController@generarArticulo');
Route::post('/guardarArticulo', 'adminController@guardarArticulo');
Route::get('/generarArticuloCSV', 'adminController@generarArticuloCSV');
Route::post('/guardarArticuloCSV', 'adminController@guardarArticuloCSV');
Route::get('/consultarArticulos', 'adminController@consultarArticulos');
Route::get('/editar/{id}', 'adminController@editar');
Route::post('/editarArticulo/{id}', 'adminController@editarArticulo');
Route::get('/eliminarArticulo/{id}', 'adminController@eliminarArticulo');
Route::get('/comentarios/{id}', 'adminController@comentarios');
Route::get('/eliminarComentario/{id}/{art}', 'adminController@eliminarComentario');
Route::get('/consultarCategorias', 'adminController@categorias');
Route::get('/consultarPedidos', 'adminController@pedidos');

Auth::routes();
Route::get('/home', 'HomeController@index');


Route::get('/sendbasicemail','MailController@basic_email');
// Route::get('/sendhtmlemail','MailController@html_email');
// Route::get('/sendattachmentemail','MailController@attachment_email');