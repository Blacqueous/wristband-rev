
@extends('template.layout')

@section('title', ' - Success!')

@section('css')
<!-- Additional CSS styles -->
        <style>
            .btn.btn-default {
                font-size: 16px;
                padding: 10px 15px;
            }
            .btn.btn-submit {
                font-size: 16px;
                padding: 10px 15px;
            }
            .btn-or {
                font-size: 16px;
                margin: 0px 10px;
            }
            .row {
                background-color: #fff;
                margin-bottom: 20px;
                margin-top: 20px;
                padding: 30px;
            }
            .success-description {
                margin-top: 30px;
                margin-bottom: 40px;
            }
            .success-div {}
            .success-icon {
                color: #4caf50;
                font-size: 100px;
            }
        </style>
@endsection

@section('js')
@endsection

@section('content')
<div class="container">

    <div class="row">
        
        <div class="success-div col-xs-12 text-center">

            <i class="fa fa-check-circle text-success success-icon"></i>

            <h1>ORDER SUBMITTED</h1>

            <div class="success-description">
                <h4>What would you like to do next?</h4>
            </div>

            <a href="/" class="btn btn-default"><i class="fa fa-home"></i> Go Home</a>
            <span class="btn-or">or</span>
            <a href="/order" class="btn btn-submit"><i class="fa fa-shopping-basket"></i> Create New Order</a>

        </div>

    </div>


</div>
@endsection
