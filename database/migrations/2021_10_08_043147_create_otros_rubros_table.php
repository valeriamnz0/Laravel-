<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtrosRubrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('otros_rubros', function (Blueprint $table) {
            $table->id('rubroID');
            //$table->string('rubro', 80);
            $table->integer('cantidad');
            $table->double('costo', 10,2);
            $table->double('margen', 5,2);
            $table->double('precio', 10,2);
            $table->double('iva', 10,2);
            $table->double('precioFinal', 10,2);
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
        Schema::dropIfExists('otros_rubros');
    }
}
