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
        Schema::create('jadwal_proposal', function (Blueprint $table) {
            $table->date('tanggal');
            $table->time('pukul');
            $table->string('tempat');
            $table->string('nim_mahasiswa');
            $table->timestamps();
            $table->foreign('nim_mahasiswa')
                ->references('nim')->on('mahasiswa')
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
        Schema::dropIfExists('jadwal_proposal');
    }
};
