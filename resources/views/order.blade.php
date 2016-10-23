@include('template.header')

<div class="loader"></div>

@include('order_template')

<script>
	// Loader for order page
	$(window).load(function() {
		$(".loader").fadeOut("6000");
	});
</script>

@include('template.footer')
