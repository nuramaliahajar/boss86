<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationshipsToMkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mata_kuliah', function(Blueprint $table) {
            $table->foreign('nidn')->references('nidn')->on('dosen')
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
        Schema::table('mata_kuliah', function(Blueprint $table) {
            $table->dropForeign('mata_kuliah_nidn_foreign');
        });

        Schema::table('mata_kuliah', function(Blueprint $table) {
            $table->string('nidn')->index()->change();
        });
    }
}
