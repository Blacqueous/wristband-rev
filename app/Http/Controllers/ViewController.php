<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AddOns;
use App\Models\Prices;
use App\Models\TimeProduction;
use App\Models\TimeShipping;
use App\Wristbands\Classes\ClipartList;
use App\Wristbands\Classes\Colors;
use App\Wristbands\Classes\ColorsList;
use App\Wristbands\Classes\FontList;
use App\Wristbands\Classes\Styles;
use App\Wristbands\Classes\Sizes;
use App\Wristbands\Classes\SizeChart;
use App\Wristbands\Classes\ProductGallery;
use Illuminate\Http\Request;
use Mail;
use Session;
use Storage;

class ViewController extends Controller
{
	
	public function pageFonts()
	{
		$font = new FontList();
		$font = $font->getFonts();
		$data = [
			'fonts' => $font
		];

        return view('fonts', $data);
	}
	
	
	public function pageClipartList()
	{
		$cliparts = new ClipartList();
		$cliparts = $cliparts->getCliparts();
		$data = [
			'cliparts' => $cliparts
		];

        return view('cliparts', $data);
	}
	
	
	public function pageColorList()
	{
		$colorsList = new ColorsList();
		$colorsList = $colorsList->getColors();
		$data = [
			'colors' => $colorsList
		];

        return view('colors', $data);
	}
	
	public function pageSizeChart()
	{
		
		$sizechart = new SizeChart();
		$sizechart = $sizechart->getSizeChart();
		$data = [
			'sizes' => $sizechart
		];

        return view('sizes', $data);
	}
	
	public function pageProductGallery()
	{
		
		$gallery = new ProductGallery();
		$gallery = $gallery->getProductGallery();
		$data = [
			'gallery' => $gallery
		];

        return view('gallery', $data);
	}
	
	public function pagePrices()
	{
		$data = [];
		$styles = new Styles();
		$data['style'] = $styles->getStyles();
		
		
		$style = isset($request->style) && isset($data['styles'][$request->style]) ? $request->style : 'printed';
		$data['style'] = $style;
		
		$sizes = new Sizes();
		$data['sizes'] = $sizes->getSizes();
		
		$price = new Prices();
		$data['prices'] = $price->getJSONPrices();
		
        return view('price', $data);
	}
	
	public function pageQuote()
	{
		$data = [];

		$styles = new Styles();
		$data['styles'] = $styles->getStyles();

		$style = isset($request->style) && isset($data['styles'][$request->style]) ? $request->style : 'printed';
		$data['style'] = $style;

		$sizes = new Sizes();
		$data['sizes'] = $sizes->getSizes();

		$colors = new Colors();
		$data['colors'] = $colors->getColors();

		$list_color = new ColorsList();
		$data['list_colors'] = $list_color->getColors();

		$list_clipart = new ClipartList();
		$data['list_cliparts'] = $list_clipart->getCliparts();

		$list_font = new FontList();
		$data['list_fonts'] = $list_font->getFonts();

		$price = new Prices();
		$data['prices'] = $price->getJSONPrice();
		$data['addons'] = $price->getJSONAddOn();

        return view('quote', $data);
	}
	
	public function mailTest(Request $request)
	{
		//return json_encode(false);
		$data = $request->data;
		
		Mail::send('welcome',$data, function ($m) use ($request) {
            $m->from('sales@promotionalwristband.com', 'Your Application');
            $m->to('sales@promotionalwristband.com', 'Promotional Wristband')->subject('Your Reminder!');
         });

		return view('welcome', $request);
	}
}