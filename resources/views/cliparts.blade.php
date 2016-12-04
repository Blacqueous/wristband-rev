
@extends('template.layout')

@section('title', ' - Cliparts')

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
		
		
		if ($('#back-to-top').length) {
		var scrollTrigger = 100, // px
			backToTop = function () {
				var scrollTop = $(window).scrollTop();
				if (scrollTop > scrollTrigger) {
					$('#back-to-top').addClass('show');
				} else {
					$('#back-to-top').removeClass('show');
				}
			};
			backToTop();
			$(window).on('scroll', function () {
				backToTop();
			});
			$('#back-to-top').on('click', function (e) {
				e.preventDefault();
				$('html,body').animate({
					scrollTop: 0
				}, 700);
			});
		}
	});
	// -->
	</script>
@endsection

@section('content')

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="container">
       <h1>Cliparts</h1>
		<div class="clips-content">
			<ul class="clip-color-list">
				@foreach($cliparts as $key => $value)
				  <li name="{{ $value['name'] }}" ><img src="{{ $value['image'] }}"/><b>{{ $value['name'] }}</b></li>
				@endforeach
			</ul>
			<div class="clearfix"></div>
        </div>
    </div>
<!-- End container -->
@endsection
