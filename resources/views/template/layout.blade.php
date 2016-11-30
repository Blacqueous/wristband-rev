<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<meta name="description" content="">
		<meta name="author" content="">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<link rel="icon" href="../../favicon.ico">

		<title>Promotional Wristbands @yield('title')</title>

		<!-- Bootstrap core CSS -->
		<link href="assets/css/bootstrap.min.css" rel="stylesheet">

		<!-- Font Awesome core CSS -->
		<link href="global/font-awesome/css/font-awesome.min.css" rel="stylesheet">

		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<link href="assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

		<!-- Custom styles for this template -->
		<link href="assets/css/style_sheet.css" rel="stylesheet">
		<link href="assets/css/order.css" rel="stylesheet">
		<link href="assets/css/font_style.css" rel="stylesheet">
		<link href="assets/css/magnific-popup.css" rel="stylesheet">

		<!-- Page custom added css styles. -->
        @section('css')
        @show

		<script src="js/jquery-3.1.1.min.js"></script>

		<!-- <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" type="text/css"> -->

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
	</head>

    <body>

        @include('template.header')

        <div id="main">
            @section('content')
            @show
        </div>

        @include('template.footer')

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->

        <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>

        <!-- <script type="text/javascript" src="assets/docs/spectrum.js"></script> -->
        <script type='text/javascript' src="assets/docs/toc.js"></script>
        <script type="text/javascript" src="assets/js/jquery.countdown.js"></script>
        <script type="text/javascript" src="assets/js/jquery.magnific-popup.min.js"></script>

		<script src="global/bootstrap/js/bootstrap.min.js"></script>

		<script src="js/angular.min.js"></script>
        <script src="js/jquery.blink.js"></script>

        <!-- Javascript for wristband previews -->
        <!-- <script type="text/javascript" src="assets/js/canvg.js"></script>
        <script type="text/javascript" src="assets/js/stackblur.js"></script> -->
        <script type="text/javascript" src="assets/js/preview.js"></script>
        <script type="text/javascript" src="assets/js/preview_band.js"></script>

        <script type="text/javascript" src="assets/js/promo-keychain-10.js"></script>

        <!-- <script src="assets/js/main-2.js"></script> -->
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->

		<!-- Page custom added javascripts. -->
        @section('js')
        @show

        <script>
            $(function() {
                $('#fs > option').hover(function() {
                    $(this).parent().css({fontFamily:$(this).val()})
                });
            });
        </script>

        <script>
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

        <script language="javascript">
            $(document).ready(function() {
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

    </body>

</html>
