<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            UserSeeder::class,
            BidangIlmuSeeder::class,
            MahasiswaSeeder::class,
            DopingSeeder::class,
            SkripsiSeeder::class,
            JadwalProposalSeeder::class,
            JadwalHasilSeeder::class,
            JadwalSidangSeeder::class,
            NilaiHasilSeeder::class,
            NilaiSidangSeeder::class,
            NilaiUjiSeeder::class,
        ]);
    }
}
