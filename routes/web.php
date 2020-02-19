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
    return view('login');
});

//Route::get('/admin/'function () {
//    return view('welcome');
//});




//Route::get('/test', 'UsersController@index');

Route::get('logout', 'Controller@logout');
Route::get('login', 'Controller@login');
Route::post('login', 'Controller@authenticate');
Route::get('about', 'Controller@about');
Route::get('navbar', 'Controller@navbar');
Route::get('welcome', 'Controller@navbar');


Route::resource('eprofile', 'UsersController');
Route::post('eprofile/{id}', 'UsersController@update');







/*Route::get('eprofile', 'UsersController');
Route::post('eprofile', 'UsersController@update');*/







