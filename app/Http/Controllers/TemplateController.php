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
			'color_title' => (isset($request->color_title)) ? $request->color_title : false,
			'items' => [
				'yt' => [
					'qty'		=> (isset($items['yt']['qty'])) ? $items['yt']['qty'] : '',
					'font'		=> (isset($items['yt']['font'])) ? $items['yt']['font'] : '000000',
					'font_title'	=> (isset($items['yt']['font_title'])) ? $items['yt']['font_title'] : 'black',
					'size'		=> (isset($items['yt']['size'])) ? $items['yt']['size'] : 'yt',
				],
				'md' => [
					'qty'		=> (isset($items['md']['qty'])) ? $items['md']['qty'] : '',
					'font'		=> (isset($items['md']['font'])) ? $items['md']['font'] : '000000',
					'font_title'	=> (isset($items['md']['font_title'])) ? $items['md']['font_title'] : 'black',
					'size'		=> (isset($items['md']['size'])) ? $items['md']['size'] : 'md',
				],
				'ad' => [
					'qty'		=> (isset($items['ad']['qty'])) ? $items['ad']['qty'] : '',
					'font'		=> (isset($items['ad']['font'])) ? $items['ad']['font'] : '000000',
					'font_title'	=> (isset($items['ad']['font_title'])) ? $items['ad']['font_title'] : 'black',
					'size'		=> (isset($items['ad']['size'])) ? $items['ad']['size'] : 'ad',
				],
				'xs' => [
					'qty'		=> (isset($items['xs']['qty'])) ? $items['xs']['qty'] : '',
					'font'		=> (isset($items['xs']['font'])) ? $items['xs']['font'] : '000000',
					'font_title'	=> (isset($items['xs']['font_title'])) ? $items['xs']['font_title'] : 'black',
					'size'		=> (isset($items['xs']['size'])) ? $items['xs']['size'] : 'xs',
				],
				'xl' => [
					'qty'		=> (isset($items['xl']['qty'])) ? $items['xl']['qty'] : '',
					'font'		=> (isset($items['xl']['font'])) ? $items['xl']['font'] : '000000',
					'font_title'	=> (isset($items['xl']['font_title'])) ? $items['xl']['font_title'] : 'black',
					'size'		=> (isset($items['xl']['size'])) ? $items['xl']['size'] : 'xl',
				]
			]
        ];

        return view('template.customWristbandRegular', $data);
	}

}
