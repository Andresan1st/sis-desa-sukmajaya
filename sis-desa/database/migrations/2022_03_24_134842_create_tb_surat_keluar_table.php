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
            $table->string("nomor_surat_keluar",100)->unique();
            $table->string("perihal_surat",100)->nullable();
            $table->string("nama_pemohon",100)->nullable();
            $table->string("nama_bersangkutan",100)->nullable();
            $table->string("type_surat",50)->nullable();
            $table->date("tanggal")->nullable();
            $table->string("keperluan",50)->nullable();
            
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
