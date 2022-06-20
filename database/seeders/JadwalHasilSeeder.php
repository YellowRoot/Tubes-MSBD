<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JadwalHasilSeeder extends Seeder
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
        DB::table('jadwal_hasil')->insert([
            [
                'id_skripsi' => $faker->unique()->RandomElement($skripsi),
                'tanggal' => '2022-07-31',
                'pukul' => '10:30',
                'tempat' => 'Online E-Learning USU'
            ],
            [
                'id_skripsi' => $faker->unique()->RandomElement($skripsi),
                'tanggal' => '2022-07-01',
                'pukul' => '11:00',
                'tempat' => 'Online E-Learning USU'
            ],
            [
                'id_skripsi' => $faker->unique()->RandomElement($skripsi),
                'tanggal' => '2022-07-02',
                'pukul' => '9:00',
                'tempat' => 'Online E-Learning USU'
            ],
        ]);
    }
}
