<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE OR REPLACE TRIGGER total_hasil
            BEFORE INSERT ON `nilai_hasil`
            FOR EACH ROW
            UPDATE skripsi
            SET total_nilai_hasil = total_nilai(new.nilai1, new.nilai2, new.nilai3, new.nilai4)
            WHERE skripsi.id = new.id_skripsi;
        ');

        DB::unprepared('
            CREATE OR REPLACE TRIGGER total_sidang
            BEFORE INSERT ON `nilai_sidang`
            FOR EACH ROW
            UPDATE skripsi
            SET total_nilai_sidang = total_nilai(new.nilai1, new.nilai2, new.nilai3, new.nilai4)
            WHERE skripsi.id = new.id_skripsi;
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `total_hasil`');
        DB::unprepared('DROP TRIGGER `total_sidang`');
    }
};
