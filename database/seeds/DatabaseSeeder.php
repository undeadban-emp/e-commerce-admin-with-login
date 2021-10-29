<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(LaratrustSeeder::class);
        // $this->call(UsersTableSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(ProductCategorySeeder::class);
        $this->call(ProductCategoryStatusSeeder::class);
        $this->call(CustomerSeeder::class);
        $this->call(GenderSeeder::class);
        $this->call(StatusSeeder::class);
    }
}
