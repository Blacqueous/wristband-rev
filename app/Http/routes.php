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

use App\Models\Prices;
use App\Wristbands\Classes\Styles;
use App\Wristbands\Classes\Sizes;

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

Route::get('/product-printed', function() {

	$data = [];
	$styles = new Styles();
	$data['style'] = $styles->getStyles();

	$style = isset($request->style) && isset($data['styles'][$request->style]) ? $request->style : 'printed';
	$data['style'] = $style;

	$sizes = new Sizes();
	$data['sizes'] = $sizes->getSizes();

	$price = new Prices();
	$data['prices'] = $price->getJSONPrices();

	return view('product-printed', $data);

});

Route::get('/product-debossed', function() {

	$data = [];
	$styles = new Styles();
	$data['style'] = $styles->getStyles();

	$style = isset($request->style) && isset($data['styles'][$request->style]) ? $request->style : 'printed';
	$data['style'] = $style;

	$sizes = new Sizes();
	$data['sizes'] = $sizes->getSizes();

	$price = new Prices();
	$data['prices'] = $price->getJSONPrices();

	return view('product-debossed', $data);

});

Route::get('/product-ink-injected', function() {

	$data = [];
	$styles = new Styles();
	$data['style'] = $styles->getStyles();

	$style = isset($request->style) && isset($data['styles'][$request->style]) ? $request->style : 'printed';
	$data['style'] = $style;

	$sizes = new Sizes();
	$data['sizes'] = $sizes->getSizes();

	$price = new Prices();
	$data['prices'] = $price->getJSONPrices();

	return view('product-ink-injected', $data);

});

Route::get('/product-embossed', function() {

	$data = [];
	$styles = new Styles();
	$data['style'] = $styles->getStyles();

	$style = isset($request->style) && isset($data['styles'][$request->style]) ? $request->style : 'printed';
	$data['style'] = $style;

	$sizes = new Sizes();
	$data['sizes'] = $sizes->getSizes();

	$price = new Prices();
	$data['prices'] = $price->getJSONPrices();

	return view('product-embossed', $data);

});

Route::get('/product-figured', function() {

	$data = [];
	$styles = new Styles();
	$data['style'] = $styles->getStyles();

	$style = isset($request->style) && isset($data['styles'][$request->style]) ? $request->style : 'printed';
	$data['style'] = $style;

	$sizes = new Sizes();
	$data['sizes'] = $sizes->getSizes();

	$price = new Prices();
	$data['prices'] = $price->getJSONPrices();

	return view('product-figured', $data);

});

Route::get('/product-embossed-printed', function() {

	$data = [];
	$styles = new Styles();
	$data['style'] = $styles->getStyles();

	$style = isset($request->style) && isset($data['styles'][$request->style]) ? $request->style : 'printed';
	$data['style'] = $style;

	$sizes = new Sizes();
	$data['sizes'] = $sizes->getSizes();

	$price = new Prices();
	$data['prices'] = $price->getJSONPrices();

	return view('product-embossed-printed', $data);

});

Route::get('/product-dual-layer', function() {

	$data = [];
	$styles = new Styles();
	$data['style'] = $styles->getStyles();

	$style = isset($request->style) && isset($data['styles'][$request->style]) ? $request->style : 'printed';
	$data['style'] = $style;

	$sizes = new Sizes();
	$data['sizes'] = $sizes->getSizes();

	$price = new Prices();
	$data['prices'] = $price->getJSONPrices();

	return view('product-dual-layer', $data);

});

Route::get('/product-blank', function() {

	$data = [];
	$styles = new Styles();
	$data['style'] = $styles->getStyles();

	$style = isset($request->style) && isset($data['styles'][$request->style]) ? $request->style : 'printed';
	$data['style'] = $style;

	$sizes = new Sizes();
	$data['sizes'] = $sizes->getSizes();

	$price = new Prices();
	$data['prices'] = $price->getJSONPrices();

	return view('product-blank', $data);

});

Route::get('/contact', function () {
    return view('contact');
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

Route::get('/cart/update', function () {
    return redirect('/order');
});

Route::get('/cart/update/{index}', 'CartController@cartUpdate');

Route::post('/cart/delete', 'CartController@cartDelete');

Route::post('/cart/clear', 'CartController@cartClear');
