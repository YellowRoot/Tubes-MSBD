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
            CREATE OR REPLACE FUNCTION total_nilai(nilai1 INT, nilai2 INT, nilai3 INT, nilai4 INT)
            RETURNS INT
            BEGIN
                DECLARE total INT;
                SET total = nilai1 + nilai2 + nilai3 + nilai4;
                RETURN total;
            END;
        ');

        DB::unprepared('
            CREATE OR REPLACE FUNCTION nilai_keseluruhan(nilai1 INT, nilai2 INT, nilai3 INT)
            RETURNS FLOAT
            BEGIN
                DECLARE total FLOAT;
                SET total = ((a.4) + (b.4) + (c.2))/10;
                RETURN total;
            END;
        ');

        DB::unprepared('
            CREATE OR REPLACE FUNCTION nilai_huruf(nilai INT)
            RETURNS CHAR
            BEGIN
                DECLARE hasil CHAR;
                IF (nilai <= 49) THEN SET hasil = `E`;
                ELSEIF (nilai <= 59) THEN SET hasil = `D`;
                ELSEIF (nilai <= 64) THEN SET hasil = `C`;
                ELSEIF (nilai <= 69) THEN SET hasil = `C+`;
                ELSEIF (nilai <= 74) THEN SET hasil = `B`;
                ELSEIF (nilai <= 79) THEN SET hasil = `B+`;
                ELSEIF (nilai <= 100) THEN SET hasil = `A`;
                END IF;
                RETURN hasil;
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
        DB::unprepared('DROP FUNCTION `total_nilai`');
        DB::unprepared('DROP FUNCTION `nilai_keseluruhan`');
        DB::unprepared('DROP FUNCTION `nilai_huruf`');
    }
};
