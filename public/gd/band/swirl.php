<?php 

	function generate_swirl($colors) {

		header('Content-Type: image/png');

		$height = 189;
		$width = 220;

		// Base image
		// Set base color
		$hex_0 = '#'.$colors[0];

		// Declare image variables
		list( $r_0, $g_0, $b_0 ) = sscanf( $hex_0, "#%02x%02x%02x" );
		$img_0 = array(	'file'	 => 'img\band\base.png',
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


		// For image shadow effect >>>>>
		// Declare image variables
		$img_shadow = imagecreatefrompng( 'img\band\shadow.png' );

		// Let's make image background transparent
		imagefill( $img_shadow, 0, 0, IMG_COLOR_TRANSPARENT );
		imagealphablending( $img_shadow, true );
		imagesavealpha( $img_shadow, true );

		// Merge image shadow
		imagecopy( $img_0_dst, $img_shadow, 0, 0, 0, 0, $width, $height );


		// Apply desired color and place proper alpha
		for( $x=0; $x < $img_0_w; $x++ ) {
			for( $y=0; $y < $img_0_h; $y++ ) {
				$alpha = (imagecolorat( $img_0_src, $x, $y ) >> 24.9 & 0xFFFFFF);
				$col = imagecolorallocatealpha( $img_0_dst, $img_0['colorR'], $img_0['colorG'], $img_0['colorB'], $alpha );

				imagesetpixel( $img_0_dst, $x, $y, $col );
			}
		}


		// 1st image
		if ( isset( $colors[1] ) ) {

			// Set 1st color
			$hex_1 = '#'.$colors[1];

			// Declare image variables
			list( $r_1, $g_1, $b_1 ) = sscanf( $hex_1, "#%02x%02x%02x" );
			$img_1 = array(	'file'	 => 'img\band\swirl-color-1.png',
							'colorR' => $r_1,
							'colorG' => $g_1,
							'colorB' => $b_1 );
			$img_1_src = imagecreatefrompng( $img_1['file'] );
			$img_1_w = imagesx( $img_1_src );
			$img_1_h = imagesy( $img_1_src );
			$img_1_dst = imagecreatefrompng( $img_1['file'] );

			// Let's make image background transparent
			imagefilledrectangle( $img_1_dst, 0, 0, $width, $height, 0xFF );
			imagefill( $img_1_dst, 0, 0, IMG_COLOR_TRANSPARENT );
			imagealphablending( $img_1_dst, true );
			imagesavealpha( $img_1_dst, true );

			// Apply filter to change image to desired color
			imagefilter( $img_1_dst, IMG_FILTER_NEGATE ); 
			imagefilter( $img_1_dst, IMG_FILTER_COLORIZE, $img_1['colorR'], $img_1['colorG'], $img_1['colorB'] );

			// Apply desired color and place proper alpha
			for( $x=0; $x < $img_1_w; $x++ ) {
				for( $y=0; $y < $img_1_h; $y++ ) {
					$alpha = (imagecolorat( $img_1_src, $x, $y ) >> 24.9 & 0xFFFFFF);
					$col = imagecolorallocatealpha( $img_1_dst, $img_1['colorR'], $img_1['colorG'], $img_1['colorB'], $alpha );

					imagesetpixel( $img_1_dst, $x, $y, $col );
				}
			}

			// Merge 1st image
			imagecopy( $img_0_dst, $img_1_dst, 0, 0, 0, 0, $width, $height );

		}


		// 2nd image
		if ( isset( $colors[2] ) ) {

			// Set 2nd color
			$hex_2 = '#'.$colors[2];

			// Declare image variables
			list( $r_2, $g_2, $b_2 ) = sscanf( $hex_2, "#%02x%02x%02x" );
			$img_2 = array(	'file'	 => 'img\band\swirl-color-2.1.png',
							'colorR' => $r_2,
							'colorG' => $g_2,
							'colorB' => $b_2 );
			$img_2_src = imagecreatefrompng( $img_2['file'] );
			$img_2_w = imagesx( $img_2_src );
			$img_2_h = imagesy( $img_2_src );
			$img_2_dst = imagecreatefrompng( $img_2['file'] );

			// Let's make image background transparent
			imagefilledrectangle( $img_2_dst, 0, 0, $width, $height, 0xFF );
			imagefill( $img_2_dst, 0, 0, IMG_COLOR_TRANSPARENT );
			imagealphablending( $img_2_dst, true );
			imagesavealpha( $img_2_dst, true );

			// Apply filter to change image to desired color
			imagefilter( $img_2_dst, IMG_FILTER_NEGATE ); 
			imagefilter( $img_2_dst, IMG_FILTER_COLORIZE, $img_2['colorR'], $img_2['colorG'], $img_2['colorB'] );

			// Apply desired color and place proper alpha
			for( $x=0; $x < $img_2_w; $x++ ) {
				for( $y=0; $y < $img_2_h; $y++ ) {
					$alpha = (imagecolorat( $img_2_src, $x, $y ) >> 24 & 0xFF);
					$col = imagecolorallocatealpha( $img_2_dst, $img_2['colorR'], $img_2['colorG'], $img_2['colorB'], $alpha );
					imagesetpixel( $img_2_dst, $x, $y, $col );
				}
			}

			// Merge 2nd image
			imagecopy( $img_0_dst, $img_2_dst, 0, 0, 0, 0, $width, $height );

		}


		// 3rd image
		if ( isset( $colors[3] ) ) {

			// Set 3rd color
			$hex_3 = '#'.$colors[3];

			// Declare image variables
			list( $r_3, $g_3, $b_3 ) = sscanf( $hex_3, "#%02x%02x%02x" );
			$img_3 = array(	'file'	 => 'img\band\swirl-color-3.png',
							'colorR' => $r_3,
							'colorG' => $g_3,
							'colorB' => $b_3 );
			$img_3_src = imagecreatefrompng( $img_3['file'] );
			$img_3_w = imagesx( $img_3_src );
			$img_3_h = imagesy( $img_3_src );
			$img_3_dst = imagecreatefrompng( $img_3['file'] );

			// Let's make image background transparent
			imagefilledrectangle( $img_3_dst, 0, 0, $width, $height, 0xFF );
			imagefill( $img_3_dst, 0, 0, IMG_COLOR_TRANSPARENT );
			imagealphablending( $img_3_dst, true );
			imagesavealpha( $img_3_dst, true );

			// Apply filter to change image to desired color
			imagefilter( $img_3_dst, IMG_FILTER_NEGATE ); 
			imagefilter( $img_3_dst, IMG_FILTER_COLORIZE, $img_3['colorR'], $img_3['colorG'], $img_3['colorB'] );

			// Apply desired color and place proper alpha
			for( $x=0; $x < $img_3_w; $x++ ) {
				for( $y=0; $y < $img_3_h; $y++ ) {
					$alpha = (imagecolorat( $img_3_src, $x, $y ) >> 24 & 0xFF);
					$col = imagecolorallocatealpha( $img_3_dst, $img_3['colorR'], $img_3['colorG'], $img_3['colorB'], $alpha );
					imagesetpixel( $img_3_dst, $x, $y, $col );
				}
			}

			// Merge 3rd image
			imagecopy( $img_0_dst, $img_3_dst, 0, 0, 0, 0, $width, $height );

		}


		// For image shaded effect >>>>>
		// Declare image variables
		$img_shade = imagecreatefrompng( 'img\band\shade.png' );

		// Let's make image background transparent
		imagefill( $img_shade, 0, 0, IMG_COLOR_TRANSPARENT );
		imagealphablending( $img_shade, true );
		imagesavealpha( $img_shade, true );

		// Merge image shade
		imagecopy( $img_0_dst, $img_shade, 0, 0, 0, 0, $width, $height );


		imagepng( $img_0_dst );
		imagedestroy( $img_0_dst );

	}

?>