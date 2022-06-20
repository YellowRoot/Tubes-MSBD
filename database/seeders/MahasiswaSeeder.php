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
                'nim' => '191402053',
                'nama' => $faker->name,
                'jenkel' => 'L',
                'angkatan' => '2019'
            ],
            [
                'nim' => '180402102',
                'nama' => $faker->name,
                'jenkel' => 'P',
                'angkatan' => '2018'
            ],
            [
                'nim' => '201402005',
                'nama' => $faker->name,
                'jenkel' => 'L',
                'angkatan' => '2020'
            ],
        ]);
    }
}
