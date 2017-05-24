
@extends('template.layout')

@section('title', ' - Thank you for shopping!')

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
    .form-label {
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
                    
                    <div class="col-md-6">
                        <label for="coFirstName" class="form-label">First Name</label>
                        <div class="form-input">
                            <input type="text" class="form-control" id="coFirstName" name="FirstName" value="" placeholder="">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="coSurname" class="form-label">Surname</label>
                        <div class="form-input">
                            <input type="text" class="form-control" id="coSurname" name="Surname" value="" placeholder="">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="coStreetAddress1" class="form-label">Street address</label>
                        <div class="form-input">
                            <input type="text" class="form-control" id="coStreetAddress1" name="StreetAddress1" value="" placeholder="">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="coStreetAddress2" class="form-label">Street address 2 (optional)</label>
                        <div class="form-input">
                            <input type="text" class="form-control" id="coStreetAddress2" name="StreetAddress2" value="" placeholder="">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label for="coCity" class="form-label">City</label>
                        <div class="form-input">
                            <input type="text" class="form-control" id="coCity" name="City" value="" placeholder="">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label for="coState" class="form-label">State</label>
                        <div class="form-input">
                            <input type="text" class="form-control" id="coState" name="State" value="" placeholder="">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label for="coPostalCode" class="form-label">Postal code</label>
                        <div class="form-input">
                            <input type="text" class="form-control" id="coPostalCode" name="PostalCode" value="" placeholder="">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="" class="form-label">Email</label>
                        <div class="form-input">
                            <input type="email" class="form-control" id="email" name="Email" value="" placeholder="">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="" class="form-label">Confirm Email</label>
                        <div class="form-input">
                            <input type="email" class="form-control" id="email" name="EmailConfirm" value="" placeholder="">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="" class="form-label">Phone Number</label>
                        <div class="form-input">
                            <input type="text" class="form-control" id="phoneNum" name="PhoneNumber" value="" placeholder="">
                        </div>
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
