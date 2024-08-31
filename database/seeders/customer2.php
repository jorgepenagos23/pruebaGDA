<?php

namespace Database\Seeders;

use App\Models\customer as ModelsCustomer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\customer;

class customer2 extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

    $faker =Faker::create();


        customer::create([
            'dni' => $faker->word,
            'id_reg'=> $faker->numberBetween(1,4),
            'id_com' => $faker->numberBetween(1,4),
            'email' => $faker->email,
            'name'=>$faker->firstName,
            'last_name' =>$faker->lastName,
            'address'=>$faker->address,
            'date_reg'=>now(),
            'status'=>$faker->randomElement(['A','I','trash']),
        ]);


    }
}
