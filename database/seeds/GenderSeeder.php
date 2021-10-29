<?php

use Illuminate\Database\Seeder;
use App\Gender;
class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gender = [
            [
                "gender_name" => "Male",
            ],
            [
                "gender_name" => "Female",
            ]
            ];
            foreach($gender as $genders) {
                Gender::create([
                    'gender_name'        => $genders['gender_name'],
                ]);
            }
        }
    }

