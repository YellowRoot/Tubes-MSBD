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
            $table->decimal('nilai_doping1', 3, 0);
            $table->decimal('nilai_doping2', 3, 0);
            $table->decimal('nilai_dopuji1', 3, 0);
            $table->decimal('nilai_dopuji2', 3, 0);
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
        Schema::dropIfExists('nilai_hasil');
    }
};
