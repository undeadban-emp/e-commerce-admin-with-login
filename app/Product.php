<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'product_name',
        'product_category_id',
        'product_barcode',
        'product_content',
        'product_total_quantity',
        'product_original_price',
        'product_markup_price',
        'product_picture',
        'product_status_id'
    ];
    protected $primaryKey = 'product_id';
    public function productCategory()
    {
        return $this->hasOne('App\ProductCategory', 'product_category_id', 'product_category_id');
    }
    public function productCategoryStatus()
    {
        return $this->hasOne('App\ProductCategoryStatus', 'product_status_id', 'product_status_id');
    }
}
