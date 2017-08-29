<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AddOns;
use App\Models\MoldingFee;
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

		$moldingFee = new MoldingFee();
		$data['molding_fee'] = $moldingFee->getJSONPrice()[0];
		
		$price = new Prices();
		$data['prices'] = $price->getJSONPrice();
		$data['addons'] = $price->getJSONAddOn();

        return view('order_quote', $data);
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
		
		$moldingFee = new MoldingFee();
		$data['molding_fee'] = $moldingFee->getJSONPrice()[0];

		$price = new Prices();
		$data['prices'] = $price->getJSONPrice();
		$data['addons'] = $price->getJSONAddOn();

        return view('order_schoolpo', $data);
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
		
		$moldingFee = new MoldingFee();
		$data['molding_fee'] = $moldingFee->getJSONPrice()[0];
		
		$price = new Prices();
		$data['prices'] = $price->getJSONPrice();
		$data['addons'] = $price->getJSONAddOn();

        return view('order_digitaldesign', $data);
	}


	public function mailTest(Request $request)
	{
		$data = $this->organizeMailData($request->data);
		$emailItems = $request->email;
		$email = $emailItems['mail'];
		$name = $emailItems['name'];
		$emailData = array('name' => $name, 'email'=> $email, 'items'=> $data);
		$emails = [$email,'sales@promotionalwristband.com'];

		Mail::send('mailtemp', $emailData, function ($message) use ($emails) {
            $message->from('sales@promotionalwristband.com', 'Request Quote');
            $message->to($emails, 'Promotional Wristband')->subject('Request a Quote');
         });

		return view('/mailtemp', $emailData);
	}

	public function mailTestSchoolpo(Request $request)
	{
		$data = $this->organizeMailData($request->data);
		$emailItems = $request->email;
		$email = $emailItems['mail'];
		$name = $emailItems['name'];
		$emailData = array('name'=>$name, 'email'=> $email, 'items'=> $data);
		$emails = [$email,'sales@promotionalwristband.com'];

		Mail::send('schoolpotemp',$emailData, function ($message) use ($emails) {
            $message->from('sales@promotionalwristband.com', 'School PO Request');
            $message->to($emails, 'Promotional Wristband')->subject('School PO Request');
         });

		return view('/schoolpotemp', $emailData);
	}

	public function mailTestDigital(Request $request)
	{
		$data = $this->organizeMailData($request->data);
		$emailItems = $request->email;
		$email = $emailItems['mail'];
		$name = $emailItems['name'];
		$emailData = array('name'=>$name, 'email'=> $email, 'items'=> $data);
		$emails = [$email,'sales@promotionalwristband.com'];

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

				return view('checkout', $data);
			}
		}

		return redirect('/');
	}

	public function viewProduct(Request $request)
	{
		$data = [];
		$styles = new Styles();
		$data['styles'] = $styles->getStyles();

		if(!isset($data['styles'][$request->style])) { return redirect('/'); }
		$data['style'] = isset($request->style) ? $request->style : 'printed';

		$sizes = new Sizes();
		$data['sizes'] = $sizes->getSizes();

		$price = new Prices();
		$data['prices'] = $price->getJSONPrices();

		switch ($request->style) {
			case 'printed':
				return view('product-printed', $data);
				break;

			case 'debossed':
				return view('product-debossed', $data);
				break;

			case 'ink-injected':
				return view('product-ink-injected', $data);
				break;

			case 'embossed':
				return view('product-embossed', $data);
				break;

			case 'figured':
				return view('product-figured', $data);
				break;

			case 'embossed-printed':
				return view('product-embossed-printed', $data);
				break;

			case 'dual-layer':
				return view('product-dual-layer', $data);
				break;

			case 'blank':
				return view('product-blank', $data);
				break;

			default:
				return view('product-printed', $data);
				break;
		}

	}

	private function organizeMailData($data=[])
	{
		if (empty($data)) { return false; }

		$dataCart = [
			"OrderNo" => 0,
			"TotalAmount" => $data["total"],
			"ItemDesc" => ucwords(strtolower(str_replace("-", " ", trim($data["style"]))))." Wristband",
			"BandSize" => $this->getWristbandsSizeName($data["size"]),
			"BandColors" => [],
			"Font" => "",
			"MessageFront" => (isset($data["texts"]["front"]["text"])) ? $data["texts"]["front"]["text"] : "",
			"MessageBack" => (isset($data["texts"]["back"]["text"])) ? $data["texts"]["back"]["text"] : "",
			"MessageInside" => (isset($data["texts"]["inside"]["text"])) ? $data["texts"]["inside"]["text"] : "",
			"MessageContinuous" => (isset($data["texts"]["continue"]["text"])) ? $data["texts"]["continue"]["text"] : "",
			"FreeWristband" => [],
			"FreeKeychain" => [],
			"ProductionTime" => $data["time_production"]["days"]." Days",
			"ShippingTime" => $data["time_shipping"]["days"]." Days",
		];

		$classFont = new FontList();
		$classFont = $classFont->getFonts();
		foreach ($classFont as $key => $value) {
			if ($value["code"] == $data["fonts"]) {
				$dataCart["Font"] = $value["name"];
			}
		}

		$customCount = 0;

		foreach ($data['items']['data'] as $stylesKey => $items) {

			$data_cart_item_attr = [];
			$data_cart_item_addons = [];
			$item_qty = 0;

			foreach ($items['list'] as $variantsKey => $variants) {

				foreach ($variants as $key => $item) {

					if (is_array($item)) {

						$itemNameSize = "Medium";
						switch ($item['size']) {
							case 'yt': $itemNameSize = "Youth"; break;
							case 'md': $itemNameSize = "Medium"; break;
							case 'ad': $itemNameSize = "Adult"; break;
							case 'xs': $itemNameSize = "ExtraSmall"; break;
							case 'xl': $itemNameSize = "ExtraLarge"; break;
							default: $itemNameSize = "Medium"; break;
						}

						$itemNameColor = strtolower(str_replace('-', ' ', $item['color_title']));
						$itemNameColor = str_replace(',', ', ', $itemNameColor);
						$itemNameColor = ucwords($itemNameColor);
						$itemNameColor = str_replace(', ', ',', $itemNameColor);

						$isCustom = false;

						if (strpos(strtolower($item['title']), "custom") !== false) {
							$name = $itemNameSize."_".$item['style']."_Custom"."_".++$customCount;
							$isCustom = true;
						} else {
							$name = $itemNameSize."_".$item['style']."_".str_replace(' ', '', $itemNameColor);
						}

						if ($isCustom) {
							$dataCart["BandColors"][] = [
								"Name" => $name,
								"Qty" => $item['qty'],
								"FontColor" => ucwords(strtolower(str_replace("-", " ", $item["font_title"]))),
								"CustomColors" => json_encode(explode(",", $itemNameColor))
							];
						} else {
							$dataCart["BandColors"][] = [
								"Name" => $name,
								"Qty" => $item['qty'],
								"FontColor" => ucwords(strtolower(str_replace("-", " ", $item["font_title"])))
							];
						}
					}
				}
			}
		}

		$customCount = 0;

		foreach ($data['free']['wristbands'] as $freeKeyType => $freeType) {
			if (is_array($freeType) || is_object($value)) {
				foreach ($freeType as $freeKeyItems => $freeItems) {
					foreach ($freeItems as $freeKeyItem => $freeItem) {

						foreach ($freeItem as $key => $item) {
							if (is_array($item) || is_object($item)) {
		
								$itemNameSize = "Medium";
								switch ($item['size']) {
									case 'yt': $itemNameSize = "Youth"; break;
									case 'md': $itemNameSize = "Medium"; break;
									case 'ad': $itemNameSize = "Adult"; break;
									case 'xs': $itemNameSize = "ExtraSmall"; break;
									case 'xl': $itemNameSize = "ExtraLarge"; break;
									default: $itemNameSize = "Medium"; break;
								}
		
								$itemNameColor = strtolower(str_replace('-', ' ', $freeItem['color_title']));
								$itemNameColor = str_replace(',', ', ', $itemNameColor);
								$itemNameColor = ucwords($itemNameColor);
								$itemNameColor = str_replace(', ', ',', $itemNameColor);
		
								$isCustom = false;
		
								if (strpos(strtolower($freeItem['title']), "custom") !== false) {
									$name = $itemNameSize."_".$freeItem['style']."_Custom"."_".++$customCount;
									$isCustom = true;
								} else {
									$name = $itemNameSize."_".$freeItem['style']."_".str_replace(' ', '', $itemNameColor);
								}
		
								if ($isCustom) {
									$dataCart["FreeWristband"][] = [
										"Name" => $name,
										"Qty" => $item['qty'],
										"FontColor" => ucwords(strtolower(str_replace("-", " ", $item["font_title"]))),
										"CustomColors" => json_encode(explode(',', $itemNameColor))
									];
								} else {
									$dataCart["FreeWristband"][] = [
										"Name" => $name,
										"Qty" => $item['qty'],
										"FontColor" => ucwords(strtolower(str_replace("-", " ", $item["font_title"])))
									];
								}

							}
						}
					}
				}
			}
		}

		$customCount = 0;

		foreach ($data['free']['key-chain'] as $freeKeyType => $freeType) {
			if (is_array($freeType) || is_object($value)) {
				foreach ($freeType as $freeKeyItems => $freeItems) {
					foreach ($freeItems as $freeKeyItem => $freeItem) {

						foreach ($freeItem as $key => $item) {
							if (is_array($item) || is_object($item)) {
		
								$itemNameSize = "Medium";
								switch ($item['size']) {
									case 'yt': $itemNameSize = "Youth"; break;
									case 'md': $itemNameSize = "Medium"; break;
									case 'ad': $itemNameSize = "Adult"; break;
									case 'xs': $itemNameSize = "ExtraSmall"; break;
									case 'xl': $itemNameSize = "ExtraLarge"; break;
									default: $itemNameSize = "Medium"; break;
								}
		
								$itemNameColor = strtolower(str_replace('-', ' ', $freeItem['color_title']));
								$itemNameColor = str_replace(',', ', ', $itemNameColor);
								$itemNameColor = ucwords($itemNameColor);
								$itemNameColor = str_replace(', ', ',', $itemNameColor);
		
								$isCustom = false;
		
								if (strpos(strtolower($freeItem['title']), "custom") !== false) {
									$name = $itemNameSize."_".$freeItem['style']."_Custom"."_".++$customCount;
									$isCustom = true;
								} else {
									$name = $itemNameSize."_".$freeItem['style']."_".str_replace(' ', '', $itemNameColor);
								}
		
								if ($isCustom) {
									$dataCart["FreeKeychain"][] = [
										"Name" => $name,
										"Qty" => $item['qty'],
										"FontColor" => ucwords(strtolower(str_replace("-", " ", $item["font_title"]))),
										"CustomColors" => json_encode(explode(',', $itemNameColor))
									];
								} else {
									$dataCart["FreeKeychain"][] = [
										"Name" => $name,
										"Qty" => $item['qty'],
										"FontColor" => ucwords(strtolower(str_replace("-", " ", $item["font_title"])))
									];
								}
							}
						}
					}
				}
			}
		}

		return $dataCart;
	}

	private function getWristbandsSizeName($size="")
	{
		$name = "";
		switch($size) {
			case '0-25inch': $name = "1/4 inch (0.25 in)"; break;
			case '0-50inch': $name = "1/2 inch (0.50 in)"; break;
			case '0-75inch': $name = "3/4 inch (0.75 in)"; break;
			case '1-00inch': $name = "1 inch (1.00 in)"; break;
			case '1-50inch': $name = "1 1/2 inch (1.50 in)"; break;
			case '2-00inch': $name = "2 inch (2.00 in)"; break;
			default: $name = "1/2 inch (0.50 in)"; break;
		}
		return $name;
	}

}
