<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBalitaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('balita', function (Blueprint $table) {
            $table->id('id_balita');
            $table->string('nama');
            $table->foreignId('id_user')->references('id_user')->on('users')->onDelete('cascade')->nullable();
            $table->string('tempat');
            $table->date('tl');
            $table->enum('jenis', ['1','0']);
            $table->string('bb');
            $table->string('ayah');
            $table->string('ibu');
            $table->string('anakke');
            $table->text('alamat');
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
        Schema::dropIfExists('balita');
    }
}
