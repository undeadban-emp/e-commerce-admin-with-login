<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $primaryKey = 'customer_id';
    protected $fillable = ['customer_name', 'customer_email', 'customer_gender', 'customer_birthdate', 'customer_contact_no', 'customer_province', 'customer_municipal', 'customer_barangay', 'customer_purok_street', 'customer_no_of_orders', 'customer_username', 'customer_password', 'customer_status'];

    public function customerOrder()
    {
        return $this->belongsTo('App\CustomerOrder', 'customer_id', 'customer_order_id');
    }
}
