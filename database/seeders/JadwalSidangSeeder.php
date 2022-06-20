<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JadwalSidangSeeder extends Seeder
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
        DB::table('jadwal_sidang')->insert([
            [
                'id_skripsi' => $faker->unique()->RandomElement($skripsi),
                'tanggal' => '2022-07-03',
                'pukul' => '10:30',
                'tempat' => 'Online E-Learning USU'
            ],
            [
                'id_skripsi' => $faker->unique()->RandomElement($skripsi),
                'tanggal' => '2022-07-04',
                'pukul' => '11:00',
                'tempat' => 'Online E-Learning USU'
            ],
            [
                'id_skripsi' => $faker->unique()->RandomElement($skripsi),
                'tanggal' => '2022-07-05',
                'pukul' => '9:30',
                'tempat' => 'Online E-Learning USU'
            ],
        ]);
    }
}
