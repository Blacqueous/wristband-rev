
@extends('template.layout')

@section('title', ' - Cart')

@section('css')
@endsection

@section('js')
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <?php if(Session::has('_cart')) : ?>
                <table class="table table-bordered table-hover" style="background-color:#FFFFFF;font-size:14px;margin-top:20px;">
                    <thead>
                        <tr style="background-color:#008C94;color:#FFFFFF;font-size:16px;">
                            <th></th>
                            <th>Decription</th>
                            <th class="text-center">Qty</th>
                            <th class="text-center">SubTotal</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                    <tfoot>
                        <tr style="background-color:#008C94;color:#FFFFFF;font-size:16px;">
                            <th></th>
                            <th></th>
                            <th></th>
                            <th>
                                <div class="row" style="margin-bottom:5px;">
                                    <div class="col-xs-6" style="padding:0px;">Sub Total :</div>
                                    <div class="col-xs-6" style="padding:0px;">
                                        <strong>
                                            $
                                        </strong>
                                    </div>
                                </div>
                                <div class="row" style="margin-bottom:5px;">
                                    <div class="col-xs-6" style="padding:0px;">Discount :</div>
                                    <div class="col-xs-6" style="padding:0px;">
                                        <strong>
                                            $0.00
                                        </strong>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6" style="padding:0px;">Grand Total :</div>
                                    <div class="col-xs-6" style="padding:0px;">
                                        <strong>
                                            $
                                        </strong>
                                    </div>
                                </div>
                            </th>
                        </tr>
                    </tfoot>
                </table>
                <div class="row text-center">
                    <button class="btn btn-xs btn-warning" style="background:#FFC107;">Continue as order</button>
                </div>
            <?php else : ?>
                <div class="container">
                    <div class="row text-center">
                        <br/>
                        <h1>CART IS EMPTY</h1>
                        <br/>
                        <a href="/order" class="btn btn-xs btn-secondary btn-cart" style="font-size:14px;padding:10px;">Click here to start your Order!</a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <br/>
        <div class="clearfix"></div>
    </div>
    <!-- end container -->

@endsection
