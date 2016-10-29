var has_preview = {};
var dynamic_font_color = "";
var default_font_color = "000000";
var qtyLimit = 0;

$(document).ready(function() {

	// // For regular wristband size
	// $('.qtyin-adult-qty').closest('div').addClass('qty-box text-center').append('<span class="fonttext-color">Text Color</span><div class="fntin fnt-qtyin-adult-qty" data-toggle="tooltip" data-placement="bottom" title="Select font color" ref-font-color="'+default_font_color+'" style="background-color:#'+default_font_color+';"></div>');
	// $('.qtyin-medium-qty').closest('div').addClass('qty-box text-center').append('<span class="fonttext-color">Text Color</span><div class="fntin fnt-qtyin-medium-qty" data-toggle="tooltip" data-placement="bottom" title="Select font color" ref-font-color="'+default_font_color+'" style="background-color:#'+default_font_color+';"></div>');
	// $('.qtyin-youth-qty').closest('div').addClass('qty-box text-center').append('<span class="fonttext-color">Text Color</span><div class="fntin fnt-qtyin-youth-qty" data-toggle="tooltip" data-placement="bottom" title="Select font color" ref-font-color="'+default_font_color+'" style="background-color:#'+default_font_color+';"></div>');
	//
	// // For regular wristband xt size
	// $('.xt-small-qty').closest('div').addClass('qty-box text-center').append('<span class="fonttext-color">Text Color</span><div class="fntin fnt-xt-small-qty" data-toggle="tooltip" data-placement="bottom" title="Select font color" ref-font-color="'+default_font_color+'" style="background-color:#'+default_font_color+';"></div>');
	// $('.xt-large-qty').closest('div').addClass('qty-box text-center').append('<span class="fonttext-color">Text Color</span><div class="fntin fnt-xt-large-qty" data-toggle="tooltip" data-placement="bottom" title="Select font color" ref-font-color="'+default_font_color+'" style="background-color:#'+default_font_color+';"></div>');
	//
	// // For large wristband size
	// $('.qtyin-adult-large-qty').closest('div').addClass('qty-box text-center').append('<span class="fonttext-color">Text Color</span><div class="fntin fnt-qtyin-adult-large-qty" data-toggle="tooltip" data-placement="bottom" title="Select font color" ref-font-color="'+default_font_color+'" style="background-color:#'+default_font_color+';"></div>');
	// $('.qtyin-medium-large-qty').closest('div').addClass('qty-box text-center').append('<span class="fonttext-color">Text Color</span><div class="fntin fnt-qtyin-medium-large-qty" data-toggle="tooltip" data-placement="bottom" title="Select font color" ref-font-color="'+default_font_color+'" style="background-color:#'+default_font_color+';"></div>');
	// $('.qtyin-youth-large-qty').closest('div').addClass('qty-box text-center').append('<span class="fonttext-color">Text Color</span><div class="fntin fnt-qtyin-youth-large-qty" data-toggle="tooltip" data-placement="bottom" title="Select font color" ref-font-color="'+default_font_color+'" style="background-color:#'+default_font_color+';"></div>');
	//
	// // For large wristband xt size
	// $('.xt-small-large-qty').closest('div').addClass('qty-box text-center').append('<div class="fntin fnt-xt-small-large-qty" data-toggle="tooltip" data-placement="bottom" title="Select font color" ref-font-color="'+default_font_color+'" style="background-color:#'+default_font_color+';"></div>');
	// $('.xt-large-large-qty').closest('div').addClass('qty-box text-center').append('<div class="fntin fnt-xt-large-large-qty" data-toggle="tooltip" data-placement="bottom" title="Select font color" ref-font-color="'+default_font_color+'" style="background-color:#'+default_font_color+';"></div>');

	// Initialize wristband price table
	get_style_size("price_table");

	// Blink
	function blink(selector) {
		$(selector).fadeOut('slow', function() {
			$(this).fadeIn('slow', function() {
				blink(this);
			});
		});
	}

	$('input[type="checkbox"]').on( 'touchstart', function(){
       $(this).prop("checked", !$(this).prop("checked"));
   });

   $('input[type="radio"]').on( 'touchstart', function(){
       $(this).prop("checked", !$(this).prop("checked"));
   });

	blink('.blink');

	// click terms
	$('.terms-popup').click(function() {
		$('#terms-conditions-popup').modal('show');
	});

	// For font color select event
	$('body').on('click', '.fntin', function(e) {
		e.preventDefault();
		e.stopPropagation();

		dynamic_font_color = $(this);
		$('#FontColorQtyModal').modal('show');
	});

	// Font-color selection per qty
	$('body').on('click', '#FontColorQtyModal ul.font-color-list li', function(e) {
		e.preventDefault();
		e.stopPropagation();

		dynamic_font_color.css('background-color', '#'+$(this).attr('refcode')).attr('ref-font-color', $(this).attr('refcode'));

		$('#FontColorQtyModal').modal('hide');
		$("#preview-pane-selection").html("");
		// $("#front-view, #back-view, #inside-view, #continue-view").attr('style', '');

		var collectionData = getTotalData();

		// For preview ------------
		$('.click-pre').show();
		if(collectionData.style === "figured") {
			$("#front-view, #back-view, #inside-view, #continue-view").addClass("set-height-fig");
			$("#front-view, #back-view, #inside-view, #continue-view").removeClass("set-height-reg");
			$(".preview-text").css("line-height", "104px");
		} else {
			$("#front-view, #back-view, #inside-view, #continue-view").addClass("set-height-reg");
			$("#front-view, #back-view, #inside-view, #continue-view").removeClass("set-height-fig");
			$(".preview-text").css("line-height", "54px");
		}
		var html_preview = "";
		// Check if has items
		if(Object.keys(collectionData.items).length > 0) {
			// Loop through all items
			$.each(collectionData.items, function(key_style, value_style) {
				$.each(value_style.data, function(key, value) {
					//if background black and font-color black
					if(value.color.join("-")=="000000" && value.font == "000000") {
						value.font = "464646";
						$("#front-view, #back-view, #inside-view, #continue-view").addClass("clipart-black");
					}
					// List all wristbands for preview
					html_preview += "<li class='blink preview-pill preview-color-" + collectionData.style + "-" + value.color.join("-") + "-font-" + value.font + "'  data-type='" + key_style + "' data-font-color='" + value.font + "' data-image-link='gd/belt.php?style=" + key_style + "&type=" + collectionData.style + "&color=" + value.color.join(",") + "' style='background-image:url(\"gd/belt.php?style=" + key_style + "&color=" + value.color.join(",") + "\");background-size:30px;background-repeat:no-repeat;background-size: 100% 100%;color:#" + value.font +";'>Y</li>";

					if(!$(".main-content-preview").hasClass("has-preview")) {
						$(".main-content-preview").addClass("has-preview");
						$("#front-view, #back-view, #continue-view, #inside-view").css('background', 'url(gd/belt.php?style=' + key_style + '&type=' + collectionData.style + '&color=' + value.color.join(",") + ')');
						$(".preview-panel").css("color", "#" + value.font);
					}
				});
			});
		} else {
			$(".main-content-preview").removeClass("has-preview");
			$("#front-view, #back-view, #inside-view, #continue-view").attr("style", "");
		}
		// Append wristbands for preview
		$("#preview-pane-selection").append(html_preview);
		// End : for preview ------------

		// Populate total section
		populateTotalSection(collectionData);
	});

	// ADD-ON EVENTS
	$("body").on("click", "div.add-ons", function(e) {
		//e.preventDefault();
		//e.stopPropagation();

		// Get order data
		var collectionData = getTotalData();

		if($(this).find("input[type='checkbox']").attr("data-code") === "key-chain") {

			if(collectionData.size !== "1/2") {
				showPopupMessage("Error", "Keychains are only available for 1/2 size.");
				return false;
			}

			if(collectionData.total_qty <= 0) {
				showPopupMessage("Error", "Please add wristband quantity first.");
				return false;
			}

			if($(this).hasClass("active")) {

				$(this).find("input[type='checkbox'].add-ons").prop("checked", false);
				$(this).removeClass("active");
				$("#convert-keychain").hide();

			} else {

				var hasKeyChain = false;
				$.each(collectionData.add_ons, function(key, value) {
					if(key === "key-chain" && hasKeyChain === false) {
						hasKeyChain = true;
					}
				});

				$("#convert-keychain").show();
				$("#convert-keychain-area-some").hide();
				$("#convert-keychain-area-all").show();
				$("#convert-keychain-input-all").prop("checked", true);
				$("#convert-keychain-input-all").trigger("change");

				$(this).find("input[type='checkbox'].add-ons").prop("checked", true);
				$(this).addClass("active");
			}

		} else {

			if($(this).find("input[type='checkbox']").attr("data-code") === "3mm-thick" && collectionData.size !== "1/2") {
				showPopupMessage("Error", "Keychains are only available for 1/2 size.");
				return false;
			}

			if($(this).hasClass("active")) {
				$(this).find("input[type='checkbox'].add-ons").prop("checked", false);
				$(this).removeClass("active");
			} else {
				$(this).find("input[type='checkbox'].add-ons").prop("checked", true);
				$(this).addClass("active");
			}
		}


		// Populate total section
		populateTotalSection(getTotalData());
	});

	// Free wristbands EVENTS
	$('body').on("change", ".free-bands", function(e) {
		e.preventDefault();
		e.stopPropagation();

        if(this.checked) {
            $(".free-convert-bands").show();
		} else{
            $(".free-convert-bands").hide();
        }

		// Get order data
		var collectionData = getTotalData();
		// Populate total section
		populateTotalSection(collectionData);
    });

	// Free keychains EVENTS
	$('body').on("change", ".free-chains", function(e) {
		e.preventDefault();
		e.stopPropagation();

        if(this.checked) {
            $(".free-convert-chains").show();
		} else{
            $(".free-convert-chains").hide();
        }

		// Get order data
		var collectionData = getTotalData();
		// Populate total section
		populateTotalSection(collectionData);
    });

	//show message
	$("#done_convert_keychain").on("click",function(e) {
		$('.js-keychain-add-ons-save').show().fadeOut(5000);
	});

	//Confirm on freewristband conversion
	$(".done-button-fwb-b").on("click",function(e) {
		e.preventDefault();
		e.stopPropagation();
		$('.js-free-bands').show().fadeOut(5000);
		// Get order data
		var collectionData = getTotalData();
		// Populate total section
		populateTotalSection(collectionData);
	});

	//Confirm on free keychain conversion
	$(".done-button-fwb").on("click",function(e) {
		e.preventDefault();
		e.stopPropagation();
		$('.js-free-chains').show().fadeOut(5000);
		// Get order data
		var collectionData = getTotalData();
		// Populate total section
		populateTotalSection(collectionData);
	});

	//Select on production and shipping option
	$('body').on('click', '.js-time-options', function(e) {
		e.preventDefault();
		e.stopPropagation();

		// Get order data
		var collectionData = getTotalData();
		// Populate total section
		populateTotalSection(collectionData);
	});

	$("body").on("blur", ".freekc", function(e) {
		e.preventDefault();
		e.stopPropagation();

		var qty = 0;

		if($(this).val().trim() == "") {
			qty = 0;
		} else {
			qty = parseInt($(this).val().trim());
		}

		if(qty < 0) {
			$(this).val("").focus();
			return;
		}

		// // Check if something actually changed
		if(qty >= 0) {
			// Get order data
			var collectionData = getTotalData();

			if(collectionData.free.keychains.qty > 10 || collectionData.free.keychains.qty < 0) {
				$('#modal-10-free-keychains').modal('show');
				$(this).val("");
				return;
			}
			// Populate total section
			populateTotalSection(collectionData);
		}
	});

	$("body").on("blur", ".freewb", function(e) {
		e.preventDefault();
		e.stopPropagation();

		var qty = 0;
		var sumQty = 0;

		if($(this).val().trim() == "") {
			qty = 0;
		} else {
			qty = parseInt($(this).val().trim());
			sumQty = qtyLimit + 100;
		}

		if(qty < 0) {
			$(this).val("").focus();
			return;
		}

		// // Check if something actually changed
		if(qty >= 0) {
			// Get order data
			var collectionData = getTotalData();

			if(collectionData.free.wristbands.qty > 100 || collectionData.free.wristbands.qty < 0) {
				$('#modal-100-free-wristbands').modal('show');
				//$('.limit-text').html('100');
				$(this).val("");
				return;
			}
			// Populate total section
			populateTotalSection(collectionData);
		}
	});

	var $style_value;
	var $size_value;

	$('#prod-main').click(function() {
		window.location = 'product-printed.php';
	});


	$('#prod-main2').click(function() {
		window.location = 'fonts.php';
	});

	// Removes file
	$("#remove-1").click(function() {
		$(".file-1").val("");
	});

	// Removes file
	$("#remove-2").click(function() {
		$(".file-2").val("");
	});

	// Removes file
	$("#remove-3").click(function() {
		$(".file-3").val("");
	});

	// Removes file
	$("#remove-4").click(function() {
		$(".file-4").val("");
	});

	// Removes file
	$("#remove-5").click(function() {
		$(".file-5").val("");
	});

	// Removes file
	$("#remove-6").click(function() {
		$(".file-6").val("");
	});

	// Change font
	$("#fs").change(function() {
		$('.changeMe').css("font-family", $(this).val());
	});

	// Change font
	$("#size").change(function() {
		$('#float').css("font-size", $(this).val() + "px");
	});

	// Change file-upload get value
	$('input[class^="file"').change(function() {
		if($(this).hasClass('file-1')){
			$(".start-fc").html("<img width='30' height='30' src='assets/images/src/upload-icon.png'/>");
		}
		else if($(this).hasClass('file-2')){
			$(".end-fc").html("<img width='30' height='30' src='assets/images/src/upload-icon.png'/>");
		}
		else if($(this).hasClass('file-3')){
			$(".back-mc").html("<img width='30' height='30' src='assets/images/src/upload-icon.png'/>");
		}
		else if($(this).hasClass('file-4')){
			$(".backend-mc").html("<img width='30' height='30' src='assets/images/src/upload-icon.png'/>");
		}
		else if($(this).hasClass('file-5')){
			$(".start-cc").html("<img width='30' height='30' src='assets/images/src/upload-icon.png'/>");
		}
		else if($(this).hasClass('file-6')){
			$(".end-cc").html("<img width='30' height='30' src='assets/images/src/upload-icon.png'/>");
		}
		else if($(this).hasClass('file-7')){
			$(".fig-fc").html("<img width='30' height='30' src='assets/images/src/upload-icon.png'/>");
		}
	});

	// Show extra band size
	$(".show-content").hide();
	$("body").on("click", ".view-more", function() {
		$(this).next('.show-content').toggle(100);
	});

	// Show front-back message selection
	$(".front-back-select").click(function() {
		$('.fb-select').css("display","block");
		$('.f-input').css("display","block");
		$('.c-input').css("display","none");
		$('.c-select').css("display","none");
		$('.cont-select').prop('checked', false)
	});

	// Show continous message selection
	$(".cont-select").click(function() {
		$('.front-back-select').prop('checked', false)
		$('.c-select').css("display","block");
		$('.fb-select').css("display","none");
		$('.f-input').css("display","none");
		$('.c-input').css("display","block");
	});

	// Show preview image
	$('body').on('click', '.preview-pill', function(e) {
		$('.preview-pill').removeClass('active');
		$('.preview-pill').removeClass('blink');
		$(this).addClass('active');

		$("#front-view").css('background', 'url(' + $(this).attr('data-image-link') + ')');
		$("#back-view").css('background', 'url(' + $(this).attr('data-image-link') + ')');
		$("#continue-view").css('background', 'url(' + $(this).attr('data-image-link') + ')');

		$("#inside-view").css('background', 'url(' + $(this).attr('data-image-link') + ')');

		if(typeof($(this).attr('data-font-color')) != "undefined"){
			$(".preview-panel").css("color", "#"+$(this).attr('data-font-color'));
		}else{
			if($("#font-color").css("display") != "none"){
				$(".preview-panel").css("color", "#"+$("#preview-textcolor").css("background-color"));
			}else{
				$(".preview-panel").css("color", "#444444");
			}
		}
	});

	// Preview message event
	$('.band-text').keyup(function() {
		$.each($('.band-text'), function(key, obj) {
			var $prev_text = $(obj).val();
			var $target = $(obj).attr('name');
			if ($prev_text!='') {
				$('#'+$target).html($prev_text);
				$('#'+$target).removeClass('faded');
			} else {
				$('#'+$target).addClass('faded');
			}
		});
		return false;
	});
	//
	// // Select wristband style event
	// $('body').on('click', '.js-style', function() {
	//
	// 	// Check if not yet checked
	// 	if(!$(this).hasClass("active")) {
	//
	// 		// Uncheck others
	// 		$(".js-style").find("input[type='radio']").prop("checked", false);
	// 		$(".js-style").removeClass("active");
	//
	// 		// Check & set as active
	// 		$(this).find("input[type='radio']").prop("checked", true);
	// 		$(this).addClass("active");
	//
	// 		//check style hide size divs
	// 		var style = $(".js-style .wrist_style:checked").val();
	//
	// 		// Show or hide custom font selector depending on selected style
	// 		if(style === "printed" || style === "ink-injected" || style === "embossed-printed" || style === "figured"){
	// 			$('.fntin').show().addClass('active');
	// 			$('.fonttext-color').show();
	// 		}else{
	// 			$('.fntin').hide().removeClass('active');
	// 			$('.fonttext-color').hide();
	// 		}
	//
	// 		// Set what kind of preview to display
	// 		if(style === "figured") {
	// 			$("#front-view, #back-view, #inside-view, #continue-view").addClass("set-height-fig");
	// 			$("#front-view, #back-view, #inside-view, #continue-view").removeClass("set-height-reg");
	// 			$(".preview-text").css("line-height", "104px");
	// 		} else {
	// 			$("#front-view, #back-view, #inside-view, #continue-view").addClass("set-height-reg");
	// 			$("#front-view, #back-view, #inside-view, #continue-view").removeClass("set-height-fig");
	// 			$(".preview-text").css("line-height", "54px");
	// 		}
	//
	// 		//Check and remove step 4 if blank style
	// 		if(style === "blank"){
	// 			$('.wrist-messsage').hide();
	// 			$('.step-5').hide();
	// 			$('.step-4').show();
	// 		}else{
	// 			$('.wrist-messsage').show();
	// 			$('.step-5').show();
	// 			$('.step-4').hide();
	// 		}
	//
	// 		// Hide all sizes first
	// 		$(".js-size").removeClass('active');
	// 		$(".wsize-default .js-size").hide();
	// 		$(".wristband-view-color").hide();
	//
	// 		// Set which sizes to display
	// 		if(style == "figured") {
	// 			// Show sizes
	// 			$("#half").show();
	// 			$("#three").show();
	// 			$("#one").show();
	// 			$(".start-fc").addClass("fig_move");
	// 			$(".end-fc").addClass("fig_move");
	// 			$(".back-mc").addClass("fig_move");
	// 			$(".backend-mc").addClass("fig_move");
	// 			$(".start-cc").addClass("fig_move");
	// 			$(".end-cc").addClass("fig_move");
	// 			$(".fig-fc").addClass("fig_move");
	// 			$(".figarea").show();
	//
	// 			// Get current checked radio button
	// 			var selected = $(".js-size:visible input[type='radio']:checked");
	// 			if(selected.length <= 0) {
	// 				selected = $(".js-size:visible:first input[type='radio']");
	// 			}
	// 			selected.closest('.js-size').addClass('active');
	// 			selected.prop("checked", true);
	//
	// 			// Get checked style
	// 			var item = $(".js-size:visible .wrist_size:checked").val();
	//
	// 			// Show items
	// 			if($.inArray(item, ["1/4", "1/2", "3/4"]) > 0) {
	// 				$(".regular-figured-size").show(); // Show regular sizes
	// 			} else {
	// 				$(".large-figured-size").show(); // Show large sizes
	// 			}
	// 		} else if(style=="dual-layer") {
	// 			// Show sizes
	// 			$("#half").show();
	// 			$("#three").show();
	// 			$(".start-fc").removeClass("fig_move");
	// 			$(".end-fc").removeClass("fig_move");
	// 			$(".back-mc").removeClass("fig_move");
	// 			$(".backend-mc").removeClass("fig_move");
	// 			$(".start-cc").removeClass("fig_move");
	// 			$(".end-cc").removeClass("fig_move");
	// 			$(".figarea").hide();
	//
	// 			// Get current checked radio button
	// 			var selected = $(".js-size:visible input[type='radio']:checked");
	// 			if(selected.length <= 0) {
	// 				selected = $(".js-size:visible:first input[type='radio']");
	// 			}
	// 			selected.closest('.js-size').addClass('active');
	// 			selected.prop("checked", true);
	//
	// 			// Get checked style
	// 			var item = $(".js-size:visible .wrist_size:checked").val();
	//
	// 			// Show items
	// 			if($.inArray(item, ["1/4", "1/2"]) > 0) {
	// 				$(".regular-dual-size").show(); // Show regular sizes
	// 			} else {
	// 				$(".large-dual-size").show(); // Show large sizes
	// 			}
	// 		} else {
	// 			// Show sizes
	// 			$("#quarter").show();
	// 			$("#half").show();
	// 			$("#three").show();
	// 			$("#one").show();
	// 			$("#onehalf").show();
	// 			$("#two").show();
	// 			$(".start-fc").removeClass("fig_move");
	// 			$(".end-fc").removeClass("fig_move");
	// 			$(".back-mc").removeClass("fig_move");
	// 			$(".backend-mc").removeClass("fig_move");
	// 			$(".start-cc").removeClass("fig_move");
	// 			$(".end-cc").removeClass("fig_move");
	// 			$(".figarea").hide();
	//
	// 			// Get current checked radio button
	// 			var selected = $(".js-size:visible input[type='radio']:checked");
	// 			if(selected.length <= 0) {
	// 				selected = $(".js-size:visible:first input[type='radio']");
	// 			}
	// 			selected.closest('.js-size').addClass('active');
	// 			selected.prop("checked", true);
	//
	// 			// Get checked style
	// 			var item = $(".js-size:visible .wrist_size:checked").val();
	//
	// 			// Show items
	// 			if($.inArray(item, ["1/2", "3/4", "1"]) > 0) {
	// 				$(".regular-color-size").show(); // Show regular sizes
	// 			}else if($.inArray(item, ["1/4"]) > 0) {
	// 				console.log(item);
	// 				$(".thin-color-size").show(); // Show thin sizes
	// 			}
	// 			else {
	// 				$(".large-color-size").show(); // Show large sizes
	// 			}
	// 		}
	//
	// 		// Empty all quantities
	// 		$(".wrist_color_container:visible").find(".js-color").find("input[name$='-qty']").val("");
	//
	// 		// Hide free
	// 		$('#dv-10-free-keychains').hide();
	// 		$('#dv-100-free-wristbands').hide();
	//
	// 		// Empty all add-ons
	// 		$("#convert-keychain").hide();
	// 		$("div.add-ons").removeClass("active");
	// 		$("div.add-ons").find("input[type='checkbox']").prop("checked", false);
	//
	// 		// Clear previews
	// 		$(".click-pre").hide();
	// 		$(".preview-panel").attr("style", "");
	// 		$(".preview-panel").find("img").remove();
	// 		$("#preview-pane-selection").html("");
	// 		$("#front-view, #back-view, #inside-view, #continue-view").attr("style", "");
	// 		$(".main-content-preview").removeClass("has-preview");
	//
	// 		// Hide total
	// 		$('.js-total').hide();
	// 		$('.js-no-total').fadeIn(300);
	//
	//
	// 		// Get new price table
	// 		get_style_size('price_table');
	// 	}
	// });
	//
	// // Select wristband size event
	// $('body').on('click', '.js-size', function() {
	//
	// 	// Check if not yet checked
	// 	if(!$(this).hasClass("active")) {
	//
	// 		// Uncheck others
	// 		$(".js-size").find("input[type='radio']").prop("checked", false);
	// 		$(".js-size").removeClass("active");
	//
	// 		// Check & set as active
	// 		$(this).find("input[type='radio']").prop("checked", true);
	// 		$(this).addClass("active");
	//
	// 		// Hide visible wristband selector
	// 		$(".wristband-view-color").hide();
	//
	// 		// Get wristband size & style
	// 		var item = $('.js-size:visible .wrist_size:checked').val();
	// 		var style = $('.js-style .wrist_style:checked').val();
	//
	// 		// Decide which wristband selector to display
	// 		if(style == "figured") {
	// 			// Show items
	// 			if($.inArray(item, ["1/4", "1/2",]) > 0) {
	// 				$(".regular-figured-size").show(); // Show regular sizes
	// 			} else {
	// 				$(".large-figured-size").show(); // Show large sizes
	// 			}
	// 		} else if(style=="dual-layer") {
	// 			// Show items
	// 			if($.inArray(item, ["1/4", "1/2"]) > 0) {
	// 				$(".regular-dual-size").show(); // Show regular sizes
	// 			} else {
	// 				$(".large-dual-size").show(); // Show large sizes
	// 			}
	// 		} else {
	//
	// 			// Show items
	// 			if($.inArray(item, [, "1/2", ,]) > 0) {
	// 				$(".regular-color-size").show(); // Show regular sizes
	// 			}else if(item == "1/4") {
	// 				$(".thin-color-size").show(); // Show thin sizes
	// 			}
	// 			else {
	// 				$(".large-color-size").show(); // Show large sizes
	// 			}
	// 		}
	//
	// 		// Empty all quantities
	// 		$(".wrist_color_container:visible").find(".js-color").find("input[name$='-qty']").val("");
	//
	// 		// Empty all add-ons
	// 		$("#convert-keychain").hide();
	// 		$("div.add-ons").removeClass("active");
	// 		$("div.add-ons").find("input[type='checkbox']").prop("checked", false);
	//
	// 		// Clear previews
	// 		$(".click-pre").hide();
	// 		$(".preview-panel").attr("style", "");
	// 		$(".preview-panel").find("img").remove();
	// 		$("#preview-pane-selection").html("");
	// 		$("#front-view, #back-view, #inside-view, #continue-view").attr("style", "");
	// 		$(".main-content-preview").removeClass("has-preview");
	//
	// 		// Hide free
	// 		$('#dv-10-free-keychains').hide();
	// 		$('#dv-100-free-wristbands').hide();
	//
	// 		// Hide total
	// 		$('.js-total').hide();
	// 		$('.js-no-total').fadeIn(300);
	//
	// 		// Get new price table
	// 		get_style_size('price_table');
	// 	}
	// });

	// Adding quantity to wristband colors. Check input values on textfield
	$('body').on('keydown, keyup', '.box-color input[name$="-qty"]', function (e) {
		// // Ensure that string has no excess 0 value on first character.
		if(this.value.length === 1 && (e.keyCode === 96 || e.keyCode === 32)) {
			$(this).val("");
		}
		// Allow: backspace, delete, tab, escape, enter and
		if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
			// Allow: Ctrl+A, Command+A
			(e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
			// Allow: home, end, left, right, down, up
			(e.keyCode >= 35 && e.keyCode <= 40)) {
			// let it happen, don't do anything
			return;
		}
		// Ensure that it is a number and stop the keypress.
		if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
			e.preventDefault();
		}
	});

	//Blur on quantity
	$('body').on('blur', '.box-color input[name$="-qty"]', function(e) {
		e.preventDefault();
		e.stopPropagation();

		if($(this).val().trim() == "") { $(this).val("0"); }

		// Check if something actually changed
		if($(this).val().trim() != "") {

			$(".area-conversion-list").html("");
			$("#preview-pane-selection").html("");
			// $("#front-view, #back-view, #inside-view, #continue-view").attr('style', '');

			// Get order data
			var collectionData = getTotalData();

			// For preview ------------
			$('.click-pre').show();
			if(collectionData.style === "figured") {
				$("#front-view, #back-view, #inside-view, #continue-view").addClass("set-height-fig");
				$("#front-view, #back-view, #inside-view, #continue-view").removeClass("set-height-reg");
				$(".preview-text").css("line-height", "104px");
			} else {
				$("#front-view, #back-view, #inside-view, #continue-view").addClass("set-height-reg");
				$("#front-view, #back-view, #inside-view, #continue-view").removeClass("set-height-fig");
				$(".preview-text").css("line-height", "54px");
			}
			var html_preview = "";
			var html_kc_free = "";
			var html_wb_free = "";
			var html_ao_kc = "";
			// Check if has items
			if(Object.keys(collectionData.items).length > 0) {
				// Loop through all items
				$.each(collectionData.items, function(key_style, value_style) {
					$.each(value_style.data, function(key, value) {
						//if background black and font-color black
						if(value.color.join("-")=="000000" && value.font == "000000") {
							value.font = "464646";
							$("#front-view, #back-view, #inside-view, #continue-view").addClass("clipart-black");
						}
						// List all wristbands for preview
						html_preview += "<li class='blink preview-pill preview-color-" + collectionData.style + "-" + value.color.join("-") + "-font-" + value.font + "'  data-type='" + key_style + "' data-font-color='" + value.font + "' data-image-link='gd/belt.php?style=" + key_style + "&type=" + collectionData.style + "&color=" + value.color.join(",") + "' style='background-image:url(\"gd/belt.php?style=" + key_style + "&color=" + value.color.join(",") + "\");background-size:30px;background-repeat:no-repeat;background-size: 100% 100%;color:#" + value.font +";'>Y</li>";

						// Check if already has a preview
						if(!$(".main-content-preview").hasClass("has-preview")) {
							$(".main-content-preview").addClass("has-preview");
							$("#front-view, #back-view, #continue-view, #inside-view").css('background', 'url(gd/belt.php?style=' + key_style + '&type=' + collectionData.style + '&color=' + value.color.join(",") + ')');
							$(".preview-panel").css("color", "#" + value.font);
						}

						//Global Limit
						qtyLimit = collectionData.total_qty;

						// For free wristbands
						if(collectionData.total_qty >= 100) {
							if(!$('.conversion-wrist-' + key_style + '.free-wrist-' + key_style + '-' + value.size + '-' + value.color.join("-") ).length > 0) {
								// For free wristbands
								html_wb_free += '<li class="fwb-list conversion-wrist-'+key_style+' free-wrist-'+key_style+'-'+value.size+'-'+value.name+'" data-band-color="' + value.color.join("-") + '">';
								html_wb_free += '<div class="fwb-text col-md-6 col-sm-12">';
									html_wb_free += '<div class="col-xs-4 fwb-text-content">'+key_style.toUpperCase()+'</div>';
									html_wb_free += '<div class="col-xs-4 fwb-text-content">'+value.name.toLowerCase().capitalizeFirstLetter()+'</div>';
									html_wb_free += '<div class="col-xs-4 fwb-text-content">'+value.size.toLowerCase().capitalizeFirstLetter()+'</div>';
								html_wb_free += '</div>';
								html_wb_free += '<div class="align-right col-md-6 col-sm-12"><h4 class="fwb-text col-xs-12 hidden-md hidden-lg text-center fwb-text-hidden-header">INPUT QUANTITY</h4><input type="number" class="freewb col-xs-12" id="freewb-'+key_style+'-'+value.size+'-'+value.color.join("-")+'" name="'+key_style+'-'+value.size+'-'+value.color.join("-")+'-fwb" data-style="'+key_style+'" data-color="'+value.color.join(",")+'" data-font-color="'+value.font+'" data-name="'+value.name+'" data-size="'+value.size+'" placeholder="0" data-maxlength="3" /></div>';
								html_wb_free += '<div class="clearfix"></div>';
								html_wb_free += '</li>';
								// For free keychains
								html_kc_free += '<li class="fwb-list conversion-wrist-'+key_style+' free-wrist-'+key_style+'-'+value.size+'-'+value.name+'" data-band-color="' + value.color.join("-") + '">';
								html_kc_free += '<div class="fwb-text col-md-6 col-sm-12">';
									html_kc_free += '<div class="col-xs-4 fwb-text-content">'+key_style.toUpperCase()+'</div>';
									html_kc_free += '<div class="col-xs-4 fwb-text-content">'+value.name.toLowerCase().capitalizeFirstLetter()+'</div>';
									html_kc_free += '<div class="col-xs-4 fwb-text-content">'+value.size.toLowerCase().capitalizeFirstLetter()+'</div>';
								html_kc_free += '</div>';
								html_kc_free += '<div class="align-right col-md-6 col-sm-12"><h4 class="fwb-text col-xs-12 hidden-md hidden-lg text-center fwb-text-hidden-header">INPUT QUANTITY</h4><input type="number" class="freekc col-xs-12" id="freekc-'+key_style+'-'+value.size+'-'+value.color.join("-")+'" name="'+key_style+'-'+value.size+'-'+value.color.join("-")+'-fwb" data-style="'+key_style+'" data-color="'+value.color.join(",")+'" data-font-color="'+value.font+'" data-name="'+value.name+'" data-size="'+value.size+'" placeholder="0" data-maxlength="3" /></div>';
								html_kc_free += '<div class="clearfix"></div>';
								html_kc_free += '</li>';
							}
						}

						// For wristbands convertion
						html_ao_kc += '<li class="fwb-list convert-keychain-some-'+key_style+' convert-keychain-some-'+key_style+'-'+value.size+'-'+value.name+'" data-band-color="' + value.color.join("-") + '">';
						html_ao_kc += '<div class="fwb-text col-md-6 col-sm-12">';
							html_ao_kc += '<div class="col-xs-4 fwb-text-content">'+key_style.toUpperCase()+'</div>';
							html_ao_kc += '<div class="col-xs-4 fwb-text-content">'+value.name.toLowerCase().capitalizeFirstLetter()+'</div>';
							html_ao_kc += '<div class="col-xs-4 fwb-text-content">'+value.size.toLowerCase().capitalizeFirstLetter()+'</div>';
						html_ao_kc += '</div>';
						html_ao_kc += '<div class="align-right col-md-6 col-sm-12"><h4 class="fwb-text col-xs-12 hidden-md hidden-lg text-center fwb-text-hidden-header">INPUT QUANTITY</h4><input type="number" class="col-xs-12 kc-some-qty" id="convert-keychain-some-'+key_style+'-'+value.size+'-'+value.color.join("-")+'" name="'+key_style+'-'+value.size+'-'+value.color.join("-")+'-fwb" data-style="'+key_style+'" data-color="'+value.color.join(",")+'" data-font-color="'+value.font+'" data-name="'+value.name+'" data-size="'+value.size+'" placeholder="0" data-maxlength="3" /></div>';
						html_ao_kc += '<div class="clearfix"></div>';
						html_ao_kc += '</li>';
					});
				});
			} else {
				$(".main-content-preview").removeClass("has-preview");
				$("#front-view, #back-view, #inside-view, #continue-view").attr("style", "");
			}

			// Append wristbands for preview
			$("#preview-pane-selection").html(html_preview); // End : for preview ------------

			// Free wristbands
			$(".area-conversion-chains").html(html_kc_free);
			$(".area-conversion-bands").html(html_wb_free);

			// Add-on keychain convertion ALL
			var sumQty = collectionData.total_qty + 100;
			$("#convert-keychain-area-all-qty").html(sumQty);
			// Add-on keychain convertion SOME
			$("#convert-keychain-some-list").html(html_ao_kc);

			// Get proper total qty
			$.ajax({
				type: 'POST',
				url: 'queryDB.php',
				data: {'action':'get_prices', 'style':collectionData.style, 'size':collectionData.size, 'qty':collectionData.total_qty},
				beforeSend: function() {
					$('.js-total').hide();
					$('.js-no-total').fadeIn(300);
				},
				success: function(data) {
					data = $.parseJSON(data);
					var htmlProd, htmlShip = '';

					// List all production price/day data
					$.each(data.production, function(key, value) {
						htmlProd += "<option value='" + value.days + "' data-price='" + value.price + "'>Standard Production - " + value.days + " Days (+$" + value.price + ")</option>";
					});
					$("#ProductionTime").html(htmlProd);

					// List all shipping price/day data
					$.each(data.shipping, function(key, value) {
						htmlShip += "<option value='" + value.days + "' data-price='" + value.price + "'>Standard Shipping - " + value.days + " Days (+$" + value.price + ")</option>";
					});
					$("#ShippingTime").html(htmlShip);

					// Get selected production settings
					var $p_days = $("#ProductionTime option:selected").val();
						$p_days = ($p_days != "" && !isNaN(parseInt($p_days))) ? parseInt($p_days) : 0;
					var $p_price = $("#ProductionTime option:selected").attr("data-price");
						$p_price = ($p_price != "" && !isNaN(parseFloat($p_price))) ? parseFloat($p_price) : 0;

					// Set values
					collectionData.production_days = $p_days;
					collectionData.production_price = $p_price;

					// Get selected shipping settings
					var $s_days = $("#ShippingTime option:selected").val();
						$s_days = ($s_days != "" && !isNaN(parseInt($s_days))) ? parseInt($s_days) : 0;
					var $s_price = $("#ShippingTime option:selected").attr("data-price");
						$s_price = ($s_price != "" && !isNaN(parseFloat($s_price))) ? parseFloat($s_price) : 0;

					// Set values
					collectionData.shipping_days = $s_days;
					collectionData.shipping_price = $s_price;

					// Compute new total
					var new_total = 0;
					// Add production & shipping prices
					new_total += ($p_price + $s_price);
					// Add item prices
					$.each(collectionData.items, function(key, value) {
						new_total += parseFloat(value.total);
					});
					// Add item prices
					$.each(collectionData.add_ons, function(key, value) {
						new_total += parseFloat(value.total);
					});

					// Set new overall total price
					collectionData.total_price = new_total;

					// Populate total section
					populateTotalSection(collectionData);
				}
			});
		}
	});

	// Colorpicker
	$('.pick-color-list li').click(function(){
		var color = $(this).attr('refcode');
		var p = $(this).parent('.pick-color-list').prev('.box-opt-color');
		var num = p.find('input[type="text"]').length;
		var pick = $(this);
		var limit = $(this).parent('.pick-color-list').find('li.active').length;
		var box = $(this).parents('.box-color');

		if(!pick.hasClass('active') && limit < num) {
			var f = p.find('li:not(.active)').eq(0);
			pick.addClass('active');
			pick.addClass('select-box-col');
			f.find('input').val(color);
			f.addClass('active').css('border-color', '#'+color);
			f.attr('refcode', color);

			if(num == 1) {
				box.find('input[type="number"]').attr('ref', color);
			}
			if(num > 1) {
				var colors = [];
				p.find('li.active').each(function(){
					var c = $(this).attr('refcode');
					colors.push(c);
				});
				box.find('input[type="number"]').attr('ref', colors.join(','));
			}
		}
		else {
			pick.removeClass('active');
			pick.removeClass('select-box-col');
			var f = p.find('li[refcode="'+color+'"]');
			f.removeClass('active');
			f.removeAttr('refcode');
			f.removeAttr('style');
			f.find('input').val('');
		}
	});

	//font-color selection
	$('#FontColorModal ul.font-color-list li').click(function(){
		var textcolor = $(this).attr('refcode');
		console.log(textcolor);
		if(textcolor != undefined || textcolor != '');{
			$(".preview-panel").css("color", "#"+textcolor);
			$("#preview-textcolor").css("background-color", "#"+textcolor);
			$("#FontColorModal").modal('toggle');
		}
	});

	//font-style selection
	$('.font-style-list li').click(function(){
		var text = $(this).attr('name');
		var img = $(this).attr('ref');

		if(text != undefined);{
			$(".preview-panel").css("font-family", text);
			$("#preview-textfont").html("<img src='assets/images/src/fonts/"+img+"'/>");
			$("#FontModal").modal('toggle');
		}
	});

	//start front message clipart
	$('.fclip-1').click(function(){
		$(".clip-color-list li").addClass('sfm-art');
	});

	// solid done button click
	// $('.done-b').click(function(){
	$('body').on('click', '.done-b', function() {

		if($.trim($(this).closest('.box-opt-color').find('#solid-color-0').val()) == ''){
			alert('You need to choose a color');
		}else{
			var color = [ $(this).closest('.box-opt-color').find('.solid-color-0').val() ];
			var style = $('.js-style .wrist_style:checked').val();

			if(style!=='figured') {
				$(".PreviewColorModal").attr('src', generatePreviewBandImage('solid', color, style));
			} else {
				$(".PreviewFigColorModal").attr('src', generatePreviewBandImage('solid', color, style));
			}

			// $("#ColorModal").modal('hide');
			$(this).closest('.modal').modal('hide');
		}
	});

	//solid dynamic done button click
	$('body').on('click', '.dynamic-done-b', function() {
		if($.trim($(this).closest('.box-opt-color').find('.dynamic-solid-color').val()) == ''){
			alert('You need to choose a color');
		}else{
			var imgID = ".Preview" + $(this).closest('.modal').attr("id");
			var color = [ $(this).closest('.box-opt-color').find('.solid-color-0').val() ];
			var style = $('.js-style .wrist_style:checked').val();

			$(imgID).attr('src', generatePreviewBandImage('solid', color, style));

			$(this).closest('.modal').modal('hide');
		}
	});

	//segmented done button click
	$('body').on('click', '.done-s', function() {
		if($.trim($(this).closest('.box-opt-color').find('#segmented-color-0').val()) == ''){
			alert('You need to choose colors');
		}else{
			var color = [ 	$(this).closest('.box-opt-color').find('.segmented-color-0').val(),
							$(this).closest('.box-opt-color').find('.segmented-color-1').val(),
							$(this).closest('.box-opt-color').find('.segmented-color-2').val(),
							$(this).closest('.box-opt-color').find('.segmented-color-3').val(),
							$(this).closest('.box-opt-color').find('.segmented-color-4').val(),
							$(this).closest('.box-opt-color').find('.segmented-color-5').val() ];
				color = color.filter(Boolean);
			var style = $('.js-style .wrist_style:checked').val();

			if(style!=='figured') {
				$(".segPreviewColorModal").attr('src', generatePreviewBandImage('segmented', color, style));
			} else {
				$(".segPreviewFigColorModal").attr('src', generatePreviewBandImage('segmented', color, style));
			}

			// $("#ColorSegModal").modal('toggle');
			$(this).closest('.modal').modal('hide');
		}
	});

	//segmented dynamic done button click
	$('body').on('click', '.dynamic-done-s', function() {
		if($.trim($(this).closest('.box-opt-color').find('.dynamic-segmented-color').val()) == ''){
			alert('You need to choose colors');
		}else{
			var imgID = ".Preview" + $(this).closest('.modal').attr("id");
			var color = [ 	$(this).closest('.box-opt-color').find('.segmented-color-0').val(),
							$(this).closest('.box-opt-color').find('.segmented-color-1').val(),
							$(this).closest('.box-opt-color').find('.segmented-color-2').val(),
							$(this).closest('.box-opt-color').find('.segmented-color-3').val(),
							$(this).closest('.box-opt-color').find('.segmented-color-4').val(),
							$(this).closest('.box-opt-color').find('.segmented-color-5').val() ];
				color = color.filter(Boolean);
			var style = $('.js-style .wrist_style:checked').val();

			$(imgID).attr('src', generatePreviewBandImage('segmented', color, style));

			$(this).closest('.modal').modal('hide');
		}
	});

	//dual done button click
	$('body').on('click', '.done-d', function() {
		if($.trim($(this).closest('.box-opt-color').find('#dual-color-0').val()) == ''){
			alert('You need to choose colors');
		}else{
			var color = [ 	$(this).closest('.box-opt-color').find('.dual-color-0').val(),
							$(this).closest('.box-opt-color').find('.dual-color-1').val() ];
			color = color.filter(Boolean);
			var style = $('.js-style .wrist_style:checked').val();

			// $(".dualPreviewColorModal").attr('src', generatePreviewBandImage('dual', color));
			$(this).closest('.box-color').find(".dualPreviewColorModal").attr('src', generatePreviewBandImage('dual', color, style));

			$("#ColorDualModal").modal('toggle');
			$(this).closest('.modal').modal('hide');
		}
	});

	//dual dynamic done button click
	$('body').on('click', '.dynamic-done-d', function() {
		if($.trim($(this).closest('.box-opt-color').find('.dynamic-dual-color').val()) == ''){
			alert('You need to choose colors');
		}else{
			var imgID = ".Preview" + $(this).closest('.modal').attr("id");
			var color = [ 	$(this).closest('.box-opt-color').find('.dynamic-dual-color-0').val(),
							$(this).closest('.box-opt-color').find('.dynamic-dual-color-1').val() ];
				color = color.filter(Boolean);
			var style = $('.js-style .wrist_style:checked').val();

			$(imgID).attr('src', generatePreviewBandImage('dual', color, style));

			$(this).closest('.modal').modal('hide');
		}
	});

	//swirl done button click
	$('body').on('click', '.done-sw', function() {
		if($.trim($(this).closest('.box-opt-color').find('#swirl-color-0').val()) == ''){
			alert('You need to choose colors');
		}else{
			var color = [ 	$(this).closest('.box-opt-color').find('.swirl-color-0').val(),
							$(this).closest('.box-opt-color').find('.swirl-color-1').val(),
							$(this).closest('.box-opt-color').find('.swirl-color-2').val() ];
				color = color.filter(Boolean);
			var style = $('.js-style .wrist_style:checked').val();

			if(style!=='figured') {
				$(".swlPreviewColorModal").attr('src', generatePreviewBandImage('swirls', color, style));
			} else {
				$(".swlPreviewFigColorModal").attr('src', generatePreviewBandImage('swirls', color, style));
			}

			// $("#ColorSwirlModal").modal('hide');
			$(this).closest('.modal').modal('hide');
		}
	});

	//swirl done button click
	$('body').on('click', '.dynamic-done-sw', function() {
		if($.trim($(this).closest('.box-opt-color').find('.dynamic-swirl-color').val()) == ''){
			alert('You need to choose colors');
		}else{
			var imgID = ".Preview" + $(this).closest('.modal').attr("id");
			var color = [ 	$(this).closest('.box-opt-color').find('.swirl-color-0').val(),
							$(this).closest('.box-opt-color').find('.swirl-color-1').val(),
							$(this).closest('.box-opt-color').find('.swirl-color-2').val() ];
				color = color.filter(Boolean);
			var style = $('.js-style .wrist_style:checked').val();

			$(imgID).attr('src', generatePreviewBandImage('swirls', color, style));

			$(this).closest('.modal').modal('hide');
		}
	});

	//front message clipart button -------------------
	$('.fclip-1').click(function(){
			$(".clip-color-list li a").addClass('fsc');
			$(".clip-color-list li a").removeClass('fec');
			$(".clip-color-list li a").removeClass('bec');
			$(".clip-color-list li a").removeClass('bsc');
			$(".clip-color-list li a").removeClass('ces');
			$(".clip-color-list li a").removeClass('ccs');
	});

	$('.fclip-2').click(function(){
			$(".clip-color-list li a").addClass('fec');
			$(".clip-color-list li a").removeClass('fsc');
			$(".clip-color-list li a").removeClass('bec');
			$(".clip-color-list li a").removeClass('bsc');
			 $(".clip-color-list li a").removeClass('ces');
			$(".clip-color-list li a").removeClass('ccs');
	});
	//front message clipart button end here -----------

	//back message clipart button ---------------------
	$('.bclip-1').click(function(){
			$(".clip-color-list li a").addClass('bsc');
			$(".clip-color-list li a").removeClass('fsc');
			$(".clip-color-list li a").removeClass('fec');
			$(".clip-color-list li a").removeClass('bec');
		    $(".clip-color-list li a").removeClass('ces');
			$(".clip-color-list li a").removeClass('ccs');
			$(".clip-color-list li a").removeClass('figc');
	});

	$('.bclip-2').click(function(){
			$(".clip-color-list li a").addClass('bec');
			$(".clip-color-list li a").removeClass('fsc');
			$(".clip-color-list li a").removeClass('fec');
			$(".clip-color-list li a").removeClass('bsc');
			$(".clip-color-list li a").removeClass('ces');
			$(".clip-color-list li a").removeClass('ccs');
			$(".clip-color-list li a").removeClass('figc');
	});
	//back message clipart button end here --------------

	//continous message clipart button ---------------------
	$('.cclip-1').click(function(){
			$(".clip-color-list li a").addClass('ccs');
			$(".clip-color-list li a").removeClass('fsc');
			$(".clip-color-list li a").removeClass('fec');
			$(".clip-color-list li a").removeClass('bsc');
			$(".clip-color-list li a").removeClass('bec');
			$(".clip-color-list li a").removeClass('ces');
			$(".clip-color-list li a").removeClass('figc');
	});

	$('.cclip-2').click(function(){
			$(".clip-color-list li a").addClass('ces');
			$(".clip-color-list li a").removeClass('fsc');
			$(".clip-color-list li a").removeClass('fec');
			$(".clip-color-list li a").removeClass('bsc');
			$(".clip-color-list li a").removeClass('bec');
			$(".clip-color-list li a").removeClass('ccs');
			$(".clip-color-list li a").removeClass('figc');
	});
	//continous message clipart button end here --------------

	//figured center clipart button -------------------
	$('.fclip-3').click(function(){
			$(".clip-color-list li a").addClass('figc');
			$(".clip-color-list li a").removeClass('fsc');
			$(".clip-color-list li a").removeClass('fec');
			$(".clip-color-list li a").removeClass('bec');
			$(".clip-color-list li a").removeClass('bsc');
			$(".clip-color-list li a").removeClass('ces');
			$(".clip-color-list li a").removeClass('ccs');
	});

	//clipart front message button ------
	$('.clip-color-list li a').click(function(){
		var img = $(this).attr('ref');

		if(img!="none.jpg"){
			if($( ".clip-color-list li a" ).hasClass( "fsc" )){
				$(".start-fc").html("<img width='34' height='30' src='assets/images/src/clipart/"+img+"'/>");
			}
			else if($( ".clip-color-list li a" ).hasClass( "fec" )){
				$(".end-fc").html("<img width='34' height='30' src='assets/images/src/clipart/"+img+"'/>");
			}
			else if($( ".clip-color-list li a" ).hasClass( "bsc" )){
				$(".back-mc").html("<img width='34' height='30' src='assets/images/src/clipart/"+img+"'/>");
			}
			else if($( ".clip-color-list li a" ).hasClass( "bec" )){
				$(".backend-mc").html("<img width='34' height='30' src='assets/images/src/clipart/"+img+"'/>");
			}
			else if($( ".clip-color-list li a" ).hasClass( "ccs" )){
				$(".start-cc").html("<img width='34' height='30' src='assets/images/src/clipart/"+img+"'/>");
			}
			else if($( ".clip-color-list li a" ).hasClass( "figc" )){
				$(".fig-fc").html("<img width='34' height='34' src='assets/images/src/clipart/"+img+"'/>");
			}
			else{
				$(".end-cc").html("<img width='34' height='34' src='assets/images/src/clipart/"+img+"'/>");
			}

		}
		else{

			if($( ".clip-color-list li a" ).hasClass( "fsc" )){
				$( ".start-fc" ).find("img").remove();
			}
			else if($( ".clip-color-list li a" ).hasClass( "fec" )){
				$(".end-fc").find("img").remove();
			}
			else if($( ".clip-color-list li a" ).hasClass( "bsc" )){
				$(".back-mc").find("img").remove();
			}
			else if($( ".clip-color-list li a" ).hasClass( "bec" )){
				$(".backend-mc").find("img").remove();
			}
			else if($( ".clip-color-list li a" ).hasClass( "ccs" )){
				$(".start-cc").find("img").remove();
			}
			else if($( ".clip-color-list li a" ).hasClass( "figc" )){
				$(".fig-fc").find("img").remove();
			}
			else{
				$(".end-cc").find("img").remove();
			}

		 }

		$("#ClipArtModal").modal('toggle');
	});

	// Event for keychain convertion
	$("body").on("change", ".convert-keychain-input", function(e) {
		e.preventDefault();
		e.stopPropagation();

		// Get order data
		var collectionData = getTotalData();

		$(".convert-keychain-area").hide();
		$("#convert-keychain-area-"+$(this).val()).show();

		// Check and set proper values
		if($(this).val() === "all") {
			// Show keychain quantity (all)
			$("#convert-keychain-area-some").hide();
			$("#convert-keychain-area-all").show();
			// Set qty

			var sumQty = collectionData.total_qty + 100;
			$("#convert-keychain-area-all-qty").html(sumQty);
		} else {
			// Show keychain quantity (some)
			$("#convert-keychain-area-all").hide();
			$("#convert-keychain-area-some").show();
			// Set variable
			var html_kc = "";
			// Loop through all items
			$.each(collectionData.items, function(key_style, value_style) {
				$.each(value_style.data, function(key, value) {
					// For free wristbands
					html_kc += '<li class="fwb-list convert-keychain-some-'+key_style+' convert-keychain-some-'+key_style+'-'+value.size+'-'+value.name+'" data-band-color="' + value.color.join("-") + '">';
					html_kc += '<div class="fwb-text col-md-6 col-sm-12">';
						html_kc += '<div class="col-xs-4 fwb-text-content">'+key_style.toUpperCase()+'</div>';
						html_kc += '<div class="col-xs-4 fwb-text-content">'+value.name.toLowerCase().capitalizeFirstLetter()+'</div>';
						html_kc += '<div class="col-xs-4 fwb-text-content">'+value.size.toLowerCase().capitalizeFirstLetter()+'</div>';
					html_kc += '</div>';
					html_kc += '<div class="align-right col-md-6 col-sm-12"><h4 class="fwb-text col-xs-12 hidden-md hidden-lg text-center fwb-text-hidden-header">INPUT QUANTITY</h4><input type="number" class="col-xs-12 kc-some-qty" id="convert-keychain-some-'+key_style+'-'+value.size+'-'+value.color.join("-")+'" name="'+key_style+'-'+value.size+'-'+value.color.join("-")+'-fwb" data-style="'+key_style+'" data-color="'+value.color.join(",")+'" data-font-color="'+value.font+'" data-name="'+value.name+'" data-size="'+value.size+'" placeholder="0" data-maxlength="3" /></div>';
					html_kc += '<div class="clearfix"></div>';
					html_kc += '</li>';
				});
			});
			// Set keychain
			$("#convert-keychain-some-list").html(html_kc);
		}

		// Populate total section
		populateTotalSection(getTotalData());
	});

	$("body").on("blur", "input.kc-some-qty", function(e) {
		// Compute total
		var _kcQty = 0;
		// Get order data
		var collectionData = getTotalData();
		$("input.kc-some-qty").each(function() {
			_kcQty += ($(this).val().trim() != "") ? parseInt($(this).val()) : 0;
		});

		var sumQty = collectionData.total_qty + 100;
		// Check
		if(_kcQty > sumQty) {
			showPopupMessage("Error", "Keychains must not be greater than the total wristband quantity.");
			$(this).val("").focus();
			// return false;
		}
		// Populate total section
		populateTotalSection(getTotalData());
	});

	// Submit `order` form
	$("body").on("click", "#submitOrder", function(e) {
		e.preventDefault();
		e.stopPropagation();

		// Get order data
		var collectionData = getTotalData();

		var $form_data = new FormData();
		$form_data.append('file-1', $("input[type='file'].file-1")[0].files[0]);
		$form_data.append('file-2', $("input[type='file'].file-2")[0].files[0]);
		$form_data.append('file-3', $("input[type='file'].file-3")[0].files[0]);
		$form_data.append('file-4', $("input[type='file'].file-4")[0].files[0]);
		$form_data.append('file-5', $("input[type='file'].file-5")[0].files[0]);
		$form_data.append('file-6', $("input[type='file'].file-6")[0].files[0]);
		$form_data.append('data', JSON.stringify(collectionData));
		$form_data.append('action', 'add');

		// console.log(collectionData);

		jQuery.ajax({
			url: 'controller_cart.php',
			data: $form_data,
			cache: false,
			contentType: false,
			processData: false,
			type: 'POST',
			async: true,
			success: function(data){ }
		}).done(function(data) {
			data = JSON.parse(data);

			if(data.status === true) {
				showPopupMessage("Success", data.message);
				$('html,body').scrollTop(0);
				$(".js-style").trigger("click");
			} else {
				showPopupMessage("Error", data.message);
			}
		});

	});

	$("body").on("click", ".removeCart", function(e) {
		jQuery.ajax({
			url: 'controller_cart.php',
			data: { index: $(this).attr("data-index"), action: "del" },
			type: 'POST',
			async: true,
			success: function(data){ }
		}).done(function(data) {
			data = JSON.parse(data);

			if(data.status === true) {
				showPopupMessage("Success", data.message);
				setTimeout(function(){ location.reload(); }, 3000);
			} else {
				showPopupMessage("Error", data.message);
			}
		});
	});

	// Submit email form
	$("body").on("click", "#submitEmail", function(e) {
		e.preventDefault();
		e.stopPropagation();

		// Fill submit type
		$("#submit_order_type").val($(this).attr("data-submit-type"));
		// Clear fields
		$("#submit_order_email").val("");
		$("#submit_order_fullname").val("").focus();
		// Make sure fields are enabled
		$("#submit_order_fullname, #submit_order_email").prop("disabled", false);
		// Display buttons
		$("#modal-confirm-submit .confirm-footer-buttons").show();
		$("#modal-confirm-submit .confirm-footer-loader").hide();
		// Display confirmation popup modal
		$("#modal-confirm-submit").modal("show");
	});

	// Actually submit email order
	$("body").on("submit", "#form-submit-email", function(e) {
		e.preventDefault();
		e.stopPropagation();

		// Check if all fields has value
		if($("#submit_order_type").val().length > 0 && $("#submit_order_fullname").val().length > 0 && $("#submit_order_email").val().length > 0) {

			// Get order data
			var collectionData = getTotalData();

			var $form_data = new FormData();
			$form_data.append('file-1', $("input[type='file'].file-1")[0].files[0]);
			$form_data.append('file-2', $("input[type='file'].file-2")[0].files[0]);
			$form_data.append('file-3', $("input[type='file'].file-3")[0].files[0]);
			$form_data.append('file-4', $("input[type='file'].file-4")[0].files[0]);
			$form_data.append('file-5', $("input[type='file'].file-5")[0].files[0]);
			$form_data.append('file-6', $("input[type='file'].file-6")[0].files[0]);
			$form_data.append('data', JSON.stringify(collectionData));
			$form_data.append('type', $("#submit_order_type").val());
			$form_data.append('name', $("#submit_order_fullname").val());
			$form_data.append('mail', $("#submit_order_email").val());

			jQuery.ajax({
				url: 'send_email.php',
				type: 'POST',
				data: $form_data,
				cache: false,
				contentType: false,
				processData: false,
				beforeSend: function() {
					$("#submit_order_fullname, #submit_order_email").prop("disabled", true);
					$("#modal-confirm-submit .confirm-footer-buttons").hide();
					$("#modal-confirm-submit .confirm-footer-loader").show();
				},
				success: function(data) {},
			}).done(function(data) {
				data = JSON.parse(data);

				if(data.status === true) {
					// Hide confirmation popup modal
					$("#modal-confirm-submit").modal("hide");
					//Default triggers
					showPopupMessage("Success", data.message);
					$('html,body').scrollTop(0);
					// Reset order page
					resetOrderPage();
				} else {
					showPopupMessage("Error", data.message);
				}

				// Make sure fields are enabled
				$("#submit_order_fullname, #submit_order_email").prop("disabled", false);
				// Display buttons
				$("#modal-confirm-submit .confirm-footer-buttons").show();
				$("#modal-confirm-submit .confirm-footer-loader").hide();
			});

		} else { // If no,
			// Show error message
			showPopupMessage("Error", "Kindly fill-up all fields.");
			// Make sure fields are enabled
			$("#submit_order_fullname, #submit_order_email").prop("disabled", false);
			// Display buttons
			$("#modal-confirm-submit .confirm-footer-buttons").show();
			$("#modal-confirm-submit .confirm-footer-loader").hide();
			return false;
		}

	});

});

function get_style_size(type) {

	var check_style = $('input[name="wrist_style"]:checked').length;
	var check_size = $('input[name="wrist_size"]:checked').length;

	if(check_size == 0) {
		var $size = '1/2';
	} else {
		var $size = $('input[name="wrist_size"]:checked').data('size');
	}

	if(check_style == 0) {
		var $style = 'imprinted';
	}
	else {
		var $style = $('input[name="wrist_style"]:checked').data('style');

		if($style === "printed" || $style === "ink-injected" || $style === "embossed-printed" || $style === "figured"){
			$('.fntin').show().addClass('active');
		}else{
			$('.fntin').hide().removeClass('active');
		}

	}

	get_price_data($style, $size, type);
}

//Get Price list
function get_price_data($style, $size, type) {

	//get JSON Price list
	var ttlQty = 0;
	var ttlPrice = 0;
	var arrBand = {};
	if(typeof price_json != "undefined") {
		var $data = $.parseJSON(price_json);

		if(type == 'price_table') {
			$('#priceHeader, #priceTable').find('.js-temp').remove();
			$.each($data[$style][$size], function(key_qty, val_qty){
				$('#priceHeader').append("<th class='js-temp' data-uk-tooltip='{pos:\'top\'}' title='Prices'>"+key_qty+"</th>");
				$('#priceTable').append("<td class='js-temp'>$<span data-qty-range='"+key_qty+"''>"+val_qty+"</span></td>");
			});
			$('.js-pricing-table').fadeIn(300);
			$('.js-wb-caption').find('.style').text($style.toUpperCase());
			$('.js-wb-caption').find('.size').text($size);
		} else {
			$('.wrist_color_container:visible .js-color input[name$="-qty"]').each(function() {

				var qty = $(this).val();

				if(qty) {

					qty = parseInt(qty);

					if(qty > 0) {

						// Variables
						var ref_type = $(this).parents('.tab-pane').data('color').toLowerCase();
						var qty = $(this).val();

						// Check and change
						if(ref_type === "swirls") { ref_type = "swirl"; }

						// List all items with quantity
						if(typeof arrBand[ref_type] == "undefined" || arrBand[ref_type] == null) {
							arrBand[ref_type] = { // color : color,
												  price : $data[$style][$size],
												  qty : parseInt(qty),
												  size : $size
												};
						} else {
							arrBand[ref_type].qty += parseInt(qty);
						}

						// Calculte total quantity
						ttlQty += parseInt(qty);
					}
				}
			});

			$('.js-item-summary').html("");
			$('.js-free-summary').html("");
			$('.total-summary-free').hide();

			// Get proper total qty
			$.ajax({
				type: 'POST',
				url: 'queryDB.php',
				data: {'action':'get_prices', 'style':$style, 'size':$size, 'qty':ttlQty},
				beforeSend: function() {
					$('.js-total').hide();
					$('.js-no-total').fadeIn(300);
				},
				success: function(data) {
					data = $.parseJSON(data);
					var htmlProd, htmlShip = '';

					// List all production price/day data
					$.each(data.production, function(key, value) { htmlProd += '<option value="'+value.days+'" data-price="'+value.price+'">Standard Production - '+value.days+' Days (+$'+value.price+')</option>'; });
					$("#ProductionTime").html(htmlProd);
					// List all shipping price/day data
					$.each(data.shipping, function(key, value) { htmlShip += '<option value="'+value.days+'" data-price="'+value.price+'">Standard Shipping - '+value.days+' Days (+$'+value.price+')</option>'; });
					$("#ShippingTime").html(htmlShip);

					// After prod and shipping prices are fetched, Do Calculations
					$.each(arrBand, function(bKey, bVal) {
						var subPrice = 0;
						var ttlSubPrice = 0;
						var hasQty = false;

						// Get item price
						$.each(bVal.price, function(pQty, pPrice){
							if(hasQty === false) {
								if(pQty <= bVal.qty) {
									subPrice = parseFloat(pPrice);
								} else if(bVal.qty < 20) {
									subPrice = parseFloat(bVal.price['20']);
								} else {
									hasQty = true;
								}
							}
						});

						// Calculate total price
						ttlSubPrice = parseFloat(subPrice) * parseFloat(bVal.qty);
						ttlPrice += parseFloat(ttlSubPrice);

						// List items to total summary
						var html_item = '<div class="row summary-item"><div class="col-md-8 col-xs-6">- '+bKey.bold().toUpperCase()+' ('+bVal.qty+' x '+formatCurrency(subPrice)+' each)</div><div class="col-md-4 col-xs-6 align-right">'+formatCurrency(ttlSubPrice)+'</div></div>';
						$('.js-item-summary').append(html_item);

					});

					// DISPLAYS FOR TOTAL

						// For free promo items
						if(ttlQty >= 100) {
							// Show free items div
							$('#dv-10-free-keychains').show();
							$('#dv-100-free-wristbands').show();
							$('.total-summary-free').show();

							// Count keychains available
							var free_qty = $("#freekc").val();
							if(free_qty === "") { free_qty = 0; }

							// Show items to total summary
							var html_item = '<div class="row summary-item"><div class="col-xs-12">- Keychains ('+free_qty+' piece/s)</div><div class="clearfix"></div></div>';
								html_item += '<div class="row summary-item"><div class="col-xs-12">- Free wristbands</div><div class="clearfix"></div></div>';
							$('.js-free-summary').append(html_item);
						} else {
							// Hide free items div
							$('#dv-10-free-keychains').hide();
							$('#dv-100-free-wristbands').hide();
							$('#freekc').val('').focus();
						}
						// END : For free promo items

					// DISPLAYS FOR TOTAL
					// Decide if to hide total summary or not
					if(ttlQty >= 20) {

						var style = $('.js-style .wrist_style:checked').val();
						var size = parseInt($('.js-size .wrist_size:checked').val());
						var inc = size >= 2 ? 'Inches':'Inch';

						$('#wristband_style').text(style.toUpperCase());
						$('#wristband_size').text(size+' '+inc);

						var p_days  = $('#ProductionTime option:selected').val();
						var p_price = $('#ProductionTime option:selected').attr('data-price');

						var s_days  = $('#ShippingTime option:selected').val();
						var s_price = $('#ShippingTime option:selected').attr('data-price');

						// Add production and shipping prices
						ttlPrice += parseFloat(p_price);
						ttlPrice += parseFloat(s_price);

						$('#wristband_ptime').attr('data-production-time', p_days).attr('data-production-price', p_price).html(p_days + " Days ("+formatCurrency(p_price)+")");
						$('#wristband_stime').attr('data-shipping-time', s_days).attr('data-shipping-price', s_price).html(s_days + " Days ("+formatCurrency(s_price)+")");

						$('#totalPrice').text(formatCurrency(ttlPrice));
						$('#totalPrice').attr('data-total', ttlPrice);

						$('.prod-ship').fadeIn(300);
						$('.js-total').fadeIn(300);
						$('.js-no-total').hide();
					} else if(ttlQty < 20) {

						$('.js-total').hide();
						$('.js-no-total').fadeIn(300);
					}

				}
			});
		}
	}
}

//Get Total Price of wristbands
function get_total_price(price, qty, wb_style, wb_size) {

	var total_price = 0;
	$('.js-item-summary').html('');

	$('.wrist_color_container:visible .js-color').each(function() {
		var empty = true;
		var sub_qty = 0;
		$(this).find('input[name$="-qty"]').each(function(){
			var q = $(this).val();
			if(q != '') {
				sub_qty += parseInt(q);
				empty = false;
			}
		});

		if(!empty) {
			var color = $(this).data('color');
			// var added_val = ($(this).data('value')!="") ? parseFloat($(this).data('value')) : 0;
			var sub_price = 0;
			var has_qty = false;
			$.each(price, function(key_qty, val_qty){
				if(has_qty === false) {
					if(sub_qty >= key_qty) {
						sub_price = val_qty;
					}
				}
			});

			// var sub_price = added_val + parseFloat(price);
			var total_subprice = sub_price * sub_qty;
			//calculate total price
			total_price += total_subprice;
				var html = '<li class="fwb-list conversion-wrist-'+type+' free-wrist-'+type+'-'+sizeStr+'-'+colorStr+'" data-band-color="' + color + '">';
				html += '<div class="fwb-text col-md-12 col-xs-6">';
					html += '<div class="col-xs-3">'+type.toUpperCase()+'</div>';
					html += '<div class="col-xs-3">'+color+'</div>';
					html += '<div class="col-xs-3">'+sizeStrUp+'</div>';
				html += '</div>';
				html += '<div class="col-md-12 col-xs-6"><input type="number" class="freewb col-xs-12" id="freewb-'+type+'-'+sizeStr+'-'+colorStr+'" name="'+type+'-'+sizeStr+'-'+colorStr+'-fwb" placeholder="0" data-maxlength="3" /></div>';
				html += '<div class="clearfix"></div>';
				html += '</li>';
			$('.js-item-summary').append(html);
		}
	});

	var style_name = wb_style;
	var inc = wb_size >= 2 ? 'Inches':'Inch';

	$('#wristband_style').text(wb_style.toUpperCase());
	$('#wristband_size').text(wb_size+' '+inc);

	var p_days  = parseFloat($('#ProductionTime').val());
	var p_price = $('#ProductionTime').find(':selected').data('price');
	var s_days  = parseFloat($('#ShippingTime').val());
	var s_price = $('#ShippingTime').find(':selected').data('price');

    if(isNaN(p_days) || isNaN(p_price)){
		p_days = 0;
		p_price= 0;
	}

	if(isNaN(s_days) || isNaN(s_days)){
		s_days = 0;
		s_price = 0;
	}

	$('#wristband_ptime').attr('data-production-time', p_days).attr('data-production-price', p_price).html(p_days + " Days ("+formatCurrency(p_price)+")");
	$('#wristband_stime').attr('data-shipping-time', s_days).attr('data-shipping-price', s_price).html(s_days + " Days ("+formatCurrency(s_price)+")");

	total_price += p_price;
	total_price += s_price;

	var style = $('.js-style .wrist_style:checked').val();
	var size = $('.js-size .wrist_size:checked').val();
	var total = 0;

	var addOns = [];
	$('input[type=checkbox].add-ons:checked').each(function(i){
		addOns.push($(this).attr('data-code'));
	});

	$('.wrist_color_container:visible .js-color input[name$="-qty"]').each(function(){
		var qty = $(this).val();
		if(qty != '') {
			total += parseFloat(qty);
		}
	});

	sendToQuery('get_addons', style, size, total, addOns);

	$('#totalPrice').text(formatCurrency(total_price));
	$('#totalPrice').attr('data-total', total_price);

	$('.js-total').fadeIn(300);
	$('.js-no-total').hide();
}

//format currency
function formatCurrency(total) {
    var neg = false;
    if(total < 0) {
        neg = true;
        total = Math.abs(total);
    }
    return (neg ? "-$" : '$') + parseFloat(total, 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString();
}

//Reset Menu
function resetDrpMenu() {
	$('.drpMenuItems_clipart').fadeOut(300);
	$('.wristForm .clipart li a').removeClass('open');
	$('.wristForm .clipart li a').addClass('close');
	$('.wristForm .clipart li a').addClass('closex');
}

//Get Query for Wristband Production
function sendToQuery(action, style, size, qty, where) {

	$.ajax({
		type: 'POST',
		url: 'queryDB.php',
		data: {'action':action, 'style':style, 'size':size, 'qty':qty, 'where':where},
		success: function(data) {
			data = $.parseJSON(data);
			if(action === 'get_prices') {
				var html_prod, html_ship = '';

				$.each(data.production, function(key, value) {
				html_prod += '<option value="'+value.days+'" data-price="'+value.price+'">Standard Production - '+value.days+' Days (+$'+value.price+')</option>';
				});

				$.each(data.shipping, function(key, value) {
				html_ship += '<option value="'+value.days+'" data-price="'+value.price+'">Standard Production - '+value.days+' Days (+$'+value.price+')</option>';
				});

				$("#ProductionTime").html(html_prod);
				$("#ShippingTime").html(html_ship);
				// $('.summary-table').html(response);
			} else if(action === 'get_addons') {

				$('#wristband_add_ons').html(formatCurrency(data * qty));
				$('#wristband_add_ons').attr('data-addon-total', data * qty);

				var new_ttl = parseFloat($('#totalPrice').attr('data-total')) + (data * qty);
				$('#totalPrice').text( formatCurrency(new_ttl) );
				$('#totalPrice').attr('data-total', new_ttl);
			}
			// Calculate again
			// get_style_size('fixed_price');
		}
	});
}

// //Resets
// $('[input]').on('focus',function(){
// 	resetDrpMenu();
// });

//Clipart clik on items
$('.clipart .drpMenuItems').on('click',function(){
	$('.clipart li').removeAttr('style');
	if($(this).hasClass('closex')){
		resetDrpMenu();
		$(this).removeClass('closex');
	$(this).addClass('open');
		$(this).parent().find('.drpMenuItems_clipart').fadeIn(800);
	}else{
		$(this).removeClass('open');
	$(this).addClass('closex');
		$('.drpMenuItems_clipart').fadeOut(300);
	}
});

//Capitalize First letter
String.prototype.capitalizeFirstLetter = function() {

    return this.charAt(0).toUpperCase() + this.slice(1);
}

// Get whole total data
function getTotalData() {
	// Get JSON Price list
	var $data = $.parseJSON(price_json);
	// Get wristband size & style
	var $size = $(".js-size .wrist_size:checked").val();
	var $style = $(".js-style .wrist_style:checked").val();
	// Get selected production settings
	var $p_days = $("#ProductionTime option:selected").val();
		$p_days = ($p_days != "" && !isNaN(parseInt($p_days))) ? parseInt($p_days) : 0;
	var $p_price = $("#ProductionTime option:selected").attr("data-price");
		$p_price = ($p_price != "" && !isNaN(parseFloat($p_price))) ? parseFloat($p_price) : 0;
	// Get selected shipping settings
	var $s_days = $("#ShippingTime option:selected").val();
		$s_days = ($s_days != "" && !isNaN(parseInt($s_days))) ? parseInt($s_days) : 0;
	var $s_price = $("#ShippingTime option:selected").attr("data-price");
		$s_price = ($s_price != "" && !isNaN(parseFloat($s_price))) ? parseFloat($s_price) : 0;
	// Get selected font
	var $font = $("#preview-pane").css("font-family");
	// Set up an object for collection
	var $collection = {
						add_ons : {},
						font : $font,
						free : {},
						icon : {},
						items : {},
						production_days : $p_days,
						production_price : $p_price,
						shipping_days : $s_days,
						shipping_price : $s_price,
						size : $size,
						style : $style,
						text : {},
						total_qty : 0,
						total_price : 0
					};
	// Set to empty the Text & Icon properties. These should not be available for blank style
	if($style != "blank") {
		// Get text format
		var $text_type = $("input[type='radio'].band-text-design:checked").val();
		// Check selected text format then get all texts
		if ($text_type == "front-back-select") {
			$collection.text["type"] = "regular";
			$collection.text["text_back"] = $("#input-back-text").val();
			$collection.text["text_front"] = $("#input-front-text").val();
			$collection.text["text_inside"] = $("#input-inside-text").val();
		} else {
			$collection.text["type"] = "continuous";
			$collection.text["text_continue"] = $("#input-continue-text").val();
			$collection.text["text_inside"] = $("#input-inside-text").val();
		}
		// Get selected icons
		$collection.icon["front_start"]		= $(".start-fc img").attr("src");
		$collection.icon["front_end"]		= $(".end-fc img").attr("src");
		$collection.icon["back_start"]		= $(".back-mc img").attr("src");
		$collection.icon["back_end"]		= $(".backend-mc img").attr("src");
		$collection.icon["continues_start"]	= $(".start-cc img").attr("src");
		$collection.icon["continues_end"]	= $(".end-cc img").attr("src");
	}
	// Get all wristbands with quantity
	$(".wrist_color_container:visible .js-color input[name$='-qty']").each(function() {
		// Get quantity
		var $qty = $(this).val();
		if($qty) {
			$qty = parseInt($qty);
			if($qty > 0) {
				// Set variables
				var _ref_color = $(this).attr("ref"); if(!_ref_color){ return; }
				var _ref_color_font = $(this).parents(".qty-box").find(".fntin").attr("ref-font-color");
				var _ref_color_title = "Custom"; if(typeof $(this).attr("reftitle") != "undefined" && $(this).attr("reftitle") != "") { _ref_color_title = $(this).attr("reftitle"); }
				var _ref_color_str = _ref_color.replace(/,/g, "-");
				var _ref_color_arr = _ref_color.split(",");
				var _ref_size_name = $(this).attr("name");
				var _ref_type = $(this).parents(".tab-pane").data("color").toLowerCase();
				// Fix proper type and color per type
				if(_ref_type === "swirls") {
					_ref_type = "swirl";
				} else if (_ref_type === "dual") { // Fix dual's proper values
					_ref_type = "solid";
					_ref_color_font = _ref_color_arr[1];
					_ref_color_arr = _ref_color_arr.slice(0,1);
				}
				// Fix proper font-color
				if ($style === "debossed" || $style === "embossed") { _ref_color_font = "000000"; }
				// Check and change
				if(_ref_type === "swirls") { _ref_type = "swirl"; }
				// List all items with quantity
				if(typeof $collection.items[_ref_type] == "undefined" || $collection.items[_ref_type] == null) {
					// Set up data
					$collection.items[_ref_type] = { data:[], price:0, qty:parseInt($qty), total:0 };
				} else {
					// Add quantity
					$collection.items[_ref_type].qty += parseInt($qty);
				}
				// Compute total quantity
				$collection.total_qty += parseInt($qty);
					// // NEW ALGO DAMAGE
					// // Get proper item price
					// var hasQty = false; // Set variables
					// // Loop through json price list
					// $.each($data[$style][$size], function(_data_qty, _data_prc) {
					// 	// Check if already found the price
					// 	if(hasQty === false) {
					// 		// If less than or equal
					// 		if($collection.items[_ref_type].qty < 20) {
					// 			$collection.items[_ref_type].price = parseFloat($data[$style][$size]['20']); // Get price
					// 		} else if(parseInt(_data_qty) <= $collection.items[_ref_type].qty) {
					// 			$collection.items[_ref_type].price = parseFloat(_data_prc); // Get price
					// 		} else {
					// 			hasQty = true;
					// 		}
					// 	}
					// });
					// // END NEW ALGO DAMAGE
				// // Compute total price
				// $collection.items[_ref_type].total = $collection.items[_ref_type].price * $collection.items[_ref_type].qty;
				// Populate items
				$collection.items[_ref_type].data.push({ color:_ref_color_arr, font:_ref_color_font, name:_ref_color_title.toString().toLowerCase(), qty:$qty, size:_ref_size_name.toString().toLowerCase().replace("-qty", "") });
			}
		}
	});
	// Get JSON Add-ons price list
	var $data_addon = $.parseJSON(addon_json);
	// THE NEW ALGO
	$.each($collection.items, function(i_key, i_value) {
		// Get proper item price
		var hasQty = false; // Set variables
		var hasAddQty = false; // Set variables
		// Loop through json price list
		$.each($data[$style][$size], function(_data_qty, _data_prc) {
			// Check if already found the price
			if(hasQty === false) {
				// If less than or equal
				if($collection.total_qty < 20) {
					// Get price
					$collection.items[i_key].price = parseFloat($data[$style][$size]['20']);
				} else if(parseInt(_data_qty) <= $collection.total_qty) {
					// Get price
					$collection.items[i_key].price = parseFloat(_data_prc);
				} else {
					// Flag if item price found
					hasQty = true;
				}
			}
		});
		// Get proper additional item price
		if(typeof $data_addon[i_key] != "undefined") {
			$.each($data_addon[i_key], function(_ao_qty, _ao_prc) {
				// Check if already found the price
				if(hasAddQty === false) {
					// If less than or equal
					if(parseInt(_ao_qty) <= $collection.items[i_key].qty) {
						// Get price
						$collection.items[i_key].add_price = parseFloat(_ao_prc);
					} else if($collection.items[i_key].qty < 20) {
						// Get price
						$collection.items[i_key].add_price = parseFloat(_ao_prc);
						// Flag if additional item price found
						hasAddQty = true;
					} else {
						// Flag if additional item price found
						hasAddQty = true;
					}
				}
			});
		} else {
			// If no proper add-on price found
			$collection.items[i_key].add_price = 0;
		}
		// Compute total price
		// $collection.items[i_key].total = $collection.items[i_key].price * $collection.items[i_key].qty;
		$collection.items[i_key].total = ($collection.items[i_key].price + $collection.items[i_key].add_price) * $collection.items[i_key].qty;
		$collection.total_price += parseFloat($collection.items[i_key].total);
	});
	// END OF THE NEW ALGO
	// For add-ons
	$("input[type='checkbox'].add-ons:checked").each(function() {
		// Set variables
		var hasAOPrice = false;
		var _aoCode = $(this).attr("data-code");
		var _aoConvertQty = $collection.total_qty;
		var _aoAllConvert = true;
		if (_aoCode == "key-chain" && $("input[type='radio'].convert-keychain-input:checked").val() == "some") {
			_aoConvertQty = 0;
			_aoAllConvert = false;
			$("input.kc-some-qty").each(function() {
				_aoConvertQty += ($(this).val().trim() != "") ? parseInt($(this).val()) : 0;
			});
		};
		// Get proper add-on price
		if(typeof $data_addon[_aoCode] != "undefined") {
			$.each($data_addon[_aoCode], function(_ao_qty, _ao_prc) {
				// Check if already found the price
				if(hasAOPrice === false) {
					// If less than or equal
					if(parseInt(_ao_qty) <= _aoConvertQty) {
						// Get price
						$collection.add_ons[_aoCode] = { code:_aoCode, price:parseFloat(_ao_prc), qty:_aoConvertQty, total:parseFloat(_aoConvertQty*parseFloat(_ao_prc)) };
					} else if(_aoConvertQty < 20) {
						// Get price
						$collection.add_ons[_aoCode] = { code:_aoCode, price:parseFloat(_ao_prc), qty:_aoConvertQty, total:parseFloat(_aoConvertQty*parseFloat(_ao_prc)) };
						// Flag if add-on price found
						hasAOPrice = true;
					} else {
						// Flag if add-on price found
						hasAOPrice = true;
					}
				}
			});
		} else { // Check if add_on is not on JSON
			$collection.add_ons[_aoCode] = { code:_aoCode, price:0, qty:_aoConvertQty, total:0 };
		}
		// Indicator if all key-chains are converted
		if(_aoCode == "key-chain") {
			$collection.add_ons[_aoCode].all = _aoAllConvert;
		}
	});
	// If total quantity is equal or over 100, get all free items
	if($collection.total_qty >= 100) {
		// Check free wristbands quantity
		// var free_kc_qty = $("#freekc").val().trim();
		// var free_kc_qty = 0;
		// For keychains
		// if(free_kc_qty == "") { free_kc_qty = 0; }
		// free_kc_qty = parseInt(free_kc_qty);
		// Place to collection
		// $collection.free["keychains"] = { qty:free_kc_qty };
		// For keychains -----
		$collection.free["keychains"] = { qty:0, data:[] };
		// Place to collection
		$(".freekc").each(function() {
			$collection.free["keychains"].data.push({
													color : $(this).attr("data-color").split(","),
													font : $(this).attr("data-font-color"),
													name : $(this).attr("data-name").toString().toLowerCase(),
													qty : ($(this).val().trim() == "") ? 0 : parseInt($(this).val().trim()),
													size : $(this).attr("data-size"),
													style : $(this).attr("data-style")
												});
			$collection.free["keychains"].qty += ($(this).val().trim() == "") ? 0 : parseInt($(this).val().trim());
		});
		// For writbands -----
		$collection.free["wristbands"] = { qty:0, data:[] };
		// Place to collection
		$(".freewb").each(function() {
			$collection.free["wristbands"].data.push({
													color : $(this).attr("data-color").split(","),
													font : $(this).attr("data-font-color"),
													name : $(this).attr("data-name").toString().toLowerCase(),
													qty : ($(this).val().trim() == "") ? 0 : parseInt($(this).val().trim()),
													size : $(this).attr("data-size"),
													style : $(this).attr("data-style")
												});
			$collection.free["wristbands"].qty += ($(this).val().trim() == "") ? 0 : parseInt($(this).val().trim());
		});
	}
	// Compute total price
	// Add shipping & production prices to total
	$collection.total_price += parseFloat($collection.shipping_price);
	$collection.total_price += parseFloat($collection.production_price);
		// // NEW ALGO DAMAGE
		// // Add item prices to total
		// $.each($collection.items, function(key, value) {
		// 	$collection.total_price += parseFloat(value.total);
		// });
		// // END NEW ALGO DAMAGE
	// Add add-on prices to total
	$.each($collection.add_ons, function(key, value) {
		$collection.total_price += parseFloat(value.total);
	});

	// console.log($collection);

	// Return order collection
	return $collection;
}

function populateTotalSection(_collection) {

	// Place selected stle & size
	$("#wristband_style").text(_collection.style.toLowerCase().capitalizeFirstLetter());
	$("#wristband_size").text(_collection.size + " Inches");

	// For items
	var html_band_item = "";
	$(".js-item-summary").html(html_band_item);
		$.each(_collection.items, function(key, value) {
			html_band_item += "<div class='row summary-item'><div class='col-md-8 col-sm-6'>- " + key.toLowerCase().capitalizeFirstLetter() + " (" + value.qty + " x " + formatCurrency(value.price + value.add_price) + " each)</div><div class='col-md-4 col-sm-6 align-right'>" + formatCurrency(value.total) + "</div></div>";
		});
	// Place items
	$(".js-item-summary").append(html_band_item);

	// For add-ons
	var html_add_ons = "";
	var total_add_ons = 0;

	$("#wristband_add_on_list").html(html_add_ons);
	$.each(_collection.add_ons, function(key, value) {
			if(value.code == "individual") { value.code = "individual pack"; }
		html_add_ons += "- " + value.code.replace(/-/g, " ").toLowerCase().capitalizeFirstLetter();
			if(value.code == "key-chain") {
				html_add_ons += " (";
				if(value.all == true) {
					html_add_ons += "All";
					var keyQty = value.qty + 100;
				} else {
					html_add_ons += "Some";
					var keyQty = value.qty;
				}
				html_add_ons += " Converted)";
			}

		html_add_ons += " (" + keyQty + " x " + formatCurrency(value.price) + " each)<br />";
		total_add_ons += value.total;
	});

	// Place add-ons
	$("#wristband_add_on_list").append(html_add_ons);
	$('#wristband_add_ons').html(formatCurrency(total_add_ons));
	$('#wristband_add_ons').attr('data-addon-total', total_add_ons);

	// Place shipping & production prices
	$("#wristband_ptime").attr("data-production-time", _collection.production_days).attr("data-production-price", _collection.production_price).html(_collection.production_days + " Days ("+formatCurrency(_collection.production_price)+")");
	$("#wristband_stime").attr("data-shipping-time", _collection.shipping_days).attr("data-shipping-price", _collection.shipping_price).html(_collection.shipping_days + " Days ("+formatCurrency(_collection.shipping_price)+")");

	// Place total price
	$("#totalPrice").text(formatCurrency(_collection.total_price));
	$("#totalPrice").attr("data-total", _collection.total_price);

	// For displaying free promo item section
	if(_collection.total_qty >= 100) {

		// Show free items at total summary
		var html_item = "";
		if(typeof _collection.free.keychains != "undefined") {
			html_item += '<div class="row summary-item"><div class="col-md-8 col-sm-6">- Keychains (' + _collection.free.keychains.qty + ' piece/s)</div><div class="clearfix"></div></div>';
			if(_collection.free.keychains.qty > 0) {
				$.each(_collection.free.keychains.data, function(key, value) {
					html_item += '<div class="row summary-item"><div class="col-xs-12 free-kc-label">- ' + value.name.toLowerCase().capitalizeFirstLetter() + ' (' + value.qty + ' piece/s)</div><div class="clearfix"></div></div>';
				});
			}
		}

		if(typeof _collection.free.wristbands != "undefined") {
			html_item += '<div class="row summary-item"><div class="col-md-8 col-sm-6">- Wristbands (' + _collection.free.wristbands.qty + ' piece/s)</div><div class="clearfix"></div></div>';
			if(_collection.free.wristbands.qty > 0) {
				$.each(_collection.free.wristbands.data, function(key, value) {
					html_item += '<div class="row summary-item"><div class="col-xs-12 free-wb-label">- ' + value.name.toLowerCase().capitalizeFirstLetter() + ' (' + value.qty + ' piece/s)</div><div class="clearfix"></div></div>';
				});
			}
		}

		// Show free items div
		if(html_item !== "") {
			$("#dv-10-free-keychains, #dv-100-free-wristbands, .total-summary-free").show();
			// Show available free items
			$('.js-free-summary').html(html_item);
		} else { // Hide free items div
			$("#dv-10-free-keychains, .free-convert-bands, .free-convert-chains, #dv-100-free-wristbands, .total-summary-free").hide();
		}

	} else { // Hide free items div
		$("#dv-10-free-keychains, .free-convert-bands, .free-convert-chains, #dv-100-free-wristbands, .total-summary-free").hide();
		// $('#freekc').val('').focus();
	}

	// For displaying totals section
	if(_collection.total_qty >= 20) {
		$('.prod-ship').fadeIn(300);
		$('.js-total').fadeIn(300);
		$('.js-no-total').hide();
	} else {
		$('.js-total').hide();
		$('.js-no-total').fadeIn(300);
	}
}

function showPopupMessage(_title, _content) {
	$("#modal-message-title").html(_title);
	$("#modal-message-content").html(_content);
	$("#modal-message").modal("show");
}

function resetOrderPage() {

	//check style hide size divs
	var style = $(".js-style .wrist_style:checked").val();

	// Show or hide custom font selector depending on selected style
	if(style === "printed" || style === "ink-injected" || style === "embossed-printed" || style === "figured"){
		$('.fntin').show().addClass('active');
		$('.fonttext-color').show();
	}else{
		$('.fntin').hide().removeClass('active');
		$('.fonttext-color').hide();
	}

	// Set what kind of preview to display
	if(style === "figured") {
		$("#front-view, #back-view, #inside-view, #continue-view").addClass("set-height-fig");
		$("#front-view, #back-view, #inside-view, #continue-view").removeClass("set-height-reg");
		$(".preview-text").css("line-height", "104px");
	} else {
		$("#front-view, #back-view, #inside-view, #continue-view").addClass("set-height-reg");
		$("#front-view, #back-view, #inside-view, #continue-view").removeClass("set-height-fig");
		$(".preview-text").css("line-height", "54px");
	}

	//Check and remove step 4 if blank style
	if(style === "blank"){
		$('.wrist-messsage').hide();
		$('.step-5').hide();
		$('.step-4').show();
	}else{
		$('.wrist-messsage').show();
		$('.step-5').show();
		$('.step-4').hide();
	}

	// Hide all sizes first
	$(".js-size").removeClass('active');
	$(".wsize-default .js-size").hide();
	$(".wristband-view-color").hide();

	// Set which sizes to display
	if(style == "figured") {
		// Show sizes
		$("#half").show();
		$("#three").show();
		$("#one").show();
		$(".start-fc").addClass("fig_move");
		$(".end-fc").addClass("fig_move");
		$(".back-mc").addClass("fig_move");
		$(".backend-mc").addClass("fig_move");
		$(".start-cc").addClass("fig_move");
		$(".end-cc").addClass("fig_move");
		$(".fig-fc").addClass("fig_move");
		$(".figarea").show();

		// Get current checked radio button
		var selected = $(".js-size:visible input[type='radio']:checked");
		if(selected.length <= 0) {
			selected = $(".js-size:visible:first input[type='radio']");
		}
		selected.closest('.js-size').addClass('active');
		selected.prop("checked", true);

		// Get checked style
		var item = $(".js-size:visible .wrist_size:checked").val();

		// Show items
		if($.inArray(item, ["1/4", "1/2", "3/4"]) > 0) {
			$(".regular-figured-size").show(); // Show regular sizes
		} else {
			$(".large-figured-size").show(); // Show large sizes
		}
	} else if(style=="dual-layer") {
		// Show sizes
		$("#half").show();
		$("#three").show();
		$(".start-fc").removeClass("fig_move");
		$(".end-fc").removeClass("fig_move");
		$(".back-mc").removeClass("fig_move");
		$(".backend-mc").removeClass("fig_move");
		$(".start-cc").removeClass("fig_move");
		$(".end-cc").removeClass("fig_move");
		$(".figarea").hide();

		// Get current checked radio button
		var selected = $(".js-size:visible input[type='radio']:checked");
		if(selected.length <= 0) {
			selected = $(".js-size:visible:first input[type='radio']");
		}
		selected.closest('.js-size').addClass('active');
		selected.prop("checked", true);

		// Get checked style
		var item = $(".js-size:visible .wrist_size:checked").val();

		// Show items
		if($.inArray(item, ["1/4", "1/2"]) > 0) {
			$(".regular-dual-size").show(); // Show regular sizes
		} else {
			$(".large-dual-size").show(); // Show large sizes
		}
	} else {
		// Show sizes
		$("#quarter").show();
		$("#half").show();
		$("#three").show();
		$("#one").show();
		$("#onehalf").show();
		$("#two").show();
		$(".start-fc").removeClass("fig_move");
		$(".end-fc").removeClass("fig_move");
		$(".back-mc").removeClass("fig_move");
		$(".backend-mc").removeClass("fig_move");
		$(".start-cc").removeClass("fig_move");
		$(".end-cc").removeClass("fig_move");
		$(".figarea").hide();

		// Get current checked radio button
		var selected = $(".js-size:visible input[type='radio']:checked");
		if(selected.length <= 0) {
			selected = $(".js-size:visible:first input[type='radio']");
		}
		selected.closest('.js-size').addClass('active');
		selected.prop("checked", true);

		// Get checked style
		var item = $(".js-size:visible .wrist_size:checked").val();

		// Show items
		if($.inArray(item, ["1/4", "1/2", "3/4", "1"]) > 0) {
			$(".regular-color-size").show(); // Show regular sizes
		} else {
			$(".large-color-size").show(); // Show large sizes
		}
	}

	// Empty all quantities
	$(".wrist_color_container:visible").find(".js-color").find("input[name$='-qty']").val("");

	// Hide free
	$('#dv-10-free-keychains').hide();
	$('#dv-100-free-wristbands').hide();

	// Empty all add-ons
	$("#convert-keychain").hide();
	$("div.add-ons").removeClass("active");
	$("div.add-ons").find("input[type='checkbox']").prop("checked", false);

	// Clear previews
	$(".click-pre").hide();
	$(".preview-panel").attr("style", "");
	$(".preview-panel").find("img").remove();
	$("#preview-pane-selection").html("");
	$("#front-view, #back-view, #inside-view, #continue-view").attr("style", "");
	$(".main-content-preview").removeClass("has-preview");

	// Hide total
	$('.js-total').hide();
	$('.js-no-total').fadeIn(300);


	// Get new price table
	get_style_size('price_table');
}
