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

Route::get('/about', function () {
    return view('about');
});

Route::get('/privacy', function () {
    return view('privacy');
});

Route::get('/faq', function () {
    return view('faq');
});

Route::get('/validation', function () {
    return view('validation');
});

Route::get('/return-policy', function () {
    return view('return-policy');
});

Route::get('/terms-and-conditions', function () {
    return view('terms-and-conditions');
});

Route::get('/fonts', 'ViewController@pageFonts');

Route::get('/cliparts', 'ViewController@pageClipartList');

Route::get('/colors', 'ViewController@pageColorList');

Route::get('/sizes', 'ViewController@pageSizeChart');

Route::get('/gallery', 'ViewController@pageProductGallery');

Route::get('/price', 'ViewController@pagePrices');

Route::get('/quote', 'ViewController@pageQuote');

Route::get('/schoolpo', 'ViewController@pageSchoolPO');

Route::get('/digitaldesign', 'ViewController@pageDigitalDesign');

Route::get('/product', function () {
    return redirect('/');
});

Route::get('/product/{style}', 'ViewController@viewProduct');

Route::get('/contact', function () {
    return view('contact');
});

// Route::get('/sample', function () {
//     return view('sample');
// });

Route::get('/message', function () {
    return view('message');
});

Route::get('/order', 'OrderController@index');

Route::get('/wb/colorsS', 'OrderController@getWristbandColor');

Route::match(['get', 'post'], '/wb/colorsSS', 'OrderController@getWristbandColorsByStyleSize');

Route::get('/preview', 'PreviewController@makePreview');

Route::get('/mailTest', 'OrderController@mailTest');

Route::post('/getPriceShipAndProd', 'OrderController@getPriceShipAndProd');

Route::get('/getTemplateCustomWristband', 'TemplateController@getCustomWristband');

Route::post('/upload', 'UploadController@uploadTemp');

Route::post('/upload/{index}', 'UploadController@updateTemp');

Route::get('/cart', 'CartController@index');

Route::post('/cart/add', 'CartController@cartAdd');

Route::get('/cart/update', function () {
    return redirect('/order');
});

Route::get('/cart/update/{index}', 'CartController@cartUpdate');

Route::post('/cart/update/{index}', 'CartController@cartUpdateStart');

Route::post('/cart/delete', 'CartController@cartDelete');

Route::post('/cart/clear', 'CartController@cartClear');

Route::post('/cart/submit', 'CartController@cartSubmit');

Route::get('/submit/success', 'ViewController@submitSuccess');

Route::post('/quote/send', 'ViewController@mailTest');

Route::post('/schoolpo/send', 'ViewController@mailTestSchoolpo');

Route::post('/digitaldesign/send', 'ViewController@mailTestDigital');

//Login Routes...
Route::get('/admin/login', 'AuthAdmin\AuthController@showLoginForm');
Route::post('/admin/login', 'AuthAdmin\AuthController@login');
Route::get('/admin/logout', 'AuthAdmin\AuthController@logout');

// Registration Routes...
Route::get('admin/register', 'AuthAdmin\AuthController@showRegistrationForm');
Route::post('admin/register', 'AuthAdmin\AuthController@register');

Route::get('/admin', 'AdminController@index');
