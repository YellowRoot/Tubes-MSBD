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
            $table->uuid('id')->unique();
            $table->string('judul',30);
            $table->string('nim_mahasiswa',9);
            $table->unsignedBigInteger('bidang_ilmu');
            $table->integer('nilai_uji_program')->length(3)->nullable();
            $table->integer('total_nilai_hasil')->length(3)->nullable();
            $table->integer('total_nilai_sidang')->length(3)->nullable();
            $table->timestamps();
            $table->foreign('nim_mahasiswa')
                ->references('nim')->on('mahasiswa')
                ->cascadeOnDelete();
            $table->foreign('bidang_ilmu')
                ->references('id')->on('bidang_ilmu')
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
