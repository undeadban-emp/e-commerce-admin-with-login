<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerOrder extends Model
{
    protected $primaryKey = 'customer_order_id';
    protected $fillable = ['customer_order_customer_id', 'customer_order_date', 'customer_order_time', 'customer_order_customer_name', 'customer_order_address', 'customer_order_delivery_instruction', 'customer_order_payment_method', 'customer_order_cash_on_hand', 'customer_order_sub_total', 'customer_order_delivery_fee', 'customer_order_total', 'customer_order_status'];

    public function orderDetails()
    {
        return $this->hasMany('App\OrderDetails', 'order_details_customer_id', 'customer_order_id');
    }
    public function customer()
    {
        return $this->hasOne('App\Customer', 'customer_id', 'customer_order_id' );
    }
}
