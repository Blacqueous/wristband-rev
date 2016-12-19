<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;
use Storage;

class Prices extends Model {

    protected $table_wrist = 'price';
    protected $table_addon = 'price_add_ons';

    public $timestamps = false;

    public function resetAll()
    {
        $this->resetJSONPrice();
        $this->resetJSONAddOn();
        $this->resetJSONPrices();
    }

    // Wristband Prices

    public function getPrice()
    {
        // get and return query.
    	return DB::table($this->table_wrist)
                ->select('*')
                ->get();
    }

    public function getPriceCodeAndName()
    {
        // get and return query.
        return DB::table($this->table_wrist)
                ->select(DB::raw('wristband_style.code AS `style_code`, wristband_style.name AS `style_name`, wristband_size.code AS `size_code`, wristband_size.name AS `size_name`, price.qty, price.price'))
                ->join('wristband_style', 'price.style_id', '=', 'wristband_style.id')
                ->join('wristband_size', 'price.size_id', '=', 'wristband_size.id')
                ->get();
    }

    public static function insertPrice($data=null)
    {
        // Check if has data.
        if(!$data) { return false; }

        try{
            // Exceute insert.
            $_this = new self;
            DB::table($_this->table_wrist)->insert($data);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public static function truncatePrice()
    {
        $_this = new self;
        DB::table($_this->table_wrist)->truncate();
    }

	public function resetJSONPrice()
	{
        // price array container.
        $prices = [];
        // get results.
        $priceList = $this->getPriceCodeAndName();
		if($priceList) {
			foreach($priceList as $key => $value) {
				$prices[strtolower($value->style_code)][$value->size_code][$value->qty] = $value->price;
			}
		}
		// generate and save .json file.
		Storage::put('json/wristband/prices.json', json_encode($prices));
	}

	public function resetJSONPrices()
	{
        // price array container.
        $prices = [];
        // get results.
        $priceList = $this->getPriceCodeAndName();
        if($priceList) {
            foreach($priceList as $key => $value) {
                $prices[strtolower($value->style_code)][$value->qty][$value->size_code] = $value->price;
            }
        }
        // generate and save .json file.
        Storage::put('json/wristband/prices_size.json', json_encode($prices));
	}

	public function getJSONPrices()
	{
		// check if .json file exists.
		if(!Storage::has('json/wristband/prices_size.json')) {
            // price array container.
            $prices = [];
            // get results.
            $priceList = $this->getPriceCodeAndName();
    		if($priceList) {
    			foreach($priceList as $key => $value) {
    				$prices[strtolower($value->style_code)][$value->qty][$value->size_code] = $value->price;
    			}
    		}
			// generate and save .json file.
			 Storage::put('json/wristband/prices_size.json', json_encode($prices));
		}
		// return data from .json file.
		return json_decode(Storage::get('json/wristband/prices_size.json'), true);
	}

	public function getJSONPrice()
	{
		// check if .json file exists.
		if(!Storage::has('json/wristband/prices.json')) {
            // price array container.
            $prices = [];
            // get results.
            $priceList = $this->getPriceCodeAndName();
    		if($priceList) {
    			foreach($priceList as $key => $value) {
    				$prices[strtolower($value->style_code)][$value->size_code][$value->qty] = $value->price;
    			}
    		}
			// generate and save .json file.
			Storage::put('json/wristband/prices.json', json_encode($prices));
		}
		// return data from .json file.
		return json_decode(Storage::get('json/wristband/prices.json'), true);
	}

    // Add On Prices

    public function getAddOn()
    {
        // get and return query.
    	return DB::table($this->table_addon)
                ->select('*')
                ->get();
    }

    public function getAddOnCodeAndName()
    {
        // get and return query.
        return DB::table($this->table_addon)
                ->select(DB::raw('add_ons.code AS `code`, price_add_ons.qty AS `qty`, price_add_ons.price AS `price`'))
                ->join('add_ons', 'price_add_ons.add_on_id', '=', 'add_ons.id')
                ->get();
    }

    public static function insertAddOn($data=null)
    {
        // Check if has data.
        if(!$data) { return false; }

        try{
            // Exceute insert.
            $_this = new self;
            DB::table($_this->table_addon)->insert($data);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public static function truncateAddOn()
    {
        $_this = new self;
        DB::table($_this->table_addon)->truncate();
    }

	public function resetJSONAddOn()
	{
        // price array container.
        $addons = [];
        // get results.
        $priceList = $this->getAddOnCodeAndName();
        if($priceList) {
            foreach($priceList as $key => $value) {
                $addons[strtolower($value->code)][$value->qty] = $value->price;
            }
        }
        // generate and save .json file.
        Storage::put('json/wristband/addons.json', json_encode($addons));
	}

	public function getJSONAddOn()
	{
		// check if .json file exists.
		if(!Storage::has('json/wristband/addons.json')) {
            // price array container.
            $addons = [];
            // get results.
            $priceList = $this->getAddOnCodeAndName();
    		if($priceList) {
    			foreach($priceList as $key => $value) {
    				$addons[strtolower($value->code)][$value->qty] = $value->price;
    			}
    		}
			// generate and save .json file.
			Storage::put('json/wristband/addons.json', json_encode($addons));
		}
		// return data from .json file.
		return json_decode(Storage::get('json/wristband/addons.json'), true);
	}

}
