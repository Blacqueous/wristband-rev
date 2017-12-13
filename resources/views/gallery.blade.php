
@extends('template.layout')

@section('title', 'Gallery -')

@section('css')
<style>

.clip-color-list li:first-child{
   display: none;
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
				enabled: true,
				navigateByImgClick: true,
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

<!-- Main jumbotron for a primary marketing message or call to action -->
<div id="main-content" class="row homecontent">
    <div class="container">
		<h1>Gallery</h1>

			<h4>Wristbands</h4>
			<div class="popup-gallery">
					@foreach($gallery as $key => $value)
					  <div class="col-md-4 gal" title="{{ $value['name'] }}"><a ref="{{ $value['name'] }}" href="{{ $value['image'] }}" title="{{ $value['name'] }}"><img src="{{ $value['image'] }}" class="galleryimg"/></a></div>
					@endforeach
				<div class="clearfix"></div>
			</div>
    </div>
<!-- End container -->
</div>
@endsection
