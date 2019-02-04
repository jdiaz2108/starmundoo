<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('website.index');
});

Route::get('/admin', 'AdminIndexController@Index');

Auth::routes();

Route::get('/admin/imagenes/{{slug}}/edit', 'AdminImagenController@edit');
Route::put('/admin/imagenes/{{slug}}', 'AdminImagenController@update');
Route::delete('/admin/imagenes/{{slug}}', 'AdminImagenController@destroy');
Route::resource('/admin/imagenes', 'AdminImagenController');

Route::get('/admin/subcategorias/{{slug}}/edit', 'AdminSubcategoriaController@edit');
Route::put('/admin/subcategorias/{{slug}}', 'AdminSubcategoriaController@update');
Route::delete('/admin/subcategorias/{{slug}}', 'AdminSubcategoriaController@destroy');
Route::resource('/admin/subcategorias', 'AdminSubcategoriaController');

Route::get('/admin/categorias/{{slug}}/edit', 'AdminCategoriaController@edit');
Route::put('/admin/categorias/{{slug}}', 'AdminCategoriaController@update');
Route::delete('/admin/categorias/{{slug}}', 'AdminCategoriaController@destroy');
Route::resource('/admin/categorias', 'AdminCategoriaController');

Route::get('/admin/contenidos/{{slug}}/edit', 'AdminContenidoController@edit');
Route::put('/admin/contenidos/{{slug}}', 'AdminContenidoController@update');
Route::delete('/admin/contenidos/{{slug}}', 'AdminContenidoController@destroy');
Route::resource('/admin/contenidos', 'AdminContenidoController');

Route::get('/admin/videos/{{slug}}/edit', 'AdminVideoController@edit');
Route::put('/admin/videos/{{slug}}', 'AdminVideoController@update');
Route::delete('/admin/videos/{{slug}}', 'AdminVideoController@destroy');
Route::resource('/admin/videos', 'AdminVideoController');

Route::get('/Subcategoria/{slug}', 'SubcategoriaController@show');

Route::get('/home', 'HomeController@index')->name('home');


Route::resource('/contacto', 'ContactoController');
