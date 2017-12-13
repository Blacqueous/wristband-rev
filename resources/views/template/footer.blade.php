
<footer class="site-footer">
    <div class="container">
        <div id="footer-link-main">
            <ul class="footer-menu-item menu">
                <li><a href="{{ URL::to('/') }}">Home</a></li>
                <li><a href="{{ URL::to('/order') }}">Order Now</a></li>
                <li><a href="{{ URL::to('/price') }}">Prices</a></li>
                <li><a href="{{ URL::to('/product/printed') }}">Products</a></li>
                <li><a href="{{ URL::to('/fonts') }}">Wristband Options</a></li>
                <li><a href="{{ URL::to('/gallery') }}">Photo Gallery</a></li>
                <li><a href="{{ URL::to('/contact') }}">Contact Us</a></li>
                <div class="clearfix"></div>
            </ul>
        </div>
        <div id="footer-link-secondary">
            <ul id="menu-footer-secondary">
                <li><a href="{{ URL::to('/about') }}">About Us</a></li>
                <li><a href="{{ URL::to('/privacy') }}">Privacy</a></li>
                <li><a href="{{ URL::to('/return-policy') }}">Return Policy</a></li>
                <li><a href="{{ URL::to('/faq') }}">FAQ</a></li>
                <li><a href="{{ URL::to('/terms-and-conditions') }}">Terms and Conditions</a></li>
            </ul>
        </div>
        <div id="footer-text">
            <p>Monday - Friday | 11am - 8pm EST</p>
            <p>Customer Service 1-800-989-0440</p>
			<p><a href="https://www.facebook.com/promotionalwristbands/" target="_blank"><img width="222" height="auto" src="assets/images/fb.png" /></a>
        </div>
        <div class="clearfix"></div>
        <div class="site-info">
            <p>Copyright. All Rights Reserved &copy; <?php echo date("Y"); ?> Promotional Wristbands</p>
        <div class="clearfix"></div>
    </div>
    <script type='text/javascript' data-cfasync='false'>window.purechatApi = { l: [], t: [], on: function () { this.l.push(arguments); } }; (function () { var done = false; var script = document.createElement('script'); script.async = true; script.type = 'text/javascript'; script.src = 'https://app.purechat.com/VisitorWidget/WidgetScript'; document.getElementsByTagName('HEAD').item(0).appendChild(script); script.onreadystatechange = script.onload = function (e) { if (!done && (!this.readyState || this.readyState == 'loaded' || this.readyState == 'complete')) { var w = new PCWidget({c: 'ff40693c-72dc-4584-ae8c-da48382a8d96', f: true }); done = true; } }; })();</script>
</footer>
