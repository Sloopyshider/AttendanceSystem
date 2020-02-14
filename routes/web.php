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

//Route::get('/admin/', function () {
//    return view('welcome');
//});

//Route::get('eprofile', function(){
//    return view('pages.eprofile');
//});



/*Samples*/
//Route::get('welcome', 'Controller@navbar');
//Route::get('navbar', 'Controller@navbar');
Route::get('/test', 'UserController@index');
Route::get('about', 'Controller@about');


/*Needs*/
Route::get('logout', 'Controller@logout');
Route::get('login', 'Controller@login');
Route::post('login', 'Controller@authenticate');
Route::get('eprofile', 'Controller@profile');

Route::get('record', 'Controller@record');

Route::resource('intime', 'TimeIn');


Route::get('intime', 'TimeController@index');

//Route::get('intime', 'TimeController@intimes');

Route::post('submit', 'TimeController@timeout');


//Route::get('/intime/{id}', 'TimeController@intimes');










