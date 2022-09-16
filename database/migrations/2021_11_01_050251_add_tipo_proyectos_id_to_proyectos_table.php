<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTipoProyectosIdToProyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('proyectos', function (Blueprint $table) {
            $table->unsignedBigInteger('fk_tipoProyectoID')
            ->after('proyectoID');

            $table->foreign('fk_tipoProyectoID')
            ->references('tipoProyectoID')->on('tipo_proyectos')
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
        Schema::table('proyectos', function (Blueprint $table) {
            $table->dropForeign(['fk_tipoProyectoID']);
            $table->dropColumn('fk_tipoProyectoID');
        });
    }
}
