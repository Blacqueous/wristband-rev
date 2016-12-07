
@extends('template.layout')

@section('title', ' - Sizes Chart')

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
    <div class="container">
      	<h1>Sizes</h1>
		<div class="sizes-content">
			<ul>
			<?php //var_dump($sizes);exit;?>
				@foreach($sizes as $key => $value)
				   <li ><img src="{{ $value['image'] }}"></li>
				@endforeach
			</ul>
			<div class="clearfix"></div>
        </div>
    </div>
<!-- End container -->
@endsection
