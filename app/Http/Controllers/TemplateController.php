<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

class TemplateController extends Controller
{

	public function index(Request $request)
	{
		// do something
	}

	public function getCustomWristband(Request $request)
	{
		$items = (isset($request->items)) ? json_decode($request->items, true) : [];

		$withFont = false;
	    // Get sizes for selected style.
	    switch ($request->style) {
	        case 'figured':
	        case 'printed':
	        case 'ink-injected':
	        case 'embossed-printed':
				$withFont = true; // Show fonts
	            // $('.fonttext').removeClass('hidden');
	            // $('.box-color').addClass('with-font');
		        break;
	        default:
				$withFont = false; // Show fonts
	            break;
	    }
        $data = [
            'id' => (isset($request->id)) ? $request->id  : str_random(20),
            'type' => $request->type,
			'withFont' => $withFont,
			'image' => (isset($request->image)) ? $request->image : false,
			'color' => (isset($request->color)) ? $request->color : false,
			'items' => [
				'yt' => [
					'qty'		=> (isset($items['yt']['qty'])) ? $items['yt']['qty'] : '',
					'font'		=> (isset($items['yt']['font'])) ? $items['yt']['font'] : '000000',
					'font_name'	=> (isset($items['yt']['font_name'])) ? $items['yt']['font_name'] : 'black',
					'size'		=> (isset($items['yt']['size'])) ? $items['yt']['size'] : 'yt',
				],
				'md' => [
					'qty'		=> (isset($items['md']['qty'])) ? $items['md']['qty'] : '',
					'font'		=> (isset($items['md']['font'])) ? $items['md']['font'] : '000000',
					'font_name'	=> (isset($items['md']['font_name'])) ? $items['md']['font_name'] : 'black',
					'size'		=> (isset($items['md']['size'])) ? $items['md']['size'] : 'md',
				],
				'ad' => [
					'qty'		=> (isset($items['ad']['qty'])) ? $items['ad']['qty'] : '',
					'font'		=> (isset($items['ad']['font'])) ? $items['ad']['font'] : '000000',
					'font_name'	=> (isset($items['ad']['font_name'])) ? $items['ad']['font_name'] : 'black',
					'size'		=> (isset($items['ad']['size'])) ? $items['ad']['size'] : 'ad',
				],
				'xs' => [
					'qty'		=> (isset($items['xs']['qty'])) ? $items['xs']['qty'] : '',
					'font'		=> (isset($items['xs']['font'])) ? $items['xs']['font'] : '000000',
					'font_name'	=> (isset($items['xs']['font_name'])) ? $items['xs']['font_name'] : 'black',
					'size'		=> (isset($items['xs']['size'])) ? $items['xs']['size'] : 'xs',
				],
				'xl' => [
					'qty'		=> (isset($items['xl']['qty'])) ? $items['xl']['qty'] : '',
					'font'		=> (isset($items['xl']['font'])) ? $items['xl']['font'] : '000000',
					'font_name'	=> (isset($items['xl']['font_name'])) ? $items['xl']['font_name'] : 'black',
					'size'		=> (isset($items['xl']['size'])) ? $items['xl']['size'] : 'xl',
				]
			]
        ];

        return view('template.customWristbandRegular', $data);
	}

}
