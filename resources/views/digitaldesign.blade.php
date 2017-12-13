
@extends('template.layout')

@section('title', 'Digital Design -')

@section('css')
<!-- Order page custom stylesheet -->
		<link href="css/order.css" rel="stylesheet" type="text/css">
		<!-- Additional .css plugins -->
		<link href="global/iCheck/skins/square/green.css" rel="stylesheet" type="text/css">
		<!-- Toastr Notification plugin -->
		<link href="global/toastr/build/toastr.css" rel="stylesheet" type="text/css">
@endsection

@section('js')
<!-- Order page custom javascript -->
		<script type="text/javascript">
			const price_json = JSON.parse('<?php echo(json_encode($prices)); ?>');
			const addon_json = JSON.parse('<?php echo(json_encode($addons)); ?>');
			const molding_fee = JSON.parse('<?php echo(json_encode($molding_fee)); ?>');
		</script>
		<script src="js/submitEmail.js"></script>
		<!-- Additional .js plugins -->
		<script src="global/iCheck/icheck.min.js"></script>
		<script src="global/unveil.js/jquery.unveil.js"></script>
		<script src="global/jquery-visible/jquery.visible.min.js"></script>
		<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
		<script src="global/jquery-file-upload/js/vendor/jquery.ui.widget.js"></script>
		<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
		<script src="global/jquery-file-upload/js/jquery.iframe-transport.js"></script>
		<!-- The basic File Upload plugin -->
		<script src="global/jquery-file-upload/js/jquery.fileupload.js"></script>
		<!-- Toastr Notification plugin -->
		<script src="global/toastr/build/toastr.min.js"></script>
@endsection

@section('content')
	<div id="main-page-content">
		<div class="container">
			<!-- Container start-->
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
			<div id="wb_message">
				<div  class="row offer-bar row-header-step optional-messsage">
					<div class="col-xs-3 col-sm-2 offerpv float-left">Step <span class="sRename">4</span></div>
					<div class="col-xs-9 col-sm-10 offer-details float-left">Enter Message for preview</div>
					<div class="clearfix"></div>
				</div>
				<div class="main-content-preview">

					<div id="text-design" class="optional-messsage">
						<h3>INPUT TEXT DESIGN MESSAGE</h3>
					</div>

					<div id="text-option" class="message-selection optional-messsage">
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
					<div id="band-text" class="margin-div optional-messsage">
						<div id="wb_text_outside_fb" class="wb-text-outside f-input">
							<div class="col-sm-6">
								<h4>
									<span>
										Front Message:
									</span>
								</h4>
								<span class="note-m">* Maximum of 22 characters.</span>
								<input class="band-text wb-band-text col-xs-12 text-center" data-preview="#wb_text_front_preview" id="wb_text_front" maxlength="22" ref-text="front" name="front-text" placeholder="Front Message" type="text" value="">

								<!-- Clipart front start -->
								<div class="clip-sec col-xs-6 text-center">
									<h5 style="margin-top:0px;">Front Start Clipart</h5>
									<div class="btn-group col-xs-12">
										<button type="button" class="btn btn-order clipartin col-xs-6" ref-code="none" ref-target="#clipart-front-start"><i class="fa fa-folder-open"></i> Browse</button>
										<label type="button" class="btn btn-order btn-file clipartup col-xs-6"><i class="fa fa-upload"></i> Upload<input id="clipartup_front_start" class="clipart-fileupload" type="file" accept="image/*" ref-target="#clipart-front-start"></label>
									</div>
									<a href="javascript:void(0)" id="rm_clip_front_start" class="text-danger clipart-remove" ref-target="#clipart-front-start">Remove</a>
								</div>
								<!-- Clipart front end -->
								<div class="clip-sec col-xs-6 text-center">
									<h5 style="margin-top:0px;">Front End Clipart</h5>
									<div class="btn-group col-xs-12">
										<button type="button" class="btn btn-order clipartin col-xs-6" ref-code="none" ref-target="#clipart-front-end"><i class="fa fa-folder-open"></i> Browse</button>
										<label type="button" class="btn btn-order btn-file clipartup col-xs-6"><i class="fa fa-upload"></i> Upload<input id="clipartup_front_end" class="clipart-fileupload" type="file" accept="image/*" ref-target="#clipart-front-end"></label>
									</div>
									<a href="javascript:void(0)" id="rm_clip_front_end" class="text-danger clipart-remove" ref-target="#clipart-front-end">Remove</a>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="col-sm-6">
								<h4>
									<span>
										Back Message:
									</span>
								</h4>
								<span class="note-m">* Maximum of 22 characters.</span>
								<input class="band-text wb-band-text col-xs-12 text-center" data-preview="#wb_text_back_preview" id="wb_text_back" maxlength="22" ref-text="back" name="back-text" placeholder="Back Message" type="text" value="">
								<!-- Clipart back start -->
								<div class="clip-sec col-xs-6 text-center">
									<h5 style="margin-top:0px;">Back Start Clipart</h5>
									<div class="btn-group col-xs-12">
										<button type="button" class="btn btn-order clipartin col-xs-6" ref-code="none" ref-target="#clipart-back-start"><i class="fa fa-folder-open"></i> Browse</button>
										<label type="button" class="btn btn-order btn-file clipartup col-xs-6"><i class="fa fa-upload"></i> Upload<input id="clipartup_back_start" class="clipart-fileupload" type="file" accept="image/*" ref-target="#clipart-back-start"></label>
									</div>
									<a href="javascript:void(0)" id="rm_clip_back_start" class="text-danger clipart-remove" ref-target="#clipart-back-start">Remove</a>
								</div>
								<!-- Clipart back end -->
								<div class="clip-sec col-xs-6 text-center">
									<h5 style="margin-top:0px;">Back End Clipart</h5>
									<div class="btn-group col-xs-12">
										<button type="button" class="btn btn-order clipartin col-xs-6" ref-code="none" ref-target="#clipart-back-end"><i class="fa fa-folder-open"></i> Browse</button>
										<label type="button" class="btn btn-order btn-file clipartup col-xs-6"><i class="fa fa-upload"></i> Upload<input id="clipartup_back_end" class="clipart-fileupload" type="file" accept="image/*" ref-target="#clipart-back-end"></label>
									</div>
									<a href="javascript:void(0)" id="rm_clip_back_end" class="text-danger clipart-remove" ref-target="#clipart-back-end">Remove</a>
								</div>
								<div class="clearfix"></div>
							</div>
							<!-- Clipart figured center -->
							<div id="clipart_front_center_btn" class="clip-sec col-xs-4 col-xs-offset-4 clip-fig text-center hidden">
								<h5 style="margin-top:0px;">Figured Center Clipart</h5>
								<div class="btn-group col-xs-12">
									<button type="button" class="btn btn-order clipartin col-xs-6" ref-code="none" ref-target="#clipart-front-center"><i class="fa fa-folder-open"></i> Browse</button>
									<label type="button" class="btn btn-order btn-file clipartup col-xs-6"><i class="fa fa-upload"></i> Upload<input id="clipartup_front_center" class="clipart-fileupload" type="file" accept="image/*" ref-target="#clipart-front-center"></label>
								</div>
								<a href="javascript:void(0)" id="rm_clip_front_center" class="text-danger clipart-remove" ref-target="#clipart-front-center">Remove</a>
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
								<input class="band-text wb-band-text col-xs-12 text-center" data-preview="#wb_text_continue_preview" id="wb_text_continue" maxlength="50" ref-text="continue" name="continue-text" placeholder="Continuous Message" type="text" value="">
							</div>
							<div class="clearfix"></div>
							<!-- Clipart continue start -->
							<div class="clip-sec col-xs-4 col-xs-offset-1 text-center">
								<h5 style="margin-top:0px;">Start Clipart</h5>
								<div class="btn-group col-xs-12">
									<button type="button" class="btn btn-order clipartin col-xs-6" ref-code="none" ref-target="#clipart-cont-start"><i class="fa fa-folder-open"></i> Browse</button>
									<label type="button" class="btn btn-order btn-file clipartup col-xs-6"><i class="fa fa-upload"></i> Upload<input id="clipartup_cont_start" class="clipart-fileupload" type="file" accept="image/*" ref-target="#clipart-cont-start"></label>
								</div>
								<a href="javascript:void(0)" id="rm_clip_cont_start" class="text-danger clipart-remove" ref-target="#clipart-cont-start">Remove</a>
							</div>
							<div class="col-xs-2"></div>
							<!-- Clipart continue end -->
							<div class="clip-sec col-xs-4 text-center">
								<h5 style="margin-top:0px;">End Clipart</h5>
								<div class="btn-group col-xs-12">
									<button type="button" class="btn btn-order clipartin col-xs-6" ref-code="none" ref-target="#clipart-cont-end"><i class="fa fa-folder-open"></i> Browse</button>
									<label type="button" class="btn btn-order btn-file clipartup col-xs-6"><i class="fa fa-upload"></i> Upload<input id="clipartup_cont_end" class="clipart-fileupload" type="file" accept="image/*" ref-target="#clipart-cont-end"></label>
								</div>
								<a href="javascript:void(0)" id="rm_clip_cont_end" class="text-danger clipart-remove" ref-target="#clipart-cont-end">Remove</a>
							</div>
						</div>
						<br/>
						<div class="clearfix"></div>
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
								<input class="band-text wb-band-text col-xs-12 text-center" data-preview="#wb_text_inside_preview" id="wb_text_inside" maxlength="50" ref-text="inside" name="inside-text" placeholder="Inside Message" type="text" value="">
								<br/>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>

					<h3>PREVIEW</h3>

					<div id="preview-pane-fb" class="preview-panel">
						<div class="wb-text-preview fb-select" style="font-family: 'Arial Bold';">
							<span id="clipart-front-center" class="preview-clipart faded fig-fc col-xs-12 optional-messsage hidden" ref-clipart-code="none" ref-clipart-name="None"></span>
							<div id="front-view" class="band band-reg wb-band">
								<span id="clipart-front-start" class="faded preview-clipart preview-start start-fc col-xs-3 optional-messsage" ref-clipart-code="none" ref-clipart-name="None"></span>
								<span id="clipart-front-end" class="faded preview-clipart preview-end end-fc col-xs-3 optional-messsage" ref-clipart-code="none" ref-clipart-name="None"></span>
								<div id="wb_text_front_preview" class="preview-text faded optional-messsage">
									Front Message
								</div>
							</div>
							<div id="back-view" class="band band-reg wb-band">
								<span id="clipart-back-start" class="faded preview-clipart preview-start back-mc col-xs-3 optional-messsage" ref-clipart-code="none" ref-clipart-name="None"></span>
								<span id="clipart-back-end" class="faded preview-clipart preview-end backend-mc col-xs-3 optional-messsage" ref-clipart-code="none" ref-clipart-name="None"></span>
								<div id="wb_text_back_preview" class="preview-text faded optional-messsage">
									Back Message
								</div>
							</div>
							<div class="clearfix"></div>
						</div>
						<div class="wb-text-preview c-select hidden" style="font-family: 'Arial Bold';">
							<div id="continue-view" class="band band-reg wb-band">
								<span id="clipart-cont-start" class="faded preview-clipart preview-start start-cc col-xs-2 optional-messsage" ref-clipart-code="none" ref-clipart-name="None"></span>
								<span id="clipart-cont-end" class="faded preview-clipart preview-end end-cc col-xs-2 optional-messsage" ref-clipart-code="none" ref-clipart-name="None"></span>
								<div id="wb_text_continue_preview" class="preview-text faded optional-messsage">
									Continuous Message
								</div>
							</div>
						</div>
					</div>
					<div id="preview-pane-c" class="preview-panel" style="font-family: 'Arial Bold';">
						<div class="wb-text-preview i-select">
							<div id="inside-view" class="band band-reg wb-band">
								<div id="wb_text_inside_preview" class="preview-text faded optional-messsage">
									Inside Message
								</div>
							</div>
						</div>
					</div>
					<div id="preview-pill" class="text-center hidden" style="min-height:75px;">
						<div class="col-xs-12 text-danger">Click below to preview wristband colors</div>
						<div class="clearfix"></div>
						<div id="preview-pill-selection">
						</div>
					</div>
				</div>
				<!-- End preview pane -->
				<div id="add-design" class="optional-messsage">
					<!--<button>Clear</button>-->
					<h3 style="text-align: left;">Select Font Style</h3>
					<button id="btn_font_style" class="btn-order pull-left" ref-font-style-code="arial-bold">Choose Font Style</button>
					<div id="preview-textfont"><img src="assets/images/src/fonts/Arialold.png"></div>
					<div class="clearfix"></div>
				</div>
			</div>
			<!-- END WRIST MESSAGE -->

			<!-- ADD ONS -->
			<div id="wb-add-ons" class="product-add-ons">
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
				<div class="col-md-4 add-ons optional-add-ons 0-50-only 0-75-only">
					<div class="box-thumb"><a href="assets/images/src/add-ons/3mm-thick.png" title="3mm Thick Option"><img src="assets/images/src/add-ons/3mm-thick.png" class="galleryimg"></a></div>
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
					<div class="box-thumb"><a href="assets/images/src/add-ons/Glitters.png" title="Glitter"><img src="assets/images/src/add-ons/Glitters.png" class="galleryimg"></a></div>
					<div class="add-ons-radio">
						<input type="checkbox" name="addon[]" class="add-ons" data-code="glitters"/>
						<h2>Glitter</h2>
					</div>
				</div>
				<div class="col-md-4 add-ons">
					<div class="box-thumb"><a href="assets/images/src/add-ons/Individual-pack.png" title="Individually Pack"><img src="assets/images/src/add-ons/Individual-pack.png" class="galleryimg"></a></div>
					<div class="icon-img"><img src="assets/images/src/icon.png"/> <div class="icon-text" style="width:200px;">Professionally sealed on biodegradable bags with clear back to see product inside.</div></div>
					<div class="add-ons-radio">
						<input type="checkbox" name="addon[]" class="add-ons" data-code="individual"/>
						<h2>Individually Pack</h2>
					</div>
				</div>
				<div class="col-md-4 add-ons optional-add-ons 0-50-only">
					<div class="box-thumb"><a href="assets/images/src/add-ons/KeyChain.png" title="Keychain"><img src="assets/images/src/add-ons/KeyChain.png" class="galleryimg"></a></div>
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
										<li class="fwb-list">
									        <div class="col-xs-12 fwb-text-content">No Wristbands.</div>
									        <div class="clearfix"></div>
								        </li>
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
						<h3 class="hidden-sm hidden-xs"><i class="fa"></i> </h3>
						<h3>Production Time</h3>
							<select name="ProductionTime" id="ProductionTime" class="form-control js-production-options js-time-options" data-validation-error="Please select production time." data-modal-target="#modalproduction-shipping">
							</select>
						<h3>Shipping Time</h3>
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
								<div id="summary-table-molding-fee" class="summary-table-group summary-table-state hidden">
									<div class="col-xs-9 no-padding-left">
										<i class="fa fa-adjust"></i>Molding Fee (<span class="qty">0</span> x $<span class="price">0.00</span> each)
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
							<div id="summary-table-text" class="row summary-table-state hidden" style="margin-top:10px;">
								<div class="col-xs-12 no-padding-left" style="padding-bottom:5px;">
									<i class="fa fa-file-text"></i>Text :
								</div>
								<!-- list -->
								<div id="text-front" class="summary-table-group summary-table-state hidden">
									<div class="col-xs-9 padding-left-25">
										<i class="fa fa-angle-right"></i>Front (<span class="qty">0</span> x $<span class="price">0.00</span> each)
									</div>
									<div class="col-xs-3 text-right no-padding-right">
										$<span class="total">0.00</span>
									</div>
								</div>
								<div id="text-back" class="summary-table-group summary-table-state hidden">
									<div class="col-xs-9 padding-left-25">
										<i class="fa fa-angle-right"></i>Back (<span class="qty">0</span> x $<span class="price">0.00</span> each)
									</div>
									<div class="col-xs-3 text-right no-padding-right">
										$<span class="total">0.00</span>
									</div>
								</div>
								<div id="text-continuous" class="summary-table-group summary-table-state hidden">
									<div class="col-xs-9 padding-left-25">
										<i class="fa fa-angle-right"></i>Continuous (<span class="qty">0</span> x $<span class="price">0.00</span> each)
									</div>
									<div class="col-xs-3 text-right no-padding-right">
										$<span class="total">0.00</span>
									</div>
								</div>
								<div id="text-inside" class="summary-table-group summary-table-state hidden">
									<div class="col-xs-9 padding-left-25">
										<i class="fa fa-angle-right"></i>Inside (<span class="qty">0</span> x $<span class="price">0.00</span> each)
									</div>
									<div class="col-xs-3 text-right no-padding-right">
										$<span class="total">0.00</span>
									</div>
								</div>
							</div>
							<div id="summary-table-clipart" class="row summary-table-state hidden" style="margin-top:10px;">
								<div class="col-xs-12 no-padding-left" style="padding-bottom:5px;">
									<i class="fa fa-image"></i>Cliparts :
								</div>
								<!-- list -->
								<div id="clipart-front-start" class="summary-table-group summary-table-state hidden">
									<div class="col-xs-9 padding-left-25">
										<i class="fa fa-angle-right"></i>Front (Start) (<span class="qty">0</span> x $<span class="price">0.00</span> each)
									</div>
									<div class="col-xs-3 text-right no-padding-right">
										$<span class="total">0.00</span>
									</div>
								</div>
								<div id="clipart-front-end" class="summary-table-group summary-table-state hidden">
									<div class="col-xs-9 padding-left-25">
										<i class="fa fa-angle-right"></i>Front (End) (<span class="qty">0</span> x $<span class="price">0.00</span> each)
									</div>
									<div class="col-xs-3 text-right no-padding-right">
										$<span class="total">0.00</span>
									</div>
								</div>
								<div id="clipart-back-start" class="summary-table-group summary-table-state hidden">
									<div class="col-xs-9 padding-left-25">
										<i class="fa fa-angle-right"></i>Back (Start) (<span class="qty">0</span> x $<span class="price">0.00</span> each)
									</div>
									<div class="col-xs-3 text-right no-padding-right">
										$<span class="total">0.00</span>
									</div>
								</div>
								<div id="clipart-back-end" class="summary-table-group summary-table-state hidden">
									<div class="col-xs-9 padding-left-25">
										<i class="fa fa-angle-right"></i>Back (End) (<span class="qty">0</span> x $<span class="price">0.00</span> each)
									</div>
									<div class="col-xs-3 text-right no-padding-right">
										$<span class="total">0.00</span>
									</div>
								</div>
								<div id="clipart-cont-start" class="summary-table-group summary-table-state hidden">
									<div class="col-xs-9 padding-left-25">
										<i class="fa fa-angle-right"></i>Continuous (Start) (<span class="qty">0</span> x $<span class="price">0.00</span> each)
									</div>
									<div class="col-xs-3 text-right no-padding-right">
										$<span class="total">0.00</span>
									</div>
								</div>
								<div id="clipart-cont-end" class="summary-table-group summary-table-state hidden">
									<div class="col-xs-9 padding-left-25">
										<i class="fa fa-angle-right"></i>Continuous (End) (<span class="qty">0</span> x $<span class="price">0.00</span> each)
									</div>
									<div class="col-xs-3 text-right no-padding-right">
										$<span class="total">0.00</span>
									</div>
								</div>
								<div id="clipart-front-center" class="summary-table-group summary-table-state hidden">
									<div class="col-xs-9 padding-left-25">
										<i class="fa fa-angle-right"></i>Center (<span class="qty">0</span> x $<span class="price">0.00</span> each)
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
										<i class="fa fa-angle-right"></i>Keychain (+<span class="qty">0</span>)
									</div>
									<div class="col-xs-3 text-right no-padding-right">-</div>
								</div>
								<div id="free-wristband" class="summary-table-group summary-table-state hidden">
									<div class="col-xs-9 padding-left-25">
										<i class="fa fa-angle-right"></i>Wristband (+<span class="qty">0</span>)
									</div>
									<div class="col-xs-3 text-right no-padding-right">-</div>
								</div>
							</div>
						</div>
						<div class="summary-total">
							<div class="col-xs-9 no-padding-left">
								<h1>Total :</h1>
							</div>
							<div class="col-xs-3 text-right no-padding-right">
								<h1>$<span id="total-price" class="total-price">0.00</span></h1>
							</div>
						</div>
					</div>
					<div class="col-xs-12" style="padding-top:30px;">
						<button id="submitQuote" class="btn btn-submit pull-right" type="button">Get Design</button>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="no-total text-center">
					<h1 style="margin:20px auto;">Minimum order should be at least <u>20 pieces</u></h1>
				</div>
			</div>
			<!-- End TOTAL -->

		</div>
			<div id="modal-confirm-submit" class="modal fade" data-backdrop="static" data-keyboard="false" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<form id="form-submit-email">
						<div class="modal-header">
							<h4 class="modal-title">Order Information</h4>
						</div>
						<div class="modal-body">
							<input type="hidden" class="form-control" id="submit_order_type" value="" required>
							<div class="form-group clearfix">
								<div class="col-sm-3 col-xs-12">
									<label for="email" class="control-label">Full name :</label>
								</div>
								<div class="col-sm-9 col-xs-12">
									<input type="text" class="form-control" id="submit_order_fullname" value="" required>
								</div>
							</div>
							<div class="form-group clearfix">
								<div class="col-sm-3 col-xs-12">
									<label for="email" class="control-label">Email address :</label>
								</div>
								<div class="col-sm-9 col-xs-12">
									<input type="email" class="form-control" id="submit_order_email" value="" required>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<div class="confirm-footer-buttons">
								<button type="button" class="btn btn-default modal-close" data-dismiss="modal">CANCEL</button>
								<button type='submit' class="btn btn-submit" id="submitCnfEmailDigital">SUBMIT</button>
							</div>
							<div class="confirm-footer-loader" style="color:#325277;display:none;font-size:20px;padding:16px 22px;text-transform:uppercase;">
								<span>SUBMITTING...</span>
							</div>
						</div>
					</form>
				</div>
				<!-- End Modal Content -->
			</div>
		</div>
	</div>

	@include('modal.selectColor')
	@include('modal.selectClipart')
	@include('modal.selectFont')
	@include('modal.customWristbandColor')
	@include('modal.emailMessage')

@endsection
