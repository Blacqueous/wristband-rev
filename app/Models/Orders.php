<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model {

    protected $table = 'orders';

    public $timestamps = false;

    public function get()
    {
        // Get and return query.
    	return DB::table($this->table)
                ->select('*')
                ->get();
    }

    public function checkOrderById($id=null)
    {
        // Get and return query.
    	return DB::table($this->table)
                ->select('ID')
                ->where('ID', '=', $id)
                ->get();
    }

    public function checkOrderByTransNo($transNo=null)
    {
        // Get and return query.
    	return DB::table($this->table)
                ->select('ID')
                ->where('TransNo', '=', $transNo)
                ->where('Status', '=', 0)
                ->get();
    }

    public function insertOrder($data=null)
    {
        if(is_null($data) || empty($data)) {
            return false;
        }
        // Insert new data.
    	return DB::table($this->table)
                ->insertGetId($data);
    }

}
