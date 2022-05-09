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
        Schema::create('tb_masyarakat', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->string("nik",90)->unique();
            $table->string("nama",100)->nullable();
            $table->string("tempat_lahir",50)->nullable();
            $table->date("tgl_lahir",50)->nullable();
            $table->string("jenkel",50)->nullable();
            $table->string("alamat",225)->nullable();
            $table->string("rt_rw",10)->nullable();
            $table->string("agama",15)->nullable();
            $table->string("status_kawin",30)->nullable();
            $table->string("kewarganegaraan",30)->nullable();
            $table->string("pekerjaan",100)->nullable();
            $table->string("no_kk",100)->nullable();
            $table->string("status",100)->nullable();
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
        Schema::dropIfExists('tb_masyarakat');
    }
};
