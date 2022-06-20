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
        Schema::create('skripsi', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('judul',200);
            $table->char('nim_mahasiswa',9);
            $table->tinyInteger('id_bidang_ilmu');
            $table->char('id_doping1',18)->nullable();
            $table->char('id_doping2',18)->nullable();
            $table->char('id_dopuji1',18)->nullable();
            $table->char('id_dopuji2',18)->nullable();
            $table->timestamps();
            $table->foreign('nim_mahasiswa')
                ->references('nim')->on('mahasiswa')
                ->cascadeOnDelete();
            $table->foreign('id_bidang_ilmu')
                ->references('id')->on('bidang_ilmu')
                ->cascadeOnDelete();
            $table->foreign('id_doping1')
                ->references('nip')->on('dosen')
                ->cascadeOnDelete();
            $table->foreign('id_doping2')
                ->references('nip')->on('dosen')
                ->cascadeOnDelete();
            $table->foreign('id_dopuji1')
                ->references('nip')->on('dosen')
                ->cascadeOnDelete();
            $table->foreign('id_dopuji2')
                ->references('nip')->on('dosen')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('skripsi');
    }
};
