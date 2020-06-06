<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKetUjianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ket_ujian', function (Blueprint $table) {
            $table->string('no_ujian',25)->primary();
            $table->string('nama_ujian',100);
            $table->string('waktu', 20);
            $table->string('nilai_per_soal', 100);
            $table->string('matkul', 200);
            $table->bigInteger('jml_soal');
            $table->bigInteger('dosen_id')->unsigned();
            $table->foreign('dosen_id')->references('id')->on('dosen');
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
        Schema::dropIfExists('ket_ujian');
    }
}
