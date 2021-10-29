<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategoryStatus extends Model
{
    protected $primaryKey = 'product_status_id';

    protected $fillable = [
        'product_category_status',
    ];
    public function products()
    {
        return $this->belongsTo('App\Products', 'product_status_id', 'product_status_id');
    }
}
