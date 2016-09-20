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
Route::post('/top_up', 'HomeController@top_up_process');

Route::get('/address_chn','HomeController@address_chn');
Route::get('/address_rec','HomeController@address_rec');

Route::post('/forecast_parkage','HomeController@forecast');
Route::post('/parkage_edit','HomeController@parkage_edit');
Route::get('/parkage_edit/{id}','HomeController@show_parkage_edit');
Route::get('/getParkageContent/{id}','publicController@getParkageContent');
//Route::get('/shipParkage/{id}','HomeController@selectAddress');
Route::get('/service/{id}','HomeController@selectServiceSingle');
Route::post('/service','HomeController@selectService');
Route::post('/next_ship','HomeController@selectAddress');
Route::post('/next_carrier','HomeController@selectcarrier');
Route::post('/order_review','HomeController@orderReview');



//Route::get('/dashboard','')
Route::get('/testdiff','HomeController@diffday');

Route::get('/rate/{code}','publicController@currency_rate');

Route::post('/add_address','HomeController@add_address');
Route::get('/del_address/{id}','HomeController@del_address');
Route::post('/edit_address/{id}','HomeController@edit_address');


Route::get('/console','AdminController@package_console');
Route::post('/entry_shipNo','AdminController@entry_shipNo');

Route::get('/getName/{id}','publicController@getUserName');
Route::get('/getforecast/{track_number}','publicController@getForecast');
Route::get('/getspace/{number}','publicController@getspace');