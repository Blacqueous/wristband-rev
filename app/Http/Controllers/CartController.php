<?php

namespace App\Http\Controllers;

use App;
use App\Http\Controllers\Controller;
use App\Models\AddOns;
use App\Models\Carts;
use App\Models\Orders;
use App\Models\Prices;
use App\Models\TimeProduction;
use App\Models\TimeShipping;
use App\Wristbands\Classes\ClipartList;
use App\Wristbands\Classes\Colors;
use App\Wristbands\Classes\ColorsList;
use App\Wristbands\Classes\FontList;
use App\Wristbands\Classes\Styles;
use App\Wristbands\Classes\Sizes;
use File;
use Illuminate\Http\Request;
use Input;
use Mail;
use Session;
use Storage;
use URL;
use net\authorize\api\contract\v1 as AnetAPI;
use net\authorize\api\controller as AnetController;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\ExecutePayment;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;

class CartController extends Controller
{

	public function index(Request $request)
	{
		$data = [
			'items' => (Session::has('_cart')) ? Session::get('_cart') : []
		];
		// Do something...
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

	public function cartDelete(Request $request)
	{
		// Check if cart session exists.
        if(Session::has('_cart')) {
			// Get the cart.
			$items = Session::get('_cart');
			// check if order exists in cart.
			if(isset($items[$request->cart_index])) {
				unset($items[$request->cart_index]); // Remove and save order.
				Session::put('_cart', $items);
				// Return success!
		 		return json_encode(true);
			}
		}
		// Something is wrong.
		return json_encode(false);
	}

	public function cartClear(Request $request)
	{
        // Session::forget('_cart');
		// return json_encode(true);
	}

	public function cartUpdate(Request $request)
	{
		// Check if cart session exists.
        if(Session::has('_cart')) {
			// Get the cart.
			$items = Session::get('_cart');
			if(isset($items[$request->index])) {
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

				$data['cart'] = $items[$request->index];
				$data['index'] = $request->index;

				return view('order_update', $data);
			}
		}

		return redirect('/cart')->with('cart_message', 'Cart does not exist.');
	}

	public function cartUpdateStart(Request $request)
	{
		// Check if cart session exists.
        if(Session::has('_cart')) {
			// Get the cart.
			$items = Session::get('_cart');
			// check if order exists in cart.
			if(isset($items[$request->index])) {
				$items[$request->index] = $request->data;
				Session::put('_cart', $items);
				// Return success!
		 		return json_encode(true);
			}
		}
		// Something is wrong.
		return json_encode(false);
	}

	public function cartSubmit(Request $request)
	{
		$cart_list = Session::get('_cart');

		foreach ($cart_list as $key => $list) {
			if(isset($list['clips'])) {
				if(isset($list['clips']['logo'])) {
					foreach ($list['clips']['logo'] as $logoName => $logo) {
						$temp_path = $logo['image'];

		                $temp_folder_date = date('Ymd');
		                $dest_path = 'uploads/order/images/' . $temp_folder_date . '/' . $key;

						if(!File::exists($dest_path)) {
							File::makeDirectory($dest_path, $mode = 0777, true, true);
						}

						$file_path = substr($temp_path, strpos($temp_path, 'uploads/temp/'));

		                // Process image transport.
						$ext = File::extension($file_path);
						$name = File::name($file_path);
						$filename = $name . '.' . $ext;

						File::copy($file_path, $dest_path.'/'.$filename);

						$cart_list[$key]['clips']['logo'][$logoName]['image'] = URL::asset('').$dest_path.'/'.$filename;
					}
				}
			}
		}

		// Set for success page.
		Session::flash('order_items', $cart_list);
		Session::flash('order_status', 'success');
		// Forget cart items.
		Session::forget('_cart');
		// redirect to success page
		return json_encode(true);
	}

	public function checkout(Request $request)
	{
		// if(Session::has('_cart')) {
		// 	$data = [
		// 		'items' => (Session::has('_cart')) ? Session::get('_cart') : []
		// 	];
		// 	// Do something...
			$data = [];
			return view('checkout', $data);
		// }

		// return redirect('/cart')->with('cart_message', 'Cart does not exist.');
	}

	public function checkoutSubmit(Request $request)
	{
		// Arrange order data
		$data_order = [
			"DateCreated"		=> date('Y-m-d H:i:s'),
			"TempToken"			=> $request->_token,
			"TransNo"			=> "",
			"Status"			=> '1',
			"FirstName"			=> $request->bInfoFirstName,
			"LastName"			=> $request->bInfoLastName,
			"EmailAddress"		=> $request->bInfoEmail,
			"PaymentMethod"		=> (strtoupper($request->PaymentType) == "CC") ? 'authnet' : 'paypal',
			"Paid"				=> "",
			"PaidDate"			=> "",
			"AuthorizeTransID"	=> "",
			"PaypalEmail"		=> "",
			"PaymentRemarks"	=> "",
			"ProductionCharge"	=> "",
			"DeliveryCharge"	=> "",
			"DaysProduction"	=> "",
			"DaysDelivery"		=> "",
			"DiscountCode"		=> "",
			"DiscountPercent"	=> "",
			"Address"			=> $request->bInfoStreetAddress1,
			"Address2"			=> $request->bInfoStreetAddress2,
			"City"				=> $request->bInfoCity,
			"State"				=> $request->bInfoState,
			"ZipCode"			=> $request->bInfoZipCode,
			"Country"			=> $request->bInfoCountry,
			"Phone"				=> $request->bInfoContactNo,
			"ShipFirstName"		=> $request->sInfoFirstName,
			"ShipLastName"		=> $request->sInfoLastName,
			"ShipAddress"		=> $request->sInfoStreetAddress1,
			"ShipAddress2"		=> $request->sInfoStreetAddress2,
			"ShipCity"			=> $request->sInfoCity,
			"ShipState"			=> $request->sInfoState,
			"ShipZipCode"		=> $request->sInfoZipCode,
			"ShipCountry"		=> $request->sInfoCountry,
			"DataStream"		=> "",
			"ReplyString"		=> "",
			"RandomChr"			=> "",
			"IPAddress"			=> $request->ip()
		];

		if (strtoupper($request->PaymentType) == "CC") {
			$merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
			$merchantAuthentication->setName(App::make('config')->get('services.authorizenet.name'));
			$merchantAuthentication->setTransactionKey(App::make('config')->get('services.authorizenet.key'));
			$refId = 'ref' . time();
			
			// Create the payment data for a credit card
			$creditCard = new AnetAPI\CreditCardType();
			$creditCard->setCardNumber( $request->CardNum );  
			$creditCard->setExpirationDate( $request->CardExpDateYear . "-" . $request->CardExpDateMonth );
			$paymentOne = new AnetAPI\PaymentType();
			$paymentOne->setCreditCard($creditCard);
			
			// Create a transaction
			$transactionRequestType = new AnetAPI\TransactionRequestType();
			$transactionRequestType->setTransactionType("authCaptureTransaction");   
			$transactionRequestType->setAmount(151.51);
			$transactionRequestType->setPayment($paymentOne);
			$trequest = new AnetAPI\CreateTransactionRequest();
			$trequest->setMerchantAuthentication($merchantAuthentication);
			$trequest->setRefId($refId);
			$trequest->setTransactionRequest($transactionRequestType);
			$controller = new AnetController\CreateTransactionController($trequest);
			if (App::make('config')->get('services.authorizenet.sandbox')) {
				$response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::SANDBOX);
			} else {
				$response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::PRODUCTION);
			}
			var_dump($trequest);
			var_dump($response->getMessages());
			var_dump($response);
			if ($response != null) {
				$tresponse = $response->getTransactionResponse();

				if (($tresponse != null) && ($tresponse->getResponseCode()=="1") ) {
					echo "Charge Credit Card AUTH CODE : " . $tresponse->getAuthCode() . "\n";
					echo "Charge Credit Card TRANS ID  : " . $tresponse->getTransId() . "\n";

				} else{
					echo  "Charge Credit Card ERROR :  Invalid response\n";
				}
			} else {
				echo  "Charge Credit card Null response returned";
			}
		} else {
			$data_order['PaypalEmail'] = $request->PaypalEmail;
		}

var_dump('done');
die;
		// Insert new order
		$orders = new Orders();

		// $order_id = $orders->insertOrder($data_order);
		$order_id = 0;

		$data_cart_default = [
			"DateCreated"	=> date('Y-m-d H:i:s'),
			"Status"		=> "1",
			"OrderID"		=> $order_id,
			"TempToken"		=> $request->_token,
			"FullName"		=> $request->FirstName . " " . $request->Surname,
			"PhoneNo"		=> $request->PhoneNumber,
			"DateQuote"		=> "",
			"EmailAddress"	=> $request->Email
		];

		$data = [];

		// Arrange cart data
		$cart_list = Session::get('_cart');
		foreach ($cart_list as $key => $list) {

			$data_cart_default_band = [
				"BandStyle"			=> $list['style'],
				"BandSize"			=> $list['size'],
				"Font"				=> $list['fonts'],
				"ProductionTime"	=> $list['time_production']['days'],
				"arProduction"		=> $list['time_production']['days'],
				"PriceProduction"	=> $list['time_production']['price'],
				"Delivery"			=> $list['time_shipping']['days'],
				"arShipping"		=> $list['time_shipping']['days'],
				"PriceDelivery"		=> $list['time_shipping']['price']
			];

			$data_cart = [];
			$data_cart_free = [];
			$data_cart_item = [];

			foreach ($list['items'] as $type => $item) {
				$data_cart_item_attr = [];
				$data_cart_item = [
					"BandType"		=> $type,
					"arColors"		=> "",
					"arAddons"		=> $item['price_addon'],
					"UnitPrice"		=> $item['price_total'],
				];
				// Get attribute
				foreach ($item as $attr_key => $attr_val) {
					if(is_array($attr_val)) {
						foreach ($attr_val['size'] as $attr) {
							$comment = ["Font Color"=> $attr['font'], "Font Name"=> $attr['font_name'], "Size"=> strtoupper($attr['size'])];
							$data_cart_item_attr[] = [
								"Qty"		=> $attr['qty'],
								"Comments"	=> json_encode($comment)
							];
						}
					}
				}
				foreach ($data_cart_item_attr as $value) {
					$data_cart[] = array_merge($data_cart_item, $value);
				}
			}

			foreach ($list['free'] as $free_key => $free_val) {
				if($free_key == 'key-chain') {
					foreach ($data_cart as $cart_key => $cart_val) {
						$data_cart[$cart_key]["arFree"] = $free_val['quantity'];
					}
				}
				if($free_key == 'wristbands') {
					foreach ($data_cart as $cart_key => $cart_val) {
						$data_cart[$cart_key]["arKeychains"] = $free_val['quantity'];
					}
				}
			}

			// Wrong total. Compute all prices
			$data_cart_default_band["Total"] = $list['total'];

			// Last thing to do
			foreach ($data_cart as $cart_key => $cart_val) {
				$data[] = array_merge($data_cart_default, $data_cart_default_band, $cart_val);
			}

		}

var_dump($data);
die;

		// // Set for success page.
		// Session::flash('order_items', $cart_list);
		// Session::flash('order_status', 'success');
		// // Forget cart items.
		// Session::forget('_cart');
		// // redirect to success page
		// return json_encode(true);
	}

}
