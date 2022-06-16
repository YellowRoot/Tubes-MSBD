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
        Schema::create('dopuji_skripsi', function (Blueprint $table) {
            $table->uuid('id_skripsi');
            $table->string('nip_doping',18);
            $table->timestamps();
            $table->foreign('id_skripsi')
                ->references('id')->on('skripsi')
                ->cascadeOnDelete();
            $table->foreign('nip_doping')
                ->references('nip')->on('dosen_pembimbing')
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
        Schema::dropIfExists('dopuji_skripsi');
    }
};
