<?php

	include_once 'band/solid.php';
	include_once 'band/segmented.php';
	include_once 'band/swirl.php';

	// Only allowed styles
	$list_style = array( 'solid', 'segmented', 'swirl' );

	if( !isset( $_REQUEST['style'] ) ) {
		die('Error: Library not defined!');
	} else if ( !isset( $_REQUEST['color'] ) ) {
		die('Error: Library not defined!');
	}

	$style = trim($_REQUEST['style']);
	$color = explode( ',', trim($_REQUEST['color']));

	// Check if style selected is valid
	if ( !in_array( $style, $list_style ) ) {
		die('Error: Library not defined!');
	}

	// Check all colors
	foreach ( $color as $clr ) {
		// Check if hex color is valid
		if ( !ctype_xdigit( $clr ) ) {
			die('Error: Library not defined!');
		}
	}

	// Check selected colors
	if ( $style == 'solid' ) {

		// Check maximum & minimum color count
		if ( count( $color ) == 1 ) {
			generate_solid($color);
		}

	} else if ( $style == 'segmented' ) {

		// Check maximum & minimum color count
		if ( count( $color ) <= 6 && count( $color ) >= 1 ) {
			generate_segmented($color);
		}

	} else if ( $style == 'swirl' ) {

		// Check maximum & minimum color count
		if ( count( $color ) <= 4 && count( $color ) >= 1 ) {
			generate_swirl($color);
		}

	}

	die('Error: Library not defined!');

?>
