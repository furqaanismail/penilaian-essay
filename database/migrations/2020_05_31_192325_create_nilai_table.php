<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai', function (Blueprint $table) {
            $table->id();
            $table->string('nilai', 50);
            $table->string('mahasiswa_id', 15);
            $table->foreign('mahasiswa_id')->references('nim')->on('mahasiswa');
            $table->string('ket_ujian_id');
            $table->foreign('ket_ujian_id')->references('no_ujian')->on('ket_ujian');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nilai');
    }
}
