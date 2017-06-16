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
                   ->where("Status", "!=", "-1")
                   ->orWhere("ID", "LIKE", "%".$search_str."%")
                   ->orWhere("TransNo", "LIKE", "%".$search_str."%")
                   ->orWhere("Status", "LIKE", "%".$search_str."%")
                   ->orWhere("FirstName", "LIKE", "%".$search_str."%")
                   ->orWhere("LastName", "LIKE", "%".$search_str."%")
                   ->orWhere("EmailAddress", "LIKE", "%".$search_str."%")
                   ->orWhere("PaymentMethod", "LIKE", "%".$search_str."%")
                   ->orWhere("Paid", "LIKE", "%".$search_str."%")
                   ->orWhere("PaidDate", "LIKE", "%".$search_str."%")
                   ->orWhere("AuthorizeTransID", "LIKE", "%".$search_str."%")
                   ->orWhere("PaypalEmail", "LIKE", "%".$search_str."%")
                   ->orWhere("PaymentRemarks", "LIKE", "%".$search_str."%")
                   ->orWhere("ProductionCharge", "LIKE", "%".$search_str."%")
                   ->orWhere("DeliveryCharge", "LIKE", "%".$search_str."%")
                   ->orWhere("DaysProduction", "LIKE", "%".$search_str."%")
                   ->orWhere("DaysDelivery", "LIKE", "%".$search_str."%")
                   ->orWhere("DiscountCode", "LIKE", "%".$search_str."%")
                   ->orWhere("Address", "LIKE", "%".$search_str."%")
                   ->orWhere("Address2", "LIKE", "%".$search_str."%")
                   ->orWhere("City", "LIKE", "%".$search_str."%")
                   ->orWhere("State", "LIKE", "%".$search_str."%")
                   ->orWhere("ZipCode", "LIKE", "%".$search_str."%")
                   ->orWhere("Country", "LIKE", "%".$search_str."%")
                   ->orWhere("Phone", "LIKE", "%".$search_str."%")
                   ->orWhere("ShipFirstName", "LIKE", "%".$search_str."%")
                   ->orWhere("ShipLastName", "LIKE", "%".$search_str."%")
                   ->orWhere("ShipAddress", "LIKE", "%".$search_str."%")
                   ->orWhere("ShipAddress2", "LIKE", "%".$search_str."%")
                   ->orWhere("ShipCity", "LIKE", "%".$search_str."%")
                   ->orWhere("ShipState", "LIKE", "%".$search_str."%")
                   ->orWhere("ShipZipCode", "LIKE", "%".$search_str."%")
                   ->orWhere("ShipZipCode", "LIKE", "%".$search_str."%")
        		   ->orderBy($order_col, $order_dir);
        $data['total'] = $query->count();
        $data['data'] = $query->offset($offset)
                              ->take($limit)
                              ->get();
        return $data;
    }

    public function checkOrderById($id=null)
    {
        if(is_null($data) || empty($data)) {
            return false;
        }
        // Get and return query.
    	return DB::table($this->table)
                ->select('ID')
                ->where('ID', '=', $id)
                ->get();
    }

    public function checkOrderByTransNo($transNo=null)
    {
        if(is_null($data) || empty($data)) {
            return false;
        }
        // Get and return query.
    	return DB::table($this->table)
                ->select('ID')
                ->where('TransNo', '=', $transNo)
                ->where('Status', '=', 0)
                ->get();
    }

    public function insertOrder($data=null)
    {
        if(is_null($data) || empty($data) || !is_array($data)) {
            return false;
        }
        // Insert new data.
    	return DB::table($this->table)
                ->insertGetId($data);
    }

    public function removeOrders($ids=null)
    {
        if(is_null($ids) || empty($ids) || !is_array($ids)) {
            return false;
        }
        // Update status of $ids to "0" for delete(?).
    	return DB::table($this->table)
                ->whereIn('ID', $ids)
                ->update(['Status' => '0']);
    }

    public function doneOrders($ids=null)
    {
        if(is_null($ids) || empty($ids) || !is_array($ids)) {
            return false;
        }
        // Update status of $ids to "-1" for done(?).
    	return DB::table($this->table)
                ->whereIn('ID', $ids)
                ->update(['Status' => '-1']);
    }

    public function deleteDoneOrders()
    {
        // Update status of $ids to "-1" for done(?).
        return DB::table($this->table)
                ->where('Status', '=', '-1')
                ->delete();
    }

}
