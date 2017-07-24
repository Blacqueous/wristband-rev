<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;
use Storage;

class MoldingFee extends Model {

    protected $table = 'price_molding_fee';

    public $timestamps = false;

    public function reset()
    {
        $this->resetJSONPrice();
    }

    // Wristband Prices

    public function getPrice()
    {
        // get and return query.
    	return DB::table($this->table)
                ->select('*')
                ->first();
    }

    public static function insertPrice($data=null)
    {
        // Check if has data.
        if(!$data) { return false; }

        try{
            // Exceute insert.
            $_this = new self;
            $_this->truncatePrice();
            DB::table($_this->table)->insert($data);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public static function truncatePrice()
    {
        $_this = new self;
        DB::table($_this->table)->truncate();
    }

	public function resetJSONPrice()
	{
        // price array container.
        $prices = [];
        // get results.
        $priceData = $this->getPrice();
		if($priceData) {
            if($priceData->price) {
                $prices[] = $priceData->price;
            }
		}
		// generate and save .json file.
		Storage::put('json/wristband/molding_fee.json', json_encode($prices));
	}

	public function getJSONPrice()
	{
		// check if .json file exists.
		if(!Storage::has('json/wristband/molding_fee.json')) {
            // price array container.
            $prices = [];
            // get results.
            $priceData = $this->getPrice();
    		if($priceData) {
    			if($priceData->price) {
    				$prices[] = $priceData->price;
    			}
    		}
    		// generate and save .json file.
    		Storage::put('json/wristband/molding_fee.json', json_encode($prices));
		}
		// return data from .json file.
		return json_decode(Storage::get('json/wristband/molding_fee.json'), true);
	}

}
