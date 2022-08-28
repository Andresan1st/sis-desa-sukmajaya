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
        Schema::create('mas_absen', function (Blueprint $table) {
            $table->bigIncrements("id");     
            $table->string("nip",10)->nullable();
            $table->date("tanggal")->nullable();
            $table->datetime("jam_masuk")->nullable();
            $table->datetime("jam_keluar")->nullable();
            $table->string("status",10)->nullable();
            $table->foreign('nip')->references('nip')->on('tb_pegawai')->onDelete('cascade')->onUpdate('cascade');					    				
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
        Schema::dropIfExists('mas_absen');
    }
};
