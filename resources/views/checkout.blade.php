
@extends('template.layout')

@section('title', ' - Thank you for shopping!')

@section('css')
<style>
    /*.content {
        text-align: center;
        display: inline-block;
    }*/
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
    .summary-table .header {
        border-bottom: 0px;
        font-size: 16px;
        margin-bottom: 10px;
        margin-top: 10px;
        padding-bottom: 0px;
    }
    h2 {
        color: #333!important;
    }
    .summary-title {
        color: #117864;
        font-size: 60px;
        margin-top: 25px;
    }
</style>
@endsection

@section('js')
@endsection

@section('content')
<?php print_r($items);die;?>
<div class="container">
    <div class="row summary-title text-center">
        <h1>Order submitted successfully!</h1>
    </div>
    <div class="row">
        <br/><br/>
        <div id="order-success-summary" class="col-md-8 col-md-offset-2 col-xs-12">
            <h2 style="padding-bottom:20px;">Details : </h2>
            <div class="summary-table">
                <div class="row header">
                    <div class="col-xs-6 no-padding-left"><h3>Description</h3></div>
                    <div class="col-xs-6 no-padding-right"><h3>Subtotal</h3></div>
                </div>
                <?php $grandtotal = 0; ?>
                @foreach($items as $key => $item)
                <div class="order-list col-xs-12 no-padding">
                    <div class="row" style="padding-top:10px;">
                        <div class="summary-table-group">
                            <div class="col-xs-9">
                                <i class="fa fa-eye"></i>Style (<span class="value">{{ ucwords($item['style']) }}</span>)
                            </div>
                            <div class="col-xs-3 text-right">-</div>
                            <div class="clearfix"></div>
                        </div>
                        <div id="summary-table-size" class="summary-table-group">
                            <div class="col-xs-9">
                                <?php
                                    switch($item['size']) {
                                        case '0-25inch':
                                            $item['size'] = "1/4 Inch";
                                            break;
                                        case '0-50inch':
                                            $item['size'] = "1/2 Inch";
                                            break;
                                        case '0-75inch':
                                            $item['size'] = "3/4 Inch";
                                            break;
                                        case '1-00inch':
                                            $item['size'] = "1 Inch";
                                            break;
                                        case '1-50inch':
                                            $item['size'] = "1 1/2 Inch";
                                            break;
                                        case '2-00inch':
                                            $item['size'] = "2 Inch";
                                            break;
                                        default:
                                            $item['size'] = "1/2 Inch";
                                            break;
                                    }
                                ?>
                                <i class="fa fa-arrows-alt"></i>Size (<span class="value">{{ $item['size'] }}</span>)
                            </div>
                            <div class="col-xs-3 text-right">-</div>
                            <div class="clearfix"></div>
                        </div>
                        @if(isset($item['items']))
                            <div id="summary-table-wristbands" class="summary-table-group">
                                <div class="col-xs-9">
                                    <i class="fa fa-circle-o-notch"></i>Wristbands ({{ $item['quantity'] }} x ${{ number_format($item['price'], 2) }} each)
                                </div>
                                <div class="col-xs-3 text-right">
                                    ${{ number_format($item['quantity'] * $item['price'], 2) }}
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            @if(isset($item['items']['segmented']))
                            <div id="summary-table-segmented" class="summary-table-group">
                                <div class="col-xs-9">
                                    <i class="fa fa-life-ring"></i>Segmented Wristbands (<span class="value">{{ $item['items']['segmented']['quantity'] }} x ${{ number_format($item['items']['segmented']['price_addon'], 2) }} each</span>)
                                </div>
                                <div class="col-xs-3 text-right">
                                    ${{ number_format($item['items']['segmented']['price_total'], 2) }}
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            @endif
                            @if(isset($item['items']['swirl']))
                            <div id="summary-table-swirl" class="summary-table-group">
                                <div class="col-xs-9">
                                    <i class="fa fa-life-ring"></i>Swirl Wristbands (<span class="value">{{ $item['items']['swirl']['quantity'] }} x ${{ number_format($item['items']['swirl']['price_addon'], 2) }} each</span>)
                                </div>
                                <div class="col-xs-3 text-right">
                                    ${{ number_format($item['items']['swirl']['price_total'], 2) }}
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            @endif
                            @if(isset($item['items']['glow']))
                            <div id="summary-table-glow" class="summary-table-group">
                                <div class="col-xs-9">
                                    <i class="fa fa-life-ring"></i>Glow Wristbands (<span class="value">{{ $item['items']['glow']['quantity'] }} x ${{ number_format($item['items']['glow']['price_addon'], 2) }} each</span>)
                                </div>
                                <div class="col-xs-3 text-right">
                                    ${{ number_format($item['items']['glow']['price_total'], 2) }}
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            @endif
                        @endif
                        @if(isset($item['time_production']))
                        <div id="summary-table-production" class="summary-table-group">
                            <div class="col-xs-9">
                                <i class="fa fa-dropbox"></i>Production (<span class="value">{{ $item['time_production']['days'] }} Days</span>)
                            </div>
                            <div class="col-xs-3 text-right">
                                ${{ number_format($item['time_production']['price'], 2) }}
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        @endif
                        @if(isset($item['time_shipping']))
                        <div id="summary-table-shipping" class="summary-table-group">
                            <div class="col-xs-9">
                                <i class="fa fa-truck"></i>Shipping (<span class="value">{{ $item['time_shipping']['days'] }} Days</span>)
                            </div>
                            <div class="col-xs-3 text-right">
                                ${{ number_format($item['time_shipping']['price'], 2) }}
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        @endif
                    </div>
                    @if(isset($item['texts']))
                    <div class="row" style="padding-top:10px;">
                        <div class="col-xs-12" style="padding-bottom:5px;">
                            <i class="fa fa-file-text"></i>Text :
                        </div>
                        <!-- list -->
                        @if(isset($item['texts']['front']))
                        <div id="text-front" class="summary-table-group">
                            <div class="col-xs-9 padding-left-25">
                                <i class="fa fa-angle-right"></i>Front ({{ $item['texts']['front']['quantity'] }} x ${{ number_format($item['texts']['front']['price'], 2) }} each)
                            </div>
                            <div class="col-xs-3 text-right">
                                ${{ number_format($item['texts']['front']['total'], 2) }}
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        @endif
                        @if(isset($item['texts']['back']))
                        <div id="text-back" class="summary-table-group">
                            <div class="col-xs-9 padding-left-25">
                                <i class="fa fa-angle-right"></i>Back ({{ $item['texts']['back']['quantity'] }} x ${{ number_format($item['texts']['back']['price'], 2) }} each)
                            </div>
                            <div class="col-xs-3 text-right">
                                ${{ number_format($item['texts']['back']['total'], 2) }}
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        @endif
                        @if(isset($item['texts']['continue']))
                        <div id="text-continuous" class="summary-table-group">
                            <div class="col-xs-9 padding-left-25">
                                <i class="fa fa-angle-right"></i>Continuous ({{ $item['texts']['continue']['quantity'] }} x ${{ number_format($item['texts']['continue']['price'], 2) }} each)
                            </div>
                            <div class="col-xs-3 text-right">
                                ${{ number_format($item['texts']['continue']['total'], 2) }}
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        @endif
                        @if(isset($item['texts']['inside']))
                        <div id="text-inside" class="summary-table-group">
                            <div class="col-xs-9 padding-left-25">
                                <i class="fa fa-angle-right"></i>Inside ({{ $item['texts']['inside']['quantity'] }} x ${{ number_format($item['texts']['inside']['price'], 2) }} each)
                            </div>
                            <div class="col-xs-3 text-right">
                                ${{ number_format($item['texts']['inside']['total'], 2) }}
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        @endif
                    </div>
                    @endif
                    @if(isset($item['clips']))
                    <div class="row" style="padding-top:10px;">
                        <div class="col-xs-12" style="padding-bottom:5px;">
                            <i class="fa fa-image"></i>Cliparts :
                        </div>
                        <!-- list -->
                        @if(isset($item['clips']))
                            @if(isset($item['clips']['logo']))
                                @if(isset($item['clips']['logo']['front-start']))
                                <div id="clipart-front-start" class="summary-table-group">
                                    <div class="col-xs-9 padding-left-25">
                                        <i class="fa fa-angle-right"></i>Front (Start) ({{ $item['clips']['logo']['front-start']['quantity'] }} x ${{ number_format($item['clips']['logo']['front-start']['price'], 2) }} each)
                                    </div>
                                    <div class="col-xs-3 text-right">
                                        ${{ number_format($item['clips']['logo']['front-start']['total'], 2) }}
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                @endif
                                @if(isset($item['clips']['logo']['front-end']))
                                <div id="clipart-front-end" class="summary-table-group">
                                    <div class="col-xs-9 padding-left-25">
                                        <i class="fa fa-angle-right"></i>Front (End) ({{ $item['clips']['logo']['front-end']['quantity'] }} x ${{ number_format($item['clips']['logo']['front-end']['price'], 2) }} each)
                                    </div>
                                    <div class="col-xs-3 text-right">
                                        ${{ number_format($item['clips']['logo']['front-end']['total'], 2) }}
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                @endif
                                @if(isset($item['clips']['logo']['back-start']))
                                <div id="clipart-back-start" class="summary-table-group">
                                    <div class="col-xs-9 padding-left-25">
                                        <i class="fa fa-angle-right"></i>Back (Start) ({{ $item['clips']['logo']['back-start']['quantity'] }} x ${{ number_format($item['clips']['logo']['back-start']['price'], 2) }} each)
                                    </div>
                                    <div class="col-xs-3 text-right">
                                        ${{ number_format($item['clips']['logo']['back-start']['total'], 2) }}
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                @endif
                                @if(isset($item['clips']['logo']['back-end']))
                                <div id="clipart-back-end" class="summary-table-group">
                                    <div class="col-xs-9 padding-left-25">
                                        <i class="fa fa-angle-right"></i>Back (End) ({{ $item['clips']['logo']['back-end']['quantity'] }} x ${{ number_format($item['clips']['logo']['back-end']['price'], 2) }} each)
                                    </div>
                                    <div class="col-xs-3 text-right">
                                        ${{ number_format($item['clips']['logo']['back-end']['total'], 2) }}
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                @endif
                                @if(isset($item['clips']['logo']['cont-start']))
                                <div id="clipart-cont-start" class="summary-table-group">
                                    <div class="col-xs-9 padding-left-25">
                                        <i class="fa fa-angle-right"></i>Continuous (Start) ({{ $item['clips']['logo']['cont-start']['quantity'] }} x ${{ number_format($item['clips']['logo']['cont-start']['price'], 2) }} each)
                                    </div>
                                    <div class="col-xs-3 text-right">
                                        ${{ number_format($item['clips']['logo']['cont-start']['total'], 2) }}
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                @endif
                                @if(isset($item['clips']['logo']['cont-end']))
                                <div id="clipart-cont-end" class="summary-table-group">
                                    <div class="col-xs-9 padding-left-25">
                                        <i class="fa fa-angle-right"></i>Continuous (End) ({{ $item['clips']['logo']['cont-end']['quantity'] }} x ${{ number_format($item['clips']['logo']['cont-end']['price'], 2) }} each)
                                    </div>
                                    <div class="col-xs-3 text-right">
                                        ${{ number_format($item['clips']['logo']['cont-end']['total'], 2) }}
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                @endif
                                @if(isset($item['clips']['logo']['front-center']))
                                <div id="clipart-front-center" class="summary-table-group">
                                    <div class="col-xs-9 padding-left-25">
                                        <i class="fa fa-angle-right"></i>Center ({{ $item['clips']['logo']['front-center']['quantity'] }} x ${{ number_format($item['clips']['logo']['front-center']['price'], 2) }} each)
                                    </div>
                                    <div class="col-xs-3 text-right">
                                        ${{ number_format($item['clips']['logo']['front-center']['total'], 2) }}
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                @endif
                            @endif
                        @endif
                    </div>
                    @endif
                    @if(isset($item['addon']))
                    <div class="row" style="padding-top:10px;">
                        <div class="col-xs-12" style="padding-bottom:5px;">
                            <i class="fa fa-plus-circle"></i>Add Ons :
                        </div>
                        <!-- list -->
                        @if(isset($item['addon']['3mm-thick']))
                        <div id="addon-3mm-thick" class="summary-table-group">
                            <div class="col-xs-9 padding-left-25">
                                <i class="fa fa-angle-right"></i>3mm Thick ({{ $item['addon']['3mm-thick']['quantity'] }} x ${{ number_format($item['addon']['3mm-thick']['price'], 2) }} each)
                            </div>
                            <div class="col-xs-3 text-right">
                                ${{ number_format($item['addon']['3mm-thick']['total'], 2) }}
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        @endif
                        @if(isset($item['addon']['digital-proof']))
                        <div id="addon-digital-proof" class="summary-table-group">
                            <div class="col-xs-9 padding-left-25">
                                <i class="fa fa-angle-right"></i>Digital Proof ({{ $item['addon']['digital-proof']['quantity'] }} x ${{ number_format($item['addon']['digital-proof']['price'], 2) }} each)
                            </div>
                            <div class="col-xs-3 text-right">
                                ${{ number_format($item['addon']['digital-proof']['total'], 2) }}
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        @endif
                        @if(isset($item['addon']['eco-friendly']))
                        <div id="addon-eco-friendly" class="summary-table-group">
                            <div class="col-xs-9 padding-left-25">
                                <i class="fa fa-angle-right"></i>Eco Friendly ({{ $item['addon']['eco-friendly']['quantity'] }} x ${{ number_format($item['addon']['eco-friendly']['price'], 2) }} each)
                            </div>
                            <div class="col-xs-3 text-right">
                                ${{ number_format($item['addon']['eco-friendly']['total'], 2) }}
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        @endif
                        @if(isset($item['addon']['glitters']))
                        <div id="addon-glitters" class="summary-table-group">
                            <div class="col-xs-9 padding-left-25">
                                <i class="fa fa-angle-right"></i>Glitter ({{ $item['addon']['glitters']['quantity'] }} x ${{ number_format($item['addon']['glitters']['price'], 2) }} each)
                            </div>
                            <div class="col-xs-3 text-right">
                                ${{ number_format($item['addon']['glitters']['total'], 2) }}
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        @endif
                        @if(isset($item['addon']['individual']))
                        <div id="addon-individual" class="summary-table-group">
                            <div class="col-xs-9 padding-left-25">
                                <i class="fa fa-angle-right"></i>Individual ({{ $item['addon']['individual']['quantity'] }} x ${{ number_format($item['addon']['individual']['price'], 2) }} each)
                            </div>
                            <div class="col-xs-3 text-right">
                                ${{ number_format($item['addon']['individual']['total'], 2) }}
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        @endif
                        @if(isset($item['addon']['key-chain']))
                        <div id="addon-key-chain" class="summary-table-group">
                            <div class="col-xs-9 padding-left-25">
                                <i class="fa fa-angle-right"></i>Keychain ({{ $item['addon']['key-chain']['quantity'] }} x ${{ number_format($item['addon']['key-chain']['price'], 2) }} each)
                            </div>
                            <div class="col-xs-3 text-right">
                                ${{ number_format($item['addon']['key-chain']['total'], 2) }}
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        @endif
                    </div>
                    @endif
                    @if($item['free']['key-chain']['quantity'] > 0 || $item['free']['wristbands']['quantity'] > 0)
                    <div class="row" style="padding-top:10px;padding-bottom:10px;">
                        <div class="col-xs-12" style="padding-bottom:5px;">
                            <i class="fa fa-gift"></i>Free :
                        </div>
                        <!-- list -->
                        @if( $item['free']['key-chain']['quantity'] > 0)
                        <div id="free-key-chain" class="summary-table-group">
                            <div class="col-xs-9 padding-left-25">
                                <i class="fa fa-angle-right"></i>Keychain (+{{ $item['free']['key-chain']['quantity'] }})
                            </div>
                            <div class="col-xs-3 text-right">-</div>
                            <div class="clearfix"></div>
                        </div>
                        @endif
                        @if( $item['free']['wristbands']['quantity'] > 0)
                        <div id="free-wristband" class="summary-table-group">
                            <div class="col-xs-9 padding-left-25">
                                <i class="fa fa-angle-right"></i>Wristband (+{{ $item['free']['wristbands']['quantity'] }})
                            </div>
                            <div class="col-xs-3 text-right">-</div>
                            <div class="clearfix"></div>
                        </div>
                        @endif
                    </div>
                    @endif
                    <div class="row" style="font-size:25px;padding-top:10px;padding-bottom:10px;">
                        <div class="col-xs-6 text-left">
                            Total :
                        </div>
                         <div class="col-xs-6 text-right">
                             ${{ number_format($item['total'], 2) }}
                         </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <?php $grandtotal += $item['total']; ?>
                @endforeach
            </div>
        </div>
    </div>
    <br/><br/>
    <div class="row text-center" style="font-style:italic;">
        <h4 style="margin-bottom:5px;">ORDER TOTAL PRICE</h4>
        <h1 style="margin-top:0px;"><strong>${{ number_format($grandtotal, 2) }}</strong></h1>
    </div>
    <div class="row text-center">
        <section>
            <h2>Its a pleasure doing business with you.</h2>
        </section>
        <section>
            <h2>Thank you.</h2>
        </section>
    </div>
    <br/><br/>
    <div class="col-xs-12 text-center">
        <a href="/" class="btn btn-primary">Go To Homepage</a>
    </div>
    <div class="clearfix"></div>
    <br/><br/><br/>
</div>
@endsection
