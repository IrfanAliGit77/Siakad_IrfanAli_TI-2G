<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RelasKelasMahasiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mahasiswa', function(Blueprint $table){
            $table->dropColumn('kelas'); //menghapus kolom kelas
            $table->unsignedBigInteger('kelas_id')->nullable(); //tambah kolom kelas_id
            $table->foreign('kelas_id')->references('id')->on('kelas'); //tambah fk di kelas_id
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mahasiswa', function(Blueprint $table){
            $table->string('kelas');
            $table->dropForeign(['kelas_id']);
        });
    }
}
