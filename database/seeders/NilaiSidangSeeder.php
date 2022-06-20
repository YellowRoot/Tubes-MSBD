<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NilaiSidangSeeder extends Seeder
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
        DB::table('nilai_sidang')->insert([
            [
                'id_skripsi' => $faker->unique()->RandomElement($skripsi),
                'nilai_doping1' => '70',
                'nilai_doping2' => '80',
                'nilai_dopuji1' => '70',
                'nilai_dopuji2' => '90',       
            ],
            [
                'id_skripsi' => $faker->unique()->RandomElement($skripsi),
                'nilai_doping1' => '50',
                'nilai_doping2' => '40',
                'nilai_dopuji1' => '55',
                'nilai_dopuji2' => '65',
            ],
            [
                'id_skripsi' => $faker->unique()->RandomElement($skripsi),
                'nilai_doping1' => '70',
                'nilai_doping2' => '85',
                'nilai_dopuji1' => '85',
                'nilai_dopuji2' => '90',
            ],
        ]);
    }
}
