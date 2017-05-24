<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class Carts extends Model {

    protected $table = 'cart';

    public $timestamps = false;

    public function get()
    {
        // Get and return query.
    	return DB::table($this->table)
                ->select('*')
                ->get();
    }

    public function checkCartById($id=null)
    {
        // Get and return query.
    	return DB::table($this->table)
                ->select('ID')
                ->where('ID', '=', $id)
                ->get();
    }

    public function insertCart($data=null)
    {
        if(is_null($data) || empty($data)) {
            return false;
        }
        // Insert new data.
    	return DB::table($this->table)
                ->insertGetId($data);
    }

}
