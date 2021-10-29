<?php

use Illuminate\Database\Seeder;
use App\ProductCategory;
class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productCategory = [
            [
                "product_category_name" => "CANDY AND CHOCO",
                "product_category_code" => "0001",
                "product_category_status" => "1"
            ],
            [
                "product_category_name" => "CHILLER",
                "product_category_code" => "0002",
                "product_category_status" => "1"
            ],
            [
                "product_category_name" => "COFFEE AND TEA",
                "product_category_code" => "0003",
                "product_category_status" => "1"
            ],
            [
                "product_category_name" => "CRAB MEAT",
                "product_category_code" => "0004",
                "product_category_status" => "1"
            ],
            [
                "product_category_name" => "CUP NOODLE",
                "product_category_code" => "0005",
                "product_category_status" => "1"
            ],
            [
                "product_category_name" => "DRINKS",
                "product_category_code" => "0006",
                "product_category_status" => "1"
            ],
            [
                "product_category_name" => "FISH CAKE",
                "product_category_code" => "0007",
                "product_category_status" => "1"
            ],
            [
                "product_category_name" => "FROZEN",
                "product_category_code" => "0008",
                "product_category_status" => "1"
            ],
            [
                "product_category_name" => "HAM",
                "product_category_code" => "0009",
                "product_category_status" => "1"
            ],
            [
                "product_category_name" => "INSTANT",
                "product_category_code" => "0010",
                "product_category_status" => "1"
            ],
            ];
            foreach($productCategory as $position) {
                ProductCategory::create([
                    'product_category_name'         => $position['product_category_name'],
                    'product_category_code'         => $position['product_category_code'],
                    'product_category_status'   => $position['product_category_status']
                ]);
            }
    }
}
