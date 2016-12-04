<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

class CartController extends Controller
{

	public function index(Request $request)
	{
		$data = [
			'items' => (Session::has('_cart')) ? Session::get('_cart') : []
		];
		// do something
		return view('cart', $data);
    }

	public function cartAdd(Request $request)
	{
		// Check if cart session exists.
        if(!Session::has('_cart')) {
			// Get & create first item.
			$id = Session::getId();
			$data = [ $id => $request->data ];
			Session::put('_cart', $data); // Save first order to cart.
        } else {
			// Get id for the new item.
			$id = Session::getId();
			Session::put('_cart', array_add($cart = Session::get('_cart'), $id, $request->data)); // Save order to cart
		}
		// Regenerate session id for next order.
		Session::regenerate();

		// Return success!
 		return json_encode(true);
	}

	public function cartRemove(Request $request)
	{
        if(!Session::has('_cart')) {

        }
	}

	public function cartClear(Request $request)
	{
        Session::forget('_cart');
		return json_encode(true);
	}

}
