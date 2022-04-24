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
        Schema::create('tb_surat_keluar', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->string('nomor_surat_keluar')->nullable();
            $table->string('nama_pemohon')->nullable(); 
            $table->unsignedBigInteger('jenis_surat_id')->nullable();
            $table->unsignedBigInteger('format_surat_id')->nullable();
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
        Schema::dropIfExists('tb_surat_keluar');
    }
};
