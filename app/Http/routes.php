<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/dashboard', 'HomeController@index');
Route::get('/top-up', 'HomeController@top_up');

Route::post('/forecast_parkage','HomeController@forecast');
//Route::get('/dashboard','')
Route::get('/testdiff','HomeController@diffday');