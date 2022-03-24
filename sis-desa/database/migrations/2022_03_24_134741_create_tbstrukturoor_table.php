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
        Schema::create('tbstrukturoor', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->string("nama_organisasi",90)->nullable();
            $table->unsignedBigInteger("id_pegawai")->nullable();
            $table->string("status",50)->nullable();
            $table->foreign('id_pegawai')->references('id')->on('tb_pegawai');	
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
        Schema::dropIfExists('tbstrukturoor');
    }
};
