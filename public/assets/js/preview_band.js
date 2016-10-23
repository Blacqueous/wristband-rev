
/**
 *  Generate a preview image
 */
function generatePreviewBandImage(style, colors, wbstyle) {

	// For the normals
	$(".band_solid").css("display", "none");
	$(".band_segmented").css("display", "none");
	$(".band_swirl").css("display", "none");
	$(".band_dual").css("display", "none");
	// For figured
	$(".band_solid_f").css("display", "none");
	$(".band_segmented_f").css("display", "none");
	$(".band_swirl_f").css("display", "none");

	if(typeof colors !== "undefined" && typeof style !== "undefined") {

		if(wbstyle !== "figured") {

			if(style === "swirls") {

				// Hide SVG elements not used
				// $(".band_solid").css("display", "none");
				// $(".band_segmented").css("display", "none");
				// $(".band_dual").css("display", "none");

				// Set colors
				// $("#band_swirl_1").css("display", "block");
				// $("#band_swirl_1").css( "fill", "#" + colors[0]); // Set 1st color

				// if( colors.length < 2 ) { // Set 2nd color
				// 	// $("#band_swirl_2").css("display", "none");
				// } else {
				// 	$("#band_swirl_2").css("display", "block");
				// 	$("#band_swirl_2").css( "fill", "#" + colors[1] );
				// }

				// if( colors.length < 3 ) { // Set 3rd color
				// 	// $("#band_swirl_3").css("display", "none");
				// } else {
				// 	$("#band_swirl_3").css("display", "block");
				// 	$("#band_swirl_3").css( "fill", "#" + colors[2] );
				// }

				// if( colors.length < 4 ) { // Set 4th color
				// 	// $("#band_swirl_4").css("display", "none");
				// } else {
				// 	$("#band_swirl_4").css("display", "block");
				// 	$("#band_swirl_4").css( "fill", "#" + colors[3] );
				// }

				// Set colors
				if(colors.length === 1) { // If 1 colors

					$("#band_swirl_1").css("display", "block");

					$("#band_swirl_1_1").css( "fill", "#" + colors[0] );

				} else if(colors.length === 2) { // If 2 colors

					$("#band_swirl_2").css("display", "block");

					$("#band_swirl_2_2").css( "fill", "#" + colors[1] );
					$("#band_swirl_2_1").css( "fill", "#" + colors[0] );

				} else if(colors.length === 3) { // If 3 colors

					$("#band_swirl_3").css("display", "block");

					$("#band_swirl_3_3").css( "fill", "#" + colors[2] );
					$("#band_swirl_3_2").css( "fill", "#" + colors[1] );
					$("#band_swirl_3_1").css( "fill", "#" + colors[0] );

				}

				// Render SVG into Canvas
				return renderBand($("#svg_band_main").parent().html().trim(), "output_band_canvas", "output_band_image", "band_preview");

			} else if (style === "segmented") {

				// Hide SVG elements not used
				// $(".band_solid").css("display", "none");
				// $(".band_swirl").css("display", "none");
				// $(".band_dual").css("display", "none");

				// Set colors
				if(colors.length === 1) { // If 1 colors

					$("#band_segmented_1").css("display", "block");

					$("#band_segmented_1_1").css( "fill", "#" + colors[0] );

				} else if(colors.length === 2) { // If 2 colors

					$("#band_segmented_2").css("display", "block");

					$("#band_segmented_2_2").css( "fill", "#" + colors[1] );
					$("#band_segmented_2_1").css( "fill", "#" + colors[0] );

				} else if(colors.length === 3) { // If 3 colors

					$("#band_segmented_3").css("display", "block");

					$("#band_segmented_3_3").css( "fill", "#" + colors[1]);
					$("#band_segmented_3_2").css( "fill", "#" + colors[2]);
					$("#band_segmented_3_1").css( "fill", "#" + colors[0]);

				} else if(colors.length === 4) { // If 4 colors

					$("#band_segmented_4").css("display", "block");

					$("#band_segmented_4_4").css( "fill", "#" + colors[3]);
					$("#band_segmented_4_3").css( "fill", "#" + colors[2]);
					$("#band_segmented_4_2").css( "fill", "#" + colors[1]);
					$("#band_segmented_4_1").css( "fill", "#" + colors[0]);

				} else if(colors.length === 5) { // If 5 colors

					$("#band_segmented_5").css("display", "block");

					$("#band_segmented_5_5").css( "fill", "#" + colors[1]);
					$("#band_segmented_5_4").css( "fill", "#" + colors[2]);
					$("#band_segmented_5_3").css( "fill", "#" + colors[3]);
					$("#band_segmented_5_2").css( "fill", "#" + colors[4]);
					$("#band_segmented_5_1").css( "fill", "#" + colors[0]);

				} else if(colors.length >= 6) { // If 6 colors

					$("#band_segmented_6").css("display", "block");

					$("#band_segmented_6_6").css( "fill", "#" + colors[1]);
					$("#band_segmented_6_5").css( "fill", "#" + colors[2]);
					$("#band_segmented_6_4").css( "fill", "#" + colors[3]);
					$("#band_segmented_6_3").css( "fill", "#" + colors[4]);
					$("#band_segmented_6_2").css( "fill", "#" + colors[5]);
					$("#band_segmented_6_1").css( "fill", "#" + colors[0]);

				}

				// Render SVG into Canvas
				return renderBand($("#svg_band_main").parent().html().trim(), "output_band_canvas", "output_band_image", "band_preview", style);

			} else if(style === "solid") {

				// Remove SVG elements not used
				// $(".band_segmented").css("display", "none");
				// $(".band_swirl").css("display", "none");
				// $(".band_dual").css("display", "none");

				$(".band_solid").css("display", "block");

				// Set color
				$(".band_solid").css( "fill", "#" + colors[0]);

				// Render SVG into Canvas
				return renderBand($("#svg_band_main").parent().html().trim(), "output_band_canvas", "output_band_image", "band_preview", style);

			} else if(style === "dual") {

				// Remove SVG elements not used
				// $(".band_segmented").css("display", "none");
				// $(".band_swirl").css("display", "none");
				// $(".band_solid").css("display", "none");

				$(".band_dual").css("display", "block");

				// Set color
				$("#band_dual_1_1").css( "fill", "#" + colors[0]);
				$("#band_dual_1_2").css( "fill", "#" + colors[1]);

				// Render SVG into Canvas
				return renderBand($("#svg_band_main").parent().html().trim(), "output_band_canvas", "output_band_image", "band_preview", style);

			}

		} else {

			if(style === "swirls") {

				// Set colors
				if(colors.length === 1) { // If 1 colors

					$("#band_swirl_f_1").css("display", "block");

					$("#band_swirl_f_1_1").css( "fill", "#" + colors[0] );

				} else if(colors.length === 2) { // If 2 colors

					$("#band_swirl_f_2").css("display", "block");

					$("#band_swirl_f_2_2").css( "fill", "#" + colors[1] );
					$("#band_swirl_f_2_1").css( "fill", "#" + colors[0] );

				} else if(colors.length === 3) { // If 3 colors

					$("#band_swirl_f_3").css("display", "block");

					$("#band_swirl_f_3_3").css( "fill", "#" + colors[2] );
					$("#band_swirl_f_3_2").css( "fill", "#" + colors[1] );
					$("#band_swirl_f_3_1").css( "fill", "#" + colors[0] );

				}

				// Render SVG into Canvas
				return renderBand($("#svg_band_main").parent().html().trim(), "output_band_canvas", "output_band_image", "band_preview");

			} else if (style === "segmented") {

				// Set colors
				if(colors.length === 1) { // If 1 colors

					$("#band_segmented_f_1").css("display", "block");

					$("#band_segmented_f_1_1").css( "fill", "#" + colors[0] );

				} else if(colors.length === 2) { // If 2 colors

					$("#band_segmented_f_2").css("display", "block");

					$("#band_segmented_f_2_2").css( "fill", "#" + colors[1] );
					$("#band_segmented_f_2_1").css( "fill", "#" + colors[0] );

				} else if(colors.length === 3) { // If 3 colors

					$("#band_segmented_f_3").css("display", "block");

					$("#band_segmented_f_3_3").css( "fill", "#" + colors[1]);
					$("#band_segmented_f_3_2").css( "fill", "#" + colors[2]);
					$("#band_segmented_f_3_1").css( "fill", "#" + colors[0]);

				} else if(colors.length === 4) { // If 4 colors

					$("#band_segmented_f_4").css("display", "block");

					$("#band_segmented_f_4_4").css( "fill", "#" + colors[3]);
					$("#band_segmented_f_4_3").css( "fill", "#" + colors[2]);
					$("#band_segmented_f_4_2").css( "fill", "#" + colors[1]);
					$("#band_segmented_f_4_1").css( "fill", "#" + colors[0]);

				} else if(colors.length === 5) { // If 5 colors

					$("#band_segmented_f_5").css("display", "block");

					$("#band_segmented_f_5_5").css( "fill", "#" + colors[1]);
					$("#band_segmented_f_5_4").css( "fill", "#" + colors[2]);
					$("#band_segmented_f_5_3").css( "fill", "#" + colors[3]);
					$("#band_segmented_f_5_2").css( "fill", "#" + colors[4]);
					$("#band_segmented_f_5_1").css( "fill", "#" + colors[0]);

				} else if(colors.length >= 6) { // If 6 colors

					$("#band_segmented_f_6").css("display", "block");

					$("#band_segmented_f_6_6").css( "fill", "#" + colors[1]);
					$("#band_segmented_f_6_5").css( "fill", "#" + colors[2]);
					$("#band_segmented_f_6_4").css( "fill", "#" + colors[3]);
					$("#band_segmented_f_6_3").css( "fill", "#" + colors[4]);
					$("#band_segmented_f_6_2").css( "fill", "#" + colors[5]);
					$("#band_segmented_f_6_1").css( "fill", "#" + colors[0]);

				}

				// Render SVG into Canvas
				return renderBand($("#svg_band_main").parent().html().trim(), "output_band_canvas", "output_band_image", "band_preview", style);

			} else if(style === "solid") {

				$("#band_solid_f").css("display", "block");

				// Set color
				$("#band_solid_f").css( "fill", "#" + colors[0]);

				// Render SVG into Canvas
				return renderBand($("#svg_band_main").parent().html().trim(), "output_band_canvas", "output_band_image", "band_preview", style);

			}

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
function renderBand(svg, canvas, image, preview, type) {

	// Get needed elements
	var can = document.getElementById(canvas);
	var img = document.getElementById(image);

	// Convert SVG to canvas using canvg.js
	canvg(can, svg);
	
	return can.toDataURL();
}
