<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    protected $primaryKey = 'order_status_id';
    protected $fillable = [
        'order_status_name',
    ];
}
