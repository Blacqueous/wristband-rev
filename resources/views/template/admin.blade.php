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
		<link rel="icon" href="{{ URL::asset('../../favicon.ico') }}">

		<title>Administrator @yield('title') Page</title>

		<!-- Bootstrap core CSS -->
		<link href="{{ URL::asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

		<!-- Font Awesome core CSS -->
		<link href="{{ URL::asset('global/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">

		<!-- Toastr Notification plugin -->
		<link href="{{ URL::asset('global/toastr/build/toastr.css') }}" rel="stylesheet" type="text/css">

		<!-- Page custom added css styles. -->
        @section('css')
        @show

		@if($type != 0)
		<style>
		body {
		    position: relative;
		    overflow-x: hidden;
		}
		body,
		html { height: 100%;}
		.nav .open > a,
		.nav .open > a:hover,
		.nav .open > a:focus {background-color: transparent;}

		/*-------------------------------*/
		/*           Wrappers            */
		/*-------------------------------*/

		#wrapper {
		    padding-left: 0;
		    -webkit-transition: all 0.5s ease;
		    -moz-transition: all 0.5s ease;
		    -o-transition: all 0.5s ease;
		    transition: all 0.5s ease;
		}

		#wrapper.toggled {
		    padding-left: 220px;
		}

		#sidebar-wrapper {
		    z-index: 1000;
		    left: 220px;
		    width: 0;
		    height: 100%;
		    margin-left: -220px;
		    overflow-y: auto;
		    overflow-x: hidden;
		    background: #1a1a1a;
		    -webkit-transition: all 0.5s ease;
		    -moz-transition: all 0.5s ease;
		    -o-transition: all 0.5s ease;
		    transition: all 0.5s ease;
		}

		#sidebar-wrapper::-webkit-scrollbar {
			display: none;
		}

		#wrapper.toggled #sidebar-wrapper {
		    width: 220px;
		}

		#page-content-wrapper {
		    width: 100%;
		    padding-top: 70px;
		}

		#wrapper.toggled #page-content-wrapper {
		    position: absolute;
		    margin-right: -220px;
		}

		/*-------------------------------*/
		/*     Sidebar nav styles        */
		/*-------------------------------*/

		.sidebar-nav {
		    position: absolute;
		    top: 0;
		    width: 220px;
		    margin: 0;
		    padding: 0;
		    list-style: none;
		}

		.sidebar-nav li {
		    position: relative;
		    line-height: 20px;
		    display: inline-block;
		    width: 100%;
		}

		.sidebar-nav li:before {
		    content: '';
		    position: absolute;
		    top: 0;
		    left: 0;
		    z-index: -1;
		    height: 100%;
		    width: 3px;
		    background-color: #1c1c1c;
		    -webkit-transition: width .2s ease-in;
		      -moz-transition:  width .2s ease-in;
		       -ms-transition:  width .2s ease-in;
		            transition: width .2s ease-in;

		}
		.sidebar-nav li:first-child a {
		    background-color: rgba(0, 0, 0, 0.2);
		}
		.sidebar-nav li:nth-child(2):before, .sidebar-nav li:nth-child(2).active {
		    background-color: #1ABC9C;
		}
		.sidebar-nav li:nth-child(3):before, .sidebar-nav li:nth-child(3).active {
			background-color: #3498DB;
		}
		.sidebar-nav li:nth-child(4):before, .sidebar-nav li:nth-child(4).active {
			background-color: #F57C00;
		}
		.sidebar-nav li:nth-child(5):before, .sidebar-nav li:nth-child(5).active {
			background-color: #9C27B0;
		}
		.sidebar-nav li:nth-child(6):before, .sidebar-nav li:nth-child(6).active {
			background-color: #FF76A4;
		}
		.sidebar-nav li:nth-child(7):before, .sidebar-nav li:nth-child(7).active {
			background-color: #3498db;
		}
		.sidebar-nav li:nth-child(8):before, .sidebar-nav li:nth-child(8).active {
			background-color: #9b59b6;
		}
		.sidebar-nav li:nth-child(9):before, .sidebar-nav li:nth-child(9).active {
			background-color: #e67e22;
		}
		.sidebar-nav li:hover:before,
		.sidebar-nav li.open:hover:before {
		    width: 100%;
		    -webkit-transition: width .2s ease-in;
		      -moz-transition:  width .2s ease-in;
		       -ms-transition:  width .2s ease-in;
		            transition: width .2s ease-in;

		}

		.sidebar-nav li a {
		    display: block;
		    color: #fff;
		    text-decoration: none;
		    padding: 10px 15px 10px 30px;
		}

		.sidebar-nav li a:hover,
		.sidebar-nav li a:active,
		.sidebar-nav li a:focus,
		.sidebar-nav li.open a:hover,
		.sidebar-nav li.open a:active,
		.sidebar-nav li.open a:focus{
		    color: #fff;
		    text-decoration: none;
		    background-color: transparent;
		}

		.sidebar-nav > .sidebar-brand {
		    min-height: 60px;
		    font-size: 22px;
		    line-height: 44px;
		    text-transform: uppercase;
		}
		.sidebar-nav .dropdown-menu {
		    position: relative;
		    width: 100%;
		    padding: 0;
		    margin: 0;
		    border-radius: 0;
		    border: none;
		    background-color: #222;
		    box-shadow: none;
		}

		/*-------------------------------*/
		/*       Hamburger-Cross         */
		/*-------------------------------*/

		.hamburger {
		  position: fixed;
		  top: 20px;
		  z-index: 999;
		  display: block;
		  width: 32px;
		  height: 32px;
		  margin-left: 15px;
		  background: transparent;
		  border: none;
		}
		.hamburger:hover,
		.hamburger:focus,
		.hamburger:active {
		  outline: none;
		}
		.hamburger.is-closed:before {
		  content: '';
		  display: block;
		  width: 100px;
		  font-size: 14px;
		  color: #fff;
		  line-height: 32px;
		  text-align: center;
		  opacity: 0;
		  -webkit-transform: translate3d(0,0,0);
		  -webkit-transition: all .35s ease-in-out;
		}
		.hamburger.is-closed:hover:before {
		  opacity: 1;
		  display: block;
		  -webkit-transform: translate3d(-100px,0,0);
		  -webkit-transition: all .35s ease-in-out;
		}

		.hamburger.is-closed .hamb-top,
		.hamburger.is-closed .hamb-middle,
		.hamburger.is-closed .hamb-bottom,
		.hamburger.is-open .hamb-top,
		.hamburger.is-open .hamb-middle,
		.hamburger.is-open .hamb-bottom {
		  position: absolute;
		  left: 0;
		  height: 4px;
		  width: 100%;
		}
		.hamburger.is-closed .hamb-top,
		.hamburger.is-closed .hamb-middle,
		.hamburger.is-closed .hamb-bottom {
		  background-color: #1a1a1a;
		}
		.hamburger.is-closed .hamb-top {
		  top: 5px;
		  -webkit-transition: all .35s ease-in-out;
		}
		.hamburger.is-closed .hamb-middle {
		  top: 50%;
		  margin-top: -2px;
		}
		.hamburger.is-closed .hamb-bottom {
		  bottom: 5px;
		  -webkit-transition: all .35s ease-in-out;
		}

		.hamburger.is-closed:hover .hamb-top {
		  top: 0;
		  -webkit-transition: all .35s ease-in-out;
		}
		.hamburger.is-closed:hover .hamb-bottom {
		  bottom: 0;
		  -webkit-transition: all .35s ease-in-out;
		}
		.hamburger.is-open .hamb-top,
		.hamburger.is-open .hamb-middle,
		.hamburger.is-open .hamb-bottom {
		  background-color: #1a1a1a;
		}
		.hamburger.is-open .hamb-top,
		.hamburger.is-open .hamb-bottom {
		  top: 50%;
		  margin-top: -2px;
		}
		.hamburger.is-open .hamb-top {
		  -webkit-transform: rotate(45deg);
		  -webkit-transition: -webkit-transform .2s cubic-bezier(.73,1,.28,.08);
		}
		.hamburger.is-open .hamb-middle { display: none; }
		.hamburger.is-open .hamb-bottom {
		  -webkit-transform: rotate(-45deg);
		  -webkit-transition: -webkit-transform .2s cubic-bezier(.73,1,.28,.08);
		}
		.hamburger.is-open:before {
		  content: '';
		  display: block;
		  width: 100px;
		  font-size: 14px;
		  color: #fff;
		  line-height: 32px;
		  text-align: center;
		  opacity: 0;
		  -webkit-transform: translate3d(0,0,0);
		  -webkit-transition: all .35s ease-in-out;
		}
		.hamburger.is-open:hover:before {
		  opacity: 1;
		  display: block;
		  -webkit-transform: translate3d(-100px,0,0);
		  -webkit-transition: all .35s ease-in-out;
		}

		/*-------------------------------*/
		/*            Overlay            */
		/*-------------------------------*/

		.overlay {
		    position: fixed;
		    display: none;
		    width: 100%;
		    height: 100%;
		    top: 0;
		    left: 0;
		    right: 0;
		    bottom: 0;
		    background-color: rgba(250,250,250,.8);
		    z-index: 1;
		}

		.nav-logout:before {
			background-color: #F44336 !important;
		}
		.nav-reset:before {
			background-color: #795548 !important;
		}
        </style>
		@endif

	</head>

    <body>

		@if($type == 0)
	    <h1 class="text-center">@yield('page_title')</h1>
	    <hr/>
		<div class="container">
			@section('content')
			@show
		</div>
		@else
		<div id="wrapper">
			<div class="overlay"></div>
			<!-- Sidebar -->
			<nav class="navbar navbar-fixed-top is-closed" id="sidebar-wrapper" role="navigation">
				<ul class="nav sidebar-nav">
					<li class="sidebar-brand">
						<a href="#" onclick="event.preventDefault();">
							Promotional Wristband
						</a>
					</li>
					<li @if($menu == 4) class="active" @endif>
						<a href="{{ URL::to('/admin/orders') }}">
							<i class="fa fa-shopping-cart"></i> Manage Orders
						</a>
					</li>
					<li @if($menu == 5) class="active" @endif>
						<a href="{{ URL::to('/admin/discounts') }}">
							<i class="fa fa-ticket"></i> Manage Promo Code
						</a>
					</li>
					<li @if($menu == 1) class="active" @endif>
						<a href="{{ URL::to('/admin/prices') }}">
							<i class="fa fa-money"></i> Manage Prices
						</a>
					</li>
					<li @if($menu == 2) class="active" @endif>
						<a href="{{ URL::to('/admin/images') }}">
							<i class="fa fa-file-image-o"></i> Manage Images
						</a>
					</li>
					<li @if($menu == 3) class="active" @endif>
						<a href="{{ URL::to('/admin/reset') }}">
							<i class="fa fa-eraser"></i> Clear Cache
						</a>
					</li>
					<li class="nav-logout">
						<a class="text-danger" href="{{ URL::to('/admin/logout') }}">
							<i class="fa fa-sign-out"></i> Logout
						</a>
					</li>
				</ul>
			</nav>
			<!-- /#sidebar-wrapper -->
			<!-- Page Content -->
			<div id="page-content-wrapper">
				<button type="button" class="hamburger is-closed" data-toggle="offcanvas">
					<span class="hamb-top"></span>
					<span class="hamb-middle"></span>
					<span class="hamb-bottom"></span>
				</button>
				<div class="container">
					<div class="row">
						<div class="col-lg-8 col-lg-offset-2 text-center">
							@section('content')
							@show
						</div>
					</div>
				</div>
			</div>
			<!-- /#page-content-wrapper -->
		</div>
		@endif

		<script src="{{ URL::asset('js/jquery-3.1.1.min.js') }}"></script>
		<script src="{{ URL::asset('global/bootstrap/js/bootstrap.min.js') }}"></script>
		<script src="{{ URL::asset('global/bootstrap-confirmation/bootstrap-confirmation.min.js') }}"></script>

		<!-- Toastr Notification plugin -->
		<script src="{{ URL::asset('global/toastr/build/toastr.min.js') }}"></script>

		<!-- Page custom added javascripts. -->
        @section('js')
        @show

		@if($type != 0)
		<script type="text/javascript">
            $(document).ready(function(e) {

				var trigger = $('.hamburger'),
					overlay = $('.overlay'),
					navbar = $('.navbar'),
					isClosed = false;

				trigger.click(function () {
					hamburger_cross();
				});

				function hamburger_cross() {
					if (isClosed == true) {
						overlay.hide();
						trigger.removeClass('is-open');
						trigger.addClass('is-closed');
						isClosed = false;
					} else {
						overlay.show();
						trigger.removeClass('is-closed');
						trigger.addClass('is-open');
						isClosed = true;
					}
				}

				$('[data-toggle="offcanvas"]').click(function () {
					$('#wrapper').toggleClass('toggled');
				});
            });
        </script>
		@endif

    </body>

</html>
