<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Wristbands\Classes\Colors;
use App\Wristbands\Classes\Styles;
use App\Wristbands\Classes\Sizes;
use Illuminate\Http\Request;
use Session;
use Storage;

class OrderController extends Controller
{

	public function index(Request $request)
	{
		$data = [];

		$styles = new Styles();
		$data['styles'] = $styles->getStyles();

		$style = isset($request->style) && isset($data['styles'][$request->style]) ? $request->style : 'printed';
		$data['style'] = $style;

		$sizes = $this->getDataSizesByStyle($style);
		$data['sizes'] = $sizes;

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

	public function getWristbandColors(Request $request)
	{
		$colors = new Colors();
		$colors = $colors->getColorByStyleSize($request->style, $request->size);

print_r($colors);
echo "pop";
die;

		return $colors;
	}

}
