<?php

use Illuminate\Database\Seeder;
use App\Status;
class StatusSeeder extends Seeder
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
                "status_name" => "Active",
            ],
            [
                "status_name" => "Inactive",
            ]
            ];
            foreach($status as $statuss) {
                Status::create([
                    'status_name'        => $statuss['status_name'],
                ]);
            }
    }
}
