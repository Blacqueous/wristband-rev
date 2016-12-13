
@extends('template.layout')

@section('title', ' - Product')

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
		<div class="half_bg" style="width: 60%; margin: 1% 0px 1% 1%;">
			<h1>Dual Layer Wristband</h1>
			<!----<p class="prodcode">Product Code: <b>RB-DL12</b> (1/2 Inch) | <b>RB-DL1</b> (1 Inch)</p>--->
			<p>Dual Layer wristbands allow you to have different colors on the inner and outer portion of the wristband. You can also have your customized message placed on the bands in varying colors. The message will be engraved first and will be oil sprayed resulting to the wristband having a glossy texture. Another option is to have the color of the message part be different than that of the inner and outer portion of the wristband.</p>
			<div class="popup-gallery">
				<div class="col-md-8">
				<a href="{{ URL::asset('assets/images/src/Dual-Layer.png') }}" title="Dual Layer"><img src="{{ URL::asset('assets/images/src/Dual-Layer.png') }}" class="galleryimg" ></a>
				</div>
			</div>
				<div class="clearfix"  style="margin-bottom:20px;"></div>

			<div class="col-md-10">
				<div class="size_options">
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
			</table>
				</div>
			</div>
				<div class="clearfix"></div>
		</div>
		<div class="half_sm" style="width: 32%; margin: 5% 0px 1% 5%;">
			<div class="addl_options">
				<h4>Message Options</h4>
				<p>Back Message<br>
				Inside Message<br>
				Multiple Wristband Color <br>
				Multiple Wristband Size<br>
				Digital Proof <br>
				</p>
				<h4>Sizes</h4>
				<p> Toddler Size (6 inch)<br>
					Youth Size (7 inch)<br>
					Medium Size (7.5 inch)<br>
					Adult Size (8 inch)<br>
					Extra Large (9.0 inch)
				</p>
				<h4>Wristband Widths</h4>
				<p> 1/4 Inch Wide<br>
					1/2 Inch Wide<br>
					3/4 Inch Wide<br>
					1 Inch Wide<br>
					1 and 1/2 Inch Wide<br>
					2 Inch Wide
				</p>
				<h4>Colors Available</h4>
				<p> All Colors<br>
					Free PMS Pantone Color Match<br>
					<a href="colors">View Pantone Chart</a>
				</p>
				<h4>Fonts Available</h4>
				<p> <a href="fonts">View Fonts Available</a>
				</p>
				<h4>Logo Cliparts Available</h4>
				<p> <a href="cliparts">View Logo Cliparts Available</a>
				</p>
				<h4>Other Add-Ons</h4>
				<p>
					Swirl or Tiedie type <br>
					Segmented <br>
					Glow in the Dark <br>
					Camo <br>
					Glitters<br>
					Individual Pack <br>
					Keychain <br>
					Thumb Ring <br>
					Extra Thick <br>
					Sequential Number<br>
				</p>
				<h4>Shipping Turnaround Time</h4>
				<p> Standard Shipping (10 to 14 days)<br>
					Rush Shipping Available (7 to 9 days): <span class="red">(Quote Upon Request)</span><br>
					Super Rush Shipping (4 to 6 days): <span class="red">(Quote Upon Request)</span>
				</p>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
	<!-- End Container -->
</div>
<!-- End main content -->
@endsection
