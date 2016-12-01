
<!-- Use layout. -->
@extends('template.layout')

<!-- Title section. -->
@section('title', ' - Order Now')
<!-- End: title section. -->

<!-- .css section. -->
@section('css')
<!-- Order page custom stylesheet -->
		<link href="css/order.css" rel="stylesheet">

		<!-- Additional .css plugins -->
		<link href="global/iCheck/skins/square/green.css" rel="stylesheet">
@endsection
<!-- End: .css section. -->

<!-- .js section. -->
@section('js')
<!-- Order page custom javascript -->
		<script type="text/javascript">
			const price_json = JSON.parse('<?php echo(json_encode($prices)); ?>');
			const addon_json = JSON.parse('<?php echo(json_encode($addons)); ?>');
		</script>
		<script src="js/order.js"></script>
		<!-- <script src="js/angular.order.js"></script> -->

		<!-- Additional .js plugins -->
		<script src="global/iCheck/icheck.min.js"></script>
		<script src="global/unveil.js/jquery.unveil.js"></script>
		<script src="global/jquery-visible/jquery.visible.min.js"></script>
@endsection
<!-- End: .js section. -->

<!-- Content section. -->
@section('content')
	<div id="main-page-content">
		<div class="container">

			<!-- PRICE TABLES -->
			<div id="price_banner">
				<table id="price_table" class="table">
					<caption class="wb-caption">
						Pricing for <span class="style text-italic">{{ strtoupper($style) }}</span> wristbands (<span class="size text-italic">1/2</span>) as of July, 2016
					</caption>
					<thead>
						<tr id="price_header">
							<th title="Quantity">Qty</th>
							@foreach($prices[$style]['0-50inch'] as $key => $value)
								<th title="{{ $key }} Pieces">{{ $key }}</th>
							@endforeach
						</tr>
					</thead>
					<tbody>
						<tr id="price_body">
							<td>Price</td>
							@foreach($prices[$style]['0-50inch'] as $key => $value)
								<td>${{ trim($value) }}</th>
							@endforeach
						</tr>
					</tbody>
				</table>
			</div>
			<!-- END PRICE TABLES -->

			<!-- WRIST STYLES -->
			<div id="wb_style" class="wrist-style">
				<div class="row offer-bar row-header-step">
					<div class="col-xs-3 col-sm-2 offerpv float-left">Step <span class="sRename">1</span></div>
					<div class="col-xs-9 col-sm-10 offer-details float-left">Select Wristband Style </div>
					<div class="clearfix"></div>
				</div>
				<div class="wrist_style_container">
					<div class="popup-order-gallery col-xs-12">
						@foreach($styles as $key => $value)
							<div id="wb_style_{{ $value['code'] }}" class="col-xs-6 col-md-3 prod prod-style js-style {{ ($value['code']==$style) ? 'active' : '' }}" style="margin-bottom:10px;">
								<div class="zoom">
									<a href="{{ $value['image'] }}" title="Printed Wristband"><img src="assets/images/src/zoom.png" class="galleryimg"></a>
								</div>
								<div class="box-thumb"><img src="{{ $value['image'] }}"></div>
								<input class="wrist-style wb-style" data-style="{{ $value['code'] }}" name="wb-style" type="radio" value="{{ $value['code'] }}" {{ ($value['code']==$style) ? 'checked="checked"' : '' }} />
								<br/>
								<label for="wb-style">
									<h2>{{ $value['name'] }}</h2>
								</label>
							</div>
						@endforeach
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
			<!-- END WRIST STYLES -->

			<div class="clearfix"></div>

			<!-- WRISTBAND SIZES -->
			<div id="wb_size" class="wrist-size">
				<div class="row offer-bar row-header-step">
					<div class="col-xs-3 col-sm-2 offerpv float-left">Step <span class="sRename">2</span></div>
					<div class="col-xs-9 col-sm-10 offer-details float-left">Select Wristband Size </div>
					<div class="clearfix"></div>
				</div>
				<div class="wsize-default">
					@foreach($sizes as $key => $value)
					<div id="wb_size_{{ $value['code'] }}" class="col-xs-6 col-md-2 prod prod-size js-size {{ ($value['code']=='0-50inch') ? 'active' : '' }}">
						<div class="box-thumb"><img src="{{ $value['image'] }}"></div>
						<input class="wrist-size wb-size" data-size="{{ $value['code'] }}" name="wb-size" type="radio" value="{{ $value['code'] }}" data-name="{{ $value['name'] }}" {{ ($value['code']=='0-50inch') ? 'checked="checked"' : '' }} >
						<br/>
						<label for="wb-style">
							<h2>{{ $value['name'] }}</h2>
						</label>
					</div>
					@endforeach
					<div class="clearfix"></div>
				</div>
			</div>
			<!-- END WRISTBAND SIZES -->

			<div class="clearfix"></div>

			<!-- WRIST COLORS -->
			<div id="wb_color_qty" class="wrist-color-quantity">
				<div class="wristband-view-color regular-color-size">
					<div class="row offer-bar row-header-step">
						<div class="col-xs-3 col-sm-2 offerpv float-left">Step <span class="sRename">3</span></div>
						<div class="col-xs-9 col-sm-10 offer-details float-left">Select Wristband Color and  Quantity <i>(*Minimum of 20)</i> </div>
						<div class="clearfix"></div>
					</div>
					<div class="content">
						<div id="wb_color_type_loading" class="wb-color-type text-center" style="padding:20px;">
							<img src="/assets/css/img/ajax-loader-f.gif" alt="Loading..." />
						</div>
						<div id="wb_color_type_regular" class="wb-color-type hidden">
							@include('wristbandColor.regular')
						</div>
						<div id="wb_color_type_regular_lg" class="wb-color-type hidden">
							@include('wristbandColor.regularLarge')
						</div>
						<div id="wb_color_type_regular_tn" class="wb-color-type hidden">
							@include('wristbandColor.regularThin')
						</div>
						<div id="wb_color_type_figured" class="wb-color-type hidden">
							@include('wristbandColor.figured')
						</div>
						<div id="wb_color_type_figured_lg" class="wb-color-type hidden">
							@include('wristbandColor.figuredLarge')
						</div>
						<div id="wb_color_type_dual" class="wb-color-type hidden">
							@include('wristbandColor.dual')
						</div>
						<div id="wb_color_type_dual_lg" class="wb-color-type hidden">
							@include('wristbandColor.dualLarge')
						</div>
					</div>
				</div>
			</div>
			<!-- END WRIST COLORS-->

			<!-- WRIST MESSAGE -->
			<div id="wb_message" class="wrist-messsage">
				<div class="row offer-bar row-header-step">
					<div class="col-xs-3 col-sm-2 offerpv float-left">Step <span class="sRename">4</span></div>
					<div class="col-xs-9 col-sm-10 offer-details float-left">Enter Message for preview</div>
					<div class="clearfix"></div>
				</div>
				<div class="main-content-preview">

					<div id="text-design">
						<h3>INPUT TEXT DESIGN MESSAGE</h3>
					</div>

					<div id="text-option" class="message-selection">
						<div class="col-sm-4">
							<input class="band-text-design wb-text-type" name="wb-message" type="radio" value="select-fb" name="text-select" checked="checked"/>
							<label for="wb-message"> Front/Back Message</label>
						</div>
						<div class="col-sm-4">
							<input class="band-text-design wb-text-type" name="wb-message" type="radio" value="select-c" name="text-select"/>
							<label for="wb-message"> Continuous Message</label>
						</div>
						<div class="clearfix"></div>
					</div>
					<div id="band-text" class="margin-div">
						<div id="wb_text_outside_fb" class="wb-text-outside f-input">
							<div class="col-sm-6" style="border-right:2px solid #154360;">
								<h4>
									<span>
										Front Message:
									</span>
								</h4>
								<span class="note-m">* Maximum of 22 characters.</span>
								<input class="band-text wb-band-text col-xs-12 text-center" data-preview="#wb_text_front_preview" id="wb_text_front" maxlength="22" name="front-text" placeholder="Front Message" type="text" value="">
								<!-- Clipart front start -->
								<div class="clip-sec col-xs-6 text-center">
									<button class="btn-order clipartin" ref-code="none" ref-target="#clipart-front-start">Front Start Clipart</button>
									<br/>
									<a href="javascript:void(0)" data-toggle="collapse" data-target="#upload-1">or Upload your own art</a>
									<div id="upload-1" class="collapse">
										<input class="clip-upload" id="clip_front_start" name="file_array[]" type="file" required><br/>
										<a href="javascript:void(0)" id="rm_clip_front_start">Remove File</a>
									</div>
								</div>
								<!-- Clipart front end -->
								<div class="clip-sec col-xs-6 text-center">
									<button class="btn-order clipartin" ref-code="none" ref-target="#clipart-front-end">Front End Clipart</button>
									<br/>
									<a href="javascript:void(0)" data-toggle="collapse" data-target="#upload-2">or Upload your own art</a>
									<div id="upload-2" class="collapse">
										<input class="clip-upload" id="clip_front_end" name="file_array[]" type="file" required><br/>
										<a href="javascript:void(0)" id="rm_clip_front_end">Remove File</a>
									</div>
								</div>
								<div class="clearfix"></div>
								<!-- Clipart figured center -->
								<div id="clipart_front_center_btn" class="clip-sec col-xs-6 clip-fig text-center hidden">
									<button class="btn-order clipartin" ref-code="none" ref-target="#clipart-front-center">Figured Center Clipart</button>
									<br/>
									<a href="javascript:void(0)" data-toggle="collapse" data-target="#upload-7">or Upload your own art</a>
									<div id="upload-7" class="collapse">
										<input class="clip-upload" id="clip_front_center" name="file_array[]" type="file" required><br/>
										<a href="javascript:void(0)" id="rm_clip_front_center">Remove File</a>
									</div>
								</div>
							</div>
							<div class="col-sm-6">
								<h4>
									<span>
										Back Message:
									</span>
								</h4>
								<span class="note-m">* Maximum of 22 characters.</span>
								<input class="band-text wb-band-text col-xs-12 text-center" data-preview="#wb_text_back_preview" id="wb_text_back" maxlength="22" name="back-text" placeholder="Back Message" type="text" value="">
								<!-- Clipart back start -->
								<div class="clip-sec col-xs-6 text-center">
									<button class="btn-order clipartin" ref-code="none" ref-target="#clipart-back-start">Back Start Clipart</button>
									<br/>
									<a href="javascript:void(0)" data-toggle="collapse" data-target="#upload-3">or Upload your own art</a>
									<div id="upload-3" class="collapse">
										<input class="clip-upload" id="clip-back-start" name="file_array[]" type="file" required><br/>
										<a href="javascript:void(0)" id="rm-clip-back-start">Remove File</a>
									</div>
								</div>
								<!-- Clipart back end -->
								<div class="clip-sec col-xs-6 text-center">
									<button class="btn-order clipartin" ref-code="none" ref-target="#clipart-back-end">Back End Clipart</button>
									<br/>
									<a href="javascript:void(0)" data-toggle="collapse" data-target="#upload-4">or Upload your own art</a>
									<div id="upload-4" class="collapse">
										<input class="clip-upload" id="clip_back_end" name="file_array[]" type="file" required><br/>
										<a href="javascript:void(0)" id="rm_clip_back_end">Remove File</a>
									</div>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
						<div id="wb_text_outside_c" class="wb-text-outside c-input hidden">
							<div class="col-sm-12">
								<h4>
									<span>
										Continuous Message:
									</span>
								</h4>
								<span class="note-m">* Maximum of 50 characters.</span>
								<input class="band-text wb-band-text col-xs-12 text-center" data-preview="#wb_text_continue_preview" id="wb_text_continue" maxlength="50" name="continue-text" placeholder="Continuous Message" type="text" value="">
							</div>
							<div class="clearfix"></div>
							<!-- Clipart continue start -->
							<div class="clip-sec col-xs-6 text-center">
								<button class="btn-order clipartin" ref-code="none" ref-target="#clipart-cont-start">Start Clipart</button>
								<br/>
								<a href="javascript:void(0)" data-toggle="collapse" data-target="#upload-5">or Upload your own art</a>
								<div id="upload-5" class="collapse">
									<input class="clip-upload" id="clip_continue_start" name="file_array[]" type="file" required><br/>
									<a href="javascript:void(0)" id="rm_clip_continue_start">Remove File</a>
								</div>
							</div>
							<!-- Clipart continue end -->
							<div class="clip-sec col-xs-6 text-center">
								<button class="btn-order clipartin" ref-code="none" ref-target="#clipart-cont-end">End Clipart</button>
								<br/>
								<a href="javascript:void(0)" data-toggle="collapse" data-target="#upload-6">or Upload your own art</a>
								<div id="upload-6" class="collapse">
									<input class="clip-upload" id="clip_continue_end" name="file_array[]" type="file" required><br/>
									<a href="javascript:void(0)" id="rm_clip_continue_end">Remove File</a>
								</div>
							</div>
						</div>
						<br/>
						<div id="wb_text_inside" class="wb-text-inside i-input">
							<div class="col-sm-12">
								<h4>
									<span>
										Inside Message:
									</span>
								</h4>
								<span class="note-m">
									* Maximum of 50 characters.<br/>
									* Inside Message will be embossed with the same color of the inside of the band
								</span>
								<input class="band-text wb-band-text col-xs-12 text-center" data-preview="#wb_text_inside_preview" id="wb_text_inside" maxlength="50" name="inside-text" placeholder="Inside Message" type="text" value="">
								<br/>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>

					<h3>PREVIEW</h3>

					<div id="preview-pane-fb" class="preview-panel">
						<div class="wb-text-preview fb-select" style="font-family: 'Arial Bold';">
							<span id="clipart-front-center" class="preview-clipart faded fig-fc col-xs-12 hidden" ref-clipart-code="none" ref-clipart-name="None"></span>
							<div id="front-view" class="band band-reg wb-band">
								<span id="clipart-front-start" class="faded preview-clipart preview-start start-fc col-xs-3" ref-clipart-code="none" ref-clipart-name="None"></span>
								<span id="clipart-front-end" class="faded preview-clipart preview-end end-fc col-xs-3" ref-clipart-code="none" ref-clipart-name="None"></span>
								<div id="wb_text_front_preview" class="preview-text faded">
									Front Message
								</div>
							</div>
							<div id="back-view" class="band band-reg wb-band">
								<span id="clipart-back-start" class="faded preview-clipart preview-start back-mc col-xs-3" ref-clipart-code="none" ref-clipart-name="None"></span>
								<span id="clipart-back-end" class="faded preview-clipart preview-end backend-mc col-xs-3" ref-clipart-code="none" ref-clipart-name="None"></span>
								<div id="wb_text_back_preview" class="preview-text faded">
									Back Message
								</div>
							</div>
							<div class="clearfix"></div>
						</div>
						<div class="wb-text-preview c-select hidden" style="font-family: 'Arial Bold';">
							<div id="continue-view" class="band band-reg wb-band">
								<span id="clipart-cont-start" class="faded preview-clipart preview-start start-cc col-xs-2" ref-clipart-code="none" ref-clipart-name="None"></span>
								<span id="clipart-cont-end" class="faded preview-clipart preview-end end-cc col-xs-2" ref-clipart-code="none" ref-clipart-name="None"></span>
								<div id="wb_text_continue_preview" class="preview-text faded">
									Continuous Message
								</div>
							</div>
						</div>
					</div>
					<div id="preview-pane-c" class="preview-panel" style="font-family: 'Arial Bold';">
						<div class="wb-text-preview i-select">
							<div id="inside-view" class="band band-reg wb-band">
								<div class="preview-text faded" id="wb_text_inside_preview">
									Inside Message
								</div>
							</div>
						</div>
					</div>
					<div id="preview-pill" class="text-center hidden">
						<div class="col-xs-12 text-danger">Click below to preview wristband colors</div>
						<div class="clearfix"></div>
						<div id="preview-pill-selection">
						</div>
					</div>
				</div>
				<!-- End preview pane -->
				<div id="add-design">
					<!--<button>Clear</button>-->
					<h3 style="text-align: left;">Select Font Style</h3>
					<button id="btn_font_style" class="btn-order pull-left" ref-font-style-code="arial-bold">Choose Font Style</button>
					<div id="preview-textfont"></div>
					<div class="clearfix"></div>
				</div>
			</div>
			<!-- END WRIST MESSAGE -->

			<!-- ADD ONS -->
			<div class="product-add-ons">
				<div class="row offer-bar row-header-step">
					<div class="col-xs-3 col-sm-2 offerpv float-left step-5">Step <span class="sRename">5</span></div>
					<!-- <div class="col-xs-3 col-sm-2 offerpv float-left step-4">Step <span class="sRename">4</span></div> -->
					<div class="col-xs-9 col-sm-10 offer-details float-left">ADD ONS (Optional)</div>
					<div class="clearfix"></div>
				</div>

				<div id="promo_free_keychains" class="popup-order-gallery">
					@include('promo.free_keychains')
				</div>

				<!-- End conversion wristbands -->
				<div class="col-md-4 add-ons">
					<div class="box-thumb"><a href="assets/images/src/add-ons/3mm-thick.png" title="3mm thick option"><img src="assets/images/src/add-ons/3mm-thick.png" class="galleryimg"></a></div>
					<div class="icon-img"><img src="assets/images/src/icon.png"/> <div class="icon-text" style="width:150px;">Available for 1/2 and 3/4 inch wristbands only.</div></div>
					<div class="add-ons-radio">
						<input type="checkbox" name="addon[]" class="add-ons" data-code="3mm-thick"/>
						<h2>3mm Thick Option</h2>
					</div>
				</div>
				<div class="col-md-4 add-ons">
					<div class="box-thumb"><a href="assets/images/src/add-ons/Digital-Proof.png" title="Digital Proof"><img src="assets/images/src/add-ons/Digital-Proof.png" class="galleryimg"></a></div>
					<div class="icon-img"><img src="assets/images/src/icon.png"/> <div class="icon-text" style="width:150px;">We'll send you a proof for approval before production begins.</div></div>
					<div class="add-ons-radio">
						<input type="checkbox" name="addon[]" class="add-ons" data-code="digital-proof"/>
						<h2>Digital Proof</h2>
					</div>
				</div>
				<div class="col-md-4 add-ons">
					<div class="box-thumb"><a href="assets/images/src/add-ons/ecofriendly.png" title="Eco Friendly"><img src="assets/images/src/add-ons/ecofriendly.png" class="galleryimg"></a></div>
					<div class="add-ons-radio">
						<input type="checkbox" name="addon[]" class="add-ons" data-code="eco-friendly"/>
						<h2>Eco Friendly</h2>
					</div>
				</div>
				<div class="col-md-4 add-ons">
					<div class="box-thumb"><a href="assets/images/src/add-ons/Glitters.png" title="Glitters"><img src="assets/images/src/add-ons/Glitters.png" class="galleryimg"></a></div>
					<div class="add-ons-radio">
						<input type="checkbox" name="addon[]" class="add-ons" data-code="glitters"/>
						<h2>Glitters</h2>
					</div>
				</div>
				<div class="col-md-4 add-ons">
					<div class="box-thumb"><a href="assets/images/src/add-ons/Individual-pack.png" title="Individual pack"><img src="assets/images/src/add-ons/Individual-pack.png" class="galleryimg"></a></div>
					<div class="icon-img"><img src="assets/images/src/icon.png"/> <div class="icon-text" style="width:200px;">Professionally sealed on biodegradable bags with clear back to see product inside.</div></div>
					<div class="add-ons-radio">
						<input type="checkbox" name="addon[]" class="add-ons" data-code="individual"/>
						<h2>Individually Pack</h2>
					</div>
				</div>
				<div class="col-md-4 add-ons">
					<div class="box-thumb"><a href="assets/images/src/add-ons/KeyChain.png" title="KeyChain"><img src="assets/images/src/add-ons/KeyChain.png" class="galleryimg"></a></div>
					<div class="icon-img"><img src="assets/images/src/icon.png"/> <div class="icon-text" style="width:132px;"> Available for 1/2 inch wristbands only.</div></div>
					<div class="add-ons-radio">
						<input type="checkbox" name="addon[]" class="add-ons" data-code="key-chain"/>
						<h2>Keychain</h2>
					</div>
				</div>

				<div id="convert-keychain" class="col-md-12 hidden">
					<div class="box-thumb clearfix" style="min-height:300px;padding:20px 14px;">
						<div class="row row-title">
							<h3 style="color:#008da9;"><strong>Convert My Wristbands to Keychain.</strong></h3>
							<span style="color:#8f8fa5;">Convert your wristbands to keychain.</span>
							<div class="col-xs-12" style="padding:20px 0;">
								<div class="message-selection">
									<div class="col-sm-3 col-sm-offset-3">
										<input type="radio" name="convert-keychain" class="convert-keychain-input" id="convert-keychain-input-all" value="all" checked="checked" /><h2>Convert All</h2>
									</div>
									<div class="col-sm-3">
										<input type="radio" name="convert-keychain" class="convert-keychain-input" id="convert-keychain-input-some" value="some" /><h2>Convert Some</h2>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
						<div class="row row-content">
							<div id="convert-keychain-area-all" class="col-md-12 convert-keychain-area">
								<div class="convert-keychain-area-all">
									<h4><i class="glyphicon glyphicon-ok"></i> Convert all <strong id="convert-keychain-area-all-qty">0</strong> wristbands to keychain.</h4>
								</div>
							</div>
							<div id="convert-keychain-area-some" class="col-md-12 convert-keychain-area hidden">
								<div class="convert-keychain-area-some">
									<div class="row">
										<div class="col-md-6 col-sm-12 fwb-text fwb-text-header text-center list-header">
											<div class="col-xs-4 key-text-header"><h4>STYLE</h4></div>
											<div class="col-xs-4 fwb-text-header"><h4>COLOR</h4></div>
											<div class="col-xs-4 fwb-text-header"><h4>SIZE</h4></div>
										</div>
										<div class="col-md-6 fwb-text fwb-text-header hidden-sm hidden-xs text-center list-header">
											<div class="col-xs-12 fwb-text-header"><h4>INPUT QUANTITY</h4></div>
										</div>
									</div>
									<ul id="convert-keychain-some-list" class="convert-keychain-some-list" style="margin-bottom:0px;padding-left:0px;">
									</ul>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div id="modal-some-keychains" class="modal fade" role="dialog">
					<div class="modal-dialog">
						<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Keychain Quantity Error</h4>
							</div>
							<div class="modal-body text-center">
								<h2 style="font-size:25px;padding:10px 0;">Total quantity must not be over <span class="qty">0</span> pieces.</h2>
								<div class="clearfix"></div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default modal-close" data-dismiss="modal" style="padding:10px 15px;">Close</button>
							</div>
						</div>
						<!-- End Modal Content -->
					</div>
				</div>

				<div class="clearfix"></div>
			</div>
			<!-- END ADD ONS -->

			<div class="clearfix"></div>

			<!-- TOTAL -->
			<div id="total-area" class="total-area">
				<div class="has-total hidden">
					<div class="prod-ship col-md-4">
						<h3><i class="fa"></i> </h3>
						<h5>Production Time</h5>
							<select name="ProductionTime" id="ProductionTime" class="form-control js-production-options js-time-options" data-validation-error="Please select production time." data-modal-target="#modalproduction-shipping">
							</select>
						<h5>Shipping Time</h5>
							<select name="Delivery" id="ShippingTime" class="form-control js-shipping-options js-time-options" data-validation-error="Please select shipping time." data-target="#production-shipping">
							</select>
					</div>
					<div id="order-summary" class="col-md-8">
						<h1>Order Summary</h1>
						<div class="summary-table">
							<div class="row header">
								<div class="col-xs-9 no-padding-left">Description</div>
								<div class="col-xs-3 no-padding-right text-right">Subtotal</div>
							</div>
							<div class="row">
								<div id="summary-table-style" class="summary-table-group summary-table-state hidden">
									<div class="col-xs-9 container-style no-padding-left">
										<i class="fa fa-eye"></i>Style (<span class="value">Printed</span>)
									</div>
									<div class="col-xs-3 text-right no-padding-right">-</div>
								</div>
								<div id="summary-table-size" class="summary-table-group summary-table-state hidden">
									<div class="col-xs-9 no-padding-left">
										<i class="fa fa-arrows-alt"></i>Size (<span class="value">1/2 inch</span>)
									</div>
									<div class="col-xs-3 text-right no-padding-right">-</div>
								</div>
								<div id="summary-table-wristbands" class="summary-table-group summary-table-state hidden">
									<div class="col-xs-9 no-padding-left">
										<i class="fa fa-circle-o-notch"></i>Wristbands (<span class="qty">0</span> x $<span class="price">0.00</span> each)
									</div>
									<div class="col-xs-3 text-right no-padding-right">
										$<span class="total">0.00</span>
									</div>
								</div>
								<div id="summary-table-segmented" class="summary-table-group summary-table-state hidden">
									<div class="col-xs-9 no-padding-left">
										<i class="fa fa-life-ring"></i>Segmented Wristbands (<span class="qty">0</span> x $<span class="price">0.00</span> each)
									</div>
									<div class="col-xs-3 text-right no-padding-right">
										$<span class="total">0.00</span>
									</div>
								</div>
								<div id="summary-table-swirl" class="summary-table-group summary-table-state hidden">
									<div class="col-xs-9 no-padding-left">
										<i class="fa fa-life-ring"></i>Swirl Wristbands (<span class="qty">0</span> x $<span class="price">0.00</span> each)
									</div>
									<div class="col-xs-3 text-right no-padding-right">
										$<span class="total">0.00</span>
									</div>
								</div>
								<div id="summary-table-glow" class="summary-table-group summary-table-state hidden">
									<div class="col-xs-9 no-padding-left">
										<i class="fa fa-life-ring"></i>Glow Wristbands (<span class="qty">0</span> x $<span class="price">0.00</span> each)
									</div>
									<div class="col-xs-3 text-right no-padding-right">
										$<span class="total">0.00</span>
									</div>
								</div>
								<div id="summary-table-production" class="summary-table-group summary-table-state hidden">
									<div class="col-xs-9 no-padding-left">
										<i class="fa fa-dropbox"></i>Production (<span class="days">0</span> Days)
									</div>
									<div class="col-xs-3 text-right no-padding-right">
										$<span class="total">0.00</span>
									</div>
								</div>
								<div id="summary-table-shipping" class="summary-table-group summary-table-state hidden">
									<div class="col-xs-9 no-padding-left">
										<i class="fa fa-truck"></i>Shipping (<span class="days">0</span> Days)
									</div>
									<div class="col-xs-3 text-right no-padding-right">
										$<span class="total">0.00</span>
									</div>
								</div>
							</div>
							<div id="summary-table-addon" class="row summary-table-state hidden" style="margin-top:10px;">
								<div class="col-xs-12 no-padding-left" style="padding-bottom:5px;">
									<i class="fa fa-plus-circle"></i>Add Ons :
								</div>
								<!-- list -->
								<div id="addon-3mm-thick" class="summary-table-group summary-table-state hidden">
									<div class="col-xs-9 padding-left-25">
										<i class="fa fa-angle-right"></i>3mm Thick (<span class="qty">0</span> x $<span class="price">0.00</span> each)
									</div>
									<div class="col-xs-3 text-right no-padding-right">
										$<span class="total">0.00</span>
									</div>
								</div>
								<div id="addon-digital-proof" class="summary-table-group summary-table-state hidden">
									<div class="col-xs-9 padding-left-25">
										<i class="fa fa-angle-right"></i>Digital Proof (<span class="qty">0</span> x $<span class="price">0.00</span> each)
									</div>
									<div class="col-xs-3 text-right no-padding-right">
										$<span class="total">0.00</span>
									</div>
								</div>
								<div id="addon-eco-friendly" class="summary-table-group summary-table-state hidden">
									<div class="col-xs-9 padding-left-25">
										<i class="fa fa-angle-right"></i>Eco Friendly (<span class="qty">0</span> x $<span class="price">0.00</span> each)
									</div>
									<div class="col-xs-3 text-right no-padding-right">
										$<span class="total">0.00</span>
									</div>
								</div>
								<div id="addon-glitters" class="summary-table-group summary-table-state hidden">
									<div class="col-xs-9 padding-left-25">
										<i class="fa fa-angle-right"></i>Glitter (<span class="qty">0</span> x $<span class="price">0.00</span> each)
									</div>
									<div class="col-xs-3 text-right no-padding-right">
										$<span class="total">0.00</span>
									</div>
								</div>
								<div id="addon-individual" class="summary-table-group summary-table-state hidden">
									<div class="col-xs-9 padding-left-25">
										<i class="fa fa-angle-right"></i>Individual (<span class="qty">0</span> x $<span class="price">0.00</span> each)
									</div>
									<div class="col-xs-3 text-right no-padding-right">
										$<span class="total">0.00</span>
									</div>
								</div>
								<div id="addon-key-chain" class="summary-table-group summary-table-state hidden">
									<div class="col-xs-9 padding-left-25">
										<i class="fa fa-angle-right"></i>Keychain (<span class="qty">0</span> x $<span class="price">0.00</span> each)
									</div>
									<div class="col-xs-3 text-right no-padding-right">
										$<span class="total">0.00</span>
									</div>
								</div>
							</div>
							<div id="summary-table-free" class="row summary-table-state hidden" style="margin-top:10px;">
								<div class="col-xs-12 no-padding-left" style="padding-bottom:5px;">
									<i class="fa fa-gift"></i>Free :
								</div>
								<!-- list -->
								<div id="free-key-chain" class="summary-table-group summary-table-state hidden">
									<div class="col-xs-9 padding-left-25">
										<i class="fa fa-angle-right"></i>Keychain (+ <span class="qty">0</span>)
									</div>
									<div class="col-xs-3 text-right no-padding-right">-</div>
								</div>
								<div id="free-wristband" class="summary-table-group summary-table-state hidden">
									<div class="col-xs-9 padding-left-25">
										<i class="fa fa-angle-right"></i>Wristband (+ <span class="qty">0</span>)
									</div>
									<div class="col-xs-3 text-right no-padding-right">-</div>
								</div>
							</div>
						</div>
						<div class="summary-total">
							<div class="col-xs-9 no-padding-left">
								<h3>Total :</h3>
							</div>
							<div class="col-xs-3 text-right no-padding-right">
								<h3>$<span id="total-price" class="total-price">0.00</span></h3>
							</div>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="no-total text-center">
					<h1 style="margin:20px auto;">Minimum order should be at least <u>20 pieces</u></h1>
				</div>
			</div>
			<!-- End TOTAL -->

		</div>
	</div>

	@include('modal.selectColor')
	@include('modal.selectClipart')
	@include('modal.selectFont')

@endsection
<!-- End: content section. -->
