<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DopingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        DB::table('dosen')->insert([
            [
                'nip' => $faker->unique()->numerify(str_repeat('#', 18)),
                'nama' => $faker->name,
            ],
            [
                'nip' => $faker->unique()->numerify(str_repeat('#', 18)),
                'nama' => $faker->name,
            ],
            [
                'nip' => $faker->unique()->numerify(str_repeat('#', 18)),
                'nama' => $faker->name,
            ],
            [
                'nip' => $faker->unique()->numerify(str_repeat('#', 18)),
                'nama' => $faker->name,
            ],
            [
                'nip' => $faker->unique()->numerify(str_repeat('#', 18)),
                'nama' => $faker->name,
            ],
            [
                'nip' => $faker->unique()->numerify(str_repeat('#', 18)),
                'nama' => $faker->name,
            ],
            [
                'nip' => $faker->unique()->numerify(str_repeat('#', 18)),
                'nama' => $faker->name,
            ],
            [
                'nip' => $faker->unique()->numerify(str_repeat('#', 18)),
                'nama' => $faker->name,
            ],
            [
                'nip' => $faker->unique()->numerify(str_repeat('#', 18)),
                'nama' => $faker->name,
            ],
            [
                'nip' => $faker->unique()->numerify(str_repeat('#', 18)),
                'nama' => $faker->name,
            ],
        ]);
    }
}
