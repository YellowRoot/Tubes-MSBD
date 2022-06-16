<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        DB::table('mahasiswa')->insert([
            [
                'nim' => $faker->unique()->randomNumber($nbDigits = 9, $strict = true),
                'nama' => $faker->name,
            ],
            [
                'nim' => $faker->unique()->randomNumber($nbDigits = 9, $strict = true),
                'nama' => $faker->name,
            ],
            [
                'nim' => $faker->unique()->randomNumber($nbDigits = 9, $strict = true),
                'nama' => $faker->name,
            ],
        ]);
    }
}
