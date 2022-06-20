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
            CREATE OR REPLACE VIEW skripsi_v AS
            SELECT mhs.nim as nim_mahasiswa, mhs.nama as nama_mahasiswa, 
                skp.id as id_skripsi, skp.judul as judul_skripsi, bi.nama_bidang as bidang_ilmu,
                do1.nama as nama_doping1, do2.nama as nama_doping2,
                do3.nama as nama_dopuji1, do4.nama as nama_dopuji2
            FROM skripsi skp
            JOIN mahasiswa mhs ON skp.nim_mahasiswa = mhs.nim
            JOIN bidang_ilmu bi ON skp.id_bidang_ilmu = bi.id
            JOIN dosen do1 ON skp.id_doping1 = do1.nip
            JOIN dosen do2 ON skp.id_doping2 = do2.nip
            JOIN dosen do3 ON skp.id_dopuji1 = do3.nip
            JOIN dosen do4 ON skp.id_dopuji2 = do4.nip
        ');

        DB::unprepared('
            CREATE OR REPLACE VIEW berita_seminar_hasil_v AS
            SELECT skv.nim_mahasiswa, skv.nama_mahasiswa, 
                skv.id_skripsi, skv.judul_skripsi, skv.bidang_ilmu,
                jsh.tanggal, jsh.pukul, jsh.tempat,
                skv.nama_doping1, skv.nama_doping2, skv.nama_dopuji1, skv.nama_dopuji2,
                nsh.nilai_doping1, nsh.nilai_doping2, nsh.nilai_dopuji1, nsh.nilai_dopuji2,
                tn.total_nilai_seminar_hasil
            FROM skripsi_v skv
            JOIN jadwal_hasil jsh ON skv.id_skripsi = jsh.id_skripsi
            JOIN nilai_hasil nsh ON skv.id_skripsi = nsh.id_skripsi
            JOIN total_nilai tn ON skv.id_skripsi = tn.id_skripsi
        ');

        DB::unprepared('
            CREATE OR REPLACE VIEW berita_sidang_v AS
            SELECT skv.nim_mahasiswa, skv.nama_mahasiswa, 
                skv.id_skripsi, skv.judul_skripsi, skv.bidang_ilmu,
                jsd.tanggal, jsd.pukul, jsd.tempat,
                skv.nama_doping1, nsh.nilai_doping1 as nilai_seminar_hasil_doping1, nsd.nilai_doping1 as nilai_sidang_doping1,
                skv.nama_doping2, nsh.nilai_doping2 as nilai_seminar_hasil_doping2, nsd.nilai_doping2 as nilai_sidang_doping2,
                skv.nama_dopuji1, nsh.nilai_dopuji1 as nilai_seminar_hasil_dopuji1, nsd.nilai_dopuji1 as nilai_sidang_dopuji1,
                skv.nama_dopuji2, nsh.nilai_dopuji2 as nilai_seminar_hasil_dopuji2, nsd.nilai_dopuji2 as nilai_sidang_dopuji2,
                tn.total_nilai_seminar_hasil,
                tn.total_nilai_sidang,
                nup.nilai as nilai_uji_program,
                nilai_keseluruhan(total_nilai_seminar_hasil, total_nilai_sidang, nilai)
                as nilai_keseluruhan,
                nilai_huruf(nilai_keseluruhan(total_nilai_seminar_hasil, total_nilai_sidang, nilai))
                as nilai_huruf
            FROM skripsi_v skv
            JOIN jadwal_sidang jsd ON skv.id_skripsi = jsd.id_skripsi
            JOIN nilai_hasil nsh ON skv.id_skripsi = nsh.id_skripsi
            JOIN nilai_sidang nsd ON skv.id_skripsi = nsd.id_skripsi
            JOIN nilai_uji nup ON skv.id_skripsi = nup.id_skripsi
            JOIN total_nilai tn ON skv.id_skripsi = tn.id_skripsi
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP VIEW `skripsi_v`');
        DB::unprepared('DROP VIEW `berita_seminar_hasil_v`');
        DB::unprepared('DROP VIEW `berita_sidang_v`');
    }
};
