
@extends('template.layout')

@section('title', ' - Privacy')

@section('css')
@endsection

@section('js')
<script language="javascript"><!-- 
	$(document).ready(function() {

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
<div class="container text-content">
    <p>
		<span style="font-weight:bold;">This policy applies to all products and services that are being offered by promotionalwristband.com.
		Before reading the below statements, we encourage you to be familiar with the description of the following terms:<br><br></span>
		<span style="padding-left:20px;">"User" – individual who visit and interact with the website<br></span>
		<span style="padding-left:20px;">"Website" – <a target="_blank" href="http://promotionalwristband.com/">www. promotionalwristband.com</a><br></span>
		<span style="padding-left:20px;">"Site" – <a target="_blank" href="http://promotionalwristband.com/">www. promotionalwristband.com</a><br></span>
		
		<br><br>
		<span style="font-weight:bold;color:#008c94;">PERSONAL AND NON-PERSONAL DATA</span><br>
		Every instance that Users visited and/or interact with our website, we may collect personal and non-personal information in various ways, such as, but not limited to, Users visit the website, placed an order (via cart, phone, email or chat), fill out the form and all other features accessible on our site.
		Personal identification information may be asked from Users namely; name, phone number, email address, mailing address, billing address, credit card details.
		Technical related things, which is considered as non-personal identification information such as, but not limited to, browser name, computer type, operating system, ISP, other technical information which was used by Users as a means of connecting to the website.
		<br><br>
		<span style="font-weight:bold;color:#008c94;">USAGE OF PERSONAL AND NON-PERSONAL DATA</span><br>
		This personal and non-personal information collected from Users may be used by promotionalwristband.com for communication purposes only. This may be related to Users who have completely placed an order, wanted to place an order, or those that have the potential of ordering our products and services.
		Users may request to remove their personal information on the list, just email such request to john@promotionalwristband.com and put “REMOVE FROM LIST” as the subject of the email.
		<br><br>
		<span style="font-weight:bold;color:#008c94;">DATA PROTECTION</span><br>
		Security measures are strictly implemented to the data being collected from Users. We do not share, trade, sell or disclose Users personal information to others. Entering of data by the Users to the website happens through a secured communication channel.
		<br><br>
		<span style="font-weight:bold;color:#008c94;">CHANGING AND UPDATING PRIVACY POLICY</span><br>
		<a target="_blank" href="http://promotionalwristband.com/">promotionalwristband.com</a> has the discretion to perform changes, modifications and updates to this privacy policy at any time. Once occurred, a notification will be shown on the home page of the Site. Users acknowledge and agree their responsibility to frequently review and become aware of the any modifications or updates to this privacy policy.
		<br><br>
		<span style="font-weight:bold;color:#008c94;">USERS ACCEPTANCE OF THIS POLICY AND TERMS</span><br>
		By interacting with the Site, you, as categorized as User, signify your acceptance of this policy. If you disagree to this policy, we discourage usage or interacting with the Site. Continue to use the Site will be considered as a manifestation of your acceptance to this policy and any changes or updates occurred.
	<br>
	</p>
<a href="#" id="back-to-top" title="Back to top"><span style="fnot-weight:bold;">&#8593;</span></a>
</div>
<!----end container---->
@endsection
