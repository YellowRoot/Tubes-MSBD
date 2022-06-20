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
        $nip = DB::table('dosen')->pluck('nip')->toArray();
        DB::table('skripsi')->insert([
            [
                'id' => $faker->unique()->uuid,
                'judul' => "Rancang Bangun Aplikasi Bimbingan Dosen Wali Secara Online",
                'nim_mahasiswa' => $faker->unique()->randomElement($nim),
                'id_bidang_ilmu' => $faker->randomElement($bidang),
                'id_doping1' => $faker->randomElement($nip),
                'id_doping2' => $faker->randomElement($nip),
                'id_dopuji1' => $faker->randomElement($nip),
                'id_dopuji2' => $faker->randomElement($nip),
            ],
            [
                'id' => $faker->unique()->uuid,
                'judul' => "Perancangan Aplikasi Web Berbasis Usability",
                'nim_mahasiswa' => $faker->unique()->randomElement($nim),
                'id_bidang_ilmu' => $faker->randomElement($bidang),
                'id_doping1' => $faker->randomElement($nip),
                'id_doping2' => $faker->randomElement($nip),
                'id_dopuji1' => $faker->randomElement($nip),
                'id_dopuji2' => $faker->randomElement($nip),
            ],
            [
                'id' => $faker->unique()->uuid,
                'judul' => "Rancang Bangun Aplikasi Uji Kepribadian MBTI Berbasis Android Menggunakan Sistem Pakar",
                'nim_mahasiswa' => $faker->unique()->randomElement($nim),
                'id_bidang_ilmu' => $faker->randomElement($bidang),
                'id_doping1' => $faker->randomElement($nip),
                'id_doping2' => $faker->randomElement($nip),
                'id_dopuji1' => $faker->randomElement($nip),
                'id_dopuji2' => $faker->randomElement($nip),
            ],
        ]);
    }
}
