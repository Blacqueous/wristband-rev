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
}