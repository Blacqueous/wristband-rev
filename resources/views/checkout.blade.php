
@extends('template.layout')

@section('title', ' - Checkout')

@section('css')
<style>
    h2 {
        color: #333!important;
    }
    .btn-primary:hover, .btn-primary:focus {
        background-color: #286090;
    }
    #order-success-summary .fa {
        padding-right: 10px;
    }
    .summary-table-group {
        padding-bottom: 10px;
    }
    .no-padding-left {
        text-align: left;
        padding-bottom: 10px;
    }
    .no-padding-right {
        text-align: right;
        padding-bottom: 10px;
    }
    .order-list {
        border-top: 1px #c3c3c3 solid;
        font-size: 15px;
        padding-top: 10px;
    }
    .padding-left-25 {
        text-align: left;
        padding-left: 25px;
    }
    .row-header, .row-header h1 {
        padding-bottom: 0px;
    }
    .title {
        font-size: 96px;
    }
    .summary-title {
        color: #117864;
        font-size: 60px;
        margin-top: 25px;
    }
    .summary-table .header {
        border-bottom: 0px;
        font-size: 16px;
        margin-bottom: 10px;
        margin-top: 10px;
        padding-bottom: 0px;
    }
    .control-label {
        margin-top: 15px;
    }
    .form-input {
        margin-top: 10px;
        padding-left: 0px;
        padding-right: 0px;
    }
    input.form-control {
        width: 100%;
    }
    .form-margin {
        margin-bottom: 25px;
    }
    .btn-primary.focus, .btn-primary:focus {
        color: #286090;
    }
    .paypal-button {
        max-width: 100%;
    }
</style>
@endsection

@section('js')
    <!-- Toastr Notification plugin -->
    <script src="global/toastr/build/toastr.min.js"></script>
    <!-- Cart page js file -->
    <script src="js/checkout.js"></script>
@endsection

@section('content')

<div class="container">

    <form id="checkoutSubmit" class="" action="/checkout/submit" method="post">

        <div class="row">

            <h1 class="cart-title text-center">CHECKOUT FORM</h1>

            <div class="cart-summary">

                <div class="summary-table">
                    
                    <div class="col-xs-12">

                        <h2>SHIPPING <small>(Required fields are markes in *)</small></h2>

                        <hr>

                        <div class="col-sm-6">

                            <div class="form-group">
                                <label for="coFirstName" class="control-label col-md-3 no-padding-left">First Name *</label>
                                <div class="form-input">
                                    <input type="text" class="form-control" id="coFirstName" name="FirstName" value="" placeholder="">
                                </div>
                            </div>

                        </div>

                        <div class="col-sm-6">

                            <div class="form-group">
                                <label for="coSurname" class="control-label">Last Name *</label>
                                <div class="form-input">
                                    <input type="text" class="form-control" id="coSurname" name="Surname" value="" placeholder="">
                                </div>
                            </div>

                        </div>

                        <div class="col-sm-6">

                            <div class="form-group">
                                <label for="coStreetAddress1" class="control-label">Address 1 *</label>
                                <div class="form-input">
                                    <input type="text" class="form-control" id="coStreetAddress1" name="StreetAddress1" value="" placeholder="">
                                </div>
                            </div>

                        </div>

                        <div class="col-sm-6">

                            <div class="form-group">
                                <label for="coStreetAddress2" class="control-label">Address 2</label>
                                <div class="form-input">
                                    <input type="text" class="form-control" id="coStreetAddress2" name="StreetAddress2" value="" placeholder="">
                                </div>
                            </div>

                        </div>

                        <div class="col-sm-6">

                            <div class="form-group">
                                <label for="coCity" class="control-label">City *</label>
                                <div class="form-input">
                                    <input type="text" class="form-control" id="coCity" name="City" value="" placeholder="">
                                </div>
                            </div>

                        </div>

                        <div class="col-sm-6">

                            <div class="form-group">
                                <label for="coState" class="control-label">State *</label>
                                <div class="form-input">
                                    <input type="text" class="form-control" id="coState" name="State" value="" placeholder="">
                                </div>
                            </div>

                        </div>

                        <div class="clearfix"></div>

                        <div class="col-sm-6">

                            <div class="form-group">
                                <label for="coPostalCode" class="control-label">Zip Code *</label>
                                <div class="form-input">
                                    <input type="text" class="form-control" id="coPostalCode" name="PostalCode" value="" placeholder="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="control-label">Phone *</label>
                                <div class="form-input">
                                    <input type="text" class="form-control" id="phoneNum" name="PhoneNumber" value="" placeholder="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="control-label">Email *</label>
                                <div class="form-input">
                                    <input type="email" class="form-control" id="email" name="Email" value="" placeholder="">
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="col-xs-12">

                        <h2>PAYMENT <small>(Please choose a payment method)</small></h2>

                        <hr>

                        <div id="paypal-button"></div>

                        <script src="http://www.paypalobjects.com/api/checkout.js"></script>

                        <script>

                            paypal.Button.render({

                                env: 'sandbox', // sandbox | production

                                // PayPal Client IDs - replace with your own
                                // Create a PayPal app: https://developer.paypal.com/developer/applications/create
                                client: {
                                    sandbox:    '<?php echo App::make('config')->get('services.paypal.client_id'); ?>',
                                    production: '<insert production client id>'
                                },

                                // Show the buyer a 'Pay Now' button in the checkout flow
                                commit: true,

                                // payment() is called when the button is clicked
                                payment: function(data, actions) {
                                    console.log(data);
                                    console.log(actions);

                                    // Make a call to the REST api to create the payment
                                    return actions.payment.create({
                                        transactions: [
                                            {
                                                amount: { total: '1.50', currency: 'USD' }
                                            }
                                        ]
                                    });
                                },

                                // onAuthorize() is called when the buyer approves the payment
                                onAuthorize: function(data, actions) {
                                    console.log(data);
                                    console.log(actions);

                                    // Make a call to the REST api to execute the payment
                                    return actions.payment.execute().then(function() {

                                        // The payment is complete!
                                        // You can now show a confirmation message to the customer
                                            window.alert('Payment Complete!');
                                    });
                                },

                                style: {
                                    size: 'responsive',
                                    color: 'blue',
                                    shape: 'rect',
                                    label: 'pay'
                                },

                            }, '#paypal-button');

                        </script>

                    </div>

                    <div class="col-xs-12 form-margin"></div>

                    <div class="clearfix"></div>

                </div>

            </div>

            <div class="cart-total">

                <div class="form-margin"></div>

            </div>

            <div class="cart-submit-options col-xs-12 text-center">
                <button type="submit" class="btn btn-primary btn-submit-lg"><i class="fa fa-cart"></i>&nbsp;&nbsp;SUBMIT ORDER</button> &nbsp;
            </div>

        </div>
        
    </form>

</div>

@endsection
