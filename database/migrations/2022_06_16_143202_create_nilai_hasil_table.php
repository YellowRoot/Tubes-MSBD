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
        Schema::create('nilai_hasil', function (Blueprint $table) {
            $table->uuid('id_skripsi');
            $table->integer('nilai1')->length(3);
            $table->integer('nilai2')->length(3);
            $table->integer('nilai3')->length(3);
            $table->integer('nilai4')->length(3);
            $table->timestamps();
            $table->foreign('id_skripsi')
                ->references('id_skripsi')->on('doping_skripsi')
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
        Schema::dropIfExists('nilai_hasil');
    }
};
