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
        Schema::create('skripsis', function (Blueprint $table) {
            $table->id();
            $table->string('judul',30);
            $table->string('nim_mahasiswa',9);
            $table->string('nip_dosen_pembimbing',18);
            $table->timestamps();
            $table->foreign('nim_mahasiswa')
                ->references('nim')
                ->on('mahasiswas');
            $table->foreign('nip_dosen_pembimbing')
                ->references('nip')
                ->on('dosen_pembimbings');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('skripsis');
    }
};
