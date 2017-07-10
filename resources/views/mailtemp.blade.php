<!DOCTYPE html>
<html>
    <head>
        <title>Quote</title>
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
		<!-- Bootstrap core CSS -->
		<link href="{{ URL::asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
        <!-- Font Awesome core CSS -->
        <link href="{{ URL::asset('global/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
        <style>
            html, body {
                height: 100%;
            }
            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }
            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }
            .content {
                text-align: center;
                display: inline-block;
            }
            .fa {
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
            .padding-left-25 {
                text-align: left;
                padding-left: 25px;
            }
            .title {
                font-size: 96px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="container">
                    <div class="row">
                        Hello <span style="font-style:italic;">{{ $name }}</span> ,
                    </div>
                    <br/>
                    <div class="row">
                        We received your request to get a price quote for silicone wristbands.
                        <br/><br/>
                        Below is the exact price computation for this order based on the details we captured online.
                    </div>
                    <br/>
                    <div class="row">
                        <strong>ORDER DETAILS :</strong>
 
                        <br/><br/>
                        <div id="order-summary" class="col-xs-12">
    						<h1>Order Summary</h1>
    						<div class="summary-table">
    							<div class="row header">
    								<div class="col-xs-6 no-padding-left"><h3>Description</h3></div>
    								<div class="col-xs-6 no-padding-right"><h3>Subtotal</h3></div>
    							</div>
                                <div class="col-xs-12 no-padding-left">
                                    <div class="row" style="padding-top:10px;">
                                        <div class="summary-table-group">
                                            <div class="col-xs-9">
                                                <i class="fa fa-eye"></i>Style:(<span class="value">{{ ucwords($items['style']) }}</span>)
                                            </div>
                                            <div class="col-xs-3 text-right">-</div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div id="summary-table-size" class="summary-table-group">
                                            <div class="col-xs-9">
                                                <?php
                                                    switch($items['size']) {
                                                        case '0-25inch':
                                                            $items['size'] = "1/4 Inch";
                                                            break;
                                                        case '0-50inch':
                                                            $items['size'] = "1/2 Inch";
                                                            break;
                                                        case '0-75inch':
                                                            $items['size'] = "3/4 Inch";
                                                            break;
                                                        case '1-00inch':
                                                            $items['size'] = "1 Inch";
                                                            break;
                                                        case '1-50inch':
                                                            $items['size'] = "1 1/2 Inch";
                                                            break;
                                                        case '2-00inch':
                                                            $items['size'] = "2 Inch";
                                                            break;
                                                        default:
                                                            $items['size'] = "1/2 Inch";
                                                            break;
                                                    }
                                                ?>
                                                <i class="fa fa-arrows-alt"></i>Size: (<span class="value">{{ $items['size'] }}</span>)
                                            </div>
                                            <div class="col-xs-3 text-right">-</div>
                                            <div class="clearfix"></div>
                                        </div>
                                        @if(isset($items['items']))
                                            <div id="summary-table-wristbands" class="summary-table-group">
                                                <div class="col-xs-9">
													
													<p>Color: 
													@foreach($items['items']['solid'] as $key => $value)
														 @if(isset($value['title']))
														 {{ $items['items']['solid'][$key]['title'] }}
														@endif
													
													@endforeach
                                                    </p>

                                                    <p>Font Color:
                                                    @foreach($items['items']['solid'] as $key => $value)
                                                        @if(isset($value['title']))
                                                                @foreach($items['items']['solid'][$key]['size'] as $var => $value)
                                                                     {{ $items['items']['solid'][$key]['size'][$var]['font_name']."," }}
                                                                @endforeach
                                                        @endif
                                                    
                                                    @endforeach
                                                    </p>

                                                    <p>Size Name:
                                                    @foreach($items['items']['solid'] as $key => $value)
                                                        @if(isset($value['title']))
                                                                @foreach($items['items']['solid'][$key]['size'] as $var => $value)
                                                                     {{ $items['items']['solid'][$key]['size'][$var]['size']."," }}
                                                                @endforeach
                                                        @endif
                                                    
                                                    @endforeach
                                                    </p>

													<p>Quantity: {{ $items['quantity'] }}</p>
                                                    <i class="fa fa-circle-o-notch"></i>Wristbands ({{ $items['quantity'] }} x ${{ number_format($items['price'], 2) }} each)
                                                </div>
                                                <div class="col-xs-3 text-right">
                                                    ${{ number_format($items['quantity'] * $items['price'], 2) }}
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            @if(isset($items['items']['segmented']))
                                            <div id="summary-table-segmented" class="summary-table-group">
                                                <div class="col-xs-9">
													<p>Color: 
													@foreach($items['items']['segmented'] as $key => $value)
														 @if(isset($value['title']))
														 {{ $items['items']['segmented'][$key]['title'] }}
														@endif
													
													@endforeach
													</p>

                                                    <p>Font Color:
                                                    @foreach($items['items']['segmented'] as $key => $value)
                                                        @if(isset($value['title']))
                                                                @foreach($items['items']['segmented'][$key]['size'] as $var => $value)
                                                                     {{ $items['items']['segmented'][$key]['size'][$var]['font_name'].","  }}
                                                                @endforeach
                                                        @endif
                                                    
                                                    @endforeach
                                                    </p>

                                                    <p>Size Name:
                                                    @foreach($items['items']['segmented'] as $key => $value)
                                                        @if(isset($value['title']))
                                                                @foreach($items['items']['segmented'][$key]['size'] as $var => $value)
                                                                     {{ $items['items']['segmented'][$key]['size'][$var]['size'].","  }}
                                                                @endforeach
                                                        @endif
                                                    
                                                    @endforeach
                                                    </p>
                                                    
													<p>Quantity: {{ $items['quantity'] }}</p>
                                                    <i class="fa fa-life-ring"></i>Segmented Wristbands (<span class="value">{{ $items['items']['segmented']['quantity'] }} x ${{ number_format($items['items']['segmented']['price_addon'], 2) }} each</span>)
                                                </div>
                                                <div class="col-xs-3 text-right">
                                                    ${{ number_format($items['items']['segmented']['price_total'], 2) }}
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            @endif
                                            @if(isset($items['items']['swirl']))
                                            <div id="summary-table-swirl" class="summary-table-group">
                                                <div class="col-xs-9">
													<p>Color: 
													@foreach($items['items']['swirl'] as $key => $value)
														 @if(isset($value['title']))
														 {{ $items['items']['swirl'][$key]['title'] }}
														@endif
													
													@endforeach
													</p>

                                                    <p>Font Color:
                                                    @foreach($items['items']['swirl'] as $key => $value)
                                                        @if(isset($value['title']))
                                                                @foreach($items['items']['swirl'][$key]['size'] as $var => $value)
                                                                     {{ $items['items']['swirl'][$key]['size'][$var]['font_name']."," }}
                                                                @endforeach
                                                        @endif
                                                    
                                                    @endforeach
                                                    </p>

                                                    <p>Size Name:
                                                    @foreach($items['items']['swirl'] as $key => $value)
                                                        @if(isset($value['title']))
                                                                @foreach($items['items']['swirl'][$key]['size'] as $var => $value)
                                                                     {{ $items['items']['swirl'][$key]['size'][$var]['size'].","  }}
                                                                @endforeach
                                                        @endif
                                                    
                                                    @endforeach
                                                    </p>
                                                    
													<p>Quantity: {{ $items['quantity'] }}</p>
                                                    <i class="fa fa-life-ring"></i>Swirl Wristbands (<span class="value">{{ $items['items']['swirl']['quantity'] }} x ${{ number_format($items['items']['swirl']['price_addon'], 2) }} each</span>)
                                                </div>
                                                <div class="col-xs-3 text-right">
                                                    ${{ number_format($items['items']['swirl']['price_total'], 2) }}
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            @endif
                                            @if(isset($items['items']['glow']))
                                            <div id="summary-table-glow" class="summary-table-group">
                                                <div class="col-xs-9">
													<p>Color: 
													@foreach($items['items']['glow'] as $key => $value)
														 @if(isset($value['title']))
														 {{ $items['items']['glow'][$key]['title'] }}
														@endif
													
													@endforeach
													</p>

                                                    <p>Font Color:
                                                    @foreach($items['items']['glow'] as $key => $value)
                                                        @if(isset($value['title']))
                                                                @foreach($items['items']['glow'][$key]['size'] as $var => $value)
                                                                     {{ $items['items']['glow'][$key]['size'][$var]['font_name'].","  }}
                                                                @endforeach
                                                        @endif
                                                    
                                                    @endforeach
                                                    </p>

                                                    <p>Size Name:
                                                    @foreach($items['items']['glow'] as $key => $value)
                                                        @if(isset($value['title']))
                                                                @foreach($items['items']['glow'][$key]['size'] as $var => $value)
                                                                     {{ $items['items']['glow'][$key]['size'][$var]['size'].","  }}
                                                                @endforeach
                                                        @endif
                                                    
                                                    @endforeach
                                                    </p>
                                                    
													<p>Quantity: {{ $items['quantity'] }}</p>
                                                    <i class="fa fa-life-ring"></i>Glow Wristbands (<span class="value">{{ $items['items']['glow']['quantity'] }} x ${{ number_format($items['items']['glow']['price_addon'], 2) }} each</span>)
                                                </div>
                                                <div class="col-xs-3 text-right">
                                                    ${{ number_format($items['items']['glow']['price_total'], 2) }}
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            @endif
                                        @endif
                                        @if(isset($items['time_production']))
                                        <div id="summary-table-production" class="summary-table-group">
                                            <div class="col-xs-9">
												<p>Production Time: </p>
                                                <i class="fa fa-dropbox"></i>Production (<span class="value">{{ $items['time_production']['days'] }} Days</span>)
                                            </div>
                                            <div class="col-xs-3 text-right">
                                                ${{ number_format($items['time_production']['price'], 2) }}
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        @endif
                                        @if(isset($items['time_shipping']))
                                        <div id="summary-table-shipping" class="summary-table-group">
                                            <div class="col-xs-9">
												<p>Shipping Time: </p>
                                                <i class="fa fa-truck"></i>Shipping (<span class="value">{{ $items['time_shipping']['days'] }} Days</span>)
                                            </div>
                                            <div class="col-xs-3 text-right">
                                                ${{ number_format($items['time_shipping']['price'], 2) }}
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        @endif
                                    </div>
                                    @if(isset($items['texts']))
                                    <div class="row" style="padding-top:10px;">
                                        <div class="col-xs-12" style="padding-bottom:5px;">
                                            <i class="fa fa-file-text"></i>Text :
                                        </div>
                                        <!-- list -->
                                        @if(isset($items['texts']['front']))
                                        <div id="text-front" class="summary-table-group">
                                            <div class="col-xs-9 padding-left-25">
												<p>Front Text: {{ $items['texts']['front']['text']}}</p>
                                                <i class="fa fa-angle-right"></i>Front ({{ $items['texts']['front']['quantity'] }} x ${{ number_format($items['texts']['front']['price'], 2) }} each)
                                            </div>
                                            <div class="col-xs-3 text-right">
                                                ${{ number_format($items['texts']['front']['total'], 2) }}
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        @endif
                                        @if(isset($items['texts']['back']))
                                        <div id="text-back" class="summary-table-group">
                                            <div class="col-xs-9 padding-left-25">
												<p>Back Text: {{ $items['texts']['back']['text']}}</p>
                                                <i class="fa fa-angle-right"></i>Back ({{ $items['texts']['back']['quantity'] }} x ${{ number_format($items['texts']['back']['price'], 2) }} each)
                                            </div>
                                            <div class="col-xs-3 text-right">
                                                ${{ number_format($items['texts']['back']['total'], 2) }}
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        @endif
                                        @if(isset($items['texts']['inside']))
                                        <div id="text-inside" class="summary-table-group">
											<p>Inside Text: {{ $items['texts']['inside']['text']}}</p>
                                            <div class="col-xs-9 padding-left-25">
                                                <i class="fa fa-angle-right"></i>Inside ({{ $items['texts']['inside']['quantity'] }} x ${{ number_format($items['texts']['inside']['price'], 2) }} each)
                                            </div>
                                            <div class="col-xs-3 text-right">
                                                ${{ number_format($items['texts']['inside']['total'], 2) }}
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        @endif
										@if(isset($items['texts']['continue']))
                                        <div id="text-continuous" class="summary-table-group">
                                            <div class="col-xs-9 padding-left-25">
												<p>Continuous Text: {{ $items['texts']['continue']['text']}}</p>
                                                <i class="fa fa-angle-right"></i>Continuous ({{ $items['texts']['continue']['quantity'] }} x ${{ number_format($items['texts']['continue']['price'], 2) }} each)
                                            </div>
                                            <div class="col-xs-3 text-right">
                                                ${{ number_format($items['texts']['continue']['total'], 2) }}
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        @endif
                                    </div>
                                    @endif
									@if(isset($items['fonts']))
										<div id="text-continuous" class="summary-table-group">
                                            <div class="col-xs-9 padding-left-25">
												<p>Font-Style: {{ $items['fonts']}}</p> 
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
									@endif
                                    @if(isset($items['clips']))
                                    <div class="row" style="padding-top:10px;">
                                        <div class="col-xs-12" style="padding-bottom:5px;">
                                            <i class="fa fa-image"></i>Cliparts :
                                        </div>
                                        <!-- list -->
                                        @if(isset($items['clips']))
                                            @if(isset($items['clips']['logo']))
                                                @if(isset($items['clips']['logo']['front-start']))
                                                <div id="clipart-front-start" class="summary-table-group">
                                                    <div class="col-xs-9 padding-left-25">
														<p>Front (Start Clipart): {{ $items['clips']['logo']['front-start']['image']}}</p>
                                                        <i class="fa fa-angle-right"></i>Front (Start) ({{ $items['clips']['logo']['front-start']['quantity'] }} x ${{ number_format($items['clips']['logo']['front-start']['price'], 2) }} each)
                                                    </div>
                                                    <div class="col-xs-3 text-right">
                                                        ${{ number_format($items['clips']['logo']['front-start']['total'], 2) }}
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                @endif
                                                @if(isset($items['clips']['logo']['front-end']))
                                                <div id="clipart-front-end" class="summary-table-group">
                                                    <div class="col-xs-9 padding-left-25">
														<p>Front (End Clipart): {{ $items['clips']['logo']['front-end']['image']}}</p>
                                                        <i class="fa fa-angle-right"></i>Front (End) ({{ $items['clips']['logo']['front-end']['quantity'] }} x ${{ number_format($items['clips']['logo']['front-end']['price'], 2) }} each)
                                                    </div>
                                                    <div class="col-xs-3 text-right">
                                                        ${{ number_format($items['clips']['logo']['front-end']['total'], 2) }}
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                @endif
                                                @if(isset($items['clips']['logo']['back-start']))
                                                <div id="clipart-back-start" class="summary-table-group">
                                                    <div class="col-xs-9 padding-left-25">
														<p>Back (Start Clipart): {{ $items['clips']['logo']['back-start']['image']}}</p>
                                                        <i class="fa fa-angle-right"></i>Back (Start) ({{ $items['clips']['logo']['back-start']['quantity'] }} x ${{ number_format($items['clips']['logo']['back-start']['price'], 2) }} each)
                                                    </div>
                                                    <div class="col-xs-3 text-right">
                                                        ${{ number_format($items['clips']['logo']['back-start']['total'], 2) }}
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                @endif
                                                @if(isset($items['clips']['logo']['back-end']))
                                                <div id="clipart-back-end" class="summary-table-group">
                                                    <div class="col-xs-9 padding-left-25">
														<p>Back (End Clipart): {{ $items['clips']['logo']['back-end']['image']}}</p>
                                                        <i class="fa fa-angle-right"></i>Back (End) ({{ $items['clips']['logo']['back-end']['quantity'] }} x ${{ number_format($items['clips']['logo']['back-end']['price'], 2) }} each)
                                                    </div>
                                                    <div class="col-xs-3 text-right">
                                                        ${{ number_format($items['clips']['logo']['back-end']['total'], 2) }}
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                @endif
                                                @if(isset($items['clips']['logo']['cont-start']))
                                                <div id="clipart-cont-start" class="summary-table-group">
                                                    <div class="col-xs-9 padding-left-25">
														<p>Continuous (Start Clipart): {{ $items['clips']['logo']['cont-start']['image']}}</p>
                                                        <i class="fa fa-angle-right"></i>Continuous (Start) ({{ $items['clips']['logo']['cont-start']['quantity'] }} x ${{ number_format($items['clips']['logo']['cont-start']['price'], 2) }} each)
                                                    </div>
                                                    <div class="col-xs-3 text-right">
                                                        ${{ number_format($items['clips']['logo']['cont-start']['total'], 2) }}
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                @endif
                                                @if(isset($items['clips']['logo']['cont-end']))
                                                <div id="clipart-cont-end" class="summary-table-group">
                                                    <div class="col-xs-9 padding-left-25">
														<p>Continuous (End Clipart): {{ $items['clips']['logo']['cont-end']['image']}}</p>
                                                        <i class="fa fa-angle-right"></i>Continuous (End) ({{ $items['clips']['logo']['cont-end']['quantity'] }} x ${{ number_format($items['clips']['logo']['cont-end']['price'], 2) }} each)
                                                    </div>
                                                    <div class="col-xs-3 text-right">
                                                        ${{ number_format($items['clips']['logo']['cont-end']['total'], 2) }}
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                @endif
                                                @if(isset($items['clips']['logo']['front-center']))
                                                <div id="clipart-front-center" class="summary-table-group">
                                                    <div class="col-xs-9 padding-left-25">
														<p>Figured (Center Clipart): {{ $items['clips']['logo']['front-center']['image']}}</p>
                                                        <i class="fa fa-angle-right"></i>Center ({{ $items['clips']['logo']['front-center']['quantity'] }} x ${{ number_format($items['clips']['logo']['front-center']['price'], 2) }} each)
                                                    </div>
                                                    <div class="col-xs-3 text-right">
                                                        ${{ number_format($items['clips']['logo']['front-center']['total'], 2) }}
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                @endif
                                            @endif
                                        @endif
                                    </div>
                                    @endif
                                    @if(isset($items['addon']))
                                    <div class="row" style="padding-top:10px;">
                                        <div class="col-xs-12" style="padding-bottom:5px;">
                                            <i class="fa fa-plus-circle"></i>Add Ons :
                                        </div>
                                        <!-- list -->
                                        @if(isset($items['addon']['3mm-thick']))
                                        <div id="addon-3mm-thick" class="summary-table-group">
                                            <div class="col-xs-9 padding-left-25">
                                                <i class="fa fa-angle-right"></i>3mm Thick ({{ $items['addon']['3mm-thick']['quantity'] }} x ${{ number_format($items['addon']['3mm-thick']['price'], 2) }} each)
                                            </div>
                                            <div class="col-xs-3 text-right">
                                                ${{ number_format($items['addon']['3mm-thick']['total'], 2) }}
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        @endif
                                        @if(isset($items['addon']['digital-proof']))
                                        <div id="addon-digital-proof" class="summary-table-group">
                                            <div class="col-xs-9 padding-left-25">
                                                <i class="fa fa-angle-right"></i>Digital Proof ({{ $items['addon']['digital-proof']['quantity'] }} x ${{ number_format($items['addon']['digital-proof']['price'], 2) }} each)
                                            </div>
                                            <div class="col-xs-3 text-right">
                                                ${{ number_format($items['addon']['digital-proof']['total'], 2) }}
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        @endif
                                        @if(isset($items['addon']['eco-friendly']))
                                        <div id="addon-eco-friendly" class="summary-table-group">
                                            <div class="col-xs-9 padding-left-25">
                                                <i class="fa fa-angle-right"></i>Eco Friendly ({{ $items['addon']['eco-friendly']['quantity'] }} x ${{ number_format($items['addon']['eco-friendly']['price'], 2) }} each)
                                            </div>
                                            <div class="col-xs-3 text-right">
                                                ${{ number_format($items['addon']['eco-friendly']['total'], 2) }}
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        @endif
                                        @if(isset($items['addon']['glitters']))
                                        <div id="addon-glitters" class="summary-table-group">
                                            <div class="col-xs-9 padding-left-25">
                                                <i class="fa fa-angle-right"></i>Glitter ({{ $items['addon']['glitters']['quantity'] }} x ${{ number_format($items['addon']['glitters']['price'], 2) }} each)
                                            </div>
                                            <div class="col-xs-3 text-right">
                                                ${{ number_format($items['addon']['glitters']['total'], 2) }}
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        @endif
                                        @if(isset($items['addon']['individual']))
                                        <div id="addon-individual" class="summary-table-group">
                                            <div class="col-xs-9 padding-left-25">
                                                <i class="fa fa-angle-right"></i>Individual ({{ $items['addon']['individual']['quantity'] }} x ${{ number_format($items['addon']['individual']['price'], 2) }} each)
                                            </div>
                                            <div class="col-xs-3 text-right">
                                                ${{ number_format($items['addon']['individual']['total'], 2) }}
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        @endif
                                        @if(isset($items['addon']['key-chain']))
                                        <div id="addon-key-chain" class="summary-table-group">
                                            <div class="col-xs-9 padding-left-25">
                                                <i class="fa fa-angle-right"></i>Keychain ({{ $items['addon']['key-chain']['quantity'] }} x ${{ number_format($items['addon']['key-chain']['price'], 2) }} each)
                                            </div>
                                            <div class="col-xs-3 text-right">
                                                ${{ number_format($items['addon']['key-chain']['total'], 2) }}
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        @endif
                                    </div>
                                    @endif
                                    @if($items['free']['key-chain']['quantity'] > 0 || $items['free']['wristbands']['quantity'] > 0)
                                    <div class="row" style="padding-top:10px;">
                                        <div class="col-xs-12" style="padding-bottom:5px;">
                                            <i class="fa fa-gift"></i>Free :
                                        </div>
                                        <!-- list -->
                                        @if( $items['free']['key-chain']['quantity'] > 0)
                                        <div id="free-key-chain" class="summary-table-group">
                                            <div class="col-xs-9 padding-left-25">
                                                <i class="fa fa-angle-right"></i>Keychain (+{{ $items['free']['key-chain']['quantity'] }})
                                            </div>
                                            <div class="col-xs-3 text-right">-</div>
                                            <div class="clearfix"></div>
                                        </div>
                                        @endif
                                        @if( $items['free']['wristbands']['quantity'] > 0)
                                        <div id="free-wristband" class="summary-table-group">
                                            <div class="col-xs-9 padding-left-25">
                                                <i class="fa fa-angle-right"></i>Wristband (+{{ $items['free']['wristbands']['quantity'] }})
                                            </div>
                                            <div class="col-xs-3 text-right">-</div>
                                            <div class="clearfix"></div>
                                        </div>
                                        @endif
                                    </div>
                                    @endif
                                    <div class="clearfix"></div>
                                </div>
    						</div>
    					</div>
                        <br/>
                        <span class="row" style="font-style:italic;">
                            with total price
                            <h1>${{ number_format($items['total'], 2) }}</h1>
                        </span>
                    </div>
                    <br/><br/>
                    <div class="row">
                        For inquiries and digital proof request, kindly call our toll-free number 1-800-989-0440 to talk to our sales specialists.
                        <br/><br/>
                        Looking forward to doing business with you.
                        <br/><br/>
                        Thank you.
                    </div>
                    <br/>
                    <div class="row">
                        <strong style="font-size:16px;text-decoration:underline;">Sales Department</strong>
                        <br/>
                        Promotional Wristband
                        <br/>
                        Toll Free: <span style="font-style:italic;">1-800-989-0440</span> | Fax: <span style="font-style:italic;">(908) 344-5362</span>
                        <br/>
                        <span style="font-style:italic;">sales@promotionalwristband.com</span> | <span style="font-style:italic;">www.promotionalwristband.com</span>
                    </div>
				</div>
                <div></div>
                <div></div>
            </div>
        </div>
    </body>
</html>
