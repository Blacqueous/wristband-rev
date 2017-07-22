<?php

namespace App\Http\Controllers;

use App;
use App\Http\Controllers\Controller;
use App\Models\AddOns;
use App\Models\Carts;
use App\Models\MoldingFee;
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
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;

class CartController extends Controller
{

	public function index(Request $request)
	{
		// $a = $this->organizeCart("1", "1", "LOL", "12345", "1@1.1");

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
		// Redirect to success page
		return json_encode(true);
	}

	public function checkout(Request $request)
	{
		if(Session::has('_cart')) {
			$data = [
				'items' => (Session::has('_cart')) ? Session::get('_cart') : [],
				'data' => (Session::has('checkout_data')) ? Session::get('checkout_data') : [],
			];
			return view('checkout', $data);
		}
		return redirect('/cart')->with('cart_message', 'Cart does not exist.');
	}

	public function checkoutSubmit(Request $request)
	{
		// Initialize order data
		$data_order = [
			"DateCreated"		=> date('Y-m-d H:i:s'),
			"TempToken"			=> $request->_token,
			"TransNo"			=> "",
			"Status"			=> "0",
			"FirstName"			=> $request->bInfoFirstName,
			"LastName"			=> $request->bInfoLastName,
			"EmailAddress"		=> $request->bInfoEmail,
			"PaymentMethod"		=> (strtoupper($request->PaymentType) == "CC") ? 'authnet' : 'paypal',
			"Paid"				=> "0",
			"PaidDate"			=> "",
			"AuthorizeTransID"	=> "",
			"PaypalEmail"		=> $request->PaypalEmail,
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
		
		// Insert new order
		$orders = new Orders();
		$order_id = $orders->insertOrder($data_order);

		if (!$order_id) {
			return redirect('/checkout')->withErrors(['message'=> 'Something went wrong! Kindly try again.'], 'checkout')->withInput();
		}

		$arrCart = $this->organizeCart($request->_token, $order_id, $request->bInfoFirstName." ".$request->bInfoLastName, $request->bInfoContactNo, $request->bInfoEmail);
		// var_dump($arrCart); die;

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
			
			// Compute total
			$total = 0;
			$cart = Session::get('_cart');
			foreach ($cart as $cartVal) {
				$total += $cartVal['total'];
			}
			$discount = 0;
			if (!empty($request->DiscountCode)) {
				if (strtoupper($request->DiscountCode) == "SAVE10") {
					$discount = $total * 0.10;
					$discount = number_format($discount, "2");
				}
			}

			// Create a transaction
			$transactionRequestType = new AnetAPI\TransactionRequestType();
			$transactionRequestType->setTransactionType("authCaptureTransaction");   
			$transactionRequestType->setAmount($total - $discount);
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
					$data_order['Status'] = 1;
					$data_order['Paid'] = 1;
					$data_order['PaidDate'] = date('Y-m-d H:i:s');
					$shipping = $this->getCartShipping();
					$production = $this->getCartProduction();
					$data_order['DaysDelivery'] = $shipping['days'];
					$data_order['DeliveryCharge'] = $shipping['total'];
					$data_order['DaysProduction'] = $production['days'];
					$data_order['ProductionCharge'] = $production['total'];

					$orders_model = new Orders();
					$orders_model->where('ID', $order_id)->update($data_order);

					foreach ($arrCart as $key => $value) {
						unset($arrCart[$key]['_Name']);
						unset($arrCart[$key]['_Size']);
					}

					$carts_model = new Carts();
					$carts_model->insert($arrCart);
					Session::forget('_cart');
					Session::forget('_paypal');
					Session::flash('_checkout_success', true);
					return redirect('/checkout/success');
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
			return redirect('/checkout')->withErrors(['message'=> $errMsg], 'checkout')->withInput();

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
			$total = 0;
			$priceAll = 0;
			$addonAll = 0;
			$items = [];

			foreach ($arrCart as $value) {

				$price = $value['UnitPrice'];
				$totalPrice = $value['UnitPrice'] * $value['Qty'];
				$totalAddon = 0;
				$priceAll += $totalPrice;

				$arFrontMessage = json_decode($value['arFrontMessage'], true);
				if(is_array($arFrontMessage)) {
					$totalAddon += $arFrontMessage['price'] * $value['Qty'];
					$price += $arFrontMessage['price'];
					$addonAll += $arFrontMessage['price'] * $value['Qty'];
				}

				$arBackMessage = json_decode($value['arBackMessage'], true);
				if(is_array($arBackMessage)) {
					$totalAddon += $arBackMessage['price'] * $value['Qty'];
					$price += $arBackMessage['price'];
					$addonAll += $arFrontMessage['price'] * $value['Qty'];
				}

				$arContinuousMessage = json_decode($value['arContinuousMessage'], true);
				if(is_array($arContinuousMessage)) {
					$totalAddon += $arContinuousMessage['price'] * $value['Qty'];
					$price += $arContinuousMessage['price'];
					$addonAll += $arFrontMessage['price'] * $value['Qty'];
				}

				$arInsideMessage = json_decode($value['arInsideMessage'], true);
				if(is_array($arInsideMessage)) {
					$totalAddon += $arInsideMessage['price'] * $value['Qty'];
					$price += $arInsideMessage['price'];
					$addonAll += $arFrontMessage['price'] * $value['Qty'];
				}

				$arFrontMessageStartClipart = json_decode($value['arFrontMessageStartClipart'], true);
				if(is_array($arFrontMessageStartClipart)) {
					$totalAddon += $arFrontMessageStartClipart['price'] * $value['Qty'];
					$price += $arFrontMessageStartClipart['price'];
					$addonAll += $arFrontMessage['price'] * $value['Qty'];
				}

				$arFrontMessageEndClipart = json_decode($value['arFrontMessageEndClipart'], true);
				if(is_array($arFrontMessageEndClipart)) {
					$totalAddon += $arFrontMessageEndClipart['price'] * $value['Qty'];
					$price += $arFrontMessageEndClipart['price'];
					$addonAll += $arFrontMessage['price'] * $value['Qty'];
				}

				$arBackMessageStartClipart = json_decode($value['arBackMessageStartClipart'], true);
				if(is_array($arBackMessageStartClipart)) {
					$totalAddon += $arBackMessageStartClipart['price'] * $value['Qty'];
					$price += $arBackMessageStartClipart['price'];
					$addonAll += $arFrontMessage['price'] * $value['Qty'];
				}

				$arBackMessageEndClipart = json_decode($value['arBackMessageEndClipart'], true);
				if(is_array($arBackMessageEndClipart)) {
					$totalAddon += $arBackMessageEndClipart['price'] * $value['Qty'];
					$price += $arBackMessageEndClipart['price'];
					$addonAll += $arFrontMessage['price'] * $value['Qty'];
				}

				$arContinuousMessageStartClipart = json_decode($value['arContinuousMessageStartClipart'], true);
				if(is_array($arContinuousMessageStartClipart)) {
					$totalAddon += $arContinuousMessageStartClipart['price'] * $value['Qty'];
					$price += $arContinuousMessageStartClipart['price'];
					$addonAll += $arFrontMessage['price'] * $value['Qty'];
				}

				$priceContinuousEndClipart = 0;
				$arContinuousEndClipart = json_decode($value['arContinuousEndClipart'], true);
				if(is_array($arContinuousEndClipart)) {
					$totalAddon += $arContinuousEndClipart['price'] * $value['Qty'];
					$price += $arContinuousEndClipart['price'];
					$addonAll += $arFrontMessage['price'] * $value['Qty'];
				}

				$priceAddons = 0;
				$arPriceAddons = json_decode($value['arAddons'], true);
				if(is_array($arPriceAddons)) {
					foreach ($arPriceAddons as $addon) {
						$totalAddon += $addon['total'];
						// $price += $addon['price'];
						$addonAll += $addon['total'];
					}
				}

				// Compute new total
				$total += $totalPrice + $totalAddon;

				$size = $this->getWristbandsSizeName($value['BandSize']);
				$sizeBand = $this->getWristbandItemSizeName($value['_Size']);
				$typeBand = strtolower($value['BandType']);
				$typeBand = (($typeBand == "dual") ? "" : " " . ucwords($typeBand));

				$name = ucwords(strtolower($value['BandStyle'])) . $typeBand . " Wristband " . $size . " (" . $value['_Name'] . ")" . $sizeBand;

				$item = new Item();
				$item->setName($name)
					 ->setCurrency('USD')
					 ->setQuantity($value['Qty'])
					 ->setPrice($price);
				$items[] = $item;
			}

			// For Addon price, if any
			$item = new Item();
			$item->setName('Addons')
				 ->setCurrency('USD')
				 ->setQuantity(1)
				 ->setPrice($addonAll);
			$items[] = $item;

			$shipping = $this->getCartShipping();
			$production = $this->getCartProduction();

			$sub_total = $total + $production['total'];
			$all_total = $total + $shipping['total'] + $production['total'];
			$discount = 0;
			if (!empty($request->DiscountCode)) {
				if (strtoupper($request->DiscountCode) == "SAVE10") {
					$discount = $all_total * 0.10;
					$discount = number_format($discount, "2");
				}
			}
			$shipping_total = ($all_total - $discount) - $shipping['total'];
			$shipping_total = number_format($shipping_total, "2");

			// For Production price, if any
			$item = new Item();
			$item->setName('Production Price')
				 ->setCurrency('USD')
				 ->setQuantity(1)
				 ->setPrice($production['total']);
			$items[] = $item;

			if ($discount > 0) {
				// For Discount, if any
				$item = new Item();
				$item->setName('Discount')
					 ->setCurrency('USD')
					 ->setQuantity(1)
					 ->setPrice("-".$discount);
				$items[] = $item;
			}

			$itemList = new ItemList();
			$itemList->setItems($items);

			// ### Additional payment details
			// Use this optional field to set additional
			// payment information such as tax, shipping
			// charges etc.
			$details = new Details();
			$details->setShipping($shipping['total'])
				    ->setTax(0)
				    ->setSubtotal($shipping_total);

			// ### Amount
			// Lets you specify a payment amount.
			// You can also specify additional details
			// such as shipping, tax.
			$amount = new Amount();
			$amount->setCurrency("USD")
				   ->setTotal(number_format($all_total - $discount, 2))
				   ->setDetails($details);

			// ### Transaction
			// A transaction defines the contract of a
			// payment - what is the payment for and who
			// is fulfilling it. 
			$transaction = new Transaction();
			$transaction->setAmount($amount)
					    ->setItemList($itemList)
					    ->setDescription("Promotional Wristbands.")
					    ->setInvoiceNumber(uniqid());

			// ### Redirect urls
			// Set the urls that the buyer must be redirected to after 
			// payment approval/ cancellation.
			$baseUrl = URL::to('/');
			$redirectUrls = new RedirectUrls();
			$redirectUrls->setReturnUrl("$baseUrl/checkout/paypal?success=true")
			    		 ->setCancelUrl("$baseUrl/checkout/paypal?success=false");

			// ### Payment
			// A Payment Resource; create one using
			// the above types and intent set to 'sale'
			$payment = new Payment();
			$payment->setIntent("sale")
				    ->setPayer($payer)
				    ->setRedirectUrls($redirectUrls)
				    ->setTransactions(array($transaction));

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
				if ($payment->getState() == "created") {
					$paypal_data = [
						"order_id" => $order_id,
						"order_input" => Input::all(),
					];
					Session::put('_paypal', $paypal_data);
					return redirect($payment->getApprovalLink());
				} else {
					$errMsg = 'Something went wrong! Payment using PayPal is invalid. Kindly try again.';
					return redirect('/checkout')->withErrors(['message'=> $errMsg], 'checkout')->withInput();
				}
			} catch (Exception $ex) {
				// Default error message
				$errMsg = 'Something went wrong! Payment using PayPal is invalid. Kindly try again.';
				return redirect('/checkout')->withErrors(['message'=> $errMsg], 'checkout')->withInput();
			}

			return redirect('/checkout')->withErrors(['message'=> 'Something went wrong! Kindly try again.'], 'checkout')->withInput();
		}

	}

	public function checkoutPaypal(Request $request)
	{
		if (!Session::has('_cart')) {
			return redirect('/cart')->with('cart_message', 'Cart does not exist.');
		}

		if (!Session::has('_paypal')) {
			return redirect('/cart')->with('cart_message', 'Cart does not exist.');
		}

		if($request->success && $request->success == 'true') {

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

		    // Get the payment Object by passing paymentId
		    // payment id was previously stored in session in
		    // CreatePaymentUsingPayPal.php
		    $paymentId = $request->paymentId;
		    $payment = Payment::get($paymentId, $apiContext);

		    // ### Payment Execute
		    // PaymentExecution object includes information necessary
		    // to execute a PayPal account payment.
		    // The payer_id is added to the request query parameters
		    // when the user is redirected from paypal back to your site
		    $execution = new PaymentExecution();
		    $execution->setPayerId($request->PayerID);

			// ### Itemized information
			// (Optional) Lets you specify item wise
			// information
			$total = 0;
			$priceAll = 0;
			$addonAll = 0;
			$items = [];

			$order_id = Session::get('_paypal.order_id');
			$paypalRequest = Session::get('_paypal.order_input');

			$arrCart = $this->organizeCart($paypalRequest['_token'], $order_id, $paypalRequest['bInfoFirstName']." ".$paypalRequest['bInfoLastName'], $paypalRequest['bInfoContactNo'], $paypalRequest['bInfoEmail']);
			// var_dump($arrCart); die;

			foreach ($arrCart as $value) {

				$price = $value['UnitPrice'];
				$totalPrice = $value['UnitPrice'] * $value['Qty'];
				$totalAddon = 0;
				$priceAll += $totalPrice;

				$arFrontMessage = json_decode($value['arFrontMessage'], true);
				if(is_array($arFrontMessage)) {
					$totalAddon += $arFrontMessage['price'] * $value['Qty'];
					$price += $arFrontMessage['price'];
					$addonAll += $arFrontMessage['price'] * $value['Qty'];
				}

				$arBackMessage = json_decode($value['arBackMessage'], true);
				if(is_array($arBackMessage)) {
					$totalAddon += $arBackMessage['price'] * $value['Qty'];
					$price += $arBackMessage['price'];
					$addonAll += $arFrontMessage['price'] * $value['Qty'];
				}

				$arContinuousMessage = json_decode($value['arContinuousMessage'], true);
				if(is_array($arContinuousMessage)) {
					$totalAddon += $arContinuousMessage['price'] * $value['Qty'];
					$price += $arContinuousMessage['price'];
					$addonAll += $arFrontMessage['price'] * $value['Qty'];
				}

				$arInsideMessage = json_decode($value['arInsideMessage'], true);
				if(is_array($arInsideMessage)) {
					$totalAddon += $arInsideMessage['price'] * $value['Qty'];
					$price += $arInsideMessage['price'];
					$addonAll += $arFrontMessage['price'] * $value['Qty'];
				}

				$arFrontMessageStartClipart = json_decode($value['arFrontMessageStartClipart'], true);
				if(is_array($arFrontMessageStartClipart)) {
					$totalAddon += $arFrontMessageStartClipart['price'] * $value['Qty'];
					$price += $arFrontMessageStartClipart['price'];
					$addonAll += $arFrontMessage['price'] * $value['Qty'];
				}

				$arFrontMessageEndClipart = json_decode($value['arFrontMessageEndClipart'], true);
				if(is_array($arFrontMessageEndClipart)) {
					$totalAddon += $arFrontMessageEndClipart['price'] * $value['Qty'];
					$price += $arFrontMessageEndClipart['price'];
					$addonAll += $arFrontMessage['price'] * $value['Qty'];
				}

				$arBackMessageStartClipart = json_decode($value['arBackMessageStartClipart'], true);
				if(is_array($arBackMessageStartClipart)) {
					$totalAddon += $arBackMessageStartClipart['price'] * $value['Qty'];
					$price += $arBackMessageStartClipart['price'];
					$addonAll += $arFrontMessage['price'] * $value['Qty'];
				}

				$arBackMessageEndClipart = json_decode($value['arBackMessageEndClipart'], true);
				if(is_array($arBackMessageEndClipart)) {
					$totalAddon += $arBackMessageEndClipart['price'] * $value['Qty'];
					$price += $arBackMessageEndClipart['price'];
					$addonAll += $arFrontMessage['price'] * $value['Qty'];
				}

				$arContinuousMessageStartClipart = json_decode($value['arContinuousMessageStartClipart'], true);
				if(is_array($arContinuousMessageStartClipart)) {
					$totalAddon += $arContinuousMessageStartClipart['price'] * $value['Qty'];
					$price += $arContinuousMessageStartClipart['price'];
					$addonAll += $arFrontMessage['price'] * $value['Qty'];
				}

				$priceContinuousEndClipart = 0;
				$arContinuousEndClipart = json_decode($value['arContinuousEndClipart'], true);
				if(is_array($arContinuousEndClipart)) {
					$totalAddon += $arContinuousEndClipart['price'] * $value['Qty'];
					$price += $arContinuousEndClipart['price'];
					$addonAll += $arFrontMessage['price'] * $value['Qty'];
				}

				$priceAddons = 0;
				$arPriceAddons = json_decode($value['arAddons'], true);
				if(is_array($arPriceAddons)) {
					foreach ($arPriceAddons as $addon) {
						$totalAddon += $addon['total'];
						// $price += $addon['price'];
						$addonAll += $addon['total'];
					}
				}

				// Compute new total
				$total += $totalPrice + $totalAddon;

			}

			$shipping = $this->getCartShipping();
			$production = $this->getCartProduction();

			$sub_total = $total + $production['total'];
			$all_total = $total + $shipping['total'] + $production['total'];
			$discount = 0;
			if (!empty($paypalRequest['DiscountCode'])) {
				if (strtoupper($paypalRequest['DiscountCode']) == "SAVE10") {
					$discount = $all_total * 0.10;
					$discount = number_format($discount, "2");
				}
			}
			$shipping_total = ($all_total - $discount) - $shipping['total'];
			$shipping_total = number_format($shipping_total, "2");

			// ### Optional Changes to Amount
			// If you wish to update the amount that you wish to charge the customer,
			// based on the shipping address or any other reason, you could
			// do that by passing the transaction object with just `amount` field in it.
			// Here is the example on how we changed the shipping to $1 more than before.
			$details = new Details();
			$details->setShipping($shipping['total'])
				    ->setTax(0)
				    ->setSubtotal($shipping_total);

			$amount = new Amount();
			$amount->setCurrency("USD")
				   ->setTotal(number_format($all_total - $discount, 2))
				   ->setDetails($details);

			$transaction = new Transaction();
			$transaction->setAmount($amount);

			// Add the above transaction object inside our Execution object.
			$execution->addTransaction($transaction);

			try {
			    // Execute the payment
			    // (See bootstrap.php for more on `ApiContext`)
			    $result = $payment->execute($execution, $apiContext);

			    try {
			        $payment = Payment::get($paymentId, $apiContext);
					$shipping = $this->getCartShipping();
					$production = $this->getCartProduction();

					$data_order = [
						"TransNo" => $payment->getId(),
						"Status" => 1,
						"Paid" => 1,
						"PaidDate" => date('Y-m-d H:i:s'),
						"DaysDelivery" => $shipping['days'],
						"DeliveryCharge" => $shipping['total'],
						"DaysProduction" => $production['days'],
						"ProductionCharge" => $production['total'],
					];

					$orders_model = new Orders();
					$orders_model->where('ID', $order_id)->update($data_order);

					foreach ($arrCart as $key => $value) {
						unset($arrCart[$key]['_Name']);
						unset($arrCart[$key]['_Size']);
					}

					$carts_model = new Carts();
					$carts_model->insert($arrCart);
					Session::forget('_cart');
					Session::forget('_paypal');
					Session::flash('_checkout_success', true);
					return redirect('/checkout/success');
			    } catch (Exception $ex) {
					Session::put('_old_input', Session::get('_paypal.order_input'));
					return redirect('/checkout')->withErrors(['message'=> 'Something went wrong with your PayPal checkout. Kindly try again.'], 'checkout');
			    }
			} catch (Exception $ex) {
				Session::put('_old_input', Session::get('_paypal.order_input'));
				return redirect('/checkout')->withErrors(['message'=> 'Something went wrong with your PayPal checkout. Kindly try again.'], 'checkout');
			}

		} else {
			Session::put('_old_input', Session::get('_paypal.order_input'));
			return redirect('/checkout')->withErrors(['message'=> 'PayPal checkout is cancelled. Kindly try again.'], 'checkout');
		}

		Session::put('_old_input', Session::get('_paypal.order_input'));
		return redirect('/checkout')->withErrors(['message'=> 'Approval for PayPal checkout is cancelled. Kindly try again.'], 'checkout');

	}

	public function checkoutSuccess()
	{
		if (Session::has('_checkout_success')) {
			if (Session::get('_checkout_success')) {
				return view('checkout-success', []);
			}
		}
		return redirect('/');
	}

	private function organizeCart($token, $order_id, $full_name, $phone_num, $email)
	{

		$data_cart_default = [
			"DateCreated"						=> date('Y-m-d H:i:s'),
			"Status"							=> "1",
			"OrderID"							=> $order_id,
			"TempToken"							=> $token,
			"BandStyle"							=> "",
			"BandType"							=> "",
			"BandSize"							=> "",
			"MessageStyle"						=> "",
			"Font"								=> "",
			"FrontMessage"						=> "",
			"BackMessage"						=> "",
			"ContinuousMessage"					=> "",
			"FrontMessageStartClipart"			=> "",
			"FrontMessageEndClipart"			=> "",
			"BackMessageStartClipart"			=> "",
			"BackMessageEndClipart"				=> "",
			"ContinuousMessageStartClipart"		=> "",
			"ContinuousEndClipart"				=> "",
			"ProductionTime"					=> "",
			"FreeQty"							=> "",
			"Delivery"							=> "",
			"Individual_Pack"					=> "",
			"Keychain"							=> "",
			"DigitalPrint"						=> "",
			"Comments"							=> "",
			"PriceProduction"					=> "",
			"PriceDelivery"						=> "",
			"PriceIndividual_Pack"				=> "",
			"PriceKeychain"						=> "",
			"PriceDigitalPrint"					=> "",
			"PriceBackMessage"					=> "",
			"PriceContinuousMessage"			=> "",
			"PriceLogo"							=> "",
			"PriceColorSplit"					=> "",
			"PriceMouldingFee"					=> "",
			"RandomChr"							=> "",
			"newCart"							=> "",
			"arColors"							=> "",
			"arAddons"							=> "",
			"arMoldingFee"						=> "",
			"arFrontMessage"					=> "",
			"arBackMessage"						=> "",
			"arContinuousMessage"				=> "",
			"arInsideMessage"					=> "",
			"arFrontMessageStartClipart"		=> "",
			"arFrontMessageEndClipart"			=> "",
			"arBackMessageStartClipart"			=> "",
			"arBackMessageEndClipart"			=> "",
			"arContinuousMessageStartClipart"	=> "",
			"arContinuousEndClipart"			=> "",
			"arFree"							=> "",
			"arKeychains"						=> "",
			"arProduction"						=> "",
			"arShipping"						=> "",
			"Qty"								=> "",
			"UnitPrice"							=> "",
			"Total"								=> "",
			"FullName"							=> $full_name,
			"PhoneNo"							=> $phone_num,
			"DateQuote"							=> "",
			"EmailAddress"						=> $email
		];

		$data = [];

		// Organize cart data
		$cart_list = Session::get('_cart');

		foreach ($cart_list as $key => $list) {

			$data_cart_default_band = [
				"BandStyle"				=> strtolower($list['style']),
				"BandSize"				=> strtolower($list['size']),
				"Font"					=> strtolower($list['fonts']),
				"ProductionTime"		=> $list['time_production']['days'],
				"arProduction"			=> json_encode($list['time_production']),
				"PriceProduction"		=> $list['time_production']['price'],
				"Delivery"				=> $list['time_shipping']['days'],
				"arShipping"			=> json_encode($list['time_shipping']),
				"PriceDelivery"			=> $list['time_shipping']['price'],
			];
			
			$data_cart = [];
			$data_cart_free = [];
			$data_cart_item = [];

			foreach ($list['items']['data'] as $stylesKey => $items) {

				$data_cart_item_attr = [];
				$data_cart_item_addons = [];
				$item_qty = 0;

				foreach ($items['list'] as $variantsKey => $variants) {

					$has_molding_fee = true;

					foreach ($variants as $key => $item) {

						$moldingFeePrice = ['price'=> 0];

						if($has_molding_fee) {
							$moldingFee = new MoldingFee();
							$moldingFee = $moldingFee->getJSONPrice()[0];
							$moldingFeePrice['price'] = $moldingFee;
							$has_molding_fee = false;
						}

						$comment = ["font_color"=> strtoupper($item['font']), "font_name"=> ucwords(strtolower($item['font_title'])), "size"=> strtolower($item['size'])];
						$arKeychains = ["quantity" => 0];
						$arWristbands = ["quantity" => 0];

						if (isset($list['free'])) {

							if (isset($list['free']['key-chain'])) {
								if (isset($list['free']['key-chain']['items'])) {
									if (isset($list['free']['key-chain']['items'][$stylesKey])) {
										if (isset($list['free']['key-chain']['items'][$stylesKey][$variantsKey])) {
											if (isset($list['free']['key-chain']['items'][$stylesKey][$variantsKey][$key])) {
												$arKeychainsQty = $list['free']['key-chain']['items'][$stylesKey][$variantsKey][$key]['qty'];
												$arKeychains = ["quantity"=> $arKeychainsQty];
											}
										}
									}
								}
							}

							if (isset($list['free']['wristbands'])) {
								if (isset($list['free']['wristbands']['items'])) {
									if (isset($list['free']['wristbands']['items'][$stylesKey])) {
										if (isset($list['free']['wristbands']['items'][$stylesKey][$variantsKey])) {
											if (isset($list['free']['wristbands']['items'][$stylesKey][$variantsKey][$key])) {
												$arWristbandsQty = $list['free']['wristbands']['items'][$stylesKey][$variantsKey][$key]['qty'];
												$arWristbands = ["quantity"=> $arWristbandsQty];
											}
										}
									}
								}
							}

						}

						// Message
						if (isset($list['texts'])) {

							if (isset($list['texts']['continue'])) {
								$data_cart_default_band['MessageStyle'] = "continuous";
								$data_cart_default_band['ContinuousMessage'] = $list['texts']['continue']['text'];
								// Reconstruct array
									$arrMessage = $list['texts']['continue'];
									$arrMessage['quantity'] = $item['qty'];
									$arrMessage['total'] = $arrMessage['price'] * $arrMessage['quantity'];
								$data_cart_default_band['arContinuousMessage'] = json_encode($arrMessage);
								$data_cart_default_band['PriceContinuousMessage'] = json_encode($arrMessage['total']);
							}

							if (isset($list['texts']['front'])) {
								$data_cart_default_band['MessageStyle'] = "front_back";
								$data_cart_default_band['FrontMessage'] = $list['texts']['front']['text'];
								// Reconstruct array
									$arrMessage = $list['texts']['front'];
									$arrMessage['quantity'] = $item['qty'];
									$arrMessage['total'] = $arrMessage['price'] * $arrMessage['quantity'];
								$data_cart_default_band['arFrontMessage'] = json_encode($arrMessage);
							}

							if (isset($list['texts']['back'])) {
								$data_cart_default_band['MessageStyle'] = "front_back";
								$data_cart_default_band['BackMessage'] = $list['texts']['back']['text'];
								// Reconstruct array
									$arrMessage = $list['texts']['back'];
									$arrMessage['quantity'] = $item['qty'];
									$arrMessage['total'] = $arrMessage['price'] * $arrMessage['quantity'];
								$data_cart_default_band['arBackMessage'] = json_encode($arrMessage);
								$data_cart_default_band['PriceBackMessage'] = json_encode($arrMessage['total']);
							}

							if (isset($list['texts']['inside'])) {
								// Reconstruct array
									$arrMessage = $list['texts']['inside'];
									$arrMessage['quantity'] = $item['qty'];
									$arrMessage['total'] = $arrMessage['price'] * $arrMessage['quantity'];
								$data_cart_default_band['arInsideMessage'] = json_encode($arrMessage);
							}

						}

						// Clipart
						if (isset($list['clips'])) {

							if (isset($list['clips']['logo'])) {

								if (isset($list['clips']['logo']['front-end'])) {
									$arrImage = $list['clips']['logo']['front-end'];
									$arrImage['quantity'] = $item['qty'];
									$arrImage['total'] = $arrImage['quantity'] * $arrImage['price'];
									$data_cart_default_band['FrontMessageEndClipart'] = $arrImage['image'];
									$data_cart_default_band['arFrontMessageEndClipart'] = json_encode($arrImage);
								}

								if (isset($list['clips']['logo']['front-start'])) {
									$arrImage = $list['clips']['logo']['front-start'];
									$arrImage['quantity'] = $item['qty'];
									$arrImage['total'] = $arrImage['quantity'] * $arrImage['price'];
									$data_cart_default_band['FrontMessageStartClipart'] = $arrImage['image'];
									$data_cart_default_band['arFrontMessageStartClipart'] = json_encode($arrImage);
								}

								if (isset($list['clips']['logo']['back-end'])) {
									$arrImage = $list['clips']['logo']['back-end'];
									$arrImage['quantity'] = $item['qty'];
									$arrImage['total'] = $arrImage['quantity'] * $arrImage['price'];
									$data_cart_default_band['BackMessageEndClipart'] = $arrImage['image'];
									$data_cart_default_band['arBackMessageEndClipart'] = json_encode($arrImage);
								}

								if (isset($list['clips']['logo']['back-start'])) {
									$arrImage = $list['clips']['logo']['back-start'];
									$arrImage['quantity'] = $item['qty'];
									$arrImage['total'] = $arrImage['quantity'] * $arrImage['price'];
									$data_cart_default_band['BackMessageStartClipart'] = $arrImage['image'];
									$data_cart_default_band['arBackMessageStartClipart'] = json_encode($arrImage);
								}

								if (isset($list['clips']['logo']['cont-end'])) {
									$arrImage = $list['clips']['logo']['cont-end'];
									$arrImage['quantity'] = $item['qty'];
									$arrImage['total'] = $arrImage['quantity'] * $arrImage['price'];
									$data_cart_default_band['ContinuousEndClipart'] = $arrImage['image'];
									$data_cart_default_band['arContinuousEndClipart'] = json_encode($arrImage);
								}

								if (isset($list['clips']['logo']['cont-start'])) {
									$arrImage = $list['clips']['logo']['cont-start'];
									$arrImage['quantity'] = $item['qty'];
									$arrImage['total'] = $arrImage['quantity'] * $arrImage['price'];
									$data_cart_default_band['ContinuousMessageStartClipart'] = $arrImage['image'];
									$data_cart_default_band['arContinuousMessageStartClipart'] = json_encode($arrImage);
								}

							}

						}

						// Addons
						if (isset($list['addon'])) {

							// 3mm Thick
							if (isset($list['addon']['3mm-thick'])) {
								$arrAddonBand = $list['addon']['3mm-thick'];
								// Update values for individual items
								$arrAddonBand['quantity'] = $item['qty'];
								$arrAddonBand['total'] = $arrAddonBand['quantity'] * $arrAddonBand['price'];
								// Set arAddons values
								$data_cart_item_addons['3mmThick'] = $arrAddonBand;
							}

							// Digital Print / Digital Proof
							if (isset($list['addon']['digital-proof'])) {
								$arrAddonBand = $list['addon']['digital-proof'];
								// Update values for individual items
								$arrAddonBand['quantity'] = $item['qty'];
								$arrAddonBand['total'] = $arrAddonBand['quantity'] * $arrAddonBand['price'];
								// Set values
								$data_cart_default_band['DigitalPrint'] = $arrAddonBand['quantity'];
								$data_cart_default_band['PriceDigitalPrint'] = $arrAddonBand['price'];
								// Set arAddons values
								$data_cart_item_addons['DigitalPrint'] = $arrAddonBand;
							}

							// Eco Friendly Addon
							if (isset($list['addon']['eco-friendly'])) {
								$arrAddonBand = $list['addon']['eco-friendly'];
								// Update values for individual items
								$arrAddonBand['quantity'] = $item['qty'];
								$arrAddonBand['total'] = $arrAddonBand['quantity'] * $arrAddonBand['price'];
								// Set arAddons values
								$data_cart_item_addons['Ecofriendly'] = $arrAddonBand;
							}

							// Individual Pack Addon
							if (isset($list['addon']['individual'])) {
								$arrAddonBand = $list['addon']['individual'];
								// Update values for individual items
								$arrAddonBand['quantity'] = $item['qty'];
								$arrAddonBand['total'] = $arrAddonBand['quantity'] * $arrAddonBand['price'];
								// Set values
								$data_cart_default_band['Individual_Pack'] = $arrAddonBand['quantity'];
								$data_cart_default_band['PriceIndividual_Pack'] = $arrAddonBand['price'];
								// Set arAddons values
								$data_cart_item_addons['Individual_Pack'] = $arrAddonBand;
							}

							// Glitters Addon
							if (isset($list['addon']['glitters'])) {
								$arrAddonBand = $list['addon']['glitters'];
								// Update values for individual items
								$arrAddonBand['quantity'] = $item['qty'];
								$arrAddonBand['total'] = $arrAddonBand['quantity'] * $arrAddonBand['price'];
								// Set arAddons values
								$data_cart_item_addons['Glitters'] = $arrAddonBand;
							}

							// Keychain Addon
							if (isset($list['addon']['key-chain'])) {
								$arrAddonBand = $list['addon']['key-chain'];
								// Update values for individual items
								if ($arrAddonBand['all'] == 'true') {
									$arrAddonBand['quantity'] = $item['qty'];
								} else {
									$arrAddonBand['quantity'] = $arrAddonBand['items'][$variantsKey['style']][$attr_key]['size'][$attr['size']]['qty'];
								}
								$arrAddonBand['total'] = $arrAddonBand['quantity'] * $arrAddonBand['price'];
								// Set values
								$data_cart_default_band['Keychain'] = $arrAddonBand['quantity'];
								$data_cart_default_band['PriceKeychain'] = $arrAddonBand['price'];
								// Set arAddons values
								unset($arrAddonBand['items']);
								$data_cart_item_addons['Keychain'] = $arrAddonBand;
							}

						}

						$data_cart_item_attr[] = [
							"_Name"			=> ucwords(strtolower($item['title'])),
							"_Size"			=> strtolower($item['size']),
							"BandType"		=> $item['type'],
							"arColors"		=> json_encode(explode(',', strtoupper($item['color']))), // JSON String ~ Color
							"Qty"			=> $item['qty'], // String ~ Quantity
							"Comments"		=> json_encode($comment), // JSON String ~ Comment
							"FreeQty"		=> $arWristbands['quantity'], // Int ~ Free wristbands
							"arFree"		=> json_encode(["wristbands"=> $arWristbands, "keychains"=> $arKeychains]), // JSON String ~ Free wristbands & keychains
							"arAddons"		=> json_encode($data_cart_item_addons), // JSON String ~ Addons
							// "PriceMouldingFee"	=> $items['price_moldfee'],
							// "arMoldingFee"		=> json_encode(['price'=> '', 'total'=> $items['price_moldfee']]), // JSON String ~ Molding Fee
							"PriceMouldingFee"	=> $moldingFeePrice['price'],
							"arMoldingFee"		=> json_encode($moldingFeePrice), // JSON String ~ Molding Fee
						];

					}

				}

				foreach ($data_cart_item_attr as $value) {
					// Compute add-ons
					$itemAllPrice = 0;

					foreach (json_decode($value['arAddons'], true) as $addval) {
						$itemAllPrice += $addval['total'];
					}

					$itemTotalPrice = $value['Qty'] * $list['price'];
					$itemAddonsPrice = $value['Qty'] * $items['price_addon'];
					$itemMoldingFee = $value["PriceMouldingFee"];

					// Total computation
					$data_cart_item['UnitPrice'] = $itemTotalPrice + $itemAddonsPrice + $itemAllPrice;
					$data_cart_item['Total'] = $itemTotalPrice + $itemAddonsPrice + $itemAllPrice + $itemMoldingFee;
					$data_cart[] = array_merge($data_cart_item, $value);
				}

			}

			// Last thing to do. Merge everything...
			foreach ($data_cart as $cart_key => $cart_val) {
				$data[] = array_merge($data_cart_default, $data_cart_default_band, $cart_val);
			}

		}

		return $data;
	}

	private function getCartShipping()
	{
		$data = [
			"days" => 0,
			"total" => 0,
			"items" => [],
		];

		$cart_list = Session::get('_cart');

		foreach ($cart_list as $key => $list) {
			$data['days'] += $list['time_shipping']['days'];
			$data['total'] += $list['time_shipping']['price'];
			$data['items'][] = $list['time_shipping'];
		}

		return $data;
	}

	private function getCartProduction()
	{
		$data = [
			"days" => 0,
			"total" => 0,
			"items" => [],
		];

		$cart_list = Session::get('_cart');

		foreach ($cart_list as $key => $list) {
			$data['days'] += $list['time_production']['days'];
			$data['total'] += $list['time_production']['price'];
			$data['items'][] = $list['time_production'];
		}

		return $data;
	}

	private function getWristbandsSizeName($size="")
	{
		$name = "";
		switch($size) {
			case '0-25inch':
				$name = "1/4 inch";
				break;
			case '0-50inch':
				$name = "1/2 inch";
				break;
			case '0-75inch':
				$name = "3/4 inch";
				break;
			case '1-00inch':
				$name = "1 inch";
				break;
			case '1-50inch':
				$name = "1 1/2 inch";
				break;
			case '2-00inch':
				$name = "2 inch";
				break;
			default:
				$name = "1/2 inch";
				break;
		}
		return $name;
	}

	private function getWristbandItemSizeName($size="")
	{
		$name = "";
		switch($size) {
			case 'yt':
				$name = " (Youth)";
				break;
			case 'md':
				$name = " (Medium)";
				break;
			case 'ad':
				$name = " (Adult)";
				break;
			case 'xs':
				$name = " (Extra Small)";
				break;
			case 'xl':
				$name = " (Extra Large)";
				break;
		}
		return $name;
	}

}
