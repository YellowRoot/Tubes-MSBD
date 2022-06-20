<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NilaiUjiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $skripsi = DB::table('skripsi')->pluck('id')->toArray();
        DB::table('nilai_uji')->insert([
            [
                'id_skripsi' => $faker->unique()->RandomElement($skripsi),
                'nilai' => '80',    
            ],
            [
                'id_skripsi' => $faker->unique()->RandomElement($skripsi),
                'nilai' => '90',
            ],
            [
                'id_skripsi' => $faker->unique()->RandomElement($skripsi),
                'nilai' => '85',
            ],
        ]);
    }
}
