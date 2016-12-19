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

}
