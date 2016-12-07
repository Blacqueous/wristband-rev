<?php

namespace App\Wristbands\Classes;

use Storage;

class SizeChart {

	public function reset()
	{
		// reset list for available wristband size charts.
		Storage::put('json/wristband/sizechart/list.json', json_encode($this->sizechart()));
	}

	public function getList()
	{
		// return all available wristband size charts.
        return $this->getSizeChart();
    }

	public function getSizeChart()
	{
		// check if .json file exists.
		
		if(!Storage::has('json/wristband/sizechart/list.json')) {
			// generate and save .json file.
			Storage::put('json/wristband/sizechart/list.json', json_encode($this->sizechart()));
		}
		 $datasamp = json_decode(Storage::get('json/wristband/sizechart/list.json'), true);
	
		// return data from .json file.
		return json_decode(Storage::get('json/wristband/sizechart/list.json'), true);
	}

    private static function sizechart()
    { 
        return [
			[
                'code' => "11-4Inch",
                'image' => "assets/images/src/sizes/1-4InchWristband.png",
                'name' => "11-4 Inch"
            ],
            [
                'code' => "12-2Inch",
                'image' => "assets/images/src/sizes/1-2InchWristband.png",
                'name' => "12-2 Inch"
            ],
			 
            [
                'code' => "13-4Inch",
                'image' => "assets/images/src/sizes/3-4InchWristband.png",
                'name' => "13-1 Inch"
            ],
			
            [
                'code' => "14Inch",
                'image' => "assets/images/src/sizes/1InchWristband.png",
                'name' => "14 Inch"
            ],
			
            [
                'code' => "15-2Inch",
                'image' => "assets/images/src/sizes/11-2InchWristband.png",
                'name' => "15 1/2 Inch"
            ],
			
			[
                'code' => "22Inch",
                'image' => "assets/images/src/sizes/2InchWristband.png",
                'name' => "22 Inch"
            ]
        ];
    }

}
