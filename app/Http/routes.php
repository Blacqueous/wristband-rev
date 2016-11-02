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

Route::get('/', function () { return view('homepage'); });

Route::get('/sample', function () { return view('sample'); });

Route::get('/order', 'OrderController@index');

Route::get('/wb/colors_s', 'OrderController@getWristbandColor');

Route::match(['get', 'post'], '/wb/colors_ss', 'OrderController@getWristbandColorsByStyleSize');
