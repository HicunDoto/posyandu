<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelayananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelayanan', function (Blueprint $table) {
            $table->id('id_pelayanan');
            $table->foreignId('id_bidan')->references('id_bidan')->on('bidan')->onDelete('cascade')->nullable();
            $table->foreignId('id_balita')->references('id_balita')->on('balita')->onDelete('cascade')->nullable();
            $table->foreignId('id_kader')->references('id_kader')->on('kader')->onDelete('cascade')->nullable();
            $table->date('tgl_layanan');
            $table->string('jenis_vit');
            $table->string('jenis_imun');
            $table->string('penyuluhan');
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
        Schema::dropIfExists('pelayanan');
    }
}
