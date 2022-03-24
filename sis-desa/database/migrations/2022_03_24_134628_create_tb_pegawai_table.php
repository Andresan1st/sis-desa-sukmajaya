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
        Schema::create('tb_pegawai', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->string("nip",90)->unique();
            $table->string("nama_pegawai",100)->nullable();
            $table->string("alamat",50)->nullable();
            $table->string("no_telp",225)->nullable();
            $table->string("jenkel",10)->nullable();
            $table->unsignedBigInteger("id_jabatan")->nullable();
            $table->foreign('id_jabatan')->references('id')->on('tb_jabatan');					
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
        Schema::dropIfExists('tb_pegawai');
    }
};
