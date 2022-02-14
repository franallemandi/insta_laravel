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
    return view('index');
})->name('index');
Route::post('/inicio_sesion', 'UsuarioController@check')->name('inicio_sesion');

Route::get('/pag_registro', function () {
    return view('pag_registro');
})->name('pag_registro');
Route::post('/registro', 'UsuarioController@store')->name('registro');

Route::get('/feed', 'PosteoController@show')->name('feed');
Route::get('/feed/{usuario}', 'PosteoController@show')->name('feed-uno');
Route::get('/feed', 'PosteoController@index')->name('feed-todos');

Route::post('/postear', 'PosteoController@store')->name('postear');

