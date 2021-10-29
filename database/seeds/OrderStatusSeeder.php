<?php

use Illuminate\Database\Seeder;
use App\OrderStatus;
class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orderStatus = [
            [
                "order_status_name" => "Pending",
            ],
            [
                "order_status_name" => "On Process",
            ],
            [
                "order_status_name" => "Completed",
            ]
            ];
            foreach($orderStatus as $orderStatuss) {
                OrderStatus::create([
                    'order_status_name'        => $orderStatuss['order_status_name'],
                ]);
            }
    }
}
