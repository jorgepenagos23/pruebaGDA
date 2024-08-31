<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Token;
use Faker\Factory as Faker;
use Carbon\Carbon;

use Illuminate\Support\Facades\Hash;

class TokenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


     $faker = Faker::create();

     foreach(range(1,5) as $index ){


        $tokenRamdom = rand(200,500);
        $tokenSha1 = sha1($tokenRamdom);

    Token::create([

        'token' => $tokenSha1,
        'email' => $faker->email,
        'date_logged' =>Carbon::now(),
        'expiracion' =>Carbon::now()->addMinutes(100),

    ]);



    }
}
}

