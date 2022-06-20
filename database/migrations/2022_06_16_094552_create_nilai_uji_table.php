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
        Schema::create('nilai_uji', function (Blueprint $table) {
            $table->uuid('id_skripsi');
            $table->decimal('nilai', 3, 0);
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
        Schema::dropIfExists('nilai_uji');
    }
};
