<?php

namespace App\Wristbands\Classes;

use Storage;

class ProductGallery {

	public function reset()
	{
		// reset list for available wristband size charts.
		Storage::put('json/wristband/gallery/list.json', json_encode($this->gallery()));
	}

	public function getList()
	{
		// return all available wristband size charts.
        return $this->getProductGallery();
    }

	public function getProductGallery()
	{
		// check if .json file exists.
		
		if(!Storage::has('json/wristband/gallery/list.json')) {
			// generate and save .json file.
			Storage::put('json/wristband/gallery/list.json', json_encode($this->gallery()));
		}

		// return data from .json file.
		return json_decode(Storage::get('json/wristband/gallery/list.json'), true);
	}

    private static function gallery()
    { 
        return [
            [
                'code' => "GW-14231",
                'image' => "assets/images/src/gallery/GW-14231.png",
                'name' => "SILICONEWRISTBANDS-14231"
            ],
            [
                'code' => "GW-14250",
                'image' => "assets/images/src/gallery/GW-14250.png",
                'name' => "SILICONEWRISTBANDS-14250"
            ],
            [
                'code' => "GW-14515",
                'image' => "assets/images/src/gallery/GW-14515.png",
                'name' => "SILICONEWRISTBANDS-14515"
            ],
			 [
                'code' => "GW-14541",
                'image' => "assets/images/src/gallery/GW-14541.png",
                'name' => "SILICONEWRISTBANDS-14541"
            ],
            [
                'code' => "GW-14762",
                'image' => "assets/images/src/gallery/GW-14762.png",
                'name' => "SILICONEWRISTBANDS-14762"
            ],
            [
                'code' => "GW-14791",
                'image' => "assets/images/src/gallery/GW-14791.png",
                'name' => "SILICONEWRISTBANDS-14791"
            ],
			[
                'code' => "GW-14839",
                'image' => "assets/images/src/gallery/GW-14839.png",
                'name' => "SILICONEWRISTBANDS-14839"
            ],
			[
                'code' => "GW-14883",
                'image' => "assets/images/src/gallery/GW-14883.png",
                'name' => "SILICONEWRISTBANDS-14883"
            ],
			[
                'code' => "GW-14918",
                'image' => "assets/images/src/gallery/GW-14918.png",
                'name' => "SILICONEWRISTBANDS-14918"
            ],
			[
                'code' => "GW-14926",
                'image' => "assets/images/src/gallery/GW-14926.png",
                'name' => "SILICONEWRISTBANDS-14926"
            ],
			[
                'code' => "GW-14945",
                'image' => "assets/images/src/gallery/GW-14945.png",
                'name' => "SILICONEWRISTBANDS-14945"
            ],
			[
                'code' => "GW-14990-s",
                'image' => "assets/images/src/gallery/GW-14990-s.png",
                'name' => "SILICONEWRISTBANDS-14990-s3"
            ],
			[
                'code' => "GW-14999",
                'image' => "assets/images/src/gallery/GW-14999.png",
                'name' => "SILICONEWRISTBANDS-14999"
            ],
			[
                'code' => "GW-15013",
                'image' => "assets/images/src/gallery/GW-15013.png",
                'name' => "SILICONEWRISTBANDS-15013"
            ],
			[
                'code' => "GW-15043&GW-71133",
                'image' => "assets/images/src/gallery/GW-15043&GW-71133.png",
                'name' => "SILICONEWRISTBANDS-15043 & GW-71133"
            ],
			[
                'code' => "GW-15080",
                'image' => "assets/images/src/gallery/GW-15080.png",
                'name' => "SILICONEWRISTBANDS-15080"
            ],
			[
                'code' => "GW-15112",
                'image' => "assets/images/src/gallery/GW-15112.png",
                'name' => "SILICONEWRISTBANDS-15112"
            ],
			[
                'code' => "GW-15170",
                'image' => "assets/images/src/gallery/GW-15170.png",
                'name' => "SILICONEWRISTBANDS-15170"
            ],
			[
                'code' => "GW-15217",
                'image' => "assets/images/src/gallery/GW-15217.png",
                'name' => "SILICONEWRISTBANDS-15217"
            ],
			[
                'code' => "GW-15281",
                'image' => "assets/images/src/gallery/GW-15281.png",
                'name' => "SILICONEWRISTBANDS-15281"
            ],
			[
                'code' => "GW-15357",
                'image' => "assets/images/src/gallery/GW-15357.png",
                'name' => "SILICONEWRISTBANDS-15357"
            ],
			[
                'code' => "GW-15407",
                'image' => "assets/images/src/gallery/GW-15407.png",
                'name' => "SILICONEWRISTBANDS-15407"
            ],
			[
                'code' => "GW-15440",
                'image' => "assets/images/src/gallery/GW-15440.png",
                'name' => "SILICONEWRISTBANDS-15440"
            ],
			[
                'code' => "GW-15452-1",
                'image' => "assets/images/src/gallery/GW-15452-1.png",
                'name' => "SILICONEWRISTBANDS-15452-1"
            ],
			[
                'code' => "GW-15452-2",
                'image' => "assets/images/src/gallery/GW-15452-2.png",
                'name' => "SILICONEWRISTBANDS-15452-2"
            ],
			[
                'code' => "GW-15464",
                'image' => "assets/images/src/gallery/GW-15464.png",
                'name' => "SILICONEWRISTBANDS-15464"
            ],
			[
                'code' => "GW-15492",
                'image' => "assets/images/src/gallery/GW-15492.png",
                'name' => "SILICONEWRISTBANDS-15492"
            ],
			[
                'code' => "GW-15510",
                'image' => "assets/images/src/gallery/GW-15510.png",
                'name' => "SILICONEWRISTBANDS-15510"
            ],
			[
                'code' => "GW-15524",
                'image' => "assets/images/src/gallery/GW-15524.png",
                'name' => "SILICONEWRISTBANDS-15524"
            ],
			[
                'code' => "GW-15607",
                'image' => "assets/images/src/gallery/GW-15607.png",
                'name' => "SILICONEWRISTBANDS-15607"
            ],
			[
                'code' => "GW-15685",
                'image' => "assets/images/src/gallery/GW-15685.png",
                'name' => "SILICONEWRISTBANDS-15685"
            ],
			[
                'code' => "GW-15719",
                'image' => "assets/images/src/gallery/GW-15719.png",
                'name' => "SILICONEWRISTBANDS-15719"
            ],
			[
                'code' => "GW-15778-1",
                'image' => "assets/images/src/gallery/GW-15778-1.png",
                'name' => "SILICONEWRISTBANDS-15778-1"
            ],
			[
                'code' => "GW-15832",
                'image' => "assets/images/src/gallery/GW-15832.png",
                'name' => "SILICONEWRISTBANDS-15832"
            ],
			[
                'code' => "GW-15952",
                'image' => "assets/images/src/gallery/GW-15952.png",
                'name' => "SILICONEWRISTBANDS-15952"
            ],
			[
                'code' => "GW-16080",
                'image' => "assets/images/src/gallery/GW-16080.png",
                'name' => "SILICONEWRISTBANDS-16080"
            ]
        ];
    }

}
