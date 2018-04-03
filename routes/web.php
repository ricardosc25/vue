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
    return view('home');
});

Route::get('/crud', function () {
    return view('crud');
});

Route::resource('users','UserController', ['except' => 'show','create','edit']);

Route::get('mis-ideas','IdeaController@getIdeas');
Route::post('guardar-idea','IdeaController@store');
