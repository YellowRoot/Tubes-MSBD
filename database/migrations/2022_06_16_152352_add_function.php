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
            CREATE OR REPLACE FUNCTION nilai_keseluruhan(nilai1 FLOAT, nilai2 FLOAT, nilai3 FLOAT)
            RETURNS FLOAT
            BEGIN
                DECLARE total FLOAT;
                SET total = ((nilai1 * 4) + (nilai2 * 4) + (nilai3 * 2)) / 10;
                RETURN total;
            END;
        ');

        DB::unprepared('
            CREATE OR REPLACE FUNCTION nilai_huruf(nilai DOUBLE)
            RETURNS VARCHAR(2)
            BEGIN
                DECLARE hasil VARCHAR(2);
                SELECT CASE WHEN nilai BETWEEN 80.0 AND 100.0 THEN "A"
                WHEN nilai BETWEEN 75 AND 79 THEN "B+"
                WHEN nilai BETWEEN 70 AND 74 THEN "B"
                WHEN nilai BETWEEN 65 AND 69 THEN "C+"
                WHEN nilai BETWEEN 60 AND 64 THEN "C"
                WHEN nilai BETWEEN 50 AND 59 THEN "D"
                ELSE "E"
                END INTO hasil;
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
