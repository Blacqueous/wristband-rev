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
	
	public static function getCartOrders(){
        return DB::SELECT(DB::RAW("SELECT DateCreated,
						Status,
                        OrderID,
                        BandStyle,
                        BandType,
                        BandSize,
                        MessageStyle,
                        Font,
                        FrontMessage,
                        BackMessage,
                        ContinuousMessage,
                        FrontMessageStartClipart,
                        FrontMessageEndClipart,
                        BackMessageStartClipart,
                        BackMessageEndClipart,
                        ContinuousMessageStartClipart,
                        ContinuousEndClipart,
                        ProductionTime,
                        FreeQty,
                        Delivery,
                        Individual_Pack,
                        Keychain,
                        DigitalPrint,
                        Comments,
                        PriceProduction,
                        PriceDelivery,
                        PriceIndividual_Pack,
                        PriceKeychain,
                        PriceDigitalPrint,
                        PriceBackMessage,
						PriceContinuousMessage,
						PriceLogo,
						PriceColorSplit,
						PriceMouldingFee,
						RandomChr,
						arColors,
						Qty,
						UnitPrice,
						Total,
						FullName,
						PhoneNo,
						EmailAddress FROM cart"));
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

    public function flagCartsAsRemovedByOrderID($order_ids=null)
    {
        if(is_null($order_ids) || empty($order_ids) || !is_array($order_ids)) {
            return false;
        }
        // Update status of $order_ids to "0" for delete(?).
    	return DB::table($this->table)
                ->whereIn('OrderID', $order_ids)
                ->update(['Status' => '0']);
    }

    public function flagCartsAsDoneByOrderID($order_ids=null)
    {
        if(is_null($order_ids) || empty($order_ids) || !is_array($order_ids)) {
            return false;
        }
        // Update status of $order_ids to "-1" for done(?).
    	return DB::table($this->table)
                ->whereIn('OrderID', $order_ids)
                ->update(['Status' => '-1']);
    }

    public function deleteDoneCarts()
    {
        // Update status of $ids to "-1" for done(?).
        return DB::table($this->table)
                ->where('Status', '=', '-1')
                ->delete();
    }

}
