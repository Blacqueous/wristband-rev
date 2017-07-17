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
use Illuminate\Http\Request;
use Mail;
use Session;
use Storage;
use net\authorize\api\contract\v1 as AnetAPI;

class OrderController extends Controller
{

	public function index(Request $request)
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

        return view('order', $data);
	}

	public function getDataSizesByStyle($style=null)
	{
		$sizes = new Sizes();
		$relationship = $sizes->getSizesByStyle($style);
		$sizes_info = $sizes->getSizes();
		$data = [];

		if($relationship) {
			foreach ($relationship as $key => $value) {
				if(isset($sizes_info[$value]))
					$data[$key] = $sizes_info[$value];
			}
		}

		return $data;
	}

	public function getPriceShipAndProd(Request $request)
	{
		$timeProduction = new TimeProduction();
		$timeProduction = $timeProduction->getPriceByFilter($request->style, $request->size, $request->quantity);
		$timeProduction = json_decode(json_encode($timeProduction), true);

		$timeShipping = new TimeShipping();
		$timeShipping = $timeShipping->getPriceByFilter($request->style, $request->size, $request->quantity);
		$timeShipping = json_decode(json_encode($timeShipping), true);

		return ['production' => $timeProduction, 'shipping' => $timeShipping];
	}

	public function getWristbandColors() {}

	public function getWristbandColorsByStyleSize(Request $request)
	{
		$colors = new Colors();
		$colors = $colors->getColorByStyleSize($request->style, $request->size);

		return $colors;
	}

	public function mailTest(Request $request)
	{
		Mail::send('welcome', [], function ($m) use ($request) {
            $m->from('egrubellano@gmail.com', 'Your Application');
            $m->to('egrubellano@gmail.com', 'EGR')->subject('Your Reminder!');
        });

		return view('welcome', $request);
	}

}
