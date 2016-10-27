<?php

namespace App\Wristbands\Classes;

use Storage;

class Colors {

	public function reset()
	{
		// regular style wristbands.
		Storage::put('json/wristband/colors/regular.json', json_encode($this->regular()));
		Storage::put('json/wristband/colors/regularLarge.json', json_encode($this->regularLarge()));
		Storage::put('json/wristband/colors/regularThin.json', json_encode($this->regularThin()));
		// dual style wristbands.
		Storage::put('json/wristband/colors/dual.json', json_encode($this->dual()));
		Storage::put('json/wristband/colors/dualLarge.json', json_encode($this->dualLarge()));
		// figured style wristbands.
		Storage::put('json/wristband/colors/figured.json', json_encode($this->figured()));
		Storage::put('json/wristband/colors/figuredLarge.json', json_encode($this->figuredLarge()));
	}

    public function getColorByStyleSize($style='printed', $size='0-50inch')
    {
		switch ($style) {
            case 'dual-layer':
				if($size == '0-50inch') {
					return $this->getDual();
				} else {

					return $this->getDualLarge();
				}
                break;

            case 'figured':
				if($size == '0-50inch') {
					return $this->getFigured();
				} else {
					return $this->getFiguredLarge();
				}
                break;

            default:
				if($size == '0-25inch') {
					return $this->getRegularThin();
				} else if($size == '0-50inch') {
					return $this->getRegular();
				} else {
					return $this->getRegularLarge();
				}
                break;
        }
	}

	public function getRegular()
	{
		// check if .json file exists.
		if(!Storage::has('json/wristband/colors/regular.json')) {
			// generate and save .json file.
			Storage::put('json/wristband/colors/regular.json', json_encode($this->regular()));
		}
		// return data from .json file.
		return json_decode(Storage::get('json/wristband/colors/regular.json'), true);
	}

	public function getRegularLarge()
	{
		// check if .json file exists.
		if(!Storage::has('json/wristband/colors/regularLarge.json')) {
			// generate and save .json file.
			Storage::put('json/wristband/colors/regularLarge.json', json_encode($this->regularLarge()));
		}
		// return data from .json file.
		return json_decode(Storage::get('json/wristband/colors/regularLarge.json'), true);
	}

	public function getRegularThin()
	{
		// check if .json file exists.
		if(!Storage::has('json/wristband/colors/regularThin.json')) {
			// generate and save .json file.
			Storage::put('json/wristband/colors/regularThin.json', json_encode($this->regularThin()));
		}
		// return data from .json file.
		return json_decode(Storage::get('json/wristband/colors/regularThin.json'), true);
	}

	public function getDual()
	{
		// check if .json file exists.
		if(!Storage::has('json/wristband/colors/dual.json')) {
			// generate and save .json file.
			Storage::put('json/wristband/colors/dual.json', json_encode($this->dual()));
		}
		// return data from .json file.
		return json_decode(Storage::get('json/wristband/colors/dual.json'), true);
	}

	public function getDualLarge()
	{
		// check if .json file exists.
		if(!Storage::has('json/wristband/colors/dualLarge.json')) {
			// generate and save .json file.
			Storage::put('json/wristband/colors/dualLarge.json', json_encode($this->dualLarge()));
		}
		// return data from .json file.
		return json_decode(Storage::get('json/wristband/colors/dualLarge.json'), true);
	}

	public function getFigured()
	{
		// check if .json file exists.
		if(!Storage::has('json/wristband/colors/figured.json')) {
			// generate and save .json file.
			Storage::put('json/wristband/colors/figured.json', json_encode($this->figured()));
		}
		// return data from .json file.
		return json_decode(Storage::get('json/wristband/colors/figured.json'), true);
	}

	public function getFiguredLarge()
	{
		// check if .json file exists.
		if(!Storage::has('json/wristband/colors/figuredLarge.json')) {
			// generate and save .json file.
			Storage::put('json/wristband/colors/figuredLarge.json', json_encode($this->figuredLarge()));
		}
		// return data from .json file.
		return json_decode(Storage::get('json/wristband/colors/figuredLarge.json'), true);
	}

	private static function regular()
	{
        return [
			'solid' => [
				[
					'code' => 'Black',
					'hex' => ['000000'],
					'image' => 'assets/images/src/solid/Black.png',
					'name' => 'Black'
				],
				[
					'code' => 'Brown',
					'hex' => ['6A491A'],
					'image' => 'assets/images/src/solid/Brown.png',
					'name' => 'Brown'
				],
				[
					'code' => 'Green',
					'hex' => ['0E9543'],
					'image' => 'assets/images/src/solid/Green.png',
					'name' => 'Green'
				],
				[
					'code' => 'Grey',
					'hex' => ['A0A29F'],
					'image' => 'assets/images/src/solid/Grey.png',
					'name' => 'Grey'
				],
				[
					'code' => 'Hot Pink',
					'hex' => ['FD029A'],
					'image' => 'assets/images/src/solid/HotPink.png',
					'name' => 'Hot Pink'
				],
				[
					'code' => 'Light Blue',
					'hex' => ['9ABFE5'],
					'image' => 'assets/images/src/solid/LightBlue.png',
					'name' => 'Light Blue'
				],
				[
					'code' => 'Light Pink',
					'hex' => ['F997B7'],
					'image' => 'assets/images/src/solid/LightPink.png',
					'name' => 'Light Pink'
				],
				[
					'code' => 'Lime Green',
					'hex' => ['8CD50B'],
					'image' => 'assets/images/src/solid/LimeGreen.png',
					'name' => 'Lime Green'
				],
				[
					'code' => 'Maroon',
					'hex' => ['891C2E'],
					'image' => 'assets/images/src/solid/Maroon.png',
					'name' => 'Maroon'
				],
				[
					'code' => 'Metallic Gold',
					'hex' => ['836F3D'],
					'image' => 'assets/images/src/solid/MetallicGold.png',
					'name' => 'Metallic Gold'
				],
				[
					'code' => 'Metallic Silver',
					'hex' => ['8D8F8C'],
					'image' => 'assets/images/src/solid/MetallicSilver.png',
					'name' => 'Metallic Silver'
				],
				[
					'code' => 'Navy Blue',
					'hex' => ['01214E'],
					'image' => 'assets/images/src/solid/NavyBlue.png',
					'name' => 'Navy Blue'
				],
				[
					'code' => 'Orange',
					'hex' => ['EF6B01'],
					'image' => 'assets/images/src/solid/Orange.png',
					'name' => 'Orange'
				],
				[
					'code' => 'Pantone 117',
					'hex' => ['D5A927'],
					'image' => 'assets/images/src/solid/PANTONE117.png',
					'name' => 'Metallic Gold'
				],
				[
					'code' => 'Pantone 326',
					'hex' => ['00B2AC'],
					'image' => 'assets/images/src/solid/PANTONE326.png',
					'name' => 'Blue Green'
				],
				[
					'code' => 'Pantone 528',
					'hex' => ['AD71C5'],
					'image' => 'assets/images/src/solid/PANTONE528.png',
					'name' => 'Purple'
				],
				[
					'code' => 'Pantone 551',
					'hex' => ['A0B8C2'],
					'image' => 'assets/images/src/solid/PANTONE551.png',
					'name' => 'Silver'
				],
				[
					'code' => 'Pantone 553',
					'hex' => ['22452D'],
					'image' => 'assets/images/src/solid/PANTONE553.png',
					'name' => 'Dark Green'
				],
				[
					'code' => 'Pantone 564',
					'hex' => ['8DBDBF'],
					'image' => 'assets/images/src/solid/PANTONE564.png',
					'name' => 'Light Blue'
				],
				[
					'code' => 'Pantone 2587',
					'hex' => ['8643A4'],
					'image' => 'assets/images/src/solid/PANTONE2587.png',
					'name' => 'Lavender'
				],
				[
					'code' => 'Pantone 3005',
					'hex' => ['3B83CB'],
					'image' => 'assets/images/src/solid/PANTONE3005.png',
					'name' => 'Cornflower Blue'
				],
				[
					'code' => 'Pantone 4725',
					'hex' => ['B99474'],
					'image' => 'assets/images/src/solid/PANTONE4725.png',
					'name' => 'Khaki'
				],
				[
					'code' => 'Pantone 5435',
					'hex' => ['A1B5BE'],
					'image' => 'assets/images/src/solid/PANTONE5435.png',
					'name' => 'Blue Gray'
				],
				[
					'code' => 'Pantone 461',
					'hex' => ['0086BA'],
					'image' => 'assets/images/src/solid/PANTONE7461.png',
					'name' => 'True Blue'
				],
				[
					'code' => 'Pantone 498',
					'hex' => ['50582E'],
					'image' => 'assets/images/src/solid/PANTONE7498.png',
					'name' => 'Dark Moss Green'
				],
				[
					'code' => 'Process Blue',
					'hex' => ['0F8CCC'],
					'image' => 'assets/images/src/solid/ProcessBlue.png',
					'name' => 'Process Blue'
				],
				[
					'code' => 'Red',
					'hex' => ['EA0D2C'],
					'image' => 'assets/images/src/solid/Red.png',
					'name' => 'Red'
				],
				[
					'code' => 'Reflex Blue',
					'hex' => ['191597'],
					'image' => 'assets/images/src/solid/ReflexBlue.png',
					'name' => 'Reflex Blue'
				],
				[
					'code' => 'Teal',
					'hex' => ['079CA5'],
					'image' => 'assets/images/src/solid/Teal.png',
					'name' => 'Teal'
				],
				[
					'code' => 'Violet',
					'hex' => ['5A108B'],
					'image' => 'assets/images/src/solid/Violet.png',
					'name' => 'Violet'
				],
				[
					'code' => 'White',
					'hex' => ['FFFFFF'],
					'image' => 'assets/images/src/solid/White.png',
					'name' => 'White'
				],
				[
					'code' => 'Yellow',
					'hex' => ['F2E80F'],
					'image' => 'assets/images/src/solid/Yellow.png',
					'name' => 'Yellow'
				]
			],
			'segmented' => [
				[
					'code' => 'Black Green',
					'hex' => ['000000', '0E9543'],
					'image' => 'assets/images/src/segmented/BlackGreen.png',
					'name' => 'Black Green'
				],
				[
					'code' => 'Black Hot Pink',
					'hex' => ['000000', 'FD029A'],
					'image' => 'assets/images/src/segmented/BlackHotPink.png',
					'name' => 'Black Hot Pink'
				],
				[
					'code' => 'Black Metallic Gold',
					'hex' => ['000000', '836F3D'],
					'image' => 'assets/images/src/segmented/BlackMetallicGold.png',
					'name' => 'Black Metallic Gold'
				],
				[
					'code' => 'Black Metallic Silver',
					'hex' => ['000000', '8D8F8C'],
					'image' => 'assets/images/src/segmented/BlackMetallicSilver.png',
					'name' => 'Black Metallic Silver'
				],
				[
					'code' => 'Black Orange',
					'hex' => ['000000', 'EF6B01'],
					'image' => 'assets/images/src/segmented/BlackOrange.png',
					'name' => 'Black Orange'
				],
				[
					'code' => 'Black Pantone 267',
					'hex' => ['000000', '5A108B'],
					'image' => 'assets/images/src/segmented/BlackPANTONE267.png',
					'name' => 'Black Purple'
				],
				[
					'code' => 'Black Reflex Blue',
					'hex' => ['000000', '191597'],
					'image' => 'assets/images/src/segmented/BlackReflexBlue.png',
					'name' => 'Black Reflex Blue'
				],
				[
					'code' => 'Black White',
					'hex' => ['000000', 'FFFFFF'],
					'image' => 'assets/images/src/segmented/BlackWhite.png',
					'name' => 'Black White'
				],
				[
					'code' => 'Black Yellow',
					'hex' => ['000000', 'F2E80F'],
					'image' => 'assets/images/src/segmented/BlackYellow.png',
					'name' => 'Black Yellow'
				],
				[
					'code' => 'Blue Grey',
					'hex' => ['0B45BB', 'A0A29F'],
					'image' => 'assets/images/src/segmented/BlueGrey.png',
					'name' => 'Blue Grey'
				],
				[
					'code' => 'Blue Hot Pink',
					'hex' => ['0B45BB', 'FD029A'],
					'image' => 'assets/images/src/segmented/BlueHotPink.png',
					'name' => 'Blue Hot Pink'
				],
				[
					'code' => 'Blue Light Blue',
					'hex' => ['0B45BB', '9ABFE5'],
					'image' => 'assets/images/src/segmented/BlueLightBlue.png',
					'name' => 'Blue Light Blue'
				],
				[
					'code' => 'Blue Pantone267 Red',
					'hex' => ['0B45BB', '5A108B', 'EA0D2C'],
					'image' => 'assets/images/src/segmented/BluePANTONE267Red.png',
					'name' => 'Blue Violet Red'
				],
				[
					'code' => 'Green Red Yellow',
					'hex' => ['0E9543', 'EA0D2C', 'F2E80F'],
					'image' => 'assets/images/src/segmented/GreenRedYellow.png',
					'name' => 'Green Red Yellow'
				],
				[
					'code' => 'Green Reflex Blue',
					'hex' => ['0E9543', '191597'],
					'image' => 'assets/images/src/segmented/GreenReflexBlue.png',
					'name' => 'Green Reflex Blue'
				],
				[
					'code' => 'Hot Pink Black Blue',
					'hex' => ['FD029A', '000000', '0B45BB'],
					'image' => 'assets/images/src/segmented/HotPinkBlackBlue.png',
					'name' => 'Hot Pink Black Blue'
				],
				[
					'code' => 'Hot Pink Light Blue',
					'hex' => ['FD029A', '9ABFE5'],
					'image' => 'assets/images/src/segmented/HotPinkLightBlue.png',
					'name' => 'Hot Pink Light Blue'
				],
				[
					'code' => 'Light Pink Hot Pink',
					'hex' => ['FD029A', 'F997B7'],
					'image' => 'assets/images/src/segmented/LightPinkHotPink.png',
					'name' => 'Light Pink Hot Pink'
				],
				[
					'code' => 'Maroon Grey',
					'hex' => ['891C2E', 'A0A29F'],
					'image' => 'assets/images/src/segmented/MaroonGrey.png',
					'name' => 'Maroon Grey'
				],
				[
					'code' => 'Orange Blue',
					'hex' => ['EF6B01', 'A0A29F'],
					'image' => 'assets/images/src/segmented/OrangeBlue.png',
					'name' => 'Orange Blue'
				],
				[
					'code' => 'Gold Purple',
					'hex' => ['C1A900', '5A108B'],
					'image' => 'assets/images/src/segmented/PANTONE103.png',
					'name' => 'Gold Purple'
				],
				[
					'code' => 'Lime Green Light Blue',
					'hex' => ['7BB201', '44A3BC'],
					'image' => 'assets/images/src/segmented/PANTONE376.png',
					'name' => 'Lime Green Light Blue'
				],
				[
					'code' => 'Rainbow',
					'hex' => ['0E9543', 'F2E80F', 'EF6B01', 'EA0D2C', '5A108B', '0B45BB'],
					'image' => 'assets/images/src/segmented/RainbowSegmented.png',
					'name' => 'Rainbow'
				],
				[
					'code' => 'Red Black',
					'hex' => ['EA0D2C', '000000'],
					'image' => 'assets/images/src/segmented/RedBlack.png',
					'name' => 'Red Black'
				],
				[
					'code' => 'Red Black Yellow',
					'hex' => ['EA0D2C', '000000', 'F2E80F'],
					'image' => 'assets/images/src/segmented/RedBlackYellow.png',
					'name' => 'Red Black Yellow'
				],
				[
					'code' => 'Red Blue',
					'hex' => ['EA0D2C', '0B45BB'],
					'image' => 'assets/images/src/segmented/RedBlue.png',
					'name' => 'Red Blue'
				],
				[
					'code' => 'Red Blue Hot Pink',
					'hex' => ['EA0D2C', '0B45BB', 'FD029A'],
					'image' => 'assets/images/src/segmented/RedBlueHotPink.png',
					'name' => 'Red Blue Hot Pink'
				],
				[
					'code' => 'Red Blue Yellow',
					'hex' => ['EA0D2C', '0B45BB', 'F2E80F'],
					'image' => 'assets/images/src/segmented/RedBlueYellow.png',
					'name' => 'Red Blue Yellow'
				],
				[
					'code' => 'Red Green',
					'hex' => ['EA0D2C', '0E9543'],
					'image' => 'assets/images/src/segmented/RedGreen.png',
					'name' => 'Red Green'
				],
				[
					'code' => 'Red Grey',
					'hex' => ['EA0D2C', 'A0A29F'],
					'image' => 'assets/images/src/segmented/RedGrey.png',
					'name' => 'Red Grey'
				],
				[
					'code' => 'Red Hot Pink',
					'hex' => ['EA0D2C', 'FD029A'],
					'image' => 'assets/images/src/segmented/RedHotPink.png',
					'name' => 'Red Hot Pink'
				],
				[
					'code' => 'Red Pantone267 Black',
					'hex' => ['EA0D2C', '5A108B', '000000'],
					'image' => 'assets/images/src/segmented/RedPANTONE267Black.png',
					'name' => 'Red Violet Black'
				],
				[
					'code' => 'Red Pantone7459',
					'hex' => ['EA0D2C', '419DB5'],
					'image' => 'assets/images/src/segmented/RedPANTONE7459.png',
					'name' => 'Red Blue'
				],
				[
					'code' => 'Red Pink',
					'hex' => ['EA0D2C', 'FB78B2'],
					'image' => 'assets/images/src/segmented/RedPink.png',
					'name' => 'Red Pink'
				],
				[
					'code' => 'Red White Blue',
					'hex' => ['EA0D2C', 'FEFEFE', '0B45BB'],
					'image' => 'assets/images/src/segmented/RedWhiteBlue.png',
					'name' => 'Red White Blue'
				],
				[
					'code' => 'Red White Green',
					'hex' => ['EA0D2C', 'FEFEFE', '0E9543'],
					'image' => 'assets/images/src/segmented/RedWhiteGreen.png',
					'name' => 'Red White Green'
				],
				[
					'code' => 'Red Yellow',
					'hex' => ['EA0D2C', 'F2E80F'],
					'image' => 'assets/images/src/segmented/RedYellow.png',
					'name' => 'Red Yellow'
				],
				[
					'code' => 'White Black Orange',
					'hex' => ['EF6B01', 'FEFEFE', '000000'],
					'image' => 'assets/images/src/segmented/WhiteBlackOrange.png',
					'name' => 'White Black Orange'
				],
				[
					'code' => 'White Blue',
					'hex' => ['FEFEFE', '0B45BB'],
					'image' => 'assets/images/src/segmented/WhiteBlue.png',
					'name' => 'White Blue'
				],
				[
					'code' => 'White Blue Pantone267',
					'hex' => ['5A108B', 'FEFEFE', '0B45BB'],
					'image' => 'assets/images/src/segmented/WhiteBluePANTONE267.png',
					'name' => 'White Blue Violet'
				],
				[
					'code' => 'White Brown',
					'hex' => ['FEFEFE', '6A491A'],
					'image' => 'assets/images/src/segmented/WhiteBrown.png',
					'name' => 'White Brown'
				],
				[
					'code' => 'White Green',
					'hex' => ['FEFEFE', '0E9543'],
					'image' => 'assets/images/src/segmented/WhiteGreen.png',
					'name' => 'White Green'
				],
				[
					'code' => 'White Grey',
					'hex' => ['FEFEFE', 'A0A29F'],
					'image' => 'assets/images/src/segmented/WhiteGrey.png',
					'name' => 'White Grey'
				],
				[
					'code' => 'White Hot Pink',
					'hex' => ['FEFEFE', 'FD029A'],
					'image' => 'assets/images/src/segmented/WhiteHotPink.png',
					'name' => 'White Hot Pink'
				],
				[
					'code' => 'White Light Blue',
					'hex' => ['FEFEFE', '9ABFE5'],
					'image' => 'assets/images/src/segmented/WhiteLightBlue.png',
					'name' => 'White Light Blue'
				],
				[
					'code' => 'White Lime Green',
					'hex' => ['FEFEFE', '8CD50B'],
					'image' => 'assets/images/src/segmented/WhiteLimeGreen.png',
					'name' => 'White Lime Green'
				],
				[
					'code' => 'White Orange',
					'hex' => ['FEFEFE', 'EF6B01'],
					'image' => 'assets/images/src/segmented/WhiteOrange.png',
					'name' => 'White Orange'
				],
				[
					'code' => 'White Pantone528',
					'hex' => ['FEFEFE', 'AD71C5'],
					'image' => 'assets/images/src/segmented/WhitePANTONE528.png',
					'name' => 'White Lavender'
				],
				[
					'code' => 'White Pink',
					'hex' => ['FEFEFE', 'FB78B2'],
					'image' => 'assets/images/src/segmented/WhitePink.png',
					'name' => 'White Pink'
				],
				[
					'code' => 'White Red',
					'hex' => ['FEFEFE', 'EA0D2C'],
					'image' => 'assets/images/src/segmented/WhiteRed.png',
					'name' => 'White Red'
				],
				[
					'code' => 'White Teal',
					'hex' => ['FEFEFE', '079CA5'],
					'image' => 'assets/images/src/segmented/WhiteTeal.png',
					'name' => 'White Teal'
				],
				[
					'code' => 'Yellow Blue',
					'hex' => ['F2E80F', '0B45BB'],
					'image' => 'assets/images/src/segmented/YellowBlue.png',
					'name' => 'Yellow Blue'
				]
			],
			'swirl' => [
				[
					'code' => 'Black Green',
					'hex' => ['021509', '0C9040'],
					'image' => 'assets/images/src/swirl/BlackGreen.png',
					'name' => 'Black Green'
				],
				[
					'code' => 'Black Grey',
					'hex' => ['070707', '9DA09C'],
					'image' => 'assets/images/src/swirl/BlackGrey.png',
					'name' => 'Black Grey'
				],
				[
					'code' => 'Black Hot Pink',
					'hex' => ['070707', 'E5028B'],
					'image' => 'assets/images/src/swirl/BlackHotPink.png',
					'name' => 'Black Hot Pink'
				],
				[
					'code' => 'Black Pantone267',
					'hex' => ['070707', '560F88'],
					'image' => 'assets/images/src/swirl/BlackPANTONE267.png',
					'name' => 'Black Violet'
				],
				[
					'code' => 'Black Red',
					'hex' => ['070707', 'E30C2A'],
					'image' => 'assets/images/src/swirl/BlackRed.png',
					'name' => 'Black Red'
				],
				[
					'code' => 'Black White',
					'hex' => ['070707', 'F3F3F3'],
					'image' => 'assets/images/src/swirl/BlackWhite.png',
					'name' => 'Black White'
				],
				[
					'code' => 'Black Yellow',
					'hex' => ['070707', 'E4DA0E'],
					'image' => 'assets/images/src/swirl/BlackYellow.png',
					'name' => 'Black Yellow'
				],
				[
					'code' => 'Blue Lime Green',
					'hex' => ['1753A6', '8AD40C'],
					'image' => 'assets/images/src/swirl/BlueLimeGreen.png',
					'name' => 'Blue Lime Green'
				],
				[
					'code' => 'Blue White',
					'hex' => ['F3F6FC', '0D46BA'],
					'image' => 'assets/images/src/swirl/BlueWhite.png',
					'name' => 'Blue White'
				],
				[
					'code' => 'Dark Green White',
					'hex' => ['F3F6FC', '174830'],
					'image' => 'assets/images/src/swirl/DarkGreenWhite.png',
					'name' => 'Dark Green White'
				],
				[
					'code' => 'Dessert Camo',
					'hex' => ['4E4726', 'DECE76', '6B5619'],
					'image' => 'assets/images/src/swirl/DesertCamo.png',
					'name' => 'Dessert Camo'
				],
				[
					'code' => 'Green Camo',
					'hex' => ['000000', 'BE8B5E', '64631C'],
					'image' => 'assets/images/src/swirl/GreenCamo.png',
					'name' => 'Green Camo'
				],
				[
					'code' => 'Hot Pink Light Blue',
					'hex' => ['E22FAB', '9BBAE3'],
					'image' => 'assets/images/src/swirl/HotPinkLightBlue.png',
					'name' => 'Hot Pink Light Blue'
				],
				[
					'code' => 'Hot Pink Light Blue Lime Green',
					'hex' => ['98C0D7', '8FCF49', 'F90599'],
					'image' => 'assets/images/src/swirl/HotPinkLightBlueLimeGreen.png',
					'name' => 'Hot Pink Light Blue Lime Green'
				],
				[
					'code' => 'Dark Green White',
					'hex' => ['FBFCFC', '11442B'],
					'image' => 'assets/images/src/swirl/DarkGreenWhite.png',
					'name' => 'Dark Green White'
				],
				[
					'code' => 'Lime Green Yellow Light Blue',
					'hex' => ['8FD040', '97C1CC', 'F0E711'],
					'image' => 'assets/images/src/swirl/LimeGreenYellowLightBlue.png',
					'name' => 'Lime Green Yellow Light Blue'
				],
				[
					'code' => 'Maroon Grey',
					'hex' => ['8A2232', 'A0A19D'],
					'image' => 'assets/images/src/swirl/MaroonGrey.png',
					'name' => 'Maroon Grey'
				],
				[
					'code' => 'Orange White',
					'hex' => ['F17A19', 'FFFCF9'],
					'image' => 'assets/images/src/swirl/OrangeWhite.png',
					'name' => 'Orange White'
				],
				[
					'code' => 'Pantone267 White',
					'hex' => ['773BA1', 'FBF9FC'],
					'image' => 'assets/images/src/swirl/PANTONE267White.png',
					'name' => 'Violet White'
				],
				[
					'code' => 'Pink Pantone267',
					'hex' => ['681990', 'F574B1'],
					'image' => 'assets/images/src/swirl/PinkPANTONE267.png',
					'name' => 'Pink Violet'
				],
				[
					'code' => 'Rainbow',
					'hex' => ['F4303D', 'FEDE1E', '2230A9'],
					'image' => 'assets/images/src/swirl/RainbowSwirl.png',
					'name' => 'Rainbow'
				],
				[
					'code' => 'Red Black Blue',
					'hex' => ['E10D30', '08389E', '000000'],
					'image' => 'assets/images/src/swirl/RedBlackBlue.png',
					'name' => 'Red Black Blue'
				],
				[
					'code' => 'Red Green',
					'hex' => ['D9152C', '178B41'],
					'image' => 'assets/images/src/swirl/RedGreen.png',
					'name' => 'Red Green'
				],
				[
					'code' => 'Red Grey',
					'hex' => ['D9152C', 'A1A19C'],
					'image' => 'assets/images/src/swirl/RedGrey.png',
					'name' => 'Red Grey'
				],
				[
					'code' => 'Red White',
					'hex' => ['D9152C', 'FFFFFF'],
					'image' => 'assets/images/src/swirl/RedWhite.png',
					'name' => 'Red White'
				],
				[
					'code' => 'Red White Blue',
					'hex' => ['D9152C', 'FFFFFF', '0F42B6'],
					'image' => 'assets/images/src/swirl/RedWhiteBlue.png',
					'name' => 'Red White Blue'
				],
				[
					'code' => 'Red Yellow',
					'hex' => ['EB2328', 'F2E50F'],
					'image' => 'assets/images/src/swirl/RedYellow.png',
					'name' => 'Red Yellow'
				],
				[
					'code' => 'Reflex Blue Black',
					'hex' => ['000001', '120F6D'],
					'image' => 'assets/images/src/swirl/ReflexBlueBlack.png',
					'name' => 'Reflex Blue Black'
				],
				[
					'code' => 'Reflex Blue Grey',
					'hex' => ['242097', '999C9E'],
					'image' => 'assets/images/src/swirl/ReflexBlueGrey.png',
					'name' => 'Reflex Blue Grey'
				],
				[
					'code' => 'Teal White',
					'hex' => ['FEFEFE', '1CA4AD'],
					'image' => 'assets/images/src/swirl/TealWhite.png',
					'name' => 'Teal White'
				],
				[
					'code' => 'White Black Green',
					'hex' => ['FEFEFE', '000000', '05461F'],
					'image' => 'assets/images/src/swirl/WhiteBlackGreen.png',
					'name' => 'White Black Green'
				]
			],
			'glow' => [
				[
					'code' => 'Glow Dark Blue',
					'hex' => ['3886C4'],
					'image' => 'assets/images/src/glow/GlowDarkBLUE.png',
					'name' => 'Blue'
				],
				[
					'code' => 'Glow Dark Green',
					'hex' => ['5DCE66'],
					'image' => 'assets/images/src/glow/GlowDarkGREEN.png',
					'name' => 'Green'
				],
				[
					'code' => 'Glow Dark Pink',
					'hex' => ['D57DA3'],
					'image' => 'assets/images/src/glow/GlowDarkPINK.png',
					'name' => 'Pink'
				],
				[
					'code' => 'Glow Dark Purple',
					'hex' => ['A078AD'],
					'image' => 'assets/images/src/glow/GlowDarkPURPLE.png',
					'name' => 'Purple'
				]
			]
        ];
	}

	private static function regularLarge()
	{
	    return [
			'solid' => [
				[
					'code' => 'Black',
					'hex' => ['000000'],
					'image' => 'assets/images/large/solid/Black.png',
					'name' => 'Black'
				],
				[
					'code' => 'Blue',
					'hex' => ['0B45BB'],
					'image' => 'assets/images/large/solid/Blue.png',
					'name' => 'Blue'
				],
				[
					'code' => 'Brown',
					'hex' => ['6A491A'],
					'image' => 'assets/images/large/solid/Brown.png',
					'name' => 'Brown'
				],
				[
					'code' => 'Green',
					'hex' => ['0E9543'],
					'image' => 'assets/images/large/solid/Green.png',
					'name' => 'Green'
				],
				[
					'code' => 'Grey',
					'hex' => ['A0A29F'],
					'image' => 'assets/images/large/solid/Grey.png',
					'name' => 'Grey'
				],
				[
					'code' => 'Hot Pink',
					'hex' => ['FD029A'],
					'image' => 'assets/images/large/solid/Hot-Pink.png',
					'name' => 'Hot Pink'
				],
				[
					'code' => 'Light Blue',
					'hex' => ['9ABFE5'],
					'image' => 'assets/images/large/solid/Light-Blue.png',
					'name' => 'Light Blue'
				],
				[
					'code' => 'Light Pink',
					'hex' => ['F997B7'],
					'image' => 'assets/images/large/solid/Light-Pink.png',
					'name' => 'Light Pink'
				],
				[
					'code' => 'Lime Green',
					'hex' => ['8CD50B'],
					'image' => 'assets/images/large/solid/Lime-Green.png',
					'name' => 'Lime Green'
				],
				[
					'code' => 'Maroon',
					'hex' => ['891C2E'],
					'image' => 'assets/images/large/solid/Maroon.png',
					'name' => 'Maroon'
				],
				[
					'code' => 'Metallic Gold',
					'hex' => ['836F3D'],
					'image' => 'assets/images/large/solid/Metallic-Gold.png',
					'name' => 'Metallic Gold'
				],
				[
					'code' => 'Metallic Silver',
					'hex' => ['8D8F8C'],
					'image' => 'assets/images/large/solid/Metallic-Silver.png',
					'name' => 'Metallic Silver'
				],
				[
					'code' => 'Navy Blue',
					'hex' => ['01214E'],
					'image' => 'assets/images/large/solid/Navy-Blue.png',
					'name' => 'Navy Blue'
				],
				[
					'code' => 'Orange',
					'hex' => ['EF6B01'],
					'image' => 'assets/images/large/solid/Orange.png',
					'name' => 'Orange'
				],
				[
					'code' => 'Pantone 117',
					'hex' => ['D5A927'],
					'image' => 'assets/images/large/solid/PANTONE-117.png',
					'name' => 'Metallic Gold'
				],
				[
					'code' => 'Pantone 326',
					'hex' => ['00B2AC'],
					'image' => 'assets/images/large/solid/PANTONE-326.png',
					'name' => 'Blue Green'
				],
				[
					'code' => 'Pantone 528',
					'hex' => ['AD71C5'],
					'image' => 'assets/images/large/solid/PANTONE-528.png',
					'name' => 'Purple'
				],
				[
					'code' => 'Pantone 551',
					'hex' => ['A0B8C2'],
					'image' => 'assets/images/large/solid/PANTONE-551.png',
					'name' => 'Silver'
				],
				[
					'code' => 'Pantone 553',
					'hex' => ['22452D'],
					'image' => 'assets/images/large/solid/PANTONE-553.png',
					'name' => 'Dark Green'
				],
				[
					'code' => 'Pantone 564',
					'hex' => ['8DBDBF'],
					'image' => 'assets/images/large/solid/PANTONE-564.png',
					'name' => 'Light Blue'
				],
				[
					'code' => 'Pantone 2587',
					'hex' => ['8643A4'],
					'image' => 'assets/images/large/solid/PANTONE-2587.png',
					'name' => 'Lavender'
				],
				[
					'code' => 'Pantone 3005',
					'hex' => ['3B83CB'],
					'image' => 'assets/images/large/solid/PANTONE-3005.png',
					'name' => 'Cornflower Blue'
				],
				[
					'code' => 'Pantone 4725',
					'hex' => ['B99474'],
					'image' => 'assets/images/large/solid/PANTONE-4725.png',
					'name' => 'Khaki'
				],
				[
					'code' => 'Pantone 5435',
					'hex' => ['A1B5BE'],
					'image' => 'assets/images/large/solid/PANTONE-5435.png',
					'name' => 'Blue Gray'
				],
				[
					'code' => 'Pantone 461',
					'hex' => ['0086BA'],
					'image' => 'assets/images/large/solid/PANTONE-7461.png',
					'name' => 'True Blue'
				],
				[
					'code' => 'Pantone 498',
					'hex' => ['50582E'],
					'image' => 'assets/images/large/solid/PANTONE-7498.png',
					'name' => 'Dark Moss Green'
				],
				[
					'code' => 'Process Blue',
					'hex' => ['0F8CCC'],
					'image' => 'assets/images/large/solid/Process-Blue.png',
					'name' => 'Process Blue'
				],
				[
					'code' => 'Red',
					'hex' => ['EA0D2C'],
					'image' => 'assets/images/large/solid/Red.png',
					'name' => 'Red'
				],
				[
					'code' => 'Reflex Blue',
					'hex' => ['191597'],
					'image' => 'assets/images/large/solid/Reflex-Blue.png',
					'name' => 'Reflex Blue'
				],
				[
					'code' => 'Teal',
					'hex' => ['079CA5'],
					'image' => 'assets/images/large/solid/Teal.png',
					'name' => 'Teal'
				],
				[
					'code' => 'Violet',
					'hex' => ['5A108B'],
					'image' => 'assets/images/large/solid/Violet.png',
					'name' => 'Violet'
				],
				[
					'code' => 'White',
					'hex' => ['FFFFFF'],
					'image' => 'assets/images/large/solid/White.png',
					'name' => 'White'
				],
				[
					'code' => 'Yellow',
					'hex' => ['F2E80F'],
					'image' => 'assets/images/large/solid/Yellow.png',
					'name' => 'Yellow'
				]
			],
			'segmented' => [
				[
					'code' => 'Black Green',
					'hex' => ['000000', '0E9543'],
					'image' => 'assets/images/large/segmented/BlackGreen.png',
					'name' => 'Black Green'
				],
				[
					'code' => 'Black Hot Pink',
					'hex' => ['000000', 'FD029A'],
					'image' => 'assets/images/large/segmented/BlackHotPink.png',
					'name' => 'Black Hot Pink'
				],
				[
					'code' => 'Black Metallic Gold',
					'hex' => ['000000', '836F3D'],
					'image' => 'assets/images/large/segmented/BlackMetallicGold.png',
					'name' => 'Black Metallic Gold'
				],
				[
					'code' => 'Black Metallic Silver',
					'hex' => ['000000', '8D8F8C'],
					'image' => 'assets/images/large/segmented/BlackMetallicSilver.png',
					'name' => 'Black Metallic Silver'
				],
				[
					'code' => 'Black Orange',
					'hex' => ['000000', 'EF6B01'],
					'image' => 'assets/images/large/segmented/BlackOrange.png',
					'name' => 'Black Orange'
				],
				[
					'code' => 'Black Pantone 267',
					'hex' => ['000000', '5A108B'],
					'image' => 'assets/images/large/segmented/BlackPANTONE267.png',
					'name' => 'Black Purple'
				],
				[
					'code' => 'Black Reflex Blue',
					'hex' => ['000000', '191597'],
					'image' => 'assets/images/large/segmented/BlackReflexBlue.png',
					'name' => 'Black Reflex Blue'
				],
				[
					'code' => 'Black White',
					'hex' => ['000000', 'FFFFFF'],
					'image' => 'assets/images/large/segmented/BlackWhite.png',
					'name' => 'Black White'
				],
				[
					'code' => 'Black Yellow',
					'hex' => ['000000', 'F2E80F'],
					'image' => 'assets/images/large/segmented/BlackYellow.png',
					'name' => 'Black Yellow'
				],
				[
					'code' => 'Blue Grey',
					'hex' => ['0B45BB', 'A0A29F'],
					'image' => 'assets/images/large/segmented/BlueGrey.png',
					'name' => 'Blue Grey'
				],
				[
					'code' => 'Blue Hot Pink',
					'hex' => ['0B45BB', 'FD029A'],
					'image' => 'assets/images/large/segmented/BlueHotPink.png',
					'name' => 'Blue Hot Pink'
				],
				[
					'code' => 'Blue Light Blue',
					'hex' => ['0B45BB', '9ABFE5'],
					'image' => 'assets/images/large/segmented/BlueLightBlue.png',
					'name' => 'Blue Light Blue'
				],
				[
					'code' => 'Blue Pantone267 Red',
					'hex' => ['0B45BB', '5A108B', 'EA0D2C'],
					'image' => 'assets/images/large/segmented/BluePANTONE267Red.png',
					'name' => 'Blue Violet Red'
				],
				[
					'code' => 'Green Red Yellow',
					'hex' => ['0E9543', 'EA0D2C', 'F2E80F'],
					'image' => 'assets/images/large/segmented/GreenRedYellow.png',
					'name' => 'Green Red Yellow'
				],
				[
					'code' => 'Green Reflex Blue',
					'hex' => ['0E9543', '191597'],
					'image' => 'assets/images/large/segmented/GreenReflexBlue.png',
					'name' => 'Green Reflex Blue'
				],
				[
					'code' => 'Hot Pink Black Blue',
					'hex' => ['FD029A', '000000', '0B45BB'],
					'image' => 'assets/images/large/segmented/HotPinkBlackBlue.png',
					'name' => 'Hot Pink Black Blue'
				],
				[
					'code' => 'Hot Pink Light Blue',
					'hex' => ['FD029A', '9ABFE5'],
					'image' => 'assets/images/large/segmented/HotPinkLightBlue.png',
					'name' => 'Hot Pink Light Blue'
				],
				[
					'code' => 'Light Pink Hot Pink',
					'hex' => ['FD029A', 'F997B7'],
					'image' => 'assets/images/large/segmented/LightPinkHotPink.png',
					'name' => 'Light Pink Hot Pink'
				],
				[
					'code' => 'Maroon Grey',
					'hex' => ['891C2E', 'A0A29F'],
					'image' => 'assets/images/large/segmented/MaroonGrey.png',
					'name' => 'Maroon Grey'
				],
				[
					'code' => 'Orange Blue',
					'hex' => ['EF6B01', 'A0A29F'],
					'image' => 'assets/images/large/segmented/OrangeBlue.png',
					'name' => 'Orange Blue'
				],
				[
					'code' => 'Pantone103 Pantone267',
					'hex' => ['C1A900', '5A108B'],
					'image' => 'assets/images/large/segmented/PANTONE103PANTONE267.png',
					'name' => 'Gold Purple'
				],
				[
					'code' => 'Pantone376 Pantone7459',
					'hex' => ['7BB201', '44A3BC'],
					'image' => 'assets/images/large/segmented/PANTONE376PANTONE7459.png',
					'name' => 'Lime Green Light Blue'
				],
				[
					'code' => 'Rainbow',
					'hex' => ['0E9543', 'F2E80F', 'EF6B01', 'EA0D2C', '5A108B', '0B45BB'],
					'image' => 'assets/images/large/segmented/RainbowSegmented.png',
					'name' => 'Rainbow'
				],
				[
					'code' => 'Red Black',
					'hex' => ['EA0D2C', '000000'],
					'image' => 'assets/images/large/segmented/RedBlack.png',
					'name' => 'Red Black'
				],
				[
					'code' => 'Red Black Yellow',
					'hex' => ['EA0D2C', '000000', 'F2E80F'],
					'image' => 'assets/images/large/segmented/RedBlackYellow.png',
					'name' => 'Red Black Yellow'
				],
				[
					'code' => 'Red Blue',
					'hex' => ['EA0D2C', '0B45BB'],
					'image' => 'assets/images/large/segmented/RedBlue.png',
					'name' => 'Red Blue'
				],
				[
					'code' => 'Red Blue Hot Pink',
					'hex' => ['EA0D2C', '0B45BB', 'FD029A'],
					'image' => 'assets/images/large/segmented/RedBlueHotPink.png',
					'name' => 'Red Blue Hot Pink'
				],
				[
					'code' => 'Red Blue Yellow',
					'hex' => ['EA0D2C', '0B45BB', 'F2E80F'],
					'image' => 'assets/images/large/segmented/RedBlueYellow.png',
					'name' => 'Red Blue Yellow'
				],
				[
					'code' => 'Red Green',
					'hex' => ['EA0D2C', '0E9543'],
					'image' => 'assets/images/large/segmented/RedGreen.png',
					'name' => 'Red Green'
				],
				[
					'code' => 'Red Grey',
					'hex' => ['EA0D2C', 'A0A29F'],
					'image' => 'assets/images/large/segmented/RedGrey.png',
					'name' => 'Red Grey'
				],
				[
					'code' => 'Red Hot Pink',
					'hex' => ['EA0D2C', 'FD029A'],
					'image' => 'assets/images/large/segmented/RedHotPink.png',
					'name' => 'Red Hot Pink'
				],
				[
					'code' => 'Red Pantone267 Black',
					'hex' => ['EA0D2C', '5A108B', '000000'],
					'image' => 'assets/images/large/segmented/RedPANTONE267Black.png',
					'name' => 'Red Violet Black'
				],
				[
					'code' => 'Red Pantone7459',
					'hex' => ['EA0D2C', '419DB5'],
					'image' => 'assets/images/large/segmented/RedPANTONE7459.png',
					'name' => 'Red Blue'
				],
				[
					'code' => 'Red Pink',
					'hex' => ['EA0D2C', 'FB78B2'],
					'image' => 'assets/images/large/segmented/RedPink.png',
					'name' => 'Red Pink'
				],
				[
					'code' => 'Red White Blue',
					'hex' => ['EA0D2C', 'FEFEFE', '0B45BB'],
					'image' => 'assets/images/large/segmented/RedWhiteBlue.png',
					'name' => 'Red White Blue'
				],
				[
					'code' => 'Red White Green',
					'hex' => ['EA0D2C', 'FEFEFE', '0E9543'],
					'image' => 'assets/images/large/segmented/RedWhiteGreen.png',
					'name' => 'Red White Green'
				],
				[
					'code' => 'Red Yellow',
					'hex' => ['EA0D2C', 'F2E80F'],
					'image' => 'assets/images/large/segmented/RedYellow.png',
					'name' => 'Red Yellow'
				],
				[
					'code' => 'White Black Orange',
					'hex' => ['EF6B01', 'FEFEFE', '000000'],
					'image' => 'assets/images/large/segmented/WhiteBlackOrange.png',
					'name' => 'White Black Orange'
				],
				[
					'code' => 'White Blue',
					'hex' => ['FEFEFE', '0B45BB'],
					'image' => 'assets/images/large/segmented/WhiteBlue.png',
					'name' => 'White Blue'
				],
				[
					'code' => 'White Blue Pantone267',
					'hex' => ['5A108B', 'FEFEFE', '0B45BB'],
					'image' => 'assets/images/large/segmented/WhiteBluePANTONE267.png',
					'name' => 'White Blue Violet'
				],
				[
					'code' => 'White Brown',
					'hex' => ['FEFEFE', '6A491A'],
					'image' => 'assets/images/large/segmented/WhiteBrown.png',
					'name' => 'White Brown'
				],
				[
					'code' => 'White Green',
					'hex' => ['FEFEFE', '0E9543'],
					'image' => 'assets/images/large/segmented/WhiteGreen.png',
					'name' => 'White Green'
				],
				[
					'code' => 'White Grey',
					'hex' => ['FEFEFE', 'A0A29F'],
					'image' => 'assets/images/large/segmented/WhiteGrey.png',
					'name' => 'White Grey'
				],
				[
					'code' => 'White Hot Pink',
					'hex' => ['FEFEFE', 'FD029A'],
					'image' => 'assets/images/large/segmented/WhiteHotPink.png',
					'name' => 'White Hot Pink'
				],
				[
					'code' => 'White Light Blue',
					'hex' => ['FEFEFE', '9ABFE5'],
					'image' => 'assets/images/large/segmented/WhiteLightBlue.png',
					'name' => 'White Light Blue'
				],
				[
					'code' => 'White Lime Green',
					'hex' => ['FEFEFE', '8CD50B'],
					'image' => 'assets/images/large/segmented/WhiteLimeGreen.png',
					'name' => 'White Lime Green'
				],
				[
					'code' => 'White Orange',
					'hex' => ['FEFEFE', 'EF6B01'],
					'image' => 'assets/images/large/segmented/WhiteOrange.png',
					'name' => 'White Orange'
				],
				[
					'code' => 'White Pantone528',
					'hex' => ['FEFEFE', 'AD71C5'],
					'image' => 'assets/images/large/segmented/WhitePANTONE528.png',
					'name' => 'White Lavender'
				],
				[
					'code' => 'White Pink',
					'hex' => ['FEFEFE', 'FB78B2'],
					'image' => 'assets/images/large/segmented/WhitePink.png',
					'name' => 'White Pink'
				],
				[
					'code' => 'White Red',
					'hex' => ['FEFEFE', 'EA0D2C'],
					'image' => 'assets/images/large/segmented/WhiteRed.png',
					'name' => 'White Red'
				],
				[
					'code' => 'White Teal',
					'hex' => ['FEFEFE', '079CA5'],
					'image' => 'assets/images/large/segmented/WhiteTeal.png',
					'name' => 'White Teal'
				],
				[
					'code' => 'Yellow Blue',
					'hex' => ['F2E80F', '0B45BB'],
					'image' => 'assets/images/large/segmented/YellowBlue.png',
					'name' => 'Yellow Blue'
				]
			],
			'swirl' => [
				[
					'code' => 'Black Orange',
					'hex' => ['EB6900', '080400'],
					'image' => 'assets/images/large/swirl/BlackOrange.png',
					'name' => 'Black Orange'
				],
				[
					'code' => 'Black Orange Light Blue',
					'hex' => ['EF6B01', '040200', '97BCE1'],
					'image' => 'assets/images/large/swirl/BlackOrangeLightBlue.png',
					'name' => 'Black Orange Light Blue'
				],
				[
					'code' => 'Black Pantone267',
					'hex' => ['070707', '560F88'],
					'image' => 'assets/images/large/swirl/BlackPantone267.png',
					'name' => 'Black Violet'
				],
				[
					'code' => 'Black Blue',
					'hex' => ['093EAB', '000206'],
					'image' => 'assets/images/large/swirl/BlueBlack.png',
					'name' => 'Black Blue'
				],
	        	[
	        		'code' => 'Blue Red',
	        		'hex' => ['293CA6', 'E00E31'],
	        		'image' => 'assets/images/large/swirl/BlueRed.png',
	        		'name' => 'Blue Red'
	        	],
	            [
	                'code' => 'Blue White',
	                'hex' => ['F3F6FC', '0D46BA'],
	                'image' => 'assets/images/large/swirl/BlueWhite.png',
	                'name' => 'Blue White'
	            ],
	            [
	                'code' => 'Blue White Brown',
	                'hex' => ['1144AE', '664921', 'F3F1ED'],
	                'image' => 'assets/images/large/swirl/BlueWhiteBrown.png',
	                'name' => 'Blue White Brown'
	            ],
	            [
	                'code' => 'Desert Camo',
	                'hex' => ['4E4726', 'DECE76', '6B5619'],
	                'image' => 'assets/images/large/swirl/DesertCamoflage.png',
	                'name' => 'Desert Camouflage'
	            ],
	            [
	                'code' => 'Green Camo',
	                'hex' => ['000000', 'BE8B5E', '64631C'],
	                'image' => 'assets/images/large/swirl/GreenCamoflage.png',
	                'name' => 'Green Camouflage'
	            ],
	            [
	                'code' => 'Light Blue White',
	                'hex' => ['ABCBEA', 'FCFDFE'],
	                'image' => 'assets/images/large/swirl/LightBlueWhite.png',
	                'name' => 'Light Blue White'
	            ],
	            [
	                'code' => 'Light Green White',
	                'hex' => ['9BDB2B', 'FCFDFE'],
	                'image' => 'assets/images/large/swirl/LimeGreenWhite.png',
	                'name' => 'Light Green White'
	            ],
	            [
	                'code' => 'Lime Green Yellow Light Blue',
	                'hex' => ['8FD040', '97C1CC', 'F0E711'],
	                'image' => 'assets/images/large/swirl/LmGreenLtBlueYellowWhite.png',
	                'name' => 'Lime Green Yellow Light Blue'
	            ],
	            [
	                'code' => 'Orange White',
	                'hex' => ['F17A19', 'FFFCF9'],
	                'image' => 'assets/images/large/swirl/OrangeWhite.png',
	                'name' => 'Orange White'
	            ],
	            [
	                'code' => 'Pantone528 White',
	                'hex' => ['AE72C5', 'FEFDFE'],
	                'image' => 'assets/images/large/swirl/Pantone528White.png',
	                'name' => 'Purple White'
	            ],
	            [
	                'code' => 'Pink Light Blue Lime Green',
	                'hex' => ['F878B3', '99BFE5', '8CD60D'],
	                'image' => 'assets/images/large/swirl/PinkLtBlueLmGreen.png',
	                'name' => 'Pink Light Blue Lime Green'
	            ],
	            [
	                'code' => 'Rainbow',
	                'hex' => ['F4303D', 'FEDE1E', '2230A9'],
	                'image' => 'assets/images/large/swirl/Rainbow.png',
	                'name' => 'Rainbow'
	            ],
	            [
	                'code' => 'Red Black',
	                'hex' => ['E10C29', '040001'],
	                'image' => 'assets/images/large/swirl/RedBlack.png',
	                'name' => 'Red Black'
	            ],
	            [
	                'code' => 'Red Green',
	                'hex' => ['D9152C', '178B41'],
	                'image' => 'assets/images/large/swirl/RedGreen.png',
	                'name' => 'Red Green'
	            ],
	            [
	                'code' => 'Red White',
	                'hex' => ['D9152C', 'FFFFFF'],
	                'image' => 'assets/images/large/swirl/RedWhite.png',
	                'name' => 'Red White'
	            ],
	            [
	                'code' => 'Royal Blue White',
	                'hex' => ['11277F', 'FFFFFF'],
	                'image' => 'assets/images/large/swirl/RoyalBlueWhite.png',
	                'name' => 'Royal Blue White'
	            ],
	            [
	                'code' => 'Teal White',
	                'hex' => ['FEFEFE', '1CA4AD'],
	                'image' => 'assets/images/large/swirl/TealWhite.png',
	                'name' => 'Teal White'
	            ],
	            [
	                'code' => 'Violet Light Blue White',
	                'hex' => ['5A118D', 'A2C5E7', 'F5F9FC'],
	                'image' => 'assets/images/large/swirl/VioletLtBlueWhite.png',
	                'name' => 'Violet Light Blue White'
	            ],
	            [
	                'code' => 'White Green',
	                'hex' => ['FEFEFE', '05461F'],
	                'image' => 'assets/images/large/swirl/WhiteGreen.png',
	                'name' => 'White Green'
	            ],
	            [
	                'code' => 'White Grey',
	                'hex' => ['FEFEFE', 'A4A7A2'],
	                'image' => 'assets/images/large/swirl/WhiteGrey.png',
	                'name' => 'White Grey'
	            ],
	            [
	                'code' => 'White Pink',
	                'hex' => ['FEFEFE', 'F97BB4'],
	                'image' => 'assets/images/large/swirl/WhitePink.png',
	                'name' => 'White Pink'
	            ],
	            [
	                'code' => 'White Yellow',
	                'hex' => ['FEFEFE', 'F3EA22'],
	                'image' => 'assets/images/large/swirl/WhiteYellow.png',
	                'name' => 'White Yellow'
	            ],
	            [
	                'code' => 'White Yellow Brown',
	                'hex' => ['FEFEFE', 'F3EA22', '6B4919'],
	                'image' => 'assets/images/large/swirl/WhiteYellowBrown.png',
	                'name' => 'White Yellow Brown'
	            ]
			],
			'glow' => [
				[
					'code' => 'Glow Dark Blue',
					'hex' => ['3886C4'],
					'image' => 'assets/images/src/glow/GlowDarkBLUE.png',
					'name' => 'Blue'
				],
				[
					'code' => 'Glow Dark Green',
					'hex' => ['5DCE66'],
					'image' => 'assets/images/src/glow/GlowDarkGREEN.png',
					'name' => 'Green'
				],
				[
					'code' => 'Glow Dark Pink',
					'hex' => ['D57DA3'],
					'image' => 'assets/images/src/glow/GlowDarkPINK.png',
					'name' => 'Pink'
				],
				[
					'code' => 'Glow Dark Purple',
					'hex' => ['A078AD'],
					'image' => 'assets/images/src/glow/GlowDarkPURPLE.png',
					'name' => 'Purple'
				]
			]
	    ];
	}

	private static function regularThin()
	{
        return [
			'solid' => [
				[
					'code' => 'Black',
					'hex' => ['000000'],
					'image' => 'assets/images/thin/solid/Black.png',
					'name' => 'Black'
				],
				[
					'code' => 'Brown',
					'hex' => ['6A491A'],
					'image' => 'assets/images/thin/solid/Brown.png',
					'name' => 'Brown'
				],
				[
					'code' => 'Green',
					'hex' => ['0E9543'],
					'image' => 'assets/images/thin/solid/Green.png',
					'name' => 'Green'
				],
				[
					'code' => 'Grey',
					'hex' => ['A0A29F'],
					'image' => 'assets/images/thin/solid/Grey.png',
					'name' => 'Grey'
				],
				[
					'code' => 'Hot Pink',
					'hex' => ['FD029A'],
					'image' => 'assets/images/thin/solid/HotPink.png',
					'name' => 'Hot Pink'
				],
				[
					'code' => 'Light Blue',
					'hex' => ['9ABFE5'],
					'image' => 'assets/images/thin/solid/LightBlue.png',
					'name' => 'Light Blue'
				],
				[
					'code' => 'Light Pink',
					'hex' => ['F997B7'],
					'image' => 'assets/images/thin/solid/LightPink.png',
					'name' => 'Light Pink'
				],
				[
					'code' => 'Lime Green',
					'hex' => ['8CD50B'],
					'image' => 'assets/images/thin/solid/LimeGreen.png',
					'name' => 'Lime Green'
				],
				[
					'code' => 'Maroon',
					'hex' => ['891C2E'],
					'image' => 'assets/images/thin/solid/Maroon.png',
					'name' => 'Maroon'
				],
				[
					'code' => 'Metallic Gold',
					'hex' => ['836F3D'],
					'image' => 'assets/images/thin/solid/MetallicGold.png',
					'name' => 'Metallic Gold'
				],
				[
					'code' => 'Metallic Silver',
					'hex' => ['8D8F8C'],
					'image' => 'assets/images/thin/solid/MetallicSilver.png',
					'name' => 'Metallic Silver'
				],
				[
					'code' => 'Navy Blue',
					'hex' => ['01214E'],
					'image' => 'assets/images/thin/solid/NavyBlue.png',
					'name' => 'Navy Blue'
				],
				[
					'code' => 'Orange',
					'hex' => ['EF6B01'],
					'image' => 'assets/images/thin/solid/Orange.png',
					'name' => 'Orange'
				],
				[
					'code' => 'Pantone 117',
					'hex' => ['D5A927'],
					'image' => 'assets/images/thin/solid/PANTONE117.png',
					'name' => 'Metallic Gold'
				],
				[
					'code' => 'Pantone 326',
					'hex' => ['00B2AC'],
					'image' => 'assets/images/thin/solid/PANTONE326.png',
					'name' => 'Blue Green'
				],
				[
					'code' => 'Pantone 528',
					'hex' => ['AD71C5'],
					'image' => 'assets/images/thin/solid/PANTONE528.png',
					'name' => 'Purple'
				],
				[
					'code' => 'Pantone 551',
					'hex' => ['A0B8C2'],
					'image' => 'assets/images/thin/solid/PANTONE551.png',
					'name' => 'Silver'
				],
				[
					'code' => 'Pantone 553',
					'hex' => ['22452D'],
					'image' => 'assets/images/thin/solid/PANTONE553.png',
					'name' => 'Dark Green'
				],
				[
					'code' => 'Pantone 564',
					'hex' => ['8DBDBF'],
					'image' => 'assets/images/thin/solid/PANTONE564.png',
					'name' => 'Light Blue'
				],
				[
					'code' => 'Pantone 2587',
					'hex' => ['8643A4'],
					'image' => 'assets/images/thin/solid/PANTONE2587.png',
					'name' => 'Lavender'
				],
				[
					'code' => 'Pantone 3005',
					'hex' => ['3B83CB'],
					'image' => 'assets/images/thin/solid/PANTONE3005.png',
					'name' => 'Cornflower Blue'
				],
				[
					'code' => 'Pantone 4725',
					'hex' => ['B99474'],
					'image' => 'assets/images/thin/solid/PANTONE4725.png',
					'name' => 'Khaki'
				],
				[
					'code' => 'Pantone 5435',
					'hex' => ['A1B5BE'],
					'image' => 'assets/images/thin/solid/PANTONE5435.png',
					'name' => 'Blue Gray'
				],
				[
					'code' => 'Pantone 461',
					'hex' => ['0086BA'],
					'image' => 'assets/images/thin/solid/PANTONE7461.png',
					'name' => 'True Blue'
				],
				[
					'code' => 'Pantone 498',
					'hex' => ['50582E'],
					'image' => 'assets/images/thin/solid/PANTONE7498.png',
					'name' => 'Dark Moss Green'
				],
				[
					'code' => 'Process Blue',
					'hex' => ['0F8CCC'],
					'image' => 'assets/images/thin/solid/ProcessBlue.png',
					'name' => 'Process Blue'
				],
				[
					'code' => 'Red',
					'hex' => ['EA0D2C'],
					'image' => 'assets/images/thin/solid/Red.png',
					'name' => 'Red'
				],
				[
					'code' => 'Reflex Blue',
					'hex' => ['191597'],
					'image' => 'assets/images/thin/solid/ReflexBlue.png',
					'name' => 'Reflex Blue'
				],
				[
					'code' => 'Teal',
					'hex' => ['079CA5'],
					'image' => 'assets/images/thin/solid/Teal.png',
					'name' => 'Teal'
				],
				[
					'code' => 'Violet',
					'hex' => ['5A108B'],
					'image' => 'assets/images/thin/solid/Violet.png',
					'name' => 'Violet'
				],
				[
					'code' => 'White',
					'hex' => ['FFFFFF'],
					'image' => 'assets/images/thin/solid/White.png',
					'name' => 'White'
				],
				[
					'code' => 'Yellow',
					'hex' => ['F2E80F'],
					'image' => 'assets/images/thin/solid/Yellow.png',
					'name' => 'Yellow'
				]
			],
			'segmented' => [
				[
					'code' => 'Black Green',
					'hex' => ['000000', '0E9543'],
					'image' => 'assets/images/thin/segmented/BlackGreen.png',
					'name' => 'Black Green'
				],
				[
					'code' => 'Black Hot Pink',
					'hex' => ['000000', 'FD029A'],
					'image' => 'assets/images/thin/segmented/BlackHotPink.png',
					'name' => 'Black Hot Pink'
				],
				[
					'code' => 'Black Metallic Gold',
					'hex' => ['000000', '836F3D'],
					'image' => 'assets/images/thin/segmented/BlackMetallicGold.png',
					'name' => 'Black Metallic Gold'
				],
				[
					'code' => 'Black Metallic Silver',
					'hex' => ['000000', '8D8F8C'],
					'image' => 'assets/images/thin/segmented/BlackMetallicSilver.png',
					'name' => 'Black Metallic Silver'
				],
				[
					'code' => 'Black Orange',
					'hex' => ['000000', 'EF6B01'],
					'image' => 'assets/images/thin/segmented/BlackOrange.png',
					'name' => 'Black Orange'
				],
				[
					'code' => 'Black Pantone 267',
					'hex' => ['000000', '5A108B'],
					'image' => 'assets/images/thin/segmented/BlackPANTONE267.png',
					'name' => 'Black Purple'
				],
				[
					'code' => 'Black Reflex Blue',
					'hex' => ['000000', '191597'],
					'image' => 'assets/images/thin/segmented/BlackReflexBlue.png',
					'name' => 'Black Reflex Blue'
				],
				[
					'code' => 'Black White',
					'hex' => ['000000', 'FFFFFF'],
					'image' => 'assets/images/thin/segmented/BlackWhite.png',
					'name' => 'Black White'
				],
				[
					'code' => 'Black Yellow',
					'hex' => ['000000', 'F2E80F'],
					'image' => 'assets/images/thin/segmented/BlackYellow.png',
					'name' => 'Black Yellow'
				],
				[
					'code' => 'Blue Grey',
					'hex' => ['0B45BB', 'A0A29F'],
					'image' => 'assets/images/thin/segmented/BlueGrey.png',
					'name' => 'Blue Grey'
				],
				[
					'code' => 'Blue Hot Pink',
					'hex' => ['0B45BB', 'FD029A'],
					'image' => 'assets/images/thin/segmented/BlueHotPink.png',
					'name' => 'Blue Hot Pink'
				],
				[
					'code' => 'Blue Light Blue',
					'hex' => ['0B45BB', '9ABFE5'],
					'image' => 'assets/images/thin/segmented/BlueLightBlue.png',
					'name' => 'Blue Light Blue'
				],
				[
					'code' => 'Blue Pantone267 Red',
					'hex' => ['0B45BB', '5A108B', 'EA0D2C'],
					'image' => 'assets/images/thin/segmented/BluePANTONE267Red.png',
					'name' => 'Blue Violet Red'
				],
				[
					'code' => 'Green Red Yellow',
					'hex' => ['0E9543', 'EA0D2C', 'F2E80F'],
					'image' => 'assets/images/thin/segmented/GreenRedYellow.png',
					'name' => 'Green Red Yellow'
				],
				[
					'code' => 'Green Reflex Blue',
					'hex' => ['0E9543', '191597'],
					'image' => 'assets/images/thin/segmented/GreenReflexBlue.png',
					'name' => 'Green Reflex Blue'
				],
				[
					'code' => 'Hot Pink Black Blue',
					'hex' => ['FD029A', '000000', '0B45BB'],
					'image' => 'assets/images/thin/segmented/HotPinkBlackBlue.png',
					'name' => 'Hot Pink Black Blue'
				],
				[
					'code' => 'Hot Pink Light Blue',
					'hex' => ['FD029A', '9ABFE5'],
					'image' => 'assets/images/thin/segmented/HotPinkLightBlue.png',
					'name' => 'Hot Pink Light Blue'
				],
				[
					'code' => 'Light Pink Hot Pink',
					'hex' => ['FD029A', 'F997B7'],
					'image' => 'assets/images/thin/segmented/LightPinkHotPink.png',
					'name' => 'Light Pink Hot Pink'
				],
				[
					'code' => 'Maroon Grey',
					'hex' => ['891C2E', 'A0A29F'],
					'image' => 'assets/images/thin/segmented/MaroonGrey.png',
					'name' => 'Maroon Grey'
				],
				[
					'code' => 'Orange Blue',
					'hex' => ['EF6B01', 'A0A29F'],
					'image' => 'assets/images/thin/segmented/OrangeBlue.png',
					'name' => 'Orange Blue'
				],
				[
					'code' => 'Gold Purple',
					'hex' => ['C1A900', '5A108B'],
					'image' => 'assets/images/thin/segmented/PANTONE103.png',
					'name' => 'Gold Purple'
				],
				[
					'code' => 'Lime Green Light Blue',
					'hex' => ['7BB201', '44A3BC'],
					'image' => 'assets/images/thin/segmented/PANTONE376.png',
					'name' => 'Lime Green Light Blue'
				],
				[
					'code' => 'Rainbow',
					'hex' => ['0E9543', 'F2E80F', 'EF6B01', 'EA0D2C', '5A108B', '0B45BB'],
					'image' => 'assets/images/thin/segmented/RainbowSegmented.png',
					'name' => 'Rainbow'
				],
				[
					'code' => 'Red Black',
					'hex' => ['EA0D2C', '000000'],
					'image' => 'assets/images/thin/segmented/RedBlack.png',
					'name' => 'Red Black'
				],
				[
					'code' => 'Red Black Yellow',
					'hex' => ['EA0D2C', '000000', 'F2E80F'],
					'image' => 'assets/images/thin/segmented/RedBlackYellow.png',
					'name' => 'Red Black Yellow'
				],
				[
					'code' => 'Red Blue',
					'hex' => ['EA0D2C', '0B45BB'],
					'image' => 'assets/images/thin/segmented/RedBlue.png',
					'name' => 'Red Blue'
				],
				[
					'code' => 'Red Blue Hot Pink',
					'hex' => ['EA0D2C', '0B45BB', 'FD029A'],
					'image' => 'assets/images/thin/segmented/RedBlueHotPink.png',
					'name' => 'Red Blue Hot Pink'
				],
				[
					'code' => 'Red Blue Yellow',
					'hex' => ['EA0D2C', '0B45BB', 'F2E80F'],
					'image' => 'assets/images/thin/segmented/RedBlueYellow.png',
					'name' => 'Red Blue Yellow'
				],
				[
					'code' => 'Red Green',
					'hex' => ['EA0D2C', '0E9543'],
					'image' => 'assets/images/thin/segmented/RedGreen.png',
					'name' => 'Red Green'
				],
				[
					'code' => 'Red Grey',
					'hex' => ['EA0D2C', 'A0A29F'],
					'image' => 'assets/images/thin/segmented/RedGrey.png',
					'name' => 'Red Grey'
				],
				[
					'code' => 'Red Hot Pink',
					'hex' => ['EA0D2C', 'FD029A'],
					'image' => 'assets/images/thin/segmented/RedHotPink.png',
					'name' => 'Red Hot Pink'
				],
				[
					'code' => 'Red Pantone267 Black',
					'hex' => ['EA0D2C', '5A108B', '000000'],
					'image' => 'assets/images/thin/segmented/RedPANTONE267Black.png',
					'name' => 'Red Violet Black'
				],
				[
					'code' => 'Red Pantone7459',
					'hex' => ['EA0D2C', '419DB5'],
					'image' => 'assets/images/thin/segmented/RedPANTONE7459.png',
					'name' => 'Red Blue'
				],
				[
					'code' => 'Red Pink',
					'hex' => ['EA0D2C', 'FB78B2'],
					'image' => 'assets/images/thin/segmented/RedPink.png',
					'name' => 'Red Pink'
				],
				[
					'code' => 'Red White Blue',
					'hex' => ['EA0D2C', 'FEFEFE', '0B45BB'],
					'image' => 'assets/images/thin/segmented/RedWhiteBlue.png',
					'name' => 'Red White Blue'
				],
				[
					'code' => 'Red White Green',
					'hex' => ['EA0D2C', 'FEFEFE', '0E9543'],
					'image' => 'assets/images/thin/segmented/RedWhiteGreen.png',
					'name' => 'Red White Green'
				],
				[
					'code' => 'Red Yellow',
					'hex' => ['EA0D2C', 'F2E80F'],
					'image' => 'assets/images/thin/segmented/RedYellow.png',
					'name' => 'Red Yellow'
				],
				[
					'code' => 'White Black Orange',
					'hex' => ['EF6B01', 'FEFEFE', '000000'],
					'image' => 'assets/images/thin/segmented/WhiteBlackOrange.png',
					'name' => 'White Black Orange'
				],
				[
					'code' => 'White Blue',
					'hex' => ['FEFEFE', '0B45BB'],
					'image' => 'assets/images/thin/segmented/WhiteBlue.png',
					'name' => 'White Blue'
				],
				[
					'code' => 'White Blue Pantone267',
					'hex' => ['5A108B', 'FEFEFE', '0B45BB'],
					'image' => 'assets/images/thin/segmented/WhiteBluePANTONE267.png',
					'name' => 'White Blue Violet'
				],
				[
					'code' => 'White Brown',
					'hex' => ['FEFEFE', '6A491A'],
					'image' => 'assets/images/thin/segmented/WhiteBrown.png',
					'name' => 'White Brown'
				],
				[
					'code' => 'White Green',
					'hex' => ['FEFEFE', '0E9543'],
					'image' => 'assets/images/thin/segmented/WhiteGreen.png',
					'name' => 'White Green'
				],
				[
					'code' => 'White Grey',
					'hex' => ['FEFEFE', 'A0A29F'],
					'image' => 'assets/images/thin/segmented/WhiteGrey.png',
					'name' => 'White Grey'
				],
				[
					'code' => 'White Hot Pink',
					'hex' => ['FEFEFE', 'FD029A'],
					'image' => 'assets/images/thin/segmented/WhiteHotPink.png',
					'name' => 'White Hot Pink'
				],
				[
					'code' => 'White Light Blue',
					'hex' => ['FEFEFE', '9ABFE5'],
					'image' => 'assets/images/thin/segmented/WhiteLightBlue.png',
					'name' => 'White Light Blue'
				],
				[
					'code' => 'White Lime Green',
					'hex' => ['FEFEFE', '8CD50B'],
					'image' => 'assets/images/thin/segmented/WhiteLimeGreen.png',
					'name' => 'White Lime Green'
				],
				[
					'code' => 'White Orange',
					'hex' => ['FEFEFE', 'EF6B01'],
					'image' => 'assets/images/thin/segmented/WhiteOrange.png',
					'name' => 'White Orange'
				],
				[
					'code' => 'White Pantone528',
					'hex' => ['FEFEFE', 'AD71C5'],
					'image' => 'assets/images/thin/segmented/WhitePANTONE528.png',
					'name' => 'White Lavender'
				],
				[
					'code' => 'White Pink',
					'hex' => ['FEFEFE', 'FB78B2'],
					'image' => 'assets/images/thin/segmented/WhitePink.png',
					'name' => 'White Pink'
				],
				[
					'code' => 'White Red',
					'hex' => ['FEFEFE', 'EA0D2C'],
					'image' => 'assets/images/thin/segmented/WhiteRed.png',
					'name' => 'White Red'
				],
				[
					'code' => 'White Teal',
					'hex' => ['FEFEFE', '079CA5'],
					'image' => 'assets/images/thin/segmented/WhiteTeal.png',
					'name' => 'White Teal'
				],
				[
					'code' => 'Yellow Blue',
					'hex' => ['F2E80F', '0B45BB'],
					'image' => 'assets/images/thin/segmented/YellowBlue.png',
					'name' => 'Yellow Blue'
				]
			],
			'swirl' => [
				[
					'code' => 'Black Green',
					'hex' => ['021509', '0C9040'],
					'image' => 'assets/images/thin/swirl/BlackGreen.png',
					'name' => 'Black Green'
				],
				[
					'code' => 'Black Grey',
					'hex' => ['070707', '9DA09C'],
					'image' => 'assets/images/thin/swirl/BlackGrey.png',
					'name' => 'Black Grey'
				],
				[
					'code' => 'Black Hot Pink',
					'hex' => ['070707', 'E5028B'],
					'image' => 'assets/images/thin/swirl/BlackHotPink.png',
					'name' => 'Black Hot Pink'
				],
				[
					'code' => 'Black Pantone267',
					'hex' => ['070707', '560F88'],
					'image' => 'assets/images/thin/swirl/BlackPANTONE267.png',
					'name' => 'Black Violet'
				],
				[
					'code' => 'Black Red',
					'hex' => ['070707', 'E30C2A'],
					'image' => 'assets/images/thin/swirl/BlackRed.png',
					'name' => 'Black Red'
				],
				[
					'code' => 'Black White',
					'hex' => ['070707', 'F3F3F3'],
					'image' => 'assets/images/thin/swirl/BlackWhite.png',
					'name' => 'Black White'
				],
				[
					'code' => 'Black Yellow',
					'hex' => ['070707', 'E4DA0E'],
					'image' => 'assets/images/thin/swirl/BlackYellow.png',
					'name' => 'Black Yellow'
				],
				[
					'code' => 'Blue Lime Green',
					'hex' => ['1753A6', '8AD40C'],
					'image' => 'assets/images/thin/swirl/BlueLimeGreen.png',
					'name' => 'Blue Lime Green'
				],
				[
					'code' => 'Blue White',
					'hex' => ['F3F6FC', '0D46BA'],
					'image' => 'assets/images/thin/swirl/BlueWhite.png',
					'name' => 'Blue White'
				],
				[
					'code' => 'Dark Green White',
					'hex' => ['F3F6FC', '174830'],
					'image' => 'assets/images/thin/swirl/DarkGreenWhite.png',
					'name' => 'Dark Green White'
				],
				[
					'code' => 'Dessert Camo',
					'hex' => ['4E4726', 'DECE76', '6B5619'],
					'image' => 'assets/images/thin/swirl/DesertCamo.png',
					'name' => 'Dessert Camo'
				],
				[
					'code' => 'Green Camo',
					'hex' => ['000000', 'BE8B5E', '64631C'],
					'image' => 'assets/images/thin/swirl/GreenCamo.png',
					'name' => 'Green Camo'
				],
				[
					'code' => 'Hot Pink Light Blue',
					'hex' => ['E22FAB', '9BBAE3'],
					'image' => 'assets/images/thin/swirl/HotPinkLightBlue.png',
					'name' => 'Hot Pink Light Blue'
				],
				[
					'code' => 'Hot Pink Light Blue Lime Green',
					'hex' => ['98C0D7', '8FCF49', 'F90599'],
					'image' => 'assets/images/thin/swirl/HotPinkLightBlueLimeGreen.png',
					'name' => 'Hot Pink Light Blue Lime Green'
				],
				[
					'code' => 'Dark Green White',
					'hex' => ['FBFCFC', '11442B'],
					'image' => 'assets/images/thin/swirl/DarkGreenWhite.png',
					'name' => 'Dark Green White'
				],
				[
					'code' => 'Lime Green Yellow Light Blue',
					'hex' => ['8FD040', '97C1CC', 'F0E711'],
					'image' => 'assets/images/thin/swirl/LimeGreenYellowLightBlue.png',
					'name' => 'Lime Green Yellow Light Blue'
				],
				[
					'code' => 'Maroon Grey',
					'hex' => ['8A2232', 'A0A19D'],
					'image' => 'assets/images/thin/swirl/MaroonGrey.png',
					'name' => 'Maroon Grey'
				],
				[
					'code' => 'Orange White',
					'hex' => ['F17A19', 'FFFCF9'],
					'image' => 'assets/images/thin/swirl/OrangeWhite.png',
					'name' => 'Orange White'
				],
				[
					'code' => 'Pantone267 White',
					'hex' => ['773BA1', 'FBF9FC'],
					'image' => 'assets/images/thin/swirl/PANTONE267White.png',
					'name' => 'Violet White'
				],
				[
					'code' => 'Pink Pantone267',
					'hex' => ['681990', 'F574B1'],
					'image' => 'assets/images/thin/swirl/PinkPANTONE267.png',
					'name' => 'Pink Violet'
				],
				[
					'code' => 'Rainbow',
					'hex' => ['F4303D', 'FEDE1E', '2230A9'],
					'image' => 'assets/images/thin/swirl/RainbowSwirl.png',
					'name' => 'Rainbow'
				],
				[
					'code' => 'Red Black Blue',
					'hex' => ['E10D30', '08389E', '000000'],
					'image' => 'assets/images/thin/swirl/RedBlackBlue.png',
					'name' => 'Red Black Blue'
				],
				[
					'code' => 'Red Green',
					'hex' => ['D9152C', '178B41'],
					'image' => 'assets/images/thin/swirl/RedGreen.png',
					'name' => 'Red Green'
				],
				[
					'code' => 'Red Grey',
					'hex' => ['D9152C', 'A1A19C'],
					'image' => 'assets/images/thin/swirl/RedGrey.png',
					'name' => 'Red Grey'
				],
				[
					'code' => 'Red White',
					'hex' => ['D9152C', 'FFFFFF'],
					'image' => 'assets/images/thin/swirl/RedWhite.png',
					'name' => 'Red White'
				],
				[
					'code' => 'Red White Blue',
					'hex' => ['D9152C', 'FFFFFF', '0F42B6'],
					'image' => 'assets/images/thin/swirl/RedWhiteBlue.png',
					'name' => 'Red White Blue'
				],
				[
					'code' => 'Red Yellow',
					'hex' => ['EB2328', 'F2E50F'],
					'image' => 'assets/images/thin/swirl/RedYellow.png',
					'name' => 'Red Yellow'
				],
				[
					'code' => 'Reflex Blue Black',
					'hex' => ['000001', '120F6D'],
					'image' => 'assets/images/thin/swirl/ReflexBlueBlack.png',
					'name' => 'Reflex Blue Black'
				],
				[
					'code' => 'Reflex Blue Grey',
					'hex' => ['242097', '999C9E'],
					'image' => 'assets/images/thin/swirl/ReflexBlueGrey.png',
					'name' => 'Reflex Blue Grey'
				],
				[
					'code' => 'Teal White',
					'hex' => ['FEFEFE', '1CA4AD'],
					'image' => 'assets/images/thin/swirl/TealWhite.png',
					'name' => 'Teal White'
				],
				[
					'code' => 'White Black Green',
					'hex' => ['FEFEFE', '000000', '05461F'],
					'image' => 'assets/images/thin/swirl/WhiteBlackGreen.png',
					'name' => 'White Black Green'
				]
			],
			'glow' => [
				[
					'code' => 'Glow Dark Blue',
					'hex' => ['3886C4'],
					'image' => 'assets/images/src/glow/GlowDarkBLUE.png',
					'name' => 'Blue'
				],
				[
					'code' => 'Glow Dark Green',
					'hex' => ['5DCE66'],
					'image' => 'assets/images/src/glow/GlowDarkGREEN.png',
					'name' => 'Green'
				],
				[
					'code' => 'Glow Dark Pink',
					'hex' => ['D57DA3'],
					'image' => 'assets/images/src/glow/GlowDarkPINK.png',
					'name' => 'Pink'
				],
				[
					'code' => 'Glow Dark Purple',
					'hex' => ['A078AD'],
					'image' => 'assets/images/src/glow/GlowDarkPURPLE.png',
					'name' => 'Purple'
				]
			]
        ];
	}

	private static function dual()
	{
		return [
			[
				'code' => 'Black Green',
				'hex' => ['000000', '0E9543'],
				'image' => 'assets/images/dual/Regular/BlackGreen.png',
				'name' => 'Black Green'
			],
			[
				'code' => 'Gold Black',
				'hex' => ['836F3D', '000000'],
				'image' => 'assets/images/dual/Regular/GoldBlack.png',
				'name' => 'Gold Black'
			],
			[
				'code' => 'Grey Black',
				'hex' => ['8D8F8C', '000000'],
				'image' => 'assets/images/dual/Regular/GreyBlack.png',
				'name' => 'Grey Black'
			],
			[
				'code' => 'Orange Black',
				'hex' => ['EF6B01', '000000'],
				'image' => 'assets/images/dual/Regular/OrangeBlack.png',
				'name' => 'Orange Black'
			],
			[
				'code' => 'Black Yellow',
				'hex' => ['000000', 'F2E80F'],
				'image' => 'assets/images/dual/Regular/BlackYellow.png',
				'name' => 'Black Yellow'
			],
			[
				'code' => 'Blue Grey',
				'hex' => ['0B45BB', 'A0A29F'],
				'image' => 'assets/images/dual/Regular/BlueGrey.png',
				'name' => 'Blue Grey'
			],
			[
				'code' => 'Red Green',
				'hex' => ['EA0D2C', '0E9543'],
				'image' => 'assets/images/dual/Regular/RedGreen.png',
				'name' => 'Red Green'
			],
			[
				'code' => 'Grey Red',
				'hex' => ['A0A29F', 'EA0D2C'],
				'image' => 'assets/images/dual/Regular/GreyRed.png',
				'name' => 'Grey Red'
			],
			[
				'code' => 'Red Yellow',
				'hex' => ['EA0D2C', 'F2E80F'],
				'image' => 'assets/images/dual/Regular/RedYellow.png',
				'name' => 'Red Yellow'
			],
			[
				'code' => 'White Blue',
				'hex' => ['FEFEFE', '0B45BB'],
				'image' => 'assets/images/dual/Regular/WhiteBlue.png',
				'name' => 'White Blue'
			],
			[
				'code' => 'White Green',
				'hex' => ['FEFEFE', '0E9543'],
				'image' => 'assets/images/dual/Regular/WhiteGreen.png',
				'name' => 'White Green'
			],
			[
				'code' => 'Light Blue White',
				'hex' => ['9ABFE5', 'FEFEFE'],
				'image' => 'assets/images/dual/Regular/LightBlueWhite.png',
				'name' => 'Light Blue White'
			],
			[
				'code' => 'White Orange',
				'hex' => ['FEFEFE', 'EF6B01'],
				'image' => 'assets/images/dual/Regular/WhiteOrange.png',
				'name' => 'White Orange'
			],
			[
				'code' => 'White Pink',
				'hex' => ['FEFEFE', 'FB78B2'],
				'image' => 'assets/images/dual/Regular/WhitePink.png',
				'name' => 'White Pink'
			],
			[
				'code' => 'White Red',
				'hex' => ['FEFEFE', 'EA0D2C'],
				'image' => 'assets/images/dual/Regular/WhiteRed.png',
				'name' => 'White Red'
			],
			[
				'code' => 'Yellow Blue',
				'hex' => ['F2E80F', '0B45BB'],
				'image' => 'assets/images/dual/Regular/YellowBlue.png',
				'name' => 'Yellow Blue'
			]
		];
	}

	private static function dualLarge()
	{
		return [
			[
				'code' => 'Black Green',
				'hex' => ['000000', '0E9543'],
				'image' => 'assets/images/dual/Large/BlackGreen.png',
				'name' => 'Black Green'
			],
			[
				'code' => 'Gold Black',
				'hex' => ['836F3D', '000000'],
				'image' => 'assets/images/dual/Large/GoldBlack.png',
				'name' => 'Gold Black'
			],
			[
				'code' => 'Grey Black',
				'hex' => ['8D8F8C', '000000'],
				'image' => 'assets/images/dual/Large/GreyBlack.png',
				'name' => 'Grey Black'
			],
			[
				'code' => 'Orange Black',
				'hex' => ['EF6B01', '000000'],
				'image' => 'assets/images/dual/Large/OrangeBlack.png',
				'name' => 'Orange Black'
			],
			[
				'code' => 'Black Yellow',
				'hex' => ['000000', 'F2E80F'],
				'image' => 'assets/images/dual/Large/BlackYellow.png',
				'name' => 'Black Yellow'
			],
			[
				'code' => 'Blue Grey',
				'hex' => ['0B45BB', 'A0A29F'],
				'image' => 'assets/images/dual/Large/BlueGrey.png',
				'name' => 'Blue Grey'
			],
			[
				'code' => 'Red Green',
				'hex' => ['EA0D2C', '0E9543'],
				'image' => 'assets/images/dual/Large/RedGreen.png',
				'name' => 'Red Green'
			],
			[
				'code' => 'Grey Red',
				'hex' => ['A0A29F', 'EA0D2C'],
				'image' => 'assets/images/dual/Large/GreyRed.png',
				'name' => 'Grey Red'
			],
			[
				'code' => 'Red Yellow',
				'hex' => ['EA0D2C', 'F2E80F'],
				'image' => 'assets/images/dual/Large/RedYellow.png',
				'name' => 'Red Yellow'
			],
			[
				'code' => 'White Blue',
				'hex' => ['FEFEFE', '0B45BB'],
				'image' => 'assets/images/dual/Large/WhiteBlue.png',
				'name' => 'White Blue'
			],
			[
				'code' => 'White Green',
				'hex' => ['FEFEFE', '0E9543'],
				'image' => 'assets/images/dual/Large/WhiteGreen.png',
				'name' => 'White Green'
			],
			[
				'code' => 'Light Blue White',
				'hex' => ['9ABFE5', 'FEFEFE'],
				'image' => 'assets/images/dual/Large/LightBlueWhite.png',
				'name' => 'Light Blue White'
			],
			[
				'code' => 'White Orange',
				'hex' => ['FEFEFE', 'EF6B01'],
				'image' => 'assets/images/dual/Large/WhiteOrange.png',
				'name' => 'White Orange'
			],
			[
				'code' => 'White Pink',
				'hex' => ['FEFEFE', 'FB78B2'],
				'image' => 'assets/images/dual/Large/WhitePink.png',
				'name' => 'White Pink'
			],
			[
				'code' => 'White Red',
				'hex' => ['FEFEFE', 'EA0D2C'],
				'image' => 'assets/images/dual/Large/WhiteRed.png',
				'name' => 'White Red'
			],
			[
				'code' => 'Yellow Blue',
				'hex' => ['F2E80F', '0B45BB'],
				'image' => 'assets/images/dual/Large/YellowBlue.png',
				'name' => 'Yellow Blue'
			]
		];
	}

	private static function figured()
	{
        return [
			'solid' => [
				[
					'code' => 'Black',
					'hex' => ['000000'],
					'image' => 'assets/images/figured/large/solid/Black.png',
					'name' => 'Black'
				],
				[
					'code' => 'Brown',
					'hex' => ['6A491A'],
					'image' => 'assets/images/figured/large/solid/Brown.png',
					'name' => 'Brown'
				],
				[
					'code' => 'Green',
					'hex' => ['0E9543'],
					'image' => 'assets/images/figured/large/solid/Green.png',
					'name' => 'Green'
				],
				[
					'code' => 'Grey',
					'hex' => ['A0A29F'],
					'image' => 'assets/images/figured/large/solid/Grey.png',
					'name' => 'Grey'
				],
				[
					'code' => 'Hot Pink',
					'hex' => ['FD029A'],
					'image' => 'assets/images/figured/large/solid/HotPink.png',
					'name' => 'Hot Pink'
				],
				[
					'code' => 'Light Blue',
					'hex' => ['9ABFE5'],
					'image' => 'assets/images/figured/large/solid/LightBlue.png',
					'name' => 'Light Blue'
				],
				[
					'code' => 'Light Pink',
					'hex' => ['F997B7'],
					'image' => 'assets/images/figured/large/solid/LightPink.png',
					'name' => 'Light Pink'
				],
				[
					'code' => 'Lime Green',
					'hex' => ['8CD50B'],
					'image' => 'assets/images/figured/large/solid/LimeGreen.png',
					'name' => 'Lime Green'
				],
				[
					'code' => 'Pantone202',
					'hex' => ['891C2E'],
					'image' => 'assets/images/figured/large/solid/Pantone202.png',
					'name' => 'Maroon'
				],
				[
					'code' => 'Pantone125',
					'hex' => ['836F3D'],
					'image' => 'assets/images/figured/large/solid/Pantone125.png',
					'name' => 'Metallic Gold'
				],
				[
					'code' => 'Royal Blue',
					'hex' => ['01214E'],
					'image' => 'assets/images/figured/large/solid/RoyalBlue.png',
					'name' => 'Royal Blue'
				],
				[
					'code' => 'Orange',
					'hex' => ['EF6B01'],
					'image' => 'assets/images/figured/large/solid/Orange.png',
					'name' => 'Orange'
				],
				[
					'code' => 'Pantone729',
					'hex' => ['B99474'],
					'image' => 'assets/images/figured/large/solid/Pantone729.png',
					'name' => 'Khaki'
				],
				[
					'code' => 'Red',
					'hex' => ['EA0D2C'],
					'image' => 'assets/images/figured/large/solid/Red.png',
					'name' => 'Red'
				],
				[
					'code' => 'Teal',
					'hex' => ['079CA5'],
					'image' => 'assets/images/figured/large/solid/Teal.png',
					'name' => 'Teal'
				],
				[
					'code' => 'White',
					'hex' => ['FFFFFF'],
					'image' => 'assets/images/figured/large/solid/White.png',
					'name' => 'White'
				],
				[
					'code' => 'Yellow',
					'hex' => ['F2E80F'],
					'image' => 'assets/images/figured/large/solid/Yellow.png',
					'name' => 'Yellow'
				]
			],
			'segmented' => [
				[
					'code' => 'Black Green',
					'hex' => ['000000', '0E9543'],
					'image' => 'assets/images/figured/segmented/BlackGreen.png',
					'name' => 'Black Green'
				],
				[
					'code' => 'Black Hot Pink',
					'hex' => ['000000', 'FD029A'],
					'image' => 'assets/images/figured/segmented/BlackHotPink.png',
					'name' => 'Black Hot Pink'
				],
				[
					'code' => 'Black Metallic Gold',
					'hex' => ['000000', '836F3D'],
					'image' => 'assets/images/figured/segmented/BlackMetallicGold.png',
					'name' => 'Black Metallic Gold'
				],
				[
					'code' => 'Black Metallic Silver',
					'hex' => ['000000', '8D8F8C'],
					'image' => 'assets/images/figured/segmented/BlackMetallicSilver.png',
					'name' => 'Black Metallic Silver'
				],
				[
					'code' => 'Black Orange',
					'hex' => ['000000', 'EF6B01'],
					'image' => 'assets/images/figured/segmented/BlackOrange.png',
					'name' => 'Black Orange'
				],
				[
					'code' => 'Black Pantone 267',
					'hex' => ['000000', '5A108B'],
					'image' => 'assets/images/figured/segmented/BlackPANTONE267.png',
					'name' => 'Black Purple'
				],
				[
					'code' => 'Black White',
					'hex' => ['000000', 'FFFFFF'],
					'image' => 'assets/images/figured/segmented/BlackWhite.png',
					'name' => 'Black White'
				],
				[
					'code' => 'Black Yellow',
					'hex' => ['000000', 'F2E80F'],
					'image' => 'assets/images/figured/segmented/BlackYellow.png',
					'name' => 'Black Yellow'
				],
				[
					'code' => 'Blue Grey',
					'hex' => ['0B45BB', 'A0A29F'],
					'image' => 'assets/images/figured/segmented/BlueGrey.png',
					'name' => 'Blue Grey'
				],
				[
					'code' => 'Blue Hot Pink',
					'hex' => ['0B45BB', 'FD029A'],
					'image' => 'assets/images/figured/segmented/BlueHotPink.png',
					'name' => 'Blue Hot Pink'
				],
				[
					'code' => 'Blue Light Blue',
					'hex' => ['0B45BB', '9ABFE5'],
					'image' => 'assets/images/figured/segmented/BlueLightBlue.png',
					'name' => 'Blue Light Blue'
				],
				[
					'code' => 'Blue Pantone267 Red',
					'hex' => ['0B45BB', '5A108B', 'EA0D2C'],
					'image' => 'assets/images/figured/segmented/BluePANTONE267Red.png',
					'name' => 'Blue Violet Red'
				],
				[
					'code' => 'Green Red Yellow',
					'hex' => ['0E9543', 'EA0D2C', 'F2E80F'],
					'image' => 'assets/images/figured/segmented/GreenRedYellow.png',
					'name' => 'Green Red Yellow'
				],
				[
					'code' => 'Green Reflex Blue',
					'hex' => ['0E9543', '191597'],
					'image' => 'assets/images/figured/segmented/GreenReflexBlue.png',
					'name' => 'Green Reflex Blue'
				],
				[
					'code' => 'Hot Pink Black Yellow',
					'hex' => ['FD029A', '000000', 'F8FC1B'],
					'image' => 'assets/images/figured/segmented/HotPinkBlackYellow.png',
					'name' => 'Hot Pink Black Yellow'
				],
				[
					'code' => 'Hot Pink Light Blue',
					'hex' => ['FD029A', '9ABFE5'],
					'image' => 'assets/images/figured/segmented/HotPinkLightBlue.png',
					'name' => 'Hot Pink Light Blue'
				],
				[
					'code' => 'Pantone376 Pantone7459',
					'hex' => ['7BB201', '44A3BC'],
					'image' => 'assets/images/figured/segmented/PANTONE376PANTONE7459.png',
					'name' => 'Lime Green Light Blue'
				],
				[
					'code' => 'Rainbow',
					'hex' => ['0E9543', 'F2E80F', 'EF6B01', 'EA0D2C', '5A108B', '0B45BB'],
					'image' => 'assets/images/figured/segmented/RainbowFigured.png',
					'name' => 'Rainbow'
				],
				[
					'code' => 'Red Black',
					'hex' => ['EA0D2C', '000000'],
					'image' => 'assets/images/figured/segmented/RedBlack.png',
					'name' => 'Red Black'
				],
				[
					'code' => 'Red Black Yellow',
					'hex' => ['EA0D2C', '000000', 'F2E80F'],
					'image' => 'assets/images/figured/segmented/RedBlackYellow.png',
					'name' => 'Red Black Yellow'
				],
				[
					'code' => 'Red Blue',
					'hex' => ['EA0D2C', '0B45BB'],
					'image' => 'assets/images/figured/segmented/RedBlue.png',
					'name' => 'Red Blue'
				],
				[
					'code' => 'Red Blue Hot Pink',
					'hex' => ['EA0D2C', '0B45BB', 'FD029A'],
					'image' => 'assets/images/figured/segmented/RedBlueHotPink.png',
					'name' => 'Red Blue Hot Pink'
				],
				[
					'code' => 'Red Blue Yellow',
					'hex' => ['EA0D2C', '0B45BB', 'F2E80F'],
					'image' => 'assets/images/figured/segmented/RedBlueYellow.png',
					'name' => 'Red Blue Yellow'
				],
				[
					'code' => 'Red Green',
					'hex' => ['EA0D2C', '0E9543'],
					'image' => 'assets/images/figured/segmented/RedGreen.png',
					'name' => 'Red Green'
				],
				[
					'code' => 'Red Grey',
					'hex' => ['EA0D2C', 'A0A29F'],
					'image' => 'assets/images/figured/segmented/RedGrey.png',
					'name' => 'Red Grey'
				],
				[
					'code' => 'Red Hot Pink',
					'hex' => ['EA0D2C', 'FD029A'],
					'image' => 'assets/images/figured/segmented/RedHotPink.png',
					'name' => 'Red Hot Pink'
				],
				[
					'code' => 'Red Pantone267 Black',
					'hex' => ['EA0D2C', '5A108B', '000000'],
					'image' => 'assets/images/figured/segmented/RedPANTONE267Black.png',
					'name' => 'Red Violet Black'
				],
				[
					'code' => 'Red Pantone7459',
					'hex' => ['EA0D2C', '419DB5'],
					'image' => 'assets/images/figured/segmented/RedPANTONE7459.png',
					'name' => 'Red Blue'
				],
				[
					'code' => 'Red Pink',
					'hex' => ['EA0D2C', 'FB78B2'],
					'image' => 'assets/images/figured/segmented/RedPink.png',
					'name' => 'Red Pink'
				],
				[
					'code' => 'Red White Blue',
					'hex' => ['EA0D2C', 'FEFEFE', '0B45BB'],
					'image' => 'assets/images/figured/segmented/RedWhiteBlue.png',
					'name' => 'Red White Blue'
				],
				[
					'code' => 'Red White Green',
					'hex' => ['EA0D2C', 'FEFEFE', '0E9543'],
					'image' => 'assets/images/figured/segmented/RedWhiteGreen.png',
					'name' => 'Red White Green'
				],
				[
					'code' => 'Red Yellow',
					'hex' => ['EA0D2C', 'F2E80F'],
					'image' => 'assets/images/figured/segmented/RedYellow.png',
					'name' => 'Red Yellow'
				],
				[
					'code' => 'White Black Orange',
					'hex' => ['EF6B01', 'FEFEFE', '000000'],
					'image' => 'assets/images/figured/segmented/WhiteBlackOrange.png',
					'name' => 'White Black Orange'
				],
				[
					'code' => 'White Blue',
					'hex' => ['FEFEFE', '0B45BB'],
					'image' => 'assets/images/figured/segmented/WhiteBlue.png',
					'name' => 'White Blue'
				],
				[
					'code' => 'White Blue Pantone267',
					'hex' => ['5A108B', 'FEFEFE', '0B45BB'],
					'image' => 'assets/images/figured/segmented/WhiteBluePANTONE267.png',
					'name' => 'White Blue Violet'
				],
				[
					'code' => 'White Brown',
					'hex' => ['FEFEFE', '6A491A'],
					'image' => 'assets/images/figured/segmented/WhiteBrown.png',
					'name' => 'White Brown'
				],
				[
					'code' => 'White Green',
					'hex' => ['FEFEFE', '0E9543'],
					'image' => 'assets/images/figured/segmented/WhiteGreen.png',
					'name' => 'White Green'
				],
				[
					'code' => 'White Grey',
					'hex' => ['FEFEFE', 'A0A29F'],
					'image' => 'assets/images/figured/segmented/WhiteGrey.png',
					'name' => 'White Grey'
				],
				[
					'code' => 'White Hot Pink',
					'hex' => ['FEFEFE', 'FD029A'],
					'image' => 'assets/images/figured/segmented/WhiteHotPink.png',
					'name' => 'White Hot Pink'
				],
				[
					'code' => 'White Light Blue',
					'hex' => ['FEFEFE', '9ABFE5'],
					'image' => 'assets/images/figured/segmented/WhiteLightBlue.png',
					'name' => 'White Light Blue'
				],
				[
					'code' => 'White Lime Green',
					'hex' => ['FEFEFE', '8CD50B'],
					'image' => 'assets/images/figured/segmented/WhiteLimeGreen.png',
					'name' => 'White Lime Green'
				],
				[
					'code' => 'White Orange',
					'hex' => ['FEFEFE', 'EF6B01'],
					'image' => 'assets/images/figured/segmented/WhiteOrange.png',
					'name' => 'White Orange'
				],
				[
					'code' => 'White Pantone528',
					'hex' => ['FEFEFE', 'AD71C5'],
					'image' => 'assets/images/figured/segmented/WhitePANTONE528.png',
					'name' => 'White Lavender'
				],
				[
					'code' => 'White Pink',
					'hex' => ['FEFEFE', 'FB78B2'],
					'image' => 'assets/images/figured/segmented/WhitePink.png',
					'name' => 'White Pink'
				],
				[
					'code' => 'White Red',
					'hex' => ['FEFEFE', 'EA0D2C'],
					'image' => 'assets/images/figured/segmented/WhiteRed.png',
					'name' => 'White Red'
				],
				[
					'code' => 'White Teal',
					'hex' => ['FEFEFE', '079CA5'],
					'image' => 'assets/images/figured/segmented/WhiteTeal.png',
					'name' => 'White Teal'
				],
				[
					'code' => 'Yellow Blue',
					'hex' => ['F2E80F', '0B45BB'],
					'image' => 'assets/images/figured/segmented/YellowBlue.png',
					'name' => 'Yellow Blue'
				]
			],
			'swirl' => [
				[
					'code' => 'Black Green',
					'hex' => ['021509', '0C9040'],
					'image' => 'assets/images/figured/large/swirl/BlackGreen.png',
					'name' => 'Black Green'
				],
				[
					'code' => 'Black Grey',
					'hex' => ['070707', '9DA09C'],
					'image' => 'assets/images/figured/large/swirl/BlackGrey.png',
					'name' => 'Black Grey'
				],
				[
					'code' => 'Black Hot Pink',
					'hex' => ['070707', 'E5028B'],
					'image' => 'assets/images/figured/large/swirl/BlackHotPink.png',
					'name' => 'Black Hot Pink'
				],
				[
					'code' => 'Black Pantone267',
					'hex' => ['070707', '560F88'],
					'image' => 'assets/images/figured/large/swirl/BlackPANTONE267.png',
					'name' => 'Black Violet'
				],
				[
					'code' => 'Black Red',
					'hex' => ['070707', 'E30C2A'],
					'image' => 'assets/images/figured/large/swirl/BlackRed.png',
					'name' => 'Black Red'
				],
				[
					'code' => 'Black White',
					'hex' => ['070707', 'F3F3F3'],
					'image' => 'assets/images/figured/large/swirl/BlackWhite.png',
					'name' => 'Black White'
				],
				[
					'code' => 'Black Yellow',
					'hex' => ['070707', 'E4DA0E'],
					'image' => 'assets/images/figured/large/swirl/BlackYellow.png',
					'name' => 'Black Yellow'
				],
				[
					'code' => 'Blue Lime Green',
					'hex' => ['1753A6', '8AD40C'],
					'image' => 'assets/images/figured/large/swirl/BlueLimeGreen.png',
					'name' => 'Blue Lime Green'
				],
				[
					'code' => 'Blue White',
					'hex' => ['F3F6FC', '0D46BA'],
					'image' => 'assets/images/figured/large/swirl/BlueWhite.png',
					'name' => 'Blue White'
				],
				[
					'code' => 'Dark Green White',
					'hex' => ['F3F6FC', '174830'],
					'image' => 'assets/images/figured/large/swirl/DarkGreenWhite.png',
					'name' => 'Dark Green White'
				],
				[
					'code' => 'Dessert Camo',
					'hex' => ['4E4726', 'DECE76', '6B5619'],
					'image' => 'assets/images/figured/large/swirl/DesertCamo.png',
					'name' => 'Dessert Camo'
				],
				[
					'code' => 'Green Camo',
					'hex' => ['000000', 'BE8B5E', '64631C'],
					'image' => 'assets/images/figured/large/swirl/GreenCamo.png',
					'name' => 'Green Camo'
				],
				[
					'code' => 'Green White',
					'hex' => ['FBFCFC', '009B4F'],
					'image' => 'assets/images/figured/large/swirl/GreenWhite.png',
					'name' => 'Green White'
				],
				[
					'code' => 'Hot Pink Light Blue',
					'hex' => ['E22FAB', '9BBAE3'],
					'image' => 'assets/images/figured/large/swirl/HotPinkLightBlue.png',
					'name' => 'Hot Pink Light Blue'
				],
				[
					'code' => 'Hot Pink Light Blue Lime Green',
					'hex' => ['98C0D7', '8FCF49', 'F90599'],
					'image' => 'assets/images/figured/large/swirl/HotPinkLightBlueLimeGreen.png',
					'name' => 'Hot Pink Light Blue Lime Green'
				],
				[
					'code' => 'Dark Green White',
					'hex' => ['FBFCFC', '11442B'],
					'image' => 'assets/images/figured/swirl/DarkGreenWhite.png',
					'name' => 'Dark Green White'
				],
				[
					'code' => 'Lime Green Yellow Light Blue',
					'hex' => ['8FD040', '97C1CC', 'F0E711'],
					'image' => 'assets/images/figured/large/swirl/LimeGreenYellowLightBlue.png',
					'name' => 'Lime Green Yellow Light Blue'
				],
				[
					'code' => 'Maroon Grey',
					'hex' => ['8A2232', 'A0A19D'],
					'image' => 'assets/images/figured/large/swirl/MaroonGrey.png',
					'name' => 'Maroon Grey'
				],
				[
					'code' => 'Orange White',
					'hex' => ['F17A19', 'FFFCF9'],
					'image' => 'assets/images/figured/large/swirl/OrangeWhite.png',
					'name' => 'Orange White'
				],
				[
					'code' => 'Pantone267 White',
					'hex' => ['773BA1', 'FBF9FC'],
					'image' => 'assets/images/figured/large/swirl/PANTONE267White.png',
					'name' => 'Violet White'
				],
				[
					'code' => 'Pink Pantone267',
					'hex' => ['681990', 'F574B1'],
					'image' => 'assets/images/figured/large/swirl/PinkPANTONE267.png',
					'name' => 'Pink Violet'
				],
				[
					'code' => 'Rainbow',
					'hex' => ['F4303D', 'FEDE1E', '2230A9'],
					'image' => 'assets/images/figured/large/swirl/RainbowSwirl.png',
					'name' => 'Rainbow'
				],
				[
					'code' => 'Red Black Blue',
					'hex' => ['E10D30', '08389E', '000000'],
					'image' => 'assets/images/figured/large/swirl/RedBlackBlue.png',
					'name' => 'Red Black Blue'
				],
				[
					'code' => 'Red Green',
					'hex' => ['D9152C', '178B41'],
					'image' => 'assets/images/figured/large/swirl/RedGreen.png',
					'name' => 'Red Green'
				],
				[
					'code' => 'Red Grey',
					'hex' => ['D9152C', 'A1A19C'],
					'image' => 'assets/images/figured/large/swirl/RedGrey.png',
					'name' => 'Red Grey'
				],
				[
					'code' => 'Red White',
					'hex' => ['D9152C', 'FFFFFF'],
					'image' => 'assets/images/figured/large/swirl/RedWhite.png',
					'name' => 'Red White'
				],
				[
					'code' => 'Red White Blue',
					'hex' => ['D9152C', 'FFFFFF', '0F42B6'],
					'image' => 'assets/images/figured/large/swirl/RedWhiteBlue.png',
					'name' => 'Red White Blue'
				],
				[
					'code' => 'Red Yellow',
					'hex' => ['EB2328', 'F2E50F'],
					'image' => 'assets/images/figured/large/swirl/RedYellow.png',
					'name' => 'Red Yellow'
				],
				[
					'code' => 'Reflex Blue Black',
					'hex' => ['000001', '120F6D'],
					'image' => 'assets/images/figured/large/swirl/ReflexBlueBlack.png',
					'name' => 'Reflex Blue Black'
				],
				[
					'code' => 'Reflex Blue Grey',
					'hex' => ['242097', '999C9E'],
					'image' => 'assets/images/figured/large/swirl/ReflexBlueGrey.png',
					'name' => 'Reflex Blue Grey'
				],
				[
					'code' => 'Teal White',
					'hex' => ['FEFEFE', '1CA4AD'],
					'image' => 'assets/images/figured/large/swirl/TealWhite.png',
					'name' => 'Teal White'
				],
				[
					'code' => 'White Black Green',
					'hex' => ['FEFEFE', '000000', '05461F'],
					'image' => 'assets/images/figured/large/swirl/WhiteBlackGreen.png',
					'name' => 'White Black Green'
				]
			],
			'glow' => [
				[
					'code' => 'Glow Dark Blue',
					'hex' => ['3886C4'],
					'image' => 'assets/images/figured/glow/glow/GlowDarkBLUE.png',
					'name' => 'Blue'
				],
				[
					'code' => 'Glow Dark Green',
					'hex' => ['5DCE66'],
					'image' => 'assets/images/figured/glow/glow/GlowDarkGREEN.png',
					'name' => 'Green'
				],
				[
					'code' => 'Glow Dark Pink',
					'hex' => ['D57DA3'],
					'image' => 'assets/images/figured/glow/GlowDarkFIGUREDPINK.png',
					'name' => 'Pink'
				],
				[
					'code' => 'Glow Dark Purple',
					'hex' => ['A078AD'],
					'image' => 'assets/images/figured/glow/GlowDarkPURPLE.png',
					'name' => 'Purple'
				],
				[
					'code' => 'Glow Dark White',
					'hex' => ['A078AD'],
					'image' => 'assets/images/figured/glow/GlowDarkFIGUREDWHITE.png',
					'name' => 'White'
				]
			]
        ];
	}

	private static function figuredLarge()
	{
		return [
			'solid' => [
				[
					'code' => 'Black',
					'hex' => ['000000'],
					'image' => 'assets/images/figured/large/solid/Black.png',
					'name' => 'Black'
				],
				[
					'code' => 'Brown',
					'hex' => ['6A491A'],
					'image' => 'assets/images/figured/large/solid/Brown.png',
					'name' => 'Brown'
				],
				[
					'code' => 'Green',
					'hex' => ['0E9543'],
					'image' => 'assets/images/figured/large/solid/Green.png',
					'name' => 'Green'
				],
				[
					'code' => 'Grey',
					'hex' => ['A0A29F'],
					'image' => 'assets/images/figured/large/solid/Grey.png',
					'name' => 'Grey'
				],
				[
					'code' => 'Hot Pink',
					'hex' => ['FD029A'],
					'image' => 'assets/images/figured/large/solid/HotPink.png',
					'name' => 'Hot Pink'
				],
				[
					'code' => 'Light Blue',
					'hex' => ['9ABFE5'],
					'image' => 'assets/images/figured/large/solid/LightBlue.png',
					'name' => 'Light Blue'
				],
				[
					'code' => 'Light Pink',
					'hex' => ['F997B7'],
					'image' => 'assets/images/figured/large/solid/LightPink.png',
					'name' => 'Light Pink'
				],
				[
					'code' => 'Lime Green',
					'hex' => ['8CD50B'],
					'image' => 'assets/images/figured/large/solid/LimeGreen.png',
					'name' => 'Lime Green'
				],
				[
					'code' => 'Pantone202',
					'hex' => ['891C2E'],
					'image' => 'assets/images/figured/large/solid/Pantone202.png',
					'name' => 'Maroon'
				],
				[
					'code' => 'Pantone125',
					'hex' => ['836F3D'],
					'image' => 'assets/images/figured/large/solid/Pantone125.png',
					'name' => 'Metallic Gold'
				],
				[
					'code' => 'Royal Blue',
					'hex' => ['01214E'],
					'image' => 'assets/images/figured/large/solid/RoyalBlue.png',
					'name' => 'Royal Blue'
				],
				[
					'code' => 'Orange',
					'hex' => ['EF6B01'],
					'image' => 'assets/images/figured/large/solid/Orange.png',
					'name' => 'Orange'
				],
				[
					'code' => 'Pantone729',
					'hex' => ['B99474'],
					'image' => 'assets/images/figured/large/solid/Pantone729.png',
					'name' => 'Khaki'
				],
				[
					'code' => 'Red',
					'hex' => ['EA0D2C'],
					'image' => 'assets/images/figured/large/solid/Red.png',
					'name' => 'Red'
				],
				[
					'code' => 'Teal',
					'hex' => ['079CA5'],
					'image' => 'assets/images/figured/large/solid/Teal.png',
					'name' => 'Teal'
				],
				[
					'code' => 'White',
					'hex' => ['FFFFFF'],
					'image' => 'assets/images/figured/large/solid/White.png',
					'name' => 'White'
				],
				[
					'code' => 'Yellow',
					'hex' => ['F2E80F'],
					'image' => 'assets/images/figured/large/solid/Yellow.png',
					'name' => 'Yellow'
				]
			],
			'segmented' => [
				[
					'code' => 'Black Green',
					'hex' => ['000000', '0E9543'],
					'image' => 'assets/images/figured/large/segmented/BlackGreen.png',
					'name' => 'Black Green'
				],
				[
					'code' => 'Black Hot Pink',
					'hex' => ['000000', 'FD029A'],
					'image' => 'assets/images/figured/large/segmented/BlackHotPink.png',
					'name' => 'Black Hot Pink'
				],
				[
					'code' => 'Black Metallic Gold',
					'hex' => ['000000', '836F3D'],
					'image' => 'assets/images/figured/large/segmented/BlackMetallicGold.png',
					'name' => 'Black Metallic Gold'
				],
				[
					'code' => 'Black Metallic Silver',
					'hex' => ['000000', '8D8F8C'],
					'image' => 'assets/images/figured/large/segmented/BlackMetallicSilver.png',
					'name' => 'Black Metallic Silver'
				],
				[
					'code' => 'Black Orange',
					'hex' => ['000000', 'EF6B01'],
					'image' => 'assets/images/figured/large/segmented/BlackOrange.png',
					'name' => 'Black Orange'
				],
				[
					'code' => 'Black Pantone 267',
					'hex' => ['000000', '5A108B'],
					'image' => 'assets/images/figured/large/segmented/BlackPANTONE267.png',
					'name' => 'Black Purple'
				],
				[
					'code' => 'Black White',
					'hex' => ['000000', 'FFFFFF'],
					'image' => 'assets/images/figured/large/segmented/BlackWhite.png',
					'name' => 'Black White'
				],
				[
					'code' => 'Black Yellow',
					'hex' => ['000000', 'F2E80F'],
					'image' => 'assets/images/figured/large/segmented/BlackYellow.png',
					'name' => 'Black Yellow'
				],
				[
					'code' => 'Blue Grey',
					'hex' => ['0B45BB', 'A0A29F'],
					'image' => 'assets/images/figured/large/segmented/BlueGrey.png',
					'name' => 'Blue Grey'
				],
				[
					'code' => 'Blue Hot Pink',
					'hex' => ['0B45BB', 'FD029A'],
					'image' => 'assets/images/figured/large/segmented/BlueHotPink.png',
					'name' => 'Blue Hot Pink'
				],
				[
					'code' => 'Blue Light Blue',
					'hex' => ['0B45BB', '9ABFE5'],
					'image' => 'assets/images/figured/large/segmented/BlueLightBlue.png',
					'name' => 'Blue Light Blue'
				],
				[
					'code' => 'Blue Pantone267 Red',
					'hex' => ['0B45BB', '5A108B', 'EA0D2C'],
					'image' => 'assets/images/figured/large/segmented/BluePANTONE267Red.png',
					'name' => 'Blue Violet Red'
				],
				[
					'code' => 'Green Red Yellow',
					'hex' => ['0E9543', 'EA0D2C', 'F2E80F'],
					'image' => 'assets/images/figured/large/segmented/GreenRedYellow.png',
					'name' => 'Green Red Yellow'
				],
				[
					'code' => 'Green Reflex Blue',
					'hex' => ['0E9543', '191597'],
					'image' => 'assets/images/figured/large/segmented/GreenReflexBlue.png',
					'name' => 'Green Reflex Blue'
				],
				[
					'code' => 'Hot Pink Light Blue',
					'hex' => ['FD029A', '9ABFE5'],
					'image' => 'assets/images/figured/large/segmented/HotPinkLightBlue.png',
					'name' => 'Hot Pink Light Blue'
				],
				[
					'code' => 'Pantone376 Pantone7459',
					'hex' => ['7BB201', '44A3BC'],
					'image' => 'assets/images/figured/large/segmented/PANTONE376PANTONE7459.png',
					'name' => 'Lime Green Light Blue'
				],
				[
					'code' => 'Rainbow',
					'hex' => ['0E9543', 'F2E80F', 'EF6B01', 'EA0D2C', '5A108B', '0B45BB'],
					'image' => 'assets/images/figured/large/segmented/RainbowFigured.png',
					'name' => 'Rainbow'
				],
				[
					'code' => 'Red Black',
					'hex' => ['EA0D2C', '000000'],
					'image' => 'assets/images/figured/large/segmented/RedBlack.png',
					'name' => 'Red Black'
				],
				[
					'code' => 'Red Black Yellow',
					'hex' => ['EA0D2C', '000000', 'F2E80F'],
					'image' => 'assets/images/figured/large/segmented/RedBlackYellow.png',
					'name' => 'Red Black Yellow'
				],
				[
					'code' => 'Red Blue',
					'hex' => ['EA0D2C', '0B45BB'],
					'image' => 'assets/images/figured/large/segmented/RedBlue.png',
					'name' => 'Red Blue'
				],
				[
					'code' => 'Red Blue Hot Pink',
					'hex' => ['EA0D2C', '0B45BB', 'FD029A'],
					'image' => 'assets/images/figured/large/segmented/RedBlueHotPink.png',
					'name' => 'Red Blue Hot Pink'
				],
				[
					'code' => 'Red Blue Yellow',
					'hex' => ['EA0D2C', '0B45BB', 'F2E80F'],
					'image' => 'assets/images/figured/large/segmented/RedBlueYellow.png',
					'name' => 'Red Blue Yellow'
				],
				[
					'code' => 'Red Green',
					'hex' => ['EA0D2C', '0E9543'],
					'image' => 'assets/images/figured/large/segmented/RedGreen.png',
					'name' => 'Red Green'
				],
				[
					'code' => 'Red Grey',
					'hex' => ['EA0D2C', 'A0A29F'],
					'image' => 'assets/images/figured/large/segmented/RedGrey.png',
					'name' => 'Red Grey'
				],
				[
					'code' => 'Red Hot Pink',
					'hex' => ['EA0D2C', 'FD029A'],
					'image' => 'assets/images/figured/large/segmented/RedHotPink.png',
					'name' => 'Red Hot Pink'
				],
				[
					'code' => 'Red Pantone267 Black',
					'hex' => ['EA0D2C', '5A108B', '000000'],
					'image' => 'assets/images/figured/large/segmented/RedPANTONE267Black.png',
					'name' => 'Red Violet Black'
				],
				[
					'code' => 'Red Pantone7459',
					'hex' => ['EA0D2C', '419DB5'],
					'image' => 'assets/images/figured/large/segmented/RedPANTONE7459.png',
					'name' => 'Red Blue'
				],
				[
					'code' => 'Red Pink',
					'hex' => ['EA0D2C', 'FB78B2'],
					'image' => 'assets/images/figured/large/segmented/RedPink.png',
					'name' => 'Red Pink'
				],
				[
					'code' => 'Red White Blue',
					'hex' => ['EA0D2C', 'FEFEFE', '0B45BB'],
					'image' => 'assets/images/figured/large/segmented/RedWhiteBlue.png',
					'name' => 'Red White Blue'
				],
				[
					'code' => 'Red White Green',
					'hex' => ['EA0D2C', 'FEFEFE', '0E9543'],
					'image' => 'assets/images/figured/large/segmented/RedWhiteGreen.png',
					'name' => 'Red White Green'
				],
				[
					'code' => 'Red Yellow',
					'hex' => ['EA0D2C', 'F2E80F'],
					'image' => 'assets/images/figured/large/segmented/RedYellow.png',
					'name' => 'Red Yellow'
				],
				[
					'code' => 'White Black Orange',
					'hex' => ['EF6B01', 'FEFEFE', '000000'],
					'image' => 'assets/images/figured/large/segmented/WhiteBlackOrange.png',
					'name' => 'White Black Orange'
				],
				[
					'code' => 'White Blue',
					'hex' => ['FEFEFE', '0B45BB'],
					'image' => 'assets/images/figured/large/segmented/WhiteBlue.png',
					'name' => 'White Blue'
				],
				[
					'code' => 'White Blue Pantone267',
					'hex' => ['5A108B', 'FEFEFE', '0B45BB'],
					'image' => 'assets/images/figured/large/segmented/WhiteBluePANTONE267.png',
					'name' => 'White Blue Violet'
				],
				[
					'code' => 'White Brown',
					'hex' => ['FEFEFE', '6A491A'],
					'image' => 'assets/images/figured/large/segmented/WhiteBrown.png',
					'name' => 'White Brown'
				],
				[
					'code' => 'White Green',
					'hex' => ['FEFEFE', '0E9543'],
					'image' => 'assets/images/figured/large/segmented/WhiteGreen.png',
					'name' => 'White Green'
				],
				[
					'code' => 'White Grey',
					'hex' => ['FEFEFE', 'A0A29F'],
					'image' => 'assets/images/figured/large/segmented/WhiteGrey.png',
					'name' => 'White Grey'
				],
				[
					'code' => 'White Hot Pink',
					'hex' => ['FEFEFE', 'FD029A'],
					'image' => 'assets/images/figured/large/segmented/WhiteHotPink.png',
					'name' => 'White Hot Pink'
				],
				[
					'code' => 'White Light Blue',
					'hex' => ['FEFEFE', '9ABFE5'],
					'image' => 'assets/images/figured/large/segmented/WhiteLightBlue.png',
					'name' => 'White Light Blue'
				],
				[
					'code' => 'White Lime Green',
					'hex' => ['FEFEFE', '8CD50B'],
					'image' => 'assets/images/figured/large/segmented/WhiteLimeGreen.png',
					'name' => 'White Lime Green'
				],
				[
					'code' => 'White Orange',
					'hex' => ['FEFEFE', 'EF6B01'],
					'image' => 'assets/images/figured/large/segmented/WhiteOrange.png',
					'name' => 'White Orange'
				],
				[
					'code' => 'White Pantone528',
					'hex' => ['FEFEFE', 'AD71C5'],
					'image' => 'assets/images/figured/large/segmented/WhitePANTONE528.png',
					'name' => 'White Lavender'
				],
				[
					'code' => 'White Pink',
					'hex' => ['FEFEFE', 'FB78B2'],
					'image' => 'assets/images/figured/large/segmented/WhitePink.png',
					'name' => 'White Pink'
				],
				[
					'code' => 'White Red',
					'hex' => ['FEFEFE', 'EA0D2C'],
					'image' => 'assets/images/figured/large/segmented/WhiteRed.png',
					'name' => 'White Red'
				],
				[
					'code' => 'White Teal',
					'hex' => ['FEFEFE', '079CA5'],
					'image' => 'assets/images/figured/large/segmented/WhiteTeal.png',
					'name' => 'White Teal'
				],
				[
					'code' => 'Yellow Blue',
					'hex' => ['F2E80F', '0B45BB'],
					'image' => 'assets/images/figured/large/segmented/YellowBlue.png',
					'name' => 'Yellow Blue'
				]
			],
			'swirl' => [
				[
					'code' => 'Black Green',
					'hex' => ['021509', '0C9040'],
					'image' => 'assets/images/figured/large/swirl/BlackGreen.png',
					'name' => 'Black Green'
				],
				[
					'code' => 'Black Grey',
					'hex' => ['070707', '9DA09C'],
					'image' => 'assets/images/figured/large/swirl/BlackGrey.png',
					'name' => 'Black Grey'
				],
				[
					'code' => 'Black Hot Pink',
					'hex' => ['070707', 'E5028B'],
					'image' => 'assets/images/figured/large/swirl/BlackHotPink.png',
					'name' => 'Black Hot Pink'
				],
				[
					'code' => 'Black Pantone267',
					'hex' => ['070707', '560F88'],
					'image' => 'assets/images/figured/large/swirl/BlackPANTONE267.png',
					'name' => 'Black Violet'
				],
				[
					'code' => 'Black Red',
					'hex' => ['070707', 'E30C2A'],
					'image' => 'assets/images/figured/large/swirl/BlackRed.png',
					'name' => 'Black Red'
				],
				[
					'code' => 'Black White',
					'hex' => ['070707', 'F3F3F3'],
					'image' => 'assets/images/figured/large/swirl/BlackWhite.png',
					'name' => 'Black White'
				],
				[
					'code' => 'Black Yellow',
					'hex' => ['070707', 'E4DA0E'],
					'image' => 'assets/images/figured/large/swirl/BlackYellow.png',
					'name' => 'Black Yellow'
				],
				[
					'code' => 'Blue Lime Green',
					'hex' => ['1753A6', '8AD40C'],
					'image' => 'assets/images/figured/large/swirl/BlueLimeGreen.png',
					'name' => 'Blue Lime Green'
				],
				[
					'code' => 'Blue White',
					'hex' => ['F3F6FC', '0D46BA'],
					'image' => 'assets/images/figured/large/swirl/BlueWhite.png',
					'name' => 'Blue White'
				],
				[
					'code' => 'Dark Green White',
					'hex' => ['F3F6FC', '174830'],
					'image' => 'assets/images/figured/large/swirl/DarkGreenWhite.png',
					'name' => 'Dark Green White'
				],
				[
					'code' => 'Dessert Camo',
					'hex' => ['4E4726', 'DECE76', '6B5619'],
					'image' => 'assets/images/figured/large/swirl/DesertCamo.png',
					'name' => 'Dessert Camo'
				],
				[
					'code' => 'Green Camo',
					'hex' => ['000000', 'BE8B5E', '64631C'],
					'image' => 'assets/images/figured/large/swirl/GreenCamo.png',
					'name' => 'Green Camo'
				],
				[
					'code' => 'Green White',
					'hex' => ['FBFCFC', '009B4F'],
					'image' => 'assets/images/figured/large/swirl/GreenWhite.png',
					'name' => 'Green White'
				],
				[
					'code' => 'Hot Pink Light Blue',
					'hex' => ['E22FAB', '9BBAE3'],
					'image' => 'assets/images/figured/large/swirl/HotPinkLightBlue.png',
					'name' => 'Hot Pink Light Blue'
				],
				[
					'code' => 'Hot Pink Light Blue Lime Green',
					'hex' => ['98C0D7', '8FCF49', 'F90599'],
					'image' => 'assets/images/figured/large/swirl/HotPinkLightBlueLimeGreen.png',
					'name' => 'Hot Pink Light Blue Lime Green'
				],
				[
					'code' => 'Lime Green Yellow Light Blue',
					'hex' => ['8FD040', '97C1CC', 'F0E711'],
					'image' => 'assets/images/figured/large/swirl/LimeGreenYellowLightBlue.png',
					'name' => 'Lime Green Yellow Light Blue'
				],
				[
					'code' => 'Maroon Grey',
					'hex' => ['8A2232', 'A0A19D'],
					'image' => 'assets/images/figured/large/swirl/MaroonGrey.png',
					'name' => 'Maroon Grey'
				],
				[
					'code' => 'Orange White',
					'hex' => ['F17A19', 'FFFCF9'],
					'image' => 'assets/images/figured/large/swirl/OrangeWhite.png',
					'name' => 'Orange White'
				],
				[
					'code' => 'Pantone267 White',
					'hex' => ['773BA1', 'FBF9FC'],
					'image' => 'assets/images/figured/large/swirl/PANTONE267White.png',
					'name' => 'Violet White'
				],
				[
					'code' => 'Pink Pantone267',
					'hex' => ['681990', 'F574B1'],
					'image' => 'assets/images/figured/large/swirl/PinkPANTONE267.png',
					'name' => 'Pink Violet'
				],
				[
					'code' => 'Rainbow',
					'hex' => ['F4303D', 'FEDE1E', '2230A9'],
					'image' => 'assets/images/figured/large/swirl/RainbowSwirl.png',
					'name' => 'Rainbow'
				],
				[
					'code' => 'Red Black Blue',
					'hex' => ['E10D30', '08389E', '000000'],
					'image' => 'assets/images/figured/large/swirl/RedBlackBlue.png',
					'name' => 'Red Black Blue'
				],
				[
					'code' => 'Red Green',
					'hex' => ['D9152C', '178B41'],
					'image' => 'assets/images/figured/large/swirl/RedGreen.png',
					'name' => 'Red Green'
				],
				[
					'code' => 'Red Grey',
					'hex' => ['D9152C', 'A1A19C'],
					'image' => 'assets/images/figured/large/swirl/RedGrey.png',
					'name' => 'Red Grey'
				],
				[
					'code' => 'Red White',
					'hex' => ['D9152C', 'FFFFFF'],
					'image' => 'assets/images/figured/large/swirl/RedWhite.png',
					'name' => 'Red White'
				],
				[
					'code' => 'Red White Blue',
					'hex' => ['D9152C', 'FFFFFF', '0F42B6'],
					'image' => 'assets/images/figured/large/swirl/RedWhiteBlue.png',
					'name' => 'Red White Blue'
				],
				[
					'code' => 'Red Yellow',
					'hex' => ['EB2328', 'F2E50F'],
					'image' => 'assets/images/figured/large/swirl/RedYellow.png',
					'name' => 'Red Yellow'
				],
				[
					'code' => 'Reflex Blue Black',
					'hex' => ['000001', '120F6D'],
					'image' => 'assets/images/figured/large/swirl/ReflexBlueBlack.png',
					'name' => 'Reflex Blue Black'
				],
				[
					'code' => 'Reflex Blue Grey',
					'hex' => ['242097', '999C9E'],
					'image' => 'assets/images/figured/large/swirl/ReflexBlueGrey.png',
					'name' => 'Reflex Blue Grey'
				],
				[
					'code' => 'Teal White',
					'hex' => ['FEFEFE', '1CA4AD'],
					'image' => 'assets/images/figured/large/swirl/TealWhite.png',
					'name' => 'Teal White'
				],
				[
					'code' => 'White Black Green',
					'hex' => ['FEFEFE', '000000', '05461F'],
					'image' => 'assets/images/figured/large/swirl/WhiteBlackGreen.png',
					'name' => 'White Black Green'
				]
			],
			'glow' => [
				[
					'code' => 'Glow Dark Blue',
					'hex' => ['3886C4'],
					'image' => 'assets/images/figured/glow/GlowDarkBLUE.png',
					'name' => 'Blue'
				],
				[
					'code' => 'Glow Dark Green',
					'hex' => ['5DCE66'],
					'image' => 'assets/images/figured/glow/GlowDarkGREEN.png',
					'name' => 'Green'
				],
				[
					'code' => 'Glow Dark Pink',
					'hex' => ['D57DA3'],
					'image' => 'assets/images/figured/glow/GlowDarkPINK.png',
					'name' => 'Pink'
				],
				[
					'code' => 'Glow Dark Purple',
					'hex' => ['A078AD'],
					'image' => 'assets/images/figured/glow/GlowDarkPURPLE.png',
					'name' => 'Purple'
				],
				[
					'code' => 'Glow Dark White',
					'hex' => ['A078AD'],
					'image' => 'assets/images/figured/glow/GlowDarkFIGUREDWHITE.png',
					'name' => 'White'
				]
			]
		];
	}

}
