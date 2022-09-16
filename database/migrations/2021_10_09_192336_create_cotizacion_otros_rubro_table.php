<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCotizacionOtrosRubroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*Schema::create('cotizacion_otros_rubro', function (Blueprint $table) {
            $table->unsignedBigInteger('fk_rubroID');
            $table->unsignedBigInteger('fk_cotizacionID');
            $table->timestamps();

            $table->primary(['fk_rubroID', 'fk_cotizacionID']);

            $table->foreign('fk_rubroID')
            ->references('rubroID')->on('otros_rubros')
            ->onDelete('cascade');

            $table->foreign('fk_cotizacionID')
            ->references('cotizacionID')->on('cotizacions')
            ->onDelete('cascade');
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::dropIfExists('cotizacion_otros_rubro');
    }
}
