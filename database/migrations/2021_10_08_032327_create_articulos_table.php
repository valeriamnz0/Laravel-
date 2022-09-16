<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulos', function (Blueprint $table) {
            $table->id('articuloID');
            $table->string('codigo', 25)->unique();
            $table->string('proveedor', 30);
            $table->double('costo', 10, 2);
            $table->string('marca', 25);
            $table->string('nombre', 500);
            $table->string('unidadMedida', 25);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articulos');
    }
}
