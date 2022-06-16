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
            CREATE OR REPLACE VIEW dosenSkripsi_v AS
            SELECT skp.id, skp.judul as `Judul Skripsi`,
                group_concat(DISTINCT dsb.nip_doping) as `NIP Dosen Pembimbing`,
                group_concat(DISTINCT ds1.nama) as `Nama Dosen Pembimbing`,
                group_concat(DISTINCT dsu.nip_doping) as `NIP Dosen Penguji`,
                group_concat(DISTINCT ds2.nama) as `Nama Dosen Penguji`
            FROM skripsi skp
            INNER JOIN doping_skripsi dsb ON dsb.id_skripsi = skp.id
            INNER JOIN dopuji_skripsi dsu ON dsu.id_skripsi = skp.id
            INNER JOIN dosen_pembimbing ds1 ON ds1.nip = dsb.nip_doping
            INNER JOIN dosen_pembimbing ds2 ON ds2.nip = dsu.nip_doping
            GROUP BY skp.id, skp.judul
        ');

        DB::unprepared('
            CREATE OR REPLACE VIEW skripsi_v AS
            SELECT mhs.nim as `NIM Mahasiswa`, mhs.nama as `Nama Mahasiswa`, 
                skp.judul as `Judul Skripsi`, bi.nama_bidang as `Bidang Ilmu`,
                dsv.`NIP Dosen Pembimbing`, dsv.`Nama Dosen Pembimbing`,
                dsv.`NIP Dosen Penguji`, dsv.`Nama Dosen Penguji`
            FROM mahasiswa mhs
            JOIN skripsi skp ON mhs.nim = skp.nim_mahasiswa
            JOIN bidang_ilmu bi ON skp.bidang_ilmu = bi.id
            JOIN dosenSkripsi_v dsv ON skp.id = dsv.id
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP VIEW `dosenSkripsi_v`');
        DB::unprepared('DROP VIEW `skripsi_v`');
    }
};
