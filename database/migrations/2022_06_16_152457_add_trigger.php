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
            AFTER INSERT ON `nilai_hasil`
            FOR EACH ROW
            BEGIN
            SET @COUNT = (SELECT COUNT(*) FROM total_nilai WHERE (id_skripsi = NEW.id_skripsi));
            IF @COUNT=0 THEN
                INSERT INTO total_nilai (id_skripsi, total_nilai_seminar_hasil) VALUES
                (NEW.id_skripsi,  total_nilai(NEW.nilai_doping1, NEW.nilai_doping2, NEW.nilai_dopuji1, NEW.nilai_dopuji2));
            ELSE
                UPDATE total_nilai SET total_nilai.total_nilai_seminar_hasil = 
                total_nilai(NEW.nilai_doping1, NEW.nilai_doping2, NEW.nilai_dopuji1, NEW.nilai_dopuji2)
                WHERE id_skripsi = NEW.id_skripsi;
            END IF;
            END;
        ');
        
        DB::unprepared('
            CREATE OR REPLACE TRIGGER total_sidang
            AFTER INSERT ON `nilai_sidang`
            FOR EACH ROW
            BEGIN
            SET @COUNT = (SELECT COUNT(*) FROM total_nilai WHERE (id_skripsi = NEW.id_skripsi));
            IF @COUNT=0 THEN
                INSERT INTO total_nilai (id_skripsi, total_nilai_sidang) VALUES
                (NEW.id_skripsi,  total_nilai(NEW.nilai_doping1, NEW.nilai_doping2, NEW.nilai_dopuji1, NEW.nilai_dopuji2));
            ELSE
                UPDATE total_nilai SET total_nilai.total_nilai_sidang = 
                total_nilai(NEW.nilai_doping1, NEW.nilai_doping2, NEW.nilai_dopuji1, NEW.nilai_dopuji2)
                WHERE id_skripsi = NEW.id_skripsi;
            END IF;
            END;
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
