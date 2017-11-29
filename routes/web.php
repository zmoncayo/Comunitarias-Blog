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
    return view('auth.login'); //ZMC PARA QUE EL INICIO SEA EL LOGIN 27NOV
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home'); //ZMC Me voy al metodo index del HomeController y la vista siempre se llamara "home"

Route::resource('post','PostController');
Route::resource('comment','CommentController');

Route::get('sisblog','PostController@all');