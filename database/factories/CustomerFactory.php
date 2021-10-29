<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Customer;
use Faker\Generator as Faker;

$factory->define(Customer::class, function (Faker $faker) {
    return [
        'customer_name' => $faker->name,
        'customer_email' => $faker->email,
        'customer_gender' => $faker->numberBetween($min = 1, $max = 2),
        'customer_birthdate' => $faker->date,
        'customer_contact_no' => $faker->phoneNumber,
        'customer_province' => $faker->country,
        'customer_municipal' => $faker->country,
        'customer_barangay' => $faker->country,
        'customer_purok_street' => $faker->country,
        'customer_no_of_orders' => $faker->buildingNumber,
        'customer_username' => $faker->cityPrefix,
        'customer_password' => $faker->cityPrefix,
        'customer_status' => $faker->numberBetween($min = 1, $max = 2),
    ];
});
