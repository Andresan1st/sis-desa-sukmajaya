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
        Schema::create('tb_surat_masuk', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->string("nomor_surat_masuk",100)->unique();
            $table->string("perihal_surat",100)->nullable();
            $table->date("tanggal")->nullable();
            $table->string("file_name",100)->nullable();
            $table->string("file_path",100)->nullable();
            $table->string("file_size")->nullable();
            $table->string("file_ekstensi",100)->nullable();
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
        Schema::dropIfExists('tb_surat_masuk');
    }
};
