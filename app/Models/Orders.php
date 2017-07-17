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

    public function getDatatables($search_str="", $offset="0", $limit="10", $order_col="ID", $order_dir="ASC", $show_removed='false', $show_done='false')
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
        if(is_null($show_removed) || empty($show_removed)) {
            $show_removed = 'false';
        }
        if(is_null($show_done) || empty($show_done)) {
            $show_done = 'false';
        }
        // Get and return query.
        $data = [];
    	$query = DB::table($this->table)
                    ->select('*');
        // if ($show_removed == 'false' && $show_done == 'false') {
        //     $query->where('Status', '!=', '-1');
        //     $query->where('Status', '!=', '0');
        // } else if ($show_removed == 'false' && $show_done == 'true') {
        //     $query->where('Status', '!=', '0');
        // } else if ($show_removed == 'true' && $show_done == 'false') {
        //     $query->where('Status', '!=', '-1');
        // }
        $query->where(function($query) use ($search_str) {
                $query->where("ID", "LIKE", "%".$search_str."%");
                $query->orWhere("TransNo", "LIKE", "%".$search_str."%");
                $query->orWhere("Status", "LIKE", "%".$search_str."%");
                $query->orWhere("FirstName", "LIKE", "%".$search_str."%");
                $query->orWhere("LastName", "LIKE", "%".$search_str."%");
                $query->orWhere("EmailAddress", "LIKE", "%".$search_str."%");
                $query->orWhere("PaymentMethod", "LIKE", "%".$search_str."%");
                $query->orWhere("Paid", "LIKE", "%".$search_str."%");
                $query->orWhere("PaidDate", "LIKE", "%".$search_str."%");
                $query->orWhere("AuthorizeTransID", "LIKE", "%".$search_str."%");
                $query->orWhere("PaypalEmail", "LIKE", "%".$search_str."%");
                $query->orWhere("PaymentRemarks", "LIKE", "%".$search_str."%");
                $query->orWhere("ProductionCharge", "LIKE", "%".$search_str."%");
                $query->orWhere("DeliveryCharge", "LIKE", "%".$search_str."%");
                $query->orWhere("DaysProduction", "LIKE", "%".$search_str."%");
                $query->orWhere("DaysDelivery", "LIKE", "%".$search_str."%");
                $query->orWhere("DiscountCode", "LIKE", "%".$search_str."%");
                $query->orWhere("Address", "LIKE", "%".$search_str."%");
                $query->orWhere("Address2", "LIKE", "%".$search_str."%");
                $query->orWhere("City", "LIKE", "%".$search_str."%");
                $query->orWhere("State", "LIKE", "%".$search_str."%");
                $query->orWhere("ZipCode", "LIKE", "%".$search_str."%");
                $query->orWhere("Country", "LIKE", "%".$search_str."%");
                $query->orWhere("Phone", "LIKE", "%".$search_str."%");
                $query->orWhere("ShipFirstName", "LIKE", "%".$search_str."%");
                $query->orWhere("ShipLastName", "LIKE", "%".$search_str."%");
                $query->orWhere("ShipAddress", "LIKE", "%".$search_str."%");
                $query->orWhere("ShipAddress2", "LIKE", "%".$search_str."%");
                $query->orWhere("ShipCity", "LIKE", "%".$search_str."%");
                $query->orWhere("ShipState", "LIKE", "%".$search_str."%");
                $query->orWhere("ShipZipCode", "LIKE", "%".$search_str."%");
                $query->orWhere("ShipZipCode", "LIKE", "%".$search_str."%");
            })->orderBy($order_col, $order_dir);
        // Get results
        $data['total'] = $query->distinct()->count();
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
                // ->update(['Status' => '0']);
                ->delete();
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
