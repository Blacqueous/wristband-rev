
@extends('template.layout')

@section('title', ' - Prices')

@section('css')
<style>
.sliderlanyard{
	 width:500px;
	 height:auto;
	 
 }
 
 .sliderlanyard img{
	 width:400px;
	 height:400px;
 }
 
 /* Style the tab */
div.tab {
    overflow: hidden;
    border-left: 1px solid #ccc;
    /*background-color: #f1f1f1;*/
}

/* Style the buttons inside the tab */
div.tab button {
    background-color: #fff;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 17px;
	border-right:1px solid #ccc;
	border-top:1px solid #ccc;
}

/* Change background color of buttons on hover */
div.tab button:hover {
    background-color: #ddd;
}

/* Create an active/current tablink class */
div.tab button.active {
    background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
    display: none;
    padding: 6px 12px;
	-webkit-animation: fadeEffect 2s;
    animation: fadeEffect 2s;

}

.content_box_tab {
    border: 1px solid #ccc;
    border-top: 1px solid #ccc;
    background-color: #fff;
    padding: 12px;
}


/* Fade in tabs */
@-webkit-keyframes fadeEffect {
    from {opacity: 0;}
    to {opacity: 1;}
}

@keyframes fadeEffect {
    from {opacity: 0;}
    to {opacity: 1;}
}

.table {
    width: 100%;
    max-width: 100%;
    margin-bottom: 20px;
}

.text-center {
    text-align: center;
}

.table {
    border-color: #e5e4e3;
}

.table {
    width: 100%;
    margin-bottom: 20px;
}

.content_box_tab table {
    background-color: transparent;
}
.content_box_tab table {
    border-collapse: collapse;
    border-spacing: 0;
}

.content_box_tab tr{
    border-bottom: 1px solid #e5eaf0;
}

.content_box_tab td {
    padding: 10px;
}

.content_box_tab thead {
    background: #f6f9fb;
}

.addon-item {
    text-align: center;
    padding: 5px;
}

.row-addon ul li {
    font-size: 14px;
    width: 150px;
    box-shadow: 0 0 5px 0 rgba(85,85,85,0.2);
    margin: 0 5px;
    float: left;
    height: 140px;
    background: #fff;
	list-style:none;
}

.addon-img {
    height: 95px;
    background-repeat: no-repeat;
    background-position: center;
    background-color: #ffffff;
}

.col-break {
    margin-top: 60px;
}

.section-lanyards .row-addon p {

    font-size: 18px;
    color: #202020;
    margin-left: 5px;
    margin-bottom: 10px;
}

/.mySlides {display:none}

/* Slideshow container */
.slideshow-container {
    max-width: 1000px;
    position: relative;
    margin: auto;
    background: #fff;
    padding: 10px;
    border: 1px solid #ccc;
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  height: 13px;
  width: 13px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 2s;
  animation-name: fade;
  animation-duration: 2s;
}

@-webkit-keyframes fade {
  from {opacity: .6} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .6} 
  to {opacity: 1}
}

.col-badge{
	margin-bottom:100px
}

.lanyardtext {
    line-height: 22px;
    margin: 16px 15px;
}

.section-lanyards h2 {
    color: #000;
}
</style>
@endsection

@section('js')
	<script>
		var slideIndex = 0;
		showSlides();

		function showSlides() {
			var i;
			var slides = document.getElementsByClassName("mySlides");
			var dots = document.getElementsByClassName("dot");
			for (i = 0; i < slides.length; i++) {
			   slides[i].style.display = "none";  
			}
			slideIndex++;
			if (slideIndex> slides.length) {slideIndex = 1}    
			for (i = 0; i < dots.length; i++) {
				dots[i].className = dots[i].className.replace(" active", "");
			}
			slides[slideIndex-1].style.display = "block";  
			dots[slideIndex-1].className += " active";
			setTimeout(showSlides, 2000); // Change image every 2 seconds
		}
	</script>
			
	<script>
		function openCity(evt, cityName) {
			var i, tabcontent, tablinks;
			tabcontent = document.getElementsByClassName("tabcontent");
			for (i = 0; i < tabcontent.length; i++) {
				tabcontent[i].style.display = "none";
			}
			tablinks = document.getElementsByClassName("tablinks");
			for (i = 0; i < tablinks.length; i++) {
				tablinks[i].className = tablinks[i].className.replace(" active", "");
			}
			document.getElementById(cityName).style.display = "block";
			evt.currentTarget.className += " active";
		}
	</script>
@endsection

@section('content')
<div id="main-content" class="row homecontent">
	<div class="container">
				<h1 data-fontsize="36" data-lineheight="39">Custom Lanyards</h1>
				<div>
						<p>We at wristbandcreation.com carry a large selection of plain and patterned lanyards in wide array of colors, designs, and patterns. We can do a full customization with quality which is best in class. Lanyards and badges are perfect for tradeshows, conventions and company functions. Printed or woven your own custom logos will definitely display and highlight your business or company name, government agencies such as military or schools and events that requires identity or security. Match it with your choice of a special attachment to meet your requirements such as ID ring, clips and hooks. Customized lanyards is guaranteed to provide and the most economical way to promote awareness for your brand, charity events, services, or corporate functions.</p>
				<p>To help you promote your company, wristbandcreation.com can provide you with a wide selection of lanyards in many different styles and colors according to your exact requirement. Choose your own style of lanyards, we offer Polyester, Tubular, Nylon, Woven, and Full Color lanyards. You can put your own logo on the lanyards, or choose any message and font. Choose your own color and attachments.</p>
				<p>We do offer a free virtual mock up of the finished product for a more guaranteed satisfaction before we start producing your order. So order now as we guarantee to provide you lanyards and attachments that are both of the highest standards and are reasonable and cheapest on price!</p>

				</div>
				<div class="section-lanyards">
					<div class="banner-left" style="float:left;width:518px;padding:14px;margin-right: 58px;">
						<div>
							 <h2>Woven Lanyard</h2>
								<div class="slideshow-container">
									<div class="mySlides fade">
									  <img src="{{ URL::asset('assets/lanyard/images/woven.png')}}" style="width:100%">
									</div>

									<div class="mySlides fade">
									  <img src="{{ URL::asset('assets/lanyard/images/woven-1.png')}}" style="width:100%">
									</div>

									<div class="mySlides fade">
									  <img src="{{ URL::asset('assets/lanyard/images/Woven-2.png')}}" style="width:100%">
									</div>
								</div>
								<div style="clear:both"></div>
								<br>
								<div style="text-align:center">
								  <span class="dot"></span> 
								  <span class="dot"></span> 
								  <span class="dot"></span> 
								</div>
						</div>
							<div class="lanyardtext">
								<p>The polyester lanyards is our most popular type of lanyards. We use high quality polyester, and we will imprint your message and logo on the lanyards using high quality silk screen printing. It offers a perfect balance of a good looking basic lanyard at a very reasonable price. It is very durable and comfortable to wear. We can imprint several colors on the same lanyard. This is the perfect choice for a basic text design or any basic logo with simple colors.</p>
							</div>
					</div>
					<div class="banner-right" style="float:left;width:418px;padding:14px">
						
						<div class="tab">
						  <button class="tablinks active" onclick="openCity(event, '1')">5/8 Inch</button>
						  <button class="tablinks" onclick="openCity(event, '2')">3/4 Inch</button>
						  <button class="tablinks" onclick="openCity(event, '3')">1 Inch</button>
						</div>
						<div class="content_box_tab">
							<div id="1" class="tabcontent" style="display:block">
							  <table class="table text-center">
																			<thead>
																				<tr>
																					<td>Qty</td>
																					<td>Price</td>
																				</tr>
																			</thead>
																		<tbody>
																																			<tr>
																					<td>20</td>
																					<td>$4.82</td>
																				</tr>
																																			<tr>
																					<td>50</td>
																					<td>$3.13</td>
																				</tr>
																																			<tr>
																					<td>100</td>
																					<td>$1.13</td>
																				</tr>
																																			<tr>
																					<td>150</td>
																					<td>$1.12</td>
																				</tr>
																																			<tr>
																					<td>200</td>
																					<td>$1.11</td>
																				</tr>
																																			<tr>
																					<td>250</td>
																					<td>$1.10</td>
																				</tr>
																																			<tr>
																					<td>500</td>
																					<td>$0.68</td>
																				</tr>
																																			<tr>
																					<td>1,000</td>
																					<td>$0.53</td>
																				</tr>
																																			<tr>
																					<td>2,500</td>
																					<td>$0.48</td>
																				</tr>
																																			<tr>
																					<td>3,000</td>
																					<td>$0.44</td>
																				</tr>
																																			<tr>
																					<td>5,000</td>
																					<td>$0.40</td>
																				</tr>
																			 
																		</tbody>
																	   </table>
							</div>

							<div id="2" class="tabcontent">
							  <table class="table text-center">
																			<thead>
																				<tr>
																					<td>Qty</td>
																					<td>Price</td>
																				</tr>
																			</thead>
																		<tbody>
																																			<tr>
																					<td>20</td>
																					<td>$4.82</td>
																				</tr>
																																			<tr>
																					<td>50</td>
																					<td>$3.13</td>
																				</tr>
																																			<tr>
																					<td>100</td>
																					<td>$1.14</td>
																				</tr>
																																			<tr>
																					<td>150</td>
																					<td>$1.13</td>
																				</tr>
																																			<tr>
																					<td>200</td>
																					<td>$1.12</td>
																				</tr>
																																			<tr>
																					<td>250</td>
																					<td>$1.11</td>
																				</tr>
																																			<tr>
																					<td>500</td>
																					<td>$0.69</td>
																				</tr>
																																			<tr>
																					<td>1,000</td>
																					<td>$0.54</td>
																				</tr>
																																			<tr>
																					<td>2,500</td>
																					<td>$0.49</td>
																				</tr>
																																			<tr>
																					<td>3,000</td>
																					<td>$0.43</td>
																				</tr>
																																			<tr>
																					<td>5,000</td>
																					<td>$0.41</td>
																				</tr>
																			 
																		</tbody>
																	   </table>
							</div>
							<div id="3" class="tabcontent">
							 <table class="table text-center">
																			<thead>
																				<tr>
																					<td>Qty</td>
																					<td>Price</td>
																				</tr>
																			</thead>
																		<tbody>
																																			<tr>
																					<td>20</td>
																					<td>$4.82</td>
																				</tr>
																																			<tr>
																					<td>50</td>
																					<td>$3.13</td>
																				</tr>
																																			<tr>
																					<td>100</td>
																					<td>$1.15</td>
																				</tr>
																																			<tr>
																					<td>150</td>
																					<td>$1.14</td>
																				</tr>
																																			<tr>
																					<td>200</td>
																					<td>$1.13</td>
																				</tr>
																																			<tr>
																					<td>250</td>
																					<td>$1.12</td>
																				</tr>
																																			<tr>
																					<td>500</td>
																					<td>$0.71</td>
																				</tr>
																																			<tr>
																					<td>1,000</td>
																					<td>$0.56</td>
																				</tr>
																																			<tr>
																					<td>2,500</td>
																					<td>$0.50</td>
																				</tr>
																																			<tr>
																					<td>3,000</td>
																					<td>$0.45</td>
																				</tr>
																																			<tr>
																					<td>5,000</td>
																					<td>$0.45</td>
																				</tr>
																			 
																		</tbody>
																	   </table>
							</div>
						</div>

					</div>
					<!-----End Banner Box------>
					<div style="clear:both"></div>
					<div class="row row-addon">
						<div class="col-md-12 p-0">
						
										<p>Attachment:</p>
											<ul>
												<li>
													<div class="addon-item">
														<div class="addon-img" style="background-image: url('assets/lanyard/images/addons/add-on-img1.png');"></div>
														<span>Ring</span>
													</div>
												</li>
												<li>
													<div class="addon-item">
														<div class="addon-img" style="background-image: url('assets/lanyard/images/addons/add-on-img2.png');"></div>
														<span>Lobster Claw Swivel Hook</span>
													</div>
												</li>
												<li>
													<div class="addon-item">
														<div class="addon-img" style="background-image: url('assets/lanyard/images/addons/add-on-img3.png');"></div>
														<span>Bulldog Clip</span>
													</div>
												</li>
												<li>
													<div class="addon-item">
														<div class="addon-img" style="background-image: url('assets/lanyard/images/addons/add-on-img4.png');"></div>
														<span>Oval Shape Hook</span>
													</div>
												</li>
												<li>
													<div class="addon-item">
														<div class="addon-img" style="background-image: url('assets/lanyard/images/addons/add-on-img5.png');"></div>
														<span>Metal Swivel Hook</span>
													</div>
												</li>
												<li>
													<div class="addon-item">
														<div class="addon-img" style="background-image: url('assets/lanyard/images/addons/add-on-img6.png');"></div>
														<span>Carabiner Hook</span>
													</div>
												</li>
											</ul>
											<div style="clear:both"></div>
						</div><!----End Attachment------>
						<div class="col-md-12 p-0 col-break">
										<p>Optional:</p>
											<ul>
												<li>
													<div class="addon-item">
														<div class="addon-img" style="background-image: url('assets/lanyard/images/addons/add-on-img7.png');"></div>
														<span>Flat  Plastic Breakaway</span>
													</div>
												</li>
												<li>
													<div class="addon-item">
														<div class="addon-img" style="background-image: url('assets/lanyard/images/addons/add-on-img8.png');"></div>
														<span>Plastic Buckle</span>
													</div>
												</li>
												<li>
													<div class="addon-item">
														<div class="addon-img" style="background-image: url('assets/lanyard/images/addons/add-on-img9.png');"></div>
														<span>Cell Phone Loop</span>
													</div>
												</li>
												<li>
													<div class="addon-item">
														<div class="addon-img" style="background-image: url('assets/lanyard/images/addons/add-on-img14.png');"></div>
														<span>Badge Reel</span>
													</div>
												</li>
											</ul>
											<div style="clear:both"></div>
							</div><!----End Optional------>
							<div class="col-md-12 p-0 copy-marg-top col-break col-badge">
										<p>Badge Holder:</p>
											<ul>
												<li>
													<div class="addon-item">
														<div class="addon-img" style="background-image: url('assets/lanyard/images/addons/add-on-img10.png');"></div>
														<span>3.875W x 3.25H</span>
													</div>
												</li>
												<li>
													<div class="addon-item">
														<div class="addon-img" style="background-image: url('assets/lanyard/images/addons/add-on-img11.png');"></div>
														<span>4.5W x 3.75H</span>
													</div>
												</li>
												<li>
													<div class="addon-item">
														<div class="addon-img" style="background-image: url('assets/lanyard/images/addons/add-on-img12.png');"></div>
														<span>2.5W x 4.5H</span>
													</div>
												</li>
												<li>
													<div class="addon-item">
														<div class="addon-img" style="background-image: url('assets/lanyard/images/addons/add-on-img13.png');"></div>
														<span>3W x 5H</span>
													</div>
												</li>
											</ul>
											<div style="clear:both"></div>
							</div><!----End Badge------->
					</div>
				</div>
				<!----End Lanyard Section----->
	</div>
	<!-- End Container -->
</div>
<!-- End main content -->
@endsection
