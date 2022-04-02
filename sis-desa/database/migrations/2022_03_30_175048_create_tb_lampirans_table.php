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
        Schema::create('tb_lampirans', function (Blueprint $table) {
            $table->id();
            $table->string('file_name',100)->nullable();
            $table->string('file_size',100)->nullable();
            $table->unsignedBigInteger("id_surat_masuk")->nullable();
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
        Schema::dropIfExists('tb_lampirans');
    }
};
