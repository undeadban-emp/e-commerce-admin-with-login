<?php

use Illuminate\Database\Seeder;
use App\ProductCategoryStatus;
class ProductCategoryStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = [
            [
                "Product_category_status" => 'active'
            ],
            [
                "Product_category_status" => 'in-active'
            ]
        ];
        foreach($status as $statuss) {
            ProductCategoryStatus::create([
                'product_category_status'         => $statuss['Product_category_status'],
            ]);
        }
    }
}
