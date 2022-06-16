<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DopingSkripsiSeeder extends Seeder
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
        $nip = DB::table('dosen_pembimbing')->pluck('nip')->toArray();
        DB::table('doping_skripsi')->insert([
            [
                'id_skripsi' => $faker->randomElement($skripsi),
                'nip_doping' => $faker->randomElement($nip),
            ],
            [
                'id_skripsi' => $faker->randomElement($skripsi),
                'nip_doping' => $faker->randomElement($nip),
            ],
            [
                'id_skripsi' => $faker->randomElement($skripsi),
                'nip_doping' => $faker->randomElement($nip),
            ],
        ]);
    }
}
