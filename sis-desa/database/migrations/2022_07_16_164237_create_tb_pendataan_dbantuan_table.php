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
        Schema::create('tb_pendataan_dbantuan', function (Blueprint $table) {
            $table->bigIncrements("id");     
            $table->unsignedBigInteger("id_masyarakat")->nullable();
            $table->string("tanggal",10)->nullable();
            $table->string("keterangan",10)->nullable();
            $table->string("status",10)->nullable();
            $table->foreign('id_masyarakat')->references('id')->on('tb_masyarakat')->onDelete('cascade')->onUpdate('cascade');					    				
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
        Schema::dropIfExists('tb_pendataan_dbantuan');
    }
};
