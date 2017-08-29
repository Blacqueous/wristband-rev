<!DOCTYPE html>
<html>
    <head>
        <title>School PO</title>
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
						We received your request to get a Digital Design for your silicone wristbands.
						<br/>
						You will received another email with the design of the details we capture online. 
						<br/>
						<b>Order Quotation:</b><br/>
						Below is the exact price computation for this order based on the details we captured online.
					</div>
                    <br/>
                    <div class="row">
                        <strong>ORDER DETAILS :</strong>
                        <div class="summary-table">
                            <div class="col-xs-12 no-padding-left">
                                <div class="row" style="padding-top:10px;">
                                    <div class="summary-table-group">
                                        <div class="col-xs-12">
                                            <i class="fa fa-eye"></i> Total Amount : <span class="value">{{ $items["TotalAmount"] }}</span>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="summary-table-group">
                                        <div class="col-xs-12">
                                            <i class="fa fa-eye"></i> Item Description : <span class="value">{{ $items["ItemDesc"] }}</span>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div id="summary-table-size" class="summary-table-group">
                                        <div class="col-xs-12">
                                            <i class="fa fa-arrows-alt"></i> BandSize : <span class="value">{{ $items["BandSize"] }}</span>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="summary-table-group">
                                        <div class="col-xs-12">
                                            <i class="fa fa-arrows-alt"></i> BandColor(s) :
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    @foreach ($items["BandColors"] as $key => $value)
                                    <div class="summary-table-group padding-left-25">
                                        <div class="col-xs-12"><i class="fa fa-circle"></i> {{ $value["Name"] }} : {</div>
                                        <div class="padding-left-25">
                                            <div class="col-xs-12"><i class="fa fa-circle"></i> Qty : {{ $value["Qty"] }}</div>
                                            <div class="col-xs-12"><i class="fa fa-circle"></i> FontColor : {{ $value["FontColor"] }}</div>
                                            @if (!empty($value["CustomColors"]))
                                                @foreach (json_decode($value["CustomColors"], true) as $cvalue)
                                                    <div class="padding-left-25">
                                                        <div class="col-xs-12"><i class="fa fa-caret-right"></i> {{ $cvalue }}</div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                        <div class="col-xs-12">}</div>
                                        <div class="clearfix"></div>
                                    </div>
                                    @endforeach
                                    <div class="summary-table-group">
                                        <div class="col-xs-12">
                                            <i class="fa fa-font"></i>Font Style : {{ $items["Font"] }}
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    @if (!empty($items["MessageFront"]) || !empty($items["MessageBack"]) || !empty($items["MessageInside"]) || !empty($items["MessageContinuous"]))
                                        @if (!empty($items["MessageFront"]))
                                            <div id="text-front" class="summary-table-group">
                                                <div class="col-xs-12">
                                                    <p>Front Message : {{ $items["MessageFront"] }}</p>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        @endif
                                        @if (!empty($items["MessageBack"]))
                                            <div id="text-back" class="summary-table-group">
                                                <div class="col-xs-12">
                                                    <p>Back Message : {{ $items["MessageBack"] }}</p>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        @endif
                                        @if (!empty($items["MessageContinuous"]))
                                            <div id="text-continuous" class="summary-table-group">
                                                <div class="col-xs-12">
                                                    <p>Continuous Message : {{ $items["MessageContinuous"] }}</p>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        @endif
                                        @if (!empty($items["MessageInside"]))
                                            <div id="text-inside" class="summary-table-group">
                                                <p>Inside Message : {{ $items["MessageInside"] }}</p>
                                                <div class="col-xs-12">
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        @endif
                                    @endif
                                    <div class="summary-table-group">
                                        <div class="col-xs-12">
                                            <i class="fa fa-arrows-alt"></i> Free Wristband(s) :
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    @foreach ($items["FreeWristband"] as $key => $value)
                                    <div class="summary-table-group padding-left-25">
                                        <div class="col-xs-12"><i class="fa fa-circle"></i> {{ $value["Name"] }} : {</div>
                                        <div class="padding-left-25">
                                            <div class="col-xs-12"><i class="fa fa-circle"></i> Qty : {{ $value["Qty"] }}</div>
                                            <div class="col-xs-12"><i class="fa fa-circle"></i> FontColor : {{ $value["FontColor"] }}</div>
                                            @if (!empty($value["CustomColors"]))
                                                @foreach (json_decode($value["CustomColors"], true) as $cvalue)
                                                    <div class="padding-left-25">
                                                        <div class="col-xs-12"><i class="fa fa-caret-right"></i> {{ $cvalue }}</div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                        <div class="col-xs-12">}</div>
                                        <div class="clearfix"></div>
                                    </div>
                                    @endforeach
                                    <div class="summary-table-group">
                                        <div class="col-xs-12">
                                            <i class="fa fa-arrows-alt"></i> Free Keychain(s) :
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    @foreach ($items["FreeKeychain"] as $key => $value)
                                    <div class="summary-table-group padding-left-25">
                                        <div class="col-xs-12"><i class="fa fa-circle"></i> {{ $value["Name"] }} : {</div>
                                        <div class="padding-left-25">
                                            <div class="col-xs-12"><i class="fa fa-circle"></i> Qty : {{ $value["Qty"] }}</div>
                                            <div class="col-xs-12"><i class="fa fa-circle"></i> FontColor : {{ $value["FontColor"] }}</div>
                                            @if (!empty($value["CustomColors"]))
                                                @foreach (json_decode($value["CustomColors"], true) as $cvalue)
                                                    <div class="padding-left-25">
                                                        <div class="col-xs-12"><i class="fa fa-caret-right"></i> {{ $cvalue }}</div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                        <div class="col-xs-12">}</div>
                                        <div class="clearfix"></div>
                                    </div>
                                    @endforeach
                                    <div id="summary-table-production" class="summary-table-group">
                                        <div class="col-xs-12">
                                            <i class="fa fa-dropbox"></i> Production : <span class="value">{{ $items["ProductionTime"] }}</span>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div id="summary-table-shipping" class="summary-table-group">
                                        <div class="col-xs-12">
                                            <i class="fa fa-truck"></i> Shipping : <span class="value">{{ $items["ShippingTime"] }}</span>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <br/><br/>
                   <div class="row">
						For inquiries and digital proof request, kindly call our toll-free number 1-800-989-0440 to talk to our sales specialists.
							<br/>
							<br/>
						Looking forward to doing business with you.
							<br/>
							<br/>
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
