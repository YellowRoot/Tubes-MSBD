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
            $table->uuid('id_skripsi');
            $table->date('tanggal');
            $table->time('pukul');
            $table->string('tempat');
            $table->timestamps();
            $table->foreign('id_skripsi')
                ->references('id')->on('skripsi')
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
