
@extends('template.layout')

@section('title', ' - Checkout')

@section('css')
<!-- Additional CSS plugins -->
        <link href="{{ URL::asset('css/checkout.css') }}" rel="stylesheet">
		<!-- iCheck plugin -->
        <link href="{{ URL::asset('global/iCheck/skins/square/green.css') }}" rel="stylesheet" type="text/css">
		<!-- Toastr notification plugin -->
		<link href="{{ URL::asset('global/toastr/build/toastr.css') }}" rel="stylesheet" type="text/css">
		<!-- Bootstrap helper -->
		<link href="{{ URL::asset('global/bootstrap-formhelpers/css/bootstrap-formhelpers.min.css') }}" rel="stylesheet" type="text/css">
		<!-- Payform JS -->
		<link href="{{ URL::asset('global/payform.js/css/styles.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('js')
<!-- Additional JS plugins -->
        <script src="{{ URL::asset('js/checkout.js') }}"></script>
		<!-- iCheck plugin -->
        <script src="{{ URL::asset('global/iCheck/icheck.min.js') }}"></script>
		<!-- Toastr notification plugin -->
        <script src="{{ URL::asset('global/toastr/build/toastr.min.js') }}"></script>
		<!-- Bootstrap helper -->
        <script src="{{ URL::asset('global/bootstrap-formhelpers/js/bootstrap-formhelpers.min.js') }}"></script>
		<!-- Payform JS -->
        <script src="{{ URL::asset('global/payform.js/js/jquery.payform.min.js') }}"></script>
		<!-- jQuery form validation plugin -->
        <script src="{{ URL::asset('global/jquery-form-validator/jquery.validate.min.js') }}"></script>
        <script src="{{ URL::asset('global/jquery-form-validator/additional-methods.min.js') }}"></script>
@endsection

@section('content')

<?php
    $data = Session::has('_old_input') ? Session::get('_old_input') : [];
    $total = 0;
	// Organize cart data
	$cart = Session::get('_cart');
	foreach ($cart as $items) {
        $total += $items['total'];
    }
?>

<script type="text/javascript">
    var errMsg = "{{ $errors->checkout->first('message') }}";
    var bInfoCountry = "<?php echo isset($data['bInfoCountry']) ? $data['bInfoCountry'] : ''; ?>";
    var sInfoCountry = "<?php echo isset($data['sInfoCountry']) ? $data['sInfoCountry'] : ''; ?>";
    var bInfoState = "<?php echo isset($data['bInfoState']) ? $data['bInfoState'] : ''; ?>";
    var sInfoState = "<?php echo isset($data['sInfoState']) ? $data['sInfoState'] : ''; ?>";
    var total = "<?php echo $total; ?>";
    $(document).ready(function(e) {
        setTimeout(function() {
            if (bInfoCountry.length > 0) {
                    $('select[name="bInfoCountry"]').val(bInfoCountry).trigger('change');
                    $('select[name="bInfoState"]').val(bInfoState);
            }
            if (sInfoCountry.length > 0) {
                $('select[name="sInfoCountry"]').val(sInfoCountry).trigger('change');
                $('select[name="sInfoState"]').val(sInfoState);
            }
            $('input[name="DiscountCode"]').trigger('keyup');
        }, 500);
        if(errMsg.trim().length > 0) {
            sweetAlert("Oops...", errMsg, "error");
        }
    });
</script>

<div class="container">

    <form id="form_checkout" class="form-checkout" action="/checkout/submit" method="post" data-toggle="validator">

        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="row">

            <h1 class="checkout-title text-center">CHECKOUT FORM</h1>

                <form>

                    <div class="col-md-6">

                        <div class="page-header">
                            <h3>Billing Information</h3>
                        </div>

                        <div class="form-group">
                            <label for="bInfoFirstName" class="control-label col-md-4">First Name <span class="text-danger">*</span></label>
                            <div class="control-input col-md-8">
                                <input type="text" class="form-control" id="bInfoFirstName" name="bInfoFirstName" value="<?php echo isset($data['bInfoFirstName']) ? $data['bInfoFirstName'] : ''; ?>" required>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <div class="form-group">
                            <label for="bInfoLastName" class="control-label col-md-4">Last Name <span class="text-danger">*</span></label>
                            <div class="control-input col-md-8">
                                <input type="text" class="form-control" id="bInfoLastName" name="bInfoLastName" value="<?php echo isset($data['bInfoLastName']) ? $data['bInfoLastName'] : ''; ?>" required>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <div class="form-group">
                            <label for="bInfoEmail" class="control-label col-md-4">Email Address <span class="text-danger">*</span></label>
                            <div class="control-input col-md-8">
                                <input type="email" class="form-control" id="bInfoEmail" name="bInfoEmail" value="<?php echo isset($data['bInfoEmail']) ? $data['bInfoEmail'] : ''; ?>" required>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <div class="form-group">
                            <label for="bInfoContactNo" class="control-label col-md-4">Contact No. <span class="text-danger">*</span></label>
                            <div class="control-input col-md-8">
                                <input type="text" class="form-control" id="bInfoContactNo" name="bInfoContactNo" value="<?php echo isset($data['bInfoContactNo']) ? $data['bInfoContactNo'] : ''; ?>" required>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <div class="form-group">
                            <label for="bInfoStreetAddress1" class="control-label col-md-4">Address <span class="text-danger">*</span></label>
                            <div class="control-input col-md-8">
                                <input type="text" class="form-control" id="bInfoStreetAddress1" name="bInfoStreetAddress1" value="<?php echo isset($data['bInfoStreetAddress1']) ? $data['bInfoStreetAddress1'] : ''; ?>" required>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <div class="form-group">
                            <label for="bInfoStreetAddress2" class="control-label col-md-4">Address 2</label>
                            <div class="control-input col-md-8">
                                <input type="text" class="form-control" id="bInfoStreetAddress2" name="bInfoStreetAddress2" value="<?php echo isset($data['bInfoStreetAddress2']) ? $data['bInfoStreetAddress2'] : ''; ?>">
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <div class="form-group">
                            <label for="bInfoCity" class="control-label col-md-4">City <span class="text-danger">*</span></label>
                            <div class="control-input col-md-8">
                                <input type="text" class="form-control" id="bInfoCity" name="bInfoCity" value="<?php echo isset($data['bInfoCity']) ? $data['bInfoCity'] : ''; ?>" required>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <div class="form-group">
                            <label for="bInfoState" class="control-label col-md-4">State/Province <span class="text-danger">*</span></label>
                            <div class="control-input col-md-8">
                                <select class="form-control bfh-states" id="bInfoState" name="bInfoState" data-country="bInfoCountry"></select>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <div class="form-group">
                            <label for="bInfoZipCode" class="control-label col-md-4">Zip Code <span class="text-danger">*</span></label>
                            <div class="control-input col-md-8">
                                <input type="text" class="form-control" id="bInfoZipCode" name="bInfoZipCode" value="<?php echo isset($data['bInfoZipCode']) ? $data['bInfoZipCode'] : ''; ?>" required>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <div class="form-group">
                            <label for="bInfoCountry" class="control-label col-md-4">Country <span class="text-danger">*</span></label>
                            <div class="control-input col-md-8">
                                <select class="form-control bfh-countries" id="bInfoCountry" name="bInfoCountry" data-country="US" required></select>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                    </div>
                        
                    <div class="col-md-6">

                        <div class="page-header">
                            <h3>Shipping Information</h3>
                        </div>

                        <div class="form-group form-checkbox">
                            <input type="checkbox" id="sameInfo" name="sameInfo" value="Y">
                            <label for="sameInfo" class="control-label">Same as Billing Information?</label>
                        </div>

                        <div class="form-group">
                            <label for="sInfoFirstName" class="control-label col-md-4">First Name <span class="text-danger">*</span></label>
                            <div class="control-input col-md-8">
                                <input type="text" class="form-control" id="sInfoFirstName" name="sInfoFirstName" value="<?php echo isset($data['sInfoFirstName']) ? $data['sInfoFirstName'] : ''; ?>" required>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <div class="form-group">
                            <label for="sInfoLastName" class="control-label col-md-4">Last Name <span class="text-danger">*</span></label>
                            <div class="control-input col-md-8">
                                <input type="text" class="form-control" id="sInfoLastName" name="sInfoLastName" value="<?php echo isset($data['sInfoLastName']) ? $data['sInfoLastName'] : ''; ?>" required>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <div class="form-group">
                            <label for="sInfoStreetAddress1" class="control-label col-md-4">Address <span class="text-danger">*</span></label>
                            <div class="control-input col-md-8">
                                <input type="text" class="form-control" id="sInfoStreetAddress1" name="sInfoStreetAddress1" value="<?php echo isset($data['sInfoStreetAddress1']) ? $data['sInfoStreetAddress1'] : ''; ?>" required>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <div class="form-group">
                            <label for="sInfoStreetAddress2" class="control-label col-md-4">Address 2</label>
                            <div class="control-input col-md-8">
                                <input type="text" class="form-control" id="sInfoStreetAddress2" name="sInfoStreetAddress2" value="<?php echo isset($data['sInfoStreetAddress2']) ? $data['sInfoStreetAddress2'] : ''; ?>">
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <div class="form-group">
                            <label for="sInfoCity" class="control-label col-md-4">City <span class="text-danger">*</span></label>
                            <div class="control-input col-md-8">
                                <input type="text" class="form-control" id="sInfoCity" name="sInfoCity" value="<?php echo isset($data['sInfoCity']) ? $data['sInfoCity'] : ''; ?>" required>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <div class="form-group">
                            <label for="sInfoState" class="control-label col-md-4">State/Province <span class="text-danger">*</span></label>
                            <div class="control-input col-md-8">
                                <select class="form-control bfh-states" id="sInfoState" name="sInfoState" data-country="sInfoCountry"></select>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <div class="form-group">
                            <label for="sInfoZipCode" class="control-label col-md-4">Zip Code <span class="text-danger">*</span></label>
                            <div class="control-input col-md-8">
                                <input type="text" class="form-control" id="sInfoZipCode" name="sInfoZipCode" value="<?php echo isset($data['sInfoZipCode']) ? $data['sInfoZipCode'] : ''; ?>" required>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <div class="form-group">
                            <label for="sInfoCountry" class="control-label col-md-4">Country <span class="text-danger">*</span></label>
                            <div class="control-input col-md-8">
                                <select class="form-control input-medium bfh-countries" id="sInfoCountry" name="sInfoCountry" data-country="US" required></select>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                    </div>

                    <div class="clearfix"></div>

                    <div class="col-md-6">
        
                        <div class="col-lg-12 no-padding">

                            <div class="page-header">
                                <h3>Promo Code</h3>
                            </div>

                            <div class="form-group">
                                <div class="control-input col-md-12 no-padding">
                                    <input type="text" class="form-control form-discount" id="DiscountCode" name="DiscountCode" value="<?php echo isset($data['SAVE10']) ? $data['SAVE10'] : ''; ?>" placeholder="Promo Code">
                                    <input type="hidden" name="DiscountPercent" value="0">
									<div class="promo_error" style="color:red; font-size:10px;text-transform: uppercase;display:none;">The promo code you enter is invalid</div>
                                </div>
                                <div class="clearfix"></div>
                            </div>

                        </div>

                        <div class="col-lg-12 no-padding"  style="margin-bottom:100px;">

                            <div class="page-header">
                                <h3>Payment Information</h3>
                            </div>

                            <div class="form-group form-checkbox-inline">

                                <div class="form-group form-checkbox">
                                    <input type="radio" id="paymentTypeCC" name="PaymentType" value="CC" checked="checked" required>
                                    <label for="paymentTypeCC" class="control-label">Credit Card</label>
                                </div>

                                <div class="form-group form-checkbox">
                                    <input type="radio" id="paymentTypePP" name="PaymentType" value="PP" required>
                                    <label for="paymentTypePP" class="control-label">PayPal</label>
                                </div>

                            </div>

                            <div class="payment-type-cc">
                                
                                <div class="form-group">
                                    <label for="ccCardName" class="control-label col-md-4">Name of Card <span class="text-danger">*</span></label>
                                    <div class="control-input col-md-8">
                                        <input type="text" class="form-control" id="ccCardName" name="CardName" value="" required>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                    
                                <div class="form-group">
                                    <label for="ccCardNum" class="control-label col-md-4">Credit Card No. <span class="text-danger">*</span></label>
                                    <div class="control-input col-md-8">
                                        <input type="text" class="form-control" id="ccCardNum" name="CardNum" value="" required>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                    
                                <div class="form-group">
                                    <label for="ccCardExpDate" class="control-label col-md-4">Expiration Date <span class="text-danger">*</span></label>
                                    <div class="control-input col-md-8">
                                        <div class="no-padding col-xs-4">
                                            <select class="form-control" id="ccCardExpDateMonth" name="CardExpDateMonth" required>
                                                <option value="01">Jan</option>
                                                <option value="02">Feb</option>
                                                <option value="03">Mar</option>
                                                <option value="04">Apr</option>
                                                <option value="05">May</option>
                                                <option value="06">Jun</option>
                                                <option value="07">Jul</option>
                                                <option value="08">Aug</option>
                                                <option value="09">Sep</option>
                                                <option value="10">Oct</option>
                                                <option value="11">Nov</option>
                                                <option value="12">Dec</option>
                                            </select>
                                        </div>
                                        <div class="no-padding col-xs-6 col-xs-offset-1">
                                            <select class="form-control" id="ccCardExpDateYear" name="CardExpDateYear" required>
                                                <?php 
                                                    $ccYear = date('Y');
                                                    echo '<option value="' . ($ccYear - 1) . '">' . ($ccYear - 1) . '</option>';
                                                    for($x = 0; $x < 10; $x++) {
                                                        echo '<option value="' . ($ccYear + $x) . '">' . ($ccYear + $x) . '</option>';
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                    
                                <div class="form-group">
                                    <label for="ccCardCVV" class="control-label col-md-4">CVV <span class="text-danger">*</span></label>
                                    <div class="control-input col-md-8">
                                        <input type="text" class="form-control" id="ccCardCVV" name="CardCVV" value="" required>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="clearfix"></div>
								<div class=""><img src="{{ URL::asset('assets/images/credit-cards.png') }}"></div>

                            </div>

                            <div class="payment-type-pp hide">
                                
                                <div class="form-group">
                                    <label for="PaypalEmail" class="control-label col-lg-4">PayPal Email Address <span class="text-danger">*</span></label>
                                    <div class="control-input col-lg-8">
                                        <input type="email" class="form-control" id="PaypalEmail" name="PaypalEmail" value="" required>
                                    </div>
                                    <div class="clearfix"></div>
									<div class=""><img src="{{ URL::asset('assets/images/paypal.png') }}"></div>
                                </div>
        
                                <div class="form-group form-checkbox">
                                    <div class="col-lg-4"></div>
                                    <div class="control-input col-lg-8">
                                        <input type="checkbox" id="samePaypalEmail" name="samePaypalEmail" value="Y">
                                        <label for="samePaypalEmail" class="control-label">Same as Billing Email Address?</label>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="clearfix"></div>

                            </div>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="page-header page-header-hidden">
                            <h3>&nbsp;</h3>
                        </div>

                        <div class="form-total">

                            <?php
                                $discount_name = "";
                                $discount_price = "0.00";
                                $sub_total = 0;
                                foreach ($breakdown["items"] as $value) {
                                    if (strtoupper($value["name"]) == "DISCOUNT") {
                                        $discount_name = $value["name"];
                                        $discount_price = $value["overall_discount"];
                                    } else {
                                        $sub_total += $value["price"];
                                    }
                                }
                                $sub_total += $breakdown["details"]["shipping"];
                                $sub_total = ($sub_total > 0) ? $sub_total : "0.00";
                            ?>
    
                            <div class="form-group form-sub-total">
                                <div class="form-total-title col-md-6">Sub Total:</div>
                                <div class="form-total-value col-md-6">
                                    $<span>{{ $sub_total }}</span>
                                </div>
                                <div class="clearfix"></div>
                            </div>
    
                            <div class="form-group form-discount-total">
                                <div class="form-total-title col-md-6">Discount:</div>
                                <div class="form-total-value col-md-6">
                                    -$<span>{{ $discount_price }}</span>
                                </div>
                                <div class="clearfix"></div>
                            </div>

                            <hr/>

                            <div class="form-group form-grand-total">
                                <div class="form-total-title col-md-6"><strong>Grand Total:</strong></div>
                                <div class="form-total-value grand-total col-md-6">
                                    $<span>{{ $breakdown["amount"]["total"] }}</span>
                                </div>
                                <div class="clearfix"></div>
                            </div>

                        </div>
            
                        <div class="form-action">
                            <button type="submit" class="btn btn-primary btn-submit-lg"><i class="fa fa-cart"></i>&nbsp;&nbsp;SUBMIT ORDER</button> &nbsp;
                        </div>

                    </div>

                    <div class="clearfix"></div>

                </form>

            </div>

        </div>
        
    </form>

</div>
@endsection
