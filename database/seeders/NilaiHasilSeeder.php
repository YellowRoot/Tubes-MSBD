<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NilaiHasilSeeder extends Seeder
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
        DB::table('nilai_hasil')->insert([
            [
                'id_skripsi' => $faker->unique()->RandomElement($skripsi),
                'nilai_doping1' => '60',
                'nilai_doping2' => '80',
                'nilai_dopuji1' => '70',
                'nilai_dopuji2' => '70',       
            ],
            [
                'id_skripsi' => $faker->unique()->RandomElement($skripsi),
                'nilai_doping1' => '40',
                'nilai_doping2' => '50',
                'nilai_dopuji1' => '65',
                'nilai_dopuji2' => '55',
            ],
            [
                'id_skripsi' => $faker->unique()->RandomElement($skripsi),
                'nilai_doping1' => '85',
                'nilai_doping2' => '90',
                'nilai_dopuji1' => '75',
                'nilai_dopuji2' => '70',
            ],
        ]);
    }
}
