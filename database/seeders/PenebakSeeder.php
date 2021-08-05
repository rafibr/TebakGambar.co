<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class PenebakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 50; $i++) :
            $faker = Faker::create();
            DB::table('penebak')->insert([
                'name' => $faker->name,
                'kepala_cabang' => $faker->numberBetween(1,5),
                'tipe_pembayaran' => $faker->numberBetween(1,3),
                'no_hp_pembayaran' => $faker->creditCardNumber,
                'created_at' => $faker->dateTime($max = 'now', $timezone = null)
            ]);
        endfor;
    }
}
