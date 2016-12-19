<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class AddOns extends Model {

    protected $table = 'add_ons';

    public $timestamps = false;

    public function get()
    {
        // get and return query.
    	return DB::table($this->table)
                ->select('*')
                ->get();
    }

    public function getCodes()
    {
        // get and return query.
    	return DB::table($this->table)
                ->select('id', 'code')
                ->get();
    }

    public static function getArrayByCode()
    {
        $_this = new self;
        $styles = $_this->getCodes();
        $data = [];
        if($styles) {
            foreach ($styles as $key => $value) {
                $data[$value->code] = $value->id;
            }
        }
        return $data;
    }

}
