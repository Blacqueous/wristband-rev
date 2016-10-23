<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Wristbands\Classes\Colors;
use Illuminate\Http\Request;
use Session;
use Storage;

class OrderController extends Controller
{

	public function index(Request $request)
	{
		$colors = new Colors();
        // print_r($colors->getRegular());
        print_r($colors->getDual());
        die;
        return view('order', []);
	}

}
