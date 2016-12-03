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
            'id' => str_random(20),
            'type' => $request->type,
			'withFont' => $withFont
        ];

        return view('template.customWristbandRegular', $data);
	}

}
