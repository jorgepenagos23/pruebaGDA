<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class communes2 extends Seeder
{

    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 5; $i++) {
            DB::table('communes')->insert([
                'id_reg' => $faker->numberBetween(1, 4),
                'description' => $faker->city,
                'status' => $faker->randomElement(['A', 'I', 'trash']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
