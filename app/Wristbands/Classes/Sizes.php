<?php

namespace App\Wristbands\Classes;

use Storage;

class Sizes {

	public function reset()
	{
		// wristband sizes.
		Storage::put('json/wristband/sizes.json', json_encode($this->sizes()));
	}

	public function getSizes()
	{
		// check if .json file exists.
		if(!Storage::has('json/wristband/sizes.json')) {
			// generate and save .json file.
			Storage::put('json/wristband/sizes.json', json_encode($this->sizes()));
		}
		// return data array from .json file.
		return json_decode(Storage::get('json/wristband/sizes.json'), true);
	}

    public function getSizesByStyle($style='printed')
    {
        if(empty($style)) {
            return [];
        }

        // get sizes for selected style.
        switch ($style) {
            case 'dual-layer':
                return ['0-50inch', '0-75inch'];
                break;

            case 'figured':
                return ['0-50inch', '0-75inch', '1-00inch'];
                break;

            default:
                return ['0-25inch', '0-50inch', '0-75inch', '1-00inch', '1-50inch', '2-00inch'];
                break;
        }
    }

	private static function sizes()
	{
        return [
			'0-25inch' => [
				'code' => '0-25inch',
				'image' => 'assets/images/src/sizes/1-4.png',
				'name' => '1/4 Inch',
                'value' => '0.25'
			],
			'0-50inch' => [
				'code' => '0-50inch',
				'image' => 'assets/images/src/sizes/1-2.png',
				'name' => '1/2 Inch',
                'value' => '0.50'
			],
			'0-75inch' => [
				'code' => '0-75inch',
				'image' => 'assets/images/src/sizes/3-4.png',
				'name' => '3/4 Inch',
                'value' => '0.75'
			],
			'1-00inch' => [
				'code' => '1-00inch',
				'image' => 'assets/images/src/sizes/1.png',
				'name' => '1 Inch',
                'value' => '1.00'
			],
			'1-50inch' => [
				'code' => '1-50inch',
				'image' => 'assets/images/src/sizes/11-2.png',
				'name' => '1 1/2 Inch',
                'value' => '1.50'
			],
			'2-00inch' => [
				'code' => '2-00inch',
				'image' => 'assets/images/src/sizes/2.png',
				'name' => '2 Inch',
                'value' => '2.00'
            ]
        ];
	}

}
