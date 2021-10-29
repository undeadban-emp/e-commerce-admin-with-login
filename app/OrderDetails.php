<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    protected $primaryKey = 'order_details_id';
    protected $fillable = ['order_details_order_id', 'order_details_customer_id', 'order_details_product_name', 'order_details_quantity', 'order_details_product_unit_price', 'order_details_total', 'order_details_checkout_status'];

    public function customerOrder()
    {
        return $this->belongsTo('App\CustomerOrder', 'customer_order_id', 'order_details_order_id');
    }
}
