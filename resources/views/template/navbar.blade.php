
<header>
    <nav class="navbar navbar-inverse navbar-default">
		<div class="container">
			<div id="logo">
				<a class="navbar-brand" href="index"><img src="assets/images/src/prom_logo.jpg"></a>
			</div>
			<div class="header-right-box">
			<div id="google_trust">
			</div>
			<div class="search">
				  <div id="hour-img">Monday - Friday | 11am - 8pm EST</div>
				  <span class="fa fa-search">1-800-989-0440</span>
				  <p><span class="fa-text">sales@promotionalwristband.com</span></p>

			</div>
				<div class="clearfix"></div>
			</div>
				<div class="clearfix"></div>
		</div>
    </nav>

	<div class="container">
		<section class="site-primary-navigation">
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </button>
				<div class="clearfix"></div>
			</div>
			<div id="navbar" class="navbar-collapse collapse">

					<div class="primary-navigation">
						<ul id="menu-header-menu" class="menu-item menu">
							<li class="menu-item menu-item-type-post_type current-menu-item page_item"><a href="{{ URL::to('/') }}">Home</a></li>
							<li class="menu-item menu-item-type-post_type"><a href="{{ URL::to('/order') }}">Order Now!!!</a></li>
							<li class="menu-item menu-item-type-post_type"><a href="{{ URL::to('/price') }}">Prices</a></li>
							<li class="dropdown menu-item menu-item-type-post_type"><a id="prod-main" data-toggle="dropdown" class="dropdown-toggle">Products</a>
								<ul class="dropdown-menu">
									<li><a href="{{ URL::to('/product/printed') }}">Printed</a></li>
									<li><a href="{{ URL::to('/product/debossed') }}">Debossed</a></li>
									<li><a href="{{ URL::to('/product/ink-injected') }}">Ink Injected</a></li>
									<li><a href="{{ URL::to('/product/embossed') }}">Embossed</a></li>
									<li><a href="{{ URL::to('/product/dual-layer') }}">Dual Layer</a></li>
									<li><a href="{{ URL::to('/product/embossed-printed') }}">Embossed Printed</a></li>
									<li><a href="{{ URL::to('/product/figured') }}">Figured</a></li>
									<li><a href="{{ URL::to('/product/blank') }}">Blank</a></li>
								</ul>
							</li>
							<li class="dropdown menu-item menu-item menu-item-type-post_type"><a id="prod-main2" href="#" data-toggle="dropdown" class="dropdown-toggle">Wristband Options</a>
								<ul class="dropdown-menu">
									<li><a href="{{ URL::to('/fonts') }}">Fonts</a></li>
									<li><a href="{{ URL::to('/cliparts') }}">Cliparts</a></li>
									<li><a href="{{ URL::to('/colors') }}">Color Chart</a></li>
									<li><a href="{{ URL::to('/sizes') }}">Sizes</a></li>
								</ul>
							</li>
							<li class="menu-item menu-item-type-post_type"><a href="{{ URL::to('/gallery') }}">Photo Gallery</a></li>
							<li class="menu-item menu-item-type-post_type"><a href="{{ URL::to('/contact') }}">Contact Us</a></li>
							<li class="menu-item menu-item-type-post_type"><a class="live-chat" href="#">Live Chat</a>
								<!-- <script type='text/javascript' data-cfasync='false'>window.purechatApi = { l: [], t: [], on: function () { this.l.push(arguments); } }; (function () { var done = false; var script = document.createElement('script'); script.async = true; script.type = 'text/javascript'; script.src = 'https://app.purechat.com/VisitorWidget/WidgetScript'; document.getElementsByTagName('HEAD').item(0).appendChild(script); script.onreadystatechange = script.onload = function (e) { if (!done && (!this.readyState || this.readyState == 'loaded' || this.readyState == 'complete')) { var w = new PCWidget({c: 'ff8c4d2b-032b-4f3f-9c29-8411120648ad', f: true }); done = f; } }; })();</script> -->
							</li>
								<div class="clearfix"></div>
						</ul>
					</div>

			</div><!--/.navbar-collapse -->
		</section>

		<!--.Banner Slideshow -->
		 <?php
			/*$homepage = "/promotional/homepage";*/
			$homepage = "/dev/homepage";
			$currentpage = $_SERVER['REQUEST_URI'];
			if($homepage==$currentpage) {
			?>

			<div class="banner">
				<div id="slideshow">
					<div id="slider-images" style="display: block;">
						<img src="assets/images/src/banner1.jpg">
					</div>
					<div id="slider-images" style="display: none;">
						<img src="assets/images/src/banner3.jpg">
					</div>
					<div id="slider-images" style="display: none;">
						<img src="assets/images/src/banner2.jpg">
					</div>
				</div>
					<div class=""></div>
			</div>

		   <?php
				}
			?>

			<!--/.Banner Slideshow -->
			<div class="timer-area">
			<span class="text-banner">Order 100 wristbands or more & Get 100 Free Wristbands and 10 Keychains!  Time remaining: </span>
			<span id="countdown2"></span>
			<span id="order-now"><a href="{{ URL::to('/order') }}">Order Now</a></span>
			</div>
    </div>
</header>
