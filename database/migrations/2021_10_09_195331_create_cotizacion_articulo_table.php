<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCotizacionArticuloTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotizacion_articulo', function (Blueprint $table) {
            $table->unsignedBigInteger('fk_articuloID');
            $table->unsignedBigInteger('fk_cotizacionID');            
            $table->integer('cantidad');
            $table->double('margen', 10,2);
            $table->double('precio', 10,2);
            $table->double('iva', 6,2);
            $table->double('precioFinal', 10,2);
            $table->timestamps();

            $table->primary(['fk_articuloID', 'fk_cotizacionID']);

            $table->foreign('fk_articuloID')
            ->references('articuloID')->on('articulos')
            ->onDelete('cascade');

            $table->foreign('fk_cotizacionID')
            ->references('cotizacionID')->on('cotizacions')
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
        Schema::dropIfExists('cotizacion_articulo');
    }
}
