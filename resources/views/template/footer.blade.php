<footer class="site-footer">
        <div class="container">

           <div id="footer-link-main">
               <ul class="footer-menu-item menu">
                   <li><a href="index.php">Home</a></li>
                   <li><a href="order.php">Order Now</a></li>
                   <li><a href="price.php">Prices</a></li>
                   <li><a href="product-printed.php">Products</a></li>
                   <li><a href="fonts.php">Wristband Options</a></li>
                   <li><a href="gallery.php">Photo Gallery</a></li>
                   <li><a href="contact-us.php">Contact Us</a></li>
                   <li><a href="#">Live Chat</a></li>
                    <div class="clearfix"></div>
               </ul>
           </div>
           <div id="footer-link-secondary">
               <ul id="menu-footer-secondary">
                   <li><a href="about-us.php">About Us</a></li>
                   <li><a href="#">Our Blog</a></li>
                   <li><a href="privacy.php">Privacy</a></li>
                   <li><a href="return-policy.php">Return Policy</a></li>
                   <li><a href="faq.php">FAQ</a></li>
                   <li><a href="terms-and-conditions.php">Terms and Conditions</a></li>
               </ul>
           </div>
           <div id="footer-text">
               <p>Monday - Friday | 11am - 8pm EST</p>
               <p>Customer Service 1-800-989-0440</p>
           </div>
               <div class="clearfix"></div>

             <!-- Example row of columns -->
               <div class="site-info">
                   <p>Copyright. All Rights Reserved &copy; 2016 Promotional Wristbands</p>
               </div>
               <div class="clearfix"></div>
       </div>
     </footer>



   <!-- Bootstrap core JavaScript
   ================================================== -->
   <!-- Placed at the end of the document so the pages load faster -->

   <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>

   <!---- <script type="text/javascript" src="assets/docs/spectrum.js"></script> --->
   <script type='text/javascript' src="assets/docs/toc.js"></script>
   <script type="text/javascript" src="assets/js/jquery.countdown.js"></script>
   <script type="text/javascript" src="assets/js/jquery.magnific-popup.min.js"></script>
   <script src="assets/js/bootstrap.min.js"></script>

   <!-- Javascript for wristband previews -->
   <script type="text/javascript" src="assets/js/canvg.js"></script>
   <script type="text/javascript" src="assets/js/stackblur.js"></script>
   <script type="text/javascript" src="assets/js/preview.js"></script>
   <script type="text/javascript" src="assets/js/preview_band.js"></script>

   <script type="text/javascript" src="assets/js/promo-keychain-10.js"></script>

   <script src="assets/js/main-2.js"></script>
   <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 </body>
</html>
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
   <script language="javascript"><!--
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
   // -->
   </script>
