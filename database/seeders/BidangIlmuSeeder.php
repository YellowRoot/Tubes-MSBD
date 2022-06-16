<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BidangIlmuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bidang_ilmu')->insert([
            ['nama_bidang' => 'Artificial Intelligence'],
            ['nama_bidang' => 'Machine Learning'],
            ['nama_bidang' => 'Data Science'],
            ['nama_bidang' => 'Image Processing'],
            ['nama_bidang' => 'Software Development'],
        ]);
    }
}
