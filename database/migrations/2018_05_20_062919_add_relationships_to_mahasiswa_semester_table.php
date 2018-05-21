<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationshipsToMahasiswaSemesterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mahasiswa_semester', function(Blueprint $table) {
            $table->integer('semester_id')->unsigned()->change();
            $table->foreign('semester_id')->references('id')->on('semester')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        }); 

        Schema::table('mahasiswa_semester', function(Blueprint $table) {
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
        //drop foreign semester
        Schema::table('mahasiswa_semester', function(Blueprint $table) {
            $table->dropForeign('mahasiswa_semester_semester_id_foreign');
        });

        Schema::table('mahasiswa_semester', function(Blueprint $table) {
            $table->dropIndex('mahasiswa_semester_semester_id_foreign');
        });

        Schema::table('mahasiswa_semester', function(Blueprint $table) {
            $table->integer('semester_id')->change();
        });

        //drop foreign mahasiswa
        Schema::table('mahasiswa_semester', function(Blueprint $table) {
            $table->dropForeign('mahasiswa_semester_nim_foreign');
        });

        Schema::table('mahasiswa_semester', function(Blueprint $table) {
            $table->string('nim', 12)->index()->change();
        });
    }
}
