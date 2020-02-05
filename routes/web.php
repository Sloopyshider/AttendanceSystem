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


});

Route::get('/test', 'UserController@index');

Route::get('login', 'Controller@login');
Route::post('login', 'Controller@authenticate');
