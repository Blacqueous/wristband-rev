
@extends('template.layout')

@section('title', ' - Welcome')

@section('css')
@endsection

@section('js')
<!-- Order page custom javascript -->
		<script type="text/javascript">
            $(document).ready(function() {
                var id = '#dialog';
                //Get the screen height and width
                var maskHeight = $(document).height();
                var maskWidth = $(window).width();
                //Set heigth and width to mask to fill up the whole screen
                $('#mask').css({'width':maskWidth,'height':maskHeight});
                //transition effect
                $('#mask').fadeIn(500);
                $('#mask').fadeTo("slow",0.9);

                //Get the window height and width
                var winH = $(window).height();
                var winW = $(window).width();

                //Set the popup window to center
                $(id).css('top',  winH/2-$(id).height()/2);
                $(id).css('left', winW/2-$(id).width()/2);

                //transition effect
                $(id).fadeIn(2000);

                //if close button is clicked
                $('.window .close').click(function (e) {
                //Cancel the link behavior
                e.preventDefault();

                $('#mask').hide();
                $('.window').hide();
                });

                //if mask is clicked
                $('#mask').click(function () {
                $(this).hide();
                $('.window').hide();
                });
				
				//if mask is clicked
                $('.agree').click(function () {
                  $('#mask').hide();
                  $('.window').hide();
                });


                $('#emf-container').css('background-color','none');
                $('#emf-container').css('color','#FFFFFF');
            });
		</script>
@endsection

@section('content')

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron" style="display:none;">
        <div class="container">
            <h1>Hello, world!</h1>
            <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
            <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
        </div>
    </div>

    <div class="container">
        <!-- Example row of columns -->
        	<div id="boxes">
			  <div id="dialog" class="window">
				 <h1>Claim your coupon code</h1>
				 <div id="coup-box">
					<div class="frame-box">
						<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><form id="emf-form" target="_self" enctype="multipart/form-data" method="post" action="http://www.emailmeform.com/builder/form/qvRh20DO854wLsb684ba0f">
						<table style="text-align:left;" cellpadding="2" cellspacing="0" border="0" bgcolor="transparent">
						<tr>
						<td style="" colspan="2">
						<div style="height:80px;"></div>
						</td>
						</tr>
						<tr valign="top" ><td id="td_element_label_0" style="" align="left">
						</td><td id="td_element_field_0" style=""><input id="element_0" name="element_0" placeholder="Enter Full Name" value="" size="20" class="validate[required]" type="text" /><div style="padding-bottom:8px;color:#ffffff;"><small><font face="Arial"></font></small></div>
						</td>
						<td id="td_element_label_1" style="" align="left">
						</td><td id="td_element_field_1" style=""><input placeholder="Enter Email" id="element_1" name="element_1" class="validate[required,custom[email]]" value="" size="20" type="text" /><div style="padding-bottom:8px;color:#ffffff;"><small><font face="Arial"></font></small></div>
						</td>
						<td colspan="2" align="auto">
						<input name="element_counts" value="2" type="hidden" />
						<input name="embed" value="forms" type="hidden" /><input  value="Submit" type="submit" />
						</td></tr></table></form>
					</div>
				 </div>
				<div id="popupfoot"> <a href="#" class="close-button agree">No we don't need to save money now</a></div>
			  </div>
			  <div id="mask"></div>
		</div>

        <div class="images-clips">
            <div class="col-md-4">
                <a href="/quote"><img src="assets/images/src/Get_A_Quote.jpg"></a>
            </div>
            <div class="col-md-4">
                <a href="/school_po"><img src="assets/images/src/PO.jpg"></a>
            </div>
            <div class="col-md-4">
                <a href="/digital_design"><img src="assets/images/src/Digital_Design.jpg"></a>
            </div>
            <div class="col-md-4">
                <a href="#"><img src="assets/images/src/Rush_Shipping.jpg"></a>
            </div>
            <div class="col-md-4">
                <a href="#"><img src="assets/images/src/1Day_Production.jpg"></a>
            </div>
            <div class="col-md-4">
                <a href="#"><img src="assets/images/src/Eco_Friendly.jpg"></a>
            </div>
            <div class="clearfix"></div>
        </div>
        <div id="main-content" class="row homecontent">
            <div class="col-md-4">
                <div class="box-thumb"><img src="assets/images/src/Printed.png"></div>
                <h2>Printed</h2>
                <div class="prod_price">$0.09</div>
                <p><a class="btn btn-default" href="/order?style=printed" role="button">ORDER NOW</a></p>
            </div>
            <div class="col-md-4">
                <div class="box-thumb"><img src="assets/images/src/Debossed.png"></div>
                <h2>Debossed</h2>
                <div class="prod_price">$0.06</div>
                <p><a class="btn btn-default" href="/order?style=debossed" role="button">ORDER NOW</a></p>
            </div>
            <div class="col-md-4">
                <div class="box-thumb"><img src="assets/images/src/Color-Filled.png"></div>
                <h2>Ink Injected</h2>
                <div class="prod_price">$0.07</div>
                <p><a class="btn btn-default" href="/order?style=ink-injected" role="button">ORDER NOW</a></p>
            </div>
            <div class="col-md-4">
                <div class="box-thumb"><img src="assets/images/src/Embossed.png"></div>
                <h2>Embossed</h2>
                <div class="prod_price">$0.07</div>
                <p><a class="btn btn-default" href="/order?style=embossed" role="button">ORDER NOW</a></p>
            </div>
            <div class="col-md-4">
                <div class="box-thumb"><img src="assets/images/src/Dual-Layer.png"></div>
                <h2>Dual Layer</h2>
                <div class="prod_price">$0.06</div>
                <p><a class="btn btn-default" href="/order?style=dual-layer" role="button">ORDER NOW</a></p>
            </div>
            <div class="col-md-4">
                <div class="box-thumb"><img src="assets/images/src/Embossed-Printed.png"></div>
                <h2>Embossed Printed</h2>
                <div class="prod_price">$0.09</div>
                <p><a class="btn btn-default" href="/order?style=embossed-printed" role="button">ORDER NOW</a></p>
            </div>
            <div class="col-md-4">
                <div class="box-thumb"><img src="assets/images/src/Figured.png"></div>
                <h2>Figured</h2>
                <div class="prod_price">$0.06</div>
                <p><a class="btn btn-default" href="/order?style=figured" role="button">ORDER NOW</a></p>
            </div>
            <div class="col-md-4">
                <div class="box-thumb"><img src="assets/images/src/Blank.png"></div>
                <h2>Blank</h2>
                <div class="prod_price">$0.06</div>
                <p><a class="btn btn-default" href="/order?style=blank" role="button">ORDER NOW</a></p>
            </div>
            <div class="clearfix"></div>
            <div class="container content-main">
                <p>
                    <span class="header-texttitle">Promotional Wristbands</span> is an American company based in Elizabeth, New Jersey that produces top of the line, eco-friendly custom silicone wristbands. Custom silicone wristbands are perfect for different events such as Team Building Activities, Trade Shows, Business Conferences, Theme Parties, Birthdays, Anniversaries, Family Events and many more. Custom silicone wristbands are also a great way of promoting various awareness, information, and charity campaigns. Silicone wristbands are also one popular item being sold as merchandise at concerts &amp; sporting events worldwide
                </p>
                <p>
                    Promotional Wristbands offer the cheapest yet high quality customized silicone wristbands in the market. These wristbands come in different types like those that are printed, debossed, embossed, or color filled that can be personally customized based on your preference.
                </p>
                <p>
                    We guarantee that our wristband production will be done with dedication and proficiency regardless of the amount of your order. All orders should be treated equally, whether it is few or millions of customized silicone wristbands. With our competent and reliable Sales, Production and Customer Service teams, we assure that orders are properly handled and delivered to our customers on time.
                </p>
            </div>
            <div class="container">
                <h1>FAQ</h1>
                <div style="padding-bottom:20px;"></div>
                <div class="col-md-6">
                    <h4>General</h4>
                    <ul class="accordion">
                        <li>
                            <a href="javascript:void(0)" data-toggle="collapse" data-target="#dem-1">Where is your company located?</a>
                            <div id="dem-1" class="collapse">
                                Our company is located at Elizabeth New Jersey, USA.
                            </div>
                        </li>
                        <li>
                            <a href="javascript:void(0)" data-toggle="collapse" data-target="#dem-2">What material are your wristbands made of?</a>
                            <div id="dem-2" class="collapse">
                                We use 100% pure silicone material in the production of the wristbands.
                            </div>
                        </li>
                        <li>
                            <a href="javascript:void(0)" data-toggle="collapse" data-target="#dem-3">How can I get a quotation?</a>
                            <div id="dem-3" class="collapse">
                                You can instantly get a quotation by going to our website and clicking on the “Get A Quote!” tab and follow the instructions. You can also talk to oursales team by calling us at our hotline number 1-800- 989-0440 or just simply send us an email at sales@promotionalwristband.com and we will be more than willing to help you.
                            </div>
                        </li>
                        <li >
                            <a href="javascript:void(0)" data-toggle="collapse" data-target="#dem-4">Are there a minimum number of orders?</a>
                            <div id="dem-4" class="collapse">
                                A minimum number of at least 20 pieces of wristbands is required each order.
                            </div>
                        </li>
                        <li >
                            <a href="javascript:void(0)" data-toggle="collapse" data-target="#dem-5">What&#39;s the difference between the front, back and inside message?</a>
                            <div id="dem-5" class="collapse">
                                The front and back message will both be placed at the outside portion of the wristbands on the opposing sides while the inside message will be put at the inner portion of the wristbands. An embossed default inside message with our company’s website and contact details will be in the wristbands. However, it can be requested to be removed or changed with a modified message of your own.
                            </div>
                        </li>
                        <li >
                            <a href="javascript:void(0)" data-toggle="collapse" data-target="#dem-6">What&#39;s your turnaround time?</a>
                            <div id="dem-6" class="collapse">
                                There is a standard timeframe of 7 days for production and additional 7 days for shipping However, we can ship as fast as 2 business days through our rush production and rush shipping options. Rest assured that the delivery of your order is guaranteed on time.
                            </div>
                        </li>
                        <li >
                            <a href="javascript:void(0)" data-toggle="collapse" data-target="#dem-7">How can I place an order?</a>
                            <div id="dem-7" class="collapse">
                                You can place your order through the following ways: <br>
                                1. Online <br>
                                2. Over the phone via our hotline: 1-800- 989-0440 <br>
                                3. Thru e-mail <br>
                                4. Via Live chat <br>
                            </div>
                        </li>
                        <li >
                            <a href="javascript:void(0)" data-toggle="collapse" data-target="#dem-8">What is a molding fee?</a>
                            <div id="dem-8" class="collapse">
                                A molding fee will be charged when more than one (1) wristband size is ordered. Should the order only have one size, a molding fee will not be applied.
                            </div>
                        </li>
                        <li >
                            <a href="javascript:void(0)" data-toggle="collapse" data-target="#dem-9">How will I make changes to the order I placed?</a>
                            <div id="dem-9" class="collapse">
                                Given that the production of the wristbands hasn’t started yet, changes can be entertained. Just contact our sales team at sales@promotionalwristband.com in order to carry out such modifications.
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                <h4>Digital Proof</h4>
                    <ul class="accordion">
                        <li>
                            <a href="javascript:void(0)" data-toggle="collapse" data-target="#gem-1">What is a digital proof?</a>
                            <div id="gem-1" class="collapse">
                                A digital proof is a preview of how the wristbands would look like. Production will only proceed upon approval of such proof.
                            </div>
                        </li>
                        <li>
                            <a href="javascript:void(0)" data-toggle="collapse" data-target="#gem-2">How will I see a sample proof?</a>
                            <div id="gem-2" class="collapse">
                                You can request for a sample digital proof once you place your order online. There is also an option where you can request by sending us an email at sales@promotionalwristband.com or by clicking on request free digital design on our home page.
                            </div>
                        </li>
                        <li>
                            <a href="javascript:void(0)" data-toggle="collapse" data-target="#gem-3">Is there an extra charge for changing the design of the wristbands?</a>
                            <div id="gem-3" class="collapse">
                                A change in the design of the wristbands will be entertained and is free of charge as long as the production of the said wristbands has yet to start.
                            </div>
                        </li>
                        <li>
                            <a href="javascript:void(0)" data-toggle="collapse" data-target="#gem-4">How long will I be able to get a digital proof?</a>
                            <div id="gem-4" class="collapse">
                                Expect a digital proof will be sent in just about 10-20 minutes.
                            </div>
                        </li>
                        <li>
                            <a href="javascript:void(0)" data-toggle="collapse" data-target="#gem-5">Can I create marbleized/swirled or multi-colored wristbands?</a>
                            <div id="gem-5" class="collapse">
                                Yes! To personalize your silicone wristbands with your own logo or image, please call us at 1-800-989-0440, use live chat, or email us to place an order including your custom artwork.
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-6">
                    <h4>PAYMENTS</h4>
                    <ul class="accordion">
                        <li>
                            <a href="javascript:void(0)" data-toggle="collapse" data-target="#pem-1">How can I pay for my order?</a>
                            <div id="pem-1" class="collapse">
                                Payments are accepted through credit cards: VISA, MasterCard, Discover or American Express. We also accept paying via PayPal. When paying using check, kindly ask for the mailing address where you can send the check. Arrangements for purchase orders from schools are also acknowledged upon approval, just call our toll-free hotline.
                            </div>
                        </li>
                        <li>
                            <a href="javascript:void(0)" data-toggle="collapse" data-target="#pem-2">Will I be charge for sales tax?</a>
                            <div id="pem-2" class="collapse">
                                No sales tax will be assessed, only the cost of the wristbands and shipping fee are charged.
                            </div>
                        </li>
                        <li>
                            <a href="javascript:void(0)" data-toggle="collapse" data-target="#pem-3">Are there any hidden fees?</a>
                            <div id="pem-3" class="collapse">
                                There will be no hidden additional fees.The cost we will state is guaranteed that will cover all the charges. The amount that is stated will also be the exact amount that will be charged to your billing statement.
                            </div>
                        </li>
                        <li>
                            <a href="javascript:void(0)" data-toggle="collapse" data-target="#pem-4">How do I place an order using Purchase Order?</a>
                            <div id="pem-4" class="collapse">
                                You can arrange an order using Purchase Order by calling our sales specialist via our toll-free number.
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h4>Shipping and Delivery</h4>
                    <ul class="accordion">
                        <li>
                            <a href="javascript:void(0)" data-toggle="collapse" data-target="#sdem-1">What is the freight cost?</a>
                            <div id="sdem-1" class="collapse">
                                The total cost we will provide already includes the shipping fee. Though, shipping fees differs depending on the place and the date of delivery.
                            </div>
                        </li>
                        <li>
                            <a href="javascript:void(0)" data-toggle="collapse" data-target="#sdem-2">Do you ship to PO Box and APO/FPO Addresses?</a>
                            <div id="sdem-2" class="collapse">
                                No, a physical address is needed to guarantee the delivery.
                            </div>
                        </li>
                        <li>
                            <a href="javascript:void(0)" data-toggle="collapse" data-target="#sdem-3">When will I receive the wristbands?</a>
                            <div id="sdem-3" class="collapse">
                                You can choose from a number of delivery options with guaranteed delivery dates.
                            </div>
                        </li>
                        <li>
                            <a href="javascript:void(0)" data-toggle="collapse" data-target="#sdem-4">Do you deliver outside United States?</a>
                            <div id="sdem-4" class="collapse">
                                We send wristbands in any part of the world.
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-6">
                    <h4>Order Tracking</h4>
                    <ul class="accordion">
                        <li>
                            <a href="javascript:void(0)" data-toggle="collapse" data-target="#oem-1">How can I track my order?</a>
                            <div id="oem-1" class="collapse">
                                The status of your order can be monitored by sending us an email at sales@promotionalwristband.com , We will also email you the tracking number once we shipped the bands out.
                            </div>
                        </li>
                        <li>
                            <a href="javascript:void(0)" data-toggle="collapse" data-target="#oem-2">What is the shipping courier?</a>
                            <div id="oem-2" class="collapse">
                                The bands can either be sent to you via USPS or DHL based on the shipping delivery you availed.
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h4>Discounts and Promotions</h4>
                    <ul class="accordion">
                        <li>
                            <a href="javascript:void(0)" data-toggle="collapse" data-target="#doem-1">Do you offer discount?</a>
                            <div id="doem-1" class="collapse">
                                Orders from non-profit organization are entitled to discounts as well as orders that will be used for fund-raising activities. Please call our hotline for further details.
                            </div>
                        </li>
                        <li>
                            <a href="javascript:void(0)" data-toggle="collapse" data-target="#doem-2">Will the Free Promo be the same as my order?</a>
                            <div id="doem-2" class="collapse">
                                The free wristbands will be exactly the same as the wristband you originally ordered. However, you can opt to divide it evenly or the other way around.
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div><!-- End Container -->
        </div>
    </div>
<!-- End container -->
@endsection
