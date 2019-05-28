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

Route::get('/', 'HomeController@index')->name('home');

Route::get('/compras', 'CompraController@index')->name('compras.index');
Route::get('/compras-orden', 'CompraController@orden')->name('compras.orden');

Route::get('/pelicula/{genero}', 'PeliculaController')->name('pelicula');
