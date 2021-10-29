<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'product_name' => $faker->name,
        'product_category_id' => 1,
        'product_barcode' => $faker->name,
        'product_content' => $faker->catchPhrase ,
        'product_total_quantity' => $faker->randomFloat,
        'product_original_price' => $faker->randomFloat,
        'product_markup_price' => $faker->randomFloat,
        'product_picture' => $faker->name,
        'product_status_id' => 1,
    ];
});
