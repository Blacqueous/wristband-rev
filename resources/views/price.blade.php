
@extends('template.layout')

@section('title', ' - Prices')

@section('css')
<style>
	td p {
		margin: 12px 0;
		border-bottom:1px solid #BFBFBF;

	}

	.table > tbody > tr > td, .table > tbody > tr > th, .table > tfoot > tr > td, .table > tfoot > tr > th, .table > thead > tr > td, .table > thead > tr > th{
		border-top:none;
	}
</style>
@endsection

@section('js')
<script language="javascript"><!--
	$(document).ready(function() {
		$('.popup-gallery').magnificPopup({
			delegate: 'a',
			type: 'image',
			tLoading: 'Loading image #%curr%...',
			mainClass: 'mfp-img-mobile',
			gallery: {
				enabled: false,
				navigateByImgClick: false,
				navigate:false,
				preload: [0,1] // Will preload 0 - before current, and 1 after the current image
			},
			image: {
				tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
				titleSrc: function(item) {
					return item.el.attr('title') + '<small></small>';
				}
			}
		});

	});
	// -->
	</script>
@endsection

@section('content')
<div id="main-content" class="row homecontent">
	<div class="container">
		<!-- Start Title --->
		<div class="col-lg-12 col-md-12 col-sm-12 price-cont">
		  <div class="row offer-bar margin-bootom-20 __web-inspector-hide-shortcut__">
				<div class="col-xs-3 col-sm-22 offerpv float-left">Pricing Chart</span></div>
				<div class="col-xs-9 col-sm-101 offer-details float-left">Printed Wristband</div>
					<div class="clearfix"></div>
		  </div>
	   </div>
	   <!-- End Title --->
	   <div class="cont-p">
		   <div class="col-xs-98 float-left">
		   	<div class="popup-gallery">
				<a href="assets/images/src/Printed.png" title="Printed">
					<img width="350" src="assets/images/src/Printed.png" class="galleryimg">
				</a>
			</div>
			<ul class="price-sidebar">
				<li><a href="digital-design"><img src="assets/images/src/Digital_Design.jpg"></a></li>
				<li><a href="quote"><img src="assets/images/src/Get_A_Quote.jpg"></a></li>
				<li class="order-now-green"><a href="order">Order Now</a></li>
			</ul>
		   </div>

			<div class="col-xs-99 float-left">
				<div class="price-table table-responsive">
				<table class="table" border="0" cellpadding="0" cellspacing="0" width="100%">
				   <tr>
				   <td>
						<tr>
							<th>Quantity</th>
							<th>1/4 Inch</th>
							<th>1/2 Inch</th>
							<th>3/4 Inch</th>
							<th>1 Inch</th>
							<th>1.5 Inch</th>
							<th>2 Inch</th>
						</tr>

					</td>
					</tr>
					<tr>
						<td>
							20
						</td>
							@foreach($prices['printed']['20'] as $key => $value)
								<td>{{ $value }}</td>
							@endforeach
					</tr>
					<tr>
						<td>
							30
						</td>
							@foreach($prices['printed']['30'] as $key => $value)
								<td>{{ $value }}</td>
							@endforeach
					</tr>
					<tr>
						<td>
							100
						</td>
							@foreach($prices['printed']['100'] as $key => $value)
								<td>{{ $value }}</td>
							@endforeach
					</tr>
					<tr>
						<td>
							300
						</td>
							@foreach($prices['printed']['300'] as $key => $value)
								<td>{{ $value }}</td>
							@endforeach
					</tr>
					<tr>
						<td>
							500
						</td>
							@foreach($prices['printed']['500'] as $key => $value)
								<td>{{ $value }}</td>
							@endforeach
					</tr>
					<tr>
						<td>
							1000
						</td>
							@foreach($prices['printed']['1000'] as $key => $value)
								<td>{{ $value }}</td>
							@endforeach
					</tr>
					<tr>
						<td>
							2000
						</td>
							@foreach($prices['printed']['2000'] as $key => $value)
								<td>{{ $value }}</td>
							@endforeach
					</tr>
					<tr>
						<td>
							3000
						</td>
							@foreach($prices['printed']['3000'] as $key => $value)
								<td>{{ $value }}</td>
							@endforeach
					</tr>
					<tr>
						<td>
							5000
						</td>
							@foreach($prices['printed']['5000'] as $key => $value)
								<td>{{ $value }}</td>
							@endforeach
					</tr>
					<tr>
						<td>
							10000
						</td>
							@foreach($prices['printed']['10000'] as $key => $value)
								<td>{{ $value }}</td>
							@endforeach
					</tr>
					<tr>
						<td>
							20000
						</td>
							@foreach($prices['printed']['20000'] as $key => $value)
								<td>{{ $value }}</td>
							@endforeach
					</tr>
					<tr>
						<td>
							50000
						</td>
							@foreach($prices['printed']['50000'] as $key => $value)
								<td>{{ $value }}</td>
							@endforeach
					</tr>
					<tr>
						<td>
							100000
						</td>
							@foreach($prices['printed']['100000'] as $key => $value)
								<td>{{ $value }}</td>
							@endforeach
					</tr>
					</tr>
			</table>
		   </div><!-- End Price Table --->
		   </div>
			<div class="clearfix"></div>
	   </div> <!--- End -->
	   <!-- Start Title --->
		<div class="col-lg-12 col-md-12 col-sm-12 price-cont">
		  <div class="row offer-bar margin-bootom-20 __web-inspector-hide-shortcut__">
				<div class="col-xs-3 col-sm-22 offerpv float-left">Pricing Chart</span></div>
				<div class="col-xs-9 col-sm-101 offer-details float-left">Debossed Wristband</div>
					<div class="clearfix"></div>
		  </div>
	   </div>
	   <!-- End Title --->
	   <div class="cont-p">
		   <div class="col-xs-98 float-left">
		   	<div class="popup-gallery">
				<a href="assets/images/src/Debossed.png" title="Debossed">
					<img width="350" src="assets/images/src/Debossed.png" class="galleryimg">
				</a>
			</div>
			<ul class="price-sidebar">
				<li><a href="digital-design"><img src="assets/images/src/Digital_Design.jpg"></a></li>
				<li><a href="quote"><img src="assets/images/src/Get_A_Quote.jpg"></a></li>
				<li class="order-now-green"><a href="order">Order Now</a></li>
			</ul>
		   </div>

			<div class="col-xs-99 float-left">
				<div class="price-table table-responsive">
				<table class="table" border="0" cellpadding="0" cellspacing="0" width="100%">
				   <tr>
				   <td>
						<tr>
							<th>Quantity</th>
							<th>1/4 Inch</th>
							<th>1/2 Inch</th>
							<th>3/4 Inch</th>
							<th>1 Inch</th>
							<th>1.5 Inch</th>
							<th>2 Inch</th>
						</tr>

					</td>
					</tr>
					<tr>
						<td>
							20
						</td>
							@foreach($prices['debossed']['20'] as $key => $value)
								<td>{{ $value }}</td>
							@endforeach
					</tr>
					<tr>
						<td>
							30
						</td>
							@foreach($prices['debossed']['30'] as $key => $value)
								<td>{{ $value }}</td>
							@endforeach
					</tr>
					<tr>
						<td>
							100
						</td>
							@foreach($prices['debossed']['100'] as $key => $value)
								<td>{{ $value }}</td>
							@endforeach
					</tr>
					<tr>
						<td>
							300
						</td>
							@foreach($prices['debossed']['300'] as $key => $value)
								<td>{{ $value }}</td>
							@endforeach
					</tr>
					<tr>
						<td>
							500
						</td>
							@foreach($prices['debossed']['500'] as $key => $value)
								<td>{{ $value }}</td>
							@endforeach
					</tr>
					<tr>
						<td>
							1000
						</td>
							@foreach($prices['debossed']['1000'] as $key => $value)
								<td>{{ $value }}</td>
							@endforeach
					</tr>
					<tr>
						<td>
							2000
						</td>
							@foreach($prices['debossed']['2000'] as $key => $value)
								<td>{{ $value }}</td>
							@endforeach
					</tr>
					<tr>
						<td>
							3000
						</td>
							@foreach($prices['debossed']['3000'] as $key => $value)
								<td>{{ $value }}</td>
							@endforeach
					</tr>
					<tr>
						<td>
							5000
						</td>
							@foreach($prices['debossed']['5000'] as $key => $value)
								<td>{{ $value }}</td>
							@endforeach
					</tr>
					<tr>
						<td>
							10000
						</td>
							@foreach($prices['debossed']['10000'] as $key => $value)
								<td>{{ $value }}</td>
							@endforeach
					</tr>
					<tr>
						<td>
							20000
						</td>
							@foreach($prices['debossed']['20000'] as $key => $value)
								<td>{{ $value }}</td>
							@endforeach
					</tr>
					<tr>
						<td>
							50000
						</td>
							@foreach($prices['debossed']['50000'] as $key => $value)
								<td>{{ $value }}</td>
							@endforeach
					</tr>
					<tr>
						<td>
							100000
						</td>
							@foreach($prices['debossed']['100000'] as $key => $value)
								<td>{{ $value }}</td>
							@endforeach
					</tr>
					</tr>
			</table>
		   </div><!-- End Price Table --->
		   </div>
			<div class="clearfix"></div>
	   </div> <!--- End -->
	   <!-- Start Title --->
		<div class="col-lg-12 col-md-12 col-sm-12 price-cont">
		  <div class="row offer-bar margin-bootom-20 __web-inspector-hide-shortcut__">
				<div class="col-xs-3 col-sm-22 offerpv float-left">Pricing Chart</span></div>
				<div class="col-xs-9 col-sm-101 offer-details float-left">Ink Injected Wristband</div>
					<div class="clearfix"></div>
		  </div>
	   </div>
	   <!-- End Title --->
	   <div class="cont-p">
		   <div class="col-xs-98 float-left">
		   	<div class="popup-gallery">
				<a href="assets/images/src/Color-Filled.png" title="Ink Injected">
					<img width="350" src="assets/images/src/Color-Filled.png" class="galleryimg">
				</a>
			</div>
			<ul class="price-sidebar">
				<li><a href="digital-design"><img src="assets/images/src/Digital_Design.jpg"></a></li>
				<li><a href="quote"><img src="assets/images/src/Get_A_Quote.jpg"></a></li>
				<li class="order-now-green"><a href="order">Order Now</a></li>
			</ul>
		   </div>

			<div class="col-xs-99 float-left">
				<div class="price-table table-responsive">
				<table class="table" border="0" cellpadding="0" cellspacing="0" width="100%">
				   <tr>
				   <td>
						<tr>
							<th>Quantity</th>
							<th>1/4 Inch</th>
							<th>1/2 Inch</th>
							<th>3/4 Inch</th>
							<th>1 Inch</th>
							<th>1.5 Inch</th>
							<th>2 Inch</th>
						</tr>

					</td>
					</tr>
					<tr>
						<td>
							20
						</td>
							@foreach($prices['ink-injected']['20'] as $key => $value)
								<td>{{ $value }}</td>
							@endforeach
					</tr>
					<tr>
						<td>
							30
						</td>
							@foreach($prices['ink-injected']['30'] as $key => $value)
								<td>{{ $value }}</td>
							@endforeach
					</tr>
					<tr>
						<td>
							100
						</td>
							@foreach($prices['ink-injected']['100'] as $key => $value)
								<td>{{ $value }}</td>
							@endforeach
					</tr>
					<tr>
						<td>
							300
						</td>
							@foreach($prices['ink-injected']['300'] as $key => $value)
								<td>{{ $value }}</td>
							@endforeach
					</tr>
					<tr>
						<td>
							500
						</td>
							@foreach($prices['ink-injected']['500'] as $key => $value)
								<td>{{ $value }}</td>
							@endforeach
					</tr>
					<tr>
						<td>
							1000
						</td>
							@foreach($prices['ink-injected']['1000'] as $key => $value)
								<td>{{ $value }}</td>
							@endforeach
					</tr>
					<tr>
						<td>
							2000
						</td>
							@foreach($prices['ink-injected']['2000'] as $key => $value)
								<td>{{ $value }}</td>
							@endforeach
					</tr>
					<tr>
						<td>
							3000
						</td>
							@foreach($prices['ink-injected']['3000'] as $key => $value)
								<td>{{ $value }}</td>
							@endforeach
					</tr>
					<tr>
						<td>
							5000
						</td>
							@foreach($prices['ink-injected']['5000'] as $key => $value)
								<td>{{ $value }}</td>
							@endforeach
					</tr>
					<tr>
						<td>
							10000
						</td>
							@foreach($prices['ink-injected']['10000'] as $key => $value)
								<td>{{ $value }}</td>
							@endforeach
					</tr>
					<tr>
						<td>
							20000
						</td>
							@foreach($prices['ink-injected']['20000'] as $key => $value)
								<td>{{ $value }}</td>
							@endforeach
					</tr>
					<tr>
						<td>
							50000
						</td>
							@foreach($prices['ink-injected']['50000'] as $key => $value)
								<td>{{ $value }}</td>
							@endforeach
					</tr>
					<tr>
						<td>
							100000
						</td>
							@foreach($prices['ink-injected']['100000'] as $key => $value)
								<td>{{ $value }}</td>
							@endforeach
					</tr>
					</tr>
			</table>
		   </div><!-- End Price Table --->
		   </div>
			<div class="clearfix"></div>
	   </div> <!--- End -->
		<!-- Start Title --->
		<div class="col-lg-12 col-md-12 col-sm-12 price-cont">
		  <div class="row offer-bar margin-bootom-20 __web-inspector-hide-shortcut__">
				<div class="col-xs-3 col-sm-22 offerpv float-left">Pricing Chart</span></div>
				<div class="col-xs-9 col-sm-101 offer-details float-left">Embossed Wristband</div>
					<div class="clearfix"></div>
		  </div>
	   </div>
	   <!-- End Title --->
	   <div class="cont-p">
		   <div class="col-xs-98 float-left">
		   	<div class="popup-gallery">
				<a href="assets/images/src/Embossed.png" title="Embossed">
					<img width="350" src="assets/images/src/Embossed.png" class="galleryimg">
				</a>
			</div>
			<ul class="price-sidebar">
				<li><a href="digital-design"><img src="assets/images/src/Digital_Design.jpg"></a></li>
				<li><a href="quote"><img src="assets/images/src/Get_A_Quote.jpg"></a></li>
				<li class="order-now-green"><a href="order">Order Now</a></li>
			</ul>
		   </div>

			<div class="col-xs-99 float-left">
				<div class="price-table table-responsive">
				<table class="table" border="0" cellpadding="0" cellspacing="0" width="100%">
				   <tr>
				   <td>
						<tr>
							<th>Quantity</th>
							<th>1/4 Inch</th>
							<th>1/2 Inch</th>
							<th>3/4 Inch</th>
							<th>1 Inch</th>
							<th>1.5 Inch</th>
							<th>2 Inch</th>
						</tr>

					</td>
					</tr>
					<tr>
						<td>
							20
						</td>
							@foreach($prices['embossed']['20'] as $key => $value)
								<td>{{ $value }}</td>
							@endforeach
					</tr>
					<tr>
						<td>
							30
						</td>
							@foreach($prices['embossed']['30'] as $key => $value)
								<td>{{ $value }}</td>
							@endforeach
					</tr>
					<tr>
						<td>
							100
						</td>
							@foreach($prices['embossed']['100'] as $key => $value)
								<td>{{ $value }}</td>
							@endforeach
					</tr>
					<tr>
						<td>
							300
						</td>
							@foreach($prices['embossed']['300'] as $key => $value)
								<td>{{ $value }}</td>
							@endforeach
					</tr>
					<tr>
						<td>
							500
						</td>
							@foreach($prices['embossed']['500'] as $key => $value)
								<td>{{ $value }}</td>
							@endforeach
					</tr>
					<tr>
						<td>
							1000
						</td>
							@foreach($prices['embossed']['1000'] as $key => $value)
								<td>{{ $value }}</td>
							@endforeach
					</tr>
					<tr>
						<td>
							2000
						</td>
							@foreach($prices['embossed']['2000'] as $key => $value)
								<td>{{ $value }}</td>
							@endforeach
					</tr>
					<tr>
						<td>
							3000
						</td>
							@foreach($prices['embossed']['3000'] as $key => $value)
								<td>{{ $value }}</td>
							@endforeach
					</tr>
					<tr>
						<td>
							5000
						</td>
							@foreach($prices['embossed']['5000'] as $key => $value)
								<td>{{ $value }}</td>
							@endforeach
					</tr>
					<tr>
						<td>
							10000
						</td>
							@foreach($prices['embossed']['10000'] as $key => $value)
								<td>{{ $value }}</td>
							@endforeach
					</tr>
					<tr>
						<td>
							20000
						</td>
							@foreach($prices['embossed']['20000'] as $key => $value)
								<td>{{ $value }}</td>
							@endforeach
					</tr>
					<tr>
						<td>
							50000
						</td>
							@foreach($prices['embossed']['50000'] as $key => $value)
								<td>{{ $value }}</td>
							@endforeach
					</tr>
					<tr>
						<td>
							100000
						</td>
							@foreach($prices['embossed']['100000'] as $key => $value)
								<td>{{ $value }}</td>
							@endforeach
					</tr>
					</tr>
			</table>
		   </div><!-- End Price Table --->
		   </div>
			<div class="clearfix"></div>
	   </div> <!--- End -->
	<!-- Start Title --->
		<div class="col-lg-12 col-md-12 col-sm-12 price-cont">
		  <div class="row offer-bar margin-bootom-20 __web-inspector-hide-shortcut__">
				<div class="col-xs-3 col-sm-22 offerpv float-left">Pricing Chart</span></div>
				<div class="col-xs-9 col-sm-101 offer-details float-left">Dual Layer Wristband</div>
					<div class="clearfix"></div>
		  </div>
	   </div>
	   <!-- End Title --->
	   <div class="cont-p">
		   <div class="col-xs-98 float-left">
		   	<div class="popup-gallery">
				<a href="assets/images/src/Dual-Layer.png" title="Dual Layer">
					<img width="350" src="assets/images/src/Dual-Layer.png" class="galleryimg">
				</a>
			</div>
			<ul class="price-sidebar">
				<li><a href="digital-design"><img src="assets/images/src/Digital_Design.jpg"></a></li>
				<li><a href="quote"><img src="assets/images/src/Get_A_Quote.jpg"></a></li>
				<li class="order-now-green"><a href="order">Order Now</a></li>
			</ul>
		   </div>

			<div class="col-xs-99 float-left">
				<div class="price-table table-responsive">
				<table class="table" border="0" cellpadding="0" cellspacing="0" width="100%">
				   <tr>
				   <td>
						<tr>
							<th>Quantity</th>
							<th>1/2 Inch</th>
							<th>3/4 Inch</th>
						</tr>

					</td>
					</tr>
					<tr>
						<td>
							20
						</td>
							@foreach($prices['dual-layer']['20'] as $key => $value)

							@if($key=='0-50inch')
								<td>{{ $value }}</td>
							@elseif($key=='0-75inch')
								<td>{{ $value }}</td>
							@endif
							@endforeach
					</tr>
					<tr>
						<td>
							30
						</td>
							@foreach($prices['dual-layer']['30'] as $key => $value)

							@if($key=='0-50inch')
								<td>{{ $value }}</td>
							@elseif($key=='0-75inch')
								<td>{{ $value }}</td>
							@endif
							@endforeach
					</tr>
					<tr>
						<td>
							100
						</td>
							@foreach($prices['dual-layer']['100'] as $key => $value)

							@if($key=='0-50inch')
								<td>{{ $value }}</td>
							@elseif($key=='0-75inch')
								<td>{{ $value }}</td>
							@endif
							@endforeach
					</tr>
					<tr>
						<td>
							300
						</td>
							@foreach($prices['dual-layer']['300'] as $key => $value)

							@if($key=='0-50inch')
								<td>{{ $value }}</td>
							@elseif($key=='0-75inch')
								<td>{{ $value }}</td>
							@endif
							@endforeach
					</tr>
					<tr>
						<td>
							500
						</td>
							@foreach($prices['dual-layer']['500'] as $key => $value)

							@if($key=='0-50inch')
								<td>{{ $value }}</td>
							@elseif($key=='0-75inch')
								<td>{{ $value }}</td>
							@endif
							@endforeach
					</tr>
					<tr>
						<td>
							1000
						</td>
							@foreach($prices['dual-layer']['1000'] as $key => $value)

							@if($key=='0-50inch')
								<td>{{ $value }}</td>
							@elseif($key=='0-75inch')
								<td>{{ $value }}</td>
							@endif
							@endforeach
					</tr>
					<tr>
						<td>
							2000
						</td>
							@foreach($prices['dual-layer']['2000'] as $key => $value)

							@if($key=='0-50inch')
								<td>{{ $value }}</td>
							@elseif($key=='0-75inch')
								<td>{{ $value }}</td>
							@endif
							@endforeach
					</tr>
					<tr>
						<td>
							3000
						</td>
							@foreach($prices['dual-layer']['3000'] as $key => $value)

							@if($key=='0-50inch')
								<td>{{ $value }}</td>
							@elseif($key=='0-75inch')
								<td>{{ $value }}</td>
							@endif
							@endforeach
					</tr>
					<tr>
						<td>
							5000
						</td>
							@foreach($prices['dual-layer']['5000'] as $key => $value)

							@if($key=='0-50inch')
								<td>{{ $value }}</td>
							@elseif($key=='0-75inch')
								<td>{{ $value }}</td>
							@endif
							@endforeach
					</tr>
					<tr>
						<td>
							10000
						</td>
							@foreach($prices['dual-layer']['10000'] as $key => $value)

							@if($key=='0-50inch')
								<td>{{ $value }}</td>
							@elseif($key=='0-75inch')
								<td>{{ $value }}</td>
							@endif
							@endforeach
					</tr>
					<tr>
						<td>
							20000
						</td>
							@foreach($prices['dual-layer']['20000'] as $key => $value)

							@if($key=='0-50inch')
								<td>{{ $value }}</td>
							@elseif($key=='0-75inch')
								<td>{{ $value }}</td>
							@endif
							@endforeach
					</tr>
					<tr>
						<td>
							50000
						</td>
							@foreach($prices['dual-layer']['50000'] as $key => $value)

							@if($key=='0-50inch')
								<td>{{ $value }}</td>
							@elseif($key=='0-75inch')
								<td>{{ $value }}</td>
							@endif
							@endforeach
					</tr>
					<tr>
						<td>
							100000
						</td>
							@foreach($prices['dual-layer']['100000'] as $key => $value)

							@if($key=='0-50inch')
								<td>{{ $value }}</td>
							@elseif($key=='0-75inch')
								<td>{{ $value }}</td>
							@endif
							@endforeach
					</tr>
					</tr>
			</table>
		   </div><!-- End Price Table --->
		   </div>
			<div class="clearfix"></div>
	   </div> <!--- End -->
	   <!-- Start Title --->
		<div class="col-lg-12 col-md-12 col-sm-12 price-cont">
		  <div class="row offer-bar margin-bootom-20 __web-inspector-hide-shortcut__">
				<div class="col-xs-3 col-sm-22 offerpv float-left">Pricing Chart</span></div>
				<div class="col-xs-9 col-sm-101 offer-details float-left">Embossed Printed Wristband</div>
					<div class="clearfix"></div>
		  </div>
	   </div>
	   <!-- End Title --->
	   <div class="cont-p">
		   <div class="col-xs-98 float-left">
		   	<div class="popup-gallery">
				<a href="assets/images/src/Embossed-Printed.png" title="Embossed Printed">
					<img width="350" src="assets/images/src/Embossed-Printed.png" class="galleryimg">
				</a>
			</div>
			<ul class="price-sidebar">
				<li><a href="digital-design"><img src="assets/images/src/Digital_Design.jpg"></a></li>
				<li><a href="quote"><img src="assets/images/src/Get_A_Quote.jpg"></a></li>
				<li class="order-now-green"><a href="order">Order Now</a></li>
			</ul>
		   </div>

			<div class="col-xs-99 float-left">
				<div class="price-table table-responsive">
				<table class="table" border="0" cellpadding="0" cellspacing="0" width="100%">
				   <tr>
				   <td>
						<tr>
							<th>Quantity</th>
							<th>1/4 Inch</th>
							<th>1/2 Inch</th>
							<th>3/4 Inch</th>
							<th>1 Inch</th>
							<th>1.5 Inch</th>
							<th>2 Inch</th>
						</tr>

					</td>
					</tr>
					<tr>
						<td>
							20
						</td>
							@foreach($prices['embossed-printed']['20'] as $key => $value)
								<td>{{ $value }}</td>
							@endforeach
					</tr>
					<tr>
						<td>
							30
						</td>
							@foreach($prices['embossed-printed']['30'] as $key => $value)
								<td>{{ $value }}</td>
							@endforeach
					</tr>
					<tr>
						<td>
							100
						</td>
							@foreach($prices['embossed-printed']['100'] as $key => $value)
								<td>{{ $value }}</td>
							@endforeach
					</tr>
					<tr>
						<td>
							300
						</td>
							@foreach($prices['embossed-printed']['300'] as $key => $value)
								<td>{{ $value }}</td>
							@endforeach
					</tr>
					<tr>
						<td>
							500
						</td>
							@foreach($prices['embossed-printed']['500'] as $key => $value)
								<td>{{ $value }}</td>
							@endforeach
					</tr>
					<tr>
						<td>
							1000
						</td>
							@foreach($prices['embossed-printed']['1000'] as $key => $value)
								<td>{{ $value }}</td>
							@endforeach
					</tr>
					<tr>
						<td>
							2000
						</td>
							@foreach($prices['embossed-printed']['2000'] as $key => $value)
								<td>{{ $value }}</td>
							@endforeach
					</tr>
					<tr>
						<td>
							3000
						</td>
							@foreach($prices['embossed-printed']['3000'] as $key => $value)
								<td>{{ $value }}</td>
							@endforeach
					</tr>
					<tr>
						<td>
							5000
						</td>
							@foreach($prices['embossed-printed']['5000'] as $key => $value)
								<td>{{ $value }}</td>
							@endforeach
					</tr>
					<tr>
						<td>
							10000
						</td>
							@foreach($prices['embossed-printed']['10000'] as $key => $value)
								<td>{{ $value }}</td>
							@endforeach
					</tr>
					<tr>
						<td>
							20000
						</td>
							@foreach($prices['embossed-printed']['20000'] as $key => $value)
								<td>{{ $value }}</td>
							@endforeach
					</tr>
					<tr>
						<td>
							50000
						</td>
							@foreach($prices['embossed-printed']['50000'] as $key => $value)
								<td>{{ $value }}</td>
							@endforeach
					</tr>
					<tr>
						<td>
							100000
						</td>
							@foreach($prices['embossed-printed']['100000'] as $key => $value)
								<td>{{ $value }}</td>
							@endforeach
					</tr>
					</tr>
			</table>
		   </div><!-- End Price Table --->
		   </div>
			<div class="clearfix"></div>
	   </div> <!--- End -->
		<!-- Start Title --->
		<div class="col-lg-12 col-md-12 col-sm-12 price-cont">
		  <div class="row offer-bar margin-bootom-20 __web-inspector-hide-shortcut__">
				<div class="col-xs-3 col-sm-22 offerpv float-left">Pricing Chart</span></div>
				<div class="col-xs-9 col-sm-101 offer-details float-left">Figured Wristband</div>
					<div class="clearfix"></div>
		  </div>
	   </div>
	   <!-- End Title --->
	   <div class="cont-p">
		   <div class="col-xs-98 float-left">
		   	<div class="popup-gallery">
				<a href="assets/images/src/Figured.png" title="Figured">
					<img width="350" src="assets/images/src/Figured.png" class="galleryimg">
				</a>
			</div>
			<ul class="price-sidebar">
				<li><a href="digital-design"><img src="assets/images/src/Digital_Design.jpg"></a></li>
				<li><a href="quote"><img src="assets/images/src/Get_A_Quote.jpg"></a></li>
				<li class="order-now-green"><a href="order">Order Now</a></li>
			</ul>
		   </div>

			<div class="col-xs-99 float-left">
				<div class="price-table table-responsive">
				<table class="table" border="0" cellpadding="0" cellspacing="0" width="100%">
				   <tr>
				   <td>
						<tr>
							<th>Quantity</th>
							<th>1/2 Inch</th>
							<th>3/4 Inch</th>
							<th>1 Inch</th>
						</tr>

					</td>
					</tr>
					<tr>
						<td>
							20
						</td>
							@foreach($prices['figured']['20'] as $key => $value)
							@if($key=='0-50inch')
								<td>{{ $value }}</td>
							@elseif($key=='0-75inch')
								<td>{{ $value }}</td>
							@elseif($key=='1-00inch')
								<td>{{ $value }}</td>
							@endif
							@endforeach
					</tr>
					<tr>
						<td>
							30
						</td>
							@foreach($prices['figured']['30'] as $key => $value)
								@if($key=='0-50inch')
								<td>{{ $value }}</td>
							@elseif($key=='0-75inch')
								<td>{{ $value }}</td>
							@elseif($key=='1-00inch')
								<td>{{ $value }}</td>
							@endif
							@endforeach
					</tr>
					<tr>
						<td>
							100
						</td>
							@foreach($prices['figured']['100'] as $key => $value)
								@if($key=='0-50inch')
								<td>{{ $value }}</td>
							@elseif($key=='0-75inch')
								<td>{{ $value }}</td>
							@elseif($key=='1-00inch')
								<td>{{ $value }}</td>
							@endif
							@endforeach
					</tr>
					<tr>
						<td>
							300
						</td>
							@foreach($prices['figured']['300'] as $key => $value)
							@if($key=='0-50inch')
								<td>{{ $value }}</td>
							@elseif($key=='0-75inch')
								<td>{{ $value }}</td>
							@elseif($key=='1-00inch')
								<td>{{ $value }}</td>
							@endif
							@endforeach
					</tr>
					<tr>
						<td>
							500
						</td>
							@foreach($prices['figured']['500'] as $key => $value)
							@if($key=='0-50inch')
								<td>{{ $value }}</td>
							@elseif($key=='0-75inch')
								<td>{{ $value }}</td>
							@elseif($key=='1-00inch')
								<td>{{ $value }}</td>
							@endif
							@endforeach
					</tr>
					<tr>
						<td>
							1000
						</td>
							@foreach($prices['figured']['1000'] as $key => $value)
								@if($key=='0-50inch')
								<td>{{ $value }}</td>
							@elseif($key=='0-75inch')
								<td>{{ $value }}</td>
							@elseif($key=='1-00inch')
								<td>{{ $value }}</td>
							@endif
							@endforeach
					</tr>
					<tr>
						<td>
							2000
						</td>
							@foreach($prices['figured']['2000'] as $key => $value)
								@if($key=='0-50inch')
								<td>{{ $value }}</td>
							@elseif($key=='0-75inch')
								<td>{{ $value }}</td>
							@elseif($key=='1-00inch')
								<td>{{ $value }}</td>
							@endif
							@endforeach
					</tr>
					<tr>
						<td>
							3000
						</td>
							@foreach($prices['figured']['3000'] as $key => $value)
							@if($key=='0-50inch')
								<td>{{ $value }}</td>
							@elseif($key=='0-75inch')
								<td>{{ $value }}</td>
							@elseif($key=='1-00inch')
								<td>{{ $value }}</td>
							@endif
							@endforeach
					</tr>
					<tr>
						<td>
							5000
						</td>
							@foreach($prices['figured']['5000'] as $key => $value)
							@if($key=='0-50inch')
								<td>{{ $value }}</td>
							@elseif($key=='0-75inch')
								<td>{{ $value }}</td>
							@elseif($key=='1-00inch')
								<td>{{ $value }}</td>
							@endif
							@endforeach
					</tr>
					<tr>
						<td>
							10000
						</td>
							@foreach($prices['figured']['10000'] as $key => $value)
							@if($key=='0-50inch')
								<td>{{ $value }}</td>
							@elseif($key=='0-75inch')
								<td>{{ $value }}</td>
							@elseif($key=='1-00inch')
								<td>{{ $value }}</td>
							@endif
							@endforeach
					</tr>
					<tr>
						<td>
							20000
						</td>
							@foreach($prices['figured']['20000'] as $key => $value)
							@if($key=='0-50inch')
								<td>{{ $value }}</td>
							@elseif($key=='0-75inch')
								<td>{{ $value }}</td>
							@elseif($key=='1-00inch')
								<td>{{ $value }}</td>
							@endif
							@endforeach
					</tr>
					<tr>
						<td>
							50000
						</td>
							@foreach($prices['figured']['50000'] as $key => $value)
							@if($key=='0-50inch')
								<td>{{ $value }}</td>
							@elseif($key=='0-75inch')
								<td>{{ $value }}</td>
							@elseif($key=='1-00inch')
								<td>{{ $value }}</td>
							@endif
							@endforeach
					</tr>
					<tr>
						<td>
							100000
						</td>
							@foreach($prices['figured']['100000'] as $key => $value)
							@if($key=='0-50inch')
								<td>{{ $value }}</td>
							@elseif($key=='0-75inch')
								<td>{{ $value }}</td>
							@elseif($key=='1-00inch')
								<td>{{ $value }}</td>
							@endif
							@endforeach
					</tr>
					</tr>
			</table>
		   </div><!-- End Price Table --->
		   </div>
			<div class="clearfix"></div>
	   </div> <!--- End -->
	   <!-- Start Title --->
		<div class="col-lg-12 col-md-12 col-sm-12 price-cont">
		  <div class="row offer-bar margin-bootom-20 __web-inspector-hide-shortcut__">
				<div class="col-xs-3 col-sm-22 offerpv float-left">Pricing Chart</span></div>
				<div class="col-xs-9 col-sm-101 offer-details float-left">Blank Wristband</div>
					<div class="clearfix"></div>
		  </div>
	   </div>
	   <!-- End Title --->
	   <div class="cont-p">
		   <div class="col-xs-98 float-left">
		   	<div class="popup-gallery">
				<a href="assets/images/src/Blank.png" title="Blank">
					<img width="350" src="assets/images/src/Blank.png" class="galleryimg">
				</a>
			</div>
			<ul class="price-sidebar">
				<li><a href="digital-design"><img src="assets/images/src/Digital_Design.jpg"></a></li>
				<li><a href="quote"><img src="assets/images/src/Get_A_Quote.jpg"></a></li>
				<li class="order-now-green"><a href="order">Order Now</a></li>
			</ul>
		   </div>

			<div class="col-xs-99 float-left">
				<div class="price-table table-responsive">
				<table class="table" border="0" cellpadding="0" cellspacing="0" width="100%">
				   <tr>
				   <td>
						<tr>
							<th>Quantity</th>
							<th>1/4 Inch</th>
							<th>1/2 Inch</th>
							<th>3/4 Inch</th>
							<th>1 Inch</th>
							<th>1.5 Inch</th>
							<th>2 Inch</th>
						</tr>

					</td>
					</tr>
					<tr>
						<td>
							20
						</td>
							@foreach($prices['blank']['20'] as $key => $value)
								<td>{{ $value }}</td>
							@endforeach
					</tr>
					<tr>
						<td>
							30
						</td>
							@foreach($prices['blank']['30'] as $key => $value)
								<td>{{ $value }}</td>
							@endforeach
					</tr>
					<tr>
						<td>
							100
						</td>
							@foreach($prices['blank']['100'] as $key => $value)
								<td>{{ $value }}</td>
							@endforeach
					</tr>
					<tr>
						<td>
							300
						</td>
							@foreach($prices['blank']['300'] as $key => $value)
								<td>{{ $value }}</td>
							@endforeach
					</tr>
					<tr>
						<td>
							500
						</td>
							@foreach($prices['blank']['500'] as $key => $value)
								<td>{{ $value }}</td>
							@endforeach
					</tr>
					<tr>
						<td>
							1000
						</td>
							@foreach($prices['blank']['1000'] as $key => $value)
								<td>{{ $value }}</td>
							@endforeach
					</tr>
					<tr>
						<td>
							2000
						</td>
							@foreach($prices['blank']['2000'] as $key => $value)
								<td>{{ $value }}</td>
							@endforeach
					</tr>
					<tr>
						<td>
							3000
						</td>
							@foreach($prices['blank']['3000'] as $key => $value)
								<td>{{ $value }}</td>
							@endforeach
					</tr>
					<tr>
						<td>
							5000
						</td>
							@foreach($prices['blank']['5000'] as $key => $value)
								<td>{{ $value }}</td>
							@endforeach
					</tr>
					<tr>
						<td>
							10000
						</td>
							@foreach($prices['blank']['10000'] as $key => $value)
								<td>{{ $value }}</td>
							@endforeach
					</tr>
					<tr>
						<td>
							20000
						</td>
							@foreach($prices['blank']['20000'] as $key => $value)
								<td>{{ $value }}</td>
							@endforeach
					</tr>
					<tr>
						<td>
							50000
						</td>
							@foreach($prices['blank']['50000'] as $key => $value)
								<td>{{ $value }}</td>
							@endforeach
					</tr>
					<tr>
						<td>
							100000
						</td>
							@foreach($prices['blank']['100000'] as $key => $value)
								<td>{{ $value }}</td>
							@endforeach
					</tr>
					</tr>
			</table>
		   </div><!-- End Price Table --->
		   </div>
			<div class="clearfix"></div>
	   </div> <!--- End -->
	</div>zzz
	<!-- End Container -->
</div>
<!-- End main content -->
@endsection
