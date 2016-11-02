<?php 

	function generate_fig_solid($colors) {

		header('Content-Type: image/png');

		$height = 94;
		$width = 950;

		// Base image
		// Set base color
		$hex_0 = '#'.$colors[0];

		// Declare image variables
		list( $r_0, $g_0, $b_0 ) = sscanf( $hex_0, "#%02x%02x%02x" );
		$img_0 = array(	'file'	 => 'img/belt/fig-base.png',
						'colorR' => $r_0,
						'colorG' => $g_0,
						'colorB' => $b_0 );
		$img_0_src = imagecreatefrompng( $img_0['file'] );
		$img_0_w = imagesx( $img_0_src );
		$img_0_h = imagesy( $img_0_src );
		$img_0_dst = imagecreatefrompng( $img_0['file'] );

		// Let's make image background transparent
		imagefilledrectangle( $img_0_dst, 0, 0, $width, $height, 0xFF );
		imagefill( $img_0_dst, 0, 0, IMG_COLOR_TRANSPARENT );
		imagealphablending( $img_0_dst, true );
		imagesavealpha( $img_0_dst, true );

		// Apply filter to change image to desired color
		imagefilter( $img_0_dst, IMG_FILTER_NEGATE ); 
		imagefilter( $img_0_dst, IMG_FILTER_COLORIZE, $img_0['colorR'], $img_0['colorG'], $img_0['colorB'] );

		// Apply desired color and place proper alpha
		for( $x=0; $x < $img_0_w; $x++ ) {
			for( $y=0; $y < $img_0_h; $y++ ) {
				$alpha = (imagecolorat( $img_0_src, $x, $y ) >> 24.9 & 0xFFFFFF);
				$col = imagecolorallocatealpha( $img_0_dst, $img_0['colorR'], $img_0['colorG'], $img_0['colorB'], $alpha );

				imagesetpixel( $img_0_dst, $x, $y, $col );
			}
		}


		// For image emboss effect
		// Declare image variables
		$img_emboss = imagecreatefrompng( 'img/belt/fig-emboss.png' );

		// Let's make image background transparent
		// imagefilledrectangle( $img_emboss, 0, 0, $width, $height, 0xFF );
		imagefill( $img_emboss, 0, 0, IMG_COLOR_TRANSPARENT );
		imagealphablending( $img_emboss, true );
		imagesavealpha( $img_emboss, true );

		// Merge image emboss
		imagecopy( $img_0_dst, $img_emboss, 0, 0, 0, 0, $width, $height );

		// -----------
		// Make image
		imagepng( $img_0_dst );

		// Clean Up
		// Base Image
		imagedestroy( $img_0_dst );
		imagedestroy( $img_0_src );
		// Extras Design
		imagedestroy( $img_emboss );

	}

?>