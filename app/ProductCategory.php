<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $primaryKey = 'product_category_id';
    protected $fillable = [
        'product_category_id',
        'product_category_name',
        'product_category_code',
        'product_status_id'
    ];
    public function products()
{
    return $this->belongsTo('App\Products', 'product_category_id', 'product_category_id');
}
}
