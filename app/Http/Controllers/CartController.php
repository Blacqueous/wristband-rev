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
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;

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
			$data = [
						'data' => (session('checkout_data')) ? session('checkout_data') : [],
					];
			return view('checkout', $data);
		// }

		return redirect('/cart')->with('cart_message', 'Cart does not exist.');
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
			"Paid"				=> "100",
			"PaidDate"			=> date('Y-m-d'),
			"AuthorizeTransID"	=> "",
			"PaypalEmail"		=> "",
			"PaymentRemarks"	=> "",
			"ProductionCharge"	=> "",
			"DeliveryCharge"	=> "",
			"DaysProduction"	=> "",
			"DaysDelivery"		=> "",
			"DiscountCode"		=> $request->DiscountCode,
			"DiscountPercent"	=> $request->DiscountPercent,
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
			$creditCard->setCardNumber(trim(str_replace(' ', '', $request->CardNum)));  
			$creditCard->setExpirationDate(trim($request->CardExpDateYear)."-".trim($request->CardExpDateMonth));
    		$creditCard->setCardCode(trim($request->CardCVV));
			$paymentOne = new AnetAPI\PaymentType();
			$paymentOne->setCreditCard($creditCard);
			
		    $order = new AnetAPI\OrderType();
		    $order->setDescription("Promotional Wristband");
			
		    // Set the customer's Bill To address
		    $customerAddress = new AnetAPI\CustomerAddressType();
		    $customerAddress->setFirstName($request->bInfoFirstName);
		    $customerAddress->setLastName($request->bInfoLastName);
		    $customerAddress->setAddress($request->bInfoStreetAddress1);
		    $customerAddress->setCity($request->bInfoCity);
		    $customerAddress->setState($request->bInfoState);
		    $customerAddress->setZip($request->bInfoZipCode);
		    $customerAddress->setCountry($request->bInfoCountry);
    		$customerAddress->setPhoneNumber($request->bInfoContactNo);
			
			// Create a transaction
			$transactionRequestType = new AnetAPI\TransactionRequestType();
			$transactionRequestType->setTransactionType("authCaptureTransaction");   
			$transactionRequestType->setAmount($data_order['Paid']);
    		$transactionRequestType->setBillTo($customerAddress);
    		$transactionRequestType->setOrder($order);
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
			
			// Default error message
			$errMsg = 'Something went wrong! Kindly try again.';
			if ($response != null) {
				$tresponse = $response->getTransactionResponse();
				
				if (($tresponse != null) && ($tresponse->getResponseCode()=="1") ) {
					$data_order['AuthorizeTransID'] = $tresponse->getTransId();
				} else {
					// Get authnet transaction error message
					if($tresponse->getErrors()) {
						if ($tresponse->getErrors()[0] !== null) {
							if (!empty($tresponse->getErrors()[0]->getErrorText())) {
								$errMsg = $tresponse->getErrors()[0]->getErrorText();
							}
						}
					}
					return redirect('/checkout')->withErrors(['message'=> $errMsg], 'checkout')->withInput();
				}
			} else {
				// Get authnet response message
				if ($response->getMessages()->getMessage()) {
					if ($response->getMessages()->getMessage()[0] !== null) {
						if (!empty($response->getMessages()->getMessage()[0]->getText())) {
							$errMsg = $response->getMessages()->getMessage()[0]->getText();
						}
					}
				}
				return redirect('/checkout')->withErrors(['message'=> $errMsg], 'checkout')->withInput();
			}

		} else {
			// ### Payer
			// A resource representing a Payer that funds a payment
			// For paypal account payments, set payment method
			// to 'paypal'.
			$payer = new Payer();
			$payer->setPaymentMethod("paypal");

			// ### Itemized information
			// (Optional) Lets you specify item wise
			// information
			$item1 = new Item();
			$item1->setName('Ground Coffee 40 oz')
			      ->setCurrency('USD')
			      ->setQuantity(1)
			      ->setSku("123123") // Similar to `item_number` in Classic API
			      ->setPrice(7.5);
			$item2 = new Item();
			$item2->setName('Granola bars')
			      ->setCurrency('USD')
			      ->setQuantity(5)
			      ->setSku("321321") // Similar to `item_number` in Classic API
			      ->setPrice(2);

			$itemList = new ItemList();
			$itemList->setItems(array($item1, $item2));

			// ### Additional payment details
			// Use this optional field to set additional
			// payment information such as tax, shipping
			// charges etc.
			$details = new Details();
			$details->setShipping(1.2)
				    ->setTax(1.3)
				    ->setSubtotal(17.50);

			// ### Amount
			// Lets you specify a payment amount.
			// You can also specify additional details
			// such as shipping, tax.
			$amount = new Amount();
			$amount->setCurrency("USD")
				   ->setTotal(20)
				   ->setDetails($details);

			// ### Transaction
			// A transaction defines the contract of a
			// payment - what is the payment for and who
			// is fulfilling it. 
			$transaction = new Transaction();
			$transaction->setAmount($amount)
					    ->setItemList($itemList)
					    ->setDescription("Payment description")
					    ->setInvoiceNumber(uniqid());

			// ### Redirect urls
			// Set the urls that the buyer must be redirected to after 
			// payment approval/ cancellation.
			$baseUrl = URL::to('/');
			$redirectUrls = new RedirectUrls();
			$redirectUrls->setReturnUrl("$baseUrl/ExecutePayment.php?success=true")
			    		 ->setCancelUrl("$baseUrl/ExecutePayment.php?success=false");

			// ### Payment
			// A Payment Resource; create one using
			// the above types and intent set to 'sale'
			$payment = new Payment();
			$payment->setIntent("sale")
				    ->setPayer($payer)
				    ->setRedirectUrls($redirectUrls)
				    ->setTransactions(array($transaction));

			// For Sample Purposes Only.
			$trequest = clone $payment;

			// ### Create Payment
			// Create a payment by calling the 'create' method
			// passing it a valid apiContext.
			// (See bootstrap.php for more on `ApiContext`)
			// The return object contains the state and the
			// url to which the buyer must be redirected to
			// for payment approval
			$apiContext = new ApiContext(
							new OAuthTokenCredential(
								App::make('config')->get('services.paypal.client_id'),
								App::make('config')->get('services.paypal.secret')
							)
			            );
			$apiContext->setConfig(App::make('config')->get('services.paypal.settings'));

			try {
			    $payment->create($apiContext);
				return redirect($payment->getApprovalLink());
			} catch (Exception $ex) {
				// Default error message
				$errMsg = 'Something went wrong! Payment using PayPal is invalid. Kindly try again.';
				return redirect('/checkout')->withErrors(['message'=> $errMsg], 'checkout')->withInput();
			}

var_dump($trequest->PaypalEmail);
var_dump($payment);
var_dump($payment->getId());
var_dump($payment->getState());
var_dump($payment->getCreateTime());
var_dump($payment->getLinks());
var_dump($payment->getApprovalLink());
die;

		}

var_dump($data_order);
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
