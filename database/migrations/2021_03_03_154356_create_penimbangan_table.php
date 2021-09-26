<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenimbanganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penimbangan', function (Blueprint $table) {
            $table->id('id_penimbangan');
            $table->foreignId('id_bidan')->references('id_bidan')->on('bidan')->onDelete('cascade')->nullable();
            $table->foreignId('id_balita')->references('id_balita')->on('balita')->onDelete('cascade')->nullable();
            $table->foreignId('id_kader')->references('id_kader')->on('kader')->onDelete('cascade')->nullable();
            $table->date('tgl_timbang');
            $table->string('bb');
            $table->string('tb');
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
        Schema::dropIfExists('penimbangan');
    }
}
