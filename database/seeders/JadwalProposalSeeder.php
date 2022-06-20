<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JadwalProposalSeeder extends Seeder
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
        DB::table('jadwal_proposal')->insert([
            [
                'id_skripsi' => $faker->unique()->RandomElement($skripsi),
                'tanggal' => '2022-06-23',
                'pukul' => '10:30',
                'tempat' => 'Online E-Learning USU'
            ],
            [
                'id_skripsi' => $faker->unique()->RandomElement($skripsi),
                'tanggal' => '2022-06-24',
                'pukul' => '11:00',
                'tempat' => 'Online E-Learning USU'
            ],
            [
                'id_skripsi' => $faker->unique()->RandomElement($skripsi),
                'tanggal' => '2022-06-25',
                'pukul' => '9:00',
                'tempat' => 'Online E-Learning USU'
            ],
        ]);
    }
}
