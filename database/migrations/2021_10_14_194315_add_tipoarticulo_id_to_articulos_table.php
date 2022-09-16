<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTipoarticuloIdToArticulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('articulos', function (Blueprint $table) {
            $table->unsignedBigInteger('fk_tipoArticuloID')
            ->after('unidadMedida');

            $table->foreign('fk_tipoArticuloID')
            ->references('tipoArticuloID')->on('tipo_articulos')
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
        Schema::table('articulos', function (Blueprint $table) {
            $table->dropForeign(['fk_tipoArticuloID']);
            $table->dropColumn('fk_tipoArticuloID');
        });
    }
}
