<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class Discounts extends Model {

    protected $table = 'discounts';

    public $timestamps = false;

    public function get()
    {
        // Get and return query.
    	return DB::table($this->table)
                ->select('*')
                ->get();
    }

    public function getDatatables($search_str="", $offset="0", $limit="10", $order_col="ID", $order_dir="ASC")
    {
        if(is_null($search_str) || empty($search_str)) {
            $search_str = "";
        }
        if(is_null($offset) || empty($offset)) {
            $offset = "0";
        }
        if(is_null($limit) || empty($limit)) {
            $limit = "10";
        }
        if(is_null($order_col) || empty($order_col)) {
            $order_col = "ID";
        }
        if(is_null($order_dir) || empty($order_dir)) {
            $order_dir = "ASC";
        }
        // Get and return query.
        $data = [];
    	$query = DB::table($this->table)
                   ->select('*')
                   ->where("ID", "LIKE", "%".$search_str."%")
                   ->orWhere("Code", "LIKE", "%".$search_str."%")
                   ->orWhere("Percentage", "LIKE", "%".$search_str."%")
                   ->orWhere("DateStart", "LIKE", "%".$search_str."%")
                   ->orWhere("DateEnd", "LIKE", "%".$search_str."%")
                   ->orWhere("DateCreated", "LIKE", "%".$search_str."%")
        		   ->orderBy($order_col, $order_dir);
        $data['total'] = $query->count();
        $data['data'] = $query->offset($offset)
                              ->take($limit)
                              ->get();
        return $data;
    }

    public function checkDiscountsById($id=null)
    {
        // Get and return query.
        return DB::table($this->table)
                ->select('ID')
                ->where('ID', '=', $id)
                ->get();
    }

    public function insertDiscount($data=null)
    {
        if(is_null($data) || empty($data)) {
            return false;
        }
        // Insert new data.
    	return DB::table($this->table)
                ->insertGetId($data);
    }

    public function activateDiscount($order_ids=null)
    {
        if(is_null($order_ids) || empty($order_ids) || !is_array($order_ids)) {
            return false;
        }
        // Update status of $order_ids to "1" for active.
    	return DB::table($this->table)
                ->whereIn('OrderID', $order_ids)
                ->update(['Status' => '1']);
    }

    public function deactivateDiscount($order_ids=null)
    {
        if(is_null($order_ids) || empty($order_ids) || !is_array($order_ids)) {
            return false;
        }
        // Update status of $order_ids to "0" for delete.
        return DB::table($this->table)
                ->whereIn('OrderID', $order_ids)
                ->update(['Status' => '0']);
    }

    public function deleteDiscount($order_id=null)
    {
        if(is_null($order_id) || empty($order_id)) {
            return false;
        }
        // Hard delete discounts.
        return DB::table($this->table)
                ->where('Status', '=', $order_id)
                ->delete();
    }

    public function deleteDiscounts($order_ids=null)
    {
        if(is_null($order_ids) || empty($order_ids) || !is_array($order_ids)) {
            return false;
        }
        // Hard delete discounts.
        return DB::table($this->table)
                ->whereIn('Status', '=', $order_ids)
                ->delete();
    }

}
