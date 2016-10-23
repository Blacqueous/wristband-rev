jQuery(document).ready(function(){

	 var $style_value;
	 var $size_value;

	 $(".my_color").spectrum({
			 color: "#079665"
	 });

	//color segmented custom
	 $(".my_color1_segmented").spectrum({
			 color: "#cc33ff"
	 }); 

	 //color segmented custom
	 $(".my_color2_segmented").spectrum({
			 color: "#99ff66"
	 });

	 //change font
	 $("#fs").change(function() {
		//alert($(this).val());
		$('.changeMe').css("font-family", $(this).val());
	});

	//change font
	$("#size").change(function() {
		$('#float').css("font-size", $(this).val() + "px");
	});

	//wrist-image click
	$('.prod').click(function(){

		$('input[name="wrist_style"]', this).prop("checked",true);

		var $style_value = $(this).attr('value');

		$('[class^="table-area"]').css('display', 'none');
		$('[class^="wsize-"]').css('display', 'none');

        if($(this).attr('checked',true)){

			$('.table-area-'+$style_value+"-half").css('display','block');
			$('.wsize-'+$style_value).css('display','block');
			$('.wsize-default').css('display','none');
			$('.size_info').val('');
			$('.style_info').val($style_value);
		}


		return $style_value;
	});


	//size default click
	$('.wrist_size').click(function(){

		var $value =  $(this).attr('value');
		$('[class^="table-area-printed-"]').css('display', 'none');

        if($(this).attr('checked',true)){
			$('.table-area-printed-'+$value).css('display','block');
		}


	});


	//size printed click
	$('.wrist_size_printed').click(function(){

		var $size_value =  $(this).attr('value');
		$('[class^="table-area-printed-"]').css('display', 'none');

        if($(this).attr('checked',true)){
			$('.table-area-printed-'+$size_value).css('display','block');
			$('.size_info').val($size_value);
		}

	});

	//size debossed click
	$('.wrist_size_debossed').click(function(){

		var $size_value =  $(this).attr('value');
		$('[class^="table-area-debossed-"]').css('display', 'none');

        if($(this).attr('checked',true)){
			$('.table-area-debossed-'+$size_value).css('display','block');
			$('.size_info').val($size_value);
		}

	});

	//size ink-injected click
	$('.wrist_size_ink-injected').click(function(){

		var $size_value =  $(this).attr('value');
		$('[class^="table-area-ink-injected-"]').css('display', 'none');

        if($(this).attr('checked',true)){
			$('.table-area-ink-injected-'+$size_value).css('display','block');
		}

	});

	//size embossed click
	$('.wrist_size_embossed').click(function(){

		var $size_value =  $(this).attr('value');
		$('[class^="table-area-embossed-"]').css('display', 'none');

        if($(this).attr('checked',true)){
			$('.table-area-embossed-'+$size_value).css('display','block');
		}


	});

	//size dual layer click
	$('.wrist_size_dual-layer').click(function(){

		var $size_value =  $(this).attr('value');
		$('[class^="table-area-dual-layer-"]').css('display', 'none');

        if($(this).attr('checked',true)){
			$('.table-area-dual-layer-'+$size_value).css('display','block');
		}

	});

	//size embossed-printed click
	$('.wrist_size_embossed-printed').click(function(){

		var $size_value =  $(this).attr('value');
		$('[class^="table-area-embossed-printed-"]').css('display', 'none');

        if($(this).attr('checked',true)){
			$('.table-area-embossed-printed-'+$size_value).css('display','block');
		}

	});

	//size figured click
	$('.wrist_size_figured').click(function(){

		var $size_value =  $(this).attr('value');
		$('[class^="table-area-figured-"]').css('display', 'none');

        if($(this).attr('checked',true)){
			$('.table-area-figured-'+$size_value).css('display','block');
		}

	});

	//size blank style click
	$('.wrist_size_blank-style').click(function(){

		var $size_value =  $(this).attr('value');
		$('[class^="table-area-blank-style-"]').css('display', 'none');

        if($(this).attr('checked',true)){
			$('.table-area-blank-style-'+$size_value).css('display','block');
		}

	});

	 //preview message
	$('.band-text').keyup(function(){
		$.each($('.band-text'), function(key, obj){
			var $prev_text = $(obj).val();
			var $target = $(obj).attr('name');
			if ($prev_text!='') {
				$('#'+$target).html($prev_text);
				$('#'+$target).removeClass('faded');
			} else {
				$('#'+$target).html('Preview Text');
				$('#'+$target).addClass('faded');
			}
		});
		return false;
	});

	//view more sizes
	$(".show-content").hide();
	$(".view-more").click(function()
	  {
		$(this).next('.show-content').slideToggle(400);
	  });


	 //preview message
	$('.band-text').keyup(function(){
		$.each($('.band-text'), function(key, obj){
			var $prev_text = $(obj).val();
			var $target = $(obj).attr('name');
			if ($prev_text!='') {
				$('#'+$target).html($prev_text);
				$('#'+$target).removeClass('faded');
			} else {
				$('#'+$target).html('Preview Text');
				$('#'+$target).addClass('faded');
			}
		});
		return false;
	});
	$('.band-text').keyup().trigger;


	$('.band-color').click(function(){

		$color = $(this).attr('value');
		$('.band').css('background', $color);

		//$('.band').css('background', +$color);
	});

	/*$('[class^="qtyin-"]').on("input",function(){
		$.each($('[class^="qtyin-"]'), function(key, obj){
			var $value = $(obj).val();

			if ($value!='0' || $value!='') {
				$('#summary-order').append($value+'<br>');
			} else {
				$('#summary-order').hide($value);

			}
		});
		return false;
	});*/

});
