<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DompetDigital extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 3; $i++) :
            $faker = Faker::create();
            DB::table('dompet_digital')->insert([
                'nama_dompet' => $faker->creditCardType,
                'created_at' => $faker->dateTime($max = 'now', $timezone = null)
            ]);
        endfor;
    }
}
