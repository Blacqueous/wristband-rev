<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}"/>
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<meta name="robots" content="all, index, follow"/>
		<meta name="googlebot" content="index, follow, archive"/>
		<meta name="Slurp" content="index, follow, archive"/>
		<meta name="web_author" content="editorial staff of GetWristband"/>
		<meta name="rating" content="General"/>
		<meta name="geo.region" content="US-NJ"/>
		<meta name="geo.placename" content="Elizabeth"/>
		<meta name="geo.position" content="40.663857;-74.223181"/>
		<meta name="ICBM" content="40.663857, -74.223181"/>
		<link rel="icon" href="{{ URL::asset('../../favicon.ico') }}">
		<meta name="google-site-verification" content="donyC2DWRFLJm-yUeDOoD9YnWD6PEBR9fU-sE5kggG0" />
		<title>@yield('title') Promotional Wristbands</title>
		<meta name="description" content="@yield('description')">
		<!-- Bootstrap core CSS -->
		<link href="{{ URL::asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
		<!-- Font Awesome core CSS -->
		<link href="{{ URL::asset('global/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
		<!-- SweetAlert core CSS -->
		<link href="{{ URL::asset('global/sweetalert.js/sweetalert.css') }}" rel="stylesheet">
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<link href="{{ URL::asset('assets/css/ie10-viewport-bug-workaround.css') }}" rel="stylesheet">
		<!-- Custom styles for this template -->
		<link href="{{ URL::asset('assets/css/style_sheet.css') }}" rel="stylesheet">
		<link href="{{ URL::asset('assets/css/order.css') }}" rel="stylesheet">
		<link href="{{ URL::asset('assets/css/font_style.css') }}" rel="stylesheet">
		<link href="{{ URL::asset('assets/css/magnific-popup.css') }}" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500" rel="stylesheet">
		<!-- Page custom added css styles. -->
        @section('css')
        @show

		<script src="{{ URL::asset('js/jquery-3.1.1.min.js') }}"></script>
		<!-- BEGIN: Google Trusted Stores -->
        <script type="text/javascript">
            // var gts = gts || [];
			//
            // gts.push(["id", "725104"]);
            // gts.push(["badge_position", "USER_DEFINED"]);
            // gts.push(["badge_container", "google_trust"]);
            // gts.push(["locale", "PAGE_LANGUAGE"]);
            // gts.push(["google_base_offer_id", "ITEM_GOOGLE_SHOPPING_ID"]);
            // gts.push(["google_base_subaccount_id", "ITEM_GOOGLE_SHOPPING_ACCOUNT_ID"]);
			//
            // (function() {
            //     var gts = document.createElement("script");
            //     gts.type = "text/javascript";
            //     gts.async = true;
            //     gts.src = "https://www.googlecommerce.com/trustedstores/api/js";
            //     var s = document.getElementsByTagName("script")[0];
            //         s.parentNode.insertBefore(gts, s);
            // })();
        </script>
        <!-- END: Google Trusted Stores -->
		<!-- <script type='text/javascript' data-cfasync='false'>window.purechatApi = { l: [], t: [], on: function () { this.l.push(arguments); } }; (function () { var done = false; var script = document.createElement('script'); script.async = true; script.type = 'text/javascript'; script.src = 'https://app.purechat.com/VisitorWidget/WidgetScript'; document.getElementsByTagName('HEAD').item(0).appendChild(script); script.onreadystatechange = script.onload = function (e) { if (!done && (!this.readyState || this.readyState == 'loaded' || this.readyState == 'complete')) { var w = new PCWidget({c: 'ff8c4d2b-032b-4f3f-9c29-8411120648ad', f: true }); done = true; } }; })();
		</script> -->

		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
		  ga('create', 'UA-90869436-1', 'auto');
		  ga('send', 'pageview');
		</script>
	</head>

    <body>
		<div class="loader-container">
			<div id="loader-wrapper">
				<div class="loader-spin"><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div></div>
				<div class="loader-section section-left"></div>
				<div class="loader-section section-right"></div>
			</div>
		</div>
        @include('template.header')
        <div id="main">
            @section('content')
            @show
        </div>
 		<a href="#" id="back-to-top" title="Back to top"><span style="fnot-weight:bold;">&#8593;</span></a>
        @include('template.footer')

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
        <!-- <script type="text/javascript" src="assets/docs/spectrum.js"></script> -->
        <script type='text/javascript' src="{{ URL::asset('assets/docs/toc.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('assets/js/jquery.countdown.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
		<script src="{{ URL::asset('global/bootstrap/js/bootstrap.min.js') }}"></script>
		<script src="{{ URL::asset('global/sweetalert.js/sweetalert.min.js') }}"></script>
		<script src="{{ URL::asset('js/angular.min.js') }}"></script>
        <script src="{{ URL::asset('js/jquery.blink.js') }}"></script>
        <!-- Javascript for wristband previews -->
        <!-- <script type="text/javascript" src="assets/js/canvg.js"></script>
        <script type="text/javascript" src="assets/js/stackblur.js"></script> -->
        <script type="text/javascript" src="{{ URL::asset('assets/js/preview.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('assets/js/preview_band.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('assets/js/promo-keychain-10.js') }}"></script>
        <!-- <script src="assets/js/main-2.js"></script> -->
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<!-- Page custom added javascripts. -->
        @section('js')
        @show

        <script type="text/javascript">

			$(window).ready(function() {
				$('body').addClass('loaded');
				$('.loader-section').addClass('done');
				$('[data-toggle="tooltip"]').tooltip();
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

            $(function() {
                $('#fs > option').hover(function() {
                    $(this).parent().css({fontFamily:$(this).val()})
                });
            });

            $(document).ready(function() {
				$(document).scrollTop(0);
                $('.popup-order-gallery').magnificPopup({
                    delegate: 'a',
                    type: 'image',
                    tLoading: 'Loading image #%curr%...',
                    mainClass: 'mfp-img-mobile',
                    gallery: {
                        enabled: false,
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
        </script>

        <script language="javascript">
            jQuery("#slideshow > div:gt(0)").hide();
            setInterval(function() {
                jQuery('#slideshow > div:first')
                    .fadeOut(1000)
                    .next()
                    .fadeIn(1000)
                    .end()
                    .appendTo('#slideshow');
            },  7000);
        </script>
		
		<!---Purechat---->
		<!-- <script type='text/javascript' data-cfasync='false'>window.purechatApi = { l: [], t: [], on: function () { this.l.push(arguments); } }; (function () { var done = false; var script = document.createElement('script'); script.async = true; script.type = 'text/javascript'; script.src = 'https://app.purechat.com/VisitorWidget/WidgetScript'; document.getElementsByTagName('HEAD').item(0).appendChild(script); script.onreadystatechange = script.onload = function (e) { if (!done && (!this.readyState || this.readyState == 'loaded' || this.readyState == 'complete')) { var w = new PCWidget({c: 'ff40693c-72dc-4584-ae8c-da48382a8d96', f: true }); done = true; } }; })();</script> -->

    </body>

</html>
