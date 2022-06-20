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
        Schema::create('total_nilai', function (Blueprint $table) {
            $table->uuid('id_skripsi');
            $table->decimal('total_nilai_seminar_hasil', 4, 1)->nullable();
            $table->decimal('total_nilai_sidang', 4, 1)->nullable();
            $table->decimal('nilai_keseluruhan', 4, 1)->nullable();
            $table->char('nilai_huruf', 2)->nullable();
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
        Schema::dropIfExists('total_nilai');
    }
};
