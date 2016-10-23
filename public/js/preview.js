
/**
 *  Generate a preview image
 */
function generatePreviewImage(style, colors, font_color) {

	$(".segmented").css("display", "block");
	$(".solid").css("display", "block");
	$(".swirl").css("display", "block");
	$(".glow").css("display", "block");
	
	if(typeof colors !== "undefined" && typeof style !== "undefined") {

		// Place colors on an array, for future use
		// $_COLOR = $_GET["color"].split(",");

		if(style === "swirls") {

			// Hide SVG elements not used
			$(".solid").css("display", "none");
			$(".segmented").css("display", "none");
			$(".glow").css("display", "none");

			// Set colors
			$("#swirl_1").css( "fill", "#" + colors[0]); // Set 1st color

			if( colors.length < 2 ) { // Set 2nd color
				$("#swirl_2").css("display", "none");
			} else {
				$("#swirl_2").css( "fill", "#" + colors[1] );
			}

			if( colors.length < 3 ) { // Set 3rd color
				$("#swirl_3").css("display", "none");
			} else {
				$("#swirl_3").css( "fill", "#" + colors[2] );
			}

			if( colors.length < 4 ) { // Set 4th color
				$("#swirl_4").css("display", "none");
			} else {
				$("#swirl_4").css( "fill", "#" + colors[3] );
			}

			// Render SVG into Canvas
			return render($("#svg_main").parent().html().trim(), "output_canvas", "output_image", "preview", style, colors, font_color);

		} else if (style === "segmented") {

			// Hide SVG elements not used
			$(".solid").css("display", "none");
			$(".swirl").css("display", "none");
			$(".glow").css("display", "none");

			// Set colors
			if(colors.length === 1) { // If 1 colors

				$("#segmented_6").css("display", "none");
				$("#segmented_5").css("display", "none");
				$("#segmented_4").css("display", "none");
				$("#segmented_3").css("display", "none");
				$("#segmented_2").css("display", "none");

				$("#segmented_1_1").css( "fill", "#" + colors[0] );

			} else if(colors.length === 2) { // If 2 colors

				$("#segmented_6").css("display", "none");
				$("#segmented_5").css("display", "none");
				$("#segmented_4").css("display", "none");
				$("#segmented_3").css("display", "none");
				$("#segmented_1").css("display", "none");

				$("#segmented_2_2").css( "fill", "#" + colors[1] );
				$("#segmented_2_1").css( "fill", "#" + colors[0] );

			} else if(colors.length === 3) { // If 3 colors

				$("#segmented_6").css("display", "none");
				$("#segmented_5").css("display", "none");
				$("#segmented_4").css("display", "none");
				$("#segmented_2").css("display", "none");
				$("#segmented_1").css("display", "none");

				$("#segmented_3_3").css( "fill", "#" + colors[1]);
				$("#segmented_3_2").css( "fill", "#" + colors[2]);
				$("#segmented_3_1").css( "fill", "#" + colors[0]);

			} else if(colors.length === 4) { // If 4 colors

				$("#segmented_6").css("display", "none");
				$("#segmented_5").css("display", "none");
				$("#segmented_3").css("display", "none");
				$("#segmented_2").css("display", "none");
				$("#segmented_1").css("display", "none");

				$("#segmented_4_4").css( "fill", "#" + colors[2]);
				$("#segmented_4_3").css( "fill", "#" + colors[1]);
				$("#segmented_4_2").css( "fill", "#" + colors[3]);
				$("#segmented_4_1").css( "fill", "#" + colors[0]);

			} else if(colors.length === 5) { // If 5 colors

				$("#segmented_6").css("display", "none");
				$("#segmented_4").css("display", "none");
				$("#segmented_3").css("display", "none");
				$("#segmented_2").css("display", "none");
				$("#segmented_1").css("display", "none");

				$("#segmented_5_5").css( "fill", "#" + colors[2]);
				$("#segmented_5_4").css( "fill", "#" + colors[3]);
				$("#segmented_5_3").css( "fill", "#" + colors[1]);
				$("#segmented_5_2").css( "fill", "#" + colors[4]);
				$("#segmented_5_1").css( "fill", "#" + colors[0]);

			} else if(colors.length >= 6) { // If 6 colors

				$("#segmented_5").css("display", "none");
				$("#segmented_4").css("display", "none");
				$("#segmented_3").css("display", "none");
				$("#segmented_2").css("display", "none");
				$("#segmented_1").css("display", "none");

				$("#segmented_6_6").css( "fill", "#" + colors[3]);
				$("#segmented_6_5").css( "fill", "#" + colors[2]);
				$("#segmented_6_4").css( "fill", "#" + colors[4]);
				$("#segmented_6_3").css( "fill", "#" + colors[1]);
				$("#segmented_6_2").css( "fill", "#" + colors[5]);
				$("#segmented_6_1").css( "fill", "#" + colors[0]);

			}

			// Render SVG into Canvas
			return render($("#svg_main").parent().html().trim(), "output_canvas", "output_image", "preview", style, colors, font_color);

		} else if(style === "solid") {

			// Remove SVG elements not used
			$(".segmented").css("display", "none");
			$(".swirl").css("display", "none");
			$(".glow").css("display", "none");

			// Set color
			$(".solid").css( "fill", "#" + colors[0]);

			// Render SVG into Canvas
			return render($("#svg_main").parent().html().trim(), "output_canvas", "output_image", "preview", style, colors, font_color);

		}
		
		else if(style === "glow") {

			// Remove SVG elements not used
			$(".segmented").css("display", "none");
			$(".swirl").css("display", "none");
			$(".solid").css("display", "none");
			
			// Set color
			$(".glow").css( "fill", "#" + colors[0]);

			// Render SVG into Canvas
			return render($("#svg_main").parent().html().trim(), "output_canvas", "output_image", "preview", style, colors, font_color);

		}
		
		else if(style === "dual") {

			// Remove SVG elements not used
			$(".segmented").css("display", "none");
			$(".swirl").css("display", "none");
			$(".glow").css("display", "none");

			// Set color
			$(".solid").css( "fill", "#" + colors[0]);

			// Render SVG into Canvas
			return render($("#svg_main").parent().html().trim(), "output_canvas", "output_image", "preview", style, colors, font_color);

		}

	} else {

		// Remove everything!!!
		// $("html").html("Invalid data.");

	}

	// Also, remove scripts. Processing is over.
	// $("#scripts").remove();

	return false;

}

/**
 *  SVG to canvas to image render function
 */
function render(svg, canvas, image, preview, type, colors, font_color) {

	// Get needed elements
	var can = document.getElementById(canvas);
	var img = document.getElementById(image);

	// Convert SVG to canvas using canvg.js
	canvg(can, svg);

	// Set converted svg as image source
	img.setAttribute("src", can.toDataURL());

	// Apply blur effect on image
	setTimeout(function() {
		stackBlurImage(image, "canvas", 50);
		var preview = $("#preview-pane-selection").find('.preview-pill.preview-'+type+'-'+colors.join("-")).length > 0;
		// var prevType = $("#preview-pane-selection").find('.preview-pill[data-type="'+type+'"]').length > 0;

		if(!preview) {
			if(type=='dual') {
				$("#preview-pane-selection").append('<li class="preview-pill preview-'+type+'-'+colors.join("-")+'" data-type="'+type+'" data-font-color="'+colors[1]+'" data-image-link="' + $("#canvas")[0].toDataURL() + '" style="background-image:url(' + $("#canvas")[0].toDataURL() + ');background-size:30px;"></li>');
			} else {
				$("#preview-pane-selection").append('<li class="preview-pill preview-'+type+'-'+colors.join("-")+'" data-type="'+type+'" data-font-color="'+font_color+'" data-image-link="' + $("#canvas")[0].toDataURL() + '" style="background-image:url(' + $("#canvas")[0].toDataURL() + ');background-size:30px;"></li>');
			}
		}

	}, 1000);
}
