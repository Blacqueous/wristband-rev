
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
                                <input type="text" class="form-control" id="bInfoFirstName" name="bInfoFirstName" value="" required>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <div class="form-group">
                            <label for="bInfoLastName" class="control-label col-md-4">Last Name <span class="text-danger">*</span></label>
                            <div class="control-input col-md-8">
                                <input type="text" class="form-control" id="bInfoLastName" name="bInfoLastName" value="" required>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <div class="form-group">
                            <label for="bInfoEmail" class="control-label col-md-4">Email Address <span class="text-danger">*</span></label>
                            <div class="control-input col-md-8">
                                <input type="email" class="form-control" id="bInfoEmail" name="bInfoEmail" value="" required>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <div class="form-group">
                            <label for="bInfoContactNo" class="control-label col-md-4">Contact No. <span class="text-danger">*</span></label>
                            <div class="control-input col-md-8">
                                <input type="text" class="form-control" id="bInfoContactNo" name="bInfoContactNo" value="" required>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <div class="form-group">
                            <label for="bInfoStreetAddress1" class="control-label col-md-4">Address <span class="text-danger">*</span></label>
                            <div class="control-input col-md-8">
                                <input type="text" class="form-control" id="bInfoStreetAddress1" name="bInfoStreetAddress1" value="" required>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <div class="form-group">
                            <label for="bInfoStreetAddress2" class="control-label col-md-4">Address 2</label>
                            <div class="control-input col-md-8">
                                <input type="text" class="form-control" id="bInfoStreetAddress2" name="bInfoStreetAddress2" value="" required>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <div class="form-group">
                            <label for="bInfoCity" class="control-label col-md-4">City <span class="text-danger">*</span></label>
                            <div class="control-input col-md-8">
                                <input type="text" class="form-control" id="bInfoCity" name="bInfoCity" value="" required>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <div class="form-group">
                            <label for="bInfoState" class="control-label col-md-4">State/Province <span class="text-danger">*</span></label>
                            <div class="control-input col-md-8">
                                <input type="text" class="form-control" id="bInfoState" name="bInfoState" value="" required>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <div class="form-group">
                            <label for="bInfoZipCode" class="control-label col-md-4">Zip Code <span class="text-danger">*</span></label>
                            <div class="control-input col-md-8">
                                <input type="text" class="form-control" id="bInfoZipCode" name="bInfoZipCode" value="" required>
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
                                <input type="text" class="form-control" id="sInfoFirstName" name="sInfoFirstName" value="" required>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <div class="form-group">
                            <label for="sInfoLastName" class="control-label col-md-4">Last Name <span class="text-danger">*</span></label>
                            <div class="control-input col-md-8">
                                <input type="text" class="form-control" id="sInfoLastName" name="sInfoLastName" value="" required>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <div class="form-group">
                            <label for="sInfoStreetAddress1" class="control-label col-md-4">Address <span class="text-danger">*</span></label>
                            <div class="control-input col-md-8">
                                <input type="text" class="form-control" id="sInfoStreetAddress1" name="sInfoStreetAddress1" value="" required>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <div class="form-group">
                            <label for="sInfoStreetAddress2" class="control-label col-md-4">Address 2</label>
                            <div class="control-input col-md-8">
                                <input type="text" class="form-control" id="sInfoStreetAddress2" name="sInfoStreetAddress2" value="" required>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <div class="form-group">
                            <label for="sInfoCity" class="control-label col-md-4">City <span class="text-danger">*</span></label>
                            <div class="control-input col-md-8">
                                <input type="text" class="form-control" id="sInfoCity" name="sInfoCity" value="" required>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <div class="form-group">
                            <label for="sInfoState" class="control-label col-md-4">State/Province <span class="text-danger">*</span></label>
                            <div class="control-input col-md-8">
                                <input type="text" class="form-control" id="sInfoState" name="sInfoState" value="" required>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <div class="form-group">
                            <label for="sInfoZipCode" class="control-label col-md-4">Zip Code <span class="text-danger">*</span></label>
                            <div class="control-input col-md-8">
                                <input type="text" class="form-control" id="sInfoZipCode" name="sInfoZipCode" value="" required>
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
                                                for($x = 0; $x < 5; $x++) {
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

                        </div>

                        <div class="payment-type-pp hide">
                            
                            <div class="form-group">
                                <label for="PaypalEmail" class="control-label col-lg-4">PayPal Email Address <span class="text-danger">*</span></label>
                                <div class="control-input col-lg-8">
                                    <input type="email" class="form-control" id="PaypalEmail" name="PaypalEmail" value="" required>
                                </div>
                                <div class="clearfix"></div>
                            </div>
    
                            <div class="form-group form-checkbox">
                                <div class="col-lg-4"></div>
                                <div class="control-input col-lg-8">
                                    <input type="checkbox" id="samePaypalEmail" name="samePaypalEmail" value="Y">
                                    <label for="samePaypalEmail" class="control-label">Same as Billing Email?</label>
                                </div>
                                <div class="clearfix"></div>
                            </div>

                            <div class="clearfix"></div>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="page-header page-header-hidden">
                            <h3>&nbsp;</h3>
                        </div>

                        <div class="form-total">
                            <div class="form-group">
                                <div class="form-total-title col-md-6">Sub Total:</div>
                                <div class="form-total-value col-md-6">
                                    $0.00
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <div class="form-total-title col-md-6">Discount:</div>
                                <div class="form-total-value col-md-6">
                                    $0.00
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <hr/>
                            <div class="form-group">
                                <div class="form-total-title col-md-6">Grand Total:</div>
                                <div class="form-total-value grand-total col-md-6">
                                    $0.00
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
