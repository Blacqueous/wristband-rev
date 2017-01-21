<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class TimeShipping extends Model {

    protected $table = 'price_shipping';

    public $timestamps = false;

    public function getPrice()
    {
        // get and return query.
    	return DB::table($this->table)
                ->select('*')
                ->get();
    }

    public function getPriceByFilter($style=null, $size=null, $qty=null)
    {
        // check if all required variables are given.
        if(!$style || !$size || !$qty)
            return false;

        // get and return query.
        return DB::select( DB::raw("SELECT `pd`.`qty` AS qty, `pd`.`price` AS price, `pd`.`days` AS days, `pd`.`type` AS type
                                    FROM $this->table AS `pd`
                                    JOIN wristband_style AS `wst` ON `wst`.id = `pd`.style_id
                                    JOIN wristband_size AS `wsz` ON `wsz`.id = `pd`.size_id
                                    WHERE `wst`.`code` = '$style'
                                    AND `wsz`.`code` = '$size'
                                    AND `pd`.`qty` = (SELECT CASE
                                                            WHEN MAX(`ipd`.`qty`) IS NULL
                                                            THEN 0
                                                            ELSE MAX(`ipd`.`qty`)
                                                            END as qty
                                                    FROM $this->table AS `ipd`
                                                    WHERE `ipd`.`qty` BETWEEN '0' AND '$qty')
                                    ORDER BY `pd`.`days` ASC")
                        );
    }

    public static function insertShipping($data=null)
    {
        // Check if has data.
        if(!$data) { return false; }

        try{
            // Exceute insert.
            $_this = new self;
            DB::table($_this->table)->insert($data);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public static function truncateShipping()
    {
        $_this = new self;
        DB::table($_this->table)->truncate();
    }

    public static function deleteShippingDomestic()
    {
        $_this = new self;
        DB::table($_this->table)->where('type', '=', 0)->delete();
    }

    public static function deleteShippingInternational()
    {
        $_this = new self;
        DB::table($_this->table)->where('type', '=', 1)->delete();
    }

}
