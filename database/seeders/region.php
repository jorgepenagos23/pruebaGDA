<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

use App\Models\regions;

class region extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        $status1 = ['A','I','trash'];

        $faker = Faker::create();
        for( $i =1 ; $i <= 5 ; $i++){

          $status2 = $status1[array_rand($status1)];
          regions::create([

            'description' => $faker->country,
            'status' =>$status2,


          ]);

        }



    }
}
