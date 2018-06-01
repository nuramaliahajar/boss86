<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationshipsToAbsensiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('absensi', function(Blueprint $table) {
            $table->foreign('barcode')->references('barcode')->on('transaksi')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('nim')->references('nim')->on('mahasiswa')
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
