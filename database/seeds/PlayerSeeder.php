<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class PlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        \App\Player::create(['name' => $faker->name, 'surname' => $faker->name]);
        \App\Player::create(['name' => $faker->name, 'surname' => $faker->name]);


    }
}
