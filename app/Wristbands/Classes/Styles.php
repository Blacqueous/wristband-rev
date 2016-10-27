<?php

namespace App\Wristbands\Classes;

use Storage;

class Styles {

	public function reset()
	{
		// wristband styles.
		Storage::put('json/wristband/styles.json', json_encode($this->styles()));
	}

	public function getStyles()
	{
		// check if .json file exists.
		if(!Storage::has('json/wristband/styles.json')) {
			// generate and save .json file.
			Storage::put('json/wristband/styles.json', json_encode($this->styles()));
		}
		// return data from .json file.
		return json_decode(Storage::get('json/wristband/styles.json'), true);
	}

	private static function styles()
	{
        return [
			'printed' => [
				'code' => 'printed',
				'image' => 'assets/images/src/Printed.png',
				'name' => 'Printed'
			],
            'debossed' => [
                'code' => 'debossed',
				'image' => 'assets/images/src/Debossed.png',
				'name' => 'Debossed'
            ],
            'ink-injected' => [
                'code' => 'ink-injected',
				'image' => 'assets/images/src/Color-Filled.png',
				'name' => 'Ink Injected'
            ],
            'embossed' => [
                'code' => 'embossed',
				'image' => 'assets/images/src/Embossed.png',
				'name' => 'Embossed'
            ],
            'dual-layer' => [
                'code' => 'dual-layer',
				'image' => 'assets/images/src/Dual-Layer.png',
				'name' => 'Dual Layer'
            ],
            'embossed-printed' => [
                'code' => 'embossed-printed',
				'image' => 'assets/images/src/Embossed-Printed.png',
				'name' => 'Embossed Printed'
            ],
            'figured' => [
                'code' => 'figured',
				'image' => 'assets/images/src/Figured.png',
				'name' => 'Figured'
            ],
            'blank' => [
                'code' => 'blank',
				'image' => 'assets/images/src/Blank.png',
				'name' => 'Blank'
            ]
        ];
	}

}
