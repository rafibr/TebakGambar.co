<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 5; $i++) :
            $faker = Faker::create();
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->email,
                'status' => $faker->numberBetween($min = 0, $max = 1),
                'level' => $faker->numberBetween($min = 0, $max = 1),
                'password' => Hash::make('lala'),
                'created_at' => $faker->dateTime($max = 'now', $timezone = null)
            ]);
        endfor;
    }
}
