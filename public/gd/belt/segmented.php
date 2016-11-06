<?php

	function generate_segmented($colors)
	{
		// Set colors as the image name
		$name = strtoupper(implode("-", $colors));

		// Check if image is already created.
		if (!file_exists("img/preview/regular/segmented/" . $name . ".png")) {

			header('Content-Type: image/png');

			$height = 54;
			$width = 950;

			// Base image
			// Set base color
			$hex_0 = '#'.$colors[0];

			// Declare image variables
			list( $r_0, $g_0, $b_0 ) = sscanf( $hex_0, "#%02x%02x%02x" );
			$img_0 = array(	'file'	 => 'img/belt/base.png',
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

			// Check available colors
			if ( count( $colors ) == 2 ) { // If 2 colors available

				// Set 1st color
				$hex_1 = '#'.$colors[1];

				// Declare image variables
				list( $r_1, $g_1, $b_1 ) = sscanf( $hex_1, "#%02x%02x%02x" );
				$img_1 = array(	'file'	 => 'img/belt/segmented-color-r-23456.png',
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

				// Clean Up
				imagedestroy( $img_1_dst );
				imagedestroy( $img_1_src );

			} else if ( count( $colors ) == 3 ) { // If 3 colors available

				// Set 1st color
				$hex_1 = '#'.$colors[2];

				// Declare image variables
				list( $r_1, $g_1, $b_1 ) = sscanf( $hex_1, "#%02x%02x%02x" );
				$img_1 = array(	'file'	 => 'img/belt/segmented-color-r-23456.png',
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


				// Set 2nd color
				$hex_2 = '#'.$colors[1];

				// Declare image variables
				list( $r_2, $g_2, $b_2 ) = sscanf( $hex_2, "#%02x%02x%02x" );
				$img_2 = array(	'file'	 => 'img/belt/segmented-color-m-3.png',
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
						$alpha = (imagecolorat( $img_2_src, $x, $y ) >> 24.9 & 0xFFFFFF);
						$col = imagecolorallocatealpha( $img_2_dst, $img_2['colorR'], $img_2['colorG'], $img_2['colorB'], $alpha );

						imagesetpixel( $img_2_dst, $x, $y, $col );
					}
				}

				// Merge 2nd image
				imagecopy( $img_0_dst, $img_2_dst, 0, 0, 0, 0, $width, $height );

				// Clean Up
				imagedestroy( $img_1_dst );
				imagedestroy( $img_1_src );
				imagedestroy( $img_2_dst );
				imagedestroy( $img_2_src );

			} else if ( count( $colors ) == 4 ) { // If 4 colors available

				// Set 1st color
				$hex_1 = '#'.$colors[3];

				// Declare image variables
				list( $r_1, $g_1, $b_1 ) = sscanf( $hex_1, "#%02x%02x%02x" );
				$img_1 = array(	'file'	 => 'img/belt/segmented-color-r-23456.png',
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


				// Set 2nd color
				$hex_2 = '#'.$colors[1];

				// Declare image variables
				list( $r_2, $g_2, $b_2 ) = sscanf( $hex_2, "#%02x%02x%02x" );
				$img_2 = array(	'file'	 => 'img/belt/segmented-color-l-4.png',
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
						$alpha = (imagecolorat( $img_2_src, $x, $y ) >> 24.9 & 0xFFFFFF);
						$col = imagecolorallocatealpha( $img_2_dst, $img_2['colorR'], $img_2['colorG'], $img_2['colorB'], $alpha );

						imagesetpixel( $img_2_dst, $x, $y, $col );
					}
				}

				// Merge 2nd image
				imagecopy( $img_0_dst, $img_2_dst, 0, 0, 0, 0, $width, $height );


				// Set 3rd color
				$hex_3 = '#'.$colors[2];

				// Declare image variables
				list( $r_3, $g_3, $b_3 ) = sscanf( $hex_3, "#%02x%02x%02x" );
				$img_3 = array(	'file'	 => 'img/belt/segmented-color-r-4.png',
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
						$alpha = (imagecolorat( $img_3_src, $x, $y ) >> 24.9 & 0xFFFFFF);
						$col = imagecolorallocatealpha( $img_3_dst, $img_3['colorR'], $img_3['colorG'], $img_3['colorB'], $alpha );

						imagesetpixel( $img_3_dst, $x, $y, $col );
					}
				}

				// Merge 3rd image
				imagecopy( $img_0_dst, $img_3_dst, 0, 0, 0, 0, $width, $height );

				// Clean Up
				imagedestroy( $img_1_dst );
				imagedestroy( $img_1_src );
				imagedestroy( $img_2_dst );
				imagedestroy( $img_2_src );
				imagedestroy( $img_3_dst );
				imagedestroy( $img_3_src );

			} else if ( count( $colors ) == 5 ) { // If 5 colors available

				// Set 1st color
				$hex_1 = '#'.$colors[4];

				// Declare image variables
				list( $r_1, $g_1, $b_1 ) = sscanf( $hex_1, "#%02x%02x%02x" );
				$img_1 = array(	'file'	 => 'img/belt/segmented-color-r-23456.png',
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


				// Set 2nd color
				$hex_2 = '#'.$colors[1];

				// Declare image variables
				list( $r_2, $g_2, $b_2 ) = sscanf( $hex_2, "#%02x%02x%02x" );
				$img_2 = array(	'file'	 => 'img/belt/segmented-color-l-5.png',
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
						$alpha = (imagecolorat( $img_2_src, $x, $y ) >> 24.9 & 0xFFFFFF);
						$col = imagecolorallocatealpha( $img_2_dst, $img_2['colorR'], $img_2['colorG'], $img_2['colorB'], $alpha );

						imagesetpixel( $img_2_dst, $x, $y, $col );
					}
				}

				// Merge 2nd image
				imagecopy( $img_0_dst, $img_2_dst, 0, 0, 0, 0, $width, $height );


				// Set 3rd color
				$hex_3 = '#'.$colors[3];

				// Declare image variables
				list( $r_3, $g_3, $b_3 ) = sscanf( $hex_3, "#%02x%02x%02x" );
				$img_3 = array(	'file'	 => 'img/belt/segmented-color-r-5.png',
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
						$alpha = (imagecolorat( $img_3_src, $x, $y ) >> 24.9 & 0xFFFFFF);
						$col = imagecolorallocatealpha( $img_3_dst, $img_3['colorR'], $img_3['colorG'], $img_3['colorB'], $alpha );

						imagesetpixel( $img_3_dst, $x, $y, $col );
					}
				}

				// Merge 3rd image
				imagecopy( $img_0_dst, $img_3_dst, 0, 0, 0, 0, $width, $height );


				// Set 4th color
				$hex_4 = '#'.$colors[2];

				// Declare image variables
				list( $r_4, $g_4, $b_4 ) = sscanf( $hex_4, "#%02x%02x%02x" );
				$img_4 = array(	'file'	 => 'img/belt/segmented-color-m-5.png',
								'colorR' => $r_4,
								'colorG' => $g_4,
								'colorB' => $b_4 );
				$img_4_src = imagecreatefrompng( $img_4['file'] );
				$img_4_w = imagesx( $img_4_src );
				$img_4_h = imagesy( $img_4_src );
				$img_4_dst = imagecreatefrompng( $img_4['file'] );

				// Let's make image background transparent
				imagefilledrectangle( $img_4_dst, 0, 0, $width, $height, 0xFF );
				imagefill( $img_4_dst, 0, 0, IMG_COLOR_TRANSPARENT );
				imagealphablending( $img_4_dst, true );
				imagesavealpha( $img_4_dst, true );

				// Apply filter to change image to desired color
				imagefilter( $img_4_dst, IMG_FILTER_NEGATE );
				imagefilter( $img_4_dst, IMG_FILTER_COLORIZE, $img_4['colorR'], $img_4['colorG'], $img_4['colorB'] );

				// Apply desired color and place proper alpha
				for( $x=0; $x < $img_4_w; $x++ ) {
					for( $y=0; $y < $img_4_h; $y++ ) {
						$alpha = (imagecolorat( $img_4_src, $x, $y ) >> 24.9 & 0xFFFFFF);
						$col = imagecolorallocatealpha( $img_4_dst, $img_4['colorR'], $img_4['colorG'], $img_4['colorB'], $alpha );

						imagesetpixel( $img_4_dst, $x, $y, $col );
					}
				}

				// Merge 4th image
				imagecopy( $img_0_dst, $img_4_dst, 0, 0, 0, 0, $width, $height );

				// Clean Up
				imagedestroy( $img_1_dst );
				imagedestroy( $img_1_src );
				imagedestroy( $img_2_dst );
				imagedestroy( $img_2_src );
				imagedestroy( $img_3_dst );
				imagedestroy( $img_3_src );
				imagedestroy( $img_4_dst );
				imagedestroy( $img_4_src );

			} else if ( count( $colors ) == 6 ) { // If 6 colors available

				// Set 1st color
				$hex_1 = '#'.$colors[5];

				// Declare image variables
				list( $r_1, $g_1, $b_1 ) = sscanf( $hex_1, "#%02x%02x%02x" );
				$img_1 = array(	'file'	 => 'img/belt/segmented-color-r-23456.png',
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


				// Set 2nd color
				$hex_2 = '#'.$colors[1];

				// Declare image variables
				list( $r_2, $g_2, $b_2 ) = sscanf( $hex_2, "#%02x%02x%02x" );
				$img_2 = array(	'file'	 => 'img/belt/segmented-color-l-6.png',
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
						$alpha = (imagecolorat( $img_2_src, $x, $y ) >> 24.9 & 0xFFFFFF);
						$col = imagecolorallocatealpha( $img_2_dst, $img_2['colorR'], $img_2['colorG'], $img_2['colorB'], $alpha );

						imagesetpixel( $img_2_dst, $x, $y, $col );
					}
				}

				// Merge 2nd image
				imagecopy( $img_0_dst, $img_2_dst, 0, 0, 0, 0, $width, $height );


				// Set 3rd color
				$hex_3 = '#'.$colors[4];

				// Declare image variables
				list( $r_3, $g_3, $b_3 ) = sscanf( $hex_3, "#%02x%02x%02x" );
				$img_3 = array(	'file'	 => 'img/belt/segmented-color-r-6.png',
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
						$alpha = (imagecolorat( $img_3_src, $x, $y ) >> 24.9 & 0xFFFFFF);
						$col = imagecolorallocatealpha( $img_3_dst, $img_3['colorR'], $img_3['colorG'], $img_3['colorB'], $alpha );

						imagesetpixel( $img_3_dst, $x, $y, $col );
					}
				}

				// Merge 3rd image
				imagecopy( $img_0_dst, $img_3_dst, 0, 0, 0, 0, $width, $height );


				// Set 4th color
				$hex_4 = '#'.$colors[2];

				// Declare image variables
				list( $r_4, $g_4, $b_4 ) = sscanf( $hex_4, "#%02x%02x%02x" );
				$img_4 = array(	'file'	 => 'img/belt/segmented-color-l-m-6.png',
								'colorR' => $r_4,
								'colorG' => $g_4,
								'colorB' => $b_4 );
				$img_4_src = imagecreatefrompng( $img_4['file'] );
				$img_4_w = imagesx( $img_4_src );
				$img_4_h = imagesy( $img_4_src );
				$img_4_dst = imagecreatefrompng( $img_4['file'] );

				// Let's make image background transparent
				imagefilledrectangle( $img_4_dst, 0, 0, $width, $height, 0xFF );
				imagefill( $img_4_dst, 0, 0, IMG_COLOR_TRANSPARENT );
				imagealphablending( $img_4_dst, true );
				imagesavealpha( $img_4_dst, true );

				// Apply filter to change image to desired color
				imagefilter( $img_4_dst, IMG_FILTER_NEGATE );
				imagefilter( $img_4_dst, IMG_FILTER_COLORIZE, $img_4['colorR'], $img_4['colorG'], $img_4['colorB'] );

				// Apply desired color and place proper alpha
				for( $x=0; $x < $img_4_w; $x++ ) {
					for( $y=0; $y < $img_4_h; $y++ ) {
						$alpha = (imagecolorat( $img_4_src, $x, $y ) >> 24.9 & 0xFFFFFF);
						$col = imagecolorallocatealpha( $img_4_dst, $img_4['colorR'], $img_4['colorG'], $img_4['colorB'], $alpha );

						imagesetpixel( $img_4_dst, $x, $y, $col );
					}
				}

				// Merge 4th image
				imagecopy( $img_0_dst, $img_4_dst, 0, 0, 0, 0, $width, $height );


				// Set 5th color
				$hex_5 = '#'.$colors[3];

				// Declare image variables
				list( $r_5, $g_5, $b_5 ) = sscanf( $hex_5, "#%02x%02x%02x" );
				$img_5 = array(	'file'	 => 'img/belt/segmented-color-r-m-6.png',
								'colorR' => $r_5,
								'colorG' => $g_5,
								'colorB' => $b_5 );
				$img_5_src = imagecreatefrompng( $img_5['file'] );
				$img_5_w = imagesx( $img_5_src );
				$img_5_h = imagesy( $img_5_src );
				$img_5_dst = imagecreatefrompng( $img_5['file'] );

				// Let's make image background transparent
				imagefilledrectangle( $img_5_dst, 0, 0, $width, $height, 0xFF );
				imagefill( $img_5_dst, 0, 0, IMG_COLOR_TRANSPARENT );
				imagealphablending( $img_5_dst, true );
				imagesavealpha( $img_5_dst, true );

				// Apply filter to change image to desired color
				imagefilter( $img_5_dst, IMG_FILTER_NEGATE );
				imagefilter( $img_5_dst, IMG_FILTER_COLORIZE, $img_5['colorR'], $img_5['colorG'], $img_5['colorB'] );

				// Apply desired color and place proper alpha
				for( $x=0; $x < $img_5_w; $x++ ) {
					for( $y=0; $y < $img_5_h; $y++ ) {
						$alpha = (imagecolorat( $img_5_src, $x, $y ) >> 24.9 & 0xFFFFFF);
						$col = imagecolorallocatealpha( $img_5_dst, $img_5['colorR'], $img_5['colorG'], $img_5['colorB'], $alpha );

						imagesetpixel( $img_5_dst, $x, $y, $col );
					}
				}

				// Merge 5th image
				imagecopy( $img_0_dst, $img_5_dst, 0, 0, 0, 0, $width, $height );

				// Clean Up
				imagedestroy( $img_1_dst );
				imagedestroy( $img_1_src );
				imagedestroy( $img_2_dst );
				imagedestroy( $img_2_src );
				imagedestroy( $img_3_dst );
				imagedestroy( $img_3_src );
				imagedestroy( $img_4_dst );
				imagedestroy( $img_4_src );
				imagedestroy( $img_5_dst );
				imagedestroy( $img_5_src );

			}


			// For image emboss effect
			// Declare image variables
			$img_emboss = imagecreatefrompng( 'img/belt/emboss.png' );

			// Let's make image background transparent
			// imagefilledrectangle( $img_emboss, 0, 0, $width, $height, 0xFF );
			imagefill( $img_emboss, 0, 0, IMG_COLOR_TRANSPARENT );
			imagealphablending( $img_emboss, true );
			imagesavealpha( $img_emboss, true );

			// Merge image emboss
			imagecopy( $img_0_dst, $img_emboss, 0, 0, 0, 0, $width, $height );

			// Check if image drectory is set
			if (!file_exists('img/preview/regular/segmented')) {
				mkdir('img/preview/regular/segmented', 0777, true); // If not, then create directory path
			}
			// Make image
			imagepng( $img_0_dst, "img/preview/regular/segmented/" . $name . ".png" );

			// Clean Up
			// Base Image
			imagedestroy( $img_0_dst );
			imagedestroy( $img_0_src );
			// Extras Design
			imagedestroy( $img_emboss );

		}

		echo( "/gd/img/preview/regular/segmented/" . $name . ".png" );

	}

?>
