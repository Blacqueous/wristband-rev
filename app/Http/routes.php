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
    return view('homepage');
});

Route::get('/sample', function () {
    return view('sample');
});

Route::get('/order', 'OrderController@index');

Route::get('/wb/colorsS', 'OrderController@getWristbandColor');

Route::match(['get', 'post'], '/wb/colorsSS', 'OrderController@getWristbandColorsByStyleSize');

Route::get('/preview', 'PreviewController@makePreview');

Route::get('/mailTest', 'OrderController@mailTest');

Route::post('/getPriceShipAndProd', 'OrderController@getPriceShipAndProd');

Route::get('/getTemplateCustomWristband', 'TemplateController@getCustomWristband');

Route::post('/upload', 'UploadController@uploadTemp');

Route::get('/cart', 'CartController@index');

Route::post('/cart/add', 'CartController@cartAdd');

Route::post('/cart/remove', 'CartController@cartRemove');

Route::post('/cart/clear', 'CartController@cartClear');
