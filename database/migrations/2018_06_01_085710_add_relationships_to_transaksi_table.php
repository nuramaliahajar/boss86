<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationshipsToTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transaksi', function(Blueprint $table) {
            $table->foreign('nidn')->references('nidn')->on('dosen')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('k_jurusan')->references('k_jurusan')->on('jurusan')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('kode_mk')->references('kode_mk')->on('mata_kuliah')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('kode_kls')->references('kode_kls')->on('kelas')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->integer('semester_id')->unsigned()->change();
            $table->foreign('semester_id')->references('id')->on('semester')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
