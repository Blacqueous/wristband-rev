
@extends('template.layout')

@section('title', 'Embossed Printed Wristbands |')
@section('description', 'Get undeniable aesthetic value with embossed printed wristbands! Take your pick of color for your design or message, and we’ll emboss it for you.')

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
			<h1>Embossed Printed Wristband</h1>
			<!----<p class="prodcode">Product Code: <b>RB-EMP12</b> (1/2 Inch) | <b>RB-EMP1</b> (1 Inch)</p>---->
			<p>This type of wristband is the most costly but has the highest aesthetic value. Technically, this wristband is just the same as the embossed type of wristband. However, your customized message or design will have a different color depending on your choice.</p>
			<div class="popup-gallery">
				<div class="col-md-8">
				<a href="{{ URL::asset('assets/images/src/Embossed-Printed.png') }}" title="Embossed Printed"><img src="{{ URL::asset('assets/images/src/Embossed-Printed.png') }}" class="galleryimg" ></a>
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
							50
						</td>
							@foreach($prices['embossed-printed']['50'] as $key => $value)
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
