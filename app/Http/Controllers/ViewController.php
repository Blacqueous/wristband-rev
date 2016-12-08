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


	public function pageSchoolPO()
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

        return view('schoolpo', $data);
	}

	public function pageDigitalDesign()
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

        return view('digitaldesign', $data);
	}


	public function mailTest(Request $request)
	{

		$data = $request->data;
		$emailItems = $request->email;
		$email = $emailItems['mail'];
		$name = $emailItems['name'];
		$emailData = array('name'=>$name, 'email'=> $email, 'items'=> $data);
		$emails = [$email,'sales@promotionalwristband.com'];

		/*;
		return json_encode($list);exit;
		*/

		Mail::send('mailtemp',$emailData, function ($message) use ($emails) {
            $message->from('sales@promotionalwristband.com', 'Request Quote');
            $message->to($emails, 'Promotional Wristband')->subject('Request a Quote');
         });

		return view('/mailtemp', $data)->json(array('status'=> 'true'), 200);
	}

	public function mailTestSchoolpo(Request $request)
	{

		$data = $request->data;
		$emailItems = $request->email;
		$email = $emailItems['mail'];
		$name = $emailItems['name'];
		$emailData = array('name'=>$name, 'email'=> $email, 'items'=> $data);
		$emails = [$email,'sales@promotionalwristband.com'];

		/*;
		return json_encode($list);exit;
		*/

		Mail::send('schoolpotemp',$emailData, function ($message) use ($emails) {
            $message->from('sales@promotionalwristband.com', 'School PO Request');
            $message->to($emails, 'Promotional Wristband')->subject('School PO Request');
         });

		return view('/schoolpotemp', $emailData);
	}

	public function mailTestDigital(Request $request)
	{

		$data = $request->data;
		$emailItems = $request->email;
		$email = $emailItems['mail'];
		$name = $emailItems['name'];
		$emailData = array('name'=>$name, 'email'=> $email, 'items'=> $data);
		$emails = [$email,'sales@promotionalwristband.com'];

		/*;
		return json_encode($list);exit;
		*/

		Mail::send('digitaltemp',$emailData, function ($message) use ($emails) {
            $message->from('sales@promotionalwristband.com', 'Digital Design Request');
            $message->to($emails, 'Promotional Wristband')->subject('Digital Design Request');
         });

		return view('/digitaltemp', $emailData);
	}

	public function submitSuccess(Request $request)
	{
		if(Session::has('order_status')) {
			if(Session::get('order_status') == true) {
				$data = [
					'items' => Session::get('order_items')
				];
				return view('order_success', $data);
			}
		}

		return redirect('/');
	}

}
