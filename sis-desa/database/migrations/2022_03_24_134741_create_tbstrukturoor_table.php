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
        if (!Schema::hasTable('tb_pegawai')) {
            Schema::create('tb_pegawai', function (Blueprint $table) {
                $table->bigIncrements("id");
                $table->string("nama_organisasi",90)->nullable();
                $table->string("status",50)->nullable();
                $table->timestamps();
            });
        }
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
