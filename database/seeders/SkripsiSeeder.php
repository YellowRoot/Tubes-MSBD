<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkripsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $nim = DB::table('mahasiswa')->pluck('nim')->toArray();
        $bidang = DB::table('bidang_ilmu')->pluck('id')->toArray();
        DB::table('skripsi')->insert([
            [
                'id' => $faker->unique()->uuid,
                'judul' => \Str::random(15),
                'nim_mahasiswa' => $faker->unique()->randomElement($nim),
                'bidang_ilmu' => $faker->randomElement($bidang),
            ],
            [
                'id' => $faker->unique()->uuid,
                'judul' => \Str::random(15),
                'nim_mahasiswa' => $faker->unique()->randomElement($nim),
                'bidang_ilmu' => $faker->randomElement($bidang),
            ],
            [
                'id' => $faker->unique()->uuid,
                'judul' => \Str::random(15),
                'nim_mahasiswa' => $faker->unique()->randomElement($nim),
                'bidang_ilmu' => $faker->randomElement($bidang),
            ],
        ]);
    }
}
