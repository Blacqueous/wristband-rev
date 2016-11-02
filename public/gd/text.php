<?php

	// Only allowed styles
	$list_style = array( 'deboss', 'emboss', 'emboss-print', 'print' );

	if( !isset( $_REQUEST['style'] ) ) {
		die('Error: Library not defined!');
	} else if ( !isset( $_REQUEST['text'] ) ) {
		die('Error: Library not defined!');
	} else if ( !isset( $_REQUEST['font'] ) ) {
		die('Error: Library not defined!');
	}

	$style = trim($_REQUEST['style']);
	$text = trim($_REQUEST['text']);
	$font = '../assets/fonts/'.trim($_REQUEST['font']).'.ttf';

	if ( !file_exists( $font ) ) {
		echo 'Error: Library not defined!';
		die;
	}

	// Check if style selected is valid
	if ( !in_array( $style, $list_style ) ) {
		echo 'Error: Library not defined!';
		die;
	}

	// Canvas size	
	$height = 100;
	$width = 3000;

	$font_size = 30;
	$font_pos_x = $width/2;
	$font_pos_y = $height/2;

	// Create the image
	$im = imagecreatetruecolor($width, $height);

	// Create some colors
	$black = imagecolorallocate($im, 0, 0, 0);
	$white = imagecolorallocate($im, 255, 255, 255);

	// imagefilledrectangle($im, 0, 0, $width, $height, 0xFFFFFF);
	imagefill($im, 0, 0, IMG_COLOR_TRANSPARENT);
	imagealphablending($im, true);
	imagesavealpha($im, true);

// 	// EMBOSSED ----------------------------------

// 	$lite = imagecolorallocatealpha($im, 255, 255, 255, 100);
// 	$dark = imagecolorallocatealpha($im, 0, 0, 0, 100);
// 	$rand1 = imagecolorallocatealpha($im, 150, 150, 150, 120);
// 	$rand2 = imagecolorallocatealpha($im, 0, 0, 0, 50);

// 	// imagettfstroketext($im, $font_size, 0, $font_pos_x, $font_pos_y, $dark, $dark, $font, $text, 1);

// 	imagettftext($im, $font_size, 0, $font_pos_x, $font_pos_y, $dark, $font, $text);
// 	// imagettftext($im, $font_size, 0, $font_pos_x+1, $font_pos_y, $dark, $font, $text);
// 	// imagettftext($im, $font_size, 0, $font_pos_x, $font_pos_y+1, $dark, $font, $text);

// 	imagettftext($im, $font_size, 0, $font_pos_x+2, $font_pos_y+2, $lite, $font, $text);
// 	// imagettftext($im, $font_size, 0, $font_pos_x+1, $font_pos_y+2, $lite, $font, $text);
// 	// imagettftext($im, $font_size, 0, $font_pos_x+2, $font_pos_y+1, $lite, $font, $text);

// 	imagettftext($im, $font_size, 0, $font_pos_x+1, $font_pos_y+1, $rand1, $font, $text);
// 	// imagettftext($im, $font_size, 0, $font_pos_x+1, $font_pos_y+1, $rand2, $font, $text);

// // $textDim = imagettfbbox($font_size, 0, $font, $text);
// // $textX = $textDim[2] - $textDim[0];
// // $textY = $textDim[7] - $textDim[1];

// // $text_posX = ($imageX / 2) - ($textX / 2);
// // $text_posY = ($imageY / 2) - ($textY / 2);

// // imagefilledrectangle($im, 10, 10, 100, 100, $lite);
// // imagettftext($im, $font_size, 0, 0, 0, $rand, $font, $text);


// 	// imagettftext($im, $font_size, 0, $font_pos_x+1, $font_pos_y-1, $lite, $font, $text);
// 	// imagettftext($im, $font_size, 0, $font_pos_x+1, $font_pos_y-1, $lite, $font, $text);
// 	// imagettftext($im, $font_size, 0, $font_pos_x-1, $font_pos_y+1, $lite, $font, $text);
// 	// imagettftext($im, $font_size, 0, $font_pos_x+1, $font_pos_y+1, $lite, $font, $text);
// 	// imagettftext($im, $font_size, 0, $font_pos_x+1, $font_pos_y+2, $lite, $font, $text);
// 	// imagettftext($im, $font_size, 0, $font_pos_x+1, $font_pos_y-1, $lite, $font, $text);
// 	// imagettftext($im, $font_size, 0, $font_pos_x+1, $font_pos_y, $lite, $font, $text);
// 	// imagettftext($im, $font_size, 0, $font_pos_x+1, $font_pos_y+1, $lite, $font, $text);

// 	// imagettftext($im, $font_size, 0, $font_pos_x-1, $font_pos_y-1, $dark, $font, $text);
// 	// imagettftext($im, $font_size, 0, $font_pos_x, $font_pos_y-1, $dark, $font, $text);
// 	// imagettftext($im, $font_size, 0, $font_pos_x-1, $font_pos_y, $dark, $font, $text);

// 	// imagettftext($im, $font_size, 0, $font_pos_x, $font_pos_y, $lite, $font, $text);
// 	// imagettftext($im, $font_size, 0, $font_pos_x, $font_pos_y+1, $lite, $font, $text);
// 	// imagettftext($im, $font_size, 0, $font_pos_x+1, $font_pos_y, $lite, $font, $text);

// 	// imagettftext($im, $font_size, 0, $font_pos_x+1, $font_pos_y+1, $dark, $font, $text);



// 	// imagettftext($im, $font_size, 0, $font_pos_x, $font_pos_y, imagecolorallocatealpha($im, 255, 0, 0, 0), $font, $text);

// 	// // imagettftext($im, $font_size, 0, $font_pos_x+2, $font_pos_y, $shadow, $font, $text);
// 	// // imagettftext($im, $font_size, 0, $font_pos_x, $font_pos_y+1, $shadow, $font, $text);
// 	// // imagettftext($im, $font_size, 0, $font_pos_x, $font_pos_y+2, $shadow, $font, $text);
// 	// // imagettftext($im, $font_size, 0, $font_pos_x, $font_pos_y+2, $shadow, $font, $text);
// 	// // imagettftext($im, $font_size, 0, $font_pos_x+2, $font_pos_y+2, $light, $font, $text);

// 	// // $light = imagecolorallocate($im, 255, 255, 255);
// 	// // $shadow = imagecolorallocate($im, 0, 0, 0);

// 	// // imagettftext($im, $font_size, 0, $font_pos_x+2, $font_pos_y+2, $light, $font, $text);
// 	// imagettftext($im, $font_size, 0, $font_pos_x+2, $font_pos_y+2, $light, $font, $text);
// 	// imagettftext($im, $font_size, 0, $font_pos_x, $font_pos_y, $shadow, $font, $text);
// 	// imagettftext($im, $font_size, 0, $font_pos_x+2, $font_pos_y+2, $light, $font, $text);
// 	// imagettftext($im, $font_size, 0, $font_pos_x, $font_pos_y, $shadow, $font, $text);
// 	// // imagettftext($im, $font_size, 0, $font_pos_x, $font_pos_y, $shadow, $font, $text);
// 	// // imagettftext($im, $font_size, 0, $font_pos_x, $font_pos_y, $shadow, $font, $text);
// 	// // imagettftext($im, $font_size, 0, $font_pos_x, $font_pos_y, $shadow, $font, $text);

// 	// END ----------------------------------


// 	// imagefilter($im, IMG_FILTER_BRIGHTNESS, 100);
// 	// imagealphablending($im, true);

// 	$b_top = $b_btm = $b_lft = $b_rt = 0;

// 	// Top whitespace
// 	for( ; $b_top < imagesy( $im ); ++$b_top ) {
// 		for( $x = 0; $x < imagesx( $im ); ++$x ) {
// 			if( imagecolorat( $im, $x, $b_top ) != IMG_COLOR_TRANSPARENT ) {
// 				break 2; //out of the 'top' loop
// 			}
// 		}
// 	}

// 	// Bottom whitespace
// 	for( ; $b_btm < imagesy( $im ); ++$b_btm ) {
// 		for( $x = 0; $x < imagesx( $im ); ++$x ) {
// 			if( imagecolorat( $im, $x, imagesy( $im ) - $b_btm-1) != IMG_COLOR_TRANSPARENT ) {
// 				break 2; //out of the 'bottom' loop
// 			}
// 		}
// 	}

// 	// Left whitespace
// 	for( ; $b_lft < imagesx( $im ); ++$b_lft ) {
// 		for( $y = 0; $y < imagesy( $im ); ++$y ) {
// 			if( imagecolorat( $im, $b_lft, $y ) != IMG_COLOR_TRANSPARENT ) {
// 				break 2; //out of the 'left' loop
// 			}
// 		}
// 	}

// 	// Right whitespace
// 	for( ; $b_rt < imagesx( $im ); ++$b_rt ) {
// 		for( $y = 0; $y < imagesy( $im ); ++$y ) {
// 			if( imagecolorat( $im, imagesx( $im ) - $b_rt-1, $y ) != IMG_COLOR_TRANSPARENT ) {
// 				break 2; //out of the 'right' loop
// 			}
// 		} 
// 	}

// 	// $newSize = getTextSize($im);
// 	$newSize = array('height' => imagesy($im) - ($b_top + $b_btm), 'width' => imagesx($im) - ($b_lft + $b_rt));

// 	//copy the contents, excluding the border
// 	$newimg = imagecreatetruecolor($newSize['width']+2, $newSize['height']+2);

// 	// imagefilledrectangle($newimg, 0, 0, imagesx($im), imagesy($im), imagecolorallocate($im, 0, 0, 0));
// 	imagefilledrectangle($newimg, 0, 0, imagesx($im), imagesy($im), imagecolorallocate($im, 0, 255, 255));
// 	// imagefill($newimg, 0, 0, IMG_COLOR_TRANSPARENT);
// 	// imagealphablending($newimg, true);
// 	// imagesavealpha($newimg, true);

// 	$newwidth = imagesx($im);
// 	$newheight = imagesy($im);

// 	// Resize
// 	imagecopy($newimg, $im, 0, 0, $b_lft-1, $b_top-1, $newwidth, $newheight);
// 	// imagecopy( $newimg, $img_light, 0, 0, $b_lft - 1, $b_top - 1, $newwidth, $newheight );
// 	// imagecopy( $newimg, $img_shadow, 0, 0, $b_lft - 1, $b_top - 1, $newwidth, $newheight );


// $old = $newimg;
// $new = $newimg;
// $img_1_w = imagesx($old);
// $img_1_h = imagesy($old);


// 		// // Apply desired color and place proper alpha
// 		// for($x=0; $x < $img_1_w; $x++) {
// 		// 	for($y=0; $y < $img_1_h; $y++) {
// 		// 		$alpha = (imagecolorat($old, $x, $y) >> 24.9 & 0xFF);
// 		// 		$col = imagecolorallocatealpha($new, 255, 255, 0, 100);
// 		// 		imagesetpixel($new, $x, $y, $col);
// 		// 	}
// 		// }


// 	// Set the content-type
// 	header('Content-Type: image/png');

// 	// Using imagepng() results in clearer text compared with imagejpeg()
// 	// imagepng($newimg);
// 	// imagedestroy($newimg);
// 	// imagedestroy($im);
// 	imagepng($new);




	// EMBOSSED ----------------------------------

	$lite = imagecolorallocatealpha($im, 255, 255, 255, 0);
	$dark = imagecolorallocatealpha($im, 0, 0, 0, 0);
	$rand1 = imagecolorallocatealpha($im, 255, 0, 0, 0);
	$rand2 = imagecolorallocatealpha($im, 0, 0, 0, 0);

	imagettftext($im, $font_size, 0, $font_pos_x+2, $font_pos_y+2, $lite, $font, $text);
	imagettftext($im, $font_size, 0, $font_pos_x+1, $font_pos_y+2, $lite, $font, $text);
	imagettftext($im, $font_size, 0, $font_pos_x, $font_pos_y, $dark, $font, $text);
	imagettftext($im, $font_size, 0, $font_pos_x+1, $font_pos_y+1, $rand1, $font, $text);

	$b_top = $b_btm = $b_lft = $b_rt = 0;

	// Top whitespace
	for( ; $b_top < imagesy( $im ); ++$b_top ) {
		for( $x = 0; $x < imagesx( $im ); ++$x ) {
			if( imagecolorat( $im, $x, $b_top ) != IMG_COLOR_TRANSPARENT ) {
				break 2; //out of the 'top' loop
			}
		}
	}

	// Bottom whitespace
	for( ; $b_btm < imagesy( $im ); ++$b_btm ) {
		for( $x = 0; $x < imagesx( $im ); ++$x ) {
			if( imagecolorat( $im, $x, imagesy( $im ) - $b_btm-1) != IMG_COLOR_TRANSPARENT ) {
				break 2; //out of the 'bottom' loop
			}
		}
	}

	// Left whitespace
	for( ; $b_lft < imagesx( $im ); ++$b_lft ) {
		for( $y = 0; $y < imagesy( $im ); ++$y ) {
			if( imagecolorat( $im, $b_lft, $y ) != IMG_COLOR_TRANSPARENT ) {
				break 2; //out of the 'left' loop
			}
		}
	}

	// Right whitespace
	for( ; $b_rt < imagesx( $im ); ++$b_rt ) {
		for( $y = 0; $y < imagesy( $im ); ++$y ) {
			if( imagecolorat( $im, imagesx( $im ) - $b_rt-1, $y ) != IMG_COLOR_TRANSPARENT ) {
				break 2; //out of the 'right' loop
			}
		} 
	}

	// $newSize = getTextSize($im);
	$newSize = array('height' => imagesy($im) - ($b_top + $b_btm), 'width' => imagesx($im) - ($b_lft + $b_rt));

	//copy the contents, excluding the border
	$newimg = imagecreatetruecolor($newSize['width']+2, $newSize['height']+2);

	imagefilledrectangle($newimg, 0, 0, imagesx($im), imagesy($im), imagecolorallocate($im, 255, 0, 0));
	// imagefill($newimg, 0, 0, IMG_COLOR_TRANSPARENT);
	// imagealphablending($newimg, true);
	// imagesavealpha($newimg, true);

	$newwidth = imagesx($im);
	$newheight = imagesy($im);

	// Resize
	imagecopy($newimg, $im, 0, 0, $b_lft-1, $b_top-1, $newwidth, $newheight);

	$old = $newimg;
	$new = $newimg;
	$img_1_w = imagesx($old);
	$img_1_h = imagesy($old);
// var_dump($img_1_w, $img_1_h);
// die;
	// Apply desired color and place proper alpha
	for($x=0; $x < $img_1_w; $x++) {
		for($y=0; $y < $img_1_h; $y++) {
			$alpha = imagecolorat($old, $x, $y);
			print_r($alpha);
			// $col = imagecolorallocatealpha($new, 255, 255, 0, 100);
			// imagesetpixel($new, $x, $y, $col);
		}
		echo("<br/>");
	}
die;
	// Set the content-type
	header('Content-Type: image/png');

	// Using imagepng() results in clearer text compared with imagejpeg()
	imagepng($newimg);





























// 	function imagettfstroketext(&$image, $size, $angle, $x, $y, &$textcolor, &$strokecolor, $fontfile, $text, $px) {
// 		for($c1 = ($x-abs($px)); $c1 <= ($x+abs($px)); $c1++){
// 			for($c2 = ($y-abs($px)); $c2 <= ($y+abs($px)); $c2++){
// 				$bg = imagettftext($image, $size, $angle, $c1, $c2, $strokecolor, $fontfile, $text);
// 				// $bg = imagettftext($image, $size, $angle, $c1+1, $c2+1, $textcolor, $fontfile, $text);
// 				// imagettftext($image, $size, $angle, $c1-1, $c2-1, imagecolorallocatealpha($image, 0, 0, 0, 0), $fontfile, $text);
// 				// imagettftext($image, $size, $angle, $c1, $c2, imagecolorallocatealpha($image, 255, 255, 255, 0), $fontfile, $text);
// 				// imagettftext($image, $size, $angle, $c1, $c2, imagecolorallocatealpha($image, 0, 0, 0, 0), $fontfile, $text);
// 				// imagettftext($image, $size, $angle, $c1+1, $c2+1, imagecolorallocatealpha($image, 120, 120, 120, 0), $fontfile, $text);
// 			}
// 		}
// 		// return imagettftext($image, $size, $angle, $x-1, $y-1, imagecolorallocatealpha($image, 245, 0, 0, 0), $fontfile, $text);
// 		// return imagettftext($image, $size, $angle, $x, $y, $textcolor, $fontfile, $text);
// 	}

// 	// split rgb to components
// 	function rgb_to_array($rgb) {
// 		$a[0] = ($rgb >> 16) & 0x0000FF;
// 		$a[1] = ($rgb >> 8) & 0x0000FF;
// 		$a[2] = $rgb & 0x0000FF;
// 		return $a;
// 	}


// // // Create a 300x150 image
// // $im = imagecreatetruecolor(300, 150);
// // $black = imagecolorallocate($im, 0, 0, 0);
// // $white = imagecolorallocatealpha($im, 255, 255, 255, 0);

// // // Set the background to be white
// // imagefilledrectangle($im, 0, 0, 299, 299, imagecolorallocate($im, 255, 0, 0));

// // // Path to our font file
// // // $font = './arial.ttf';

// // // First we create our bounding box for the first text
// // $bbox = imagettfbbox(10, 45, $font, 'Powered by PHP ' . phpversion());

// // // This is our cordinates for X and Y
// // $x = $bbox[0] + (imagesx($im) / 2) - ($bbox[4] / 2) - 25;
// // $y = $bbox[1] + (imagesy($im) / 2) - ($bbox[5] / 2) - 5;

// // // Write it
// // imagettftext($im, 10, 0, $x, $y, $black, $font, 'Powered by PHP ' . phpversion());

// // // Create the next bounding box for the second text
// // $bbox = imagettfbbox(10, 45, $font, 'and Zend Engine ' . zend_version());

// // // Set the cordinates so its next to the first text
// // // $x = $bbox[0] + (imagesx($im) / 2) - ($bbox[4] / 2) - 50;
// // // $y = $bbox[1] + (imagesy($im) / 2) - ($bbox[5] / 2) - 25;
// // $x = 2;
// // $y = imagesy($im)/2;

// // // Write it
// // imagettftext($im, 20, 0, $x+2, $y+2, $black, $font, 'and Zend Engine ' . zend_version());
// // imagettftext($im, 20, 0, $x, $y, $white, $font, 'and Zend Engine ' . zend_version());

// // // Output to browser
// // header('Content-Type: image/png');

// // imagepng($im);
// // imagedestroy($im);

// // Setup an anti-aliased image and a normal image
// $aa = imagecreatetruecolor(400, 100);
// $normal = imagecreatetruecolor(200, 100);

// // Switch antialiasing on for one image
// imageantialias($aa, true);

// // Allocate colors
// $red = imagecolorallocate($normal, 255, 0, 0);
// $red_aa = imagecolorallocate($aa, 255, 0, 0);

// // Draw two lines, one with AA enabled
// imageline($normal, 0, 0, 200, 100, $red);
// imageline($aa, 0, 0, 200, 100, $red_aa);

// // Merge the two images side by side for output (AA: left, Normal: Right)
// imagecopymerge($aa, $normal, 200, 0, 0, 0, 200, 100, 100);

// // Output image
// header('Content-type: image/png');

// imagepng($aa);
// imagedestroy($aa);
// imagedestroy($normal);





	?>